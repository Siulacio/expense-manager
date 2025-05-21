<?php

use App\Enums\Status;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->enum('status', Status::values())->default(Status::ACTIVE);
            $table->timestamps();

            $table->foreignId('user_id')->constrained(User::TABLE);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
