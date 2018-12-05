<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',50);
            $table->string('email',50);
            $table->integer('telefone');
            $table->date('data_nascimento');
            $table->string('cidade');
            $table->integer('cep');
            $table->text('mensagem');
            $table->boolean('aceita_novidades');
            // $table->enum('aceita_novidades',[0, 1]);
            $table->unsignedInteger('user_id')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
