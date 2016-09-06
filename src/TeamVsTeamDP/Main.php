<?php

/*
  ____          _  ___                                
 |  _ \        | |/ / |                               
 | |_) |_   _  | ' /| |__   __ ___   ___ __ ___   ___ 
 |  _ <| | | | |  < | '_ \ / _` \ \ / / '_ ` _ \ / __|
 | |_) | |_| | | . \| | | | (_| |\ V /| | | | | | (__ 
 |____/ \__, | |_|\_\_| |_|\__,_| \_/ |_| |_| |_|\___|
         __/ |                                        
        |___/                                         
*/

namespace TeamVSTeamDP;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\level\Position;
use pocketmine\item\Item;
use pocketmine\inventory\InventoryBase;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {
	
	public function onEnable()
	{
	  $this->getServer()->getPluginManager()->registerEvents($this, $this);
		@mkdir($this->getDataFolder());
		$xyz_red = [
				"xr" => 0,
				"yr" => 0,
				"zr" => 0,
		  ];
		$cfg = new Config($this->getDataFolder(), "Config.yml", Config::YAML, $xyz_red);
		$xyz_blue = [
				"xb" => 0,
				"yb" => 0,
				"zb" => 0,
		  ];
		$cfg = new Config($this->getDataFolder(), "Config.yml", Config::YAML, $xyz_blue);
		$cfg->save();
        }
        
	public function onCommand(CommandSender $player, Command $cmd, $label, array $args) {
   if($cmd->getName() == 'tvt'){
    switch(mt_rand(1,2)){
     case 1:
      {
      $player->getInventory()->clearAll();
      $customColor = 0x00ff3300;

    $i= Item::get(298);

    $tempTag = new CompoundTag("", []);

    $tempTag->customColor = new IntTag("customColor", $customColor);

    $i->setCompoundTag($tempTag);

    $i->setCustomName("Â§cRed Helmet");
    
    $player->getInventory()->setHelmet($i);
      $customColor = 0x00ff3300;

    $i= Item::get(299);

    $tempTag = new CompoundTag("", []);

    $tempTag->customColor = new IntTag("customColor", $customColor);

    $i->setCompoundTag($tempTag);

    $player->getInventory()->setChestplate($i);
      $customColor = 0x00ff3300;

    $i= Item::get(300);

    $tempTag = new CompoundTag("", []);

    $tempTag->customColor = new IntTag("customColor", $customColor);

    $i->setCompoundTag($tempTag);

    $player->getInventory()->setLeggings($i);
      $customColor = 0x00ff3300;

    $i= Item::get(301);

    $tempTag = new CompoundTag("", []);

    $tempTag->customColor = new IntTag("customColor", $customColor);

    $i->setCompoundTag($tempTag);

    $player->getInventory()->setBoots($i);
    $i= Item::get(261);
    $player->getInventory()->addItem($i);
    $i= Item::get(262, 0, 64);
    $player->getInventory()->addItem($i);
    $i= Item::get(364, 0, 64);
    $player->getInventory()->addItem($i);
    $i= Item::get(272);
    $player->getInventory()->addItem($i);
       $team = "Â§f[Â§lÂ§cRedÂ§f]";
       $xr = $this->getConfig()->get("xr");
       $yr = $this->getConfig()->get("yr");
       $zr = $this->getConfig()->get("zr");
       $player->teleport(new position($xr, $yr, $zr));
       $this->getConfig()->save();
      }
                                         $name = $player->getName();
                                        $player->setNameTag("$team " . $name);
					$player->sendMessage("Â§lÂ§fYou Are Now In: " . $team);
				break;
     case 2:
      {
      $player->getInventory()->clearAll();
    $customColor = 0x003333ff;

    $i= Item::get(298);

    $tempTag = new CompoundTag("", []);

    $tempTag->customColor = new IntTag("customColor", $customColor);

    $i->setCompoundTag($tempTag);

    $player->getInventory()->setHelmet($i);
      $customColor = 0x003333ff;

    $i= Item::get(299);

    $tempTag = new CompoundTag("", []);

    $tempTag->customColor = new IntTag("customColor", $customColor);

    $i->setCompoundTag($tempTag);

    $player->getInventory()->setChestplate($i);
      $customColor = 0x003333ff;

    $i= Item::get(300);

    $tempTag = new CompoundTag("", []);

    $tempTag->customColor = new IntTag("customColor", $customColor);

    $i->setCompoundTag($tempTag);

    $player->getInventory()->setLeggings($i);
      $customColor = 0x003333ff;

    $i= Item::get(301);

    $tempTag = new CompoundTag("", []);

    $tempTag->customColor = new IntTag("customColor", $customColor);

    $i->setCompoundTag($tempTag);

    $player->getInventory()->setBoots($i);
    $i= Item::get(261);
    $player->getInventory()->addItem($i);
    $i= Item::get(262, 0, 64);
    $player->getInventory()->addItem($i);
    $i= Item::get(364, 0, 64);
    $player->getInventory()->addItem($i);   
    $i= Item::get(272);
    $player->getInventory()->addItem($i);
    $team = "Â§f[Â§lÂ§9BlueÂ§f]";
    $xb = $this->getConfig()->get("xb");
    $yb = $this->getConfig()->get("yb");
    $zb = $this->getConfig()->get("zb");
    $player->teleport(new position($xb, $yb, $zb));
    $this->getConfig()->save();
      }
                                      $name = $player->getName();
                                        $player->setNameTag("$team " . $name);
					$player->sendMessage("Â§lÂ§fYou Are Now In: " . $team);
                                        foreach($this->getServer()->getOnlinePlayers() as $player)
                                        {
                                       
 }
        
				
			return true;
			
        }
        }
        }

        public function onEntityDamage(EntityDamageEvent $event){
            if ($event instanceof EntityDamageByEntityEvent) {
                if ($event->getEntity() instanceof Player && $event->getDamager() instanceof Player) {
            $golpeado = $event->getEntity()->getNameTag();
            $golpeador = $event->getDamager()->getNameTag();
            if ((strpos($golpeado, "Â§f[Â§lÂ§cRedÂ§f]") !== false) && (strpos($golpeador, "Â§f[Â§lÂ§cRedÂ§f]") !== false)) { 

                $event->setCancelled();
}
                    
else if ((strpos($golpeado, "Â§f[Â§lÂ§9BlueÂ§f]") !== false) && (strpos($golpeador, "Â§f[Â§lÂ§9BlueÂ§f]") !== false)) {
                    
                $event->setCancelled();
}
                    
else if ((strpos($golpeado, "Â§f[Â§lÂ§aGreenÂ§f]") !== false) && (strpos($golpeador, "Â§f[Â§lÂ§aGreenÂ§f]") !== false)) {
                    
                $event->setCancelled();
}
                    
else if ((strpos($golpeado, "Â§f[Â§lÂ§eYellowÂ§f]") !== false) && (strpos($golpeador, "Â§f[Â§lÂ§eYellowÂ§f]") !== false)) {
                    
                $event->setCancelled();
}
}
            
        }
            }
            
        public function onDisable(){
          $this->getConfig()->save();
        }
}
