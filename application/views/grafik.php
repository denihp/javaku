<?php $u = base_url();?>
<script language="javascript" type="text/javascript" src="<?=$u?>assets/js/jquery-1.8.3.min.js"></script>
<script language="javascript" type="text/javascript" src="<?=$u?>assets/js/jquery.jqplot.min.js"></script>
<script language="javascript" type="text/javascript" src="<?=$u?>assets/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script language="javascript" type="text/javascript" src="<?=$u?>assets/plugins/jqplot.LogAxisRenderer.js"></script>
<script language="javascript" type="text/javascript" src="<?=$u?>assets/plugins/jqplot.CanvasAxisTickRenderer.js"></script>
<script language="javascript" type="text/javascript" src="<?=$u?>assets/plugins/jqplot.CanvasAxisLabelRenderer.js"></script>
<link rel="stylesheet" type="text/css" href="<?=$u?>assets/css/jquery.jqplot.css" />

<script type="text/javascript">
$(document).ready(function(){
 var ajaxDataRenderer = function(url, plot, options) {
    var ret = null;
    $.ajax({
      async: false,
      url: url,
      dataType:"json",
      success: function(data) {
        ret = data;
      }
    });
    return ret;
  };

  var jsonurl1 = "<?=base_url()?>index/getData";
  var plot = $.jqplot('chartdiv', jsonurl1,{
  	animate: true,
  	animateReplot: true,
    title: "Jumlah Kunjungan Bulan Ini",
    dataRenderer: ajaxDataRenderer,
    dataRendererOptions: {
      unusedOptionalUrl: jsonurl1
    },
    axes:{
      xaxis:{
      		min: 1,
          renderer: $.jqplot.CategoryAxisRenderer,
          label:'Bulan',
    	    labelOptions:{
    	      fontFamily:'Arial',
    	      fontSize: '12px'
    	    }
      },
      yaxis:{
        min: 0
      },
      tickDistribution:'power'
  	}
  });
    
});
</script>

<div id="chartdiv" style="height: 200px;"></div>