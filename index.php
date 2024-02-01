<?php
if(isset($_GET["pattern"])){
    if ($_GET["pattern"] == 'JSON') {
        $file = file_get_contents('./data.json');
        $array = json_decode($file, true);
    } elseif (($_GET["pattern"] == 'Array')) {
        $file = file_get_contents('./array.txt');
        $array = unserialize($file);
    }
}
$AddFields = [];
?>

<?php function blockWithAdditionalFields($value) {
    global $AddFields; ?>
    <div class="task-options-item task-options-item-destination">
    
        <?php foreach ($value as $key => $v) { ?>
            <?php if(is_array($v)) { 
                if ($key == 0){
                    $v = $value;
                }?>

                <?php foreach ($v as $v2) { ?>
                    <span class="task-options-item-param"><?=$v2['typical_field']['title'];?></span>
                    <div class="task-options-item-open-inner">
                        <!-- typical input -->
                        <div class="tasks task-form-field inline t-filled tdp-mem-sel-is-empty-false t-min tdp-mem-sel-is-min">
                            <?php if (strlen($v2['typical_field']['typical_input']['selected']) > 0){ ?>
                                <!-- selected -->
                                <span class="js-id-tdp-mem-sel-is-items tasks-h-invisible">
                                    <span class="js-id-tdp-mem-sel-is-item js-id-tdp-mem-sel-is-item-U1 task-form-field-item">
                                        <a class="task-form-field-item-text task-options-destination-text" href="#">
                                        <?=$v2['typical_field']['typical_input']['selected'];?>
                                        </a>
                                        <span class="js-id-tdp-mem-sel-is-item-delete task-form-field-item-delete" title="Отменить выбор"></span>
                                    </span>
                                </span>
                                
                                <!-- selected -->
                            <?php } ?>

                            <?php if (strlen($v2['typical_field']['typical_input']['action']) > 0){ ?>
                                <!-- action -->
                                <span class="task-form-field-controls">
                                    <a class="js-id-tdp-mem-sel-is-control task-form-field-when-filled task-form-field-link add"><?=$v2['typical_field']['typical_input']['action'];?></a>
                                </span>
                                <!-- action -->
                            <?php } ?> 
                            
                        </div>
                        <!-- typical input -->
                        <?php if($v2['typical_field']['additional_fields_buttons'] !== NULL) { ?>
                            <?php if (count($v2['typical_field']['additional_fields_buttons']) > 0){ ?>
                                <span class="task-dashed-link task-dashed-link-add tasks-additional-block-link inline">
                                <?php foreach($v2['typical_field']['additional_fields_buttons'] as $k2 => $v3){
                                    $AddFields[] = $v3 ?>
                                    <!-- additional fields buttons -->
                                        <span class="task-dashed-link-inner"><?=$v3['typical_field']['title']?></span>
                                    <!-- additional fields buttons -->
                                    <?php } ?>
                                    </span>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?> 
    </div>
<?php
} ?>


<?php function blockWithDateFields($value) { 
    global $AddFields; ?>
    <?php foreach ($value as $v) { ?>
            <?php if(is_array($v)) {
                 
                if ($v['title'] !== NULL){ ?>
                    <div class="pinable-block task-openable-block">
                        <?php 
                        if(isset($v['title']))
                        {
                            unset($v['title']);
                        }
                        ?>
                        <?php foreach ($v as $v2) {
                            if($v2['type'] == 'date') { ?>
                                <div class="task-options-field task-options-field-left">
                                    <label for="" class="task-field-label task-field-label-br"><?=$v2['lable'];?></label>
                                    <span class="task-options-inp-container task-options-date t-empty">
                                        <input type="date" class="task-options-inp" value="" placeholder=" ">
                                    </span>
                                    <div class="tasks-disabling-overlay-form" title="Сроки вычисляются автоматически"></div>
                                </div>
                            <?php } elseif ($v2['type'] == 'text') { ?>
                                        <div class="task-options-field task-options-field-left task-options-field-duration">
                                            <label for="" class="task-field-label task-field-label-br"><?=$v2['lable'];?></label>
                                            <span class="task-options-inp-container">
                                                <input data-bx-id="dateplanmanager-duration" type="text" class="task-options-inp" value="">
                                            </span>
                                            <span class="task-dashed-link">
                                                <span class="task-dashed-link-inner"><?=$v2['days'];?></span><span class="task-dashed-link-inner"><?=$v2['hours'];?></span><span class="task-dashed-link-inner"><?=$v2['minuts'];?></span>
                                                <input data-bx-id="dateplanmanager-duration-type-value" type="hidden" name="ACTION[0][ARGUMENTS][data][DURATION_TYPE]" value="days">
                                            </span>
                                            <div class="tasks-disabling-overlay-form" title="Сроки вычисляются автоматически"></div>
                                        </div>
                            <?php } elseif ($v2['type'] == 'checkbox') { ?>
                                        <div class="task-options-field-inner">
                                            <label class="task-field-label check" data-hint-enabled="" data-hint-text="">
                                                <span class="js-id-hint-help task-options-help tasks-icon-help tasks-help-cursor" title="<?=$v2['help'];?>"></span>
                                                <input data-target="allow-change-deadline" data-flag-name="ALLOW_CHANGE_DEADLINE" data-yes-value="Y" data-no-value="N" checked="" class="js-id-wg-optbar-flag js-id-wg-optbar-flag-allow-change-deadline task-field-checkbox" type="checkbox"><?=$v2['lable'];?>
                                            </label>
                                            <input class="js-id-wg-optbar-allow-change-deadline" type="hidden" name="ACTION[0][ARGUMENTS][data][ALLOW_CHANGE_DEADLINE]" value="Y">  
                                        </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } else { ?>

                    <?php foreach ($v as $v2) { 
                        ?>
                        <span class="task-options-item-param"><?=$v2['title'];?></span>
                        <div class="task-options-item-more">
                            <span class="task-options-destination-wrap date">
                                <span data-bx-id="dateplanmanager-deadline" class="task-options-inp-container task-options-date t-empty">
                                    <input type="date" class="task-options-inp" value="" placeholder=" ">
                                </span>
                            </span>

                            <span class="task-dashed-link task-dashed-link-add tasks-additional-block-link inline">
                                <?php if($v2['additional_fields_buttons'] !== NULL) { ?>
                                    <?php if (count($v2['additional_fields_buttons']) > 0){ ?>
                                        
                                        <?php foreach($v2['additional_fields_buttons'] as $k2 => $v3){
                                            $AddFields[] = $v3 ?>
                                            <!-- additional fields buttons -->
                                                <span class="task-dashed-link-inner"><?=$v3['title']?></span>
                                            <!-- additional fields buttons -->
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            </span>
                        </div>
                    <?php } ?>
                <?php } ?>
             <?php } ?>
        <?php } ?>
<?php
} ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Directory Map</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div>
        <form action="">
            <?php
            foreach ($array as $key => $value) {
                if ($value['name'] == 'main') { ?>

                    <div class="task-info-panel">
                        <?php 
                        foreach ($value['main']['cheboxes'] as $k => $v) { ?>
                            <div class="task-info-panel-important">
                            <input  type="checkbox" id="<?=$k?>">
                            <label for="<?=$k?>"><?=$v?></label>
                            <input type="hidden" name="ACTION[0][ARGUMENTS][data][PRIORITY]" value="1">
                            </div>
                        <?php } ?>

                        <div class="task-info-panel-title">
                            <input data-bx-id="task-edit-title" type="text" name="ACTION[0][ARGUMENTS][data][TITLE]" value="" placeholder="<?=$value['main']['title'];?>">
                        </div>
                    </div>

                <?php } elseif ($value['name'] == 'textarea') { ?>
                    
                    <div class="task-text-area">
                        <textarea class="task-text-area-text" name="#" value="" ></textarea>
                    </div>
                <?php } elseif ($value['name'] == 'toolbar') { ?>
                    <div class="post-form-toolbar">
                        <?php foreach($value['toolbar'] as $k => $v) { ?>
                            <div class="main-post-form-toolbar-button">
                                <div class="tolbar-img bx-b-<?=$k;?>-task-form"></div>
                                <span class="main-post-form-toolbar-button-copilot"><?=$v;?></span>
                            </div>
                        <?php } ?>
                    </div>
                    
                <?php } elseif ($value['name'] == 'block_with_additional_fields') {?>

                        <div>
                            <?php
                                blockWithAdditionalFields($value);
                                foreach ($AddFields as $r) {
                                    $s[0] = $r; ?>
                                    <?php blockWithAdditionalFields($s); ?>
                                <?php } 
                                $AddFields = [];
                            ?>
                        </div>

                    <?php } elseif ($value['name'] == 'block_with_date_fields') { ?>

                        <div  class="mode-unit-selected-days task-options-item task-options-item-open">
                            <?php 
                            blockWithDateFields($value); 
                            foreach ($AddFields as $r) {
                                $s[0] = $r; ?>
                                <div class="task-options-sheduling-block">
                                    <div class="task-options-divider"></div>
                                    <?php blockWithDateFields($s); ?>
                                </div>
                            <?php }
                            $AddFields = []; 
                            ?>
                        </div>

                <?php } ?>
            <?php } ?>
        </form>
    </div>
</body>
</html>