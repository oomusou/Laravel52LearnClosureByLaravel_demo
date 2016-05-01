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
}
