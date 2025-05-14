<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executar as alterações na base de dados.
     */
    public function up(): void
    {
        Schema::table('course_batches', function (Blueprint $table) {
            $table->foreignId('course_id')
                ->after('name')
                ->constrained('courses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverte as alterações na base de dados.
     */
    public function down(): void
    {
        Schema::table('course_batches', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
            $table->dropColumn('course_id');
        });
    }
};
