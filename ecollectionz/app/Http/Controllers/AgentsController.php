<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\policies;
use  Auth;
use Mail;
use Hash;
use DateTime;
use DatePeriod;
use DateInterval;

class AgentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:agents');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::enableQueryLog();
        // dd(Auth::user());
        $id = Auth::user()->agent_id;
        $brokers = DB::table('agents')->select('BKS_ID')->where('agent_id', $id)->get();
       // return $brokers[0]->BKS_ID;
        $array = explode(',', $brokers[0]->BKS_ID);
        $in = '(' . implode(',', $array) .')';
        //print_r($array);

        //return Auth::user()->id;
        $paid_policies = DB::select(' SELECT count(B.id) as P_COUNT FROM ( select client_name, phone, draft_no, 
        status, max(created_at) as created_at from policies group by client_name, phone, draft_no ) A 
        INNER JOIN policies B USING (client_name, phone, draft_no,created_at)
        where  B.broker_id IN '.$in.' and B.status = "P"');

        //dd(DB::getQueryLog());


        $unpaid_policies = DB::select(' SELECT count(B.id) as P_COUNT FROM ( select client_name, phone, draft_no, 
        status, max(created_at) as created_at from policies group by client_name, phone, draft_no ) A 
        INNER JOIN policies B USING (client_name, phone, draft_no,created_at)
        where  B.broker_id IN '.$in.' and B.status <> "P"');
       // dd(DB::getQueryLog());
        //
        $summary =  DB::select('SELECT count(B.id)as COUNT, B.status, status.name as STAT  FROM ( select client_name, phone, draft_no, 
        status, max(created_at) as created_at from policies group by client_name, phone, draft_no ) A 
        INNER JOIN policies B USING (client_name, phone, draft_no,created_at)
        INNER JOIN status ON B.status=status.code
        where B.broker_id IN '.$in.'  GROUP BY B.status');
        return view('agents.dashboard')->with('paid_policies', $paid_policies)
            ->with('unpaid_policies', $unpaid_policies)
            ->with('summary', $summary);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getClients(){
        DB::enableQueryLog();
        $id = Auth::user()->agent_id;
        $brokers = DB::table('agents')->select('BKS_ID')->where('agent_id', $id)->get();
        $array = explode(',', $brokers[0]->BKS_ID);
        $in = '(' . implode(',', $array) .')';
      //  dd(DB::getQueryLog());
        $gpa = DB::select('select `brokers`.*, `corporates`.* from `brokers` inner join `corporates` on `brokers`.`CP_ID_FK` = `corporates`.`id` where `bk_id` IN '.$in);
        $clients = DB::select('select DISTINCT(policies.client_name) as CNAME, ROUND(SUM(value)/COUNT(value),1) as GPAA, 
                  `users`.`email` as `EMAILS`, `policies`.`phone` as `PPHONE`, `client_name`, `client_no`, `client_id`, 
                  `policies`.`address` as `ADDR`, `policy` from `policies` left join `users` on 
                  `policies`.`phone` = `users`.`phone` left join `gpa` on `policies`.`phone` = `gpa`.`US_PHONE` 
                  where `broker_id` IN '.$in.' group by `policies`.client_name, users.email, policies.phone, policies.client_name, policies.client_no, policies.client_id, policies.address, policies.policy');

        return view ('agents.clients')->with('clients', $clients)->with('gpa', $gpa);
    }

    public function getPoliciesByClient($phone){
        DB::enableQueryLog();
        $id = Auth::user()->agent_id;
        $brokers = DB::table('agents')->select('BKS_ID')->where('agent_id', $id)->get();
        $array = explode(',', $brokers[0]->BKS_ID);
        $in = '(' . implode(',', $array) .')';
        $policies = DB::select('
        SELECT corporates.name as CP_NAME,
        B.client_no, B.id, B.client_name, B.phone,
        B.draft_no, B.due_date, status.name as STAT, B.currency, B.amount, B.remarks as RK, B.created_at
        FROM ( select client_name, phone, draft_no, status, max(created_at) as created_at
        from policies group by client_name, phone, draft_no ) A
        INNER JOIN policies B USING (client_name, phone, draft_no,created_at)
        INNER JOIN corporates ON B.cust_id =corporates.id
        INNER JOIN status ON B.status=status.code
        where B.broker_id IN '.$in.' and B.phone='.$phone);
        //dd(DB::getQueryLog());
        return view('agents.policies')->with('policies', $policies);

    }

    public function getAllPolicies(){
        DB::enableQueryLog();
        $id = Auth::user()->agent_id;
        $brokers = DB::table('agents')->select('BKS_ID')->where('agent_id', $id)->get();
        $array = explode(',', $brokers[0]->BKS_ID);
        $in = '(' . implode(',', $array) .')';
        //  $search=DB::table('policies')->where('cust_id', '1234567890');
        $policies = DB::select('
        SELECT corporates.name as CP_NAME, status.name as STAT, B.* FROM ( select client_name, phone, draft_no, status, max(created_at) as created_at
        from policies group by client_name, phone, draft_no ) A
        INNER JOIN policies B USING (client_name, phone, draft_no,created_at)
        INNER JOIN corporates ON B.cust_id =corporates.id
       INNER JOIN status ON B.status =status.code

        where B.broker_id IN '.$in);
        // dd(DB::getQueryLog());
        return view('agents.allpolicies');
    }

    public function getDatatable(){
        $id = Auth::user()->agent_id;
        $brokers = DB::table('agents')->select('BKS_ID')->where('agent_id', $id)->get();
        $array = explode(',', $brokers[0]->BKS_ID);
        $in = '(' . implode(',', $array) .')';
        $policies = DB::select('
        SELECT corporates.name as CP_NAME,
        B.client_no, B.client_name, B.phone,
        B.draft_no, B.due_date, status.name as STAT, B.currency, B.amount, B.remarks as RK, B.created_at
        FROM ( select client_name, phone, draft_no, status, max(created_at) as created_at
        from policies group by client_name, phone, draft_no ) A
        INNER JOIN policies B USING (client_name, phone, draft_no,created_at)
        INNER JOIN corporates ON B.cust_id =corporates.id
        INNER JOIN status ON B.status=status.code
        and B.broker_id IN '.$in);

        return $policies;
    }

    public function getHistory($id){
        $str = explode('_', $id);
        $phone=$str[0];
        $draft=$str[1];
        $draft=str_replace('-', '/', $draft);
        $draft=str_replace('!', '\\', $draft);
        $name=$str[2];
        $history = DB::table('policies')
            ->join('status', 'policies.status', 'status.code')
            ->where('client_name', $name)
            ->where('policies.phone', $phone)
            ->where('draft_no', $draft)
            ->select('policies.*', 'status.name as STAT')
            ->orderBy('policies.created_at', 'asc')
            ->get();
        return view('agents.history')->with('history', $history);
    }



    public function searchPolicies (){
        $id = Auth::user()->bk_id;
        $search=DB::table('policies')->where('cust_id', '11111111')->get();
        return view('agents.searchpolicies')->with('search', $search);
    }

    public function getSearchPolicies (Request $request){
        DB::enableQueryLog();
        $id = Auth::user()->agent_id;
        $brokers = DB::table('agents')->select('BKS_ID')->where('agent_id', $id)->get();
        $array = explode(',', $brokers[0]->BKS_ID);
        $in = '(' . implode(',', $array) .')';
        $type= $request->input('dateype');
        $d = $request->input('dates');
        $status = $request->input('status');
        $where=' where ';
        $where.= ' B.broker_id  IN'.$in.' AND ';
        if($d !=0){
            $dates =explode(' - ', $d);
            $s = strtotime($dates[0]);
            $e = strtotime($dates[1]);
            $sdate =date('Y-m-d',$s);
            $edate =date('Y-m-d',$e);
            $where.=" (B.".$type." BETWEEN '".$sdate."' AND '".$edate."') AND ";
        }
        if($status !='null'){
            if ($status=='UN'){

                $where.=" B.status ='' AND ";
            }
            else {
                $where.=" B.status ='".$status."' AND ";
            }
            // $where.=" and  ( status='$status' )";

        }
        $where = substr($where, 0, -4);
        $search = DB::select('
        SELECT corporates.name as CP_NAME,
        B.client_no, B.client_name, B.phone,
        B.draft_no, B.due_date, status.name as STAT, B.currency, B.amount, B.remarks as RK, B.created_at
        FROM ( select client_name, phone, draft_no, status, max(created_at) as created_at
        from policies group by client_name, phone, draft_no ) A
        INNER JOIN policies B USING (client_name, phone, draft_no,created_at)
        INNER JOIN corporates ON B.cust_id =corporates.id
        INNER JOIN status ON B.status=status.code 
         '.$where);
        // dd(DB::getQueryLog());
        return view('agents.searchpolicies')->with('search', $search)->with('request', $request);
    }

    public function getComments($p_id){

        //$id = Auth::user()->id;
        DB::enableQueryLog();
        $str = explode('_', $p_id);

        $bk_id=$str[0];
        $brokers = DB::table('agents')->select('BKS_ID')->where('agent_id', $bk_id)->get();
        $array = explode(',', $brokers[0]->BKS_ID);
        $in = '(' . implode(',', $array) .')';
        $draft=$str[1];
        $draft=str_replace('-', '/', $draft);
        $draft=str_replace('!', '\\', $draft);
        $phone=$str[2];
        $corp = DB::table('brokers')->where('bk_id', $array[0])->get();
        $policies = DB::select('select `policies`.*, `status`.`name` as `STAT` from `policies` inner join `status` 
                    on `policies`.`status` = `status`.`code` where `broker_id` IN '.$in.' and `draft_no` = '.$draft.' and `phone` = '.$phone);

        $comments= DB::select('select `comments`.*, `corporates`.*, `comments`.`id` as `CID` from `comments` inner join 
                              `corporates` on `comments`.`corporate_id` = `corporates`.`id` inner join `brokers` 
                              on `corporates`.`id` = `brokers`.`CP_ID_FK` 
                               where `bk_id` IN '.$in.' and `draft_no` = '.$draft.' and comments.phone = '.$phone);

        $replies = DB::select('select * from `comments` left join `replies` on `comments`.`id` = `replies`.`comment_id` 
                                 where `corporate_id` = '.$corp[0]->CP_ID_FK.' and `draft_no` = '.$draft.' and `comments`.`phone` = '.$phone);



        return view('agents.comments')->with('comments', $comments)->with('replies', $replies)->with('policies', $policies);
    }

    public function getPoliciesByStatus($status)
    {
        DB::enableQueryLog();
        $id = Auth::user()->agent_id;
        $brokers = DB::table('agents')->select('BKS_ID')->where('agent_id', $id)->get();
        $array = explode(',', $brokers[0]->BKS_ID);
        $in = '(' . implode(',', $array) .')';
        // $cp = DB::table('corporates')->where('id', $id)->get();
        // $brokers = DB::table('brokers')->where('CP_ID_FK', $id)->get();
        if($status=='UN'){
            $policies = DB::select('
                SELECT corporates.name as CP_NAME,
                B.client_no, B.client_name, B.phone,
                B.draft_no, B.due_date, status.name as STAT, B.currency, B.amount, B.remarks as RK, B.created_at
                FROM ( select client_name, phone, draft_no, status, max(created_at) as created_at
                from policies group by client_name, phone, draft_no ) A
                INNER JOIN policies B USING (client_name, phone, draft_no,created_at)
                INNER JOIN corporates ON B.cust_id =corporates.id
                INNER JOIN status ON B.status=status.code 
                where B.broker_id IN '.$in.' and B.status=""');
        }
        else {
            $policies = DB::select('
                SELECT corporates.name as CP_NAME,
                B.client_no, B.client_name, B.phone,
                B.draft_no, B.due_date, status.name as STAT, B.currency, B.amount, B.remarks as RK, B.created_at
                FROM ( select client_name, phone, draft_no, status, max(created_at) as created_at
                from policies group by client_name, phone, draft_no ) A
                INNER JOIN policies B USING (client_name, phone, draft_no,created_at)
                INNER JOIN corporates ON B.cust_id =corporates.id
                INNER JOIN status ON B.status=status.code 
                where B.broker_id IN '.$in.' and B.status="'.$status.'"');
        }

        //dd(DB::getQueryLog());
        //$corp = DB::table('corporates')->get();
        return view('agents.getstatus')->with('policies',$policies)->with('status', $status);
    }

    public function addComment(Request $request, $id){
        $str = explode('_', $id);
        $corp=$str[0];
        $draft=$str[1];
        $draft=str_replace('-', '/', $draft);
        $draft=str_replace('!', '\\', $draft);
        $phone=$str[2];
        $comment_id = DB::table('comments')->insertGetId([
            'writer' => Auth()->user()->name,
            'phone' => $phone,
            'corporate_id' =>$corp,
            'draft_no' =>$draft,
            'message' => $request->comment
        ]);
        DB::table('notifications_admin')->insert([
            'title' => 'New Comment has been Added',
            'type' => 'normal',
            'to_' => '',
            'from_' => $id = Auth::user()->id,
            'body' => 'New comment on a client has been added, click for more info',
            'href' => URL_.'admin/'.$id.'/comments'
        ]);
        return back()->with('success', 'Reply has been addedd successfuly');
    }

    public function insertReply(Request $request){
        $name = Auth::user()->name;
        $id = Auth::user()->id;
        DB::table('replies')->insert([
            'comment_id' => $request->comment_id,
            'from_' => $name,
            'reply' => $request->message
        ]);
        $comment = DB::table('comments')->where('id', $request->comment_id)->get();
        DB::table('notifications_admin')->insert([
            'title' => 'New reply from the '.$name,
            'type' => 'normal',
            'to_' => '',
            'from_' => $id,
            'body' => 'New reply from '. $name.' has been added, click for more info',
            'href' => URL_.'admin/'.$comment[0]->policy_id.'/comments'
        ]);

        return back()->with('success', 'Reply has been addedd successfuly');
    }

    public function getRequests(){
        $req =
            DB::table('policy_requests')
                ->join('corporates', 'policy_requests.CP_ID_FK', 'corporates.id')
                ->join('users', 'policy_requests.USER_ID_FK', 'users.id')
                ->select('policy_requests.*', 'corporates.name as CP_NAME', 'corporates.email as CP_EMAIL','users.name as US_NAME', 'users.phone as USPHONE')
                ->where('CP_ID_FK', Auth()->user()->id)
                ->where('status', 'SENT_CP')->get();

        return view('brokers.requests')->with('req', $req);
    }

    public function policyConfirm($id){

        $req=DB::table('policy_requests')->where('id', $id)->get();
        DB::table('policy_requests')->where('id', $id)->update([
            'status' => 'DONE'
        ]);
        //admin notification
        DB::table('notifications_admin')->insert([
            'title' => 'Policy Confirmation',
            'type' => 'normal',
            'to_' => '',
            'from_' => Auth::user()->id,
            'body' =>  'Corporate '.Auth()->user()->name. ' has confirmed the policy',
            'href' => URL_.'admin/'
        ]);
        ////client notification
        DB::table('notifications_us')->insert([
            'title' => 'Your Policy Has been Confirmed',
            'type' => 'normal',
            'to_' => $req[0]->USER_ID_FK,
            'from_' => Auth::user()->id,
            'body' => 'Your Policy Has been Confirmed',
            'href' =>URL_.'/home'
        ]);
        return back()->with('success', 'Your Request has been confirmed and sent to Admin ');
    }

    public function policyDecline($id){

        $req=DB::table('policy_requests')->where('id', $id)->get();
        DB::table('policy_requests')->where('id', $id)->update([
            'status' => 'DECLINE'
        ]);
        DB::table('notifications_admin')->insert([
            'title' => 'Policy Declined',
            'type' => 'normal',
            'to_' => '',
            'from_' => Auth::user()->id,
            'body' =>  'Corporate '.Auth()->user()->name. ' has declined the policy',
            'href' => URL_.'admin/'
        ]);
        DB::table('notifications_us')->insert([
            'title' => 'Your Policy Has been declined',
            'type' => 'normal',
            'to_' => $req[0]->USER_ID_FK,
            'from_' => Auth::user()->id,
            'body' => 'Your Policy Has been declined, please contact the admin',
            'href' => URL_.'/home'
        ]);
        return back()->with('error', 'Policy has been declined and sent to Admin ');
    }

    public function getProfile(){
        $id= Auth()->user()->id;
        $profile =DB::table('agents')
            ->where('id', $id)
            ->get();
        return view('agents.profile')->with('profile',$profile);
    }

    public function updateProfile(Request $request){
        $this->validate($request,[
            'name' =>'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $id= Auth()->user()->id;
        $file = $request->file('photo');
        if ($file !=''){
            $this->validate($request, [
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            ]);
            $nameimg = $file->getClientOriginalName();
            $file->move(public_path('images'), $nameimg);
            $name= $request->input('name');
            $email= $request->input('email');
            $phone= $request->input('phone');
            $address= $request->input('address');
            DB::table('agents')->where('id', $id)
                ->update([
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'photo' => $nameimg,
                ]);
        }
        else {
            $name= $request->input('name');
            $email= $request->input('email');
            $phone= $request->input('phone');
            $address= $request->input('address');
            DB::table('agents')->where('id', $id)
                ->update([
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address
                ]);
        }
        return redirect('./agents/profile')->with('success', 'Your profile has been updated !');
    }


    //reports

    public function reports(){
        $id= Auth()->user()->id;
        $paid = DB::select(' SELECT corporates.name as CP_NAME, count(B.id) as P_COUNT 
        FROM ( select client_name, phone, draft_no, status, max(created_at) as created_at 
        from policies group by client_name, phone, draft_no ) A INNER JOIN policies B 
        USING (client_name, phone, draft_no,created_at) 
        INNER JOIN corporates ON B.cust_id =corporates.id 
        where
        MONTH(B.created_at) = 5
        AND YEAR(B.created_at) = YEAR(NOW())
        and B.status = "P" and B.cust_id='.$id.' GROUP BY month(B.created_at)');

        $paid_online = DB::select('  SELECT corporates.name as CP_NAME, count(B.id) as P_COUNT 
        FROM ( select client_name, phone, draft_no, status, max(created_at) as created_at 
        from policies group by client_name, phone, draft_no ) A INNER JOIN policies B 
        USING (client_name, phone, draft_no,created_at) 
        INNER JOIN corporates ON B.cust_id =corporates.id 
        where
        MONTH(B.created_at) = 5
        AND YEAR(B.created_at) = YEAR(NOW())
        and B.status = "P-online" and B.cust_id='.$id.' GROUP BY month(B.created_at)');

        return view('brokers.reports.index')->with('paid',$paid)->with('paid_online',$paid_online);
    }

    public function advanced(){
        $id= Auth()->user()->id;
        $corp =DB::table('corporates')->get();

        return view('brokers.reports.advanced')->with('corp', $corp);
    }
    public function search1(Request $request){
        // $d =str_replace('!', '/', $request->input('dates'));
        echo $request->input('dates');
        $where=' where ';

        if($request->input('dates') !=0){
            $dates =explode(' - ', $request->input('dates'));

            $start    = (new DateTime($dates[0]))->modify('first day of this month');
            $end      = (new DateTime($dates[1]))->modify('first day of next month');
            $interval = DateInterval::createFromDateString('1 month');
            $period   = new DatePeriod($start, $interval, $end);

            foreach ($period as $dt) {
                echo $dt->format("m") . "<br>\n";
            }
        }
    }

    public function search(Request $request){
        $id= Auth()->user()->id;
        $d = $request->input('dates');
        $corp = $request->input('corp');
        $dateype = $request->input('dateype');
        $where=' where ';
        //if($corp !='null') {
        $where.= ' B.cust_id='.$id.'  AND ';
        //  }

        if($d !=0){
            $dates =explode(' - ', $d);
            $s = strtotime($dates[0]);
            $e = strtotime($dates[1]);
            $sdate =date('Y-m-d',$s);
            $edate =date('Y-m-d',$e);
            // echo $sdate;
            $where.=" (B.".$dateype." BETWEEN '".$sdate."' AND '".$edate."') AND ";

        }

        $where = substr($where, 0, -4);

        DB::enableQueryLog();
        $data = DB::select(' SELECT B.status as STAT, month(B.created_at) as MONTHS, count(B.id) as P_COUNT
        FROM ( select client_name, phone, draft_no, status, max(created_at) as created_at 
        from policies group by client_name, phone, draft_no ) A INNER JOIN policies B 
        USING (client_name, phone, draft_no,created_at) 
        '.$where.' group by B.status, month(B.created_at)');
        //dd(DB::getQueryLog());
        $status =[];
        $dataArray =[];
        $datArray =[];
        foreach($data as $d){
            array_push ( $status, $d->STAT );
            array_push ( $dataArray, $d->P_COUNT );
            array_push ( $datArray, $d->MONTHS );
        }
        for($i = 0; $i < count ( $dataArray ); $i ++) {
            if($status[$i]==""){
                $status[$i]="UN";
            }
            else {
                $status[$i]=$status[$i];
            }
            $chartArray ["series"] [] = array (
                "name" => $status[$i],
                "data" => "[".$dataArray [$i]."]"
            );
        }
        $chartArray ["chart"] = array (
            "type" => "column"
        );
        $chartArray ["title"] = array (
            "text" => "Yearly sales"
        );
        $chartArray ["credits"] = array (
            "enabled" => false
        );
        $chartArray ["xAxis"] = array (
            "categories" => array ()
        );
        $chartArray ["tooltip"] = array (
            "valueSuffix" => "$"
        );


        $chartArray ["yAxis"] = array (
            "title" => array (
                "text" => "Sales ( $ )"
            )
        );
        return view ( 'brokers.reports.data' )->withChartarray ( $chartArray );

    }
}