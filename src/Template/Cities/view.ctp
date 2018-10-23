
<div class="cities view">
	<h2><?php echo ___('city'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $city->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('name'); ?></dt>
				<dd>
					<?php 
					echo h($city->name);
					?>
				</dd>
				
				<dt><?= ___('sort'); ?></dt>
				<dd>
					<?php 
					echo h($city->sort);
					?>
				</dd>
				
				<dt><?= ___('view'); ?></dt>
				<dd>
					<?php 
					echo h($city->view);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $city], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
