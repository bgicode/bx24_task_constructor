<?php
include_once(__DIR__ . "/arStructur.php");
include_once(__DIR__ . "/layoutStructur.php");

if (isset($_GET["pattern"])) {
    if ($_GET["pattern"] == 'JSON') {
        $file = file_get_contents('./data.json');
        $array = json_decode($file, true);
    } elseif (($_GET["pattern"] == 'Array')) {
        $file = file_get_contents('./array.txt');
        $array = unserialize($file);
    }
} else {
    $array = $arStructur;
}

$AddFields = [];

function BlockWithAdditionalFields($value, $arLayoutStruct) {
    global $AddFields;
    echo $arLayoutStruct['block_with_additional_fields']['layout_wpar'];

         foreach ($value as $key => $v) { 
             if(is_array($v)) { 
                if ($key == 0) {
                    $v = $value;
                }

                foreach ($v as $v2) { 
                    echo $arLayoutStruct['block_with_additional_fields']['typical_field_title']($v2['typical_field']['title']);

                    echo $arLayoutStruct['block_with_additional_fields']['typical_field_wrap'];
                    
                        echo $arLayoutStruct['block_with_additional_fields']['inputs_wrap'];
                        // typical input
                            if (strlen($v2['typical_field']['typical_input']['selected']) > 0) {
                                //selected
                                echo $arLayoutStruct['block_with_additional_fields']['selected_layout']($v2['typical_field']['typical_input']['selected']);
                            }

                            if (strlen($v2['typical_field']['typical_input']['action']) > 0) { 
                                // action
                                echo $arLayoutStruct['block_with_additional_fields']['action_layout']($v2['typical_field']['typical_input']['action']);
                             } 
                        echo '</div>';
                        // typical input
                        // add fields
                        if ($v2['typical_field']['additional_fields_buttons'] !== NULL) {
                            if (count($v2['typical_field']['additional_fields_buttons']) > 0) {
                                echo $arLayoutStruct['block_with_additional_fields']['additional_fields_buttons_wrap']; 

                                foreach ($v2['typical_field']['additional_fields_buttons'] as $v3) {
                                    $AddFields[] = $v3; 
                                    echo $arLayoutStruct['block_with_additional_fields']['additional_fields_buttons_layout']($v3['typical_field']['title']);
                                }
                                echo '</span>';
                            }
                        }
                    echo '</div>';
                }
            }
        }
    echo '</div>';
};

function BlockWithDateFields($value, $arLayoutStruct) { 
    global $AddFields;
    foreach ($value as $v) {
        if(is_array($v)) {
                
            if ($v['title'] !== NULL) {

                if (isset($v['title'])) {
                    unset($v['title']);
                }

                foreach ($v as $v2) {
                    if ($v2['type'] == 'date') {
                        echo $arLayoutStruct['block_with_date_fields']['date_field_layout']($v2['lable']);

                    } elseif ($v2['type'] == 'text') { 
                        echo $arLayoutStruct['block_with_date_fields']['text_field_layout']($v2);

                    } elseif ($v2['type'] == 'checkbox') { 
                        echo $arLayoutStruct['block_with_date_fields']['checkbox_field_layout']($v2);
                    }
                }
            } else {

                foreach ($v as $v2) { 
                    echo $arLayoutStruct['block_with_date_fields']['block_with_date_fields_title']($v2);
                    
                    echo $arLayoutStruct['block_with_date_fields']['main_input_wrap'];

                    if ($v2['additional_fields_buttons'] !== NULL) {
                        if (count($v2['additional_fields_buttons']) > 0){
                            echo $arLayoutStruct['block_with_additional_fields']['additional_fields_buttons_wrap'];

                            foreach ($v2['additional_fields_buttons'] as $v3) {
                                $AddFields[] = $v3; 
                                echo $arLayoutStruct['block_with_additional_fields']['additional_fields_buttons_layout']($v3['title']);
                            }
                            echo '</span>';
                        }
                    }
                    echo '</div>'; 
                } 
            } 
        } 
    } 

}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задачи</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div>
        <form action="">
            <?php
            foreach ($array as $key => $value) {

                if ($value['type'] == 'main') {
                    echo $arLayoutStruct[$value['type']]['layout_wpar'];
                        foreach ($value['main']['cheboxes'] as $k => $v) { 
                            echo $arLayoutStruct['main']['layout_checkbox']($v, $k); 
                        }
                        echo $arLayoutStruct['main']['layout_body']($value['main']['title']);
                    echo '</div>';

                } elseif ($value['type'] == 'textarea') { 
                    echo $arLayoutStruct['textarea']['layout_body'];

                } elseif ($value['type'] == 'toolbar') {
                    echo $arLayoutStruct[$value['type']]['layout_wpar'];
                        foreach ($value['toolbar'] as $k => $v) { 
                            echo $arLayoutStruct['toolbar']['layout_body']($v, $k);
                        }
                        echo '</div>';

                } elseif ($value['type'] == 'block_with_additional_fields') {

                    BlockWithAdditionalFields($value, $arLayoutStruct);
                    foreach ($AddFields as $r) {
                        $s[0] = $r;
                        BlockWithAdditionalFields($s, $arLayoutStruct);
                    } 
                    $AddFields = [];

                } elseif ($value['type'] == 'block_with_date_fields') {
                    echo $arLayoutStruct['block_with_date_fields']['block_with_date_fields_wrap'];
                        BlockWithDateFields($value, $arLayoutStruct); 
                        foreach ($AddFields as $r) {
                            $s[0] = $r; 
                            echo $arLayoutStruct['block_with_date_fields']['add_date_blocks_wrap'];
                                BlockWithDateFields($s, $arLayoutStruct); 
                            echo '</div>';
                        }
                        $AddFields = []; 
                    echo '</div>';

                } elseif ($value['type'] == 'submit') {
                    echo $arLayoutStruct['submits']['layout_wpar'];
                        foreach ($value['submit'] as $k => $v){
                            if ($k == 'prime') { 
                                echo $arLayoutStruct['submits']['prime']($v);
                            } else { 
                                echo $arLayoutStruct['submits']['other']($v);
                            }
                        }
                    echo '</div>';
                }
            } ?>
        </form>
    </div>
</body>
</html>