<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$buttonId = $this->randString();
?>
<div class="subscribe">
    <div class="container">
        <div class="row">
            <div class="subscribe_icon">
                <svg width="100" height="63" viewBox="0 0 100 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M99.6046 0.520188C99.2326 0.102921 98.6654 -0.0825306 98.1192 0.0344791L65.7337 6.96688C64.8935 7.1467 64.3581 7.97432 64.5377 8.81555C64.7172 9.65659 65.5437 10.1927 66.3839 10.0131L89.6201 5.03929L40.9361 30.4445L24.8127 18.9115L52.9057 12.8981C53.7459 12.7181 54.2814 11.8905 54.1018 11.0493C53.9223 10.2082 53.0957 9.67175 52.2555 9.85171L20.7139 16.6033C20.1112 16.7324 19.6413 17.2053 19.516 17.8097C19.3906 18.414 19.6333 19.0353 20.1347 19.3939L39.3901 33.1671L43.0809 53.5952C43.0848 53.6164 43.09 53.6349 43.0959 53.6518C43.1656 53.9686 43.3302 54.2635 43.5839 54.487C43.7426 54.6268 43.9242 54.7299 44.1171 54.7947C44.4951 54.9216 44.916 54.9008 45.289 54.72L59.7384 47.7219L78.1118 60.8643C78.2389 60.9551 78.377 61.0253 78.5215 61.0738C78.8336 61.1786 79.1751 61.1828 79.4958 61.0786C79.965 60.9263 80.3342 60.5602 80.491 60.092L99.9193 2.05269C100.097 1.52236 99.9767 0.937306 99.6046 0.520188ZM48.6314 37.2811C48.3779 37.4708 48.1881 37.7334 48.0875 38.0339L45.0635 47.0678L42.5432 33.1186L81.092 13.0025L48.6314 37.2811ZM47.2612 50.3047L50.3691 41.0203L56.8538 45.6588L47.2612 50.3047ZM78.2094 57.1058L52.1993 38.501L95.2044 6.33555L78.2094 57.1058Z" fill="white" fill-opacity="0.77"/>
                    <path d="M31.966 34.7019C31.583 33.9319 30.6494 33.6186 29.8801 34.0019L11.4965 43.1674C10.7275 43.5508 10.4144 44.486 10.7973 45.2561C10.989 45.6411 11.3182 45.9119 11.6956 46.0386C12.073 46.1653 12.4987 46.1478 12.8833 45.956L31.2669 36.7905C32.0359 36.4072 32.3489 35.4721 31.966 34.7019Z" fill="white" fill-opacity="0.77"/>
                    <path d="M7.47776 46.911C7.0946 46.1412 6.16098 45.8279 5.39188 46.2111L0.86254 48.4693C0.0935367 48.8527 -0.219492 49.7878 0.163366 50.558C0.354918 50.9429 0.6841 51.2137 1.06153 51.3404C1.43896 51.4671 1.86469 51.4495 2.24924 51.2579L6.77858 48.9997C7.54759 48.6163 7.86062 47.6811 7.47776 46.911Z" fill="white" fill-opacity="0.77"/>
                    <path d="M21.4992 55.2985C21.317 54.9318 20.9893 54.6461 20.6014 54.5159C20.2119 54.3852 19.7801 54.416 19.4138 54.5986C19.0475 54.7813 18.7627 55.1078 18.6322 55.4977C18.5021 55.8861 18.5323 56.3201 18.7148 56.6869C18.8972 57.0536 19.2248 57.3394 19.6127 57.4695C20.0006 57.5997 20.434 57.5694 20.8002 57.3868C21.1665 57.2041 21.452 56.8761 21.582 56.4877C21.7125 56.0978 21.6817 55.6653 21.4992 55.2985Z" fill="white" fill-opacity="0.77"/>
                    <path d="M36.1512 47.9931C35.7686 47.2232 34.835 46.9098 34.0654 47.293L24.3281 52.1476C23.5591 52.531 23.2461 53.4662 23.629 54.2362C23.8205 54.6213 24.1497 54.8921 24.5271 55.0187C24.9045 55.1454 25.3303 55.1278 25.7148 54.9362L35.4521 50.0816C36.2211 49.6982 36.5341 48.7631 36.1512 47.9931Z" fill="white" fill-opacity="0.77"/>
                    <path d="M61.5088 55.8798C61.1257 55.1099 60.192 54.7966 59.4229 55.1798L49.6592 60.0477C48.8902 60.4311 48.5772 61.3662 48.9601 62.1364C49.1516 62.5213 49.4808 62.7923 49.8582 62.9189C50.2356 63.0456 50.6613 63.028 51.0459 62.8364L60.8096 57.9685C61.5786 57.5851 61.8916 56.65 61.5088 55.8798Z" fill="white" fill-opacity="0.77"/>
                    <path d="M59.9732 9.39577C59.7908 9.02901 59.4632 8.74327 59.0753 8.61309C58.6874 8.4829 58.2539 8.51321 57.8877 8.69583C57.5215 8.8785 57.236 9.20651 57.1055 9.59639C56.9755 9.9848 57.0062 10.4173 57.1886 10.7841C57.3705 11.1523 57.6987 11.4366 58.0866 11.5667C58.4745 11.6969 58.9074 11.6681 59.2742 11.484C59.6403 11.3013 59.9253 10.9748 60.0553 10.5864C60.1858 10.1965 60.1556 9.76253 59.9732 9.39577Z" fill="white" fill-opacity="0.77"/>
                </svg>
            </div>
            <div class="subscribe_text">
                <span>Подпишитесь на рассылку</span>
                Подписка на новости, акции и скидки от нашего магазина
            </div>
            <div class="subscribe_form">
