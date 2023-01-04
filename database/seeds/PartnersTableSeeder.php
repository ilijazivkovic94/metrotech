<?php

use Carbon\Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnersTableSeeder extends Seeder
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
        $this->truncate(config('module.partners.table'));

        $partner = [
            [
                'title'       => 'Logitech G',
                'image_link'   => '1594844314LogitechG.jpg',
                'partner_link'   => 'https://www.ea.com/',
                'order'   => '1',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title'       => 'Microsoft',
                'image_link'   => '1594844349mslogo-onj2cciyfkt2yn30altt2kp4dmoeu5kjueabr8dbls.jpg',
                'partner_link'   => 'https://www.microsoft.com/',
                'order'   => '2',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title'       => 'SAP',
                'image_link'   => '1594845155SAP_logo-1-300x153-1-onfrketopbdk99l5mivh40hxh1wvjesnt6athdnchs.png',
                'partner_link'   => 'https://sap.com/',
                'order'   => '3',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title'       => 'NFL Flag',
                'image_link'   => '1594845185nfl-flag-opw1opk0el6myfvfankhz1pqkukh8pak6rxl4s36kg.png',
                'partner_link'   => 'https://nflflag.com/',
                'order'   => '4',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title'       => 'Reket',
                'image_link'   => '1594845216REKT.jpg',
                'partner_link'   => 'https://rektglobal.com/',
                'order'   => '5',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title'       => 'Greenlit',
                'image_link'   => '1594845245gREENLIT.png',
                'partner_link'   => 'https://www.greenlitcontent.com/',
                'order'   => '6',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title'       => 'one 50 one',
                'image_link'   => '1594845274one50one_logo-full_color.png',
                'partner_link'   => 'https://www.one50one.com/',
                'order'   => '7',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title'       => 'Circonus',
                'image_link'   => '1594845298Circonus.png',
                'partner_link'   => 'https://www.circonus.com/',
                'order'   => '8',
                'status'      => '1',
                'created_by'  => '1',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ];

        DB::table(config('module.partners.table'))->insert($partner);

        $this->enableForeignKeys();
    }
}
