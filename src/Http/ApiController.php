<?php

namespace Ignite\Http;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApiController
{
    /**
     * Call the controller action.
     *
     * @param  string $method
     * @param  array  $parameters
     * @return mixed
     */
    public function callAction($method, $parameters)
    {
        $query = $this->resource::query();
        $model = get_class($query->getModel());

        foreach ($parameters as $name => $parameter) {
            if (! is_object($parameter)) {
                continue;
            }
            if (get_class($parameter) != $model) {
                continue;
            }

            if ($query->whereKey($parameter->getKey())->exists()) {
                break;
            }

            throw (new ModelNotFoundException)->setModel(
                $model, $parameter->getKey()
            );
        }

        return $this->{$method}(...array_values($parameters));
    }
}
