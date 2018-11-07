<?php

use App\Entity\Category;
use App\Entity\Queue;
use Illuminate\Database\Seeder;

/**
 * Class QueueSeeder
 */
class QueueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_client = Category::where('name', CategoryTableSeeder::CATEGORY_CLIENT)->first();
        $category_doc = Category::where('name', CategoryTableSeeder::CATEGORY_DOC)->first();

        $queue = new Queue();
        $queue->pathToFile = 'document1.jpg';
        $queue->category_id = $category_doc->id;
        $queue->save();

        $queue = new Queue();
        $queue->pathToFile = 'document2.jpg';
        $queue->category_id = $category_doc->id;
        $queue->save();

        $queue = new Queue();
        $queue->pathToFile = 'document3.jpg';
        $queue->category_id = $category_doc->id;
        $queue->save();

        $queue = new Queue();
        $queue->pathToFile = 'document4.jpg';
        $queue->category_id = $category_doc->id;
        $queue->save();

        $queue = new Queue();
        $queue->pathToFile = 'photo1.jpg';
        $queue->category_id = $category_client->id;
        $queue->save();

        $queue = new Queue();
        $queue->pathToFile = 'photo2.jpg';
        $queue->category_id = $category_client->id;
        $queue->save();

        $queue = new Queue();
        $queue->pathToFile = 'photo3.jpg';
        $queue->category_id = $category_client->id;
        $queue->save();

        $queue = new Queue();
        $queue->pathToFile = 'photo4.jpg';
        $queue->category_id = $category_client->id;
        $queue->save();

        $queue = new Queue();
        $queue->pathToFile = 'photo5.jpg';
        $queue->category_id = $category_client->id;
        $queue->save();
    }

}