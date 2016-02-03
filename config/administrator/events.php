<?php

/**
 * Actors model config
 */
return array(
    'form_width' => 600,
    'title' => 'Eventos',
    'single' => 'evento',
    'model' => 'App\Event',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'category' => array(
            'title' => "Categoría",
            'relationship' => 'category',
            'select' => "(:table).name",
        ),        
        'name' => array(
            'title' => 'Nombre'
        ),
        'date_hour' => array(
            'title' => 'Fecha y hora'
        ),
        'summary' => array(
            'title' => 'Resumen'
        ),
        'address' => array(
            'title' => 'Dirección'
        )
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'category' => array(
            'type' => 'relationship',
            'title' => 'Categoría',
            'name_field' => 'name'
        ),
        'name' => array(
            'title' => 'Nombre',
        ),
        'date_hour' => array(
            'title' => 'Fecha y hora',
            'type' => 'datetime'
        )
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'category' => array(
            'type' => 'relationship',
            'title' => 'Categoría',
            'name_field' => 'name',
            'num_options' => 5
        ),
        'image' => array(
            'title' => 'Image',
            'type' => 'image',
            'location' => public_path() . '/uploads/events/images/originals/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
                array(65, 57, 'crop', public_path() . '/uploads/events/images/', 100)
            )
        ),
        'banner' => array(
            'title' => 'Image',
            'type' => 'image',
            'location' => public_path() . '/uploads/events/banners/originals/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
                array(65, 57, 'crop', public_path() . '/uploads/events/banners/', 100)
            )
        ),
        'date_hour' => array(
            'title' => 'Fecha y hora',
            'type' => 'datetime',
        ),
        'name' => array(
            'title' => 'Nombre',
            'type' => 'text',
        ),
        'summary' => array(
            'title' => 'Resumen',
            'type' => 'text',
        ),
        'description' => array(
            'title' => 'Descripción',
            'type' => 'wysiwyg',
        ),
        'latitude' => array(
            'title' => 'Latitud',
            'type' => 'text',
        ),
        'longitude' => array(
            'title' => 'Longitud',
            'type' => 'text',
        ),
        'address' => array(
            'title' => 'Dirección',
            'type' => 'textarea',
        ),
    ),
    'rules' => array(
        'category_id' => 'required',
        'date_hour' => 'required',
        'name' => 'required',
        'summary' => 'required',
        'description' => 'required',
        'address' => 'required'
    )
);
