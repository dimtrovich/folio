<?php

namespace App\Database\Migrations;

use BlitzPHP\Database\Migration\Migration;
use BlitzPHP\Database\Migration\Structure;

class CreateTableExperiences extends Migration
{
    public function up()
    {
        $this->create('experiences', function(Structure $table) {
            $table->id();
            $table->string('titre', 128);
            $table->enum('type_experience', ['emploi', 'stage-pro', 'stage-accademique', 'benevolat']);
            $table->enum('type_contrat', ['cdd', 'cdi', 'freelance', 'saisonier', 'temporaire', 'autre'])->nullable();
            $table->enum('type_travail', ['temps-plein', 'temps-partiel', 'temporaire', 'autre'])->nullable();
            $table->string('role', 128)->nullable();
            $table->date('date_deb');
            $table->date('date_fin')->nullable();
            $table->string('entreprise', 128);
            $table->longText('description')->nullable();
            $table->json('metadata')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            return $table;
        });
    }

    public function down()
    {
        $this->dropIfExists('experiences');
    }
}
