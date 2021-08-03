
<?php 
	if ($bonus_s == false) {?>
		
	<input type="number" class="form-control" placeholder="" name="bonus_s" value="0" readonly>
<?php }else{ ?>

	<input type="number" class="form-control" placeholder="" name="bonus_s" value="<?= $bonus_s['bonus_sponsor'] ?>" readonly>

<?php } ?>
