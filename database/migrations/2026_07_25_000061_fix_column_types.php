<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('ALTER TABLE services MODIFY icon TEXT');
        DB::statement('ALTER TABLE project_technologies MODIFY icon TEXT');
        DB::statement('ALTER TABLE project_results MODIFY icon TEXT');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE services MODIFY icon VARCHAR(255)');
        DB::statement('ALTER TABLE project_technologies MODIFY icon VARCHAR(255)');
        DB::statement('ALTER TABLE project_results MODIFY icon VARCHAR(255)');
    }
};
