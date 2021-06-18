<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'created_at' => '2021-03-02 07:00:28',
                'updated_at' => '2021-03-02 07:00:28',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => NULL,
                'created_at' => '2021-03-02 07:00:28',
                'updated_at' => '2021-03-02 07:00:28',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => NULL,
                'created_at' => '2021-03-02 07:00:28',
                'updated_at' => '2021-03-02 07:00:28',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => NULL,
                'created_at' => '2021-03-02 07:00:28',
                'updated_at' => '2021-03-02 07:00:28',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'created_at' => '2021-03-02 07:00:28',
                'updated_at' => '2021-03-02 07:00:28',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2021-03-02 07:00:28',
                'updated_at' => '2021-03-02 07:00:28',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2021-03-02 07:00:28',
                'updated_at' => '2021-03-02 07:00:28',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            25 => 
            array (
                'id' => 26,
                'key' => 'browse_categories',
                'table_name' => 'categories',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            26 => 
            array (
                'id' => 27,
                'key' => 'read_categories',
                'table_name' => 'categories',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            27 => 
            array (
                'id' => 28,
                'key' => 'edit_categories',
                'table_name' => 'categories',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            28 => 
            array (
                'id' => 29,
                'key' => 'add_categories',
                'table_name' => 'categories',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            29 => 
            array (
                'id' => 30,
                'key' => 'delete_categories',
                'table_name' => 'categories',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            30 => 
            array (
                'id' => 31,
                'key' => 'browse_posts',
                'table_name' => 'posts',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            31 => 
            array (
                'id' => 32,
                'key' => 'read_posts',
                'table_name' => 'posts',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            32 => 
            array (
                'id' => 33,
                'key' => 'edit_posts',
                'table_name' => 'posts',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            33 => 
            array (
                'id' => 34,
                'key' => 'add_posts',
                'table_name' => 'posts',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            34 => 
            array (
                'id' => 35,
                'key' => 'delete_posts',
                'table_name' => 'posts',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            35 => 
            array (
                'id' => 36,
                'key' => 'browse_pages',
                'table_name' => 'pages',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            36 => 
            array (
                'id' => 37,
                'key' => 'read_pages',
                'table_name' => 'pages',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            37 => 
            array (
                'id' => 38,
                'key' => 'edit_pages',
                'table_name' => 'pages',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            38 => 
            array (
                'id' => 39,
                'key' => 'add_pages',
                'table_name' => 'pages',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            39 => 
            array (
                'id' => 40,
                'key' => 'delete_pages',
                'table_name' => 'pages',
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            40 => 
            array (
                'id' => 41,
                'key' => 'browse_hooks',
                'table_name' => NULL,
                'created_at' => '2021-03-02 07:00:29',
                'updated_at' => '2021-03-02 07:00:29',
            ),
            41 => 
            array (
                'id' => 42,
                'key' => 'browse_orders',
                'table_name' => 'orders',
                'created_at' => '2021-03-02 07:44:11',
                'updated_at' => '2021-03-02 07:44:11',
            ),
            42 => 
            array (
                'id' => 43,
                'key' => 'read_orders',
                'table_name' => 'orders',
                'created_at' => '2021-03-02 07:44:11',
                'updated_at' => '2021-03-02 07:44:11',
            ),
            43 => 
            array (
                'id' => 44,
                'key' => 'edit_orders',
                'table_name' => 'orders',
                'created_at' => '2021-03-02 07:44:11',
                'updated_at' => '2021-03-02 07:44:11',
            ),
            44 => 
            array (
                'id' => 45,
                'key' => 'add_orders',
                'table_name' => 'orders',
                'created_at' => '2021-03-02 07:44:11',
                'updated_at' => '2021-03-02 07:44:11',
            ),
            45 => 
            array (
                'id' => 46,
                'key' => 'delete_orders',
                'table_name' => 'orders',
                'created_at' => '2021-03-02 07:44:11',
                'updated_at' => '2021-03-02 07:44:11',
            ),
            46 => 
            array (
                'id' => 47,
                'key' => 'browse_comments',
                'table_name' => 'comments',
                'created_at' => '2021-06-18 17:22:03',
                'updated_at' => '2021-06-18 17:22:03',
            ),
            47 => 
            array (
                'id' => 48,
                'key' => 'read_comments',
                'table_name' => 'comments',
                'created_at' => '2021-06-18 17:22:03',
                'updated_at' => '2021-06-18 17:22:03',
            ),
            48 => 
            array (
                'id' => 49,
                'key' => 'edit_comments',
                'table_name' => 'comments',
                'created_at' => '2021-06-18 17:22:03',
                'updated_at' => '2021-06-18 17:22:03',
            ),
            49 => 
            array (
                'id' => 50,
                'key' => 'add_comments',
                'table_name' => 'comments',
                'created_at' => '2021-06-18 17:22:03',
                'updated_at' => '2021-06-18 17:22:03',
            ),
            50 => 
            array (
                'id' => 51,
                'key' => 'delete_comments',
                'table_name' => 'comments',
                'created_at' => '2021-06-18 17:22:03',
                'updated_at' => '2021-06-18 17:22:03',
            ),
            51 => 
            array (
                'id' => 52,
                'key' => 'browse_events',
                'table_name' => 'events',
                'created_at' => '2021-06-18 17:23:40',
                'updated_at' => '2021-06-18 17:23:40',
            ),
            52 => 
            array (
                'id' => 53,
                'key' => 'read_events',
                'table_name' => 'events',
                'created_at' => '2021-06-18 17:23:40',
                'updated_at' => '2021-06-18 17:23:40',
            ),
            53 => 
            array (
                'id' => 54,
                'key' => 'edit_events',
                'table_name' => 'events',
                'created_at' => '2021-06-18 17:23:40',
                'updated_at' => '2021-06-18 17:23:40',
            ),
            54 => 
            array (
                'id' => 55,
                'key' => 'add_events',
                'table_name' => 'events',
                'created_at' => '2021-06-18 17:23:40',
                'updated_at' => '2021-06-18 17:23:40',
            ),
            55 => 
            array (
                'id' => 56,
                'key' => 'delete_events',
                'table_name' => 'events',
                'created_at' => '2021-06-18 17:23:40',
                'updated_at' => '2021-06-18 17:23:40',
            ),
            56 => 
            array (
                'id' => 57,
                'key' => 'browse_products',
                'table_name' => 'products',
                'created_at' => '2021-06-18 17:27:08',
                'updated_at' => '2021-06-18 17:27:08',
            ),
            57 => 
            array (
                'id' => 58,
                'key' => 'read_products',
                'table_name' => 'products',
                'created_at' => '2021-06-18 17:27:08',
                'updated_at' => '2021-06-18 17:27:08',
            ),
            58 => 
            array (
                'id' => 59,
                'key' => 'edit_products',
                'table_name' => 'products',
                'created_at' => '2021-06-18 17:27:08',
                'updated_at' => '2021-06-18 17:27:08',
            ),
            59 => 
            array (
                'id' => 60,
                'key' => 'add_products',
                'table_name' => 'products',
                'created_at' => '2021-06-18 17:27:08',
                'updated_at' => '2021-06-18 17:27:08',
            ),
            60 => 
            array (
                'id' => 61,
                'key' => 'delete_products',
                'table_name' => 'products',
                'created_at' => '2021-06-18 17:27:08',
                'updated_at' => '2021-06-18 17:27:08',
            ),
            61 => 
            array (
                'id' => 62,
                'key' => 'browse_shops',
                'table_name' => 'shops',
                'created_at' => '2021-06-18 17:32:11',
                'updated_at' => '2021-06-18 17:32:11',
            ),
            62 => 
            array (
                'id' => 63,
                'key' => 'read_shops',
                'table_name' => 'shops',
                'created_at' => '2021-06-18 17:32:11',
                'updated_at' => '2021-06-18 17:32:11',
            ),
            63 => 
            array (
                'id' => 64,
                'key' => 'edit_shops',
                'table_name' => 'shops',
                'created_at' => '2021-06-18 17:32:11',
                'updated_at' => '2021-06-18 17:32:11',
            ),
            64 => 
            array (
                'id' => 65,
                'key' => 'add_shops',
                'table_name' => 'shops',
                'created_at' => '2021-06-18 17:32:11',
                'updated_at' => '2021-06-18 17:32:11',
            ),
            65 => 
            array (
                'id' => 66,
                'key' => 'delete_shops',
                'table_name' => 'shops',
                'created_at' => '2021-06-18 17:32:11',
                'updated_at' => '2021-06-18 17:32:11',
            ),
            66 => 
            array (
                'id' => 67,
                'key' => 'browse_sub_orders',
                'table_name' => 'sub_orders',
                'created_at' => '2021-06-18 17:34:18',
                'updated_at' => '2021-06-18 17:34:18',
            ),
            67 => 
            array (
                'id' => 68,
                'key' => 'read_sub_orders',
                'table_name' => 'sub_orders',
                'created_at' => '2021-06-18 17:34:18',
                'updated_at' => '2021-06-18 17:34:18',
            ),
            68 => 
            array (
                'id' => 69,
                'key' => 'edit_sub_orders',
                'table_name' => 'sub_orders',
                'created_at' => '2021-06-18 17:34:18',
                'updated_at' => '2021-06-18 17:34:18',
            ),
            69 => 
            array (
                'id' => 70,
                'key' => 'add_sub_orders',
                'table_name' => 'sub_orders',
                'created_at' => '2021-06-18 17:34:18',
                'updated_at' => '2021-06-18 17:34:18',
            ),
            70 => 
            array (
                'id' => 71,
                'key' => 'delete_sub_orders',
                'table_name' => 'sub_orders',
                'created_at' => '2021-06-18 17:34:18',
                'updated_at' => '2021-06-18 17:34:18',
            ),
            71 => 
            array (
                'id' => 72,
                'key' => 'browse_transactions',
                'table_name' => 'transactions',
                'created_at' => '2021-06-18 17:35:37',
                'updated_at' => '2021-06-18 17:35:37',
            ),
            72 => 
            array (
                'id' => 73,
                'key' => 'read_transactions',
                'table_name' => 'transactions',
                'created_at' => '2021-06-18 17:35:37',
                'updated_at' => '2021-06-18 17:35:37',
            ),
            73 => 
            array (
                'id' => 74,
                'key' => 'edit_transactions',
                'table_name' => 'transactions',
                'created_at' => '2021-06-18 17:35:37',
                'updated_at' => '2021-06-18 17:35:37',
            ),
            74 => 
            array (
                'id' => 75,
                'key' => 'add_transactions',
                'table_name' => 'transactions',
                'created_at' => '2021-06-18 17:35:37',
                'updated_at' => '2021-06-18 17:35:37',
            ),
            75 => 
            array (
                'id' => 76,
                'key' => 'delete_transactions',
                'table_name' => 'transactions',
                'created_at' => '2021-06-18 17:35:37',
                'updated_at' => '2021-06-18 17:35:37',
            ),
            76 => 
            array (
                'id' => 77,
                'key' => 'browse_slideshows',
                'table_name' => 'slideshows',
                'created_at' => '2021-06-18 17:36:44',
                'updated_at' => '2021-06-18 17:36:44',
            ),
            77 => 
            array (
                'id' => 78,
                'key' => 'read_slideshows',
                'table_name' => 'slideshows',
                'created_at' => '2021-06-18 17:36:44',
                'updated_at' => '2021-06-18 17:36:44',
            ),
            78 => 
            array (
                'id' => 79,
                'key' => 'edit_slideshows',
                'table_name' => 'slideshows',
                'created_at' => '2021-06-18 17:36:44',
                'updated_at' => '2021-06-18 17:36:44',
            ),
            79 => 
            array (
                'id' => 80,
                'key' => 'add_slideshows',
                'table_name' => 'slideshows',
                'created_at' => '2021-06-18 17:36:44',
                'updated_at' => '2021-06-18 17:36:44',
            ),
            80 => 
            array (
                'id' => 81,
                'key' => 'delete_slideshows',
                'table_name' => 'slideshows',
                'created_at' => '2021-06-18 17:36:44',
                'updated_at' => '2021-06-18 17:36:44',
            ),
            81 => 
            array (
                'id' => 82,
                'key' => 'browse_coupons',
                'table_name' => 'coupons',
                'created_at' => '2021-06-18 17:37:31',
                'updated_at' => '2021-06-18 17:37:31',
            ),
            82 => 
            array (
                'id' => 83,
                'key' => 'read_coupons',
                'table_name' => 'coupons',
                'created_at' => '2021-06-18 17:37:31',
                'updated_at' => '2021-06-18 17:37:31',
            ),
            83 => 
            array (
                'id' => 84,
                'key' => 'edit_coupons',
                'table_name' => 'coupons',
                'created_at' => '2021-06-18 17:37:31',
                'updated_at' => '2021-06-18 17:37:31',
            ),
            84 => 
            array (
                'id' => 85,
                'key' => 'add_coupons',
                'table_name' => 'coupons',
                'created_at' => '2021-06-18 17:37:31',
                'updated_at' => '2021-06-18 17:37:31',
            ),
            85 => 
            array (
                'id' => 86,
                'key' => 'delete_coupons',
                'table_name' => 'coupons',
                'created_at' => '2021-06-18 17:37:31',
                'updated_at' => '2021-06-18 17:37:31',
            ),
        ));
        
        
    }
}