<?php


namespace MrJamesAndrewMC\Purges\Purge;

use pocketmine\scheduler\PluginTask;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\math\Vector3;
use pocketmine\level\Position;
use pocketmine\level\Level;
use MrJamesAndrewMC\Purges\Main;
use MrJamesAndrewMc\Purges\Purge\CyberOn;


class StartPurge extends PluginTask {
    
    public $main;
    private $time;
    
    public function __construct(Main $main, $time = null) {
        $this->main = $main;
        $this->time = $time;
        parent::__construct ( $main );
    }
    
    public function onRun($t) {
        if ($this->time !== null && $this->time > 0){
            $this->WarningSecs($this->time);
        }
        if ($this->time === -1){
             $this->main->getServer()->getScheduler()->scheduleTask(new CyberOn($this->main));
        }
        if ($this->time === null){
            $this->main->getServer()->broadcastMessage("§4[PURGE]§c WARNING!!!!\n§4[PURGE]§d The Purge gonna start in 1 Minute!\n§4[PURGE]§dPVP WILL ACTIVE ANYWHERE");
            $this->main->getServer()->getScheduler()->scheduleDelayedTask(new StartPurge($this->main, 30) , 20*30);
            $this->main->getServer()->getScheduler()->scheduleDelayedTask(new StartPurge($this->main, 15) , 20*45);
            $this->main->getServer()->getScheduler()->scheduleDelayedTask(new StartPurge($this->main, 10) , 20*50);
            $this->main->getServer()->getScheduler()->scheduleDelayedTask(new StartPurge($this->main, 5) , 20*55);
            $this->main->getServer()->getScheduler()->scheduleDelayedTask(new StartPurge($this->main, 3) , 20*57);
            $this->main->getServer()->getScheduler()->scheduleDelayedTask(new StartPurge($this->main, 2) , 20*58);
            $this->main->getServer()->getScheduler()->scheduleDelayedTask(new StartPurge($this->main, 1) , 20*59);
            $this->main->getServer()->getScheduler()->scheduleDelayedTask(new StartPurge($this->main, -1) , 20*60);
        }
       
      
    }
    
    public function WarningSecs($time) {
        $this->main->getServer()->broadcastMessage("§4[PURGE]§d ".$time." Secs will start");
    }
    
    public function StartPurge() {
        
    }
    
    public function StopPurge() {
        
    }
    //put your code here
}
