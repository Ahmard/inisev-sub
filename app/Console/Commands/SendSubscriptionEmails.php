<?php

namespace App\Console\Commands;

use App\Jobs\NewPostEmail;
use Illuminate\Console\Command;

class SendSubscriptionEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subs:send  {--site=} {--post=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email subscriptions message';

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
    public function handle(): int
    {
        $siteId = (int)$this->option('site');
        $postId = (int)$this->option('post');

        if ($postId < 1) {
            dd('Valid PostId must be provided');
        }

        if ($siteId < 1) {
            dd('Valid SiteId must be provided');
        }

        NewPostEmail::dispatch($siteId, $postId)
            ->delay(now()->addSeconds(15));

        return Command::SUCCESS;
    }
}
