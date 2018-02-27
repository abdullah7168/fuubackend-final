<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notification;
use App\Student;


class AdminController extends Controller
{
    public function index(){
        $notifications = DB::table('notifications')
            ->join('students', 'notifications.student_id', '=', 'students.id')
            ->select('notifications.*','students.name')
            ->get();
        return view('dashboard-home',compact('notifications'));
    }
}
