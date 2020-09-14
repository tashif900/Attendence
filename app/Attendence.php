<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendence extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['user_id', 'check_in', 'check_out','working_hours'];
	
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}