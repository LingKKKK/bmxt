<?php

namespace App\Enroll;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = ['id', 'province_id' , 'city_name'];

    protected $hidden = [];

    public $timestamps = false;

    public function districts()
    {
        return $this->hasMany('App\Enroll\Models\District', 'district_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo('App\Enroll\Models\Province', 'province_id', 'id');
    }
}
