<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Auth;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masyarakat extends Auth
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'masyarakat';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $guarded = ['id'];
}
