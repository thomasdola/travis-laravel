<?php

use App\Article;
use App\ArticleRepository;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticleRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    protected $repository;

    public function setUp()
    {
        parent::setUp(); 
        $this->repository = new ArticleRepository;
    }

    /** @test */
    public function it_can_add_an_article()
    {
        //given
        $article = factory(Article::class)->make();

        //when
        $this->repository->add($article);

        //then
        $this->assertCount(1, $this->repository->all());
    }
    
    /** @test */
    public function it_can_delete_an_article()
    {
        //given
        $article1 = factory(Article::class)->make();
        $article2 = factory(Article::class)->make();
        $this->repository->add($article1);
        $this->repository->add($article2);
        $this->assertCount(2, $this->repository->all());

        //when
        $this->repository->remove($article1);

        //then
        $this->assertCount(1, $this->repository->all());
        $this->assertNotContains($article1, $this->repository->all());
    }
    
    /** @test */
    public function it_can_edit_an_article()
    {
        //given
        $article = factory(Article::class)->make();
        $this->repository->add($article);
        $this->assertCount(1, $this->repository->all());
        $data = ['title' => 'edited title'];

        //when
        $edited = $this->repository->update($article, $data);

        //then
        $this->assertEquals('edited title', $edited->title);
    }
}
