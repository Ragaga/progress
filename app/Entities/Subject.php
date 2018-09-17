<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Subject
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Subject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Subject whereName($value)
 */
class Subject extends Model
{
    public $timestamps = false;
}
