<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_question', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('question_id')->unsigned();
            $table->uuid('answer_id')->unsigned();

            $table->foreign('question_id')
                ->references('id')
                ->on('questions');

            $table->foreign('answer_id')
                ->references('id')
                ->on('answers');
        });

        DB::statement('ALTER TABLE answer_question ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_question');
    }
}
