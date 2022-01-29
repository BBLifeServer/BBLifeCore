<?php

namespace bblife\core\di;

use InvalidArgumentException;
use ReflectionClass;

class Container {

    /**
     * @template T
     * @var array<class-string<T>, T>
     */
    private static array $loadedClasses = [];

    /**
     * @template T
     * @var array<class-string<T>, class-string<T>>
     */
    private static array $definedClasses = [];

    private function __construct() {
    }

    /**
     * @template T
     * @param class-string<T> $class
     * @return T
     */
    public static function get(string $class) {
        if (array_key_exists($class, self::$definedClasses)) {
            return self::get(self::$definedClasses[$class]);
        }
        if (!class_exists($class)) {
            throw new InvalidArgumentException("Key must be valid class name");
        }
        if (array_key_exists($class, self::$loadedClasses)) {
            return self::$loadedClasses[$class];
        }
        $constructor = (new ReflectionClass($class))->getConstructor();
        if ($constructor === null) {
            return new $class();
        }
        $args = [];
        foreach ($constructor->getParameters() as $parameter) {
            $args[] = self::get($parameter->getType()->getName());
        }
        $object = new $class(...$args);
        self::$loadedClasses[$class] = $object;
        return $object;
    }

    /**
     * @template T
     * @param class-string<T> $base
     * @param class-string<T> $class
     * @return void
     */
    public static function define(string $base, string $class): void {
        self::$definedClasses[$base] = $class;
    }
}