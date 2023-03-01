<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tanggapan extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'tanggapans';
    protected $primaryKey = 'id_tanggapan';
    public $incrementing = false;
    protected $guarded = ['id_tanggapan'];

    public function petugas(): BelongsTo
    {
        return $this->belongsTo(Petugas::class, 'id_petugas', 'id_petugas');
    }
}
