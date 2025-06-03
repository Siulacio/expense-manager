<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TemplateItem extends Model
{
    public const TABLE = 'template_items';
    public const ID = 'id';
    public const NAME = 'name';
    public const AMOUNT = 'amount';
    public const TEMPLATE_ID = 'template_id';
    public const COST_CENTER_ID = 'cost_center_id';
    public const PAYMENT_METHOD_ID = 'payment_method_id';

    protected $table = self::TABLE;
    protected $primaryKey = self::ID;

    protected $fillable = [
        self::NAME,
        self::AMOUNT,
        self::TEMPLATE_ID,
        self::COST_CENTER_ID,
        self::PAYMENT_METHOD_ID,
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

    public function templateId()
    {
        return $this->{self::TEMPLATE_ID};
    }

    public function costCenterId(): int
    {
        return $this->{self::COST_CENTER_ID};
    }

    public function paymentMethodId(): int
    {
        return $this->{self::PAYMENT_METHOD_ID};
    }

    public function costCenter(): BelongsTo
    {
        return $this->belongsTo(CostCenter::class);
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class);
    }
}
