<?php

namespace Ignite\Form;

use Ignite\Support\Vue;
use Ignite\Vue\Component;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

abstract class Form
{
    /**
     * Build the form schema.
     *
     * @param  Schema $form
     * @return void
     */
    abstract public function schema(Schema $form);

    /**
     * Create new Form instance.
     *
     * @param  Route $route
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Update the given model.
     *
     * @param  Request $request
     * @param  Model   $model
     * @return void
     */
    public function update(Request $request, Model $model)
    {
        $request->validate($this->rules());

        return $model->fill($request->all())->save();
    }

    /**
     * Store a new model.
     *
     * @param  Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());

        return $this->model::fill($request->all())->save();
    }

    /**
     * Get the request rules.
     *
     * @return void
     */
    public function rules()
    {
        $this->getSchema();
    }

    /**
     * Get the form schema.
     *
     * @return Schema
     */
    public function getSchema()
    {
        if ($this->schema) {
            return $this->schema;
        }

        $this->schema(
            $this->schema = new Schema($this->model)
        );

        return $this->schema;
    }

    /**
     * Render the form.
     *
     * @param  Route     $route
     * @return Component
     */
    public function render(Route $route)
    {
        return (new Component('lit-form'))
            ->bind([
                'route' => Vue::render($route),
            ]);
    }
}
