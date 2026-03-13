<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivActionNewsroom extends Model
{
    use HasFactory;

    protected $table = 'priv_action_newsroom';

    public function testRecipient()
    {
        return $this->belongsTo(TestRecipient::class, 'test_recipient_id');
    }

}