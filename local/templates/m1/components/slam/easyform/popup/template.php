<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use \Bitrix\Main\Localization\Loc;

$FORM_ID           = trim($arParams['FORM_ID']);
$FORM_AUTOCOMPLETE = $arParams['FORM_AUTOCOMPLETE'] ? 'on' : 'off';
$FORM_ACTION_URI   = "";
$WITH_FORM = strlen($arParams['WIDTH_FORM']) > 0 ? 'style="max-width:'.$arParams['WIDTH_FORM'].'"' : '';
//pr($arParams);
//pr($arResult);
?>
<section class="modal">
    <div class="slam-easyform<?=$arParams['HIDE_FORMVALIDATION_TEXT'] == 'Y' ? ' hide-formvalidation' : ''?>" <?=$WITH_FORM?>>
    <form id="<?=$FORM_ID?>"
          class="modal__form"
          enctype="multipart/form-data"
          method="POST"
          action="<?=($FORM_ACTION_URI?$FORM_ACTION_URI:"#")?>"
          autocomplete="<?=$FORM_AUTOCOMPLETE?>"
          novalidate="novalidate"
    >

             <span class="modal__close-btn">
        <svg width="16" height="16" version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16.5 16.5" style="enable-background:new 0 0 16.5 16.5;" xml:space="preserve">
          <line class="st0" x1="14.2" y1="2.2" x2="2.2" y2="14.2" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></line>
          <line class="st0" x1="2.2" y1="2.2" x2="14.2" y2="14.2" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></line>
        </svg>
      </span>
        <h3><?= $arParams['FORM_NAME'] ?></h3>
        <div class="alert alert-success <?if($arResult['STATUS'] != 'ok'):?>hidden<?endif;?>" role="alert">
            <?=$arParams['OK_TEXT']?>
        </div>
        <div class="alert alert-danger <?if($arResult['STATUS'] != 'error'):?>hidden<?endif;?>" role="alert">
            <?=$arParams['ERROR_TEXT']?>
            <?if(!empty($arResult['ERROR_MSG'])):?>
                </br>
                <?=implode('</br>', $arResult['ERROR_MSG'])?>
            <?endif;?>
        </div>

        <input type="hidden" name="FORM_ID" value="<?=$FORM_ID?>">
        <input type="text" name="ANTIBOT[NAME]" value="<?=$arResult['ANTIBOT']['NAME'];?>" class="hidden">

        <?//hidden fields
        foreach($arResult['FORM_FIELDS'] as $fieldCode => $arField)
        {
            if($arField['TYPE'] == 'hidden')
            {
                ?>
                <input type="hidden" name="<?=$arField['NAME']?>" value="<?=$arField['VALUE'];?>"/>
                <?
                unset($arResult['FORM_FIELDS'][$fieldCode]);
            }
        }
        ?>
            <?
            if(!empty($arResult['FORM_FIELDS'])):
                foreach($arResult['FORM_FIELDS'] as $fieldCode => $arField):

                    if(!$arParams['HIDE_ASTERISK'] && !$arParams['HIDE_FIELD_NAME']){
                        $asteriks = ':';
                        if($arField['REQUIRED']) {
                            $asteriks = '<span class="asterisk">*</span>:';
                        }
                        $arField['TITLE'] = $arField['TITLE'].$asteriks;
                    }?>

                    <?  if($arField['TYPE'] == 'select'):?>
                        <div class="form-group">
                            <label class="modal__elem">
                                <select class="modal__select " id="<?=$arField['ID']?>" <?=$arField['MULTISELECT'] == 'Y' ? 'multiple' : ''?> name="<?=$arField['NAME']?>" <?=$arField['REQ_STR']?>>
                                    <option disabled selected><?=$arField['TITLE']?></option>
                                    <?if(is_array($arField['VALUE'])):?>
                                        <?foreach($arField['VALUE'] as $arVal):?>
                                            <?if(!empty($arVal)):?>
                                                <option value="<?=$arVal?>"><?=$arVal?></option>
                                            <?endif;?>
                                        <?endforeach;?>
                                    <?endif;?>
                                </select>
                            </label>
                        </div>

                    <?elseif($arField['TYPE'] == 'file'):?>
                            <div class="form-group">
                                    <? $CID = $GLOBALS["APPLICATION"]->IncludeComponent(
                                        'bitrix:main.file.input',
                                        $arField['DROPZONE_INCLUDE'] ? 'drag_n_drop' : '.default',
                                        array(
                                            'HIDE_FIELD_NAME' => $arParams['HIDE_FIELD_NAME'],
                                            'INPUT_NAME' => $arField['CODE'],
                                            'INPUT_TITLE' => $arField['TITLE'],
                                            'INPUT_NAME_UNSAVED' => $arField['CODE'],
                                            'MAX_FILE_SIZE' => $arField['FILE_MAX_SIZE'],//'20971520', //20Mb
                                            'MULTIPLE' => 'Y',
                                            'CONTROL_ID' => $arField['ID'],
                                            'MODULE_ID' => 'slam.easyform',
                                            'ALLOW_UPLOAD' => 'F',
                                            'ALLOW_UPLOAD_EXT' => $arField['FILE_EXTENSION'],
                                        ),
                                        $component,
                                        array("HIDE_ICONS" => "Y")
                                    );?>
                            </div>
                    <?else:?>
                            <div class="form-group">
                                <input class="modal__elem" type="<?=$arField['TYPE'];?>" id="<?=$arField['ID']?>" name="<?=$arField['NAME']?>" value="<?=$arField['VALUE'];?>" <?=$arField['PLACEHOLDER_STR'];?> <?=$arField['REQ_STR']?> <?=$arField['MASK_STR']?>>
                            </div>
                    <?endif;
                endforeach;?>


<!--                    --><?//if($arResult['WARNING_MSG']):?>
<!--                        <p class="warning-buy"><small>--><?//=$arResult['WARNING_MSG'];?><!--</small></p>-->
<!--                    --><?//endif;?>
                    <button type="submit" class="btn btn-primary pull-right submit-button" data-default="<?=$arParams['FORM_SUBMIT_VALUE']?>"><?=$arParams['FORM_SUBMIT_VALUE']?></button>
            <?endif;?>
    </form>
    <?if($arParams['SHOW_MODAL'] == 'Y'):?>
        <div class="modal fade modal-add-holiday" id="frm-modal-<?=$FORM_ID?>"  role='dialog' aria-hidden='true'>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header clearfix">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&#10006;</button>

                        <? if($arParams['TITLE_SHOW_MODAL'] || $arParams['FORM_NAME']): ?>
                            <div class="title"><?=$arParams['TITLE_SHOW_MODAL'] ? : $arParams['FORM_NAME']?></div>
                        <? endif?>

                    </div>
                    <div class="modal-body">
                        <p class="ok-text"><?=$arParams['OK_TEXT']?></p>
                    </div>
                </div>
            </div>
        </div>
    <?endif;?>
    </div>
</section>
<script type="text/javascript">
    var easyForm = new JCEasyForm(<?echo CUtil::PhpToJSObject($arParams)?>);
</script>
