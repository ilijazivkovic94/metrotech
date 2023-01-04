<?php

use Carbon\Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
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
        $this->truncate(config('module.teams.table'));

        $team = [
            [
                'title'       => 'Maddn20',
                'image_link'   => '1594844128madden 20.png',
                'team_link' => '#',
                'order' => '1',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title'       => 'Mortal Komat',
                'image_link'   => '1594844186mkll_logo2.png',
                'team_link' => '#',
                'order' => '2',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title'       => 'Nba2k20',
                'image_link'   => '1594844218nba_2k20.png',
                'team_link' => '#',
                'order' => '3',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title'       => 'Terms and conditions',
                'image_link'   => 'terms-and-conditions',
                'team_link' => '#',
                'order' => '4',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ];

        DB::table(config('module.teams.table'))->insert($team);

        $this->enableForeignKeys();
    }
}
