
<h2>Multiple Form Input data</h2>
<form action="" method="post">
    <table>
        <tr>
            <td>NIK</td>
            <td>NAMES</td>
            <td>ADDRESS</td>
        </tr>
        <?php $no=1;  for($i=1;$i<=$banyak_data;$i++): ?>
        <tr>
            <td><input name="data[<?php echo $i ?>][nik]" /></td>
            <td><input name="data[<?php echo $i ?>][names]" /></td>
            <td><input name="data[<?php echo $i ?>][address]" /></td>
        </tr>
        <?php endfor ?>
    </table>
    <input type="submit" value="simpan" />
</form>