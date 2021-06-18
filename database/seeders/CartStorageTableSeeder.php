<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CartStorageTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cart_storage')->delete();
        
        
        
    }
}