<?php

namespace App\Jobs;

use App\MailSenderHelper;
use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NewPostEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected int $siteId, protected int $postId)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $post = Post::query()->find($this->postId);

        $users = User::query()
            ->join('subscriptions', 'user', 'id')
            ->whereRaw("website = $this->siteId AND id NOT IN (SELECT user FROM delivered_subscriptions WHERE post = $this->postId)")
            ->get();

        echo "Sending email to users...\n";
        Mail::to($users)->send(new \App\Mail\NewPostEmail($post));
    }
}
