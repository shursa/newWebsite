<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("История Заказов");
?>Text here....<?$APPLICATION->IncludeComponent(
	"bitrix:sale.personal.order.list",
	"",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ALLOW_INNER" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"DEFAULT_SORT" => "STATUS",
		"DISALLOW_CANCEL" => "N",
		"HISTORIC_STATUSES" => array("D","F","N","P"),
		"ID" => $ID,
		"NAV_TEMPLATE" => "",
		"ONLY_INNER_FULL" => "N",
		"ORDERS_PER_PAGE" => "20",
		"PATH_TO_BASKET" => "",
		"PATH_TO_CANCEL" => "",
		"PATH_TO_CATALOG" => "/catalog/",
		"PATH_TO_COPY" => "",
		"PATH_TO_DETAIL" => "",
		"PATH_TO_PAYMENT" => "payment.php",
		"REFRESH_PRICES" => "N",
		"RESTRICT_CHANGE_PAYSYSTEM" => array("D","F","N","P"),
		"SAVE_IN_SESSION" => "Y",
		"SET_TITLE" => "Y",
		"STATUS_COLOR_D" => "gray",
		"STATUS_COLOR_F" => "gray",
		"STATUS_COLOR_N" => "green",
		"STATUS_COLOR_P" => "yellow",
		"STATUS_COLOR_PSEUDO_CANCELLED" => "red",
		"STATUS_COLOR_S" => "gray"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>