<?php

namespace Block\Config;

use Timber\Timber;
use Block\Config\Checks\Xml;

class Settings{

    public $settings = [];
    public $fields = [];
    public $build_fields = [];

    public function __construct() {
        $check = new Xml;
        if ( $check->XmlTrue ) {
            $this->get_config_settings( $check->config );
        }
        $this->set_view_folder();
    }

    public function set_view_folder(){
        Timber::$locations = BLOCK_DIR . '/block/View';
    }

    public function get_config_settings( $config ) {
        $xml = file_get_contents( $config );
        $settings = new \SimpleXMLElement($xml);
        $this->set_general_settings( $settings );
        $this->set_fields( $settings );
        
    }

    public function set_general_settings( $settings ) {
        foreach ($settings->attributes->attributes() as $key => $element) {
            $value = $element->__toString();
            $this->settings[$key] = $value;
        }
    }

    public function set_fields( $settings ) {
        
        $this->build_fields = $this->xml2array( $settings->fields );

        foreach( $this->build_fields as $index => $field ){
            foreach( $field as $value ){
                $this->fields[$index] = $value;
            }
        }
    }

    public function xml2array ( $xmlObject, $out = array () ){
        foreach ( (array) $xmlObject as $index => $node )
            $out[$index] = ( is_object ( $node ) ) ? $this->xml2array ( $node ) : $node;

        return $out;
    }

    public function get_title(){
        return $this->settings['title'];
    }

    public function get_description(){
        return $this->settings['description'];
    }

    public function get_icon(){
        return $this->settings['icon'];
    }

    public function get_preview_mode(){
        if( $this->settings['preview_mode'] == 'true' ) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_category(){
        return $this->settings['category'];
    }

    public function get_editor_style(){
        if ( $this->settings['set_editor_style'] ) {
            return $this->settings['set_editor_style'];
        }
    }

    public function get_fields(){
        return $this->fields;
    }


}