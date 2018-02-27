<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Illuminate\Support\Facades\DB;


class NotificationController extends Controller
{
    public function processRequest(Request $request){
        
        $notification = Notification::findOrFail($request->notification_id);
        $notification->notes = $request->notes;
        $notification->is_seen_by_admin = 1;
        $notification->update();

        return redirect('/');
    }

    public function watchRequest(){

        $notifications = DB::table('notifications')
                            ->join('students', 'notifications.student_id', '=', 'students.id')
                            ->select('notifications.*','students.name')
                            ->where('notifications.status','=','0')
                            ->limit(10)
                            ->get();
        $count = count($notifications);

        return response()->json(array('notifications' => $notifications,'count' => $count));

    }

    public function watchReply(Request $request){
        $notifications = DB::table('notifications')
                ->join('students', 'notifications.student_id', '=', 'students.id')
                ->select('notifications.*','students.name')
                ->where([
                        ['notifications.status','=','1'],
                        ['notifications.is_seen_by_admin','=','1'],
                        ['notifications.is_seen_by_student','=','0'],
                        ['notifications.student_id','=',$request->student_id],
                    ])
                ->get();
        $count = count($notifications);

    return response()->json(array('notifications' => $notifications,'count' => $count));
    }


    public function pluckSingleNotification(Request $request){
        $notification = Notification::findOrFail($request->id);

        return response()->json(array('notification'=> $notification));
    }

    public function seenByStudent(Request $request){
        $notification = Notification::findOrFail($request->id);
        $notification->is_seen_by_student = 1;
        $notification->update();

        return response()->json(array('messsage' => 'notification is seen'));
    }
}
