<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($arResult['ERROR']))
{
	echo $arResult['ERROR'];
	return false;
}
$this->addExternalCss(SITE_TEMPLATE_PATH."/css/slick.css");
$this->addExternalJS(SITE_TEMPLATE_PATH."/js/slick.min.js");
//$GLOBALS['APPLICATION']->SetTitle('Highloadblock List');

?>

<div class="brands">
    <div class="container">
        <div class="brands_slider">
	<? foreach ($arResult['rows'] as $row): ?>
        <div>
            <a href="<?=($row['UF_LINK']?$row['UF_LINK']:"");?>"><?=$row['UF_FILE'];?></a>
        </div>
	<? endforeach; ?>
        </div>
    </div>
</div>
