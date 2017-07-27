<?php


namespace App\Enroll\Models;

use Illuminate\Database\Eloquent\Model;


class CompetitionTeamMember extends Model
{
    protected $table = 'competition_team_members';

    protected $fillable = ['id', 'team_id', 'type',
    // 基本信息
    'name', 'mobile', 'name', 'email', 'idcard_type', 'idcard_no', 'nation', 'sex', 'birthday', 'age', 'height', 'photo_url',
    // 其他资料
    'vocation', 'work_unit', 'register_address', 'home_address', 'remark', 'profiles'
    ];
}
