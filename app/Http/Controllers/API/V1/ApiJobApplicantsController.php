<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Companies\Job;
use App\Models\Companies\JobApplicant;
use App\Models\Companies\JobStat;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use JWTAuth;
use Illuminate\Http\Request;

class ApiJobApplicantsController extends ApiBaseController
{

    /**
     * @OA\Get(
     *      path="/job/{id}/apply",
     *      tags={"Applicant"},
     *      summary="A worker apply a job",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="job id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid Token"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Token Expired"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Token Not Found"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Request OK"
     *      )
     * )
     */
    public function apply(Request $request) {

        $user = JWTAuth::toUser();

        try {

            // check if its already applied
            $applicant = JobApplicant::where('user_id', $user->id)->where('job_id', $request->id)->exists();

            // already applied for the job
            if ($applicant) {

                $msg = 'You already applied for this job.';
                return $this->apiErrorResponse(
                    false,
                    $msg,
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    ['job_post_applicant' => $msg]
                );
            }

            // apply applicant

            JobApplicant::create([
                'job_id' => $request->id,
                'user_id' => $user->id,
                'applied_at' => Carbon::now()
            ]);


            JobStat::create([
                'job_id' => $request->id,
                'scored_to' => $user->id,
                'performed_by' => $user->id,
                'category' => 'viewed',
                'created_at' => Carbon::now()
            ]);

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( [], true, 'Successfully applied job.', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Get(
     *      path="/job/{id}/applicants",
     *      tags={"Applicant"},
     *      summary="Get applicants in a job",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="job id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid Token"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Token Expired"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Token Not Found"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Request OK"
     *      )
     * )
     */
    public function applicants(Request $request) {

        $job = Job::find($request->id);

        $applicants = $job->JobApplicants;

        return $this->apiSuccessResponse( compact('applicants'), true, 'Successfully retrieved applicants.', self::HTTP_STATUS_REQUEST_OK);

    }

    /**
     * @OA\Post(
     *      path="/job/{id}/do-score",
     *      tags={"Applicant"},
     *      summary="Score a stats by different catories (favourite, invited, not suitable)",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="job id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="scored_to",
     *                      description="Score an applicant (user_id)",
     *                      type="integer",
     *                      example=3
     *                  ),
     *                  @OA\Property(
     *                      property="category",
     *                      description="categories (viewed, invited, favourite, not_suitable)",
     *                      type="string",
     *                      example="favourite"
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid Token"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Token Expired"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Token Not Found"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Request OK"
     *      )
     * )
     */
    public function postDoScore( Request $request )
    {

        DB::beginTransaction();

        $user = JWTAuth::toUser();

        try {

            $rules = [
                'category'  => 'required|in:viewed,invited,favourite,not_suitable',
                'scored_to' => 'required',
            ];

            $validator = \Validator::make( $request->all() , $rules);

            if( $validator->fails() ){

                return $this->apiErrorResponse(
                    false,
                    $validator->errors(),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $validator->errors()->toArray()
                );

            }

            // check if the scored_to or user exist

            $scoredTo = User::find($request->scored_to);

            if (!$scoredTo) {

                throw new \Exception();
            }

            JobStat::create([
                'job_id' => $request->id,
                'scored_to' => $scoredTo->id,
                'performed_by' => $user->id,
                'category' => $request->category,
                'created_at' => Carbon::now()
            ]);


        } catch(\Exception $e) {

            DB::rollback();
            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        DB::commit();

        return $this->apiSuccessResponse( [], true, 'Successfully added a score.', self::HTTP_STATUS_REQUEST_OK);

    }

    /**
     * @OA\Get(
     *      path="/job/{id}/search-applicants?keyword=John",
     *      tags={"Applicant"},
     *      summary="Search in a job applicants by keyword",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="job id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid Token"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Token Expired"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Token Not Found"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Request OK"
     *      )
     * )
     */
    public function searchJobApplicants( Request $request )
    {

        $keyword = empty(trim($request->keyword)) ? '' : trim($request->keyword);

        $users = User::query();

        $users = $users->select(
            'users.*',
            'ja.user_id',
            'ja.job_id',
            'ja.applied_at'
        );

        $users = $users->join('job_post_applicants as ja', 'users.id', 'ja.user_id');
        $users = $users->with([
            'WorkerDetail',
            'WorkerDetail.Areas',
            'WorkerDetail.Sectors',
            'WorkerDetail.Tiers',
            'Educations',
            'Tickets',
            'Skills'
        ]);

        $applicants = $users->where('first_name', 'like', "%{$keyword}%")->where('ja.job_id', $request->id)->get();

        return $this->apiSuccessResponse( compact('applicants'), true, '', self::HTTP_STATUS_REQUEST_OK);
    }
}
