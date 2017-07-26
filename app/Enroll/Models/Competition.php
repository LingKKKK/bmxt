<?php


namespace App\Enroll\Models;

use Illuminate\Database\Eloquent\Model;


class Competition extends Model
{
    protected $table = 'competitions';

    protected $fillable = ['id', 'name', 'remark'];

    public $timestamps = false;
}