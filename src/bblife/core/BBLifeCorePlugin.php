<?php

namespace bblife\core;

use bblife\core\di\Container;
use bblife\core\listener\CommonListener;
use bblife\core\repository\ButlerUserRepository;
use bblife\core\repository\DummyUserRepository;
use bblife\core\repository\UserRepository;
use pocketmine\plugin\PluginBase;

class BBLifeCorePlugin extends PluginBase {

    private static string $dataPath;

    public static function getDataPath(): string {
        return self::$dataPath;
    }

    protected function onLoad(): void {
        self::$dataPath = $this->getDataFolder();
        $this->loadOnDevelopment();
    }

    protected function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents(Container::get(CommonListener::class), $this);
    }

    private function loadOnDevelopment() {
        Container::define(UserRepository::class, DummyUserRepository::class);
    }

    private function loadOnProduction() {
        Container::define(UserRepository::class, ButlerUserRepository::class);
    }
}