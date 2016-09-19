<?php

namespace Theater\Console\Commands;

use Illuminate\Console\Command;
use Theater\Http\Services\UserExcel;

class downloadExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:excel {awardType}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genera excel con usuarios y envia link de acceso al email';

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

    private function exportUsers($type){
        UserExcel::getExcel($type);
    }

    public function handle()
    {
        $this->exportUsers($this->argument('awardType'));

    }
}
