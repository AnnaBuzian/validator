<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_queue', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('category_id');
            $table->uuid('queue_id');
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

            $table->foreign('queue_id')
                ->references('id')
                ->on('queues');
        });

        DB::statement('ALTER TABLE category_queue ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_queue');
    }
}
