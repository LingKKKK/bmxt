<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InitEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'work:initevents';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $service;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(\App\Enroll\CompetitionService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->service->initEvents();
        $this->info('初始化成功');
    }
}
