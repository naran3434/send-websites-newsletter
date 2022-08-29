<?php

namespace App\Listeners;

use App\Events\PrepareMailingList;
use App\Models\UserSubscription;
use Illuminate\Support\Facades\DB;

class CreateMailingEntry
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param PrepareMailingList $event
     * @return void
     */
    public function handle(PrepareMailingList $event)
    {
        $post = $event->post;
        $subscribers = UserSubscription::where('web_master_id', $post->web_master_id)
                                        ->selectRaw('user_id, '.$post->id.' as post_id')
                                        ->get()
                                        ->toArray();
        if(count($subscribers) > 0){
            DB::table('send_post_emails')->upsert($subscribers, ['post_id', 'user_id'], ['user_id']);
        }
    }
}
