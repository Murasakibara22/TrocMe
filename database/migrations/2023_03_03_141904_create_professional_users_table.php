<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('prix');
            $table->boolean('etat');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('slug');
            $table->timestamps();


            $table->unsignedBigInteger('type_prof_user_id');
            $table->foreign('type_prof_user_id')
                ->references('id')
                ->on('type_prof_users')
                ->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professional_users');
    }
}
