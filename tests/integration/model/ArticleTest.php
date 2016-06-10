<?php

use App\Article;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticleTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * @test*/
    public function it_fetches_trending_articles()
    {
        //Given
        factory(Article::class, 3)->create();
        factory(Article::class)->create(['reads' => 10]);
        $most_popular = factory(Article::class)->create(['reads' => 20]);

        //When
        $articles = Article::trending();

        //Then
        $this->assertEquals($most_popular->id, $articles->first()->id);
        $this->assertCount(3, $articles);
    }
}
