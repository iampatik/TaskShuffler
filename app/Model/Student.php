<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Model\User;

class Student extends Model
{
    protected $table="students";
    protected $fillable=[
        "UserID",
        "Batch",
    ];

    public function weeklyTasks(){ //list down all task
        return $this->hasMany('WeeklyTask');
    }

    public function user()
    {
        return $this->belongsTo('User', 'UserID');
    }

    public function getBatch($batch)
    {
        $array = array();

        $class = DB::table('students')
        ->select('UserID as id')
        ->where('Batch', $batch)->get();

        foreach($class as $batch)
        {
            $temp = User::select('id', 'FirstName', 'MiddleName', 'LastName', 'Gender')
            ->where('id', $batch->id)->first();
            array_push($array, $temp);
        }

        return $array;

    }

    public function getBatchByMale($batch)
    {
        return DB::table('users')->where(['Batch', $request],['Gender', 'Male'])->get();
    }

    public function getBatchByFemale($batch)
    {
        return DB::table('users')->where(['Batch', $request],['Gender', 'Female'])->get();
    }

}
