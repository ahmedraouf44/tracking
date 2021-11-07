<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Order extends Model
{

    protected $table = 'orders';

    protected $fillable = [
        'client_id','name','start_lang','start_lat','end_lang','end_lat','address'
    ];

    public function client()
    {
        return $this->hasOne(User::class, 'id', 'client_id');
    }



}
