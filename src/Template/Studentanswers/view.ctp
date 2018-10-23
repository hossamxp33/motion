
<div class="studentanswers view">
	<h2><?php echo ___('studentanswer'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $studentanswer->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Student'); ?></dt>
				<dd>
					<?php echo $studentanswer->has('student') ? $this->Html->link($studentanswer->student->name, ['controller' => 'Students', 'action' => 'view', $studentanswer->student->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Question'); ?></dt>
				<dd>
					<?php echo $studentanswer->has('question') ? $this->Html->link($studentanswer->question->id, ['controller' => 'Questions', 'action' => 'view', $studentanswer->question->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Answer'); ?></dt>
				<dd>
					<?php echo $studentanswer->has('answer') ? $this->Html->link($studentanswer->answer->id, ['controller' => 'Answers', 'action' => 'view', $studentanswer->answer->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $studentanswer], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
