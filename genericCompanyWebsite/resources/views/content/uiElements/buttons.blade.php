@extends('layout')
@section('content')
<!-- Start Page Header -->
<div class="page-header">
    <h1 class="title">Buttons</h1>
    <ol class="breadcrumb">
        <li><a href="index.html">Dashboard</a></li>
        <li><a href="#">UI Elements</a></li>
        <li class="active">Buttons</li>
    </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
        <div class="btn-group" role="group" aria-label="...">
            <a href="index.html" class="btn btn-light">Dashboard</a>
            <a href="#" class="btn btn-light"><i class="fa fa-refresh"></i></a>
            <a href="#" class="btn btn-light"><i class="fa fa-search"></i></a>
            <a href="#" class="btn btn-light" id="topstats"><i class="fa fa-line-chart"></i></a>
        </div>
    </div>
    <!-- End Page Header Right Div -->

</div>
<!-- End Page Header -->



<!-- Start Presentation -->
<div class="row presentation">

    <div class="col-lg-8 col-md-6 titles">
        <span class="icon color15-bg"><i class="fa fa-square-o"></i></span>
        <h1>Buttons</h1>
        <h4>Do you need buttons ? We did 13 fancy style buttons for Kode.<br> Simple to personify. Make your own style.
        </h4>
    </div>

    <div class="col-lg-4 col-md-6">
        <ul class="list-unstyled list">
            <li><i class="fa fa-check"></i><b>13</b> Different style
            <li>
            <li><i class="fa fa-check"></i>Based on <a href="http://getbootstrap.com/" target="_blank">Bootstrap
                    Buttons</a>
            <li>
            <li><i class="fa fa-check"></i>Easy to Personify
            <li>
            <li><i class="fa fa-check"></i>Dropdowns
            <li>
            <li><i class="fa fa-check"></i>Size and Group Option
            <li>
        </ul>
    </div>

</div>
<!-- End Presentation -->

