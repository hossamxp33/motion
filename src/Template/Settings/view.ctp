
<div class="settings view">
	<h2><?php echo ___('setting'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $setting->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Model'); ?></dt>
				<dd>
					<?php echo $setting->has('model') ? $this->Html->link($setting->model->name, ['controller' => 'Models', 'action' => 'view', $setting->model->id]) : '' ?>
				</dd>
					
				<dt><?= ___('exam_status'); ?></dt>
				<dd>
					<?php 
					echo h($setting->exam_status);
					?>
				</dd>
				
				<dt><?= ___('next'); ?></dt>
				<dd>
					<?php 
					echo h($setting->next);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $setting], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
