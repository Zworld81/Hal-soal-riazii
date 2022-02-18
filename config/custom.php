<?php
return [
    'class' => [
        '' => 'پایه :',
        '1' => 'اول',
        '2' => 'دوم',
        '3' => 'سوم',
        '4' => 'چهارم',
        '5' => 'پنجم',
        '6' => 'ششم',
        '7' => 'هفتم',
        '8' => 'هشتم',
        '9' => 'نهم',
        '10' => 'دهم',
        '11' => 'یازدهم',
        '12' => 'دوازدهم',
    ],
    'default_stars' => env('default_stars'),
    'per_question_star' => env('per_question_star'),
    'per_support_star' => env('per_support_star'),
    'per_answer_star' => env('per_answer_star'),
    'star_price' => env('star_price'),
    'give_gift_star_on_register' => env('give_gift_star_on_register'),

    'acl' => [
        [
            'location' => 'adminList',
            'name' => 'ادمین ها'
        ],
        [
            'location' => 'teacherList',
            'name' => 'معلم ها'
        ],
        [
            'location' => 'userList',
            'name' => 'کاربران'
        ],
        ['location' => 'changeLevelToAdmin',
            'name' => 'تبدیل به ادمین'
        ],
        [
            'location' => 'changeLevelToTeacher',
            'name' => 'تبدیل به معلم'
        ],
        [
            'location' => 'changeLevelToUser',
            'name' => 'تبدیل به کاربر'
        ],
        [
            'location' => 'editPermission',
            'name' => 'ویرایش سطح دسترسی'
        ],
        [
            'location' => 'permission',
            'name' => 'سطح دسترسی'
        ],
        [
            'location' => 'questionConfirm',
            'name' => 'تایید سوال'
        ],
        [
            'location' => 'answerConfirm',
            'name' => 'تایید جواب'
        ],
        [
            'location' => 'payment',
            'name' => 'پرداخت جدید'
        ],
        [
            'location' => 'payed',
            'name' => 'پرداخت شده'
        ],
        [
            'location' => 'setting',
            'name' => 'تنظیمات اصلی'
        ],
        [
            'location' => 'starSetting',
            'name' => 'تنظیمات ستاره'
        ],
    ]
];
