<?php

use App\Entity\Answer;
use App\Entity\Category;
use App\Entity\Question;
use Illuminate\Database\Seeder;


/**
 * Class QuestionTableSeeder
 */
class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answer_yes = Answer::where('answer', AnswerTableSeeder::ANSWER_YES)->first();
        $answer_no = Answer::where('answer', AnswerTableSeeder::ANSWER_NO)->first();

        $category_client = Category::where('name', CategoryTableSeeder::CATEGORY_CLIENT)->first();
        $category_doc = Category::where('name', CategoryTableSeeder::CATEGORY_DOC)->first();

        $question = new Question();
        $question->question = 'На фото видно лицо?';
        $question->priority = 0;
        $question->category_id = $category_client->id;
        $question->correctAnswer = $answer_yes->id;
        $question->save();
        $question->answers()->attach($answer_yes);
        $question->answers()->attach($answer_no);

        $question = new Question();
        $question->question = 'Подозрение в мошенничестве(Fake)';
        $question->priority = 0;
        $question->category_id = $category_client->id;
        $question->correctAnswer = $answer_no->id;
        $question->save();
        $question->answers()->attach($answer_yes);
        $question->answers()->attach($answer_no);

        $question = new Question();
        $question->question = 'Фото соответствует сезону?(лето/зима)';
        $question->priority = 0;
        $question->category_id = $category_client->id;
        $question->correctAnswer = $answer_yes->id;
        $question->save();
        $question->answers()->attach($answer_yes);
        $question->answers()->attach($answer_no);

        $question = new Question();
        $question->question = 'Текст видно четко?';
        $question->priority = 0;
        $question->category_id = $category_doc->id;
        $question->correctAnswer = $answer_yes->id;
        $question->save();
        $question->answers()->attach($answer_yes);
        $question->answers()->attach($answer_no);

        $question = new Question();
        $question->question = 'Есть подпись?';
        $question->priority = 0;
        $question->category_id = $category_doc->id;
        $question->correctAnswer = $answer_yes->id;
        $question->save();
        $question->answers()->attach($answer_yes);
        $question->answers()->attach($answer_no);

        $question = new Question();
        $question->question = 'Текст на русском языке?';
        $question->priority = 0;
        $question->category_id = $category_doc->id;
        $question->correctAnswer = $answer_yes->id;
        $question->save();
        $question->answers()->attach($answer_yes);
        $question->answers()->attach($answer_no);
    }
}