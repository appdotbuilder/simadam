<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Student
 *
 * @property int $id
 * @property string $nis
 * @property string $nama
 * @property string $jenis_kelamin
 * @property \Illuminate\Support\Carbon $tanggal_lahir
 * @property string $tempat_lahir
 * @property string $alamat
 * @property string $nama_orang_tua
 * @property string|null $no_telepon_orang_tua
 * @property string $kelas
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ClassPlacement[] $classPlacements
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TransferLetter[] $transferLetters
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StudentCard[] $studentCards
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student query()
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereNis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereNamaOrangTua($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereNoTeleponOrangTua($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student active()

 * 
 * @mixin \Eloquent
 */
class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nis',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'nama_orang_tua',
        'no_telepon_orang_tua',
        'kelas',
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
     * Get the payments for the student.
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Get the class placements for the student.
     */
    public function classPlacements(): HasMany
    {
        return $this->hasMany(ClassPlacement::class);
    }

    /**
     * Get the transfer letters for the student.
     */
    public function transferLetters(): HasMany
    {
        return $this->hasMany(TransferLetter::class);
    }

    /**
     * Get the student cards for the student.
     */
    public function studentCards(): HasMany
    {
        return $this->hasMany(StudentCard::class);
    }

    /**
     * Scope a query to only include active students.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'aktif');
    }
}