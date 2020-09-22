<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * @var array $arParams
 * @var array $arResult
 */
/*?><input type="radio" name="tabs" id="file" value="file" /><label class="mfi-tab-header mfi-tab-header-file" for="file">File</label>
<input type="radio" name="tabs" id="camera" value="camera" /><label class="mfi-tab-header mfi-tab-header-camera" for="camera">Camera</label>
<ul class="tabs">
	<li class="mfi-tab-body-canvas">
		<div class="webform-field-upload">
			<span class="webform-small-button webform-button-upload" id="mfi-#id#-snapshot" >Try again</span>
		</div>
		<canvas id="mfi-#id#-snapshot-canvas"></canvas>
	</li>
	<li class="mfi-tab-body-file">
		<input type="file" >
	</li>
	<li class="mfi-tab-body-camera">
		<div id="mfi-#id#-snapshot-area">
			<video autoplay id="mfi-#id#-snapshot-video"></video>
			<div id="mfi-#id#-snapshot-button">Take snapshot</div>
		</div>
	</li>
</ul>
<?*/

if ($arParams["SHOW_AVATAR_EDITOR"] == "Y")
{
	\CJSCore::Init(array("webrtc_adapter", "avatar_editor"));
}
else
{
	\CJSCore::Init(array("uploader"));
}

$request = \Bitrix\Main\Context::getCurrent()->getRequest();
if ($arParams["ALLOW_UPLOAD"] == "N" && empty($arResult['FILES']))
	return "";
$cnt = count($arResult['FILES']);
$id = CUtil::JSEscape($arParams['CONTROL_ID']);
if ($arParams['MULTIPLE'] == 'Y' && substr($arParams['INPUT_NAME'], -2) !== "[]")
	$arParams['INPUT_NAME'] .= "[]";
