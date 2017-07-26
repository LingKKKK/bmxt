<?php


namespace App\Enroll\Models;

use Illuminate\Database\Eloquent\Model;


class Competition extends Model
{
    protected $table = 'competitons';

    protected $fillable = ['id', 'name', 'remark'];
}