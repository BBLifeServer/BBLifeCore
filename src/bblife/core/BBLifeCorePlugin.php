<?php

namespace bblife\core;

use bblife\core\di\Container;
use bblife\core\repository\ButlerUserRepository;
use bblife\core\repository\UserRepository;
use pocketmine\plugin\PluginBase;

class BBLifeCorePlugin extends PluginBase {

    private Container $container;

    protected function onLoad(): void {
        $this->container = (new Container())
            ->define(UserRepository::class, ButlerUserRepository::class);
    }
}