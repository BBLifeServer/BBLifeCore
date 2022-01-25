<?php

namespace bblife\core\repository;

use pocketmine\utils\RegistryTrait;

/**
 * @method static UserRepository USER()
 */
final class Repositories {

    use RegistryTrait;

    protected static function setup(): void {
        self::register("user", new ButlerUserRepository());
    }

    protected static function register(string $name, Repository $member): void {
        self::_registryRegister($name, $member);
    }
}