<?php

namespace EffectOrb;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\entity\Effect;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;


class Main extends PluginBase implements Listener {
	
	public function onEnable() {
		
		$this->saveDefaultConfig();
		$this->getServer()->getLogger()->notice("EffectOrb has been enabled!");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		
	}
	
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
		
		if(strtolower($command->getName()) === "orb") {
			
			if(count($args) < 1) {
			
				$sender->sendMessage(TF::RED . "Please use: /orb <player>");
				return true;
			 
			}
			$player = $sender->getServer()->getPlayer($args[0]);
		   if(!$player instanceof Player) {
			   $sender->sendMessage(TF::RED . "Player not found!");
			   return true;
			   
			   }
			if($sender->hasPermission("orb.cmd") || $sender->isOp()){
				
									
							$orb = Item::get(Item::SLIME_BALL, 2, 1);
							$orb->setCustomName(TF::RESET . TF::BOLD . TF::GREEN . "Effect Orb" . TF::RESET . TF::GRAY . " (Tap anywhere)" . PHP_EOL . PHP_EOL . 
							TF::DARK_GRAY . " *" . TF::AQUA . " Chance to get: " . PHP_EOL .
							TF::DARK_GRAY . " *" . TF::GRAY . "Effects");
							
							$player->getInventory()->addItem($orb);

				}
			}
			
			if(!$sender->hasPermission("orb.cmd")) {
				
				$sender->sendMessage(TF::RED . "You don't have permission to use this command.");
				
			}
			
			else {
				
				$sender->sendMessage(TF::GREEN . "Successfully added the Effect Orb.");
				
		}
		
		return true;
		
	}
	
	public function onInteract(PlayerInteractEvent $event) {
		
		$player = $event->getPlayer();
		
		if($event->getItem()->getId() === 341) {
		
		$damage = $event->getItem()->getDamage();
			
		if($damage === 2) {
				
				$random = rand(1, 5);
				
	switch($random) {
				
				case 1:
				
				$orb = Item::get(Item::SLIME_BALL, 2, 1);
   
				foreach($this->getConfig()->get("first-orb") as $effects) {
				
$effect = Effect::getEffect($effects);

$effect->setDuration("60" * 5);
                                                    $effect->setAmplifier("3");
                                                    $player->addEffect($effect);
				    }
				
				$player->addTitle(TF::YELLOW . "Used" . TF::GREEN . "Effect Orb");
				$player->getInventory()->removeItem($orb);
				
				break;
				
				case 2:
				
				$orb = Item::get(Item::SLIME_BALL, 2, 1);
   
				foreach($this->getConfig()->get("second-orb") as $effects) {
				
$effect = Effect::getEffect($effects);

$effect->setDuration("60" * 5);
                                                    $effect->setAmplifier("3");
                                                    $player->addEffect($effect);
				    }
				
				$player->addTitle(TF::YELLOW . "Used" . TF::GREEN . "Effect Orb");
				$player->getInventory()->removeItem($orb);
				
				break;
				
				case 3:
				
				$orb = Item::get(Item::SLIME_BALL, 2, 1);
   
				foreach($this->getConfig()->get("third-orb") as $effects) {
				
$effect = Effect::getEffect($effects);

$effect->setDuration("60" * 5);
                                                    $effect->setAmplifier("3");
                                                    $player->addEffect($effect);
				    }
				
				$player->addTitle(TF::YELLOW . "Used" . TF::GREEN . "Effect Orb");
				$player->getInventory()->removeItem($orb);
				
				break;
				
				case 4:
				
				$orb = Item::get(Item::SLIME_BALL, 2, 1);
   
				foreach($this->getConfig()->get("fourth-orb") as $effects) {
				
$effect = Effect::getEffect($effects);

$effect->setDuration("60" * 5);
                                                    $effect->setAmplifier("3");
                                                    $player->addEffect($effect);
				    }
				
				$player->addTitle(TF::YELLOW . "Used" . TF::GREEN . "Effect Orb");
				$player->getInventory()->removeItem($orb);
				
				break;
				
				case 5:
				
				$orb = Item::get(Item::SLIME_BALL, 2, 1);
   
				foreach($this->getConfig()->get("fifth-orb") as $effects) {
				
$effect = Effect::getEffect($effects);

$effect->setDuration("60" * 5);
                                                    $effect->setAmplifier("3");
                                                    $player->addEffect($effect);
	            }
				
				$player->addTitle(TF::YELLOW . "Used" . TF::GREEN . "Effect Orb");
				$player->getInventory()->removeItem($orb);
				
				break;
				
            	}
			}
		}
	}
}
