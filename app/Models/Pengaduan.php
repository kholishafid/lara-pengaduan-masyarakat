<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengaduan extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'pengaduans';
    protected $primaryKey = 'id_pengaduan';
    public $incrementing = false;
    protected $guarded = ['id_pengaduan'];
    protected $keyType = 'uuid';

    public function masyarakat(): BelongsTo
    {
        return $this->belongsTo(Masyarakat::class);
    }

    public function tanggapan(): HasOne
    {
        return $this->hasOne(Tanggapan::class, 'id_pengaduan', 'id_pengaduan');
    }
}
