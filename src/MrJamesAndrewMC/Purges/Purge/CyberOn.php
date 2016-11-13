<?php


namespace MrjamesAndrewMC\Purges\Purge;

use pocketmine\scheduler\PluginTask;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\math\Vector3;
use pocketmine\level\Position;
use pocketmine\level\Level;
use MrJamesAndrewMC\Purges\Main;
use MrJamesAndrewMc\Purges\Purge\CyberOff;

class CyberOn extends PluginTask {
    
    public $main;
    
    public function __construct(Main $main) {
        $this->main = $main;

        parent::__construct ( $main );
    }
    
    public function onRun($t) {
       $this->main->getServer()->broadcastMessage("§4[PURGE]§2 PURGE STARTING NOW!!!!!!!!");
       $this->main->purge = true;
       foreach ($this->main->getServer()->getOnlinePlayers() as $p){
           $p->setHealth("20");
       }
       $this->main->getServer()->getScheduler()->scheduleDelayedTask(new CyberOff($this->main) , 20*60);
       //Scheduel Purge Off
       
    }
}
