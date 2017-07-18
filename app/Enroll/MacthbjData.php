<?php

namespace App\Enroll;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MatchbjData extends Model
{
    protected $table = 'macthbj_data';

    protected $fillable = ['team_no', 'invitecode', 'team_name', 'competition_name', 'competition_type', 'competition_group', 'vocation', 'name', 'nation', 'sex', 'age', 'heigth', 'date_of_birth', 'work_unit', 'ID_type', 'ID_number', 'tel', 'mail', 'register_address', 'home_address', 'remarks', 'photo', 'billing_header', 'credit_code', 'billing_money', 'billing_details', 'receive_address', 'contact_name', 'contact_tel', 'contact_mail', 'contact_remarks' ];

    protected $hidden = ['updated_at'];
}
