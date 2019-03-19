<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE roles ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }


    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
