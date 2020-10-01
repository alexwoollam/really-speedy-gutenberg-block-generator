<?php

namespace Block\Controller;

class Enqueue {
    public function __construct(){
        add_action( 'wp_enqueue_scripts', [ $this, 'do' ] );
    }

    public function do(){
        wp_enqueue_style(
            BLOCK_NAME,
            BLOCK_URL . '/block/Public/Assets/css/style.css'
        );
    }
    
}