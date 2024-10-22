<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuckyHistory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'random_number', 'result', 'win_amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
