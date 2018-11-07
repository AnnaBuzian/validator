<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('category_id');
            $table->string('question', 256)->nullable();
            $table->integer('priority')->nullable()->default(0);
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('CASCADE');
        });

        DB::statement('ALTER TABLE questions ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
        DB::statement('ALTER TABLE questions ALTER COLUMN category_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
