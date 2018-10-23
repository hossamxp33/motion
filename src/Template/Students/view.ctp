
<div class="students view">
	<h2><?php echo ___('student'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $student->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('name'); ?></dt>
				<dd>
					<?php 
					echo h($student->name);
					?>
				</dd>
				
				<dt><?php echo __('City'); ?></dt>
				<dd>
					<?php echo $student->has('city') ? $this->Html->link($student->city->name, ['controller' => 'Cities', 'action' => 'view', $student->city->id]) : '' ?>
				</dd>
					
				<dt><?= ___('age'); ?></dt>
				<dd>
					<?php 
					echo h($student->age);
					?>
				</dd>
				
				<dt><?= ___('gender'); ?></dt>
				<dd>
					<?php 
					echo h($student->gender);
					?>
				</dd>
				
				<dt><?= ___('email'); ?></dt>
				<dd>
					<?php 
					echo h($student->email);
					?>
				</dd>
				
				<dt><?= ___('status'); ?></dt>
				<dd>
					<?php 
					echo h($student->status);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $student], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
