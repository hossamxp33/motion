
<div class="studentmodels view">
	<h2><?php echo ___('studentmodel'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $studentmodel->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Student'); ?></dt>
				<dd>
					<?php echo $studentmodel->has('student') ? $this->Html->link($studentmodel->student->name, ['controller' => 'Students', 'action' => 'view', $studentmodel->student->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Model'); ?></dt>
				<dd>
					<?php echo $studentmodel->has('model') ? $this->Html->link($studentmodel->model->name, ['controller' => 'Models', 'action' => 'view', $studentmodel->model->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $studentmodel], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
