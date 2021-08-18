@extends('layout')
@section('content')
  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Panels</h1>
      <ol class="breadcrumb">
        <li><a href="index.html">Dashboard</a></li>
        <li><a href="#">UI Elements</a></li>
        <li class="active">Panels</li>
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
      <span class="icon color7-bg"><i class="fa fa-list-alt"></i></span>
      <h1>Panels</h1>
      <h4>Panels with coming their tools and styles.<br> Open, Hide, Close, Search or Expand your panel content.</h4>
    </div>

    <div class="col-lg-4 col-md-6">
      <ul class="list-unstyled list">
        <li><i class="fa fa-check"></i>Simple Design<li>
        <li><i class="fa fa-check"></i>Panel Tools<li>
        <li><i class="fa fa-check"></i>Color Options<li>
        <li><i class="fa fa-check"></i>Easy to Customize<li>
      </ul>
    </div>

  </div>
  <!-- End Presentation -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">


  <!-- Start Row -->
  <div class="row">

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-default">

        <div class="panel-title">
          Basic
        </div>
        <div class="panel-heading">This is Panel Heading</div>

        <div class="panel-body">
          We choose to go to the moon in this decade and do the other things, not because they are easy, but because they are hard, because that goal will serve to organize...
        </div>

      </div>
    </div>
    <!-- End Panel -->

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-default">

        <div class="panel-title">
          Panel with footer
        </div>

        <div class="panel-body">
          We choose to go to the moon in this decade and do the other things, not because they are easy, but because they are hard, because that goal will serve to organize...
        </div>

        <div class="panel-footer">Panel footer</div>

      </div>
    </div>
    <!-- End Panel -->

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-transparent">

        <div class="panel-title">
          Transparent Panel
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <div class="panel-body">
          We choose to go to the moon in this decade and do the other things, not because they are easy, but because they are hard, because that goal will serve to organize...
        </div>

      </div>
    </div>
    <!-- End Panel -->


  </div>
  <!-- End Row -->



  <!-- Start Row -->
  <div class="row">

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-default">

        <div class="panel-title">
          With Tools
          <ul class="panel-tools">
            <li><a class="icon search-tool"><i class="fa fa-search"></i></a></li>
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <div class="panel-search">
          <form>
            <input type="text" class="form-control" placeholder="Search on this panel...">
            <i class="fa fa-search icon"></i>
          </form>
        </div>

        <div class="panel-body">
          We choose to go to the moon in this decade and do the other things, not because they are easy, but because they are hard, because that goal will serve to organize and measure the best of our energies and skills, because that challenge is one that we are willing to accept, one we are unwilling to postpone, and one which we intend to win.
        </div>

      </div>
    </div>
    <!-- End Panel -->

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-default">

        <div class="panel-title">
          With Dropdown
          <ul class="panel-tools">
            <li>
              <a href="#" data-toggle="dropdown" class="dropdown-toggle">Dropdown<span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="#">Print</a></li>
                  <li><a href="#">Reload</a></li>
                  <li><a href="#">Delete</a></li>
                </ul>
            </li>
          </ul>
        </div>

        <div class="panel-body">
          We choose to go to the moon in this decade and do the other things, not because they are easy, but because they are hard, because that goal will serve to organize and measure the best of our energies and skills, because that challenge is one that we are willing to accept, one we are unwilling to postpone, and one which we intend to win.
        </div>

      </div>
    </div>
    <!-- End Panel -->

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-default">

        <div class="panel-title">
          Mouse Hover
          <ul class="panel-tools panel-tools-hover">
            <li><a class="icon search-tool"><i class="fa fa-search"></i></a></li>
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <div class="panel-search">
          <form>
            <input type="text" class="form-control" placeholder="Search on this panel...">
            <i class="fa fa-search icon"></i>
          </form>
        </div>

        <div class="panel-body">
          We choose to go to the moon in this decade and do the other things, not because they are easy, but because they are hard, because that goal will serve to organize and measure the best of our energies and skills, because that challenge is one that we are willing to accept, one we are unwilling to postpone, and one which we intend to win.
        </div>

      </div>
    </div>
    <!-- End Panel -->



  </div>
  <!-- End Row -->



  <!-- Start Row -->
  <div class="row">

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-default">

        <div class="panel-title">
          <i class="fa fa-picture-o titleicon"></i>Title Icon
        </div>

        <div class="panel-body">
          We choose to go to the moon in this decade and do the other things, not because they are easy, but because they are hard, because that goal will serve to organize...
        </div>

      </div>
    </div>
    <!-- End Panel -->

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-default">

        <div class="panel-title">
          With list groups
        </div>

        <div class="panel-body">
          <p>Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <ul class="list-group">
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
          </ul>
        </div>

      </div>
    </div>
    <!-- End Panel -->

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-closed">

        <div class="panel-title">
          Initially closed
          <ul class="panel-tools">
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <div class="panel-body">
          Panel content
        </div>

      </div>
    </div>
    <!-- End Panel -->


  </div>
  <!-- End Row -->



  <!-- Start Row -->
  <div class="row">

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-default">

        <div class="panel-title">
          Title with Text
          <ul class="panel-tools">
            <li>Title simple text</li>
          </ul>
        </div>

        <div class="panel-body">
          We choose to go to the moon in this decade and do the other things, not because they are easy, but because they are hard, because that goal will serve to organize...
        </div>

      </div>
    </div>
    <!-- End Panel -->

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-default">

        <div class="panel-title">
          Title with Link
          <ul class="panel-tools">
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
          </ul>
        </div>

        <div class="panel-body">
          We choose to go to the moon in this decade and do the other things, not because they are easy, but because they are hard, because that goal will serve to organize...
        </div>

      </div>
    </div>
    <!-- End Panel -->

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-widget">

        <div class="panel-title">
          Panel Widget
        </div>

        <div class="panel-body">
          We choose to go to the moon in this decade and do the other things, not because they are easy, but because they are hard, because that goal will serve to organize...
        </div>

      </div>
    </div>
    <!-- End Panel -->


  </div>
  <!-- End Row -->



  <!-- Start Row -->
  <div class="row">

   <div class="col-md-12 padding-b-20">
    <h4 class="font-title">Panel with Colors</h4>
    <p>You can color panels like <code>.panel-primary</code> or <code>.panel-danger</code></p>
  </div>

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-primary">

        <div class="panel-title">
          Primary <span class="badge">.panel-primary</span>
          <ul class="panel-tools">
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <div class="panel-heading">This is Panel Heading</div>

        <div class="panel-body">
          We choose to go to the moon in this decade and do the other things, not because they are easy, but because they are hard, because that goal will serve to organize and measure the best of our energies and skills, because that challenge is one that we are willing to accept, one we are unwilling to postpone, and one which we intend to win.
        </div>

        <div class="panel-footer">This is Panel Footer</div>

      </div>
    </div>
    <!-- End Panel -->

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-success">

        <div class="panel-title">
          Success <span class="badge">.panel-success</span>
          <ul class="panel-tools">
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <div class="panel-heading">This is Panel Heading</div>

        <div class="panel-body">
          We choose to go to the moon in this decade and do the other things, not because they are easy, but because they are hard, because that goal will serve to organize and measure the best of our energies and skills, because that challenge is one that we are willing to accept, one we are unwilling to postpone, and one which we intend to win.
        </div>

        <div class="panel-footer">This is Panel Footer</div>

      </div>
    </div>
    <!-- End Panel -->

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-info">

        <div class="panel-title">
          Info <span class="badge">.panel-info</span>
          <ul class="panel-tools">
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <div class="panel-heading">This is Panel Heading</div>

        <div class="panel-body">
          We choose to go to the moon in this decade and do the other things, not because they are easy, but because they are hard, because that goal will serve to organize and measure the best of our energies and skills, because that challenge is one that we are willing to accept, one we are unwilling to postpone, and one which we intend to win.
        </div>

        <div class="panel-footer">This is Panel Footer</div>

      </div>
    </div>
    <!-- End Panel -->

  </div>
  <!-- End Row -->



  <!-- Start Row -->
  <div class="row">

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-warning">

        <div class="panel-title">
          Warning <span class="badge">.panel-warning</span>
          <ul class="panel-tools">
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <div class="panel-heading">This is Panel Heading</div>

        <div class="panel-body">
          We choose to go to the moon in this decade and do the other things, not because they are easy, but because they are hard, because that goal will serve to organize and measure the best of our energies and skills, because that challenge is one that we are willing to accept, one we are unwilling to postpone, and one which we intend to win.
        </div>

        <div class="panel-footer">This is Panel Footer</div>

      </div>
    </div>
    <!-- End Panel -->

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-danger">

        <div class="panel-title">
          Danger <span class="badge">.panel-danger</span>
          <ul class="panel-tools">
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <div class="panel-heading">This is Panel Heading</div>

        <div class="panel-body">
          We choose to go to the moon in this decade and do the other things, not because they are easy, but because they are hard, because that goal will serve to organize and measure the best of our energies and skills, because that challenge is one that we are willing to accept, one we are unwilling to postpone, and one which we intend to win.
        </div>

        <div class="panel-footer">This is Panel Footer</div>

      </div>
    </div>
    <!-- End Panel -->

    <!-- Start Panel -->
    <div class="col-md-6 col-lg-4">
      <div class="panel panel-dark">

        <div class="panel-title">
          Dark <span class="badge">.panel-dark</span>
          <ul class="panel-tools">
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <div class="panel-heading">This is Panel Heading</div>

        <div class="panel-body">
          We choose to go to the moon in this decade and do the other things, not because they are easy, but because they are hard, because that goal will serve to organize and measure the best of our energies and skills, because that challenge is one that we are willing to accept, one we are unwilling to postpone, and one which we intend to win.
        </div>

        <div class="panel-footer">This is Panel Footer</div>

      </div>
    </div>
    <!-- End Panel -->

  </div>
  <!-- End Row -->





</div>
<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 


<!-- Start Footer -->
<div class="row footer">
  <div class="col-md-6 text-left">
  Copyright © 2015 <a href="http://themeforest.net/user/egemem/portfolio" target="_blank">Egemem</a> All rights reserved.
  </div>
  <div class="col-md-6 text-right">
    Design and Developed by <a href="http://themeforest.net/user/egemem/portfolio" target="_blank">Egemem</a>
  </div> 
</div>
<!-- End Footer -->

@endsection