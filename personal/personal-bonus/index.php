<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Бонусный счет");
?><?$APPLICATION->IncludeComponent("logictim:bonus.history", "local", Array(
	"FIELDS" => array(	// Какие поля показывать
			0 => "ID",
			1 => "DATE",
			2 => "NAME",
			3 => "OPERATION_SUM",
			4 => "BALLANCE_BEFORE",
			5 => "BALLANCE_AFTER",
		),
		"OPERATIONS_WAIT" => "Y",	// Показывать бонусы, ожидающие активацию
		"ORDER_LINK" => "Y",	// Показывать ссылку на заказ по которому совершена операция
		"ORDER_URL" => "/personal/order/",	// url страницы с комонентом информации о заказах
		"PAGE_NAVIG_LIST" => "30",	// Количество операций на странице
		"PAGE_NAVIG_TEMP" => "arrows",	// Шаблон постраничной навигации
		"SORT" => "DESC",	// Порядок вывода операций
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>