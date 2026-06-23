<?php

namespace App\Http\Controllers;

use App\Enums\ProductChannel;
use App\Models\Permission;
use App\Models\PermissionRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\GeoLocale\Entities\City;
use Modules\GeoLocale\Entities\Division;
use Modules\MenuBuilder\Http\Models\MenuItems;

class SeederController extends Controller
{
    /**
     * Load seed data
     * date: 26-02-2026
     */
    public function loadSeedData(Request $request)
    {
        if ($request->has('identity') && $request->identity == 'techvillage-shop') {
            try {
                if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\VendorController@sendChangeOtp')->first()) {
                    $permissionId = Permission::insertGetId([
                        'name' => 'App\\Http\\Controllers\\Vendor\\VendorController@sendChangeOtp',
                        'controller_path' => 'App\\Http\\Controllers\\Vendor\\VendorController',
                        'controller_name' => 'VendorController',
                        'method_name' => 'sendChangeOtp',
                    ]);
                    PermissionRole::insert([
                        'permission_id' => $permissionId,
                        'role_id' => 2,
                    ]);
                }
        
                if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\VendorController@verifyChangeOtp')->first()) {
                    $permissionId = Permission::insertGetId([
                        'name' => 'App\\Http\\Controllers\\Vendor\\VendorController@verifyChangeOtp',
                        'controller_path' => 'App\\Http\\Controllers\\Vendor\\VendorController',
                        'controller_name' => 'VendorController',
                        'method_name' => 'verifyChangeOtp',
                    ]);
                    PermissionRole::insert([
                        'permission_id' => $permissionId,
                        'role_id' => 2,
                    ]);
                }
        
                if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\VendorController@resendChangeOtp')->first()) {
                    $permissionId = Permission::insertGetId([
                        'name' => 'App\\Http\\Controllers\\Vendor\\VendorController@resendChangeOtp',
                        'controller_path' => 'App\\Http\\Controllers\\Vendor\\VendorController',
                        'controller_name' => 'VendorController',
                        'method_name' => 'resendChangeOtp',
                    ]);
                    PermissionRole::insert([
                        'permission_id' => $permissionId,
                        'role_id' => 2,
                    ]);
                }

                MenuItems::addRouteOnParams('pos/setup', '3', 'vendor.pos.customer');
                MenuItems::addRouteOnParams('pos/setup', '6', 'vendor.pos.customer');
                MenuItems::where('link', 'dashboard')->whereIn('menu', [3, 6])->update(['params' => '{"permission":"App\\\\Http\\\\Controllers\\\\Vendor\\\\DashboardController@index","route_name":["vendor-dashboard"],"menu_level":"3"}']);

                if (Schema::hasColumn('products', 'channels')) {
                    $defaultChannels = json_encode(ProductChannel::allChannels());
                    DB::table('products')
                        ->whereNull('channels')
                        ->update(['channels' => $defaultChannels]);
                }

                (new \Database\Seeders\versions\v5_0_0\DatabaseSeeder())->run();

                MenuItems::where('link', 'account-setting')->where('menu', 1)->update(['params' => null, 'link' => null]);

                $menu = MenuItems::where(['link' => 'subscription', 'menu' => 6])->first();
                MenuItems::where('id', $menu->id)->update(['params' => '{"permission":"Modules\Subscription\Http\Controllers\Vendor\SubscriptionController@index","route_name":["vendor.subscription.index", "vendor.private-plan"]}']);
                if ($menu) {
                    addMenuItem('saas vendor', 'Plan', [
                        'link' => 'subscription',
                        'parent' => $menu->id,
                        'params' => '{"permission":"Modules\\\\Subscription\\\\Http\\\\Controllers\\\\Vendor\\\\SubscriptionController@index","route_name":["vendor.subscription.index", "vendor.private-plan"]}',
                        'sort' => 1,
                    ]);
    
                    addMenuItem('saas vendor', 'Invoice', [
                        'link' => 'subscription/history',
                        'parent' => $menu->id,
                        'params' => '{"permission":"Modules\\\\Subscription\\\\Http\\\\Controllers\\\\Vendor\\\\SubscriptionController@history","route_name":["vendor.subscription.history", "vendor.subscription.invoice"]}',
                        'sort' => 2,
                    ]);
                }

