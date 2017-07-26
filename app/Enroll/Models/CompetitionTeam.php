<?php


namespace App\Enroll\Models;

use Illuminate\Database\Eloquent\Model;


class CompetitonTeam extends Model
{
    protected $table = 'competition_teams';

    protected $fillable = ['id', 'invitecode', 'team_no' 'team_name' 'competition_event_id', 
    'contact_name', 'contact_mobile', 'contact_email', 'contact_remark',
    'invoice_title', 'invoice_code', 'invoice_money', 'invoice_type', ',invoice_mail_address', 'invoice_mail_recipients', 
    'invoice_mail_mobile', 'invoice_mail_email', 'invoice_remark'
    	];
}