$thumbForUploaded = <<<HTML
<div class="webform-field-item-wrap"><span class="webform-field-upload-icon webform-field-upload-icon-#ext#"><img src="#preview_url#" onerror="BX.remove(this);" /></span>
<a href="#url#" target="_blank" data-bx-role="file-name" class="upload-file-name">#name#</a><span class="upload-file-size" data-bx-role="file-size">#size#</span><i></i><del data-bx-role="file-delete">&#215;</del>
<input id="file-#file_id#" data-bx-role="file-id" type="hidden" name="#input_name#" value="#file_id#" /></div>
HTML;
$thumb = <<<HTML
<div class="webform-field-item-wrap"><span class="webform-field-upload-icon webform-field-upload-icon-#ext#" data-bx-role="file-preview"></span>
<a href="#" target="_blank" data-bx-role="file-name" class="upload-file-name">#name#</a><span class="upload-file-size" data-bx-role="file-size">#size#</span><i></i><del data-bx-role="file-delete">&#215;</del></div>
HTML;
?>
<div class="file-input file-extended">
	<ol class="file-placeholder-tbody webform-field-upload-list webform-field-upload-list-<?=$arParams["MULTIPLE"] == "Y" ? "multiple" : "single"?><?
		?><?=($arParams["SHOW_AVATAR_EDITOR"] == "Y" && $arParams["ALLOW_UPLOAD"] == "I" ? " webform-field-upload-icon-view" : "")?>" id="mfi-<?=$arParams['CONTROL_ID']?>"><?
		foreach ($arResult['FILES'] as $file)
		{
			$ext = GetFileExtension($file['ORIGINAL_NAME']);
			$isImage = CFile::IsImage($file["ORIGINAL_NAME"], $file["CONTENT_TYPE"]);
			$t = ($isImage ? CFile::ResizeImageGet($file, array( "width" => 100, "height" => 100 ), BX_RESIZE_IMAGE_EXACT, false) : array("src" => "/bitrix/images/1.gif"));
			?><li class="saved"><?=str_replace(
				array("#input_name#", "#file_id#", "#name#", "#size#", "#url#", "#url_delete#", "#preview_url#", "#ext#"),
				array($arParams['INPUT_NAME'],
					intval($file['ID']),
					htmlspecialcharsEx($file['ORIGINAL_NAME']),
					CFile::FormatSize($file["FILE_SIZE"]),
					$file["URL"],
					$file["URL_DELETE"],
					$t["src"],
					$ext
				),
				$thumbForUploaded
			)?></li><?
		}
	?></ol>
	<?if ($arParams["ALLOW_UPLOAD"] != "N")
	{
		?><div class="webform-field-upload" id="mfi-<?=$arParams['CONTROL_ID']?>-button"><?
			if (isset($arParams["INPUT_CAPTION"]) && !empty($arParams["INPUT_CAPTION"]))
			{
				$inputCaption = $arParams["INPUT_CAPTION"];
			}
			else
			{
				$inputCaption = ($arParams["ALLOW_UPLOAD"] == "I" ? GetMessage('MFI_INPUT_CAPTION_ADD_IMAGE') : GetMessage('MFI_INPUT_CAPTION_ADD'));
			}
			?><span class="btn btn-primary webform-small-button webform-button-upload"><?=$inputCaption?>
        <svg style="margin-left: 10px" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M10.3916 4.13009L7.32905 0.630094C7.24593 0.535594 7.12605 0.480469 7.00005 0.480469C6.87405 0.480469 6.75418 0.535594 6.67105 0.630094L3.60855 4.13009C3.49568 4.25959 3.46768 4.44247 3.53943 4.59909C3.6103 4.75484 3.76605 4.85547 3.93755 4.85547H5.68755V10.543C5.68755 10.7845 5.88355 10.9805 6.12505 10.9805H7.87505C8.11655 10.9805 8.31255 10.7845 8.31255 10.543V4.85547H10.0626C10.2341 4.85547 10.3898 4.75572 10.4607 4.59909C10.5316 4.44247 10.5053 4.25872 10.3916 4.13009Z" fill="#1E1E1E"></path>
          <path d="M11.8125 10.1055V12.7305H2.1875V10.1055H0.4375V13.6055C0.4375 14.0893 0.8295 14.4805 1.3125 14.4805H12.6875C13.1714 14.4805 13.5625 14.0893 13.5625 13.6055V10.1055H11.8125Z" fill="#1E1E1E"></path>
        </svg>
        </span><?
			if ($arParams["MULTIPLE"] == "N")
			{
				?><span class="webform-small-button webform-button-replace"><?=($arParams["ALLOW_UPLOAD"] == "I" ? GetMessage('MFI_INPUT_CAPTION_REPLACE_IMAGE') : GetMessage('MFI_INPUT_CAPTION_REPLACE'))?></span><?
			}
			if ($arParams["SHOW_AVATAR_EDITOR"] == "Y" && $arParams["ALLOW_UPLOAD"] == "I")
			{
				?><input type="button" id="mfi-<?=$arParams['CONTROL_ID']?>-editor" /><?
			}
			else
			{
				?><input type="file" id="file_input_<?=$arParams['CONTROL_ID']?>" <?=$arParams["MULTIPLE"] === 'Y' ? ' multiple="multiple"' : ''?> /><?
			}
		?></div><?
		if (!empty($arParams["ALLOW_UPLOAD_EXT"]) || $arParams['MAX_FILE_SIZE'] > 0)
		{
			$message = ((!empty($arParams["ALLOW_UPLOAD_EXT"]) && $arParams['MAX_FILE_SIZE'] > 0) ? GetMessage("MFI_NOTICE_1") : (
					!empty($arParams["ALLOW_UPLOAD_EXT"]) ? GetMessage("MFI_NOTICE_2") : GetMessage("MFI_NOTICE_3")
			));
			?><?
		}
	}
?>
<script type="text/javascript">
		BX.message(<?=CUtil::PhpToJSObject(array(
			"MFI_THUMB" => $thumb,
			"MFI_THUMB2" => $thumbForUploaded,
			"MFI_UPLOADING_ERROR" => GetMessage("MFI_UPLOADING_ERROR")
		))?>);
		BX.ready(function(){
			BX.MFInput.init(<?=CUtil::PhpToJSObject(array(
				"controlId" => $arParams['CONTROL_ID'],
				"controlUid" => $arParams['CONTROL_UID'],
				"controlSign" => $arParams["CONTROL_SIGN"],
				"inputName" => $arParams['INPUT_NAME'],
				"maxCount" => $arParams["MULTIPLE"] == "N" ? 1 : 0,
				"moduleId" => $arParams["MODULE_ID"],
				"forceMd5" => $arParams["FORCE_MD5"],

				"allowUpload" => $arParams["ALLOW_UPLOAD"],
				"allowUploadExt" => $arParams["ALLOW_UPLOAD_EXT"],
				"uploadMaxFilesize" => $arParams['MAX_FILE_SIZE'],
				"enableCamera" => $arParams['ENABLE_CAMERA'] !== "N",

				"urlUpload" => $arParams["URL_TO_UPLOAD"]
			))?>);
		});
	</script>
</div>