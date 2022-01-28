<?php

namespace bblife\core\di;

use InvalidArgumentException;
use ReflectionClass;

class Container {

    /**
     * @template T
     * @var array<class-string<T>, T>
     */
    private array $loadedClasses = [];

    /**
     * @template T
     * @var array<class-string<T>, class-string<T>>
     */
    private array $definedClasses = [];

    /**
     * @template T
     * @param class-string<T> $class
     * @return T
     */
    public function get(string $class) {
        if (array_key_exists($class, $this->definedClasses)) {
            return $this->get($this->definedClasses[$class]);
        }
        if (!class_exists($class)) {
            throw new InvalidArgumentException("Key must be valid class name");
        }
        if (array_key_exists($class, $this->loadedClasses)) {
            return $this->loadedClasses[$class];
        }
        $constructor = (new ReflectionClass($class))->getConstructor();
        if ($constructor === null) {
            return new $class();
        }
        $args = [];
        foreach ($constructor->getParameters() as $parameter) {
            $args[] = $this->get($parameter->getType()->getName());
        }
        $object = new $class(...$args);
        $this->loadedClasses[$class] = $object;
        return $object;
    }

    /**
     * @template T
     * @param class-string<T> $base
     * @param class-string<T> $class
     * @return Container
     */
    public function define(string $base, string $class): static {
        $this->definedClasses[$base] = $class;
        return $this;
    }
}