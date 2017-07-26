<?php

namespace App\Enroll\Models;

use Illuminate\Database\Eloquent\Model;


class InviteCode extends Model
{
    protected $table = 'invite_codes';

    protected $fillable = ['code', 'enroll_id', 'group', 'used_time'];
}
