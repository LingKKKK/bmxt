<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Utils\Models\Province;
use App\Utils\Models\City;
use App\Utils\Models\District;


class Location extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'location:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $Provinces = $this->loadData('Provinces.xml', ['id' => 'ID', 'province_name' => 'ProvinceName']);
        $Cities = $this->loadData('Cities.xml', ['id' => 'ID', 'province_id' => 'PID', 'city_name' => 'CityName']);
        $Districts = $this->loadData('Districts.xml', ['id' => 'ID', 'city_id' => 'CID', 'district_name' => 'DistrictName']);

        $this->processData($Provinces, '导入省份数据', function($val, $k){
            Province::create($val);
        });

        $this->processData($Cities, '导入市数据', function($val, $k){
            City::create($val);
        });

        $this->processData($Districts, '导入区数据', function($val, $k){
            District::create($val);
        });

    }

    function processData($data, $message, $callback)
    {
        $count = count($data);
        $this->line($message);
        $bar = $this->output->createProgressBar($count);
        foreach ($data as $k => $val) {
            $callback($val, $k);
            $bar->advance();
        }
        $bar->finish();
        $this->line('导入完成');
    }

    public function loadData($file, $map)
    {
        $arrData = $this->loadDataFromFile($file);
        return $this->convertData($arrData, $map);
    }


    protected function convertData($data, $map)
    {
        $arrReturn = [];
        foreach ($data as $k => $val) {
            $arr = [];
            foreach ($map as $k_to => $k_from) {
                $arr[$k_to] = $val[$k_from];
            }
            $arrReturn[$k] = $arr;
        }

        return $arrReturn;
    }


    protected function loadDataFromFile($file)
    {
        $xml = simplexml_load_file((storage_path('app/'.$file)));
        $arrData = array();
        foreach ($xml as $node) {
            $attributes = json_decode(json_encode($node->attributes(), JSON_UNESCAPED_UNICODE),true)['@attributes'];
            $arrData[$attributes['ID']] = $attributes;
        }

        return $arrData;
    }
}
