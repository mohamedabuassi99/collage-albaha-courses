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
    'accepted'             => ' :attribute يجب أن تكون مقبول.',
    'active_url'           => ' :attribute ليس رابط URL صالح.',
    'after'                => ' :attribute يجب أن يكون تاريخ بعد :date.',
    'after_or_equal'       => ' :attribute يجب أن يكون تاريخ بعد أو مساوي ل :date.',
    'alpha'                => ' :attribute يمكن أن يحتوي على حروف فقط.',
    'alpha_dash'           => ' :attribute يمكن أن يحتوي على حروف وأرقام وشرطات فقط.',
    'alpha_num'            => ' :attribute يمكن أن يحتوي على حروف وأرقام فقط.',
    'array'                => ' :attribute يجب أن يكون مصفوفة.',
    'before'               => ' :attribute يجب أن يكون تاريخ قبل :date.',
    'before_or_equal'      => ' :attribute يجب أن يكون تاريخ قبل أو مساوي ل :date.',
    'between'              => [
        'numeric' => ' :attribute يجب أن يكون بين :min و :max.',
        'file'    => ' :attribute يجب أن يكون بين :min و :max كيلوبايت.',
        'string'  => ' :attribute يجب أن يكون بين :min و :max حرف.',
        'array'   => ' :attribute يجب أن يكون بين :min و :max عنصر.',
    ],
    'boolean'              => 'الحقل :attribute يجب أن يكون true أو false.',
    'confirmed'            => 'تأكيد  :attribute غير مطابق.',
    'date'                 => ' :attribute ليس تاريخ صالح.',
    'date_format'          => ' :attribute لا يطابق التنسيق :format.',
    'different'            => ' :attribute و :other يجب أن يكونا مختلفين.',
    'digits'               => ' :يجب أن يكون :digits رقم.',
    'digits_between'       => ' :attribute يجب أن يكون بين :min و :max رقم.',
    'dimensions'           => ' :attribute لديه قياسات صورة غير صالحة.',
    'distinct'             => ' :attribute لديه قيمة متكررة.',
    'email'                => ' :attribute يجب أن يكون بريد إلكتروني صالح.',
    'exists'               => ' :attribute المختار غير صالح.',
    'file'                 => ' :attribute يجب أن يكون ملف.',
    'filled'               => 'حقل  :attribute يجب أن يحتوي على قيمة.',
    'image'                => ' :attribute يجب أن يكون صورة.',
    'in'                   => ' :attribute المختار غير صالح.',
    'in_array'             => 'حقل  :attribute غير موجود في :other.',
    'integer'              => ' :attribute يجب أن يكون رقم.',
    'ip'                   => ' :attribute يجب أن يكون عنوان IP صالح IP.',
    'ipv4'                 => ' :attribute يجب أن يكون عنوان IPv4 صالح.',
    'ipv6'                 => ' :attribute يجب أن يكون عنوان IPv6 صالح.',
    'json'                 => ' :attribute يجب أن يكون متغير JSON صالح.',
    'max'                  => [
        'numeric' => ' :attribute لا يمكن أن يكون أكبر من :max.',
        'file'    => ' :attribute لا يمكن أن يكون أكبر من :max كيلوبايت.',
        'string'  => ' :attribute لا يمكن أن تكون أكبر من :max حرف.',
        'array'   => ' :attribute لا يمكن أن تكون أكبر من :max عنصر.',
    ],
    'mimes'                => ' :attribute يجب أن يكون ملف من صيغة: :values.',
    'mimetypes'            => ' :attribute يجب أن يكون ملف من صيغة: :values.',
    'min'                  => [
        'numeric' => ' :attribute يجب أن يكون على الأقل :min.',
        'file'    => ' :attribute يجب أن يكون على الأقل :min كيلوبايت.',
        'string'  => ' :attribute يجب أن يكون على الأقل :min حرف.',
        'array'   => ' :attribute يجب أن يكون على الأقل :min عنصر.',
    ],
    'not_in'               => ' :attribute المحدد غير صالح.',
    'numeric'              => ' :attribute يجب أن يكون رقم.',
    'present'              => ' :attribute يجب أن يكون موجود.',
    'regex'                => 'الصيغة :attribute غير صالحة.',
    'required'             => 'الحقل :attribute مطلوب.',
    'required_if'          => 'الحقل :attribute مطلوب عندما يكون :other مساوي ل :value.',
    'required_unless'      => 'الحقل :attribute مطلوب إلا اذا كان :other في :values.',
    'required_with'        => 'الحقل :attribute مطلوب عندما تكون :values موجودة.',
    'required_with_all'    => 'الحقل :attribute مطلوب عندما يكون :values موجود.',
    'required_without'     => 'الحقل :attribute عندما يكون :values غير موجود.',
    'required_without_all' => 'الحقل :attribute مطلوب عندنا لا توجود أي من :values.',
    'same'                 => 'يجب أن يتطابق  :attribute و :other.',
    'size'                 => [
        'numeric' => ' :attribute يجب أن يكون :size.',
        'file'    => ' :attribute يجب أن يكون :size كيلوبايت.',
        'string'  => ' :attribute يجب أن يكون :size حرف.',
        'array'   => ' :attribute يجب أن يحتوي :size عنصر.',
    ],
    'string'               => ' :attribute يجب أن يكون متغير نصي.',
    'timezone'             => ' :attribute يجب أن يكون zone صالح.',
    'unique'               => ' :attribute مأخوذ من قبل.',
    'uploaded'             => ' :attribute فشل في الرفع.',
    'url'                  => 'صيغة :attribute غير صالحة.',

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
    |  following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name'=>'الاسم ',
        'name_en'=>'الاسم بالانجليزي',
        'email'=>'البريد الالكتروني,',
        'username'=>'اسم المستخدم',
        'password'=>'كلمة المرور',
        'password_confirmation'=>'تأكيد كلمة المرور',
        'from'=>'البداية',
        'to'=>'النهاية',
        'price'=>'السعر',
        'show'=>'عرض',
        'days'=>'ايام',
        'hours'=>'ساعات',
        'phone'=>'رقم الهاتف',
        'per_page'=>'عدد الاسئلة لكل صفحة',
        'final_mark'=>'العلامة الكاملة',
        'pass_mark'=>'الحد الادنى للنجاح',
        ''=>'',
        ''=>'',
        ''=>'',
        ''=>'',
    ],

];
