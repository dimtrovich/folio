<?php

namespace App\Database\Migrations;

use BlitzPHP\Database\Migration\Migration;
use BlitzPHP\Database\Migration\Structure;

class CreateTableFormations extends Migration
{
    public function up()
    {
        $this->create('formations', function(Structure $table) {
			$table->id();
            $table->string('titre', 128);
            $table->date('date_deb');
            $table->date('date_fin')->nullable();
            $table->string('ecole');
            $table->string('departement');
            $table->text('description')->nullable();
            $table->json('metadata')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            return $table;
        });
    }

    public function down()
    {
        $this->dropIfExists('formations');
    }
}
