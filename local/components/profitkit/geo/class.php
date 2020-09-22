<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Application;

use \Bitrix\Main\Service\GeoIp;

use Bitrix\Main\Engine\Contract\Controllerable;

use Bitrix\Main\Engine\ActionFilter;
use \Bitrix\Sale\Location\LocationTable as LocationTable;
require_once("ipgeobase.php");
class CProfitkitGeo extends CBitrixComponent implements Controllerable

{

	public function onPrepareComponentParams($arParams)

    {

		return $arParams;

	}

	

	public function configureActions()

	{

		return [

			'city' => [

				'prefilters' => [],

				'postfilters' => []

			],
                'SetCity' => [

                'prefilters' => [],

                'postfilters' => []

            ]
		];

	}



    public function executeComponent()

    {

		$arResult = array();

		if ($_COOKIE['citycode'] and $_COOKIE['cityname'])
        {
            $arResult['city'] = $_COOKIE['cityname'];
            global $detectedCityCode;
            $detectedCityCode = $_COOKIE['citycode'];
            $arResult['citycode'] = $detectedCityCode;
        }
        else {
            GeoIp\Manager::useCookieToStoreInfo(true);

            $ipAddress = GeoIp\Manager::getRealIp();

            /*echo "<pre style='display:none;'>$ipAddress";
            var_dump(GeoIp\Manager::getDataResult($ipAddress, "ru"));
            echo "</pre>";
            //$ipAddress = '80.70.96.3';

            $city = GeoIp\Manager::getCityName($ipAddress, "ru");*/

            $gb = new IPGeoBase();
            $data = $gb->getRecord($ipAddress);
            $city = mb_convert_encoding($data['city'], "UTF-8", "WINDOWS-1251");

            if ($city) {

                $arResult['city'] = $city;
                $arResult['auto'] = true;
                global $detectedCity;

                $detectedCity = $city;

                if (CModule::IncludeModule('sale')) {
                    $parameters = array(
                        'filter' => array('NAME.NAME' => $city), // описание фильтра для WHERE и HAVING
                    );
                    $city = LocationTable::getList($parameters)->fetch();
                    if ($city) {
                        global $detectedCityCode;

                        $detectedCityCode = $city['CODE'];
                        $arResult['citycode'] = $detectedCityCode;
                    }
                }
            }
        }
		$this->arResult = $arResult;

			

       	$this->includeComponentTemplate();



    }

	

	public function cityAction()
	{
        if ($_COOKIE['citycode'] and $_COOKIE['cityname'])
        {
            $city = $_COOKIE['cityname'];
            return $city;
        }
		GeoIp\Manager::useCookieToStoreInfo(true);

		$ipAddress = GeoIp\Manager::getRealIp();

		//echo $ipAddress;

		//var_dump(GeoIp\Manager::getDataResult($ipAddress, "ru"));

		//$ipAddress = '80.70.96.3';

		//$city = GeoIp\Manager::getCityName($ipAddress, "ru");
		
		$gb = new IPGeoBase();
		$data = $gb->getRecord($ipAddress);
		$city = mb_convert_encoding($data['city'], "UTF-8", "WINDOWS-1251");
		
		if (!$city)
			$city = 'Санкт-Петербург';
				

		return $city;

	}
    public function SetCityAction($id)
    {
        CModule::IncludeModule('sale');
        $res = \Bitrix\Sale\Location\LocationTable::getByCode($id, array(
            'filter' => array('=NAME.LANGUAGE_ID' => LANGUAGE_ID),
            'select' => array('*', 'NAME_RU' => 'NAME.NAME')
        ));
        if ($item = $res->fetch()) {
            $city_name = $item['NAME_RU'];
            global 	$detectedCityCode;
            $detectedCityCode = $id;
            setcookie('citycode', $id, time()+1000000, "/");
            setcookie('cityname', $city_name, time()+1000000, "/");
        }
        return array('city'=>$city_name);
    }




};



?>