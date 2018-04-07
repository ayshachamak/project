<?php

include_once 'config.php';
include_once 'Database.php';

class WalletModel {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllCategory() {
        $query = "SELECT * FROM expense_category";
        return $this->db->select($query);
    }

    public function getMonthlyBudgetRecord($month) {
        $query = "SELECT * FROM expense_category as ec LEFT JOIN budget as b ON "
                . "b.category_id = ec.id WHERE MONTH(b.budget_month) = "
                . mysqli_real_escape_string($this->db->link, $month) . " GROUP BY ec.id";
        return $this->db->select($query);
    }

    public function getMonthlyExpenseRecord($month) {
        $query = "SELECT ec.id, ec.name, sum(e.amount) as total_expense FROM expense_category as "
                . "ec LEFT JOIN expenditures as e ON e.category_id = ec.id "
                . "WHERE MONTH(e.expenditure_date) = "
                . mysqli_real_escape_string($this->db->link, $month) . " GROUP BY ec.id ORDER BY ec.id";
        return $this->db->select($query);
    }

    public function calculateIfExpenditureExceeded($category_id, $budget_month) {
        $month = date("m", strtotime($budget_month));
        $query1 = "SELECT sum(amount) as total_expense FROM expenditures WHERE category_id = $category_id AND MONTH(expenditure_date) = $month";
        $select = $this->db->select($query1);
        $total_expense = $total_budget = 0;
        if ($select) {
            $result = mysqli_fetch_assoc($select);
            $total_expense = $result['total_expense'];
        }
        $query2 = "SELECT amount FROM budget WHERE category_id = $category_id AND MONTH(budget_month) = $month";
        $select = $this->db->select($query2);
        if ($select) {
            $result = mysqli_fetch_assoc($select);
            $total_budget = $result['amount'];
        }
        if ($total_expense > $total_budget) {
            return true;
        }
        return false;
    }

}
