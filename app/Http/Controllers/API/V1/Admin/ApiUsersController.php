<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\API\V1\ApiBaseController;
use Illuminate\Http\Request;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Helpers\Utils;

class ApiUsersController extends ApiBaseController
{
    public function get(Request $request)
    {
        try {
            $record = User::find($request->id)
                        ->makeHidden([
                            'date_of_birth',
                            'country',
                            'mobile_number',
                            'marital_status',
                            'full_name',
                            'dob_formatted',
                            'device_token',
                            'role_id',
                        ])->makeVisible([
                        ]);

            if ($record) {
                return $this->apiSuccessResponse(compact('record'), true, 'Request OK', self::HTTP_STATUS_REQUEST_OK);
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }
    }

    public function upload(Request $request)
    {
    	try {
            $photo = $request->get('photo');
            $type  = pathinfo($photo, PATHINFO_EXTENSION);

            if ($type != 'png' && $type != 'jpg') {

                $user  = User::find($request->get('user_id'));
                $uniqname = Utils::convertID($user->id) . '-' . uniqid() . '.png';

                $directory = 'photos/' . $user->id;
                $photo_url = url('storage/' . $directory . '/' . $uniqname);
                $destination = storage_path() . '/app/public/' . $directory . '/';

                if (! is_dir($destination)) {
                    File::makeDirectory($destination,0755,true);
                }

                $image = Image::make(file_get_contents($photo));

                $thumbnail = $image->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                if ($thumbnail->save($destination . $uniqname)) {
                    $user->photo_url = $photo_url;
                    $user->save();
                }
                
                return $this->apiSuccessResponse($user->photo_url, true, 'Image successfully uploaded', self::HTTP_STATUS_REQUEST_OK);
            }

            return $this->apiErrorResponse(false, 'Request not found', self::HTTP_STATUS_NOT_FOUND, 'requestNotFound');
        
        } catch (\Exception $e) {
            
            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }
    }
    
    public function deletePhoto(Request $request)
    {
        try {
            $user = User::find($request->id);
            $directory = 'photos/' . $user->id;
            $destination = storage_path() . '/app/public/' . $directory . '/' . basename($user->photo_url);

            File::delete($destination);

            $user->photo_url = null;
            $user->save();

            return $this->apiSuccessResponse($destination, true, 'Image successfully deleted', self::HTTP_STATUS_REQUEST_OK);

        } catch(Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }
    }

    public function delete(Request $request)
    {
        try {
            $user = User::where('id', '=', $request->id)->first();
            $user->email = uniqid('deleted_').'_'.$user->email;
            $user->save();

            $user->delete();

            return $this->apiSuccessResponse([], true, 'Account successfully deleted.', self::HTTP_STATUS_REQUEST_OK);

        } catch(\Exception $e) {
            
            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }
    }

}
