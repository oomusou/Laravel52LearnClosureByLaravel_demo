<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * PostService constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @return int
     */
    public function displayAllPosts()
    {
        $posts = $this->postRepository->getAllPosts();

        foreach ($posts as $post) {
            $txt = "{$post->id} : {$post->title}" . PHP_EOL;
            echo($txt);
        }

        return $posts->count();
    }

}