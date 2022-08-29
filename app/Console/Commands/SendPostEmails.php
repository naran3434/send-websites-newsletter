<?php

namespace App\Console\Commands;

use App\Jobs\PostEmailJob;
use App\Models\SendPostEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendPostEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:new-post-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Send new post mail to subscribers';

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
     * @return int
     */
    public function handle()
    {
        $emails = SendPostEmail::where('is_email_sent', 0)->with(['user', 'post'])
                                ->take(100)->get();

        foreach ($emails as $row) {
            dispatch(new PostEmailJob($row));
        }

        SendPostEmail::whereIn('id', $emails->pluck('id')->toArray())
                        ->update(['is_email_sent' => 1]);

        return 0;
    }
}
