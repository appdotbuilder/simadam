<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Letter
 *
 * @property int $id
 * @property string $nomor_surat
 * @property string $jenis
 * @property string $perihal
 * @property string|null $pengirim
 * @property string|null $penerima
 * @property \Illuminate\Support\Carbon $tanggal_surat
 * @property \Illuminate\Support\Carbon|null $tanggal_diterima
 * @property string|null $keterangan
 * @property string|null $file_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Letter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Letter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Letter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereNomorSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter wherePerihal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter wherePengirim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter wherePenerima($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereTanggalSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereTanggalDiterima($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereUpdatedAt($value)

 * 
 * @mixin \Eloquent
 */
class Letter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nomor_surat',
        'jenis',
        'perihal',
        'pengirim',
        'penerima',
        'tanggal_surat',
        'tanggal_diterima',
        'keterangan',
        'file_path',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_surat' => 'date',
        'tanggal_diterima' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}