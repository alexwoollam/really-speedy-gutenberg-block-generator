<?php

namespace Block\Config\Checks;

class Xml {

    public $XmlTrue = false;

    public $config;

    public function __construct(){
        $this->config  = BLOCK_DIR;
        $this->config .= '/block.xml';
        $this->check_is_xml_exists();
    }

    public function check_is_xml_exists(){
        if ( file_exists( $this->config ) ){
            $this->XmlTrue = true;
        }
    }
}
