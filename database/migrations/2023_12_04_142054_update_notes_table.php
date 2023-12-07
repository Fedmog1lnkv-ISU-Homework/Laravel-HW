<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->boolean('is_published')->default(true);
            $table->boolean('is_publish_at_time')->default(false);
            $table->boolean('is_removed_from_publication')->default(false);
            $table->timestamp('publisher_time')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
		Schema::table('notes', function (Blueprint $table) {
            $table->dropColumn('is_published');
            $table->dropColumn('is_publish_at_time');
            $table->dropColumn('is_removed_from_publication');
            $table->dropColumn('publisher_time');
        });
    }
};
