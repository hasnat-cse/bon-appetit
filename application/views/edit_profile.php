<div id="login_form_2">

	<?php foreach ($query as $row): ?>
		<div id="edit_ticker">	
                    <img style="height: 85%;" src="<?php echo base_url()."$row->imglink"?>" alt="Profile Picture" />			
		</div>            
			
	<?php endforeach;?>

	<h1></br>		
	</h1>	
	
	<div id="login_form_head">	
		<h4>Name: </h4></br>
		<h4>Address: </h4></br>
		<h4>Email: </h4></br>
		<h4>About: </h4></br>		
	</div>
	
	<div id="login_form_tail">
	
		<?php foreach ($query as $row):?>
	
		<fieldset>
				<?php
	
				echo form_open('profile/edit_profile');echo"</br>";
				echo form_input('name', set_value('name', $row->name));echo"</br>";
				echo form_input('address', set_value('address', $row->address));echo"</br>";
				echo form_input('email', set_value('email', $row->email));echo"</br>";											
                                echo form_input('about_me', set_value('about_me', $row->about_me));echo"</br>";				
				echo form_submit('submit', 'Update Profile');
                                echo form_close(); 
				?>		
	
				<?php echo validation_errors(' <p> class="error" </p>') ?>
	
		</fieldset>
		<?php endforeach;?>
	</div>
     <div id="login_form_3">
         <?php
                echo form_open_multipart('profile/change_pic'); 
                echo form_upload('userfile'); 
                echo form_submit('upload','   Submit'); 
                echo form_close(); 
         ?>
         
    </div>
</div>