                $this->addDhakaDivisionCities();
                $this->addChittagongDivisionCities();

                Artisan::call('optimize:clear');
            } catch (\Exception $e) {
                return redirect()->back()->withFail($e->getMessage());
            }

            return redirect()->back()->withSuccess(__('Seed data successfully loaded.'));
        }

        return redirect()->back()->withFail(__('You are not allowed to load seed data.'));
    }

    
    public function addDhakaDivisionCities()
    {
        $division = Division::where('code', '81')->where('country_id', 93)->first();
        if ($division) {
            City::insert([
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Dhaka'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-1'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-2'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-3'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-4'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-5'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-6'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-7'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-8'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-9'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-10'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-11'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-12'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-13'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-14'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-15'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-16'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-17'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttara Sector-18'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Mirpur 1'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Mirpur 2'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Mirpur 6'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Mirpur 10'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Mirpur 11'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Mirpur 12'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Mirpur 13'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Mirpur 14'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Mirpur DOHS'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Pallabi'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Kafrul'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Cantonment'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Banani'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Gulshan'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Baridhara'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Badda'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Khilkhet'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Airport'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Kurmitola'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Mohammadpur'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Dhanmondi'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Kalabagan'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'New Market'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Lalbagh'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Azimpur'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Chawkbazar'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Bangshal'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Wari'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Sutrapur'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Kotwali'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Kamrangirchar'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Jatrabari'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Demra'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Shyampur'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Savar'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Ashulia'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Keraniganj'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Tongi'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Gazipur'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Narayanganj'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Tejgaon'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Tejgaon Industrial Area'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Farmgate'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Karwan Bazar'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Bijoy Sarani'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Mohakhali'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Niketon'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Rampura'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Banasree'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Aftabnagar'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Dakshinkhan'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Uttarkhan'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Bashtola'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Nakhalpara'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Ramna'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Shahbagh'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Mogbazar'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Malibagh'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Kakrail'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Paltan'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Motijheel'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Armanitola'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Hazaribagh'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Rayerbazar'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Jurain'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Gendaria'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Posta'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Dholai Khal'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Tikatuli'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Purbachal'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Rupganj'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Sonargaon'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Siddhirganj'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Kalyanpur'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Gabtoli'],
            ]);
        }
    }

    public function addChittagongDivisionCities()
    {
        $division = Division::where('code', '84')->where('country_id', 93)->first();
        if ($division) {
            City::insert([
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Agrabad'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Boropole'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Dewanhat'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Chowmuhani'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Double Mooring'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Nimtola'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Lalkhan Bazar'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Tiger Pass'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'WASA'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'GEC Circle'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Muradpur'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => '2 No Gate'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Sholo shahar'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Nasirabad'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Khulshi'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Khulshi Hills'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Katalganj'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Panchlaish'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Chawkbazar'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Anderkilla'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Kotwali'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Sadarghat'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Patharghata'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Jamal Khan'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Cheragi Pahar'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'New Market(Chattogram)'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Station Road'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'CRB'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Sholoshahar Railway Station Area'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Pahartali'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'CDA Avenue'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Oxygen Mor'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Bayezid Bostami'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Foy’s Lake'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Sholokbahar'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Kapasgola'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Chandgaon'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Bahaddarhat'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'OxygenMor'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Kaptai Rastar Matha'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Bakalia'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Kalurghat'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Arakan Road'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Raozan Road/Hathazari Road Area'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Halishahar'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'CEPZ'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Port Connecting Road'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Bandar (Port Area)'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Patenga'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Chattogram Airport Area'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Faujdarhat'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Kumira'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Sitakunda'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Baro Awlia'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Bhatiari'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Patiya'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Anwara'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Karnaphuli'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Boalkhali'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Rangunia'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Hathazari'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Raozan'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Fatikchhari'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Mirsharai'],
                ['country_id' => 93, 'division_id' => $division->id, 'name' => 'Sandwip (Ghat Area)'],
            ]);
        }
    }
}
