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

    protected $fillable = [
        'title',
        'amount',
        'published_year'
    ];

    public function genres() {
        return $this->belongsToMany(Genre::class, 'book_genre')->withTimestamps();
    }

    public function authors() {
        return $this->belongsToMany(Author::class, 'book_author')->withTimestamps();
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
