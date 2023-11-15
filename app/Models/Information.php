<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    // use HasFactory;
    protected $table = 'usersinformations';
    protected $fillable = ['noms', 'prenoms', 'email', 'telephone', 'message','role'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
