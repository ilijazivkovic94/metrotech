<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(config('access.menus_table'))->truncate();
        $menu = [
            'id'                    => 1,
            'type'                  => 'backend',
            'name'                  => 'Backend Sidebar Menu',
            'items'                 => '[{"view_permission_id":"view-access-management","icon":"fa-users","open_in_new_tab":0,"url_type":"route","url":"","name":"Access Management","id":11,"content":"Access Management","children":[{"view_permission_id":"view-user-management","open_in_new_tab":0,"url_type":"route","url":"admin.access.user.index","name":"User Management","id":12,"content":"User Management"},{"view_permission_id":"view-role-management","open_in_new_tab":0,"url_type":"route","url":"admin.access.role.index","name":"Role Management","id":13,"content":"Role Management"},{"view_permission_id":"view-permission-management","open_in_new_tab":0,"url_type":"route","url":"admin.access.permission.index","name":"Permission Management","id":14,"content":"Permission Management"}]},{"view_permission_id":"view-module","icon":"fa-wrench","open_in_new_tab":0,"url_type":"route","url":"admin.modules.index","name":"Module","id":1,"content":"Module"},{"view_permission_id":"view-menu","icon":"fa-bars","open_in_new_tab":0,"url_type":"route","url":"admin.menus.index","name":"Menus","id":3,"content":"Menus"},{"view_permission_id":"view-page","icon":"fa-file-text","open_in_new_tab":0,"url_type":"route","url":"admin.pages.index","name":"Pages","id":2,"content":"Pages"},{"view_permission_id":"edit-settings","icon":"fa-gear","open_in_new_tab":0,"url_type":"route","url":"admin.settings.edit?setting=1","name":"Settings","id":9,"content":"Settings"},{"id":21,"name":"Templates","url":"","url_type":"route","open_in_new_tab":0,"icon":"fa-th","view_permission_id":"view-templates","content":"Templates","children":[{"view_permission_id":"view-slider-permission","icon":"","open_in_new_tab":0,"url_type":"route","url":"admin.sliders.index","name":"Slider","id":20,"content":"Slider"},{"view_permission_id":"view-learning-permission","open_in_new_tab":0,"url_type":"route","url":"admin.learnings.index","name":"Learning","id":22,"content":"Learning"},{"id":23,"name":"HomeVideo","url":"admin.homevideos.edit?homevideo=1","url_type":"route","open_in_new_tab":0,"view_permission_id":"view-homevideo-permission","content":"HomeVideo"},{"view_permission_id":"view-team-permission","open_in_new_tab":0,"url_type":"route","url":"admin.teams.index","name":"Team","id":24,"content":"Team"},{"view_permission_id":"view-partner-permission","open_in_new_tab":0,"url_type":"route","url":"admin.partners.index","name":"Partner","id":25,"content":"Partner"}]}]',
            'created_by'            => 1,
            'created_at'            => Carbon::now(),
        ];

        DB::table(config('access.menus_table'))->insert($menu);
    }
}
