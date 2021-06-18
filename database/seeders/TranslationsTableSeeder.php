<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('translations')->delete();
        
        \DB::table('translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 85,
                'locale' => 'ch',
                'value' => 'Id',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            1 => 
            array (
                'id' => 2,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 85,
                'locale' => 'my',
                'value' => 'Id',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            2 => 
            array (
                'id' => 3,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 86,
                'locale' => 'ch',
                'value' => 'Shop Id',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            3 => 
            array (
                'id' => 4,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 86,
                'locale' => 'my',
                'value' => 'Shop Id',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            4 => 
            array (
                'id' => 5,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 87,
                'locale' => 'ch',
                'value' => 'Cat Id',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            5 => 
            array (
                'id' => 6,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 87,
                'locale' => 'my',
                'value' => 'Cat Id',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            6 => 
            array (
                'id' => 7,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 88,
                'locale' => 'ch',
                'value' => 'Child Cat Id',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            7 => 
            array (
                'id' => 8,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 88,
                'locale' => 'my',
                'value' => 'Child Cat Id',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            8 => 
            array (
                'id' => 9,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 89,
                'locale' => 'ch',
                'value' => 'Name',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            9 => 
            array (
                'id' => 10,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 89,
                'locale' => 'my',
                'value' => 'Name',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            10 => 
            array (
                'id' => 11,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 90,
                'locale' => 'ch',
                'value' => 'Slug',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            11 => 
            array (
                'id' => 12,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 90,
                'locale' => 'my',
                'value' => 'Slug',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            12 => 
            array (
                'id' => 13,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 91,
                'locale' => 'ch',
                'value' => 'Summary',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            13 => 
            array (
                'id' => 14,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 91,
                'locale' => 'my',
                'value' => 'Summary',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            14 => 
            array (
                'id' => 15,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 92,
                'locale' => 'ch',
                'value' => 'Description',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            15 => 
            array (
                'id' => 16,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 92,
                'locale' => 'my',
                'value' => 'Description',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            16 => 
            array (
                'id' => 17,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 93,
                'locale' => 'ch',
                'value' => 'Image',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            17 => 
            array (
                'id' => 18,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 93,
                'locale' => 'my',
                'value' => 'Image',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            18 => 
            array (
                'id' => 19,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 94,
                'locale' => 'ch',
                'value' => 'Images',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            19 => 
            array (
                'id' => 20,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 94,
                'locale' => 'my',
                'value' => 'Images',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            20 => 
            array (
                'id' => 21,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 95,
                'locale' => 'ch',
                'value' => 'Price',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            21 => 
            array (
                'id' => 22,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 95,
                'locale' => 'my',
                'value' => 'Price',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            22 => 
            array (
                'id' => 23,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 96,
                'locale' => 'ch',
                'value' => 'Stock',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            23 => 
            array (
                'id' => 24,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 96,
                'locale' => 'my',
                'value' => 'Stock',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            24 => 
            array (
                'id' => 25,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 97,
                'locale' => 'ch',
                'value' => 'Condition',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            25 => 
            array (
                'id' => 26,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 97,
                'locale' => 'my',
                'value' => 'Condition',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            26 => 
            array (
                'id' => 27,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 98,
                'locale' => 'ch',
                'value' => 'Publish',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            27 => 
            array (
                'id' => 28,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 98,
                'locale' => 'my',
                'value' => 'Publish',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            28 => 
            array (
                'id' => 29,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 99,
                'locale' => 'ch',
                'value' => 'Created At',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            29 => 
            array (
                'id' => 30,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 99,
                'locale' => 'my',
                'value' => 'Created At',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            30 => 
            array (
                'id' => 31,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 100,
                'locale' => 'ch',
                'value' => 'Updated At',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            31 => 
            array (
                'id' => 32,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 100,
                'locale' => 'my',
                'value' => 'Updated At',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            32 => 
            array (
                'id' => 33,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 101,
                'locale' => 'ch',
                'value' => 'shops',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            33 => 
            array (
                'id' => 34,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 101,
                'locale' => 'my',
                'value' => 'shops',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            34 => 
            array (
                'id' => 35,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 102,
                'locale' => 'ch',
                'value' => 'categories',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            35 => 
            array (
                'id' => 36,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 102,
                'locale' => 'my',
                'value' => 'categories',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            36 => 
            array (
                'id' => 37,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 103,
                'locale' => 'ch',
                'value' => 'categories',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            37 => 
            array (
                'id' => 38,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 103,
                'locale' => 'my',
                'value' => 'categories',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            38 => 
            array (
                'id' => 39,
                'table_name' => 'data_types',
                'column_name' => 'display_name_singular',
                'foreign_key' => 11,
                'locale' => 'ch',
                'value' => 'Product',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            39 => 
            array (
                'id' => 40,
                'table_name' => 'data_types',
                'column_name' => 'display_name_singular',
                'foreign_key' => 11,
                'locale' => 'my',
                'value' => 'Product',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            40 => 
            array (
                'id' => 41,
                'table_name' => 'data_types',
                'column_name' => 'display_name_plural',
                'foreign_key' => 11,
                'locale' => 'ch',
                'value' => 'Products',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            41 => 
            array (
                'id' => 42,
                'table_name' => 'data_types',
                'column_name' => 'display_name_plural',
                'foreign_key' => 11,
                'locale' => 'my',
                'value' => 'Products',
                'created_at' => '2021-06-18 17:30:56',
                'updated_at' => '2021-06-18 17:30:56',
            ),
            42 => 
            array (
                'id' => 43,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 104,
                'locale' => 'ch',
                'value' => 'Id',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            43 => 
            array (
                'id' => 44,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 104,
                'locale' => 'my',
                'value' => 'Id',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            44 => 
            array (
                'id' => 45,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 105,
                'locale' => 'ch',
                'value' => 'User Id',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            45 => 
            array (
                'id' => 46,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 105,
                'locale' => 'my',
                'value' => 'User Id',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            46 => 
            array (
                'id' => 47,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 106,
                'locale' => 'ch',
                'value' => 'Name',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            47 => 
            array (
                'id' => 48,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 106,
                'locale' => 'my',
                'value' => 'Name',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            48 => 
            array (
                'id' => 49,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 108,
                'locale' => 'ch',
                'value' => 'Description',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            49 => 
            array (
                'id' => 50,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 108,
                'locale' => 'my',
                'value' => 'Description',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            50 => 
            array (
                'id' => 51,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 110,
                'locale' => 'ch',
                'value' => 'Is Active',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            51 => 
            array (
                'id' => 52,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 110,
                'locale' => 'my',
                'value' => 'Is Active',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            52 => 
            array (
                'id' => 53,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 111,
                'locale' => 'ch',
                'value' => 'Created At',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            53 => 
            array (
                'id' => 54,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 111,
                'locale' => 'my',
                'value' => 'Created At',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            54 => 
            array (
                'id' => 55,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 112,
                'locale' => 'ch',
                'value' => 'Updated At',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            55 => 
            array (
                'id' => 56,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 112,
                'locale' => 'my',
                'value' => 'Updated At',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            56 => 
            array (
                'id' => 57,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 113,
                'locale' => 'ch',
                'value' => 'users',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            57 => 
            array (
                'id' => 58,
                'table_name' => 'data_rows',
                'column_name' => 'display_name',
                'foreign_key' => 113,
                'locale' => 'my',
                'value' => 'users',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            58 => 
            array (
                'id' => 59,
                'table_name' => 'data_types',
                'column_name' => 'display_name_singular',
                'foreign_key' => 12,
                'locale' => 'ch',
                'value' => 'Shop',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            59 => 
            array (
                'id' => 60,
                'table_name' => 'data_types',
                'column_name' => 'display_name_singular',
                'foreign_key' => 12,
                'locale' => 'my',
                'value' => 'Shop',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            60 => 
            array (
                'id' => 61,
                'table_name' => 'data_types',
                'column_name' => 'display_name_plural',
                'foreign_key' => 12,
                'locale' => 'ch',
                'value' => 'Shops',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
            61 => 
            array (
                'id' => 62,
                'table_name' => 'data_types',
                'column_name' => 'display_name_plural',
                'foreign_key' => 12,
                'locale' => 'my',
                'value' => 'Shops',
                'created_at' => '2021-06-18 17:33:12',
                'updated_at' => '2021-06-18 17:33:12',
            ),
        ));
        
        
    }
}