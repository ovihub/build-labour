<?php

/***
 * User used for authentications
 */

namespace App;

use App\Models\Users\Users;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Users implements JWTSubject
{
    use Notifiable;

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Return a Object relates to Role Class
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToRoleClass
     */
    public function Role() {

        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    /**
     * Return a collection relates to Work Experience class
     * @return \Illuminate\Database\Eloquent\Relations\HasManyWorkExperience
     */
    public function Experiences() {

        return $this->hasMany(WorkExperience::class, 'user_id', 'id');
    }
}
