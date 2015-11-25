<?php

class Model_Expense extends Model
{
	protected function query($sql){
        try {

            $sth = $this->getDbh()->prepare($sql);
            $sth->execute();
            if (substr_count($sql, 'SELECT') >= 1) {
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            } elseif (substr_count($sql, 'INSERT') >= 1) {
                $result = 'Добавлена запись';
            } else {
                $result = 'Удалена строка';
            }
        }catch (PDOException $e) {
                echo 'Неудача запроса'. $e->getMessage();
        }
        return $result;

    }


	public function get_data()
    { // функция получения всех расходов БД
        $curr_month = date("m");
        $curr_year = date("Y");
        $sql_exp = "SELECT
                   exp.id,
                   exp.name AS exp_name,
                   exp.quant,
                   exp.price,
                   exp.sum,
                   exp.date,
                   cat_exp.name AS cat_name
                   FROM exp
                   JOIN cat_exp
                   ON exp.cat_id=cat_exp.id WHERE MONTH(exp.date) = '$curr_month' AND YEAR (exp.date) = '$curr_year'";

        $sql_cat = 'SELECT
                   id, name
                   FROM cat_exp';
        $sql_plan = "SELECT
                        cat_exp.id,
                        plan.sum
                     FROM `cat_exp`
                     JOIN plan
                     ON cat_exp.id = plan.id_cat_exp WHERE MONTH (period) = '$curr_month' AND YEAR(period) = '$curr_year' ";
        $exp = $this->query($sql_exp);
        $cat = $this->query($sql_cat);
        $plan = $this->query($sql_plan);
        foreach ($plan as $value) {
            $a = $value;
            foreach($value as $bbb) {

            }
        }

        return array(
            'exp'=>$exp,
            'cat'=>$cat,
            'plan'=>$plan
        );
    }

    public function get_detail($cat_id){
        $curr_month = date("m");
        $curr_year = date("Y");
        $sql = "SELECT
                   exp.id,
                   exp.name AS exp_name,
                   exp.quant,
                   exp.price,
                   exp.sum,
                   exp.date,
                   cat_exp.name AS cat_name
                   FROM exp
                   JOIN cat_exp
                   ON exp.cat_id=cat_exp.id WHERE MONTH(exp.date) = '$curr_month'
                   AND cat_exp.id = '$cat_id'
                   AND YEAR (exp.date) = '$curr_year'";
        $exp = $this->query($sql);
        return array(
            'exp'=>$exp,
            'cat'=>$cat_id,
        );

    }

    public function del_data($id)
    {
        // тут поставить проверки - удалилась или нет, удалить из бд и вывести сообщение
        $sql = "DELETE FROM exp WHERE id='$id'";
        return $this->query($sql);
    }

    public function add_data($cat){
        $name = $_POST['name'];
        $quant = $_POST['quant'];
        $date = $_POST['date'];
        $price = $_POST['price'];
        $sum = $price*$quant;
        $sql = "INSERT INTO exp (name, cat_id, quant, price, sum, date)
                      VALUES ('$name', '$cat', '$quant','$price', '$sum', '$date');";
        return $this->query($sql);


        /*
        // поставить проверки на добавление, добавить и вывести сообщение
        $msg ='НАЗВАНИЕ:'.$_POST['name'].', КАТЕГОРИЯ:  '.$_POST['cat'].'ДАТА: '.$_POST['date'];
        return $msg;
        */
    }

    public function get_cat(){
        $sql = 'SELECT
                   id, name
                   FROM cat_exp';
        $result = $this->query($sql);
        return $result;
    }



}
