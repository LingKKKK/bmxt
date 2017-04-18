<?php

namespace App\Enroll;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SignupData extends Model
{
    protected $table = 'signup_data';

    protected $fillable = ['team_name', 'school_name', 'competition_type', 
                            'leader_name', 'leader_mobile', 'leader_email',
                            'captain_name', 'captain_mobile', 'captain_email',
                            'members',
                            'remark', 'origin_data'];

    protected $hidden = ['updated_at'];
}
