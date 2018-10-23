
<div class="answers view">
	<h2><?php echo ___('answer'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $answer->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Question'); ?></dt>
				<dd>
					<?php echo $answer->has('question') ? $this->Html->link($answer->question->id, ['controller' => 'Questions', 'action' => 'view', $answer->question->id]) : '' ?>
				</dd>
					
				<dt><?= ___('answer'); ?></dt>
				<dd>
					<?php 
					echo h($answer->answer);
					?>
				</dd>
				
				<dt><?= ___('photo'); ?></dt>
				<dd>
					<?php 
					echo h($answer->photo);
					?>
				</dd>
				
				<dt><?= ___('is_correct'); ?></dt>
				<dd>
					<?php 
					echo h($answer->is_correct);
					?>
				</dd>
				
				<dt><?= ___('sort'); ?></dt>
				<dd>
					<?php 
					echo h($answer->sort);
					?>
				</dd>
				
				<dt><?= ___('view'); ?></dt>
				<dd>
					<?php 
					echo h($answer->view);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $answer], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
