<?php

namespace App\Services;

use App\Post;
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
        return $this->postRepository->getAllPosts()
            ->each(function (Post $post) {
                $txt = "{$post->id} : {$post->title}" . PHP_EOL;
                echo($txt);
            })->count();
    }

    /**
     * @return int
     */
    public function displayAllOddPosts()
    {
        return $this->postRepository->getAllPosts()
            ->filter(function (Post $post) {
                return ($post->id % 2);
            })
            ->each(function (Post $post) {
                $txt = "{$post->id} : {$post->title}" . PHP_EOL;
                echo($txt);
            })->count();
    }

    /**
     * @return int
     */
    public function displayAllPostsWithLaravel()
    {
        return $this->postRepository->getAllPosts()
            ->each(function (Post $post) {
                $post->title = 'Laravel';
            })
            ->each(function (Post $post) {
                $txt = "{$post->id} : {$post->title}" . PHP_EOL;
                echo($txt);
            })
            ->count();
    }
}