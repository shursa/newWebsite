<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
$this->setFrameMode(true);

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
    'LIST' => array(
        'CONT' => 'bx_sitemap',
        'TITLE' => 'bx_sitemap_title',
        'LIST' => 'bx_sitemap_ul',
    ),
    'LINE' => array(
        'CONT' => 'bx_catalog_line',
        'TITLE' => 'bx_catalog_line_category_title',
        'LIST' => 'bx_catalog_line_ul',
        'EMPTY_IMG' => $this->GetFolder() . '/images/line-empty.png'
    ),
    'TEXT' => array(
        'CONT' => 'bx_catalog_text',
        'TITLE' => 'bx_catalog_text_category_title',
        'LIST' => 'bx_catalog_text_ul'
    ),
    'TILE' => array(
        'CONT' => 'bx_catalog_tile',
        'TITLE' => 'bx_catalog_tile_category_title',
        'LIST' => 'bx_catalog_tile_ul',
        'EMPTY_IMG' => $this->GetFolder() . '/images/tile-empty.png'
    )
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?><?php
    if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID']) {
        $this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
        $this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

        ?><h1
        class="<? echo $arCurView['TITLE']; ?>"
        id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>"
        ><?
            echo(
            isset($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]) && $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != ""
                ? $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]
                : $arResult['SECTION']['NAME']
            );
            ?></h1><?
    }?>