<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START CONTAINER -->
<div class="container-padding">



    <div class="row btndiv">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-title">COLORS</div>
                <div class="panel-body">

                    <!-- Start left -->
                    <div class="col-md-12 col-lg-6">

                        <h4>Classic</h4>
                        <p>Classic button style <code>btn</code> example <code>btn-default</code></p>
                        <p>There is also option colors example <code>btn-option1</code> or <code>btn-option5</code></p>
                        <a href="#" class="btn btn-default">Default</a>
                        <a href="#" class="btn btn-primary">Primary</a>
                        <a href="#" class="btn btn-success">Success</a>
                        <a href="#" class="btn btn-info">Info</a>
                        <a href="#" class="btn btn-warning">Warning</a>
                        <a href="#" class="btn btn-danger">Danger</a>
                        <a href="#" class="btn btn-option1">Option 1</a>
                        <a href="#" class="btn btn-option2">Option 2</a>
                        <a href="#" class="btn btn-option3">Option 3</a>
                        <a href="#" class="btn btn-option4">Option 4</a>
                        <a href="#" class="btn btn-option5">Option 5</a>
                        <a href="#" class="btn">Basic</a>
                        <a href="#" class="btn btn-light">Light</a>

                        <hr>

                        <h4>Rounded</h4>
                        <p>Rounded buttons. Just add <code>btn-rounded</code></p>
                        <p>All colors support rounded.</p>
                        <a href="#" class="btn btn-rounded btn-default">Default</a>
                        <a href="#" class="btn btn-rounded btn-primary">Primary</a>
                        <a href="#" class="btn btn-rounded btn-success">Success</a>
                        <a href="#" class="btn btn-rounded btn-info">Info</a>
                        <a href="#" class="btn btn-rounded btn-warning">Warning</a>
                        <a href="#" class="btn btn-rounded btn-danger">Danger</a>
                        <a href="#" class="btn btn-rounded btn-option1">Option 1</a>
                        <a href="#" class="btn btn-rounded btn-option2">Option 2</a>
                        <a href="#" class="btn btn-rounded btn-option3">Option 3</a>
                        <a href="#" class="btn btn-rounded btn-option4">Option 4</a>
                        <a href="#" class="btn btn-rounded btn-option5">Option 5</a>
                        <a href="#" class="btn btn-rounded">Basic</a>
                        <a href="#" class="btn btn-rounded btn-light">Light</a>

                        <hr>

                        <h4>Square</h4>
                        <p>Square button style with <code>btn-square</code></p>
                        <a href="#" class="btn btn-square btn-default">Default</a>
                        <a href="#" class="btn btn-square btn-primary">Primary</a>
                        <a href="#" class="btn btn-square btn-success">Success</a>
                        <a href="#" class="btn btn-square btn-info">Info</a>
                        <a href="#" class="btn btn-square btn-warning">Warning</a>
                        <a href="#" class="btn btn-square btn-danger">Danger</a>
                        <a href="#" class="btn btn-square btn-option1">Option 1</a>
                        <a href="#" class="btn btn-square btn-option2">Option 2</a>
                        <a href="#" class="btn btn-square btn-option3">Option 3</a>
                        <a href="#" class="btn btn-square btn-option4">Option 4</a>
                        <a href="#" class="btn btn-square btn-option5">Option 5</a>
                        <a href="#" class="btn btn-square">Basic</a>
                        <a href="#" class="btn btn-square btn-light">Light</a>

                        <hr>

                        <h4>Sizing</h4>
                        <p>You can easily change your button size.</p>
                        <p>Extra Small <code>btn-xs</code>, Small <code>btn-sm</code>, Normal with no size, Large
                            <code>btn-lg</code>, Extra Large <code>btn-xl</code></p>
                        <a href="#" class="btn btn-default btn-xs">Extra Small</a>
                        <a href="#" class="btn btn-default btn-sm">Small</a>
                        <a href="#" class="btn btn-default">Normal</a>
                        <a href="#" class="btn btn-default btn-lg">Large</a>
                        <a href="#" class="btn btn-default btn-xl">Extra Large</a>

                        <hr>

                        <h4>Block Button</h4>
                        <p>How to make a block button? Easy add <code>btn-block</code> on your button class.</p>
                        <button type="button" class="btn btn-default btn-block">Block level button</button>
                        <button type="button" class="btn btn-light btn-xs btn-block">Block level button</button>

                        <hr>

                        <h4>Icon Button</h4>
                        <p>Here is Icon buttons. You can create icon button with Font-Awesome. <code>btn-icon</code></p>
                        <button type="button" class="btn btn-default btn-icon"><i class="fa fa-envelope-o"></i></button>
                        <button type="button" class="btn btn-danger btn-icon"><i class="fa fa-file"></i></button>
                        <button type="button" class="btn btn-option3 btn-icon"><i class="fa fa-cloud"></i></button>
                        <button type="button" class="btn btn-rounded btn-default btn-icon"><i
                                class="fa fa-envelope-o"></i></button>
                        <button type="button" class="btn btn-rounded btn-danger btn-icon"><i
                                class="fa fa-file"></i></button>
                        <button type="button" class="btn btn-rounded btn-option3 btn-icon"><i
                                class="fa fa-cloud"></i></button>
                        <button type="button" class="btn btn-square btn-default btn-icon"><i
                                class="fa fa-envelope-o"></i></button>
                        <button type="button" class="btn btn-square btn-danger btn-icon"><i
                                class="fa fa-file"></i></button>
                        <button type="button" class="btn btn-square btn-option3 btn-icon"><i
                                class="fa fa-cloud"></i></button>


                    </div>
                    <!-- End left -->

                    <!-- Start right -->
                    <div class="col-md-12 col-lg-6">

                        <h4>With Icons</h4>
                        <p>Just put an icon on your button. Its gonna auto size and position itself.</p>
                        <a href="#" class="btn btn-default"><i class="fa fa-picture-o"></i>Default</a>
                        <a href="#" class="btn btn-primary"><i class="fa fa-arrows"></i>Primary</a>
                        <a href="#" class="btn btn-success"><i class="fa fa-camera"></i>Success</a>
                        <a href="#" class="btn btn-info"><i class="fa fa-comments"></i>Info</a>
                        <a href="#" class="btn btn-warning"><i class="fa fa-warning"></i>Warning</a>
                        <a href="#" class="btn btn-danger"><i class="fa fa-check"></i>Danger</a>
                        <a href="#" class="btn btn-option1"><i class="fa fa-leaf"></i>Option 1</a>
                        <a href="#" class="btn btn-option2"><i class="fa fa-info"></i>Option 2</a>
                        <a href="#" class="btn btn-option3"><i class="fa fa-paper-plane-o"></i>Option 3</a>
                        <a href="#" class="btn btn-option4"><i class="fa fa-star"></i>Option 4</a>
                        <a href="#" class="btn btn-option5"><i class="fa fa-user"></i>Option 5</a>
                        <a href="#" class="btn"><i class="fa fa-cab"></i>Basic</a>
                        <a href="#" class="btn btn-light"><i class="fa fa-file-o"></i>Light</a>

                        <hr>

                        <h4>Groups</h4>
                        <p>Wrap a series of buttons with <code>.btn</code> in <code>.btn-group</code></p>
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-light">Left</button>
                            <button type="button" class="btn btn-light">Middle</button>
                            <button type="button" class="btn btn-light">Right</button>
                        </div>
                        <br>
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-default">Left</button>
                            <button type="button" class="btn btn-danger">Middle</button>
                            <button type="button" class="btn btn-success">Right<span class="badge">10</span></button>
                        </div>
                        <br>
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-light"><i class="fa fa-user"></i>My Profile</button>
                            <button type="button" class="btn btn-light"><i class="fa fa-envelope-o"></i>Messages<span
                                    class="badge">13</span></button>
                            <button type="button" class="btn btn-light"><i class="fa fa-cog"></i>Settings</button>
                        </div>
                        <br>
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-light">1</button>
                            <button type="button" class="btn btn-light">2</button>
                            <button type="button" class="btn btn-light">3</button>
                            <button type="button" class="btn btn-light">4</button>
                        </div>

                        <hr>

                        <h4>Button Dropdowns</h4>
                        <p>Use any button to trigger a dropdown menu by placing it within a <code>.btn-group</code> and
                            providing the proper menu markup.</p>
                        <!-- dropdown 1 -->
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                data-toggle="dropdown" aria-expanded="true">
                                Dropdown
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a>
                                </li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else
                                        here</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a>
                                </li>
                            </ul>
                        </div>
                        <!-- dropdown 2 -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-light">Action</button>
                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>

                        <hr>

                        <h4>Justified button groups</h4>
                        <p>Make a group of buttons stretch at equal sizes to span the entire width of its parent. Also
                            works with button dropdowns within the button group.</p>
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default">Left</button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-warning">Middle</button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-option4">Right</button>
                            </div>
                        </div>

                        <hr>

                        <h4>Social Button</h4>
                        <p>Make social buttons with colors and icons.</p>
                        <button type="button" class="btn btn-default"><i class="fa fa-twitter"></i>Sign in with
                            Twitter</button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-facebook"></i>Sign in with
                            Facebook</button>
                        <button type="button" class="btn btn-danger"><i class="fa fa-google"></i>Sign in with
                            Google</button>

                        <h4>Examples</h4>
                        <p>Create your style.</p>
                        <button type="button" class="btn btn-option3 btn-xs"><i class="fa fa-plus"></i>Show
                            More</button>
                        <button type="button" class="btn btn-option1 btn-xs"><i
                                class="fa fa-thumbs-up"></i>1,102</button>
                        <button type="button" class="btn btn-danger btn-icon btn-sm"><i class="fa fa-heart"></i><span
                                class="badge">12</span></button>
                        <button type="button" class="btn btn-success btn-sm"><i class="fa fa-cloud"></i>Upload
                            File</button>
                        <br>
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-icon btn-light"><i
                                    class="fa fa-align-left"></i></button>
                            <button type="button" class="btn btn-icon btn-light"><i
                                    class="fa fa-align-center"></i></button>
                            <button type="button" class="btn btn-icon btn-light"><i
                                    class="fa fa-align-right"></i></button>
                        </div>

                    </div>
                    <!-- End right -->

                </div>
            </div>
        </div>
    </div>




</div>
<!-- END CONTAINER -->
<!-- //////////////////////////////////////////////////////////////////////////// -->


<!-- Start Footer -->
<div class="row footer">
    <div class="col-md-6 text-left">
        Copyright © 2015 <a href="http://themeforest.net/user/egemem/portfolio" target="_blank">Egemem</a> All rights
        reserved.
    </div>
    <div class="col-md-6 text-right">
        Design and Developed by <a href="http://themeforest.net/user/egemem/portfolio" target="_blank">Egemem</a>
    </div>
</div>
<!-- End Footer -->
@endsection