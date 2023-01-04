<?php

use Carbon\Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate(config('module.pages.table'));

        $page = [
            [
                'title'       => 'Sample Page',
                'page_slug'   => 'sample page',
                'description' => 'sample page',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ];

        DB::table(config('module.pages.table'))->insert($page);

        $this->enableForeignKeys();
    }
}
