<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table(config('itop.migrations.mappings_table', 'itop_sync_mappings'), function (Blueprint $table) {
            if (! Schema::hasColumn(config('itop.migrations.mappings_table', 'itop_sync_mappings'), 'entity_type')) {
                $table->string('entity_type')->nullable()->after('dest_instance');
            }

            if (! Schema::hasColumn(config('itop.migrations.mappings_table', 'itop_sync_mappings'), 'source_entity_id')) {
                $table->string('source_entity_id')->nullable()->after('entity_type');
            }

            if (! Schema::hasColumn(config('itop.migrations.mappings_table', 'itop_sync_mappings'), 'dest_entity_id')) {
                $table->string('dest_entity_id')->nullable()->after('source_entity_id');
            }

            // add a unique index for entity mappings to ensure idempotency
            // Use try/catch to avoid requiring doctrine/dbal at runtime; if the index already exists
            // or DBAL is not present, ignore the error.
            try {
                $table->unique(['source_instance', 'entity_type', 'source_entity_id'], config('itop.migrations.mappings_table', 'itop_sync_mappings') . '_entity_unique');
            } catch (\Exception $e) {
                // ignore — index may already exist or DB driver may not support introspection without doctrine/dbal
            }
        });
    }

    public function down()
    {
        Schema::table(config('itop.migrations.mappings_table', 'itop_sync_mappings'), function (Blueprint $table) {
            $table->dropColumn(['entity_type', 'source_entity_id', 'dest_entity_id']);
        });
    }
};
