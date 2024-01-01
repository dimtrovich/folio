<?php

namespace App\Database\Migrations;

use BlitzPHP\Database\Migration\Migration;
use BlitzPHP\Database\Migration\Structure;

class CreateTableProjets extends Migration
{
    protected string $group = 'default';

    public function up()
    {
        $this->create('projets', function(Structure $table) {
            $table->id();
            $table->string('titre', 128);
            $table->enum('type_projet', ['personnel', 'entreprise', 'freelance', 'opensource', 'benevolat', 'autre']);
            $table->string('url')->nullable();
            $table->string('cover')->nullable();
            $table->json('images')->nullable();
            $table->text('description')->nullable();
            $table->json('metadata')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
			
			return $table;
        });
    }

    public function down()
    {
        $this->dropIfExists('projets');
    }
}
