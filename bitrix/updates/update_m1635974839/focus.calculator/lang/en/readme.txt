The library contains: 
1. a component of display of the calculator in the component folder
2. structure and test data of an info unit of the calculator in the iblock folder

Calculator data structure:
1. Sections of info units - groups of services
2. An info unit element - one service

Algorithm of calculation:
The calculator supports calculation for each service in one of two algorithms: 
1. Services with the basic cost and correction coefficients to it
2. Service with the calculated cost and a calculation formula to it
Below both algorithms are briefly described. 
You watch other descriptions and examples on the site of the http://2of3 .ru/calculators/free/docs/developer


Algorithm of calculation - "Service with basic cost and correction coefficients to it"
Algorithm elements:
a1. A rate for service unit
 It can be shown in an explicit form or hidden. 

a2. Quantity of units of the ordered service
 It can be entered by the user or to be hidden from him in a zavisismost from service settings (an info unit element)
 If the field disappears, its value is equal to 1 (unit)

a3. Date of performance
 Has two values: month or all estimated period.
 If month is selected, it is considered that service is rendered within a month then there is a full calculation.
 If the estimated period is selected, it is considered that service is rendered during number of the months specified in the field "Estimated Period"

a4. Estimated period (months)
 Time during which service is rendered. It is used for calculation of monthly payment.

a5. The adjusting coefficients
 5 coefficients (k1-k5) are by default supported.
 Korlichestvo modzht to be increased in settings of an info unit

 For determination of a method of correction of a rate the coefficient before it without gap sets the modifier.

 List of modifiers:
 "*" - to increase
 "/" - to separate
 "+" - to add
 "-" - to subtract
  If it is specified nothing by default the modifier "+" is used.

 Example of record of the modifier.
  Record "*1.2" means multiplication of a rate of service (a1) on 1.2 

 For visual representation on the page of the adjusting coefficients in a look: vypadayushch of lists, radiobuttons or chekboks in the field
 "The name of the adjusting coefficient" it is possible to add appearance modifiers on a template: "Name field/modifier"

 List of modifiers:
 l - dropdown list
 ml - the dropdown list with a multiple selection
 with - chekboks (small squares)
 r - radiobuttons (circles)
  If it is specified nothing, the modifier r is by default used.

 Example. 
 Record: "The risk degree / with" will output all list of values of the adjusting coefficient "Risk degree" in the form of chekboks.

Calculation example.
 Let the rate of the service "Consultation" be equal 300 rub (a1=300) and two adjusting coefficients are applied: 
 k1 - consultation Type: oral (*1), written (*2), written with assurance by the notary (*3)
 k2 - Delivery of documents: shipment at own expense (-100), Russian Post (100), the messenger across Moscow (300)
 Let now the visitor selected quantity of units of service - 5 (a2=5), a date of performance - "all estimated period" and the estimated period - 12 months (a4=12)
 And further the visitor selected the second k1 value and the first k2 value
 Then the total amount of service will be equal
 (300*2-100) *5=2500 rub.
 Monthly payment will be equal
 2500/12=104.17 rub.



Algorithm of calculation - "Service with the calculated cost and a calculation formula to it"
Algorithm elements:
b1. Number of the ordered service (goods)

b2. A calculation formula of cost of service (goods) items and which multipliers are values of the adjusting coefficients
 For example: * (k1*k3+k2+k4*0)

b3. Date of performance
 Has two values: month or all estimated period.
 If month is selected, it is considered that service is rendered within a month then there is a full calculation.
 If the estimated period is selected, it is considered that service is rendered during number of the months specified in the field "Estimated Period"

b4. Estimated period (months)
 Time during which service is rendered. It is used for calculation of monthly payment.
 If b3 = "month", and b4=5, total amount is equal 5*summu in a month. I.e. in total amount monthly payments are added.
 If b3 = "for the estimated period", and b4=5, total amount is equal 5/amount in a month. I.e. total amount is equal to the service amount, and monthly payments in fact payments by installments.

b5. The adjusting coefficients
 The description of coefficients and their modifiers just the same as in a5, however application other.
 In algorithm of "b" the selected values of coefficients are added in a formula b2, and in algorithm of " the selected values of coefficients sequentially are applied to a1 rate.
 Thus the algorithm of "b" is more universal and comprises as a special case algorithm "and". But the algorithm "and" is simpler for the circle of tasks.


Example.
 Let it is required to calculate photo album circulation printing cost.
 We will define formula coefficients.
 k1 - an album Format; k1: "A4L" =10 ", XL" =15 ", A4" =20
 k2 - cover Type; k2: "7BTs solid" =500 ", BRACKET solid" =15 ", Soft" =300
 k3 - Number of pages; k3: 2, 4, 6, 8...
 k4 - Density of paper; k4: 80, 115, 135, 150 (We will assume that the cost of paper doesn't influence circulation cost)

 Then the estimated fomula of b2 will be such: * (k1*k3+k2+k4*0).
 The number of pages of an album is multiplied by the page printing cost (the selected format), then the cost of cover is added and then the density of paper increased by zero is added in order that the specified density got to a zavka, but wasn't considered in calculation.

 Let now the user wanted to print 10 8 page albums of the A4 format in solid cover of 7BTs on paper with a density of 80 g/m2.
 Payment will be by installments within 3 months: b3 = "For the estimated period", b4=3.
 Then we have the total amount of the order: 10*(8*20+500+80*0) = 6600 rub.
 Monthly payment: 6600/3=2200 rub.