<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Group
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Group whereName($value)
 */
class Group extends Model
{
    public $timestamps = false;
}
