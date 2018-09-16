<?php

namespace App\Console\Commands;

use App\Email;
use App\User;
use Illuminate\Console\Command;

class CreateEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:create {subject : The subject of the email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new mail to track';

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
        $validator = Email::validate(array(
            'subject' => $this->argument('subject'),
        ));

        if($validator->passes()) {
            $email = new Email();
            $email->subject = $this->argument('subject');
            $email->uniqid = uniqid();

            // Default user
            $user = User::find(1);

            $email = $user->emails()->save($email); // Attach user

            $this->info("Email $email->id successfully created.");
        } else {
            $this->error('Error during email validation');
        }
    }
}
