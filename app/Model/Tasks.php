<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table='tasks';
    protected $fillable=[
        'TaskName',
        'Center',
        'Difficulty',
        'NoOfStudents'
    ];

    public function weeklyTask()
    {
        return $this->hasMany('WeeklyTask');
    }



}
