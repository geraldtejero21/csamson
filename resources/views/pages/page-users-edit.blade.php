{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Users edit')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
@endsection
<style>
  .waves-effect.waves-block.waves-light.profile-button {
      height: 64px;
      padding-top: 18px !important;
  }
</style>
{{-- page content --}}
@section('content')
<!-- users edit start -->


<div class="section users-edit">
  <div class="card">
    <div class="card-content">
      <!-- <div class="card-body"> -->
      <!-- <ul class="tabs mb-2 row">
        <li class="tab">
          <a class="display-flex align-items-center active" id="account-tab" href="#account">
            <i class="material-icons mr-1">person_outline</i><span>Account</span>
          </a>
        </li>
        <li class="tab">
          <a class="display-flex align-items-center" id="information-tab" href="#information">
            <i class="material-icons mr-2">error_outline</i><span>Information</span>
          </a>
        </li>
      </ul> -->
      <div class=" mb-3"></div>
      <div class="row">
        <div class="col s12" id="account">
          <!-- users edit media object start -->
          <div class="media display-flex align-items-center mb-2">
            <a class="mr-2" href="#">
              <img src="{{asset('images/profile-placeholder.png')}}" alt="users avatar" class="z-depth-4 circle"
                height="64" width="64">
            </a>
            <div class="media-body">
              <h5 class="media-heading mt-0" id="users_name">{{$userData->name}}</h5>
              <!-- <div class="user-edit-btns display-flex">
                <a href="#" class="btn-small indigo">Change</a>
                <a href="#" class="btn-small btn-light-pink">Reset</a>
              </div> -->
            </div>
          </div>
          <!-- users edit media object ends -->
          <!-- users edit account form start -->
          <form id="accountForm">
          @csrf
            <div class="row">
              <div class="col s12 m6">
                <div class="row">
                  <div class="col s12 input-field">
                    <input id="name" name="name" type="text" class="validate" value="{{$userData->name}}"
                      data-error=".errorTxt2">
                    <label for="name">Name</label>
                    <small class="errorTxt2"></small>
                  </div>
                  <div class="col s12 input-field">
                    <input id="username" name="username" type="text" class="validate" value="{{$userData->username}}"
                      data-error=".errorTxt1">
                    <label for="username">Username</label>
                    <small class="errorTxt1"></small>
                  </div>
                  <div class="col s12 input-field">
                    <input id="password" name="password" type="password" class="validate" value="{{$userData->password}}"
                      data-error=".errorTxt3">
                    <label for="email">Password</label>
                    <small class="errorTxt3"></small>

                    <div class="media-body">
                    <div class="user-edit-btns display-flex">
                      <a href="#" class="btn-small indigo" onclick="changePassword()">Change</a>
                      <a href="#" class="btn-small btn-light-pink" onclick="resetPassword()">Reset</a>

                    </div>
                  </div>
                  </div>
                </div>
              </div>
              <div class="col s12 m6">
                <div class="row">
                  <div class="col s12 input-field">
                    <select name="type">
                      <option value="1" <?php echo (($userData->type == 1)? 'selected' : ''); ?>>Admin</option>
                      <option value="2" <?php echo (($userData->type == 2)? 'selected' : ''); ?>>Staff</option>
                    </select>
                    <label>Role</label>
                  </div>
                  <div class="col s12 input-field">
                    <select>
                      <option>Active</option>
                      <option>Banned</option>
                      <option>Close</option>
                    </select>
                    <label>Status</label>
                  </div>
                  <!-- <div class="col s12 input-field">
                    <input id="company" name="company" type="text" class="validate">
                    <label for="company">Company</label>
                  </div> -->
                </div>
              </div>
            
              <div class="col s12 display-flex justify-content-end mt-3">
                <button type="button" class="btn indigo mr-1" onclick="userSaveChanges({{$userData->id}})">
                  Save changes</button>
                  <a href="/page-users-list"><button type="button" class="btn btn-light">Cancel</button></a>
              </div>
            </div>
          </form>
          <!-- users edit account form ends -->
        </div>
     
      <!-- </div> -->
    </div>
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

<!-- Alerts -->
<div class="card-alert card warning red lighten-5 hide ">
  <div class="card-content red-text">
    <p></p>
  </div>
  <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
  </div>
</div>

<!-- users edit ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/jquery-validation/jquery.validate.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-script')
<script src="{{asset('js/scripts/page-users.js')}}"></script>
@endsection
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
  var pathArray = window.location.pathname.split('/');
  var user_id =  pathArray[2];

  function changePassword() {
   var passsword_input = document.getElementById("password").value;
    if(passsword_input !== "") {
    $.ajax({
          type: "POST",
          url: '/change-user-password/'+ user_id,
          data:  $("#accountForm").serialize(),
          success: function (data) {
            $(".card-alert.card.green").removeClass("hide");
            $(".card-alert.card.green p").html(data.message);
            setTimeout(function(){ 
            $(".card-alert.card.green").addClass("hide");
            }, 3000);
          },
          error: function (data, textStatus, errorThrown) {
              console.log(data.success);
          },
        });
    } else {
      $(".card-alert.card.warning").removeClass("hide");
          $(".card-alert.card.warning p").html("Please enter password!");
          setTimeout(function(){ 
          $(".card-alert.card.warning").addClass("hide");
          }, 3000);
    }
  }
 
 function resetPassword() {
  document.getElementById("password").value = "";
 }

 function userSaveChanges($user_id) {
  $.ajax({
          type: "POST",
          url: '/update-user/'+ user_id,
          data:  $("#accountForm").serialize(),
          success: function (data) {
            $("#users_name").html(data.name);
            $(".card-alert.card.green").removeClass("hide");
            $(".card-alert.card.green p").html(data.message);
            setTimeout(function(){ 
            $(".card-alert.card.green").addClass("hide");
            }, 3000);
          },
          error: function (data, textStatus, errorThrown) {
              console.log(data.success);
          },
        });
 }
</script>