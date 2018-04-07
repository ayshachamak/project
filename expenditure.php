<?php
session_start();
$_SESSION['user_id'] = 1;
require_once './model/ExpenseCategoryModel.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Enter Expenses</title>
    </head>
    <body>
        <br/><br/>
        <form method="post" action="controller/process-expenditure.php">
            <fieldset>
                <center>
                    <br/>

                    <?php
                    $categoryModel = new ExpenseCategoryModel();
                    $categories = $categoryModel->getAllCategory();
                    if ($categories) {
                        $index = 1;
                        while($category = mysqli_fetch_assoc($categories)) {
                            ?>
                    Category<?php echo $index++; ?>: <input type="checkbox" checked="" readonly="" name="cat[]" value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?><br/>
                    <input type="hidden" name="category[]" value="<?php echo $category['id']; ?>"/>
                    Amount: <input type="number" name="amount[]" step="1" min="0">
                    Date:<input type="date" name="date[]" value="<?php // echo date('Y-m-d') ?>" max="<?php echo date('Y-m-d'); ?>">

                            <br/><br/>
                        <?php
                        }
                    } else {
                        echo 'No Category Exists. Insert Category into Database';
                    }
                    ?>

<!--			Category 2: <input type="checkbox" name="cat[]" value="Medical">Medical<br/>
                        Amount:<input type="number" name="amount[]">
                        Date:<input type="date" name="date[]">

                        <br/><br/>


                        Category 3: <input type="checkbox" name="cat[]" value="Entertainment">Entertainment<br/>
                        Amount:<input type="number" name="amount[]">
                        Date:<input type="date" name="date[]">

                        <br/><br/>


                        Category 4: <input type="checkbox" name="cat[]" value="Food">Food<br/>
                        Amount:<input type="number" name="amount[]">
                        Date:<input type="date" name="date[]">

                        <br/><br/>

                        Category 5: <input type="checkbox" name="cat[]" value="Utilities">Utilities<br/>
                        Amount:<input type="number" name="amount[]">
                        Date:<input type="date" name="date[]">

                        <br/><br/>

                        Category 6: <input type="checkbox" name="cat[]" value="Education">Education<br/>
                        Amount:<input type="number" name="amount[]">
                        Date:<input type="date" name="date[]">

                        <br/><br/>


                        Category 7: <input type="checkbox" name="cat[]" value="Sports">Sports<br/>
                        Amount:<input type="number" name="amount[]">
                        Date:<input type="date" name="date[]"><br/><br/>-->

                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" name="reset" value="Reset">

                </center>

            </fieldset>

        </form>
    </body>

</html>
