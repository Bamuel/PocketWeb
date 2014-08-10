<?php

namespace PocketWeb;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{
	
    private $WebsiteURL;
    
    public function onEnable() {
    	@mkdir($this->getDataFolder());
        $this->configFile = (new Config($this->getDataFolder()."config.yml", Config::YAML, array(
            "WebsiteURL" => "http://pocketmine.net"
        )))->getAll();
        $this->getLogger()->info("PocketWeb has been enabled.");
    }

    
    public function onDisable() {
        $this->getLogger()->info("PocketWeb has been disabled. Thanks for using PocketWeb");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
	switch($command->getName()){ //get command
		case "website": //if command is /website
			if ($sender instanceof Player) { //if player, not console
			$message = "Our Website is:";
		            	$sender->sendMessage("$message ".$this->configFile['WebsiteURL']); //return message + website url
		            	return true; //return command success
		            	break;
			}
	        else { //if not-player (if console)
	        		$sender->sendMessage("Please run command in game."); //return message
	        		return true; //return command success
	        }
	    default:
		  	return false;
	}
    }
}
