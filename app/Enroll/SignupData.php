<?php

namespace App\Enroll;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SignupData extends Model
{
    protected $table = 'signup_data';

    protected $fillable = ['leader_name', 'leader_id', 'leader_sex', 'leader_mobile', 'leader_email', 'leader_pic',
                            'team_no' ,'team_name', 'school_name', 'school_address', 'competition_type', 'competition_group',
                            'members', 'payment', 'remark', 'data', 'origin_data'];

    protected $hidden = ['updated_at'];
}
