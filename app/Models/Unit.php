<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Unit extends Model implements Auditable
{
    use HasFactory;
    use HasUuids;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['name', 'symbol', 'active', 'description'];

    protected $hidden = ['created_at', 'updated_at', 'active'];

    public function generateTags(): array
    {
        return ['Unit'];
    }

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
        ];
    }
}