<div class="catalogs__list"><?
    if (0 < $arResult["SECTIONS_COUNT"]) {
        ?>
            <?
            switch ($arParams['VIEW_MODE'])
            {
            case 'LINE':
                foreach ($arResult['SECTIONS'] as &$arSection) {
                    $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                    $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

                    if (false === $arSection['PICTURE'])
                        $arSection['PICTURE'] = array(
                            'SRC' => $arCurView['EMPTY_IMG'],
                            'ALT' => (
                            '' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
                                ? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
                                : $arSection["NAME"]
                            ),
                            'TITLE' => (
                            '' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
                                ? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
                                : $arSection["NAME"]
                            )
                        );
                    ?><a href="<? echo $arSection['SECTION_PAGE_URL']; ?>" class="catalogs__item"
                         id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"
                         title="<? echo $arSection['PICTURE']['TITLE']; ?>">
                    <div class="catalogs__item-title">
                        <img src="<? echo $arSection['PICTURE']['SRC']; ?>" alt="course">
                        <h4><? echo $arSection['NAME']; ?></h4>
                    </div>
                    <div class="catalogs__item-arrow">
                        <svg viewBox="0 0 11 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.23374 20.9394C0.486017 20.6152 0.1452 19.6558 0.524484 18.943C0.610072 18.7822 2.14756 17.1956 4.20524 15.1447C6.58157 12.7762 7.78151 11.5321 7.86859 11.3463C7.93986 11.1944 7.99817 10.9302 7.99817 10.7593C7.99817 10.5884 7.93986 10.3242 7.86859 10.1723C7.78147 9.9865 6.58157 8.74235 4.20524 6.37389C2.14749 4.32298 0.610051 2.73637 0.524484 2.57552C0.23913 2.03922 0.376327 1.25852 0.830357 0.835041C1.22452 0.46738 1.93478 0.364354 2.44183 0.601317C2.62913 0.688859 3.90952 1.92805 6.41831 4.44996C9.78677 7.83604 10.1414 8.21408 10.374 8.6667C11.0682 10.0177 11.0682 11.5008 10.374 12.8519C10.1414 13.3045 9.7868 13.6826 6.41831 17.0686C3.90952 19.5905 2.62913 20.8297 2.44183 20.9173C2.10813 21.0732 1.56531 21.0832 1.23374 20.9394Z"/>
                        </svg>
                    </div>
                    <div class="catalogs__item-line"></div>
                    </a><?
                }
                unset($arSection);
                break;
            case 'TEXT':
                foreach ($arResult['SECTIONS'] as &$arSection) {
                    $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                    $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

                    ?>
                    <li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"><h2 class="bx_catalog_text_title"><a
                                href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
                        if ($arParams["COUNT_ELEMENTS"] && $arSection['ELEMENT_CNT'] !== null) {
                            ?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
                        }
                        ?></h2></li><?
                }
                unset($arSection);
                break;
            case 'TILE':
                foreach ($arResult['SECTIONS'] as &$arSection) {
                    $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                    $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

                    if (false === $arSection['PICTURE'])
                        $arSection['PICTURE'] = array(
                            'SRC' => $arCurView['EMPTY_IMG'],
                            'ALT' => (
                            '' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
                                ? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
                                : $arSection["NAME"]
                            ),
                            'TITLE' => (
                            '' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
                                ? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
                                : $arSection["NAME"]
                            )
                        );
                    ?>
                    <li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
                <a
                        href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
                        class="bx_catalog_tile_img"
                        style="background-image:url('<? echo $arSection['PICTURE']['SRC']; ?>');"
                        title="<? echo $arSection['PICTURE']['TITLE']; ?>"
                > </a><?
                    if ('Y' != $arParams['HIDE_SECTION_NAME']) {
                        ?><h2 class="bx_catalog_tile_title"><a
                        href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
                        if ($arParams["COUNT_ELEMENTS"] && $arSection['ELEMENT_CNT'] !== null) {
                            ?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
                        }
                        ?></h2><?
                    }
                    ?></li><?
                }
                unset($arSection);
                break;
            case 'LIST':
            $intCurrentDepth = 1;
            $boolFirst = true;
            foreach ($arResult['SECTIONS'] as &$arSection)
            {
            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

            if ($intCurrentDepth < $arSection['RELATIVE_DEPTH_LEVEL']) {
                if (0 < $intCurrentDepth)
                    echo "\n", str_repeat("\t", $arSection['RELATIVE_DEPTH_LEVEL']), '<ul>';
            } elseif ($intCurrentDepth == $arSection['RELATIVE_DEPTH_LEVEL']) {
                if (!$boolFirst)
                    echo '</li>';
            } else {
                while ($intCurrentDepth > $arSection['RELATIVE_DEPTH_LEVEL']) {
                    echo '</li>', "\n", str_repeat("\t", $intCurrentDepth), '</ul>', "\n", str_repeat("\t", $intCurrentDepth - 1);
                    $intCurrentDepth--;
                }
                echo str_repeat("\t", $intCurrentDepth - 1), '</li>';
            }

            echo(!$boolFirst ? "\n" : ''), str_repeat("\t", $arSection['RELATIVE_DEPTH_LEVEL']);
            ?>
            <li id="<?= $this->GetEditAreaId($arSection['ID']); ?>"><h2 class="bx_sitemap_li_title"><a
                            href="<? echo $arSection["SECTION_PAGE_URL"]; ?>"><? echo $arSection["NAME"]; ?><?
                        if ($arParams["COUNT_ELEMENTS"] && $arSection['ELEMENT_CNT'] !== null) {
                            ?> <span>(<? echo $arSection["ELEMENT_CNT"]; ?>)</span><?
                        }
                        ?></a></h2><?

                $intCurrentDepth = $arSection['RELATIVE_DEPTH_LEVEL'];
                $boolFirst = false;
                }
                unset($arSection);
                while ($intCurrentDepth > 1) {
                    echo '</li>', "\n", str_repeat("\t", $intCurrentDepth), '</ul>', "\n", str_repeat("\t", $intCurrentDepth - 1);
                    $intCurrentDepth--;
                }
                if ($intCurrentDepth > 0) {
                    echo '</li>', "\n";
                }
                break;
                }
        echo('LINE' != $arParams['VIEW_MODE'] ? '<div style="clear: both;"></div>' : '');
    }
    ?></div>