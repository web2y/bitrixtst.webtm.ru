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
$this->setFrameMode(true);
?>
<div class="home-society__cards-list-content">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <a href="<?echo $arItem["DISPLAY_PROPERTIES"]["SOCIAL_BANNER_LINK"]["VALUE"]?>" class="card-long home-society__card" target="_blank">
            <div class="card-long__content">
                <div class="base-icon-block card-long__icon">
                    <?echo $arItem["DISPLAY_PROPERTIES"]["SOCIAL_BANNER_PICTURE"]["VALUE"]?>
                </div>

                <div class="card-long__text">
                    <h6 class="card-long__title">
                        <?echo $arItem["NAME"];?>
                    </h6>

                    <div class="card-long__description">
                        <?echo $arItem["PREVIEW_TEXT"];?>
                    </div>
                </div>
            </div>

            <div class="card-long__icon-hover">
                <div class="base-icon-block-content">
                    <?$APPLICATION->IncludeFile("/includes/svg/society_card_arrow.html")?>
                </div>
            </div>
        </a>
    <?endforeach;?>
</div>