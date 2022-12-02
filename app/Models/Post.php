<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $guarded = ['id'];

    public function kategori()
    {
        $this->belongsTo(Kategori::class);
    }
    public function user()
    {
        $this->belongsTo(User::class);
    }
}
