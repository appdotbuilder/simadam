<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ClassTeacher
 *
 * @property int $id
 * @property int $teacher_id
 * @property string $kelas
 * @property string $tahun_ajaran
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Teacher $teacher
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|ClassTeacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassTeacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassTeacher query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassTeacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassTeacher whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassTeacher whereKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassTeacher whereTahunAjaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassTeacher whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassTeacher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassTeacher whereUpdatedAt($value)

 * 
 * @mixin \Eloquent
 */
class ClassTeacher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'teacher_id',
        'kelas',
        'tahun_ajaran',
        'status',
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

    /**
     * Get the teacher that owns the class assignment.
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
}