<?php

use Carbon\Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeVideoTableSeeder extends Seeder
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
        $this->truncate(config('module.homevideos.table'));

        $homevideo = [
            [
                'title'       => 'Home Video',
                'video_link' => '#',
                'video_file_link' => 'home_video.mp4',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ];

        DB::table(config('module.homevideos.table'))->insert($homevideo);

        $this->enableForeignKeys();
    }
}
