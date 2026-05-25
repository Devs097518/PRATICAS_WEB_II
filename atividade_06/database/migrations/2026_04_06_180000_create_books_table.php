<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
   {
       Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->integer('pages');
        $table->foreignId('author_id')->constrained()->onDelete('cascade');
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->foreignId('publisher_id')->constrained()->onDelete('cascade');
        $table->integer('published_year')->nullable();
        $table->timestamps();

       });

       Schema::table('books', function (Blueprint $table) {
        $table->string('cover_image')->nullable(); // Campo para o caminho da imagem
        });
   }

   public function down()
   {
       Schema::dropIfExists('books');
   }
   
}
;