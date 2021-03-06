<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherAdminTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function getConnection()
    {
        return config('admin.database.connection') ?: config('database.default');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('admin.database.role_users_table'), function (Blueprint $table) {
            $table->foreignId('role_id')->constrained('admin_roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('admin_users')->onDelete('cascade')->onUpdate('cascade');
            $table->index(['role_id', 'user_id']);
            $table->timestamps();
        });

        Schema::create(config('admin.database.role_permissions_table'), function (Blueprint $table) {
            $table->foreignId('role_id')->constrained('admin_roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('permission_id')->constrained('admin_permissions')->onDelete('cascade')->onUpdate('cascade');
            $table->index(['role_id', 'permission_id']);
            $table->timestamps();
        });

        Schema::create(config('admin.database.user_permissions_table'), function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('admin_users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('permission_id')->constrained('admin_permissions')->onDelete('cascade')->onUpdate('cascade');
            $table->index(['user_id', 'permission_id']);
            $table->timestamps();
        });

        Schema::create(config('admin.database.role_menu_table'), function (Blueprint $table) {
            $table->foreignId('role_id')->constrained('admin_roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('menu_id')->constrained('admin_menu')->onDelete('cascade')->onUpdate('cascade');
            $table->index(['role_id', 'menu_id']);
            $table->timestamps();
        });

        Schema::create(config('admin.database.operation_log_table'), function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('admin_users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('path');
            $table->string('method', 10);
            $table->string('ip');
            $table->text('input');
            $table->index('user_id');
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
        Schema::dropIfExists(config('admin.database.user_permissions_table'));
        Schema::dropIfExists(config('admin.database.role_users_table'));
        Schema::dropIfExists(config('admin.database.role_permissions_table'));
        Schema::dropIfExists(config('admin.database.role_menu_table'));
        Schema::dropIfExists(config('admin.database.operation_log_table'));
    }
}
