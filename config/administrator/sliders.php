<?php

/**
 * Actors model config
 */
return array(
    'form_width' => 600,
    'title' => 'Slides',
    'single' => 'slide',
    'model' => 'App\Slider',
    /**
     * The display columns
     */
    'columns' => array(
        'id',    
        'title' => array(
            'title' => 'Título'
        )
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'title' => array(
            'title' => 'Título',
        ),
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'image' => array(
            'title' => 'Image',
            'type' => 'image',
            'location' => public_path() . '/uploads/sliders/originals/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
                array(1500, 400, 'crop', public_path() . '/uploads/sliders/', 100)
            )
        ),                
        'title' => array(
            'title' => 'Título',
            'type' => 'text',
        ),        
    ),
    'rules' => array(
        'title' => 'required',
        'image' => 'required'
    )
);
