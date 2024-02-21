
<body>
      <table  class="table table-striped" width="100%">
      <tr class="table-info">
        <td width="60" align="left">#</td>  
        <td width="260">Nomor</td>
 		<td width="487">Name</td>
        <td width="75">##</td>
      </tr>
      		<?php
					$vkry_pusat = $ms_q("$sl KaryNomor,KaryNama FROM TKaryawan order by KaryNama asc");
						$no = 1;
						while($vkryy_pusat = $ms_fas($vkry_pusat)){
			?>
      <tr ng-repeat="x in names">
      <td align="left"><?php echo"$no"; ?></td>  
      <td align="left"><?php echo"$vkryy_pusat[KaryNomor]"; ?></td>  
      <td align="left"><?php echo"$vkryy_pusat[KaryNama]"; ?></td>  
      <td align="left">
      	<a href="<?php echo"?HLM=EMP_M&SUB=EMP_M_EMP&IDEMP=$vkryy_pusat[KaryNomor]"; ?>" class="btn btn-danger">Import Data</a>
      </td>
      </tr>
      <?php $no++; } ?>
    </table>
     

</body>

