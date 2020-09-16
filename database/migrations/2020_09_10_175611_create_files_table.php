<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name')->nullable();
            $table->string('client_original_name')->nullable();
            $table->string('client_original_mime_type')->nullable();
            $table->string('client_original_extension')->nullable();
            $table->string('mime_type')->nullable();
            $table->string('storage_path')->nullable();
            $table->string('size')->nullable();
            $table->string('delete_key');
            $table->string('iterator');
            $table->unique(['delete_key', 'iterator']);
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
        Schema::dropIfExists('files');
    }
}
