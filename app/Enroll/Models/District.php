<?php

namespace App\Enroll;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = ['id', 'city_id' , 'district_name'];

    protected $hidden = [];

    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo('App\Enroll\Models\City', 'city_id', 'id');
    }
}
