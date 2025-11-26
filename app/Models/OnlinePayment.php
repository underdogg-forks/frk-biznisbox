<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class OnlinePayment extends Model implements Auditable
{
    use HasFactory;
    use HasUuids;
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $fillable = [
        'number',
        'payment_method',
        'payment_id',
        'type',
        'amount',
        'currency',
        'description',
        'status',
        'payment_response',
        'payment_ref',
        'payment_document_type',
        'payment_document_id',
        'key',
        'notes',
    ];

    /**
     * Get payment number.
     *
     * @return string payment number
     */
    public static function getPaymentNumber()
    {
        $number = generateNextNumber(settings('payment_number_format'), 'payment');

        return $number;
    }

    public function payment_document()
    {
        return $this->morphTo();
    }

    protected function casts(): array
    {
        return [
            'payment_response' => 'array',
            'amount'           => 'double',
        ];
    }
}
