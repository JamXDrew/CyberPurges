<?php


namespace MrJamesandrewMC\Purges\Purge;

use pocketmine\scheduler\PluginTask;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\math\Vector3;
use pocketmine\level\Position;
use pocketmine\level\Level;
use MrJamesAndrewMC\Purges\Main;
use MrJamesAndrewMc\Purges\Purge\StartPurge;

class CyberOff extends PluginTask {
    
    private $main;
    
    public function __construct(Main $main) {
        $this->main = $main;
        parent::__construct ( $main );
    }
    
    public function onRun($t) {
        $this->main->purge = true;
        $this->main->getServer()->broadcastMessage("§4[PURGE]§e The PURGE is Over! \n§4[PURGE]§f We Hope You Did Not Kill By Other Players");
        
    }
    //put your code here
}
