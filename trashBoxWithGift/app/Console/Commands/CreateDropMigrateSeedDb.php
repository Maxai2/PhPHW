<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class CreateDropMigrateSeedDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:refresh {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create db, Drop db, semigrate, seed';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        config(['database.connections.mysql.database' => null]);

        $dbName = $this->argument('name');
        if($dbName == false) {
            $dbName = $this->ask('Enter db name', 'trashdb');
            //$this->error('WTF wrong db name you dumb sheet');
           // die();
        }

        Artisan::call('db:drop trashdb');
        // DB::statement("DROP DATABASE IF EXISTS $dbName");
        Artisan::call('db:create trashdb');
        // DB::statement(
        //     "CREATE DATABASE IF NOT EXISTS $dbName
        //     CHARACTER SET utf8
        //     COLLATE utf8_unicode_ci"
        // );
        config(['database.connections.mysql.database' => $dbName]);

        DB::disconnect('mysql');

        Artisan::call('migrate');
        Artisan::call('db:seed');
    }
}
