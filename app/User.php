<?php

/***
 * User used for authentications
 */

namespace App;

use App\Models\Companies\Company;
use App\Models\Users\Education;
use App\Models\Users\Ticket;
use App\Models\Users\Users;
use App\Models\Users\UserSkill;
use App\Models\Users\WorkerDetail;
use App\Models\Users\WorkExperience;
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Role() {

        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    /**
     * Return a collection relates to Work Experience class
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Experiences() {

        return $this->hasMany(WorkExperience::class, 'user_id', 'id')->with('Company');
    }

    /**
     * Return a collection relates to Worker Skills
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Skills() {

        return $this->hasMany(UserSkill::class, 'user_id', 'id');
    }

    /**
     * Return a collection relates to Worker Educations
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Educations() {

        return $this->hasMany( Education::class, 'user_id', 'id');
    }

    /**
     * Return a collection relates to Worker Detail, e.g Worker Extra information
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function WorkerDetail() {

        return $this->belongsTo(WorkerDetail::class, 'id', 'user_id');
    }


    /**
     * Return a collection relates to Tickets
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Tickets() {

        return $this->hasMany( Ticket::class, 'user_id', 'id');
    }

    /**
     * Return a collection relates to Company, e.g User as a company
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Company() {

        return $this->belongsTo(Company::class, 'id', 'created_by');
    }
}
