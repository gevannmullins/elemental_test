<?php
/**
 * QUESTION 2
 *
 * Using the data stored in the database
 * show a list of products with their prices
 * grouped by category.
 * The categories should be listed in alphabetical order.
 * The products within those categories should also be listed in alphabetical order.
 * Products with no category will be categorized as "Uncategorized".
 * If there are no results, then it should just say "There are no results available."
 *
 * Please make sure your code runs as effectively as it can.
 *
 * See test2.html for desired result.
 */
?>
<?php
//$con holds the connection
require_once('db.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Test2</title>
</head>
<body>

<h1>Products</h1>

<?php

// get all the categories in alphabetical order
$cat_query = "SELECT id, category FROM categories ORDER BY category ASC";
$cat_results = mysqli_query($con, $cat_query);
$all_cats = mysqli_fetch_all($cat_results, MYSQLI_ASSOC);

// get all uncategorised products in alphabetical order
$uncat_prod_query = "SELECT * FROM products WHERE category_id IS NULL ORDER BY product ASC";
$uncat_prod_results = mysqli_query($con,$uncat_prod_query);
$all_uncat_prods = mysqli_fetch_all($uncat_prod_results, MYSQLI_ASSOC);




?>

</body>
</html>