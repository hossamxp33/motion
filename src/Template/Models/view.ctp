
<div class="models view">
	<h2><?php echo ___('سجل النماذج'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $model->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('الاسم'); ?></dt>
				<dd>
					<?php 
					echo h($model->name);
					?>
				</dd>
				
				<dt><?= ___('الترتيب'); ?></dt>
				<dd>
					<?php 
					echo h($model->sort);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $model], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
