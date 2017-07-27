<?php

namespace App\Enroll\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TripData extends Model
{

    use SoftDeletes;
    protected $table = 'trip_data';

    protected $fillable = ['team_no', 'trip_type', 'vehicle_type', 'vehicle_number', 'start_date', 'start_time', 'start_place', 'arrive_date', 'arrive_time' ,'arrive_place', 'vehicle_time', 'people_number', 'contact_name', 'contact_mobile'];

    protected $hidden = ['updated_at'];
}
