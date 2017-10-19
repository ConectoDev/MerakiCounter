<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Fjalla+One|PT+Sans:400,700" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){

    var timeoutid_client = 0;
    var timeoutid_visitors1 = 0;
    var timeoutid_visitors2 = 0;
    var timeoutid_visitors3 = 0;
    $('span#devices_counter').text('0');
    $('span#visitors_counter1').text('0');
    $('span#visitors_counter2').text('0');
    $('span#visitors_counter3').text('0');
    function update_client_count() {
        $.getJSON('total_clients.php', function (data) {
           var items = new Array();
           $.each(data, function (key, val) {
               if ($('span#devices_counter').text() != val ) {
                   $('span#devices_counter').fadeOut(400, function() {
	               $('span#devices_counter').text(val);
                   });
                   $('span#devices_counter').fadeIn(400);
               };
           });
        });
    };

    function update_visitor_count1() {
        $.getJSON('total_visitors1.php', function (data) {
           var items = new Array();
           $.each(data, function (key, val) {
               if ($('span#visitors_counter1').text() != val) {
                 $('span#visitors_counter1').fadeOut(400, function () {
                     $('span#visitors_counter1').text(val);
                 });
                 $('span#visitors_counter1').fadeIn(400);
               };
           });
        });
    };

    function update_visitor_count2() {
        $.getJSON('total_visitors2.php', function (data) {
           var items = new Array();
           $.each(data, function (key, val) {
               if ($('span#visitors_counter2').text() != val) {
                 $('span#visitors_counter2').fadeOut(400, function () {
                     $('span#visitors_counter2').text(val);
                 });
                 $('span#visitors_counter2').fadeIn(400);
               };
           });
        });
    };

    function update_visitor_count3() {
        $.getJSON('total_visitors3.php', function (data) {
           var items = new Array();
           $.each(data, function (key, val) {
               if ($('span#visitors_counter3').text() != val) {
                 $('span#visitors_counter3').fadeOut(400, function () {
                     $('span#visitors_counter3').text(val);
                 });
                 $('span#visitors_counter3').fadeIn(400);
               };
           });
        });
    };

    update_client_count();
    update_visitor_count1();
    update_visitor_count2();
    update_visitor_count3();
    timeoutid_client = setInterval(update_client_count, 5000);
    timeoutid_visitors1 = setInterval(update_visitor_count1, 12000);
    timeoutid_visitors2 = setInterval(update_visitor_count2, 12000);
    timeoutid_visitors3 = setInterval(update_visitor_count3, 12000);
});
</script>

<style>
  body {
    background: url("graablaa.png") no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    font-family: 'Fjalla One', serif;
    font-size: 80px;
    color: #ffffff;
  }

  #content {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%);
    width: 1200px;
    text-align: center;
  }

  #description {
    font-size: 20px;
  }

  #devices_counter1 {
    display: inline-block;
    width: 100px;
    text-align: right;
  }

  #visitors_counter1 {
    display: inline-block;
    width: 100px;
    text-align: right;
  }

  #visitors_counter2 {
    display: inline-block;
    width: 100px;
    text-align: right;
  }

  #visitors_counter3 {
    display: inline-block;
    width: 100px;
    text-align: right;
  }

  #visitors_counter4 {
    display: inline-block;
    width: 100px;
    text-align: right;
  }

  #visitors_counter5 {
    display: inline-block;
    width: 100px;
    text-align: right;
  }

  #visitors_counter6 {
    display: inline-block;
    width: 100px;
    text-align: right;
  }

</style>

<title>ciscoconnectconecto</title>
</head>

<body>
<div id="content">
<div id="total_devices_container">
  Unikke enheder: <span id="devices_counter"></span>
</div>
<div id="unique_visitors_container">
  Statiske klienter pr. AP:<br />
  AP1<span id="visitors_counter1"></span><br />
  AP2<span id="visitors_counter2"></span><br />
  AP3<span id="visitors_counter3"></span>
</div>
<div id="description">
  (Statiske klienter er defineret som to målinger på samme AP indenfor 180 sekunder med signalstyrke &gt; -65dBm)
</div>
</div>
</div>
</body>

</html>
