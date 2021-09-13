<?php
/**
 * QUESTION 3
 *
 * For each month that had sales show a list of customers ordered by who spent the most to who spent least.
 * If the totals are the same then sort by customer.
 * If a customer has multiple products then order those products alphabetical.
 * Months with no sales should not show up.
 * Show the name of the customer, what products they bought and the total they spent.
 * Only show orders with the "Payment received" and "Dispatched" status.
 * If there are no results, then it should just say "There are no results available."
 *
 * Please make sure your code runs as effectively as it can.
 *
 * See test3.html for desired result.
 */
?>
<?php
//$con holds the connection
require_once('db.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Test3</title>
</head>
<body>


<h1>Top Customers per Month</h1>

<?php

$query = "
select
    year(t1.order_date),
    month(t1.order_date),
--  day(t1.order_date),
--  sum(t3.price)
    t1.user_id,
    t1.id,
    sum(t4.price)
--  ,sum(sale)
from 
    orders as t1
left join
    users as t2
on
    t2.id=t1.user_id
left join
    order_items as t3
on
    t3.order_id=t1.id
left join
    products as t4
on
    t4.id=t3.product_id
group by 
    year(t1.order_date),
    month(t1.order_date),
    t1.user_id,
    t1.id
order by 
    year(t1.order_date),
    month(t1.order_date),
    sum(t4.price) DESC;
";

?>


</body>
</html>