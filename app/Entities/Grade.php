<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Grade
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $subject_id
 * @property int $student_id
 * @property int $grade
 * @property string $date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Grade whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Grade whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Grade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Grade whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Grade whereSubjectId($value)
 */
class Grade extends Model
{
    public $timestamps = false;
}
