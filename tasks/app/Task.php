<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'task_id';
    protected $fillable =['title','user_id', 'descr', 'status'];
    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');

    }


}
