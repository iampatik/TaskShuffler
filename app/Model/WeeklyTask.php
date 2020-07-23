<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WeeklyTask extends Model
{
    protected $table='weeklyTask';
    protected $fillable=[
        'TaskID',
        'StudentID',
        'Coordinator',
        'MakerID',
        'Date',
    ];

    public function tasks()
    {
        return $this->belongsTo('Tasks', 'TaskID');
    }

    public function student()
    {
        return $this->belongsTo('Student', 'StudentID');
    }

    public function staff()
    {
        return $this->belongsTo('Staff', 'MakerID');
    }

    
}
