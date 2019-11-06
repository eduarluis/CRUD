<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\SendMail;

class MailSend extends Command
{
    public $email = 'eduarluis96@gmail.com';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'An email will be sent every hour';

    /**
     * Create a new command instance.
     *
     * @return void
     */
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
        $subject = 'Notifications';
        $messaje = 'This message will be sent every hour!';
        $date = date('Y-m-d');

        Mail::to($this->email)->send( new SendMail($subject, $messaje, $date) );
    }
}
