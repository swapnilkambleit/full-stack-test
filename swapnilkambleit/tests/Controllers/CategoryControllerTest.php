<?php
namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use App\Controllers\CategoryController;
use App\Models\Categories;
use App\Helpers\Render;
use App\Helpers\Flash;
use App\Helpers\Redirect;

class CategoryControllerTest extends TestCase
{
    private $categoriesMock;
    private $controller;

    protected function setUp(): void
    {
        // Mock Categories model
        $this->categoriesMock = $this->createMock(Categories::class);

        // Replace in controller
        $this->controller = $this->getMockBuilder(CategoryController::class)
            ->onlyMethods([])
            ->disableOriginalConstructor()
            ->getMock();

        // Inject dependencies manually
        $this->controller->uploadDir = '/tmp/';
        $reflection = new \ReflectionClass($this->controller);
        $prop = $reflection->getProperty('Categories');
        $prop->setAccessible(true);
        $prop->setValue($this->controller, $this->categoriesMock);
    }

    public function testIndexReturnsRenderedView()
    {
        $this->categoriesMock
            ->expects($this->once())
            ->method('all')
            ->willReturn([['id' => 1, 'title' => 'Test Cat']]);

        // Mock Render
        $this->assertEquals(
            Render::view('categories/index', ['categories' => [['id' => 1, 'title' => 'Test Cat']]]),
            $this->controller->index()
        );
    }

    public function testStoreCreatesCategorySuccessfully()
    {
        $_POST = [
            'title' => 'Test Title',
            'description' => 'Test Description',
            'image' => 'test.jpg',
            'status' => 'active'
        ];
        $_FILES = [];

        $this->categoriesMock
            ->expects($this->once())
            ->method('create')
            ->with('Test Title', 'Test Description', 'test.jpg', 'active')
            ->willReturn(true);

        $this->assertEquals(
            Redirect::url('categories'),
            $this->controller->store()
        );
    }
}
