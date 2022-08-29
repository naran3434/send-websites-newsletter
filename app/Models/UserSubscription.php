<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'user_subscriptions';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id', 'web_master_id'
    ];
}
