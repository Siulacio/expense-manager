<?php

use App\Models\{CostCenter, PaymentMethod, Template};
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('template_items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->unsignedInteger('amount');
            $table->timestamps();

            $table->foreignId('template_id')->constrained(Template::TABLE);
            $table->foreignId('cost_center_id')->constrained(CostCenter::TABLE);
            $table->foreignId('payment_method_id')->constrained(PaymentMethod::TABLE);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('template_items');
    }
};
