<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Application;
use Bitrix\Main\Web\Cookie;
use \Profitkit\Shopstart\Basket\BasketTable;
use \Profitkit\Shopstart\OwnerTable;
use \Profitkit\Shopstart\Shop;

class CProfitkitBasketStart extends CBitrixComponent
{
	public function onPrepareComponentParams($arParams)
    {
		return $arParams;
	}
	
    public function executeComponent()
    {
       /* if (!$_SESSION['pk_sale_user'])
            $_SESSION['pk_sale_user'] = 123;
        $cookie = new Cookie("TEST", 42);
        //$cookie->setDomain("example.com");
       // Application::getInstance()->getContext()->getResponse()->addCookie($cookie);
// Cookie будет доступна только на следующем хите!
        echo Application::getInstance()->getContext()->getRequest()->getCookie("TEST");

        echo "<pre>";
        var_dump($_COOKIE);
        var_dump($_SESSION); echo "</pre>";*/

        $arResult = array();

        \Bitrix\Main\Loader::IncludeModule("profitkit.shopstart");

        $owner_id = OwnerTable::getOwnerId();

        $context = Application::getInstance()->getContext();
        $request = $context->getRequest();
        if ($request['act']) {
            if ($request['act'] == 'del' and $request['id'] > 0) {
                $basketDb = BasketTable::getList(array('filter'=>array('ID'=> (int)$request['id'],'OWNER_ID'=>$owner_id, 'DELAY'=>0)));
                if ($row = $basketDb->fetch()) {
                    BasketTable::delete($row['ID']);
                }
            }
            elseif ($request['act'] == 'up' and $request['id'] > 0) {
                $basketDb = BasketTable::getList(array('filter'=>array('ID'=> (int)$request['id'],'OWNER_ID'=>$owner_id, 'DELAY'=>0)));
                if ($row = $basketDb->fetch()) {
                    $update = [];
                    $update['QUANTITY'] = $row['QUANTITY']+1;
                    $update['DATATIME_UPDATE'] = new \Bitrix\Main\Type\Datetime(date("d.m.Y H:i:s"), 'd.m.Y H:i:s');
                        BasketTable::update($row['ID'], $update);
                }
            }
            elseif ($request['act'] == 'down' and $request['id'] > 0) {
                $basketDb = BasketTable::getList(array('filter'=>array('ID'=> (int)$request['id'],'OWNER_ID'=>$owner_id, 'DELAY'=>0)));
                if ($row = $basketDb->fetch()) {
                    if ($row['QUANTITY'] > 1) {
                        $update = [];
                        $update['QUANTITY'] = $row['QUANTITY'] - 1;
                        $update['DATATIME_UPDATE'] = new \Bitrix\Main\Type\Datetime(date("d.m.Y H:i:s"), 'd.m.Y H:i:s');
                        BasketTable::update($row['ID'], $update);
                    }
                }
            }
        }

        $basketDb = BasketTable::getList(array('filter'=>array('OWNER_ID'=>$owner_id, 'DELAY'=>0)));
        while ($row = $basketDb->fetch()) {
            $row['PRICE_formated'] = Shop::getPriceFormated($row['PRICE']);
            if ((int)$row['PRICEOLD'] > 0) {
                $row['PRICEOLD_formated'] = Shop::getPriceFormated($row['PRICEOLD']);
                $row['DISCOUNT'] = $row['PRICEOLD'] - $row['PRICE'];
                $row['DISCOUNT_formated'] = Shop::getPriceFormated($row['DISCOUNT']);
                $row['DISCOUNT_SUM'] = $row['DISCOUNT'] * $row['QUANTITY'];
                $row['DISCOUNT_SUM_formated'] = Shop::getPriceFormated($row['DISCOUNT_SUM']);
                $arResult['DISCOUNT_ALL'] += $row['DISCOUNT_SUM'];
                $row['SUMOLD'] = $row['PRICEOLD']*$row['QUANTITY'];
                $row['SUMOLD_formated'] = Shop::getPriceFormated($row['SUMOLD']);
            }
            $row['SUM'] = $row['PRICE']*$row['QUANTITY'];
            $row['SUM_formated'] = Shop::getPriceFormated($row['SUM']);

            $row['PRICE_formated'] = Shop::getPriceFormated($row['PRICE']);

            $arResult['SUM_ALL'] += $row['SUM'];
            $arResult['QUANTITY']++;
            $arResult['ITEMS'][] = $row;
        }

        $arResult['SUM_ALL_formated'] = Shop::getPriceFormated($arResult['SUM_ALL']);
        if ((int)$arResult['DISCOUNT_ALL'] > 0)
            $arResult['DISCOUNT_ALL_formated'] = Shop::getPriceFormated($arResult['DISCOUNT_ALL']);
        $this->arResult = $arResult;
        $this->includeComponentTemplate();
    }
}
?>