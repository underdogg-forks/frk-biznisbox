<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class InvoiceItem extends Model implements Auditable
{
    use HasFactory;
    use HasUuids;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'invoice_items';

    protected $fillable = [
        'invoice_id',
        'product_id',
        'name',
        'description',
        'quantity',
        'unit',
        'price',
        'discount_type',
        'discount',
        'tax',
        'tax_type',
        'total',
    ];

    protected $dates = ['updated_at', 'created_at'];

    protected $hidden = ['updated_at', 'created_at'];

    public function generateTags(): array
    {
        return ['InvoiceItem'];
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    protected function casts(): array
    {
        return [
            'quantity' => 'integer',
            'price'    => 'double',
            'discount' => 'double',
            'tax'      => 'double',
            'total'    => 'double',
        ];
    }
}
