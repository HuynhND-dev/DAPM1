<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_Categories extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'item_ID';
    protected $table = 'users_categories';
    protected $fillable = [
        'user_ID',
        'category_ID'
    ];
}
