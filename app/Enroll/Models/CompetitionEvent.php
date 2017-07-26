<?php


namespace App\Enroll\Models;

use Illuminate\Database\Eloquent\Model;


class Competition extends Model
{
    protected $table = 'competion_events';

    protected $fillable = ['id', 'event_group', 'parent_id', 'name', 'description'];
}