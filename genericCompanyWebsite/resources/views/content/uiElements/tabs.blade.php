@extends('layout')
@section('content')

<!-- Start Page Header -->
<div class="page-header">
    <h1 class="title">Tabs</h1>
    <ol class="breadcrumb">
        <li><a href="index.html">Dashboard</a></li>
        <li><a href="#">UI Elements</a></li>
        <li class="active">Tabs</li>
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
        <span class="icon color14-bg"><i class="fa fa-caret-square-o-down"></i></span>
        <h1>Tabs</h1>
        <h4>Categorize your content via Kode Tabs.<br>It's Simple &amp; Easy to make. Based on Bootstrap Tabs.</h4>
    </div>

    <div class="col-lg-4 col-md-6">
        <ul class="list-unstyled list">
            <li><i class="fa fa-check"></i>Simple Design
            <li>
            <li><i class="fa fa-check"></i>Based on <a href="http://getbootstrap.com/javascript/#tabs"
                    target="_blank">Bootstrap Tabs</a>
            <li>
            <li><i class="fa fa-check"></i>Variety
            <li>
            <li><i class="fa fa-check"></i>Color Options
            <li>
            <li><i class="fa fa-check"></i>Columns
            <li>
        </ul>
    </div>

</div>
<!-- End Presentation -->


