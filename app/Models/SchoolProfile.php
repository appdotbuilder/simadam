<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SchoolProfile
 *
 * @property int $id
 * @property string $nama_madrasah
 * @property string $npsn
 * @property string $alamat
 * @property string|null $no_telepon
 * @property string|null $email
 * @property string|null $website
 * @property string $kepala_madrasah
 * @property string|null $logo_path
 * @property string|null $visi
 * @property string|null $misi
 * @property string|null $sejarah
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolProfile whereNamaMadrasah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolProfile whereNpsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolProfile whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolProfile whereNoTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolProfile whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolProfile whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolProfile whereKepalaMadrasah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolProfile whereLogoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolProfile whereVisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolProfile whereMisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolProfile whereSejarah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolProfile whereUpdatedAt($value)

 * 
 * @mixin \Eloquent
 */
class SchoolProfile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama_madrasah',
        'npsn',
        'alamat',
        'no_telepon',
        'email',
        'website',
        'kepala_madrasah',
        'logo_path',
        'visi',
        'misi',
        'sejarah',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}