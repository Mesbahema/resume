<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
