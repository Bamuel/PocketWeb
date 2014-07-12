<?php

namespace PocketWeb;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info("Pocket Web has been enabled.");
		    $this->perm = $this->getServer()->getPluginManager()->getPermission("website.command"); 
    }
    
    public function onDisable(){
        $this->getLogger()->info("PocketWeb has been disabled. Thanks for using PocketWeb");
    }
