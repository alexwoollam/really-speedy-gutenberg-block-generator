<?php
/**
 * Demop block
 * 
 * @package: Block
 */

namespace Block;

use Block\Controller\RegisterBlock;

class Init {

	public $version;

	public $block_name;

	public $block_root;

	public function __construct(){

		\Carbon_Fields\Carbon_Fields::boot();
		
		$this->block_root    = BLOCK_DIR;
		$this->block_name    = BLOCK_NAME;
		$this->block_version = BLOCK_VERSION;

		new RegisterBlock;

	}

}

new Init;