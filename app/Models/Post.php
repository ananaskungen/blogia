<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'excerpt',
        'file_path_attachment',
        'is_public',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the tags associated with the post.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


}
