<?php

namespace App\Enroll;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = ['act_name', 'start_time', 'end_time', 'remark','status','config', 'form_design'];

    protected $hidden = [];

    use SoftDeletes;

    public function enrolldatas()
    {
        return $this->hasMany('App\Enroll\EnrollData', 'activity_id', 'id');
    }

}
