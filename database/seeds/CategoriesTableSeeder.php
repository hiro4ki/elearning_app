<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 一括削除
        Category::truncate();

        factory(App\Category::class, 30)->create();
    }
}
