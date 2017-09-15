<?php

#______           _    _____           _                  
#|  _  \         | |  /  ___|         | |                 
#| | | |__ _ _ __| | _\ `--. _   _ ___| |_ ___ _ __ ___   
#| | | / _` | '__| |/ /`--. \ | | / __| __/ _ \ '_ ` _ \  
#| |/ / (_| | |  |   </\__/ / |_| \__ \ ||  __/ | | | | | 
#|___/ \__,_|_|  |_|\_\____/ \__, |___/\__\___|_| |_| |_| 
#                             __/ |                       
#                            |___/

namespace pocketmine\network\mcpe;

use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\network\protocol\AddHangingEntityPacket;
use pocketmine\network\protocol\AddItemEntityPacket;
use pocketmine\network\protocol\AddItemPacket;
use pocketmine\network\protocol\AddPaintingPacket;
use pocketmine\network\protocol\AddPlayerPacket;
use pocketmine\network\protocol\AdventureSettingsPacket;
use pocketmine\network\protocol\AnimatePacket;
use pocketmine\network\protocol\AvailableCommandsPacket;
use pocketmine\network\protocol\BlockEntityDataPacket;
use pocketmine\network\protocol\BlockEventPacket;
use pocketmine\network\protocol\BlockPickRequestPacket;
use pocketmine\network\protocol\BossEventPacket;
use pocketmine\network\protocol\ChangeDimensionPacket;
use pocketmine\network\protocol\ChunkRadiusUpdatedPacket;
use pocketmine\network\protocol\ClientboundMapItemDataPacket;
use pocketmine\network\protocol\ClientToServerHandshakePacket;
use pocketmine\network\protocol\CommandBlockUpdatePacket;
use pocketmine\network\protocol\CommandStepPacket;
use pocketmine\network\protocol\ContainerClosePacket;
use pocketmine\network\protocol\ContainerOpenPacket;
use pocketmine\network\protocol\ContainerSetContentPacket;
use pocketmine\network\protocol\ContainerSetDataPacket;
use pocketmine\network\protocol\ContainerSetSlotPacket;
use pocketmine\network\protocol\CraftingDataPacket;
use pocketmine\network\protocol\CraftingEventPacket;
use pocketmine\network\protocol\DataPacket;
use pocketmine\network\protocol\DisconnectPacket;
use pocketmine\network\protocol\DropItemPacket;
use pocketmine\network\protocol\EntityEventPacket;
use pocketmine\network\protocol\ExplodePacket;
use pocketmine\network\protocol\FullChunkDataPacket;
use pocketmine\network\protocol\HurtArmorPacket;
use pocketmine\network\protocol\InteractPacket;
use pocketmine\network\protocol\InventoryActionPacket;
use pocketmine\network\protocol\ItemFrameDropItemPacket;
use pocketmine\network\protocol\LevelEventPacket;
use pocketmine\network\protocol\LevelSoundEventPacket;
use pocketmine\network\protocol\LoginPacket;
use pocketmine\network\protocol\MapInfoRequestPacket;
use pocketmine\network\protocol\MobArmorEquipmentPacket;
use pocketmine\network\protocol\MobEffectPacket;
use pocketmine\network\protocol\MobEquipmentPacket;
use pocketmine\network\protocol\MoveEntityPacket;
use pocketmine\network\protocol\MovePlayerPacket;
use pocketmine\network\protocol\PlayerActionPacket;
use pocketmine\network\protocol\EntityFallPacket;
use pocketmine\network\protocol\PlayerInputPacket;
use pocketmine\network\protocol\PlayerListPacket;
use pocketmine\network\protocol\PlaySoundPacket;
use pocketmine\network\protocol\PlayStatusPacket;
use pocketmine\network\protocol\RemoveBlockPacket;
use pocketmine\network\protocol\RemoveEntityPacket;
use pocketmine\network\protocol\ReplaceItemInSlotPacket;
use pocketmine\network\protocol\RequestChunkRadiusPacket;
use pocketmine\network\protocol\ResourcePackChunkDataPacket;
use pocketmine\network\protocol\ResourcePackChunkRequestPacket;
use pocketmine\network\protocol\ResourcePackClientResponsePacket;
use pocketmine\network\protocol\ResourcePackDataInfoPacket;
use pocketmine\network\protocol\ResourcePacksInfoPacket;
use pocketmine\network\protocol\ResourcePackStackPacket;
use pocketmine\network\protocol\RespawnPacket;
use pocketmine\network\protocol\RiderJumpPacket;
use pocketmine\network\protocol\ServerToClientHandshakePacket;
use pocketmine\network\protocol\SetCommandsEnabledPacket;
use pocketmine\network\protocol\SetDifficultyPacket;
use pocketmine\network\protocol\SetEntityDataPacket;
use pocketmine\network\protocol\SetEntityLinkPacket;
use pocketmine\network\protocol\SetEntityMotionPacket;
use pocketmine\network\protocol\SetHealthPacket;
use pocketmine\network\protocol\SetPlayerGameTypePacket;
use pocketmine\network\protocol\SetSpawnPositionPacket;
use pocketmine\network\protocol\SetTimePacket;
use pocketmine\network\protocol\SetTitlePacket;
use pocketmine\network\protocol\ShowCreditsPacket;
use pocketmine\network\protocol\SpawnExperienceOrbPacket;
use pocketmine\network\protocol\StartGamePacket;
use pocketmine\network\protocol\StopSoundPacket;
use pocketmine\network\protocol\TakeItemEntityPacket;
use pocketmine\network\protocol\TextPacket;
use pocketmine\network\protocol\TransferPacket;
use pocketmine\network\protocol\UpdateAttributesPacket;
use pocketmine\network\protocol\UpdateBlockPacket;
use pocketmine\network\protocol\UpdateTradePacket;
use pocketmine\network\protocol\UseItemPacket;
use pocketmine\Server;

