<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use  Auth;
use Mail;
use Hash;

class AGNotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:agents');
    }

    public function getNotifications(){
        $dt = Carbon::now();
        $id=auth()->user()->id;
        DB::enableQueryLog();
        $unread = DB::table('notifications_ag')->where('isread', '=', '0')
            ->where('to_', $id)
            ->where(DB::raw('DATE(scheduled)'), '=', $dt->toDateString())
            ->orWhere(DB::raw('DATE(scheduled)'), '<', $dt->toDateString())
            ->groupBy('id')->orderBy('scheduled', 'DESC')->get()->toArray();
        //dd(DB::getQueryLog());
        echo json_encode($unread);

    }

    public function marAsRead($id){
        DB::enableQueryLog();
        DB::table('notifications_ag')->where('id', $id)->update(['isread' => 1]);
        $not_url = DB::table('notifications_ag')->where('id', '=', $id)->get();
        //dd(DB::getQueryLog());
        echo $not_url[0]->href;
    }

    public function getCount(){

    }
}
