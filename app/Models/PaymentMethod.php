<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class PaymentMethod extends Model
{
    public const TABLE = 'payment_methods';
    public const ID = 'id';
    public const NAME = 'name';
    public const STATUS = 'status';
    public const USER_ID = 'user_id';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';

    protected $table = self::TABLE;
    protected $primaryKey = self::ID;

    protected $fillable = [
        self::NAME,
        self::STATUS,
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

    public function status(): int
    {
        return $this->{self::STATUS};
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

    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
