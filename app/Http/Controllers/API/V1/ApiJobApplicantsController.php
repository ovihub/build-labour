<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Companies\Job;
use App\Models\Companies\JobApplicant;
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
}
