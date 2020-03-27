<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //

    public function get(){
        $notification = Auth('admin')->user()->unreadNotifications;
        //print_r($notification);
       // $notifications = Auth::user()
        return $notification;
    }

    public function read(Request $request){
        Auth('admin')->user()->unreadNotifications()->find($request->id)->markAsRead();
        return "success";
    }
}
