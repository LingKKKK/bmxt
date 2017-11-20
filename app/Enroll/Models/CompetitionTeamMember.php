<?php


namespace App\Enroll\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CompetitionTeamMember extends Model
{
    use SoftDeletes;

    protected $table = 'competition_team_members';

    protected $fillable = ['id', 'team_id', 'type',
    // 基本信息
    'name', 'mobile', 'name', 'email', 'idcard_type', 'idcard_no', 'nation', 'sex', 'birthday', 'age', 'photo_url',
    // 其他资料
    'vocation', 'work_unit', 'register_address', 'home_address', 'remark', 'profiles',
    'school', 'class', 'guarder', 'relation', 'headmaster',
    ];

    protected $hidden = ['updated_at', 'created_at', 'deleted_at'];

    public function team()
    {
        return $this->belongsTo(CompetitionTeam::class, 'team_id', 'id');
    }
}
