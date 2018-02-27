<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    public function singleStudent($id){
        $student = Student::findOrFail($id);
        
        $notification = Notification::where([
                            ['student_id','=',$student->id],
                            ['is_seen_by_student','=',0]
                        ])->first();
        $notification->status = 1;
        $notification->update();

        return view('dashboard-single-student',compact('student','notification'));
    }

    public function apiLogin(Request $request){
        $student = DB::table('students')->where('username', $request->misid)->first();
        if(!empty($student)){
            if(Hash::check($request->password,$student->password)){
                return response()->json(array(
                    'status_code ' => 1,
                    'request' => $request,
                    'student' => $student
                ));
            }
            return response()->json(array(
                'status_code ' => 0,
                'request' => $request,
                'responce' => 'incorrect password'
            ));
        }
        return response()->json(array(
            'status_code ' => 0,
            'request' => $request,
            'responce' => 'No user with this id'
        ));
    }

    public function apiDegreeRequest(Request $request){

        $ifitexists = Notification::where('student_id','=',$request->student_id)->first();
        if(!empty($ifitexists)){
            $ifitexists->subject = 'degree_verification_request';
            $ifitexists->is_seen_by_admin = '0';
            $ifitexists->is_seen_by_student = '0';
            $ifitexists->status = '0';
            $ifitexists->student_id = $request->student_id;
            $ifitexists->notes = '';
            $ifitexists->update();
            
        } else {

            $degree_request = new Notification;
            $degree_request->subject = 'degree_verification_request';
            $degree_request->is_seen_by_admin = '0';
            $degree_request->is_seen_by_student = '0';
            $degree_request->status = '0';
            $degree_request->student_id = $request->student_id;
            $degree_request->notes = '';
            $degree_request->save();

        }
       

        return response()->json(array(
            'status_code ' => 1,
            'request' => $request,
            'message' => 'your request is successfully recieved and will be process shortly'
        ));
    
    }
}
