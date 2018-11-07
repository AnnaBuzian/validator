<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateQuestionAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_answer', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('question_id')->unsigned();
            $table->uuid('answer_id')->unsigned();
        });

        DB::statement('ALTER TABLE question_answer ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
        DB::statement('ALTER TABLE question_answer ALTER COLUMN question_id SET DEFAULT uuid_generate_v4();');
        DB::statement('ALTER TABLE question_answer ALTER COLUMN answer_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_answer');
    }
}
