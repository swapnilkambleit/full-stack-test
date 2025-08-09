<?php
namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use App\Controllers\PostController;
use App\Models\Posts;
use App\Models\Categories;
use App\Helpers\Render;
use App\Helpers\Flash;
use App\Helpers\Redirect;

class PostControllerTest extends TestCase
{
    private $postsMock;
    private $categoriesMock;
    private $controller;

    protected function setUp(): void
    {
        $this->postsMock = $this->createMock(Posts::class);
        $this->categoriesMock = $this->createMock(Categories::class);

        $this->controller = $this->getMockBuilder(PostController::class)
            ->onlyMethods([])
            ->disableOriginalConstructor()
            ->getMock();

        // Inject dependencies via reflection
        $this->controller->uploadDir = '/tmp/';
        $reflection = new \ReflectionClass($this->controller);

        $postsProp = $reflection->getProperty('Posts');
        $postsProp->setAccessible(true);
        $postsProp->setValue($this->controller, $this->postsMock);

        $categoriesProp = $reflection->getProperty('Categories');
        $categoriesProp->setAccessible(true);
        $categoriesProp->setValue($this->controller, $this->categoriesMock);
    }

    public function testIndexLoadsPosts()
    {
        $this->postsMock->expects($this->once())
            ->method('all')
            ->willReturn([['id' => 1, 'title' => 'Sample Post']]);

        $expected = Render::view('posts/index', [
            'posts' => [['id' => 1, 'title' => 'Sample Post']]
        ]);

        $this->assertEquals($expected, $this->controller->index());
    }

    public function testCreateLoadsCategories()
    {
        $this->categoriesMock->expects($this->once())
            ->method('all')
            ->willReturn([['id' => 1, 'name' => 'News']]);

        $expected = Render::view('posts/create', [
            'categories' => [['id' => 1, 'name' => 'News']]
        ]);

        $this->assertEquals($expected, $this->controller->create());
    }

    public function testStoreSavesPost()
    {
        $_POST = [
            'title' => 'Post Title',
            'description' => 'Post Description',
            'category_id' => 2,
            'image' => 'image.jpg',
            'status' => 'active'
        ];
        $_FILES = [];

        $this->postsMock->expects($this->once())
            ->method('create')
            ->with(2, 'Post Title', 'Post Description', 'image.jpg', 'active')
            ->willReturn(true);

        $this->assertEquals(Redirect::url('posts'), $this->controller->store());
    }
}