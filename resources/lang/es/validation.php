<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'La confirmación de la contraseña no coincide.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'El campo :attribute no es un email valido.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'The :attribute field is required.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'El campo :attribute no pude tener más de :max números.',
        'file'    => 'El campo :attribute no pude tener más de :max kilobytes.',
        'string'  => 'El campo :attribute no pude tener más de :max characters.',
        'array'   => 'El campo :attribute no pude tener más de :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'El campo :attribute debe tener al menos :min números.',
        'file'    => 'El campo :attribute debe tener al menos :min kilobytes.',
        'string'  => 'El campo :attribute debe tener al menos :min characters.',
        'array'   => 'El campo :attribute debe tener al menos :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'El campo :attribute solo admite números.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'El :attribute ya existe.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'password' => [
            'required' => 'La contraseña es obligatoria',
        ],
        'type3' => [
            'required' => 'Este documento es obligatorio'
        ],
        'type6' => [
            'required' => 'Este documento es obligatorio'
        ],
        'type18' => [
            'required' => 'Este documento es obligatorio'
        ],
        'type19' => [
            'required' => 'Este documento es obligatorio'
        ],
        'prd_video' => [
            'required' => 'El registro audiovisual es obligatorio'
        ]

    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'password' => '"contraseña"',
        'email' => '"correo electrónico"',

        'org_name' => '"nombre"',
        'org_city' => '"ciudad"',
        'org_address' => '"dirección"',
        'org_phone' => '"teléfono"',
        'org_mobile' => '"celular"',
        'org_email' => '"correo principal"',

        'prd_name' => '"nombre"',
        'prd_genre' => '"género"',
        'prd_date' => '"fecha de estreno"',

        'rep_name' => '"nombres"',
        'rep_last_name' => '"apellidos"',
        'rep_doc_typ' => '"tipo de documento"',
        'rep_doc_number' => '"numero de documento"',
        'rep_mobile' => '"celular"',
        'rep_email' => '"correo institucional"',
        'rep_email1' => '"correo electrónico"',

        'type1' => '"sinópsis"',
        'type2' => '"libreto"',
        'type5' => '"dossier"',
        'type7' => '"hoja de vida"',
        'type8' => '"logo"',
        'type9' => '"camara de comercio"',
        'type10' => '"reseña"',
        'type11' => '"propuesta de dirección"',
        'type12' => '"propuesta estética"',
        'type13' => '"cronograma"',
        'type14' => '"presupuesto"',
        'type15' => '"propuesta de financiación"',
        'type16' => '"hoja de vida de la agrupación"',
        'type17' => '"carta de compromiso"',
    ],

];
