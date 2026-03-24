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
        Schema::create('district_associations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('division'); // e.g. 'Dhaka', 'Rangpur', 'Sylhet'
            $table->string('image')->nullable();
            $table->string('link')->nullable(); // Join/Action link
            $table->integer('members_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('district_associations');
    }
};
