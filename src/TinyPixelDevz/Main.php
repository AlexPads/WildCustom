<?php
namespace TinyPixelDevz;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\math\Vector3;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageEvent;
class Main extends PluginBase implements Listener{
    
    public $iswildin = [];
    
    public function onEnable(){
              $this->getServer()->getPluginManager()->registerEvents($this, $this);
              $this->getLogger()->info(TF::GREEN . "Wild enabled!");
			  
    }
    public function onDisable(){
              $this->getLogger()->info(TF::RED . "Wild disabled!");
    }
    
    public function onCommand(CommandSender $s, Command $cmd, string $label, array $args) : bool{
    if(strtolower($cmd->getName() == "wild")){
        if($s instanceof Player){
		$minxcord = $this->getConfig()->get("minxcord");
		$maxxcord = $this->getConfig()->get("maxxcord");
		$minzcord = $this->getConfig()->get("minzcord");
		$maxzcord = $this->getConfig()->get("maxzcord");
            $x = rand($minxcord,$maxxcord);
            $y = 128;
            $z = rand($minzcord,$maxzcord);
		$world = $this->getConfig()->get("World");
		$level = Server::getInstance()->getLevelByName($world);
            $s->teleport(new Position($x, $y, $z, $level));
            $s->addTitle($this->getConfig()->get("Name"));
	    $s->sendMessage($this->getConfig()->get("Text"));
            $this->iswildin[$s->getName()] = true;
        
        }
        }else{
            $s->sendMessage($this->getConfig()->get("no_permission"));
        }
        return true;
    } 
    public function onDamage(EntityDamageEvent $event){
       if($event->getEntity() instanceof Player){
           if(isset($this->iswildin[$event->getEntity()->getName()])){
               $p = $event->getEntity();
               unset($this->iswildin[$p->getName()]);
                     $event->setCancelled();
           }
       }
    }
}