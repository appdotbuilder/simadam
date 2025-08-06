<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Teacher
 *
 * @property int $id
 * @property string $nip
 * @property string $nama
 * @property string $jenis_kelamin
 * @property \Illuminate\Support\Carbon $tanggal_lahir
 * @property string $tempat_lahir
 * @property string $alamat
 * @property string|null $no_telepon
 * @property string $bidang_studi
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ClassTeacher[] $classTeachers
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereNoTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereBidangStudi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher active()

 * 
 * @mixin \Eloquent
 */
class Teacher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nip',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'no_telepon',
        'bidang_studi',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the class teachers for the teacher.
     */
    public function classTeachers(): HasMany
    {
        return $this->hasMany(ClassTeacher::class);
    }

    /**
     * Scope a query to only include active teachers.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'aktif');
    }
}