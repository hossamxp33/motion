<div class="models index" style="margin: 100px 0;">
	
	<h2><?= ___('النماذج'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<a href="<?=URL?>Models/add" class='btn btn-default addQuestion'>اضافة <i class="fas fa-plus"></i></a>
		</div>
		<div class="panel-body">
			
			<div class="table-responsive">
			
			<table cellpadding="0" cellspacing="0" class="table table-striped table-hover table-condensed">
			<thead>
			<tr class="sortHeader">
				<th></th>
				<th><?php echo $this->Paginator->sort('name', ___('الاسم')); ?></th>
				<th><?php echo $this->Paginator->sort('sort', ___('الترتيب')); ?></th>
				<th><?php echo $this->Paginator->sort('sort', ___('الاسئلة')); ?></th>
				<th class="actions"></th>
			</tr>
			<tr class="filterHeader">
				<td>
				<?php
				echo $this->AlaxosForm->checkbox('_Tech.selectAll', ['id' => 'TechSelectAll']);
				
				echo $this->AlaxosForm->create($search_entity, array('url' => [], 'class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate'));
				?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('name');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('sort');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->button(___('بحث'), ['class' => 'btn btn-default']);
					echo $this->AlaxosForm->end();
					?>
				</td>
			</tr>
			</thead>
			
			<tbody>
			<?php foreach ($models as $i => $model): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('Model.' . $i . '.id', array('value' => $model->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo h($model->name) ?>
					</td>
					<td>
						<?php echo h($model->sort) ?>
					</td>
					<td>
						<button class="btn btn-default questions" model-id="<?=$model->id?>">الاسئلة</button>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $model->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $model->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $model->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $model->id], ['confirm' => __('Are you sure you want to delete # {0}?', $model->id), 'escape' => false]);
						?>
						
						<?php 
						echo $this->Html->link('<span class="fas fa-search"></span>', ['action' => 'view', $model->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="fas fa-edit"></span>', ['action' => 'edit', $model->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="fas fa-trash"></span>', ['action' => 'delete', $model->id], ['confirm' => __('Are you sure you want to delete # {0}?', $model->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($models) && $models->count() > 0)
			{
				echo '<div class="row">';
				echo '<div class="col-md-1">';
				echo $this->AlaxosForm->postActionAllButton(__d('alaxos', 'delete all'), ['action' => 'delete_all'], ['confirm' => __d('alaxos', 'do you really want to delete the selected items ?')]);
				echo '</div>';
				echo '</div>';
			}
			?>
			
			<div class="paging text-center">
				<ul class="pagination pagination-sm">
				<?php
				$this->Paginator->templates(['ellipsis' => '<li class="ellipsis"><span>...</span></li>']);
				echo $this->Paginator->prev('< ' . __('السابق'));
				echo $this->Paginator->numbers(['first' => 2, 'last' => 2]);
				echo $this->Paginator->next(__('التالي') . ' >');
				?>
				</ul>
			</div>
			
		</div>
	</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
var URL = 'http://localhost/newproject/';
jQuery(document).ready(function(){
	Alaxos.start();
});
$('nav li.active').removeClass('active')
$('nav li:eq(0)').addClass('active');
$('.questions').click(function(){
    window.open(URL+'models/getquestionsmodel/'+$(this).attr('model-id'),'_self')
})
</script>