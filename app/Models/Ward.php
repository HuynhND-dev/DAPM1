<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $primaryKey = 'ward_ID';
    protected $fillable = [
        'ward_ID',
        'name',
        'district_ID'
    ];
}
