{{-- layout extend --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Daily Patient Log')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/dataTables.checkboxes.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
        .input-icons i {
            /* position: absolute; */
            color: white;
        }
          
        .input-icons {
            width: 100%;
            /* margin-bottom: 10px; */
        }
          
        .icon {
          /* padding: 5px 0; */
           min-width: 7px;
        }
          
        .datepicker {
          background: transparent;
          padding: 14px;
          text-align: center;
          border: none;
          width: 63px;
          border-radius: 10px;
          color: transparent;
          font-size: 1px;
          background-image: url(/images/calendar_icon.png);
          background-size: 50%;
          background-repeat: no-repeat;
          background-position: center;
        }
        th {
          border-radius: 0 !important;
        }
        .fixed-action-btn {
          display: none;
        }
         .waves-effect.waves-block.waves-light.profile-button {
      height: 64px;
      padding-top: 18px !important;
  }
        /* .waves-effect.waves-block.waves-light.profile-button {
            height: 64px;
            padding-top: 18px !important;
          } */
    </style>
@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-invoice.css')}}">
@endsection

{{-- page content --}}
@section('content')
<!-- invoice list -->
<section class="invoice-list-wrapper section">
<div style="bottom: 50px; right: 19px;" class="fixed-action-btn direction-top"><a
        class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow"><i
            class="material-icons">add</i></a>
      <ul>
         <li><a href="{{asset('add-patient')}}" class="btn-floating red"><i class="material-icons">airline_seat_flat_angled</i></a>
         </li>
      </ul>
   </div>
  <!-- create invoice button-->
  <!-- Options and filter dropdown button-->

  <div class="card">
    <div class="card-content d-flex">
      <p class="caption mb-0"><h6 class="display-date"><?php echo date("l F d, Y "); ?></h6></p>
    
      <div>
        <div class="input-icons"  onchange="changeDate()">
            <input style="" type="button" class="datepicker" id="selected-date" name="date" required="" value=" ">
        </div>
  </div>
    
    </div>
  </div>
  <div class="col l8 m8 s8 xs12 sales-report-section">
   <div class="responsive-table">
        <table class="table invoice-data-table white pt-1" id="report-list">
        </table>
      </div>
    <div class="responsive-table"  style="margin-top: 25px;">
      <table class="table invoice-data-table white pt-1" id="cash-list">
      </table>
    </div>
    <!-- <div class="responsive-table invoice-list-wrapper" style="margin-top: 25px;">
      <table class="table invoice-data-table white pt-1" id="grand-total">
      </table>
    </div> -->

    <span  class="btn-hide-sales waves-effect waves-light mr-1 float-right d-none" onclick="showSales('show')"><i class="material-icons">expand_more</i></span>


    <div class="responsive-table"  style="margin-top: 25px;">
      <table class="table invoice-data-table white pt-1 d-none" id="weekly-list">
      </table>
    </div>
    
    <div class="responsive-table"  style="margin-top: 25px;">
      <table class="table invoice-data-table white pt-1 d-none" id="monthly-list">
      </table>
    </div>
    
   
  </div>
  <div class="col l4 m4 s4 xs12 sales-report-section">
    <div class="responsive-table">
      <table class="table invoice-data-table white pt-1" id="gcash-list">
      </table>
    </div>

    <div class="responsive-table">
      <table class="table invoice-data-table white pt-1" id="debit-list">
      </table>
    </div>

    <div class="responsive-table">
      <table class="table invoice-data-table white pt-1" id="credit-list">
      </table>
    </div>

    <div class="responsive-table">
      <table class="table invoice-data-table white pt-1" id="btransfer-list">
      </table>
    </div>

    <div class="responsive-table">
      <table class="table invoice-data-table white pt-1" id="cheque-list">
      </table>
    </div>

 


    <div class="responsive-table">
      <table class="table invoice-data-table white pt-1" id="expense-list">
      </table>
    </div>

  </div>
  </section>


   <!-- Modal  -->
   <div id="modal-add-expense" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="col s12 m12">
                <h4>Adding expense</h4>
       </div>
      <div class="container">
        <div class="row">
          <form id="form-save-expense">
            @csrf
            <div class="col s12">
                <div class="input-field col s12">
                    <input type="text" class="description" name="description" id="description" required >
                      <label for="Description">Description</label>
                </div>
                <div class="input-field col s12">
                  <input type="number" class="amount" name="amount" id="amount" required >
                    <label for="amount">Amount</label>
                </div>

                <div class="buttons">
                  <button class="modal-action modal-close btn waves-effect waves-light right submit  float-right" type="button" id="" name="action" onclick="">Close</button>
                  <button class="btn waves-effect waves-light right submit mr-4" type="button" id="" name="action" onclick="saveExpense()">Save</button>
                </div>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal  -->
   <div id="modal-edit-expense" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="col s12 m12">
                <h4>Editing expense</h4>
       </div>
      <div class="container">
        <div class="row">
          <form id="form-edit-expense">
            <input type="hidden" class="expense_id" name="expense_id" id="expense-id" value="">
            @csrf
            <div class="col s12">
                <div class="input-field col s12">
                    <input type="text" class="edit-description" name="description" id="edit-description"  >
                      <label for="Description" class="add-active-desc active">Description</label>
                </div>
                <div class="input-field col s12">
                  <input type="number" class="edit-amount" name="amount" id="edit-amount"  >
                    <label for="amount" class="add-active-amount active">Amount</label>
                </div>
                <div class="buttons">
                  <button class="modal-action modal-close btn waves-effect waves-light right submit  float-right" type="button" id="" name="action" onclick="">Close</button>
                  <button class="btn waves-effect waves-light right submit mr-4" type="button" id="btn-do-save-expense" name="action" onclick="updatedExpense()">Save</button>
                </div>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>

      <!-- Modal -->
  <div id="modal-modify-expense" class="modal">
    <div class="modal-content">
      <div class="container">
        <div class="row">
              <div class="wrapper mb-5 signature">
                     <h4>What action do you want to do?</h4>
              </div>
          </div>
          <div class="modal-footer">
          <button class="btn waves-effect waves-light submit mr-2" type="submit" id="submit-remove-expense" name="action" onclick="">Remove
          </button>
          <button class="btn waves-effect waves-light right submit" type="submit" id="submit-edit-expense" name="action" onclick="">Edit
          </button>
         
        </div>
        </div>
    </div>
  </div>


  <!-- Alerts -->
  <div class="card-alert card red lighten-5 hide">
    <div class="card-content red-text">
      <p></p>
    </div>
    <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
    </div>
  </div>

    <!-- Alerts -->
    <div class="card-alert card green lighten-5 hide">
    <div class="card-content green-text">
      <p></p>
    </div>
    <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
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
<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/js/datatables.checkboxes.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-script')
<script src="{{asset('js/scripts/advance-ui-modals.js')}}"></script>
@endsection

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {

  $( ".close-warning" ).click(function() {
    $('#modal-view-warning').css('display', 'none');
  });

  if( {{number_format($userType)}} > '1') {
    $(".menu-monthly-subs").css("display", "none");
  }
  $("body").addClass("sales-page");
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
    $( ".datepicker" ).datepicker({
    dateFormat: "mm-dd-yy"
  });

  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();

  dateToday = yyyy+ '-' +mm + '-' + dd;

  $.ajax({
        type: "GET",
        url: '/sales-report-list/'+ dateToday,
        success: function (data) {
          $("#report-list").html(data.treatHtml);
          $("#expense-list").html(data.expenseHtml);
          $("#grand-total").html(data.grandTotalHtml);
          $("#gcash-list").html(data.gCashHtml);
          $("#cash-list").html(data.cashHtml);
          $("#monthly-list").html(data.totalMonthlyHtml);
          $("#weekly-list").html(data.totalWeeklyHtml);
          console.log(data.gCashHtml[0]);
          if(data.gCashHtml[0] !== "") {
            $("#gcash-list").css("margin-bottom", "25px");
          }
          $("#credit-list").html(data.creditHtml);
          if(data.creditHtml[0] !== "") {
            $("#credit-list").css("margin-bottom", "25px");
          }
          $("#debit-list").html(data.debitHtml);
          if(data.debitHtml[0] !== "") {
            $("#debit-list").css("margin-bottom", "25px");
          }
          $("#btransfer-list").html(data.btranferHtml);
          if(data.btranferHtml[0] !== "") {
            $("#btransfer-list").css("margin-bottom", "25px");
          }
          $("#cheque-list").html(data.chequeHtml);
          if(data.chequeHtml[0] !== "") {
            $("#cheque-list").css("margin-bottom", "25px");
          } 
          if(data.expenseHtml[0] !== "") {
            $("#expense-list").css("margin-bottom", "25px");
          } 
          if(data.cashHtml[0] !== "") {
            $("#cash-list").css("margin-bottom", "25px");
          } 
          if (data.userType == '1') {
            $(".btn-hide-sales").removeClass("d-none");
          }

          
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data.success);

        },
      });
    
    });

    function modifyExpense(expense_id) {
      $('#modal-modify-expense').modal('open');
      $("#submit-remove-expense").attr('onclick', "removeExpense("+expense_id+")");
      $("#submit-edit-expense").attr('onclick', "editExpense("+expense_id+")");

      $("#submit-edit-patient-treatment-record").attr("onclick", "editProcedureRecordProcess("+expense_id+")");
    }

    function changeDate() {
      var yr = document.getElementsByClassName('year-text')[0].innerHTML;
      var getDate = document.getElementsByClassName('date-text')[0].innerHTML;
     $(".display-date").html(getDate +", "+ yr);
     var selected_date = document.getElementById("selected-date").value; 
     var selected_date = selected_date.replaceAll('/', '-');

     const dateArray = selected_date.split("-");
     var finalDate = dateArray[2]+"-"+dateArray[0]+"-"+dateArray[1];
     console.log(dateArray);
      $.ajax({
          type: "GET",
          url: '/sales-report-list/'+finalDate,
          success: function (data) {
            $("#report-list").html(data.treatHtml);
            $("#expense-list").html(data.expenseHtml);
            $("#grand-total").html(data.grandTotalHtml);
            $("#gcash-list").html(data.gCashHtml);
            $("#monthly-list").html(data.totalMonthlyHtml);
            $("#weekly-list").html(data.totalWeeklyHtml);
            $("#cash-list").html(data.cashHtml);
            $("#credit-list").html(data.creditHtml);
            $("#debit-list").html(data.debitHtml);
            $("#btransfer-list").html(data.btranferHtml);
            $("#cheque-list").html(data.chequeHtml);
          },
          error: function (data, textStatus, errorThrown) {
              console.log(data.success);
          },
        });
    }

    function saveExpense() {

      var dateToday = document.getElementById("selected-date").value; 
      if(dateToday !== " ") {
        dateToday
       var finalDate = dateToday.replaceAll("/", "-");
      } else {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        finalDate = yyyy + '-' + mm + '-' + dd;
      }
       var description = document.getElementById("description").value; 
       var amount = document.getElementById("amount").value; 

       if(description == "" || amount == "") {
          $(".card-alert.card.red").removeClass("hide");
          if(description == "") {
            $(".card-alert.card.red p").html("Description is required!");
          } else {
            $(".card-alert.card.red p").html("Amount is required!");
          }
          setTimeout(function(){ 
          $(".card-alert.card.red").addClass("hide");
          const url = new URL(window.location.href);
          url.searchParams.delete('upload_status');
          window.history.replaceState(null, null, url); // or pushState
          }, 3000);
       } else {
        $.ajax({
          type: "GET",
          url: '/save-expense/'+finalDate,
          data:  $("#form-save-expense").serialize(),
          success: function (data) {
           $("#modal-add-expense").modal('close');
            $.ajax({
                type: "GET",
                url: '/sales-report-list/'+ finalDate,
                success: function (data) {
                  $("#report-list").html(data.treatHtml);
                  $("#expense-list").html(data.expenseHtml);
                  $("#grand-total").html(data.grandTotalHtml);

                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data.success);

                },
              });
          },
          error: function (data, textStatus, errorThrown) {
              console.log(data.success);
          },
        });

        document.getElementById("form-save-expense").reset();

       }
    
    }

    function acitonExpense() {
        $(".action-btn").removeClass("d-none");
        $(".btn-actions").addClass("active");

        
    }

    function showSales(status) {
      if(status == 'show') {
        $(".btn-hide-sales").attr('onclick', "showSales('hide')");
        $("#weekly-list").removeClass("d-none");
        $("#monthly-list").removeClass("d-none");
        $(".btn-hide-sales").html('<i class="material-icons">expand_less</i>');

        
      } else {
        $(".btn-hide-sales").attr('onclick', "showSales('show')");
        $("#weekly-list").addClass("d-none");
      $("#monthly-list").addClass("d-none");
      $(".btn-hide-sales").html('<i class="material-icons">expand_more</i>');
      }
    }

    function editExpense(expense_id) {
        $("#modal-edit-expense").modal("open");
        $("#modal-modify-expense").modal("close");
        $("#btn-do-save-expense").attr('onclick', "updatedExpense("+expense_id+")");

        $.ajax({
          type: "GET",
          url: '/get-expense/'+expense_id,
          // data:  $("#form-save-expense").serialize(),
          success: function (data) {
            console.log(data.expenseData);
            
              document.getElementById("expense-id").value = expense_id; 
              document.getElementById("edit-description").value = data.expenseData.description; 
              document.getElementById("edit-amount").value = data.expenseData.amount; 
              $(".add-active-amount").addClass("active");
              $(".add-active-desc").addClass("active");
          },
          error: function (data, textStatus, errorThrown) {
              console.log(data.success);
          },
        });
        
    }

    function removeExpense(expense_id) {
      var dateToday = document.getElementById("selected-date").value; 
      if(dateToday !== " ") {
        dateToday
       var finalDate = dateToday.replaceAll("/", "-");
      } else {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        finalDate = yyyy + '-' + mm + '-' + dd;
      }

      $.ajax({
          type: "GET",
          url: '/remove-expense/'+expense_id,
          success: function (data) {
            $("#modal-modify-expense").modal("close");
            $.ajax({
              type: "GET",
              url: '/sales-report-list/'+ finalDate,
              success: function (data) {
                $("#report-list").html(data.treatHtml);
                $("#expense-list").html(data.expenseHtml);
                $("#grand-total").html(data.grandTotalHtml);
              },
              error: function (data, textStatus, errorThrown) {
                  console.log(data.success);

              },
            });
          },
          error: function (data, textStatus, errorThrown) {
              console.log(data.success);
          },
        });



    }

    function updatedExpense() {

      var dateToday = document.getElementById("selected-date").value; 
      if(dateToday !== " ") {
        dateToday
       var finalDate = dateToday.replaceAll("/", "-");
      } else {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        finalDate = yyyy + '-' + mm + '-' + dd;
      }
      const dateArray = finalDate.split("-");
      finalDate = +dateArray[0]+"-"+dateArray[1] +"-"+dateArray[2];

      console.log(finalDate);
      var id =  document.getElementById("expense-id").value;
      $.ajax({
          type: "GET",
          url: '/update-expense/'+id,
          data:  $("#form-edit-expense").serialize(),
          success: function (data) {
           $("#modal-add-expense").modal('close');
           $(".card-alert.card.green p").html(data.message);
            $.ajax({
                type: "GET",
                url: '/sales-report-list/'+ finalDate,
                success: function (data) {
                  $("#modal-edit-expense").modal('close');
                  $("#report-list").html(data.treatHtml);
                  $("#expense-list").html(data.expenseHtml);
                  $("#cash-list").html(data.cashHtml);
                  $("#grand-total").html(data.grandTotalHtml);

                  $(".card-alert.card.green").removeClass("hide");
                 

                  setTimeout(function(){ 
                  $(".card-alert.card.green").addClass("hide");
                  const url = new URL(window.location.href);
                  url.searchParams.delete('upload_status');
                  window.history.replaceState(null, null, url); // or pushState
                  }, 3000);

                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data.success);

                },
              });
          },
          error: function (data, textStatus, errorThrown) {
              console.log(data.success);
          },
        });
    }

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