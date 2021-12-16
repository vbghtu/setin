</main>
<footer class="footer">
     <div class="container">
        <div class="footer__body">
           <div class="footer__item">
              <a href="/" class="logo footer__logo">
                 <img src="<?=SITE_TEMPLATE_PATH;?>/img/logo.png" alt="">
                 <strong>СтройЭкспертНадзор</strong>
                 <p>эксперты в строительстве</p>
              </a>
              <div class="phone__info footer__phone-info">
                 <a href="tel:<?=$GLOBALS["arProps"]['phone']["VALUE"]?>">
                    <?=$GLOBALS["arProps"]['phone']["VALUE"]?>
                 </a>
              </div>
              <a href="<?=$GLOBALS["arProps"]['email']["VALUE"]?>" class="mail footer__mail">
                <?=$GLOBALS["arProps"]['email']["VALUE"]?>
              </a>
           </div>
           <div class="footer__item">
              <div class="footer__title">
                 Услуги
              </div>
              <nav class="second-navigation footer__second-navigation">
                <?$APPLICATION->IncludeComponent(
                       "bitrix:menu",
                       "footer_multi",
                       array(
                           "ALLOW_MULTI_SELECT" => "N",
                           "DELAY" => "N",
                           "MAX_LEVEL" => "1",
                           "MENU_CACHE_GET_VARS" => array(
                           ),
                           "MENU_CACHE_TIME" => "3600",
                           "MENU_CACHE_TYPE" => "N",
                           "MENU_CACHE_USE_GROUPS" => "Y",
                           "ROOT_MENU_TYPE" => "dop_top",
                           "USE_EXT" => "Y",
                           "MENU_THEME" => "site",
                           "COMPONENT_TEMPLATE" => "top_dop_multi",
                           "CHILD_MENU_TYPE" => "dop_menu",
                           "CUSTOM_CLASS" =>"second-menu footer__second-menu"
                       ),
                       false,
                       array(
                           "ACTIVE_COMPONENT" => "Y"
                       )
                   );?>
              </nav>
           </div>
           <div class="footer__item">
              <div class="footer__title">
                 Полезое
              </div>
              <nav class="navigation footer__navigation">
                <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "footer_multi",
                    array(
                        "ALLOW_MULTI_SELECT" => "Y",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "N",
                        "ROOT_MENU_TYPE" => "top",
                        "USE_EXT" => "Y",
                        "MENU_THEME" => "site",
                        "COMPONENT_TEMPLATE" => "top_multi",
                        "CHILD_MENU_TYPE" => "left",
                        "CUSTOM_CLASS" =>"menu footer__menu"
                    ),
                    false,
                        array(
                            "ACTIVE_COMPONENT" => "Y"
                        )
                    );?>
              </nav>
           </div>
        </div>
        <div class="copyright">
           © ООО «СтройЭкспертНадзор», <?=date('Y')?> | Все права защищены
        </div>
     </div>
  </footer>
</div>
</body>
</html>