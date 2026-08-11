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

  <div class="">
    <div class="card-content d-flex" style="min-height: 140px">
      <div>
        
  </div>
    
    </div>
  </div>
  <div class="col l12 m12 s12 xs12 sales-report-section">
   <div class="responsive-table responsive-scroll" style="overflow-x: auto;">
        <table class="table invoice-data-table white pt-1" id="subscription-list" style="width: 400px;">
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
  

  </div>
  </section>


   <!-- Modal  -->
   <div id="modal-add-subscription" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="col s12 m12">
                <h4>Add month</h4>
       </div>
      <div class="container">
        <div class="row">
          <form id="form-save-subscription">
            @csrf
            <div class="col s12">
                <div class="input-field col s12">
                    <input type="text" class="month" name="month" id="month" required >
                      <label for="Description">Month</label>
                </div>
                <div class="input-field col s12">
                  <input type="number" class="year" name="year" id="year" required >
                    <label for="amount">Year</label>
                </div>
                <div class="input-field col s12">
                  <input type="number" class="amount" name="amount" id="amount" required >
                    <label for="amount">Amount</label>
                </div>
                <div class="input-field col s12">
                  <input type="text" class="link" name="link" id="link" required >
                    <label for="amount">Link</label>
                </div>
                <div class="input-field col s12">
                  <input type="text" class="note" name="note" id="note" required >
                    <label for="amount">Note</label>
                </div>
                <div class="buttons">
                  <button class="modal-action modal-close btn waves-effect waves-light right submit  float-right" type="button" id="" name="action" onclick="">Close</button>
                  <button class="btn waves-effect waves-light right submit mr-4" type="button" id="" name="action" onclick="saveSubscription()">Save</button>
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
        url: '/monthly-subscription-list/'+ dateToday,
        success: function (data) {
          $("#subscription-list").html(data.subscriptionHtml);
          // $("#expense-list").html(data.expenseHtml);
          // $("#grand-total").html(data.grandTotalHtml);
          // $("#gcash-list").html(data.gCashHtml);
          // $("#cash-list").html(data.cashHtml);
          // $("#monthly-list").html(data.totalMonthlyHtml);
          // $("#weekly-list").html(data.totalWeeklyHtml);
          // console.log(data.gCashHtml[0]);
          // if(data.gCashHtml[0] !== "") {
          //   $("#gcash-list").css("margin-bottom", "25px");
          // }
          // $("#credit-list").html(data.creditHtml);
          // if(data.creditHtml[0] !== "") {
          //   $("#credit-list").css("margin-bottom", "25px");
          // }
          // $("#debit-list").html(data.debitHtml);
          // if(data.debitHtml[0] !== "") {
          //   $("#debit-list").css("margin-bottom", "25px");
          // }
          // $("#btransfer-list").html(data.btranferHtml);
          // if(data.btranferHtml[0] !== "") {
          //   $("#btransfer-list").css("margin-bottom", "25px");
          // }
          // $("#cheque-list").html(data.chequeHtml);
          // if(data.chequeHtml[0] !== "") {
          //   $("#cheque-list").css("margin-bottom", "25px");
          // } 
          // if(data.expenseHtml[0] !== "") {
          //   $("#expense-list").css("margin-bottom", "25px");
          // } 
          // if(data.cashHtml[0] !== "") {
          //   $("#cash-list").css("margin-bottom", "25px");
          // } 
          // if (data.userType == '1') {
          //   $(".btn-hide-sales").removeClass("d-none");
          // }

          
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

 

    


  function saveSubscription() {
  // $('#modal-drawng').modal('open');
      $.ajax({
        type: "get",
        url: '/save-subscription/',
        data:  $("#form-save-subscription").serialize(),
        success: function (data) {
          console.log(data.drawing.drawing_link);
          $('#modal-add-subscription').modal('close');
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data.success);

        },
      });
    }


    function completeSubscription(id) {
  // $('#modal-drawng').modal('open');
      $.ajax({
        type: "get",
        url: '/complete-subscription/'+id,
        data:  $("#form-save-subscription").serialize(),
        success: function (data) {
          if(data.status == 'success') {
            $(".card-alert.card.green").removeClass("hide");
          $(".card-alert.card.green p").html("Monthly subscription paid!");
          setTimeout(function(){ 
          $(".card-alert.card.green").addClass("hide");
          location.reload();
          }, 3000);
          }
         
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data.success);

        },
      });
    }

</script>