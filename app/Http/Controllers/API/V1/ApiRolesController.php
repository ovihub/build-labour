<?php

namespace App\Http\Controllers\API\V1;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiRolesController extends ApiBaseController
{

    /**
     * @OA\Get(
     *      path="/roles",
     *      tags={"Role"},
     *      summary="Get Roles by List",
     *      security={},
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
     *          description=""
     *      )
     * )
     */
    public function index() {

        // idx
        $roles = [];

        try {

            $roles = Role::all();

        } catch (\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse(compact('roles'), true, 'Roles', 200 );
    }
}
