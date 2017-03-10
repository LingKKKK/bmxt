<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Utils\Models\Province;
use App\Utils\Location;

class UtilsTest extends TestCase
{
   public function testLocation()
   {
        $provinces = Location::provinces();
        dd($provinces);

        $this->assertEquals(['id' => 1, 'province_name' => '北京市'], $provinces->toArray());
   }


}
