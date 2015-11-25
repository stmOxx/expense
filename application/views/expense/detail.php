<script type="text/javascript">
    $(document).ready(function() {
        $('#exp_add').validate(
            {
                // правила для проверки
                rules: {
                    "name": {
                        required: true,
                        minlength: 5,
                        maxlength: 20
                    },

                    "quant": {
                        required: true,
                        digits: true,
                        minlength: 1,
                        maxlength: 5
                    },

                    "date": {
                        required: true,
                        minlength: 1,
                        maxlength: 20
                    },

                    "price": {
                        required: true,
                        number: true,
                        minlength: 1,
                        maxlength: 20
                    }


                },

                // выводимые сообщения при нарушении соответствующих правил
                messages: {
                    "name": {
                        required: "Введите название!",
                        minlength: "От 5 до 20 символов!",
                        maxlength: "От 5 до 20 символов!"
                    },

                    "quant": {
                        required: "Введите цену!",
                        minlength: "От 1 до 5 символов!",
                        maxlength: "От 1 до 5 символов!",
                        digits: "Только целые числа"
                    },

                    "date": {
                        required: "Введите дату!",
                        minlength: "11 символов",
                        maxlength: "11 символов!"
                    },

                    "price": {
                        required: "Введите цену!",
                        number: "Цифры",
                        minlength: "От 1 до 5 символов!",
                        maxlength: "От 1 до 5 символов!"
                    }
                }
            });
    });

</script>
<h1>Расходы (детальная ифнормация)</h1>
<form method="post" action="/expense/add/<?php echo $data['cat']?>" id="exp_add">
<table class="table_exp" style="width: 750px">
    <tr>
        <td>Номер</td>
        <td style="width: 150px">Название</td>
        <td>Кол-во</td>
        <td>Дата</td>
        <td>Цена</td>
        <td>Сумма</td>
    </tr>
    <?php
    $count = 0;
    foreach($data['exp'] as $row)
    {
        $count++;
        if($count%2 != 0) $style = 'style="background-color: lightgray"';
        else $style = '';
        echo '<tr '.$style.'><td>'.$count.'</td>';
        echo '<td><b>'.$row['exp_name'].'</b></td>';
        echo '<td>'.$row['quant'].'</td>';
        echo '<td>'.$row['date'].'</td>';
        echo '<td>'.$row['price'].'</td>';
        echo '<td>'.$row['sum'].'</td><td><a href="/expense/delete/'.$row['id'].'/'.$data['cat'].'" class="del_exp" >Удалить</a></td></tr>';
    }
    ?>

    <tr>
        <td>
            ...
        </td>
        <td>
            <input type="text" placeholder="Название" name="name"  style="width: 130px">
        </td>
        <td>
            <input type="text"  placeholder="Кол-во" name="quant" style="width: 50px">
        </td>
        <td>
            <input type="date" placeholder="Дата" name="date"  style="width: 110px">
        </td>
        <td>
            <input type="text" placeholder="Цена" name="price" style="width: 60px">
        </td>
        <td></td>
        <td><input type="submit" value="Добавить" class="add_exp" style="width: 75px"></td>

    </tr>

</table>
</form>

<?php
/**
 * Created by PhpStorm.
 * User: Stm_Oxx
 * Date: 04.10.2015
 * Time: 23:33
 */ 