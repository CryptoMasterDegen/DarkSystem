<?php

namespace pocketmine\network\multiversion;

use pocketmine\inventory\PlayerInventory;
use pocketmine\inventory\PlayerInventory120;
use pocketmine\Player;
use pocketmine\network\protocol\ContainerSetContentPacket;
use pocketmine\network\protocol\ContainerSetSlotPacket;
use pocketmine\network\protocol\Info as ProtocolInfo;
use pocketmine\network\protocol\v120\InventoryContentPacket;
use pocketmine\network\protocol\v120\InventorySlotPacket;

abstract class Multiversion{
	
	public static function getPlayerInventory($player) {
		switch ($player->protocol) {
			case ProtocolInfo::PROTOCOL_120:
				return new PlayerInventory120($player);
			default:
				return new PlayerInventory($player);
		}
	}
	
	public static function sendContainer($player, $windowId, $items) {
		$protocol = $player->getPlayerProtocol();
		if ($protocol >= ProtocolInfo::PROTOCOL_120) {
			$pk = new InventoryContentPacket();
			$pk->inventoryID = $windowId;
			$pk->items = $items;
		} else {
			$pk = new ContainerSetContentPacket();			
			$pk->windowid = $windowId;
			$pk->slots = $items;
			$pk->eid = $player->getId();
		}
		
		$player->dataPacket($pk);
	}
	
	public static function sendContainerSlot($player, $windowId, $item, $slot) {
		$protocol = $player->getPlayerProtocol();
		if ($protocol >= ProtocolInfo::PROTOCOL_120) {
			$pk = new InventorySlotPacket();
			$pk->containerId = $windowId;
			$pk->item = $item;
			$pk->slot = $slot;
		} else {
			$pk = new ContainerSetSlotPacket();			
			$pk->windowid = $windowId;
			$pk->item = $item;
			$pk->slot = $slot;
		}
		
		$player->dataPacket($pk);
	}
	
}
