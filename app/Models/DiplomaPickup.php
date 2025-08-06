<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DiplomaPickup
 *
 * @property int $id
 * @property string $nama_siswa
 * @property string $nis
 * @property string $tahun_lulus
 * @property string $nama_pengambil
 * @property string $hubungan
 * @property string $no_telepon_pengambil
 * @property \Illuminate\Support\Carbon $tanggal_pengambilan
 * @property string|null $keterangan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|DiplomaPickup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiplomaPickup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiplomaPickup query()
 * @method static \Illuminate\Database\Eloquent\Builder|DiplomaPickup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiplomaPickup whereNamaSiswa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiplomaPickup whereNis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiplomaPickup whereTahunLulus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiplomaPickup whereNamaPengambil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiplomaPickup whereHubungan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiplomaPickup whereNoTeleponPengambil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiplomaPickup whereTanggalPengambilan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiplomaPickup whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiplomaPickup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiplomaPickup whereUpdatedAt($value)

 * 
 * @mixin \Eloquent
 */
class DiplomaPickup extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama_siswa',
        'nis',
        'tahun_lulus',
        'nama_pengambil',
        'hubungan',
        'no_telepon_pengambil',
        'tanggal_pengambilan',
        'keterangan',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_pengambilan' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}