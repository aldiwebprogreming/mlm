
<?php 
	if ($bonus == false) {?>
		
	<input type="number" class="form-control" placeholder="" name="bonus" value="0" readonly>
<?php }else{ ?>

	<input type="number" class="form-control" placeholder="" name="bonus" value="<?= $bonus['bonus_cashback'] ?>" readonly>

<?php } ?>
