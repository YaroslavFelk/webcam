<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?><?$APPLICATION->IncludeComponent("bitrix:search.page", "template1", Array(
	"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "N",	// Искать только в активных по дате документах
		"DEFAULT_SORT" => "rank",	// Сортировка по умолчанию
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под результатами
		"DISPLAY_TOP_PAGER" => "Y",	// Выводить над результатами
		"FILTER_NAME" => "",	// Дополнительный фильтр
		"NO_WORD_LOGIC" => "N",	// Отключить обработку слов как логических операторов
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => "round",	// Название шаблона
		"PAGER_TITLE" => "Результаты поиска",	// Название результатов поиска
		"PAGE_RESULT_COUNT" => "50",	// Количество результатов на странице
		"PATH_TO_USER_PROFILE" => "",	// Шаблон пути к профилю пользователя
		"RATING_TYPE" => "",	// Вид кнопок рейтинга
		"RESTART" => "N",	// Искать без учета морфологии (при отсутствии результата поиска)
		"SHOW_RATING" => "",	// Включить рейтинг
		"SHOW_WHEN" => "N",	// Показывать фильтр по датам
		"SHOW_WHERE" => "Y",	// Показывать выпадающий список "Где искать"
		"USE_LANGUAGE_GUESS" => "N",	// Включить автоопределение раскладки клавиатуры
		"USE_SUGGEST" => "N",	// Показывать подсказку с поисковыми фразами
		"USE_TITLE_RANK" => "N",	// При ранжировании результата учитывать заголовки
		"arrFILTER" => array(	// Ограничение области поиска
			0 => "no",
		),
		"arrWHERE" => "",	// Значения для выпадающего списка "Где искать"
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>