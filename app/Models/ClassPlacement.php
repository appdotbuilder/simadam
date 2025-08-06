<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ClassPlacement
 *
 * @property int $id
 * @property int $student_id
 * @property string|null $kelas_lama
 * @property string $kelas_baru
 * @property string $tahun_ajaran
 * @property \Illuminate\Support\Carbon $tanggal_penempatan
 * @property string|null $alasan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Student $student
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|ClassPlacement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassPlacement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassPlacement query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassPlacement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassPlacement whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassPlacement whereKelasLama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassPlacement whereKelasBaru($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassPlacement whereTahunAjaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassPlacement whereTanggalPenempatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassPlacement whereAlasan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassPlacement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassPlacement whereUpdatedAt($value)

 * 
 * @mixin \Eloquent
 */
class ClassPlacement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'student_id',
        'kelas_lama',
        'kelas_baru',
        'tahun_ajaran',
        'tanggal_penempatan',
        'alasan',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_penempatan' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the student that owns the class placement.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}