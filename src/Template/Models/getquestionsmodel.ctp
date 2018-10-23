<?php 
use Alaxos\Lib\StringTool;
?>

<div class="questions index">
	
	<h2><?= ___('questions'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['paginate_infos' => true, 'select_pagination_limit' => true]);
		?>
		</div>
		<div class="panel-body">
			
			<div class="table-responsive">
			
			<table cellpadding="0" cellspacing="0" class="table table-striped table-hover table-condensed">
			<thead>
			<tr class="sortHeader">
				<th></th>
				<th><?php echo $this->Paginator->sort('model_id', ___('model_id')); ?></th>
				<th><?php echo $this->Paginator->sort('question', ___('السؤال')); ?></th>
				<th><?php echo $this->Paginator->sort('period', ___('وقت السؤال')); ?></th>
				<th><?php echo $this->Paginator->sort('sort', ___('الترتيب')); ?></th>
				<th><?php echo $this->Paginator->sort('view', ___('view')); ?></th>
				<th class="actions"></th>
			</tr>
			<tr class="filterHeader">
				<td>
				<?php
				echo $this->AlaxosForm->checkbox('_Tech.selectAll', ['id' => 'TechSelectAll']);
				
				echo $this->AlaxosForm->create($Questions, array('url' => [], 'class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate'));
				?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('model_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('question');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('period');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('sort');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('view');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->button(___('filter'), ['class' => 'btn btn-default']);
					echo $this->AlaxosForm->end();
					?>
				</td>
			</tr>
			</thead>
			
			<tbody>
			<?php foreach ($Questions as $i => $question): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('Question.' . $i . '.id', array('value' => $question->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo $question->has('model') ? $this->Html->link($question->model->name, ['controller' => 'Models', 'action' => 'view', $question->model->id]) : ''; ?>
					</td>
					<td>
						<?php echo h(StringTool::shorten($question->question)); ?>
					</td>
					<td>
						<?php echo h($question->period) ?>
					</td>
					<td>
						<?php echo h($question->sort) ?>
					</td>
					<td>
						<?php echo h(StringTool::shorten($question->view)); ?>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $question->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $question->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $question->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id), 'escape' => false]);
						?>
						
					<?php
						echo $this->Html->link('<span class="fas fa-search"></span>', ['action' => 'view', $question->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="fas fa-edit"></span>', ['action' => 'edit', $question->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="fas fa-trash"></span>', ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($questions) && $questions->count() > 0)
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
				echo $this->Paginator->prev('< ' . __('previous'));
				echo $this->Paginator->numbers(['first' => 2, 'last' => 2]);
				echo $this->Paginator->next(__('next') . ' >');
				?>
				</ul>
			</div>
			
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	Alaxos.start();
});
</script>
