<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;
    protected $table = 'applies';
    public $timestamps = false;
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_ID', 'application_ID');
    }
}
