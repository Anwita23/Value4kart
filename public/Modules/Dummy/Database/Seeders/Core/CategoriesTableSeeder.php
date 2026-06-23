<?php

namespace Modules\Dummy\Database\Seeders\Core;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('categories')->delete();

        \DB::table('categories')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => '{ "en": "Uncategorized", "bn": "শ্রেণীবদ্ধ নয়", "fr": "Non catégorisé", "zh": "未分类", "ar": "غير مصنف", "be": "Некатэгарызаваны", "bg": "Некатегоризирано", "ca": "Sense categoria", "et": "Kategooriata", "nl": "Niet gecategoriseerd" }',
                    'slug' => '{ "en": "uncategorized", "bn": "শ্রেণীবদ্ধ-নয়", "fr": "non-catégorisé", "zh": "未分类", "ar": "غير-مصنف", "be": "некатэгарызаваны", "bg": "некатегоризирано", "ca": "sense-categoria", "et": "kategooriata", "nl": "niet-gecategoriseerd" }',
                    'parent_id' => NULL,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 46,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            1 =>
                array (
                    'id' => 38,
                    'name' => '{ "en": "Electronic Devices", "bn": "ইলেকট্রনিক ডিভাইস", "fr": "Appareils électroniques", "zh": "电子设备", "ar": "الأجهزة الإلكترونية", "be": "Электронныя прылады", "bg": "Електронни устройства", "ca": "Dispositius electrònics", "et": "Elektroonikaseadmed", "nl": "Elektronische apparaten" }',
                    'slug' => '{ "en": "electronic-devices", "bn": "ইলেকট্রনিক-ডিভাইস", "fr": "appareils-électroniques", "zh": "电子设备", "ar": "الأجهزة-الإلكترونية", "be": "электронныя-прылады", "bg": "електронни-устройства", "ca": "dispositius-electrònics", "et": "elektroonikaseadmed", "nl": "elektronische-apparaten" }',
                    'parent_id' => NULL,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 3,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            2 =>
                array (
                    'id' => 39,
                    'name' => '{ "en": "Electronic Accessories", "bn": "ইলেকট্রনিক আনুষঙ্গিক", "fr": "Accessoires électroniques", "zh": "电子配件", "ar": "ملحقات إلكترونية", "be": "Электронныя аксэсуары", "bg": "Електронни аксесоари", "ca": "Accessoris electrònics", "et": "Elektroonikatarvikud", "nl": "Elektronische accessoires" }',
                    'slug' => '{ "en": "electronic-accessories", "bn": "ইলেকট্রনিক-আনুষঙ্গিক", "fr": "accessoires-électroniques", "zh": "电子配件", "ar": "ملحقات-إلكترونية", "be": "электронныя-аксэсуары", "bg": "електронни-аксесоари", "ca": "accessoris-electrònics", "et": "elektroonikatarvikud", "nl": "elektronische-accessoires" }',
                    'parent_id' => NULL,
                    'order_by' => 7,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 9,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            3 =>
                array (
                    'id' => 41,
                    'name' => '{ "en": "Health & Beauty", "bn": "স্বাস্থ্য ও সৌন্দর্য", "fr": "Santé et beauté", "zh": "健康与美容", "ar": "الصحة والجمال", "be": "Здароўе і прыгажосць", "bg": "Здраве и красота", "ca": "Salut i bellesa", "et": "Tervis ja ilu", "nl": "Gezondheid en schoonheid" }',
                    'slug' => '{ "en": "health-beauty", "bn": "স্বাস্থ্য-ও-সৌন্দর্য", "fr": "santé-et-beauté", "zh": "健康与美容", "ar": "الصحة-والجمال", "be": "здароўе-і-прыгажосць", "bg": "здраве-и-красота", "ca": "salut-i-bellesa", "et": "tervis-ja-ilu", "nl": "gezondheid-en-schoonheid" }',
                    'parent_id' => NULL,
                    'order_by' => 9,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            4 =>
                array (
                    'id' => 42,
                    'name' => '{ "en": "Babies & Toys", "bn": "শিশু ও খেলনা", "fr": "Bébés et jouets", "zh": "婴儿与玩具", "ar": "الأطفال والألعاب", "be": "Дзеці і цацкі", "bg": "Бебета и играчки", "ca": "Nadons i joguines", "et": "Beebid ja mänguasjad", "nl": "Baby\'s en speelgoed" }',
                    'slug' => '{ "en": "babies-toys", "bn": "শিশু-ও-খেলনা", "fr": "bébés-et-jouets", "zh": "婴儿与玩具", "ar": "الأطفال-والألعاب", "be": "дзеці-і-цацкі", "bg": "бебета-и-играчки", "ca": "nadons-i-joguines", "et": "beebid-ja-mänguasjad", "nl": "baby\'s-en-speelgoed" }',
                    'parent_id' => NULL,
                    'order_by' => 10,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 1,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            5 =>
                array (
                    'id' => 46,
                    'name' => '{ "en": "Fashion", "bn": "ফ্যাশন", "fr": "Mode", "zh": "时尚", "ar": "أزياء", "be": "Мода", "bg": "Мода", "ca": "Moda", "et": "Moekunst", "nl": "Mode" }',
                    'slug' => '{ "en": "fashion", "bn": "ফ্যাশন", "fr": "mode", "zh": "时尚", "ar": "أزياء", "be": "мода", "bg": "мода", "ca": "moda", "et": "moekunst", "nl": "mode" }',
                    'parent_id' => NULL,
                    'order_by' => 14,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 8,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            6 =>
                array (
                    'id' => 47,
                    'name' => '{ "en": "Watches & Accessories", "bn": "ঘড়ি ও সাজেসহ", "fr": "Montres et accessoires", "zh": "手表与配饰", "ar": "الساعات والاكسسوارات", "be": "Гадзіны і аксэсуары", "bg": "Часовници и аксесоари", "ca": "Relojes i accessoris", "et": "Kellad ja tarvikud", "nl": "Horloges en accessoires" }',
                    'slug' => '{ "en": "watches-accessories", "bn": "ঘড়ি-ও-সাজেসহ", "fr": "montres-et-accessoires", "zh": "手表与配饰", "ar": "الساعات-والاكسسوارات", "be": "гадзіны-і-аксэсуары", "bg": "часовници-и-аксесоари", "ca": "relojes-i-accessoris", "et": "kellad-ja-tarvikud", "nl": "horloges-en-accessoires" }',
                    'parent_id' => NULL,
                    'order_by' => 15,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            7 =>
                array (
                    'id' => 48,
                    'name' => '{ "en": "Sports & Outdoor", "bn": "খেলা ও আউটডোর", "fr": "Sports et plein air", "zh": "运动与户外", "ar": "الرياضة والهواء الطلق", "be": "Спорт і на прыродзе", "bg": "Спорт и на открито", "ca": "Esports i a l\'aire lliure", "et": "Sport ja vabaõhk", "nl": "Sport & Outdoor" }',
                    'slug' => '{ "en": "sports-outdoor", "bn": "খেলা-ও-আউটডোর", "fr": "sports-et-plein-air", "zh": "运动与户外", "ar": "الرياضة-والهواء-الطلق", "be": "спорт-і-на-прыродзе", "bg": "спорт-и-на-открито", "ca": "esports-i-a-l\'aire-lliure", "et": "sport-ja-vabaõhk", "nl": "sport-outdoor" }',
                    'parent_id' => NULL,
                    'order_by' => 16,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            8 =>
                array (
                    'id' => 49,
                    'name' => '{ "en": "Automotive & Motorbike", "bn": "অটোমোটিভ ও মোটরসাইকেল", "fr": "Automobile et moto", "zh": "汽车与摩托车", "ar": "السيارات والدراجات النارية", "be": "Аўтамабіль і мотацыкл", "bg": "Автомобил и мотор", "ca": "Automoció i motocicleta", "et": "Autotööstus ja mootorratas", "nl": "Auto\'s & Motorfietsen" }',
                    'slug' => '{ "en": "automotive-motorbike", "bn": "অটোমোটিভ-ও-মোটরসাইকেল", "fr": "automobile-et-moto", "zh": "汽车与摩托车", "ar": "السيارات-والدراجات-النارية", "be": "аўтамабіль-і-мотацыкл", "bg": "автомобил-и-мотор", "ca": "automoció-i-motocicleta", "et": "autotööstus-ja-mootorratas", "nl": "auto\'s-motorfietsen" }',
                    'parent_id' => NULL,
                    'order_by' => 17,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            9 =>
                array (
                    'id' => 50,
                    'name' => '{ "en": "Smartphones", "bn": "স্মার্টফোন", "fr": "Smartphones", "zh": "智能手机", "ar": "الهواتف الذكية", "be": "Смартфоны", "bg": "Смартфони", "ca": "Smartphones", "et": "Nutitelefonid", "nl": "Smartphones" }',
                    'slug' => '{ "en": "smartphones", "bn": "স্মার্টফোন", "fr": "smartphones", "zh": "智能手机", "ar": "الهواتف-الذكية", "be": "смартфоны", "bg": "смартфони", "ca": "smartphones", "et": "nutitelefonid", "nl": "smartphones" }',
                    'parent_id' => 38,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            10 =>
                array (
                    'id' => 51,
                    'name' => '{ "en": "Feature Phone", "bn": "বৈশিষ্ট্য ফোন", "fr": "Téléphone à fonctions", "zh": "功能手机", "ar": "هاتف بميزات محددة", "be": "Тэлефон з асаблівасцямі", "bg": "Телефон с функции", "ca": "Telèfon amb funcions", "et": "Omadustelefon", "nl": "Toestel met functies" }',
                    'slug' => '{ "en": "feature-phone", "bn": "বৈশিষ্ট্য-ফোন", "fr": "téléphone-à-fonctions", "zh": "功能手机", "ar": "هاتف-بميزات-محددة", "be": "тэлефон-з-асаблівасцямі", "bg": "телефон-с-функции", "ca": "telèfon-amb-funcions", "et": "omadustelefon", "nl": "toestel-met-functies" }',
                    'parent_id' => 38,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            11 =>
                array (
                    'id' => 53,
                    'name' => '{ "en": "Laptops", "bn": "ল্যাপটপ", "fr": "Ordinateurs portables", "zh": "笔记本电脑", "ar": "أجهزة الكمبيوتر المحمولة", "be": "Ноутбуки", "bg": "Лаптопи", "ca": "Portàtils", "et": "Sülearvutid", "nl": "Laptops" }',
                    'slug' => '{ "en": "laptops", "bn": "ল্যাপটপ", "fr": "ordinateurs-portables", "zh": "笔记本电脑", "ar": "أجهزة-الكمبيوتر-المحمولة", "be": "ноутбуки", "bg": "лаптопи", "ca": "portàtils", "et": "sülearvutid", "nl": "laptops" }',
                    'parent_id' => 38,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            12 =>
                array (
                    'id' => 56,
                    'name' => '{ "en": "Cameras", "bn": "ক্যামেরা", "fr": "Caméras", "zh": "相机", "ar": "الكاميرات", "be": "Камеры", "bg": "Камери", "ca": "Càmeres", "et": "Kaamerad", "nl": "Camera\'s" }',
                    'slug' => '{ "en": "cameras", "bn": "ক্যামেরা", "fr": "caméras", "zh": "相机", "ar": "الكاميرات", "be": "камеры", "bg": "камери", "ca": "càmeres", "et": "kaamerad", "nl": "camera\'s" }',
                    'parent_id' => 38,
                    'order_by' => 7,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            13 =>
                array (
                    'id' => 57,
                    'name' => '{ "en": "Security Cameras", "bn": "নিরাপত্তা ক্যামেরা", "fr": "Caméras de sécurité", "zh": "安全摄像头", "ar": "كاميرات الأمان", "be": "Бяспечныя камеры", "bg": "Охранителни камери", "ca": "Càmeres de seguretat", "et": "Turvakaamerad", "nl": "Beveiligingscamera\'s" }',
                    'slug' => '{ "en": "security-cameras", "bn": "নিরাপত্তা-ক্যামেরা", "fr": "caméras-de-sécurité", "zh": "安全摄像头", "ar": "كاميرات-الأمان", "be": "бяспечныя-камеры", "bg": "охранителни-камери", "ca": "càmeres-de-seguretat", "et": "turvakaamerad", "nl": "beveiligingscamera\'s" }',
                    'parent_id' => 38,
                    'order_by' => 8,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            14 =>
                array (
                    'id' => 58,
                    'name' => '{ "en": "Mobile Accessories", "bn": "মোবাইল সাজেসহ", "fr": "Accessoires pour mobiles", "zh": "手机配件", "ar": "إكسسوارات الهاتف المحمول", "be": "Аксэсуары для мабільных", "bg": "Аксесоари за мобилни устройства", "ca": "Accessoris per a mòbils", "et": "Mobiilseadmete tarvikud", "nl": "Mobiele accessoires" }',
                    'slug' => '{ "en": "mobile-accessories", "bn": "মোবাইল-সাজেসহ", "fr": "accessoires-pour-mobiles", "zh": "手机配件", "ar": "إكسسوارات-الهاتف-المحمول", "be": "аксэсуары-для-мабільных", "bg": "аксесоари-за-мобилни-устройства", "ca": "accessoris-per-a-mòbils", "et": "mobiilseadmete-tarvikud", "nl": "mobiele-accessoires" }',
                    'parent_id' => 39,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 2,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            15 =>
                array (
                    'id' => 59,
                    'name' => '{ "en": "Audio", "bn": "অডিও", "fr": "Audio", "zh": "音频", "ar": "الصوت", "be": "Аўдыё", "bg": "Аудио", "ca": "Àudio", "et": "Heli", "nl": "Audio" }',
                    'slug' => '{ "en": "audio", "bn": "অডিও", "fr": "audio", "zh": "音频", "ar": "الصوت", "be": "аўдыё", "bg": "аудио", "ca": "àudio", "et": "heli", "nl": "audio" }',
                    'parent_id' => 39,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            16 =>
                array (
                    'id' => 60,
                    'name' => '{ "en": "Wearable", "bn": "পরিধানযোগ্য", "fr": "Portables", "zh": "可穿戴设备", "ar": "ملابس", "be": "Носімыя", "bg": "Носими", "ca": "Portables", "et": "Kantavad", "nl": "Draagbaar" }',
                    'slug' => '{ "en": "wearable", "bn": "পরিধানযোগ্য", "fr": "portables", "zh": "可穿戴设备", "ar": "ملابس", "be": "носімыя", "bg": "носими", "ca": "portables", "et": "kantavad", "nl": "draagbaar" }',
                    'parent_id' => 39,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            17 =>
                array (
                    'id' => 61,
                    'name' => '{ "en": "Console Accessories", "bn": "কনসোল সাজেসহ", "fr": "Accessoires de console", "zh": "游戏机配件", "ar": "ملحقات الجهاز", "be": "Аксэсуары для кансоляў", "bg": "Аксесоари за конзоли", "ca": "Accessoris de consola", "et": "Konsooli tarvikud", "nl": "Console accessoires" }',
                    'slug' => '{ "en": "console-accessories", "bn": "কনসোল-সাজেসহ", "fr": "accessoires-de-console", "zh": "游戏机配件", "ar": "ملحقات-الجهاز", "be": "аксэсуары-для-кансоляў", "bg": "аксесоари-за-конзоли", "ca": "accessoris-de-consola", "et": "konsooli-tarvikud", "nl": "console-accessoires" }',
                    'parent_id' => 39,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            18 =>
                array (
                    'id' => 62,
                    'name' => '{ "en": "Camera Accessories", "bn": "ক্যামেরা সাজেসহ", "fr": "Accessoires d\'appareil photo", "zh": "相机配件", "ar": "ملحقات الكاميرا", "be": "Аксэсуары для камер", "bg": "Аксесоари за камери", "ca": "Accessoris de càmera", "et": "Kaamera tarvikud", "nl": "Camera-accessoires" }',
                    'slug' => '{ "en": "camera-accessories", "bn": "ক্যামেরা-সাজেসহ", "fr": "accessoires-d\'appareil-photo", "zh": "相机配件", "ar": "ملحقات-الكاميرا", "be": "аксэсуары-для-камер", "bg": "аксесоари-за-камери", "ca": "accessoris-de-càmera", "et": "kaamera-tarvikud", "nl": "camera-accessoires" }',
                    'parent_id' => 39,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            19 =>
                array (
                    'id' => 63,
                    'name' => '{ "en": "Computer Accessories", "bn": "কম্পিউটার সাজেসহ", "fr": "Accessoires informatiques", "zh": "电脑配件", "ar": "ملحقات الكمبيوتر", "be": "Аксэсуары для кампутараў", "bg": "Аксесоари за компютри", "ca": "Accessoris informàtics", "et": "Arvuti tarvikud", "nl": "Computeraccessoires" }',
                    'slug' => '{ "en": "computer-accessories", "bn": "কম্পিউটার-সাজেসহ", "fr": "accessoires-informatiques", "zh": "电脑配件", "ar": "ملحقات-الكمبيوتر", "be": "аксэсуары-для-кампутараў", "bg": "аксесоари-за-компютри", "ca": "accessoris-informàtics", "et": "arvuti-tarvikud", "nl": "computeraccessoires" }',
                    'parent_id' => 39,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 1,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            20 =>
                array (
                    'id' => 64,
                    'name' => '{ "en": "Storage", "bn": "সংরক্ষণ", "fr": "Stockage", "zh": "存储", "ar": "تخزين", "be": "Запіс", "bg": "Съхранение", "ca": "Emmagatzematge", "et": "Säilitamine", "nl": "Opslag" }',
                    'slug' => '{ "en": "storage", "bn": "সংরক্ষণ", "fr": "stockage", "zh": "存储", "ar": "تخزين", "be": "запіс", "bg": "съхранение", "ca": "emmagatzematge", "et": "säilitamine", "nl": "opslag" }',
                    'parent_id' => 39,
                    'order_by' => 7,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            21 =>
                array (
                    'id' => 65,
                    'name' => '{ "en": "Printer", "bn": "প্রিন্টার", "fr": "Imprimante", "zh": "打印机", "ar": "طابعة", "be": "Принц", "bg": "Принтер", "ca": "Impressora", "et": "Printer", "nl": "Printer" }',
                    'slug' => '{ "en": "printer", "bn": "প্রিন্টার", "fr": "imprimante", "zh": "打印机", "ar": "طابعة", "be": "принц", "bg": "принтер", "ca": "impressora", "et": "printer", "nl": "printer" }',
                    'parent_id' => 39,
                    'order_by' => 8,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            22 =>
                array (
                    'id' => 66,
                    'name' => '{ "en": "Computer Components", "bn": "কম্পিউটার উপাদান", "fr": "Composants informatiques", "zh": "计算机组件", "ar": "مكونات الكمبيوتر", "be": "Камп’ютарныя кампаненты", "bg": "Компютърни компоненти", "ca": "Components informàtics", "et": "Arvutikomponendid", "nl": "Computeronderdelen" }',
                    'slug' => '{ "en": "computer-components", "bn": "কম্পিউটার-উপাদান", "fr": "composants-informatiques", "zh": "计算机组件", "ar": "مكونات-الكمبيوتر", "be": "камп’ютарныя-кампаненты", "bg": "компютърни-компоненти", "ca": "components-informàtics", "et": "arvutikomponendid", "nl": "computeronderdelen" }',
                    'parent_id' => 39,
                    'order_by' => 9,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            23 =>
                array (
                    'id' => 67,
                    'name' => '{ "en": "Network Components", "bn": "নেটওয়ার্ক উপাদান", "fr": "Composants réseau", "zh": "网络组件", "ar": "مكونات الشبكة", "be": "Сеткавыя кампаненты", "bg": "Мрежови компоненти", "ca": "Components de xarxa", "et": "Võrgukomponendid", "nl": "Netwerkcomponenten" }',
                    'slug' => '{ "en": "network-components", "bn": "নেটওয়ার্ক-উপাদান", "fr": "composants-réseau", "zh": "网络组件", "ar": "مكونات-الشبكة", "be": "сеткавыя-кампаненты", "bg": "мрежови-компоненти", "ca": "components-de-xarxa", "et": "võrgukomponendid", "nl": "netwerkcomponenten" }',
                    'parent_id' => 39,
                    'order_by' => 10,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            24 =>
                array (
                    'id' => 68,
                    'name' => '{ "en": "Software", "bn": "সফটওয়্যার", "fr": "Logiciel", "zh": "软件", "ar": "البرمجيات", "be": "Праграмнае забеспячэнне", "bg": "Софтуер", "ca": "Programari", "et": "Tarkvara", "nl": "Software" }',
                    'slug' => '{ "en": "software", "bn": "সফটওয়্যার", "fr": "logiciel", "zh": "软件", "ar": "البرمجيات", "be": "праграмнае-забеспячэнне", "bg": "софтуер", "ca": "programari", "et": "tarkvara", "nl": "software" }',
                    'parent_id' => 39,
                    'order_by' => 11,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            25 =>
                array (
                    'id' => 79,
                    'name' => '{ "en": "bath-body", "bn": "স্নান-ও-শরীর", "fr": "bain-et-corps", "zh": "沐浴与身体", "ar": "الحمام-والجسم", "be": "ванна-і-цела", "bg": "баня-и-тяло", "ca": "bany-i-cos", "et": "vann-ja-keha", "nl": "bad-lichaam" }',
                    'slug' => '{ "en": "Bath & Body", "bn": "স্নান ও শরীর", "fr": "Bain et corps", "zh": "沐浴与身体", "ar": "الحمام والجسم", "be": "Ванна і цела", "bg": "Баня и тяло", "ca": "Bany i cos", "et": "Vann ja keha", "nl": "Bad & Lichaam" }',
                    'parent_id' => 41,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            26 =>
                array (
                    'id' => 80,
                    'name' => '{ "en": "Beauty Tools", "bn": "সৌন্দর্য সরঞ্জাম", "fr": "Outils de beauté", "zh": "美容工具", "ar": "أدوات التجميل", "be": "Інструменты прыгажосці", "bg": "Инструменти за красота", "ca": "Eines de bellesa", "et": "Ilu tööriistad", "nl": "Schoonheidstools" }',
                    'slug' => '{ "en": "beauty-tools", "bn": "সৌন্দর্য-সরঞ্জাম", "fr": "outils-de-beauté", "zh": "美容工具", "ar": "أدوات-التجميل", "be": "інструменты-прыгажосці", "bg": "инструменти-за-красота", "ca": "eines-de-bellesa", "et": "ilu-tööriistad", "nl": "schoonheidstools" }',
                    'parent_id' => 41,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            27 =>
                array (
                    'id' => 81,
                    'name' => '{ "en": "Fragrances", "bn": "সুগন্ধি", "fr": "Parfums", "zh": "香水", "ar": "العطور", "be": "Араматы", "bg": "Парфюми", "ca": "Fragàncies", "et": "Lõhnaained", "nl": "Geuren" }',
                    'slug' => '{ "en": "fragrances", "bn": "সুগন্ধি", "fr": "parfums", "zh": "香水", "ar": "العطور", "be": "араматы", "bg": "парфюми", "ca": "fragàncies", "et": "lõhnaained", "nl": "geuren" }',
                    'parent_id' => 41,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            28 =>
                array (
                    'id' => 82,
                    'name' => '{ "en": "Hair Care", "bn": "চুলের যত্ন", "fr": "Soins des cheveux", "zh": "护发", "ar": "العناية بالشعر", "be": "Догляд за валасамі", "bg": "Грижа за косата", "ca": "Cura del cabell", "et": "Juuksehooldus", "nl": "Haarverzorging" }',
                    'slug' => '{ "en": "hair-care", "bn": "চুলের-যত্ন", "fr": "soins-des-cheveux", "zh": "护发", "ar": "العناية-بالشعر", "be": "догляд-за-валасамі", "bg": "грижа-за-косата", "ca": "cura-del-cabell", "et": "juuksehooldus", "nl": "haarverzorging" }',
                    'parent_id' => 41,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            29 =>
                array (
                    'id' => 84,
                    'name' => '{ "en": "Men\'s Care", "bn": "পুরুষদের যত্ন", "fr": "Soins pour hommes", "zh": "男士护理", "ar": "عناية الرجال", "be": "Догляд за мужчынамі", "bg": "Грижа за мъже", "ca": "Cura per a homes", "et": "Meeste hooldus", "nl": "Mannenverzorging" }',
                    'slug' => '{ "en": "men\'s-care", "bn": "পুরুষদের-যত্ন", "fr": "soins-pour-hommes", "zh": "男士护理", "ar": "عناية-الرجال", "be": "догляд-за-мужчынамі", "bg": "грижа-за-мъже", "ca": "cura-per-a-homes", "et": "meeste-hooldus", "nl": "mannenverzorging" }',
                    'parent_id' => 41,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            30 =>
                array (
                    'id' => 85,
                    'name' => '{ "en": "Personal Care", "bn": "ব্যক্তিগত যত্ন", "fr": "Soins personnels", "zh": "个人护理", "ar": "العناية الشخصية", "be": "Асабісты догляд", "bg": "Лична грижа", "ca": "Cura personal", "et": "Isiklik hooldus", "nl": "Persoonlijke verzorging" }',
                    'slug' => '{ "en": "personal-care", "bn": "ব্যক্তিগত-যত্ন", "fr": "soins-personnels", "zh": "个人护理", "ar": "العناية-الشخصية", "be": "асабісты-догляд", "bg": "лична-грижа", "ca": "cura-personal", "et": "isiklik-hooldus", "nl": "persoonlijke-verzorging" }',
                    'parent_id' => 41,
                    'order_by' => 7,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            31 =>
                array (
                    'id' => 86,
                    'name' => '{ "en": "Skin Care", "bn": "ত্বকের যত্ন", "fr": "Soins de la peau", "zh": "护肤", "ar": "العناية بالبشرة", "be": "Догляд за скурай", "bg": "Грижа за кожата", "ca": "Cura de la pell", "et": "Nahahooldus", "nl": "Huidverzorging" }',
                    'slug' => '{ "en": "skin-care", "bn": "ত্বকের-যত্ন", "fr": "soins-de-la-peau", "zh": "护肤", "ar": "العناية-بالبشرة", "be": "догляд-за-скурай", "bg": "грижа-за-кожата", "ca": "cura-de-la-pell", "et": "nahahooldus", "nl": "huidverzorging" }',
                    'parent_id' => 41,
                    'order_by' => 8,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            32 =>
                array (
                    'id' => 87,
                    'name' => '{ "en": "Food Supplements", "bn": "খাদ্য সাপ্লিমেন্টস", "fr": "Compléments alimentaires", "zh": "食品补充剂", "ar": "المكملات الغذائية", "be": "Ежа-дапаўненьні", "bg": "Хранителни добавки", "ca": "Suplements alimentaris", "et": "Toitainete lisandid", "nl": "Voedingssupplementen" }',
                    'slug' => '{ "en": "food-supplements", "bn": "খাদ্য-সাপ্লিমেন্টস", "fr": "compléments-alimentaires", "zh": "食品补充剂", "ar": "المكملات-الغذائية", "be": "ежа-дапаўненьні", "bg": "хранителни-добавки", "ca": "suplements-alimentaris", "et": "toitainete-lisandid", "nl": "voedingssupplementen" }',
                    'parent_id' => 41,
                    'order_by' => 9,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            33 =>
                array (
                    'id' => 88,
                    'name' => '{ "en": "Medical Supplies", "bn": "চিকিৎসা সরঞ্জাম", "fr": "Fournitures médicales", "zh": "医疗用品", "ar": "اللوازم الطبية", "be": "Медыцынскія прылады", "bg": "Медицински материали", "ca": "Subministraments mèdics", "et": "Meditsiinivarustus", "nl": "Medische benodigdheden" }',
                    'slug' => '{ "en": "medical-supplies", "bn": "চিকিৎসা-সরঞ্জাম", "fr": "fournitures-médicales", "zh": "医疗用品", "ar": "اللوازم-الطبية", "be": "медыцынскія-прылады", "bg": "медицински-материали", "ca": "subministraments-mèdics", "et": "meditsiinivarustus", "nl": "medische-benodigdheden" }',
                    'parent_id' => 41,
                    'order_by' => 10,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            34 =>
                array (
                    'id' => 91,
                    'name' => '{ "en": "Feeding", "bn": "খাবার", "fr": "Nourrir", "zh": "喂养", "ar": "تغذية", "be": "Кармленне", "bg": "Хранене", "ca": "Alimentació", "et": "Toitmine", "nl": "Voeding" }',
                    'slug' => '{ "en": "feeding", "bn": "খাবার", "fr": "nourrir", "zh": "喂养", "ar": "تغذية", "be": "кармленне", "bg": "хранене", "ca": "alimentació", "et": "toitmine", "nl": "voeding" }',
                    'parent_id' => 42,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            35 =>
                array (
                    'id' => 92,
                    'name' => '{ "en": "Diapering & Potty", "bn": "ডায়াপার পরিচ্ছদ ও পটি", "fr": "Change et pot", "zh": "尿布和便盆", "ar": "تغيير الحفاضات والإنتقال إلى الحمام", "be": "Пеленальныя прадметы і горшак", "bg": "Подмяна на пелени и чинел", "ca": "Canvi de bolquers i orinal", "et": "Mähkimine ja potitamine", "nl": "Verschonen & Potje" }',
                    'slug' => '{ "en": "diapering-potty", "bn": "ডায়াপার-পরিচ্ছদ-ও-পটি", "fr": "change-et-pot", "zh": "尿布和便盆", "ar": "تغيير-الحفاضات-والإنتقال-إلى-الحمام", "be": "пеленальныя-прадметы-і-горшак", "bg": "подмяна-на-пелени-и-чинел", "ca": "canvi-de-bolquers-i-orinal", "et": "mähkimine-ja-potitamine", "nl": "verschonen-potje" }',
                    'parent_id' => 42,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            36 =>
                array (
                    'id' => 93,
                    'name' => '{ "en": "Baby Gear", "bn": "শিশু যন্ত্রপাতি", "fr": "Équipement pour bébé", "zh": "婴儿用品", "ar": "معدات الأطفال", "be": "Дзіцячыя прылады", "bg": "Бебешки облекла", "ca": "Equipament per a nadons", "et": "Beebi varustus", "nl": "Babyuitrusting" }',
                    'slug' => '{ "en": "baby-gear", "bn": "শিশু-যন্ত্রপাতি", "fr": "équipement-pour-bébé", "zh": "婴儿用品", "ar": "معدات-الأطفال", "be": "дзіцячыя-прылады", "bg": "бебешки-облекла", "ca": "equipament-per-a-nadons", "et": "beebi-varustus", "nl": "babyuitrusting" }',
                    'parent_id' => 42,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            37 =>
                array (
                    'id' => 94,
                    'name' => '{ "en": "Baby Personal Care", "bn": "শিশুর ব্যক্তিগত যত্ন", "fr": "Soins personnels pour bébé", "zh": "婴儿个人护理", "ar": "العناية الشخصية للطفل", "be": "Дагляд за дзіцямі", "bg": "Лични грижи за бебето", "ca": "Cura personal per a nadons", "et": "Beebi isiklik hooldus", "nl": "Persoonlijke verzorging voor baby\'s" }',
                    'slug' => '{ "en": "baby-personal-care", "bn": "শিশুর-ব্যক্তিগত-যত্ন", "fr": "soins-personnels-pour-bébé", "zh": "婴儿个人护理", "ar": "العناية-الشخصية-للطفل", "be": "дагляд-за-дзіцямі", "bg": "лични-грижи-за-бебето", "ca": "cura-personal-per-a-nadons", "et": "beebi-isiklik-hooldus", "nl": "persoonlijke-verzorging-voor-baby\'s" }',
                    'parent_id' => 42,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            38 =>
                array (
                    'id' => 95,
                    'name' => '{ "en": "Clothing & Accessories", "bn": "পোশাক ও সাজেসহ", "fr": "Vêtements et accessoires", "zh": "服装和配饰", "ar": "الملابس والاكسسوارات", "be": "Адзенне і аксэсуары", "bg": "Облекла и аксесоари", "ca": "Roba i accessoris", "et": "Rõivad ja tarvikud", "nl": "Kleding en accessoires" }',
                    'slug' => '{ "en": "clothing-accessories", "bn": "পোশাক-ও-সাজেসহ", "fr": "vêtements-et-accessoires", "zh": "服装和配饰", "ar": "الملابس-والاكسسوارات", "be": "адзенне-і-аксэсуары", "bg": "облекла-и-аксесоари", "ca": "roba-i-accessoris", "et": "rõivad-ja-tarvikud", "nl": "kleding-en-accessoires" }',
                    'parent_id' => 42,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            39 =>
                array (
                    'id' => 96,
                    'name' => '{ "en": "Nursery", "bn": "শিশুশিক্ষা", "fr": "Pouponnière", "zh": "托儿所", "ar": "حضانة", "be": "Дзіцячы садок", "bg": "Детска градина", "ca": "Guarderia", "et": "Lasteaed", "nl": "Kinderdagverblijf" }',
                    'slug' => '{ "en": "nursery", "bn": "শিশুশিক্ষা", "fr": "pouponnière", "zh": "托儿所", "ar": "حضانة", "be": "дзіцячы-садок", "bg": "детска-градина", "ca": "guarderia", "et": "lasteaed", "nl": "kinderdagverblijf" }',
                    'parent_id' => 42,
                    'order_by' => 7,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            40 =>
                array (
                    'id' => 97,
                    'name' => '{ "en": "Toys & Games", "bn": "খেলনা ও গেমস", "fr": "Jouets et jeux", "zh": "玩具与游戏", "ar": "الألعاب والألعاب", "be": "Іграчкі і гульні", "bg": "Играчки и игри", "ca": "Juguetes i jocs", "et": "Mänguasjad ja mängud", "nl": "Speelgoed & Spellen" }',
                    'slug' => '{ "en": "toys--games", "bn": "খেলনা--ও-গেমস", "fr": "jouets--et-jeux", "zh": "玩具与游戏", "ar": "الألعاب--والألعاب", "be": "іграчкі--і-гульні", "bg": "играчки--и-игри", "ca": "joguines--i-jocs", "et": "mänguasjad--ja-mängud", "nl": "speelgoed--spellen" }',
                    'parent_id' => 42,
                    'order_by' => 8,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            41 =>
                array (
                    'id' => 99,
                    'name' => '{ "en": "Remote Control & Vehicles", "bn": "রিমোট নিয়ন্ত্রণ এবং যানবাহন", "fr": "Télécommande et véhicules", "zh": "遥控器和车辆", "ar": "التحكم عن بعد والمركبات", "be": "Дыстанцыйнае кіраванне і транспартныя засабы", "bg": "Дистанционно управление и превозни средства", "ca": "Control remot i vehicles", "et": "Kaugjuhtimispult ja sõidukid", "nl": "Afstandsbediening & Voertuigen" }',
                    'slug' => '{ "en": "remote-control-vehicles", "bn": "রিমোট-নিয়ন্ত্রণ-এবং-যানবাহন", "fr": "télécommande-et-véhicules", "zh": "遥控器和车辆", "ar": "التحكم-عن-بعد-والمركبات", "be": "дыстанцыйнае-кіраванне-і-транспартныя-засабы", "bg": "дистанционно-управление-и-превозни-средства", "ca": "control-remot-i-vehicles", "et": "kaugjuhtimispult-ja-sõidukid", "nl": "afstandsbediening-voertuigen" }',
                    'parent_id' => 42,
                    'order_by' => 10,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            42 =>
                array (
                    'id' => 100,
                    'name' => '{ "en": "Sport & Outdoor Play", "bn": "খেলা ও বাহিরের খেলা", "fr": "Sport & Jeu en plein air", "zh": "运动和户外游戏", "ar": "الرياضة واللعب في الهواء الطلق", "be": "Спорт і гульня на свежым паветры", "bg": "Спорт и игри на открито", "ca": "Esport i joc a l\'aire lliure", "et": "Sport ja välilõbu", "nl": "Sport & Buitenspelen" }',
                    'slug' => '{ "en": "sport-outdoor-play", "bn": "খেলা-ও-বাহিরের-খেলা", "fr": "sport-jeu-en-plein-air", "zh": "运动和户外游戏", "ar": "الرياضة-واللعب-في-الهواء-الطلق", "be": "спорт-і-гульня-на-свежым-паветры", "bg": "спорт-и-игри-на-открито", "ca": "esport-i-joc-a-l\'aire-lliure", "et": "sport-ja-välilõbu", "nl": "sport-buitenspelen" }',
                    'parent_id' => 42,
                    'order_by' => 11,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            43 =>
                array (
                    'id' => 101,
                    'name' => '{ "en": "Traditional Games", "bn": "ঐতিহাসিক খেলা", "fr": "Jeux traditionnels", "zh": "传统游戏", "ar": "الألعاب التقليدية", "be": "Традыцыйныя гульні", "bg": "Традиционни игри", "ca": "Jocs tradicionals", "et": "Traditsioonilised mängud", "nl": "Traditionele Spellen" }',
                    'slug' => '{ "en": "traditional-games", "bn": "ঐতিহাসিক-খেলা", "fr": "jeux-traditionnels", "zh": "传统游戏", "ar": "الألعاب-التقليدية", "be": "традыцыйныя-гульні", "bg": "традиционни-игри", "ca": "jocs-tradicionals", "et": "traditsioonilised-mängud", "nl": "traditionele-spellen" }',
                    'parent_id' => 42,
                    'order_by' => 12,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            44 =>
                array (
                    'id' => 147,
                    'name' => '{ "en": "Men\'s Watch", "bn": "পুরুষদের ঘড়ি", "fr": "Montre pour homme", "zh": "男士手表", "ar": "ساعة رجالية", "be": "Чалавечы гадзіннік", "bg": "Мъжки часовник", "ca": "Relotge per a home", "et": "Meeste käekell", "nl": "Herenhorloge" }',
                    'slug' => '{ "en": "men\'s-watch", "bn": "পুরুষদের-ঘড়ি", "fr": "montre-pour-homme", "zh": "男士手表", "ar": "ساعة-رجالية", "be": "чалавечы-гадзіннік", "bg": "мъжки-часовник", "ca": "relotge-per-a-home", "et": "meeste-käekell", "nl": "herenhorloge" }',
                    'parent_id' => 47,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            45 =>
                array (
                    'id' => 148,
                    'name' => '{ "en": "Women\'s Watch", "bn": "নারীদের ঘড়ি", "fr": "Montre pour femme", "zh": "女士手表", "ar": "ساعة نسائية", "be": "Жаночы гадзіннік", "bg": "Дамски часовник", "ca": "Relotge per a dona", "et": "Naiste käekell", "nl": "Dameshorloge" }',
                    'slug' => '{ "en": "women\'s-watch", "bn": "নারীদের-ঘড়ি", "fr": "montre-pour-femme", "zh": "女士手表", "ar": "ساعة-نسائية", "be": "жаночы-гадзіннік", "bg": "дамски-часовник", "ca": "relotge-per-a-dona", "et": "naiste-käekell", "nl": "dameshorloge" }',
                    'parent_id' => 47,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            46 =>
                array (
                    'id' => 149,
                    'name' => '{ "en": "Women\'s Jewelleries", "bn": "নারীদের আভুষণ", "fr": "Bijoux pour femmes", "zh": "女士珠宝", "ar": "مجوهرات نسائية", "be": "Жаночыя біжутэрыі", "bg": "Дамски бижута", "ca": "Joieria per a dones", "et": "Naiste ehted", "nl": "Damesjuwelen" }',
                    'slug' => '{ "en": "women\'s-jewelleries", "bn": "নারীদের-আভুষণ", "fr": "bijoux-pour-femmes", "zh": "女士珠宝", "ar": "مجوهرات-نسائية", "be": "жаночыя-біжутэрыі", "bg": "дамски-бижута", "ca": "joieria-per-a-dones", "et": "naiste-ehted", "nl": "damesjuwelen" }',
                    'parent_id' => 47,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            47 =>
                array (
                    'id' => 150,
                    'name' => '{ "en": "Men\'s Jewelleries", "bn": "পুরুষদের আভুষণ", "fr": "Bijoux pour hommes", "zh": "男士珠宝", "ar": "مجوهرات رجالية", "be": "Чалавечыя біжутэрыі", "bg": "Мъжки бижута", "ca": "Joieria per a homes", "et": "Meeste ehted", "nl": "Herenjuwelen" }',
                    'slug' => '{ "en": "men\'s-jewelleries", "bn": "পুরুষদের-আভুষণ", "fr": "bijoux-pour-hommes", "zh": "男士珠宝", "ar": "مجوهرات-رجالية", "be": "чалавечыя-біжутэрыі", "bg": "мъжки-бижута", "ca": "joieria-per-a-homes", "et": "meeste-ehted", "nl": "herenjuwelen" }',
                    'parent_id' => 47,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            48 =>
                array (
                    'id' => 154,
                    'name' => '{ "en": "Sunglasses", "bn": "সানগ্লাস", "fr": "Lunettes de soleil", "zh": "太阳镜", "ar": "نظارات شمسية", "be": "Сонцазахісныя акуляры", "bg": "Слънчеви очила", "ca": "Ulleres de sol", "et": "Päikeseprillid", "nl": "Zonnebrillen" }',
                    'slug' => '{ "en": "sunglasses", "bn": "সানগ্লাস", "fr": "lunettes-de-soleil", "zh": "太阳镜", "ar": "نظارات-شمسية", "be": "сонцазахісныя-акуляры", "bg": "слънчеви-очила", "ca": "ulleres-de-sol", "et": "päikeseprillid", "nl": "zonnebrillen" }',
                    'parent_id' => 47,
                    'order_by' => 8,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            49 =>
                array (
                    'id' => 155,
                    'name' => '{ "en": "Eyeglasses", "bn": "চশমা", "fr": "Lunettes de vue", "zh": "眼镜", "ar": "نظارات طبية", "be": "Акуляры", "bg": "Очила", "ca": "Ulleres graduades", "et": "Prillid", "nl": "Brillen" }',
                    'slug' => '{ "en": "eyeglasses", "bn": "চশমা", "fr": "lunettes-de-vue", "zh": "眼镜", "ar": "نظارات-طبية", "be": "акуляры", "bg": "очила", "ca": "ulleres-graduades", "et": "prillid", "nl": "brillen" }',
                    'parent_id' => 47,
                    'order_by' => 9,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            50 =>
                array (
                    'id' => 160,
                    'name' => '{ "en": "Cycling", "bn": "সাইকেল চালানো", "fr": "Cyclisme", "zh": "骑自行车", "ar": "ركوب الدراجات", "be": "Веласіпедзабег", "bg": "Колоездене", "ca": "Ciclisme", "et": "Jalgrattasõit", "nl": "Fietsen" }',
                    'slug' => '{ "en": "cycling", "bn": "সাইকেল-চালানো", "fr": "cyclisme", "zh": "骑自行车", "ar": "ركوب-الدراجات", "be": "веласіпедзабег", "bg": "колоездене", "ca": "ciclisme", "et": "jalgrattasõit", "nl": "fietsen" }',
                    'parent_id' => 48,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            51 =>
                array (
                    'id' => 161,
                    'name' => '{ "en": "Boxing, Martial Arts & MMA", "bn": "বক্সিং, যুদ্ধ শিল্প এবং এমএমএ", "fr": "Boxe, arts martiaux et MMA", "zh": "拳击，武术和混合格斗", "ar": "الملاكمة وفنون الدفاع عن النفس و MMA", "be": "Бокс, баявыя мастацтвы і ММА", "bg": "Бокс, бойни изкуства и ММА", "ca": "Boxa, arts marcials i MMA", "et": "Poksimine, võitluskunstid ja MMA", "nl": "Boksen, vechtsporten & MMA" }',
                    'slug' => '{ "en": "boxing-martial-arts-mma", "bn": "বক্সিং-যুদ্ধ-শিল্প-এবং-এমএমএ", "fr": "boxe-arts-martiaux-et-mma", "zh": "拳击-武术和混合格斗", "ar": "الملاكمة-وفنون-الدفاع-عن-النفس-و-MMA", "be": "бокс-баявыя-мастацтвы-і-ММА", "bg": "бокс-бойни-изкуства-и-ММА", "ca": "boxa-arts-marcials-i-mma", "et": "poksimine-võitluskunstid-ja-mma", "nl": "boksen-vechtsporten-mma" }',
                    'parent_id' => 48,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            52 =>
                array (
                    'id' => 162,
                    'name' => '{ "en": "Men Shoes & Clothing", "bn": "পুরুষদের জুতা এবং পোশাক", "fr": "Chaussures et vêtements pour hommes", "zh": "男鞋和服装", "ar": "أحذية وملابس رجالية", "be": "Чалавечая абутак і адзенне", "bg": "Мъжки обувки и облекло", "ca": "Sabates i roba d\'home", "et": "Meeste jalanõud ja rõivad", "nl": "Heren Schoenen & Kleding" }',
                    'slug' => '{ "en": "men-shoes-clothing", "bn": "পুরুষদের-জুতা-এবং-পোশাক", "fr": "chaussures-et-vêtements-pour-hommes", "zh": "男鞋和服装", "ar": "أحذية-وملابس-رجالية", "be": "чалавечая-абутак-і-адзенне", "bg": "мъжки-обувки-и-облекло", "ca": "sabates-i-roba-d\'home", "et": "meeste-jalanõud-ja-rõivad", "nl": "heren-schoenen-kleding" }',
                    'parent_id' => 48,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            53 =>
                array (
                    'id' => 163,
                    'name' => '{ "en": "Outdoor Recreation", "bn": "আউটডোর বিনোদন", "fr": "Loisirs en plein air", "zh": "户外娱乐", "ar": "ترفيه خارجي", "be": "Адкрыты адпачынак", "bg": "Външна рекреация", "ca": "Oci a l\'aire lliure", "et": "Vabaõhumängud", "nl": "Outdoor Recreatie" }',
                    'slug' => '{ "en": "outdoor-recreation", "bn": "আউটডোর-বিনোদন", "fr": "loisirs-en-plein-air", "zh": "户外娱乐", "ar": "ترفيه-خارجي", "be": "адкрыты-адпачынак", "bg": "външна-рекреация", "ca": "oci-a-l\'aire-lliure", "et": "vabaõhumängud", "nl": "outdoor-recreatie" }',
                    'parent_id' => 48,
                    'order_by' => 7,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            54 =>
                array (
                    'id' => 164,
                    'name' => '{ "en": "Exercise & Fitness", "bn": "ব্যায়াম এবং ফিটনেস", "fr": "Exercice et fitness", "zh": "运动与健身", "ar": "التمارين واللياقة البدنية", "be": "Трэніровкі і фітнес", "bg": "Упражнения и фитнес", "ca": "Exercici i fitness", "et": "Treening ja tervislikkus", "nl": "Oefening & Fitness" }',
                    'slug' => '{ "en": "exercise-fitness", "bn": "ব্যায়াম-এবং-ফিটনেস", "fr": "exercice-et-fitness", "zh": "运动与健身", "ar": "التمارين-واللياقة-البدنية", "be": "трэніровкі-і-фітнес", "bg": "упражнения-и-фитнес", "ca": "exercici-i-fitness", "et": "treening-ja-tervislikkus", "nl": "oefening-en-fitness" }',
                    'parent_id' => 48,
                    'order_by' => 8,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            55 =>
                array (
                    'id' => 165,
                    'name' => '{ "en": "Racket Sports", "bn": "র্যাকেট খেলা", "fr": "Sports de raquette", "zh": "球拍运动", "ar": "رياضات الراكيت", "be": "Ракетнае спорцівішча", "bg": "Ракетни спортове", "ca": "Esports de raqueta", "et": "Raketispordid", "nl": "Racketsporten" }',
                    'slug' => '{ "en": "racket-sports", "bn": "র্যাকেট-খেলা", "fr": "sports-de-raquette", "zh": "球拍运动", "ar": "رياضات-الراكيت", "be": "ракетнае-спорцівішча", "bg": "ракетни-спортове", "ca": "esports-de-raqueta", "et": "raketispordid", "nl": "racketsporten" }',
                    'parent_id' => 48,
                    'order_by' => 9,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            56 =>
                array (
                    'id' => 166,
                    'name' => '{ "en": "Team Sports", "bn": "দল খেলা", "fr": "Sports d\'équipe", "zh": "团体运动", "ar": "رياضات جماعية", "be": "Камандныя спорты", "bg": "Екипни спортове", "ca": "Esports d\'equip", "et": "Võistkondlikud spordialad", "nl": "Teamsporten" }',
                    'slug' => '{ "en": "team-sports", "bn": "দল-খেলা", "fr": "sports-d\'équipe", "zh": "团体运动", "ar": "رياضات-جماعية", "be": "камандныя-спорты", "bg": "екипни-спортове", "ca": "esports-d\'equip", "et": "võistkondlikud-spordialad", "nl": "teamsporten" }',
                    'parent_id' => 48,
                    'order_by' => 10,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            57 =>
                array (
                    'id' => 167,
                    'name' => '{ "en": "Camping & Hiking", "bn": "ক্যাম্পিং ও হাইকিং", "fr": "Camping et randonnée", "zh": "露营和徒步旅行", "ar": "التخييم والمشي لمسافات طويلة", "be": "Кемпінг і ходзеньне", "bg": "Къмпинг и пешиходене", "ca": "Càmping i senderisme", "et": "Matkamine ja matkamine", "nl": "Kamperen & Wandelen" }',
                    'slug' => '{ "en": "camping-hiking", "bn": "ক্যাম্পিং-ও-হাইকিং", "fr": "camping-et-randonnée", "zh": "露营和徒步旅行", "ar": "التخييم-والمشي-لمسافات-طويلة", "be": "кемпінг-і-ходзеньне", "bg": "къмпинг-и-пешиходене", "ca": "càmping-i-senderisme", "et": "matkamine-ja-matkamine", "nl": "kamperen-wandelen" }',
                    'parent_id' => 48,
                    'order_by' => 11,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            58 =>
                array (
                    'id' => 169,
                    'name' => '{ "en": "Automobile", "bn": "গাড়ি", "fr": "Automobile", "zh": "汽车", "ar": "سيارة", "be": "Аўтамабіль", "bg": "Автомобил", "ca": "Automòbil", "et": "Automaatne", "nl": "Auto" }',
                    'slug' => '{ "en": "automobile", "bn": "গাড়ি", "fr": "automobile", "zh": "汽车", "ar": "سيارة", "be": "аўтамабіль", "bg": "автомобил", "ca": "automòbil", "et": "automaatne", "nl": "auto" }',
                    'parent_id' => 49,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            59 =>
                array (
                    'id' => 170,
                    'name' => '{ "en": "Auto Oils & Fluids", "bn": "অটো তেল এবং তরল", "fr": "Huiles et fluides automobiles", "zh": "汽车油和液体", "ar": "زيوت وسوائل السيارات", "be": "Аўтамабільныя масла і рэчывыя", "bg": "Масла и течности за автомобили", "ca": "Oli i fluids per a cotxes", "et": "Automaatõlid ja -vedelikud", "nl": "Auto Oliën & Vloeistoffen" }',
                    'slug' => '{ "en": "auto-oils-fluids", "bn": "অটো-তেল-এবং-তরল", "fr": "huiles-et-fluides-automobiles", "zh": "汽车油和液体", "ar": "زيوت-وسوائل-السيارات", "be": "аўтамабільныя-масла-і-рэчывыя", "bg": "масла-и-течности-за-автомобили", "ca": "oli-i-fluids-per-a-cotxes", "et": "automaatõlid-ja-vedelikud", "nl": "auto-oliën-vloeistoffen" }',
                    'parent_id' => 49,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            60 =>
                array (
                    'id' => 171,
                    'name' => '{ "en": "Interior Accessories", "bn": "অভ্যন্তরীণ সাজাসজ্জা", "fr": "Accessoires intérieurs", "zh": "车内配件", "ar": "ملحقات الداخلية", "be": "Унутраныя аксесуары", "bg": "Вътрешни аксесоари", "ca": "Accessoris interiors", "et": "Sisustusaksessuaarid", "nl": "Interieuraccessoires" }',
                    'slug' => '{ "en": "interior-accessories", "bn": "অভ্যন্তরীণ-সাজাসজ্জা", "fr": "accessoires-intérieurs", "zh": "车内配件", "ar": "ملحقات-الداخلية", "be": "унутраныя-аксесуары", "bg": "вътрешни-аксесоари", "ca": "accessoris-interiors", "et": "sisustusaksessuaarid", "nl": "interieuraccessoires" }',
                    'parent_id' => 49,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            61 =>
                array (
                    'id' => 172,
                    'name' => '{ "en": "Exterior Accessories", "bn": "বাইরের সাজাসজ্জা", "fr": "Accessoires extérieurs", "zh": "外部配件", "ar": "ملحقات الخارجية", "be": "Знешнія аксесуары", "bg": "Външни аксесоари", "ca": "Accessoris exteriors", "et": "Välisosustuse tarvikud", "nl": "Exterieuraccessoires" }',
                    'slug' => '{ "en": "exterior-accessories", "bn": "বাইরের-সাজাসজ্জা", "fr": "accessoires-extérieurs", "zh": "外部配件", "ar": "ملحقات-الخارجية", "be": "знешнія-аксесуары", "bg": "външни-аксесоари", "ca": "accessoris-exteriors", "et": "välisosustuse-tarvikud", "nl": "exterieuraccessoires" }',
                    'parent_id' => 49,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            62 =>
                array (
                    'id' => 173,
                    'name' => '{ "en": "Exterior Vehicle Care", "bn": "বাহিরের যানবাহন যত্ন", "fr": "Entretien extérieur du véhicule", "zh": "车辆外部护理", "ar": "العناية بالمركبات الخارجية", "be": "Знешні дагляд за транспартнымі засабамі", "bg": "Грижа за външния части на превозните средства", "ca": "Cura exterior del vehicle", "et": "Sõiduki välisilme hooldus", "nl": "Externe Voertuigverzorging" }',
                    'slug' => '{ "en": "exterior-vehicle-care", "bn": "বাহিরের-যানবাহন-যত্ন", "fr": "entretien-extérieur-du-véhicule", "zh": "车辆外部护理", "ar": "العناية-بالمركبات-الخارجية", "be": "знешні-дагляд-за-транспартнымі-засабамі", "bg": "грижа-за-външния-части-на-превозните-средства", "ca": "cura-exterior-del-vehicle", "et": "sõiduki-välisilme-hooldus", "nl": "externe-voertuigverzorging" }',
                    'parent_id' => 49,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            63 =>
                array (
                    'id' => 174,
                    'name' => '{ "en": "Interior Vehicle Care", "bn": "গাড়ির অভ্যন্তরীণ যত্ন", "fr": "Entretien intérieur du véhicule", "zh": "车辆内部护理", "ar": "العناية بالمركبات الداخلية", "be": "Дагляд за ўнутранай часткай транспартных сродкаў", "bg": "Грижа за вътрешните части на превозните средства", "ca": "Cura interior del vehicle", "et": "Sõiduki sisemise hooldus", "nl": "Interne Voertuigverzorging" }',
                    'slug' => '{ "en": "interior-vehicle-care", "bn": "গাড়ির-অভ্যন্তরীণ-যত্ন", "fr": "entretien-intérieur-du-véhicule", "zh": "车辆内部护理", "ar": "العناية-بالمركبات-الداخلية", "be": "дагляд-за-ўнутранай-часткай-транспартных-сродкаў", "bg": "грижа-за-вътрешните-части-на-превозните-средства", "ca": "cura-interior-del-vehicle", "et": "sõiduki-sisemise-hooldus", "nl": "interne-voertuigverzorging" }',
                    'parent_id' => 49,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            64 =>
                array (
                    'id' => 176,
                    'name' => '{ "en": "Car Audio", "bn": "গাড়ির অডিও", "fr": "Audio de voiture", "zh": "车载音响", "ar": "صوت السيارة", "be": "Аўтамабільнае аўдыё", "bg": "Автомобилно аудио", "ca": "Àudio per a cotxes", "et": "Autoaudio", "nl": "Auto-audio" }',
                    'slug' => '{ "en": "car-audio", "bn": "গাড়ির-অডিও", "fr": "audio-de-voiture", "zh": "车载音响", "ar": "صوت-السيارة", "be": "аўтамабільнае-аўдыё", "bg": "автомобилно-аудио", "ca": "àudio-per-a-cotxes", "et": "autoaudio", "nl": "auto-audio" }',
                    'parent_id' => 49,
                    'order_by' => 8,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            65 =>
                array (
                    'id' => 177,
                    'name' => '{ "en": "Motorcycle", "bn": "মোটরসাইকেল", "fr": "Moto", "zh": "摩托车", "ar": "دراجة نارية", "be": "Матацыкл", "bg": "Мотор", "ca": "Motocicleta", "et": "Mootorratas", "nl": "Motorfiets" }',
                    'slug' => '{ "en": "motorcycle", "bn": "মোটরসাইকেল", "fr": "moto", "zh": "摩托车", "ar": "دراجة-نارية", "be": "матацыкл", "bg": "мотор", "ca": "motocicleta", "et": "mootorratas", "nl": "motorfiets" }',
                    'parent_id' => 49,
                    'order_by' => 9,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            66 =>
                array (
                    'id' => 179,
                    'name' => '{ "en": "Motorcycle Riding Gear", "bn": "মোটরসাইকেল রাইডিং গিয়ার", "fr": "Équipement de conduite de moto", "zh": "摩托车骑行装备", "ar": "ملابس قيادة الدراجات النارية", "be": "Адзенне для катання на матацыкле", "bg": "Екипировка за моторно колоездене", "ca": "Equipament per a la conducció de motos", "et": "Mootorratta sõiduvarustus", "nl": "Motorkleding" }',
                    'slug' => '{ "en": "motorcycle-riding-gear", "bn": "মোটরসাইকেল-রাইডিং-গিয়ার", "fr": "équipement-de-conduite-de-moto", "zh": "摩托车骑行装备", "ar": "ملابس-قيادة-الدراجات-النارية", "be": "адзенне-для-катання-на-матацыкле", "bg": "екипировка-за-моторно-колоездене", "ca": "equipament-per-a-la-conducció-de-motos", "et": "mootorratta-sõiduvarustus", "nl": "motorkleding" }',
                    'parent_id' => 49,
                    'order_by' => 11,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            67 =>
                array (
                    'id' => 180,
                    'name' => '{ "en": "Realme Phones", "bn": "রিয়েলমি ফোন", "fr": "Téléphones Realme", "zh": "Realme 手机", "ar": "هواتف Realme", "be": "Тэлефоны Realme", "bg": "Телефони Realme", "ca": "Telèfons Realme", "et": "Realme telefonid", "nl": "Realme Telefoons" }',
                    'slug' => '{ "en": "realme-phones", "bn": "রিয়েলমি-ফোন", "fr": "téléphones-realme", "zh": "realme-手机", "ar": "هواتف-realme", "be": "тэлефоны-realme", "bg": "телефони-realme", "ca": "telèfons-realme", "et": "realme-telefonid", "nl": "realme-telefoons" }',
                    'parent_id' => 50,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            68 =>
                array (
                    'id' => 181,
                    'name' => '{ "en": "Samsung Phones", "bn": "স্যামসাং ফোন", "fr": "Téléphones Samsung", "zh": "三星手机", "ar": "هواتف سامسونج", "be": "Тэлефоны Samsung", "bg": "Телефони Samsung", "ca": "Telèfons Samsung", "et": "Samsungi telefonid", "nl": "Samsung Telefoons" }',
                    'slug' => '{ "en": "samsung-phones", "bn": "স্যামসাং-ফোন", "fr": "téléphones-samsung", "zh": "三星手机", "ar": "هواتف-سامسونج", "be": "тэлефоны-samsung", "bg": "телефони-samsung", "ca": "telèfons-samsung", "et": "samsungi-telefonid", "nl": "samsung-telefoons" }',
                    'parent_id' => 50,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            69 =>
                array (
                    'id' => 182,
                    'name' => '{ "en": "Xiaomi Phones", "bn": "শাওমি ফোন", "fr": "Téléphones Xiaomi", "zh": "小米手机", "ar": "هواتف شياومي", "be": "Тэлефоны Xiaomi", "bg": "Телефони Xiaomi", "ca": "Telèfons Xiaomi", "et": "Xiaomi telefonid", "nl": "Xiaomi Telefoons" }',
                    'slug' => '{ "en": "xiaomi-phones", "bn": "শাওমি-ফোন", "fr": "téléphones-xiaomi", "zh": "小米手机", "ar": "هواتف-شياومي", "be": "тэлефоны-xiaomi", "bg": "телефони-xiaomi", "ca": "telèfons-xiaomi", "et": "xiaomi-telefonid", "nl": "xiaomi-telefoons" }',
                    'parent_id' => 50,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            70 =>
                array (
                    'id' => 183,
                    'name' => '{ "en": "OPPO Phones", "bn": "অপো ফোন", "fr": "Téléphones OPPO", "zh": "OPPO 手机", "ar": "هواتف OPPO", "be": "Тэлефоны OPPO", "bg": "Телефони OPPO", "ca": "Telèfons OPPO", "et": "OPPO telefonid", "nl": "OPPO Telefoons" }',
                    'slug' => '{ "en": "oppo-phones", "bn": "অপো-ফোন", "fr": "téléphones-oppo", "zh": "oppo-手机", "ar": "هواتف-oppo", "be": "тэлефоны-oppo", "bg": "телефони-oppo", "ca": "telèfons-oppo", "et": "oppo-telefonid", "nl": "oppo-telefoons" }',
                    'parent_id' => 50,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            71 =>
                array (
                    'id' => 184,
                    'name' => '{ "en": "Vivo Phones", "bn": "ভিভো ফোন", "fr": "Téléphones Vivo", "zh": "Vivo 手机", "ar": "هواتف فيفو", "be": "Тэлефоны Vivo", "bg": "Телефони Vivo", "ca": "Telèfons Vivo", "et": "Vivo telefonid", "nl": "Vivo Telefoons" }',
                    'slug' => '{ "en": "vivo-phones", "bn": "ভিভো-ফোন", "fr": "téléphones-vivo", "zh": "vivo-手机", "ar": "هواتف-فيفو", "be": "тэлефоны-vivo", "bg": "телефони-vivo", "ca": "telèfons-vivo", "et": "vivo-telefonid", "nl": "vivo-telefoons" }',
                    'parent_id' => 50,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            72 =>
                array (
                    'id' => 185,
                    'name' => '{ "en": "Infinix Phones", "bn": "ইনফিনিক্স ফোন", "fr": "Téléphones Infinix", "zh": "Infinix 手机", "ar": "هواتف Infinix", "be": "Тэлефоны Infinix", "bg": "Телефони Infinix", "ca": "Telèfons Infinix", "et": "Infinix telefonid", "nl": "Infinix Telefoons" }',
                    'slug' => '{ "en": "infinix-phones", "bn": "ইনফিনিক্স-ফোন", "fr": "téléphones-infinix", "zh": "infinix-手机", "ar": "هواتف-infinix", "be": "тэлефоны-infinix", "bg": "телефони-infinix", "ca": "telèfons-infinix", "et": "infinix-telefonid", "nl": "infinix-telefoons" }',
                    'parent_id' => 50,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            73 =>
                array (
                    'id' => 186,
                    'name' => '{ "en": "Motorola Phones", "bn": "মোটোরোলা ফোন", "fr": "Téléphones Motorola", "zh": "摩托罗拉手机", "ar": "هواتف موتورولا", "be": "Тэлефоны Motorola", "bg": "Телефони Motorola", "ca": "Telèfons Motorola", "et": "Motorola telefonid", "nl": "Motorola Telefoons" }',
                    'slug' => '{ "en": "motorola-phones", "bn": "মোটোরোলা-ফোন", "fr": "téléphones-motorola", "zh": "摩托罗拉手机", "ar": "هواتف-موتورولا", "be": "тэлефоны-motorola", "bg": "телефони-motorola", "ca": "telèfons-motorola", "et": "motorola-telefonid", "nl": "motorola-telefoons" }',
                    'parent_id' => 50,
                    'order_by' => 7,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            74 =>
                array (
                    'id' => 187,
                    'name' => '{ "en": "Tecno Phones", "bn": "টেকনো ফোন", "fr": "Téléphones Tecno", "zh": "Tecno 手机", "ar": "هواتف تكنو", "be": "Тэлефоны Tecno", "bg": "Телефони Tecno", "ca": "Telèfons Tecno", "et": "Tecno telefonid", "nl": "Tecno Telefoons" }',
                    'slug' => '{ "en": "tecno-phones", "bn": "টেকনো-ফোন", "fr": "téléphones-tecno", "zh": "tecno-手机", "ar": "هواتف-تكنو", "be": "тэлефоны-tecno", "bg": "телефони-tecno", "ca": "telèfons-tecno", "et": "tecno-telefonid", "nl": "tecno-telefoons" }',
                    'parent_id' => 50,
                    'order_by' => 8,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            75 =>
                array (
                    'id' => 190,
                    'name' => '{ "en": "Nokia Feature Phone", "bn": "নোকিয়া ফিচার ফোন", "fr": "Téléphone portable Nokia", "zh": "诺基亚功能手机", "ar": "هاتف نوكيا المميز", "be": "Тэлефон з функцыяй Nokia", "bg": "Нокиа Функционален телефон", "ca": "Telèfon mòbil Nokia", "et": "Nokia funktsionaalne telefon", "nl": "Nokia Feature Telefoon" }',
                    'slug' => '{ "en": "nokia-feature-phone", "bn": "নোকিয়া-ফিচার-ফোন", "fr": "téléphone-portable-nokia", "zh": "诺基亚功能手机", "ar": "هاتف-نوكيا-المميز", "be": "тэлефон-з-функцыяй-nokia", "bg": "нокиа-функционален-телефон", "ca": "telèfon-mòbil-nokia", "et": "nokia-funktsionaalne-telefon", "nl": "nokia-feature-telefoon" }',
                    'parent_id' => 51,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            76 =>
                array (
                    'id' => 191,
                    'name' => '{ "en": "Samsung Feature Phone", "bn": "স্যামসাং ফিচার ফোন", "fr": "Téléphone portable Samsung", "zh": "三星功能手机", "ar": "هاتف سامسونج المميز", "be": "Тэлефон з функцыяй Samsung", "bg": "Самсунг Функционален телефон", "ca": "Telèfon mòbil Samsung", "et": "Samsungi funktsionaalne telefon", "nl": "Samsung Feature Telefoon" }',
                    'slug' => '{ "en": "samsung-feature-phone", "bn": "স্যামসাং-ফিচার-ফোন", "fr": "téléphone-portable-samsung", "zh": "三星功能手机", "ar": "هاتف-سامسونج-المميز", "be": "тэлефон-з-функцыяй-samsung", "bg": "самсунг-функционален-телефон", "ca": "telèfon-mòbil-samsung", "et": "samsungi-funktsionaalne-telefon", "nl": "samsung-feature-telefoon" }',
                    'parent_id' => 51,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            77 =>
                array (
                    'id' => 197,
                    'name' => '{ "en": "HP Laptops", "bn": "এইচপি ল্যাপটপ", "fr": "Ordinateurs portables HP", "zh": "惠普笔记本电脑", "ar": "أجهزة الكمبيوتر المحمولة من HP", "be": "Ноутбукі HP", "bg": "Лаптопи HP", "ca": "Ordinadors portàtils HP", "et": "HP sülearvutid", "nl": "HP Laptops" }',
                    'slug' => '{ "en": "hp-laptops", "bn": "এইচপি-ল্যাপটপ", "fr": "ordinateurs-portables-hp", "zh": "惠普笔记本电脑", "ar": "أجهزة-الكمبيوتر-المحمولة-من-hp", "be": "ноутбукі-hp", "bg": "лаптопи-hp", "ca": "ordinadors-portàtils-hp", "et": "hp-sülearvutid", "nl": "hp-laptops" }',
                    'parent_id' => 53,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            78 =>
                array (
                    'id' => 198,
                    'name' => '{ "en": "Asus Laptops", "bn": "এসুস ল্যাপটপ", "fr": "Ordinateurs portables Asus", "zh": "华硕笔记本电脑", "ar": "أجهزة الكمبيوتر المحمولة من Asus", "be": "Ноутбукі Asus", "bg": "Лаптопи Asus", "ca": "Ordinadors portàtils Asus", "et": "Asus sülearvutid", "nl": "Asus Laptops" }',
                    'slug' => '{ "en": "asus-laptops", "bn": "এসুস-ল্যাপটপ", "fr": "ordinateurs-portables-asus", "zh": "华硕笔记本电脑", "ar": "أجهزة-الكمبيوتر-المحمولة-من-asus", "be": "ноутбукі-asus", "bg": "лаптопи-asus", "ca": "ordinadors-portàtils-asus", "et": "asus-sülearvutid", "nl": "asus-laptops" }',
                    'parent_id' => 53,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            79 =>
                array (
                    'id' => 199,
                    'name' => '{ "en": "Dell Laptops", "bn": "ডেল ল্যাপটপ", "fr": "Ordinateurs portables Dell", "zh": "戴尔笔记本电脑", "ar": "أجهزة الكمبيوتر المحمولة من Dell", "be": "Ноутбукі Dell", "bg": "Лаптопи Dell", "ca": "Ordinadors portàtils Dell", "et": "Dell sülearvutid", "nl": "Dell Laptops" }',
                    'slug' => '{ "en": "dell-laptops", "bn": "ডেল-ল্যাপটপ", "fr": "ordinateurs-portables-dell", "zh": "戴尔笔记本电脑", "ar": "أجهزة-الكمبيوتر-المحمولة-من-dell", "be": "ноутбукі-dell", "bg": "лаптопи-dell", "ca": "ordinadors-portàtils-dell", "et": "dell-sülearvutid", "nl": "dell-laptops" }',
                    'parent_id' => 53,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            80 =>
                array (
                    'id' => 200,
                    'name' => '{ "en": "Lenovo Laptops", "bn": "লেনোভো ল্যাপটপ", "fr": "Ordinateurs portables Lenovo", "zh": "联想笔记本电脑", "ar": "أجهزة الكمبيوتر المحمولة من Lenovo", "be": "Ноутбукі Lenovo", "bg": "Лаптопи Lenovo", "ca": "Ordinadors portàtils Lenovo", "et": "Lenovo sülearvutid", "nl": "Lenovo Laptops" }',
                    'slug' => '{ "en": "lenovo-laptops", "bn": "লেনোভো-ল্যাপটপ", "fr": "ordinateurs-portables-lenovo", "zh": "联想笔记本电脑", "ar": "أجهزة-الكمبيوتر-المحمولة-من-lenovo", "be": "ноутбукі-lenovo", "bg": "лаптопи-lenovo", "ca": "ordinadors-portàtils-lenovo", "et": "lenovo-sülearvutid", "nl": "lenovo-laptops" }',
                    'parent_id' => 53,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            81 =>
                array (
                    'id' => 202,
                    'name' => '{ "en": "Acer Laptops", "bn": "এসার ল্যাপটপ", "fr": "Ordinateurs portables Acer", "zh": "宏碁笔记本电脑", "ar": "أجهزة الكمبيوتر المحمولة من Acer", "be": "Ноутбукі Acer", "bg": "Лаптопи Acer", "ca": "Ordinadors portàtils Acer", "et": "Acer sülearvutid", "nl": "Acer Laptops" }',
                    'slug' => '{ "en": "acer-laptops", "bn": "এসার-ল্যাপটপ", "fr": "ordinateurs-portables-acer", "zh": "宏碁笔记本电脑", "ar": "أجهزة-الكمبيوتر-المحمولة-من-acer", "be": "ноутбукі-acer", "bg": "лаптопи-acer", "ca": "ordinadors-portàtils-acer", "et": "acer-sülearvutid", "nl": "acer-laptops" }',
                    'parent_id' => 53,
                    'order_by' => 8,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            82 =>
                array (
                    'id' => 212,
                    'name' => '{ "en": "DSLR", "bn": "ডিএসএলআর", "fr": "Reflex numérique", "zh": "数码单反相机", "ar": "كاميرا رقمية احترافية", "be": "ДСЛР", "bg": "Цифрова единнообективна рефлексна камера", "ca": "Càmera rèflex digital", "et": "DSLR", "nl": "Digitale spiegelreflexcamera" }',
                    'slug' => '{ "en": "dslr", "bn": "ডিএসএলআর", "fr": "reflex-numérique", "zh": "数码单反相机", "ar": "كاميرا-رقمية-احترافية", "be": "дслр", "bg": "цифрова-единнообективна-рефлексна-камера", "ca": "càmera-rèflex-digital", "et": "dslr", "nl": "digitale-spiegelreflexcamera" }',
                    'parent_id' => 56,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            83 =>
                array (
                    'id' => 213,
                    'name' => '{ "en": "Mirrorless", "bn": "মিররলেস", "fr": "Sans miroir", "zh": "无反", "ar": "بدون مرآة", "be": "Бездзеркальны", "bg": "Безогледален", "ca": "Sense mirall", "et": "Peeglivaba", "nl": "Mirrorless" }',
                    'slug' => '{ "en": "mirrorless", "bn": "মিররলেস", "fr": "sans-miroir", "zh": "无反", "ar": "بدون-مرآة", "be": "бездзеркальны", "bg": "безогледален", "ca": "sense-mirall", "et": "peeglivaba", "nl": "mirrorless" }',
                    'parent_id' => 56,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            84 =>
                array (
                    'id' => 214,
                    'name' => '{ "en": "Point & Shoot", "bn": "পয়েন্ট এন্ড শুট", "fr": "Viser et prendre", "zh": "对焦拍摄", "ar": "تركيز وتصوير", "be": "Точка і стрэльба", "bg": "Посочи и стреляй", "ca": "Apuntar i disparar", "et": "Siht ja lase", "nl": "Point & Shoot" }',
                    'slug' => '{ "en": "point-and-shoot", "bn": "পয়েন্ট-এন্ড-শুট", "fr": "viser-et-prendre", "zh": "对焦拍摄", "ar": "تركيز-وتصوير", "be": "точка-і-стрэльба", "bg": "посочи-и-стреляй", "ca": "apuntar-i-disparar", "et": "siht-ja-lase", "nl": "point-en-shoot" }',
                    'parent_id' => 56,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            85 =>
                array (
                    'id' => 216,
                    'name' => '{ "en": "Car Cameras", "bn": "গাড়ি ক্যামেরা", "fr": "Caméras de voiture", "zh": "车载摄像头", "ar": "كاميرات السيارة", "be": "Камеры для аўтамабіля", "bg": "Кола камери", "ca": "Càmeres de cotxe", "et": "Autokaamerad", "nl": "Auto Camera\'s" }',
                    'slug' => '{ "en": "car-cameras", "bn": "গাড়ি-ক্যামেরা", "fr": "caméras-de-voiture", "zh": "车载摄像头", "ar": "كاميرات-السيارة", "be": "камеры-для-аўтамабіля", "bg": "кола-камери", "ca": "càmeres-de-cotxe", "et": "autokaamerad", "nl": "auto-camera\'s" }',
                    'parent_id' => 56,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            86 =>
                array (
                    'id' => 217,
                    'name' => '{ "en": "Action/Video Cameras", "bn": "অ্যাকশন/ভিডিও ক্যামেরা", "fr": "Caméras d\'action/vidéo", "zh": "动作/视频摄像机", "ar": "كاميرات الفيديو/العمل", "be": "Камеры дзеяння/відэа", "bg": "Камери за действия/видео", "ca": "Càmeres d\'acció/vídeo", "et": "Tegevus/Videokaamerad", "nl": "Actie/Video Camera\'s" }',
                    'slug' => '{ "en": "action-video-cameras", "bn": "অ্যাকশন/ভিডিও-ক্যামেরা", "fr": "caméras-d\'action/vidéo", "zh": "动作/视频摄像机", "ar": "كاميرات-الفيديو/العمل", "be": "камеры-дзеяння/відэа", "bg": "камери-за-действия/видео", "ca": "càmeres-d\'acció/vídeo", "et": "tegevus/videokaamerad", "nl": "actie/video-camera\'s" }',
                    'parent_id' => 56,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            87 =>
                array (
                    'id' => 218,
                    'name' => '{ "en": "IP Security Cameras", "bn": "আইপি নিরাপত্তা ক্যামেরা", "fr": "Caméras de sécurité IP", "zh": "IP安全摄像机", "ar": "كاميرات الأمان IP", "be": "IP-камеры бяспекі", "bg": "IP камери за сигурност", "ca": "Càmeres de seguretat IP", "et": "IP-turvakaamerad", "nl": "IP Beveiligingscamera\'s" }',
                    'slug' => '{ "en": "ip-security-cameras", "bn": "আইপি-নিরাপত্তা-ক্যামেরা", "fr": "caméras-de-sécurité-ip", "zh": "IP安全摄像机", "ar": "كاميرات-الأمان-IP", "be": "IP-камеры-бяспекі", "bg": "IP-камери-за-сигурност", "ca": "càmeres-de-seguretat-IP", "et": "ip-turvakaamerad", "nl": "ip-beveiligingscamera\'s" }',
                    'parent_id' => 57,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            88 =>
                array (
                    'id' => 220,
                    'name' => '{ "en": "CCTV Security Cameras", "bn": "সিসিটিভি নিরাপত্তা ক্যামেরা", "fr": "Caméras de sécurité CCTV", "zh": "闭路电视安全摄像机", "ar": "كاميرات الأمان CCTV", "be": "CCTV-камеры бяспекі", "bg": "CCTV камери за сигурност", "ca": "Càmeres de seguretat CCTV", "et": "CCTV-turvakaamerad", "nl": "CCTV Beveiligingscamera\'s" }',
                    'slug' => '{ "en": "cctv-security-cameras", "bn": "সিসিটিভি-নিরাপত্তা-ক্যামেরা", "fr": "caméras-de-sécurité-cctv", "zh": "闭路电视安全摄像机", "ar": "كاميرات-الأمان-CCTV", "be": "CCTV-камеры-бяспекі", "bg": "CCTV-камери-за-сигурност", "ca": "càmeres-de-seguretat-CCTV", "et": "cctv-turvakaamerad", "nl": "cctv-beveiligingscamera\'s" }',
                    'parent_id' => 57,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            89 =>
                array (
                    'id' => 222,
                    'name' => '{ "en": "Phone Cases", "bn": "ফোন কেস", "fr": "Coques de téléphone", "zh": "手机壳", "ar": "أغطية الهاتف", "be": "Кавалкі для тэлефона", "bg": "Калъфи за телефон", "ca": "Funda de telèfon", "et": "Telefoni ümbrised", "nl": "Telefoonhoesjes" }',
                    'slug' => '{ "en": "phone-cases", "bn": "ফোন-কেস", "fr": "coques-de-téléphone", "zh": "手机壳", "ar": "أغطية-الهاتف", "be": "кавалкі-для-тэлефона", "bg": "калъфи-за-телефон", "ca": "funda-de-telèfon", "et": "telefoni-ümbrised", "nl": "telefoonhoesjes" }',
                    'parent_id' => 58,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            90 =>
                array (
                    'id' => 223,
                    'name' => '{ "en": "Power Banks", "bn": "পাওয়ার ব্যাংক", "fr": "Batteries externes", "zh": "移动电源", "ar": "بنوك الطاقة", "be": "Павербанкі", "bg": "Външни батерии", "ca": "Bateries externes", "et": "Võimsuspangad", "nl": "Powerbanks" }',
                    'slug' => '{ "en": "power-banks", "bn": "পাওয়ার-ব্যাংক", "fr": "batteries-externes", "zh": "移动电源", "ar": "بنوك-الطاقة", "be": "павербанкі", "bg": "външни-батерии", "ca": "bateries-externes", "et": "võimsuspangad", "nl": "powerbanks" }',
                    'parent_id' => 58,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            91 =>
                array (
                    'id' => 224,
                    'name' => '{ "en": "Cables & Converters", "bn": "কেবল এবং কনভার্টার", "fr": "Câbles et convertisseurs", "zh": "电缆和转换器", "ar": "الكابلات والمحولات", "be": "Каблы і пераўтваральнікі", "bg": "Кабели и конвертори", "ca": "Cables i convertidors", "et": "Kaablid ja konverterid", "nl": "Kabels & Converters" }',
                    'slug' => '{ "en": "cables-and-converters", "bn": "কেবল-এবং-কনভার্টার", "fr": "câbles-et-convertisseurs", "zh": "电缆和转换器", "ar": "الكابلات-والمحولات", "be": "каблы-і-пераўтваральнікі", "bg": "кабели-и-конвертори", "ca": "cables-i-convertidors", "et": "kaablid-ja-konverterid", "nl": "kabels-en-converters" }',
                    'parent_id' => 58,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            92 =>
                array (
                    'id' => 225,
                    'name' => '{ "en": "Wall Chargers", "bn": "ওয়াল চার্জার", "fr": "Chargeurs de mur", "zh": "壁挂充电器", "ar": "شواحن الحائط", "be": "Зарядкі для ўстаўкі ў мур", "bg": "Зарядни станции за стена", "ca": "Càrregues de paret", "et": "Seina laadijad", "nl": "Wandladers" }',
                    'slug' => '{ "en": "wall-chargers", "bn": "ওয়াল-চার্জার", "fr": "chargeurs-de-mur", "zh": "壁挂充电器", "ar": "شواحن-الحائط", "be": "зарядкі-для-ўстаўкі-ў-мур", "bg": "зарядни-станции-за-стена", "ca": "càrregues-de-paret", "et": "seina-laadijad", "nl": "wandladers" }',
                    'parent_id' => 58,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            93 =>
                array (
                    'id' => 226,
                    'name' => '{ "en": "Wireless Chargers", "bn": "ওয়ায়ারলেস চার্জার", "fr": "Chargeurs sans fil", "zh": "无线充电器", "ar": "شواحن لاسلكية", "be": "Беспрыводныя заряднікі", "bg": "Безжични зарядни", "ca": "Càrregues sense fils", "et": "Traadita laadijad", "nl": "Draadloze laders" }',
                    'slug' => '{ "en": "wireless-chargers", "bn": "ওয়ায়ারলেস-চার্জার", "fr": "chargeurs-sans-fil", "zh": "无线充电器", "ar": "شواحن-لاسلكية", "be": "беспрыводныя-заряднікі", "bg": "безжични-зарядни", "ca": "càrregues-sense-fils", "et": "traadita-laadijad", "nl": "draadloze-laders" }',
                    'parent_id' => 58,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            94 =>
                array (
                    'id' => 227,
                    'name' => '{ "en": "Headphones & Headset", "bn": "হেডফোন এবং হেডসেট", "fr": "Écouteurs et casque", "zh": "耳机和耳麦", "ar": "سماعات الرأس وسماعة الرأس", "be": "Навушнікі і гарнітура", "bg": "Слушалки и слушалки", "ca": "Auriculars i auriculars", "et": "Kõrvaklapid ja peakomplekt", "nl": "Koptelefoons & Headset" }',
                    'slug' => '{ "en": "headphones-and-headset", "bn": "হেডফোন-এবং-হেডসেট", "fr": "écouteurs-et-casque", "zh": "耳机和耳麦", "ar": "سماعات-الرأس-وسماعة-الرأس", "be": "навушнікі-і-гарнітура", "bg": "слушалки-и-слушалки", "ca": "auriculars-i-auriculars", "et": "kõrvaklapid-ja-peakomplekt", "nl": "koptelefoons-en-headset" }',
                    'parent_id' => 59,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            95 =>
                array (
                    'id' => 228,
                    'name' => '{ "en": "Home Entertainment", "bn": "হোম এন্টারটেইনমেন্ট", "fr": "Divertissement à domicile", "zh": "家庭娱乐", "ar": "ترفيه المنزل", "be": "Домашні атракцыяны", "bg": "Домашно забавление", "ca": "Entreteniment a casa", "et": "Kodu meelelahutus", "nl": "Home Entertainment" }',
                    'slug' => '{ "en": "home-entertainment", "bn": "হোম-এন্টারটেইনমেন্ট", "fr": "divertissement-à-domicile", "zh": "家庭娱乐", "ar": "ترفيه-المنزل", "be": "домашні-атракцыяны", "bg": "домашно-забавление", "ca": "entreteniment-a-casa", "et": "kodu-meelelahutus", "nl": "home-entertainment" }',
                    'parent_id' => 59,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            96 =>
                array (
                    'id' => 229,
                    'name' => '{ "en": "Bluetooth Speakers", "bn": "ব্লুটুথ স্পিকার", "fr": "Enceintes Bluetooth", "zh": "蓝牙音箱", "ar": "سماعات بلوتوث", "be": "Bluetooth-гучнікі", "bg": "Bluetooth колони", "ca": "Altoparlants Bluetooth", "et": "Bluetooth kõlarid", "nl": "Bluetooth Speakers" }',
                    'slug' => '{ "en": "bluetooth-speakers", "bn": "ব্লুটুথ-স্পিকার", "fr": "enceintes-bluetooth", "zh": "蓝牙音箱", "ar": "سماعات-بلوتوث", "be": "bluetooth-гучнікі", "bg": "bluetooth-колони", "ca": "altoparlants-bluetooth", "et": "bluetooth-kõlarid", "nl": "bluetooth-speakers" }',
                    'parent_id' => 59,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            97 =>
                array (
                    'id' => 230,
                    'name' => '{ "en": "Live sound & Stage Equipment", "bn": "লাইভ সাউন্ড এবং স্টেজ উপকরণ", "fr": "Son en direct et équipement de scène", "zh": "现场音响和舞台设备", "ar": "صوت مباشر ومعدات المسرح", "be": "Жывы звук і сцэнічнае абсталяванне", "bg": "Жив звук и сценично оборудване", "ca": "So en direct i equipament d\'escenari", "et": "Otseheli ja lava seadmed", "nl": "Live geluid & Podiumapparatuur" }',
                    'slug' => '{ "en": "live-sound-and-stage-equipment", "bn": "লাইভ-সাউন্ড-এবং-স্টেজ-উপকরণ", "fr": "son-en-direct-et-équipement-de-scène", "zh": "现场音响和舞台设备", "ar": "صوت-مباشر-ومعدات-المسرح", "be": "жывы-звук-і-сцэнічнае-абсталяванне", "bg": "жив-звук-и-сценично-оборудване", "ca": "so-en-direct-i-equipament-d\'escenari", "et": "otseheli-ja-lava-seadmed", "nl": "live-geluid-en-podiumapparatuur" }',
                    'parent_id' => 59,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            98 =>
                array (
                    'id' => 231,
                    'name' => '{ "en": "Smartwatches", "bn": "স্মার্টওয়াচ", "fr": "Montres intelligentes", "zh": "智能手表", "ar": "الساعات الذكية", "be": "Смарт-гаджэты", "bg": "Умни часовници", "ca": "Relojes inteligentes", "et": "Nutikellad", "nl": "Smartwatches" }',
                    'slug' => '{ "en": "smartwatches", "bn": "স্মার্টওয়াচ", "fr": "montres-intelligentes", "zh": "智能手表", "ar": "الساعات-الذكية", "be": "смарт-гаджэты", "bg": "умни-часовници", "ca": "relojes-inteligentes", "et": "nutikellad", "nl": "smartwatches" }',
                    'parent_id' => 60,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            99 =>
                array (
                    'id' => 232,
                    'name' => '{ "en": "Virtual Reality", "bn": "ভার্চুয়াল রিয়ালিটি", "fr": "Réalité virtuelle", "zh": "虚拟现实", "ar": "الواقع الافتراضي", "be": "Віртуальная рэальнасць", "bg": "Виртуална реалност", "ca": "Realitat virtual", "et": "Virtuaalreaalsus", "nl": "Virtual Reality" }',
                    'slug' => '{ "en": "virtual-reality", "bn": "ভার্চুয়াল-রিয়ালিটি", "fr": "réalité-virtuelle", "zh": "虚拟现实", "ar": "الواقع-الافتراضي", "be": "віртуальная-рэальнасць", "bg": "виртуална-реалност", "ca": "realitat-virtual", "et": "virtuaalreaalsus", "nl": "virtual-reality" }',
                    'parent_id' => 60,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            100 =>
                array (
                    'id' => 233,
                    'name' => '{ "en": "Playstation Controllers", "bn": "প্লেস্টেশন কন্ট্রোলার", "fr": "Contrôleurs PlayStation", "zh": "PlayStation 控制器", "ar": "أجهزة تحكم PlayStation", "be": "Кантролеры PlayStation", "bg": "Контролери на PlayStation", "ca": "Controladors de PlayStation", "et": "PlayStationi kontrollerid", "nl": "PlayStation Controllers" }',
                    'slug' => '{ "en": "playstation-controllers", "bn": "প্লেস্টেশন-কন্ট্রোলার", "fr": "contrôleurs-playstation", "zh": "playstation-控制器", "ar": "أجهزة-تحكم-playstation", "be": "кантролеры-playstation", "bg": "контролери-на-playstation", "ca": "controladors-de-playstation", "et": "playstationi-kontrollerid", "nl": "playstation-controllers" }',
                    'parent_id' => 61,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            101 =>
                array (
                    'id' => 234,
                    'name' => '{ "en": "Other Gaming Accessories", "bn": "অন্যান্য গেমিং সরঞ্জাম", "fr": "Autres accessoires de jeu", "zh": "其他游戏配件", "ar": "إكسسوارات الألعاب الأخرى", "be": "Іншыя гульнявыя прылады", "bg": "Други аксесоари за игри", "ca": "Altres accessoris de joc", "et": "Muud mängutarvikud", "nl": "Andere Gaming Accessoires" }',
                    'slug' => '{ "en": "other-gaming-accessories", "bn": "অন্যান্য-গেমিং-সরঞ্জাম", "fr": "autres-accessoires-de-jeu", "zh": "其他游戏配件", "ar": "إكسسوارات-الألعاب-الأخرى", "be": "іншыя-гульнявыя-прылады", "bg": "други-аксесоари-за-игри", "ca": "altres-accessoris-de-joc", "et": "muud-mängutarvikud", "nl": "andere-gaming-accessoires" }',
                    'parent_id' => 61,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            102 =>
                array (
                    'id' => 235,
                    'name' => '{ "en": "Memory Cards", "bn": "মেমরি কার্ড", "fr": "Cartes mémoire", "zh": "记忆卡", "ar": "بطاقات الذاكرة", "be": "Карты памяці", "bg": "Карти памет", "ca": "Targetes de memòria", "et": "Mälukaardid", "nl": "Geheugenkaarten" }',
                    'slug' => '{ "en": "memory-cards", "bn": "মেমরি-কার্ড", "fr": "cartes-mémoire", "zh": "记忆卡", "ar": "بطاقات-الذاكرة", "be": "карты-памяці", "bg": "карти-памет", "ca": "targetes-de-memòria", "et": "mälukaardid", "nl": "geheugenkaarten" }',
                    'parent_id' => 62,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            103 =>
                array (
                    'id' => 236,
                    'name' => '{ "en": "DSLR Lens", "bn": "ডিএসএলআর লেন্স", "fr": "Objectif DSLR", "zh": "单反镜头", "ar": "عدسة كاميرا DSLR", "be": "Об\'ективы DSLR", "bg": "Обективи DSLR", "ca": "Objectiu DSLR", "et": "DSLR objektiiv", "nl": "DSLR Lens" }',
                    'slug' => '{ "en": "dslr-lens", "bn": "ডিএসএলআর-লেন্স", "fr": "objectif-dslr", "zh": "单反镜头", "ar": "عدسة-كاميرا-dslr", "be": "об\'ективы-dslr", "bg": "обективи-dslr", "ca": "objectiu-dslr", "et": "dslr-objektiiv", "nl": "dslr-lens" }',
                    'parent_id' => 62,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            104 =>
                array (
                    'id' => 237,
                    'name' => '{ "en": "Mirrorless Lens", "bn": "মিররলেস লেন্স", "fr": "Objectif sans miroir", "zh": "无反镜头", "ar": "عدسة بدون مرآة", "be": "Бездзеркальны аб\'ектыў", "bg": "Обектив без огледален", "ca": "Objectiu sense mirall", "et": "Peeglivaba objektiiv", "nl": "Mirrorless Lens" }',
                    'slug' => '{ "en": "mirrorless-lens", "bn": "মিররলেস-লেন্স", "fr": "objectif-sans-miroir", "zh": "无反镜头", "ar": "عدسة-بدون-مرآة", "be": "бездзеркальны-аб\'ектыў", "bg": "обектив-без-огледален", "ca": "objectiu-sense-mirall", "et": "peeglivaba-objektiiv", "nl": "mirrorless-lens" }',
                    'parent_id' => 62,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            105 =>
                array (
                    'id' => 238,
                    'name' => '{ "en": "Special Camera Lens", "bn": "বিশেষ ক্যামেরা লেন্স", "fr": "Objectif spécial pour appareil photo", "zh": "特殊相机镜头", "ar": "عدسة الكاميرا الخاصة", "be": "Спецыяльны аб\'ектыў камеры", "bg": "Специален обектив на камерата", "ca": "Objectiu especial per a càmera", "et": "Eripärane kaameraobjektiiv", "nl": "Speciale Cameralens" }',
                    'slug' => '{ "en": "special-camera-lens", "bn": "বিশেষ-ক্যামেরা-লেন্স", "fr": "objectif-spécial-pour-appareil-photo", "zh": "特殊相机镜头", "ar": "عدسة-الكاميرا-الخاصة", "be": "спецыяльны-аб\'ектыў-камеры", "bg": "специален-обектив-на-камерата", "ca": "objectiu-especial-per-a-càmera", "et": "eripärane-kaameraobjektiiv", "nl": "speciale-cameralens" }',
                    'parent_id' => 62,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            106 =>
                array (
                    'id' => 239,
                    'name' => '{ "en": "Tripods & Monopods", "bn": "ট্রাইপড এবং মনোপড", "fr": "Trépieds et monopodes", "zh": "三脚架和单脚架", "ar": "ثلاثيات وأحاديات", "be": "Трыподы і манаподы", "bg": "Триподи и моноподи", "ca": "Trípodes i monòpodes", "et": "Statiivid ja üksijalad", "nl": "Statieven & Monopods" }',
                    'slug' => '{ "en": "tripods-monopods", "bn": "ট্রাইপড-এবং-মনোপড", "fr": "trépieds-et-monopodes", "zh": "三脚架和单脚架", "ar": "ثلاثيات-وأحاديات", "be": "трыподы-і-манаподы", "bg": "триподи-и-моноподи", "ca": "trípodes-i-monòpodes", "et": "statiivid-ja-üksijalad", "nl": "statieven-monopods" }',
                    'parent_id' => 62,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            107 =>
                array (
                    'id' => 240,
                    'name' => '{ "en": "Camera Cases, Covers and Bags", "bn": "ক্যামেরা কেস, কভার এবং ব্যাগ", "fr": "Étuis, housses et sacs pour appareils photo", "zh": "相机套、保护壳和包袋", "ar": "حقائب وأغطية الكاميرا", "be": "Кавалкі, ваконы і сумкі для фотаздымкаў", "bg": "Калъфи, капаци и чанти за камери", "ca": "Fundes, cobertes i bosses per a càmeres", "et": "Kaamerakotid, kaaned ja kotid", "nl": "Camerahoezen, -covers en -tassen" }',
                    'slug' => '{ "en": "camera-cases-covers-bags", "bn": "ক্যামেরা-কেস,-কভার-এবং-ব্যাগ", "fr": "étuis-housses-et-sacs-pour-appareils-photo", "zh": "相机套、保护壳和包袋", "ar": "حقائب-وأغطية-الكاميرا", "be": "кавалкі,-ваконы-і-сумкі-для-фотаздымкаў", "bg": "калъфи,-капаци-и-чанти-за-камери", "ca": "fundes-cobertes-i-bosses-per-a-càmeres", "et": "kaamerakotid-kaaned-ja-kotid", "nl": "camerahoezen-covers-en-tassen" }',
                    'parent_id' => 62,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            108 =>
                array (
                    'id' => 241,
                    'name' => '{ "en": "Lighting & Studio Equipment", "bn": "লাইটিং এবং স্টুডিও উপকরণ", "fr": "Éclairage et équipement de studio", "zh": "灯光和工作室设备", "ar": "إضاءة ومعدات الاستوديو", "be": "Светлаперацоўка і студыйнае абсталяванне", "bg": "Осветление и студийно оборудване", "ca": "Il·luminació i equipament d\'estudi", "et": "Valgustus- ja stuudioseadmed", "nl": "Verlichting & Studiomateriaal" }',
                    'slug' => '{ "en": "lighting-studio-equipment", "bn": "লাইটিং-এবং-স্টুডিও-উপকরণ", "fr": "éclairage-et-équipement-de-studio", "zh": "灯光和工作室设备", "ar": "إضاءة-ومعدات-الاستوديو", "be": "светлаперацоўка-і-студыйнае-абсталяванне", "bg": "осветление-и-студийно-оборудване", "ca": "il·luminació-i-equipament-d\'estudi", "et": "valgustus-ja-stuudioseadmed", "nl": "verlichting-studiomateriaal" }',
                    'parent_id' => 62,
                    'order_by' => 7,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            109 =>
                array (
                    'id' => 242,
                    'name' => '{ "en": "Dry Box", "bn": "ড্রাই বক্স", "fr": "Boîte sèche", "zh": "干燥箱", "ar": "صندوق جاف", "be": "Сухая скрынка", "bg": "Сух контейнер", "ca": "Caixa seca", "et": "Kuivkast", "nl": "Droogkast" }',
                    'slug' => '{ "en": "dry-box", "bn": "ড্রাই-বক্স", "fr": "boite-seche", "zh": "干燥箱", "ar": "صندوق-جاف", "be": "сухая-скрынка", "bg": "сух-контейнер", "ca": "caixa-seca", "et": "kuivkast", "nl": "droogkast" }',
                    'parent_id' => 62,
                    'order_by' => 8,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            110 =>
                array (
                    'id' => 243,
                    'name' => '{ "en": "Batteries", "bn": "ব্যাটারি", "fr": "Batteries", "zh": "电池", "ar": "بطاريات", "be": "Батарэі", "bg": "Батерии", "ca": "Bateries", "et": "Patareid", "nl": "Batterijen" }',
                    'slug' => '{ "en": "batteries", "bn": "ব্যাটারি", "fr": "batteries", "zh": "电池", "ar": "بطاريات", "be": "батарэі", "bg": "батерии", "ca": "bateries", "et": "patareid", "nl": "batterijen" }',
                    'parent_id' => 62,
                    'order_by' => 9,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            111 =>
                array (
                    'id' => 244,
                    'name' => '{ "en": "Monitors", "bn": "মনিটর", "fr": "Écrans", "zh": "显示器", "ar": "شاشات", "be": "Маніторы", "bg": "Монитори", "ca": "Monitors", "et": "Monitorid", "nl": "Monitoren" }',
                    'slug' => '{ "en": "monitors", "bn": "মনিটর", "fr": "écrans", "zh": "显示器", "ar": "شاشات", "be": "маніторы", "bg": "монитори", "ca": "monitors", "et": "monitorid", "nl": "monitoren" }',
                    'parent_id' => 63,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            112 =>
                array (
                    'id' => 245,
                    'name' => '{ "en": "Mice", "bn": "মাউস", "fr": "Souris", "zh": "鼠标", "ar": "فئران", "be": "Мышы", "bg": "Мишки", "ca": "Mice", "et": "Hiired", "nl": "Muizen" }',
                    'slug' => '{ "en": "mice", "bn": "মাউস", "fr": "souris", "zh": "鼠标", "ar": "فئران", "be": "мышы", "bg": "мишки", "ca": "mice", "et": "hiired", "nl": "muizen" }',
                    'parent_id' => 63,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            113 =>
                array (
                    'id' => 246,
                    'name' => '{ "en": "PC Audio", "bn": "পিসি অডিও", "fr": "Audio PC", "zh": "PC 音频", "ar": "صوت الكمبيوتر", "be": "ПК аўдыё", "bg": "PC аудио", "ca": "Àudio PC", "et": "Arvuti heli", "nl": "PC-audio" }',
                    'slug' => '{ "en": "pc-audio", "bn": "পিসি-অডিও", "fr": "audio-pc", "zh": "PC 音频", "ar": "صوت-الكمبيوتر", "be": "ПК-аўдыё", "bg": "PC-аудио", "ca": "àudio-pc", "et": "arvuti-heli", "nl": "pc-audio" }',
                    'parent_id' => 63,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            114 =>
                array (
                    'id' => 247,
                    'name' => '{ "en": "Keyboards", "bn": "কীবোর্ড", "fr": "Claviers", "zh": "键盘", "ar": "لوحات المفاتيح", "be": "Клавіятуры", "bg": "Клавиатури", "ca": "Teclats", "et": "Klaviatuurid", "nl": "Toetsenborden" }',
                    'slug' => '{ "en": "keyboards", "bn": "কীবোর্ড", "fr": "claviers", "zh": "键盘", "ar": "لوحات-المفاتيح", "be": "клавіятуры", "bg": "клавиатури", "ca": "teclats", "et": "klaviatuurid", "nl": "toetsenborden" }',
                    'parent_id' => 63,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            115 =>
                array (
                    'id' => 248,
                    'name' => '{ "en": "Mice & Keyboard Combos", "bn": "মাউস এবং কীবোর্ড কম্বো", "fr": "Combinaisons souris et clavier", "zh": "鼠标和键盘组合", "ar": "مجموعات فأرة ولوحة مفاتيح", "be": "Камбінацыі мышы і клавіятуры", "bg": "Комбинации мишка и клавиатура", "ca": "Combos de ratolí i teclat", "et": "Hiire ja klaviatuuri kombod", "nl": "Muizen & Toetsenbord Combinaties" }',
                    'slug' => '{ "en": "mice-keyboard-combos", "bn": "মাউস-এবং-কীবোর্ড-কম্বো", "fr": "combinaisons-souris-et-clavier", "zh": "鼠标和键盘组合", "ar": "مجموعات-فأرة-ولوحة-مفاتيح", "be": "камбінацыі-мышы-і-клавіятуры", "bg": "комбинации-мишка-и-клавиатура", "ca": "combos-de-ratolí-i-teclat", "et": "hiire-ja-klaviatuuri-kombod", "nl": "muizen-toetsenbord-combinaties" }',
                    'parent_id' => 63,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            116 =>
                array (
                    'id' => 249,
                    'name' => '{ "en": "Power Cord & Adaptors", "bn": "পাওয়ার কর্ড এবং অ্যাডাপ্টার", "fr": "Cordon d\'alimentation et adaptateurs", "zh": "电源线和适配器", "ar": "سلك الطاقة والمحولات", "be": "Кабель жывіцця і адаптары", "bg": "Захранващ кабел и адаптери", "ca": "Cable d\'alimentació i adaptadors", "et": "Toitejuhe ja adapterid", "nl": "Stroomkabel & Adapters" }',
                    'slug' => '{ "en": "power-cord-adaptors", "bn": "পাওয়ার-কর্ড-এবং-অ্যাডাপ্টার", "fr": "cordon-dalimentation-et-adaptateurs", "zh": "电源线和适配器", "ar": "سلك-الطاقة-والمحولات", "be": "кабель-жывіцця-і-адаптары", "bg": "захранващ-кабел-и-адаптери", "ca": "cable-dalimentació-i-adaptadors", "et": "toitejuhe-ja-adapterid", "nl": "stroomkabel-adapters" }',
                    'parent_id' => 63,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            117 =>
                array (
                    'id' => 250,
                    'name' => '{ "en": "External Hard Drives", "bn": "এক্সটার্নাল হার্ড ড্রাইভ", "fr": "Disques durs externes", "zh": "外部硬盘驱动器", "ar": "أقراص صلبة خارجية", "be": "Знешнія жорсткія дыскі", "bg": "Външни хард дискове", "ca": "Discs durs externs", "et": "Välised kõvakettad", "nl": "Externe Harde Schijven" }',
                    'slug' => '{ "en": "external-hard-drives", "bn": "এক্সটার্নাল-হার্ড-ড্রাইভ", "fr": "disques-durs-externes", "zh": "外部硬盘驱动器", "ar": "أقراص-صلبة-خارجية", "be": "знешнія-жорсткія-дыскі", "bg": "външни-хард-дискове", "ca": "discs-durs-externs", "et": "välised-kõvakettad", "nl": "externe-harde-schijven" }',
                    'parent_id' => 64,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            118 =>
                array (
                    'id' => 251,
                    'name' => '{ "en": "Internal Hard Drives", "bn": "অভ্যন্তরীণ হার্ড ড্রাইভ", "fr": "Disques durs internes", "zh": "内部硬盘驱动器", "ar": "أقراص صلبة داخلية", "be": "Унутраныя жорсткія дыскі", "bg": "Вътрешни хард дискове", "ca": "Discs durs interns", "et": "Sisemised kõvakettad", "nl": "Interne Harde Schijven" }',
                    'slug' => '{ "en": "internal-hard-drives", "bn": "অভ্যন্তরীণ-হার্ড-ড্রাইভ", "fr": "disques-durs-internes", "zh": "内部硬盘驱动器", "ar": "أقراص-صلبة-داخلية", "be": "унутраныя-жорсткія-дыскі", "bg": "вътрешни-хард-дискове", "ca": "discs-durs-interns", "et": "sisemised-kõvakettad", "nl": "interne-harde-schijven" }',
                    'parent_id' => 64,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            119 =>
                array (
                    'id' => 252,
                    'name' => '{ "en": "Flash Drives", "bn": "ফ্ল্যাশ ড্রাইভ", "fr": "Clés USB", "zh": "闪存驱动器", "ar": "محركات فلاش", "be": "Флэш-дыскі", "bg": "Флаш устройства", "ca": "Memòries USB", "et": "Flash Drive\'id", "nl": "USB-sticks" }',
                    'slug' => '{ "en": "flash-drives", "bn": "ফ্ল্যাশ-ড্রাইভ", "fr": "clés-usb", "zh": "闪存驱动器", "ar": "محركات-فلاش", "be": "флэш-дыскі", "bg": "флаш-устройства", "ca": "memòries-usb", "et": "flash-drive\'id", "nl": "usb-sticks" }',
                    'parent_id' => 64,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            120 =>
                array (
                    'id' => 253,
                    'name' => '{ "en": "OTG Drives", "bn": "ওটিজি ড্রাইভ", "fr": "Clés USB OTG", "zh": "OTG 驱动器", "ar": "محركات OTG", "be": "OTG-дыскі", "bg": "OTG устройства", "ca": "Memòries OTG", "et": "OTG Drive\'id", "nl": "OTG-sticks" }',
                    'slug' => '{ "en": "otg-drives", "bn": "ওটিজি-ড্রাইভ", "fr": "clés-usb-otg", "zh": "OTG-驱动器", "ar": "محركات-otg", "be": "otg-дыскі", "bg": "otg-устройства", "ca": "memòries-otg", "et": "otg-drive\'id", "nl": "otg-sticks" }',
                    'parent_id' => 64,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            121 =>
                array (
                    'id' => 254,
                    'name' => '{ "en": "Printers", "bn": "প্রিন্টার", "fr": "Imprimantes", "zh": "打印机", "ar": "طابعات", "be": "Принтэры", "bg": "Принтери", "ca": "Impressores", "et": "Printerid", "nl": "Printers" }',
                    'slug' => '{ "en": "printers", "bn": "প্রিন্টার", "fr": "imprimantes", "zh": "打印机", "ar": "طابعات", "be": "прынтэры", "bg": "принтери", "ca": "impressores", "et": "printerid", "nl": "printers" }',
                    'parent_id' => 65,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            122 =>
                array (
                    'id' => 255,
                    'name' => '{ "en": "Ink & Toners", "bn": "ইঙ্ক এবং টোনার", "fr": "Encre et toners", "zh": "墨水和墨盒", "ar": "حبر ومواد الطباعة", "be": "Чарнилы і тонеры", "bg": "Мастила и тонери", "ca": "Tinta i tòners", "et": "Tindid ja toonerid", "nl": "Inkt & Toners" }',
                    'slug' => '{ "en": "ink-toners", "bn": "ইঙ্ক-এবং-টোনার", "fr": "encre-et-toners", "zh": "墨水和墨盒", "ar": "حبر-ومواد-الطباعة", "be": "чарнилы-і-тонеры", "bg": "мастила-и-тонери", "ca": "tinta-i-tòners", "et": "tindid-ja-toonerid", "nl": "inkt-toners" }',
                    'parent_id' => 65,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            123 =>
                array (
                    'id' => 256,
                    'name' => '{ "en": "Printer Stands", "bn": "প্রিন্টার স্ট্যান্ড", "fr": "Supports d\'imprimante", "zh": "打印机支架", "ar": "أرفف الطابعة", "be": "Стойкі для прынтэраў", "bg": "Стойки за принтер", "ca": "Estatges d\'impressora", "et": "Printerite alused", "nl": "Printerstandaards" }',
                    'slug' => '{ "en": "printer-stands", "bn": "প্রিন্টার-স্ট্যান্ড", "fr": "supports-dimprimante", "zh": "打印机支架", "ar": "أرفف-الطابعة", "be": "стойкі-для-прынтэраў", "bg": "стойки-за-принтер", "ca": "estatges-dimpressora", "et": "printerite-alused", "nl": "printerstandaards" }',
                    'parent_id' => 65,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            124 =>
                array (
                    'id' => 257,
                    'name' => '{ "en": "Fax Machines", "bn": "ফ্যাক্স মেশিন", "fr": "Machines à faxer", "zh": "传真机", "ar": "آلات الفاكس", "be": "Факсавыя машыны", "bg": "Факс апарати", "ca": "Màquines de fax", "et": "Faksiaparaadid", "nl": "Faxapparaten" }',
                    'slug' => '{ "en": "fax-machines", "bn": "ফ্যাক্স-মেশিন", "fr": "machines-à-faxer", "zh": "传真机", "ar": "آلات-الفاكس", "be": "факсавыя-машыны", "bg": "факс-апарати", "ca": "màquines-de-fax", "et": "faksiaparaadid", "nl": "faxapparaten" }',
                    'parent_id' => 65,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            125 =>
                array (
                    'id' => 258,
                    'name' => '{ "en": "Graphic Cards", "bn": "গ্রাফিক কার্ড", "fr": "Cartes graphiques", "zh": "显卡", "ar": "بطاقات الرسومات", "be": "Графічныя карты", "bg": "Графични карти", "ca": "Targetes gràfiques", "et": "Graafikakaardid", "nl": "Grafische Kaarten" }',
                    'slug' => '{ "en": "graphic-cards", "bn": "গ্রাফিক-কার্ড", "fr": "cartes-graphiques", "zh": "显卡", "ar": "بطاقات-الرسومات", "be": "графічныя-карты", "bg": "графични-карти", "ca": "targetes-gràfiques", "et": "graafikakaardid", "nl": "grafische-kaarten" }',
                    'parent_id' => 66,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            126 =>
                array (
                    'id' => 259,
                    'name' => '{ "en": "Desktop Casings", "bn": "ডেস্কটপ কেসিং", "fr": "Boîtiers de bureau", "zh": "台式机机壳", "ar": "أغلفة سطح المكتب", "be": "Кафры палітоў", "bg": "Корпуси за настолни компютри", "ca": "Caixes d\'ordinador", "et": "Lauaarvuti korpused", "nl": "Desktop Behuizingen" }',
                    'slug' => '{ "en": "desktop-casings", "bn": "ডেস্কটপ-কেসিং", "fr": "boîtiers-de-bureau", "zh": "台式机机壳", "ar": "أغلفة-سطح-المكتب", "be": "кафры-палітоў", "bg": "корпуси-за-настолни-компютри", "ca": "caixes-dordinador", "et": "lauaarvuti-korpused", "nl": "desktop-behuizingen" }',
                    'parent_id' => 66,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            127 =>
                array (
                    'id' => 260,
                    'name' => '{ "en": "Motherboards", "bn": "মাদারবোর্ড", "fr": "Cartes mères", "zh": "主板", "ar": "لوحات الأم", "be": "Матэрборды", "bg": "Дънни платки", "ca": "Plaques base", "et": "Emaplaadid", "nl": "Moederborden" }',
                    'slug' => '{ "en": "motherboards", "bn": "মাদারবোর্ড", "fr": "cartes-mères", "zh": "主板", "ar": "لوحات-الأم", "be": "матэрборды", "bg": "дънни-платки", "ca": "plaques-base", "et": "emaplaadid", "nl": "moederborden" }',
                    'parent_id' => 66,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            128 =>
                array (
                    'id' => 261,
                    'name' => '{ "en": "Fans & Heatsinks", "bn": "ফ্যান এবং হীটসিংক", "fr": "Ventilateurs et dissipateurs thermiques", "zh": "风扇和散热器", "ar": "المراوح ومشتتات الحرارة", "be": "Вентылятары і радыятары", "bg": "Вентилатори и охладители", "ca": "Ventiladors i dissipadors de calor", "et": "Ventiilatorid ja jahutusradiaatorid", "nl": "Ventilatoren & Koellichamen" }',
                    'slug' => '{ "en": "fans-heatsinks", "bn": "ফ্যান-এবং-হীটসিংক", "fr": "ventilateurs-et-dissipateurs-thermiques", "zh": "风扇和散热器", "ar": "المراوح-ومشتتات-الحرارة", "be": "вентылятары-і-радыятары", "bg": "вентилатори-и-охладители", "ca": "ventiladors-i-dissipadors-de-calor", "et": "ventiilatorid-ja-jahutusradiaatorid", "nl": "ventilatoren-koellichamen" }',
                    'parent_id' => 66,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            129 =>
                array (
                    'id' => 262,
                    'name' => '{ "en": "RAM", "bn": "র‍্যাম", "fr": "RAM", "zh": "内存", "ar": "الذاكرة العشوائية", "be": "RAM", "bg": "RAM", "ca": "RAM", "et": "RAM", "nl": "RAM" }',
                    'slug' => '{ "en": "ram", "bn": "র‍্যাম", "fr": "ram", "zh": "内存", "ar": "الذاكرة-العشوائية", "be": "ram", "bg": "ram", "ca": "ram", "et": "ram", "nl": "ram" }',
                    'parent_id' => 66,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            130 =>
                array (
                    'id' => 263,
                    'name' => '{ "en": "Processors", "bn": "প্রসেসর", "fr": "Processeurs", "zh": "处理器", "ar": "المعالجات", "be": "Процэсары", "bg": "Процесори", "ca": "Processadors", "et": "Protsessorid", "nl": "Processoren" }',
                    'slug' => '{ "en": "processors", "bn": "প্রসেসর", "fr": "processeurs", "zh": "处理器", "ar": "المعالجات", "be": "працэсары", "bg": "процесори", "ca": "processadors", "et": "protsessorid", "nl": "processoren" }',
                    'parent_id' => 66,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            131 =>
                array (
                    'id' => 264,
                    'name' => '{ "en": "Access Points", "bn": "এক্সেস পয়েন্ট", "fr": "Points d\'accès", "zh": "接入点", "ar": "نقاط الوصول", "be": "Точкі доступу", "bg": "Точки за достъп", "ca": "Punts d\'accés", "et": "Juurdepääsupunktid", "nl": "Toegangspunten" }',
                    'slug' => '{ "en": "access-points", "bn": "এক্সেস-পয়েন্ট", "fr": "points-d\'accès", "zh": "接入点", "ar": "نقاط-الوصول", "be": "точкі-доступу", "bg": "точки-за-достъп", "ca": "punts-d\'accés", "et": "juurdepääsupunktid", "nl": "toegangspunten" }',
                    'parent_id' => 67,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            132 =>
                array (
                    'id' => 265,
                    'name' => '{ "en": "Modems", "bn": "মোডেম", "fr": "Modems", "zh": "调制解调器", "ar": "مودمات", "be": "Модэмы", "bg": "Модеми", "ca": "Modems", "et": "Modemid", "nl": "Modems" }',
                    'slug' => '{ "en": "modems", "bn": "মোডেম", "fr": "modems", "zh": "调制解调器", "ar": "مودمات", "be": "мадэмы", "bg": "модеми", "ca": "modems", "et": "modemid", "nl": "modems" }',
                    'parent_id' => 67,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            133 =>
                array (
                    'id' => 266,
                    'name' => '{ "en": "Network Interface Cards", "bn": "নেটওয়ার্ক ইন্টারফেস কার্ড", "fr": "Cartes d\'interface réseau", "zh": "网络接口卡", "ar": "بطاقات واجهة الشبكة", "be": "Сеткавыя інтэрфейсныя карты", "bg": "Мрежови интерфейсни карти", "ca": "Targetes d\'interfície de xarxa", "et": "Võrguliidese kaardid", "nl": "Netwerkinterfacekaarten" }',
                    'slug' => '{ "en": "network-interface-cards", "bn": "নেটওয়ার্ক-ইন্টারফেস-কার্ড", "fr": "cartes-d\'interface-réseau", "zh": "网络接口卡", "ar": "بطاقات-واجهة-الشبكة", "be": "сеткавыя-інтэрфейсныя-карты", "bg": "мрежови-интерфейсни-карти", "ca": "targetes-d\'interfície-de-xarxa", "et": "võrguliidese-kaardid", "nl": "netwerkinterfacekaarten" }',
                    'parent_id' => 67,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            134 =>
                array (
                    'id' => 267,
                    'name' => '{ "en": "Network Switches", "bn": "নেটওয়ার্ক সুইচ", "fr": "Commutateurs réseau", "zh": "网络交换机", "ar": "محولات الشبكة", "be": "Сеткавыя камутатары", "bg": "Мрежови превключватели", "ca": "Commutadors de xarxa", "et": "Võrgulülitid", "nl": "Netwerkswitches" }',
                    'slug' => '{ "en": "network-switches", "bn": "নেটওয়ার্ক-সুইচ", "fr": "commutateurs-réseau", "zh": "网络交换机", "ar": "محولات-الشبكة", "be": "сеткавыя-камутатары", "bg": "мрежови-превключватели", "ca": "commutadors-de-xarxa", "et": "võrgulülitid", "nl": "netwerkswitches" }',
                    'parent_id' => 67,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            135 =>
                array (
                    'id' => 268,
                    'name' => '{ "en": "Routers", "bn": "রাউটার", "fr": "Routeurs", "zh": "路由器", "ar": "أجهزة التوجيه", "be": "Раўтары", "bg": "Рутери", "ca": "Enrutadors", "et": "Ruuterid", "nl": "Routers" }',
                    'slug' => '{ "en": "routers", "bn": "রাউটার", "fr": "routeurs", "zh": "路由器", "ar": "أجهزة-التوجيه", "be": "раўтары", "bg": "рутери", "ca": "enrutadors", "et": "ruuterid", "nl": "routers" }',
                    'parent_id' => 67,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            136 =>
                array (
                    'id' => 269,
                    'name' => '{ "en": "Wireless USB Adapters", "bn": "বেতার ইউএসবি অ্যাডাপ্টার", "fr": "Adaptateurs USB sans fil", "zh": "无线USB适配器", "ar": "محولات USB لاسلكية", "be": "Бесправадныя USB-адаптары", "bg": "Безжични USB адаптери", "ca": "Adaptadors USB sense fil", "et": "Juhtmevabad USB-adapterid", "nl": "Draadloze USB-adapters" }',
                    'slug' => '{ "en": "wireless-usb-adapters", "bn": "বেতার-ইউএসবি-অ্যাডাপ্টার", "fr": "adaptateurs-usb-sans-fil", "zh": "无线USB适配器", "ar": "محولات-USB-لاسلكية", "be": "бесправадныя-USB-адаптары", "bg": "безжични-USB-адаптери", "ca": "adaptadors-USB-sense-fil", "et": "juhtmevabad-USB-adapterid", "nl": "draadloze-USB-adapters" }',
                    'parent_id' => 67,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            137 =>
                array (
                    'id' => 270,
                    'name' => '{ "en": "Educational Media", "bn": "শিক্ষামূলক মিডিয়া", "fr": "Médias éducatifs", "zh": "教育媒体", "ar": "وسائل الإعلام التعليمية", "be": "Адукацыйныя медыя", "bg": "Образователни медии", "ca": "Mitjans educatius", "et": "Õppematerjalid", "nl": "Educatieve Media" }',
                    'slug' => '{ "en": "educational-media", "bn": "শিক্ষামূলক-মিডিয়া", "fr": "médias-éducatifs", "zh": "教育媒体", "ar": "وسائل-الإعلام-التعليمية", "be": "адукацыйныя-медыя", "bg": "образователни-медии", "ca": "mitjans-educatius", "et": "õppematerjalid", "nl": "educatieve-media" }',
                    'parent_id' => 68,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            138 =>
                array (
                    'id' => 271,
                    'name' => '{ "en": "Operating System", "bn": "অপারেটিং সিস্টেম", "fr": "Système d\'exploitation", "zh": "操作系统", "ar": "نظام التشغيل", "be": "Аперацыйная сістэма", "bg": "Операционна система", "ca": "Sistema operatiu", "et": "Operatsioonisüsteem", "nl": "Besturingssysteem" }',
                    'slug' => '{ "en": "operating-system", "bn": "অপারেটিং-সিস্টেম", "fr": "système-d\'exploitation", "zh": "操作系统", "ar": "نظام-التشغيل", "be": "аперацыйная-сістэма", "bg": "операционна-система", "ca": "sistema-operatiu", "et": "operatsioonisüsteem", "nl": "besturingssysteem" }',
                    'parent_id' => 68,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            139 =>
                array (
                    'id' => 272,
                    'name' => '{ "en": "PC Games", "bn": "পিসি গেমস", "fr": "Jeux PC", "zh": "电脑游戏", "ar": "ألعاب الكمبيوتر", "be": "ПК гульні", "bg": "PC игри", "ca": "Jocs per a PC", "et": "Arvutimängud", "nl": "PC-spellen" }',
                    'slug' => '{ "en": "pc-games", "bn": "পিসি-গেমস", "fr": "jeux-PC", "zh": "电脑游戏", "ar": "ألعاب-الكمبيوتر", "be": "ПК-гульні", "bg": "PC-игри", "ca": "jocs-per-a-PC", "et": "arvutimängud", "nl": "PC-spellen" }',
                    'parent_id' => 68,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            140 =>
                array (
                    'id' => 273,
                    'name' => '{ "en": "Security Software", "bn": "সিকিউরিটি সফটওয়্যার", "fr": "Logiciel de sécurité", "zh": "安全软件", "ar": "برامج الأمان", "be": "Праграмнае забеспячэнне бяспекі", "bg": "Софтуер за сигурност", "ca": "Programari de seguretat", "et": "Turvatarkvara", "nl": "Beveiligingssoftware" }',
                    'slug' => '{ "en": "security-software", "bn": "সিকিউরিটি-সফটওয়্যার", "fr": "logiciel-de-sécurité", "zh": "安全软件", "ar": "برامج-الأمان", "be": "праграмнае-забеспячэнне-бяспекі", "bg": "софтуер-за-сигурност", "ca": "programari-de-seguretat", "et": "turvatarkvara", "nl": "beveiligingssoftware" }',
                    'parent_id' => 68,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            141 =>
                array (
                    'id' => 274,
                    'name' => '{ "en": "Imported Cars", "bn": "আমদানিকৃত গাড়ি", "fr": "Voitures importées", "zh": "进口汽车", "ar": "السيارات المستوردة", "be": "Імпартныя аўтамабілі", "bg": "Вносни коли", "ca": "Cotxes importats", "et": "Imporditud autod", "nl": "Geïmporteerde auto\'s" }',
                    'slug' => '{ "en": "imported-cars", "bn": "আমদানিকৃত-গাড়ি", "fr": "voitures-importées", "zh": "进口汽车", "ar": "السيارات-المستوردة", "be": "імпартныя-аўтамабілі", "bg": "вносни-коли", "ca": "cotxes-importats", "et": "imporditud-autod", "nl": "geïmporteerde-auto\'s" }',
                    'parent_id' => 169,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            142 =>
                array (
                    'id' => 275,
                    'name' => '{ "en": "Sedans", "bn": "সেডান", "fr": "Berlines", "zh": "轿车", "ar": "سيارات الصالون", "be": "Седаны", "bg": "Седани", "ca": "Berlina", "et": "Sedaanid", "nl": "Sedans" }',
                    'slug' => '{ "en": "sedans", "bn": "সেডান", "fr": "berlines", "zh": "轿车", "ar": "سيارات-الصالون", "be": "седаны", "bg": "седани", "ca": "berlina", "et": "sedaanid", "nl": "sedans" }',
                    'parent_id' => 169,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            143 =>
                array (
                    'id' => 276,
                    'name' => '{ "en": "SUVs", "bn": "এসইউভি", "fr": "SUV", "zh": "SUV", "ar": "سيارات الدفع الرباعي", "be": "SUV", "bg": "SUV", "ca": "SUV", "et": "SUV-d", "nl": "SUV\'s" }',
                    'slug' => '{ "en": "SUVs", "bn": "এসইউভি", "fr": "SUV", "zh": "SUV", "ar": "سيارات-الدفع-الرباعي", "be": "SUV", "bg": "SUV", "ca": "SUV", "et": "SUV-d", "nl": "SUV\'s" }',
                    'parent_id' => 169,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            144 =>
                array (
                    'id' => 277,
                    'name' => '{ "en": "Trucks", "bn": "ট্রাক", "fr": "Camions", "zh": "卡车", "ar": "شاحنات", "be": "Грузавыя аўтамабілі", "bg": "Камиони", "ca": "Camió", "et": "Veokid", "nl": "Vrachtwagens" }',
                    'slug' => '{ "en": "trucks", "bn": "ট্রাক", "fr": "camions", "zh": "卡车", "ar": "شاحنات", "be": "грузавыя-аўтамабілі", "bg": "камиони", "ca": "camió", "et": "veokid", "nl": "vrachtwagens" }',
                    'parent_id' => 169,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            145 =>
                array (
                    'id' => 279,
                    'name' => '{ "en": "Transmission Fluids", "bn": "ট্রান্সমিশন ফ্লুইড", "fr": "Fluides de transmission", "zh": "传动液", "ar": "سوائل النقل", "be": "Трансмісійныя рэчывы", "bg": "Трансмисионни течности", "ca": "Líquids de transmissió", "et": "Käigukastivedelikud", "nl": "Transmissie Vloeistoffen" }',
                    'slug' => '{ "en": "transmission-fluids", "bn": "ট্রান্সমিশন-ফ্লুইড", "fr": "fluides-de-transmission", "zh": "传动液", "ar": "سوائل-النقل", "be": "трансмісійныя-рэчывы", "bg": "трансмисионни-течности", "ca": "líquids-de-transmissió", "et": "käigukastivedelikud", "nl": "transmissie-vloeistoffen" }',
                    'parent_id' => 170,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            146 =>
                array (
                    'id' => 280,
                    'name' => '{ "en": "Seat Covers & Accessories", "bn": "আসনের কভার এবং অ্যাক্সেসরিজ", "fr": "Housses de siège et accessoires", "zh": "座套和配件", "ar": "أغطية المقاعد والملحقات", "be": "Крышкі сядзень і аксесуары", "bg": "Калъфи за седалки и аксесоари", "ca": "Fundes de seient i accessoris", "et": "Istmete katted ja tarvikud", "nl": "Autostoelhoezen & Accessoires" }',
                    'slug' => '{ "en": "seat-covers--accessories", "bn": "আসনের-কভার-এবং-অ্যাক্সেসরিজ", "fr": "housses-de-siège-et-accessoires", "zh": "座套和配件", "ar": "أغطية-المقاعد-والملحقات", "be": "крышкі-сядзень-і-аксесуары", "bg": "калъфи-за-седалки-и-аксесоари", "ca": "fundes-de-seient-i-accessoris", "et": "istmete-katted-ja-tarvikud", "nl": "autostoelhoezen-&-accessoires" }',
                    'parent_id' => 171,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            147 =>
                array (
                    'id' => 282,
                    'name' => '{ "en": "Air Fresheners", "bn": "বায়ু তাজা করণ", "fr": "Assainisseurs d\'air", "zh": "空气清新剂", "ar": "معطرات الهواء", "be": "Освежыльнікі паветра", "bg": "Освежители на въздуха", "ca": "Ambientadors", "et": "Õhuvärskendajad", "nl": "Luchtverfrissers" }',
                    'slug' => '{ "en": "air-fresheners", "bn": "বায়ু-তাজা-করণ", "fr": "assainisseurs-d\'air", "zh": "空气清新剂", "ar": "معطرات-الهواء", "be": "асвежыльнікі-паветра", "bg": "освежители-на-въздуха", "ca": "ambientadors", "et": "õhuvärskendajad", "nl": "luchtverfrissers" }',
                    'parent_id' => 171,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            148 =>
                array (
                    'id' => 283,
                    'name' => '{ "en": "Covers", "bn": "আবরণ", "fr": "Couvertures", "zh": "盖子", "ar": "أغطية", "be": "Кавры", "bg": "Капаци", "ca": "Cobertes", "et": "Katted", "nl": "Hoezen" }',
                    'slug' => '{ "en": "covers", "bn": "আবরণ", "fr": "couvertures", "zh": "盖子", "ar": "أغطية", "be": "кавры", "bg": "капаци", "ca": "cobertes", "et": "katted", "nl": "hoezen" }',
                    'parent_id' => 172,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            149 =>
                array (
                    'id' => 284,
                    'name' => '{ "en": "Car Polishes & Waxes", "bn": "গাড়ি পোলিশ এবং ওয়াক্স", "fr": "Polis et cires pour voitures", "zh": "汽车抛光和蜡", "ar": "ملمعات وشموع السيارات", "be": "Аўтапаліш і воскі", "bg": "Полиращи и восъци за коли", "ca": "Poliments i cires per a cotxes", "et": "Auto poleerimisvahendid ja vahad", "nl": "Auto Polijsten & Wassen" }',
                    'slug' => '{ "en": "car-polishes--waxes", "bn": "গাড়ি-পোলিশ-এবং-ওয়াক্স", "fr": "polis-et-cires-pour-voitures", "zh": "汽车抛光和蜡", "ar": "ملمعات-وشموع-السيارات", "be": "аўтапаліш-і-воскі", "bg": "полиращи-и-восъци-за-коли", "ca": "poliments-i-cires-per-a-cotxes", "et": "auto-poleerimisvahendid-ja-vahad", "nl": "auto-polijsten-&-wassen" }',
                    'parent_id' => 173,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            150 =>
                array (
                    'id' => 285,
                    'name' => '{ "en": "Vacuums", "bn": "ভ্যাকুয়াম", "fr": "Aspirateurs", "zh": "吸尘器", "ar": "مكانس كهربائية", "be": "Пылесасы", "bg": "Прахосмукачки", "ca": "Aspiradors", "et": "Tolmuimejad", "nl": "Stofzuigers" }',
                    'slug' => '{ "en": "vacuums", "bn": "ভ্যাকুয়াম", "fr": "aspirateurs", "zh": "吸尘器", "ar": "مكانس-كهربائية", "be": "пылесасы", "bg": "прахосмукачки", "ca": "aspiradors", "et": "tolmuimejad", "nl": "stofzuigers" }',
                    'parent_id' => 174,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            151 =>
                array (
                    'id' => 286,
                    'name' => '{ "en": "Speakers", "bn": "স্পিকার", "fr": "Haut-parleurs", "zh": "音箱", "ar": "مكبرات الصوت", "be": "Гучнікі", "bg": "Тонколони", "ca": "Altaveus", "et": "Kõlarid", "nl": "Luidsprekers" }',
                    'slug' => '{ "en": "speakers", "bn": "স্পিকার", "fr": "haut-parleurs", "zh": "音箱", "ar": "مكبرات-الصوت", "be": "гучнікі", "bg": "тонколони", "ca": "altaveus", "et": "kõlarid", "nl": "luidsprekers" }',
                    'parent_id' => 176,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            152 =>
                array (
                    'id' => 288,
                    'name' => '{ "en": "Standard Bikes", "bn": "মানমূল্যের সাইকেল", "fr": "Vélos standards", "zh": "标准自行车", "ar": "دراجات قياسية", "be": "Стандартныя веласіпеды", "bg": "Стандартни велосипеди", "ca": "Bicicletes estàndard", "et": "Tavalised jalgrattad", "nl": "Standaardfietsen" }',
                    'slug' => '{ "en": "standard-bikes", "bn": "মানমূল্যের-সাইকেল", "fr": "vélos-standards", "zh": "标准自行车", "ar": "دراجات-قياسية", "be": "стандартныя-веласіпеды", "bg": "стандартни-велосипеди", "ca": "bicicletes-estàndard", "et": "tavalised-jalgrattad", "nl": "standaardfietsen" }',
                    'parent_id' => 177,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            153 =>
                array (
                    'id' => 292,
                    'name' => '{ "en": "Helmet", "bn": "হেলমেট", "fr": "Casque", "zh": "头盔", "ar": "خوذة", "be": "Шлем", "bg": "Каска", "ca": "Casc", "et": "Kiiver", "nl": "Helm" }',
                    'slug' => '{ "en": "helmet", "bn": "হেলমেট", "fr": "casque", "zh": "头盔", "ar": "خوذة", "be": "шлем", "bg": "каска", "ca": "casc", "et": "kiiver", "nl": "helm" }',
                    'parent_id' => 179,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            154 =>
                array (
                    'id' => 293,
                    'name' => '{ "en": "Gloves", "bn": "দস্তানা", "fr": "Gants", "zh": "手套", "ar": "قفازات", "be": "Рукавіцы", "bg": "Ръкавици", "ca": "Guants", "et": "Kindad", "nl": "Handschoenen" }',
                    'slug' => '{ "en": "gloves", "bn": "দস্তানা", "fr": "gants", "zh": "手套", "ar": "قفازات", "be": "рукавіцы", "bg": "ръкавици", "ca": "guants", "et": "kindad", "nl": "handschoenen" }',
                    'parent_id' => 179,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            155 =>
                array (
                    'id' => 294,
                    'name' => '{ "en": "Eyewear", "bn": "চশমা", "fr": "Lunettes", "zh": "眼镜", "ar": "نظارات", "be": "Акуляры", "bg": "Очила", "ca": "Ulleres", "et": "Prillid", "nl": "Brillen" }',
                    'slug' => '{ "en": "eyewear", "bn": "চশমা", "fr": "lunettes", "zh": "眼镜", "ar": "نظارات", "be": "акуляры", "bg": "очила", "ca": "ulleres", "et": "prillid", "nl": "brillen" }',
                    'parent_id' => 179,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            156 =>
                array (
                    'id' => 295,
                    'name' => '{ "en": "Bicycle", "bn": "সাইকেল", "fr": "Vélo", "zh": "自行车", "ar": "دراجة", "be": "Веласіпед", "bg": "Велосипед", "ca": "Bicicleta", "et": "Jalgratas", "nl": "Fiets" }',
                    'slug' => '{ "en": "bicycle", "bn": "সাইকেল", "fr": "vélo", "zh": "自行车", "ar": "دراجة", "be": "веласіпед", "bg": "велосипед", "ca": "bicicleta", "et": "jalgratas", "nl": "fiets" }',
                    'parent_id' => 160,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            157 =>
                array (
                    'id' => 296,
                    'name' => '{ "en": "Bicycle Accessories", "bn": "সাইকেল অ্যাক্সেসরিজ", "fr": "Accessoires de vélo", "zh": "自行车配件", "ar": "ملحقات الدراجات", "be": "Аксесуары для веласіпедаў", "bg": "Аксесоари за велосипед", "ca": "Accessoris per a bicicletes", "et": "Jalgrattatarvikud", "nl": "Fietsaccessoires" }',
                    'slug' => '{ "en": "bicycle-accessories", "bn": "সাইকেল-অ্যাক্সেসরিজ", "fr": "accessoires-de-vélo", "zh": "自行车配件", "ar": "ملحقات-الدراجات", "be": "аксесуары-для-веласіпедаў", "bg": "аксесоари-за-велосипед", "ca": "accessoris-per-a-bicicletes", "et": "jalgrattatarvikud", "nl": "fietsaccessoires" }',
                    'parent_id' => 160,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            158 =>
                array (
                    'id' => 297,
                    'name' => '{ "en": "Boxing Gloves", "bn": "বক্সিং দস্তানা", "fr": "Gants de boxe", "zh": "拳击手套", "ar": "قفازات الملاكمة", "be": "Боксерскія рукавіцы", "bg": "Боксови ръкавици", "ca": "Guants de boxa", "et": "Bokskindad", "nl": "Bokshandschoenen" }',
                    'slug' => '{ "en": "boxing-gloves", "bn": "বক্সিং-দস্তানা", "fr": "gants-de-boxe", "zh": "拳击手套", "ar": "قفازات-الملاكمة", "be": "боксерскія-рукавіцы", "bg": "боксови-ръкавици", "ca": "guants-de-boxa", "et": "bokskindad", "nl": "bokshandschoenen" }',
                    'parent_id' => 161,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            159 =>
                array (
                    'id' => 298,
                    'name' => '{ "en": "Boxing Protective gear", "bn": "বক্সিং সুরক্ষা গিয়ার", "fr": "Équipement de protection pour la boxe", "zh": "拳击保护装备", "ar": "معدات حماية الملاكمة", "be": "Абарончае сяродкі боксу", "bg": "Защитно оборудване за бокс", "ca": "Equipament de protecció de boxa", "et": "Boksi kaitsevarustus", "nl": "Boksbeshermingsuitrusting" }',
                    'slug' => '{ "en": "boxing-protective-gear", "bn": "বক্সিং-সুরক্ষা-গিয়ার", "fr": "équipement-de-protection-pour-la-boxe", "zh": "拳击保护装备", "ar": "معدات-حماية-الملاكمة", "be": "абарончае-сяродкі-боксу", "bg": "защитно-оборудване-за-бокс", "ca": "equipament-de-protecció-de-boxa", "et": "boksi-kaitsevarustus", "nl": "boksbeschermingsuitrusting" }',
                    'parent_id' => 161,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            160 =>
                array (
                    'id' => 300,
                    'name' => '{ "en": "Punching Bags & Accessories", "bn": "পাঞ্চিং ব্যাগ এবং অ্যাক্সেসরিজ", "fr": "Sacs de frappe et accessoires", "zh": "沙袋及配件", "ar": "أكياس الضرب والملحقات", "be": "Панчэры і аксесуары", "bg": "Торби за удари и аксесоари", "ca": "Sacos de pegada i accessoris", "et": "Löökpallid ja tarvikud", "nl": "Bokszakken & Accessoires" }',
                    'slug' => '{ "en": "punching-bags---accessories", "bn": "পাঞ্চিং-ব্যাগ-এবং-অ্যাক্সেসরিজ", "fr": "sacs-de-frappe-et-accessoires", "zh": "沙袋及配件", "ar": "أكياس-الضرب-والملحقات", "be": "панчэры-і-аксесуары", "bg": "торби-за-удари-и-аксесоари", "ca": "sacos-de-pegada-i-accessoris", "et": "löökpallid-ja-tarvikud", "nl": "bokszakken-&-accessoires" }',
                    'parent_id' => 161,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            161 =>
                array (
                    'id' => 301,
                    'name' => '{ "en": "Clothing", "bn": "পোশাক", "fr": "Vêtements", "zh": "服装", "ar": "ملابس", "be": "Адзенне", "bg": "Облекло", "ca": "Roba", "et": "Rõivad", "nl": "Kleding" }',
                    'slug' => '{ "en": "-clothing", "bn": "পোশাক", "fr": "-vêtements", "zh": "-服装", "ar": "-ملابس-", "be": "-адзенне-", "bg": "-облекло", "ca": "-roba", "et": "-rõivad", "nl": "-kleding" }',
                    'parent_id' => 162,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            162 =>
                array (
                    'id' => 302,
                    'name' => '{ "en": "Shoes", "bn": "জুতা", "fr": "Chaussures", "zh": "鞋子", "ar": "أحذية", "be": "Чаравікі", "bg": "Обувки", "ca": "Sabates", "et": "Jalatsid", "nl": "Schoenen" }',
                    'slug' => '{ "en": "shoes", "bn": "জুতা", "fr": "chaussures", "zh": "鞋子", "ar": "أحذية", "be": "чаравікі", "bg": "обувки", "ca": "sabates", "et": "jalatsid", "nl": "schoenen" }',
                    'parent_id' => 162,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            163 =>
                array (
                    'id' => 303,
                    'name' => '{ "en": "Accessories", "bn": "অ্যাক্সেসরিজ", "fr": "Accessoires", "zh": "配件", "ar": "إكسسوارات", "be": "Аксесуары", "bg": "Аксесоари", "ca": "Accessoris", "et": "Tarvikud", "nl": "Accessoires" }',
                    'slug' => '{ "en": "accessories", "bn": "অ্যাক্সেসরিজ", "fr": "accessoires", "zh": "配件", "ar": "إكسسوارات", "be": "аксесуары", "bg": "аксесоари", "ca": "accessoris", "et": "tarvikud", "nl": "accessoires" }',
                    'parent_id' => 162,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            164 =>
                array (
                    'id' => 304,
                    'name' => '{ "en": "Bags", "bn": "ব্যাগ", "fr": "Sacs", "zh": "包", "ar": "حقائب", "be": "Сумкі", "bg": "Чанти", "ca": "Bosses", "et": "Kotid", "nl": "Tassen" }',
                    'slug' => '{ "en": "-bags", "bn": "-ব্যাগ", "fr": "-sacs", "zh": "-包", "ar": "حقائب-", "be": "-сумкі", "bg": "-чанти", "ca": "-bosses", "et": "-kotid", "nl": "-tassen" }',
                    'parent_id' => 162,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            165 =>
                array (
                    'id' => 305,
                    'name' => '{ "en": "Golf", "bn": "গল্ফ", "fr": "Golf", "zh": "高尔夫", "ar": "جولف", "be": "Гольф", "bg": "Голф", "ca": "Golf", "et": "Golf", "nl": "Golf" }',
                    'slug' => '{ "en": "golf", "bn": "গল্ফ", "fr": "golf", "zh": "高尔夫", "ar": "جولف", "be": "гольф", "bg": "голф", "ca": "golf", "et": "golf", "nl": "golf" }',
                    'parent_id' => 163,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            166 =>
                array (
                    'id' => 306,
                    'name' => '{ "en": "Fishing", "bn": "মাছ ধরা", "fr": "Pêche", "zh": "钓鱼", "ar": "صيد السمك", "be": "Рыбалка", "bg": "Риболов", "ca": "Pesca", "et": "Kalastamine", "nl": "Vissen" }',
                    'slug' => '{ "en": "fishing", "bn": "মাছ-ধরা", "fr": "pêche", "zh": "钓鱼", "ar": "صيد-السمك", "be": "рыбалка", "bg": "риболов", "ca": "pesca", "et": "kalastamine", "nl": "vissen" }',
                    'parent_id' => 163,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            167 =>
                array (
                    'id' => 307,
                    'name' => '{ "en": "Skateboards", "bn": "স্কেটবোর্ড", "fr": "Skateboards", "zh": "滑板", "ar": "تزلج", "be": "Скейтборды", "bg": "Скеитборди", "ca": "Skateboards", "et": "Rulad", "nl": "Skateboards" }',
                    'slug' => '{ "en": "skateboards", "bn": "স্কেটবোর্ড", "fr": "skateboards", "zh": "滑板", "ar": "تزلج", "be": "скейтборды", "bg": "скеитборди", "ca": "skateboards", "et": "rulad", "nl": "skateboards" }',
                    'parent_id' => 163,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            168 =>
                array (
                    'id' => 308,
                    'name' => '{ "en": "Water Sports", "bn": "জল খেলা", "fr": "Sports nautiques", "zh": "水上运动", "ar": "رياضات مائية", "be": "Вадныя мерапрыемствы", "bg": "Водни спортове", "ca": "Esports aquàtics", "et": "Veemissport", "nl": "Watersporten" }',
                    'slug' => '{ "en": "water-sports", "bn": "জল-খেলা", "fr": "sports-nautiques", "zh": "水上运动", "ar": "رياضات-مائية", "be": "вадныя-мерапрыемствы", "bg": "водни-спортове", "ca": "esports-aquàtics", "et": "veemissport", "nl": "watersporten" }',
                    'parent_id' => 163,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            169 =>
                array (
                    'id' => 309,
                    'name' => '{ "en": "Exercise Bikes", "bn": "ব্যায়াম বাইক", "fr": "Vélos d\'exercice", "zh": "健身车", "ar": "دراجات اللياقة البدنية", "be": "Трэнажорныя веласіпеды", "bg": "Велоергометри", "ca": "Bicicletes estàtiques", "et": "Treeningjalgrattad", "nl": "Hometrainers" }',
                    'slug' => '{ "en": "exercise-bikes", "bn": "ব্যায়াম-বাইক", "fr": "vélos-d\'exercice", "zh": "健身车", "ar": "دراجات-اللياقة-البدنية", "be": "трэнажорныя-веласіпеды", "bg": "велоергометри", "ca": "bicicletes-estàtiques", "et": "treeningjalgrattad", "nl": "hometrainers" }',
                    'parent_id' => 164,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            170 =>
                array (
                    'id' => 310,
                    'name' => '{ "en": "Elliptical Trainers", "bn": "ইলিপ্টিকাল ট্রেনার", "fr": "Entraîneurs elliptiques", "zh": "椭圆机训练器", "ar": "مدربين إليبتيكال", "be": "Эліптычныя трэнажоры", "bg": "Елиптични треньори", "ca": "Entrenadors el·líptics", "et": "Elliptilised treenerid", "nl": "Crosstrainers" }',
                    'slug' => '{ "en": "elliptical-trainers", "bn": "ইলিপ্টিকাল-ট্রেনার", "fr": "entraîneurs-elliptiques", "zh": "椭圆机训练器", "ar": "مدربين-إليبتيكال", "be": "эліптычныя-трэнажоры", "bg": "елиптични-треньори", "ca": "entrenadors-el·líptics", "et": "elliptilised-treenerid", "nl": "crosstrainers" }',
                    'parent_id' => 164,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            171 =>
                array (
                    'id' => 311,
                    'name' => '{ "en": "Strength Training Equipment", "bn": "শক্তি প্রশিক্ষণ উপকরণ", "fr": "Équipement d\'entraînement musculaire", "zh": "力量训练设备", "ar": "معدات تدريب القوة", "be": "Абсталяванне для сілкавага трэнінгу", "bg": "Съоръжения за силови тренировки", "ca": "Equipament d\'entrenament de la força", "et": "Tugevusõppevarustus", "nl": "Krachttrainingsapparatuur" }',
                    'slug' => '{ "en": "strength-training-equipment", "bn": "শক্তি-প্রশিক্ষণ-উপকরণ", "fr": "équipement-d\'entraînement-musculaire", "zh": "力量训练设备", "ar": "معدات-تدريب-القوة", "be": "абсталяванне-для-сілкавага-трэнінгу", "bg": "съоръжения-за-силови-тренировки", "ca": "equipament-d\'entrenament-de-la-força", "et": "tugevusõppevarustus", "nl": "krachttrainingsapparatuur" }',
                    'parent_id' => 164,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            172 =>
                array (
                    'id' => 312,
                    'name' => '{ "en": "Badminton", "bn": "ব্যাডমিন্টন", "fr": "Badminton", "zh": "羽毛球", "ar": "تنس الريشة", "be": "Бадмінтан", "bg": "Бадминтон", "ca": "Badminton", "et": "Sulgpall", "nl": "Badminton" }',
                    'slug' => '{ "en": "badminton", "bn": "ব্যাডমিন্টন", "fr": "badminton", "zh": "羽毛球", "ar": "تنس-الريشة", "be": "бадмінтан", "bg": "бадминтон", "ca": "badminton", "et": "sulgpall", "nl": "badminton" }',
                    'parent_id' => 165,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            173 =>
                array (
                    'id' => 313,
                    'name' => '{ "en": "Squash", "bn": "স্কোয়াশ", "fr": "Squash", "zh": "壁球", "ar": "اسكواش", "be": "Сквош", "bg": "Скуош", "ca": "Squash", "et": "Squash", "nl": "Squash" }',
                    'slug' => '{ "en": "squash", "bn": "স্কোয়াশ", "fr": "squash", "zh": "壁球", "ar": "اسكواش", "be": "сквош", "bg": "скуош", "ca": "squash", "et": "squash", "nl": "squash" }',
                    'parent_id' => 165,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            174 =>
                array (
                    'id' => 314,
                    'name' => '{ "en": "Football", "bn": "ফুটবল", "fr": "Football", "zh": "足球", "ar": "كرة القدم", "be": "Футбол", "bg": "Футбол", "ca": "Futbol", "et": "Jalgpall", "nl": "Voetbal" }',
                    'slug' => '{ "en": "football", "bn": "ফুটবল", "fr": "football", "zh": "足球", "ar": "كرة-القدم", "be": "футбол", "bg": "футбол", "ca": "futbol", "et": "jalgpall", "nl": "voetbal" }',
                    'parent_id' => 166,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            175 =>
                array (
                    'id' => 315,
                    'name' => '{ "en": "Cricket", "bn": "ক্রিকেট", "fr": "Cricket", "zh": "板球", "ar": "كريكيت", "be": "Крыкет", "bg": "Крикет", "ca": "Críquet", "et": "Kriket", "nl": "Cricket" }',
                    'slug' => '{ "en": "cricket", "bn": "ক্রিকেট", "fr": "cricket", "zh": "板球", "ar": "كريكيت", "be": "крыкет", "bg": "крикет", "ca": "críquet", "et": "kriket", "nl": "cricket" }',
                    'parent_id' => 166,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            176 =>
                array (
                    'id' => 316,
                    'name' => '{ "en": "Basketball", "bn": "বিজ্ঞাপন", "fr": "Basket-ball", "zh": "篮球", "ar": "كرة السلة", "be": "Баскетбол", "bg": "Баскетбол", "ca": "Bàsquet", "et": "Korvpall", "nl": "Basketbal" }',
                    'slug' => '{ "en": "basketball", "bn": "বিজ্ঞাপন", "fr": "basket-ball", "zh": "篮球", "ar": "كرة-السلة", "be": "баскетбол", "bg": "баскетбол", "ca": "bàsquet", "et": "korvpall", "nl": "basketbal" }',
                    'parent_id' => 166,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            177 =>
                array (
                    'id' => 317,
                    'name' => '{ "en": "Volleyball", "bn": "ভলিবল", "fr": "Volley-ball", "zh": "排球", "ar": "الكرة الطائرة", "be": "Валейбол", "bg": "Волейбол", "ca": "Voleibol", "et": "Võrkpall", "nl": "Volleybal" }',
                    'slug' => '{ "en": "volleyball", "bn": "ভলিবল", "fr": "volley-ball", "zh": "排球", "ar": "الكرة-الطائرة", "be": "валейбол", "bg": "волейбол", "ca": "voleibol", "et": "võrkpall", "nl": "volleybal" }',
                    'parent_id' => 166,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            178 =>
                array (
                    'id' => 318,
                    'name' => '{ "en": "Tents", "bn": "তাঁবু", "fr": "Tentes", "zh": "帐篷", "ar": "خيام", "be": "Намёты", "bg": "Палатки", "ca": "Tendes", "et": "Telgid", "nl": "Tenten" }',
                    'slug' => '{ "en": "tents", "bn": "তাঁবু", "fr": "tentes", "zh": "帐篷", "ar": "خيام", "be": "намёты", "bg": "палатки", "ca": "tendes", "et": "telgid", "nl": "tenten" }',
                    'parent_id' => 167,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            179 =>
                array (
                    'id' => 319,
                    'name' => '{ "en": "Sleeping Bags", "bn": "ঘুমানোর ব্যাগ", "fr": "Sacs de couchage", "zh": "睡袋", "ar": "أكياس النوم", "be": "Спальныя мяшкі", "bg": "Спални чували", "ca": "Sacs de dormir", "et": "Magamiskotid", "nl": "Slaapzakken" }',
                    'slug' => '{ "en": "sleeping-bags", "bn": "ঘুমানোর-ব্যাগ", "fr": "sacs-de-couchage", "zh": "睡袋", "ar": "أكياس-النوم", "be": "спальныя-мяшкі", "bg": "спални-чували", "ca": "sacs-de-dormir", "et": "magamiskotid", "nl": "slaapzakken" }',
                    'parent_id' => 167,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            180 =>
                array (
                    'id' => 320,
                    'name' => '{ "en": "Cooking Essentials", "bn": "রান্নার প্রয়োজনীয় জিনিসপত্র", "fr": "Essentiels de cuisine", "zh": "烹饪必需品", "ar": "أساسيات الطبخ", "be": "Асноўнае для гатавання", "bg": "Основни готварски принадлежности", "ca": "Essencials de cuina", "et": "Küpsetamise esmatarbed", "nl": "Kookbenodigdheden" }',
                    'slug' => '{ "en": "cooking-essentials", "bn": "রান্নার-প্রয়োজনীয়-জিনিসপত্র", "fr": "essentiels-de-cuisine", "zh": "烹饪必需品", "ar": "أساسيات-الطبخ", "be": "асноўнае-для-гатавання", "bg": "основни-готварски-принадлежности", "ca": "essencials-de-cuina", "et": "küpsetamise-esmatarbed", "nl": "kookbenodigdheden" }',
                    'parent_id' => 167,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            181 =>
                array (
                    'id' => 321,
                    'name' => '{ "en": "Hiking Backpacks", "bn": "হাইকিং ব্যাকপ্যাক", "fr": "Sacs à dos de randonnée", "zh": "徒步背包", "ar": "حقائب ظهر للتنزه", "be": "Заплечнікі для паходаў", "bg": "Раници за туризъм", "ca": "Motxilles de senderisme", "et": "Matkaseljakotid", "nl": "Wandelrugzakken" }',
                    'slug' => '{ "en": "hiking-backpacks", "bn": "হাইকিং-ব্যাকপ্যাক", "fr": "sacs-à-dos-de-randonnée", "zh": "徒步背包", "ar": "حقائب-ظهر-للتنزه", "be": "заплечнікі-для-паходаў", "bg": "раници-за-туризъм", "ca": "motxilles-de-senderisme", "et": "matkaseljakotid", "nl": "wandelrugzakken" }',
                    'parent_id' => 167,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            182 =>
                array (
                    'id' => 322,
                    'name' => '{ "en": "Body & Massage Oils", "bn": "শরীর ও ম্যাসেজ তেল", "fr": "Huiles pour le corps et de massage", "zh": "身体和按摩油", "ar": "زيوت الجسم والتدليك", "be": "Маслы для цела і масажу", "bg": "Масла за тяло и масаж", "ca": "Olis corporals i de massatge", "et": "Keha- ja massaažiõlid", "nl": "Lichaams- en massageoliën" }',
                    'slug' => '{ "en": "body-massage-oils", "bn": "শরীর-ও-ম্যাসেজ-তেল", "fr": "huiles-pour-le-corps-et-de-massage", "zh": "身体和按摩油", "ar": "زيوت-الجسم-والتدليك", "be": "маслы-для-цела-і-масажу", "bg": "масла-за-тяло-и-масаж", "ca": "olis-corporals-i-de-massatge", "et": "keha-ja-massaažiõlid", "nl": "lichaams-en-massageoliën" }',
                    'parent_id' => 79,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            183 =>
                array (
                    'id' => 323,
                    'name' => '{ "en": "Body Moisturizers", "bn": "শরীরের ময়েশ্চারাইজার", "fr": "Hydratants pour le corps", "zh": "身体保湿霜", "ar": "مرطبات الجسم", "be": "Увільгатняльнікі для цела", "bg": "Овлажнители за тяло", "ca": "Hidratants corporals", "et": "Kehaniisutajad", "nl": "Lichaamsbevochtigers" }',
                    'slug' => '{ "en": "body-moisturizers", "bn": "শরীরের-ময়েশ্চারাইজার", "fr": "hydratants-pour-le-corps", "zh": "身体保湿霜", "ar": "مرطبات-الجسم", "be": "увільгатняльнікі-для-цела", "bg": "овлажнители-за-тяло", "ca": "hidratants-corporals", "et": "kehaniisutajad", "nl": "lichaamsbevochtigers" }',
                    'parent_id' => 79,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            184 =>
                array (
                    'id' => 324,
                    'name' => '{ "en": "Body Scrubs", "bn": "বডি স্ক্রাব", "fr": "Gommages pour le corps", "zh": "身体磨砂膏", "ar": "مقشرات الجسم", "be": "Скрабы для цела", "bg": "Ексфолианти за тяло", "ca": "Exfoliants corporals", "et": "Kehakoorijad", "nl": "Lichaamsscrubs" }',
                    'slug' => '{ "en": "body-scrubs", "bn": "বডি-স্ক্রাব", "fr": "gommages-pour-le-corps", "zh": "身体磨砂膏", "ar": "مقشرات-الجسم", "be": "скрабы-для-цела", "bg": "ексфолианти-за-тяло", "ca": "exfoliants-corporals", "et": "kehakoorijad", "nl": "lichaamsscrubs" }',
                    'parent_id' => 79,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            185 =>
                array (
                    'id' => 325,
                    'name' => '{ "en": "Body Soaps & Shower Gels", "bn": "শরীরের সাবান ও শাওয়ার জেল", "fr": "Savons pour le corps et gels douche", "zh": "身体香皂和沐浴露", "ar": "صابون الجسم وجل الاستحمام", "be": "Целавае мыла і гелі для душа", "bg": "Сапуни за тяло и душ гелове", "ca": "Sabons corporals i gels de dutxa", "et": "Kehamüügid ja dušigeelid", "nl": "Lichaamszepen en douchegels" }',
                    'slug' => '{ "en": "body-soaps-shower-gels", "bn": "শরীরের-সাবান-ও-শাওয়ার-জেল", "fr": "savons-pour-le-corps-et-gels-douche", "zh": "身体香皂和沐浴露", "ar": "صابون-الجسم-وجل-الاستحمام", "be": "целавае-мыла-і-гелі-для-душа", "bg": "сапуни-за-тяло-и-душ-гелове", "ca": "sabons-corporals-i-gels-de-dutxa", "et": "kehavahendid-ja-dušigeelid", "nl": "lichaamszepen-en-douchegels" }',
                    'parent_id' => 79,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            186 =>
                array (
                    'id' => 326,
                    'name' => '{ "en": "Foot Care", "bn": "পা যত্ন", "fr": "Soins des pieds", "zh": "足部护理", "ar": "رعاية القدمين", "be": "Пяшчота", "bg": "Грижа за краката", "ca": "Cura dels peus", "et": "Jalahooldus", "nl": "Voetverzorging" }',
                    'slug' => '{ "en": "foot-care", "bn": "পা-যত্ন", "fr": "soins-des-pieds", "zh": "足部护理", "ar": "رعاية-القدمين", "be": "пяшчота", "bg": "грижа-за-краката", "ca": "cura-dels-peus", "et": "jalahooldus", "nl": "voetverzorging" }',
                    'parent_id' => 79,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            187 =>
                array (
                    'id' => 327,
                    'name' => '{ "en": "Hair Removal", "bn": "চুল পরিবর্তন", "fr": "Épilation", "zh": "脱毛", "ar": "إزالة الشعر", "be": "Выдаленне валасоў", "bg": "Премахване на косми", "ca": "Depilació", "et": "Karvade eemaldamine", "nl": "Ontharing" }',
                    'slug' => '{ "en": "hair-removal", "bn": "চুল-পরিবর্তন", "fr": "épilation", "zh": "脱毛", "ar": "إزالة-الشعر", "be": "выдаленне-валасоў", "bg": "премахване-на-косми", "ca": "depilació", "et": "karvade-eemaldamine", "nl": "ontharing" }',
                    'parent_id' => 79,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            188 =>
                array (
                    'id' => 328,
                    'name' => '{ "en": "Hand Care", "bn": "হাত যত্ন", "fr": "Soins des mains", "zh": "手部护理", "ar": "رعاية اليدين", "be": "Дагляд за рукамі", "bg": "Грижа за ръцете", "ca": "Cura de les mans", "et": "Kätehooldus", "nl": "Handverzorging" }',
                    'slug' => '{ "en": "hand-care", "bn": "হাত-যত্ন", "fr": "soins-des-mains", "zh": "手部护理", "ar": "رعاية-اليدين", "be": "дагляд-за-рукамі", "bg": "грижа-за-ръцете", "ca": "cura-de-les-mans", "et": "kätehooldus", "nl": "handverzorging" }',
                    'parent_id' => 79,
                    'order_by' => 7,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            189 =>
                array (
                    'id' => 329,
                    'name' => '{ "en": "Sun Care for Body", "bn": "শরীরের জন্য সূর্য যত্ন", "fr": "Protection solaire pour le corps", "zh": "身体防晒", "ar": "العناية بالشمس للجسم", "be": "Захаванне ад сонца для цела", "bg": "Слънцезащита за тялото", "ca": "Protecció solar corporal", "et": "Päikesekaitse kehale", "nl": "Zonnebescherming voor het lichaam" }',
                    'slug' => '{ "en": "sun-care-for-body", "bn": "শরীরের-জন্য-সূর্য-যত্ন", "fr": "protection-solaire-pour-le-corps", "zh": "身体防晒", "ar": "العناية-بالشمس-للجسم", "be": "захаванне-ад-сонца-для-цела", "bg": "слънцезащита-за-тялото", "ca": "protecció-solar-corporal", "et": "päikesekaitse-kehale", "nl": "zonnebescherming-voor-het-lichaam" }',
                    'parent_id' => 79,
                    'order_by' => 8,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            190 =>
                array (
                    'id' => 330,
                    'name' => '{ "en": "Bath & Body Accessories", "bn": "স্নান এবং শরীর আকসেসারি", "fr": "Accessoires de bain et de corps", "zh": "沐浴和身体配件", "ar": "إكسسوارات الحمام والجسم", "be": "Аксесуары для ванны і цела", "bg": "Аксесоари за баня и тяло", "ca": "Accessoris de bany i cos", "et": "Vannitoa- ja kehaaksessuaarid", "nl": "Bad- en lichaamsaccessoires" }',
                    'slug' => '{ "en": "bath-body-accessories", "bn": "স্নান-এবং-শরীর-আকসেসারি", "fr": "accessoires-de-bain-et-de-corps", "zh": "沐浴和身体配件", "ar": "إكسسوارات-الحمام-والجسم", "be": "аксесуары-для-ванны-і-цела", "bg": "аксесоари-за-баня-и-тяло", "ca": "accessoris-de-bany-i-cos", "et": "vannitoa--ja-kehaaksessuaarid", "nl": "bad--en-lichaamsaccessoires" }',
                    'parent_id' => 79,
                    'order_by' => 9,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            191 =>
                array (
                    'id' => 331,
                    'name' => '{ "en": "Curling Irons & Wands", "bn": "কার্লিং আয়রন ও ওয়ান্ড", "fr": "Fers à friser et baguettes", "zh": "卷发器和卷发棒", "ar": "مكواة تجعيد الشعر وعصي التجعيد", "be": "Ферасцы для кудрэння і ванды", "bg": "Преси за къдрава коса и пръчки", "ca": "Ferro per enrotllar i varetes", "et": "Lokitangid ja lokitangid", "nl": "Krultangen en krulstaven" }',
                    'slug' => '{ "en": "curling-irons-wands", "bn": "কার্লিং-আয়রন-ও-ওয়ান্ড", "fr": "fers-à-friser-et-baguettes", "zh": "卷发器和卷发棒", "ar": "مكواة-تجعيد-الشعر-وعصي-التجعيد", "be": "ферасцы-для-кудрэння-і-ванды", "bg": "преси-за-къдрава-коса-и-пръчки", "ca": "ferro-per-enrotllar-i-varetes", "et": "lokitangid-ja-lokitangid", "nl": "krultangen-en-krulstaven" }',
                    'parent_id' => 80,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            192 =>
                array (
                    'id' => 332,
                    'name' => '{ "en": "Flat Irons", "bn": "ফ্ল্যাট আয়রন", "fr": "Fers plats", "zh": "烫平机", "ar": "مكواة مسطحة", "be": "Пласцінковыя ферасцы", "bg": "Плоски уреди за коса", "ca": "Ferro pla", "et": "Lame triikrauad", "nl": "Stijltangen" }',
                    'slug' => '{ "en": "flat-irons", "bn": "ফ্ল্যাট-আয়রন", "fr": "fers-plats", "zh": "烫平机", "ar": "مكواة-مسطحة", "be": "пласцінковыя-ферасцы", "bg": "плоски-уреди-за-коса", "ca": "ferro-pla", "et": "lame-triikrauad", "nl": "stijltangen" }',
                    'parent_id' => 80,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            193 =>
                array (
                    'id' => 333,
                    'name' => '{ "en": "Multi-stylers", "bn": "মাল্টি-স্টাইলার", "fr": "Multi-stylers", "zh": "多功能造型器", "ar": "متعددة الأنماط", "be": "Мульті-стайлер", "bg": "Мулти-стилери", "ca": "Multi-stylers", "et": "Multi-stylers", "nl": "Multi-stylers" }',
                    'slug' => '{ "en": "multi-stylers", "bn": "মাল্টি-স্টাইলার", "fr": "multi-stylers", "zh": "多功能造型器", "ar": "متعددة-الأنماط", "be": "мульті-стайлер", "bg": "мулти-стилери", "ca": "multi-stylers", "et": "multi-stylers", "nl": "multi-stylers" }',
                    'parent_id' => 80,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            194 =>
                array (
                    'id' => 334,
                    'name' => '{ "en": "Hair Dryers", "bn": "হেয়ার ড্রায়ার", "fr": "Sèche-cheveux", "zh": "吹风机", "ar": "مجفف الشعر", "be": "Фен", "bg": "Фенове за коса", "ca": "Assecadors de cabell", "et": "Föönid", "nl": "Haardrogers" }',
                    'slug' => '{ "en": "hair-dryers", "bn": "হেয়ার-ড্রায়ার", "fr": "sèche-cheveux", "zh": "吹风机", "ar": "مجفف-الشعر", "be": "фен", "bg": "фенове-за-коса", "ca": "assecadors-de-cabell", "et": "föönid", "nl": "haardrogers" }',
                    'parent_id' => 80,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            195 =>
                array (
                    'id' => 335,
                    'name' => '{ "en": "Face Skin Care Tools", "bn": "মুখের চামড়ার যত্ন সরঞ্জাম", "fr": "Outils de soin de la peau du visage", "zh": "面部护肤工具", "ar": "أدوات عناية البشرة للوجه", "be": "Інструменты для дагляду за шкірай аблічча", "bg": "Инструменти за грижа за кожата на лицето", "ca": "Eines de cura de la pell del rostre", "et": "Näonaha hooldusvahendid", "nl": "Gezichtsverzorgingsgereedschap" }',
                    'slug' => '{ "en": "face-skin-care-tools", "bn": "মুখের-চামড়ার-যত্ন-সরঞ্জাম", "fr": "outils-de-soin-de-la-peau-du-visage", "zh": "面部护肤工具", "ar": "أدوات-عناية-البشرة-للوجه", "be": "інструменты-для-дагляду-за-шкірай-аблічча", "bg": "инструменти-за-грижа-за-кожата-на-лицето", "ca": "eines-de-cura-de-la-pell-del-rostre", "et": "näonaha-hooldusvahendid", "nl": "gezichtsverzorgingsgereedschap" }',
                    'parent_id' => 80,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            196 =>
                array (
                    'id' => 336,
                    'name' => '{ "en": "Foot Relief Tools", "bn": "পা রাহাত সরঞ্জাম", "fr": "Outils de soulagement des pieds", "zh": "脚部缓解工具", "ar": "أدوات تخفيف القدمين", "be": "Інструменты для адпачынку ног", "bg": "Инструменти за облекчаване на краката", "ca": "Eines de relaxació dels peus", "et": "Jalaleevendusvahendid", "nl": "Voetverlichtingsgereedschap" }',
                    'slug' => '{ "en": "foot-relief-tools", "bn": "পা-রাহাত-সরঞ্জাম", "fr": "outils-de-soulagement-des-pieds", "zh": "脚部缓解工具", "ar": "أدوات-تخفيف-القدمين", "be": "інструменты-для-адпачынку-ног", "bg": "инструменти-за-облекчаване-на-краката", "ca": "eines-de-relaxació-dels-peus", "et": "jalaleevendusvahendid", "nl": "voetverlichtingsgereedschap" }',
                    'parent_id' => 80,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            197 =>
                array (
                    'id' => 337,
                    'name' => '{ "en": "Hair Removal Accessories", "bn": "চুল পরিবর্তন সহায়ক", "fr": "Accessoires d\'épilation", "zh": "脱毛配件", "ar": "ملحقات إزالة الشعر", "be": "Аксесуары для выдалення валасоў", "bg": "Аксесоари за премахване на косми", "ca": "Accessoris d\'eliminació del cabell", "et": "Juuste eemaldamise lisatarvikud", "nl": "Accessoires voor ontharing" }',
                    'slug' => '{ "en": "hair-removal-accessories", "bn": "চুল-পরিবর্তন-সহায়ক", "fr": "accessoires-d\'épilation", "zh": "脱毛配件", "ar": "ملحقات-إزالة-الشعر", "be": "аксесуары-для-выдалення-валасоў", "bg": "аксесоари-за-премахване-на-косми", "ca": "accessoris-d\'eliminació-del-cabell", "et": "juuste-eemaldamise-lisatarvikud", "nl": "accessoires-voor-ontharing" }',
                    'parent_id' => 80,
                    'order_by' => 7,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            198 =>
                array (
                    'id' => 338,
                    'name' => '{ "en": "Slimming & Electric Massagers", "bn": "স্লিমিং এবং ইলেকট্রিক ম্যাসেজার", "fr": "Masseurs amincissants et électriques", "zh": "瘦身和电动按摩器", "ar": "مدلكات للتخسيس والكهربائية", "be": "Масажоры для пахудання і электрычныя", "bg": "Масажори за отслабване и електрически", "ca": "Massatges reductors i elèctrics", "et": "Salendavad ja elektrilised massaažirullid", "nl": "Afslank- en elektrische massagers" }',
                    'slug' => '{ "en": "slimming-electric-massagers", "bn": "স্লিমিং-এবং-ইলেকট্রিক-ম্যাসেজার", "fr": "masseurs-amincissants-et-électriques", "zh": "瘦身和电动按摩器", "ar": "مدلكات-للتخسيس-والكهربائية", "be": "масажоры-для-пахудання-і-электрычныя", "bg": "масажори-за-отслабване-и-електрически", "ca": "massatges-reductors-i-elèctrics", "et": "salendavad-ja-elektrilised-massaažirullid", "nl": "afslank-en-elektrische-massagers" }',
                    'parent_id' => 80,
                    'order_by' => 8,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            199 =>
                array (
                    'id' => 339,
                    'name' => '{ "en": "Women Fragrances", "bn": "মহিলাদের সুগন্ধি", "fr": "Parfums pour femmes", "zh": "女士香水", "ar": "عطور نسائية", "be": "Жаночыя парфюмы", "bg": "Дамски парфюми", "ca": "Fragàncies per a dones", "et": "Naiste lõhnad", "nl": "Damesgeuren" }',
                    'slug' => '{ "en": "women-fragrances", "bn": "মহিলাদের-সুগন্ধি", "fr": "parfums-pour-femmes", "zh": "女士香水", "ar": "عطور-نسائية", "be": "жаночыя-парфюмы", "bg": "дамски-парфюми", "ca": "fragàncies-per-a-dones", "et": "naiste-lõhnad", "nl": "damesgeuren" }',
                    'parent_id' => 81,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            200 =>
                array (
                    'id' => 340,
                    'name' => '{ "en": "Men Fragrances", "bn": "পুরুষদের সুগন্ধি", "fr": "Parfums pour hommes", "zh": "男士香水", "ar": "عطور رجالية", "be": "Мужскія парфюмы", "bg": "Мъжки парфюми", "ca": "Fragàncies per a homes", "et": "Meeste lõhnad", "nl": "Herengeuren" }',
                    'slug' => '{ "en": "men-fragrances", "bn": "পুরুষদের-সুগন্ধি", "fr": "parfums-pour-hommes", "zh": "男士香水", "ar": "عطور-رجالية", "be": "мужскія-парфюмы", "bg": "мъжки-парфюми", "ca": "fragàncies-per-a-homes", "et": "meeste-lõhnad", "nl": "herengeuren" }',
                    'parent_id' => 81,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            201 =>
                array (
                    'id' => 341,
                    'name' => '{ "en": "Unisex Fragrances", "bn": "ইউনিসেক্স সুগন্ধি", "fr": "Parfums unisexes", "zh": "男女通用香水", "ar": "عطور للجنسين", "be": "Унісекс парфюмы", "bg": "Унисекс парфюми", "ca": "Fragàncies unissex", "et": "Unisex-lõhnad", "nl": "Unisex geuren" }',
                    'slug' => '{ "en": "unisex-fragrances", "bn": "ইউনিসেক্স-চুম্বন", "fr": "parfums-unisexes", "zh": "男女通用香水", "ar": "عطور-للجنسين", "be": "унісекс-парфюмы", "bg": "унилекс-парфюми", "ca": "fragàncies-unissex", "et": "unisex-lõhnad", "nl": "unisex-geuren" }',
                    'parent_id' => 81,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            202 =>
                array (
                    'id' => 342,
                    'name' => '{ "en": "Shampoo", "bn": "শ্যাম্পু", "fr": "Shampooing", "zh": "洗发水", "ar": "شامبو", "be": "Шампунь", "bg": "Шампоан", "ca": "Xampú", "et": "Šampoon", "nl": "Shampoo" }',
                    'slug' => '{ "en": "shampoo", "bn": "শ্যাম্পু", "fr": "shampooing", "zh": "洗发水", "ar": "شامبو", "be": "шампунь", "bg": "шампоан", "ca": "xampú", "et": "šampoon", "nl": "shampoo" }',
                    'parent_id' => 82,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            203 =>
                array (
                    'id' => 343,
                    'name' => '{ "en": "Hair Treatments", "bn": "চুল চিকিৎসা", "fr": "Traitements capillaires", "zh": "头发护理", "ar": "علاجات الشعر", "be": "Абработка валасоў", "bg": "Терапия на косата", "ca": "Tractaments capil·lars", "et": "Juuksehooldus", "nl": "Haarbehandelingen" }',
                    'slug' => '{ "en": "hair-treatments", "bn": "চুল-চিকিৎসা", "fr": "traitements-capillaires", "zh": "头发护理", "ar": "علاجات-الشعر", "be": "абработка-валасоў", "bg": "терапия-на-косата", "ca": "tractaments-capil·lars", "et": "juuksehooldus", "nl": "haarbehandelingen" }',
                    'parent_id' => 82,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            204 =>
                array (
                    'id' => 344,
                    'name' => '{ "en": "Hair Care Accessories", "bn": "চুলের যত্ন সরঞ্জাম", "fr": "Accessoires de soins capillaires", "zh": "头发护理配件", "ar": "ملحقات العناية بالشعر", "be": "Аксесуары для дагляду за валасамі", "bg": "Аксесоари за грижа за косата", "ca": "Accessoris de cura del cabell", "et": "Juuksehooldusvahendid", "nl": "Haarverzorgingsaccessoires" }',
                    'slug' => '{ "en": "hair-care-accessories", "bn": "চুলের-যত্ন-সরঞ্জাম", "fr": "accessoires-de-soins-capillaires", "zh": "头发护理配件", "ar": "ملحقات-العناية-بالشعر", "be": "аксесуары-для-дагляду-за-валасамі", "bg": "аксесоари-за-грижа-за-косата", "ca": "accessoris-de-cura-del-cabell", "et": "juuksehooldusvahendid", "nl": "haarverzorgingsaccessoires" }',
                    'parent_id' => 82,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            205 =>
                array (
                    'id' => 345,
                    'name' => '{ "en": "Hair Brushes & Combs", "bn": "চুলের ব্রাশ এবং কোম্ব", "fr": "Brosses à cheveux et peignes", "zh": "发刷和梳子", "ar": "فرش الشعر والمشط", "be": "Щэткі і грэбень для валасоў", "bg": "Четки и гребени за коса", "ca": "Escombres i pents per al cabell", "et": "Juukseharjad ja kammid", "nl": "Haarborstels en kammen" }',
                    'slug' => '{ "en": "hair-brushes-combs", "bn": "চুলের-ব্রাশ-এবং-কোম্ব", "fr": "brosses-à-cheveux-et-peignes", "zh": "发刷和梳子", "ar": "فرش-الشعر-والمشط", "be": "щэткі-і-грэбень-для-валасоў", "bg": "четки-и-гребени-за-коса", "ca": "escombres-i-pents-per-al-cabell", "et": "juukseharjad-ja-kammid", "nl": "haarborstels-en-kammen" }',
                    'parent_id' => 82,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            206 =>
                array (
                    'id' => 346,
                    'name' => '{ "en": "Hair Coloring", "bn": "চুল রঙ", "fr": "Coloration des cheveux", "zh": "染发", "ar": "صبغ الشعر", "be": "Калярованне валасоў", "bg": "Боядисване на косата", "ca": "Coloració del cabell", "et": "Juuste värvimine", "nl": "Haarkleuring" }',
                    'slug' => '{ "en": "hair-coloring", "bn": "চুল-রঙ", "fr": "coloration-des-cheveux", "zh": "染发", "ar": "صبغ-الشعر", "be": "калярованне-валасоў", "bg": "боядисване-на-косата", "ca": "coloració-del-cabell", "et": "juuste-värvimine", "nl": "haarkleuring" }',
                    'parent_id' => 82,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            207 =>
                array (
                    'id' => 347,
                    'name' => '{ "en": "Hair Conditioner", "bn": "চুলের কন্ডিশনার", "fr": "Après-shampooing", "zh": "护发素", "ar": "بلسم الشعر", "be": "Кандыцыянер для валасоў", "bg": "Балсам за коса", "ca": "Acondicionador del cabell", "et": "Juuksepalsam", "nl": "Haarconditioner" }',
                    'slug' => '{ "en": "hair-conditioner", "bn": "চুলের-কন্ডিশনার", "fr": "après-shampooing", "zh": "护发素", "ar": "بلسم-الشعر", "be": "кандыцыянер-для-валасоў", "bg": "балсам-за-коса", "ca": "acondicionador-del-cabell", "et": "juuksepalsam", "nl": "haarconditioner" }',
                    'parent_id' => 82,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            208 =>
                array (
                    'id' => 348,
                    'name' => '{ "en": "Wig & Hair Extensions & Pads", "bn": "পায়ের পরিমাণ & চুল এক্সটেনশন & প্যাড", "fr": "Perruque et extensions de cheveux et coussinets", "zh": "假发和发延 & 垫", "ar": "شعر مستعار وتمديدات الشعر ووسائد", "be": "Парыкі і наросты валасоў і падушкі", "bg": "Перуки и удължения на косата и подложки", "ca": "Perruca i extensions de cabell i coixinets", "et": "Parukad ja juuste pikendused ja padjad", "nl": "Pruiken & Haarverlengingen & Pads" }',
                    'slug' => '{ "en": "wig-hair-extensions-pads", "bn": "পায়ের-পরিমাণ-&-চুল-এক্সটেনশন-&-প্যাড", "fr": "perruque-et-extensions-de-cheveux-et-coussinets", "zh": "假发和发延-&-垫", "ar": "شعر-مستعار-وتمديدات-الشعر-ووسائد", "be": "парыкі-і-наросты-валасоў-і-падушкі", "bg": "перуки-и-удължения-на-косата-и-подложки", "ca": "perruca-i-extensions-de-cabell-i-coixinets", "et": "parukad-ja-juuste-pikendused-ja-padjad", "nl": "pruiken-&-haarverlengingen-&-pads" }',
                    'parent_id' => 82,
                    'order_by' => 7,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            209 =>
                array (
                    'id' => 357,
                    'name' => '{ "en": "Deodorants", "bn": "ডিওডোরেন্ট", "fr": "Déodorants", "zh": "除臭剂", "ar": "مزيلات العرق", "be": "Дэадаранты", "bg": "Дезодоранти", "ca": "Desodorants", "et": "Deodorandid", "nl": "Deodorants" }',
                    'slug' => '{ "en": "deodorants", "bn": "ডিওডোরেন্ট", "fr": "déodorants", "zh": "除臭剂", "ar": "مزيلات-العرق", "be": "дэадаранты", "bg": "дезодоранти", "ca": "desodorants", "et": "deodorandid", "nl": "deodorants" }',
                    'parent_id' => 84,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            210 =>
                array (
                    'id' => 360,
                    'name' => '{ "en": "Hair Care", "bn": "চুল যত্ন", "fr": "Soin des cheveux", "zh": "护发", "ar": "عناية الشعر", "be": "Дагляд за валасамі", "bg": "Грижа за косата", "ca": "Cura del cabell", "et": "Juuksehooldus", "nl": "Haarverzorging" }',
                    'slug' => '{ "en": "hair-care", "bn": "চুল-যত্ন", "fr": "soin-des-cheveux", "zh": "护发", "ar": "عناية-الشعر", "be": "дагляд-за-валасамі", "bg": "грижа-за-косата", "ca": "cura-del-cabell", "et": "juuksehooldus", "nl": "haarverzorging" }',
                    'parent_id' => 84,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            211 =>
                array (
                    'id' => 361,
                    'name' => '{ "en": "Shaving & Grooming", "bn": "উপচার ও আতর্কিকতা", "fr": "Rasage et toilettage", "zh": "修面和整理", "ar": "حلاقة وتصفيف الشعر", "be": "Стрыжка і дагляд за воласамі", "bg": "Бръснене и грижа за брадата", "ca": "Rasat i acicalat", "et": "Raseerimine ja hoolitsus", "nl": "Scheren & Verzorging" }',
                    'slug' => '{ "en": "shaving-grooming", "bn": "উপচার-ও-আতর্কিকতা", "fr": "rasage-et-toilettage", "zh": "修面和整理", "ar": "حلاقة-وتصفيف-الشعر", "be": "стрыжка-і-дагляд-за-воласамі", "bg": "бръснене-и-грижа-за-брадата", "ca": "rasat-i-acicalat", "et": "raseerimine-ja-hoolitsus", "nl": "scheren-&-verzorging" }',
                    'parent_id' => 84,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            212 =>
                array (
                    'id' => 362,
                    'name' => '{ "en": "Skin Care", "bn": "ত্বক যত্ন", "fr": "Soin de la peau", "zh": "护肤", "ar": "العناية بالبشرة", "be": "Дагляд за шкірай", "bg": "Грижа за кожата", "ca": "Cura de la pell", "et": "Nahahooldus", "nl": "Huidverzorging" }',
                    'slug' => '{ "en": "skin-care", "bn": "ত্বক-যত্ন", "fr": "soin-de-la-peau", "zh": "护肤", "ar": "العناية-بالبشرة", "be": "дагляд-за-шкірай", "bg": "грижа-за-кожата", "ca": "cura-de-la-pell", "et": "nahahooldus", "nl": "huidverzorging" }',
                    'parent_id' => 84,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            213 =>
                array (
                    'id' => 365,
                    'name' => '{ "en": "Oral Care", "bn": "মুখের যত্ন", "fr": "Soins bucco-dentaires", "zh": "口腔护理", "ar": "العناية بالفم", "be": "Дагляд за ротам", "bg": "Грижа за устата", "ca": "Cura dental", "et": "Suuhügieen", "nl": "Mondverzorging" }',
                    'slug' => '{ "en": "oral-care", "bn": "মুখের-যত্ন", "fr": "soins-bucco-dentaires", "zh": "口腔护理", "ar": "العناية-بالفم", "be": "дагляд-за-ротам", "bg": "грижа-за-устата", "ca": "cura-dental", "et": "suuhügieen", "nl": "mondverzorging" }',
                    'parent_id' => 85,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            214 =>
                array (
                    'id' => 366,
                    'name' => '{ "en": "Personal Safety & Security", "bn": "ব্যক্তিগত নিরাপত্তা এবং সুরক্ষা", "fr": "Sécurité et sûreté personnelles", "zh": "个人安全与安全", "ar": "السلامة الشخصية والأمان", "be": "Асабістая бяспека і бяспека", "bg": "Лична безопасност и сигурност", "ca": "Seguretat i seguretat personals", "et": "Isiklik ohutus ja turvalisus", "nl": "Persoonlijke veiligheid en beveiliging" }',
                    'slug' => '{ "en": "personal-safety-security", "bn": "ব্যক্তিগত-নিরাপত্তা-এবং-সুরক্ষা", "fr": "sécurité-et-sûreté-personnelles", "zh": "个人安全与安全", "ar": "السلامة-الشخصية-والأمان", "be": "асабістая-бяспека-і-бяспека", "bg": "лична-безопасност-и-сигурност", "ca": "seguretat-i-seguretat-personals", "et": "isiklik-ohutus-ja-turvalisus", "nl": "persoonlijke-veiligheid-en-beveiliging" }',
                    'parent_id' => 85,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            215 =>
                array (
                    'id' => 367,
                    'name' => '{ "en": "Moisturizers & Creams", "bn": "ময়লিসাইজার এবং ক্রিম", "fr": "Hydratants et crèmes", "zh": "保湿霜和面霜", "ar": "مرطبات وكريمات", "be": "Мацяжоры і крэмы", "bg": "Овлажнители и кремове", "ca": "Hidratants i cremes", "et": "Niisutajad ja kreemid", "nl": "Hydraterende crèmes en crèmes" }',
                    'slug' => '{ "en": "moisturizers-creams", "bn": "ময়লিসাইজার-এবং-ক্রিম", "fr": "hydratants-et-crèmes", "zh": "保湿霜和面霜", "ar": "مرطبات-وكريمات", "be": "мацяжоры-і-крэмы", "bg": "овлажнители-и-кремове", "ca": "hidratants-i-cremes", "et": "niisutajad-ja-kreemid", "nl": "hydraterende-crèmes-en-crèmes" }',
                    'parent_id' => 86,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            216 =>
                array (
                    'id' => 368,
                    'name' => '{ "en": "Serum & Essence", "bn": "সিরাম এবং উত্স", "fr": "Sérum et essence", "zh": "精华液和精华液", "ar": "سيروم وجوهر", "be": "Сыворат і сутык", "bg": "Серум и есенция", "ca": "Sèrum i essència", "et": "Seerum ja essents", "nl": "Serum & Essence" }',
                    'slug' => '{ "en": "serum-essence", "bn": "সিরাম-এবং-উত্স", "fr": "sérum-et-essence", "zh": "精华液和精华液", "ar": "سيروم-وجوهر", "be": "сыворат-і-сутык", "bg": "серум-и-есенция", "ca": "sèrum-i-essència", "et": "seerum-ja-essents", "nl": "serum-essence" }',
                    'parent_id' => 86,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            217 =>
                array (
                    'id' => 369,
                    'name' => '{ "en": "Face Mask & Packs", "bn": "মুখের মাস্ক এবং প্যাক", "fr": "Masque facial et packs", "zh": "面膜和包", "ar": "قناع الوجه وحزم", "be": "Маска для твару і пакеты", "bg": "Маска за лице и пакети", "ca": "Màscara facial i paquets", "et": "Näomask ja pakid", "nl": "Gezichtsmasker & Packs" }',
                    'slug' => '{ "en": "face-mask-packs", "bn": "মুখের-মাস্ক-এবং-প্যাক", "fr": "masque-facial-et-packs", "zh": "面膜和包", "ar": "قناع-الوجه-وحزم", "be": "маска-для-твару-і-пакеты", "bg": "маска-за-лице-и-пакети", "ca": "màscara-facial-i-paquets", "et": "näomask-ja-pakid", "nl": "gezichtsmasker-packs" }',
                    'parent_id' => 86,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            218 =>
                array (
                    'id' => 370,
                    'name' => '{ "en": "Face Scrubs & Exfoliators", "bn": "মুখের স্ক্রাব এবং এক্সফোলিয়েটর", "fr": "Gommages et exfoliants pour le visage", "zh": "面部磨砂膏和去角质剂", "ar": "فرك ومقشرات الوجه", "be": "Адшліфоўкі і эксфаліяцыя для твару", "bg": "Скрабове и ексфолианти за лицето", "ca": "Exfoliacions i exfoliants facials", "et": "Näopesud ja koorijad", "nl": "Gezichtsscrubs & Exfoliators" }',
                    'slug' => '{ "en": "face-scrubs-exfoliators", "bn": "মুখের-স্ক্রাব-এবং-এক্সফোলিয়েটর", "fr": "gommages-et-exfoliants-pour-le-visage", "zh": "面部磨砂膏和去角质剂", "ar": "فرك-ومقشرات-الوجه", "be": "адшліфоўкі-і-эксфаліяцыя-для-твару", "bg": "скрабове-и-ексфолианти-за-лицето", "ca": "exfoliacions-i-exfoliants-facials", "et": "näopesud-ja-koorijad", "nl": "gezichtsscrubs-exfoliators" }',
                    'parent_id' => 86,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            219 =>
                array (
                    'id' => 371,
                    'name' => '{ "en": "Facial Cleansers", "bn": "মুখের পরিষ্কারক", "fr": "Nettoyants pour le visage", "zh": "面部洁面乳", "ar": "منظفات الوجه", "be": "Ачышчальнікі для твару", "bg": "Почистващи за лице", "ca": "Netejadors facials", "et": "Näopuhastusvahendid", "nl": "Gezichtsreinigers" }',
                    'slug' => '{ "en": "facial-cleansers", "bn": "মুখের-পরিষ্কারক", "fr": "nettoyants-pour-le-visage", "zh": "面部洁面乳", "ar": "منظفات-الوجه", "be": "ачышчальнікі-для-твару", "bg": "почистващи-за-лице", "ca": "netejadors-facials", "et": "näopuhastusvahendid", "nl": "gezichtsreinigers" }',
                    'parent_id' => 86,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            220 =>
                array (
                    'id' => 372,
                    'name' => '{ "en": "Lip Balm & Treatments", "bn": "লিপ বাম এবং চিকিৎসা", "fr": "Baume à lèvres et traitements", "zh": "唇膏和治疗", "ar": "مرطب الشفاه والعلاجات", "be": "Бальзам для губ і лечэнне", "bg": "Балсам за устни и лечения", "ca": "Bàlsam per a llavis i tractaments", "et": "Huulepalsam ja ravimid", "nl": "Lippenbalsem & Behandelingen" }',
                    'slug' => '{ "en": "lip-balm-treatments", "bn": "লিপ-বাম-এবং-চিকিৎসা", "fr": "baume-à-lèvres-et-traitements", "zh": "唇膏和治疗", "ar": "مرطب-الشفاه-والعلاجات", "be": "бальзам-для-губ-і-лечэнне", "bg": "балсам-за-устни-и-лечения", "ca": "bàlsam-per-a-llavis-i-tractaments", "et": "huulepalsam-ja-ravimid", "nl": "lippenbalsem-behandelingen" }',
                    'parent_id' => 86,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            221 =>
                array (
                    'id' => 373,
                    'name' => '{ "en": "Toner & Mists", "bn": "টোনার এবং মিস্ট", "fr": "Tonique et brumes", "zh": "爽肤水和喷雾", "ar": "منظف الوجه والبخاخات", "be": "Танер і туманы", "bg": "Тонер и мъглици", "ca": "Tonificant i boires", "et": "Tooner ja udu", "nl": "Toner & Mist" }',
                    'slug' => '{ "en": "toner-mists", "bn": "টোনার-এবং-মিস্ট", "fr": "tonique-et-brumes", "zh": "爽肤水和喷雾", "ar": "منظف-الوجه-والبخاخات", "be": "танер-і-туманы", "bg": "тонер-и-мъглици", "ca": "tonificant-i-boires", "et": "tooner-ja-udu", "nl": "toner-mist" }',
                    'parent_id' => 86,
                    'order_by' => 7,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            222 =>
                array (
                    'id' => 374,
                    'name' => '{ "en": "Beauty Supplements", "bn": "বিউটি সাপ্লিমেন্ট", "fr": "Compléments beauté", "zh": "美容补充剂", "ar": "مكملات الجمال", "be": "Дадатковыя сродкі для беларускага падарак", "bg": "Красота на хранителни добавки", "ca": "Suplements de bellesa", "et": "Ilutooted", "nl": "Schoonheidssupplementen" }',
                    'slug' => '{ "en": "beauty-supplements", "bn": "বিউটি-সাপ্লিমেন্ট", "fr": "compléments-beauté", "zh": "美容补充剂", "ar": "مكملات-الجمال", "be": "дадатковыя-сродкі-для-беларускага-падарак", "bg": "красота-на-хранителни-добавки", "ca": "suplements-de-bellesa", "et": "ilutooted", "nl": "schoonheidssupplementen" }',
                    'parent_id' => 87,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            223 =>
                array (
                    'id' => 375,
                    'name' => '{ "en": "Multivitamins", "bn": "মাল্টিভিটামিন", "fr": "Multivitamines", "zh": "维生素片", "ar": "متعدد الفيتامينات", "be": "Мультивітаміны", "bg": "Мултивитамини", "ca": "Multivitamines", "et": "Multivitamiinid", "nl": "Multivitaminen" }',
                    'slug' => '{ "en": "multivitamins", "bn": "মাল্টিভিটামিন", "fr": "multivitamines", "zh": "维生素片", "ar": "متعدد الفيتامينات", "be": "мультивітаміны", "bg": "мултивитамини", "ca": "multivitamines", "et": "multivitamiinid", "nl": "multivitaminen" }',
                    'parent_id' => 87,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            224 =>
                array (
                    'id' => 376,
                    'name' => '{ "en": "Sports Nutrition", "bn": "খেলার পুষ্টি", "fr": "Nutrition sportive", "zh": "运动营养", "ar": "تغذية رياضية", "be": "Спорт піця", "bg": "Спортно хранене", "ca": "Nutrició esportiva", "et": "Spordinutritsioon", "nl": "Sportvoeding" }',
                    'slug' => '{ "en": "sports-nutrition", "bn": "খেলার-পুষ্টি", "fr": "nutrition-sportive", "zh": "运动营养", "ar": "تغذية-رياضية", "be": "спорт-піця", "bg": "спортно-хранене", "ca": "nutrició-esportiva", "et": "spordinutritsioon", "nl": "sportvoeding" }',
                    'parent_id' => 87,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            225 =>
                array (
                    'id' => 377,
                    'name' => '{ "en": "Well Being", "bn": "ভালবাসা", "fr": "Bien-être", "zh": "幸福", "ar": "رفاهية", "be": "Дабрабыт", "bg": "Добро усещане", "ca": "Benestar", "et": "Heaolu", "nl": "Welzijn" }',
                    'slug' => '{ "en": "well-being", "bn": "ভালবাসা", "fr": "bien-être", "zh": "幸福", "ar": "رفاهية", "be": "дабрабыт", "bg": "добро-усещане", "ca": "benestar", "et": "heaolu", "nl": "welzijn" }',
                    'parent_id' => 87,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            226 =>
                array (
                    'id' => 378,
                    'name' => '{ "en": "Sexual Health Vitamins", "bn": "যৌন স্বাস্থ্য ভিটামিন", "fr": "Vitamines pour la santé sexuelle", "zh": "性健康维生素", "ar": "فيتامينات الصحة الجنسية", "be": "Вітаміны для сексуальнага здароўя", "bg": "Витамини за сексуалното здраве", "ca": "Vitamines per a la salut sexual", "et": "Seksuaaltervise vitamiinid", "nl": "Vitaminen voor seksuele gezondheid" }',
                    'slug' => '{ "en": "sexual-health-vitamins", "bn": "যৌন-স্বাস্থ্য-ভিটামিন", "fr": "vitamines-pour-la-santé-sexuelle", "zh": "性健康维生素", "ar": "فيتامينات-الصحة-الجنسية", "be": "вітаміны-для-сексуальнага-здароўя", "bg": "витамини-за-сексуалното-здраве", "ca": "vitamines-per-a-la-salut-sexual", "et": "seksuaaltervise-vitamiinid", "nl": "vitaminen-voor-seksuele-gezondheid" }',
                    'parent_id' => 87,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            227 =>
                array (
                    'id' => 379,
                    'name' => '{ "en": "First Aid Supplies", "bn": "প্রাথমিক চিকিৎসা সরবরাহ", "fr": "Fournitures de premiers secours", "zh": "急救用品", "ar": "لوازم الإسعافات الأولية", "be": "Першапаможныя прылады", "bg": "Първа помощ", "ca": "Subministraments de primers auxilis", "et": "Esmaabitarbed", "nl": "Eerste hulp benodigdheden" }',
                    'slug' => '{ "en": "first-aid-supplies", "bn": "প্রাথমিক-চিকিৎসা-সরবরাহ", "fr": "fournitures-de-premiers-secours", "zh": "急救用品", "ar": "لوازم-الإسعافات-الأولية", "be": "першапаможныя-прылады", "bg": "първа-помощ", "ca": "subministraments-de-primers-auxilis", "et": "esmaabitarbed", "nl": "eerste-hulp-benodigdheden" }',
                    'parent_id' => 88,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            228 =>
                array (
                    'id' => 380,
                    'name' => '{ "en": "Health Accessories", "bn": "স্বাস্থ্য আকসেসরিজ", "fr": "Accessoires de santé", "zh": "健康配件", "ar": "ملحقات الصحة", "be": "Аксесуары для здароўя", "bg": "Аксесоари за здраве", "ca": "Accessoris de salut", "et": "Tervise lisatarbed", "nl": "Gezondheidsaccessoires" }',
                    'slug' => '{ "en": "health-accessories", "bn": "স্বাস্থ্য-আকসেসরিজ", "fr": "accessoires-de-santé", "zh": "健康配件", "ar": "ملحقات-الصحة", "be": "аксесуары-для-здароўя", "bg": "аксесоари-за-здраве", "ca": "accessoris-de-salut", "et": "tervise-lisatarbed", "nl": "gezondheidsaccessoires" }',
                    'parent_id' => 88,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            229 =>
                array (
                    'id' => 381,
                    'name' => '{ "en": "Health Monitors & Tests", "bn": "স্বাস্থ্য মনিটর এবং পরীক্ষা", "fr": "Moniteurs de santé et tests", "zh": "健康监测器和测试", "ar": "مراقبة الصحة والاختبارات", "be": "Маніторы здароўя і тэсты", "bg": "Мониториране на здравето и тестове", "ca": "Monitoratge de la salut i proves", "et": "Tervise monitorid ja testid", "nl": "Gezondheidsmonitoren & Tests" }',
                    'slug' => '{ "en": "health-monitors-tests", "bn": "স্বাস্থ্য-মনিটর-এবং-পরীক্ষা", "fr": "moniteurs-de-santé-et-tests", "zh": "健康监测器和测试", "ar": "مراقبة-الصحة-والاختبارات", "be": "маніторы-здароўя-і-тэсты", "bg": "мониториране-на-здравето-и-тестове", "ca": "monitoratge-de-la-salut-i-proves", "et": "tervise-monitorid-ja-testid", "nl": "gezondheidsmonitoren-tests" }',
                    'parent_id' => 88,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            230 =>
                array (
                    'id' => 382,
                    'name' => '{ "en": "Injury Support & Braces", "bn": "আঘাত সহায়তা এবং ব্রেস", "fr": "Soutien aux blessures et orthèses", "zh": "受伤支持和支架", "ar": "دعم الإصابات والجبائر", "be": "Падтрымка для цягнікаў і брэсы", "bg": "Подкрепа за наранявания и стелки", "ca": "Suport per a lesions i ortesis", "et": "Vigastuse tugi ja tugid", "nl": "Ondersteuning bij letsel & Braces" }',
                    'slug' => '{ "en": "injury-support-braces", "bn": "আঘাত-সহায়তা-এবং-ব্রেস", "fr": "soutien-aux-blessures-et-orthèses", "zh": "受伤支持和支架", "ar": "دعم-الإصابات-والجبائر", "be": "падтрымка-для-цягнікаў-і-брэсы", "bg": "подкрепа-за-наранявания-и-стелки", "ca": "suport-per-a-lesions-i-ortesis", "et": "vigastuse-tugi-ja-tugid", "nl": "ondersteuning-bij-letsel-braces" }',
                    'parent_id' => 88,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            231 =>
                array (
                    'id' => 383,
                    'name' => '{ "en": "Medical Tests", "bn": "চিকিৎসা পরীক্ষা", "fr": "Tests médicaux", "zh": "医学测试", "ar": "اختبارات طبية", "be": "Медыцынскія тэсты", "bg": "Медицински изпитвания", "ca": "Proves mèdiques", "et": "Meditsiinilised testid", "nl": "Medische tests" }',
                    'slug' => '{ "en": "medical-tests", "bn": "চিকিৎসা-পরীক্ষা", "fr": "tests-médicaux", "zh": "医学测试", "ar": "اختبارات-طبية", "be": "медыцынскія-тэсты", "bg": "медицински-изпитвания", "ca": "proves-mèdiques", "et": "meditsiinilised-testid", "nl": "medische-tests" }',
                    'parent_id' => 88,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            232 =>
                array (
                    'id' => 384,
                    'name' => '{ "en": "Nebulizers & Aspirators", "bn": "নেবুলাইজার এবং আসপিরেটর", "fr": "Nébuliseurs et aspirateurs", "zh": "雾化器和吸器", "ar": "المبخرات والماصات", "be": "Небулізатары і аспірацыі", "bg": "Небулизатори и аспиратори", "ca": "Nebulitzadors i aspiradors", "et": "Nebulisaatorid ja aspiraatorid", "nl": "Verstuivers & Aspiratoren" }',
                    'slug' => '{ "en": "nebulizers-aspirators", "bn": "নেবুলাইজার-এবং-আসপিরেটর", "fr": "nébuliseurs-et-aspirateurs", "zh": "雾化器和吸器", "ar": "المبخرات-والماصات", "be": "небулізатары-і-аспірацыі", "bg": "небулизатори-и-аспиратори", "ca": "nebulitzadors-i-aspiradors", "et": "nebulisaatorid-ja-aspiraatorid", "nl": "verstuivers-aspiratoren" }',
                    'parent_id' => 88,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            233 =>
                array (
                    'id' => 385,
                    'name' => '{ "en": "Ointments & Creams", "bn": "ক্রিম এবং ওয়েলমেন্ট", "fr": "Onguents et crèmes", "zh": "软膏和霜", "ar": "المراهم والكريمات", "be": "Мазі і крэмы", "bg": "Мазилка и кремове", "ca": "Pomades i cremes", "et": "Salvid ja kreemid", "nl": "Zalven & Crèmes" }',
                    'slug' => '{ "en": "ointments-creams", "bn": "ক্রিম-এবং-ওয়েলমেন্ট", "fr": "onguents-et-crèmes", "zh": "软膏和霜", "ar": "المراهم-والكريمات", "be": "мазі-і-крэмы", "bg": "мазилка-и-кремове", "ca": "pomades-i-cremes", "et": "salvid-ja-kreemid", "nl": "zalven-crèmes" }',
                    'parent_id' => 88,
                    'order_by' => 7,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            234 =>
                array (
                    'id' => 386,
                    'name' => '{ "en": "Scales & Body Fat Analyzers", "bn": "স্কেল এবং শরীরের চর্বি বিশ্লেষক", "fr": "Balances et analyseurs de graisse corporelle", "zh": "体重秤和体脂分析仪", "ar": "موازين ومحللات دهون الجسم", "be": "Вагі і аналізатары жыру", "bg": "Везни и анализатори на мазнините в тялото", "ca": "Bàscules i analitzadors de greix corporal", "et": "Kaalud ja keha rasva analüsaatorid", "nl": "Weegschalen & Lichaamsvetanalysatoren" }',
                    'slug' => '{ "en": "scales-body-fat-analyzers", "bn": "স্কেল-এবং-শরীরের-চর্বি-বিশ্লেষক", "fr": "balances-et-analyseurs-de-graisse-corporelle", "zh": "体重秤和体脂分析仪", "ar": "موازين-ومحللات-دهون-الجسم", "be": "вагі-і-аналізатары-жыру", "bg": "везни-и-анализатори-на-мазнините-в-тялото", "ca": "bàscules-i-analitzadors-de-greix-corporal", "et": "kaalud-ja-keha-rasva-analüsaatorid", "nl": "weegschalen-lichaamsvetanalysatoren" }',
                    'parent_id' => 88,
                    'order_by' => 8,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            235 =>
                array (
                    'id' => 387,
                    'name' => '{ "en": "Wheelchairs", "bn": "চাকা চেয়ার", "fr": "Fauteuils roulants", "zh": "轮椅", "ar": "كراسي متحركة", "be": "Калесныя крэслы", "bg": "Колички", "ca": "Cadires de rodes", "et": "Ratastoolid", "nl": "Rolstoelen" }',
                    'slug' => '{ "en": "wheelchairs", "bn": "চাকা-চেয়ার", "fr": "fauteuils-roulants", "zh": "轮椅", "ar": "كراسي-متحركة", "be": "калесныя-крэслы", "bg": "колички", "ca": "cadires-de-rodes", "et": "ratastoolid", "nl": "rolstoelen" }',
                    'parent_id' => 88,
                    'order_by' => 9,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            236 =>
                array (
                    'id' => 388,
                    'name' => '{ "en": "Baby & Toddler Foods", "bn": "শিশু এবং টডলার খাবার", "fr": "Aliments pour bébés et tout-petits", "zh": "婴儿和幼儿食品", "ar": "طعام الرضع والأطفال الصغار", "be": "Дзіцячая і маляцкія ежа", "bg": "Храни за бебета и малки деца", "ca": "Aliments per a nadons i nens petits", "et": "Beebi- ja mudilasfood", "nl": "Baby- en peutervoeding" }',
                    'slug' => '{ "en": "baby-toddler-foods", "bn": "শিশু-এবং-টডলার-খাবার", "fr": "aliments-pour-bébés-et-tout-petits", "zh": "婴儿和幼儿食品", "ar": "طعام-الرضع-والأطفال-الصغار", "be": "дзіцячая-і-маляцкія-ежа", "bg": "храна-за-бебета-и-малки-деца", "ca": "aliments-per-a-nadons-i-nens-petits", "et": "beebi-ja-mudilasfood", "nl": "baby-en-peutervoeding" }',
                    'parent_id' => 91,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            237 =>
                array (
                    'id' => 389,
                    'name' => '{ "en": "Milk Formula", "bn": "দুধের ফর্মুলা", "fr": "Formule de lait", "zh": "奶粉", "ar": "صيغة الحليب", "be": "Малочная формула", "bg": "Млечна формула", "ca": "Fórmula de llet", "et": "Piimavalem", "nl": "Melkformule" }',
                    'slug' => '{ "en": "milk-formula", "bn": "দুধের-ফর্মুলা", "fr": "formule-de-lait", "zh": "奶粉", "ar": "صيغة-الحليب", "be": "малочная-формула", "bg": "млечна-формула", "ca": "fórmula-de-llet", "et": "piimavalem", "nl": "melkformule" }',
                    'parent_id' => 91,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            238 =>
                array (
                    'id' => 390,
                    'name' => '{ "en": "Cloth Diapers & Accessories", "bn": "কাপড় ডায়পার এবং সহায়ক সরঞ্জাম", "fr": "Couches en tissu et accessoires", "zh": "布尿布和配件", "ar": "حفاضات قماش وملحقاتها", "be": "Тканевыя памперсы і прыладдзе для іх", "bg": "Платени пелени и аксесоари", "ca": "Buidatge i accessoris", "et": "Kangast mähkmed ja tarvikud", "nl": "Katoenen luiers & Accessoires" }',
                    'slug' => '{ "en": "cloth-diapers-accessories", "bn": "কাপড়-ডায়পার-এবং-সহায়ক-সরঞ্জাম", "fr": "couches-en-tissu-et-accessoires", "zh": "布尿布和配件", "ar": "حفاضات-قماش-وملحقاتها", "be": "тканевыя-памперсы-і-прыладдзе-для-іх", "bg": "платени-пелени-и-аксесоари", "ca": "buidatge-i-accessoris", "et": "kangast-mähkmed-ja-tarvikud", "nl": "katoenen-luiers-accessoires" }',
                    'parent_id' => 92,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            239 =>
                array (
                    'id' => 391,
                    'name' => '{ "en": "Diaper Bags", "bn": "ডায়পার ব্যাগ", "fr": "Sacs à couches", "zh": "尿布包", "ar": "حقائب حفاضات", "be": "Памперсы сумкі", "bg": "Пелени чанти", "ca": "Bossa de bolquers", "et": "Mähkmekotid", "nl": "Luiertassen" }',
                    'slug' => '{ "en": "diaper-bags", "bn": "ডায়পার-ব্যাগ", "fr": "sacs-à-couches", "zh": "尿布包", "ar": "حقائب-حفاضات", "be": "памперсы-сумкі", "bg": "пелени-чанти", "ca": "bossa-de-bolquers", "et": "mähkmekotid", "nl": "luiertassen" }',
                    'parent_id' => 92,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            240 =>
                array (
                    'id' => 392,
                    'name' => '{ "en": "Wipes & Holders", "bn": "ওয়াইপ এবং হোল্ডার", "fr": " Lingettes et porte-liniments", "zh": "擦拭纸和支架", "ar": "مناديل وحاملات", "be": "Абціргалкі і тримачы", "bg": "Кърпички и държачи", "ca": "Tovalloles i titulars", "et": "Puhastuslapid ja hoidjad", "nl": "Doekjes & Houders" }',
                    'slug' => '{ "en": "wipes-holders", "bn": "ওয়াইপ-এবং-হোল্ডার", "fr": " lingettes-et-porte-liniments", "zh": "擦拭纸和支架", "ar": "مناديل-وحاملات", "be": "абціргалкі-і-тримачы", "bg": "кърпички-и-държачи", "ca": "tovalloles-i-titulars", "et": "puhastuslapid-ja-hoidjad", "nl": "doekjes-houders" }',
                    'parent_id' => 92,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            241 =>
                array (
                    'id' => 393,
                    'name' => '{ "en": "Disposable Diapers", "bn": "ডিসপোজেবল ডায়াপার", "fr": "Couches jetables", "zh": "一次性尿布", "ar": "حفاضات قابلة للتصرف", "be": "Адзінразовыя памперсы", "bg": "Еднократни пелени", "ca": "Bolquers desechables", "et": "Ühekordsed mähkmed", "nl": "Wegwerpluiers" }',
                    'slug' => '{ "en": "disposable-diapers", "bn": "ডিসপোজেবল-ডায়াপার", "fr": "couches-jetables", "zh": "一次性尿布", "ar": "حفاضات-قابلة-للتصرف", "be": "адзінразовыя-памперсы", "bg": "еднократни-пелени", "ca": "bolquers-desechables", "et": "ühekordsed-mähkmed", "nl": "wegwerpluiers" }',
                    'parent_id' => 92,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            242 =>
                array (
                    'id' => 394,
                    'name' => '{ "en": "Baby Walkers", "bn": "শিশু হাঁটুবে", "fr": "Marchettes pour bébés", "zh": "婴儿行走器", "ar": "مشاية الطفل", "be": "Шпаклёнкі для дзяцей", "bg": "Ходилки за бебета", "ca": "Caminadors de nadó", "et": "Beebi käimistoolid", "nl": "Loopstoeltjes voor baby\'s" }',
                    'slug' => '{ "en": "baby-walkers", "bn": "শিশু-হাঁটুবে", "fr": "marchettes-pour-bébés", "zh": "婴儿行走器", "ar": "مشاية-الطفل", "be": "шпаклёнкі-для-дзяцей", "bg": "ходилки-за-бебета", "ca": "caminadors-de-nadó", "et": "beebi-käimistoolid", "nl": "loopstoeltjes-voor-babys" }',
                    'parent_id' => 93,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            243 =>
                array (
                    'id' => 395,
                    'name' => '{ "en": "Backpacks & Carriers", "bn": "ব্যাকপ্যাক এবং ক্যারিয়ার", "fr": "Sacs à dos et porte-bébés", "zh": "背包和背带", "ar": "حقائب الظهر والحمالات", "be": "Рюкзакі і пераноскі", "bg": "Раници и носилки", "ca": "Motxilles i carregadors", "et": "Seljakotid ja kandjad", "nl": "Rugzakken & Dragers" }',
                    'slug' => '{ "en": "backpacks-carriers", "bn": "ব্যাকপ্যাক-এবং-ক্যারিয়ার", "fr": "sacs-à-dos-et-porte-bébés", "zh": "背包和背带", "ar": "حقائب-الظهر-والحمالات", "be": "рюкзакі-і-пераноскі", "bg": "раници-и-носилки", "ca": "motxilles-i-carregadors", "et": "seljakotid-ja-kandjad", "nl": "rugzakken-dragers" }',
                    'parent_id' => 93,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            244 =>
                array (
                    'id' => 396,
                    'name' => '{ "en": "Strollers", "bn": "স্ট্রোলার", "fr": "Poussettes", "zh": "婴儿车", "ar": "عربات الأطفال", "be": "Коляски", "bg": "Детски колички", "ca": "Carruatges", "et": "Lapsed", "nl": "Kinderwagens" }',
                    'slug' => '{ "en": "strollers", "bn": "স্ট্রোলার", "fr": "poussettes", "zh": "婴儿车", "ar": "عربات-الأطفال", "be": "коляски", "bg": "детски-колички", "ca": "carruatges", "et": "lapsed", "nl": "kinderwagens" }',
                    'parent_id' => 93,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            245 =>
                array (
                    'id' => 397,
                    'name' => '{ "en": "Swings, Jumpers & Bouncers", "bn": "স্বিং, জাম্পার এবং বাউন্সার", "fr": "Balancelles, sauteurs et rebonds", "zh": "摇摆，跳跃器和蹦床", "ar": "أرجوحات، قافزات وعوامات", "be": "Качалкі, скакалкі і скакушкі", "bg": "Качалки, скакалки и триони", "ca": "Balanços, saltadors i rebotadors", "et": "Kiiged, hüppajad ja hüppajad", "nl": "Schommels, springers & Stuiteraars" }',
                    'slug' => '{ "en": "swings-jumpers-bouncers", "bn": "স্বিং-জাম্পার-এবং-বাউন্সার", "fr": "balancelles-sauteurs-et-rebonds", "zh": "摇摆，跳跃器和蹦床", "ar": "أرجوحات،-قافزات-وعوامات", "be": "качалкі-скакалкі-і-скакушкі", "bg": "качалки-скакалки-и-триони", "ca": "balanços-saltadors-i-rebotadors", "et": "kiiged-hüppajad-ja-hüppajad", "nl": "schommels-springers-stuiteraars" }',
                    'parent_id' => 93,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            246 =>
                array (
                    'id' => 398,
                    'name' => '{ "en": "Baby Bath", "bn": "শিশু গোসল", "fr": "Bain de bébé", "zh": "婴儿浴", "ar": "استحمام الطفل", "be": "Купанне дзіцяці", "bg": "Бебешка баня", "ca": "Bany del nadó", "et": "Beebi vann", "nl": "Babybad" }',
                    'slug' => '{ "en": "baby-bath", "bn": "শিশু-গোসল", "fr": "bain-de-bébé", "zh": "婴儿浴", "ar": "استحمام-الطفل", "be": "купанне-дзіцяці", "bg": "бебешка-баня", "ca": "bany-del-nadó", "et": "beebi-vann", "nl": "babybad" }',
                    'parent_id' => 94,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            247 =>
                array (
                    'id' => 399,
                    'name' => '{ "en": "Bathing Tubs & Seats", "bn": "স্নান টাব এবং সিট", "fr": "Baignoires et sièges de bain", "zh": "浴缸和座椅", "ar": "حوض الاستحمام والمقاعد", "be": "Ванны і сядзішчы для купання", "bg": "Къпане и седалки", "ca": "Banyeres i seients de bany", "et": "Vannid ja vannitoolid", "nl": "Badkuipen & Zitjes" }',
                    'slug' => '{ "en": "bathing-tubs-seats", "bn": "স্নান-টাব-এবং-সিট", "fr": "baignoires-et-sièges-de-bain", "zh": "浴缸和座椅", "ar": "حوض-الاستحمام-والمقاعد", "be": "ванны-і-сядзішчы-для-купання", "bg": "къпане-и-седалки", "ca": "banyeres-i-seients-de-bany", "et": "vannid-ja-vannitoolid", "nl": "badkuipen-zitjes" }',
                    'parent_id' => 94,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            248 =>
                array (
                    'id' => 400,
                    'name' => '{ "en": "Shampoo & Conditioners", "bn": "শ্যাম্পু এবং কন্ডিশনার", "fr": "Shampoing et après-shampoing", "zh": "洗发水和护发素", "ar": "شامبو وبلسم", "be": "Шампунь і кандыцыянеры", "bg": "Шампоани и балсами", "ca": "Xampú i acondicionador", "et": "Šampoon ja konditsioneerid", "nl": "Shampoo & Conditioners" }',
                    'slug' => '{ "en": "shampoo-conditioners", "bn": "শ্যাম্পু-এবং-কন্ডিশনার", "fr": "shampoing-et-après-shampoing", "zh": "洗发水和护发素", "ar": "شامبو-وبلسم", "be": "шампунь-і-кандыцыянеры", "bg": "шампоани-и-балсами", "ca": "xampú-i-acondicionador", "et": "šampoon-ja-konditsioneerid", "nl": "shampoo-conditioners" }',
                    'parent_id' => 94,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            249 =>
                array (
                    'id' => 401,
                    'name' => '{ "en": "Soaps, Cleansers & Bodywash", "bn": "সাবান, ক্লিনার এবং বডি ওয়াশ", "fr": "Savons, nettoyants et gels douche", "zh": "肥皂，洁净剂和沐浴露", "ar": "الصابون والمنظفات وغسول الجسم", "be": "Мыло, чысцільнікі і гель для душу", "bg": "Сапуни, почистващи средства и гел за тяло", "ca": "Sabons, netejadors i gel de dutxa", "et": "Seebid, puhastusvahendid ja kehapesu", "nl": "Zepen, Reinigers & Douchegel" }',
                    'slug' => '{ "en": "soaps-cleansers-bodywash", "bn": "সাবান,-ক্লিনার-এবং-বডি-ওয়াশ", "fr": "savons-nettoyants-et-gels-douche", "zh": "肥皂，洁净剂和沐浴露", "ar": "الصابون-والمنظفات-وغسول-الجسم", "be": "мыло,-чысцільнікі-і-гель-для-душу", "bg": "сапуни,-почистващи-средства-и-гел-за-тяло", "ca": "sabons,-netejadors-i-gel-de-dutxa", "et": "seebid-puhastusvahendid-ja-kehapesu", "nl": "zepen-reinigers-douchegel" }',
                    'parent_id' => 94,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            250 =>
                array (
                    'id' => 402,
                    'name' => '{ "en": "Girls Clothing", "bn": "মেয়েদের পোশাক", "fr": "Vêtements pour filles", "zh": "女孩服装", "ar": "ملابس الفتيات", "be": "Дзяўчынкі адзенне", "bg": "Момичешки дрехи", "ca": "Roba de nena", "et": "Tüdrukute rõivad", "nl": "Meisjeskleding" }',
                    'slug' => '{ "en": "girls-clothing", "bn": "মেয়েদের-পোশাক", "fr": "vêtements-pour-filles", "zh": "女孩服装", "ar": "ملابس-الفتيات", "be": "дзяўчынкі-адзенне", "bg": "момичешки-дрехи", "ca": "roba-de-nena", "et": "tüdrukute-rõivad", "nl": "meisjeskleding" }',
                    'parent_id' => 95,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            251 =>
                array (
                    'id' => 403,
                    'name' => '{ "en": "Girls Shoes", "bn": "মেয়েদের জুতা", "fr": "Chaussures pour filles", "zh": "女孩鞋", "ar": "أحذية الفتيات", "be": "Дзяўчынкі абувь", "bg": "Момичешки обувки", "ca": "Sabates de nena", "et": "Tüdrukute jalatsid", "nl": "Meisjesschoenen" }',
                    'slug' => '{ "en": "girls-shoes", "bn": "মেয়েদের-জুতা", "fr": "chaussures-pour-filles", "zh": "女孩鞋", "ar": "أحذية-الفتيات", "be": "дзяўчынкі-абувь", "bg": "момичешки-обувки", "ca": "sabates-de-nena", "et": "tüdrukute-jalatsid", "nl": "meisjesschoenen" }',
                    'parent_id' => 95,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            252 =>
                array (
                    'id' => 404,
                    'name' => '{ "en": "Boys Clothing", "bn": "বালকদের পোশাক", "fr": "Vêtements pour garçons", "zh": "男孩服装", "ar": "ملابس الأولاد", "be": "Хлопчыкі адзенне", "bg": "Момчешки дрехи", "ca": "Roba de noi", "et": "Poiste rõivad", "nl": "Jongenskleding" }',
                    'slug' => '{ "en": "boys-clothing", "bn": "বালকদের-পোশাক", "fr": "vêtements-pour-garçons", "zh": "男孩服装", "ar": "ملابس-الأولاد", "be": "хлопчыкі-адзенне", "bg": "момчешки-дрехи", "ca": "roba-de-noi", "et": "poiste-rõivad", "nl": "jongenskleding" }',
                    'parent_id' => 95,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            253 =>
                array (
                    'id' => 405,
                    'name' => '{ "en": "Maternity Wear", "bn": "মাতৃত্ব পোশাক", "fr": "Vêtements de maternité", "zh": "孕妇装", "ar": "ملابس الحمل", "be": "Адзенне для берэзства", "bg": "Майчинство дрехи", "ca": "Roba de maternitat", "et": "Rasedusriided", "nl": "Zwangerschapskleding" }',
                    'slug' => '{ "en": "maternity-wear", "bn": "মাতৃত্ব-পোশাক", "fr": "vêtements-de-maternité", "zh": "孕妇装", "ar": "ملابس-الحمل", "be": "адзенне-для-берэзства", "bg": "майчинство-дрехи", "ca": "roba-de-maternitat", "et": "rasedusriided", "nl": "zwangerschapskleding" }',
                    'parent_id' => 95,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            254 =>
                array (
                    'id' => 406,
                    'name' => '{ "en": "New Born Unisex (Zero - Six months)", "bn": "নতুন জন্ম ইউনিসেক্স (শূন্য - ছয় মাস)", "fr": "Nouveau-né unisexe (zéro - six mois)", "zh": "新生儿通用（零 - 六个月）", "ar": "مواليد جديدة مشتركة (صفر - ستة أشهر)", "be": "Новы народжаны унісекс (нуль - шэсць месяцаў)", "bg": "Новородено унисекс (нула - шест месеца)", "ca": "Nadó unisex (zero - sis mesos)", "et": "Uue sündinu unisex (null - kuus kuud)", "nl": "Pasgeborenen Unisex (nul - zes maanden)" }',
                    'slug' => '{ "en": "new-born-unisex", "bn": "নতুন-জন্ম-ইউনিসেক্স", "fr": "nouveau-né-unisexe", "zh": "新生儿通用", "ar": "مواليد-جديدة-مشتركة", "be": "новы-народжаныя-унісекс", "bg": "новородено-унисекс", "ca": "nadó-unisex", "et": "uue-sündinu-unisex", "nl": "pasgeborenen-unisex" }',
                    'parent_id' => 95,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            255 =>
                array (
                    'id' => 407,
                    'name' => '{ "en": "New Born Body Suits", "bn": "নতুন জন্ম বডি সুট", "fr": "Combinaisons pour nouveau-nés", "zh": "新生儿连体衣", "ar": "بدلات جديدة للمولودين", "be": "Новыя нараджэныя касцюмы", "bg": "Боди за новородени", "ca": "Bodies per a nadons", "et": "Uutele sündinutele kehakatted", "nl": "Lichaamspakjes voor pasgeborenen" }',
                    'slug' => '{ "en": "new-born-body-suits", "bn": "নতুন-জন্ম-বডি-সুট", "fr": "combinaisons-pour-nouveaux-nés", "zh": "新生儿连体衣", "ar": "بدلات-جديدة-للمولودين", "be": "новыя-нараджэныя-касцюмы", "bg": "боди-за-новородени", "ca": "bodies-per-a-nadons", "et": "uutele-sündinutele-kehakatted", "nl": "lichaamspakjes-voor-pasgeborenen" }',
                    'parent_id' => 95,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            256 =>
                array (
                    'id' => 408,
                    'name' => '{ "en": "New Born Sets & Packs", "bn": "নতুন জন্মের সেট এবং প্যাক", "fr": "Ensembles et packs pour nouveau-nés", "zh": "新生儿套装和包装", "ar": "مجموعات وحزم للمواليد الجدد", "be": "Новыя нараджэныя наборы і пакаванні", "bg": "Комплекти и пакети за новородени", "ca": "Conjunts i paquets per a nadons", "et": "Uute sündinute komplektid ja pakendid", "nl": "Sets & Pakketten voor pasgeborenen" }',
                    'slug' => '{ "en": "new-born-sets-packs", "bn": "নতুন-জন্মের-সেট-এবং-প্যাক", "fr": "ensembles-et-packs-pour-nouveaux-nés", "zh": "新生儿套装和包装", "ar": "مجموعات-وحزم-للمواليد-الجدد", "be": "новыя-нараджэныя-наборы-і-пакаванні", "bg": "комплекти-и-пакети-за-новородени", "ca": "conjunts-i-paquets-per-a-nadons", "et": "uute-sündinute-komplektid-ja-pakendid", "nl": "sets-pakketten-voor-pasgeborenen" }',
                    'parent_id' => 95,
                    'order_by' => 7,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            257 =>
                array (
                    'id' => 409,
                    'name' => '{ "en": "Bathroom Safety", "bn": "বাথরুম সুরক্ষা", "fr": "Sécurité de la salle de bain", "zh": "浴室安全", "ar": "سلامة الحمام", "be": "Бяспека ў ванной", "bg": "Безопасност в банята", "ca": "Seguretat al bany", "et": "Vannitoa ohutus", "nl": "Badkamer Veiligheid" }',
                    'slug' => '{ "en": "bathroom-safety", "bn": "বাথরুম-সুরক্ষা", "fr": "sécurité-de-la-salle-de-bain", "zh": "浴室安全", "ar": "سلامة-الحمام", "be": "бяспека-ў-ванной", "bg": "безопасност-в-банята", "ca": "seguretat-al-bany", "et": "vannitoa-ohutus", "nl": "badkamer-veiligheid" }',
                    'parent_id' => 96,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            258 =>
                array (
                    'id' => 410,
                    'name' => '{ "en": "Mattresses & Bedding", "bn": "ম্যাট্রেস এবং বেডিং", "fr": "Matelas et literie", "zh": "床垫和床上用品", "ar": "فرش ومفارش السرير", "be": "Матрацы і постельная бялізна", "bg": "Матраци и спално бельо", "ca": "Matalassos i roba de llit", "et": "Madratsid ja voodipesu", "nl": "Matrassen & Beddengoed" }',
                    'slug' => '{ "en": "mattresses-bedding", "bn": "ম্যাট্রেস-এবং-বেডিং", "fr": "matelas-et-literie", "zh": "床垫和床上用品", "ar": "فرش-ومفارش-السرير", "be": "матрацы-і-постельная-бялізна", "bg": "матраци-и-спално-бельо", "ca": "matalassos-i-roba-de-llit", "et": "madratsid-ja-voodipesu", "nl": "matrassen-beddengoed" }',
                    'parent_id' => 96,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            259 =>
                array (
                    'id' => 411,
                    'name' => '{ "en": "Sanitizers", "bn": "স্যানিটাইজার", "fr": "Désinfectants", "zh": "消毒剂", "ar": "معقمات", "be": "Антысептыкі", "bg": "Дезинфектанти", "ca": "Desinfectants", "et": "Desinfektsioonivahendid", "nl": "Desinfectiemiddelen" }',
                    'slug' => '{ "en": "sanitizers", "bn": "স্যানিটাইজার", "fr": "désinfectants", "zh": "消毒剂", "ar": "معقمات", "be": "антысептыкі", "bg": "дезинфектанти", "ca": "desinfectants", "et": "desinfektsioonivahendid", "nl": "desinfectiemiddelen" }',
                    'parent_id' => 96,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            260 =>
                array (
                    'id' => 412,
                    'name' => '{ "en": "Action Figures & Collectibles", "bn": "অ্যাকশন ফিগার এবং সংগ্রহ প্রস্তুতিকরণ", "fr": "Figurines d\'action et objets de collection", "zh": "动作人偶和收藏品", "ar": "شخصيات العمل والتحف الجمعية", "be": "Фігуркі і калектыўныя прадметы", "bg": "Фигури и колекционерски артикули", "ca": "Figures d\'acció i objectes de col·lecció", "et": "Tegevusfiguurid ja kollektsiooni esemed", "nl": "Actiefiguren & Verzamelobjecten" }',
                    'slug' => '{ "en": "action-figures-collectibles", "bn": "অ্যাকশন-ফিগার-এবং-সংগ্রহ-প্রস্তুতিকরণ", "fr": "figurines-daction-et-objets-de-collection", "zh": "动作人偶和收藏品", "ar": "شخصيات-العمل-والتحف-الجمعية", "be": "фігуркі-і-калектыўныя-прадметы", "bg": "фигури-и-колекционерски-артикули", "ca": "figures-dacció-i-objectes-de-collecció", "et": "tegevusfiguurid-ja-kollektsiooni-esemed", "nl": "actiefiguren-verzamelobjecten" }',
                    'parent_id' => 97,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            261 =>
                array (
                    'id' => 413,
                    'name' => '{ "en": "Arts & Crafts for Kids", "bn": "শিশুদের জন্য শিল্প এবং শিল্প", "fr": "Arts et artisanat pour les enfants", "zh": "儿童艺术与手工艺品", "ar": "الفنون والحرف اليدوية للأطفال", "be": "Мастацтва і майстэрства для дзяцей", "bg": "Изкуство и ръчни изделия за деца", "ca": "Arts i manualitats per a nens", "et": "Kunst ja käsitöö lastele", "nl": "Kunst & Ambachten voor Kinderen" }',
                    'slug' => '{ "en": "arts-crafts-for-kids", "bn": "শিশুদের-জন্য-শিল্প-এবং-শিল্প", "fr": "arts-et-artisanat-pour-les-enfants", "zh": "儿童艺术与手工艺品", "ar": "الفنون-والحرف-اليدوية-للأطفال", "be": "мастацтва-і-майстэрства-для-дзяцей", "bg": "изкуство-и-ръчни-изделия-за-дете", "ca": "arts-i-manualitats-per-a-nens", "et": "kunst-ja-käsitöö-lastele", "nl": "kunst-ambachten-voor-kinderen" }',
                    'parent_id' => 97,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            262 =>
                array (
                    'id' => 414,
                    'name' => '{ "en": "Ball Print & Accessories", "bn": "বল প্রিন্ট এবং সরঞ্জাম", "fr": "Impression de balles et accessoires", "zh": "球印刷和配件", "ar": "طباعة الكرات والملحقات", "be": "Штампаванне мячоў і аксесуары", "bg": "Печат на топки и аксесоари", "ca": "Impressió de boles i accessoris", "et": "Palli trükk ja tarvikud", "nl": "Balprint & Accessoires" }',
                    'slug' => '{ "en": "ball-print-accessories", "bn": "বল-প্রিন্ট-এবং-সরঞ্জাম", "fr": "impression-de-balles-et-accessoires", "zh": "球印刷和配件", "ar": "طباعة-الكرات-والملحقات", "be": "штампаванне-мячоў-і-аксесуары", "bg": "печат-на-топки-и-аксесоари", "ca": "impressió-de-boles-i-accessoris", "et": "palli-trükk-ja-tarvikud", "nl": "balprint-accessoires" }',
                    'parent_id' => 97,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            263 =>
                array (
                    'id' => 415,
                    'name' => '{ "en": "Block & Building Toys", "bn": "ব্লক এবং ভবন খেলনা", "fr": "Jouets de blocs et de construction", "zh": "积木和建筑玩具", "ar": "لعب البناء والتركيبات", "be": "Кубікі і будаўнічыя гульні", "bg": "Блокове и строителни играчки", "ca": "Joguines de blocs i construcció", "et": "Plokk- ja ehitusmänguasjad", "nl": "Blok & Bouwspeelgoed" }',
                    'slug' => '{ "en": "block-building-toys", "bn": "ব্লক-এবং-ভবন-খেলনা", "fr": "jouets-de-blocs-et-de-construction", "zh": "积木和建筑玩具", "ar": "لعب-البناء-والتركيبات", "be": "кубікі-і-будаўнічыя-гульні", "bg": "блокове-и-строителни-играчки", "ca": "joguines-de-blocs-i-construcció", "et": "plokk-ja-ehitusmänguasjad", "nl": "blok-bouwspeelgoed" }',
                    'parent_id' => 97,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            264 =>
                array (
                    'id' => 416,
                    'name' => '{ "en": "Doll & Accessories", "bn": "পুতুল এবং সরঞ্জাম", "fr": "Poupée et accessoires", "zh": "玩偶和配件", "ar": "دمية وملحقات", "be": "Лялька і аксесуары", "bg": "Кукла и аксесоари", "ca": "Nina i accessoris", "et": "Nukk ja tarvikud", "nl": "Pop & Accessoires" }',
                    'slug' => '{ "en": "doll-accessories", "bn": "পুতুল-এবং-সরঞ্জাম", "fr": "poupée-et-accessoires", "zh": "玩偶和配件", "ar": "دمية-وملحقات", "be": "лялька-і-аксесуары", "bg": "кукла-и-аксесоари", "ca": "nina-i-accessoris", "et": "nukk-ja-tarvikud", "nl": "pop-accessoires" }',
                    'parent_id' => 97,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            265 =>
                array (
                    'id' => 417,
                    'name' => '{ "en": "Dress Up & Pretend Play", "bn": "পোশাক এবং শ্রীমতি খেলা", "fr": "Déguisements et jeux de simulation", "zh": "穿衣服和假装玩", "ar": "تلبيس ولعب تظاهري", "be": "Нарадзіцца і працягваць гуляць", "bg": "Обличам се и играя на преструвка", "ca": "Disfresses i jocs de fingir", "et": "Riietuge ja teesklege", "nl": "Verkleden & Verbeeldingsspellen" }',
                    'slug' => '{ "en": "dress-up-pretend-play", "bn": "পোশাক-এবং-শ্রীমতি-খেলা", "fr": "déguisements-et-jeux-de-simulation", "zh": "穿衣服和假装玩", "ar": "تلبيس-ولعب-تظاهري", "be": "нарадзіцца-і-працягваць-гуляць", "bg": "обличам-се-и-играя-на-преструвка", "ca": "disfresses-i-jocs-de-fingir", "et": "riietuge-ja-teesklege", "nl": "verkleden-verbeeldingsspellen" }',
                    'parent_id' => 97,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            266 =>
                array (
                    'id' => 418,
                    'name' => '{ "en": "Electronic toys", "bn": "ইলেকট্রনিক খেলনা", "fr": "Jouets électroniques", "zh": "电子玩具", "ar": "ألعاب إلكترونية", "be": "Электронныя гульні", "bg": "Електронни играчки", "ca": "Joguines electròniques", "et": "Elektroonilised mänguasjad", "nl": "Elektronisch speelgoed" }',
                    'slug' => '{ "en": "electronic-toys", "bn": "ইলেকট্রনিক-খেলনা", "fr": "jouets-électroniques", "zh": "电子玩具", "ar": "ألعاب-إلكترونية", "be": "электронныя-гульні", "bg": "електронни-играчки", "ca": "joguines-electròniques", "et": "elektroonilised-mänguasjad", "nl": "elektronisch-speelgoed" }',
                    'parent_id' => 97,
                    'order_by' => 7,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            267 =>
                array (
                    'id' => 420,
                    'name' => '{ "en": "Party Supplies", "bn": "পার্টি সরঞ্জাম", "fr": "Fournitures de fête", "zh": "派对用品", "ar": "لوازم الحفلات", "be": "Парцякавае прадукцыя", "bg": "Парти аксесоари", "ca": "Articles de festa", "et": "Pidulauatarbed", "nl": "Feestartikelen" }',
                    'slug' => '{ "en": "party-supplies", "bn": "পার্টি-সরঞ্জাম", "fr": "fournitures-de-fête", "zh": "派对用品", "ar": "لوازم-الحفلات", "be": "парцякавае-прадукцыя", "bg": "парти-аксесоари", "ca": "articles-de-festa", "et": "pidulauatarbed", "nl": "feestartikelen" }',
                    'parent_id' => 97,
                    'order_by' => 9,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            268 =>
                array (
                    'id' => 421,
                    'name' => '{ "en": "Puzzle", "bn": "পাজল", "fr": "Puzzle", "zh": "拼图", "ar": "لغز", "be": "Галаваломка", "bg": "Пъзел", "ca": "Puzle", "et": "Mõistatus", "nl": "Puzzel" }',
                    'slug' => '{ "en": "puzzle", "bn": "পাজল", "fr": "puzzle", "zh": "拼图", "ar": "لغز", "be": "галаваломка", "bg": "пъзел", "ca": "puzle", "et": "mõistatus", "nl": "puzzel" }',
                    'parent_id' => 97,
                    'order_by' => 10,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            269 =>
                array (
                    'id' => 422,
                    'name' => '{ "en": "Slime & Squishy Toys", "bn": "স্লাইম এবং স্কুইশি খেলনা", "fr": "Jouets Slime & Squishy", "zh": "粘液和弹性玩具", "ar": "لعب سلايم وسكويشي", "be": "Гульні з ліпкім ваніліным масам і сквіші", "bg": "Играчки Слайм и Сквиши", "ca": "Joguines de fang i esponjoses", "et": "Lim ja pigistatavad mänguasjad", "nl": "Slijm & Squishy Speelgoed" }',
                    'slug' => '{ "en": "slime-squishy-toys", "bn": "স্লাইম-এবং-স্কুইশি-খেলনা", "fr": "jouets-slime-squishy", "zh": "粘液和弹性玩具", "ar": "لعب-سلايم-وسكويشي", "be": "гульні-з-ліпкім-ваніліным-масам-і-сквіші", "bg": "играчки-слайм-и-сквиши", "ca": "joguines-de-fang-i-esponjoses", "et": "lim-ja-pigistatavad-mänguasjad", "nl": "slijm-squishy-speelgoed" }',
                    'parent_id' => 97,
                    'order_by' => 11,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            270 =>
                array (
                    'id' => 423,
                    'name' => '{ "en": "Stuffed Toys", "bn": "স্টাফড খেলনা", "fr": "Peluches", "zh": "填充玩具", "ar": "الألعاب المحشوة", "be": "Мяккія іграшкі", "bg": "Пълнени играчки", "ca": "Joguines de peluix", "et": "Täidetud mänguasjad", "nl": "Knuffels" }',
                    'slug' => '{ "en": "stuffed-toys", "bn": "স্টাফড-খেলনা", "fr": "peluches", "zh": "填充玩具", "ar": "الألعاب-المحشوة", "be": "мяккія-іграшкі", "bg": "пълнени-играчки", "ca": "joguines-de-peluix", "et": "täidetud-mänguasjad", "nl": "knuffels" }',
                    'parent_id' => 97,
                    'order_by' => 12,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            271 =>
                array (
                    'id' => 432,
                    'name' => '{ "en": "Die-Cast Vehicles", "bn": "ডাই-কাস্ট যানবাহন", "fr": "Véhicules moulés sous pression", "zh": "压铸车辆", "ar": "مركبات مدلاة بالقوالب", "be": "Мадэльныя машыны", "bg": "Метални модели на превозни средства", "ca": "Vehicles de fosa", "et": "Valatud sõidukid", "nl": "Gegoten Voertuigen" }',
                    'slug' => '{ "en": "die-cast-vehicles", "bn": "ডাই-কাস্ট-যানবাহন", "fr": "véhicules-moulés-sous-pression", "zh": "压铸车辆", "ar": "مركبات-مدلاة-بالقوالب", "be": "мадэльныя-машыны", "bg": "метални-модели-на-превозни-средства", "ca": "vehicles-de-fosa", "et": "valatud-sõidukid", "nl": "gegoten-voertuigen" }',
                    'parent_id' => 99,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            272 =>
                array (
                    'id' => 433,
                    'name' => '{ "en": "RC Vehicles & Batteries", "bn": "আরসি যানবাহন এবং ব্যাটারি", "fr": "Véhicules télécommandés et batteries", "zh": "遥控车辆和电池", "ar": "مركبات التحكم عن بعد والبطاريات", "be": "Дзіцельныя транспартныя сродкі і батарэі", "bg": "RC превозни средства и батерии", "ca": "Vehicles de control remot i bateries", "et": "RC sõidukid ja akud", "nl": "RC Voertuigen & Batterijen" }',
                    'slug' => '{ "en": "rc-vehicles-batteries", "bn": "আরসি-যানবাহন-এবং-ব্যাটারি", "fr": "véhicules-télécommandés-et-batteries", "zh": "遥控车辆和电池", "ar": "مركبات-التحكم-عن-بعد-والبطاريات", "be": "дзіцельныя-транспартныя-сродкі-і-батарэі", "bg": "rc-превозни-средства-и-батерии", "ca": "vehicles-de-control-remot-i-bateries", "et": "rc-sõidukid-ja-akud", "nl": "rc-voertuigen-batterijen" }',
                    'parent_id' => 99,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            273 =>
                array (
                    'id' => 434,
                    'name' => '{ "en": "Play Trains & Railway Sets", "bn": "প্লে ট্রেন এবং রেলওয়ে সেট", "fr": "Trains et ensembles ferroviaires de jeu", "zh": "玩具火车和铁路套装", "ar": "قطارات ومجموعات سكك حديدية للعب", "be": "Паездкі і залежнасці залізнадарожных гульняў", "bg": "Играчни влакове и комплекти железопътни пътища", "ca": "Trens de joc i jocs de ferrocarril", "et": "Mängurongid ja raudteekomplektid", "nl": "Speel Treinen & Spoorwegsets" }',
                    'slug' => '{ "en": "play-trains-railway-sets", "bn": "প্লে-ট্রেন-এবং-রেলওয়ে-সেট", "fr": "trains-et-ensembles-ferroviaires-de-jeu", "zh": "玩具火车和铁路套装", "ar": "قطارات-ومجموعات-سكك-حديدية-للعب", "be": "паездкі-і-залежнасці-залізнадарожных-гульняў", "bg": "играчни-влакове-и-комплекти-железопътни-пътища", "ca": "trens-de-joc-i-jocs-de-ferrocarril", "et": "mängurongid-ja-raudteekomplektid", "nl": "speel-treinen-en-spoorwegsets" }',
                    'parent_id' => 99,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            274 =>
                array (
                    'id' => 435,
                    'name' => '{ "en": "Play Vehicles", "bn": "খেলার যানবাহন", "fr": "Véhicules de jeu", "zh": "玩具车辆", "ar": "مركبات لعب", "be": "Машыны для гульні", "bg": "Играчки превозни средства", "ca": "Vehicles de joc", "et": "Mängusõidukid", "nl": "Speelvoertuigen" }',
                    'slug' => '{ "en": "play-vehicles", "bn": "খেলার-যানবাহন", "fr": "véhicules-de-jeu", "zh": "玩具车辆", "ar": "مركبات-لعب", "be": "машыны-для-гульні", "bg": "играчки-превозни-средства", "ca": "vehicles-de-joc", "et": "mängusõidukid", "nl": "speelvoertuigen" }',
                    'parent_id' => 99,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            275 =>
                array (
                    'id' => 436,
                    'name' => '{ "en": "Drones & Accessories", "bn": "ড্রোন এবং সরঞ্জাম", "fr": "Drones et accessoires", "zh": "无人机和配件", "ar": "الطائرات بدون طيار والملحقات", "be": "Дроны і аксесуары", "bg": "Дронове и аксесоари", "ca": "Drons i accessoris", "et": "Droonid ja tarvikud", "nl": "Drones & Accessoires" }',
                    'slug' => '{ "en": "drones-accessories", "bn": "ড্রোন-এবং-সরঞ্জাম", "fr": "drones-et-accessoires", "zh": "无人机和配件", "ar": "الطائرات-بدون-طيار-والملحقات", "be": "дроны-і-аксесуары", "bg": "дронове-и-аксесоари", "ca": "drons-i-accessoris", "et": "droonid-ja-tarvikud", "nl": "drones-en-accessoires" }',
                    'parent_id' => 99,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            276 =>
                array (
                    'id' => 438,
                    'name' => '{ "en": "Kids Bikes & Accessories", "bn": "শিশু চাকা এবং সরঞ্জাম", "fr": "Vélos pour enfants et accessoires", "zh": "儿童自行车和配件", "ar": "دراجات أطفال وملحقات", "be": "Дзіцячыя веласіпеды і аксесуары", "bg": "Детски велосипеди и аксесоари", "ca": "Bicicletes infantils i accessoris", "et": "Laste jalgrattad ja tarvikud", "nl": "Kinderfietsen & Accessoires" }',
                    'slug' => '{ "en": "kids-bikes-accessories", "bn": "শিশু-চাকা-এবং-সরঞ্জাম", "fr": "vélos-pour-enfants-et-accessoires", "zh": "儿童自行车和配件", "ar": "دراجات-أطفال-وملحقات", "be": "дзіцячыя-веласіпеды-і-аксесуары", "bg": "детски-велосипеди-и-аксесоари", "ca": "bicicletes-infantils-i-accessoris", "et": "laste-jalgrattad-ja-tarvikud", "nl": "kinderfietsen-en-accessoires" }',
                    'parent_id' => 100,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            277 =>
                array (
                    'id' => 440,
                    'name' => '{ "en": "Outdoor Toys", "bn": "বাইরের খেলনা", "fr": "Jouets d\'extérieur", "zh": "户外玩具", "ar": "ألعاب خارجية", "be": "Вонкавыя гульні", "bg": "Външни играчки", "ca": "Joguines a l\'aire lliure", "et": "Õues mänguasjad", "nl": "Buitenspeelgoed" }',
                    'slug' => '{ "en": "outdoor-toys", "bn": "বাইরের-খেলনা", "fr": "jouets-d\'extérieur", "zh": "户外玩具", "ar": "ألعاب-خارجية", "be": "вонкавыя-гульні", "bg": "външни-играчки", "ca": "joguines-a-l\'aire-lliure", "et": "õues-mänguasjad", "nl": "buitenspeelgoed" }',
                    'parent_id' => 100,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            278 =>
                array (
                    'id' => 442,
                    'name' => '{ "en": "Boxing", "bn": "বক্সিং", "fr": "Boxe", "zh": "拳击", "ar": "الملاكمة", "be": "Бокс", "bg": "Бокс", "ca": "Boxa", "et": "Poksimine", "nl": "Boksen" }',
                    'slug' => '{ "en": "boxing", "bn": "বক্সিং", "fr": "boxe", "zh": "拳击", "ar": "الملاكمة", "be": "бокс", "bg": "бокс", "ca": "boxa", "et": "poksimine", "nl": "boksen" }',
                    'parent_id' => 100,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            279 =>
                array (
                    'id' => 445,
                    'name' => '{ "en": "Kids Tricycles", "bn": "শিশু ত্রাইসাইকেল", "fr": "Tricycles pour enfants", "zh": "儿童三轮车", "ar": "دراجات ثلاثية العجلات للأطفال", "be": "Дзіцячыя трохколесныя веласіпеды", "bg": "Триколесници за деца", "ca": "Tricicles per a nens", "et": "Laste kolmerattalised jalgrattad", "nl": "Driewielers voor Kinderen" }',
                    'slug' => '{ "en": "kids-tricycles", "bn": "শিশু-ত্রাইসাইকেল", "fr": "tricycles-pour-enfants", "zh": "儿童三轮车", "ar": "دراجات-ثلاثية-العجلات-للأطفال", "be": "дзіцячыя-трохколесныя-веласіпеды", "bg": "триколесници-за-деца", "ca": "tricicles-per-a-nens", "et": "laste-kolmerattalised-jalgrattad", "nl": "driewielers-voor-kinderen" }',
                    'parent_id' => 100,
                    'order_by' => 9,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            280 =>
                array (
                    'id' => 446,
                    'name' => '{ "en": "Toys Sports", "bn": "খেলনা খেলা", "fr": "Sports jouets", "zh": "玩具运动", "ar": "ألعاب رياضية", "be": "Спортавыя гульні", "bg": "Спортни играчки", "ca": "Esports de joguina", "et": "Mänguasjad", "nl": "Speelsport" }',
                    'slug' => '{ "en": "toys-sports", "bn": "খেলনা-খেলা", "fr": "sports-jouets", "zh": "玩具运动", "ar": "ألعاب-رياضية", "be": "спортавыя-гульні", "bg": "спортни-играчки", "ca": "esports-de-joguina", "et": "mänguasjad", "nl": "speelsport" }',
                    'parent_id' => 100,
                    'order_by' => 10,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            281 =>
                array (
                    'id' => 447,
                    'name' => '{ "en": "Board Games", "bn": "বোর্ড খেলা", "fr": "Jeux de société", "zh": "桌游", "ar": "ألعاب لوحية", "be": "Настольныя гульні", "bg": "Настолни игри", "ca": "Jocs de taula", "et": "Lauamängud", "nl": "Bordspellen" }',
                    'slug' => '{ "en": "board-games", "bn": "বোর্ড-খেলা", "fr": "jeux-de-société", "zh": "桌游", "ar": "ألعاب-لوحية", "be": "настольныя-гульні", "bg": "настолни-игри", "ca": "jocs-de-taula", "et": "lauamängud", "nl": "bordspellen" }',
                    'parent_id' => 101,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            282 =>
                array (
                    'id' => 448,
                    'name' => '{ "en": "Card Games", "bn": "কার্ড খেলা", "fr": "Jeux de cartes", "zh": "纸牌游戏", "ar": "ألعاب بطاقات", "be": "Картавыя гульні", "bg": "Картични игри", "ca": "Jocs de cartes", "et": "Kaardimängud", "nl": "Kaartspellen" }',
                    'slug' => '{ "en": "card-games", "bn": "কার্ড-খেলা", "fr": "jeux-de-cartes", "zh": "纸牌游戏", "ar": "ألعاب-بطاقات", "be": "картавыя-гульні", "bg": "картични-игри", "ca": "jocs-de-cartes", "et": "kaardimängud", "nl": "kaartspellen" }',
                    'parent_id' => 101,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            283 =>
                array (
                    'id' => 449,
                    'name' => '{ "en": "Game Room Games", "bn": "খেলার কক্ষ খেলা", "fr": "Jeux de salle de jeux", "zh": "游戏室游戏", "ar": "ألعاب غرفة اللعب", "be": "Гульні ў кіматэ гульняў", "bg": "Игри в игрална стая", "ca": "Jocs de sala de jocs", "et": "Mängutuba Mängud", "nl": "Speelkamer Spellen" }',
                    'slug' => '{ "en": "game-room-games", "bn": "খেলার-কক্ষ-খেলা", "fr": "jeux-de-salle-de-jeux", "zh": "游戏室游戏", "ar": "ألعاب-غرفة-اللعب", "be": "гульні-ў-кіматэ-гульняў", "bg": "игри-в-игрална-стая", "ca": "jocs-de-sala-de-jocs", "et": "mängutuba-mängud", "nl": "speelkamer-spellen" }',
                    'parent_id' => 101,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            284 =>
                array (
                    'id' => 450,
                    'name' => '{ "en": "Casual", "bn": "আবশ্যক", "fr": "Décontracté", "zh": "休闲", "ar": "عادي", "be": "Увольнена", "bg": "Случаен", "ca": "Informal", "et": "Rahulik", "nl": "Casual" }',
                    'slug' => '{ "en": "casual", "bn": "সাধারণ", "fr": "décontracté", "zh": "休闲", "ar": "عادي", "be": "увольнена", "bg": "случаен", "ca": "informal", "et": "rahulik", "nl": "casual" }',
                    'parent_id' => 147,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            285 =>
                array (
                    'id' => 451,
                    'name' => '{ "en": "Business", "bn": "ব্যবসা", "fr": "Affaires", "zh": "商业", "ar": "أعمال", "be": "Бізнес", "bg": "Бизнес", "ca": "Negocis", "et": "Äri", "nl": "Zaken" }',
                    'slug' => '{ "en": "business", "bn": "ব্যবসা", "fr": "affaires", "zh": "商业", "ar": "أعمال", "be": "бізнес", "bg": "бизнес", "ca": "negocis", "et": "äri", "nl": "zaken" }',
                    'parent_id' => 147,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            286 =>
                array (
                    'id' => 452,
                    'name' => '{ "en": "Fashion", "bn": "ফ্যাশন", "fr": "Mode", "zh": "时尚", "ar": "أزياء", "be": "Мода", "bg": "Мода", "ca": "Moda", "et": "Moekunst", "nl": "Mode" }',
                    'slug' => '{ "en": "-fashion-", "bn": "-ফ্যাশন-", "fr": "-mode-", "zh": "-时尚-", "ar": "--أزياء", "be": "-мода-", "bg": "-мода-", "ca": "-moda-", "et": "-moekunst-", "nl": "-mode-" }',
                    'parent_id' => 147,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            287 =>
                array (
                    'id' => 453,
                    'name' => '{ "en": "Sport", "bn": "ক্রীড়া", "fr": "Sport", "zh": "体育", "ar": "رياضة", "be": "Спорт", "bg": "Спорт", "ca": "Esport", "et": "Sport", "nl": "Sport" }',
                    'slug' => '{ "en": "sport", "bn": "ক্রীড়া", "fr": "sport", "zh": "体育", "ar": "رياضة", "be": "спорт", "bg": "спорт", "ca": "esport", "et": "sport", "nl": "sport" }',
                    'parent_id' => 147,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            288 =>
                array (
                    'id' => 454,
                    'name' => '{ "en": "Casual", "bn": "সাধারণ", "fr": "Décontracté", "zh": "休闲", "ar": "عادي", "be": "Увольнена", "bg": "Случаен", "ca": "Informal", "et": "Rahulik", "nl": "Casual" }',
                    'slug' => '{ "en": "casual-", "bn": "সাধারণ-", "fr": "décontracté-", "zh": "休闲-", "ar": "عادي-", "be": "увольнена-", "bg": "случаен-", "ca": "informal-", "et": "rahulik-", "nl": "casual-" }',
                    'parent_id' => 148,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            289 =>
                array (
                    'id' => 455,
                    'name' => '{ "en": "Business", "bn": "ব্যবসা", "fr": "Affaires", "zh": "商业", "ar": "أعمال", "be": "Бізнес", "bg": "Бизнес", "ca": "Negocis", "et": "Äri", "nl": "Zaken" }',
                    'slug' => '{ "en": "business-", "bn": "ব্যবসা-", "fr": "affaires-", "zh": "商业-", "ar": "أعمال-", "be": "бізнес-", "bg": "бизнес-", "ca": "negocis-", "et": "äri-", "nl": "zaken-" }',
                    'parent_id' => 148,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            290 =>
                array (
                    'id' => 456,
                    'name' => '{ "en": "Fashion", "bn": "ফ্যাশন", "fr": "Mode", "zh": "时尚", "ar": "أزياء", "be": "Мода", "bg": "Мода", "ca": "Moda", "et": "Moekunst", "nl": "Mode" }',
                    'slug' => '{ "en": "fashion-", "bn": "ফ্যাশন-", "fr": "mode-", "zh": "时尚-", "ar": "-أزياء", "be": "мода-", "bg": "мода-", "ca": "moda-", "et": "moekunst-", "nl": "mode-" }',
                    'parent_id' => 148,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            291 =>
                array (
                    'id' => 457,
                    'name' => '{ "en": "Rings", "bn": "বেঁতের বান্দি", "fr": "Bagues", "zh": "戒指", "ar": "خواتم", "be": "Каблукі", "bg": "Пръстени", "ca": "Anells", "et": "Sõrmused", "nl": "Ringen" }',
                    'slug' => '{ "en": "rings", "bn": "বেঁতের বান্দি", "fr": "bagues", "zh": "戒指", "ar": "خواتم", "be": "каблукі", "bg": "пръстени", "ca": "anells", "et": "sõrmused", "nl": "ringen" }',
                    'parent_id' => 149,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            292 =>
                array (
                    'id' => 458,
                    'name' => '{ "en": "Necklaces", "bn": "হার", "fr": "Colliers", "zh": "项链", "ar": "قلادات", "be": "Абрэзы", "bg": "Гердани", "ca": "Collarets", "et": "Kaelakeed", "nl": "Kettingen" }',
                    'slug' => '{ "en": "necklaces", "bn": "হার", "fr": "colliers", "zh": "项链", "ar": "قلادات", "be": "абрэзы", "bg": "гердани", "ca": "collarets", "et": "kaelakeed", "nl": "kettingen" }',
                    'parent_id' => 149,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            293 =>
                array (
                    'id' => 459,
                    'name' => '{ "en": "Pendants", "bn": "পেন্ডেন্ট", "fr": "Pendentifs", "zh": "吊坠", "ar": "قلادات معلقة", "be": "Пандэнты", "bg": "Обеци", "ca": "Penjolls", "et": "Ripatsid", "nl": "Hangers" }',
                    'slug' => '{ "en": "pendants", "bn": "পেন্ডেন্ট", "fr": "pendentifs", "zh": "吊坠", "ar": "قلادات معلقة", "be": "пандэнты", "bg": "обеци", "ca": "penjolls", "et": "ripatsid", "nl": "hangers" }',
                    'parent_id' => 149,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            294 =>
                array (
                    'id' => 460,
                    'name' => '{ "en": "Earrings", "bn": "কানের ঝুমকা", "fr": "Boucles d\'oreilles", "zh": "耳环", "ar": "أقراط", "be": "Серадзенькі", "bg": "Обици", "ca": "Arracades", "et": "Kõrvarõngad", "nl": "Oorbellen" }',
                    'slug' => '{ "en": "earrings", "bn": "কানের ঝুমকা", "fr": "boucles-d-oreilles", "zh": "耳环", "ar": "أقراط", "be": "серадзенькі", "bg": "обици", "ca": "arracades", "et": "kõrvarõngad", "nl": "oorbellen" }',
                    'parent_id' => 149,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            295 =>
                array (
                    'id' => 461,
                    'name' => '{ "en": "Jewellery Sets", "bn": "জুয়েলারি সেট", "fr": "Parures de bijoux", "zh": "首饰套装", "ar": "طقم مجوهرات", "be": "Наборы біжутэрыі", "bg": "Комплекти бижута", "ca": "Conjunts de joies", "et": "Ehtekomplektid", "nl": "Sieradensets" }',
                    'slug' => '{ "en": "jewellery-sets", "bn": "জুয়েলারি-সেট", "fr": "parures-de-bijoux", "zh": "首饰套装", "ar": "طقم-مجوهرات", "be": "наборы-біжутэрыі", "bg": "комплекти-бижута", "ca": "conjunts-de-joies", "et": "ehtekomplektid", "nl": "sieradensets" }',
                    'parent_id' => 149,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            296 =>
                array (
                    'id' => 462,
                    'name' => '{ "en": "Bracelets", "bn": "ব্রেসলেট", "fr": "Bracelets", "zh": "手镯", "ar": "أساور", "be": "Браслеты", "bg": "Гривни", "ca": "Polseres", "et": "Käevõrud", "nl": "Armbanden" }',
                    'slug' => '{ "en": "bracelets", "bn": "ব্রেসলেট", "fr": "bracelets", "zh": "手镯", "ar": "أساور", "be": "браслеты", "bg": "гривни", "ca": "polseres", "et": "käevõrud", "nl": "armbanden" }',
                    'parent_id' => 149,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            297 =>
                array (
                    'id' => 463,
                    'name' => '{ "en": "Rings", "bn": "বেঁতের বান্দি", "fr": "Bagues", "zh": "戒指", "ar": "خواتم", "be": "Каблукі", "bg": "Пръстени", "ca": "Anells", "et": "Sõrmused", "nl": "Ringen" }',
                    'slug' => '{ "en": "rings-", "bn": "বেঁতের বান্দি-", "fr": "bagues-", "zh": "戒指-", "ar": "خواتم-", "be": "каблукі-", "bg": "пръстени-", "ca": "anells-", "et": "sõrmused-", "nl": "ringen-" }',
                    'parent_id' => 150,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            298 =>
                array (
                    'id' => 464,
                    'name' => '{ "en": "Necklaces & Pendants", "bn": "হার এবং পেন্ডেন্ট", "fr": "Colliers et Pendentifs", "zh": "项链和吊坠", "ar": "قلادات وقلادات معلقة", "be": "Абрэзы і Пандэнты", "bg": "Гердани и Обеци", "ca": "Collarets i Penjolls", "et": "Kaelakeed ja Ripatsid", "nl": "Kettingen & Hangers" }',
                    'slug' => '{ "en": "necklaces-and-pendants", "bn": "হার-এবং-পেন্ডেন্ট", "fr": "colliers-et-pendentifs", "zh": "项链和吊坠", "ar": "قلادات-وقلادات-معلقة", "be": "абрэзы-і-пандэнты", "bg": "гердани-и-обеци", "ca": "collarets-i-penjolls", "et": "kaelakeed-ja-ripatsid", "nl": "kettingen-en-hangers" }',
                    'parent_id' => 150,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            299 =>
                array (
                    'id' => 465,
                    'name' => '{ "en": "Bracelets", "bn": "ব্রেসলেট", "fr": "Bracelets", "zh": "手镯", "ar": "أساور", "be": "Браслеты", "bg": "Гривни", "ca": "Polseres", "et": "Käevõrud", "nl": "Armbanden" }',
                    'slug' => '{ "en": "bracelets-", "bn": "ব্রেসলেট-", "fr": "bracelets-", "zh": "手镯-", "ar": "-أساور", "be": "браслеты-", "bg": "гривни-", "ca": "polseres-", "et": "käevõrud-", "nl": "armbanden-" }',
                    'parent_id' => 150,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            300 =>
                array (
                    'id' => 466,
                    'name' => '{ "en": "Men Sunglasses", "bn": "পুরুষ সানগ্লাস", "fr": "Lunettes de soleil pour hommes", "zh": "男士太阳镜", "ar": "نظارات شمسية للرجال", "be": "Сонцазахисныя акуляры для мужчын", "bg": "Слънчеви очила за мъже", "ca": "Ulleres de sol per a homes", "et": "Meeste päikeseprillid", "nl": "Zonnebrillen voor mannen" }',
                    'slug' => '{ "en": "men-sunglasses", "bn": "পুরুষ-সানগ্লাস", "fr": "lunettes-de-soleil-pour-hommes", "zh": "男士太阳镜", "ar": "نظارات-شمسية-للرجال", "be": "сонцазахісныя-акуляры-для-мужчын", "bg": "слънчеви-очила-за-мъже", "ca": "ulleres-de-sol-per-a-homes", "et": "meeste-päikeseprillid", "nl": "zonnebrillen-voor-mannen" }',
                    'parent_id' => 154,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            301 =>
                array (
                    'id' => 467,
                    'name' => '{ "en": "Women Sunglasses", "bn": "নারী সানগ্লাস", "fr": "Lunettes de soleil pour femmes", "zh": "女士太阳镜", "ar": "نظارات شمسية للنساء", "be": "Сонцазахисныя акуляры для жанчын", "bg": "Слънчеви очила за жени", "ca": "Ulleres de sol per a dones", "et": "Naiste päikeseprillid", "nl": "Zonnebrillen voor vrouwen" }',
                    'slug' => '{ "en": "women-sunglasses", "bn": "নারী-সানগ্লাস", "fr": "lunettes-de-soleil-pour-femmes", "zh": "女士太阳镜", "ar": "نظارات-شمسية-للنساء", "be": "сонцазахісныя-акуляры-для-жанчын", "bg": "слънчеви-очила-за-жени", "ca": "ulleres-de-sol-per-a-dones", "et": "naiste-päikeseprillid", "nl": "zonnebrillen-voor-vrouwen" }',
                    'parent_id' => 154,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            302 =>
                array (
                    'id' => 468,
                    'name' => '{ "en": "Kids Sunglasses", "bn": "শিশু সানগ্লাস", "fr": "Lunettes de soleil pour enfants", "zh": "儿童太阳镜", "ar": "نظارات شمسية للأطفال", "be": "Сонцазахисныя акуляры для дзяцей", "bg": "Слънчеви очила за деца", "ca": "Ulleres de sol per a nens", "et": "Laste päikeseprillid", "nl": "Zonnebrillen voor kinderen" }',
                    'slug' => '{ "en": "kids-sunglasses", "bn": "শিশু-সানগ্লাস", "fr": "lunettes-de-soleil-pour-enfants", "zh": "儿童太阳镜", "ar": "نظارات-شمسية-للأطفال", "be": "сонцазахісныя-акуляры-для-дзяцей", "bg": "слънчеви-очила-за-деца", "ca": "ulleres-de-sol-per-a-nens", "et": "laste-päikeseprillid", "nl": "zonnebrillen-voor-kinderen" }',
                    'parent_id' => 154,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            303 =>
                array (
                    'id' => 469,
                    'name' => '{ "en": "Men Eyeglasses", "bn": "পুরুষ চশমা", "fr": "Lunettes pour hommes", "zh": "男士眼镜", "ar": "نظارات طبية للرجال", "be": "Оправы для мужчын", "bg": "Мъжки очила", "ca": "Ulleres per a homes", "et": "Meeste prillid", "nl": "Heren brillen" }',
                    'slug' => '{ "en": "men-eyeglasses", "bn": "পুরুষ-চশমা", "fr": "lunettes-pour-hommes", "zh": "男士眼镜", "ar": "نظارات-طبية-للرجال", "be": "оправы-для-мужчын", "bg": "мъжки-очила", "ca": "ulleres-per-a-homes", "et": "meeste-prillid", "nl": "heren-brillen" }',
                    'parent_id' => 155,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            304 =>
                array (
                    'id' => 470,
                    'name' => '{ "en": "Women Eyeglasses", "bn": "নারী চশমা", "fr": "Lunettes pour femmes", "zh": "女士眼镜", "ar": "نظارات طبية للنساء", "be": "Оправы для жанчын", "bg": "Дамски очила", "ca": "Ulleres per a dones", "et": "Naiste prillid", "nl": "Damesbrillen" }',
                    'slug' => '{ "en": "women-eyeglasses", "bn": "নারী-চশমা", "fr": "lunettes-pour-femmes", "zh": "女士眼镜", "ar": "نظارات-طبية-للنساء", "be": "оправы-для-жанчын", "bg": "дамски-очила", "ca": "ulleres-per-a-dones", "et": "naiste-prillid", "nl": "damesbrillen" }',
                    'parent_id' => 155,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            305 =>
                array (
                    'id' => 503,
                    'name' => '{ "en": "iPhone", "bn": "আইফোন", "fr": "iPhone", "zh": "iPhone", "ar": "آيفون", "be": "iPhone", "bg": "iPhone", "ca": "iPhone", "et": "iPhone", "nl": "iPhone" }',
                    'slug' => '{ "en": "iphone", "bn": "আইফোন", "fr": "iphone", "zh": "iphone", "ar": "آيفون", "be": "iphone", "bg": "iphone", "ca": "iphone", "et": "iphone", "nl": "iphone" }',
                    'parent_id' => 50,
                    'order_by' => 10,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            306 =>
                array (
                    'id' => 504,
                    'name' => '{ "en": "Home Appliances", "bn": "গৃহস্থালী যন্ত্রপাতি", "fr": "Appareils ménagers", "zh": "家用电器", "ar": "الأجهزة المنزلية", "be": "Бытавая тэхніка", "bg": "Домашни уреди", "ca": "Electrodomèstics", "et": "Kodumasinad", "nl": "Huishoudelijke apparaten" }',
                    'slug' => '{ "en": "home-appliances", "bn": "গৃহস্থালী-যন্ত্রপাতি", "fr": "appareils-ménagers", "zh": "家用电器", "ar": "الأجهزة-المنزلية", "be": "бытавая-тэхніка", "bg": "домашни-уреди", "ca": "electrodomèstics", "et": "kodumasinad", "nl": "huishoudelijke-apparaten" }',
                    'parent_id' => NULL,
                    'order_by' => 18,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 6,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            307 =>
                array (
                    'id' => 507,
                    'name' => '{ "en": "Small Kitchen Appliances", "bn": "ছোট রান্নাঘর যন্ত্রপাতি", "fr": "Petits appareils de cuisine", "zh": "小厨房电器", "ar": "أجهزة مطبخ صغيرة", "be": "Малыя кухонныя прылады", "bg": "Малки кухненски уреди", "ca": "Petits electrodomèstics de cuina", "et": "Väikesed köögiseadmed", "nl": "Kleine keukenapparaten" }',
                    'slug' => '{ "en": "small-kitchen-appliances", "bn": "ছোট-রান্নাঘর-যন্ত্রপাতি", "fr": "petits-appareils-de-cuisine", "zh": "小厨房电器", "ar": "أجهزة-مطبخ-صغيرة", "be": "малыя-кухонныя-прылады", "bg": "малки-кухненски-уреди", "ca": "petits-electrodomèstics-de-cuina", "et": "väikesed-köögiseadmed", "nl": "kleine-keukenapparaten" }',
                    'parent_id' => 504,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            308 =>
                array (
                    'id' => 508,
                    'name' => '{ "en": "Food Preparation", "bn": "খাবার প্রস্তুতি", "fr": "Préparation des aliments", "zh": "食品制备", "ar": "تحضير الطعام", "be": "Прыгатаванне ежы", "bg": "Приготвяне на храна", "ca": "Preparació d\'aliments", "et": "Toitude valmistamine", "nl": "Voedselbereiding" }',
                    'slug' => '{ "en": "food-preparation", "bn": "খাবার-প্রস্তুতি", "fr": "préparation-des-aliments", "zh": "食品制备", "ar": "تحضير-الطعام", "be": "прыгатаванне-ежы", "bg": "приготвяне-на-храна", "ca": "preparació-d\'aliments", "et": "toitude-valmistamine", "nl": "voedselbereiding" }',
                    'parent_id' => 507,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            309 =>
                array (
                    'id' => 509,
                    'name' => '{ "en": "Stuffed Toys", "bn": "ভরা খিলোনা", "fr": "Jouets en peluche", "zh": "填充玩具", "ar": "لعب محشوة", "be": "Мягкія іграшкі", "bg": "Пълнени играчки", "ca": "Joguines de peluix", "et": "Täidisega mänguasjad", "nl": "Knuffels" }',
                    'slug' => '{ "en": "stuffed-toys", "bn": "ভরা-খিলোনা", "fr": "jouets-en-peluche", "zh": "填充玩具", "ar": "لعب-محشوة", "be": "мягкія-іграшкі", "bg": "пълнени-играчки", "ca": "joguines-de-peluix", "et": "täidisega-mänguasjad", "nl": "knuffels" }',
                    'parent_id' => 42,
                    'order_by' => 13,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            310 =>
                array (
                    'id' => 510,
                    'name' => '{ "en": "Man Fashion", "bn": "পুরুষ ফ্যাশন", "fr": "Mode homme", "zh": "男士时尚", "ar": "أزياء الرجال", "be": "Мужская мода", "bg": "Мъжка мода", "ca": "Moda masculina", "et": "Meeste mood", "nl": "Herenmode" }',
                    'slug' => '{ "en": "man-fashion", "bn": "পুরুষ-ফ্যাশন", "fr": "mode-homme", "zh": "男士时尚", "ar": "أزياء-الرجال", "be": "мужская-мода", "bg": "мъжка-мода", "ca": "moda-masculina", "et": "meeste-mood", "nl": "herenmode" }',
                    'parent_id' => 46,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            311 =>
                array (
                    'id' => 511,
                    'name' => '{ "en": "Woman Fashion", "bn": "নারী ফ্যাশন", "fr": "Mode femme", "zh": "女士时尚", "ar": "أزياء النساء", "be": "Жаночая мада", "bg": "Дамска мода", "ca": "Moda femenina", "et": "Naiste mood", "nl": "Damesmode" }',
                    'slug' => '{ "en": "woman-fashion", "bn": "নারী-ফ্যাশন", "fr": "mode-femme", "zh": "女士时尚", "ar": "أزياء-النساء", "be": "жаночая-мада", "bg": "дамска-мода", "ca": "moda-femenina", "et": "naiste-mood", "nl": "damesmode" }',
                    'parent_id' => 46,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 12,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            312 =>
                array (
                    'id' => 512,
                    'name' => '{ "en": "Kid Fashion", "bn": "শিশু ফ্যাশন", "fr": "Mode enfant", "zh": "儿童时尚", "ar": "أزياء الأطفال", "be": "Дзіцячая мада", "bg": "Детска мода", "ca": "Moda infantil", "et": "Lastemood", "nl": "Kinderkleding" }',
                    'slug' => '{ "en": "kid-fashion", "bn": "শিশু-ফ্যাশন", "fr": "mode-enfant", "zh": "儿童时尚", "ar": "أزياء-الأطفال", "be": "дзіцячая-мада", "bg": "детска-мода", "ca": "moda-infantil", "et": "lastemood", "nl": "kinderkleding" }',
                    'parent_id' => 46,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            313 =>
                array (
                    'id' => 513,
                    'name' => '{ "en": "Jackets & Coats", "bn": "জ্যাকেট এবং কোট", "fr": "Vestes et manteaux", "zh": "夹克和外套", "ar": "السترات والمعاطف", "be": "Курткі і пальто", "bg": "Якета и палта", "ca": "Jaquetes i abrics", "et": "Joped ja mantlid", "nl": "Jassen & Mantels" }',
                    'slug' => '{ "en": "jackets--coats", "bn": "জ্যাকেট--এবং-কোট", "fr": "vestes--et-manteaux", "zh": "夹克和外套-", "ar": "-السترات-والمعاطف", "be": "курткі--і-пальто", "bg": "якета--и-палта", "ca": "jaquetes--i-abrics", "et": "joped--ja-mantlid", "nl": "jassen--mantels" }',
                    'parent_id' => 511,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            314 =>
                array (
                    'id' => 514,
                    'name' => '{ "en": "Pant", "bn": "প্যান্ট", "fr": "Pantalon", "zh": "裤子", "ar": "بنطلون", "be": "Штаны", "bg": "Панталон", "ca": "Pantaló", "et": "Püksid", "nl": "Broek" }',
                    'slug' => '{ "en": "pant-", "bn": "প্যান্ট-", "fr": "pantalon-", "zh": "裤子-", "ar": "بنطلون-", "be": "штаны-", "bg": "панталон-", "ca": "pantaló-", "et": "püksid-", "nl": "broek-" }',
                    'parent_id' => 511,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            315 =>
                array (
                    'id' => 515,
                    'name' => '{ "en": "Bags", "bn": "ব্যাগ", "fr": "Sacs", "zh": "包袋", "ar": "حقائب", "be": "Сумкі", "bg": "Чанти", "ca": "Bossa", "et": "Kotid", "nl": "Tassen" }',
                    'slug' => '{ "en": "bags", "bn": "ব্যাগ", "fr": "sacs", "zh": "包", "ar": "حقائب", "be": "сумкі", "bg": "чанти", "ca": "bosses", "et": "kotid", "nl": "tassen" }',
                    'parent_id' => 511,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            316 =>
                array (
                    'id' => 516,
                    'name' => '{ "en": "Shoes", "bn": "জুতা", "fr": "Chaussures", "zh": "鞋子", "ar": "أحذية", "be": "Чаравікі", "bg": "Обувки", "ca": "Sabates", "et": "Jalanõud", "nl": "Schoenen" }',
                    'slug' => '{ "en": "shoes---", "bn": "জুতা---", "fr": "chaussures---", "zh": "鞋子---", "ar": "---أحذية", "be": "чаравікі---", "bg": "обувки---", "ca": "sabates---", "et": "jalatsid---", "nl": "schoenen---" }',
                    'parent_id' => 511,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            317 =>
                array (
                    'id' => 517,
                    'name' => '{ "en": "Accessories", "bn": "আকসেসরি", "fr": "Accessoires", "zh": "配件", "ar": "إكسسوارات", "be": "Аксесуары", "bg": "Аксесоари", "ca": "Accessoris", "et": "Aksessuaarid", "nl": "Accessoires" }',
                    'slug' => '{ "en": "accessories--", "bn": "অ্যাক্সেসরিজ--", "fr": "accessoires--", "zh": "配件--", "ar": "--إكسسوارات", "be": "аксесуары--", "bg": "аксесоари--", "ca": "accessoris--", "et": "tarvikud--", "nl": "accessoires--" }',
                    'parent_id' => 511,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            318 =>
                array (
                    'id' => 518,
                    'name' => '{ "en": "Clothing", "bn": "পোশাক", "fr": "Vêtements", "zh": "服装", "ar": "ملابس", "be": "Адзенне", "bg": "Облекло", "ca": "Roba", "et": "Rõivad", "nl": "Kleding" }',
                    'slug' => '{ "en": "clothing-", "bn": "পোশাক-", "fr": "vêtements-", "zh": "服装-", "ar": "-ملابس", "be": "адзенне-", "bg": "облекло-", "ca": "roba-", "et": "rõivad-", "nl": "kleding-" }',
                    'parent_id' => 511,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 1,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            319 =>
                array (
                    'id' => 519,
                    'name' => '{ "en": "Jackets & Coats", "bn": "জ্যাকেট এবং কোট", "fr": "Vestes et manteaux", "zh": "夹克和外套", "ar": "السترات والمعاطف", "be": "Курткі і пальто", "bg": "Якета и палта", "ca": "Jaquetes i abrics", "et": "Joped ja mantlid", "nl": "Jassen & Mantels" }',
                    'slug' => '{ "en": "jackets-coats", "bn": "জ্যাকেট-এবং-কোট", "fr": "vestes-et-manteaux", "zh": "夹克和外套", "ar": "السترات-والمعاطف", "be": "курткі-і-пальто", "bg": "якета-и-палта", "ca": "jaquetes-i-abrics", "et": "joped-ja-mantlid", "nl": "jassen-mantels" }',
                    'parent_id' => 510,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            320 =>
                array (
                    'id' => 520,
                    'name' => '{ "en": "Pant", "bn": "প্যান্ট", "fr": "Pantalon", "zh": "裤子", "ar": "بنطلون", "be": "Штаны", "bg": "Панталон", "ca": "Pantaló", "et": "Püksid", "nl": "Broek" }',
                    'slug' => '{ "en": "pant", "bn": "প্যান্ট", "fr": "pantalon", "zh": "裤子", "ar": "بنطلون", "be": "штаны", "bg": "панталон", "ca": "pantaló", "et": "püksid", "nl": "broek" }',
                    'parent_id' => 510,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            321 =>
                array (
                    'id' => 521,
                    'name' => '{ "en": "Bags", "bn": "ব্যাগ", "fr": "Sacs", "zh": "包袋", "ar": "حقائب", "be": "Сумкі", "bg": "Чанти", "ca": "Bossa", "et": "Kotid", "nl": "Tassen" }',
                    'slug' => '{ "en": "bags-", "bn": "ব্যাগ-", "fr": "sacs-", "zh": "包袋-", "ar": "-حقائب", "be": "сумкі-", "bg": "чанти-", "ca": "bossa-", "et": "kotid-", "nl": "tassen-" }',
                    'parent_id' => 510,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 1,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            322 =>
                array (
                    'id' => 522,
                    'name' => '{ "en": "Shoes", "bn": "জুতা", "fr": "Chaussures", "zh": "鞋子", "ar": "أحذية", "be": "Чаравікі", "bg": "Обувки", "ca": "Sabates", "et": "Jalanõud", "nl": "Schoenen" }',
                    'slug' => '{ "en": "shoes-", "bn": "জুতা-", "fr": "chaussures-", "zh": "鞋子-", "ar": "-أحذية", "be": "чаравікі-", "bg": "обувки-", "ca": "sabates-", "et": "jalanõud-", "nl": "schoenen-" }',
                    'parent_id' => 510,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            323 =>
                array (
                    'id' => 523,
                    'name' => '{ "en": "Accessories", "bn": "আকসেসরি", "fr": "Accessoires", "zh": "配件", "ar": "إكسسوارات", "be": "Аксесуары", "bg": "Аксесоари", "ca": "Accessoris", "et": "Aksessuaarid", "nl": "Accessoires" }',
                    'slug' => '{ "en": "accessories-", "bn": "আকসেসরি", "fr": "accessoires-", "zh-": "配件-", "ar": "إكسسوارات-", "be": "аксесуары-", "bg": "аксесоари-", "ca": "accessoris-", "et": "aksessuaarid-", "nl": "accessoires-" }',
                    'parent_id' => 510,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            324 =>
                array (
                    'id' => 524,
                    'name' => '{ "en": "Clothing", "bn": "পোশাক", "fr": "Vêtements", "zh": "服装", "ar": "ملابس", "be": "Адзенне", "bg": "Облекло", "ca": "Roba", "et": "Rõivad", "nl": "Kleding" }',
                    'slug' => '{ "en": "clothing", "bn": "পোশাক", "fr": "vêtements", "zh": "服装", "ar": "ملابس", "be": "адзенне", "bg": "облекло", "ca": "roba", "et": "rõivad", "nl": "kleding" }',
                    'parent_id' => 510,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            325 =>
                array (
                    'id' => 525,
                    'name' => '{ "en": "Digital Product", "bn": "ডিজিটাল পণ্য", "fr": "Produit numérique", "zh": "数字产品", "ar": "منتج رقمي", "be": "Лічбавы тавар", "bg": "Цифров продукт", "ca": "Producte digital", "et": "Digitaalne toode", "nl": "Digitaal Product" }',
                    'slug' => '{ "en": "digital-product", "bn": "ডিজিটাল-পণ্য", "fr": "produit-numérique", "zh": "数字产品", "ar": "منتج-رقمي", "be": "лічбавы-тавар", "bg": "цифров-продукт", "ca": "producte-digital", "et": "digitaalne-toode", "nl": "digitaal-product" }',
                    'parent_id' => NULL,
                    'order_by' => 19,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            326 =>
                array (
                    'id' => 526,
                    'name' => '{ "en": "HTML", "bn": "এইচটিএমএল", "fr": "HTML", "zh": "HTML", "ar": "إتش تي إم إل", "be": "HTML", "bg": "HTML", "ca": "HTML", "et": "HTML", "nl": "HTML" }',
                    'slug' => '{ "en": "html", "bn": "এইচটিএমএল", "fr": "html", "zh": "html", "ar": "إتش-تي-إم-إل", "be": "html", "bg": "html", "ca": "html", "et": "html", "nl": "html" }',
                    'parent_id' => 525,
                    'order_by' => 1,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            327 =>
                array (
                    'id' => 527,
                    'name' => '{ "en": "WordPress", "bn": "ওয়ার্ডপ্রেস", "fr": "WordPress", "zh": "WordPress", "ar": "ووردبريس", "be": "WordPress", "bg": "WordPress", "ca": "WordPress", "et": "WordPress", "nl": "WordPress" }',
                    'slug' => '{ "en": "wordpress", "bn": "ওয়ার্ডপ্রেস", "fr": "wordpress", "zh": "wordpress", "ar": "ووردبريس", "be": "wordpress", "bg": "wordpress", "ca": "wordpress", "et": "wordpress", "nl": "wordpress" }',
                    'parent_id' => 525,
                    'order_by' => 2,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            328 =>
                array (
                    'id' => 528,
                    'name' => '{ "en": "Magento", "bn": "ম্যাজেন্টো", "fr": "Magento", "zh": "Magento", "ar": "ماجنتو", "be": "Magento", "bg": "Magento", "ca": "Magento", "et": "Magento", "nl": "Magento" }',
                    'slug' => '{ "en": "magento", "bn": "ম্যাজেন্টো", "fr": "magento", "zh": "magento", "ar": "ماجنتو", "be": "magento", "bg": "magento", "ca": "magento", "et": "magento", "nl": "magento" }',
                    'parent_id' => 525,
                    'order_by' => 3,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            329 =>
                array (
                    'id' => 529,
                    'name' => '{ "en": "Drupal", "bn": "ড্রুপাল", "fr": "Drupal", "zh": "Drupal", "ar": "دروبال", "be": "Drupal", "bg": "Drupal", "ca": "Drupal", "et": "Drupal", "nl": "Drupal" }',
                    'slug' => '{ "en": "drupal", "bn": "ড্রুপাল", "fr": "drupal", "zh": "drupal", "ar": "دروبال", "be": "drupal", "bg": "drupal", "ca": "drupal", "et": "drupal", "nl": "drupal" }',
                    'parent_id' => 525,
                    'order_by' => 4,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            330 =>
                array (
                    'id' => 530,
                    'name' => '{ "en": "Android", "bn": "অ্যান্ড্রয়েড", "fr": "Android", "zh": "安卓", "ar": "أندرويد", "be": "Android", "bg": "Android", "ca": "Android", "et": "Android", "nl": "Android" }',
                    'slug' => '{ "en": "android", "bn": "অ্যান্ড্রয়েড", "fr": "android", "zh": "android", "ar": "أندرويد", "be": "android", "bg": "android", "ca": "android", "et": "android", "nl": "android" }',
                    'parent_id' => 525,
                    'order_by' => 5,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            331 =>
                array (
                    'id' => 531,
                    'name' => '{ "en": "Apple", "bn": "আপেল", "fr": "Pomme", "zh": "苹果", "ar": "تفاح", "be": "Яблыкі", "bg": "Ябълка", "ca": "Poma", "et": "Õun", "nl": "Appel" }',
                    'slug' => '{ "en": "apple", "bn": "আপেল", "fr": "pomme", "zh": "苹果", "ar": "تفاح", "be": "яблыкі", "bg": "ябълка", "ca": "poma", "et": "õun", "nl": "appel" }',
                    'parent_id' => 525,
                    'order_by' => 6,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            332 =>
                array (
                    'id' => 532,
                    'name' => '{ "en": "Windows", "bn": "উইন্ডোজ", "fr": "Windows", "zh": "Windows", "ar": "ويندوز", "be": "Windows", "bg": "Windows", "ca": "Windows", "et": "Windows", "nl": "Windows" }',
                    'slug' => '{ "en": "windows", "bn": "উইন্ডোজ", "fr": "windows", "zh": "windows", "ar": "ويندوز", "be": "windows", "bg": "windows", "ca": "windows", "et": "windows", "nl": "windows" }',
                    'parent_id' => 525,
                    'order_by' => 7,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
            333 =>
                array (
                    'id' => 533,
                    'name' => '{ "en": "Envato", "bn": "এনভাটো", "fr": "Envato", "zh": "Envato", "ar": "Envato", "be": "Envato", "bg": "Envato", "ca": "Envato", "et": "Envato", "nl": "Envato" }',
                    'slug' => '{ "en": "envato", "bn": "এনভাটো", "fr": "envato", "zh": "envato", "ar": "envato", "be": "envato", "bg": "envato", "ca": "envato", "et": "envato", "nl": "envato" }',
                    'parent_id' => 525,
                    'order_by' => 8,
                    'is_searchable' => 1,
                    'is_featured' => 0,
                    'product_counts' => 0,
                    'sell_commissions' => NULL,
                    'status' => 'Active',
                    'is_global' => 1
                ),
        ));


    }
}
