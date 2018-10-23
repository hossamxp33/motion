<?php 
use Alaxos\Lib\StringTool;
?>

<div class="answers index">
	
	<h2><?= ___('answers'); ?></h2>
	
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
				<th><?php echo $this->Paginator->sort('question_id', ___('question_id')); ?></th>
				<th><?php echo $this->Paginator->sort('answer', ___('answer')); ?></th>
				<th><?php echo $this->Paginator->sort('photo', ___('photo')); ?></th>
				<th><?php echo $this->Paginator->sort('is_correct', ___('is_correct')); ?></th>
				<th><?php echo $this->Paginator->sort('sort', ___('sort')); ?></th>
				<th><?php echo $this->Paginator->sort('view', ___('view')); ?></th>
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
					echo $this->AlaxosForm->filterField('question_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('answer');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('photo');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('is_correct');
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
			<?php foreach ($answers as $i => $answer): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('Answer.' . $i . '.id', array('value' => $answer->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo $answer->has('question') ? $this->Html->link($answer->question->id, ['controller' => 'Questions', 'action' => 'view', $answer->question->id]) : ''; ?>
					</td>
					<td>
						<?php echo h(StringTool::shorten($answer->answer)); ?>
					</td>
					<td>
						<?php echo h($answer->photo) ?>
					</td>
					<td>
						<?php echo h(StringTool::shorten($answer->is_correct)); ?>
					</td>
					<td>
						<?php echo h($answer->sort) ?>
					</td>
					<td>
						<?php echo h(StringTool::shorten($answer->view)); ?>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $answer->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $answer->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $answer->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $answer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $answer->id), 'escape' => false]);
						?>
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $answer->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $answer->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $answer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $answer->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($answers) && $answers->count() > 0)
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

<script type="text/javascript">
jQuery(document).ready(function(){
	Alaxos.start();
});
</script>