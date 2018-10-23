
<div class="questions view">
	<h2><?php echo ___('question'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $question->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Model'); ?></dt>
				<dd>
					<?php echo $question->has('model') ? $this->Html->link($question->model->name, ['controller' => 'Models', 'action' => 'view', $question->model->id]) : '' ?>
				</dd>
					
				<dt><?= ___('question'); ?></dt>
				<dd>
					<?php 
					echo h($question->question);
					?>
				</dd>
				
				<dt><?= ___('period'); ?></dt>
				<dd>
					<?php 
					echo h($question->period);
					?>
				</dd>
				
				<dt><?= ___('sort'); ?></dt>
				<dd>
					<?php 
					echo h($question->sort);
					?>
				</dd>
				
				<dt><?= ___('view'); ?></dt>
				<dd>
					<?php 
					echo h($question->view);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $question], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
