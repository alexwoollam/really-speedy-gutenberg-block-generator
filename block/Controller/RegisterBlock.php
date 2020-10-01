<?php
namespace Block\Controller;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use Carbon_Fields\Container;

use Timber\Timber;

use Block\Config\Settings;
use Block\Controller\Enqueue;

class RegisterBlock{

    public $fields = [];

    public $calls = [];

    public function __construct(){
        new Settings;
        new Enqueue;
        $this->make();

    }

    public function get_fields( $fields ){
        
        $returned_fields = [];

        foreach( $fields as $type => $value ){
            $field = new Field();
            $make  = 'make';
            $returned_fields[] = $field->$make( $type, $value['name'], $value['title']);
        }
        return $returned_fields;
    }

    public function render( $fields, $attributes, $inner_blocks ){
        $context = Timber::get_context();
        $context['block'] = $fields;

        Timber::render( 'block.twig', $context );
    }

    public function make(){

        $settings = new Settings();
        
        Block::make( __( $settings->get_title() ) )
        ->add_fields(
            $this->get_fields( $settings->get_fields() )
        )
        ->set_render_callback( 
            function ( $fields, $attributes, $inner_blocks ) {
               
               $this->render( $fields, $attributes, $inner_blocks );
            }
        )
        ->set_icon(
            $settings->get_icon()
        )
        ->set_preview_mode( 
            $settings->get_preview_mode()
        )
        ->set_description(
            $settings->get_description()
        )
        ->set_category( 
            $settings->get_category() 
        );
    }
}

