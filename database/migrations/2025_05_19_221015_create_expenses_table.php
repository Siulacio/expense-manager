<?php

use App\Enums\ExpenseStatus;
use App\Models\{CostCenter, PaymentMethod, User};
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->unsignedInteger('amount');
            $table->date('date')->nullable();
            $table->enum('status', ExpenseStatus::values())->default(ExpenseStatus::PENDING);
            $table->timestamps();

            $table->foreignId('cost_center_id')->constrained(CostCenter::TABLE);
            $table->foreignId('payment_method_id')->constrained(PaymentMethod::TABLE);
            $table->foreignId('user_id')->constrained(User::TABLE);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
