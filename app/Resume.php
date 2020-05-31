<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Resume
 * @package App
 *
 * @property int id
 * @property int job_id
 * @property int uploader_id
 *
 * @property string path
 * @property string status
 *
 * @property Job job
 * @property User user
 *
 */
class Resume extends Model
{
    //------------------------------------defining enums---------------------------------//
    const SENDING = "sending";
    const PROCESSING = "processing";
    const ACCEPTED = "accepted";
    const REJECTED = "rejected";
    const STATUS = [
        self::SENDING,
        self::PROCESSING,
        self::ACCEPTED,
        self::REJECTED,
    ];
    //------------------------------------Relations---------------------------------//
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploader_id');
    }
}
