<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Auth;

class Masyarakat extends Auth
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'masyarakats';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $guarded = ['id'];
    protected $guard = 'masyarakats';
    protected $keyType = 'uuid';

    public function pengaduan(): HasMany
    {
        return $this->hasMany(Pengaduan::class, 'nik', 'nik');
    }
}
