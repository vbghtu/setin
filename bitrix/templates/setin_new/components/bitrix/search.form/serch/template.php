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
$this->setFrameMode(true);?>


            <form action="<?=$arResult["FORM_ACTION"]?>" type="POST" class="search-form">
            <label>
                <?if($arParams["USE_SUGGEST"] === "Y"):?>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:search.suggest.input",
                        "",
                        array(
                            "NAME" => "q",
                            "VALUE" => "",
                            "INPUT_SIZE" => 15,
                            "DROPDOWN_SIZE" => 10,
                        ),
                        $component, array("HIDE_ICONS" => "Y")
                    );?>
                <?else:?>
                   <input autocomplete="off" type="text" name="q" data-value="Search for minimalist chair" class="search-form__text" placeholder="Поиск...">

                <?endif;?>
                  <button  name="s" type="submit" class="search-form__btn" value="<?=GetMessage("BSF_T_SEARCH_BUTTON");?>">
                   <span class="icon-search"></span>
                </button>
            </label>

            <button type="reset" class="search-form__close">
               <span></span>
               <span></span>
            </button>
            </form>



