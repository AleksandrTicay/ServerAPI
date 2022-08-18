<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\Author;
use App\Models\User;

class Book extends Model
{
    use HasFactory;

    public function genres() {
        return $this->belongsTo(Genre::class);
    }

    public function authors() {
        return $this->belongsToMany(Author::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
