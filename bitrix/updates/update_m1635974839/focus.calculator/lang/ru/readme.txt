Библиотека содержит: 
1. компонент отображения калькулятора в папке component
2. структуру и тестовые данные инфоблока калькулятора в папке iblock

Структура данных калькулятора:
1. Разделы инфоблоков - группы услуг
2. Элемент инфоблока - одна услуга

Алгоритм расчета:
Калькулятор поддерживает расчет для каждой услуги по одному из двух алгоритмов: 
1. Услуги с базовой стоимостью и поправочными коэффициентами к ней
2. Услуги с рассчитываемой стоимостью и формулой расчета к ней
Ниже кратко описываются оба алгоритма. 
Другие описания и примеры смотрите на сайте разработчика http://2of3.ru/calculators/#FREE_docs


Алгоритм расчета - "Услуга с базовой стоимость и поправочными коэффициентами к ней"
Элементы алгоритма:
a1. Тариф за единицу услуги
	Может быть показан в явном виде или скрыт.	

a2. Количество единиц заказываемой услуги
	Может вводиться пользователем или быть скрытым от него в зависисмости от настроек услуги (элемента инфоблока)
	Если поле скрывается, то его значение равно 1 (единице)

a3. Срок исполнения
	Имеет два значения: месяц или весь расчетный период.
	Если выбран месяц, то считается, что услуга оказывается в течение месяца, после чего происходит полный расчет.
	Если выбран расчетный период, то считается, что услуга оказывается в течении количества месяцев, указанных в поле "Расчетный период"

a4. Расчетный период (месяцев)
	Время в течение которого услуга оказывается. Используется для расчета ежемесячного платежа.

a5. Корректирующие коэффициенты
	По умолчанию поддерживается 5 коэффициентов (k1-k5).
	Количество моджет быть увеличено в настройках инфоблока
 
	Для определения способа коррекции тарифа коэффициентом перед ним без пробела устанавливается модификатор.
 
	Список модификаторов:
	"*" - умножить
	"/" - разделить
	"+" - прибавить
	"-" - вычесть
 	Если ничего не указано по умолчанию применяется модификатор "+".
 
	Пример записи модификатора.
 	Запись "*1.2" означает умножение тарифа услуги (a1) на 1.2	
 
	Для визуального представления на странице корректирующих коэффициентов в виде: выпадающи списков, радиокнопок или чекбоксов в поле
	"Название корректирующего коэффициента" можно добавлять модификаторы внешнего вида по шаблону: "Название поля /модификатор"
 
	Список модификаторов:
	l - выпадающий список
	ml - выпадающий список с множественным выбором
	с - чекбоксы (квадратики)
	r - радиокнопки (кружочки)
 	Если ничего не указано, то по умолчанию применяется модификатор r.
 
	Пример. 
	Запись: "Степень риска /с" выведет весь список значений корректирующего коэффициента "Степень риска" в виде чекбоксов.

	Пример расчета.
	Пусть тариф услуги "Консультация" равен 300 руб. (a1=300) и применяется два корректирующих коэффициента: 
	k1 - Тип консультации: устная (*1), письменная (*2), письменная с заверением нотариусом (*3)
	k2 - Доставка документов: самовывоз (-100), почта России (100), курьером по Москве (300)
	Пусть теперь посетитель выбрал количество единиц услуги - 5 (a2=5), срок исполнения - "весь расчетный период" и расчетный период - 12 месяцев (a4=12)
	И далее посетитель выбрал второе значение k1 и первое значение k2
	Тогда общая сумма услуги будет равна
	(300*2-100)*5=2500 руб.
	Ежемесячный платеж будет равен
	2500/12=104.17 руб.



Алгоритм расчета - "Услуги с рассчитываемой стоимостью и формулой расчета к ней"
Элементы алгоритма:
b1. Количество заказываемой услуги (товара)

b2. Формула расчета стоимости услуги (товара) слагаемыми и множителями которой являются значения корректирующих коэффициентов
	Например: *(k1*k3+k2+k4*0)

b3. Срок исполнения
	Имеет два значения: месяц или весь расчетный период.
	Если выбран месяц, то считается, что услуга оказывается в течение месяца, после чего происходит полный расчет.
	Если выбран расчетный период, то считается, что услуга оказывается в течении количества месяцев, указанных в поле "Расчетный период"

b4. Расчетный период (месяцев)
	Время в течение которого услуга оказывается. Используется для расчета ежемесячного платежа.
	Если b3="месяц", а b4=5, то общая сумма равна 5*сумму за месяц. Т.е. в общей сумме ежемесячные платежи суммируются.
	Если b3="за расчетный период", а b4=5, то общая сумма равна 5/сумму за месяц. Т.е. общая сумма равна сумме услуги, а ежемесячные платежи по сути платежи в рассрочку.

b5. Корректирующие коэффициенты
	Описание коэффициентов и их модификаторов точно такое же как в а5, однако применение иное.
	В алгоритме "b"выбранные значения коэффициентов подставляются в формулу b2, а в алгоритме "a" выбранные значения коэффициентов последовательно применяются к тарифу a1.
	Таким образом алгоритм "b" более универсален и содержит в себе как частный случай алгоритм "а". Но алгоритм "а" проще для своего круга задач.

	Пример.
	Пусть требуется рассчитать стоимость печати тиража фотоальбома.
	Определим коэффициенты формулы.
	k1 - Формат альбома; k1: "A4L"=10, "XL"=15, "A4"=20
	k2 - Тип переплета; k2: "7БЦ твердый"=500, "СКОБА твердый"=15, "Мягкий"=300
	k3 - Количество страниц; k3: 2, 4, 6, 8...
	k4 - Плотность бумаги; k4: 80, 115, 135, 150 (Предположим, что стоимость бумаги не влияет на стоимость тиража)

	Тогда расчетная фомула b2 будет такой: *(k1*k3+k2+k4*0).
	Количество страниц альбома умножается на стоимость печати страницы (выбранного формата), затем прибавляется стоимость переплета и затем добавляется плотность бумаги, умноженная на ноль для того, чтобы указанная плотность попала в завку, но не учитывалась в расчете.

	Пусть теперь пользователь захотел напечатать 10 8-ми страничных альбомов формата A4 в твердом переплете 7БЦ на бумаге плотностью 80 г/м2.
	Оплата будет в рассрочку в течение 3-х месяцев: b3="За расчетный период", b4=3.
	Тогда имеем общую сумму заказа: 10*(8*20+500+80*0) = 6600 руб.
	Ежемесячный платеж: 6600/3=2200 руб.