<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shops')->delete();
        
        \DB::table('shops')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'name' => 'Ut ipsam.',
                'description' => 'Cum aut sed delectus quas ullam. Aut dolore quas a et neque et fugit reiciendis. Est voluptatem necessitatibus non debitis. Porro est a animi velit saepe id sint.',
                'is_active' => 1,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 3,
                'name' => 'Natus aut.',
                'description' => 'Cum quis sed accusantium impedit voluptas cumque. Et commodi vel et ex in vero corrupti. Sapiente nobis et labore ut quasi.',
                'is_active' => 1,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 6,
                'name' => 'Aut minima.',
                'description' => 'Sed voluptatem ullam est iste. Et pariatur neque vero hic deserunt. Et aspernatur esse nesciunt sunt aut sed.',
                'is_active' => 0,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 7,
                'name' => 'Culpa sit.',
                'description' => 'Et dolorem unde hic non quia. Reprehenderit rem similique voluptas aut consequuntur enim. Quasi voluptatem nesciunt aut id cumque et. Minus ducimus sunt quis.',
                'is_active' => 0,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 8,
                'name' => 'Veritatis cum.',
                'description' => 'Quos dolorem omnis eaque rem eveniet at. Sed quod magni excepturi. Et dolores et et quasi omnis.',
                'is_active' => 1,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 9,
                'name' => 'In quae.',
                'description' => 'Explicabo nihil totam numquam quia. Id velit temporibus impedit ut.',
                'is_active' => 1,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 10,
                'name' => 'Nemo ut.',
                'description' => 'Sint officia quam rerum minima officiis. Error hic enim autem aut. Quidem ipsam ex facilis qui numquam. Qui maxime ut ipsam et.',
                'is_active' => 0,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 11,
                'name' => 'Et doloremque.',
                'description' => 'Pariatur officia voluptatum nostrum recusandae et ipsa. Molestias natus ab itaque amet non molestias. Rem id vero quibusdam iusto corrupti non ea.',
                'is_active' => 0,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 12,
                'name' => 'Itaque officia.',
                'description' => 'Id nihil aut iusto quo ab. Perferendis est et rerum magni tenetur similique reiciendis. Rem commodi eligendi unde est cumque. Mollitia hic voluptatum et numquam.',
                'is_active' => 0,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
        ));
        
        
    }
}