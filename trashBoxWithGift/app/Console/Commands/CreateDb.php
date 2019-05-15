<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create db';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $dbName = $this->argument('name');
        if($dbName == false) {
            $dbName = $this->ask('Enter db name', 'trashdb');
            //$this->error('WTF wrong db name you dumb sheet');
           // die();
        }
        
        DB::statement(
            "CREATE DATABASE IF NOT EXISTS $dbName
            CHARACTER SET utf8
            COLLATE utf8_unicode_ci"
        );
    }
}