<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START CONTAINER -->
<div class="container-padding">


    <!-- Start Row -->
    <div class="row">

        <!-- Start Tab Panel -->
        <div class="col-md-12 col-lg-4 padding-0">
            <div class="panel panel-transparent">

                <div class="panel-title">
                    Default Tab
                </div>

                <div class="panel-body">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                    data-toggle="tab">Home</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                                    data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab"
                                    data-toggle="tab">Messages</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <p>Ut in leo ut libero sodales feugiat</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages">
                                <p>Duis ac enim diam</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- End Tab Panel -->

        <!-- Start Tab Panel -->
        <div class="col-md-12 col-lg-4 padding-0">
            <div class="panel panel-transparent">

                <div class="panel-title">
                    Pills
                </div>

                <div class="panel-body">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" class="active"><a href="#home2" aria-controls="home2" role="tab"
                                    data-toggle="tab">Home</a></li>
                            <li role="presentation"><a href="#profile2" aria-controls="profile2" role="tab"
                                    data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#messages2" aria-controls="messages2" role="tab"
                                    data-toggle="tab">Messages</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home2">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile2">
                                <p>Ut in leo ut libero sodales feugiat</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages2">
                                <p>Duis ac enim diam</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- End Tab Panel -->

        <!-- Start Tab Panel -->
        <div class="col-md-12 col-lg-4 padding-0">
            <div class="panel panel-transparent">

                <div class="panel-title">
                    Pills Stacked
                </div>

                <div class="panel-body">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-stacked col-md-4" role="tablist">
                            <li role="presentation" class="active"><a href="#home3" aria-controls="home2" role="tab"
                                    data-toggle="tab">Home</a></li>
                            <li role="presentation"><a href="#profile3" aria-controls="profile3" role="tab"
                                    data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#messages3" aria-controls="messages3" role="tab"
                                    data-toggle="tab">Messages</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content col-md-8">
                            <div role="tabpanel" class="tab-pane active" id="home3">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile3">
                                <p>Ut in leo ut libero sodales feugiat</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages3">
                                <p>Duis ac enim diam</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- End Tab Panel -->


    </div>
    <!-- End Row -->




    <!-- Start Row -->
    <div class="row">

        <!-- Start Tab Panel -->
        <div class="col-md-12 col-lg-4 padding-0">
            <div class="panel panel-transparent">

                <div class="panel-title">
                    Justified
                </div>

                <div class="panel-body">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#home4" aria-controls="home4" role="tab"
                                    data-toggle="tab">Home</a></li>
                            <li role="presentation"><a href="#profile4" aria-controls="profile4" role="tab"
                                    data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#messages4" aria-controls="messages4" role="tab"
                                    data-toggle="tab">Messages</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home4">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile4">
                                <p>Ut in leo ut libero sodales feugiat</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages4">
                                <p>Duis ac enim diam</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- End Tab Panel -->

        <!-- Start Tab Panel -->
        <div class="col-md-12 col-lg-4 padding-0">
            <div class="panel panel-transparent">

                <div class="panel-title">
                    Line
                </div>

                <div class="panel-body">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-line" role="tablist">
                            <li role="presentation" class="active"><a href="#home5" aria-controls="home5" role="tab"
                                    data-toggle="tab">Home</a></li>
                            <li role="presentation"><a href="#profile5" aria-controls="profile5" role="tab"
                                    data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#messages5" aria-controls="messages5" role="tab"
                                    data-toggle="tab">Messages</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home5">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile5">
                                <p>Ut in leo ut libero sodales feugiat</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages5">
                                <p>Duis ac enim diam</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- End Tab Panel -->


        <!-- Start Tab Panel -->
        <div class="col-md-12 col-lg-4 padding-0">
            <div class="panel panel-transparent">

                <div class="panel-title">
                    Icon Tab
                </div>

                <div class="panel-body">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-icon" role="tablist">
                            <li role="presentation" class="active"><a href="#home6" aria-controls="home6" role="tab"
                                    data-toggle="tab"><i class="fa fa-home"></i></a></li>
                            <li role="presentation"><a href="#profile6" aria-controls="profile6" role="tab"
                                    data-toggle="tab"><i class="fa fa-user"></i></a></li>
                            <li role="presentation"><a href="#messages6" aria-controls="messages6" role="tab"
                                    data-toggle="tab"><i class="fa fa-comment"></i></a></li>
                            <li role="presentation"><a href="#settings6" aria-controls="settings6" role="tab"
                                    data-toggle="tab"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home6">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile6">
                                <p>Ut in leo ut libero sodales feugiat</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages6">
                                <p>Duis ac enim diam</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="settings6">
                                <p>Integer efficitur eros vel convallis rutrum</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- End Tab Panel -->


    </div>
    <!-- End Row -->




    <!-- Start Row -->
    <div class="row">

        <!-- Start Tab Panel -->
        <div class="col-md-12 col-lg-4 padding-0">
            <div class="panel panel-transparent">

                <div class="panel-title">
                    Left Tab
                </div>

                <div class="panel-body">

                    <div role="tabpanel">

                        <div class="tabs-left">
                            <ul class="nav nav-tabs">
                                <li role="presentation" class="active"><a href="#home7" aria-controls="home7" role="tab"
                                        data-toggle="tab">Home</a></li>
                                <li role="presentation"><a href="#profile7" aria-controls="profile7" role="tab"
                                        data-toggle="tab">Profile</a></li>
                                <li role="presentation"><a href="#messages7" aria-controls="messages7" role="tab"
                                        data-toggle="tab">Messages</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home7">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien lorem,
                                        rhoncus sit amet sodales ut.</p>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile7">
                                    <p>Maecenas a pretium odio. Curabitur et sem augue. Phasellus vel bibendum arcu.
                                        Nullam porttitor ultrices eleifend.</p>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="messages7">
                                    <p>Vestibulum venenatis euismod turpis, vitae accumsan nunc ullamcorper ac. Lorem
                                        ipsum dolor sit amet</p>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- End Tab Panel -->

        <!-- Start Tab Panel -->
        <div class="col-md-12 col-lg-4 padding-0">
            <div class="panel panel-transparent">

                <div class="panel-title">
                    Right Tab
                </div>

                <div class="panel-body">

                    <div role="tabpanel">

                        <div class="tabs-right">
                            <ul class="nav nav-tabs">
                                <li role="presentation" class="active"><a href="#home8" aria-controls="home8" role="tab"
                                        data-toggle="tab">Home</a></li>
                                <li role="presentation"><a href="#profile8" aria-controls="profile8" role="tab"
                                        data-toggle="tab">Profile</a></li>
                                <li role="presentation"><a href="#messages8" aria-controls="messages8" role="tab"
                                        data-toggle="tab">Messages</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home8">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien lorem,
                                        rhoncus sit amet sodales ut</p>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile8">
                                    <p>Maecenas a pretium odio. Curabitur et sem augue. Phasellus vel bibendum arcu.
                                        Nullam porttitor ultrices eleifend.</p>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="messages8">
                                    <p>Vestibulum venenatis euismod turpis, vitae accumsan nunc ullamcorper ac. Lorem
                                        ipsum dolor sit amet</p>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- End Tab Panel -->


        <!-- Start Tab Panel -->
        <div class="col-md-12 col-lg-4 padding-0">
            <div class="panel panel-transparent">

                <div class="panel-title">
                    With Title Font
                </div>

                <div class="panel-body">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs font-title-tab" role="tablist">
                            <li role="presentation" class="active"><a href="#home9" aria-controls="home9" role="tab"
                                    data-toggle="tab">Home</a></li>
                            <li role="presentation"><a href="#profile9" aria-controls="profile9" role="tab"
                                    data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#messages9" aria-controls="messages9" role="tab"
                                    data-toggle="tab">Messages</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active clearfix" id="home9">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile9">
                                <p>Ut in leo ut libero sodales feugiat</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages9">
                                <p>Duis ac enim diam</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- End Tab Panel -->


    </div>
    <!-- End Row -->



    <!-- Start Row -->
    <div class="row">


        <!-- Start Tab Panel -->
        <div class="col-md-12 col-lg-4 padding-0">
            <div class="panel panel-transparent">

                <div class="panel-title">
                    DEFAULT
                </div>

                <div class="panel-body">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabcolor5-bg" role="tablist">
                            <li role="presentation" class="active"><a href="#home10" aria-controls="home10" role="tab"
                                    data-toggle="tab">Home</a></li>
                            <li role="presentation"><a href="#profile10" aria-controls="profile10" role="tab"
                                    data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#messages10" aria-controls="messages10" role="tab"
                                    data-toggle="tab">Messages</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home10">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile10">
                                <p>Ut in leo ut libero sodales feugiat</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages10">
                                <p>Duis ac enim diam</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- End Tab Panel -->


        <!-- Start Tab Panel -->
        <div class="col-md-12 col-lg-4 padding-0">
            <div class="panel panel-transparent">

                <div class="panel-title">
                    PRIMARY
                </div>

                <div class="panel-body">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabcolor6-bg" role="tablist">
                            <li role="presentation" class="active"><a href="#home11" aria-controls="home11" role="tab"
                                    data-toggle="tab">Home</a></li>
                            <li role="presentation"><a href="#profile11" aria-controls="profile11" role="tab"
                                    data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#messages11" aria-controls="messages11" role="tab"
                                    data-toggle="tab">Messages</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home11">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile11">
                                <p>Ut in leo ut libero sodales feugiat</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages11">
                                <p>Duis ac enim diam</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- End Tab Panel -->


        <!-- Start Tab Panel -->
        <div class="col-md-12 col-lg-4 padding-0">
            <div class="panel panel-transparent">

                <div class="panel-title">
                    Success
                </div>

                <div class="panel-body">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabcolor7-bg" role="tablist">
                            <li role="presentation" class="active"><a href="#home12" aria-controls="home12" role="tab"
                                    data-toggle="tab">Home</a></li>
                            <li role="presentation"><a href="#profile12" aria-controls="profile12" role="tab"
                                    data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#messages12" aria-controls="messages12" role="tab"
                                    data-toggle="tab">Messages</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home12">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile12">
                                <p>Ut in leo ut libero sodales feugiat</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages12">
                                <p>Duis ac enim diam</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- End Tab Panel -->


    </div>
    <!-- End Row -->




    <!-- Start Row -->
    <div class="row">


        <!-- Start Tab Panel -->
        <div class="col-md-12 col-lg-4 padding-0">
            <div class="panel panel-transparent">

                <div class="panel-title">
                    INFO
                </div>

                <div class="panel-body">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabcolor8-bg" role="tablist">
                            <li role="presentation" class="active"><a href="#home13" aria-controls="home13" role="tab"
                                    data-toggle="tab">Home</a></li>
                            <li role="presentation"><a href="#profile13" aria-controls="profile13" role="tab"
                                    data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#messages13" aria-controls="messages13" role="tab"
                                    data-toggle="tab">Messages</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home13">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile13">
                                <p>Ut in leo ut libero sodales feugiat</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages13">
                                <p>Duis ac enim diam</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- End Tab Panel -->


        <!-- Start Tab Panel -->
        <div class="col-md-12 col-lg-4 padding-0">
            <div class="panel panel-transparent">

                <div class="panel-title">
                    WARNING
                </div>

                <div class="panel-body">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabcolor9-bg" role="tablist">
                            <li role="presentation" class="active"><a href="#home14" aria-controls="home14" role="tab"
                                    data-toggle="tab">Home</a></li>
                            <li role="presentation"><a href="#profile14" aria-controls="profile14" role="tab"
                                    data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#messages14" aria-controls="messages14" role="tab"
                                    data-toggle="tab">Messages</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home14">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile14">
                                <p>Ut in leo ut libero sodales feugiat</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages14">
                                <p>Duis ac enim diam</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- End Tab Panel -->


        <!-- Start Tab Panel -->
        <div class="col-md-12 col-lg-4 padding-0">
            <div class="panel panel-transparent">

                <div class="panel-title">
                    DANGER
                </div>

                <div class="panel-body">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabcolor10-bg" role="tablist">
                            <li role="presentation" class="active"><a href="#home15" aria-controls="home15" role="tab"
                                    data-toggle="tab">Home</a></li>
                            <li role="presentation"><a href="#profile15" aria-controls="profile15" role="tab"
                                    data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#messages15" aria-controls="messages15" role="tab"
                                    data-toggle="tab">Messages</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home15">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile15">
                                <p>Ut in leo ut libero sodales feugiat</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages15">
                                <p>Duis ac enim diam</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- End Tab Panel -->


    </div>
    <!-- End Row -->



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