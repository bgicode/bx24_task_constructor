<?php
$arLayoutStruct = [

    'main' => [
        'layout_wpar' => '<div class="task-info-panel">',
        'layout_checkbox' => fn($v, $k) => "<div class='task-info-panel-important'>
                                <input  type='checkbox' id='$k'>
                                <label for='$k'>$v</label>
                                <input type='hidden' value='1'>
                            </div>",
        'layout_body' => fn($value) =>  "<div class='task-info-panel-title'>
                            <input data-bx-id='task-edit-title' type='text' placeholder=$value>
                        </div>"
        ],
    'textarea' => [
        'layout_body' => '<div class="task-text-area">
                            <textarea class="task-text-area-text" name="#" value="" ></textarea>
                        </div>'
    ],
    'toolbar' => [
        'layout_wpar' => '<div class="post-form-toolbar">',
        'layout_body' => fn($v, $k) => '<div class="main-post-form-toolbar-button">
                                            <div class="tolbar-img bx-b-'.$k.'-task-form"></div>
                                            <span class="main-post-form-toolbar-button-copilot">'.$v.'</span>
                                        </div>'
    ],
    'block_with_additional_fields' => [
        'layout_wpar' => '<div class="task-options-item task-options-item-destination">',

        'typical_field_title' => fn($v2) => '<span class="task-options-item-param">'.$v2.'</span>',

        'typical_field_wrap' => '<div class="task-options-item-open-inner">',

        'inputs_wrap' => '<div class="tasks task-form-field inline t-filled tdp-mem-sel-is-empty-false t-min tdp-mem-sel-is-min">',

        'selected_layout'=> fn($v2) =>'<span class="js-id-tdp-mem-sel-is-items tasks-h-invisible">
                                            <span class="js-id-tdp-mem-sel-is-item js-id-tdp-mem-sel-is-item-U1 task-form-field-item">
                                                <a class="task-form-field-item-text task-options-destination-text" href="#">'.$v2.'
                                                </a>
                                                <span class="js-id-tdp-mem-sel-is-item-delete task-form-field-item-delete" title="Отменить  выбор"></span>
                                            </span>
                                        </span>',

        'action_layout' => fn($v2) => '<span class="task-form-field-controls">
                                            <a class="js-id-tdp-mem-sel-is-control task-form-field-when-filled task-form-field-link add">'.$v2.'</a>
                                        </span>',
        
        'additional_fields_buttons_wrap' => '<span class="task-dashed-link task-dashed-link-add tasks-additional-block-link inline">',

        'additional_fields_buttons_layout' => fn($v3) => '<span class="task-dashed-link-inner">'.$v3.'</span>',
    ],
    'block_with_date_fields' => [

        'block_with_date_fields_wrap' => '<div  class="mode-unit-selected-days task-options-item task-options-item-open">',

        // 'add_date_blocks_wrap' => '<div class="pinable-block task-openable-block">',

        'add_date_blocks_wrap' => '<div class="task-options-sheduling-block">
                                        <div class="task-options-divider"></div>',

        'date_field_layout' => fn($v2) => '<div class="task-options-field task-options-field-left">
                                            <label for="" class="task-field-label task-field-label-br">'.$v2.'</label>
                                            <span class="task-options-inp-container task-options-date t-empty">
                                                <input type="date" class="task-options-inp" value="" placeholder=" ">
                                            </span>
                                            <div class="tasks-disabling-overlay-form" title="Сроки вычисляются автоматически"></div>
                                        </div>',

        'text_field_layout' => fn($v2) => '<div class="task-options-field task-options-field-left task-options-field-duration">
                                            <label for="" class="task-field-label task-field-label-br">'.$v2['lable'].'</label>
                                            <span class="task-options-inp-container">
                                                <input data-bx-id="dateplanmanager-duration" type="text" class="task-options-inp" value="">
                                            </span>
                                            <span class="task-dashed-link">
                                                <span class="task-dashed-link-inner">'.$v2['days'].'</span><span class="task-dashed-link-inner">'.$v2['hours'].'</span><span class="task-dashed-link-inner">'.$v2['minuts'].'</span>
                                                <input data-bx-id="dateplanmanager-duration-type-value" type="hidden" name="ACTION[0][ARGUMENTS][data][DURATION_TYPE]" value="days">
                                            </span>
                                            <div class="tasks-disabling-overlay-form" title="Сроки вычисляются автоматически"></div>
                                        </div>',
                                        
        'checkbox_field_layout' => fn($v2) => '<div class="task-options-field-inner">
                                                <label class="task-field-label check" data-hint-enabled="" data-hint-text="">
                                                    <span class="js-id-hint-help task-options-help tasks-icon-help tasks-help-cursor" title="'.$v2['help'].'"></span>
                                                    <input data-target="allow-change-deadline" data-flag-name="ALLOW_CHANGE_DEADLINE" data-yes-value="Y" data-no-value="N" checked="" class="js-id-wg-optbar-flag js-id-wg-optbar-flag-allow-change-deadline task-field-checkbox" type="checkbox">'.$v2['lable'].'
                                                </label>
                                                <input class="js-id-wg-optbar-allow-change-deadline" type="hidden" name="ACTION[0][ARGUMENTS][data][ALLOW_CHANGE_DEADLINE]" value="Y">  
                                            </div>',
        
        'block_with_date_fields_title' => fn($v2) => '<span class="task-options-item-param">'.$v2['title'].'</span>',

        'main_input_wrap' => '<div class="task-options-item-more">
                                <span class="task-options-destination-wrap date">
                                    <span data-bx-id="dateplanmanager-deadline" class="task-options-inp-container task-options-date t-empty">
                                        <input type="date" class="task-options-inp" value="" placeholder=" ">
                                    </span>
                                </span>'

    ],
    'submits' => [
        'layout_wpar' => '<div class="feed-buttons-block" id="feed-add-buttons-blockblogPostForm">',

        'prime' => fn($v) => '<button type="submit" class="ui-btn ui-btn-lg ui-btn-primary">'.$v.'</button>',

        'other' => fn($v) => '<button type="submit" class="ui-btn ui-btn-lg ui-btn-link">'.$v.'</button>'
    ],

];

