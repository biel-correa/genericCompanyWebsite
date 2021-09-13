<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Cool Company</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <link href="{{ asset('css/root.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <style>
    .d-flex{
      display: flex;
    }

    .select2-container{
      width: 100% !important;
    }
  </style>
    <!-- ================================================
  jQuery UI
  ================================================ -->
  <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>

  @include('layouts.topbar')

  @include('layouts.sidebar')

  <div class="content">
    @yield('content')
  </div>

  @include('layouts.tabpanel')
  
  @yield('script')

  <script>
    $(document).ready(function () {
      $('.select2').select2()
    })
  </script>

  <!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
  <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>

  <!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
  <script type="text/javascript" src="{{asset('js/plugins.js')}}"></script>

  <!-- ================================================
Bootstrap Select
================================================ -->
  <script type="text/javascript" src="{{asset('js/bootstrap-select/bootstrap-select.js')}}"></script>

  <!-- ================================================
Bootstrap Toggle
================================================ -->
  <script type="text/javascript" src="{{asset('js/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>

  <!-- ================================================
Bootstrap WYSIHTML5
================================================ -->
  <!-- main file -->
  <script type="text/javascript" src="{{asset('js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js')}}"></script>
  <!-- bootstrap file -->
  <script type="text/javascript" src="{{asset('js/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}"></script>

  <!-- ================================================
Summernote
================================================ -->
  <script type="text/javascript" src="{{asset('js/summernote/summernote.min.js')}}"></script>

  <!-- ================================================
Flot Chart
================================================ -->
  <!-- main file -->
  <script type="text/javascript" src="{{asset('js/flot-chart/flot-chart.js')}}"></script>
  <!-- time.js -->
  <script type="text/javascript" src="{{asset('js/flot-chart/flot-chart-time.js')}}"></script>
  <!-- stack.js -->
  <script type="text/javascript" src="{{asset('js/flot-chart/flot-chart-stack.js')}}"></script>
  <!-- pie.js -->
  <script type="text/javascript" src="{{asset('js/flot-chart/flot-chart-pie.js')}}"></script>
  <!-- demo codes -->
  <script type="text/javascript" src="{{asset('js/flot-chart/flot-chart-plugin.js')}}"></script>

  <!-- ================================================
Chartist
================================================ -->
  <!-- main file -->
  <script type="text/javascript" src="{{asset('js/chartist/chartist.js')}}"></script>
  <!-- demo codes -->
  <script type="text/javascript" src="{{asset('js/chartist/chartist-plugin.js')}}"></script>

  <!-- ================================================
Easy Pie Chart
================================================ -->
  <!-- main file -->
  <script type="text/javascript" src="{{asset('js/easypiechart/easypiechart.js')}}"></script>
  <!-- demo codes -->
  <script type="text/javascript" src="{{asset('js/easypiechart/easypiechart-plugin.js')}}"></script>

  <!-- ================================================
Sparkline
================================================ -->
  <!-- main file -->
  <script type="text/javascript" src="{{asset('js/sparkline/sparkline.js')}}"></script>
  <!-- demo codes -->
  <script type="text/javascript" src="{{asset('js/sparkline/sparkline-plugin.js')}}"></script>

  <!-- ================================================
Rickshaw
================================================ -->
  <!-- d3 -->
  <script src="{{asset('js/rickshaw/d3.v3.js')}}"></script>
  <!-- main file -->
  <script src="{{asset('js/rickshaw/rickshaw.js')}}"></script>
  <!-- demo codes -->
  <script src="{{asset('js/rickshaw/rickshaw-plugin.js')}}"></script>

  <!-- ================================================
Data Tables
================================================ -->
  <script src="{{asset('js/datatables/datatables.min.js')}}"></script>

  <!-- ================================================
Sweet Alert
================================================ -->
  <script src="{{asset('js/sweet-alert/sweet-alert.min.js')}}"></script>

  <!-- ================================================
Kode Alert
================================================ -->
  <script src="{{asset('js/kode-alert/main.js')}}"></script>

  <!-- ================================================
Gmaps
================================================ -->
  <!-- google maps api -->
  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <!-- main file -->
  <script src="{{asset('js/gmaps/gmaps.js')}}"></script>
  <!-- demo codes -->
  <script src="{{asset('js/gmaps/gmaps-plugin.js')}}"></script>


  <!-- ================================================
Moment.js
================================================ -->
  <script type="text/javascript" src="{{asset('js/moment/moment.min.js')}}"></script>

  <!-- ================================================
Full Calendar
================================================ -->
  <script type="text/javascript" src="{{asset('js/full-calendar/fullcalendar.js')}}"></script>

  <!-- ================================================
Bootstrap Date Range Picker
================================================ -->
  <script type="text/javascript" src="{{asset('js/date-range-picker/daterangepicker.js')}}"></script>

  <script>
    // set up our data series with 50 random data points

    var seriesData = [
      [],
      [],
      []
    ];
    var random = new Rickshaw.Fixtures.RandomData(20);

    for (var i = 0; i < 110; i++) {
      random.addData(seriesData);
    }

    // instantiate our graph!

    var graph = new Rickshaw.Graph({
      element: document.getElementById("todaysales"),
      renderer: 'bar',
      series: [{
        color: "#33577B",
        data: seriesData[0],
        name: 'Photodune'
      }, {
        color: "#77BBFF",
        data: seriesData[1],
        name: 'Themeforest'
      }, {
        color: "#C1E0FF",
        data: seriesData[2],
        name: 'Codecanyon'
      }]
    });

    graph.render();

    var hoverDetail = new Rickshaw.Graph.HoverDetail({
      graph: graph,
      formatter: function (series, x, y) {
        var date = '<span class="date">' + new Date(x * 1000).toUTCString() + '</span>';
        var swatch = '<span class="detail_swatch" style="background-color: ' + series.color + '"></span>';
        var content = swatch + series.name + ": " + parseInt(y) + '<br>' + date;
        return content;
      }
    });
  </script>

  <!-- Today Activity -->
  <script>
    // set up our data series with 50 random data points

    var seriesData = [
      [],
      [],
      []
    ];
    var random = new Rickshaw.Fixtures.RandomData(20);

    for (var i = 0; i < 50; i++) {
      random.addData(seriesData);
    }

    // instantiate our graph!

    var graph = new Rickshaw.Graph({
      element: document.getElementById("todayactivity"),
      renderer: 'area',
      series: [{
        color: "#9A80B9",
        data: seriesData[0],
        name: 'London'
      }, {
        color: "#CDC0DC",
        data: seriesData[1],
        name: 'Tokyo'
      }]
    });

    graph.render();

    var hoverDetail = new Rickshaw.Graph.HoverDetail({
      graph: graph,
      formatter: function (series, x, y) {
        var date = '<span class="date">' + new Date(x * 1000).toUTCString() + '</span>';
        var swatch = '<span class="detail_swatch" style="background-color: ' + series.color + '"></span>';
        var content = swatch + series.name + ": " + parseInt(y) + '<br>' + date;
        return content;
      }
    });
  </script>
</body>

</html>