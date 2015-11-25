<?php

class Model_Income extends Model
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
                   $sql_inc = "SELECT
                   inc.id,
                   inc.name AS inc_name,
                   inc.sum,
                   inc.date,
                   cat_inc.name AS cat_name
                   FROM inc
                   JOIN cat_inc
                   ON inc.cat_id=cat_inc.id WHERE MONTH(inc.date) = '$curr_month'";

        $sql_cat = 'SELECT
                   id, name
                   FROM cat_inc';

        $inc = $this->query($sql_inc);
        $cat = $this->query($sql_cat);

        return array(
            'inc'=>$inc,
            'cat'=>$cat,
        );
    }

    public function del_data($id)
    {
        // тут поставить проверки - удалилась или нет, удалить из бд и вывести сообщение
        $sql = "DELETE FROM inc WHERE id='$id'";
        return $this->query($sql);
    }

    public function add_data(){
        $name = $_POST['name'];
        $cat = $_POST['cat'];
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
                   FROM cat_inc';
        $result = $this->query($sql);
        return $result;
    }



}
