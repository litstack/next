<?php

namespace Ignite\Ui;

use Ignite\Contracts\Form\Form;
use Ignite\Contracts\Ui\Page as PageContract;
use Illuminate\Contracts\Support\Responsable;
use Inertia\Inertia;

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
     * The inertia page name.
     *
     * @var string
     */
    protected $inertiaPage = 'BasePage';

    /**
     * Get the inertia page name.
     *
     * @return string
     */
    protected function getInertiaPage()
    {
        return $this->inertiaPage;
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
        Inertia::setRootView('ignite::app');

        return Inertia::render($this->getInertiaPage(), array_merge(
            $this->data,
            ['components' => $this->components]
        ));
    }
}
