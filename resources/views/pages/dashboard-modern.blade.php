{{-- layout extend --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Dashboard ')

{{-- vendor styles --}}
@section('vendor-style')
<style type="text/css">
    .btn-floating.amber, .btn-floating.green, .btn-floating.blue {
         visibility: hidden;
    }
	.waves-effect.waves-block.waves-light.profile-button {
		height: 64px;
      padding-top: 7px;
   
}
   waves-effect.waves-block.waves-light.profile-button {
    height: 64px;
    padding-top: 18px !important;
}
.note-orange {
    border: 1px solid orange;
    background-color: orange;
    padding: 4px 6px;
    color: #ffffff;
    font-size: 15px;
    width: auto !important;
    text-align: center;
    border-radius: 10px;
}
.note-green {
    border: 1px solid green;
    background-color: green;
    padding: 4px 6px;
    color: #ffffff;
    font-size: 15px;
    width: auto !important;
    text-align: center;
    border-radius: 10px;
}
.note-red {
    border: 1px solid #e61002;
    background-color: #e61002;
    padding: 4px 6px;
    color: #ffffff;
    font-size: 15px;
    width: auto !important;
    text-align: center;
    border-radius: 10px;
}
.tbl-bday .collection.with-header .collection-item {
    padding-left: 5px !important;
    padding: 2px 5px !important;
}
.appointment-dashboard-card { overflow: hidden; border-radius: 10px; }
.appointment-dashboard-header { padding: 18px 22px; display: flex; align-items: center; justify-content: space-between; gap: 18px; color: #000000; background: #a28e85; }
.appointment-dashboard-header h5 { margin: 0; color: #000000; font-size: 19px; }
.appointment-dashboard-header p { margin: 4px 0 0; color: #000000; font-size: 12px; opacity: .72; }
.appointment-count { min-width: 46px; height: 46px; padding: 0 10px; display: inline-flex; align-items: center; justify-content: center; border: 1px solid #000000; border-radius: 23px; color: #000000; background: #eee9e3; font-size: 18px; font-weight: 800; }
.appointment-dashboard-body { padding: 5px 20px 14px; }
.appointment-dashboard-row { padding: 14px 3px; display: grid; grid-template-columns: minmax(190px, 1.1fr) minmax(150px, .8fr) minmax(170px, .8fr) minmax(150px, .8fr); gap: 18px; align-items: center; border-bottom: 1px solid #a28e85; }
.appointment-dashboard-row:last-child { border-bottom: 0; }
.appointment-patient-name { margin: 0; color: #000000; font-weight: 700; }
.appointment-meta, .appointment-contact { margin: 3px 0 0; color: #000000; font-size: 11px; opacity: .66; }
.appointment-date { color: #000000; font-weight: 700; }
.appointment-time { display: block; margin-top: 3px; color: #000000; font-size: 12px; font-weight: 700; }
.appointment-reason { color: #000000; font-size: 12px; }
.appointment-today { width: fit-content; padding: 4px 9px; border-radius: 12px; color: #000000; background: #a28e85; font-size: 9px; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; }
.appointment-empty { padding: 28px 10px; color: #000000; text-align: center; opacity: .65; }
.appointment-actions { margin-top: 8px; display: flex; flex-wrap: wrap; gap: 6px; }
.appointment-actions form { margin: 0; }
.appointment-action { min-height: 28px; padding: 0 10px; display: inline-flex; align-items: center; border: 1px solid #a28e85; border-radius: 6px; color: #000000; background: #ffffff; font-size: 10px; font-weight: 800; line-height: 1; cursor: pointer; }
.appointment-action:hover { color: #000000; border-color: #000000; background: #a28e85; }
.appointment-action-create { color: #000000; border-color: #a28e85; background: #eee9e3; }
.appointment-action-view { color: #000000; border-color: #000000; background: #a28e85; }
.booking-dashboard-success { margin-bottom: 18px; padding: 13px 17px; border: 1px solid #a28e85; border-radius: 8px; color: #000000; background: #eee9e3; }
@media (max-width: 700px) {
   .appointment-dashboard-row { grid-template-columns: 1fr 1fr; gap: 10px; }
   .appointment-dashboard-header { align-items: flex-start; }
   .appointment-dashboard-body { padding-inline: 13px; }
}
</style>
<link rel="stylesheet" type="text/css" href="{{asset('vendors/animate-css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/chartist-js/chartist.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/chartist-js/chartist-plugin-tooltip.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-modern.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/intro.css')}}">
@endsection


{{-- page content --}}
@section('content')
@if(session('booking_success'))
<div class='booking-dashboard-success'>{{ session('booking_success') }} @if(session('created_patient_id'))<a href='/patient/{{ session('created_patient_id') }}'><u>View patient record</u></a>@endif</div>
@endif
<div class='row'>
   <div class='col s12'>
      <div class='card appointment-dashboard-card animate fadeUp'>
         <div class='appointment-dashboard-header'>
            <div>
               <h5>Upcoming Online Reservations</h5>
               <p>New public bookings appear here automatically. {{ $pageConfigs['appointmentsTodayCount'] }} scheduled today.</p>
            </div>
            <div style='display:flex;align-items:center;gap:12px;'>
               <a href='{{ route('appointments.index') }}' target='_blank' rel='noopener' style='color:#000000;font-size:12px;font-weight:700;'>Open booking page</a>
               <span class='appointment-count'>{{ count($pageConfigs['upcomingAppointments']) }}</span>
            </div>
         </div>
         <div class='appointment-dashboard-body'>
            @forelse($pageConfigs['upcomingAppointments'] as $appointment)
               <div class='appointment-dashboard-row'>
                  <div>
                     <p class='appointment-patient-name'>{{ $appointment->first_name }} {{ $appointment->last_name }}</p>
                     <p class='appointment-contact'>{{ $appointment->phone }} &middot; {{ $appointment->email }}</p>
                  </div>
                  <div>
                     <span class='appointment-date'>{{ $appointment->displayDate }}</span>
                     <span class='appointment-time'>{{ $appointment->displayTime }} &ndash; {{ date('g:i A', strtotime($appointment->appointment_time . ' +1 hour')) }}</span>
                  </div>
                  <div class='appointment-reason'>{{ $appointment->reason }}</div>
                  <div>
                     @if($appointment->isToday)<span class='appointment-today'>Today</span>@endif
                     <p class='appointment-meta'>Reserved {{ date('M j, g:i A', strtotime($appointment->created_at)) }}</p>
                     <div class='appointment-actions'>
                        <a class='appointment-action' href='{{ route('dashboard.appointments.edit', $appointment->id) }}'>Edit booking</a>
                        @if($appointment->patient_id)
                           <a class='appointment-action appointment-action-view' href='/patient/{{ $appointment->patient_id }}'>View patient</a>
                        @else
                           <form method='POST' action='{{ route('dashboard.appointments.create-patient', $appointment->id) }}' onsubmit='return confirm(&quot;Create a new patient record from this booking?&quot;)'>
                              @csrf
                              <button class='appointment-action appointment-action-create' type='submit'>Create patient record</button>
                           </form>
                        @endif
                     </div>
                  </div>
               </div>
            @empty
               <div class='appointment-empty'>No upcoming online reservations yet.</div>
            @endforelse
         </div>
      </div>
   </div>
</div>
<div class="seaction fadeLeft">
   <!--Line Chart-->
   <!-- <div id="chartjs-line-chart" class="card col s12 m8 " >
      <div class="card-content">
         <h4 class="card-title">Daily Sales </h4>
      
         <div class="row">
            <div class="col s12">
               <div class="sample-chart-wrapper"><canvas id="line-chart" height="400" width="980"></canvas></div>
            </div>
         </div>
      </div>
   </div> -->
   <div class="row vertical-modern-dashboard">
      <div class="col s12 m6 l6 dash-side">
         <!-- Current Balance -->
            <div class="col s12 m12 l12">
               <div id="weekly-earning" class="card animate fadeUp">
                  <div class="card-content"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                     <h4 class="header m-0">Today <i class="material-icons right grey-text lighten-3">more_vert</i></h4>
                     <p class="no-margin grey-text lighten-3 medium-small"><?php echo date('F j, Y (l)'); ?></p>
                     <h3 class="header text-center">{{number_format($pageConfigs['total_sales'])}} <i class="material-icons deep-orange-text text-accent-2">arrow_upward</i>
                     </h3>
                     <!-- <canvas id="monthlyEarning" class="chartjs-render-monitor" height="124" width="382" style="display: block; width: 382px; height: 124px;"></canvas> -->
                     <div class="center-align">
                        <a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange gradient-shadow m-1" href="/sales-report">View
                           Full</a>
                     </div>
                  </div>
               </div>
            </div>

                   <div class="col s12 m12 l12 ">
               <ul id="task-card" class="collection with-header animate fadeLeft">
                  <li class="collection-header pink">
                     <h5 class="task-card-title mb-3">Follow up <span style="font-size: 16px;">(Next 3 days)</span></h5>
                  </li>
                  @if($pageConfigs['followUp'])
                  @foreach($pageConfigs['followUp'] as $key => $data)
                        <li class="collection-item dismissable dash">
                           <a href="/patient/{{$data->patient_id}}">
                              <div class="row mt-2 mb-2">
                                 <div class="col s2 mb-2 pr-0 circle">
                                 @if($data->profilePictureLink == '')
                                    <div class="responsive-img patient-img circle z-depth-2" style="background-image: url('/images/profile-placeholder.png');background-position: center;background-repeat: no-repeat;background-size: cover;height: 45px;width: 45px;resize:both;">
                                    </div>
                                 @else
                                    <div class="responsive-img patient-img circle z-depth-2" style="background-image: url('{{$data->profilePictureLink}}');background-position: center;background-repeat: no-repeat;background-size: cover;height: 45px;width: auto;max-width: 45px;resize:both;">
                                    </div>
                                 @endif
                                 </div>
                                 <div class="col s5">
                                    <p class="mt-0 patient-name">{{$data->firstName}} {{$data->lastName}}</p>
                                    <p class="mt-0" style="color: black">{{$data->recall_note}}</p>
                                 </div>

                                    <div class="col s5 text-right">
                                    <p class="mt-0 patient-name">{{$data->birthDay}}</p>
                                    <span class="secondary-content"><span class="ultra-small">{!!$data->bdayStatus!!} </span></span><br>
                                 </div>
                                 
                              
                              </div>
                           </a>
                        </li>
                  @endforeach
                  @else 
                         <li class="collection-item dismissable dash">
                           <h5 style="font-size: 16px;text-align:center;">No data Available</h5>
                        </li>
                  @endif
                  <li class="collection-item dismissable">
                     <div class="center-align m-1">
                     </div>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col s12 m6 l6 dash-side">
            <div class="col s12 m12 l12 mobile-hide">
               <ul id="task-card" class="collection with-header animate fadeLeft">
                  <li class="collection-header pink">
                     <h5 class="task-card-title mb-3">Latest Patient</h5>
                  </li>
                  @foreach($pageConfigs['latestPatient'] as $key => $data)
                     <li class="collection-item dismissable dash">
                        <a href="/patient/{{$data->id}}">
                           <div class="row mt-2">
                              <div class="col s2 mb-2 pr-0 circle">
                              @if($data->profilePictureLink == '')
                                 <div class="responsive-img patient-img circle z-depth-2" style="background-image: url('/images/profile-placeholder.png');background-position: center;background-repeat: no-repeat;background-size: cover;height: 45px;width: 45px;resize:both;">
                                 </div>
                              @else
                                 <div class="responsive-img patient-img circle z-depth-2" style="background-image: url('{{$data->profilePictureLink}}');background-position: center;background-repeat: no-repeat;background-size: cover;height: 45px;width: auto;max-width: 45px;resize:both;">
                                 </div>
                              @endif
                              </div>
                              <div class="col s6">
                                 <p class="mt-0 patient-name">{{$data->firstName}} {{$data->lastName}}</p>
                              </div>
                              <div class="col s4">
                                 <span class="secondary-content"><span class="ultra-small">{{$data->timeAgo}} </span></span>
                              </div>
                           </div>
                        </a>
                     </li>
                  @endforeach
                  <li class="collection-item dismissable">
                     <div class="center-align m-1">
                        <a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange gradient-shadow" href="/patient-records">View More</a>
                     </div>
                  </li>
               </ul>
            </div>
      </div>
           <div class="col s12 m6 l6 dash-side">
         </div>

       <div class="col s12 m6 l6 dash-side">
            <div class="col s12 m12 l12 ">
               <ul id="task-card" class="collection with-header animate fadeLeft">
                  <li class="collection-header pink">
                     <h5 class="task-card-title mb-3">Birthday Celebrator</h5>
                  </li>
                  @foreach($pageConfigs['birthDaCelebrant'] as $v => $data)
                  @if($data->count == true)
                     <li class="collection-item dismissable dash">
                        <a href="/patient/{{$data->id}}">
                           <div class="row mt-2 mb-2">
                              <div class="col s2 mb-2 pr-0 circle">
                              @if($data->profilePictureLink == '')
                                 <div class="responsive-img patient-img circle z-depth-2" style="background-image: url('/images/profile-placeholder.png');background-position: center;background-repeat: no-repeat;background-size: cover;height: 45px;width: 45px;resize:both;">
                                 </div>
                              @else
                                 <div class="responsive-img patient-img circle z-depth-2" style="background-image: url('{{$data->profilePictureLink}}');background-position: center;background-repeat: no-repeat;background-size: cover;height: 45px;width: auto;max-width: 45px;resize:both;">
                                 </div>
                              @endif
                              </div>
                              <div class="col s5">
                                 <p class="mt-0 patient-name">{{$data->firstName}} {{$data->lastName}} </p>
                              </div>

                                  <div class="col s5 text-right">
                                 <p class="mt-0 patient-name">{{$data->birthDay}}</p>
                                   <span class="secondary-content"><span class="ultra-small">{!!$data->bdayStatus!!} </span></span><br>
                              </div>
                              
                             
                           </div>
                        </a>
                     </li>
                      @endif
                      
                  @endforeach
                  <li class="collection-item dismissable">
                     <div class="center-align m-1">
                     </div>
                  </li>
               </ul>
            </div>

     
      </div>


      
       <div class="col s12 m6 l6 dash-side">
            
      </div>

      <div class="col s12 m6 l12 d-none mobile-show">
               <ul id="task-card" class="collection with-header animate fadeLeft">
                  <li class="collection-header pink">
                     <h5 class="task-card-title mb-3">Latest Patient</h5>
                  </li>
                  @foreach($pageConfigs['latestPatient'] as $key => $data)
                     <li class="collection-item dismissable dash">
                        <a href="/patient/{{$data->id}}">
                           <div class="row mt-2">
                              <div class="col s2 mb-2 pr-0 circle">
                              @if($data->profilePictureLink == '')
                                 <div class="responsive-img patient-img circle z-depth-2" style="background-image: url('/images/profile-placeholder.png');background-position: center;background-repeat: no-repeat;background-size: cover;height: 45px;width: 45px;resize:both;">
                                 </div>
                              @else
                                 <div class="responsive-img patient-img circle z-depth-2" style="background-image: url('{{$data->profilePictureLink}}');background-position: center;background-repeat: no-repeat;background-size: cover;height: 45px;width: auto;max-width: 45px;resize:both;">
                                 </div>
                              @endif
                              </div>
                              <div class="col s6">
                                 <p class="mt-0 patient-name">{{$data->firstName}} {{$data->lastName}}</p>
                                 <!-- <p class="m-0 grey-text lighten-3">{{$data->occupation}}</p> -->
                              </div>
                              <div class="col s4">
                                 <span class="secondary-content"><span class="ultra-small">{{$data->timeAgo}} </span></span>
                              </div>
                           </div>
                        </a>
                     </li>
                  @endforeach
                  <li class="collection-item dismissable">
                     <div class="center-align m-1">
                        <a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange gradient-shadow" href="/patient-records">View More</a>
                     </div>
                  </li>
               </ul>
            </div>
   </div>

</div>
<!-- <div id="modal-view-warning" class="sm modal" style="display: block;z-index: 9999999;">
        <div class="modal-content">
        <h6 class="color-red">Final Reminder!</h6>
          <div class="program-content">
            Your Website will shutdown in<br>
            <span style="font-size: 25px;"><span id="demo"></span></span>

            <br> Please settle your bills.
          </div>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action close-warning modal-close waves-effect waves-green btn-flat">close</a>
        </div>
      </div> -->
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/chartjs/chart.min.js')}}"></script>
<!-- <script src="{{asset('vendors/chartist-js/chartist.min.js')}}"></script>
<script src="{{asset('vendors/chartist-js/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('vendors/chartist-js/chartist-plugin-fill-donut.min.js')}}"></script> -->
@endsection

{{-- page scripts --}}
@section('page-script')
<script src="{{asset('js/scripts/dashboard-modern.js')}}"></script>
<!-- <script src="{{asset('js/scripts/intro.js')}}"></script> -->
<script type="text/javascript">
$( document ).ready(function() {

   $( ".close-warning" ).click(function() {
    $('#modal-view-warning').css('display', 'none');
  });

  
   $("body").addClass("dashboard-page");
   $(window).scroll(function() {
    if (document.body.scrollTop >5 || document.documentElement.scrollTop > 5) {
      $(".navbar-main.gradient-45deg-indigo-purple").addClass("bg-change-nav");
      } else {
        $(".navbar-main.gradient-45deg-indigo-purple").removeClass("bg-change-nav");
      }
    });

   var isiPad = navigator.userAgent.indexOf('iPad') != -1;
  var ua = navigator.userAgent;
  var isiPad = /iPad/i.test(ua);
  if (isiPad) {
  $(window).on('load orientationchange', function(event) {
      if(window.innerHeight > window.innerWidth){
        $(".leftside-navigation").css("overflow", "scroll");
        $(".leftside-navigation").css("transform", " translateX(-105%)");
        $(".leftside-navigation").css("-webkit-transform", " translateX(-105%)");
      } else {
        $(".leftside-navigation").css("overflow", "scroll");
        $(".leftside-navigation").css("transform", " translateX(0%)");
        $(".leftside-navigation").css("-webkit-transform", " translateX(0%)");
      }
  });
  }
$(".waves-light.profile-button").addClass("pt-0");

if( {{number_format($pageConfigs['userType'])}} > '1') {
   $(".menu-monthly-subs").css("display", "none");
}

});
// /*
// * ChartJS - Chart
// */

// Line chart
// ------------------------------
$(window).on("load", function() {
    //Get the context of the Chart canvas element we want to select
    var ctx = $("#line-chart");
 
    // Chart Options
    var chartOptions = {
       responsive: true,
       maintainAspectRatio: false,
       label: false,
       legend: {
          position: "bottom"
       },
       hover: {
          mode: "label"
       },
       scales: {
          xAxes: [
             {
                display: true,
                gridLines: {
                   color: "#f3f3f3",
                   drawTicks: false
                },
                scaleLabel: {
                   display: true,
                   labelString: "Month"
                }
             }
          ],
          yAxes: [
             {
                display: true,
                gridLines: {
                   color: "#f3f3f3",
                   drawTicks: false
                },
                scaleLabel: {
                   display: true,
                   labelString: "Value"
                }
             }
          ]
       },
       title: {
          display: true,
          text: "Line Chart - Legend"
       }
    };
 
     var d0 = "<?php echo $pageConfigs['d0']?>";
     var d1 = "<?php echo $pageConfigs['d1']?>";
     var d2 = "<?php echo $pageConfigs['d2']?>";
     var d3 = "<?php echo $pageConfigs['d3']?>";
     var d4 = "<?php echo $pageConfigs['d4']?>";

     var dsales0 = "<?php echo $pageConfigs['totalDaily_sales0']?>";
     var dsales1 = "<?php echo $pageConfigs['totalDaily_sales1']?>";
     var dsales2 = "<?php echo $pageConfigs['totalDaily_sales2']?>";
     var dsales3 = "<?php echo $pageConfigs['totalDaily_sales3']?>";
     var dsales4 = "<?php echo $pageConfigs['totalDaily_sales4']?>";


    // Chart Data
    var chartData = {
      labels: [d4, d3, d2, d1, d0,],
       datasets: [
          {
             label: "Total Daily Sales",
             data: [dsales4, dsales3, dsales2, dsales1, dsales0],
             fill: false,
             borderColor: "#e91e63",
             pointBorderColor: "#e91e63",
             pointBackgroundColor: "#FFF",
             pointBorderWidth: 2,
             pointHoverBorderWidth: 2,
             pointRadius: 4
          },
 
       ]
    };
 
        var config = {
       type: "line",
 
       // Chart Options
       options: {
      legend: {display: false},
      maintainAspectRatio: false,
      responsive: true,
      responsiveAnimationDuration: 0,
      scales: {
        yAxes: [{
         display: false,
          ticks: {
            beginAtZero: true,
            callback: function(value, index, values) {
              if(parseInt(value) >= 1000){
                return '₱' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
              } else {
                return '₱' + value;
              }
            }
          }
        }]
      }
   },
       data: chartData
    };
 

    
    // Create the chart
    var lineChart = new Chart(ctx, config);
 
    
 
 
   
 });
 
 // Set the date we're counting down to
var countDownDate = new Date("May 6, 2025 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
 
</script>
@endsection
