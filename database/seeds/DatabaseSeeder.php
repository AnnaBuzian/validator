<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);

        //Queue and Questions for validator photo/document
        $this->call(AnswerTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(QuestionTableSeeder::class);
        $this->call(QueueTableSeeder::class);
    }
}
