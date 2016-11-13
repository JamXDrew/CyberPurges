<?php


namespace MrJamesAndrewMC\Purges;


use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerChatEvent;

use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\entity\EntityDamageEvent;

use pocketmine\math\Vector3;
use pocketmine\level\Position;
use MrJamesAndrewMC\Purges\Purge\StartPurge;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerMoveEvent;

class Main extends PluginBase implements Listener{
    
    public $purge;
    
    private $api;
    
    
    
    
    public function onEnable() {
        @mkdir($this->getDataFolder());
       
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        
        $this->faction = $this->getServer()->getPluginManager()->getPlugin("CyberPurge");
        
        $this->getLogger()->info("LOADED");
        $this->getServer()->getScheduler()->scheduleDelayedRepeatingTask(new StartPurge($this), 20 * 60 * 2, 20 * 60 * 20);
 
        //30 Mins
    }
    
    public function onDisable() {
        $this->SaveYML();
        $this->getLogger()->warning("DISABLED");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    $player = $this->getServer()->getPlayerExact($sender->getName());
    switch($command->getName()){
                        case "purge":
                            if ($this->purge == false){
                            $this->getServer()->getScheduler()->scheduleTask(new StartPurge($this));   
                            }
                           }}
                        
                        
                        
    public function onMove(PlayerMoveEvent $event){
        if($event->getPlayer() instanceof Player and !$event->getPlayer()->isOp()){
            $player = $event->getPlayer();                    
            $block = $event->getPlayer()->getLevel()->getBlock(new Vector3($player->getX(),$player->getY()-1,$player->getZ()));
            if($block->getID() == 0){
                if(!isset($this->flyers[$player->getName()])) $this->flyers[$player->getName()] = 0;
                $this->flyers[$player->getName()]++;
                if($this->flyers[$player->getName()] >= 180){ $this->AddTempBan($player->getName(), 15 , 0);$this->flyers[$player->getName()] = 0;}
            }else{
                $this->flyers[$player->getName()] = 0;
            }
            }
            }
    
    public function PlayerDamage(EntityDamageEvent $event) {
        if($event->getEntity() instanceof Player){
            $player = $event->getEntity();
            if ($this->CheckIfProtechted($player->getX(), $player->getZ(), "pvp") && $this->purge == false){
                $event->setCancelled();
            }
        }
    }
    
    
    public function OnPlayerDeath(PlayerDeathEvent $event) {
        $this->api->addMoney($event->getEntity()->getName(), "500");
    }
    public function OnBlockBreak(BlockBreakEvent $block) {
        $player = $block->getPlayer();
        if ($player->isOp()){
            return true;
        }else{
            if ($this->CheckIfProtechted($player->getX(), $player->getZ(), "edit")){
                $block->setCancelled();
                return true;
            }else{
                return true;
            }
        }
    }
    
    
                }
            
        
    
    
    
    