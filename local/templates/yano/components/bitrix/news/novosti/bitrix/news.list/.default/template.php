<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
 
if ($arResult['ITEMS'])
{ 
?>
<section class="press-center" data-controller="view-more">
	<header class="press-center__header">
		<h1 class="light"><?=$arResult['NAME']?></h1>
	</header>
	<div class="press-center__articles press-center__articles--wide-list" data-target="view-more.container">
	<?
	foreach ($arResult['ITEMS'] as $arItem)
	{
		$this->AddEditAction( $arItem[ 'ID' ], $arItem[ 'EDIT_LINK' ], CIBlock::GetArrayByID( $arItem[ "IBLOCK_ID" ], "ELEMENT_EDIT" ) );
		$this->AddDeleteAction( $arItem[ 'ID' ], $arItem[ 'DELETE_LINK' ], CIBlock::GetArrayByID( $arItem[ "IBLOCK_ID" ], "ELEMENT_DELETE" ), array( "CONFIRM" => GetMessage( 'CT_BNL_ELEMENT_DELETE_CONFIRM' ) ) );

		if ($arItem['PROPERTIES']['important']['VALUE'] == 'Да')
		{
		$img = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], ['width'=>2240, 'height'=>9999], BX_RESIZE_IMAGE_PROPORTIONAL, true);
	?>
		<article class="news-important" style="background-image: url(<?=$img['src']?>)" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="news-important__link">
				<h2 class="news-important__title"> <?=$arItem['~NAME']?> </h2>
			</a>
			<time class="news-important__publication-date" datetime="<?=FormatDate('Y-m-d', MakeTimeStamp($arItem['ACTIVE_FROM']))?>"><?=$arItem['DISPLAY_ACTIVE_FROM']?></time>
		</article>
	<? 
		}
		else 
		{
			$img = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], ['width'=>706, 'height'=>9999], LIBXML_XINCLUDE, true);
			?>
		<article class="news news--wide">
			<div class="news__publication-info">
				<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="news__link">
					<h3 class="news__title content-block">
						<?
				if ($arItem['~PREVIEW_TEXT'])
				{
						?>
						<mark> <?=$arItem['~NAME']?> </mark>
						<span><?=$arItem['~PREVIEW_TEXT']?></span>
						<?
				}
				else
				{
					echo $arItem['~NAME'];
				}
						?>
					</h3>
				</a>
				<time class="news__publication-date" datetime="<?=FormatDate('Y-m-d', MakeTimeStamp($arItem['ACTIVE_FROM']))?>"><?=$arItem['DISPLAY_ACTIVE_FROM']?></time>
			</div>
			<div class="news__illustration" style="background-image: url(<?=$img['src']?>)"></div>
		</article>
	<?
		}
	}
	?>
	</div>
	<?=$arParams['DISPLAY_BOTTOM_PAGER']?$arResult['NAV_STRING']:''?>
</section>
<?
}
?>
