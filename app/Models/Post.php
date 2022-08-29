<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'posts';


    /**
     * @var string[]
     */
    protected $fillable = [
        'web_master_id', 'title', 'body', 'is_email_queued'
    ];

    /**
     * @return BelongsTo
     */
    public function webmaster(): BelongsTo {
        return $this->belongsTo(WebMaster::class, 'web_master_id');
    }
}
