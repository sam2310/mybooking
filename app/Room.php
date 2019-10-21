<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //optional
    //define table name
    protected $table ='rooms';

    //mass assingable
    protected $fillable=[
        'name','description','capacity','status'
    ];

    public function getStatusHtmlAttribute()
    {
        if($this->status == 1){
            //active
            return  '<div class="badge badge-primary">Active</div>';
        }else{
            //inactive
            return '<div class="badge badge-warning">Inactive</div>';
        }
    }

    //relationship
    //room has many bookings
    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }

}

