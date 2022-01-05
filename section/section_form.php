<section class="section consultation">
    <div class="container gallery__container">
        <div class="gallery__label label">
            <span></span>
            <p>оставьте<strong> заявку</strong></p>
        </div>
    </div>
    <div class="container">
        <div class="consultation__body text">
            <div class="consultation__body-item">
                <div class="consultation__title title">
                    <span></span>
                    <h2>Получите профессиональную консультацию<strong> бесплатно.</strong></h2>
                </div>
                <p>Оставьте заявку, и наши менеджеры свяжутся с Вами для проведения консультации</p>
            </div>

            <form class="form consultation__form">
                <i>Ваше имя</i>
                <input type="text" name="name"  class="form-text" placeholder="Ваше имя" required>
                <i>Ваш телефон</i>
                <input type="tel" name="phone" id="" class="form-text" placeholder="+7(ХХХ) XXX-XX-XX" required>
                <p>Нажимая на кнопку я подтверждаю, что ознакомлен и согласен с <a tarhet="_blank" href="/agreement/"> условиями политики  конфиденциальности</a></p>
                <input type="submit" class="btn form-btn" value="отправить">
                <input type="hidden" id="page_url" name="page_url" value="<?=$APPLICATION->GetCurPage();?>">

            </form>
        </div>
    </div>
</section>