<div id="sender-subscribe">
<?
$frame = $this->createFrame("sender-subscribe", false)->begin();
?>
	<?if(isset($arResult['MESSAGE'])): CJSCore::Init(array("popup"));?>
		<div id="sender-subscribe-response-cont" style="display: none;">
			<div class="bx_subscribe_response_container">
				<table>
					<tr>
						<td style="padding-right: 40px; padding-bottom: 0px;"><img src="<?=($this->GetFolder().'/images/'.($arResult['MESSAGE']['TYPE']=='ERROR' ? 'icon-alert.png' : 'icon-ok.png'))?>" alt=""></td>
						<td>
							<div style="font-size: 22px;"><?=GetMessage('subscr_form_response_'.$arResult['MESSAGE']['TYPE'])?></div>
							<div style="font-size: 16px;"><?=htmlspecialcharsbx($arResult['MESSAGE']['TEXT'])?></div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<script>
			BX.ready(function(){
				var oPopup = BX.PopupWindowManager.create('sender_subscribe_component', window.body, {
					autoHide: true,
					offsetTop: 1,
					offsetLeft: 0,
					lightShadow: true,
					closeIcon: true,
					closeByEsc: true,
					overlay: {
						backgroundColor: 'rgba(57,60,67,0.82)', opacity: '80'
					}
				});
				oPopup.setContent(BX('sender-subscribe-response-cont'));
				oPopup.show();
			});
		</script>
	<?endif;?>

	<script>
		(function () {
			var btn = BX('bx_subscribe_btn_<?=$buttonId?>');
			var form = BX('bx_subscribe_subform_<?=$buttonId?>');

			if(!btn)
			{
				return;
			}

			function mailSender()
			{
				setTimeout(function() {
					if(!btn)
					{
						return;
					}

					var btn_span = btn.querySelector("span");
					var btn_subscribe_width = btn_span.style.width;
					BX.addClass(btn, "send");
					btn_span.outterHTML = "<span><i class='fa fa-check'></i> <?=GetMessage("subscr_form_button_sent")?></span>";
					if(btn_subscribe_width)
					{
						btn.querySelector("span").style["min-width"] = btn_subscribe_width+"px";
					}
				}, 400);
			}

			BX.ready(function()
			{
				BX.bind(btn, 'click', function() {
					setTimeout(mailSender, 250);
					return false;
				});
			});

			BX.bind(form, 'submit', function () {
				btn.disabled=true;
				setTimeout(function () {
					btn.disabled=false;
				}, 2000);

				return true;
			});
		})();
	</script>

	<form id="bx_subscribe_subform_<?=$buttonId?>" role="form" method="post" action="<?=$arResult["FORM_ACTION"]?>">
		<?=bitrix_sessid_post()?>
		<input type="hidden" name="sender_subscription" value="add">

			<input class="bx-form-control" type="email" name="SENDER_SUBSCRIBE_EMAIL" value="<?=$arResult["EMAIL"]?>" title="<?=GetMessage("subscr_form_email_title")?>" placeholder="<?=htmlspecialcharsbx(GetMessage('subscr_form_email_title'))?>">

