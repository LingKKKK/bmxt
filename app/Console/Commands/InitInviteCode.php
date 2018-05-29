<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Enroll\InviteManager;

class InitInviteCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'work:initinvitecode {--prefix=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '初始化邀请码';

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

        $prefixName = $this->option('prefix', 'enroll');


        InviteManager::InitCode($prefixName);
    }
}
