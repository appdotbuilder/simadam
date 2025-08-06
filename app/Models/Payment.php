<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Payment
 *
 * @property int $id
 * @property int $student_id
 * @property string $bulan
 * @property float $jumlah
 * @property \Illuminate\Support\Carbon $tanggal_bayar
 * @property string $status
 * @property string|null $keterangan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Student $student
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereBulan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereTanggalBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)

 * 
 * @mixin \Eloquent
 */
class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'student_id',
        'bulan',
        'jumlah',
        'tanggal_bayar',
        'status',
        'keterangan',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'jumlah' => 'decimal:2',
        'tanggal_bayar' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the student that owns the payment.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}