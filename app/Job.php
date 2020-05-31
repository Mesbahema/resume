<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Job
 * @package App
 *
 * @property string title
 *
 *
 */
class Job extends Model
{
    protected $fillable = [
        'title'
    ];
}
