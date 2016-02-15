<?php

/**
 * Actors model config
 */
return array(
    'form_width' => 600,
    'title' => 'Categorías',
    'single' => 'categoría',
    'model' => 'App\Category',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name' => array(
            'title' => 'Nombre'
        )
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'name' => array(
            'title' => 'Nombre',
        )
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name' => array(
            'title' => 'Nombre',
            'type' => 'text',
        )
    ),
    'rules' => array(
        'name' => 'required'
    )
);
