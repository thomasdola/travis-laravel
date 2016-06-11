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

    /** @test */
    public function it_can_add_an_article()
    {
        //given
        $article = factory(Article::class)->make();

        //when
        $article->save();

        //then
        $this->assertCount(1, Article::all());
    }

    /** @test */
    public function it_can_edit_an_article()
    {
        //given
        $article = factory(Article::class)->create();
        
        //when
        $edited = $article->edit(['title' => 'edited title']);
        
        //then
        $this->assertEquals('edited title', $edited->title);
    }

    /** @test */
    public function it_can_delete_an_article()
    {
        //given
        $article = factory(Article::class)->create();

        //when
        $article->erase();

        //then
        $this->assertCount(0, Article::all());
    }
}

