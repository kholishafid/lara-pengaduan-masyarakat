<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Tanggapan extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'tanggapan';
    protected $primaryKey = 'id_tanggapan';
    public $incrementing = false;
    protected $guarded = [];
}
