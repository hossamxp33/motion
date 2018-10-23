
<div class="users view">
	<h2><?php echo ___('user'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $user->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('ip_address'); ?></dt>
				<dd>
					<?php 
					echo h($user->ip_address);
					?>
				</dd>
				
				<dt><?= ___('username'); ?></dt>
				<dd>
					<?php 
					echo h($user->username);
					?>
				</dd>
				
				<dt><?= ___('salt'); ?></dt>
				<dd>
					<?php 
					echo h($user->salt);
					?>
				</dd>
				
				<dt><?= ___('email'); ?></dt>
				<dd>
					<?php 
					echo h($user->email);
					?>
				</dd>
				
				<dt><?= ___('activation_code'); ?></dt>
				<dd>
					<?php 
					echo h($user->activation_code);
					?>
				</dd>
				
				<dt><?= ___('forgotten_password_code'); ?></dt>
				<dd>
					<?php 
					echo h($user->forgotten_password_code);
					?>
				</dd>
				
				<dt><?= ___('forgotten_password_time'); ?></dt>
				<dd>
					<?php 
					echo h($user->forgotten_password_time);
					?>
				</dd>
				
				<dt><?= ___('remember_code'); ?></dt>
				<dd>
					<?php 
					echo h($user->remember_code);
					?>
				</dd>
				
				<dt><?= ___('created_on'); ?></dt>
				<dd>
					<?php 
					echo h($user->created_on);
					?>
				</dd>
				
				<dt><?= ___('last_login'); ?></dt>
				<dd>
					<?php 
					echo h($user->last_login);
					?>
				</dd>
				
				<dt><?= ___('active'); ?></dt>
				<dd>
					<?php 
					echo $this->AlaxosHtml->yesNo($user->active);
					?>
				</dd>
				
				<dt><?= ___('first_name'); ?></dt>
				<dd>
					<?php 
					echo h($user->first_name);
					?>
				</dd>
				
				<dt><?= ___('last_name'); ?></dt>
				<dd>
					<?php 
					echo h($user->last_name);
					?>
				</dd>
				
				<dt><?= ___('company'); ?></dt>
				<dd>
					<?php 
					echo h($user->company);
					?>
				</dd>
				
				<dt><?= ___('phone'); ?></dt>
				<dd>
					<?php 
					echo h($user->phone);
					?>
				</dd>
				
				<dt><?= ___('user_group_id'); ?></dt>
				<dd>
					<?php 
					echo h($user->user_group_id);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $user], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
