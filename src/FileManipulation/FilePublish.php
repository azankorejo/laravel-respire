<?php

namespace azankorejo\Respire;

use Illuminate\Support\Str;

class FilePublish
{
    public function alter(string $stub, string $model)
    {
        $modelClass = $this->parseModel($model);

        $replace = [
            'DummyFullModelClass' => $modelClass,
            '{{ namespacedModel }}' => $modelClass,
            '{{namespacedModel}}' => $modelClass,
            'DummyModelClass' => class_basename($modelClass),
            '{{ model }}' => class_basename($modelClass),
            '{{model}}' => class_basename($modelClass),
            'DummyModelVariable' => lcfirst(class_basename($modelClass)),
            '{{ modelVariable }}' => lcfirst(class_basename($modelClass)),
            '{{modelVariable}}' => lcfirst(class_basename($modelClass)),
        ];
        return str_replace(
            array_keys($replace), array_values($replace), $stub
        );

    }
    protected function parseModel($model)
    {
        if (preg_match('([^A-Za-z0-9_/\\\\])', $model)) {
            throw new \Exception('Model name contains invalid characters.',500);
        }

        return $this->qualifyModel($model);
    }

    protected function qualifyModel(string $model)
    {
        $this->laravel;
        $model = ltrim($model, '\\/');

        $model = str_replace('/', '\\', $model);

        return is_dir(app_path('Models'))
            ? 'App\\Models\\'.$model
            : 'App\\'.$model;
    }

}