interface NetworkSession{

	/**
	 * @return Server
	 */
	public function getServer();

	public function handleDataPacket(DataPacket $pk);

	public function handleLogin(LoginPacket $packet) : bool;

	public function handlePlayStatus(PlayStatusPacket $packet) : bool;

	public function handleServerToClientHandshake(ServerToClientHandshakePacket $packet) : bool;

	public function handleClientToServerHandshake(ClientToServerHandshakePacket $packet) : bool;

	public function handleDisconnect(DisconnectPacket $packet) : bool;

	public function handleResourcePacksInfo(ResourcePacksInfoPacket $packet) : bool;

	public function handleResourcePackStack(ResourcePackStackPacket $packet) : bool;

	public function handleResourcePackClientResponse(ResourcePackClientResponsePacket $packet) : bool;

	public function handleText(TextPacket $packet) : bool;

	public function handleSetTime(SetTimePacket $packet) : bool;

	public function handleStartGame(StartGamePacket $packet) : bool;

	public function handleAddPlayer(AddPlayerPacket $packet) : bool;

	public function handleAddEntity(AddEntityPacket $packet) : bool;

	public function handleRemoveEntity(RemoveEntityPacket $packet) : bool;

	public function handleAddItemEntity(AddItemEntityPacket $packet) : bool;

	public function handleAddHangingEntity(AddHangingEntityPacket $packet) : bool;

	public function handleTakeItemEntity(TakeItemEntityPacket $packet) : bool;

	public function handleMoveEntity(MoveEntityPacket $packet) : bool;

	public function handleMovePlayer(MovePlayerPacket $packet) : bool;

	public function handleRiderJump(RiderJumpPacket $packet) : bool;

	public function handleRemoveBlock(RemoveBlockPacket $packet) : bool;

	public function handleUpdateBlock(UpdateBlockPacket $packet) : bool;

	public function handleAddPainting(AddPaintingPacket $packet) : bool;

	public function handleExplode(ExplodePacket $packet) : bool;

	public function handleLevelSoundEvent(LevelSoundEventPacket $packet) : bool;

	public function handleLevelEvent(LevelEventPacket $packet) : bool;

	public function handleBlockEvent(BlockEventPacket $packet) : bool;

	public function handleEntityEvent(EntityEventPacket $packet) : bool;

	public function handleMobEffect(MobEffectPacket $packet) : bool;

	public function handleUpdateAttributes(UpdateAttributesPacket $packet) : bool;

	public function handleMobEquipment(MobEquipmentPacket $packet) : bool;

	public function handleMobArmorEquipment(MobArmorEquipmentPacket $packet) : bool;

	public function handleInteract(InteractPacket $packet) : bool;

	public function handleBlockPickRequest(BlockPickRequestPacket $packet) : bool;

