<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Template extends Model
{
    public const TABLE = 'templates';
    public const ID = 'id';
    public const NAME = 'name';
    public const USER_ID = 'user_id';

    protected $table = self::TABLE;
    protected $primaryKey = self::ID;

    protected $fillable = [
        self::NAME,
        self::USER_ID,
    ];

    public function id(): int
    {
        return $this->{self::ID};
    }

    public function userId(): int
    {
        return $this->{self::USER_ID};
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(TemplateItem::class);
    }
}