<? /*
		<div style="<?=($arParams['HIDE_MAILINGS'] <> 'Y' ? '' : 'display: none;')?>">
			<?if(count($arResult["RUBRICS"])>0):?>
				<div class="bx-subscribe-desc"><?=GetMessage("subscr_form_title_desc")?></div>
			<?endif;?>
			<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
			<div class="bx_subscribe_checkbox_container">
				<input type="checkbox" name="SENDER_SUBSCRIBE_RUB_ID[]" id="SENDER_SUBSCRIBE_RUB_ID_<?=$itemValue["ID"]?>" value="<?=$itemValue["ID"]?>"<?if($itemValue["CHECKED"]) echo " checked"?>>
				<label for="SENDER_SUBSCRIBE_RUB_ID_<?=$itemValue["ID"]?>"><?=htmlspecialcharsbx($itemValue["NAME"])?></label>
			</div>
			<?endforeach;?>
		</div>
*/ ?>
		<?if ($arParams['USER_CONSENT'] == 'Y'):?>
		<div class="bx_subscribe_checkbox_container bx-sender-subscribe-agreement">
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.userconsent.request",
				"",
				array(
					"ID" => $arParams["USER_CONSENT_ID"],
					"IS_CHECKED" => $arParams["USER_CONSENT_IS_CHECKED"],
					"AUTO_SAVE" => "Y",
					"IS_LOADED" => $arParams["USER_CONSENT_IS_LOADED"],
					"ORIGIN_ID" => "sender/sub",
					"ORIGINATOR_ID" => "",
					"REPLACE" => array(
						"button_caption" => GetMessage("subscr_form_button"),
						"fields" => array(GetMessage("subscr_form_email_title"))
					),
				)
			);?>
		</div>
		<?endif;?>

			<button id="bx_subscribe_btn_<?=$buttonId?>"><svg width="27" height="18" viewBox="0 0 27 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M25.3125 0H5.0625C4.61495 0 4.18572 0.189642 3.86926 0.527208C3.55279 0.864773 3.375 1.32261 3.375 1.8V4.5H0.84375C0.619974 4.5 0.405362 4.59482 0.247129 4.7636C0.0888949 4.93239 0 5.1613 0 5.4C0 5.63869 0.0888949 5.86761 0.247129 6.0364C0.405362 6.20518 0.619974 6.3 0.84375 6.3H3.375V8.1H1.6875C1.46372 8.1 1.24911 8.19482 1.09088 8.3636C0.932645 8.53239 0.84375 8.7613 0.84375 9C0.84375 9.23869 0.932645 9.46761 1.09088 9.6364C1.24911 9.80518 1.46372 9.9 1.6875 9.9H3.375V11.7H2.53125C2.30747 11.7 2.09286 11.7948 1.93463 11.9636C1.77639 12.1324 1.6875 12.3613 1.6875 12.6C1.6875 12.8387 1.77639 13.0676 1.93463 13.2364C2.09286 13.4052 2.30747 13.5 2.53125 13.5H3.375V16.2C3.375 16.6774 3.55279 17.1352 3.86926 17.4728C4.18572 17.8104 4.61495 18 5.0625 18H25.3125C25.7601 18 26.1893 17.8104 26.5057 17.4728C26.8222 17.1352 27 16.6774 27 16.2V1.8C27 1.32261 26.8222 0.864773 26.5057 0.527208C26.1893 0.189642 25.7601 0 25.3125 0ZM5.0625 3.6L10.6144 8.154L5.0625 14.751V3.6ZM15.1875 9.639L5.6025 1.8H24.7725L15.1875 9.639ZM11.9475 9.252L14.6728 11.484C14.8203 11.6051 15.0013 11.6708 15.1875 11.6708C15.3737 11.6708 15.5547 11.6051 15.7022 11.484L18.4275 9.252L24.2578 16.2H6.11719L11.9475 9.252ZM19.7606 8.154L25.3125 3.6V14.76L19.7606 8.154Z"/>
                </svg> <span><?=GetMessage("subscr_form_button")?></span></button>

	</form>
