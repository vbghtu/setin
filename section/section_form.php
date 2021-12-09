	<section class="sect4">
		<div class="container">
			<div class="viewt" id="title_one">Получите профессиональную консультацию бесплатно</div>
			<form id="one">
				<div class="wrap-input">
					<div class="label">Ваше имя</div>
					<input type="text" name="name_one" id="name_one">
				</div>
				<div class="wrap-input">
					<div class="label">Телефон *</div>
					<input type="tel" name="phone_one" id="phone_one" required>
				</div>
				<input type="hidden" id="page_url" name="page_url" value="<?=$APPLICATION->GetCurPage();?>">
				<div class="wrap-input for-chekbox">
					<div class="checkbox">
						<input id="check_one" type="checkbox" name="check_one" value="yes">
						<label for="check_one">
							Я согласен с правилами <a href="/agreement/">СтройЭкпертНадзора</a> <br>
							по обработке и хранению <br>
							персональных данных
						</label>
					</div>
					
				</div>
				<div class="wrap-input">
					<input type="submit" value="Заказать консультацию" id="zakazat2">
				</div>
			
				<div class="clear"></div>
				
				<div align="center" id="check_form_one" style="color:#E0FFFF;"><b></b></div>
				
				<div class="clear"></div>
			</form>
		</div>
	</section>
