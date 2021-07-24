<?php
Kirby::plugin('jaume/field-methods', [
    'fieldMethods' => [
        'ifAndOr' => function ($field, $and = ' | ', $or = '') {
            $out = $field->isNotEmpty() ? $field->value() . $and : $or;
            return $out;
        }
    ]
]);