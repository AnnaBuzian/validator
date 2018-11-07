<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('role_id')->unsigned();
            $table->string('user_id')->unsigned();
        });

        DB::statement('ALTER TABLE role_user ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
        DB::statement('ALTER TABLE role_user ALTER COLUMN role_id SET DEFAULT uuid_generate_v4();');
        DB::statement('ALTER TABLE role_user ALTER COLUMN user_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * 
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
