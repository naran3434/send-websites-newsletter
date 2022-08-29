<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SendPostEmail extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'send_post_emails';

    /**
     * @var string[]
     */
    protected $fillable = [
        'is_email_sent'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function post(): BelongsTo {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
