<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->default(' ');
            $table->integer('mobile');
            $table->string('country');
            $table->smallInteger('gender');
            $table->boolean('is_approved')->default(0);
            $table->unsignedInteger('approved_by');
            $table->timestamp('last_login')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
