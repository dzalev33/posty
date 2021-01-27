<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_npn',
        'item_receiver',
        'item_status',
        'item_delivery_date',
        'item_body',
        'user_id',
        'client_id',
        'package_id'
    ];


    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }




}
