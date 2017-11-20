<?php


namespace App\Enroll\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class CompetitionTeam extends Model
{
    protected $table = 'competition_teams';

    protected $fillable = ['id', 'invitecode',
    'contact_name', 'contact_mobile', 'contact_email', 'contact_remark',
    'team_no', 'team_name', 'competition_event_id',
    'invoice_title', 'invoice_code', 'invoice_money', 'invoice_type', 'invoice_mail_address', 'invoice_mail_recipients',
    'invoice_mail_mobile', 'invoice_mail_email', 'invoice_remark', 'enroll_user_id'
    	];

    protected $hidden = ['updated_at', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'enroll_user_id', 'id');
    }

    public function members()
    {
        return $this->hasMany(CompetitionTeamMember::class, 'team_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo(CompetitionEvent::class, 'competition_event_id', 'id');
    }
}
