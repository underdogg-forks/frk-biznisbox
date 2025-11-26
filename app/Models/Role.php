<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole implements Auditable
{
    use HasFactory;
    use HasUuids;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['id', 'name', 'guard_name', 'system', 'display_name', 'description'];

    protected $hidden = ['pivot'];

    protected $casts = [
        'system' => 'boolean',
    ];
}
