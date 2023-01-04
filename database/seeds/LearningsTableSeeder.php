<?php

use Carbon\Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LearningsTableSeeder extends Seeder
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
        $this->truncate(config('module.learnings.table'));

        $learning = [
            [
                'title'       => 'Join the Community',
                'image_link'   => '1594837667metroesportslogo.png',
                'button_text' => 'Learn More',
                'button_link' => 'https://metrotech.gg/classes/esports_coding',
                'indicator_text' => 'METRO CONTACT',
                'order' => '1',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title'       => 'Professional Coaching',
                'image_link'   => '1594837757Headset-1.png',
                'button_text' => 'Learn More',
                'button_link' => 'https://metrotech.gg/classes/coding_tech',
                'indicator_text' => 'GET COACHED',
                'order' => '2',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title'       => 'Coding and Technology',
                'image_link'   => '1594837821coding-graphic-1.png',
                'button_text' => 'Learn More',
                'button_link' => 'hhttps://metrotech.gg/classes/coding_tech',
                'indicator_text' => 'GET TRAINED',
                'order' => '3',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title'       => 'SUMMER CAMPS',
                'image_link'   => '1594837880school-onfrns2wki02uyip8vyhp03mn3tm9lgrdxmqum4boo.png',
                'button_text' => 'Learn More',
                'button_link' => 'https://metrotech.gg/classes/esports_coding',
                'indicator_text' => 'LEVEL-UP QUICKLY',
                'order' => '4',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],

        ];

        DB::table(config('module.learnings.table'))->insert($learning);

        $this->enableForeignKeys();
    }
}
