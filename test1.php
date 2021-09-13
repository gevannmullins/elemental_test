<?php
/**
 * QUESTION 1
 *
 * Create a form with a single textarea that will sort words or phrases alphabetically separated by commas.
 * Validate that the field is not empty.
 * Clean up the string to remove any extra spaces and unnecessary commas
 * The result should be shown below the form.
 *
 * Please make sure your code runs as effectively as it can.
 *
 * The end result should look like the following:
 * apples, cars, tables and chairs, tea and coffee, zebras
 */
?>
<?php

// define a few variable
$to_sort = "";
$to_sort_err = "";
$sorted_string = "";

// check if a post request was made
id ($_SERVER['REQUEST_METHOD'] == "POST") {

    // if textarea is empty then add error message
    // else clean up the variable
    if (empty($_POST['to_sort'])) {
        $to_sort_err = "Field can not be empty";
    } else {
        $to_sort = clean_up_var($_POST['to_sort']);
    }

}

// split text using the comma
$to_sort_array = explode(",", $to_sort);

// sort array ascending
natcasesort($to_sort_array);

// create alphabetical string
foreach ($to_sort_array as $tsa) {

    $tsa = clean_up_var($tsa);
    $sorted_string .= $tsa . ", ";

}

// helper function to cleanup text and also remove numbers from text
function clean_up_var($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Test1</title>
</head>
<body>
	<h1>Sort List</h1>
	<form method="post">
		<input type="hidden" name="action" value="sort" />
		<label for="to_sort">Please enter the words/phrases to be sorted separated by commas:</label><br/>
		<textarea name="to_sort" style="width: 400px; height: 150px;"></textarea><br/>
		<input type="submit" value="Sort" />
	</form>
    <!-- displaying any errors -->
    <span style="color:red;">
        <?php echo $to_sort_err; ?>
    </span>
    <!-- displaying the alphabetical result below the form -->
    <div>
        <?php
            echo $sorted_string;
        ?>
    </div>
</body>
</html>