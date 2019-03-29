<?php

namespace App\Http\Controllers\API\V1;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiRolesController extends ApiBaseController
{

    public function index() {

        $roles = [];

        try {

            $roles = Role::all();

        } catch (\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse(compact('roles'), true, 'Roles', 200 );
    }
}
