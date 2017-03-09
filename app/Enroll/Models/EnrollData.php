<?php

namespace App\Enroll\Models;

use Illuminate\Database\Eloquent\Model;

class EnrollData extends Model
{
    protected $table = 'enroll_datas';

    protected $fillable = ['activity_id', 'email', 'phone', 'data'];

    protected $hidden = [];

    public function activity()
    {
        return $this->belongsTo('App\Enroll\Models\Activity', 'activity_id', 'id');
    }
}
