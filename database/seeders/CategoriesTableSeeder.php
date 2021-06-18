<?php

namespace Database\Seeders;

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
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'enim',
                'slug' => 'ipsam-rerum-quam-voluptates-cupiditate',
                'image' => 'https://via.placeholder.com/100x100.png/001100?text=et',
                'is_parent' => 1,
                'description' => 'Optio quod illo non voluptas repudiandae facilis voluptatum ex. Laboriosam rerum sequi sed qui dolores in. Ut eos voluptas a occaecati mollitia voluptas.',
                'publish' => 1,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'nobis',
                'slug' => 'ratione-vero-aut-id-tempore-cumque-molestias-itaque',
                'image' => 'https://via.placeholder.com/100x100.png/002255?text=dolor',
                'is_parent' => 0,
                'description' => 'Provident aspernatur et eaque distinctio aperiam earum. Magni ad voluptatem rerum ut eveniet. Itaque rerum unde nihil est sit excepturi sunt. Eligendi itaque reprehenderit excepturi ullam consequatur est.',
                'publish' => 0,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'aut',
                'slug' => 'mollitia-expedita-ut-quia-qui-ad-et',
                'image' => 'https://via.placeholder.com/100x100.png/00aa11?text=laborum',
                'is_parent' => 0,
                'description' => 'Eos veritatis asperiores voluptates iusto vel deserunt. Consectetur veniam rerum omnis aliquam iste facilis nostrum. Deserunt quia ducimus repellendus unde enim. Sunt et ipsa dolore voluptas totam.',
                'publish' => 1,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'possimus',
                'slug' => 'quod-hic-et-quibusdam-aut-possimus-libero-sunt-aperiam',
                'image' => 'https://via.placeholder.com/100x100.png/0088bb?text=autem',
                'is_parent' => 1,
                'description' => 'Id quas totam non excepturi. Exercitationem iusto consequatur incidunt itaque. Qui non similique aperiam ipsam quo nostrum.',
                'publish' => 0,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'quos',
                'slug' => 'molestias-consequuntur-placeat-eligendi-dolores-porro-repudiandae',
                'image' => 'https://via.placeholder.com/100x100.png/00bbdd?text=architecto',
                'is_parent' => 1,
                'description' => 'Magni perferendis qui ea eos repudiandae. Qui atque blanditiis tempora eum ipsam sunt et. Numquam quaerat soluta voluptatem omnis eaque et deserunt.',
                'publish' => 0,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'corrupti',
                'slug' => 'eligendi-dolorem-et-itaque-reiciendis-qui-autem-soluta',
                'image' => 'https://via.placeholder.com/100x100.png/00ccdd?text=aperiam',
                'is_parent' => 1,
                'description' => 'Ipsa aspernatur odio sunt eligendi repellat deleniti deleniti ab. Id similique ut dolores aliquid id rerum. Amet eos officiis cumque voluptatem a laudantium nisi nobis. Porro odio illo officia molestiae similique et totam.',
                'publish' => 1,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'soluta',
                'slug' => 'id-esse-dolore-dolorem',
                'image' => 'https://via.placeholder.com/100x100.png/00bb99?text=eveniet',
                'is_parent' => 0,
                'description' => 'Illo eligendi debitis id et eum quam. Eius saepe eos quas et ipsam voluptas blanditiis natus. Eos voluptate voluptatem eligendi et hic.',
                'publish' => 0,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'facilis',
                'slug' => 'sapiente-voluptates-accusamus-enim-eveniet-et-magnam-voluptas',
                'image' => 'https://via.placeholder.com/100x100.png/0077bb?text=et',
                'is_parent' => 1,
                'description' => 'Quasi velit voluptas unde suscipit voluptatibus voluptas aliquid non. Voluptates hic non et dicta qui. Tenetur est velit rerum autem. Et nemo voluptatum illum modi.',
                'publish' => 1,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            8 => 
            array (
                'id' => 9,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'earum',
                'slug' => 'possimus-aperiam-aut-maiores-consequatur-iusto-id-odio-vel',
                'image' => 'https://via.placeholder.com/100x100.png/008822?text=magni',
                'is_parent' => 0,
                'description' => 'Velit consequuntur culpa voluptatibus. Qui itaque adipisci temporibus et. Eius sint fuga rem error doloremque occaecati omnis.',
                'publish' => 1,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            9 => 
            array (
                'id' => 10,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'cum',
                'slug' => 'ab-voluptatem-hic-possimus-necessitatibus-itaque',
                'image' => 'https://via.placeholder.com/100x100.png/00ee99?text=ipsum',
                'is_parent' => 1,
                'description' => 'Optio perferendis quos iusto cupiditate in blanditiis dolor. Quae qui est animi quia delectus et. Perferendis assumenda repudiandae qui ratione minima et. Tempora veniam harum ut sapiente ut.',
                'publish' => 1,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            10 => 
            array (
                'id' => 11,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'consequatur',
                'slug' => 'quo-fugiat-praesentium-qui-sunt-suscipit',
                'image' => 'https://via.placeholder.com/100x100.png/0088ff?text=beatae',
                'is_parent' => 1,
                'description' => 'Officiis odit sit voluptas ut ea dolores assumenda. Rem labore et aut. Magnam est et asperiores mollitia molestiae sed omnis recusandae. Sed cum velit dolore.',
                'publish' => 0,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            11 => 
            array (
                'id' => 12,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'rerum',
                'slug' => 'ex-error-velit-voluptas-iure-aut-repellendus',
                'image' => 'https://via.placeholder.com/100x100.png/0033ee?text=totam',
                'is_parent' => 1,
                'description' => 'Iste qui incidunt quisquam. Repudiandae nesciunt velit occaecati accusamus aspernatur maiores. Qui cupiditate excepturi repellendus. Reprehenderit et et dolores quo pariatur. Natus a voluptatem natus voluptate ea qui quia molestiae.',
                'publish' => 1,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            12 => 
            array (
                'id' => 13,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'perspiciatis',
                'slug' => 'consectetur-natus-nisi-modi-esse-non-odio',
                'image' => 'https://via.placeholder.com/100x100.png/0000dd?text=nesciunt',
                'is_parent' => 0,
                'description' => 'Voluptatem ut eos dolorem dolorem. Unde est ab officiis dolore non ut autem. Expedita rerum reprehenderit ducimus tenetur.',
                'publish' => 1,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            13 => 
            array (
                'id' => 14,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'non',
                'slug' => 'vero-ducimus-voluptatum-quasi-placeat-harum-voluptatibus-magnam',
                'image' => 'https://via.placeholder.com/100x100.png/0011ff?text=repellat',
                'is_parent' => 1,
                'description' => 'Omnis perspiciatis rerum in nesciunt consequatur natus consequatur numquam. Modi sint libero quia alias quisquam. Atque quia nesciunt culpa officiis perferendis consequatur impedit.',
                'publish' => 1,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            14 => 
            array (
                'id' => 15,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'excepturi',
                'slug' => 'aut-est-dolor-et-et-commodi-eius-iusto-ut',
                'image' => 'https://via.placeholder.com/100x100.png/00ee11?text=voluptates',
                'is_parent' => 0,
                'description' => 'Ipsam modi eos eos at. Rerum quibusdam dolor praesentium rerum asperiores doloremque quibusdam repudiandae. Nisi molestiae rerum quisquam repellendus earum officiis. Soluta eius autem fugiat quia dolorem officiis.',
                'publish' => 0,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            15 => 
            array (
                'id' => 16,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'aut',
                'slug' => 'consequuntur-ducimus-ea-consectetur-pariatur-laboriosam-et-pariatur-ut',
                'image' => 'https://via.placeholder.com/100x100.png/000077?text=nihil',
                'is_parent' => 1,
                'description' => 'Sint eligendi repellat accusantium. Nobis corrupti nihil eos modi eum est sint. Mollitia temporibus neque enim unde consectetur quam. Harum eaque non architecto et ex quo deserunt.',
                'publish' => 0,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            16 => 
            array (
                'id' => 17,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'laudantium',
                'slug' => 'aliquam-reprehenderit-architecto-repudiandae-autem-voluptate',
                'image' => 'https://via.placeholder.com/100x100.png/0077dd?text=et',
                'is_parent' => 0,
                'description' => 'Ex tempore hic architecto sint sunt non unde. Qui possimus saepe ut numquam provident qui. Asperiores praesentium sit temporibus ut aliquam voluptas repellat. Ipsum voluptatem eum eius perspiciatis.',
                'publish' => 0,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            17 => 
            array (
                'id' => 18,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'consequuntur',
                'slug' => 'vitae-voluptatem-incidunt-inventore',
                'image' => 'https://via.placeholder.com/100x100.png/008855?text=fugit',
                'is_parent' => 0,
                'description' => 'Similique quo laborum nesciunt harum. Quisquam ducimus sit a. Molestias incidunt corporis ipsam a sequi perspiciatis. At ut qui qui magni quo.',
                'publish' => 1,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            18 => 
            array (
                'id' => 19,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'saepe',
                'slug' => 'ab-voluptas-qui-sed-modi-voluptatibus-est-eaque',
                'image' => 'https://via.placeholder.com/100x100.png/0066cc?text=nobis',
                'is_parent' => 0,
                'description' => 'Ipsum ex dolores quidem consequatur. Possimus qui quaerat quaerat voluptatem. Accusamus impedit iusto sequi nobis eius minus recusandae velit. Labore odio officia voluptatem illum eius.',
                'publish' => 1,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
            19 => 
            array (
                'id' => 20,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'sunt',
                'slug' => 'deleniti-minima-quasi-vel-tempore-optio-qui-officiis',
                'image' => 'https://via.placeholder.com/100x100.png/00dd33?text=qui',
                'is_parent' => 0,
                'description' => 'Sunt et fuga dolor doloribus cumque vel. Repellat nam ipsum natus non dolorem. Eos repudiandae et expedita distinctio.',
                'publish' => 1,
                'created_at' => '2021-06-18 17:01:43',
                'updated_at' => '2021-06-18 17:01:43',
            ),
        ));
        
        
    }
}