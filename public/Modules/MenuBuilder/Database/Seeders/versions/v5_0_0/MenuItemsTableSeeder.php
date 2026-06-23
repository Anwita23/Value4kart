<?php

namespace Modules\MenuBuilder\Database\Seeders\versions\v5_0_0;

use Illuminate\Database\Seeder;
use Modules\MenuBuilder\Http\Models\MenuItems;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        addMenuItem('admin', 'OTP Log', [
            'parent' => 'Tools',
            'link' => 'otp-logs',
            'params' => '{"permission":"App\\\\Http\\\\Controllers\\\\OtpLogController@index", "route_name":["otp-logs.index", "otp-logs.detail"]}',
            'sort' => 4,
        ]);

        MenuItems::addRouteOnParams('pos/setup', '3', 'vendor.pos.customer');
        MenuItems::addRouteOnParams('pos/setup', '6', 'vendor.pos.customer');

        MenuItems::where('link', 'dashboard')->whereIn('menu', [3, 6])->update(['params' => '{"permission":"App\\\\Http\\\\Controllers\\\\Vendor\\\\DashboardController@index","route_name":["vendor-dashboard"],"menu_level":"3"}']);

        MenuItems::where('link', 'account-setting')->where('menu', 1)->update(['params' => '{"permission":"App\\\\Http\\\\Controllers\\\\AccountSettingController@index","route_name":["account.setting.option", "sso.index", "emailVerifySetting", "preferences.password", "permissionRoles.index", "roles.index", "roles.create", "roles.edit", "notifications.setting", "sso.client", "account.setting.emailPhoneChange"]}']);
    }

}
