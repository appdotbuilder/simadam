<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\TransferLetter
 *
 * @property int $id
 * @property int $student_id
 * @property string $nomor_surat
 * @property string $sekolah_tujuan
 * @property string $alamat_sekolah_tujuan
 * @property \Illuminate\Support\Carbon $tanggal_mutasi
 * @property string $alasan_mutasi
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Student $student
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|TransferLetter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransferLetter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransferLetter query()
 * @method static \Illuminate\Database\Eloquent\Builder|TransferLetter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferLetter whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferLetter whereNomorSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferLetter whereSekolahTujuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferLetter whereAlamatSekolahTujuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferLetter whereTanggalMutasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferLetter whereAlasanMutasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferLetter whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferLetter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferLetter whereUpdatedAt($value)

 * 
 * @mixin \Eloquent
 */
class TransferLetter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'student_id',
        'nomor_surat',
        'sekolah_tujuan',
        'alamat_sekolah_tujuan',
        'tanggal_mutasi',
        'alasan_mutasi',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_mutasi' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the student that owns the transfer letter.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}