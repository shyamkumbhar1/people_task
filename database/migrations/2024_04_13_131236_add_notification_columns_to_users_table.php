<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('notification_switch')->default(true)->after('password');
            $table->string('phone_number')->nullable()->after('notification_switch');
        });
    }


    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('notification_switch');
            $table->dropColumn('phone_number');
        });
    }
};
