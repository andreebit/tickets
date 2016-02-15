<?php

/**
 * Actors model config
 */
return array(
    'form_width' => 600,
    'title' => 'Precios',
    'single' => 'precio',
    'model' => 'App\Price',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'event' => array(
            'title' => "Evento",
            'relationship' => 'event',
            'select' => "(:table).name",
        ),
        'description' => array(
            'title' => 'Descripción'
        ),
        'value' => array(
            'title' => 'Valor',
            'output' => function($value) {
                return trans('currency.symbol') . ' ' . $value;
            }
        )
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'event' => array(
            'type' => 'relationship',
            'title' => 'Evento',
            'name_field' => 'name'
        )
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'event' => array(
            'type' => 'relationship',
            'title' => 'Evento',
            'name_field' => 'name',
            'num_options' => 5
        ),
        'description' => array(
            'title' => 'Descripción',
            'type' => 'text',
        ),
        'value' => array(
            'type' => 'number',
            'title' => 'Valor',
            'decimals' => 2,
            'thousands_separator' => ',',
            'decimal_separator' => '.',
        )
    ),
    'rules' => array(
        'event_id' => 'required',
        'description' => 'required',
        'value' => 'required'
    )
);
