<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'user_id','provider', 'provider_id','token',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
