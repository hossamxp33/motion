
<div class="text-center" style="margin-bottom:30px" >
	<div class="btn-group" role="group" aria-label="" >
		<button type="button" class="btn btn-default charts" chart-type="percentage">النسبه المئويه</button>
		<button type="button" class="btn btn-default charts" chart-type="pie">pie charts</button>
		<button type="button" class="btn btn-default charts" chart-type="bar">Bar charts</button>
	</div>
</div>

<div class="panel panel-default chartContent" id="percentage" class="">
  <div class="panel-heading">
    <h3 class="panel-title">تقارير</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <?php
                            foreach ($studentanswers as $data) {
					
		
                                if ($data->answer->is_correct == "0") {
                                    $wrong[] = $data;
								  
                                   
								}
							
						
                                if ($data->answer->is_correct == "1") {
                                    $accept[] = $data;
								}
								debug($data);
							}
							debug(count($wrong));
							debug(count($accept));
							

                            ?>
        <div class="circle col-sm-6" id="circle-a">
            <strong ></strong>
            <span class="wrong-answer" wrong-answer="<?= (count($wrong) / $all) ?>">الاجابات الخاطئة : <?=count($wrong)?></span>
		</div>
        <div class="circle col-sm-6" id="circle-b">
            <strong></strong>
			<span class="correct-answer" correct-answer="<?= (count($accept) / $all) ?>">الاجابات الصحيحة : <?=count($accept)?></span>
        </div>
    </div>
  </div>
</div>

<div class="panel panel-default chartContent" id="pie" >
  <div class="panel-heading">
    <h3 class="panel-title">احصائيات</h3>
  </div>
  <div class="panel-body">
    <div class="row">
        <!-- pie chart canvas element -->
        <canvas id="Chart" style="margin: 0 auto;display: block;"></canvas>
    </div>
  </div>
</div>

<div class="panel panel-default chartContent" id="bar">
  <div class="panel-heading">
    <h3 class="panel-title">احصائيات</h3>
  </div>
  <div class="panel-body">
    <div class="row">
        <!-- pie chart canvas element -->
        <canvas id="canvas" width="948" height="474" style="margin: 0 auto;display: block;"></canvas>
    </div>
  </div>
</div>

<div class="studentanswers index">
	
	<h2><?= ___('studentanswers'); ?></h2>
	
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
				<th><?php echo $this->Paginator->sort('student_id', ___('student_id')); ?></th>
				<th><?php echo $this->Paginator->sort('question_id', ___('question_id')); ?></th>
                <th><?php echo $this->Paginator->sort('answer_id', ___('answer_id')); ?></th>
                <th><?php echo $this->Paginator->sort('city_id', ___('city_id')); ?></th>
                <th><?php echo $this->Paginator->sort('city_id', ___('model_id')); ?></th>
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
					echo $this->AlaxosForm->filterField('student_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('question_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('answer_id');
					?>
                </td>
                <td>
                     <?php
                        echo $this->AlaxosForm->input('Filter[Students][city_id]', ['options' => $city, 'label' => false, 'class' => 'form-control', 'empty' => true]);
                        ?>
                 </td>
                 <td>
                     <?php
                        echo $this->AlaxosForm->input('Filter[Questions][model_id]', ['options' => $model, 'label' => false, 'class' => 'form-control', 'empty' => true]);
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
			<?php foreach ($studentanswers as $i => $studentanswer): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('Studentanswer.' . $i . '.id', array('value' => $studentanswer->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo $studentanswer->has('student') ? $this->Html->link($studentanswer->student->name, ['controller' => 'Students', 'action' => 'view', $studentanswer->student->id]) : ''; ?>
					</td>
					<td>
						<?php echo $studentanswer->has('question') ? $this->Html->link($studentanswer->question->question, ['controller' => 'Questions', 'action' => 'view', $studentanswer->question->id]) : ''; ?>
					</td>
					<td>
						<?php echo $studentanswer->has('answer') ? $this->Html->link($studentanswer->answer->answer, ['controller' => 'Answers', 'action' => 'view', $studentanswer->answer->id]) : ''; ?>
                    </td>
                    <td>
                        <?php echo $studentanswer->student->has('city') ? $this->Html->link($studentanswer->student->city->name, ['controller' => 'Cities', 'action' => 'view', $studentanswer->student->city->id]) : ''; 
                        ?>
                    </td>
                    <td>
                        <?php echo $studentanswer->question->has('model') ? $this->Html->link($studentanswer->question->model->name, ['controller' => 'Models', 'action' => 'view', $studentanswer->question->model->id]) : ''; 
                      
                        ?>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $studentanswer->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $studentanswer->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $studentanswer->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $studentanswer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentanswer->id), 'escape' => false]);
						?>
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $studentanswer->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $studentanswer->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $studentanswer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentanswer->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($studentanswers) && $studentanswers->count() > 0)
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
<script src='<?=URL?>js/Chart.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.1.3/circle-progress.min.js"></script>
<script>
$('nav li.active').removeClass('active')
	$('nav li:eq(1)').addClass('active');

	$('.chartContent:not(:eq(0))').hide()
	$('.charts').click(function(){
		$('.chartContent').hide()
		$('#'+$(this).attr('chart-type')).show()
	});
	//pie chart data
	// get pie chart canvas
	var countries= $("#Chart"),
	    canvas = $('#canvas');
	countries.width = 680;
	countries.height = 440;
	var data2 = {
            labels: ["الاجابات الخاطئه", "الاجابات الصحيحة"],
            datasets: [
                {
                    label: "TeamB Score",
                    data: [$('.wrong-answer').attr('wrong-answer'), $('.correct-answer').attr('correct-answer')],
                    backgroundColor: [
                        "#d04646",
                        "#47d046"
                    ],
                    borderColor: [
                        "#d04646",
                        "#47d046"
                    ],
                    borderWidth: [1, 1]
                }
            ]
        };

        //options
        var options = {
            responsive: true,
            title: {
                display: true,
                position: "top",
                text: "",
                fontSize: 18,
                fontColor: "#111"
            },
            legend: {
                display: true,
                position: "bottom",
                labels: {
                    fontColor: "#333",
                    fontSize: 16
                }
            }
        };
            
            //create Chart class object
            var chart2 = new Chart(countries, {
                type: "pie",
                data: data2,
                options: options
            });
	
var progressBarOptions = {
	startAngle: -1.55,
	size: 200,
    value: $('.wrong-answer').attr('wrong-answer'),
    fill: {
		color: '#d04646'
	}
 }

$('.circle').circleProgress(progressBarOptions).on('circle-animation-progress', function(event, progress, stepValue) {
	 $(this).find('strong').text(String(stepValue.toFixed(2))).append(' %');
});

$('#circle-b').circleProgress({
	value : $('.correct-answer').attr('correct-answer'),
	fill: {
		color: '#47d046'
	}
});
var myChart = new Chart(canvas, {
  type: 'bar',
  data: {
    labels: ["الاجابات الخاطئه", "الاجابات الصحيحة"],
    datasets: [{
      label: 'الاجابات الخاطئه',
      data: [$('.wrong-answer').attr('wrong-answer'), $('.correct-answer').attr('correct-answer')],
      backgroundColor: [
        '#d04646',
        '#47d046'
      ],
      borderColor: [
        '#d04646',
        '#47d046'
      ],
      borderWidth: 1
    }]
  },
  options: {
    responsive: false,
    scales: {
      xAxes: [{
		barPercentage: 0.1
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});

</script> 