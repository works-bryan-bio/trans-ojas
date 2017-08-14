<div class="row">
	<div class="col-md-12">
		<div class="login-title">
			<h2>Member Login</h2>			
		</div>				
		<?php echo $this->Flash->render() ?>
		<?= $this->Form->create() ?>
		<div class="member-login-form">
			<div class="member-login-input">
				<input type="text" name="username" placeholder="User Name">
			</div>
			<div class="member-login-input">
				<input type="password" name="password" placeholder="Password">
			</div>
			<div class="login-functions">
				<ul>					
					<li><a href="<?php echo $this->Url->build(['controller' => 'forgot_password', 'action' => 'index']); ?>">Forgot Password</a></li>
				</ul>
			</div>
			<div class="member-submit">
				<input type="submit" name="" value="Submit">
			</div>
		</div>
		<?= $this->Form->end() ?>
		<br /><br />
		<p><a href="<?php echo $this->Url->build(['controller' => 'candidates', 'action' => 'register']); ?>">Haven't registered with us yet? Click here to register and upload your CV on our Candidates page</a></p>
	</div>
</div>