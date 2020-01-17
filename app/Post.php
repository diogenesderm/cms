<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'description', 'content', 'image', 'category_id', 'published_at', 'user_id'
    ];

    /**
     * Delete post Image from storage
     *
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tags::class, 'post_tags');
    }


    /**
     *Chekc if posts has tag
     *
     * @param [type] $tagId
     * @return boolean
     */
    public function hasTag($tagId)
    {

        return in_array($tagId, $this->tag->pluck('id')->toArray());
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
