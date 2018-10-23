
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">تقارير</h3>
  </div>
  <div class="panel-body">
    <div class="row">
        <div class="circle col-sm-4" id="circle-a">
            <strong></strong>
        </div>
        <div class="circle col-sm-4" id="circle-b">
            <strong></strong>
        </div>
        <div class="circle col-sm-4" id="circle-c">
            <strong></strong>
        </div>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">احصائيات</h3>
  </div>
  <div class="panel-body">
    <div class="row">
        <!-- pie chart canvas element -->
        <canvas id="Chart" style="width: 600px;height: 400px;margin: 110px auto;display: block;"></canvas>
    </div>
  </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.1.3/circle-progress.min.js"></script>
<script>
$('nav li.active').removeClass('active')
	$('nav li:eq(1)').addClass('active');
var progressBarOptions = {
	startAngle: -1.55,
	size: 200,
    value: 0.75,
    fill: {
		color: '#ffa500'
	}
}

$('.circle').circleProgress(progressBarOptions).on('circle-animation-progress', function(event, progress, stepValue) {
	$(this).find('strong').text(String(stepValue.toFixed(2)).substr(1));
});

$('#circle-b').circleProgress({
	value : 0.25,
	fill: {
		color: '#FF0000'
	}
});

$('#circle-c').circleProgress({
	value : 0.92,
	fill: {
		color: '#008000'
	}
});
</script>