<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class SetUseable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set usable field in database';

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


        $this->line('Seeding Database');

        Artisan::call('db:seed');

        $this->line('Set usable fields to areas');

        DB::table('areas')
            ->whereNotNull('parent_id')
            ->where('parent_id', '!=', 1)
            ->update(['usable' => 1]);


        $this->line('Set usable fields to categories');

        DB::table('categories')
            ->whereNotNull('parent_id')
            ->update(['usable' => 1]);

        $this->line('Done');


    }
}
