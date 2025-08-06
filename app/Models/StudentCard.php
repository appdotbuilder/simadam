<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\StudentCard
 *
 * @property int $id
 * @property int $student_id
 * @property string $nomor_kartu
 * @property \Illuminate\Support\Carbon $tanggal_cetak
 * @property \Illuminate\Support\Carbon $berlaku_sampai
 * @property string|null $foto_path
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Student $student
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|StudentCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentCard query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentCard whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentCard whereNomorKartu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentCard whereTanggalCetak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentCard whereBerlakuSampai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentCard whereFotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentCard whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentCard whereUpdatedAt($value)

 * 
 * @mixin \Eloquent
 */
class StudentCard extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'student_id',
        'nomor_kartu',
        'tanggal_cetak',
        'berlaku_sampai',
        'foto_path',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_cetak' => 'date',
        'berlaku_sampai' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the student that owns the card.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}