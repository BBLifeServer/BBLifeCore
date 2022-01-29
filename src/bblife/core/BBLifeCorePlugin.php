<?php

namespace bblife\core;

use bblife\core\di\Container;
use bblife\core\listener\CommonListener;
use bblife\core\repository\ButlerUserRepository;
use bblife\core\repository\UserRepository;
use pocketmine\plugin\PluginBase;

class BBLifeCorePlugin extends PluginBase {

    protected function onLoad(): void {
        Container::define(UserRepository::class, ButlerUserRepository::class);
    }

    protected function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents(Container::get(CommonListener::class), $this);
    }
}