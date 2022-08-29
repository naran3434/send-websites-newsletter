<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebMaster extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'web_masters';

    /**
     * @var string[]
     */
    protected $fillable = [
      'name', 'url'
    ];
}
