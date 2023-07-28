<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre');
            $table->text('description');
            $table->string('contactWhatsapp');
            $table->float('prix');
            $table->string('type')->default('Vente');
            $table->string('Lieu');
            $table->string('email');
            $table->string('photo');
            $table->string('images_secondaire');
            $table->string('facebook');
            $table->integer('view_count_annonces')->default(0);
            $table->string('slug')->unique();
            $table->timestamps();

            $table->unsignedBigInteger('ville_id');
            $table->foreign('ville_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->unsignedBigInteger('souscategorie_id');
            $table->foreign('souscategorie_id')
                ->references('id')
                ->on('sous_categories')
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
        Schema::dropIfExists('annonces');
    }
}
