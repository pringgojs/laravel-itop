<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create(config('itop.migrations.logs_table', 'itop_sync_logs'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('instance_from')->nullable();
            $table->string('ticket_id_from')->nullable();
            $table->string('instance_to')->nullable();
            $table->string('ticket_id_to')->nullable();
            $table->string('status')->nullable();
            $table->json('payload')->nullable();
            $table->json('response')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(config('itop.migrations.logs_table', 'itop_sync_logs'));
    }
};
