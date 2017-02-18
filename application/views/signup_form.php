<div id="login_form">
        
    <legend style="height:75%; width:40%; margin-left:20%; margin-top:10%;">
	<?php

	echo form_open('login/create_member');echo"</br>";?>
         <input type="text" placeholder="  name" name="name"/></br>
         <input type="text" placeholder="  email@dotcom" name="email"/></br>
         <input type="text" placeholder="  username" name="username"/></br>
         <input type="password" placeholder="  password" name="password"/></br>
         <input type="password" placeholder="  retype password" name="password2"/></br>
         <input type="submit" name="submit" value="Create Account"/>
        
  </legend>
    <p><?php echo validation_errors() ?></p>
	
</div>