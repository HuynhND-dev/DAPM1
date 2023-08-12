<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_Skills extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'item_ID';
    protected $table = 'users_skills';
    protected $fillable = [
        'user_ID',
        'skill_ID'
    ];
}
