<?php

namespace App\Utils\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    protected $table = 'provinces';

    protected $fillable = ['id', 'province_name'];

    protected $hidden = [];

    public $timestamps = false;

    public function cities()
    {
        return $this->hasMany('App\Utils\Models\City', 'province_id', 'id');
    }
}
