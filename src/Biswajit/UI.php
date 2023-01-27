<?php

namespace Biswajit;

use onebone\economyapi\EconomyAPI;

use jojoe77777\FormAPI\SimpleForm;

use jojoe77777\FormAPI\CustomForm;

use pocketmine\event\player\PlayerQuitEvent;

use pocketmine\player\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

use pocketmine\event\player\PlayerJoinEvent;

use pocketmine\utils\Config;

use pocketmine\scheduler\ClosureTask;

use pocketmine\Server;

use pocketmine\math\Vector3;

use pocketmine\level\sound\ClickSound;

class UI extends PluginBase implements Listener {

  

  public function onEnable() : void {

    

        $this->getLogger()->info("

        

██╗░░░░░██╗███████╗████████╗██╗░░░██╗██╗

██║░░░░░██║██╔════╝╚══██╔══╝██║░░░██║██║

██║░░░░░██║█████╗░░░░░██║░░░██║░░░██║██║

██║░░░░░██║██╔══╝░░░░░██║░░░██║░░░██║██║

███████╗██║██║░░░░░░░░██║░░░╚██████╔╝██║

╚══════╝╚═╝╚═╝░░░░░░░░╚═╝░░░░╚═════╝░╚═╝

                   By Biswajit Is Now Enabled ✅");

        $this->getServer()->getPluginManager()->registerEvents($this, $this);

        $this->saveResource("config.yml");

        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());

    }

  public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{

        switch($command->getName()){

            case "lift":

              if($sender->hasPermission("lift.cmd")){

                $this->lift($sender);

              } else {

                $sender->sendMessage("You Don't Have Permission To Use This Command");

              }

        }

        return true;

  }

  

public function lift(Player $player) {

    $form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createSimpleForm(function (Player $player, int $data = null){

      if($data === null){

				return true;			}

      switch($data){

        case 0:

            $this->getServer()->dispatchCommand($player, $this->config->get("Coal_Mine"));

            $player->sendTitle("§l§0COAL MINE");

            $player->sendMessage("§aTeleported You To §bCoal Mine");

            break;

            

         case 1:

            $this->getServer()->dispatchCommand($player, $this->config->get("Iron_Mine"));

            $player->sendTitle("§l§fIRON MINE");

            $player->sendMessage("§aTeleported You To §bIron Mine");

            break;

            

         case 2:

            $this->getServer()->dispatchCommand($player, $this->config->get("Gold_Mine"));

            $player->sendTitle("§l§eGOLD MINE");

            $player->sendMessage("§aTeleported You To §bGold Mine");

            break;

            

         case 3:

            $this->getServer()->dispatchCommand($player, $this->config->get("Lapis_Mine"));

            $player->sendTitle("§l§9LAPIS MINE");

            $player->sendMessage("§aTeleported You To §bLapis Mine");

            break;

            

         case 4:

            $this->getServer()->dispatchCommand($player, $this->config->get("Redstone_Mine"));

            $player->sendTitle("§l§cREDSTONE MINE");

            $player->sendMessage("§aTeleported You To §bRedstone Mine");

            break;

            

          case 5:

            $this->getServer()->dispatchCommand($player, $this->config->get("Emerald_Mine"));

            $player->sendTitle("§l§aEMERALD MINE");

            $player->sendMessage("§aTeleported You To §bEmerald Mine");

            break;

            

          case 6:

            $this->getServer()->dispatchCommand($player, $this->config->get("Diamond_Mine"));

            $player->sendTitle("§l§bDIAMOND MINE");

            $player->sendMessage("§aTeleported You To §bDiamond Mine");

            break;

            

          case 7:

            $this->getServer()->dispatchCommand($player, $this->config->get("sanctuary_Mine"));

            $player->sendTitle("§l§6SANCTUARY");

            $player->sendMessage("§aTeleported You To §bSanctuary");

            break;

      }

    });

    $form->setTitle("§l§cLIFT OPERATOR");

    $form->setContent("§r§9Select The Cave Which You Want To Teleport:");

    $form->addButton("§l§bCOAL MINE\n§r§l§d» §r§8Tap To Teleport", 0, "textures/items/coal");

    $form->addButton("§l§bIRON MINE\n§r§l§d» §r§8Tap To Teleport", 0, "textures/items/iron_ingot");

    $form->addButton("§l§bGOLD MINE\n§r§l§d» §r§8Tap To Teleport", 0, "textures/items/gold_ingot");

    $form->addButton("§l§bLAPIS MINE\n§r§l§d» §r§8Tap To Teleport", 0, "textures/items/dye_powder_blue");

    $form->addButton("§l§bREDSTONE MINE\n§r§l§d» §r§8Tap To Teleport", 0, "textures/items/redstone_dust");

    $form->addButton("§l§bEMERALD MINE\n§r§l§d» §r§8Tap To Teleport", 0, "textures/items/emerald");

    $form->addButton("§l§bDIAMOND MINE\n§r§l§d» §r§8Tap To Teleport", 0, "textures/items/diamond");

    $form->addButton("§l§bSANCTUARY\n§r§l§d» §r§8Tap To Teleport", 0, "textures/blocks/obsidian");

    $form->sendtoPlayer($player);

    return $form;

  }

}
