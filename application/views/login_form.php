<div id="login_form"> 

    <h1>Log In</h1>
    <div style="margin-left: 20%;margin-top: 20px;">
<!--	<fieldset>-->
            <legend>
		<?php echo form_open('login/validate_credentials');echo"</br>";?>
                <input type="text" placeholder="  Username" name="username"/></br></br>
                <input type="password" placeholder="  ********" name="password"/></br></br>
                <input type="submit" name="submit" value="Login"/>
                <?php echo anchor('login/signup', 'Create Account'); ?>
                </legend>
	<!--</fieldset>-->
        </div>
</div>