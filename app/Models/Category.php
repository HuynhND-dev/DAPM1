<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'category_ID';
//    protected $fillable = [
//        'category_ID',
//        'name',
//        'image',
//        'create_at',
//        'update_at',
//        'delete_at'
//    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_categories', 'category_ID' ,'user_ID');
    }

}
