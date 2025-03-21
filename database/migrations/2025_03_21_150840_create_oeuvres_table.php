<?php
 use Illuminate\Database\Migrations\Migration;
 use Illuminate\Database\Schema\Blueprint;
 use Illuminate\Support\Facades\Schema;

 return new class extends Migration {
     public function up(): void {
         Schema::create('oeuvres', function (Blueprint $table) {
             $table->id();
             $table->string('titre');
             $table->string('artiste');
             $table->integer('annee_fabrication');
             $table->date('date_acquisition');
             $table->decimal('prix_estime', 10, 2);
             $table->text('description')->nullable();
             $table->string('image')->nullable();
             $table->foreignId('categorie_id')->constrained()->onDelete('cascade');
             $table->timestamps();
         });
     }

     public function down(): void {
         Schema::dropIfExists('oeuvres');
     }
 };
