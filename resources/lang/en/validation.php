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

    'accepted' => ':attribute duhet pranuar.',
    'accepted_if' => ':attribute duhet pranuar kur :other është :value.',
    'active_url' => ':attributenuk është një URL e vlefshme.',
    'after' => ':attribute duhet të jetë një datë pas :date.',
    'after_or_equal' => ':attribute duhet të jetë një datë pas ose e barabartë me :date.',
    'alpha' => ':attribute duhet të përmbajë vetëm shkronja.',
    'alpha_dash' => ':attribute duhet të përmbajë vetëm shkronja, numra, vizat ne mes dhe nënvizat  .',
    'alpha_num' => ':attribute duhet të përmbajë vetëm shkronja and numra.',
    'array' => ':attribute must be an array.',
    'before' => ':attribute duhet të jetë një datë më parë :date.',
    'before_or_equal' => ':attribute duhet të jetë një datë më parë ose e barabartë me :date.',
    'between' => [
        'numeric' => ':attribute duhet të jetë ndërmjet :min dhe :max.',
        'file' => ':attribute duhet të jetë ndërmjet :min dhe :max kilobytes.',
        'string' => ':attribute duhet të jetë ndërmjet :min dhe :max shkronjave.',
        'array' => ':attribute must have between :min dhe :max items.',
    ],
    'boolean' => ':attribute field must be true or false.',
    'confirmed' => ':attribute konfirmimi nuk përputhet.',
    'current_password' => 'fjalëkalimi është i pasaktë.',
    'date' => ':attribute nuk është një datë e vlefshme.',
    'date_equals' => ':attribute duhet të jetë një datë e barabartë me :date.',
    'date_format' => ':attribute nuk përputhet me formatin :format.',
    'declined' => ':attribute duhet të refuzohet.',
    'declined_if' => ':attribute duhet të refuzohet kur :other është :value.',
    'different' => ':attribute dhe :other duhet të jetë diferente.',
    'digits' => ':attribute duhet të jetë :digits shifrave.',
    'digits_between' => ':attribute duhet të jetë ndërmjet :min dhe :max shifrave.',
    'dimensions' => ':attribute ka dimensione të pavlefshme imazhi.',
    'distinct' => ':attribute fusha ka një vlerë të dyfishtë.',
    'email' => ':attribute Duhet të jetë një email i vlefshme.',
    'ends_with' => ':attribute duhet të përfundojë me një nga sa vijon: :values.',
    'enum' => 'selected :attribute is invalid.',
    'exists' => 'selected :attribute is invalid.',
    'file' => ':attribute duhet të jetë a file.',
    'filled' => ':attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute duhet të jetë greater than :value.',
        'file' => 'The :attribute duhet të jetë greater than :value kilobytes.',
        'string' => 'The :attribute duhet të jetë greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal to :value.',
        'file' => 'The :attribute must be greater than or equal to :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal to :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => ':attribute duhet te jetë foto.',
    'in' => 'selected :attribute is invalid.',
    'in_array' => ':attribute field does not exist in :other.',
    'integer' => ':attribute duhet te jetë numer.',
    'ip' => ':attribute duhet te jetë IP address e vlefshme.',
    'ipv4' => ':attribute duhet te jetë IPv4 address e vlefshme.',
    'ipv6' => ':attribute duhet te jetë IPv6 address e vlefshme.',
    'mac_address' => ':attribute duhet te jetë MAC address e vlefshme.',
    'json' => 'The :attribute duhet te jetë JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'string' => 'The :attribute must be less than or equal to :value karaktere.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute nuk duhet të jetë më i madh se :max.',
        'file' => 'The :attribute nuk duhet të jetë më i madh se :max kilobytes.',
        'string' => 'The :attribute nuk duhet të jetë më i madh se :max karaktere.',
        'array' => 'The :attribute must not have more than :max items.',
    ],
    'mimes' => ':attribute duhet të jetë një fajll i tipit: :values.',
    'mimetypes' => ':attribute duhet të jetë një fajll i tipit: :values.',
    'min' => [
        'numeric' => ':attribute duhet të jetë së paku :min.',
        'file' => ':attribute duhet të jetë së paku :min kilobytes.',
        'string' => ':attribute duhet të jetë së paku :min karaktere.',
        'array' => ':attribute must have at least :min items.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => ':attribute formati është i pavlefshëm.',
    'numeric' => ':attribute duhet të jetë be a number.',
    'password' => 'Fjalkalimi është i pa saktë.',
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'attribute formati është i pavlefshëm.',
    'required' => ':attribute është e obliguar.',
    'required_if' => ':attribute është e obliguar kur :other është :value.',
    'required_unless' => ':attribute është e obliguar përveç nëse :other është në :values.',
    'required_with' => ':attribute është e obliguar kur :values është prezente.',
    'required_with_all' => ':attribute është e obliguar kur :values janë prezente.',
    'required_without' => ':attribute është e obliguar kur :values nuk është prezente.',
    'required_without_all' => ':attribute është e obliguar kur ssnjë nga :values janë prezente.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => ':attribute duhet të jetë :size.',
        'file' => ':attribute duhet të jetë :size kilobytes.',
        'string' => ':attribute duhet të jetë :size karaktere.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => ':attribute duhet të fillojë me një nga sa vijon: :values.',
    'string' => ':attribute duhet të jetë string.',
    'timezone' => ':attribute duhet të jetë timezone e vlefshme.',
    'unique' => ':attribute është marrë tashmë.',
    'uploaded' => ':attribute dështoi në ngarkim.',
    'url' => ':attribute duhet të jetë URL duhet të fillojë me një nga sa vijon.',
    'uuid' => ':attribute duhet të jetë UUID duhet të fillojë me një nga sa vijon.',

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
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
