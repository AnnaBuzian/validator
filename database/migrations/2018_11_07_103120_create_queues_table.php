<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('pathToFile');
            $table->timestamp('startDateTime')->nullable();
            $table->timestamp('finishDateTime')->nullable();
            $table->boolean('isValid')->nullable();
            $table->uuid('category_id');
            $table->uuid('user_id')->nullable();
            $table->timestamps();


            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });

        DB::statement('ALTER TABLE queues ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queues');
    }
}
