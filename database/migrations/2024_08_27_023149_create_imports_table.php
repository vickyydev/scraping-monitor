<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('map_id');
            $table->uuid('source_id');
            $table->timestamp('start_time');
            $table->timestamp('end_time')->nullable();
            $table->string('status');
            $table->text('error_message')->nullable();
            $table->integer('articles_processed')->nullable();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imports');
    }
};
