<?php

use App\Entity\Answer;
use Illuminate\Database\Seeder;

/**
 * Class AnswerTableSeeder
 */
class AnswerTableSeeder extends Seeder
{
    const ANSWER_YES = 'Да';
    const ANSWER_NO = 'Нет';


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answer = new Answer();
        $answer->answer = self::ANSWER_YES;
        $answer->save();

        $answer = new Answer();
        $answer->answer = self::ANSWER_NO;
        $answer->save();
    }

}