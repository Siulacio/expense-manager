<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\{Builder, Model};
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    public const TABLE = 'expenses';
    public const ID = 'id';
    public const NAME = 'name';
    public const AMOUNT = 'amount';
    public const DATE = 'date';
    public const STATUS = 'status';
    public const COST_CENTER_ID = 'cost_center_id';
    public const PAYMENT_METHOD_ID = 'payment_method_id';
    public const USER_ID = 'user_id';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';

    protected $table = self::TABLE;
    protected $primaryKey = self::ID;

    protected $fillable = [
        self::NAME,
        self::AMOUNT,
        self::DATE,
        self::STATUS,
        self::COST_CENTER_ID,
        self::PAYMENT_METHOD_ID,
        self::USER_ID,
    ];

    public function id(): int
    {
        return $this->{self::ID};
    }

    public function name(): string
    {
        return $this->{self::NAME};
    }

    public function amount(): float
    {
        return $this->{self::AMOUNT};
    }

    public function date(): string
    {
        return $this->{self::DATE};
    }

    public function status(): int
    {
        return $this->{self::STATUS};
    }

    public function costCenterId(): int
    {
        return $this->{self::COST_CENTER_ID};
    }

    public function paymentMethodId(): int
    {
        return $this->{self::PAYMENT_METHOD_ID};
    }

    public function userId(): int
    {
        return $this->{self::USER_ID};
    }

    public function createdAt(): string
    {
        return $this->{self::CREATED_AT};
    }

    public function updatedAt(): string
    {
        return $this->{self::UPDATED_AT};
    }

    public function costCenter(): BelongsTo
    {
        return $this->belongsTo(CostCenter::class);
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function scopeFilterByMonth($query, array $data): Builder
    {
        if (!$data['value']) {
            return $query;
        }

        return $query->whereMonth(self::DATE, $data['value'])
            ->whereYear(self::DATE, date('Y'));
    }

    public static function scopeFilterByDateRange($query, array $data): Builder
    {
        return $query
            ->when(
                $data['from'],
                fn (Builder $query, $date): Builder => $query->whereDate(self::DATE, '>=', $date),
            )
            ->when(
                $data['until'],
                fn (Builder $query, $date): Builder => $query->whereDate(self::DATE, '<=', $date),
            );
    }

    public static function scopeFilterByPeriodPreset($query, array $data): Builder
    {
        if (!$data['value']) {
            return $query;
        }

        return match ($data['value']) {
            'current_month' => $query->whereMonth(Expense::DATE, now()->month)->whereYear(Expense::DATE, now()->year),
            'last_month' => $query->whereMonth(Expense::DATE, now()->subMonth()->month)->whereYear(Expense::DATE, now()->subMonth()->year),
            'last_3_months' => $query->where(Expense::DATE, '>=', now()->subMonths(3)->startOfMonth()),
            'last_6_months' => $query->where(Expense::DATE, '>=', now()->subMonths(6)->startOfMonth()),
            'current_year' => $query->whereYear(Expense::DATE, now()->year),
            default => $query,
        };
    }
}
