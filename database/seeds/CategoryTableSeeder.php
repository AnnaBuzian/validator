<?php

use App\Entity\Category;
use Illuminate\Database\Seeder;

/**
 * Class CategoryTableSeeder
 */
class CategoryTableSeeder extends Seeder
{
    const CATEGORY_CLIENT = 'Клиент';
    const CATEGORY_DOC = 'Документ';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = self::CATEGORY_CLIENT;
        $category->priority = 0;
        $category->save();

        $category = new Category();
        $category->name = self::CATEGORY_DOC;
        $category->priority = 1;
        $category->save();
    }

}