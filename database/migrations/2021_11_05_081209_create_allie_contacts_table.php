<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllieContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allies_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personnage_id')->constrained('personnages');
            $table->string('type');
            $table->string('nom');
            $table->string('metier');
            $table->integer('efficacite');
            $table->integer('fiabilite');
            $table->text('details')->nullable();
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
        Schema::dropIfExists('allie_contacts');
    }
}
