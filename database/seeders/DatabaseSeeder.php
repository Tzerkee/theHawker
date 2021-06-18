<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class DatabaseSeeder extends Seeder
{
    use Seedable;
    
    protected $seedersPath = __DIR__.'/';
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(DataTypesTableSeeder::class);
        $this->call(DataRowsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(RolesTableSeeder::class);

        $this->call(UsersTableSeeder::class);

        $this->call(ShopSeeder::class);
        $this->call(ProductSeeder::class);

        $this->call(UserRolesTableSeeder::class);

        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(CartStorageTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderItemsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(SlideshowsTableSeeder::class);
        $this->call(SubOrdersTableSeeder::class);
        $this->call(SubOrderItemsTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
        $this->call(TranslationsTableSeeder::class);
        $this->call(WishlistTableSeeder::class);
    }
}
