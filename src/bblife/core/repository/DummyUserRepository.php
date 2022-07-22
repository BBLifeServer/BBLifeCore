<?php

namespace bblife\core\repository;

use bblife\core\BBLifeCorePlugin;
use bblife\core\model\User;
use pocketmine\utils\Config;

class DummyUserRepository implements UserRepository {

    private Config $config;

    public function __construct(){
        $this->config = new Config(BBLifeCorePlugin::getDataPath() . "UserData.json", Config::JSON);
    }

    public function close(){
        $this->config->save();
    }

    public function save(User $user): void{
        $this->config->set($user->getName(), $this->convertUserIntoArray($user));
    }

    /**
     * @inheritDoc
     */
    public function get(string $name): User{
        return $this->convertArrayIntoUser($name, $this->config->get($name));
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array{
        $users = [];
        foreach ($this->config->getAll() as $name => $data) {
            $users[] = $this->convertArrayIntoUser($name, $data);
        }
        return $users;
    }

    /**
     * @inheritDoc
     */
    public function exists(string $name): bool{
        return $this->config->exists($name);
    }

    private function convertUserIntoArray(User $user): array {
        return [
            "money" => $user->getMoney(),
        ];
    }

    private function convertArrayIntoUser(string $name, array $data): User {
        $user = User::createDefault($name);
        $user->setMoney($data["money"]);
        return $user;
    }
}