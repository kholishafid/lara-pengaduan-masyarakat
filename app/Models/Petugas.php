<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Auth;

class Petugas extends Auth
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    public $incrementing = false;
    protected $guarded = ['id_petugas'];
    protected $guard = 'petugas';
}
