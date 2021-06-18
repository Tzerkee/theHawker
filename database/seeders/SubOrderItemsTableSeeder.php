<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubOrderItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sub_order_items')->delete();
        
        
        
    }
}