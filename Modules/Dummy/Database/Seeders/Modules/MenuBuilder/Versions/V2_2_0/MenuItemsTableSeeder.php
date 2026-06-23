<?php

namespace Modules\Dummy\Database\Seeders\Modules\MenuBuilder\Versions\V2_2_0;

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
        addMenuItem('admin', 'Custom Fields', [
            'parent' => 'Configurations',
            'link' => 'custom-fields',
            'sort' => 57,
            'params' => '{"permission":"App\\\\Http\\\\Controllers\\\\CustomFieldController@index", "route_name":["custom_fields.index", "custom_fields.create", "custom_fields.edit"], "menu_level":"1"}',
        ]);

        MenuItems::where('label', 'Custom Fields')->update(['label' => '{"en":"Custom Fields","bn":"কাস্টম ফিল্ডস","fr":"Champs personnalisés","zh":"自定义字段","ar":"حقول مخصصة","be":"Карыстальніцкія палі","bg":"Персонализирани полета","ca":"Camps personalitzats","et":"Kohandatud väljad","nl":"Aangepaste velden"}']);
    }
}