	public function handleUseItem(UseItemPacket $packet) : bool;

	public function handlePlayerAction(PlayerActionPacket $packet) : bool;

	public function handleEntityFall(EntityFallPacket $packet) : bool;

	public function handleHurtArmor(HurtArmorPacket $packet) : bool;

	public function handleSetEntityData(SetEntityDataPacket $packet) : bool;

	public function handleSetEntityMotion(SetEntityMotionPacket $packet) : bool;

	public function handleSetEntityLink(SetEntityLinkPacket $packet) : bool;

	public function handleSetHealth(SetHealthPacket $packet) : bool;

	public function handleSetSpawnPosition(SetSpawnPositionPacket $packet) : bool;

	public function handleAnimate(AnimatePacket $packet) : bool;

	public function handleRespawn(RespawnPacket $packet) : bool;

	public function handleDropItem(DropItemPacket $packet) : bool;

	public function handleInventoryAction(InventoryActionPacket $packet) : bool;

	public function handleContainerOpen(ContainerOpenPacket $packet) : bool;

	public function handleContainerClose(ContainerClosePacket $packet) : bool;

	public function handleContainerSetSlot(ContainerSetSlotPacket $packet) : bool;

	public function handleContainerSetData(ContainerSetDataPacket $packet) : bool;

	public function handleContainerSetContent(ContainerSetContentPacket $packet) : bool;

	public function handleCraftingData(CraftingDataPacket $packet) : bool;

	public function handleCraftingEvent(CraftingEventPacket $packet) : bool;

	public function handleAdventureSettings(AdventureSettingsPacket $packet) : bool;

	public function handleBlockEntityData(BlockEntityDataPacket $packet) : bool;

	public function handlePlayerInput(PlayerInputPacket $packet) : bool;

	public function handleFullChunkData(FullChunkDataPacket $packet) : bool;

	public function handleSetCommandsEnabled(SetCommandsEnabledPacket $packet) : bool;

	public function handleSetDifficulty(SetDifficultyPacket $packet) : bool;

	public function handleChangeDimension(ChangeDimensionPacket $packet) : bool;

	public function handleSetPlayerGameType(SetPlayerGameTypePacket $packet) : bool;

	public function handlePlayerList(PlayerListPacket $packet) : bool;

	//public function handleTelemetryEvent(EventPacket $packet) : bool; //TODO

	public function handleSpawnExperienceOrb(SpawnExperienceOrbPacket $packet) : bool;

	public function handleClientboundMapItemData(ClientboundMapItemDataPacket $packet) : bool;

	public function handleMapInfoRequest(MapInfoRequestPacket $packet) : bool; //TODO

	public function handleRequestChunkRadius(RequestChunkRadiusPacket $packet) : bool;

	public function handleChunkRadiusUpdated(ChunkRadiusUpdatedPacket $packet) : bool;

	public function handleItemFrameDropItem(ItemFrameDropItemPacket $packet) : bool;

	public function handleReplaceItemInSlot(ReplaceItemInSlotPacket $packet) : bool;

	//public function handleGameRulesChanged(GameRulesChangedPacket $packet) : bool; //TODO

	//public function handleCamera(CameraPacket $packet) : bool; //edu only :(

	public function handleAddItem(AddItemPacket $packet) : bool;

	public function handleBossEvent(BossEventPacket $packet) : bool;

	public function handleShowCredits(ShowCreditsPacket $packet) : bool;

	public function handleAvailableCommands(AvailableCommandsPacket $packet) : bool;

	public function handleCommandStep(CommandStepPacket $packet) : bool;

	public function handleCommandBlockUpdate(CommandBlockUpdatePacket $packet) : bool;

	public function handleUpdateTrade(UpdateTradePacket $packet) : bool;

	public function handleResourcePackDataInfo(ResourcePackDataInfoPacket $packet) : bool;

	public function handleResourcePackChunkData(ResourcePackChunkDataPacket $packet) : bool;

	public function handleResourcePackChunkRequest(ResourcePackChunkRequestPacket $packet) : bool;

	public function handleTransfer(TransferPacket $packet) : bool;

	public function handlePlaySound(PlaySoundPacket $packet) : bool;

	public function handleStopSound(StopSoundPacket $packet) : bool;

	public function handleSetTitle(SetTitlePacket $packet) : bool;
}