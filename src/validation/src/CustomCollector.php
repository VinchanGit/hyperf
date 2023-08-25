<?php

namespace Hyperf\Validation;

use Hyperf\Di\Annotation\AnnotationCollector;
use Hyperf\Validation\Annotation\Rules;

class CustomCollector
{
    protected array $rules = [];

    protected array $attributes = [];

    protected array $scenes = [];

    public function handleAnnotationRules(): static
    {
        $rulesClass = AnnotationCollector::list();

        $rules = $attributes = $scenes = [];
        foreach ($rulesClass as $class => $metadata) {
            foreach ($metadata['_p'] ?? [] as $property => $_metadata) {
                if ($value = $_metadata[Rules::class] ?? null) {

                    $rules[$property] = $value->rules;

                    $attributes[$property] = $value->attribute;

                    foreach ($value->scenes as $scene) {
                        $scenes[$scene][] = $property;
                    }
                }
            }
        }

        $this->setRules($rules);
        $this->setAttributes($attributes);
        $this->setScenes($scenes);

        return $this;
    }

    /**
     * @return array
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * @param array $rules
     * @return CustomCollector
     */
    public function setRules(array $rules): CustomCollector
    {
        $this->rules = $rules;
        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     * @return CustomCollector
     */
    public function setAttributes(array $attributes): CustomCollector
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return array
     */
    public function getScenes(): array
    {
        return $this->scenes;
    }

    /**
     * @param array $scenes
     * @return CustomCollector
     */
    public function setScenes(array $scenes): CustomCollector
    {
        $this->scenes = $scenes;
        return $this;
    }
}