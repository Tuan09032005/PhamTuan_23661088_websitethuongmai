<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add user_role if it doesn't exist
        if (!Schema::hasColumn('user', 'user_role')) {
            DB::statement("ALTER TABLE `user` ADD COLUMN `user_role` TINYINT(1) NOT NULL DEFAULT 0 AFTER `user_address`");
        }

        // Ensure password column can hold hashed passwords
        // Modify only if the column exists
        if (Schema::hasColumn('user', 'user_password')) {
            DB::statement("ALTER TABLE `user` MODIFY `user_password` VARCHAR(255) NOT NULL");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('user', 'user_role')) {
            DB::statement("ALTER TABLE `user` DROP COLUMN `user_role`");
        }

        // Note: Reverting password column length is potentially destructive; skip.
    }
};
