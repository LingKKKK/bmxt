<?php
namespace App\Enroll\Models;

use Illuminate\Database\Eloquent\Model;


class CompetitionEvent extends Model
{
    protected $table = 'competition_events';

    protected $fillable = ['id', 'event_group', 'parent_id', 'name', 'description'];

    public $timestamps = false;

}
