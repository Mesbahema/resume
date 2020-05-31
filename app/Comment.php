<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 *
 * @property int id
 * @property int user_id
 * @property int comment_id
 *
 * @property string body
 *
 * @property User user
 *
 * @property Resume resume
 *
 * @package App
 */
class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class, 'resume_id');
    }
}
