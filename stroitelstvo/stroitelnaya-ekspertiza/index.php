<?

header("HTTP/1.1 301 Moved Permanently");
header("Location: http://seitn.ru/polezno/119/");

die;

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Строительная экспертиза");
$APPLICATION->SetPageProperty("description", "Строительная экспертиза");
$APPLICATION->SetTitle("Строительная экспертиза");
?> 

<div id="content" class="main_content">
	<div class="common_wrapper">
		<div>
			<div class="sidebar fL">
				<ul class="menu no_list fL w">

					<?$APPLICATION->IncludeComponent(
						"bitrix:menu", 
						"left_main", 
						array(
							"ROOT_MENU_TYPE" => "left",
							"MENU_CACHE_TYPE" => "N",
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_CACHE_GET_VARS" => array(
							),
							"MAX_LEVEL" => "2",
							"CHILD_MENU_TYPE" => "left_dop",
							"USE_EXT" => "Y",
							"DELAY" => "N",
							"ALLOW_MULTI_SELECT" => "N"
							),
							false
						);
					?>

				</ul>

				<a href="#dialog2" class="submit_app fL" onclick="ga('send','event','click','order'); yaCounter27025170.reachGoal('order_click');">Оформить заявку</a>
				<span class="recommend fL">Рекомендательные письма:</span>
				
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include", 
					".default", 
					array(
						"AREA_FILE_SHOW" => "file",
						"PATH" => "/include/banner.php",
						"EDIT_TEMPLATE" => ""
					),
				false
				);?>

			</div>

			<div class="main fR">
				<div class="bread w fL">
					<?$APPLICATION->IncludeComponent(
						"bitrix:breadcrumb",
						"",
						Array(
							"START_FROM" => "0",
							"PATH" => "",
							"SITE_ID" => "s1"
						)
					);?>
				</div>
				<div class="inner inner_content fL w">
					<div class="newh3">Стрительная экспертиза</div>	
					<div class="fR" style="width:295px;" >
						<img src="<?=SITE_TEMPLATE_PATH?>/images/exp.jpg" style="margin:0 0px 22px 22px;" />
					</div>
			
					<div class="fL" style="width:420px;" >
						<p>
							<b>Строительная экспертиза</b> представляет собой комплекс специальных мероприятий, которые направлены 
							на определение нарушений и недостатков, допущенных в течение выполнения как <a href="/proverka_i_razrabotka_smet/">проектно-сметных</a>, так и 
							строительно-монтажных, ремонтно-отделочных работ. Проведенная строительная
							экспертиза позволяет предупреждать и разрешать конфликты, нормировать документацию, экономить бюджеты.
						</p>
						<p>
							<b>Строительная экспертиза необходима</b>, в первую очередь, для того, чтобы урегулировать
							споры между заказчиком и подрядчиком, а также другими участниками строительного процесса.
						</p>
						<p>	
							Основными направлениями деятельности строительной экспертизы являются соблюдение законности, 
							прав и свобод человека, юридических лиц, а также всесторонность, объективность исследования. 
							Все они изложены в положениях Федерального Законодательства.
						</p>
					</div>
					<p>
						<br/>
						<span style="text-transform:uppercase; color:#1b96ef; font-size:14px;">Сегодня известны несколько видов строительных экспертиз согласно цели проведения:</span>
						<br/>
						<br/>
					</p>
					<ol class="large_numbers">
						<li>
							<span class="large">1</span>
							<p>
								Наиболее востребованной является, безусловно, <b>строительная экспертиза</b>. Основная задача - выявление фактического состояния конструкций, коммуникаций, материала, 
								выполнение таких исследований, которые  смогут полно и ясно ответить на поставленные вопросы перед экспертом, умение сопоставить полученные результаты определенным 
								требованиям строительных норм и правил и, безусловно, требованиям проекта строительства.
							</p>
						</li>
						<li>
							<span class="large">2</span>
							<p>
								Еще одним весьма популярным фактором строительной экспертизы является экспертиза объемов и цен выполненных работ. Проводя данную экспертизу, специалистами 
								производится калькуляция фактических объемов и сравнивается с проектно-сметной и исполнительной документацией. В эту же экспертизу входит и изучение материалов, 
								анализ смет, которые предоставляют подрядчики. Этот раздел стройэкспертизы легко выявляет завышение объёмов строительства нерадивыми подрядчиками.
							</p>
						</li>
						<li>
							<span class="large">3</span>
							<p>
								Довольно часто проводят стройэкспертизу <a href="/stroitelnaya-ekspertiza/ekspertiza_inzhenernyh_sistem/">инженерных систем и коммуникаций</a>. Эта экспертиза служит для 
								испытания качества проведенных монтажных работ по электрическим, водопроводным, отопительным, канализационным, вентиляционным сетям, а также системам кондиционирования, 
								сигнализации, связи, индивидуальных котельных и тепловых пунктов.
							</p>
						</li>
						<li>
							<span class="large">4</span>
							<p>
								Проводят и экспертизу <a href="/proverka_i_razrabotka_smet/">проектно-сметных работ</a>. Ее цель - определить степень полноты набора необходимых норм, соответствия заданию и 
								строительным нормам и правилам принятых проектных решений. Тогда выполняется проверка сметных расчетов.
							</p>
						</li>
					</ol>

					<p>
						Необходимо уточнить, что все независимые строительные экспертизы проводятся с целью констатации факта каких-либо дефектов либо их отсутствия, проверки документации для соответствия 
						существующим Правилам, а также оценки стоимости восстановления конструкций объекта, формулировки рекомендаций экспертов по поводу дальнейших действий участников.
					</p>

					<p>
						В некоторых случаях выполняется и экспертная оценка заключения самой независимой экспертизы, которая выполнена иным экспертным предприятием. Целесообразной последняя выступает в 
						случае необходимости выявления сознательных ошибок групп экспертов, нанятых непосредственно подрядчиками.
					</p>

					<p>
						Результатом строительного обследования является, как правило, техническое заключение. Оно проводится по результатам <a href="/tehnadzor/">технического обследования</a>, смыслом его 
						выступает установление 	технического текущего состояния строения, выявление изъянов, определение степени работоспособности конструкций и т.д. При этом заказчик в итоге 
						получает полнейшую информацию не только о возможности реконструкции или перепланировки, но и о необходимости ликвидации каких-либо неполадок во всем сооружении или же в 
						конкретном помещении.
					</p>

					<p>
						<i>Программа 1-го канала, посвященная строительной экспертизе с участием нашего специалиста Коломоец Евгения Вячеславовича</i>
					</p>

					<div>
						<object>
							<embed type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" width="720" height="420" align="middle" flashvars="stats=http://www.1tv.ru/addclick/" 
							allowscriptaccess="always" swliveconnect="true" wmode="window" allowfullscreen="true" quality="high" bgcolor="white" name="videoportal" id="videoportal" src="http://www.1tv.ru/promoovideo/50893">
						</object>
					</div>

				</div>
		
				<div class="choosen margin fL w">	
					<span class="title fL">Нас уже выбрали:</span>
					<div class="choosen_slider w fL">
						<div class="Vwidget">
							<a href="#" class="up"></a>
							<div class="VjCarouselLite">
								<ul>								

									<?
									CModule::IncludeModule("iblock");
									$arSelect = Array("ID", "NAME", "PROPERTY_TIP", "PROPERTY_KOD", "PROPERTY_IMG", "PROPERTY_URL");
									$res = CIBlockElement::GetList (
									   Array(),
									   Array("IBLOCK_ID" => 2),
									   false,
									   false,
									   $arSelect
									);

									$list_fields = array();

									while($ar_fields = $res->GetNext())
									{
										$list_fields[] = $ar_fields;
									}

									foreach ($list_fields as $elem) 
									{
										$img_src = CFile::ResizeImageGet($elem[PROPERTY_IMG_VALUE], array('width'=>148, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
										$elem['IMAGE'] = $img_src['src'];
										?> 
										<li>
											<a href="<?=$elem['PROPERTY_URL_VALUE']?>"><img src="<?=$elem['IMAGE']?>" alt=""></a>
										</li>
									<?
									}										
									?>	
										
								</ul> 
							</div>
							<a href="#" class="down"></a>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>

<div class="our_projects w">
	<div class="common_wrapper">
		<div>
			<div class="our_projects_wrapper fL w">
				<span class="title_projects fL">Выполненные работы:</span>
				<div class="projects_slider w fL">
					<div class="Vwidget">
						<a href="#" class="up_proj"></a>
						<div class="VjCarouselLite_proj">

							<ul class="works-list">

	               			<?
							CModule::IncludeModule("iblock");
							$arSelect = Array("ID", "NAME", "PREVIEW_PICTURE", "DETAIL_PAGE_URL");
							$res = CIBlockElement::GetList (
							   Array("RAND" => "ASC"),
							   Array("IBLOCK_ID" => 1, "!SECTION_ID" => 15),
							   false,
							   Array (),
							   $arSelect
							);
							while($ar_fields = $res->GetNext())
							{
								$list_fields_obj[] = $ar_fields;
							}

							//print_r($list_fields_obj);die();
							foreach ($list_fields_obj as $obj) 
							{
								
								$img_obj = CFile::ResizeImageGet($obj['PREVIEW_PICTURE'], array('width'=>207, 'height'=>180), BX_RESIZE_IMAGE_EXACT, true);
								$obj['IMAGE'] = $img_obj['src'];


								?> 
								<li class="project_preview">
								    <a href="<?=$obj[DETAIL_PAGE_URL]?>">
								    	<? if ( ! empty ($obj['IMAGE'] )): ?>
											<img src="<?=$obj['IMAGE']?>" />
										<?else: ?>
											<img src="<?=SITE_TEMPLATE_PATH?>/images/about.jpg" width="207" height="180" />
										<?endif;?>
									</a>
									<span class="title"></span>
									<span class="anons"><?=$obj["NAME"];?></span>		    
								</li>
							<?
							}										
							?>	

					        </ul>

						</div>
						<a href="#" class="down_proj"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
</div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>