<?php

namespace App\Entities;

use Faker\Provider\DateTime;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 *
 * @package App\Entities
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property \DateTime $birthdate
 * @property int $group_id
 * @property string $registration_ip
 * @property \DateTime $registration_time
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $advisor_review
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Student whereAdvisorReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Student whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Student whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Student whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Student whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Student whereRegistrationIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Student whereRegistrationTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Student whereSurname($value)
 */
class Student extends Model
{
    public $timestamps = false;
    public static function create(string $name, string $surname, int $group_id, string $email, \DateTime $birthdate, string $registration_ip, \DateTime $registration_time): self
    {
        $student = new Student();
        $student->name = $name;
        $student->surname = $surname;
        $student->group_id = $group_id;
        $student->email = $email;
        $student->birthdate = $birthdate;
        $student->registration_ip = $registration_ip;
        $student->registration_time = $registration_time;
        return $student;
    }
}
