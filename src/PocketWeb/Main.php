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
	switch($command->getName()){
            case "website":
            	$sender->sendMessage("Our website URL is: ".$this->WebsiteURL);
            	return true;
            	break;
	}
    }
}
