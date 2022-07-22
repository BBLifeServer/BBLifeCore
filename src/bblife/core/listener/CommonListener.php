<?php

namespace bblife\core\listener;

use bblife\core\service\UserService;
use pocketmine\player\Player;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityExplodeEvent;
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

    public function onDeath(PlayerDeathEvent $event) {
        $event->setKeepInventory(true);
    }

    public function onDamage(EntityDamageEvent $event){
        if ($event->getEntity() instanceof Player){
            switch ($event->getCause()){
                case EntityDamageEvent::CAUSE_FALL:
                    $event->cancel();
                    break;
                
                case EntityDamageEvent::CAUSE_VOID:
                    $event->cancel();
                    $event->getEntity()->teleport($event->getEntity()->getWorld()->getSafeSpawn());
                    break;    
            }
        }
    }

    public function onExplode(EntityExplodeEvent $event){
        $event->cancel();
    }
}