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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();

            // Business / Shop Info
            $table->string('name');
            $table->string('slug')->unique(); // shop identifier
            $table->string('domain')->nullable()->unique(); // optional subdomain

            // Plan & Status
            $table->string('plan')->default('free'); // free, pro, enterprise
            $table->boolean('is_active')->default(true);
            $table->timestamp('trial_ends_at')->nullable();

            // Contact Info (Optional but useful)
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            // POS Settings
            $table->string('currency', 10)->default('PKR');
            $table->string('timezone')->default('Asia/Karachi');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
