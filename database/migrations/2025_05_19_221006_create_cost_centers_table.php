<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cost_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->timestamps();

            $table->foreignId('user_id')->constrained(User::TABLE);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cost_centers');
    }
};
