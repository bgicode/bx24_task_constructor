<?php
$arStructur = [
    [
        'type' => 'main',
        'main' => [
            'cheboxes' => [
                'important' => 'Это важная задача',
                'new' => 'Это новая задача',
            ],
            'title' => 'Введите название задачи',
        ]
    ],
    [
        'type' => 'textarea',
    ],
    [
        'type' => 'toolbar',
        'toolbar' => [
            'CoPilot' => 'CoPilot',
            'uploadfile' => 'Файл',
        ],
    ],
    [
        'type' => 'block_with_additional_fields',
        'block_with_additional_fields' => [
            [
                'typical_field' => [
                    'title' => 'Отвественный',
                    'typical_input' => [
                        'selected' => 'Имя Фамилия',
                        'action' => 'Добавить ещё',
                    ],
                    'additional_fields_buttons' => [
                        [
                            'typical_field' => [
                                'title' => 'Постановщик',
                                'typical_input' => [
                                    'selected' => 'Имя Фамилия',
                                    'action' => 'Сменить',
                                ],
                            ],
                        ],
                        [
                            'typical_field' => [
                                'title' => 'Соисполнитель',
                                'typical_input' => [
                                    'selected' => 'Имя Фамилия',
                                    'action' => '',
                                ],
                            ],
                        ],
                    ]
                ]
            ],
        ]
    ],
    [
        'type' => 'block_with_date_fields',
        'block_with_additional_fields' => [
            [ 
                'type' => 'date',
                'title' => 'Крайний срок',
                'lable' => '',
                'additional_fields_buttons' => [
                    [
                        'title' => 'Планирование сроков',
                        [
                            'type' => 'date',
                            'title' => '',
                            'lable' => 'Начать c',
                        ],
                        [
                            'type' => 'text',
                            'title' => '',
                            'lable' => 'Длительсность',
                            'days' => 'дней',
                            'hours' => 'часов',
                            'minuts' => 'минут',
                        ],
                        [
                            'type' => 'date',
                            'title' => '',
                            'lable' => 'Завершение',
                        ],
                        
                    ],
                    [
                        'title' => 'Ещё',
                        [
                            'type' => 'checkbox',
                            'title' => '',
                            'lable' => 'Разрешить ответственному менять сроки задачи',
                            'help' => 'Ответственный сможет изменить «планируемые даты» выполнения задачи, а также «крайний срок». Вы, как постановщик задачи, получите уведомления обо всех измененияx.'
                        ],
                        [
                            'type' => 'checkbox',
                            'title' => '',
                            'lable' => 'Пропустить выходные и праздничные дни',
                            'help' => 'Ответственный сможет изменить «планируемые даты» выполнения задачи, а также «крайний срок». Вы, как постановщик задачи, получите уведомления обо всех измененияx.'
                        ],
                    ],
                ]
            ],
        ]
    ],
    [
        'type' => 'submit',
        'submit' => [
            'prime' => 'Отправить',
            'link' => 'Отменить',
        ],
    ],
];