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
	    if(!is_dir($this->getDataFolder())){
			mkdir($this->getDataFolder());
	    $this->saveDefaultConfig();
    }
    public function onDisable(){
              $this->getLogger()->info(TF::RED . "Wild disabled!");
    }
    
    public function onCommand(CommandSender $s, Command $cmd, string $label, array $args) : bool{
    if(strtolower($cmd->getName() == "wild")){
        if($s instanceof Player){
		$minX = $this->getConfig()->get("min_X_Cord");
		$maxX = $this->getConfig()->get("max_X_Cord");
		$minZ = $this->getConfig()->get("min_Z_Cord");
		$maxZ = $this->getConfig()->get("max_Z_Cord");
            $x = rand($min_X_Cord,$max_X_Cord);
            $y = 128;
            $z = rand($min_Z_Cord,$max_Z_Cord);
		$level = Server::getInstance()->getConfig("World");
		//LINE 32 needs to be checkd that what the error is should be easy im just tired xD
            $s->teleport($s->getLevel()->getSafeSpawn(new Vector3($x, $y, $z, $level)));
            $s->addTitle->getConfig("Name");
	    $s->sendMessage->getConfig("Text");
            $this->iswildin[$s->getName()] = true;
        
        }
        }else{
            $s->sendMessage(TF::RED."You dont have permission");
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
