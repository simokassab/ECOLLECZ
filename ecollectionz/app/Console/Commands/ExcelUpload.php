<?php

namespace App\Console\Commands;

use App\Mail\SendMailExcel;
use Illuminate\Console\Command;
use App\policies;
use DB;
use Excel;
use Carbon\Carbon;
use Ddeboer\Imap\Server;
use Ddeboer\Imap\SearchExpression;
use Ddeboer\Imap\Search\Email\From;
use Ddeboer\Imap\Search\Flag\Unseen;
use Ddeboer\Imap\Search\Text\Subject;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class ExcelUpload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:upload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Excel upload';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public $i = 0;
    public $j = 0;
    public $logs ="";
    public $er_files ="";
    public $filename='';
    public $err=array();
    public $simulation ="";
    public $check ="";
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        //print_r($files);
      //  foreach($files as $f){
         //   echo $f;
      //  }
        $server = new Server('outlook.office365.com');
        $connection = $server->authenticate('info@ecollectionz.com', 'EcollectionZ2019**');
        $mailbox = $connection->getMailbox('INBOX');
        $search = new SearchExpression();
        $search->addCondition(new From('albatal7@hotmail.com'));
        $search->addCondition(new Subject('ezf'));
        $search->addCondition(new Unseen());
        //$search->addCondition(new Body('attached'));
       // echo "1";
        $messages = $mailbox->getMessages($search);
       // echo "2";
        $files = glob(storage_path().'/imports/*'); // get all file names
        foreach($files as $file){ // iterate files
            if(is_file($file))
                unlink($file); // delete file
        }
        $files = glob(storage_path().'/imports/errors/*'); // get all file names
        foreach($files as $file){ // iterate files
            if(is_file($file))
                unlink($file); // delete file
        }
        $mytime = new Carbon();
        $this->logs.= $mytime->toDateTimeString()." : Old Files have been deleted.\n";
        ini_set('memory_limit', '2048M');
        set_time_limit(0);
        date_default_timezone_set('Asia/Beirut');
        $remarks="";
        DB::enableQueryLog();
        $this->i=0;
        $insert_data = array();
        $this->check =0;
        foreach ($messages as $message) {
            $this->check =1;
            $message->markAsSeen();
            $this->simulation.= $mytime->toDateTimeString()." : Email found and marked as Read.\n";
            $attachments = $message->getAttachments();
            foreach ($attachments as $attachment) {
                $this->filename = $attachment->getFilename();
                $file_parts = pathinfo($attachment->getFilename());
                //$file = explode('.', $attachment->getFilename());
               // echo $file_parts['extension'];
                if($file_parts['extension']=='xlsx'){
                    file_put_contents(storage_path().'/imports/' . $attachment->getFilename(),
                        $attachment->getDecodedContent());
                    //excel upload
                    $this->simulation.= $mytime->toDateTimeString()." : File excel ".$this->filename." found, and moved to server successfully.\n";
                    Excel::load(storage_path('/imports/'.$attachment->getFilename()), function ($reader) {
                        $headerRow = $reader->first()->keys()->toArray();
                        $mytime = new Carbon();
                        $this->simulation.= $mytime->toDateTimeString()." : Start loading ".$this->filename."\n";
                        foreach ($reader->toArray() as $key => $row) {
                            $bdate = strtotime($row['date']);
                            $borddate =date('Y-m-d',$bdate);
                            $ddate = strtotime($row['duedate']);
                            $duedate =date('Y-m-d',$ddate);
                            $row['phone'] = str_replace('.', '', $row['phone'] );
                            if( (strlen(trim($row['phone'])) != 0) && (strlen(trim($row['phone'])) > 9)
                                && ($row['phone']!='961') && (strlen(trim($row['phone'])) <12) ){
                                //echo " COND: ".$row['phone']." - SIZE ".strlen(trim($row['phone']))."<br>";
                                if($row['status']==''){
                                    $stat ='';
                                }
                                else {
                                    $stat = $row['status'];
                                }
                                if ($row['curno'] == 'USD') {
                                    $c = 1;
                                } else {
                                    $c = 0;
                                }
                                if ($row['status'] == 'P') {
                                    $d = date('Y-m-d');
                                } else {
                                    $d = '';
                                }
                                $remarks="";
                                if(isset($row['app_date'])){
                                    if(($row['status']=='B') || ($row['status']=='D')){
                                        $remarks=$row['app_date'];
                                    }
                                    else {
                                        $remarks =$row['remarks'];
                                    }
                                }
                                else {
                                    $remarks =$row['remarks'];
                                }
                                $hash = md5($row['phone'] . $row['draftno'] . $duedate.$stat.$row['amnt'].$row['remarks']);
                                $res = policies::where('hash', $hash)->exists();
                                if(!$res) {
                                    $data = [
                                        'cust_id'                   => $row['custno'],
                                        'policy'                    => '',
                                        'bord_date'                 => $borddate,
                                        'client_id'                 => $row['clientid'],
                                        'client_no'                 => $row['clientno'],
                                        'client_name'               => $row['clientname'],
                                        'draft_no'                  => $row['draftno'],
                                        'status'                    => $stat,
                                        'due_date'                   => $duedate,
                                        'currency'                   => $c,
                                        'amount'                  => $row['amnt'],
                                        'zone'                  => $row['zone'],
                                        'broker_id'                  => $row['brokercode'],
                                        'broker_name'                  => $row['brokername'],
                                        'remarks'                  => $remarks,
                                        'phone'                  => $row['phone'],
                                        'insured_name'                  => $row['insname'],
                                        'address'                  => '' ,
                                        'hash'                  => $hash
                                    ];
                                    $insert_data[] = $data;
                                }
                                else {
                                    $this->i++;
                                    /*  policies::where('hash', $hash)->chunk(500, function ($policy) {
                                          foreach ($policy as $p) {
                                              $mytime = new Carbon();
                                              $p->update(['created_at' => $mytime->toDateTimeString()]);
                                          }
                                      });*/
                                }
                                /*else {
                                  $mytime = new Carbon();
                                        DB::table('policies')
                                            ->where('phone', '=', $row['phone'])
                                            ->where('draft_no', '=', $row['draftno'])
                                            ->where('due_date', '=', $duedate)
                                            ->where('status', '=', $stat)
                                            ->where('bord_date', '=', $borddate)
                                            ->where('cust_id', '=', $row['custno'])
                                            ->where('amount', '=', $row['amnt'])
                                            ->where('remarks', '=', $row['remarks'])
                                            ->update([
                                                'created_at' => $mytime->toDateTimeString()]);
                                    }*/
                            }
                            else {
                                array_push($this->err, $row);
                            }

                        } //end foreach
                        if(!empty($insert_data)){
                            echo "insert dataaaaaaaaaaa";
                            $this->j = count($insert_data);
                            $insert_data = collect($insert_data);
                            $chunks = $insert_data->chunk(500);
                            foreach ($chunks as $chunk)
                            {
                                DB::table('policies')->insert($chunk->toArray());
                            }
                        }
                        if(!empty($this->err)){
                            //$this->er_files.= $mytime->toDateTimeString()." : Rows with wrong phone numbers are exported to excel and attache in the email \n";
                            return Excel::create($this->filename.'_err', function($excel)  {
                                $excel->sheet('mySheet', function($sheet)
                                {
                                    $sheet->fromArray($this->err);
                                });
                            })->store('xlsx', storage_path()."/imports/errors");

                        }
                    });
                    $this->simulation.= $mytime->toDateTimeString().": ". $this->j." new rows inserted successfully and ".$this->i." rows updated";

                    // end excel upload
                }
            }
        }
        if($this->check==0){
            $this->logs.= $mytime->toDateTimeString()." : No message in the inbox, please check your inbox and make sure that the received message is unread.\n";
        }
        else {
            $this->logs.= $this->simulation;
            $this->logs.= "\n ".$mytime->toDateTimeString()." : Rows with wrong phone numbers are exported to excel and attached in the email \n";
        }
        echo $this->logs;
        $emails = ['mohammad.a.kassab@gmail.com', 'albatal7@hotmail.com'];
        Mail::to($emails)->send(new SendMailExcel($this->logs));
    }
}
