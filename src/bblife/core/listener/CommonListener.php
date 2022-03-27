<?php

namespace bblife\core\listener;

use bblife\core\service\UserService;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerDeathEvent;

class CommonListener implements Listener {

    private UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    /**
     * @priority LOWEST
     * @param PlayerJoinEvent $event
     * @return void
     */
    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        if (!$this->userService->existsUser($player->getName())) {
            $this->userService->createUser($player->getName());
        }
    }

    public function ondeath(PlayerDeathEvent $event) {
        $event->setKeepInventory(true);
    }
}