<?
$frame->beginStub();
?>
	<?if(isset($arResult['MESSAGE'])): CJSCore::Init(array("popup"));?>
		<div id="sender-subscribe-response-cont" style="display: none;">
			<div class="bx_subscribe_response_container">
				<table>
					<tr>
						<td style="padding-right: 40px; padding-bottom: 0px;"><img src="<?=($this->GetFolder().'/images/'.($arResult['MESSAGE']['TYPE']=='ERROR' ? 'icon-alert.png' : 'icon-ok.png'))?>" alt=""></td>
						<td>
							<div style="font-size: 22px;"><?=GetMessage('subscr_form_response_'.$arResult['MESSAGE']['TYPE'])?></div>
							<div style="font-size: 16px;"><?=htmlspecialcharsbx($arResult['MESSAGE']['TEXT'])?></div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<script>
			BX.ready(function(){
				var oPopup = BX.PopupWindowManager.create('sender_subscribe_component', window.body, {
					autoHide: true,
					offsetTop: 1,
					offsetLeft: 0,
					lightShadow: true,
					closeIcon: true,
					closeByEsc: true,
					overlay: {
						backgroundColor: 'rgba(57,60,67,0.82)', opacity: '80'
					}
				});
				oPopup.setContent(BX('sender-subscribe-response-cont'));
				oPopup.show();
			});
		</script>
	<?endif;?>

	<script>
		(function () {
			var btn = BX('bx_subscribe_btn_<?=$buttonId?>');
			var form = BX('bx_subscribe_subform_<?=$buttonId?>');

			if(!btn)
			{
				return;
			}

			function mailSender()
			{
				setTimeout(function() {
					if(!btn)
					{
						return;
					}

					var btn_span = btn.querySelector("span");
					var btn_subscribe_width = btn_span.style.width;
					BX.addClass(btn, "send");
					btn_span.outterHTML = "<span><i class='fa fa-check'></i> <?=GetMessage("subscr_form_button_sent")?></span>";
					if(btn_subscribe_width)
					{
						btn.querySelector("span").style["min-width"] = btn_subscribe_width+"px";
					}
				}, 400);
			}

			BX.ready(function()
			{
				BX.bind(btn, 'click', function() {
					setTimeout(mailSender, 250);
					return false;
				});
			});

			BX.bind(form, 'submit', function () {
				btn.disabled=true;
				setTimeout(function () {
					btn.disabled=false;
				}, 2000);

				return true;
			});
		})();
	</script>

	<form id="bx_subscribe_subform_<?=$buttonId?>" role="form" method="post" action="<?=$arResult["FORM_ACTION"]?>">
		<?=bitrix_sessid_post()?>
		<input type="hidden" name="sender_subscription" value="add">

		<div class="bx-input-group">
			<input class="bx-form-control" type="email" name="SENDER_SUBSCRIBE_EMAIL" value="" title="<?=GetMessage("subscr_form_email_title")?>" placeholder="<?=htmlspecialcharsbx(GetMessage('subscr_form_email_title'))?>">
		</div>

		<div style="<?=($arParams['HIDE_MAILINGS'] <> 'Y' ? '' : 'display: none;')?>">
			<?if(count($arResult["RUBRICS"])>0):?>
				<div class="bx-subscribe-desc"><?=GetMessage("subscr_form_title_desc")?></div>
			<?endif;?>
			<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
				<div class="bx_subscribe_checkbox_container">
					<input type="checkbox" name="SENDER_SUBSCRIBE_RUB_ID[]" id="SENDER_SUBSCRIBE_RUB_ID_<?=$itemValue["ID"]?>" value="<?=$itemValue["ID"]?>">
					<label for="SENDER_SUBSCRIBE_RUB_ID_<?=$itemValue["ID"]?>"><?=htmlspecialcharsbx($itemValue["NAME"])?></label>
				</div>
			<?endforeach;?>
		</div>

		<?if ($arParams['USER_CONSENT_USE'] == 'Y'):?>
		<div class="bx_subscribe_checkbox_container bx-sender-subscribe-agreement">
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.userconsent.request",
				"",
				array(
					"ID" => $arParams["USER_CONSENT_ID"],
					"IS_CHECKED" => $arParams["USER_CONSENT_IS_CHECKED"],
					"AUTO_SAVE" => "Y",
					"IS_LOADED" => "N",
					"ORIGIN_ID" => "sender/sub",
					"ORIGINATOR_ID" => "",
					"REPLACE" => array(
						"button_caption" => GetMessage("subscr_form_button"),
						"fields" => array(GetMessage("subscr_form_email_title"))
					),
				)
			);?>
		</div>
		<?endif;?>

		<div class="bx_subscribe_submit_container">
			<button class="sender-btn btn-subscribe" id="bx_subscribe_btn_<?=$buttonId?>"><span><?=GetMessage("subscr_form_button")?></span></button>
		</div>
	</form>
<?
$frame->end();
?>
</div>
            </div>
        </div>
    </div>
</div>