<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->IncludeComponent("bitrix:sale.basket.basket", "tanais.basket.basket_main", Array(
	"BASKET_WITH_ORDER_INTEGRATION" => "Y",
		"ACTION_VARIABLE" => "basketAction",	// Название переменной действия
		"ADDITIONAL_PICT_PROP_2" => "-",
		"ADDITIONAL_PICT_PROP_3" => "-",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AUTO_CALCULATION" => "Y",	// Автопересчет корзины
		"BASKET_IMAGES_SCALING" => "standard",	// Режим отображения изображений товаров
		"COLUMNS_LIST" => array(
			0 => "NAME",
			1 => "DISCOUNT",
			2 => "PRICE",
			3 => "QUANTITY",
			4 => "SUM",
			5 => "PROPS",
			6 => "DELETE",
			7 => "DELAY",
		),
		"COLUMNS_LIST_EXT" => array(	// Выводимые колонки
			0 => "PREVIEW_PICTURE",
			1 => "DELETE",
			2 => "SUM",
		),
		"COLUMNS_LIST_MOBILE" => array(	// Колонки, отображаемые на мобильных устройствах
			0 => "PREVIEW_PICTURE",
			1 => "DELETE",
			2 => "SUM",
		),
		"COMPATIBLE_MODE" => "N",	// Включить режим совместимости
		"CORRECT_RATIO" => "Y",	// Автоматически рассчитывать количество товара кратное коэффициенту
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
		"DEFERRED_REFRESH" => "N",	// Использовать механизм отложенной актуализации данных товаров с провайдером
		"DISCOUNT_PERCENT_POSITION" => "bottom-right",	// Расположение процента скидки
		"DISPLAY_MODE" => "extended",	// Режим отображения корзины
		"EMPTY_BASKET_HINT_PATH" => "/",	// Путь к странице для продолжения покупок
		"LABEL_PROP" => "",	// Свойства меток товара
		"OFFERS_PROPS" => array(
			0 => "SIZES_SHOES",
			1 => "SIZES_CLOTHES",
		),
		"PATH_TO_ORDER" => "/personal/order/make/",	// Страница оформления заказа
		"PRICE_DISPLAY_MODE" => "N",	// Отображать цену в отдельной колонке
		"PRICE_VAT_SHOW_VALUE" => "Y",	// Отображать значение НДС
		"PRODUCT_BLOCKS_ORDER" => "props,sku,columns",	// Порядок отображения блоков товара
		"QUANTITY_FLOAT" => "N",	// Использовать дробное значение количества
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SHOW_DISCOUNT_PERCENT" => "Y",	// Показывать процент скидки рядом с изображением
		"SHOW_FILTER" => "N",	// Отображать фильтр товаров
		"SHOW_RESTORE" => "N",	// Разрешить восстановление удалённых товаров
		"TEMPLATE_THEME" => "site",	// Цветовая тема
		"HIDE_COUPON" => "Y",	// Спрятать поле ввода купона
		"TOTAL_BLOCK_DISPLAY" => "",	// Отображение блока с общей информацией по корзине
		"USE_DYNAMIC_SCROLL" => "N",	// Использовать динамическую подгрузку товаров
		"USE_ENHANCED_ECOMMERCE" => "N",	// Отправлять данные электронной торговли в Google и Яндекс
		"USE_GIFTS" => "N",	// Показывать блок "Подарки"
		"USE_PREPAYMENT" => "N",	// Использовать предавторизацию для оформления заказа (PayPal Express Checkout)
		"USE_PRICE_ANIMATION" => "Y",	// Использовать анимацию цен
		"COMPONENT_TEMPLATE" => "tanais.basket.basket"
	),
	false
);