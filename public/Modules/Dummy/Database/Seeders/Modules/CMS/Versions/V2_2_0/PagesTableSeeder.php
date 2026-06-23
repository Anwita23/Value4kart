<?php

namespace Modules\Dummy\Database\Seeders\Modules\CMS\Versions\V2_2_0;

use Illuminate\Database\Seeder;
use Modules\CMS\Entities\{
    Component, ComponentProperty, Page
};

class PagesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $dbPage = Page::where(['slug' => 'electronics'])->first();

        if (! $dbPage) {
            $pageId = Page::insertGetId([
                'name' => 'Electronics',
                'slug' => 'electronics',
                'css' => null,
                'description' => null,
                'meta_title' => null,
                'meta_description' => null,
                'status' => 'Active',
                'type' => 'home',
                'layout' => 'default',
                'vendor_id' => 1,
                'default' => 1,
            ]);

            $componentId = Component::insertGetId([
                'page_id' => $pageId,
                'layout_id' => 2,
                'level' => 1,
            ]);

            ComponentProperty::insert([
                [
                    'component_id' => $componentId,
                    'name' => 'title',
                    'type' => 'string',
                    'value' => 'Feature Product',
                ], [
                    'component_id' => $componentId,
                    'name' => 'see_more',
                    'type' => 'string',
                    'value' => '0',
                ], [
                    'component_id' => $componentId,
                    'name' => 'more_link',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'sidebar',
                    'type' => 'string',
                    'value' => '0',
                ], [
                    'component_id' => $componentId,
                    'name' => 'sidebar_position',
                    'type' => 'string',
                    'value' => 'left',
                ], [
                    'component_id' => $componentId,
                    'name' => 'showcase_type',
                    'type' => 'string',
                    'value' => 'queryProducts',
                ], [
                    'component_id' => $componentId,
                    'name' => 'row',
                    'type' => 'string',
                    'value' => '1',
                ], [
                    'component_id' => $componentId,
                    'name' => 'column',
                    'type' => 'string',
                    'value' => '5',
                ], [
                    'component_id' => $componentId,
                    'name' => 'total_products',
                    'type' => 'string',
                    'value' => '5',
                ], [
                    'component_id' => $componentId,
                    'name' => 'mt',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'mb',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'card_height',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'slide',
                    'type' => 'array',
                    'value' => '{"u_subtitle":"","l_subtitle":"","title":"","button":"","link":""}',
                ], [
                    'component_id' => $componentId,
                    'name' => 'slider',
                    'type' => 'array',
                    'value' => '[{"u_subtitle":"","l_subtitle":"","title":"","button_text":"","button_link":""}]',
                ], [
                    'component_id' => $componentId,
                    'name' => 'flash',
                    'type' => 'array',
                    'value' => '{"badge_text":""}',
                ], [
                    'component_id' => $componentId,
                    'name' => 'query',
                    'type' => 'array',
                    'value' => '[{"type":"where","column":"vendor","operation":"in","value":["1"]}]',
                ],
            ]);

            $componentId = Component::insertGetId([
                'page_id' => $pageId,
                'layout_id' => 4,
                'level' => 2,
            ]);

            ComponentProperty::insert([
                [
                    'component_id' => $componentId,
                    'name' => 'cta',
                    'type' => 'array',
                    'value' => '[{"upper_st":"<p style=\\"color: #fff;background: #ef233c;display: inline-block;padding: 2px 8px;border-radius: 5px;font-size: 12px;font-weight: bold;margin-bottom: 20px;\\">On Sale This Week<\\/p>","lower_st":"<span style=\\"font-size: 20px;\\">Stay Active and <br> Connected<\\/span>","title":"","image":"20240319\\\\31c1b66368166e8a196561ad96bffec5.png","btn_text":"Shop Now","btn_link":"' . url('/') . '/products\\/smart-bracelet-sports-bracelet-d13-color-screen-bracelet-sports-pedometer-bluetooth-reminder-heart-rate-blood-pressure"},{"upper_st":"<p style=\\"color: #fff;background: #ef233c;display: inline-block;padding: 2px 8px;border-radius: 5px;font-size: 12px;font-weight: bold;margin-bottom: 20px;\\">On Sale This Week<\\/p>","lower_st":"<span style=\\"font-size: 20px;\\">Enhanced Gaming <br> Experience <\\/span>","title":"","image":"20240319\\\\14a0cd1cb520e380c38bffca9329fec9.jpg","btn_text":"Shop Now","btn_link":"' . url('/') . '/products\\/wireless-game-controller-for-switch-pro-lite-olde-gamepad-joystick-for-pc-game-controller"},{"upper_st":"<p style=\\"color: #fff;background: #ef233c;display: inline-block;padding: 2px 8px;border-radius: 5px;font-size: 12px;font-weight: bold;margin-bottom: 20px;\\">On Sale This Week<\\/p>","lower_st":"<span style=\\"font-size: 20px;\\">Fast Charging <br> Data Cable<\\/span>","title":"","image":"20240319\\\\731ba00c478644c7b71124ff75fb1514.png","btn_text":"Show Now","btn_link":"' . url('/') . '/products\\/usb-type-c-cable-2-in-1-fast-charging-cord-data-sync-charger-line-speed-transfer"}]',
                ], [
                    'component_id' => $componentId,
                    'name' => 'full',
                    'type' => 'string',
                    'value' => '0',
                ], [
                    'component_id' => $componentId,
                    'name' => 'mt',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'mb',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'height',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'rounded',
                    'type' => 'string',
                    'value' => '0',
                ], [
                    'component_id' => $componentId,
                    'name' => 'full_link',
                    'type' => 'string',
                    'value' => '0',
                ],
            ]);

            $componentId = Component::insertGetId([
                'page_id' => $pageId,
                'layout_id' => 3,
                'level' => 3,
            ]);

            ComponentProperty::insert([
                [
                    'component_id' => $componentId,
                    'name' => 'title',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'disp_categories',
                    'type' => 'array',
                    'value' => '["popularProducts","bestSeller"]',
                ], [
                    'component_id' => $componentId,
                    'name' => 'row',
                    'type' => 'string',
                    'value' => '1',
                ], [
                    'component_id' => $componentId,
                    'name' => 'column',
                    'type' => 'string',
                    'value' => '3',
                ], [
                    'component_id' => $componentId,
                    'name' => 'max',
                    'type' => 'string',
                    'value' => '3',
                ], [
                    'component_id' => $componentId,
                    'name' => 'mt',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'mb',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'card_height',
                    'type' => 'string',
                    'value' => '',
                ],
            ]);

            $componentId = Component::insertGetId([
                'page_id' => $pageId,
                'layout_id' => 1,
                'level' => 4,
            ]);

            ComponentProperty::insert([
                [
                    'component_id' => $componentId,
                    'name' => 'title',
                    'type' => 'string',
                    'value' => 'Search And Order All Your Phone <br> Parts  In One Location ',
                ], [
                    'component_id' => $componentId,
                    'name' => 'upper_st',
                    'type' => 'string',
                    'value' => '<p class="text-lg font-medium text-gray-10 dm-sans" style="color: red; margin-bottom: 20px; ">On Sale This Week</p>',
                ], [
                    'component_id' => $componentId,
                    'name' => 'lower_st',
                    'type' => 'string',
                    'value' => '<p class="text-base dm-sans" style="color: #555; margin-top: 20px;">Plakrore maheten. Astronens ultranirad. Dod.</p>',
                ], [
                    'component_id' => $componentId,
                    'name' => 'btn_text',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'btn_link',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'image',
                    'type' => 'string',
                    'value' => '20240319\\2f882f24b944ab5cd7e5a303466ba0a2.jpg',
                ], [
                    'component_id' => $componentId,
                    'name' => 'full',
                    'type' => 'string',
                    'value' => '0',
                ], [
                    'component_id' => $componentId,
                    'name' => 'mt',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'mb',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'height',
                    'type' => 'string',
                    'value' => '250',
                ], [
                    'component_id' => $componentId,
                    'name' => 'rounded',
                    'type' => 'string',
                    'value' => '1',
                ], [
                    'component_id' => $componentId,
                    'name' => 'full_link',
                    'type' => 'string',
                    'value' => '0',
                ],
            ]);
        }

        $dbPage = Page::where(['slug' => 'furniture'])->first();

        if (! $dbPage) {
            $pageId = Page::insertGetId([
                'name' => 'Furniture',
                'slug' => 'furniture',
                'css' => null,
                'description' => null,
                'meta_title' => null,
                'meta_description' => null,
                'status' => 'Active',
                'type' => 'home',
                'layout' => 'default',
                'vendor_id' => 16,
                'default' => 1,
            ]);

            $componentId = Component::insertGetId([
                'page_id' => $pageId,
                'layout_id' => 4,
                'level' => 1,
            ]);

            ComponentProperty::insert([
                [
                    'component_id' => $componentId,
                    'name' => 'cta',
                    'type' => 'array',
                    'value' => '[{"upper_st":"SMALL & MINIMAL","lower_st":"<span style=\\"color: #FF693A\\">FURNITURE<\\/span> FOR ","title":"BOOKWORMS","image":"20240319\\\\dc65b5a163000b416d3e29baaf0e026e.webp","btn_text":"Shop Now","btn_link":"' . url('/') . '/search-products?categories=Home%20Appliances"},{"upper_st":"FANCY SOFAS","lower_st":"<span style=\\"color: #FF693A\\">LUXURIOUS<\\/span> ","title":"COMFORT","image":"20240319\\\\cba7b005cb23101f7eeafcb15c3b49f6.webp","btn_text":"Shop Now","btn_link":"' . url('/') . '/search-products?categories=Home%20Appliances"}]',
                ], [
                    'component_id' => $componentId,
                    'name' => 'full',
                    'type' => 'string',
                    'value' => '0',
                ], [
                    'component_id' => $componentId,
                    'name' => 'mt',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'mb',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'height',
                    'type' => 'string',
                    'value' => '284',
                ], [
                    'component_id' => $componentId,
                    'name' => 'rounded',
                    'type' => 'string',
                    'value' => '1',
                ], [
                    'component_id' => $componentId,
                    'name' => 'full_link',
                    'type' => 'string',
                    'value' => '0',
                ],
            ]);

            $componentId = Component::insertGetId([
                'page_id' => $pageId,
                'layout_id' => 2,
                'level' => 2,
            ]);

            ComponentProperty::insert([
                [
                    'component_id' => $componentId,
                    'name' => 'title',
                    'type' => 'string',
                    'value' => 'FEATURED PRODUCTS',
                ], [
                    'component_id' => $componentId,
                    'name' => 'see_more',
                    'type' => 'string',
                    'value' => '0',
                ], [
                    'component_id' => $componentId,
                    'name' => 'more_link',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'sidebar',
                    'type' => 'string',
                    'value' => '0',
                ], [
                    'component_id' => $componentId,
                    'name' => 'sidebar_position',
                    'type' => 'string',
                    'value' => 'left',
                ], [
                    'component_id' => $componentId,
                    'name' => 'showcase_type',
                    'type' => 'string',
                    'value' => 'queryProducts',
                ], [
                    'component_id' => $componentId,
                    'name' => 'row',
                    'type' => 'string',
                    'value' => '1',
                ], [
                    'component_id' => $componentId,
                    'name' => 'column',
                    'type' => 'string',
                    'value' => '4',
                ], [
                    'component_id' => $componentId,
                    'name' => 'total_products',
                    'type' => 'string',
                    'value' => '4',
                ], [
                    'component_id' => $componentId,
                    'name' => 'mt',
                    'type' => 'string',
                    'value' => '100px',
                ], [
                    'component_id' => $componentId,
                    'name' => 'mb',
                    'type' => 'string',
                    'value' => '0px',
                ], [
                    'component_id' => $componentId,
                    'name' => 'card_height',
                    'type' => 'string',
                    'value' => '270',
                ], [
                    'component_id' => $componentId,
                    'name' => 'slide',
                    'type' => 'array',
                    'value' => '{"u_subtitle":"","l_subtitle":"","title":"","button":"","link":""}',
                ], [
                    'component_id' => $componentId,
                    'name' => 'slider',
                    'type' => 'array',
                    'value' => '[{"u_subtitle":"","l_subtitle":"","title":"","button_text":"","button_link":""}]',
                ], [
                    'component_id' => $componentId,
                    'name' => 'flash',
                    'type' => 'array',
                    'value' => '{"badge_text":""}',
                ], [
                    'component_id' => $componentId,
                    'name' => 'query',
                    'type' => 'array',
                    'value' => '[{"type":"where","column":"tag","operation":"in","value":["55"]}]',
                ],
            ]);

            $componentId = Component::insertGetId([
                'page_id' => $pageId,
                'layout_id' => 4,
                'level' => 3,
            ]);

            ComponentProperty::insert([
                [
                    'component_id' => $componentId,
                    'name' => 'cta',
                    'type' => 'array',
                    'value' => '[{"upper_st":"NEW ARRIVALS","lower_st":"ALL ABOUT <span style=\\"color: #FF693A\\">MINIMAL<\\/span> ","title":"WOODS","image":"20240319\\\\1ce486fbf78225853056d8159a3d8648.webp","btn_text":"Visit Shop","btn_link":"' . url('/') . '/search-products?categories=Home%20Appliances"},{"upper_st":"LIGHTS","lower_st":"<span style=\\"color: #FF693A\\">BRIGHTEN<\\/span> YOUR ","title":"SWEET HOME","image":"20240319\\\\e3ebce6984437aee1fd4635b3733fc7f.webp","btn_text":"Visit Shop","btn_link":"' . url('/') . '/search-products?categories=Home%20Appliances"}]',
                ], [
                    'component_id' => $componentId,
                    'name' => 'full',
                    'type' => 'string',
                    'value' => '0',
                ], [
                    'component_id' => $componentId,
                    'name' => 'mt',
                    'type' => 'string',
                    'value' => '60px',
                ], [
                    'component_id' => $componentId,
                    'name' => 'mb',
                    'type' => 'string',
                    'value' => '0px',
                ], [
                    'component_id' => $componentId,
                    'name' => 'height',
                    'type' => 'string',
                    'value' => '250',
                ], [
                    'component_id' => $componentId,
                    'name' => 'rounded',
                    'type' => 'string',
                    'value' => '1',
                ], [
                    'component_id' => $componentId,
                    'name' => 'full_link',
                    'type' => 'string',
                    'value' => '0',
                ],
            ]);

            $componentId = Component::insertGetId([
                'page_id' => $pageId,
                'layout_id' => 2,
                'level' => 4,
            ]);

            ComponentProperty::insert([
                [
                    'component_id' => $componentId,
                    'name' => 'title',
                    'type' => 'string',
                    'value' => 'EXCLUSIVE PRODUCT',
                ], [
                    'component_id' => $componentId,
                    'name' => 'see_more',
                    'type' => 'string',
                    'value' => '0',
                ], [
                    'component_id' => $componentId,
                    'name' => 'more_link',
                    'type' => 'string',
                    'value' => '',
                ], [
                    'component_id' => $componentId,
                    'name' => 'sidebar',
                    'type' => 'string',
                    'value' => '0',
                ], [
                    'component_id' => $componentId,
                    'name' => 'sidebar_position',
                    'type' => 'string',
                    'value' => 'left',
                ], [
                    'component_id' => $componentId,
                    'name' => 'showcase_type',
                    'type' => 'string',
                    'value' => 'queryProducts',
                ], [
                    'component_id' => $componentId,
                    'name' => 'row',
                    'type' => 'string',
                    'value' => '2',
                ], [
                    'component_id' => $componentId,
                    'name' => 'column',
                    'type' => 'string',
                    'value' => '3',
                ], [
                    'component_id' => $componentId,
                    'name' => 'total_products',
                    'type' => 'string',
                    'value' => '6',
                ], [
                    'component_id' => $componentId,
                    'name' => 'mt',
                    'type' => 'string',
                    'value' => '94px',
                ], [
                    'component_id' => $componentId,
                    'name' => 'mb',
                    'type' => 'string',
                    'value' => '0px',
                ], [
                    'component_id' => $componentId,
                    'name' => 'card_height',
                    'type' => 'string',
                    'value' => '363',
                ], [
                    'component_id' => $componentId,
                    'name' => 'slide',
                    'type' => 'array',
                    'value' => '{"u_subtitle":"","l_subtitle":"","title":"","button":"","link":""}',
                ], [
                    'component_id' => $componentId,
                    'name' => 'slider',
                    'type' => 'array',
                    'value' => '[{"u_subtitle":"","l_subtitle":"","title":"","button_text":"","button_link":""}]',
                ], [
                    'component_id' => $componentId,
                    'name' => 'flash',
                    'type' => 'array',
                    'value' => '{"badge_text":""}',
                ], [
                    'component_id' => $componentId,
                    'name' => 'query',
                    'type' => 'array',
                    'value' => '[{"type":"where","column":"tag","operation":"in","value":["55"]}]',
                ],
            ]);
        }

    }
}
