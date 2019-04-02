<?php

namespace App\Console\Commands\Critical;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseRerun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:database';

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

        $tables = DB::select('SHOW TABLES');

        foreach($tables as $table){
            Schema::drop($table->Tables_in_buildlabour);
            echo 'Table '.$table->Tables_in_buildlabour.' Droped. <br>';
        }

        echo shell_exec('php artisan migrate');

        echo shell_exec('php artisan db:seed');

    }
}
