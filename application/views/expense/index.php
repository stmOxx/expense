<h1>Расходы</h1>
<h3>За текущий месяц</h3>
<table class="table_exp" style="width: 480px">
    <tr>
        <td>Номер</td>
        <td>Категория</td>
        <td align="center">Грн.</td>
        <td>План, грн</td>
        <td>Остаток NEW TEXTt, грн</td>
    </tr>
    <?php
    foreach ($data['cat'] as $cat) {
        $summ = 0;
        $count++;
        foreach($data['exp'] as $exp)
        {
            if($exp['cat_name']==$cat['name']){
                $summ = $exp['sum'] + $summ;
            }
        }
            echo '<tr><td width="20" align="center">'.$count.'</td>';
            echo '<td><b><a href="/expense/detail/'.$cat['id'].'">'.$cat['name'].'</a></b></td>';
            echo '<td width="70" align="center"><b>'.$summ.'</b></td>';
            echo '<td width="70" align="center"><b>';
            $s = 0;
            foreach($data['plan'] as $plan) {
                if($plan['id'] == $cat['id']) {
                    $s =  $plan['sum'];
                }
            }
            echo $s.'</b></td>';
            if (($s-$summ)>0) {
                $style = ' style="color: green"';
            }else{
                $style = ' style="color: red"';
            }
            echo '<td width="90" align="center"><p'.$style.'><b>'.($s - $summ).'</b></p></td></tr>';
    }
    ?>
</table>

