<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_Languages extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'users_languages';
    protected $primaryKey = 'item_ID';
    protected $fillable = [
        'user_ID',
        'language_ID'
    ];
}
