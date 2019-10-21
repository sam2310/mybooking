<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'purpose','start_date','end_date','status'
    ];

    protected $dates =[
        'start_date','end_date'
    ];
    //relationship (one to many)
    //booking belogs to room

    public function room()
    {
        return $this->belongsto(Room::class);//return string
    }

    public function user()
    {
        return $this->belongsTo('App\User','reserved_by');
    }

}
