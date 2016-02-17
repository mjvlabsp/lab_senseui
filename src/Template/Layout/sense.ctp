<!DOCTYPE html>
    <html>

    <head>
        <?=$this->Html->charset() ?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>
                <?=$this->fetch('title') ?>
            </title>
            <?=$this->Html->meta('icon') ?>

            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

            <?=$this->Html->css('jquery.gridster.css') ?>
            <?=$this->Html->css('bootstrap.css') ?>
            <?=$this->Html->css('bootstrap-material-design.min.css') ?>
            <?=$this->Html->css('ripples.min.css') ?>
            <?=$this->Html->css('jquery.dropdown.css') ?>
            <?=$this->Html->css('styles.css') ?>

            <?=$this->Html->script('jquery-1.12.0.min.js') ?>
            <?=$this->Html->script('ripples.min.js') ?>
            <?=$this->Html->script('jquery.dropdown.js') ?>
            <?=$this->Html->script('material.js') ?>
            <?=$this->Html->script('jquery.gridster.js') ?>
            <?=$this->Html->script('utils.js') ?>

            <?=$this->Html->script('main.js') ?>

            <?=$this->fetch('meta') ?>
            <?=$this->fetch('css') ?>
            <?=$this->fetch('script') ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    $.material.init();    
                    $(".select").dropdown({"optionClass": "withripple"});
                        
                });
                
            </script>
    </head>

    <body>
<div class="navbar navbar-gray">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:void(0)">MJV - SenseUI</a>
        </div>
        <div class="navbar-collapse collapse navbar-inverse-collapse">
            <!--
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control col-md-8" placeholder="Search">
                </div>
            </form>
            -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="" data-target="#userlogged" class="dropdown-toggle" data-toggle="dropdown">Renato
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu" id="userlogged">
                        <li><a href="javascript:void(0)">Action</a></li>
                        <li><a href="javascript:void(0)">Another action</a></li>
                        <li><a href="javascript:void(0)">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0)">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
        <section id="content" class="container-fluid row">
            <?=$this->fetch('content') ?>
        </section>
        <footer>
        </footer>
    </body>

    </html>
