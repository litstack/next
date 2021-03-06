<?php

namespace Tests\Ui;

use Ignite\Contracts\Ui\Page as PageContract;
use Ignite\Ui\Page;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Facade;
use Inertia\Response as InertiaResponse;
use PHPUnit\Framework\TestCase;

class PageTest extends TestCase
{
    public function testRender()
    {
        $app = new Application;
        Facade::setFacadeApplication($app);

        $page = new Page();
        $rendered = $page->render();
        $this->assertInstanceOf(InertiaResponse::class, $rendered);
    }

    public function testGetViewName()
    {
        $this->assertSame('ignite::app', (new Page())->getViewName());
        $this->assertSame('foo', (new CustomPage())->getViewName());
    }

    public function testGetInertiaComponent()
    {
        $this->assertSame('BasePage', (new Page())->getInertiaComponent());
        $this->assertSame('bar', (new CustomPage())->getInertiaComponent());
    }

    public function testItImplementsContract()
    {
        $page = new Page();
        $this->assertInstanceOf(PageContract::class, $page);
    }
}

class CustomPage extends Page
{
    protected $view = 'foo';

    protected $inertiaComponent = 'bar';
}
