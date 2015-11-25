<h1>Доходы</h1>
<a href="/income/edit">Редактировать</a>
<table class="table_exp" style="width: 340px">
    <tr>
        <td>Номер</td>
        <td>Категория</td>
        <td align="center">Грн</td>
    </tr>
    <?php
    $count = 0;
    foreach ($data['cat'] as $cat) {
        $summ = 0;
        $count++;
        foreach($data['inc'] as $inc)
        {
            if($inc['cat_name']==$cat['name']){
                $summ = $inc['sum'] + $summ;
            }
        }
        if($summ != 0) {
            echo '<tr><td width="20" align="center">'.$count.'</td>';
            echo '<td><b>'.$cat['name'].'</b></td>';
            echo '<td width="70" align="center"><b>'.$summ.'</b></td></tr>';
        }
    }
    ?>
</table>

