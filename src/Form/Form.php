<?php

namespace Ignite\Form;

use Ignite\Contracts\Form\Form as FormContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class Form implements FormContract
{
    /**
     * The form schema.
     *
     * @var Schema|null
     */
    protected $schema;

    /**
     * The model.
     *
     * @var Model|mixed
     */
    protected $model;

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
     * @param  Model $model
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Update the given model.
     *
     * @param  Request $request
     * @param  Model   $model
     * @return void
     */
    public function update(Request $request)
    {
        // $request->validate($this->rules());

        $this->model->fill($request->all())->save();

        return back(303);
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
     * @param  string $route
     * @param  bool   $store
     * @return Schema
     */
    public function render($route, $store = false)
    {
        return $this->getSchema()
            ->getComponent()
            ->prop('model', $this->model)
            ->prop('route', $route)
            ->prop('store', $store);
    }
}
