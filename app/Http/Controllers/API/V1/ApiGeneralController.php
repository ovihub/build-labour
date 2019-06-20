<?php

namespace App\Http\Controllers\API\V1;

use App\Course;
use App\User;
use Illuminate\Http\Request;
use JWTAuth;

/**
 * Class UsersController
 * @property User user
 * @package App\Http\Controllers
 */
class ApiGeneralController extends ApiBaseController
{

    /**
     * @OA\Get(
     *      path="/locations?keyword=South",
     *      tags={"General"},
     *      summary="Search Locations",
     *      security={{"BearerAuth":{}}},
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
     *          response=500,
     *          description="Internal Server Error"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Experiences"
     *      )
     * )
     */

    public function searchLocation( Request $request ) {

        $keyword = trim($request->keyword);
        $curl_handle=curl_init();

        curl_setopt($curl_handle,CURLOPT_URL,"https://api.mapbox.com/geocoding/v5/mapbox.places/{$keyword}.json?country=au&access_token=" . env('MAPBOX_KEY'));

        curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);

        $buffer = curl_exec($curl_handle);

        curl_close($curl_handle);

        $buffer = json_decode($buffer);

        return $this->apiSuccessResponse([ 'locations' => $buffer ], true, 'Success', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Get(
     *      path="/countries",
     *      tags={"General"},
     *      summary="Get countries",
     *      security={{"BearerAuth":{}}},
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
     *          response=500,
     *          description="Internal Server Error"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Experiences"
     *      )
     * )
     */
    public function getCountries() {

        $countries = config('countries');

        return $this->apiSuccessResponse( compact('countries'), true, 'Success', self::HTTP_STATUS_REQUEST_OK);

    }

    /**
     * @OA\Get(
     *      path="/courses?keyword=C",
     *      tags={"General"},
     *      summary="Search Courses",
     *      security={{"BearerAuth":{}}},
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
     *          response=500,
     *          description="Internal Server Error"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Experiences"
     *      )
     * )
     */
    public function getCourses(Request $request) {

        $keyword = $request->keyword ? $request->keyword : '';

        $courses = Course::where('course_name', 'like', "%{$keyword}%")
                ->get();

        return $this->apiSuccessResponse( compact('courses'), true, 'Success', self::HTTP_STATUS_REQUEST_OK);

    }
}