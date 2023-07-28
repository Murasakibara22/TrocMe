<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncePreniaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonce_prenia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('prix');
            $table->boolean('etat');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('slug');
            $table->timestamps();

            $table->unsignedBigInteger('annonce_id');
            $table->foreign('annonce_id')
                ->references('id')
                ->on('annonces')
                ->onDelete('cascade');

            $table->unsignedBigInteger('following_id');
            $table->foreign('following_id')
                ->references('id')
                ->on('followings')
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
        Schema::dropIfExists('annonce_prenia');
    }
}
