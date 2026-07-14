<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_super_admin')->default(false)->after('account_type_other');
            $table->string('requested_account_type', 40)->nullable()->after('is_super_admin');
            $table->string('requested_account_type_other', 120)->nullable()->after('requested_account_type');
            $table->timestamp('role_change_requested_at')->nullable()->after('requested_account_type_other');
        });

        Schema::create('delegated_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assigned_by')->constrained('users')->cascadeOnDelete();
            $table->foreignId('assigned_to')->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('due_at')->nullable();
            $table->string('status', 30)->default('assigned');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('delegated_tasks');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_super_admin', 'requested_account_type', 'requested_account_type_other', 'role_change_requested_at']);
        });
    }
};
