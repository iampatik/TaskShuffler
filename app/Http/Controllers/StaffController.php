<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Student;
use App\Model\User;
use Illuminate\Support\Str;
use App\Model\WeeklyTask;

class StaffController extends Controller
{
    
    public function manualShuffle(Request $request)
    {
        $random = Str::random(40);
        foreach($request as $task)
        {
            DB::beginTransaction();
            try
            {
                $weeklyTask = new WeeklyTask([
                    'id' => $random,
                    'TaskID' => $task->taskID,
                    'StudentID' => $task->studentID,
                    'Coordinator' => $task->coordinator,
                    'MakerID' => session('id'),
                    'Center' => $task->center
                ]);
                
                $weeklyTask->save();
                DB::commit();
            } catch(Exception $e)
            {
                DB::rollback();
            }
        }

    }


    public function autoGenerate(Request $request)
    {
        $student = new Student();
        $male = $student->getBatchByMale($request->batch);
        $female = $student->getBatchByFemale($request->batch);

    }

    public function getAllUsers(){
        return User::all();
    }

}
