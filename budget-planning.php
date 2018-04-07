<?php
session_start();
$_SESSION['user_id'] = 1;
require_once './model/ExpenseCategoryModel.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Budget Planning</title>
</head>	
<body>

	<br><br>
        <form method="post" action="controller/process-budget.php">
		<fieldset>
			<center>
			<br>
                        Budget Month:
                        <select name="month" required="required">
				<option value="hidden selected">Select Month</option>
				<option value="01">January</option>
				<option value="02">February</option>
				<option value="03">March</option>
				<option value="04">April</option>
				<option value="05">May</option>
				<option value="06">June</option>
				<option value="07">July</option>
				<option value="08">August</option>
				<option value="09">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select><br><br/>

<?php
                    $categoryModel = new ExpenseCategoryModel();
                    $categories = $categoryModel->getAllCategory();
                    if ($categories) {
                        $index = 1;
                        while($category = mysqli_fetch_assoc($categories)) {
                            ?>
			Category <?php echo $index++; ?>: <input type="checkbox" name="cat[]" value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?>
                        <input type="hidden" name="category[]" value="<?php echo $category["id"]; ?>">
			Amount: <input type="text" name="amount[]">
			<br><br><br>			
                        <?php
                        }
                    } else {
                        echo 'No Category Exists. Insert Category into Database';
                    }
                    ?>


<!--			Category 2: <input type="checkbox" name="cat2" value="Medical">Medical  
			
			<select name="Month">
				<option value="hidden selected">Select Month</option>
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>

			</select><br>

			Amount:<input type="text" name="amount">

			<br><br><br>


			Category 3: <input type="checkbox" name="cat3" value="Entertainment">Entertainment

			<select name="Month">
				<option value="hidden selected">Select Month</option>
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>

			</select><br>

			Amount:<input type="text" name="amount">

			<br><br><br>


			Category 4: <input type="checkbox" name="cat4" value="Food">Food

			<select name="Month">
				<option value="hidden selected">Select Month</option>
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>

			</select><br>

			Amount:<input type="text" name="amount">

			<br><br><br>

			Category 5: <input type="checkbox" name="cat5" value="Utilities">Utilities

			<select name="Month">
				<option value="hidden selected">Select Month</option>
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>

			</select><br>

			Amount:<input type="text" name="amount">

			<br><br><br>

			Category 6: <input type="checkbox" name="cat6" value="Education">Education

			<select name="Month">
				<option value="hidden selected">Select Month</option>
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>

			</select><br>

			Amount:<input type="text" name="amount">

			<br><br><br>


			Category 7: <input type="checkbox" name="cat7" value="Sports">Sports

			<select name="Month">
				<option value="hidden selected">Select Month</option>
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>

			</select><br>

			Amount:<input type="text" name="amount">

			<br> <br>-->

			<input type="submit" name="submit" value="Submit">
			<input type="reset" name="reset" value="Reset">

		</center>

		</fieldset>

	</form>
</body>

</html>