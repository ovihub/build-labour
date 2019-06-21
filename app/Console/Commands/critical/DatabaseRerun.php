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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $tables = DB::select('SHOW TABLES');
        $tableName = 'Tables_in_' . env('DB_DATABASE');

        if (Schema::hasTable('user_skills')) {

            Schema::drop('user_skills');

        }

        print_r($tables);

        foreach($tables as $table){

            if (Schema::hasTable($table->{$tableName})) {

                Schema::drop($table->{$tableName});
                echo 'Table '.$table->{$tableName}.' Droped. <br>';
            }

        }

        echo $output = shell_exec('php artisan migrate');

        sleep(2/700);

        if ($output) {

            echo shell_exec('php artisan db:seed');
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
