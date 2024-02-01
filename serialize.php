<?php

$arr = array (
    array(
        'name' => 'main',
        'main' => array (
        'cheboxes' => array (
            'important' => 'Это важная задача',
            'new' => 'Это новая задача',
        ),
        'title' => 'Введите название задачи',
        )
    ),
    array(
        'name' => 'textarea',
    ),
    array (
        'name' => 'toolbar',
        'toolbar' => array (
            'CoPilot' => 'CoPilot',
            'uploadfile' => 'Файл',
        ),
    ),

    array (
        'name' => 'block_with_additional_fields',
        'block_with_additional_fields' => array (
            array (
                'typical_field' => array (
                    'title' => 'Отвественный',
                    'typical_input' => array (
                        'selected' => 'Имя Фамилия',
                        'action' => 'Добавить ещё',
                    ),
                    'additional_fields_buttons' => array (
                        array (
                            'typical_field' => array (
                                'title' => 'Постановщик',
                                'typical_input' => array (
                                    'selected' => 'Имя Фамилия',
                                    'action' => 'Сменить',
                                ),
                            ),
                        ),
                        array (
                            'typical_field' => array (
                                'title' => 'Соисполнитель',
                                'typical_input' => array (
                                    'selected' => 'Имя Фамилия',
                                    'action' => '',
                                ),
                            ),
                        ),
                        
                    )
                )
            ),
            
        )
    ),

    array (
        'name' => 'block_with_date_fields',
        'block_with_additional_fields' => array (
            array ( 
                    'type' => 'date',
                    'title' => 'Крайний срок',
                    'lable' => '',
                    'additional_fields_buttons' => array (
                        array (
                            'title' => 'Планирование сроков',
                            array (
                                    'type' => 'date',
                                    'title' => '',
                                    'lable' => 'Начать c',

                            ),
                            array (
                                    'type' => 'text',
                                    'title' => '',
                                    'lable' => 'Длительсность',
                                    'days' => 'дней',
                                    'hours' => 'часов',
                                    'minuts' => 'минут',

                            ),
                            array ( 
                                    'type' => 'date',
                                    'title' => '',
                                    'lable' => 'Завершение',
                            ),
                            
                        ),
                        array (
                            'title' => 'Ещё',
                            array (
                                'type' => 'checkbox',
                                'title' => '',
                                'lable' => 'Разрешить ответственному менять сроки задачи',
                                'help' => 'Ответственный сможет изменить «планируемые даты» выполнения задачи, а также «крайний срок». Вы, как постановщик задачи, получите уведомления обо всех измененияx.'

                            ),
                            array (
                                'type' => 'checkbox',
                                'title' => '',
                                'lable' => 'Пропустить выходные и праздничные дни',
                                'help' => 'Ответственный сможет изменить «планируемые даты» выполнения задачи, а также «крайний срок». Вы, как постановщик задачи, получите уведомления обо всех измененияx.'

                            ),
                        ),
                        
                    )

            ),
            
        )
    ),
);

$serial = serialize($arr);

$filenameTxt = __DIR__ . '/array.txt';
 
file_put_contents($filenameTxt, $serial);
?>