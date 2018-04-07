<?php
session_start();
$_SESSION['user_id'] = 1;
include_once './model/WalletModel.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Wallet</title>
    </head>	
    <body>

        <br><br>
        <?php
        if (isset($_SESSION) && isset($_SESSION['user_id']) && $_POST) {
            $userId = $_SESSION['user_id'];
            $recordType = $_POST['recordType'];
            $month = $_POST['month'];
            echo "<pre>";
            $walletModel = new WalletModel();
            $budgetResource = $walletModel->getMonthlyBudgetRecord($month);
            $budgetArray = [];
                        $expenseArray = [];
            $index = 0;
            while ($obj = mysqli_fetch_assoc($budgetResource)) {
                $budgetArray[$index] = $obj;
                $expenseArray[$obj["id"]] = false;
                $index++;
            }

            $expenseResource = $walletModel->getMonthlyExpenseRecord($month);
            while ($obj = mysqli_fetch_assoc($expenseResource)) {
                $expenseArray[$obj["id"]] = $obj;
            }
//            var_dump($budgetArray);
            var_dump($expenseArray);
//            die;
        } else {
            header("Loaction: my-wallet.php");
        }
        ?>
        <form method="post" action="" target="_Self">
            <fieldset>
                <center>
                    <br>

                    Select Record Type<select name="recordType" required="">
                        <option value="monthly">Monthly</option>
                        <option value="weekly">Weekly</option>
                    </select><br><br>
                    Select Month<select name="month">
                        <!--<option value="hidden selected">Select Month</option>-->
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

                    </select><br><br>
                    Starting Date:<input type="Date" name="date">
                    <br><br><br>

                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" name="reset" value="Reset">

                </center>

            </fieldset>
        </form>
    <center>
        <table border="2">
            <tr>
                <th>Category</th>
                <th>Budget</th>
                <!--<th>Weekly Expense</th>-->
                <th>Monthly Expense</th>
                <th>Status</th>
            </tr>
            <?php
            if ($_POST) {
                $index = 0;
                foreach ($budgetArray as $budget) {
                    ?>
                    <tr>
                        <td><?php echo $budget['name']; ?></td>
                        <td><?php echo $budget["amount"]; ?></td>
        <!--                    <td>700Tk</td>-->
                        <td><?php $obj1 = $expenseArray[$budget["id"]];
                    echo $obj1 == false ? 0 : $obj1["total_expense"];
                    ?></td>
                        <td><?php
                            if ($walletModel->calculateIfExpenditureExceeded($budget["id"], $month)) {
                                echo 'Your budget has been finished!';
                            } else {
                                echo 'You still have more budget in this category';
                            }
                            ?>
                        </td>
                    </tr>
        <?php }
} else {
    ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
<?php } ?></td>
            </tr>
        </table>

    </center>        
</body>

</html>