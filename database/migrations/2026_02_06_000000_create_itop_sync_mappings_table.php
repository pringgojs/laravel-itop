<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create(config('itop.migrations.mappings_table', 'itop_sync_mappings'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('source_instance');
            $table->string('source_ticket_id');
            $table->string('dest_instance');
            $table->string('dest_ticket_id');
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->unique(['source_instance', 'source_ticket_id'], 'itop_source_unique');
        });
    }

    public function down()
    {
        Schema::dropIfExists(config('itop.migrations.mappings_table', 'itop_sync_mappings'));
    }
};
