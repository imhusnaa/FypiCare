<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $guarded = [];
    public function counsellor(){
		return $this->belongsTo(User::class,'user_id','id'); //id from user table and user_id from appt table
	}
}
