<?php

use Carbon\Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidersTableSeeder extends Seeder
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
        $this->truncate(config('module.sliders.table'));

        $slider = [
            [
                'title'       => 'ESPORTS SUMMER CAMPS',
                'desc' => 'PLAY. TRAIN. COMPETE',
                'slider_name'      => 'ESPORTS SUMMER CAMPS',
                'image_link'      => '1594831356Slider-esports-training.jpg',
                'button_text'      => 'Learn More' ,
                'button_link'      => 'https://metrotech.gg/classes/esports_coding',
                'indicator_text'      => 'TECHNOLOGY & CODING COURSES',
                'order'      => '1',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title'       => 'TECHNOLOGY & CODING COURSES',
                'desc' => 'AFTER SCHOOL. EVENING. WEEKEND',
                'slider_name'      => 'TECHNOLOGY & CODING COURSES',
                'image_link'      => '1594831397Coding.jpg',
                'button_text'      => 'Learn More',
                'button_link'      => 'https://metrotech.gg/classes/esports_coding',
                'indicator_text'      => 'ONLINE ESPORTS CLASSES',
                'order'      => '2',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],

        ];

        DB::table(config('module.sliders.table'))->insert($slider);

        $this->enableForeignKeys();
    }
}
