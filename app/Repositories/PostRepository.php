<?php

namespace App\Repositories;

use App\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository
{

    /**
     * @return Collection|Post[]
     */
    public function getAllPosts()
    {
        return Post::all();
    }
}