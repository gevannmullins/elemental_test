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

<h1>Products</h1>

<?php
// looping through the categories
foreach ($all_cats as $cat_key=>$cat_val) {

    // saving the category id
    $cat_id = $cat_val['id'];

    // get all products for the current category
    $prod_query = "SELECT * FROM products WHERE category_id='$cat_id' ORDER BY product ASC";
    $prod_results = mysqli_query($con,$prod_query);
    $all_cat_prods = mysqli_fetch_all($prod_results, MYSQLI_ASSOC);
?>

    <!-- display the category name -->
    <h2><?php echo $cat_val['category']; ?></h2>

        <!-- table to display all the category products -->
    <table width="400">
        <tbody>
        <tr>
            <th align="left">Product</th>
            <th align="right">Price</th>
        </tr>

        <?php
        // loop through all the products for the current category
        foreach ($all_cat_prods as $prod_key=>$prod_val) {
        ?>

        <tr>
            <td><?php echo $prod_val['product']; ?></td>
            <td align="right"><?php echo $prod_val['price']; ?></td>
        </tr>

        <?php
        } // end of the products loop
        ?>

        </tbody>
    </table>

<?php
} // end of categorised products
?>

<!-- display all the uncategories products -->
<h2>Uncategorized</h2>
<!-- table to display all the uncategorised products -->
<table width="400">
    <tbody>
    <tr>
        <th align="left">Product</th>
        <th align="right">Price</th>
    </tr>
    <?php
    // loop through all the uncategoried products
    foreach ($all_uncat_prods as $uncat_prod_key=>$uncat_prod_val) {
    ?>

    <tr>
        <td><?php echo $uncat_prod_val['product']; ?></td>
        <td align="right"><?php echo $uncat_prod_val['price']; ?></td>
    </tr>

    <?php
    } // end of the products loop
    ?>
    </tbody>
</table>

</body>
</html>