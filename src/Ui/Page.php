<?php

namespace Ignite\Ui;

use Ignite\Contracts\Form\Form;
use Ignite\Contracts\Ui\Page as PageContract;
use Illuminate\Contracts\Support\Responsable;
use Inertia\Inertia;
use Inertia\Response;

class Page implements PageContract, Responsable
{
    /**
     * Page data.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Page components.
     *
     * @var array
     */
    protected $components = [];

    /**
     * The inertia component name.
     *
     * @var string
     */
    protected $inertiaComponent = 'BasePage';

    /**
     * View name.
     *
     * @var string
     */
    protected $view = 'ignite::app';

    /**
     * Mount the page.
     *
     * @param  Response $response
     * @param  Response $inertia
     * @return void
     */
    public function mount(Response $inertia)
    {
        //
    }

    /**
     * Get the inertia page name.
     *
     * @return string
     */
    public function getInertiaComponent()
    {
        return $this->inertiaComponent;
    }

    /**
     * Add data to the page.
     *
     * @param  string $attribute
     * @param  string $data
     * @return $this
     */
    public function with($attribute, $data = null)
    {
        $this->data[$attribute] = $data;

        return $this;
    }

    /**
     * Add a form to the page.
     *
     * @param  Form   $form
     * @param  string $route
     * @param  bool   $create
     * @return $this
     */
    public function form(Form $form, $route, $create = false)
    {
        $this->components[] = $form->render($route, $create);

        return $this;
    }

    public function table($table, $route)
    {
        $this->components[] = $table->render($route);

        return $this;
    }

    /**
     * Get view name.
     *
     * @return string
     */
    public function getViewName()
    {
        return $this->view;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request                   $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return $this->render()->toResponse($request);
    }

    /**
     * Render the page.
     *
     * @return \Inertia\Response
     */
    public function render()
    {
        Inertia::setRootView($this->getViewName());

        $response = Inertia::render($this->getInertiaComponent(), array_merge(
            $this->data,
            ['components' => $this->components]
        ));

        $this->mount($response);

        return $response;
    }
}
