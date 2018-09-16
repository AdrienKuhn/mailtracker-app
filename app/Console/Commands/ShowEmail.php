<?php

namespace App\Console\Commands;

use App\Email;
use App\EmailTracking;
use Illuminate\Console\Command;

class ShowEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:show {uniqid}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show email data';

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
        $this->info("\n");

        $this->info("Email information:");
        $email = Email::where('uniqid', $this->argument('uniqid'))->first(['id', 'uniqid', 'subject', 'user_id', 'created_at']);
        $headers = ['ID', 'Unique ID', 'Subject', 'User', 'Created At'];
        $this->table($headers, [ $email->toArray() ]);

        $this->info("\n");

        $this->info("Pixel tracker code:");
        $this->info('<img src="'.action('API\TrackEmail',array($email->uniqid)).'" height="3" width="3" />');

        $this->info("\n");

        $this->info("Tracking information:");
        $emailTrackings = EmailTracking::where('email_id', $email->id)->get(['id', 'ip', 'host', 'user_agent', 'country', 'created_at']);
        $headers = ['ID', 'IP', 'Hostname', 'User Agent', 'Country', 'Created At'];
        $this->table($headers, $emailTrackings);
    }
}
