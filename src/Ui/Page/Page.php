<?php

namespace Ignite\Ui\Page;

use Ignite\Form\Form;
use Illuminate\Contracts\Support\Responsable;
use Inertia\Inertia;

class Page implements Responsable
{
    protected $data = [];

    protected $components = [];

    /**
     * Create an HTTP response that represents the object.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return $this->render()->toResponse($request);
    }

    public function render()
    {
        Inertia::setRootView('ignite::app');

        return Inertia::render('BasePage', array_merge(
            $this->data,
            ['components' => $this->components]
        ));
    }

    public function with($attribute, $data = null)
    {
        $this->data[$attribute] = $data;

        return $this;
    }

    public function form(Form $form, $route, $create = false)
    {
        $this->components[] = $form->render($route, $create);

        return $this;
    }
}
