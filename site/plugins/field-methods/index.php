<?php
Kirby::plugin('jaume/field-methods', [
    'fieldMethods' => [
        'ifAndOr' => function ($field, $and = ' | ', $or = '') {
            $out = $field->isNotEmpty() ? $field->value() . $and : $or;
            return $out;
        },
        'toPagesAndDrafts' => function ($field) {
            $these = $field->yaml();
            $result = new Pages();
            foreach ($these as $page) {
                $result->add(kirby()->page($page));
            }
            return $result;
        },
    ]
]);