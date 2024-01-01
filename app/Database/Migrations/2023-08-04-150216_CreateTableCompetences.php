<?php

namespace App\Database\Migrations;

use BlitzPHP\Database\Migration\Migration;
use BlitzPHP\Database\Migration\Structure;

class CreateTableCompetences extends Migration
{
    public function up()
    {
        $this->create('competences', function(Structure $table) {
			$table->id();
            $table->string('nom', 123);
            $table->unsignedInteger('niveau');
            $table->text('description')->nullable();
            $table->json('metadata')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            return $table;
        });
    }

    public function down()
    {
        $this->dropIfExists('competences');
    }
}
