
    <section class="demo">
        <div class="gridster">
          <ul>
            <li data-row="1" data-col="1" data-sizex="2" data-sizey="1" class="panel panel-info">
                <div class="panel panel-info">
                    <button type="button" class="close" data-dismiss="panel" aria-hidden="true">×</button>
                    <div class="panel-heading">
                        <h3 class="panel-title">Panel primary</h3>
                    </div>
                    <div class="panel-body">
                        Panel content
                    </div>
            </li>
          </ul>
        </div>

    </section>
    <a href="javascript:void(0)" class="btn btn-danger btn-fab coverup">
        <i class="material-icons">add circle</i>
        <div class="ripple-container"></div>
    </a>


<script type="text/javascript">
  var gridster;

  $(function(){

    gridster = $(".gridster > ul").gridster({
        widget_margins: [10, 10],
        widget_base_dimensions: [160, 160],
        min_cols: 6,
        resize: {
            enabled: true
        },
        draggable: {
            handle: '.panel-heading, .panel-heading h3'
        } 
    }).data('gridster');


    var i = 1; 
    
    
    var widget = 0;
    $('.coverup').on('click', function() {
        var $i = i++;
        if($i !== 2) {
            widget = ['<li class="panel panel-info"><div class="panel panel-info"><button type="button" class="close" data-dismiss="panel" aria-hidden="true">×</button><div class="panel-heading"><h3 class="panel-title">Widget '+$i+'</h3></div><div class="panel-body">Panel content</div></li>', 2, 1];
            gridster.add_widget.apply(gridster, widget);
        } else {
            widget = ['<li class="panel panel-info"><div class="panel panel-info"><button type="button" class="close" data-dismiss="panel" aria-hidden="true">×</button><div class="panel-heading"><h3 class="panel-title">Widget Mapa Live</h3></div><div class="panel-body"><iframe src="http://lab-senseui-renatoreisnet.c9users.io/data/real_time" style="height: calc(100%); width: calc(100%); overflow: hidden;" scrolling="no" frameborder="no" >Não foi possível carregar o widget</iframe></div></li>', 3, 4];
            gridster.add_widget.apply(gridster, widget);
        }
    });
    
    $('.panel button').on('click', function() {
         $(this).parent().parent()
    });

    // var collection = [
    //     ['<li><div class="title">drag</div>Widget content</li>', 1, 2],
    //     ['<li><div class="title">drag</div>Widget content</li>', 5, 2],
    //     ['<li><div class="title">drag</div>Widget content</li>', 3, 2],
    //     ['<li><div class="title">drag</div>Widget content</li>', 2, 1],
    //     ['<li><div class="title">drag</div>Widget content</li>', 4, 1],
    //     ['<li><div class="title">drag</div>Widget content</li>', 1, 2],
    //     ['<li><div class="title">drag</div>Widget content</li>', 2, 1],
    //     ['<li><div class="title">drag</div>Widget content</li>', 3, 2],
    //     ['<li><div class="title">drag</div>Widget content</li>', 1, 1],
    //     ['<li><div class="title">drag</div>Widget content</li>', 2, 2],
    //     ['<li><div class="title">drag</div>Widget content</li>', 1, 3],
    // ];

    // $.each(collection, function(i, widget){
    //     gridster.add_widget.apply(gridster, widget)
    // });

  });
</script>

