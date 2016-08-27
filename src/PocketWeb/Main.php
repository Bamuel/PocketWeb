<?php

namespace PocketWeb;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;

class Main extends PluginBase {

    public function onEnable() {
    	@mkdir($this->getDataFolder());
        $config = new Config($this->getDataFolder()."config.yml", Config::YAML, array(
            "message" => "Our website is http://pocketmine.net"
        ));
        $this->message = $config->get("message");
        $this->getLogger()->info(C::GREEN . "PocketWeb has been enabled.");
    }

    
    public function onDisable() {
        $this->getLogger()->info(C::RED . "PocketWeb has been disabled. Thanks for using PocketWeb");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
    	if (!$sender instanceof Player) { # $sender is not a player :(
    		$sender->sendMessage(C::RED . "Please run command in game.");
    		return true;
    	}
    	
    	$sender->sendMessage(C::GOLD . $this->message); # Gets the message specified in the config
    }
}
