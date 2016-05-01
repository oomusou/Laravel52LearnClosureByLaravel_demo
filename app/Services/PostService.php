<?php

namespace App\Services;

use App\Post;
use App\Repositories\PostRepository;
use Closure;

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
        return $this->filterAllOddPosts(function (Post $post) {
            return ($post->id % 2);
        });
    }

    /**
     * @param Closure $closure
     * @return int
     */
    private function filterAllOddPosts(Closure $closure)
    {
        $posts = $this->postRepository->getAllPosts();
        $cnt = 0;

        foreach ($posts as $post) {
            if ($closure($post)) {
                $cnt++;
                $txt = "{$post->id} : {$post->title}" . PHP_EOL;
                echo($txt);
            }
        }

        return $cnt;
    }
}