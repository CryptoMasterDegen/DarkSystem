<?php

namespace pocketmine\ui\elements\customForm;

use pocketmine\ui\elements\UIElement;

class Dropdown extends UIElement{
	
	/** @var string[] */
	protected $options = [];
	/** @var integer */
	protected $defaultOptionIndex = 0;
	
	/**
	 * 
	 * @param string $text
	 * @param string[] $options
	 */
	public function __construct($text, $options = []) {
		$this->text = $text;
		$this->options = $options;
	}
	
	/**
	 * 
	 * @param string $optionText
	 * @param boolean $isDefault
	 */
	public function addOption($optionText, $isDefault = false) {
		if ($isDefault) {
			$this->defaultOptionIndex = count($this->options);
		}
		$this->options[] = $optionText;
	}
	
	/**
	 * 
	 * @param string $optionText
	 * @return boolean
	 */
	public function setOptionAsDefault($optionText) {
		$index = array_search($optionText, $this->options);
		if ($index === false) {
			return false;
		}
		$this->defaultOptionIndex = $index;
		return true;
	}
	
	/**
	 * Replace all options
	 * 
	 * @param string[] $options
	 */
	public function setOptions($options) {
		$this->options = $options;
	}

	/**
	 * 
	 * @return array
	 */
	final public function getDataToJson() {
		return [
			'type' => 'dropdown',
			'text' => $this->text,
			'options' => $this->options,
			'default' => $this->defaultOptionIndex
		];
	}

	public function handle($value, $player) {
		
	}
	
}