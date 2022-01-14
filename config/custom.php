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
    'default_stars' => 5,
    'per_question_star' => 2,
    'per_support_star' => 2,
    'per_answer_star' => 2,
    'star_price' => 1000,
    'give_gift_star_on_register' => 5,

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
