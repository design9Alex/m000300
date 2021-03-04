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

    'accepted'             => '您必须接受 :attribute.',
    'active_url'           => ':attribute 不是一个有效的网址.',
    'after'                => ':attribute 必须是大于 :date 的日期.',
    'after_or_equal'       => ':attribute 必须是大于或等于 :date 的日期.',
    'alpha'                => ':attribute 只能是英文字母.',
    'alpha_dash'           => ':attribute 只能是英文字母、数字、短划线或下划线.',
    'alpha_num'            => ':attribute 只能是英文字母或数字.',
    'array'                => ':attribute 必须是一个数组.',
    'before'               => ':attribute 必须是小于 :date 的日期.',
    'before_or_equal'      => ':attribute 必须是小于或等于 :date 的日期.',
    'between'              => [
        'numeric' => ':attribute 的数值必须介于 :min 至 :max 之间.',
        'file'    => ':attribute 的档案大小必须在 :min KB 至 :max KB 之间.',
        'string'  => ':attribute 的长度必须是 :min 至 :max 个字符.',
        'array'   => ':attribute 数组必须有 :min 至 :max 个元素.',
    ],
    'boolean'              => ':attribute 必须是 true 或 false.',
    'confirmed'            => ':attribute 的重复确认并不吻合.',
    'date'                 => ':attribute 不是一个有效的日期.',
    'date_equals'          => ':attribute 必须与 :date 是相同日期.',
    'date_format'          => ':attribute 不符合 :format 的日期格式.',
    'different'            => ':attribute 与 :other 必须不相同.',
    'digits'               => ':attribute 必须是长度 :digits 的小数.',
    'digits_between'       => ':attribute 必须是介于 :min 至 :max 的小数.',
    'dimensions'           => ':attribute 包含了无效的图片维度.',
    'distinct'             => ':attribute 包含了重复的值.',
    'email'                => ':attribute 必须是一个有效的 Email 地址.',
    'exists'               => ':attribute 的值无效.',
    'file'                 => ':attribute 必须是一个档案.',
    'filled'               => ':attribute 为必填.',
    'gt'                   => [
        'numeric' => ':attribute 必须大于 :value.',
        'file'    => ':attribute 必须大于 :value KB.',
        'string'  => ':attribute 必须多于 :value 个字符.',
        'array'   => ':attribute 必须多于 :value 个元素.',
    ],
    'gte'                  => [
        'numeric' => ':attribute 必须大于或等于 :value.',
        'file'    => ':attribute 必须大于或等于 :value KB.',
        'string'  => ':attribute 必须多于或等于 :value 个字符.',
        'array'   => ':attribute 必须多于或等于 :value 个元素.',
    ],
    'image'                => ':attribute 必须是一张图片.',
    'in'                   => ':attribute 错误',
    'in_array'             => ':attribute 不存在于 :other.',
    'integer'              => ':attribute 必须是一个整数.',
    'ip'                   => ':attribute 必须是一个有效的 IP 地址.',
    'ipv4'                 => ':attribute 必须是一个有效的 IPv4 地址.',
    'ipv6'                 => ':attribute 必须是一个有效的 IPv6 地址.',
    'json'                 => ':attribute 必须是合规范的 JSON 字符串.',
    'lt'                   => [
        'numeric' => ':attribute 必须小于 :value.',
        'file'    => ':attribute 必须小于 :value KB.',
        'string'  => ':attribute 必须少于 :value 个字符.',
        'array'   => ':attribute 必须少于 :value 个元素.',
    ],
    'lte'                  => [
        'numeric' => ':attribute 必须小于或等于 :value.',
        'file'    => ':attribute 必须小于或等于 :value KB.',
        'string'  => ':attribute 必须少于或等于 :value 个字符.',
        'array'   => ':attribute 必须少于或等于 :value 个元素.',
    ],
    'max'                  => [
        'numeric' => ':attribute 不能大于 :max.',
        'file'    => ':attribute 不能大于 :max KB.',
        'string'  => ':attribute 不能多于 :max 个字元.',
        'array'   => ':attribute 最多只有 :max 个元素.',
    ],
    'mimes'                => ':attribute 必须是一个 :values 类型的档案.',
    'mimetypes'            => ':attribute 必须是一个 :values 类型的档案.',
    'min'                  => [
        'numeric' => ':attribute 不能小于 :min.',
        'file'    => ':attribute 不能小于 :min KB.',
        'string'  => ':attribute 不能少于 :min 个字符.',
        'array'   => ':attribute 至少要有 :min 个元素.',
    ],
    'not_in'               => ':attribute 的值无效.',
    'not_regex'            => ':attribute 的格式无效.',
    'numeric'              => ':attribute 必须是一个数字.',
    'present'              => ':attribute 必须存在.',
    'regex'                => ':attribute 的格式无效.',
    'required'             => ':attribute 为必填.',
    'required_if'          => '当 :other 为 :value 时，栏位 :attribute 为必填.',
    'required_unless'      => '当 :other 不为 :values 时，栏位 :attribute 为必填.',
    'required_with'        => '当 :values 存在时，栏位 :attribute 为必填.',
    'required_with_all'    => '当 :values 皆存在时，栏位 :attribute 为必填.',
    'required_without'     => '当 :values 不存在时，栏位 :attribute 为必填.',
    'required_without_all' => '当 :values 皆不存在时，栏位 :attribute 为必填.',
    'same'                 => ':attribute 与 :other 必须相同.',
    'size'                 => [
        'numeric' => ':attribute 大小必须为 :size.',
        'file'    => ':attribute 大小必须为 :size KB.',
        'string'  => ':attribute 必须是 :size 个字符.',
        'array'   => ':attribute 必须为 :size 个元素.',
    ],
    'starts_with'          => ':attribute 必须以 :values 为开头.',
    'string'               => ':attribute 必须为字符串.',
    'timezone'             => ':attribute 必须是一个有效的时区.',
    'unique'               => ':attribute 已经被使用.',
    'uploaded'             => ':attribute 上传失败.',
    'url'                  => ':attribute 不是一个有效的网址.',
    'uuid'                 => ':attribute 必须是有效的 UUID.',

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
        'username' => [
            'exists' => '您的帐号不存在或所属群组禁用.',
            'admin-available' => '您的帐号不存在或所属群组禁用.',
            'member-available' => '您的帐号不存在或所属群组禁用.',
        ],
        'password' => [
            'invalid' => '您输入的密码错误.',
        ],
        'client' => [
            'firewall' => '您的请求已被防火墙阻挡.',
        ],
        'captcha' => [
            'in' => '您的验证码输入错误.',
        ],
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

    'attributes' => [],

];
