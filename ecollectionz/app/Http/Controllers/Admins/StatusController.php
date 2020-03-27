<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use  Auth;
use Mail;
use Hash;
use setasign\Fpdi\Tcpdf\Fpdi;
use Illuminate\Support\Facades\Session;
use DateTime;
use PDF;
use File;
use Response;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $status = DB::table('status')->get();
        return view('adm.status')->with('status', $status);
    }

    public function edit($id){
        $status = DB::table('status')->where('id', $id)->get();
        return view('adm.edit_status')->with('status', $status);
    }

    public function store(Request $request){
        $this->validate($request,[
            'code' =>'unique:status',
            'name' =>'required|unique:status'
        ]);
        DB::table('status')->insert([
            'code' => $request->input('code'),
            'name' => $request->input('name')
        ]);
        return back()->with('success', "Status ".$request->input('name')." has been created successfully");
    }

    public function update(Request $request, $id){
      //  return $id;
        $this->validate($request,[
            'name' =>'required'
        ]);
        DB::table('status')
            ->where('id', $id)
            ->update([
                'code' => $request->input('code'),
                'name' => $request->input('name')
            ]);
        $status = DB::table('status')->get();
        return redirect('/admin/status')->with('status', $status)->with('success', 'Status has been updated');
    }
}
