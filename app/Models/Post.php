<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\Revision;
use \Venturecraft\Revisionable\RevisionableTrait;
use Fico7489\Laravel\RevisionableUpgrade\Traits\RevisionableUpgradeTrait;

class Post extends Model
{
    use HasFactory;
    use RevisionableTrait;
    use RevisionableUpgradeTrait;

    //enable this if you want use methods that gets information about creating
    protected $revisionCreationsEnabled = true;

    protected $fillable = [
        'item_npn',
        'item_receiver',
        'item_status',
        'item_package_receiver',
        'item_delivery_date',
        'item_body',
        'user_id',
        'client_id',
        'package_id'
    ];

    protected $keepRevisionOf = [
        'item_npn',
        'item_receiver',
        'item_status',
        'item_package_receiver',
        'item_delivery_date',
        'item_body',
        'user_id',
        'client_id',
        'package_id'
    ];

    protected $revisionFormattedFieldNames = [
        'item_npn'      => 'NPN Број',
        'item_receiver'      => 'Доставувач',
        'item_package_receiver'      => 'Примач на Пратка',
        'item_status'      => 'Начин на Достава',
        'item_delivery_date'      => 'Датум на Достава',
        'package_id'      => 'Статус на пратка',
        'item_body'      => 'Дополнителни Информации'



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


    public static function revisions()
    {
        return \Venturecraft\Revisionable\Revision::where('revisionable_type', get_class());
    }


}
