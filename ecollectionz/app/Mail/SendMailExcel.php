<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailExcel extends Mailable
{
    use Queueable, SerializesModels;

    public $logs;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($logs)
    {
        $this->logs = $logs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       //return
        $mail =    $this->subject('ECOLLECTIONZ Excel Upload')->view('Mails.excelupload')
        ->with([
            'inputs' => $this->logs,
          ]);
        $path    = storage_path().'/imports/errors/';
        $files = array_diff(scandir($path), array('.', '..'));
        foreach ($files as $file) {
            $mail->attach(storage_path().'/imports/errors/'.$file); // attach each file
        }

        return $mail;
        
    }
}
