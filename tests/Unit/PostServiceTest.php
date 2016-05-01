<?php

use App\Services\PostService;

class PostServiceTest extends TestCase
{
    /** @test */
    public function 顯示所有Post()
    {
        /** arrange */
        $expected = 10;
        $target = App::make(PostService::class);

        /** act */
        $actual = $target->displayAllPosts();

        /** assert */
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function 顯示奇數ID的Post()
    {
        /** arrange */
        $expected = 5;
        $target = App::make(PostService::class);

        /** act */
        $actual = $target->displayAllOddPosts();

        /** assert */
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function title全部改成Laravel()
    {
        /** arrange */
        $expected = 10;
        $target = App::make(PostService::class);

        /** act */
        $actual = $target->displayAllPostsWithLaravel();

        /** assert */
        $this->assertEquals($expected, $actual);
    }
}
