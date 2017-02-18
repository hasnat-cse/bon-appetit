<div id="login_form_2">

		<?php foreach ($query as $row): ?>
		<div id="edit_ticker">	
                    <img style="height: 100%;" src="<?php echo base_url()."$row->imglink"?>" alt="Profile Picture" />			
		</div>
			
	<?php endforeach;?>

	<h1></br>			
	</h1>
	
	
	<div id="login_form_head">	
		<h4>Old Password: </h4></br>
		<h4>New Password: </h4></br>
		<h4>Retype Password: </h4></br>		
	</div>
	
	<div id="login_form_tail">					
		<fieldset>		
				<?php
				echo form_open('profile/update_pass');echo"</br>";?>
<!--				echo form_password('password', set_value('password', 'Password'));echo"</br>";
				echo form_password('password2', set_value('password2', 'Password'));echo"</br>";
				echo form_password('password3', set_value('password3', 'Password'));echo"</br>";
				echo form_submit('submit', 'Update Password');
	
				?>-->
                                <input type="password" placeholder="  ********" name="password"/></br>
                                <input type="password" placeholder="  ********" name="password2"/></br>
                                <input type="password" placeholder="  ********" name="password3"/></br>
                                <input type="submit" name="submit" value="Update Password"/>
	
				<?php echo validation_errors(' <p> class="error" </p>') ?>
	
		</fieldset>		
	</div>
</div>