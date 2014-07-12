<?php

namespace PocketWeb;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{
	
    private $WebsiteURL;
    
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $config = $this->getConfig();
        $this->WebsiteURL = $config->get("WebsiteURL");
        $this->getLogger()->info("PocketWeb has been enabled.");
    }

    
    public function onDisable() {
        $this->getLogger()->info("PocketWeb has been disabled. Thanks for using PocketWeb");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
	switch($command->getName()){ //get command
		if ($sender instanceof Player) { //if player
	            case "website": //if command is /website
	            	$sender->sendMessage("Our website is: ".$this->WebsiteURL); //return message + website url
	            	return true; //return command success
	            	break;
	            default:
	            	return false;
		}
          	else { //if not-player (if console)
        		$sender->sendMessage("Please run command in game."); //return message
        		return true; //return command success
          	}
	}
    }
}
