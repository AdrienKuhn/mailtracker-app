<?php

namespace App\Console\Commands;

use App\Email;
use Illuminate\Console\Command;

class ListEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List emails';

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
        $headers = ['ID', 'Unique ID', 'Subject', 'User', 'Created At'];
        $emails = Email::all(['id', 'uniqid', 'subject', 'user_id', 'created_at'])->toArray();
        $this->table($headers, $emails);
    }
}
