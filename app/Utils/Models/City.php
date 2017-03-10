<?php

namespace App\Utils\Models;

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
        return $this->hasMany('App\Utils\Models\District', 'district_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo('App\Utils\Models\Province', 'province_id', 'id');
    }
}
