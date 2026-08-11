{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Patient Records')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom/custom.css')); ?>">
<!-- <link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}"> -->
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/select.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/data-tables.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- <script type="text/javascript" src="https://keith-wood.name/js/jquery.signature.js"></script> -->

@endsection
<style type="text/css">
 .polygon {
  stroke: white;
  stroke-width: 2;
}
svg {
  padding-left: 7px;
}
.unmarked {
  fill: #ddd;
}
.marked {
  fill: grey;
}
#dental-chart {
  text-align: center;
}
#dental-chart td {
  text-align: center;
}
#view-dental-chart tr {
  border-bottom: none !important;
}
  .color-picker {
    display: flex;
    gap: 32px;
    background: #efefef;
    padding: 30px 8px 0;
    border-radius: 10px;
  }
  .color-picker input[type="radio"] {
    display: none; /* Hide default radio */
  }
  .color-picker label {
    width: 30px;
    height: 30px;
    border-radius: 70%;
    cursor: pointer;
    border: 2px solid #ddd;
    transition: transform 0.2s;
  }
  .color-picker input[type="radio"]:checked + label {
    border-color: #ffffff;
    transform: scale(1.2);
    box-shadow: 0 0 5px rgba(0,0,0,0.3);
  }
  /* Specific colors */
  label[for="red"] { background-color: #ff4d4d; }
  label[for="blue"] { background-color: #4d79ff; }
  label[for="green"] { background-color: #2ecc71; }



#view-dental-chart table td {
  text-align: center;
}
.color-bloack label, .color-bloack input{
  display: block;
  margin-bottom: 20px;
  margin-right: 60px;
}
.color-bloack label span{
  padding-left: 40px;
  display: block;
}
.color-bloack {
  margin-bottom: 20px;
}
.color-sub {

}
label[for="black"] {
  background-color: #000000;
}
.polygon.marked-black {
  fill: #000000;
}

label[for="red"] {
  background-color: red;
}
.polygon.marked-red {
  fill: red;
}

label[for="blue"] {
  background-color: blue;
}
.polygon.marked-blue {
  fill: blue;
}

label[for="default"] {
  background-color: #ddd;
}
.polygon.marked-default {
  fill: #ddd;
}

label[for="reset"] {
  background-color: #637682;
}
.polygon.marked-reset {
  fill: #637682;
}

label[for="attrition"] {
  background-color: #3f2d9c;
}
.polygon.marked-attrition {
  fill: #3f2d9c;
}

label[for="mobile2"] {
  background-color: #a70c0c;
}
.polygon.marked-mobile2 {
  fill: #a70c0c;
}

label[for="partially"] {
  background-color: #ab9f42;
}
.polygon.marked-partially {
  fill: #ab9f42;
}

label[for="extraction"] {
  background-color: #B027F5;
}
.polygon.marked-extraction {
  fill: #B027F5;
}

label[for="recurrent"] {
  background-color: #27F549;
}
.polygon.marked-recurrent {
  fill: #27F549;
}

label[for="filled"] {
  background-color: #0021cc;
}
.polygon.marked-filled {
  fill: #0021cc;
}

label[for="implant"] {
  background-color: #ffc107;
}
.polygon.marked-implant {
  fill: #ffc107;
}

label[for="crown"] {
  background-color: #56b50e;
}
.polygon.marked-crown {
  fill: #56b50e;
}

label[for="abrasion"] {
  background-color: #bd5b7d;
}
.polygon.marked-abrasion {
  fill: #bd5b7d;
}

label[for="impacted"] {
  background-color: #6b613f;
}
.polygon.marked-impacted {
  fill: #6b613f;
}

label[for="unerupted"] {
  background-color: #efdde0;
}
.polygon.marked-unerupted {
  fill: #efdde0;
}

label[for="root"] {
  background-color: #657981;
}
.polygon.marked-root {
  fill: #657981;
}


.chart-input td {
  padding: 2px 5px !important;
}





 /* /////////////////// */
  .waves-effect.waves-block.waves-light.profile-button {
      height: 64px;
      padding-top: 18px !important;
  }
    .navbar-list.right {
        position: relative;
        margin-top: -56px !important;
    }
 .bg-banner {
  background-image: url('https://sagundentalclinic.com/banner.jpg') ;
  height: 128px;
    width: 100%;
    background-size: 100%;
    background-repeat: no-repeat;

 }
 input[type='radio']:after {
      background-color: #ffffff !important;
}
#view-borderless-table .brown-text, .brown-text {
  color: #a28e85 !important;
}
.tabs .tab a {
  font-size: 18px !important;
}
label, div, label span {
  color: #000000 !important;
}

@media only screen and (max-width: 976px) {
  .header-label {
        padding-left: 24px !important;
  }
}

</style>
{{-- page content --}}
@section('content')
<div class="section section-data-tables">
  <!-- <div class="card">
    <div class="card-content">
      <p class="caption mb-0">This page is for patient</p>
    </div>
  </div> -->
  <div style="bottom: 50px; right: 19px;" class="fixed-action-btn direction-top"><a
        class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow"><i
            class="material-icons">add</i></a>
      <ul>
         <li><a href="{{asset('add-patient')}}" class="btn-floating red"><i class="material-icons">airline_seat_flat_angled</i></a>
         </li>
      </ul>
   </div>
  <!-- Multi Select -->
  @foreach($patientDataInfo as $key => $data)
  <div id="" class="">
          <div class="pt-2">
            <div class="row" id="patient-info">
           <form>
              <input type="hidden" name="newSigner" id="newSigner" value="" />
              <input type="hidden" name="relationshipToPatient" id="relationshipToPatient" value="" />
              <div class="col m4 s12">
                <div id="borderless-table" class="card card-tabs">
                  <div class="card-content" style="display: block;">
                    <div class="row">
                      <div class="col s12">
                        <h5>Patient Information</h5>
                      </div>
                      <div class="col s12 mb-5">
                        @if($data->profilePictureLink == '')
                        <div class="responsive-img patient-img circle res-image z-depth-2" style="background-image: url('/images/profile-placeholder.png');background-position: center;background-repeat: no-repeat;background-size: cover;height: 255px;width: auto;">
                        </div>
                        @else
                        <div class="responsive-img patient-img circle res-image z-depth-2" style="background-image: url('{{$data->profilePictureLink}}');background-position: center;background-repeat: no-repeat;background-size: cover;height: 255px;width: auto;max-width: 255px;">
                        </div>
                       @endif
                      </div>
                      <div class="col s12 mt-5">
                        <div class="input-field col s12 m12 ">
                          <a href="/patient/upload-image/{{$data->id}}">
                            <button class="btn mb-1 waves-effect waves-light mr-1 w-100" type="button" name="action">Upload</button>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col m8 s12">
               
                <div id="borderless-table" class="card card-tabs">
                    <div class="card-content">
                      <div id="view-borderless" class="active">
                        <div class="row">
                          <div class="col s12">
                            <a class="btn-floating waves-effect blue waves-light float-right" href="/edit-patient/{{$data->id}}">
                              <i class="material-icons">edit</i>
                            </a> 

                            @if($userType == '1')
                                <a class="btn-remove-patient-record waves-effect blue waves-light btn-floating mb-1 btn-small waves-effect waves-light mr-1 float-right modal-trigger"  id="remove-patient-record"  href="#modal-remove-patient-record" onclick="removePatientRecord({{$data->id}})">
                                  <i class="material-icons">clear</i>
                                </a> 
                                @else
                            
                              @endif


                            <h5>Name : <span id="firstName">{{$data->firstName}}</span>
                            <span id="middleName">{{$data->middleName}}</span>
                            @if($data->nickName > "")
                            <span>"</span><span id="nickName">{{$data->nickName}}</span><span>"</span>
                            @endif
                             <span id="lastName">{{$data->lastName}}</span></h5> 
                            
                            @if($medicalCondtionList > "")
                             <p><strong>Medical conditions: {{$medicalCondtionList}}</strong></p><br>
                            @endif

                            <p>Address : <span id="address">{{$data->address}}</span></p>

                            <p>Mobile Number: <span class="brown-text"><strong><span id="mobile">{{$data->mobile}}</span></strong></span></p>
                            <hr class="mb-5">
                          </div>
                          <div class="col s12">
                            <div class="row patient-detail-list">
                                <div class="col s12 m6">
                                 Birthday: <strong><span class="brown-text pl-5" id="birthdayNew"></span></strong>
                              </div>

                              <div class="col s12 m6">
                                 Age: <strong><span class="brown-text pl-5" id="">{{$age}}</span></strong>
                              </div>
                              <div class="col s12 m6">
                                 Sex: <strong><span class="brown-text capitalize pl-5" id="sex">{{$data->sex}}</span></strong>
                              </div>
                              <div class="col s12 m6">
                                Civil status: <strong><span class="brown-text pl-5" >{{$data->status}}</span></strong>
                              </div>
                              <div class="col s12 m6">
                                Occupation: <strong><span class="brown-text capitalize pl-5" id="occupation">{{$data->occupation}}</span></strong>
                              </div>
                              <div class="col s12 m12" style="padding: 0px 10px !important;">
                              <table>
                                <tr style="border-bottom: 0 !important">
                                  <td  style="font-size: 18px;width: 140px;">Referred by:</td>
                                  <td><strong><span class="brown-text" id="referredBy"  style="font-size: 18px;">{{$data->referredBy}}</span></strong></td>
                                </tr>
                                </table>
                              </div>
                              <div class="col s12 m12">
                                Incase of emergency, please contact: <strong><span class="brown-text capitalize pl-5" id="emergency">{{$data->emergency}}</span></strong>
                              </div>
                              <div class="col s12 m6">
                              Relationship: <strong><span class="brown-text capitalize pl-5" id="relationship">{{$data->relationship}}</span></strong>
                              </div>
                              <div class="col s12 m6">
                              Mobile No.: <strong><span class="brown-text capitalize pl-5" id="emergencyMobileNo">{{$data->emergencyMobileNo}}</span></strong>
                              </div>
                            </div>
                            <!-- <table>
                              <tbody>
                                <tr>
                                  <td>Age:</td>
                                  <td><strong><span class="brown-text" id="age">{{$data->age}}</span></strong></td>
                                  <td>Sex:</td>
                                  <td><strong><span class="brown-text" id="sex">{{$data->sex}}</span></strong></td>
                                </tr>
                                <tr>
                                  <td>Civil status:</td>
                                  <td><strong><span class="brown-text" id="status">{{$data->status}}</span></strong></td>
                                  <td>Occupation:</td>
                                  <td><strong><span class="brown-text" id="occupation">{{$data->occupation}}</span></strong></td>
                                </tr>
                                <tr>
                                  <td>Company:</td>
                                  <td><strong><span class="brown-text" id="company">{{$data->company}}</span></strong></td>
                                  <td>Referred by:</td>
                                  <td><strong><span class="brown-text" id="referredBy">{{$data->referredBy}}</span></strong></td>
                                </tr>
                                <tr>
                                  <td colspan="2">Incase of emergenct, please contact:</td>
                                  <td colspan="2"><strong><span class="brown-text" id="emergency">{{$data->emergency}}</span></strong></td>
                                </tr>
                                <tr>
                                  <td>Relationship:</td>
                                  <td><strong><span class="brown-text" id="relationship">{{$data->relationship}}</span></strong></td>
                                  <td>Mobile No.:</td>
                                  <td><strong><span class="brown-text" id="emergencyMobileNo">{{$data->emergencyMobileNo}}</span></strong></td>
                                </tr>
                              </tbody>
                            </table> -->
                          </div>
                        </div>
                      </div>
                    
                      </div>
                    </div>
                <!-- <span class="vertical-align-top mr-4"><i class="material-icons mr-3">favorite_border</i>Wishlist</span>
                <ul class="list-bullet">
                  <li class="list-item-bullet">Accept SIM card and call</li>
                  <li class="list-item-bullet">Make calling instead of mobile phone</li>
                  <li class="list-item-bullet">Sync music play and sync control music</li>
                  <li class="list-item-bullet">Sync Facebook,Twiter,emailand calendar</li>
                </ul>
                <h5>$399.00 <span class="pris-text-style ml-2">$459.00</span></h5>
                <a class="waves-effect waves-light btn gradient-45deg-deep-purple-blue mt-2 mr-2">ADD TO CART</a>
                <a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange mt-2">BUY NOW</a> -->
              </div>
            </div>
            <div class="row">
              <div class="col s12">
                <div id="badges" class="card card-tabs">
                  <div class="card-content">
                    <div class="card-title">
                      <div class="row">
                        <div class="col s12 l2">
                        </div>
                        <div class="col s12 m12 l12">
                          <ul class="tabs">
                            <li class="tab col s2 p-0"><a class="active p-0" href="#view-badges">Medical History</a></li>
                            <li class="tab col s2 p-0"><a class="p-0" href="#html-badges" id="treatment-record">Treatment Records</a></li>
                            <li class="tab col s2 p-0"><a class="p-0" href="#view-installment" id="installment-record" onclick="showIntallment()">Installment Records</a></li>
                            <li class="tab col s2 p-0"><a class="p-0" href="#view-files" id="view-all-files">Files</a></li>
                            <li class="tab col s2 p-0"><a class="p-0" href="#view-contract-consent">Contracts & Consents</a></li>
                            <li class="tab col s2 p-0"><a class="p-0" href="#view-dental-chart">Dental Chart</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div id="view-badges" style="pointer-events: none;">
                      <div class="row">
                        <div class="col s12">
                        </div>
                        <div class="col s12">
                        <div class="card-content">
           
            <div id="html-view-validations add-patient-form">
            <div class="row">
              <div class="col s12 m12 l10">
                <h4 class="card-title">DENTAL HISTORY </h4>
              </div>
             
            </div>
          </div>
       <div id="html-view-validations add-patient-form">
          <div class="row">
            <div class="input-field col s12 m6">
              <span for="previous_dentist">Previous Dentist </span>
              <input class="validate"  id="previous_dentist" name="previous_dentist" type="text">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6">
              <span for="last_dentist_visit">Last Dentist Visit </span>
              <input class="validate"  id="last_dentist_visit" name="last_dentist_visit" type="text">
            </div>
          </div>

          <div class="card-title">
            <div class="row">
              <div class="col s12 m12 l10">
                <h4 class="card-title">MEDICAL HISTORY (PLEASE CHECK) Do you have or have you had any of the following?</h4>
              </div>
             
            </div>
          </div>


          <div class="row">
            <div class="input-field col s12 m6">
              <span for="name_of_physician">Name of Physician </span>
              <input class="validate"  id="name_of_physician" name="name_of_physician" type="text">
            </div><div class="input-field col s12 m6">
              <span for="specialty_if_applicable">Specialty, if applicable </span>
              <input class="validate"  id="specialty_if_applicable" name="specialty_if_applicable" type="text">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6">
              <span for="office_address">Office Address </span>
              <input class="validate"  id="office_address" name="office_address" type="text">
            </div><div class="input-field col s12 m6">
              <span for="office_number">Office Number</span>
              <input class="validate"  id="office_number" name="office_number" type="text">
            </div>
          </div>

        <div id="html-view-validations add-patient-form">

        <div class="row" style="margin-top: 25px;">
          <div class="col s8 m6">
           
          </div>
          <div class="col s4 m6 header-label" style="padding-left: 37px;">
            <p style="font-size: 15px;"><b>Yes &nbsp;&nbsp; &nbsp;&nbsp;No </b></p>
          </div>
        </div>
          <div class="row">
          <div class="col s8 m6">
            1. Are you in good health?
          </div>
          <div class="col s4 m6 d-flex">
            <label>
              <input name="question1" type="radio" value="true" id="question1"  />
              <span></span>
            </label>
            <label>
              <input name="question1f" type="radio" value="false"  id="question1f"/>
              <span></span>
            </label>
          </div>
          <div class="input-field">
            <small class="errorTxt8"></small>
          </div>
        </div>

        <div class="row">
          <div class="col s8 m6">
            2. Are you under medical treatment now?<br>
               &nbsp;&nbsp;&nbsp;&nbsp;If so, what is the condition being treated? <input class="validate"  id="conditionBeingTreatedText" name="conditionBeingTreatedText" type="text" style="height: 20px;position: absolute;width: 190px;margin-left: 3px;">
          </div>
          <div class="col s4 m6 d-flex">
            <label>
              <input name="question2" type="radio" value="true" id="question2"  />
              <span></span>
            </label>
            <label>
              <input name="question2f" type="radio" value="false"  id="question2f"/>
              <span></span>
            </label>
          </div>
          <div class="input-field">
            <small class="errorTxt8"></small>
          </div>
        </div>

        <div class="row">
          <div class="col s8 m6">
            3. Have you ever had serious illness or surgical operation?<br>
              &nbsp;&nbsp;&nbsp;&nbsp;If so, what illness or operation? <input class="validate"  id="seriousillnessText" name="seriousillnessText" type="text" style="height: 20px;position: absolute;width: 200px;margin-left: 3px;">
          </div>
          <div class="col s4 m6 d-flex">
            <label>
              <input name="question3" type="radio" value="true" id="question3"  />
              <span></span>
            </label>
            <label>
              <input name="question3f" type="radio" value="false"  id="question3f"/>
              <span></span>
            </label>
          </div>
          <div class="input-field">
            <small class="errorTxt8"></small>
          </div>
        </div>


        <div class="row">
          <div class="col s8 m6">
            4. Have you ever been hospitalized?<br>
              &nbsp;&nbsp;&nbsp;&nbsp;If so, when and why? <input class="validate"  id="hospitalizedText" name="hospitalizedText" type="text" style="height: 20px;position: absolute;width: 200px;margin-left: 3px;">
          </div>
          <div class="col s4 m6 d-flex">
            <label>
              <input name="question4" type="radio" value="true" id="question4"  />
              <span></span>
            </label>
            <label>
              <input name="question4f" type="radio" value="false"  id="question4f"/>
              <span></span>
            </label>
          </div>
          <div class="input-field">
            <small class="errorTxt8"></small>
          </div>
        </div>

         <div class="row">
          <div class="col s8 m6">
            5. Are you taking any prescription/non-prescription medication?<br>
              &nbsp;&nbsp;&nbsp;&nbsp;If so, please specify? <input class="validate"  id="specifyText" name="specifyText" type="text" style="height: 20px;position: absolute;width: 200px;margin-left: 3px;">
          </div>
          <div class="col s4 m6 d-flex">
            <label>
              <input name="question5" type="radio" value="true" id="question5"  />
              <span></span>
            </label>
            <label>
              <input name="question5f" type="radio" value="false"  id="question5f"/>
              <span></span>
            </label>
          </div>
          <div class="input-field">
            <small class="errorTxt8"></small>
          </div>
        </div>


         <div class="row">
          <div class="col s8 m6">
            6. Do you use tobacco products?<br>
          </div>
          <div class="col s4 m6 d-flex">
            <label>
              <input name="question6" type="radio" value="true" id="question6"  />
              <span></span>
            </label>
            <label>
              <input name="question6f" type="radio" value="false"  id="question6f"/>
              <span></span>
            </label>
          </div>
          <div class="input-field">
            <small class="errorTxt8"></small>
          </div>
        </div>

         <div class="row">
          <div class="col s8 m6">
            7. Do you use alcohol, cocaine or other dangerous drugs?<br>
          </div>
          <div class="col s4 m6 d-flex">
            <label>
              <input name="question7" type="radio" value="true" id="question7"  />
              <span></span>
            </label>
            <label>
              <input name="question7f" type="radio" value="false"  id="question7f"/>
              <span></span>
            </label>
          </div>
          <div class="input-field">
            <small class="errorTxt8"></small>
          </div>
        </div>

         <div class="row">
          <div class="col s8 m6">
            8. Are you allergic to any of the following?<br>
               <label>
                <input name="localAnesthehic" type="checkbox" id="localAnesthehic"/><span class="mobile-font-9">Local Anesthehic (ex. Lidocaine)</span>
                <span></span>
              </label>
              <br>
              <label>
                <input name="penicillin" type="checkbox" id="penicillin"/><span class="mobile-font-9">Penicillin, Antibiotics</span>
                <span></span>
              </label>
              <br>
              <label>
                <input name="sulfadrugs" type="checkbox" id="sulfadrugs"/><span class="mobile-font-9">Sulfa Drugs</span>
                <span></span>
              </label>
                 <br>
              <label>
                <input name="aspirin" type="checkbox" id="aspirin"/><span class="mobile-font-9">Aspirin</span>
                <span></span>
              </label>
                 <br>
              <label>
                <input name="latex" type="checkbox" id="latex"/><span class="mobile-font-9">Latex</span>
                <span></span>
              </label>
                 <br>
               <label>
                <input name="otherscheckbox" type="checkbox" id="otherscheckbox"/><span class="mobile-font-9">Others</span><input class="validate"  id="othersText" name="othersText" type="text" style="height: 20px;position: absolute;width: 140px;margin-left: 3px;">
                <span></span>
              </label>
          </div>
          <div class="col s4 m6 d-flex">
            <label>
              <input name="question8" type="radio" value="true" id="question8"  />
              <span></span>
            </label>
            <label>
              <input name="question8f" type="radio" value="false"  id="question8f"/>
              <span></span>
            </label>
          </div>
          <div class="input-field">
            <small class="errorTxt8"></small>
          </div>
        </div>

        <div class="row">
          <div class="col s8 m6">
            9. Bleeding Time<input class="validate"  id="bleedingTimeText" name="bleedingTimeText" type="text" style="height: 20px;position: absolute;width: 140px;margin-left: 3px;">
          </div>
          <div class="col s4 m6">
            
          </div>
          <div class="input-field">
            <small class="errorTxt8"></small>
          </div>
        </div>


        <div class="row">
          <div class="col s8 m3">
            10. For women only<br>
          </div>
        








          <div class="col s8 m3 desktop-view">
            Are you pregnant?<br>
            Are you nursing?<br>
            Are taking birth control pills?
          </div>
          <div class="col s4 m6 desktop-view">
            <label>
              <input name="question10a" type="radio" value="true" id="question10a"  />
              <span></span>
            </label>
            <label>
              <input name="question10af" type="radio" value="false"  id="question10af"/>
              <span></span>
            </label>
            <br>
            <label>
              <input name="question10b" type="radio" value="true" id="question10b"  />
              <span></span>
            </label>
            <label>
              <input name="question10bf" type="radio" value="false"  id="question10bf"/>
              <span></span>
            </label>
             <br>
            <label>
              <input name="question10c" type="radio" value="true" id="question10c"  />
              <span></span>
            </label>
            <label>
              <input name="question10cf" type="radio" value="false"  id="question10cf"/>
              <span></span>
            </label>
          </div>
          <div class="input-field">
            <small class="errorTxt8"></small>
          </div>
        </div>




          <div class="col s12 m12 mobile-view">
            <table class="tbl-me-his">
              <tr style="border-bottom: none;">
                <td>Are you pregnant?</td>
                <td class="w-10">
                 <label>
                  <input name="question10amobile" type="radio" value="true" id="question10amobile"  />
                  <span></span>
                </label>
                </td>
                <td>
                  <label>
                    <input name="question10afmobile" type="radio" value="false"  id="question10afmobile"/>
                    <span></span>
                  </label>
                </td>
              </tr>
              <tr style="border-bottom: none;">
                <td>Are you nursing?</td>
                <td>
                   <label>
                    <input name="question10bmobile" type="radio" value="true" id="question10bmobile"  />
                    <span></span>
                  </label>
                </td>
                <td>
                  <label>
                    <input name="question10bfmobile" type="radio" value="false"  id="question10bfmobile"/>
                    <span></span>
                  </label>
                </td>
              </tr>
              <tr style="border-bottom: none;">
                <td>Are taking birth control pills?</td>
                <td>
                   <label>
                      <input name="question10cmobile" type="radio" value="true" id="question10cmobile"  />
                      <span></span>
                    </label>
                </td>
                <td>
                    <label>
                      <input name="question10cfmobile" type="radio" value="false"  id="question10cfmobile"/>
                      <span></span>
                    </label>
                </td>
              </tr>
            </table>
      
             
          </div>
          <div class="input-field">
            <small class="errorTxt8"></small>
          </div>
        </div>

        <div class="row">
          <div class="col s8 m6">
            11. Blood Type<input class="validate"  id="bloodtypeText" name="bloodtypeText" type="text" style="height: 20px;position: absolute;width: 140px;margin-left: 3px;">
          </div>
          <div class="col s4 m6">
            
          </div>
          <div class="input-field">
            <small class="errorTxt8"></small>
          </div>
        </div>

        <div class="row">
          <div class="col s8 m6">
            12. Blood Pressure<input class="validate"  id="bloodpressureText" name="bloodpressureText" type="text" style="height: 20px;position: absolute;width: 140px;margin-left: 3px;">
          </div>
          <div class="col s4 m6">
            
          </div>
          <div class="input-field">
            <small class="errorTxt8"></small>
          </div>
        </div>


         <div class="row">
          <div class="col s8 m6">
            13. Do you have orhave you had any of the following? Check which apply
          </div>
          <div class="col s4 m6">
          </div>
          <div class="input-field">
            <small class="errorTxt8"></small>
          </div>
        </div>

<br>
<br>
              <div class="row">
                <div class="col s12 m4 l4">
              <label>
                <input name="highbloodPressure" type="checkbox" id="highbloodPressure"/><span>Highblood Pressure</span><br>
                <span></span>
              </label>
               <label>
                <input name="lowbloodPressure" type="checkbox" id="lowbloodPressure"/><span>Low Blood Pressure</span><br>
                <span></span>
              </label>
              <label>
                <input name="epilepsy" type="checkbox" id="epilepsy"/><span>Epilepsy / Convulsions</span><br>
                <span></span>
              </label>
              <label>
                <input name="aids" type="checkbox" id="aids"/><span>AIDS or HIV Infection</span><br>
                <span></span>
              </label>
              <label>
                <input name="SexuallyTransmittedDisease" type="checkbox" id="SexuallyTransmittedDisease"/><span>Sexually Transmitted Disease</span><br>
                <span></span>
              </label>
              <label>
                <input name="stomachTroubles" type="checkbox" id="stomachTroubles"/><span>Stomach Troubles / Ulcers</span><br>
                <span></span>
              </label>
              <label>
                <input name="faintingSeizure" type="checkbox" id="faintingSeizure"/><span>Fainting Seizure</span><br>
                <span></span>
              </label>
              <label>
                <input name="rapidWeightLoss" type="checkbox" id="rapidWeightLoss"/><span>Rapid Weight Loss</span><br>
                <span></span>
              </label>
              <label>
                <input name="radiationTherapy" type="checkbox" id="radiationTherapy"/><span>Radiation Therapy</span><br>
                <span></span>
              </label>
              <label>
                <input name="jointReplacement" type="checkbox" id="jointReplacement"/><span>Joint Replacement / implant</span><br>
                <span></span>
              </label>
              <label>
                <input name="heartSurgery" type="checkbox" id="heartSurgery"/><span>Heart Surgery</span><br>
                <span></span>
              </label>
              <label>
                <input name="heartAttack" type="checkbox" id="heartAttack"/><span>Heart Attack</span><br>
                <span></span>
              </label>
              <label>
                <input name="thyroidProblem" type="checkbox" id="thyroidProblem"/><span>Thyroid Problem</span><br>
                <span></span>
              </label>

          </div>
          <div class="col s12 m4 l4">
             <label>
                <input name="heartDisease" type="checkbox" id="heartDisease"/><span>Heart Disease</span><br>
                <span></span>
              </label>
              <label>
                <input name="heartMurmur" type="checkbox" id="heartMurmur"/><span>Heart Murmur</span><br>
                <span></span>
              </label>
              <label>
                <input name="hepatitis" type="checkbox" id="hepatitis"/><span>Hepatitis / liver Disease</span><br>
                <span></span>
              </label>
              <label>
                <input name="rheumaticFever" type="checkbox" id="rheumaticFever"/><span>Rheumatic Fever</span><br>
                <span></span>
              </label>
              <label>
                <input name="hayFever" type="checkbox" id="hayFever"/><span>Hay Fever / Allergies</span><br>
                <span></span>
              </label>
               <label>
                <input name="respiratoryProblems" type="checkbox" id="respiratoryProblems"/><span>Respiratory Problems</span><br>
                <span></span>
              </label>
               <label>
                <input name="hepatitisJaundice" type="checkbox" id="hepatitisJaundice"/><span>Hepatitis / Jaundice</span><br>
                <span></span>
              </label>
               <label>
                <input name="tuberculosis" type="checkbox" id="tuberculosis"/><span>Tuberculosis</span><br>
                <span></span>
              </label>
               <label>
                <input name="swollenAnkles" type="checkbox" id="swollenAnkles"/><span>Swollen Ankles</span><br>
                <span></span>
              </label>
               <label>
                <input name="kidneyDisease" type="checkbox" id="kidneyDisease"/><span>Kidney Disease</span><br>
                <span></span>
              </label>
               <label>
                <input name="Diabetes" type="checkbox" id="Diabetes"/><span>Diabetes</span><br>
                <span></span>
              </label>
               <label>
                <input name="chestPain" type="checkbox" id="chestPain"/><span>Chest Pain</span><br>
                <span></span>
              </label>
               <label>
                <input name="stroke" type="checkbox" id="stroke"/><span>Stroke</span><br>
                <span></span>
              </label>
          </div>
          <iv class="col s12 m4 l4">
              <label>
                  <input name="cancer" type="checkbox" id="cancer"/><span>Cancer / Tumors</span><br>
                  <span></span>
                </label>
                <label>
                  <input name="anemia" type="checkbox" id="anemia"/><span>Anemia</span><br>
                  <span></span>
                </label>
                <label>
                  <input name="angina" type="checkbox" id="angina"/><span>Angina</span><br>
                  <span></span>
                </label>
                <label>
                  <input name="asthma" type="checkbox" id="asthma"/><span>Asthma</span><br>
                  <span></span>
                </label>
                <label>
                  <input name="emphysema" type="checkbox" id="emphysema"/><span>Emphysema</span><br>
                  <span></span>
                </label>
                <label>
                  <input name="bleedingProblems" type="checkbox" id="bleedingProblems"/><span>Bleeding Problems</span><br>
                  <span></span>
                </label>
                <label>
                  <input name="bloodDisease" type="checkbox" id="bloodDisease"/><span>Blood Disease</span><br>
                  <span></span>
                </label>
                <label>
                  <input name="heartInjuries" type="checkbox" id="heartInjuries"/><span>Heart Injuries</span><br>
                  <span></span>
                </label>
                <label>
                  <input name="arthritis" type="checkbox" id="arthritis"/><span>Arthritis / Rheumatism</span><br>
                  <span></span>
                </label>
                <label>
                  <input name="othersFollowing" type="checkbox" id="othersFollowing"/><span>Other</span><input class="validate"  id="othersText2" name="othersText2" type="text" style="height: 20px;position: absolute;width: 140px;margin-left: 3px;">
                  <span></span>
                </label>
            </div> 

                <div class="col s12 m4">
                
                </div>
                <div class="col s12 m4">
                  
                </div>
              
                  <div class="col s12 mt-5">
                    <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I hereby consent to the performance upon myself of the recommended operations & or treatments that may be considered necessary to restore my oral and dental health. This consent is given freely and voluntarily and whatever the result of any intervention or treatment maybe, I absolve my dentist from any liability or responsibility.
                    Furthermore, I am willing to pay for all the services rendered to me.
</b></p>
                    </div>
                    <div class="row">
                      <div class="col m8 s12">
                      </div>
                      <div class="col m4 s1 text-center">
                          <div class="sig-area">
                            <img src="" id="signature-Link" value="" style="width: auto;"/>
                          </div>
                          <span id="signerName"></span>
                          <span id="relationship-entered"></span>
                      </div>
                    </div>
                    </form>
                          </div>
                          </div>
                          </div>
                          </div>
                        </div>
                  </div>
                  <div id="view-files">
                     <div class="input-field col s12 m4">
                          <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="patient_id" id="file_upload_patient_id" value="" />
                          <input type="hidden" name="upload_location" id="upload_location" value="not-modal" />

                            <h6 class="text-left mb-5">Upload Files </h6>
                              @csrf
                              @if ($message = Session::get('success'))
                              <div class="alert alert-success">
                                  <strong>{{ $message }}</strong>
                              </div>
                            @endif

                            @if (count($errors) > 0)
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                            @endif
                              <div class="input-field col s12">
                                <label for="name" class="">Name</label>
                                <input class="validate invalid" required="" id="name" name="name" type="text">
                             </div>
                              <div class="custom-file">
                                  <input type="file" name="file[]" class="custom-file-input" id="chooseFile" accept="image/*" multiple="multiple" required>
                                  <label class="custom-file-label" for="chooseFile">Select file</label>
                              </div>

                              <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                  Upload Files
                              </button>
                            </form>
                        </div>
                      <table class="bordered">
                        <thead>
                          <tr>
                            <th data-field="id">Name</th>
                            <th data-field="date">Date</th>
                            <th data-field="price">Action</th>
                          </tr>
                        </thead>
                        <tbody id="file-html">
                        <!-- @foreach($patientFiles as $key => $file)
                          <tr>
                            <td>{{$file->name}}</td>
                            <td>{{ date('F d, Y', strtotime($file->created_at )) }}</td>
                            <td>
                            <a class="btn-floating mb-1 btn-small waves-effect waves-light mr-1" onclick="editFile({{$file->id}})">
                                <i class="material-icons">edit</i>
                              </a>
                              <a  href="#modal-view-file" target="_blank" class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 modal-trigger" onclick="viewFile({{$file->id}})">
                                <i class="material-icons">visibility</i>
                              </a>
                              <a  href="#modal-send-mail-file" target="_blank" class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 modal-trigger" onclick="sendMail({{$file->id}})">
                                <i class="material-icons">mail</i>
                              </a>
                              <span  href="#modal-remove-file" class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 " onclick="removeFile({{$file->id}})">
                                <i class="material-icons">delete</i>
                              </span>
                            </td>
                          </tr>
                          @endforeach -->
                        </tbody>
                      </table>
                    </div>
                    <div id="view-installment">

                      <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <div class="card-content">
                                     <h4 class="card-title">INSTALLMENT RECORD</h4>
                                      <table id="installment-tbl" class="" >
                                          <tbody  id="installmentHtml">
                                            <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            </tr>
                                          </tbody>
                                      </table>

                                          <form class="row" id="add-installment-record-form">
                                          @csrf
                                          <input type="hidden" name="installment_patient_id" id="installment_patient_id" value="" />
                                            <div class="col s12">
                                              <div class="input-field col m6 s12">
                                              <input type="text" class="datepicker" name="date" id="datepicker" value="<?php echo date('m/d/Y'); ?>" required >
                                                <label for="last_name" id="t-date" class="active">Date</label>
                                              </div>
                                            </div>
                                            <div class="col s12">
                                              <div class="input-field col m6 s12">
                                                  <input type="text" name="amount-install" id="currency-field amount-charge1 input-trigger" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" class="amount-install">
                                                  <label for="currency-field" class="active">Amount</label>
                                              </div>
                                            </div>
                                             <div class="col s12">
                                              <div class="input-field col m6 s12">
                                                  <input type="text" name="note-install" id="input-trigger"class="note-install">
                                                  <label for="currency-field" class="active">Note</label>
                                              </div>
                                            </div>
                                        <button class="btn waves-effect waves-light right submit" type="submit" id="submit-patient-installment-record" onclick="saveInstallment()" name="action">Save
                                        </button>
                                    </form>
                                </div>  
                            </div>  
                        </div>
                      </div>
                    
                     </div>
                    <div id="html-badges">
                      <div class="row">
                        <div class="col s12">
                          <div class="card" style="">
                            <div class="card-content">
                         
                                <a class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 float-right modal-trigger d-none" id="add-treatment-record"  href="#modal-add-treatment-record">
                                  <i class="material-icons">add</i>
                                </a>
                             @if($userType == '1')
                                <!-- <a class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 float-right" id="delete-treatment-record">
                                  <i class="material-icons">redo</i>
                                </a> -->
                                @else
                            
                              @endif
                            
                                      

                              <h4 class="card-title">TREATMENT RECORD</h4>
                              <div class="row">
                                <div class="col s12 treatment-scroll">
                                  <table id="treatment-tbl" class="" >
                                    <!-- <thead style="visibility: hidden;">
                                      <tr>
                                        <th id="record-table">Date</th>
                                        <th>Procude</th>
                                        <th>Amount Charged</th>
                                        <th>Amount Paid</th>
                                      </tr>
                                    </thead> -->
                                    <tbody  id="patientTreatmentHtml">
                                      <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <div class="add-form-treat">
                                 <div class="">
                                    <div class="col s8 m6">
                                      <h4>Adding treatment record</h4>
                                    </div>
                                    <div class="input-field col s4 m6">
                                      <a class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 float-right modal-trigger" id="add-draw" href="#modal-drawing-area">
                                        <i class="material-icons">graphic_eq</i>
                                      </a>
                                      <a class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 float-right" id="add-treatment-record" onclick="add_fields();">
                                        <i class="material-icons">add</i>
                                      </a>
                                  
                                    </div>
                                    <form class="row" id="add-treatment-record-form">
                                    @csrf
                                    <input type="hidden" name="drawingLink" id="drawing_link" value="" />
                                    <input type="hidden" name="patient_id" id="patient_id" value="" />
                                    <input type="hidden" name="section" id="section" value="" />
                                      <div class="col s12">
                                        <div class="input-field col m6 s12">
                                        <input type="text" class="datepicker" name="date" id="datepicker" value="<?php echo date('m/d/Y'); ?>" required >
                                          <label for="last_name" id="t-date" class="active">Date</label>
                                        </div>
                                      </div>
                                   
                                      <div class="col s12">
                                       <div class="input-field col m6 s12">
                                          <textarea id="procedureTextarea" name="procedure[]" class="materialize-textarea" data-length="120" ></textarea>
                                          <label for="textarea1">Procedure:</label>
                                        </div>
                                      </div>
                                
                                      <div class="col s12">
                                        <div class="input-field col m6 s12">
                                          <textarea id="toothNoTextarea" name="toothNo[]" class="materialize-textarea" data-length="120" ></textarea>
                                          <label for="textarea1">Tooth No.</label>
                                        </div>
                                      </div>
                                      <br>

                                      <div class="col s12">
                                        <div class="input-field col m6 s12">
                                         <input type="text" class="datepicker" name="recall_date[]" id="datepicker" value="" required >
                                          <label for="recall_date" id="t-date" class="active">Recall Date</label>
                                        </div>
                                      </div>

                                      <div class="col s12">
                                       <div class="input-field col m6 s12">
                                          <textarea id="recallNoteTextarea" name="recallNote[]" class="materialize-textarea" data-length="120" ></textarea>
                                          <label for="textarea1">Recall Note</label>
                                        </div>
                                      </div>


                                      @if($userType == '1')
                                      <div class="col s12">
                                        <div class="input-field col m6 s12">
                                            <input type="text" name="amount-charged[]" id="currency-field amount-charge1 input-trigger" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" class="amount-charge1">
                                            <label for="currency-field">Amount Charged</label>
                                        </div>
                                      </div>
                                      <div class="col s12">
                                        <div class="input-field col m4 s12">
                                            <input type="text" name="amount-paid[]" id="currency-field amount-paid1 input-trigger" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency"  class="amount-paid1">
                                            <label for="currency-field">Amount Paid</label>
                                        </div>
                                        <div class="input-field col m4 s12">
                                            <select class="browser-default" id="payment-type1"  name="payment_type[]" >
                                              <option value="cash">Cash</option>
                                              <option value="gcash">Gcash</option>
                                              <option value="debit">Debit</option>
                                              <option value="credit">Credit Card</option>
                                              <option value="cheque">Cheque</option>
                                              <option value="bank_transfer">Bank Transfer</option>
                                            </select>
                                        </div>
                                        <div class="input-field col m4 s12">
                                            <input type="text" name="amount-paid-note[]" id="mount-paid-note">
                                            <label for="currency">Note</label>
                                        </div>
                                      </div>
                                      <div class="col s12">
                                        <div class="input-field col m6 s12">
                                            <input type="text" name="balance[]" id="currency-field amount-balance1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" class="amount-balance1">
                                            <label for="currency" id="label-balance">Balance</label>
                                        </div>
                                      </div>
                                      @else
                                    
                                      @endif
                                      <div id="" class="prodSection prod2 d-none">
                                   
                                        <div class="col 2">
                                          <div class="label"><i class="material-icons del-treatment-record dp48" style="font-size: 10px;color: #ff4081;" onclick="remove_fields(2)">close</i></div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m8 s12">
                                            <textarea id="textarea1" name="procedure[]" class="materialize-textarea" data-length="120"></textarea>
                                            <label for="textarea1">Procedure:</label>
                                          </div>
                                        </div>
                                      <div class="col s12">
                                        <div class="input-field col m8 s12">
                                          <textarea id="toothNoTextarea" name="toothNo[]" class="materialize-textarea" data-length="120" ></textarea>
                                          <label for="textarea1">Tooth No.:</label>
                                        </div>
                                      </div>
                                      <div class="col s12">
                                        <div class="input-field col m6 s12">
                                         <input type="text" class="datepicker" name="recall_date[]" id="datepicker" value="" required >
                                          <label for="recall_date" id="t-date" class="active">Recall Date</label>
                                        </div>
                                      </div>
                                      <div class="col s12">
                                       <div class="input-field col m6 s12">
                                          <textarea id="recallNoteTextarea" name="recallNote[]" class="materialize-textarea" data-length="120" ></textarea>
                                          <label for="textarea1">Recall Note</label>
                                        </div>
                                      </div>
                                        @if($userType == '1')
                                        <div class="col s12">
                                          <div class="input-field col m6 s12">
                                              <input type="text" name="amount-charged[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Amount Charged</label>
                                          </div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m4 s12">
                                              <input type="text" name="amount-paid[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Amount Paid</label>
                                          </div>
                                          <div class="input-field col m4 s12">
                                            <select class="browser-default" id="payment-type2"  name="payment_type[]" >
                                              <option value="cash">Cash</option>
                                              <option value="gcash">Gcash</option>
                                              <option value="debit">Debit</option>
                                              <option value="credit">Credit Card</option>
                                              <option value="cheque">Cheque</option>
                                              <option value="bank_transfer">Bank Transfer</option>
                                            </select>
                                        </div>
                                          <div class="input-field col m4 s12">
                                              <input type="text" name="amount-paid-note[]" id="mount-paid-note">
                                              <label for="currency">Note</label>
                                          </div>
                                      </div>
                                        <div class="col s12">
                                          <div class="input-field col m6 s12">
                                              <input type="text" name="balance[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Balance</label>
                                          </div>
                                        </div>
                                        @else
                                      @endif
                                      </div>
                                      <div id="" class="prodSection prod3 d-none">
                                     
                                        <div class="col 2">
                                          <div class="label"><i class="material-icons del-treatment-record dp48" style="font-size: 10px;color: #ff4081;" onclick="remove_fields(3)">close</i></div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m8 s12">
                                            <textarea id="textarea1" name="procedure[]" class="materialize-textarea" data-length="120"></textarea>
                                            <label for="textarea1">Procedure:</label>
                                          </div>
                                        </div>
                                      <div class="col s12">
                                        <div class="input-field col m8 s12">
                                          <textarea id="toothNoTextarea" name="toothNo[]" class="materialize-textarea" data-length="120" ></textarea>
                                          <label for="textarea1">Tooth No.:</label>
                                        </div>
                                      </div>
                                      <div class="col s12">
                                        <div class="input-field col m6 s12">
                                         <input type="text" class="datepicker" name="recall_date[]" id="datepicker" value="" required >
                                          <label for="recall_date" id="t-date" class="active">Recall Date</label>
                                        </div>
                                      </div>
                                      <div class="col s12">
                                       <div class="input-field col m6 s12">
                                          <textarea id="recallNoteTextarea" name="recallNote[]" class="materialize-textarea" data-length="120" ></textarea>
                                          <label for="textarea1">Recall Note</label>
                                        </div>
                                      </div>
                                        @if($userType == '1')
                                        <div class="col s12">
                                          <div class="input-field col m6 s12">
                                              <input type="text" name="amount-charged[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Amount Charged</label>
                                          </div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m4 s12">
                                              <input type="text" name="amount-paid[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Amount Paid</label>
                                          </div>
                                          <div class="input-field col m4 s12">
                                            <select class="browser-default" id="payment-type3"  name="payment_type[]" >
                                              <option value="cash">Cash</option>
                                              <option value="gcash">Gcash</option>
                                              <option value="debit">Debit</option>
                                              <option value="credit">Credit Card</option>
                                              <option value="cheque">Cheque</option>
                                              <option value="bank_transfer">Bank Transfer</option>
                                            </select>
                                        </div>
                                          <div class="input-field col m4 s12">
                                              <input type="text" name="amount-paid-note[]" id="mount-paid-note">
                                              <label for="currency">Note</label>
                                          </div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m6 s12">
                                              <input type="text" name="balance[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Balance</label>
                                          </div>
                                        </div>
                                        @else
                                      @endif
                                      </div>
                                      <div id="" class="prodSection prod4 d-none">
                                        <div class="col 2">
                                          <div class="label"><i class="material-icons del-treatment-record dp48" style="font-size: 10px;color: #ff4081;" onclick="remove_fields(4)">close</i></div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m8 s12">
                                            <textarea id="textarea1" name="procedure[]" class="materialize-textarea" data-length="120"></textarea>
                                            <label for="textarea1">Procedure:</label>
                                          </div>
                                        
                                        </div>
                                      <div class="col s12">
                                        <div class="input-field col m8 s12">
                                          <textarea id="toothNoTextarea" name="toothNo[]" class="materialize-textarea" data-length="120" ></textarea>
                                          <label for="textarea1">Tooth No.:</label>
                                        </div>
                                      </div>
                                      <div class="col s12">
                                        <div class="input-field col m6 s12">
                                         <input type="text" class="datepicker" name="recall_date[]" id="datepicker" value="" required >
                                          <label for="recall_date" id="t-date" class="active">Recall Date</label>
                                        </div>
                                      </div>
                                      <div class="col s12">
                                       <div class="input-field col m6 s12">
                                          <textarea id="recallNoteTextarea" name="recallNote[]" class="materialize-textarea" data-length="120" ></textarea>
                                          <label for="textarea1">Recall Note</label>
                                        </div>
                                      </div>
                                        @if($userType == '1')
                                        <div class="col s12">
                                          <div class="input-field col m6 s12">
                                              <input type="text" name="amount-charged[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Amount Charged</label>
                                          </div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m4 s12">
                                              <input type="text" name="amount-paid[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Amount Paid</label>
                                          </div>
                                          <div class="input-field col m4 s12">
                                            <select class="browser-default" id="payment-type4"  name="payment_type[]" >
                                              <option value="cash">Cash</option>
                                              <option value="gcash">Gcash</option>
                                              <option value="debit">Debit</option>
                                              <option value="credit">Credit Card</option>
                                              <option value="cheque">Cheque</option>
                                              <option value="bank_transfer">Bank Transfer</option>
                                            </select>
                                        </div>
                                          <div class="input-field col m4 s12">
                                              <input type="text" name="amount-paid-note[]" id="mount-paid-note">
                                              <label for="currency">Note</label>
                                          </div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m6 s12">
                                              <input type="text" name="balance[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Balance</label>
                                          </div>
                                        </div>
                                        @else
                                      @endif
                                      </div>
                                      <div id="" class="prodSection prod5 d-none">
                                       
                                        <div class="col 2">
                                          <div class="label"><i class="material-icons del-treatment-record dp48" style="font-size: 10px;color: #ff4081;" onclick="remove_fields(5)">close</i></div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m8 s12">
                                            <textarea id="textarea1" name="procedure[]" class="materialize-textarea" data-length="120"></textarea>
                                            <label for="textarea1">Procedure:</label>
                                          </div>
                                        </div>
                                    
                                      <div class="col s12">
                                        <div class="input-field col m8 s12">
                                          <textarea id="toothNoTextarea" name="toothNo[]" class="materialize-textarea" data-length="120" ></textarea>
                                          <label for="textarea1">Tooth No.:</label>
                                        </div>
                                      </div>
                                      <div class="col s12">
                                        <div class="input-field col m6 s12">
                                         <input type="text" class="datepicker" name="recall_date[]" id="datepicker" value="" required >
                                          <label for="recall_date" id="t-date" class="active">Recall Date</label>
                                        </div>
                                      </div>
                                      <div class="col s12">
                                       <div class="input-field col m6 s12">
                                          <textarea id="recallNoteTextarea" name="recallNote[]" class="materialize-textarea" data-length="120" ></textarea>
                                          <label for="textarea1">Recall Note</label>
                                        </div>
                                      </div>
                                        @if($userType == '1')
                                        <div class="col s12">
                                          <div class="input-field col m6 s12">
                                              <input type="text" name="amount-charged[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Amount Charged</label> 
                                          </div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m4 s12">
                                              <input type="text" name="amount-paid[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Amount Paid</label>
                                          </div>
                                          <div class="input-field col m4 s12">
                                            <select class="browser-default" id="payment-type5"  name="payment_type[]" >
                                              <option value="cash">Cash</option>
                                              <option value="gcash">Gcash</option>
                                              <option value="debit">Debit</option>
                                              <option value="credit">Credit Card</option>
                                              <option value="cheque">Cheque</option>
                                              <option value="bank_transfer">Bank Transfer</option>
                                            </select>
                                        </div>
                                          <div class="input-field col m4 s12">
                                              <input type="text" name="amount-paid-note[]" id="mount-paid-note">
                                              <label for="currency">Note</label>
                                          </div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m6 s12">
                                              <input type="text" name="balance[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Balance</label>
                                          </div>
                                        </div>
                                        @else
                                      @endif
                                      </div>
                                      <div id="" class="prodSection prod6 d-none">
                                        <div class="col s10">
                                          <div class="label"></div>
                                        </div>
                                       
                                        <div class="col s12">
                                          <div class="input-field col m8 s12">
                                            <textarea id="textarea1" name="procedure[]" class="materialize-textarea" data-length="120"></textarea>
                                            <label for="textarea1">Procedure:</label>
                                          </div>
                                        </div>
                                      
                                      <div class="col s12">
                                        <div class="input-field col m8 s12">
                                          <textarea id="toothNoTextarea" name="toothNo[]" class="materialize-textarea" data-length="120" ></textarea>
                                          <label for="textarea1">Tooth No.:</label>
                                        </div>
                                      </div>
                                      <div class="col s12">
                                        <div class="input-field col m6 s12">
                                         <input type="text" class="datepicker" name="recall_date[]" id="datepicker" value="" required >
                                          <label for="recall_date" id="t-date" class="active">Recall Date</label>
                                        </div>
                                      </div>
                                      <div class="col s12">
                                       <div class="input-field col m6 s12">
                                          <textarea id="recallNoteTextarea" name="recallNote[]" class="materialize-textarea" data-length="120" ></textarea>
                                          <label for="textarea1">Recall Note</label>
                                        </div>
                                      </div>
                                        @if($userType == '1')
                                        <div class="col s12">
                                          <div class="input-field col m6 s12">
                                              <input type="text" name="amount-charged[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Amount Charged</label>
                                          </div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m4 s12">
                                              <input type="text" name="amount-paid[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Amount Paid</label>
                                          </div>
                                          <div class="input-field col m4 s12">
                                            <select class="browser-default" id="payment-type6"  name="payment_type[]" >
                                              <option value="cash">Cash</option>
                                              <option value="gcash">Gcash</option>
                                              <option value="debit">Debit</option>
                                              <option value="credit">Credit Card</option>
                                              <option value="cheque">Cheque</option>
                                              <option value="bank_transfer">Bank Transfer</option>
                                            </select>
                                        </div>
                                          <div class="input-field col m4 s12">
                                              <input type="text" name="amount-paid-note[]" id="mount-paid-note">
                                              <label for="currency">Note</label>
                                          </div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m6 s12">
                                              <input type="text" name="balance[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Balance</label>
                                          </div>
                                        </div>
                                        @else
                                      @endif
                                      </div>
                                      <div id="" class="prodSection prod7 d-none">
                                        <div class="col 2">
                                          <div class="label"><i class="material-icons del-treatment-record dp48" style="font-size: 10px;color: #ff4081;" onclick="remove_fields(7)">close</i></div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m8 s12">
                                            <textarea id="textarea1" name="procedure[]" class="materialize-textarea" data-length="120"></textarea>
                                            <label for="textarea1">Procedure:</label>
                                          </div>
                                        </div>
                                      <div class="col s12">
                                        <div class="input-field col m8 s12">
                                          <textarea id="toothNoTextarea" name="toothNo[]" class="materialize-textarea" data-length="120" ></textarea>
                                          <label for="textarea1">Tooth No.:</label>
                                        </div>
                                      </div>
                                      <div class="col s12">
                                        <div class="input-field col m6 s12">
                                         <input type="text" class="datepicker" name="recall_date[]" id="datepicker" value="" required >
                                          <label for="recall_date" id="t-date" class="active">Recall Date</label>
                                        </div>
                                      </div>
                                      <div class="col s12">
                                       <div class="input-field col m6 s12">
                                          <textarea id="recallNoteTextarea" name="recallNote[]" class="materialize-textarea" data-length="120" ></textarea>
                                          <label for="textarea1">Recall Note</label>
                                        </div>
                                      </div>
                                        @if($userType == '1')
                                        <div class="col s12">
                                          <div class="input-field col m6 s12">
                                              <input type="text" name="amount-charged[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Amount Charged</label>
                                          </div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m4 s12">
                                              <input type="text" name="amount-paid[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Amount Paid</label>
                                          </div>
                                          <div class="input-field col m4 s12">
                                            <select class="browser-default" id="payment-type7"  name="payment_type[]" >
                                              <option value="cash">Cash</option>
                                              <option value="gcash">Gcash</option>
                                              <option value="debit">Debit</option>
                                              <option value="credit">Credit Card</option>
                                              <option value="cheque">Cheque</option>
                                              <option value="bank_transfer">Bank Transfer</option>
                                            </select>
                                        </div>
                                          <div class="input-field col m4 s12">
                                              <input type="text" name="amount-paid-note[]" id="mount-paid-note">
                                              <label for="currency">Note</label>
                                          </div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m6 s12">
                                              <input type="text" name="balance[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Balance</label>
                                          </div>
                                        </div>
                                        @else
                                      @endif
                                      </div>
                                      <div id="" class="prodSection prod8 d-none">
                                        <div class="col 2">
                                          <div class="label"><i class="material-icons del-treatment-record dp48" style="font-size: 10px;color: #ff4081;" onclick="remove_fields(8)">close</i></div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m8 s12">
                                            <textarea id="textarea1" name="procedure[]" class="materialize-textarea" data-length="120"></textarea>
                                            <label for="textarea1">Procedure:</label>
                                          </div>
                                        </div>
                                      <div class="col s12">
                                        <div class="input-field col m8 s12">
                                          <textarea id="toothNoTextarea" name="toothNo[]" class="materialize-textarea" data-length="120" ></textarea>
                                          <label for="textarea1">Tooth No.:</label>
                                        </div>
                                      </div>
                                        @if($userType == '1')
                                        <div class="col s12">
                                          <div class="input-field col m6 s12">
                                              <input type="text" name="amount-charged[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Amount Charged</label>
                                          </div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m4 s12">
                                              <input type="text" name="amount-paid[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Amount Paid</label>
                                          </div>
                                          <div class="input-field col m4 s12">
                                            <select class="browser-default" id="payment-type8"  name="payment_type[]">
                                              <option value="cash">Cash</option>
                                              <option value="gcash">Gcash</option>
                                              <option value="debit">Debit</option>
                                              <option value="credit">Credit Card</option>
                                              <option value="cheque">Cheque</option>
                                              <option value="bank_transfer">Bank Transfer</option>
                                            </select>
                                        </div>
                                          <div class="input-field col m4 s12">
                                              <input type="text" name="amount-paid-note[]" id="mount-paid-note">
                                              <label for="currency">Note</label>
                                          </div>
                                        </div>
                                        <div class="col s12">
                                          <div class="input-field col m6 s12">
                                              <input type="text" name="balance[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                                              <label for="currency">Balance</label>
                                          </div>
                                        </div>
                                        @else
                                      @endif
                                      </div>
                                      <div class="col s12">
                                          <div class="drawing-section-main">
                                          </div>
                                      </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button class="btn waves-effect waves-light right submit" type="submit" id="submit-patient-treatment-record" name="action">Add
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="view-contract-consent">
                      <div class="row">
                        <div class="col s12">
                          <div class="">
                            <div class="card-content">
                              <div class="row">

                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-informed-consent2">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Informed Consent</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>



                                   <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-restoration">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Restoration Filling Consent</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>


                                
                                 <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-extraction">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Extraction</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>

                           
                                </div>
                              <div class="row">
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-crown">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Crowns and Bridges</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>

                                   <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-denture">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Denture</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>

                                 <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-ortho-contact" onclick="getConsentData('ortho-contact')">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Orthodontic Service Agreement/Financial Contract</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                </div>

                                <div class="row">
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-informed-consent">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Informed Consent</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>


                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-contract-consent">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Ortho Consent Form</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>

                                  <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-root">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Root Canal Treatment Consent</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>


                                </div>

                                <div class="row">
                                <div class="col s12 m4">
                                    <div class="card card-hover z-depth-0 card-border-gray">
                                      <a class="modal-trigger" href="#modal-trial">
                                        <div class="card-panel card-content center-align">
                                          <h5><strong>Trial Denture</strong></h5>
                                        </div>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                                <!-- 
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-instruction-veneers">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Instruction for Veneers</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-instruction-laser-whitening">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Laser Whitening Instruction</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-home-care-instruction">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Post Op Instruction for Braces</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-orthodontic-braces-contract">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Orthodontic Braces Contract</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-kinnie-funt"  onclick="getConsentData('kinnie-funt')">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Kinnie Funt</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-post-op-instruction-tooth-extraction">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Post Op Instruction for Tooth Extraction</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-oral-diagnosis">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Oral Diagnosis</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-contract-for-tmj" onclick="getConsentData('contract-for-tmj')">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Contract for TMJ</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-about-tmj">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>About TMJ Disorder</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-ambassadors-contract">
                                      <div class="card-panel card-content center-align">
                                        <h5><strong>Ambassador’s Contract</strong></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div> -->
                              </div>
                              <div class="row">
                                <div class="col s12">
                                  
                                  <table class="bordered">
                                    <thead>
                                      <tr>
                                        <th data-field="id">Name</th>
                                        <th data-field="price">Date</th>
                                        <th data-field="price">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody id="consentHtml">
                                  
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

               

                      <div id="view-dental-chart">
                        <div class="container">
                          <div class="row">
                            <div class="col s12 m12 l3">
                              <div class="color-picker">
                                <input type="hidden" name="selected-color" id="selected-color" />
                                       <span class="color-bloack">
                                           <input type="radio" name="color" id="blue" value="blue" >
                                            <label for="blue" title="blue"><span>Blue</span></label>

                                            <input type="radio" name="color" id="black" value="black" >
                                            <label for="black" title="black"><span>Black</span></label>
                                          
                                          
                                            <!-- <input type="radio" name="color" id="bridge" value="bridge" >
                                            <label for="bridge" title="bridge"><span>Bridge Pontic</span></label>

                                            <input type="radio" name="color" id="reset" value="reset" >
                                            <label for="reset" title="reset"><span>Reset</span></label>

                                            <input type="radio" name="color" id="attrition" value="attrition" >
                                            <label for="attrition" title="attrition"><span>Attrition</span></label>

                                            <input type="radio" name="color" id="mobile2" value="mobile2" >
                                            <label for="mobile2" title="mobile2"><span>mobile</span></label>

                                            <input type="radio" name="color" id="partially" value="partially" >
                                            <label for="partially" title="partially"><span>Partially Impacted</span></label>

                                            <input type="radio" name="color" id="extraction" value="extraction" >
                                            <label for="extraction" title="extraction"><span>For Extraction</span></label>

                                              <input type="radio" name="color" id="recurrent" value="recurrent" >
                                            <label for="recurrent" title="recurrent"><span>Recurrent Carier</span></label> -->




                                             
                                        </span>
                                        <span class="color-bloack">

                                           <input type="radio" name="color" id="red" value="red">
                                          <label for="red" title="red"><span>Red</span></label>

                                      <input type="radio" name="color" id="default" value="default">
                                          <label for="default" title="default"><span>Reset</span></label>
                                          <!-- <input type="radio" name="color" id="filled" value="filled">
                                          <label for="filled" title="filled"><span>Filled</span></label>

                                          <input type="radio" name="color" id="implant" value="implant">
                                          <label for="implant" title="implant"><span>Implant</span></label>

                                          <input type="radio" name="color" id="crown" value="crown">
                                          <label for="crown" title="crown"><span>Crown/Bridge Abutment</span></label>

                                          <input type="radio" name="color" id="abrasion" value="abrasion">
                                          <label for="abrasion" title="abrasion"><span>Abrasion</span></label>

                                          <input type="radio" name="color" id="impacted" value="impacted">
                                          <label for="impacted" title="impacted"><span>Impacted</span></label>

                                          <input type="radio" name="color" id="unerupted" value="unerupted">
                                          <label for="unerupted" title="unerupted"><span>Unerupted</span></label>

                                          <input type="radio" name="color" id="root" value="root">
                                          <label for="root" title="root"><span>Root Canal Treated</span></label> -->


                                          


                                          
                                        </span>
                                        <span class="color-bloack">
                               
                                          
                                        </span>
                                  </div>
                              </div>
                            <div class="col s12 m12 l9">
                              <center><h5>Dental Chart</h5></center>
                              <table align="center">
                            <tbody>
                             <tr>
                                <td colspan="17">
                                  <h6><strong>Labial</strong></h6>
                                </td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>55</td>
                                <td>54</td>
                                <td>53</td>
                                <td>52</td>
                                <td>51</td>
                                <td style="width: 5px;"></td>
                                <td>61</td>
                                <td>62</td>
                                <td>63</td>
                                <td>64</td>
                                <td>65</td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr class="chart-input">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                  <span id="chart_1" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_1" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-1"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                <td>
                                  <span id="chart_2" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_2" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-2"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                <td>
                                  <span id="chart_3" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_3" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-3"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_4" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_4" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-4"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_5" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_5" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-5"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_6" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_6" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-6"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_7" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_7" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-7"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_8" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_8" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-8"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_9" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_9" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-9"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_10" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_10" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-10"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                <td>
                                  <span id="chart_11" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_11" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-11"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-4">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="incisor">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="incisor">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td style="width: 5px;"></td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="incisor">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="incisor">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-4">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                          
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                              </tr>
                              
                              
                              <tr>
                                <td>18</td>
                                <td>17</td>
                                <td>16</td>
                                <td>15</td>
                                <td>14</td>
                                <td>13</td>
                                <td>12</td>
                                <td>11</td>
                                <td style="width: 5px;"></td>
                                <td>21</td>
                                <td>22</td>
                                <td>23</td>
                                <td>24</td>
                                <td>25</td>
                                <td>26</td>
                                <td>27</td>
                                <td>28</td>
                              </tr>
                               <tr class="chart-input">
                                <td>
                                  <span id="chart_12" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_12" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-12"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                <td>
                                  <span id="chart_13" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_13" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-13"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                <td>
                                  <span id="chart_14" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_14" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-14"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_15" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_15" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-15"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_16" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_16" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-16"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_17" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_17" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-17"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_18" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_18" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-18"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_19" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_19" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-19"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_20" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_20" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-20"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_21" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_21" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-21"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                <td>
                                  <span id="chart_22" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_22" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-22"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_23" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_23" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-23"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                  <td>
                                  <span id="chart_24" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_24" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-24"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                  <td>
                                  <span id="chart_25" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_25" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-25"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                  <td>
                                  <span id="chart_26" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_26" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-26"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                  <td>
                                  <span id="chart_27" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_27" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-27"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                  <td>
                                  <span id="chart_28" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_28" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-28"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-4">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="incisor">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="incisor">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td style="width: 5px;">
                                
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="incisor">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="incisor">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-4">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                          
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                              </tr>

                              <tr>
                                <td colspan="17">
                                  <h6><strong>Lingual</strong></h6>
                                </td>
                              </tr>
                            <tr>
                                <td>48</td>
                                <td>47</td>
                                <td>46</td>
                                <td>45</td>
                                <td>44</td>
                                <td>43</td>
                                <td>42</td>
                                <td>41</td>
                                <td style="width: 5px;"></td>
                                <td>31</td>
                                <td>32</td>
                                <td>33</td>
                                <td>34</td>
                                <td>35</td>
                                <td>36</td>
                                <td>37</td>
                                <td>38</td>
                              </tr>


                               <tr class="chart-input">
                                <td>
                                  <span id="chart_29" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_29" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-29"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                <td>
                                  <span id="chart_30" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_30" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-30"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                <td>
                                  <span id="chart_31" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_31" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-31"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_32" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_32" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-32"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_33" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_33" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-33"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_34" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_34" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-34"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_35" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_35" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-35"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_36" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_36" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-36"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                <td>

                                </td>
                                 <td>
                                  <span id="chart_37" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_37" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-37"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_38" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_38" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-38"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                <td>
                                  <span id="chart_39" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_39" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-39"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_40" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_40" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-40"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                  <td>
                                  <span id="chart_41" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_41" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-41"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                  <td>
                                  <span id="chart_42" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_42" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-42"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                  <td>
                                  <span id="chart_43" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_43" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-43"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                  <td>
                                  <span id="chart_44" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_44" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-44"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                
                              </tr>


                              <tr>


                              


                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-4">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="incisor">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="incisor">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td style="width: 5px;">
                                
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="incisor">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="incisor">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-4">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                          
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                              </tr>
                              
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>55</td>
                                <td>54</td>
                                <td>53</td>
                                <td>52</td>
                                <td>51</td>
                                <td style="width: 5px;"></td>
                                <td>61</td>
                                <td>62</td>
                                <td>63</td>
                                <td>64</td>
                                <td>65</td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>

                              <tr class="chart-input">
                                <td></td>
                                <td></td>
                                <td></td>
                                 <td>
                                  <span id="chart_45" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_45" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-45"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                <td>
                                  <span id="chart_46" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_46" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-46"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                <td>
                                  <span id="chart_47" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_47" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-47"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                <td>
                                  <span id="chart_48" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_48" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-48"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_49" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_49" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-49"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                <td>
                                </td>
                                 <td>
                                  <span id="chart_50" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_50" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-50"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_51" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_51" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-51"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_52" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_52" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-52"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_53" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_53" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-53"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                                 <td>
                                  <span id="chart_54" style="border-bottom: 1px solid;width: 35px;display: block;text-align: center;height:18px;margin: 0 auto;"> <input type="text" name="chart_54" style="text-align: center;height: 18px;border-bottom: none;font-size:10px;" id="chart-54"  data-type="currency-rebond-of-bracket" value=""></span>
                                </td>
                               
                               
                                 <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-4">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="incisor">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="incisor">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td style="width: 5px;"></td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="incisor">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="incisor">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-4">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                          
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                  <svg width="40" height="40" transform="scale(1.3,-1.2)" class="premolar-5">
                                    <polygon id="top" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                    <polygon id="left" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                    <polygon id="bottom" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="right" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                    <polygon id="center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />
                                  </svg>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                              </tr>
                               <tr>
                                <td colspan="17">
                                  <h6><strong>Labiel</strong></h6>
                                </td>
                              </tr>
                             </tbody>
                           </table>
                           <div class='right-align' style='margin: 24px 0;'>
                             <button type='button' id='save-dental-chart' class='btn waves-effect waves-light'>
                               <i class='material-icons left'>save</i>Save Dental Chart
                             </button>
                           </div>
                           <script>
                             $(function () {
                               var savedDentalChart = @json($dentalChart);
                               var dentalChart = document.getElementById('view-dental-chart');
                               var tabsCard = document.getElementById('badges');
                               var colorInput = document.getElementById('selected-color');
                               var allowedSurfaceStates = ['unmarked', 'marked-blue', 'marked-black', 'marked-red'];
                               var polygons = Array.prototype.slice.call(
                                 dentalChart.querySelectorAll('polygon')
                               );

                               if (dentalChart.parentElement !== tabsCard) {
                                 tabsCard.appendChild(dentalChart);
                               }

                               document.getElementById('blue').checked = true;
                               colorInput.value = 'blue';

                               Object.keys(savedDentalChart.chart || {}).forEach(function (key) {
                                 var input = dentalChart.querySelector('input[name=' + key + ']');
                                 if (input) {
                                   input.value = savedDentalChart.chart[key] || '';
                                 }
                               });

                               (savedDentalChart.surfaces || []).forEach(function (state, index) {
                                 if (!polygons[index] || allowedSurfaceStates.indexOf(state) === -1) {
                                   return;
                                 }

                                 polygons[index].setAttribute(
                                   'class',
                                   state === 'unmarked' ? 'polygon unmarked' : 'polygon ' + state
                                 );
                               });

                               dentalChart.querySelectorAll('input[name=color]').forEach(function (input) {
                                 input.addEventListener('change', function () {
                                   colorInput.value = input.value;
                                 });
                               });

                               dentalChart.querySelectorAll('input[name^=chart_]').forEach(function (input) {
                                 input.addEventListener('change', function () {
                                   var selectedColor = dentalChart.querySelector('input[name=color]:checked');
                                   colorInput.value = selectedColor ? selectedColor.value : 'blue';
                                 });
                               });

                               polygons.forEach(function (polygon) {
                                 polygon.onclick = function () {
                                   var selectedColor = colorInput.value || 'blue';
                                   polygon.setAttribute(
                                     'class',
                                     selectedColor === 'default'
                                       ? 'polygon unmarked'
                                       : 'polygon marked-' + selectedColor
                                   );
                                 };
                               });

                               window.saveDentalChart = function () {
                                 var chart = {};
                                 var surfaces = polygons.map(function (polygon) {
                                   for (var index = 1; index < allowedSurfaceStates.length; index++) {
                                     if (polygon.classList.contains(allowedSurfaceStates[index])) {
                                       return allowedSurfaceStates[index];
                                     }
                                   }

                                   return 'unmarked';
                                 });
                                 var saveButton = $('#save-dental-chart');

                                 dentalChart.querySelectorAll('input[name^=chart_]').forEach(function (input) {
                                   chart[input.name] = input.value;
                                 });

                                 saveButton.prop('disabled', true);

                                 $.ajax({
                                   type: 'POST',
                                   url: '/patient/{{ $patient_id }}/dental-chart',
                                   data: {
                                     _token: '{{ csrf_token() }}',
                                     chart: chart,
                                     surfaces: surfaces
                                   },
                                   success: function (response) {
                                     M.toast({html: response.message, classes: 'green'});
                                   },
                                   error: function (response) {
                                     var message = response.responseJSON && response.responseJSON.message
                                       ? response.responseJSON.message
                                       : 'The dental chart could not be saved.';
                                     M.toast({html: message, classes: 'red'});
                                   },
                                   complete: function () {
                                     saveButton.prop('disabled', false);
                                   }
                                 });
                               };

                               $('#save-dental-chart').on('click', window.saveDentalChart);
                             });
                           </script>






                            </div>
                          </div>
                          <div>
                      
                        <!-- ////////////////////////// -->
                           
                       
                        </div>





                    <!-- //////////////////////// -->


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- <div id="modal-add-treatment-record" class="modal modal-fixed-footer">
          <div class="modal-content">
            <div class="col s8 m6">
              <h4>Adding treatment record</h4>
            </div>
            <div class="input-field col s4 m6">
              <a class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 float-right modal-trigger" id="add-draw" href="#modal-drawing-area">
                <i class="material-icons">graphic_eq</i>
              </a>
              <a class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 float-right" id="add-treatment-record" onclick="add_fields();">
                <i class="material-icons">add</i>
              </a>
          
            </div>
            <form class="row" id="add-treatment-record-form">
            @csrf
            <input type="hidden" name="drawingLink" id="drawing_link" value="" />
            <input type="hidden" name="patient_id" id="patient_id" value="" />
            <input type="hidden" name="section" id="section" value="" />
              <div class="col s12">
                <div class="input-field col s12">
                <input type="text" class="datepicker" name="date" id="datepicker" required >
                  <label for="last_name">Date</label>
                </div>
              </div>
              <div class="col s12">
                <div class="label">Procedure:</div>
              </div>
              <div class="col s12">
                <div class="input-field col m8 s12">
                  <textarea id="textarea1" name="procedure[]" class="materialize-textarea" data-length="120"></textarea>
                  <label for="textarea1">Procedure</label>
                </div>
              </div>
              @if($userType == '1')
              <div class="col s12">
                <div class="input-field col m6 s12">
                    <input type="text" name="amount-charged[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency">
                    <label for="currency">Amount Charged</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field col m6 s12">
                    <input type="text" name="amount-paid[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency">
                    <label for="currency">Amount Paid</label>
                </div>
                <div class="input-field col m6 s12">
                    <input type="text" name="amount-paid-note[]" id="mount-paid-note">
                    <label for="currency">Note</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field col m6 s12">
                    <input type="text" name="balance[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency">
                    <label for="currency">Balance</label>
                </div>
              </div>
              @else
            
              @endif
              <div id="" class="prodSection prod2 d-none">
                <div class="col s10">
                  <div class="label">Procedure:</div>
                </div>
                <div class="col 2">
                  <div class="label"><i class="material-icons del-treatment-record dp48" style="font-size: 10px;color: #ff4081;" onclick="remove_fields(2)">close</i></div>
                </div>
                <div class="col s12">
                  <div class="input-field col m8 s12">
                    <textarea id="textarea1" name="procedure[]" class="materialize-textarea" data-length="120"></textarea>
                    <label for="textarea1">Procedure</label>
                  </div>
                
                </div>
                @if($userType == '1')
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-charged[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Amount Charged</label>
                  </div>
                </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-paid[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Amount Paid</label>
                  </div>
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-paid-note[]" id="mount-paid-note">
                      <label for="currency">Note</label>
                  </div>
              </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="balance[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Balance</label>
                  </div>
                </div>
                @else
               @endif
              </div>
              <div id="" class="prodSection prod3 d-none">
                <div class="col s10">
                  <div class="label">Procedure:</div>
                </div>
                <div class="col 2">
                  <div class="label"><i class="material-icons del-treatment-record dp48" style="font-size: 10px;color: #ff4081;" onclick="remove_fields(3)">close</i></div>
                </div>
                <div class="col s12">
                  <div class="input-field col m8 s12">
                    <textarea id="textarea1" name="procedure[]" class="materialize-textarea" data-length="120"></textarea>
                    <label for="textarea1">Procedure</label>
                  </div>
                </div>
                @if($userType == '1')
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-charged[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Amount Charged</label>
                  </div>
                </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-paid[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Amount Paid</label>
                  </div>
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-paid-note[]" id="mount-paid-note">
                      <label for="currency">Note</label>
                  </div>
                </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="balance[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Balance</label>
                  </div>
                </div>
                @else
               @endif
              </div>
              <div id="" class="prodSection prod4 d-none">
                <div class="col s10">
                  <div class="label">Procedure:</div>
                </div>
                <div class="col 2">
                  <div class="label"><i class="material-icons del-treatment-record dp48" style="font-size: 10px;color: #ff4081;" onclick="remove_fields(4)">close</i></div>
                </div>
                <div class="col s12">
                  <div class="input-field col m8 s12">
                    <textarea id="textarea1" name="procedure[]" class="materialize-textarea" data-length="120"></textarea>
                    <label for="textarea1">Procedure</label>
                  </div>
                
                </div>
                @if($userType == '1')
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-charged[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Amount Charged</label>
                  </div>
                </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-paid[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Amount Paid</label>
                  </div>
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-paid-note[]" id="mount-paid-note">
                      <label for="currency">Note</label>
                  </div>
                </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="balance[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Balance</label>
                  </div>
                </div>
                @else
               @endif
              </div>
              <div id="" class="prodSection prod5 d-none">
                <div class="col s10">
                  <div class="label">Procedure:</div>
                </div>
                <div class="col 2">
                  <div class="label"><i class="material-icons del-treatment-record dp48" style="font-size: 10px;color: #ff4081;" onclick="remove_fields(5)">close</i></div>
                </div>
                <div class="col s12">
                  <div class="input-field col m8 s12">
                    <textarea id="textarea1" name="procedure[]" class="materialize-textarea" data-length="120"></textarea>
                    <label for="textarea1">Procedure</label>
                  </div>
                </div>
                @if($userType == '1')
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-charged[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Amount Charged</label> 
                  </div>
                </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-paid[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Amount Paid</label>
                  </div>
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-paid-note[]" id="mount-paid-note">
                      <label for="currency">Note</label>
                  </div>
                </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="balance[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Balance</label>
                  </div>
                </div>
                @else
               @endif
              </div>
              <div id="" class="prodSection prod6 d-none">
                <div class="col s10">
                  <div class="label">Procedure:</div>
                </div>
                <div class="col 2">
                  <div class="label"><i class="material-icons del-treatment-record dp48" style="font-size: 10px;color: #ff4081;" onclick="remove_fields(6)">close</i></div>
                </div>
                <div class="col s12">
                  <div class="input-field col m8 s12">
                    <textarea id="textarea1" name="procedure[]" class="materialize-textarea" data-length="120"></textarea>
                    <label for="textarea1">Procedure</label>
                  </div>
                </div>
                @if($userType == '1')
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-charged[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Amount Charged</label>
                  </div>
                </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-paid[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Amount Paid</label>
                  </div>
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-paid-note[]" id="mount-paid-note">
                      <label for="currency">Note</label>
                  </div>
                </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="balance[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Balance</label>
                  </div>
                </div>
                @else
               @endif
              </div>
              <div id="" class="prodSection prod7 d-none">
                <div class="col s10">
                  <div class="label">Procedure:</div>
                </div>
                <div class="col 2">
                  <div class="label"><i class="material-icons del-treatment-record dp48" style="font-size: 10px;color: #ff4081;" onclick="remove_fields(7)">close</i></div>
                </div>
                <div class="col s12">
                  <div class="input-field col m8 s12">
                    <textarea id="textarea1" name="procedure[]" class="materialize-textarea" data-length="120"></textarea>
                    <label for="textarea1">Procedure</label>
                  </div>
                </div>
                @if($userType == '1')
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-charged[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Amount Charged</label>
                  </div>
                </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-paid[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Amount Paid</label>
                  </div>
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-paid-note[]" id="mount-paid-note">
                      <label for="currency">Note</label>
                  </div>
                </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="balance[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Balance</label>
                  </div>
                </div>
                @else
               @endif
              </div>
              <div id="" class="prodSection prod8 d-none">
                <div class="col s10">
                  <div class="label">Procedure:</div>
                </div>
                <div class="col 2">
                  <div class="label"><i class="material-icons del-treatment-record dp48" style="font-size: 10px;color: #ff4081;" onclick="remove_fields(8)">close</i></div>
                </div>
                <div class="col s12">
                  <div class="input-field col m8 s12">
                    <textarea id="textarea1" name="procedure[]" class="materialize-textarea" data-length="120"></textarea>
                    <label for="textarea1">Procedure</label>
                  </div>
                </div>
                @if($userType == '1')
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-charged[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Amount Charged</label>
                  </div>
                </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-paid[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Amount Paid</label>
                  </div>
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-paid-note[]" id="mount-paid-note">
                      <label for="currency">Note</label>
                  </div>
                </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="balance[]" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" disabled>
                      <label for="currency">Balance</label>
                  </div>
                </div>
                @else
               @endif
              </div>
              <div class="col s12">
                  <div class="drawing-section">
                  </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn waves-effect waves-light right submit" type="submit" id="submit-patient-treatment-record" name="action">Add
            </button>
          </div>
        </div>
  @endforeach -->
<!-- Alerts -->
<div class="card-alert card green lighten-5 hide">
  <div class="card-content brown-text">
    <p></p>
  </div>
  <button type="button" class="close brown-text" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
  </div>
</div>
  <!-- Modal  -->
  <div id="modal-view-file" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4></h4>
      <ul class="files-list"></ul>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>
  </div>
    <!-- Modal  -->
    <div id="modal-send-mail-file" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="col s8 m12">
                <h4>Sending email</h4>
       </div>
      <div class="container">
        <div class="row">
          <form id="form-send-email">
            @csrf
            <div class="col s12">
                <div class="input-field col s12">
                <input type="email" class="email" name="email" id="email" required >
                  <label for="last_name">Email</label>
                </div>
              </div>
              <div class="buttons">
              <a href="mailto:test@example.com?subject=Testing out mailto!">First Example</a>
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat float-right"><button class="btn btn-danger btn-sm" >Close</button></a>
                <button class="btn waves-effect waves-light right submit" type="submit" id="" name="action" onclick="sendEmail()">Send</button>
              </div>
          </form>
          </div>
        </div>
    </div>
  </div>
    <!-- Modal -->
    <div id="modal-drawing-area" class="modal">
    <div class="modal-content">
      <div class="container">
        <div class="row">
              <div class="wrapper mb-5 drawing">
                  <canvas id="signature-pad" class="signature-pad" width="500" height="300"></canvas>
              </div>
              <div class="buttons">
                <button id="drawing-save-png" class="btn btn-danger btn-sm">Save</button>
                <button id="drawing-save-png-main" class="btn btn-danger btn-sm" style="display: none;">Save</button>
                <button id="clear" class="btn btn-danger btn-sm">Clear</button>
              </div>
          </div>
        </div>
    </div>
  </div>
  <!-- Modal -->
  <div id="modal-view-patient-sign" class="modal">
    <div class="modal-content">
      <div class="container">
        <div class="row">
          <form id="view-sign-form">
            @csrf
            <input type="hidden" name="section" id="sign-section" />
          </form>
              <div class="wrapper mb-5 ">
                <span id="patient-signature"></span>
                <div id="signature-date"></div>
              </div>
              <div class="buttons">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat "><button class="btn btn-danger btn-sm">Close</button></a>
              </div>
          </div>
        </div>
    </div>
  </div>
  <!-- Modal -->
  <div id="modal-drawing" class="modal">
    <div class="modal-content">
      <div class="container">
        <div class="row">
              <div class="wrapper mb-5 drawing">
                <p></p>
              </div>
              <div class="buttons">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat "><button class="btn btn-danger btn-sm">Close</button></a>
              </div>
          </div>
        </div>
    </div>
  </div>
  
   <!-- Modal -->
   <div id="modal-contract-consent" class="modal">
    <div class="modal-content pb-0">
      <div class="container">
        <div class="row">
            <form id="form-consent" method="post">
             @csrf 
              <input type="hidden" name="html" id="contract_html" value=""/>
              <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
              <input type="hidden" name="consent_type" id="consent_type" value=""/>
              <div class="wrapper mb-5">

                <h4 style="font-size: 18px;text-align: center;font-family: Arial;">CONSENT</h4>

                <div style="font-family: Arial;">
                  @foreach($patientDataInfo as $key => $data)


                     <table style="width: 100%;font-family: Arial;">
                    <tr style="border-bottom: none;">
                      <td style="width: 350px;vertical-align: bottom;" class="w-208">
                          Date: <span style="border-bottom: 2px solid black;">&nbsp;&nbsp;&nbsp;<?php echo date('F j, Y'); ?>&nbsp;&nbsp;&nbsp;</span> | For orthodontic treatment of:
                      </td>
                      <td style="text-align: center;width: 300px;padding: 0; vertical-align: top;border-bottom: 2px solid black;">
                      <span style=""> <span id="treatment_of" style="width: 100%;display: block;text-align: left;height:23px;position: relative;padding: 10px 0;"> <input type="text" name="treatment_of" style="text-align: left;height: 25px;border-bottom: none;width: 100%;" id="treatment-of" ></span>
                      </span>
                      </td>
                    </tr>
                     </table>


                  <p><b><i>Orthodontic treatment remains an elective procedure. It, like any other treatment of the body, has some inherent risk and limitations. These seldom prevent treatment, but should be considered in making the decision to undergo treatment.</i></b></p>

                  <p><b>PREDICTABLE FACTORS THAT CAN AFFECT THE OUTCOME OF ORTHODONTIC TREATMENT:</b></p>

                  <p><b>COOPERATION: In the vast majority of orthodontic cases, significant improvements can be achieved with patient cooperation. Excessive treatment time and/or compromised results can occur from non-cooperation.</b></p>

                  <p><b>CARING for APPLIANCES -</b> Poor tooth brushing increases the risk of decay when wearing braces. Excellent oral hygiene, reduction in sugar, being selective in diet, and reporting any loose bands as soon as noticed, will help minimize decay. white spots (decalcification), and gum problems. Routine visits (3-6 months) to your dentist for cleaning and cavity checks are necessary.</p>

                  <p><b>WEARING RETRACTOR (headgear) and ELASTICS -</b> These are forces placed on teeth so they will move into their proper positions. The amount of time worn affects results. Wear as instructed! If headgear is detached from the tubes or arch wire hooks while the elastic force is engaged, it can snap back and cause injury.</p>
                     
                  <p><b>KEEPING APPOINTMENTS -</b> Missed appointments create many scheduling problems and lengthen treatment time.</p>

                  <p><b>UNPREDICTABLE FACTORS THAT CAN AFFECT THE OUTCOME OF ORTHODONTIC TREATMENT:</b></p>

                  <p><b>MUSCLE HABITS -</b> Mouth breathing. thumb, finger, or lip sucking. tongue thrusting (abnormal swallowing) and other unusual habits can prevent the teeth from moving to their corrected positions or relapse after braces are removed.</p>

                  <p><b>FACIAL GROWTH PATTERNS -</b> Unusual skeletal patterns and insufficient or undesirable facial growth can compromise the dental results, affect a facial change and cause shifting of teeth during retention. Surgical assistance may be recommended in these situations.</p>

                  <p><b>POST TREATMENT TOOTH MOVEMENT -</b> Teeth have a tendency to shift or settle after treatment as well as after retention. Some changes are desirable, others are not. Rotations and crowding of the lower anterior teeth or slight space in the extraction site or between the upper centrals are common examples.</p>
                  
                  <p><b>TEMPOROMANDIBULAR PROBLEMS (TM) -</b> Possible TM problems may develop with this sliding joint on which the lower jaw moves either before, during or after orthodontic treatment. Tooth position, bite or non-symptomatic. pre-existing TM problems can be a factor in this condition. An equilibration (selective smoothing or reshaping the tooth) or other special treatment may be recommended by your dentist to improve occlusal or joint relationship.</p>
                 
                  <p><b>IMPACTED TEETH -</b> In attempting to move impacted teeth (teeth unable to erupt normally). especially cuspids and third molars (wisdom teeth). various problems are sometimes encountered which may lead to periodontal problems. relapse. or loss of teeth.</p>
                  
                  <p><b>ROOT RESORPTION -</b> Shortening of root ends can occur when teeth are moved during orthodontic treatment Under healthy conditions the shortened roots usually are no problem. Trauma, impaction, endocrine disorders or idiopathic (unknown) reasons also cause this problem. Severe resorption can increase the possibility of premature tooth loss.</p>

                  <p><b>NONVITAL or DEAD TOOTH -</b> A tooth traumatized by a blow or other causes can die over a long period of time with or without orthodontic treatment. This tooth may discolor or flare up during orthodontic movement and require endodontic treatment • (root canal)</p>

                  <p><b>PERIODONTAL PROBLEMS (gum disease) -</b> This condition can be present before or develop during treatment It could deteriorate during treatment causing loss of bone around the teeth. Excellent oral hygiene and frequent prophylaxis by your dentist can help control this situation.</p>

                  <p><b>UNUSUAL OCCURRENCES -</b> Swallowing appliances. chipping teeth. dislodging restorations</p>



                     <table style="width: 100%;font-family: Arial;" class="custom-sig-width">
                    <tr style="border-bottom: none;">
                      <td style="width: 260px;vertical-align: top;">
                             <table style="width: 100%;font-family: Arial;border: 1px solid black" class="custom-sig-width">
                            <tr style="border-bottom: none;">
                            <td style="color: black;">
                              <p>I CONSENT TO THE TAKING OF PHOTOGRAPHS AND X-RAYS BEFORE, DURING AND AFTER TREATMENT, AND TO THE USE OF SAME BY THE DOCTOR IN SCIENTIFIC PAPERS OR DEMONSTRATIONS.</p>
                              <br>
                              <p>I CERTIFY THAT I HAVE READ OR HAVE HAD READ TO ME THE CONTENTS OF THIS FORM AND DO REALIZE THE RISKS AND LIMITATIONS INVOLVED, DO CONSENT TO ORTHODONTIC TREATMENT.</p>
                            </td>
                          </tr>
                            </table>
                      </td>
                        <td style="width: 260px;vertical-align: bottom;padding-left: 40px">
                          <table style="width: 400px;font-family: Arial;">
                           <tr>
                            <td style="border-bottom: 1px soli;text-align: center;width: 180px;padding: 0 5px;border-bottom: 2px solid black;">
                            <div class="sign-area patient14" style="display: non;text-align: left;">
                              <i class="material-icons dp48 icon-color-mod" style="color: #ffffff;padding-left: 20px;position: fixed;" onclick="signConsent('patient14')">rate_review</i>
                            </div>
                            <span class="sign-area patient14 signature" style="height: 40px;display: block;"></span>
                            </td>
                          </tr>
                             <tr style="border-bottom: none;">
                            <td style="text-align: center;width: 180px;padding: 0 5px;">
                                  PATIENT
                            </td>
                          </tr>
                           <tr>
                            <td style="border-bottom: 1px soli;text-align: center;width: 180px;padding: 0 5px;border-bottom: 2px solid black;">
                            <div class="sign-area patient15" style="display: non;text-align: left;">
                              <i class="material-icons dp48 icon-color-mod" style="color: #ffffff;padding-left: 20px;position: fixed;" onclick="signConsent('patient15')">rate_review</i>
                            </div>
                            <span class="sign-area patient15 signature" style="height: 40px;display: block;"></span>
                            </td>
                          </tr>
                           <tr style="border-bottom: none;">
                              <td style="text-align: center;width: 180px;padding: 0 5px;">
                                  PARENT/GUARDIAN
                            </td>
                          </tr>
                           <tr>
                            <td style="border-bottom: 1px soli;text-align: center;width: 180px;padding: 0 5px;border-bottom: 2px solid black;">
                            <div class="sign-area patient16" style="display: non;text-align: left;">
                              <i class="material-icons dp48 icon-color-mod" style="color: #ffffff;padding-left: 20px;position: fixed;" onclick="signConsent('patient16')">rate_review</i>
                            </div>
                            <span class="sign-area patient16 signature" style="height: 40px;display: block;"></span>
                            </td>
                          </tr>
                           <tr style="border-bottom: none;">
                               <td style="text-align: center;width: 180px;padding: 0 5px;">
                                  WITNESS
                            </td>
                          </tr>
                        </table>
                      </td>
                     
                    </tr>
                     </table>

                @endforeach
           
        
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('ortho-consent-form')">Save</button>
    </div>
  </div>






  
     <!-- Modal -->
   <div id="modal-informed-consent2" class="modal">
    <div class="modal-content pb-0">
      <div class="container">
        <div class="row">
            <form id="form-informed-consent2" method="post">
             @csrf 
              <input type="hidden" name="html" id="contract_html" value=""/>
              <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
              <input type="hidden" name="consent_type" id="consent_type" value=""/>
              <div class="wrapper mb-5">

                <h4 style="font-size: 18px;text-align: center;font-family: Arial;">INFORMED CONSENT</h4>

                <div style="font-family: Arial;">
                  @foreach($patientDataInfo as $key => $data)

                            <p><b>TREATMENT TO BE DONE:</b> Nauunawaan ko at ako ay nagbibigay ng pahintulot na
                            maisagawa ng dentista ang anumang kinakailangang gamutan matapos maipaliwanag
                            nang buo ang proseso, mga panganib, benepisyo, at gastos. Kabilang sa mga
                            gamutang ito, ngunit hindi limitado sa, ang mga sumusunod: X-ray, paglilinis ng ngipin,
                            periodontal na gamutan, pagpasta, paglalagay ng crown at bridge, lahat ng uri ng
                            pagbunot ng ngipin, root canal, at/o pustiso, paggamit ng lokal na pampamanhid, at
                            mga kasong nangangailangan ng operasyon.</p>

                            <p><b>MGA GAMOT AT MEDIKASYON:</b> Nauunawaan ko na ang mga antibiotic, analgesic, at
                            iba pang gamot ay maaaring magdulot ng allergic reaction tulad ng pamumula at
                            pamamaga ng mga tisyu, pananakit, pangangati, pagsusuka, at/o anaphylactic shock.</p>

                            <p><b>MGA PAGBABAGO SA PLANO NG GAMUTAN:</b> Nauunawaan ko na habang
                            isinasagawa ang gamutan, maaaring kinakailangang baguhin o magdagdag ng mga
                            pamamaraan dahil sa mga kondisyong matutuklasan habang ginagamot ang mga
                            ngipin na hindi nakita sa paunang pagsusuri. Halimbawa, maaaring kailanganin ang
                            root canal therapy matapos ang karaniwang restorative procedures. Ibinibigay ko ang
                            aking pahintulot sa dentista na gawin ang anumang kinakailangang pagbabago o
                            karagdagan, at nauunawaan kong ako ang may pananagutan sa pagbabayad ng lahat
                            ng napagkasunduang gastos.</p>

                            <p><u>Nauunawaan ko na ang Dentistry ay hindi eksaktong agham at walang dentista
                            ang makakapaggarantiya ng ganap na tiyak na resulta sa lahat ng pagkakataon.</u></p>

                            <p><b>TREATMENT TO BE DONE:</b> I understand and consent to have any treatment done by
                            the dentist after the procedure, the risks & benefits & cost have been fully explained.
                            These treatments include, but are not limited to, x-rays, cleanings, periodontal
                            treatments, fillings, crowns, bridges, all types of extraction, root canals, /or dentures,
                            focal anesthetics & surgical cases.</p>

                            <p><b>DRUGS & MEDICATIONS:</b> I understand that antibiotics, analgesics & other
                            medications can causé allergic reactions like redness & swelling of tissues, pain,
                            itching, vomiting, &/or anaphylactic shock. </p>

                            <p><b>CHANGES IN TREATMENT PLAN:</b> I understand hot during treatment it may be
                            necessary to change/add procedures because of conditions found while working on the
                            teeth that were not discovered during examination. For example, root canal therapy may
                            be needed following routine restorative procedures. I give my permission to the dentist
                            to make anyfall changes and additions as necessary with my responsibility to pay all the
                            costs agreed. </p>


                            <p><u>I understand that dentistry is not an exact science and that no dentist can
                            properly guarantee accurate results all the time. </u></p>






                     <table style="width: 100%;font-family: Arial;" class="">
                    <tr style="border-bottom: none;">
                      <td style="width: 35%;vertical-align: top;text-align: center">
                            <div class="sign-area patient20" style="display: non;text-align: left;">
                              <i class="material-icons dp48 icon-color-mod" style="color: #ffffff;padding-left: 20px;position: fixed;" onclick="signConsent('patient20')">rate_review</i>
                            </div>
                            <span class="sign-area patient20 signature" style="height: 60px;display: block;"></span>
                            Patient/ Parent/ Guardian Signature
                      </td>
                      <td style="width: 65%;vertical-align: top;text-align: center;">
                        <span style="padding-top: 40px;">
                          <br>
                          <br>
                          <br>
                          <br>
                          Date: <?php echo date('F j, Y'); ?>
                        </span>
                      
                      </td>
                     
                      </td>
                    </tr>
                    </table>
                @endforeach
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('informed-consent2')">Save</button>
    </div>
  </div>




     <!-- Modal -->
   <div id="modal-restoration" class="modal">
    <div class="modal-content pb-0">
      <div class="container">
        <div class="row">
            <form id="form-restoration" method="post">
             @csrf 
              <input type="hidden" name="html" id="contract_html" value=""/>
              <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
              <input type="hidden" name="consent_type" id="consent_type" value=""/>
              <div class="wrapper mb-5">

                <h4 style="font-size: 18px;text-align: center;font-family: Arial;">PASTA (FILLINGS):</h4>

                <div style="font-family: Arial;">
                  @foreach($patientDataInfo as $key => $data)

                            <p>Nauunawaan ko na kinakailangang mag-ingat sa pagnguya, lalo na sa loob ng unang
24 oras, upang maiwasan ang pagkabasag ng pasta. Nauunawaan ko rin na maaaring
kailanganin ang mas malawak na pasta o crown kung may madiskubreng karagdagang
pagkabulok o bitak matapos ang paunang paglilinis ng sira ng ngipin. Nauunawaan ko
na ang pagkakaroon ng matinding sensitivity ay karaniwan ngunit kadalasang
pansamantala lamang matapos ang paglalagay ng bagong pasta. Nauunawaan ko rin
na ang pagpasta ng ngipin ay maaaring makairita sa nerve tissue at magdulot ng
sensitivity, at ang paggamot dito ay maaaring mangailangan ng root canal therapy o
pagbunot ng ngipin.</p>

<p><u>Nauunawaan ko na ang Dentistry ay hindi eksaktong agham at walang dentista
ang makakapaggarantiya ng ganap na tiyak na resulta sa lahat ng pagkakataon.</u></p>

<p>Sa pamamagitan nito, pinahihintulutan ko ang sinumang doktor o dental auxiliaries na
ipagpatuloy at isagawa ang mga dental restoration at gamutang ipinaliwanag sa akin.
Nauunawaan ko na ang mga ito ay maaaring magbago depende sa mga hindi
inaasahang kundisyon na maaaring lumitaw habang isinasagawa ang gamutan.
Nauunawaan ko rin na anuman ang aking dental insurance coverage, ako pa rin ang
may pananagutan sa pagbabayad ng dental fees. Sumasang-ayon din akong bayaran
ang anumang attorney’s fees, collection fees, o court costs na maaaring kailanganin
upang matugunan ang aking obligasyon sa klinikang ito. Lahat ng gamutan ay
naipaliwanag nang maayos sa akin, at sa anumang hindi inaasahang pangyayari na
maaaring mangyari sa panahon ng procedure, ang attending dentist ay hindi
mananagot sapagkat ito ay aking kusang-loob, na may buong tiwala at kumpiyansa sa
kanya, na sumailalim sa gamutang dental sa ilalim ng kanyang pangangalaga.</p>

<p>
<b>RESTORATION/ FILLINGS:</b><br>
l understand that care must be exercised in chewing on filings, especially during the first
24 hours to avoid breakage. I understand that a more extensive filing or a crown may be
required, as additional decay or fracture may become evident after initial excavation. I
understand that significant sensitivity is a common, but usually temporary, after-eﬀect of
a newly placed filing. I further understand that filling a tooth may irritate the nerve tissue
creating sensitivity & treating such sensitivity would require root canal therapy or
extractions.
</p>

<p><u>I understand that dentistry is not an exact science and that no dentist can
properly guarantee accurate results all the time.</u></p>
<br>
<br><br>
<br>
<p>I hereby authorize any of the doctors/ dental auxiliaries to proceed with & perform the
dental restorations & treatments as explained to me. I understand that these are subject
to modification depending on undiagnosable circumstances that may arise during the
course of treatment. I understand that regardless of any dental insurance coverage |
may have, I am responsible for payment of dental fees, I agree to pay any attorney's
fees, collection fee, or court costs that may be incurred to satisfy any obligation to this
oﬃce. All treatment were property explained to me & any untoward circumstances that
may arise during the procedure, the attending dentist will not be held liable since it is my
free will, with full trust & confidence in him/her, to undergo dental treatment under her
care.</p>

                     <table style="width: 100%;font-family: Arial;" class="">
                    <tr style="border-bottom: none;">
                      <td style="width: 35%;vertical-align: top;text-align: center">
                            <div class="sign-area patient21" style="display: non;text-align: left;">
                              <i class="material-icons dp48 icon-color-mod" style="color: #ffffff;padding-left: 20px;position: fixed;" onclick="signConsent('patient21')">rate_review</i>
                            </div>
                            <span class="sign-area patient21 signature" style="height: 60px;display: block;"></span>
                            Patient/ Parent/ Guardian Signature
                      </td>
                      <td style="width: 65%;vertical-align: top;text-align: center;">
                        <span style="padding-top: 40px;">
                          <br>
                          <br>
                          <br>
                          <br>
                          Date: <?php echo date('F j, Y'); ?>
                        </span>
                      
                      </td>
                     
                      </td>
                    </tr>
                    </table>
                @endforeach
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('restoration')">Save</button>
    </div>
  </div>







  
     <!-- Modal -->
   <div id="modal-extraction" class="modal">
    <div class="modal-content pb-0">
      <div class="container">
        <div class="row">
            <form id="form-extraction" method="post">
             @csrf 
              <input type="hidden" name="html" id="contract_html" value=""/>
              <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
              <input type="hidden" name="consent_type" id="consent_type" value=""/>
              <div class="wrapper mb-5">

                <h4 style="font-size: 18px;text-align: center;font-family: Arial;">EXTRACTION</h4>

                <div style="font-family: Arial;">
                  @foreach($patientDataInfo as $key => $data)

      <p><b>RADYOGRAPIYA (X-RAY):</b> Nauunawaan ko na maaaring kailanganin ang pagkuha ng
X-ray o radiograph bilang bahagi ng diagnostic aid upang makabuo ng pansamantalang
diagnosis ng aking dental problem at makagawa ng maayos na plano ng gamutan.
Gayunpaman, hindi nito ginagarantiyahan ang 100% na katiyakan sa resulta ng
gamutan, sapagkat ang lahat ng dental na paggamot ay maaaring magkaroon ng hindi
inaasahang komplikasyon na maaaring magdulot ng biglaang pagbabago sa plano ng
gamutan at karagdagang gastos.</p>

<p><b>PAGBUBUNOT NG NGIPIN:</b> Nauunawaan ko na may mga alternatibo sa pagbubunot
ng ngipin (tulad ng root canal therapy, crowns, at periodontal surgery, at iba pa), at
lubos kong nauunawaan ang mga ito, kasama ang kanilang mga panganib at
benepisyo, bago ko pahintulutan ang dentista na magbunot ng ngipin at anumang iba
pang kinakailangang istruktura para sa mga nabanggit na dahilan. Nauunawaan ko na
ang pagbubunot ng ngipin ay hindi laging nag-aalis ng lahat ng impeksyon kung
mayroon man, at maaaring kailanganin pa ang karagdagang gamutan. Nauunawaan ko
rin ang mga panganib na kaakibat ng pagbubunot ng ngipin, tulad ng pananakit,
pamamaga, pagkalat ng impeksyon, dry socket, pagkabali ng panga, at pagkawala ng
pakiramdam sa ngipin, labi, dila, at mga nakapaligid na tisyu na maaaring tumagal nang
hindi tiyak na haba ng panahon. Nauunawaan ko na maaaring kailanganin ko ng
karagdagang gamutan mula sa isang espesyalista kung magkaroon ng komplikasyon
habang o matapos ang gamutan.</p>

<p><u>Nauunawaan ko na ang dentistry ay hindi eksaktong agham at walang dentista
ang makakapaggarantiya ng ganap na tiyak na resulta sa lahat ng pagkakataon.</u></p>

<p>Sa pamamagitan nito, pinahihintulutan ko ang sinumang doktor o dental auxiliaries na
ipagpatuloy at isagawa ang mga dental restoration at gamutang ipinaliwanag sa akin.
Nauunawaan ko na ang mga ito ay maaaring magbago depende sa mga hindi
inaasahang kundisyon na maaaring lumitaw habang isinasagawa ang gamutan.
Nauunawaan ko rin na anuman ang aking dental insurance coverage, ako pa rin ang
may pananagutan sa pagbabayad ng dental fees. Sumasang-ayon din akong bayaran
ang anumang attorney’s fees, collection fees, o court costs na maaaring kailanganin
upang matugunan ang aking obligasyon sa klinikang ito. Lahat ng gamutan ay
naipaliwanag nang maayos sa akin, at sa anumang hindi inaasahang pangyayari na
maaaring mangyari sa panahon ng procedure, ang attending dentist ay hindi
mananagot sapagkat ito ay aking kusang-loob, na may buong tiwala at kumpiyansa sa
kanya, na sumailalim sa gamutang dental sa ilalim ng kanyang pangangalaga.</p>

<p><b>RADIOGRAPH:</b> I understand that an x-ray shot or a radiograph may be necessary as
part of diagnostic aid to come up with a tentative diagnosis of my dental problem and to
make a good treatment plan, but, this will not give me a 100% assurance for the
accuracy of the treatment since all dental treatments are subject to unpredictable
complications that later on may lead to sudden change of treatment plan and subject to
new charges.</p>

<p><b>REMOVAL OF TEETH:</b> I understand that alternatives to tooth removal (root canal
therapy, crowns & periodontal surgery, etc.) & I completely understand these
alternatives, including their risk & benefits prior to authorizing the dentist to remove
teeth & any other structures necessary for reasons above. I understand that removing
teeth does not always remove all the infections, it present, & it may be necessary to
have further treatment. I understand the risk involved in having teeth removed, such as
pain, swelling, spread of infection, dry socket, fractured jaw, loss of feeling on the teeth,
lips, tongue & surrounding tissue that can last for an indefinite period of time. I
understand that I may need further treatment under a specialist if complications arise
during or following treatment.</p>

<p><u>I understand that dentistry is not an exact science and that no dentist can
properly guarantee accurate results all the time.</u></p>

<p>I hereby authorize any of the doctors/ dental auxiliaries to proceed with & perform the
dental restorations & treatments as explained to me. I understand that these are subject
to modification depending on undiagnosable circumstances that may arise during the
course of treatment. I understand that regardless of any dental insurance coverage |
may have, I am responsible for payment of dental fees, I agree to pay any attorney's
fees, collection fee, or court costs that may be incurred to satisfy any obligation to this
oﬃce. All treatment were property explained to me & any untoward circumstances that
may arise during the procedure, the attending dentist will not be held liable since it is my
free will, with full trust & confidence in him/her, to undergo dental treatment under her
care.</p>
                     <table style="width: 100%;font-family: Arial;" class="">
                    <tr style="border-bottom: none;">
                      <td style="width: 35%;vertical-align: top;text-align: center">
                            <div class="sign-area patient22" style="display: non;text-align: left;">
                              <i class="material-icons dp48 icon-color-mod" style="color: #ffffff;padding-left: 20px;position: fixed;" onclick="signConsent('patient22')">rate_review</i>
                            </div>
                            <span class="sign-area patient22 signature" style="height: 60px;display: block;"></span>
                            Patient/ Parent/ Guardian Signature
                      </td>
                      <td style="width: 65%;vertical-align: top;text-align: center;">
                        <span style="padding-top: 40px;">
                          <br>
                          <br>
                          <br>
                          <br>
                          Date: <?php echo date('F j, Y'); ?>
                        </span>
                      
                      </td>
                     
                      </td>
                    </tr>
                    </table>
                @endforeach
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('extraction')">Save</button>
    </div>
  </div>





  
     <!-- Modal -->
   <div id="modal-crown" class="modal">
    <div class="modal-content pb-0">
      <div class="container">
        <div class="row">
            <form id="form-crown" method="post">
             @csrf 
              <input type="hidden" name="html" id="contract_html" value=""/>
              <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
              <input type="hidden" name="consent_type" id="consent_type" value=""/>
              <div class="wrapper mb-5">

                <h4 style="font-size: 18px;text-align: center;font-family: Arial;">CROWNS AND BRIDGES</h4>

                <div style="font-family: Arial;">
                  @foreach($patientDataInfo as $key => $data)

                  <p><b>CROWN (CAPS) AT BRIDGES:</b> Nauunawaan ko na ang pag-prepare ng ngipin ay
                  maaaring makairita sa nerve tissue sa loob ng ngipin, na maaaring magdulot ng
                  matinding sensitivity sa init, lamig, at pressure. Ang paggamot sa ganitong iritasyon ay
                  maaaring mangailangan ng paggamit ng espesyal na toothpaste, mouth rinse, o root
                  canal therapy. Nauunawaan ko rin na may mga pagkakataong hindi eksaktong
                  matutugma ang kulay ng natural na ngipin sa artipisyal na ngipin. </p>

                  <p>Nauunawaan ko rin na maaaring pansamantalang crown ang aking isuot, ay madaling
                  matanggal, kaya kailangan kong mag-ingat upang manatili ito hanggang mailagay ang
                  permanenteng crown. Responsibilidad ko ang bumalik para sa permanenteng
                  sementasyon sa loob ng 20 araw mula sa pag-prepare ng ngipin, dahil ang labis na
                  pagkaantala ay maaaring magdulot ng paggalaw ng ngipin na maaaring mangailangan
                  ng paggawa muli ng crown o bridge. Nauunawaan ko rin na magkakaroon ng
                  karagdagang bayad para sa remake kung ito ay dahil sa aking pagkaantala sa
                  permanenteng sementasyon. Nauunawaan ko rin na ang huling pagkakataon upang
                  magpaayos o magpabago ng aking crown, bridge, o cap (kabilang ang hugis, fit, sukat,
                  at kulay) ay bago ang permanenteng sementasyon. 
                  </p>

                  <p><u>Nauunawaan ko na ang dentistry ay hindi eksaktong agham at walang dentista
                  ang makakapaggarantiya ng ganap na tiyak na resulta sa lahat ng pagkakataon. </u></p>

                  <p>Sa pamamagitan nito, pinahihintulutan ko ang sinumang doktor o dental auxiliaries na
                    ipagpatuloy at isagawa ang mga dental restoration at gamutang ipinaliwanag sa akin.
                    Nauunawaan ko na ang mga ito ay maaaring magbago depende sa mga hindi
                    inaasahang kundisyon na maaaring lumitaw habang isinasagawa ang gamutan.
                    Nauunawaan ko rin na anuman ang aking dental insurance coverage, ako pa rin ang
                    may pananagutan sa pagbabayad ng dental fees. Sumasang-ayon din akong bayaran
                    ang anumang attorney’s fees, collection fees, o court costs na maaaring kailanganin
                    upang matugunan ang aking obligasyon sa klinikang ito. Lahat ng gamutan ay
                    naipaliwanag nang maayos sa akin, at sa anumang hindi inaasahang pangyayari na
                    maaaring mangyari sa panahon ng procedure, ang attending dentist ay hindi
                    mananagot sapagkat ito ay aking kusang-loob, na may buong tiwala at kumpiyansa sa
                    kanya, na sumailalim sa gamutang dental sa ilalim ng kanyang pangangalaga. </p>

                  <p><b>CROWNS (CAPS) & BRIDGES:</b> Preparing a tooth may irritate the nerve tissue in the
                    center of the tooth, leaving the tooth extra sensitive to heat, cold & pressure. Treating
                    such irritation may involve using special toothpastes, mouth rinses or root canal therapy.
                    I understand that sometimes it is not possible to match the color of natural teeth exactly
                    with artificial teeth. </p>

                  <p>I further understand that I may be wearing temporary crowns, which may come off
                    easily & that I must be careful to ensure that they are kept on until the permanent
                    crowns are delivered. It is my responsibility to return for permanent cementation within
                    20 days from tooth preparation, as excessive days delay may allow for tooth movement,
                    which may necessitate a remake of the crown. Bridges or cap. l understand there will be
                    additional charges for remakes due to my delaying of permanent cementation, & I
                    realize that final opportunity to make changes in my new crown, bridges or cap
                    (including shape, fit, size,& color) will be before permanent cementation. </p>

                  <p><u>I understand that dentistry is not an exact science and that no dentist can
                    properly guarantee accurate results all the time. </u></p>

                  <p>I hereby authorize any of the doctors/ dental auxiliaries to proceed with & perform the
                  dental restorations & treatments as explained to me. I understand that these are subject
                  to modification depending on undiagnosable circumstances that may arise during the
                  course of treatment. I understand that regardless of any dental insurance coverage |
                  may have, I am responsible for payment of dental fees, I agree to pay any attorney's
                  fees, collection fee, or court costs that may be incurred to satisfy any obligation to this
                  office, All treatment were property explained to me & any untoward circumstances that
                  may arise during the procedure, the attending dentist will not be held liable since it is my
                  free will, with full trust & confidence in him/her, to undergo dental treatment under her
                  care. </p>

    
                     <table style="width: 100%;font-family: Arial;" class="">
                    <tr style="border-bottom: none;">
                      <td style="width: 35%;vertical-align: top;text-align: center">
                            <div class="sign-area patient23" style="display: non;text-align: left;">
                              <i class="material-icons dp48 icon-color-mod" style="color: #ffffff;padding-left: 20px;position: fixed;" onclick="signConsent('patient23')">rate_review</i>
                            </div>
                            <span class="sign-area patient23 signature" style="height: 60px;display: block;"></span>
                            Patient/ Parent/ Guardian Signature
                      </td>
                      <td style="width: 65%;vertical-align: top;text-align: center;">
                        <span style="padding-top: 40px;">
                          <br>
                          <br>
                          <br>
                          <br>
                          Date: <?php echo date('F j, Y'); ?>
                        </span>
                      
                      </td>
                     
                      </td>
                    </tr>
                    </table>
                @endforeach
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('crown')">Save</button>
    </div>
  </div>










    <!-- Modal -->
   <div id="modal-denture" class="modal">
    <div class="modal-content pb-0">
      <div class="container">
        <div class="row">
            <form id="form-denture" method="post">
             @csrf 
              <input type="hidden" name="html" id="contract_html" value=""/>
              <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
              <input type="hidden" name="consent_type" id="consent_type" value=""/>
              <div class="wrapper mb-5">

                <h4 style="font-size: 18px;text-align: center;font-family: Arial;">DENTURE</h4>

                <div style="font-family: Arial;">
                  @foreach($patientDataInfo as $key => $data)

                  <p><b>PUSTISO (DENTURES):</b> Nauunawaan ko na ang pagsusuot ng pustiso ay maaaring
                      maging mahirap. Ang pagkakaroon ng sore spots, pagbabago sa pagsasalita, at hirap
                      sa pagkain ay karaniwang problema. Ang immediate dentures (paglalagay ng pustiso
                      agad pagkatapos ng pagbunot ng ngipin) ay maaaring magdulot ng pananakit at
                      mangailangan ng maraming adjustments at ilang beses na relining.</p>
                  <p>Nauunawaan ko na responsibilidad kong bumalik para sa pag-deliver ng pustiso.
                  Nauunawaan ko rin na ang hindi pagdalo sa nakatakdang appointment para sa delivery
                  ay maaaring magresulta sa hindi maayos na pagkaka-fit ng pustiso. Kung kinakailangan
                  ang remake dahil sa aking pagkaantala ng higit sa 30 araw, magkakaroon ng
                  karagdagang bayad. Nauunawaan ko rin na kakailanganin ang permanenteng relining
                  sa hinaharap, na hindi kasama sa paunang bayad. Nauunawaan ko na ang lahat ng
                  adjustments o pagbabago matapos ang panahong ito ay may kaakibat nang
                  karagdagang singil.</p>

                  <p><u>Nauunawaan ko na ang dentistry ay hindi eksaktong agham at walang dentista
                    ang makakapaggarantiya ng ganap na tiyak na resulta sa lahat ng pagkakataon.</u></p>

                  <p>Sa pamamagitan nito, pinahihintulutan ko ang sinumang doktor o dental auxiliaries na
                    ipagpatuloy at isagawa ang mga dental restoration at gamutang ipinaliwanag sa akin.
                    Nauunawaan ko na ang mga ito ay maaaring magbago depende sa mga hindi
                    inaasahang kundisyon na maaaring lumitaw habang isinasagawa ang gamutan.
                    Nauunawaan ko rin na anuman ang aking dental insurance coverage, ako pa rin ang
                    may pananagutan sa pagbabayad ng dental fees. Sumasang-ayon din akong bayaran
                    ang anumang attorney’s fees, collection fees, o court costs na maaaring kailanganin
                    upang matugunan ang aking obligasyon sa klinikang ito. Lahat ng gamutan ay
                    naipaliwanag nang maayos sa akin, at sa anumang hindi inaasahang pangyayari na
                    maaaring mangyari sa panahon ng procedure, ang attending dentist ay hindi
                    mananagot sapagkat ito ay aking kusang-loob, na may buong tiwala at kumpiyansa sa
                    kanya, na sumailalim sa gamutang dental sa ilalim ng kanyang pangangalaga.</p>

                  <p><b>DENTURES:</b> l understand that wearing of dentures can be diﬃcult. Sore spots, altered
                    speech & diﬃculty in eating are common problems. Immediate dentures (placement of
                    denture immediately after extractions) may be painful: Immediate dentures may require
                    considerable adjusting & several relines. I understand that it is my responsibility to
                    return for delivery of dentures. I understand that failure to keep my delivery appointment
                    may result in poorly fitted dentúres. If a remake is required due to my delays of more
                    than 30 days, there will be additional charges. A permanent reline will be needed later.
                    which is not included in the initial fee. I understand that all adjustment or alterations of
                    any kind after this initial period is subject to charges.</p>

                  <p><u>I understand that dentistry is not an exact science and that no dentist can
                    properly guarantee accurate results all the time.</u></p>

                  <p>I hereby authorize any of the doctors/ dental auxiliaries to proceed with & perform the
                    dental restorations & treatments as explained to me. I understand that these are subject
                    to modification depending on undiagnosable circumstances that may arise during the
                    course of treatment. I understand that regardless of any dental insurance coverage |
                    may have, I am responsible for payment of dental fees, I agree to pay any attorney's
                    fees, collection fee, or court costs that may be incurred to satisfy any obligation to this
                    oﬃce, All treatment were property explained to me & any untoward circumstances that
                    may arise during the procedure, the attending dentist will not be held liable since it is my
                    free will, with full trust & confidence in him/her, to undergo dental treatment under her
                    care.</p>

    
                     <table style="width: 100%;font-family: Arial;" class="">
                    <tr style="border-bottom: none;">
                      <td style="width: 35%;vertical-align: top;text-align: center">
                            <div class="sign-area patient24" style="display: non;text-align: left;">
                              <i class="material-icons dp48 icon-color-mod" style="color: #ffffff;padding-left: 20px;position: fixed;" onclick="signConsent('patient24')">rate_review</i>
                            </div>
                            <span class="sign-area patient24 signature" style="height: 60px;display: block;"></span>
                            Patient/ Parent/ Guardian Signature
                      </td>
                      <td style="width: 65%;vertical-align: top;text-align: center;">
                        <span style="padding-top: 40px;">
                          <br>
                          <br>
                          <br>
                          <br>
                          Date: <?php echo date('F j, Y'); ?>
                        </span>
                      
                      </td>
                     
                      </td>
                    </tr>
                    </table>
                @endforeach
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('denture')">Save</button>
    </div>
  </div>









     <!-- Modal -->
   <div id="modal-root" class="modal">
    <div class="modal-content pb-0">
      <div class="container">
        <div class="row">
            <form id="form-root" method="post">
             @csrf 
              <input type="hidden" name="html" id="contract_html" value=""/>
              <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
              <input type="hidden" name="consent_type" id="consent_type" value=""/>
              <div class="wrapper mb-5">

                <h4 style="font-size: 18px;text-align: center;font-family: Arial;">ROOT CANAL TREATMENT CONSENT</h4>

                <div style="font-family: Arial;">
                  @foreach($patientDataInfo as $key => $data)

                  <p><b>ENDODONTICS (ROOT CANAL):</b> Nauunawaan ko na walang garantiya na ang root
                  canal treatment ay makapagliligtas ng ngipin, at maaaring magkaroon ng mga
                  komplikasyon habang isinasagawa ang gamutan. Nauunawaan ko rin na paminsanminsan,
                  ang mga materyales na ginagamit sa pagpuno ng root canal ay maaaring
                  umabot o lumampas sa dulo ng ngipin, at hindi ito nangangahulugang mabibigo ang
                  gamutan.</p>

                  <p>Nauunawaan ko na ang mga endodontic files at drills ay napakanipis at sensitibong
                  instrumento, at dahil sa stress sa kanilang paggawa at sa pagkakaroon ng calcifications
                  sa ngipin, maaari silang mabali habang ginagamit. Nauunawaan ko na maaaring
                  kailanganin ang referral sa isang endodontist para sa karagdagang gamutan matapos
                  ang root canal treatment, at sumasang-ayon ako na ako ang may pananagutan sa
                  anumang karagdagang gastos para sa gamutang isasagawa ng endodontist.
                  Nauunawaan ko rin na may posibilidad pa ring mabunot ang ngipin sa kabila ng lahat
                  ng pagsisikap na ito ay mailigtas.</p>

                  <p><u>Nauunawaan ko na ang dentistry ay hindi eksaktong agham at walang dentista
                  ang makakapaggarantiya ng ganap na tiyak na resulta sa lahat ng pagkakataon.</u></p>

                  <p>Sa pamamagitan nito, pinahihintulutan ko ang sinumang doktor o dental auxiliaries na
                    ipagpatuloy at isagawa ang mga dental restoration at gamutang ipinaliwanag sa akin.
                    Nauunawaan ko na ang mga ito ay maaaring magbago depende sa mga hindi
                    inaasahang kundisyon na maaaring lumitaw habang isinasagawa ang gamutan.
                    Nauunawaan ko rin na anuman ang aking dental insurance coverage, ako pa rin ang
                    may pananagutan sa pagbabayad ng dental fees. Sumasang-ayon din akong bayaran
                    ang anumang attorney’s fees, collection fees, o court costs na maaaring kailanganin
                    upang matugunan ang aking obligasyon sa klinikang ito. Lahat ng gamutan ay
                    naipaliwanag nang maayos sa akin, at sa anumang hindi inaasahang pangyayari na
                    maaaring mangyari sa panahon ng procedure, ang attending dentist ay hindi
                    mananagot sapagkat ito ay aking kusang-loob, na may buong tiwala at kumpiyansa sa
                    kanya, na sumailalim sa gamutang dental sa ilalim ng kanyang pangangalaga.</p>

                  <p><b>ENDODONTICS (ROOT CANAL):</b> I understand there is no guarantee that a root canal
                    treatment will save a tooth & that complications can occur from the treatment & that
                    occasionally roof canal filling materials may extend through the tooth which does not
                    necessarily aﬀect the success of thetreatment.</p>

                  <p>I understand that endodontic files & drills are very fine instruments & stresses vented in
                    their manufacture & calcifications present in teeth can cause them to break during use. I
                    understand that referral to the endodontist for additional treatments may be necessary
                    following any root canal treatment 6) agree that I am responsible for any additional cost
                    for treatment performed by the endodontist. I understand that a tooth may require
                    removal in spite of all eﬀorts to save it.</p>

                  <p><u>I understand that dentistry is not an exact science and that no dentist can
                    properly guarantee accurate results all the time.</u></p>

                  <p>I hereby authorize any of the doctors/ dental auxiliaries to proceed with & perform the
                      dental restorations & treatments as explained to me. I understand that these are subject
                      to modification depending on undiagnosable circumstances that may arise during the
                      course of treatment. I understand that regardless of any dental insurance coverage |
                      may have, I am responsible for payment of dental fees, I agree to pay any attorney's
                      fees, collection fee, or court costs that may be incurred to satisfy any obligation to this
                      oﬃce, All treatment were property explained to me & any untoward circumstances that
                      may arise during the procedure, the attending dentist will not be held liable since it is my
                      free will, with full trust & confidence in him/her, to undergo dental treatment under her
                      care.</p>
    
                     <table style="width: 100%;font-family: Arial;" class="">
                    <tr style="border-bottom: none;">
                      <td style="width: 35%;vertical-align: top;text-align: center">
                            <div class="sign-area patient25" style="display: non;text-align: left;">
                              <i class="material-icons dp48 icon-color-mod" style="color: #ffffff;padding-left: 20px;position: fixed;" onclick="signConsent('patient25')">rate_review</i>
                            </div>
                            <span class="sign-area patient25 signature" style="height: 60px;display: block;"></span>
                            Patient/ Parent/ Guardian Signature
                      </td>
                      <td style="width: 65%;vertical-align: top;text-align: center;">
                        <span style="padding-top: 40px;">
                          <br>
                          <br>
                          <br>
                          <br>
                          Date: <?php echo date('F j, Y'); ?>
                        </span>
                      
                      </td>
                     
                      </td>
                    </tr>
                    </table>
                @endforeach
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('root')">Save</button>
    </div>
  </div>






  

     <!-- Modal -->
   <div id="modal-trial" class="modal">
    <div class="modal-content pb-0">
      <div class="container">
        <div class="row">
            <form id="form-trial" method="post">
             @csrf 
              <input type="hidden" name="html" id="contract_html" value=""/>
              <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
              <input type="hidden" name="consent_type" id="consent_type" value=""/>
              <div class="wrapper mb-5">

                <h4 style="font-size: 18px;text-align: center;font-family: Arial;">TRIAL DENTURE</h4>

                <div style="font-family: Arial;">
                  @foreach($patientDataInfo as $key => $data)

                  <p><b>PAHINTULOT PARA SA TRIAL WAX DENTURE:</b><br>
                    Nauunawaan ko na ang trial wax denture ay isang paunang yugto sa paggawa ng aking
                    pinal na pustiso, kung saan sinusuri ang fit, kagat, itsura, at kabuuang function nito.
                    Kinikilala ko na nabigyan ako ng pagkakataon na suriin at aprubahan ang ayos ng mga
                    ngipin, kabilang ang kanilang hugis, laki, pagkakaayos, at kulay, pati na rin ang ginhawa
                    at fit ng pustiso.</p>

                  <p>Nauunawaan ko na sa oras na ibigay ko ang aking pahintulot para iproseso ang trial
                  wax denture, wala nang maaaring baguhin nang walang karagdagang bayad at
                  posibleng pagkaantala sa paggawa. Nauunawaan ko rin na maaaring magkaroon ng
                  kaunting pagbabago matapos ang final processing dahil sa mga materyales at proseso
                  sa laboratoryo.</p>

                  <p>Sa aking paglagda/pagpayag, ibinibigay ko ang aking buong pahintulot at awtorisasyon
                    na ipagpatuloy ang pagproseso ng trial wax denture upang maging pinal na pustiso.
                    Kinukumpirma ko na ako ay nasisiyahan sa kasalukuyang ayos ng trial denture at
                    nauunawaan ko ang aking pananagutan sa anumang karagdagang gastos kung
                    sakaling humiling pa ako ng pagbabago matapos ang aking pag-apruba.</p>

                  <p><b>TRIAL WAX DENTURE CONSENT:</b><br>
                      I understand that the trial wax denture is a preliminary stage in the fabrication of my final
                      denture, where the fit, bite, appearance, and overall function are evaluated. I
                      acknowledge that I have been given the opportunity to check and approve the
                      arrangement of the teeth, including their shape, size, alignment, and color, as well as
                      the comfort and fit of the denture.</p>

                  <p>I understand that once I give my approval for the processing of the trial wax denture, no
                  further changes can be made without additional charges and possible delay in
                  completion. I accept that minor discrepancies may still occur after final processing due
                  to material changes and laboratory procedures.</p>

                  <p>By signing/agreeing, I give my full consent and authorization to proceed with the
                    processing of the trial wax denture into its final form. I confirm that I am satisfied with
                    the current trial setup and understand my responsibility for any additional costs should
                    modifications be requested after approval.</p>
                
    
                     <table style="width: 100%;font-family: Arial;" class="">
                    <tr style="border-bottom: none;">
                      <td style="width: 35%;vertical-align: top;text-align: center">
                            <div class="sign-area patient26" style="display: non;text-align: left;">
                              <i class="material-icons dp48 icon-color-mod" style="color: #ffffff;padding-left: 20px;position: fixed;" onclick="signConsent('patient26')">rate_review</i>
                            </div>
                            <span class="sign-area patient26 signature" style="height: 60px;display: block;"></span>
                            Patient/ Parent/ Guardian Signature
                      </td>
                      <td style="width: 65%;vertical-align: top;text-align: center;">
                        <span style="padding-top: 40px;">
                          <br>
                          <br>
                          <br>
                          <br>
                          Date: <?php echo date('F j, Y'); ?>
                        </span>
                      
                      </td>
                     
                      </td>
                    </tr>
                    </table>
                @endforeach
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('trial')">Save</button>
    </div>
  </div>




     <!-- Modal -->
   <div id="modal-informed-consent" class="modal">
    <div class="modal-content pb-0">
      <div class="container">
        <div class="row">
            <form id="form-informed-consent" method="post">
             @csrf 
              <input type="hidden" name="html" id="contract_html" value=""/>
              <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
              <input type="hidden" name="consent_type" id="consent_type" value=""/>
              <div class="wrapper mb-5">

                <h4 style="font-size: 18px;text-align: center;font-family: Arial;">INFORMED CONSENT</h4>

                <div style="font-family: Arial;">
                  @foreach($patientDataInfo as $key => $data)


              






<p><b>TREATMENT TO BE DONE:</b> I understand and consent to have any treatment done by the dentist after the procedure, the risks & benefits & cost have been fully explained. These treatments include, but are not limited to, x-rays, cleanings, periodontal treatments, fillings, crowns, bridges, all types of extraction, root canals, /or dentures, focal anesthetics & surgical cases.</p>

<p><b>DRUGS & MEDICATIONS:</b> I understand that antibiotics, analgesics & other medications can causé allergic reactions like redness & swelling of tissues, pain, itching, vomiting, &/or anaphylactic shock.</p>

<p><b>CHANGES IN TREATMENT PLAN:</b> I understand hot during treatment it may be necessary to change/add procedures because of conditions found while working on the teeth that were not discovered during examination. For example, root canal therapy may be needed following routine restorative procedures. I give my permission to the dentist to make anyfall changes and additions as necessary with my responsibility to pay all the costs agreed.</p>

<p><b>RADIOGRAPH:</b> I understand that an x-ray shot or a radiograph may be necessary as part of diagnostic aid to come up with a tentative diagnosis of my dental problem and to make a good treatment plan, but, this will not give me a 100% assurance for the accuracy of the treatment since all dental treatments are subject to unpredictable complications that later on may lead to sudden change of treatment plan and subject to new charges.</p>

<p><b>EMOVAL OF TEETH:</b> I understand that alternatives to tooth removal (root canal therapy, crowns & periodontal surgery, etc.) & I completely understand these alternatives, including their risk & benefits prior to authorizing the dentist to remove teeth & any other structures necessary for reasons above. I understand that removing teeth does not always remove all the infections, it present, & it may be necessary to have further treatment. I understand the risk involved in having teeth removed, such as pain, swelling, spread of infection, dry socket, fractured jaw, loss of feeling on the teeth, lips, tongue & surrounding tissue that can last for an indefinite period of time. I understand that I may need further treatment under a specialist if complications arise during or following treatment.</p>

<p><b>CROWNS (CAPS) & BRIDGES:</b> Preparing a tooth may irritate the nerve tissue in the center of the tooth, leaving the tooth extra sensitive to heat, cold & pressure. Treating such irritation may involve using special toothpastes, mouth rinses or root canal therapy. I understand that sometimes it is not possible to match the color of natural teeth exactly with artificial teeth. I further understand that I may be wearing temporary crowns, which may come off easily & that I must be careful to ensure that they are kept on until the permanent crowns are delivered. It is my responsibility to return for permanent cementation within 20 days from tooth preparation, as excessive days delay may allow for tooth movement, which may necessitate a remake of the crown. Bridges or cap. l understand there will be additional charges for remakes due to my delaying of permanent cementation, & I realize that final opportunity to make changes in my new crown, bridges or cap (including shape, fit, size,& color) will be before permanent cementation.</p>

<p><b>ENDODONTICS (ROOT CANAL):</b> I understand there is no guarantee that a root canal treatment will save a tooth & that complications can occur from the treatment & that occasionally roof canal filling materials may extend through the tooth which does not necessarily affect the success of the treatment.</p>

<p>I understand that endodontic files & drills are very fine instruments & stresses vented in their manufacture & calcifications present in teeth can cause them to break during use. I understand that referral to the endodontist for additional treatments may be necessary following any root canal treatment 6) agree that I am responsible for any additional cost for treatment performed by the endodontist. I understand that a tooth may require removal in spite of all efforts to save it.</b></p>

<p><b>PERIODONTAL DISEASE:</b> l understand that periodontal disease is a serious condition causing gum & bone inflammations /or loss & that can lead eventually to the loss of my teeth. I understand the alternative treatment plans to correct periodontal disease, including gum surgery tooth extractions with or without replacement. I understand that undertaking any dental procedures may have future adverse effects on my periodontal conditions.</p>

<p><b>FILLINGS:</b> l understand that care must be exercised in chewing on filings, especially during the first 24 hours to avoid breakage. I understand that a more extensive filing or a crown may be required, as additional decay or fracture may become evident after initial excavation. I understand that significant sensitivity is a common, but usually temporary, after-effect of a newly placed filing. I further understand that filling a tooth may irritate the nerve tissue creating sensitivity & treating such sensitivity would require root canal therapy or extractions.</p>

<p><b>DENTURES:</b> l understand that wearing of dentures can be difficult. Sore spots, altered speech & difficulty in eating are common problems. Immediate dentures (placement of denture immediately after extractions) may be painful: Immediate dentures may require considerable adjusting & several relines. I understand that it is my responsibility to return for delivery of dentures. I understand that failure to keep my delivery appointment may result in poorly fitted dentúres. If a remake is required due to my delays of more than 30 days, there will be additional charges. A permanent reline will be needed later. which is not included in the initial fee. I understand that all adjustment or alterations of any kind after this initial period is subject to charges.</p>

<p><b><u>I understand that dentistry is not an exact science and that no dentist can properly guarantee accurate results all the time.</u></b></p>

<p>I hereby authorize any of the doctors/ dental auxiliaries to proceed with & perform the dental restorations & treatments as explained to me. I understand that these are subject to modification depending on undiagnosable circumstances that may arise during the course of treatment. I understand that regardless of any dental insurance coverage | may have, I am responsible for payment of dental fees, I agree to pay any attorney's fees, collection fee, or court costs that may be incurred to satisfy any obligation to this office, All treatment were property explained to me & any untoward circumstances that may arise during the procedure, the attending dentist will not be held</p>

<p>liable since it is my free will, with full trust & confidence in him/her, to undergo dental treatment under her care.</p>








                     <table style="width: 100%;font-family: Arial;" class="">
                    <tr style="border-bottom: none;">
                      <td style="width: 33%;vertical-align: top;text-align: center">
                            <div class="sign-area patient17" style="display: non;text-align: left;">
                              <i class="material-icons dp48 icon-color-mod" style="color: #ffffff;padding-left: 20px;position: fixed;" onclick="signConsent('patient17')">rate_review</i>
                            </div>
                            <span class="sign-area patient17 signature" style="height: 40px;display: block;"></span>
                            Patient/ Parent/ Guardian Signature
                      </td>
                      <td style="width: 33%;vertical-align: top;text-align: center;">
                           <div class="sign-area patient18" style="display: non;text-align: left;">
                              <i class="material-icons dp48 icon-color-mod" style="color: #ffffff;padding-left: 20px;position: fixed;" onclick="signConsent('patient18')">rate_review</i>
                            </div>
                            <span class="sign-area patient18 signature" style="height: 40px;display: block;"></span>
                            Dentist
                      </td>
                      <td style="width: 33%;vertical-align: top;text-align: center;">
                          <div class="sign-area patient19" style="display: non;text-align: left;">
                              <i class="material-icons dp48 icon-color-mod" style="color: #ffffff;padding-left: 20px;position: fixed;" onclick="signConsent('patient19')">rate_review</i>
                            </div>
                            <span class="sign-area patient19 signature" style="height: 40px;display: block;"></span>
                            Dentist
                      </td>
                    </tr>
                    </table>
          

                @endforeach
           
        
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('informed-consent')">Save</button>
    </div>
  </div>




     <!-- Modal -->
     <div id="modal-contract-for-tmj" class="modal">
    <div class="modal-content pb-0">
      <div class="container">
        <div class="row">
            <form id="form-consent-tmj" method="post">
             @csrf
              <input type="hidden" name="html" id="contract_tmj_html" value=""/>
              <input type="hidden" name="consent_patient_id" id="consent_tmj_patient_id" value=""/>
              <input type="hidden" name="consent_type" id="consent_tmj_type" value=""/>
              <input type="hidden" name="tmj_initial_payment" id="hidden-tmj-initial-payment" value=""/>
              <input type="hidden" name="tmj_installation" id="hidden-tmj-installation" value=""/>
              <input type="hidden" name="tmj_permission_to" id="hidden-tmj-permission-to" value=""/>
              <input type="hidden" name="chief_compaint" id="hidden-chief-compaint" value=""/>
              <input type="hidden" name="other_symptoms" id="hidden-other-symptoms" value=""/>
              <input type="hidden" name="medical_history" id="hidden-medical-history" value=""/>
              <input type="hidden" name="dental_history" id="hidden-dental-history" value=""/>
              <input type="hidden" name="co_1add" id="hidden-co-1add" value=""/>
              <input type="hidden" name="co_1" id="hidden-co-1" value=""/>
              <input type="hidden" name="co_2a" id="hidden-co-2a" value=""/>
              <input type="hidden" name="co_2b" id="hidden-co-2b" value=""/>
              <input type="hidden" name="co_3" id="hidden-co-3" value=""/>
              <input type="hidden" name="co_4" id="hidden-co-4" value=""/>
              <input type="hidden" name="radiographic_analysis" id="hidden-radiographic-analysis" value=""/>
              <input type="hidden" name="phase_2" id="hidden-phase-2" value=""/>
              <input type="hidden" name="phase_3" id="hidden-phase-3" value=""/>
              <input type="hidden" name="treatment_fee" id="hidden-treatment-fee" value=""/>
              <input type="hidden" name="tf_phase_1" id="hidden-tf-phase-1" value=""/>
              <input type="hidden" name="tf_phase_2en3" id="hidden-tf-phase-2en3" value=""/>

              
              <div class="wrapper mb-5">
                <div style="font-family: Arial;">
            <div class="bg-banner" style="  background-image: url('https://sagundentalclinic.com/banner.jpg');height: 107px; width: 100%;background-size: 100%;background-repeat: no-repeat;background-position: center;">
                  <img src="assets/files/banner.jpg" style="width: 100%;" />
                </div>
                <br>
                <h4 style="font-size: 28px;">(TMJ) TEMPOROMANDIBULAR JOINT DISORDER</h4>
                @foreach($patientDataInfo as $key => $data)
                <p style="line-height: 1.3;display: flex;margin-top: 5px;">
                <table style="width: 100%;font-family: Arial;">
                    <tr style="border-bottom: none;">
                      <td style="width: 60px;">
                        Name: 
                      </td>
                      <td style="border-bottom: 1px solid;">
                      {{$data->firstName}} {{$data->lastName}} 
                      </td>
                    </tr>
                    <tr style="border-bottom: none;">
                      <td style="width: 60px;">
                        Age: 
                      </td>
                      <td style="border-bottom: 1px solid;">
                      {{$data->age}}
                      </td>
                    </tr>
                  </table>
                </p>
                <p style="line-height: 1.3;display: flex;margin-top: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  The treatment you are about to receive is mainly orthopedic in nature for the purpose of correcting your jaw relationship. The use of an orthopedic appliance (splint) helps you to provide stable occlusion and to relieve you from pain and discomfort associated with retrusion of your lower jaw (condyle) to the temporal fossa (glenoid fossa) of temporal bone resulting to the symptoms of TMJ disorder.
                </p>

                <p style="line-height: 1.3;display: flex;margin-top: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  The first stage of the splint therapy is basically for six months period and considered to be reversible. Having TMJ disorder is comparable to a condition like a foot that was pressed with a log if you remove the log, it still hurt the foot and the soreness cannot be relieve right away, given ample time to adjust in a new circumstances.
                </p>
                <p style="line-height: 1.3;display: flex;margin-top: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  You’re likely to lessen some of the symptoms but definitely not all. Just have patience in wearing the appliance. Do some stretching exercises, nutritional supplement, hot moist pack and pharmacological agent. Do not bite hard on splint. Consider new position of your jaw (teeth apart; lip close).
                </p>
                <p style="line-height: 1.3;display: flex;margin-top: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  Wearing the appliance, eating is difficult so you have to chew slowly and talk slowly, practice more with the splint in the mouth. If you have any soreness in the gum, just call the office for appointment.
                </p>
                <p style="line-height: 1.3;margin-top: 35px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Considering TMJ pain is multi-factorial in origin, it needs multidisciplinary approach. Once splint is place in your mouth there should be repositioning of the jaw and lengthening the muscles of mouth and face. There is always memory of muscle that's <strong>THE REASON PAIN IS ALWAYS COMING BACK.</strong> After 3-4 months, muscle will be stable and second phase of treatment can be started.
                </p>
                  <p style="line-height: 1.3;margin-top: 35px;margin-left: 20px;">
                    •	The specified amount that you will pay is inclusive only on the TMJ therapy such as:
                    Occlusal appliance with monthly resurfacing.
                    </p>
                  <p style="line-height: 1.3;margin-top: 25px;margin-left: 20px;">
                   The second stage of the therapy is finishing or permanent restoration which is irreversible. At this point we will discuss the different options on how to finish the case.
                </p>
                <div style="page-break-before: always"></div>
                <p style="line-height: 1.3;margin-top: 25px;margin-left: 20px;">
                OPTIONS SUCH AS:
                <ul style="margin-left: 45px;">
                  <li> Orthodontics</li>
                  <li> Fixed partial denture</li>
                  <li> Complete denture</li>
                  <li> Light cure build ups on lays</li>
                  <li> Metal crown</li>
                  <li> Or any combination of above option</li>
                </ul>
                </p>
                <p style="line-height: 1.3;margin-top: 25px;margin-left: 20px;">
                  Estimated cost will follow after the final decision of the patient.
                </p>
                <p style="line-height: 1.3;margin-top: 25px;margin-left: 20px;">
                  To avert any misunderstanding, we will be happy to discuss the information with you.
                </p>
                <p style="padding-top: 25px;line-height: 1;display: flex;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                The fee for TMJ therapy is  <span id="tmj_initial_payment" style="border-bottom: 1px solid;width: 181px;display: bloc;text-align: center;height:23px;position: relative;"> <input type="text" name="tmj_initial_payment" style"text-align: center;height: 25px;border-bottom: none;border: 1px solid white;" id="tmj-initial-payment"  data-type="currency-tmj-initial-payment" value=""></span>initial payment upon installation <br>
                </p>
                <p style="line-height: 1;display: flex;">
                  of the splint and amount of <span id="tmj_installation" style="border-bottom: 1px solid;width: 238px;display: bloc;text-align: center;height:23px;"> <input type="text" name="tmj_installation" style"text-align: center;height: 25px;border-bottom: none;" id="tmj-installation"  data-type="currency-tmj-installation" value=""></span> every check-up or per visit.
                </p>
                <p style="line-height: 1.3;display: flex;margin-top: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                There will be NO REFUND of payment as soon as the treatment has been started.
                </p>
                <p style="line-height: 1.3;display: flex;margin-top: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                I HAVE BEEN FULLY INFOREMED OF THE DIAGNOSIS AND PROPOSED DENTAL ORAL
                </p>
                <p style="line-height: 1.3;display: flex;">

                 TREATMENT AND HEREBY GRANT PERMISSION TO <span id="tmj_permission_to" style="border-bottom: 1px solid;width: 260px;display: bloc;text-align: center;height:23px;"> <input type="text" name="tmj_permission_to" style"text-align: center;height: 25px;border-bottom: none;" id="tmj-permission-to"  data-type="" value=""></span> AND HIS/HER STAFF
                 </p>
                <p style="line-height: 1.3;display: flex;">
                TO RENDER THE PROPOSED TREATMENT.
                </p>
                <table style="width: 100%;font-family: Arial;">
                  <tr style="border-bottom: none;">
                    <td style="width: 40%;padding: 0;height: 100px;">
                      <div class="sign-area patient8" style="display: none;">
                        <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('patient8')">rate_review</i>
                      </div>
                      <span class="sign-area patient8 signature" style"text-align: center;height: 59px;display: block;"></span>
                    </td>
                    <td style="width: 10%;padding: 0;">
                    </td>
                    <td style="width: 17%;padding: 0;">
                     
                    </td>
                    <td style="width: 10%;padding: 0;">
                    </td>
                    <td style="width: 25%;padding: 0;vertical-align: botto;text-align: center;">
                      <span id="signer-name" style="font-size: 16px;"><?php echo date('F j, Y'); ?></span>
                    </td>
                  </tr>
                  <tr style="border-bottom: none;">
                  <td style="border-top: 1px soli;text-align: center;">
                    <div class="resign">
                    PATIENT SIGNATURE OVER PRINTED NAME	
                    </div>
                  </td>
                  <td></td>
                  <td style"text-align: center;">
                  </td>
                  <td></td>
                  <td style="border-top: 1px soli;text-align: center;">
                    Date
                  </td>
                  </tr>
                </table>

                <div style="page-break-before: always"></div>

                <table style="width: 100%;font-family: Arial;">
                    <tr style="border-bottom: none;">
                      <td style="width: 60px;">
                        Name: 
                      </td>
                      <td style="border-bottom: 1px solid;">
                      {{$data->firstName}} {{$data->lastName}} 
                      </td>
                    </tr>
                    <tr style="border-bottom: none;">
                      <td style="width: 60px;">
                        Age: 
                      </td>
                      <td style="border-bottom: 1px solid;">
                      {{$data->age}}
                      </td>
                    </tr>
                    <tr style="border-bottom: none;">
                      <td style="width: 60px;">
                        Gender: 
                      </td>
                      <td style="border-bottom: 1px solid;">
                      {{$data->sex}}
                      </td>
                    </tr>
                    <tr style="border-bottom: none;">
                      <td style="width: 60px;">
                        Date: 
                      </td>
                      <td style="border-bottom: 1px solid;">
                      <?php echo date('F j, Y'); ?>
                      </td>
                    </tr>
                  </table>

                @endforeach
                <p style="line-height: 1.3;">
                 <strong>CHIEF COMPLAINT:</strong><br>
                 <table style="width: 100%;min-height: 300px;">
                 <span id="chief_compaint" style="padding-left: 20px;width: 100%;display: bloc;text-align: left;min-height:223px;border: 1px solid #8080801f"> <textarea name="chief_compaint" style="margin-top: 17p;text-align: left;min-height: 225px;border: 0;width: 100%;" id="chief-compaint"  data-type="" value=""></textarea></span>
                </p>
                <p style="line-height: 1.3;">
                 <strong>OTHER SYMPTOMS:</strong><br>
                 <span id="other_symptoms" style="padding-left: 20px;width: 100%;display: bloc;text-align: left;min-height:223px;border: 1px solid #8080801f"> <textarea name="other_symptoms" style="margin-top: 17p;text-align: left;min-height: 225px;border: 0;width: 100%;" id="other-symptoms"  data-type="" value=""></textarea></span>
                </p>
                <p style="line-height: 1.3;">
                 <strong>MEDICAL HISTORY:</strong><br>
                 <span id="medical_history" style="padding-left: 20px;width: 100%;display: bloc;text-align: left;min-height:223px;border: 1px solid #8080801f"> <textarea name="medical_history" style="margin-top: 17p;text-align: left;min-height: 225px;border: 0;width: 100%;" id="medical-history"  data-type="" value=""></textarea></span>
                </p>
                <p style="line-height: 1.3;">
                 <strong>DENTAL HISTORY:</strong><br>
                 <span id="dental_history" style="padding-left: 20px;width: 100%;display: bloc;text-align: left;min-height:223px;border: 1px solid #8080801f"> <textarea name="dental_history" style="margin-top: 17p;text-align: left;min-height: 225px;border: 0;width: 100%;" id="dental-history"  data-type="" value=""></textarea></span>
                </p>

                <p style="line-height: 1.3;">
                 <strong>CLINICAL OBSERVATION:</strong><br>
                 <table style="width: 600px;font-family: Arial;">
                 <tr class="bb-none">
                      <td style="width: 195px;display: flex;">
                      <span>1.</span>&nbsp;&nbsp;&nbsp; <span>IIO (Initial Incisal Opening) = </span>
                      </td>
                      <td style="border-bottom: 1px solid">
                        <span id="co_1add" style="width: 260px;display: bloc;text-align: center;height:23px;"> <input type="text" name="co_1add" style"text-align: center;height: 25px;border-bottom: none;" id="co-1add"  data-type="" value=""></span>
                      </td>
                      <td>
                        N = 42mm
                      </td>
                    </tr>
                 <tr class="bb-none">
                      <td style="width: 195px;display: flex;">
                      2.&nbsp;&nbsp;&nbsp; <span>IGD (Intergingival Distance) = </span>
                      </td>
                      <td style="border-bottom: 1px solid">
                        <span id="co_1" style="width: 260px;display: bloc;text-align: center;height:23px;"> <input type="text" name="co_1" style"text-align: center;height: 25px;border-bottom: none;" id="co-1"  data-type="" value=""></span>
                      </td>
                      <td>
                        N=17-21mm
                      </td>
                    </tr>
                    <tr class="bb-none">
                      <td>3.&nbsp;&nbsp;&nbsp;Lateral excursion     </td>
                      <td>  N=9-12mm</td>
                      <td></td>
                    </tr>
                  </table>  

                  <table style="margin-left: 40px;width: 500px;font-family: Arial;">
                      <tr class="bb-none">
                        <td style="width: 155px;">A.&nbsp;&nbsp;&nbsp;Right =</td>
                        <td style="border-bottom: 1px solid">
                          <span id="co_2a" style="width: 260px;display: bloc;text-align: center;height:23px;"> <input type="text" name="co_2a" style"text-align: center;height: 25px;border-bottom: none;" id="co-2a"  data-type="" value=""></span>
                        </td>
                      </tr>
                      <tr class="bb-none">
                        <td>
                        B.&nbsp;&nbsp;&nbsp;Left = 
                        </td>
                        <td style="border-bottom: 1px solid">
                        <span id="co_2b" style="width: 260px;display: bloc;text-align: center;height:23px;"> <input type="text" name="co_2b" style"text-align: center;height: 25px;border-bottom: none;" id="co-2b"  data-type="" value=""></span>
                        </td>
                      </tr>
                    </table>

                    <table style="width: 600px;font-family: Arial;">
                    <tr class="bb-none">
                      <td style="width: 155px;">
                     4.&nbsp;&nbsp;&nbsp;Overjet 
                      </td>
                      <td style="border-bottom: 1px solid">
                        <span id="co_3" style="width: 260px;display: bloc;text-align: center;height:23px;"> <input type="text" name="co_3" style"text-align: center;height: 25px;border-bottom: none;" id="co-3"  data-type="" value=""></span>
                      </td>
                      <td>
                      N=1-1.5mm
                      </td>
                    </tr>
                    <tr class="bb-none">
                      <td>5.&nbsp;&nbsp;&nbsp;	Overbite</td>
                      <td style="border-bottom: 1px solid">
                        <span id="co_4" style="width: 260px;display: bloc;text-align: center;height:23px;"> <input type="text" name="co_4" style"text-align: center;height: 25px;border-bottom: none;" id="co-4"  data-type="" value=""></span>
                      </td>
                      <td></td>
                    </tr>
                  </table>  
                  <p style="line-height: 1.3;">
                    <strong>RADIOGRAPHIC ANALYSIS:</strong><br>
                    <span id="radiographic_analysis" style="padding-left: 20px;width: 100%;display: bloc;text-align: left;min-height:223px;border: 1px solid #8080801f"> <textarea name="radiographic_analysis" contenteditable="true" style="margin-top: 17p;text-align: left;min-height: 225px;border: 0;width: 100%;" id="radiographic-analysis"  data-type="" value=""></textarea></span>
                  </p>
                <div style="page-break-before: always"></div>
                <p style="line-height: 1.3;">
                 <strong>PHASE I: TMJ THERAPY</strong><br>
                </p>
                <p style="line-height: 1.3;">
                    •	To repositioning the jaw down and forward and to decompress the structures located behind the <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;condyles.
                </p>
                <p style="line-height: 1.3;">
                    •	To rehabilitate the muscles and to bring it back into its physiologic length.
                </p>
                <p style="line-height: 1.3;">
                  •	To maintain proper occlusal plane.
                </p>
                <p style="line-height: 1.3;">
                <strong>PHASE II: STABILIZATION OF BITE</strong><br>
                 <span id="phase_2" style="padding-left: 20px;width: 100%;display: bloc;text-align: left;min-height:223px;border: 1px solid #8080801f"> <textarea name="phase_2" style="margin-top: 17p;text-align: left;min-height: 225px;border: 0;width: 100%;" id="phase-2"  data-type="" value=""></textarea></span>
                </p>
                <p style="line-height: 1.3;">
                <strong>PHASE III: STABILIZATION OF BITE</strong><br>
                 <span id="phase_3" style="padding-left: 20px;width: 100%;display: bloc;text-align: left;min-height:223px;border: 1px solid #8080801f"> <textarea name="phase_3" style="margin-top: 17p;text-align: left;min-height: 225px;border: 0;width: 100%;" id="phase-3"  data-type="" value=""></textarea></span>
                </p>
                <p style="line-height: 1.3;">
                <strong>TREATMENT FEE:</strong>
                  <span id="treatment_fee" style="width: 260px;display: bloc;text-align: center;height:23px;"> <input type="text" name="treatment_fee" style="text-align: center;height: 25px;border-bottom: none;" id="treatment-fee"  data-type="" value=""></span>
                </p>

                <p style="line-height: 1.3;">
                PHASE I<br>
                 <span id="tf_phase_1" style="padding-left: 20px;width: 100%;display: bloc;text-align: left;min-height:223px;border: 1px solid #8080801f"> <textarea name="tf_phase_1" style="margin-top: 17p;text-align: left;min-height: 225px;border: 0;width: 100%;" id="tf-phase-1"  data-type="" value=""></textarea></span>
                </p>
                <p style="line-height: 1.3;">
                PHASE II & III<br>
                <div style="padding-left: 50px;display: block;">To be discussed after PHASE I treatment</div>
                  <span id="tf_phase_2en3" style="padding-left: 20px;width: 100%;display: bloc;text-align: left;min-height:223px;border: 1px solid #8080801f"> <textarea name="tf_phase_2en3" style="margin-top: 17p;text-align: left;min-height: 225px;border: 0;width: 100%;" id="tf-phase-2en3"  data-type="" value=""></textarea></span>
                </p>
              
                <!-- <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br> -->
                <table style="width: 400px;font-family: Arial;">
                    <tr style="border-bottom: none;">
                      <td style="width: 60px;vertical-align: bottom;">
                      Conforme: 
                      </td>
                      <td style="border-bottom: 1px solid;">
                      <div class="sign-area patient9" style="display: none;">
                        <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('patient9')">rate_review</i>
                      </div>
                      <span class="sign-area patient9 signature" style="text-align: center;height: 59px;display: block;"></span>
                      
                      <span style="text-align: center;display: block;">{{$data->firstName}} {{$data->lastName}}</span>
                      </td>
                    </tr>
                    <tr style="border-bottom: none;">
                      <td style="width: 60px;">
                        Date: 
                      </td>
                      <td style="border-bottom: 1px solid;">
                      <?php echo date('F j, Y'); ?>
                      </td>
                    </tr>
                  </table>
                        

              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('contract-for-tmj')">Save</button>
    </div>
  </div>



                        <!-- doc concent -->
    <!-- Modal -->
    <div id="modal-ortho-contact" class="modal">
    <div class="modal-content pb-0">
      <div class="container">
        <div class="row">
            <form id="form-downpayment" method="post">
             @csrf
              <input type="hidden" name="html" id="contract_downpayment_html" value=""/>
              <input type="hidden" name="consent_patient_id" id="consent_downpayment_patient_id" value=""/>
              <input type="hidden" name="consent_type" id="consent_downpayment_type" value=""/>
              <input type="hidden" name="dp-sched" id="hidden-dp-sched" value=""/>
              <input type="hidden" name="attending-dentist" id="hidden-attending-dentist" value=""/>
              <input type="hidden" name="dental-license-no" id="hidden-dental-license-no" value=""/>
              <input type="hidden" name="clinic-address" id="hidden-clinic-address" value=""/>
              <input type="hidden" name="parent-guardian" id="hidden-parent-guardian" value=""/>
              <input type="hidden" name="contact-number" id="hidden-contact-number" value=""/>
              <input type="hidden" name="cost-of-treatment" id="hidden-cost-of-treatment" value=""/>
              <input type="hidden" name="initial-payment2" id="hidden-initial-payment2" value=""/>
              <input type="hidden" name="monthly-payment" id="hidden-monthly-payment" value=""/>
              <input type="hidden" name="terms-month" id="hidden-terms-month" value=""/>
              <input type="hidden" name="treatment-fee2" id="hidden-treatment-fee2" value=""/>

              
        
              <div class="wrapper mb-5">
                <div style="font-family: Arial;">
                <!-- <div class="bg-banner" style="  background-image: url('https://csamsondental.com/images/tooth.png');height: 107px; width: 100%;background-size: 100%;background-repeat: no-repeat;background-position: center;">
                  <img src="assets/files/banner.jpg" style="width: 100%;" />
                </div> -->
                <h4 style="font-size: 18px;text-align: center">ORTHODONTIC SERVICES AGREEMENT/ FINANCIAL CONTRACT</h4>


              <p style="line-height: 1.3;display: flex;margin-top: 25px;">
                This Orthodontic Treatment Agreement ("Agreement") is made and entered into by and between:
              </p>

                @foreach($patientDataInfo as $key => $data)
                <p style="line-height: 1.3;display: flex;margin-top: 5px;">
                <table style="width: 100%;font-family: Arial;">
                    <tr style="border-bottom: none;">
                      <td style="width: 260px;">
                        <b>Clinic Name:</b> 
                      </td>
                      <td style="border-bottom: 1px solid;">
                      CATALAN-SAMSON Dental Clinic
                      </td>
                    </tr>

                     <tr style="border-bottom: none;">
                      <td style="width: 260px;">
                      <b>Attending Dentist: Dr. 
                      </td>
                      <td style="border-bottom: 1px solid;">
                       <span id="attending_dentist" style="width: 100%;display: bloc;text-align: left;height:23px;position: relative;"> <input type="text" name="attending_dentist" style="text-align: left;height: 25px;border-bottom: none;" id="attending-dentist" ></span>
                      </td>
                    </tr>



                      <tr style="border-bottom: none;">
                      <td style="width: 260px;">
                      <b>Dental License No.:
                      </td>
                      <td style="border-bottom: 1px solid;">
                       <span id="dental_license_no" style="width: 100%;display: bloc;text-align: left;height:23px;position: relative;"> <input type="text" name="dental_license_no" style="text-align: left;height: 25px;border-bottom: none;" id="dental-license-no" ></span>
                      </td>
                    </tr>


                   <tr style="border-bottom: none;">
                      <td style="width: 260px;">
                      <b>Clinic Address:
                      </td>
                      <td style="border-bottom: 1px solid;">
                       <span id="clinic_address" style="width: 100%;display: bloc;text-align: left;height:23px;position: relative;"> <input type="text" name="clinic_address" style="text-align: left;height: 25px;border-bottom: none;" id="clinic-address" ></span>
                      </td>
                    </tr>

                      <tr style="border-bottom: none;">
                      <td style="width: 260px;">
                        <span style="margin-top: 15px; margin-bottom: 15px;">
                          <br>
                        </span>

                          And
                         <span style="margin-top: 15px; margin-bottom: 15px;">
                          <br>
                        </span>
                      <td>
                      </td>
                    </tr>


                    <tr style="border-bottom: none;">
                      <td style="width: 260px;">
                          <br>
                        <b>Patient Name:</b> 
                      </td>
                      <td style="border-bottom: 1px solid;">
                          <br>
                      {{$data->firstName}} {{$data->middleName}} {{$data->lastName}}
                      </td>
                    </tr>
                    <tr style="border-bottom: none;">
                      <td style="width: 260px;">
                        <b>Date of Birth</b> 
                      </td>
                      <td style="border-bottom: 1px solid;" id="birthdayNew2">
                      </td>
                    </tr>

                      <tr style="border-bottom: none;">
                      <td style="width: 260px;">
                        <b>Parent/Guardian Name</b> (if minor):
                      </td>
                      <td style="border-bottom: 1px solid;">
                       <span id="parent_guardian" style="width: 100%;display: bloc;text-align: left;height:23px;position: relative;"> <input type="text" name="parent_guardian" style="text-align: left;height: 25px;border-bottom: none;" id="parent-guardian" ></span>
                      </td>
                    </tr>


                   <tr style="border-bottom: none;">
                      <td style="width: 260px;">
                        <b>Contact Number:</b>
                      </td>
                      <td style="border-bottom: 1px solid;">
                       <span id="contact_number" style="width: 100%;display: bloc;text-align: left;height:23px;position: relative;"> <input type="text" name="contact_number" style="text-align: left;height: 25px;border-bottom: none;" id="contact-number" ></span>
                      </td>
                    </tr>
                  </table>
                </p>
                <p style="line-height: 1.3;margin-top: 25px;display: flex;">
                The total cost of treatment is PHP
                <span id="cost_of_treatment" style="width: 160px;display: inline-bloc;text-align: center;height:23px;border-bottom: 1px solid black;"> <input type="text" name="cost_of_treatment" style="text-align: center;height: 25px;border-bottom: none;" id="cost-of-treatment"  data-type="" value=""></span>
                </p>
                <p style="line-height: 1.3;display: flex;margin-top: 25px;">
                  The payment plan will be as follows:
                </p>

                <ul>
                  <li style="line-height: 1.3;margin-top: 25px;display: flex;">
                    Initial payment: PHP 
                      <span id="initial_payment2" style="width: 160px;display: inline-bloc;text-align: center;height:23px;border-bottom: 1px solid black;"> <input type="text" name="initial_payment2" style="text-align: center;height: 25px;border-bottom: none;" id="initial-payment2"  data-type="" value=""></span>
                    (due on the day braces are placed)
                  </li>
                   <li style="line-height: 1.3;margin-top: 25px;display: flex;">
                   Monthly payments: PHP
                      <span id="monthly_payment" style="width: 160px;display: inline-bloc;text-align: center;height:23px;border-bottom: 1px solid black;"> <input type="text" name="monthly_payment" style="text-align: center;height: 25px;border-bottom: none;" id="monthly-payment"  data-type="" value=""></span>
                    for
                      <span id="terms_month" style="width: 160px;display: inline-bloc;text-align: center;height:23px;border-bottom: 1px solid black;"> <input type="text" name="terms_month" style="text-align: center;height: 25px;border-bottom: none;" id="terms-month"  data-type="" value=""></span>
                      Months
                  </li>
                </ul>



                <p style="line-height: 1.3;margin-top: 25px;display: flex;">
                 <span style="width: 245px;"> The treatment fee includes </span>
                <span id="treatment_fee2" style="width: 100%;display: inline-bloc;text-align: center;height:23px;border-bottom: 1px solid black;text-align: left"> <input type="text" name="treatment_fee2" style="text-align: left;height: 25px;border-bottom: none;" id="treatment-fee2"  data-type="" value=""></span>
                </p>


               

              <p style="line-height: 1.3;margin-top: 35px;display: flex;">
                  Other procedures such as prophylaxis, fillings, extractions, x-rays and all other dental procedures not orthodontic in nature are not included in the fee.
             </p>

              <p style="line-height: 1.3;margin-top: 25px;display: flex;">
               
              Additional charges will be made for lost or damaged appliances, broken bands and brackets (lost/damaged: ₱500 , rebond: ₱300) and treatment prolonged due to poor cooperation of the patient in following instructions and excessive missed or cancelled appointments.
               <!-- Additional charges will be made for lost or damaged appliances, broken Bands and brackets (Lost/damaged bracket: ₱500 , Rebond: ₱300) and treatment prolonged. -->
                  <!-- Additional charges will be made for lost or damaged appliances, broken bands and brackets and treatment prolonged due to poor cooperation of the patient in following instructions and excessive missed or cancelled appointments. -->
             </p>

             <p style="line-height: 1.3;margin-top: 25px;display: flex;">
                The payment arrangements listed above have been established for the convenience of the patient or parent and have no relation to the number of visits each month or the number of months of active treatment.
             </p>
             <p style="line-height: 1.3;margin-top: 25px;display: flex;">
              If for any reason it becomes necessary to transfer the patient from this office to that of another, or if treatment is discontinued, the fee to be paid to this office will be determined by the amount of time and effort expended for the treatment of the patient to the date of transfer or discontinuance.
             </p>
            <p style="line-height: 1.3;margin-top: 25px;display: flex;">
              All patients should continue to have regular dental examinations and prophylaxis during orthodontic treatment.
             </p>
             <p style="line-height: 1.3;margin-top: 25px;display: flex;">
             The patient understands that maintaining good oral hygiene and attending regular monthly appointments are essential for effective treatment.
             </p>

              <p style="line-height: 1.3;margin-top: 25px;">
             <b>The attending dentist reserves the right to discontinue treatment and remove the orthodontic appliances (braces) if the patient:</b>
             </p>

             <ol>
              <li style="line-height: 1.3;margin-top: 15px">
                <b>Fails to maintain proper oral hygiene</b>, even after being given instructions and repeated warnings; or
              </li>
              <li style="line-height: 1.3;margin-top: 15px">
                <b>Misses multiple monthly appointments</b> or consistently fails to comply with treatment protocols.
              </li>
            </ol>

              <p style="line-height: 1.3;margin-top: 35px;">
           In such cases, the patient and/or their guardian will be notified in writing. The clinic is not liable for any suboptimal outcomes resulting from early termination due to non-compliance. All outstanding balances must still be settled.
             </p>
                <p style="line-height: 1.3;margin-top: 25px;">
                  If treatment is completed before the payment period is over, the balance becomes payable in full. Otherwise, postdated checks may be issued to complete the payment.
             </p>
            <p style="line-height: 1.3;margin-top: 25px;">
             <b>FULL COOPERATION</b> of the patient/parent is required during the treatment with regards to oral hygiene, keeping appointments and following instructions to achieve the desired results in the least amount of time.
             </p>


              <p style="line-height: 1.3;margin-top: 35px;">
                   <b>By signing below, both parties agree to the terms and conditions outlined in this agreement.</b>
             </p>


       
                   <table style="width: 400px;font-family: Arial;" class="custom-sig-width">
                    <tr style="border-bottom: none;">
                      <td style="width: 260px;vertical-align: bottom;">
                       <b>Patient (or Guardian) Signature:</b>
                      </td>
                      <td style="border-bottom: 1px soli;text-align: center;width: 180px;padding: 0 5px;">
                      <div class="sign-area patient11" style="display: non;text-align: left;">
                        <i class="material-icons dp48 icon-color-mod" style="color: #ffffff;padding-left: 20px;position: fixed;" onclick="signConsent('patient11')">rate_review</i>
                      </div>
                      <span class="sign-area patient11 signature" style="height: 35px;display: block;"></span>
                      
                      <!-- <span style="text-align: center;display: block;border-top: 2px solid black;width: 100px"></span> -->
                      </td>
                    </tr>
                   <table style="width: 460px;font-family: Arial;" class="custom-sig-width">
                    <tr style="border-bottom: none;">
                      <td style="width: 200px;">
                       <b>Date: <span style="border-bottom: 2px solid black;">&nbsp;&nbsp;&nbsp;<?php echo date('F j, Y'); ?>&nbsp;&nbsp;&nbsp;</span></b>  
                      </td>
                      <td style="text-align: center;width: 180px;border-top: 2px solid black;">
                      </td>
                    </tr>
                  </table>

                   <table style="width: 400px;font-family: Arial;" class="custom-sig-width">
                     <tr style="border-bottom: none;">
                      <td style="width: 200px;vertical-align: bottom;">
                       <b>Dentist Signature:</b>
                      </td>
                      <td style="border-bottom: 1px soli;text-align: center;width: 180px;padding: 0 5px;">
                      <div class="sign-area patient13" style="display: non;text-align: left;">
                        <i class="material-icons dp48 icon-color-mod" style="color: #ffffff;padding-left: 20px;position: fixed;" onclick="signConsent('patient13')">rate_review</i>
                      </div>
                      <span class="sign-area patient13 signature" style="height: 35px;display: block;"></span>
                      
                      <!-- <span style="text-align: center;display: block;border-top: 2px solid black;width: 100px"></span> -->
                      </td>
                    </tr>
                  </table>
                   <table style="width: 400px;font-family: Arial;" class="custom-sig-width">
                    <tr style="border-bottom: none;">
                      <td style="width: 180px;">
                       <b>Date:  <span style="border-bottom: 2px solid black;">&nbsp;&nbsp;&nbsp;<?php echo date('F j, Y'); ?>&nbsp;&nbsp;&nbsp;</span></b>  
                      </td>
                      <td style="text-align: center;width: 180px;border-top: 2px solid black;">
                      </td>
                    </tr>


                  </table>










                @endforeach
                
              
                <!-- <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br> -->
        
                        

              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('ortho-contact')">Save</button>
    </div>
  </div>



 <!-- Modal -->
 <div id="modal-instruction-veneers" class="modal">
    <div class="modal-content pb-0">
        <form id="form-consent" method="post">
          @csrf
          <input type="hidden" name="html" id="informed_html" value=""/>
          <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
          <div class="wrapper mb-5">
          <div style="font-family: Arial;">
                 <div class="bg-banner" style="  background-image: url('https://sagundentalclinic.com/banner.jpg');height: 107px; width: 100%;background-size: 100%;background-repeat: no-repeat;background-position: center;">
                  <img src="assets/files/banner.jpg" style="width: 100%;" />
                </div>
              <!-- <h3 style"text-align: center;margin: 23px;">INFORMED CONsENT</h3> -->
            @foreach($patientDataInfo as $key => $data)
              <p>
                  Name: <strong>{{$data->firstName}} {{$data->lastName}}</strong><br>
                  Age: <strong>{{$data->age}}</strong><br>
                  Address: <strong>{{$data->address}}</strong>
              </p>
              <p style="line-height: 2;margin-top: 35p;text-align: justify;"> 
                INSTRUCTIONS to follow after installation of Dental Veneers  
              </p>
              <p style="line-height: ;text-align: justify;"> 
                <ul class="disc">
                  <li>
                    Avoid chewing excessively hard foods on the veneered teeth (hard candy, raw carrots etc.) material can break under extreme forces.
                  </li>
                  <li>
                    Proper brushing, flossing, and regular cleanings are essential to the long-term stability and appearance of your veneers
                  </li>
                  <!-- <li>
                    The gums may recede from the veneers, displaying discolored tooth structure underneath. This situation usually takes place after many years and requires veneers replacement.
                  </li> -->
                  <li>
                    Often, problems that may develop with the veneers can be found at an early stage and repaired easily, while waiting for a longer time may require replacing entire restorations.
                  </li>
                </ul>
                
              </p>
              <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
                  <strong>Important note:</strong>
                  <br>
                  <strong>For composite veneers only</strong>
                  <ul class="number">
                    <li style="list-style-type: decimal">Long term results of the shade vary from patient to patient. This can depend including habits such as smoking or drinking colored beverages.</li>
                    <li style="list-style-type: decimal">Composite veneers materials is faster to discolor than porcelain (refrain from drinking coffee, tea or any colored beverages)</li>
                    <li style="list-style-type: decimal">Use a soft bristle of toothbrush to maintain the glossy apperance of the composite veneers</li>
                  </ul>
                  <strong>For composite and porcelain</strong>
                  <ul class="number">
                    <li style="list-style-type: decimal">Tooth sensitivity after installing veneers is normal, the pain may subside after couple of months</li>
                    <li style="list-style-type: decimal">Needs to wear mouth guard every night while sleeping (for bruxism-unconsciously grinding at night)</li>
                  </ul>
              </p>
            @endforeach
            <table style="width: 100%;font-family: Arial;">
              <tr style="border-bottom: none;">
              <td style="width: 30%;padding: 0;">
                </td>
                <td style="width: 32%;padding: 0;">
                  <div class="sign-area patient3" style="display: none;">
                    <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('patient3')">rate_review</i>
                  </div>
                  <span class="sign-area patient3 signature" style"text-align: center;height: 85px;display: block;"></span>
                </td>
                <td style="width: 10%;padding: 0;">
                </td>
              
                <td style="width: 20%;padding: 0;vertical-align: botto;text-align: center;">
                  <span id="signer-name" style="font-size: 16px;"><?php echo date('F j, Y'); ?></span>
                </td>
              </tr>
              <tr style="border-bottom: none;">
              <td></td>
              <td style="border-top: 1px soli;text-align: center;">
                <div class="resign">
                  Patient/Parent/Guardian Signature
                </div>
              </td>
        
              <td></td>
              <td style="border-top: 1px soli;text-align: center;">
                Date
              </td>
              </tr>
            </table>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('instruction-veneers')">Save</button>
      </div>
    </div>
  </div>

  <!-- Modal -->
 <div id="modal-instruction-laser-whitening" class="modal">
    <div class="modal-content pb-0">
        <form id="form-consent" method="post">
          @csrf
          <input type="hidden" name="html" id="informed_html" value=""/>
          <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
          <div class="wrapper mb-5">
          <div style="font-family: Arial;">
                 <div class="bg-banner" style="  background-image: url('https://sagundentalclinic.com/banner.jpg');height: 107px; width: 100%;background-size: 100%;background-repeat: no-repeat;background-position: center;">
                  <img src="assets/files/banner.jpg" style="width: 100%;" />
                </div>
              <!-- <h3 style"text-align: center;margin: 23px;">INFORMED CONsENT</h3> -->
            @foreach($patientDataInfo as $key => $data)
              <p>
                  Name: <strong>{{$data->firstName}} {{$data->lastName}}</strong><br>
                  Age: <strong>{{$data->age}}</strong><br>
                  Address: <strong>{{$data->address}}</strong>
              </p>
              <p style="line-height: 2;margin-top: 35p;text-align: justify;"> 
              Instruction to follow after Teeth Laser Whitening  
              </p>
              <p style="line-height: ;text-align: justify;"> 
                <ul class="disc">
                  <li>
                    If you are smoking, do not smoke for 48 hours.
                  </li>
                  <li>
                    Stay away from highly colored foods (red sauce, blueberries, etc.) and beverages (coffee, tea, etc.) for 48 hours.
                  </li>
                  <li>
                    Mild sensitivity to hot or cold liquids may occur. This usually passes within 1-2 days. If sensitivity is severe or persists, contact your dental office. </li>
                   </li>
                  <li>
                    If you experience gum sensitivity do not brush the afflicted area while brushing your teeth. It is normal for color to tone down somewhat after treatment when your teeth rehydrate to a natural white tone.
                </li>
                </ul>
                
              </p>
              <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
                  <strong>Important note:</strong>
                  <br>
                  <ul class="disc">
                    <li>Long term results vary from patient to patient. This can depend on the original shade of your teeth and include habits such as smoking or drinking colored beverages (red wine, coffee, tea, etc.)</li>
                    <li>Maintenance such as whitening toothpaste is necessary.</li>
                    <li>"Touch-up" treatments may be needed every 6-12 months to retain color.</li>
                    <li>Existing fillings, crown, etc. will not whiten. Therefore, these may need to be changed in order to match your new smile.</li>
                  </ul>
                 
              </p>
            @endforeach
            <table style="width: 100%;font-family: Arial;">
              <tr style="border-bottom: none;">
              <td style="width: 30%;padding: 0;">
                </td>
                <td style="width: 32%;padding: 0;">
                  <div class="sign-area patient4" style="display: none;">
                    <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('patient4')">rate_review</i>
                  </div>
                  <span class="sign-area patient4 signature" style"text-align: center;height: 85px;display: block;"></span>
                </td>
                <td style="width: 10%;padding: 0;">
                </td>
              
                <td style="width: 20%;padding: 0;vertical-align: botto;text-align: center;">
                  <span id="signer-name" style="font-size: 16px;"><?php echo date('F j, Y'); ?></span>
                </td>
              </tr>
              <tr style="border-bottom: none;">
              <td></td>
              <td style="border-top: 1px soli;text-align: center;">
                <div class="resign">
                  Patient/Parent/Guardian Signature
                </div>
              </td>
        
              <td></td>
              <td style="border-top: 1px soli;text-align: center;">
                Date
              </td>
              </tr>
            </table>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('instruction-laser-whitening')">Save</button>
      </div>
    </div>
  </div>


   <!-- Modal -->
 <div id="modal-home-care-instruction" class="modal">
    <div class="modal-content pb-0">
        <form id="form-consent" method="post">
          @csrf
          <input type="hidden" name="html" id="informed_html" value=""/>
          <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
          <div class="wrapper mb-5">
          <div style="font-family: Arial;">
                <div class="bg-banner" style="  background-image: url('https://sagundentalclinic.com/banner.jpg');height: 107px; width: 100%;background-size: 100%;background-repeat: no-repeat;background-position: center;">
                  <img src="assets/files/banner.jpg" style="width: 100%;" />
                </div>
              <!-- <h3 style"text-align: center;margin: 23px;">INFORMED CONsENT</h3> -->
          
              <p style="line-height: 2;margin-top: 35p;text-align: justify;"> 
              <u><i> HOME CARE INSTRUCTIONS FOR YOUR NEW BRACES </i></u>
              </p>
              <p style="line-height: ;text-align: justify;"> 
                1. &nbsp; void any hard or sticky foods (i.e. caramel candy, corn chips, nuts, ice, etc.)
              </p>
              <p style="line-height: ;text-align: justify;"> 
                Make sure all meats are cut off the bone and fresh fruits and vegetables are cut up into small pieces the adhesive that we use is very strong. However, excessive force when chewing particularly when teeth are initially moving may cause the adhesive and braces to become loose. If you feel a significant amount of resistance when chewing, do not bite harder, ease off on the biting pressure.
              </p>
              <p style="line-height: ;text-align: justify;"> 
              2. &nbsp; Proper oral hygiene is very important in order to prevent any caries and decalcification.
              </p>
              <p style="line-height: ;text-align: justify;"> 
              Sagun Dental has provided you with the proper tools to maintain excellent oral hygiene (i.e. toothbrushes, proxy brush. Floss, and wax). All of those items can be located in most stores. We also recommended that you rinse with a fluoride once a day to prevent decay and decalcification.  
              </p>
              <p style="line-height: ;text-align: justify;"> 
              3. &nbsp;	There may bedtimes during your "active" treatment that brackets can come loose and/or arch wires may begin to poke.
              </p>
              <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
                  <strong>What can I Expect?</strong>
                  <br>
              </p>
              <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
              Tenderness of the teeth for the first 4-5 days. (Chew sugarless chewing gum to help relieve some of the tension in your teeth. Chew softer foods initially).
              </p>
              <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
              Tenderness of the insides of the lips and cheeks for 4-5 days. (Use wax applied to dried-off braces/wire ends.)
              </p>
              <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
              Some mobility of the teeth (normal during tooth movement)
              </p>
              <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
                Some teeth moving faster than others, giving the appearance of some teeth becoming crooked. Normal occurrence that will be corrected with time.
              </p>
              <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
              Loose braces are a very rare occurrence. Immediate relief can be achieved by stabilizing the loose brace in place using wax over the brace and adjacent wires.
              </p>
              <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
                  <strong>PROPER TECHNIQUE FOR PLACEMENT OF WAX IS:</strong>
                  <br>
              </p>
              <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
              Slightly wet fingers that will be used to place the wax and pinch a ball of wax out of container. Pull lip out of the way and "sick in" extra saliva in mouth to get tooth/bracket/wire very dry. Also dry target area with finger. 
              </p>
              <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
              Now apply ball of wax to target area and mold around tooth/brace/poking wire, etc. to allow it to suck.
              </p>
              <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
                <strong>APPLY WAX AS OFTEN AS NEEDED TO ENSURE COMFORN UNTIL OFFICE IS OPEN AND CAN ACCOMIDATE YOU WITH AN APPOINTMENT TO BE SOON.</strong>
              </p>
              <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
              In some instances, rubber bumper guards or blue composition bite ramps have been placed on certain teeth to prop open the bite, preventing the bite from knowing off braces on severally malposition teeth. These guards/ramps will be removed during treatment, once an improvement to the bite has occurred. 
              </p>
              @foreach($patientDataInfo as $key => $data)
              <p>
                  Name: <strong>{{$data->firstName}} {{$data->lastName}}</strong><br>
                  Age: <strong>{{$data->age}}</strong><br>
                  Address: <strong>{{$data->address}}</strong>
              </p>
            @endforeach
            <table style="width: 100%;font-family: Arial;">
              <tr style="border-bottom: none;">
              <td style="width: 30%;padding: 0;">
                </td>
                <td style="width: 32%;padding: 0;">
                  <div class="sign-area patient5" style="display: none;">
                    <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('patient5')">rate_review</i>
                  </div>
                  <span class="sign-area patient5 signature" style"text-align: center;height: 85px;display: block;"></span>
                </td>
                <td style="width: 10%;padding: 0;">
                </td>
              
                <td style="width: 20%;padding: 0;vertical-align: botto;text-align: center;">
                  <span id="signer-name" style="font-size: 16px;"><?php echo date('F j, Y'); ?></span>
                </td>
              </tr>
              <tr style="border-bottom: none;">
              <td></td>
              <td style="border-top: 1px soli;text-align: center;">
                <div class="resign">
                  Patient/Parent/Guardian Signature
                </div>
              </td>
        
              <td></td>
              <td style="border-top: 1px soli;text-align: center;">
                Date
              </td>
              </tr>
            </table>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('instruction-for-braces')">Save</button>
      </div>
    </div>
  </div>

   <!-- Modal -->
   <div id="modal-post-op-instruction-tooth-extraction" class="modal">
    <div class="modal-content pb-0">
        <form id="form-consent" method="post">
          @csrf
          <input type="hidden" name="html" id="informed_html" value=""/>
          <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
          <div class="wrapper mb-5">
          <div style="font-family: Arial;">
                 <div class="bg-banner" style="  background-image: url('https://sagundentalclinic.com/banner.jpg');height: 107px; width: 100%;background-size: 100%;background-repeat: no-repeat;background-position: center;">
                  <img src="assets/files/banner.jpg" style="width: 100%;" />
                </div>
              <!-- <h3 style"text-align: center;margin: 23px;">INFORMED CONsENT</h3> -->
              @foreach($patientDataInfo as $key => $data)
                  <p>
                      Name: <strong>{{$data->firstName}} {{$data->lastName}}</strong><br>
                      Age: <strong>{{$data->age}}</strong><br>
                      Address: <strong>{{$data->address}}</strong>
                  </p>
              @endforeach
              <p style="line-height: 2;margin-top: 35p;text-align: justify;"> 
              <u><i> POST OP INSTRUCTION (EXO) </i></u>
              </p>
              <p style="line-height: ;text-align: justify;"> 
                <ul class="disc">
                  <li>After 30 mins pwede na tanggalin yung bulak pag dumudugo pa palitan lang ulit ng bulak</li>
                  <li>Pwede kumain ng malalamig kagaya ng ice cream o tapalan ng yelo yung part na nabunutan</li>
                  <li>Pag matotoothbrush iwasan yung nabunutan</li>
                  <li>Bawal magbuhat ng mabigat</li>
                  <li>Wag kumain ng malalansa</li>
                </ul>
              </p>
              
            <table style="width: 100%;font-family: Arial;">
              <tr style="border-bottom: none;">
              <td style="width: 30%;padding: 0;">
                </td>
                <td style="width: 32%;padding: 0;">
                  <div class="sign-area patient5" style="display: none;">
                    <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('patient5')">rate_review</i>
                  </div>
                  <span class="sign-area patient5 signature" style"text-align: center;height: 85px;display: block;"></span>
                </td>
                <td style="width: 10%;padding: 0;">
                </td>
              
                <td style="width: 20%;padding: 0;vertical-align: botto;text-align: center;">
                  <span id="signer-name" style="font-size: 16px;"><?php echo date('F j, Y'); ?></span>
                </td>
              </tr>
              <tr style="border-bottom: none;">
              <td></td>
              <td style="border-top: 1px soli;text-align: center;">
                <div class="resign">
                  Patient/Parent/Guardian Signature
                </div>
              </td>
        
              <td></td>
              <td style="border-top: 1px soli;text-align: center;">
                Date
              </td>
              </tr>
            </table>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('post-op-instruction-tooth-extraction')">Save</button>
      </div>
    </div>
  </div>






  <!-- Modal -->
 <div id="modal-ambassadors-contract" class="modal">
    <div class="modal-content pb-0">
      <div class="container">
        <div class="row">
            <form id="form-consent" method="post">
             @csrf
              <input type="hidden" name="html" id="contract_html" value=""/>
              <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
              <input type="hidden" name="consent_type" id="consent_tmj_type" value=""/>
              <div class="wrapper mb-5">
                <div style="font-family: Arial;" >
              <div class="bg-banner" style="  background-image: url('https://sagundentalclinic.com/banner.jpg');height: 107px; width: 100%;background-size: 100%;background-repeat: no-repeat;background-position: center;">
                  <img src="assets/files/banner.jpg" style="width: 100%;" />
                </div>
                <p style="line-height: 2;margin-top: 30p;text-align: center;font-size: 18px;font-weight: bold;"> 
                <u><i> Esthethic Dentistry | Tmj-Orthodontics | Oral Surgery</i></u>
                </p>
          
              <p style="line-height: 1.3;margin-top: 12p;text-align: justify;"> 
              I hereby authorize Sagun Dental Clinic, to publish photographs and videos taken of me during my dental office visits or pictorial sessions, and my name and likeness, for use in the Sagun Dental Clinic’s print, online and video-based marketing materials, as well as other office publications.
              </p>
              <p style="line-height: 1.3;margin-top: 12p;text-align: justify;"> 
              I hereby release and hold harmless Sagun Dental Clinic from any reasonable expectation of privacy or confidentiality associated with the images specified above.
              </p>
              <p style="line-height: 1.3;margin-top: 12p;text-align: justify;"> 
              I further acknowledge that my participation as one of the clinic’s brand ambassador is in exchange for sponsored treatments done by licensed dentist of Sagun Dental Clinic that includes the following treatments:<br>
              free dental consultation, free laser teeth whitening every 6 months-good for 1 full year, non-transferrable. I acknowledge and agree that publication of photographs confers no rights of ownership or royalties whatsoever.
              </p>
              <p style="line-height: 1.3;margin-top: 12p;text-align: justify;"> 
              I hereby release Sagun Dental Clinic its contractors, its employees, and any third parties involved in the creation of publication of marketing materials, from liability for any claims by me or any third party in connection with my participation.<br>
              I hereby pledge my loyalty to Sagun Dental Clinic by not promoting other dental clinic or institution that will showcase conflict of interest.
            
            </p>
              <p style="line-height: 1.3;margin-top: 12p;text-align: justify;"> 
              (The management is requesting our model to post in their respective social media accounts for atleast twice a month/every two weeks to be an effective influencer in our brand.)
            </p>
              <p style="line-height: 1.3;margin-top: 12p;text-align: justify;"> 
              I will use my skills and creativity as a social media influencer to promote Sagun Dental Clinic. I will comply to the requests of the management.
              </p>
              <p style="line-height: 1.3;margin-top: 12p;text-align: justify;"> 
              sample:<br>
              by sharing one of the photos from Sagun Dental Clinic in a story/post<br>
              or posting your selfie photo using the hashtags of the clinic<br>
              or whatever the model thinks is effective.
              </p>
            
              <table style="width: 100%;font-family: Arial;">
                  <tr style="border-bottom: none;">
                    <td style="width: 35%;padding: 0;height: 30px;">
                         Brand Ambassador's Printed Name: 
                      </td>
                      <td style="width: 65%;padding: 0;height: 30px;border-bottom: 1px solid black;">
                      <span style"text-align: left;display: block;padding-left: 40px;">{{$data->firstName}} {{$data->lastName}}</span>
                      </td>
                      </tr>
                </table>

                <table style="width: 100%;font-family: Arial;">
                  <tr style="border-bottom: none;">
                    <td style="width: 20%;padding: 0;height: 30px;vertical-align: bottom;">
                        Signature:
                      </td>
                      <td style="width: 30%;padding: 0;height: 30px;border-bottom: 1px solid black;">
                      <div class="sign-area patient12" style="display: none;">
                        <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('patient12')">rate_review</i>
                      </div>
                      <span class="sign-area patient12 signature" style"text-align: center;height: 59px;display: block;"></span>
                      </td>
                      <td style="width: 15%;padding: 0;height: 30px;">
                      </td>
                      <td style="width: 10%;padding: 0;height: 30px;vertical-align: bottom;">
                      Date:
                      </td>
                      <td style="width: 25%;padding: 0;height: 30px;border-bottom: 1px solid black;vertical-align: bottom;">
                      <span id="signer-name" style="font-size: 16px;"><?php echo date('F j, Y'); ?></span>
                      </td>
                      </tr>
                      <tr style="border-bottom: none;">
                        <td style="height: 50px">
                        <div class="resign">
                          Approved by: 
                          </div>
                      </td>
                      <td style="border-bottom: 1px soli;text-align: center;">
                   
                      </td>
                      </tr>
                </table>
                        

              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
    <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('ambassadors-contract')">Save</button>
    </div>
  </div>

 <!-- Modal -->
 <div id="modal-about-tmj" class="modal">
    <div class="modal-content pb-0">
      <div class="container">
        <div class="row">
            <form id="form-consent" method="post">
             @csrf
              <input type="hidden" name="html" id="contract_html" value=""/>
              <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
              <input type="hidden" name="consent_type" id="consent_tmj_type" value=""/>
              <div class="wrapper mb-5">
                <div style="font-family: Arial;">
                <div class="bg-banner" style="  background-image: url('https://sagundentalclinic.com/banner.jpg');height: 107px; width: 100%;background-size: 100%;background-repeat: no-repeat;background-position: center;">
                  <img src="assets/files/banner.jpg" style="width: 100%;" />
                </div>
                <p style="line-height: 2;margin-top: 35p;text-align: justify;"> 
                <u><i> RATIONALE ABOUT TMJ DISORDER</i></u>
                </p>
                @foreach($patientDataInfo as $key => $data)
                <p>
                  Name: <strong>{{$data->firstName}} {{$data->lastName}}</strong><br>
                  Age: <strong>{{$data->age}}</strong><br>
                  Address: <strong>{{$data->address}}</strong>
              </p>
              @endforeach

              <p style="line-height: 1.3;margin-top: 15p;text-align: justify;"> 
                Symptoms of TMJ dysfunction begin to develop when the jaw joint are forced out of alignment, the jaw and teeth malposition as a result of genetic, nutritional and behavioral factors and loss of some teeth.
              </p>
              <p style="line-height: 1.3;margin-top: 15p;text-align: justify;"> 
              The teeth dictate the position of the jaw mal alignment teeth will not properly support the jaws in balanced position. <u>Once the jaws are unbalanced, the whole body tense up to share the strain of the imbalanced.</u>
              </p>
              <p style="line-height: 1.3;margin-top: 15p;text-align: justify;"> 
              The jaw joint act as the center of body balanced, the head weight 9-14 pounds and its balanced by seven cervical or neck vertebrae that balanced is maintain by the lower jaw its muscled acting as a counter weight for the rest of the skull
              </p>
               <p style="line-height: 1.3;margin-top: 15p;text-align: justify;"> 
               When the jaw is in proper position, the head rest comfortably on the neck and shoulders, if the lower jaw is forced out of place, the muscles will be thrown of balance and all the muscles supporting it will have to strain to keep it in position on the neck, so all the muscles in the head, neck and shoulders tense up, then he muscles in the rest of the body are forced to share the stress in and around the head and they tense up too.
              </p>
              <p style="line-height: 1.3;margin-top: 15p;text-align: justify;"> 
              Stress is another forced that leads people to insult the muscles around the jaw joints, poor posture is another culprit.
              </p>
              <p style="line-height: 1.3;margin-top: 15p;text-align: justify;"> 
              When already tense muscles are further strained by any bad habits, they go into spasm and pain. The muscles will tighten up so hard that blood won’t be able to circulate through them properly, without proper circulation, tissues can’t be nourished and one begins to develop those little knots of degenerated tissue resulting to pain producing trigger points
              </p>
              <p style="line-height: 1.3;margin-top: 15p;text-align: justify;"> 
              Muscles spasm and trigger points can occur in any body as a results of stress and associated jaw and skeletal imbalanced, the pain and other symptoms arising from those spastics muscles make up the TMJ syndrome or TMJ disorder.
              </p>
              <p style="line-height: 1.3;margin-top: 15p;text-align: justify;"> 
              Common complaint include sharp pains deep behind the eyes and in temple area, earache, pain in the jawjoint, headache in one or both sides of the head (commonly mistakes for migraine) or pain in the neck and shoulders.
              </p>
              <p style="line-height: 1.3;margin-top: 15p;text-align: justify;"> 
              Even pain radiating into arms and hand the litany of discomfort caused by this syndrome seems endless. The jaw imbalanced can create a click, grating or cracking sounds when opening and closing of the moth. Hearing may impaired, sinuses always clogged and sore throat without infection, dizziness occur frequently even hormonal imbalance have connected with the syndrome as an additional causative factor.
              </p>
              <p style="line-height: 1.3;margin-top: 15p;text-align: justify;"> 
              This TMJ syndrome can be relieved by proper positioning of the jaw by plastic splint making the strained muscles relax and rehabilitate and re-programming of jaw movement.
              </p>
              <p style="line-height: 1.3;margin-top: 15p;text-align: justify;"> 
              Exercise the neck and chiropractic manipulation is another way of making the strained muscles of the neck relax but first proper positioning by splint is important to prevent injury to already injured area.
              </p>
              <p style="line-height: 1.3;margin-top: 15p;text-align: justify;"> 
              Dentistry is now in the beginning of a new age of technology and verifiable documentation which are based on facts and not only on opinion.
              </p>
              <p style="line-height: 1.3;margin-top: 15p;text-align: justify;"> 
              When pain and discomfort is felt outside the oral cavity, the sufferer usually seeks the help of the medical doctor. If the etiology of the symptoms is outside the working knowledge of the medical practitioner or specialist, long and lasting relief may not be possible. It is only then that dental, chiropractic and nutritional approach should not be taken for granted.
              </p>
              <p style="line-height: 1.3;margin-top: 15p;text-align: justify;"> 
              After splint construction and oclussal plane was done, we will let the muscles and bone to maintain physiologic balance, and give sample time for healing and recovery (6-12 mos.)
              </p>
              <p style="line-height: 1.3;margin-top: 15p;text-align: justify;"> 
              If the tissue has reach its point of no returns the symptoms will not have complete remission but only lessen the condition of damage esp. the ear area.
              </p>
              <p style="line-height: 1.3;margin-top: 15p;text-align: justify;"> 
              No guarantee is given to the TMJ therapy since the tissue involve is complex and compounded it needs multidiscipline procedure and enough time for recovery.
              </p>
              
                <table style="width: 100%;font-family: Arial;">
                  <tr style="border-bottom: none;">
                    <td style="width: 32%;padding: 0;height: 100px;">
                      <div class="sign-area patient10" style="display: none;">
                        <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('patient10')">rate_review</i>
                      </div>
                      <span class="sign-area patient10 signature" style"text-align: center;height: 59px;display: block;"></span>
                    </td>
                    <td style="width: 10%;padding: 0;">
                    </td>
                    <td style="width: 25%;padding: 0;">
                     
                    </td>
                    <td style="width: 10%;padding: 0;">
                    </td>
                    <td style="width: 25%;padding: 0;vertical-align: botto;text-align: center;">
                      <span id="signer-name" style="font-size: 16px;"><?php echo date('F j, Y'); ?></span>
                    </td>
                  </tr>
                  <tr style="border-bottom: none;">
                  <td style="border-top: 1px soli;text-align: center;">
                    <div class="resign">
                     Patient/Parent/Guardian Signature
                    </div>
                  </td>
                  <td></td>
                  <td style="">
                   
                  </td>
                  <td></td>
                  <td style="border-top: 1px soli;text-align: center;">
                    Date
                  </td>
                  </tr>
                </table>
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('about-tmj')">Save</button>
    </div>
  </div>



  <!-- Modal -->
  <div id="modal-oral-diagnosis" class="modal">
    <div class="modal-content pb-0">
        <form id="form-consent" method="post">
          @csrf
          <input type="hidden" name="html" id="informed_html" value=""/>
          <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
          <div class="wrapper mb-5">
          <div style="font-family: Arial;">
               <div class="bg-banner" style="  background-image: url('https://sagundentalclinic.com/banner.jpg');height: 107px; width: 100%;background-size: 100%;background-repeat: no-repeat;background-position: center;">
                  <img src="assets/files/banner.jpg" style="width: 100%;" />
                </div>
              <!-- <h3 style"text-align: center;margin: 23px;">INFORMED CONsENT</h3> -->
          
              <div class="sign-area teeth" style="display: none;">
                  <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('teeth')">rate_review</i>
                </div>
                <div class="sign-area teeth signature teeth-draw" style="margin: 30px auto;height:600px;width: 615px;background-image: url('https://sagundentalclinic.com/images/oral-diagnosis.png');background-repeat: no-repeat;background-size: 100%;position:relative;"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('oral-diagnosis')">Save</button>
      </div>
    </div>
  </div>
 

 <!-- Modal -->
 <div id="modal-orthodontic-braces-contract" class="modal">
    <div class="modal-content pb-0">
      <div class="container">
        <div class="row">
            <form id="form-consent orth-form" method="post">
             @csrf
              <input type="hidden" name="html" id="contract_html" value=""/>
              <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
              <div class="wrapper mb-5">
                <div style="font-family: Arial;">
                < <div class="bg-banner">
                  <img src="/banner.jpg" style="width: 100%;" />
                </div>
                <h3 style"text-align: center;margin: 23px;">ORTHODONTIC TREATMENT</h3>

                @foreach($patientDataInfo as $key => $data)
                <p style="line-height: 1.3;display: flex;">
                  <table style="width: 100%;font-family: Arial;">
                    <tr style="border-bottom: none;">
                      <td style="padding: 0;width: 9%;">
                        NAME:
                      </td>
                      <td style="padding: 5px;width: 91%;border-bottom: 1px solid;">
                       {{$data->firstName}} {{$data->lastName}}
                      </td>
                    </tr>
                    <tr style="border-bottom: none;">
                      <td style="padding: 0;width: 9%;">
                        ADDRESS:
                      </td>
                      <td style="padding: 5px;width: 91%;border-bottom: 1px solid;">
                       {{$data->address}}
                      </td>
                    </tr>
                    <tr style="border-bottom: none;">
                      <td style="padding: 0;width: 9%;">
                        AGE:
                      </td>
                      <td style="padding: 5px;width: 91%;border-bottom: 1px solid;">
                       {{$data->age}}
                      </td>
                    </tr>
                  </table>
                </p>
                <p style="line-height: 2;margin-top: 15p;text-align: justify;display: flex;"> 
                  <span style="display: block;padding-left:20px;position: relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>The treatment you are to receive is mainly correction of irregular teeth, as by means of braces.
                </p>
                <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
                <span style="display: block;padding-left:20px;position: relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>I understand that individual reactions to treatment can’t be predicted and that if I experienced any reactions following treatment, I agree to report them to the office as soon as possible.
                </p>
                <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
                <span style="display: block;padding-left:20px;position: relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>I understand that referrals to other dental specialists may be required e.g., an oral surgeon, etc. I further understand that despite all estimates of the success of the treatment, there are many personal biological factors that can’t be predicted in advance that may affect its success.
                </p>
                <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
                <span style="display: block;padding-left:20px;position: relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>If there is any discomfort in the joint (TMJ) during the treatment, I am to report it to the dentist as soon as possible. I understand that if this occurs, further consultation and treatment may be necessary.
                </p>
                <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
                <span style="display: block;padding-left:20px;position: relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>I have been told that the success of the treatment depends upon my cooperation in keeping scheduled appointments, following homecare instructions and reporting to the office any change in my health status. Acknowledge that no guarantees or assurance have been given by anyone regarding results that may be obtained. I also understand that if I have questions regarding the treatment I am to ask the doctor prior to signing this consent.
                </p>
                <p style="line-height: 1;margin-top: 15px;display: flex;"> 
                  The fee for Orthodontic treatment is <span id="initial_form" style="border-bottom: 1px solid;width: 65px;display: bloc;text-align: center;height:28px;"> <input type="text" name="initial_form" style"text-align: center;height: 18px;border-bottom: none;" id="initial-form"  data-type="currency" value=""></span> initial payment upon installation of the braces 
                </p>
                <p style="line-height: ;text-align: justify;display: flex;"> 
             amount of <span id="monthly_checkup" style="border-bottom: 1px solid;width: 164px;display: bloc;text-align: center;height:28px;"> <input type="text" name="monthly_checkup" style"text-align: center;height: 18px;border-bottom: none;" id="monthly-checkup"  value=""></span>
                  for monthly check up.
                </p>
                <p style="line-height: 1;margin-top: 15p;text-align: justify;display: flex;"> 
                The whole treatment is <span id="treatment_is" style="border-bottom: 1px solid;width: 107px;display: bloc;text-align: center;height:28px"> <input type="text" name="treatment_is" style"text-align: center;height: 18px;border-bottom: none;" id="treatment-is" data-type="currency" ></span>
                  . Oral Prophylaxis, restorations, extractions, etc. are 
                </p>
                <p style="line-height: ;text-align: justify;display: flex;"> 
                 not included.
                </p>
                <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
                <span style="display: block;padding-left:20px;position: relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><strong>If any circumstances may occur (migration, etc.) as soon as the treatment has been started the total of the treatment must be settled and THERE WILL BE NO REFUND.</strong>
                </p>
                <p style="line-height: 1;margin-top: 15px;display: flex;"> 
                The frequency of visits (rebond of bracket<span id="rebond_of_bracket" style="border-bottom: 1px solid;width: 71px;display: bloc;text-align: center;height:28px;"> <input type="text" name="rebond_of_bracket" style"text-align: center;height: 18px;border-bottom: none;" id="rebond-of-bracket"  data-type="currency-rebond-of-bracket" value=""></span>, missing brancket <span id="missing_bracket" style="border-bottom: 1px solid;width: 80px;display: bloc;text-align: center;height:28px;"> <input type="text" name="missing_bracket" style"text-align: center;height: 18px;border-bottom: none;" id="missing-bracket"  data-type="currency-missing-bracket" value=""></span>) 
                </p>
                <p style="line-height: ;text-align: justify;display: flex;"> 
                  has no bearing on the monthly check up.
                </p>
                <p style="line-height: ;text-align: justify;display: flex;"> 
                  I understand that I must wear Retainers after wearing braces to maintain the position of the corrected bite.
                </p>
                <p style="line-height: ;text-align: justify;display: flex;"> 
                 The fee for retainers is <span id="retainer_is" style="border-bottom: 1px solid;width: 164px;display: bloc;text-align: center;height:28px;"> <input type="text" name="retainer_is" style"text-align: center;height: 18px;border-bottom: none;" id="retainer-is"  data-type="currency-retainer-is" value=""></span>. (not included in the total package).
                </p>
                <p style="line-height: ;text-align: justify;display: flex;"> 
                To avert any misunderstanding,  we will be happy to discuss the information with you.
                </p>
                <p style="line-height: ;text-align: justify;display: flex;"> 
                I HAVE BEEN FULLY INFORMED OF THE DIAGNOSIS AND PROPSED DENTAL ORAL TREATMENT 
                </p>
                <p style="line-height: ;text-align: justify;display: flex;"> 
                AND HEREBY GRANT PERMISSION TO <span id="permission_to" style="border-bottom: 1px solid;width: 164px;display: bloc;text-align: center;height:28px;"> <input type="text" name="permission_to" style"text-align: center;height: 18px;border-bottom: none;" id="permission-to"  data-type="currency-permission-to" value=""></span> AND OTHER ASSOCIATED
                </p>
                <p style="line-height: ;text-align: justify;display: flex;"> 
                DENTIST  TO RENDER  THE PROPOSED TREATMENT.
                </p>
                <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
                Violation of any terms and conditions of this contract shall be a ground for legal action.
                </p>
                <table style="width: 100%;font-family: Arial;">
                  <tr style="border-bottom: none;">
                    <td style="width: 42%;padding: 0;height: 100px;">
                      <div class="sign-area patient6" style="display: none;">
                        <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('patient6')">rate_review</i>
                      </div>
                      <span class="sign-area patient6 signature" style"text-align: center;height: 59px;display: block;"></span>
                    </td>
                    <td style="width: 10%;padding: 0;">
                    </td>
                    <td style="width: 10%;padding: 0;">
                      
                    </td>
                    <td style="width: 10%;padding: 0;">
                    </td>
                    <td style="width: 30%;padding: 0;vertical-align: botto;text-align: center;">
                      <span id="signer-name" style="font-size: 16px;"><?php echo date('F j, Y'); ?></span>
                    </td>
                  </tr>
                  <tr style="border-bottom: none;">
                  <td style="border-top: 1px soli;text-align: center;">
                    <div class="resign">
                     PATIENT'S/GUARDIAN SIGNATURE
                    </div>
                  </td>
                  <td></td>
                  <td style"text-align: center;">
                   
                  </td>
                  <td></td>
                  <td style="border-top: 1px soli;text-align: center;">
                    DATE
                  </td>
                  </tr>
                </table>
                <div style="page-break-before: always"></div>
                <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
                  NAME OF PATIENT:<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$data->firstName}} {{$data->lastName}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> AGE <u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$data->age}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> SEX <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$data->sex}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> STATUS <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$data->status}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><br>
                  CP # <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$data->mobile}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><br>
                  ADDRESS: <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$data->address}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> / OCCUPATION: <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$data->occupation}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> / REFERRED by: <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$data->referredBy}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>/
                </p>

                <p style="line-height: 2;margin-top: 15p;text-align: justify;"> 
                   <div style="display: flex;">
                    <table style="width: 100%;font-family: Arial;">
                      <tr style="border-bottom: none;">
                      <td style="width: 87px;"><span>History cc</span></td>
                      <td style="padding: 5px;border-bottom: 1px solid;">
                        <span id="history_cc" style="width: 100%;display: bloc;text-align: left;height:23px;position: relative;"> <input type="text" name="history_cc" style"text-align: left;height: 25px;border-bottom: none;" id="history-cc" ></span>
                      </td>
                      </tr>
                    </table>
                  </div>
                     <table style="width: 100%;font-family: Arial;">
                      <tr style="border-bottom: none;">
                      <td style="width: 57px;"><span>HPI   </span></td>
                      <td style="padding: 5px;border-bottom: 1px solid;">
                        <span id="hpi_form1" style="width: 100%;display: bloc;text-align: left;height:23px;position: relative;"> <input type="text" name="hpi_form1" style"text-align: left;height: 25px;border-bottom: none;" id="hpi-form1" ></span>
                      </td>
                      </tr>
                    </table>
                    <table style="width: 100%;font-family: Arial;">
                      <tr style="border-bottom: none;">
                      <td style="width: 57px;"></td>
                      <td style="padding: 5px;border-bottom: 1px solid;">
                        <span id="hpi_form2" style="width: 100%;display: bloc;text-align: left;height:23px;position: relative;"> <input type="text" name="hpi_form2" style"text-align: left;height: 25px;border-bottom: none;" id="hpi-form2" ></span>
                      </td>
                      </tr>
                    </table>
                    <table style="width: 100%;font-family: Arial;">
                      <tr style="border-bottom: none;">
                      <td style="width: 57px;"></td>
                      <td style="padding: 5px;border-bottom: 1px solid;">
                        <span id="hpi_form3" style="width: 100%;display: bloc;text-align: left;height:23px;position: relative;"> <input type="text" name="hpi_form3" style"text-align: left;height: 25px;border-bottom: none;" id="hpi-form3" ></span>
                      </td>
                      </tr>
                    </table>
                </p>
                <p style="line-height: 1;margin-top: 15p;text-align: justify;display: flex;"> 
                   <span style="width: 490px;">PMH: ANY HOSPITALIZATION record</span><span id="hospitalization_record" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="hospitalization-record" onclick="checkboxChange('hospitalization-record', 'hospitalization_record')" name="hospitalization_record" value="false"> </span>
                   specifiy &nbsp;&nbsp; <span id="specifiy_form" style="width: 100%;display: bloc;text-align: left;height:23px;position: relative;border-bottom: 1px solid;"> <input type="text" name="specifiy_form" style"text-align: left;height: 25px;border-bottom: none;" id="specifiy-form" ></span>
                </p>
                <p style="line-height: ;text-align: justify;display: flex;"> 
                *DO YOU HAVE: 
                <table style="font-size: 14px;font-family: Arial;" class="tr-border-none">
                  <tr>
                    <td colspan="2"> 
                      <div style="display: flex;">
                        <span style="width: auto;">CURRENT DRUG(medicine) TAKEN</span>
                        <span id="drug_taken" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="drug-taken" name="drug_taken" value="false" onclick="checkboxChange('drug-taken', 'drug_taken')"> </span>
                      </div>
                     </td>
                    <td>
                      <div style="display: flex;">
                       HYPERTENSION
                        <span id="hypertension_form" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="hypertension-form" name="hypertension_form" value="false"  onclick="checkboxChange('hypertension-form', 'hypertension_form')"> </span> / 
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div style="display: flex;">
                         DIABETES
                        <span id="diabetes_form" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="diabetes-form" name="diabetes_form" value="false" onclick="checkboxChange('diabetes-form', 'diabetes_form')"> </span> /
                      </div>
                    </td>
                    <td>
                      <div style="display: flex;">
                         ANEMIA
                        <span id="anemia_form" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="anemia-form" name="anemia_form" value="false" onclick="checkboxChange('anemia-form', 'anemia_form')"> </span> /
                      </div>
                    </td>
                    <td>
                      <div style="display: flex;">
                         ASTHMA
                        <span id="asthma_form" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="asthma-form" name="asthma_form" value="false" onclick="checkboxChange('asthma-form', 'asthma_form')"> </span> /
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div style="display: flex;">
                         ALLERGY
                        <span id="allergy_form" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="allergy-form" name="allergy_form" value="false" onclick="checkboxChange('allergy-form', 'allergy_form')"> </span> /
                      </div>
                    </td>
                    <td>
                      <div style="display: flex;">
                         BLEEDING DISORDERS
                        <span id="bleeding_disorders" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="bleeding-disorders" name="bleeding_disorders" value="false" onclick="checkboxChange('bleeding-disorders', 'bleeding_disorders')"> </span> /
                      </div>
                    </td>
                    <td>
                      <div style="display: flex;">
                         SHORTNESS of BREATH
                        <span id="shortness_breath" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;width: 20px;"><input type="checkbox" class="consent-checkbox" id="shortness-breath" name="shortness_breath" value="false" onclick="checkboxChange('shortness-breath', 'shortness_breath')"> </span> /
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div style="display: flex;">
                          CHESTPAIN
                        <span id="chestpain_form" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="chestpain-form" name="chestpain_form" value="false" onclick="checkboxChange('chestpain-form', 'chestpain_form')"> </span> /
                      </div>
                    </td>
                    <td>
                      <div style="display: flex;">
                         DISEASES OF THE HEART
                        <span id="diseases_heart" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="diseases-heart" name="diseases_heart" value="false" onclick="checkboxChange('diseases-heart', 'diseases_heart')"> </span> /
                      </div>
                    </td>
                    <td>
                      <div style="display: flex;">
                         LIVER
                        <span id="liver_form" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="liver-form" name="liver_form" value="false" onclick="checkboxChange('liver-form', 'liver_form')"> </span> /
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div style="display: flex;">
                         LUNGS
                        <span id="lungs_form" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="lungs-form" name="lungs_form" value="false" onclick="checkboxChange('lungs-form', 'lungs_form')"> </span> /
                      </div>
                    </td>
                    <td>
                      <div style="display: flex;">
                         KIDNEY
                         <span id="kidney_form" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="kidney-form" name="kidney_form" value="false" onclick="checkboxChange('kidney-form', 'kidney_form')"> </span> /
                      </div>
                    </td>
                    <td>
                      <div style="display: flex;">
                         BLOOD
                         <span id="blood_form" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="blood-form" name="blood_form" value="false"  onclick="checkboxChange('blood-form', 'blood_form')"> </span> /
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3">
                      <div style="display: flex;">
                        STOMACH and INTESTINE
                        <span id="stomach_intestine" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="stomach-intestine" name="stomach_intestine" value="false"  onclick="checkboxChange('stomach-intestine', 'stomach_intestine')"> </span> /
                      </div>
                    </td>
                  </tr>
                </table>
                </p>
                <p style="line-height: ;text-align: justify;display: flex;"> 
                  <table style="width: 100%;font-family: Arial;padding: 0 margin: 0;">
                    <tr style="border-bottom: none;">
                    <td style="width: 57px;"><span>*OTHERS:   </span></td>
                    <td style="padding: 5px;border-bottom: 1px solid;">
                    <span id="others_form" style="width: 100%;display: bloc;text-align: left;height:23px;position: relative;"> <input type="text" name="others_form" style"text-align: left;height: 25px;border-bottom: none;width: 100%" id="others-form" ></span>
                    </td>
                    </tr>
                    <tr style="border-bottom: none;">
                    <td style="width: 57px;"><span> PDH:  </span></td>
                    <td style="padding: 5px;border-bottom: 1px solid;">
                    <span id="hpd_form" style="width: 100%;display: bloc;text-align: left;height:23px;position: relative;"> <input type="text" name="hpd_form" style"text-align: left;height: 25px;border-bottom: none;width: 100%" id="hpd-form" ></span>
                     </td>
                    </tr>
                    <tr style="border-bottom: none;">
                    <td style="width: 207px;"><span> Personal & Social Hx:  </span></td>
                    <td style="padding: 5px;border-bottom: 1px solid;">
                      <span id="personal_social" style="width: 100%;display: bloc;text-align: left;height:23px;position: relative;"> <input type="text" name="personal_social" style"text-align: left;height: 25px;border-bottom: none;width: 100%" id="personal-social" ></span>
                     </td>
                    </tr>
                  </table>
                </p>

                <p style="line-height: 1;margin-top: 35p;text-align: justify;display: flex;"> 
                <span>I,</span><span id="i_form" style="width: 267px;display: bloc;text-align: left;height:23px;position: relative;border-bottom: 1px solid;"> <input type="text" name="i_form" style"text-align: center;height: 25px;border-bottom: none;" id="i-form" ></span>
                 <span>, do hereby consent to be the performance, </span>
                </p>
                <p style="line-height: ;text-align: justify;display: flex;"> 
                  <span id="my_self" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="my-self" name="my_self" onclick="checkboxChange('my-self', 'my_self')" value="false"> </span> myself &nbsp;&nbsp;
                  <span id="spouse_form" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="spouse-form" name="spouse_form" onclick="checkboxChange('spouse-form', 'spouse_form')" value="false"> </span> my spouse  &nbsp;&nbsp;
                  <span id="son_doughter" style="display: bloc;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="son-doughter" name="son_doughter"  onclick="checkboxChange('son-doughter', 'son_doughter')" value="false"> </span> my son/doughter, &nbsp;&nbsp;
                  Other <span id="other_form" style="display: bloc;text-align: left;height:23px;position: relative;border-bottom: 1px solid"> <input type="text" name="other_form" style"text-align: left;height: 25px;border-bottom: none;width: 70px" id="other-form" ></span> of all the dental
                </p>
                <p style="line-height:;text-align: justify;display: flex;">
                  procedures, operations & other treatments that may be considered necessary to restoremy oral and dental health. 
                </p>
                <p style="line-height: 1.3;margin-top: 15p;text-align: justify;"> 
                   I, voluntarily absolve my dentist from all liabilities whatever result in any intervention of treatment may be & be it known further, that I am willing to PAY for all the SERVICES RENDERED me and or my family.
                </p>
              @endforeach
              <table style="width: 100%;font-family: Arial;">
                  <tr style="border-bottom: none;">
                    <td style="width: 29%;padding: 0;height: 80px;">
                      <div class="sign-area witness" style="display: none;">
                        <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('witness')">rate_review</i>
                      </div>
                      <span class="sign-area witness signature" style"text-align: center;height: 59px;display: block;"></span>
                    </td>
                    <td style="width: 10%;padding: 0;">
                    </td>
                    <td style="width: 28%;padding: 0;">
                    <div class="sign-area patient7" style="display: none;">
                        <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('patient7')">rate_review</i>
                      </div>
                      <span class="sign-area patient7 signature" style"text-align: center;height: 59px;display: block;"></span>
                    </td>
                    <td style="width: 10%;padding: 0;">
                    </td>
                    <td style="width: 25%;padding: 0;vertical-align: botto;text-align: center;">
                      <span id="signer-name" style="font-size: 16px;"><?php echo date('F j, Y'); ?></span>
                    </td>
                  </tr>
                  <tr style="border-bottom: none;">
                  <td style="border-top: 1px soli;text-align: center;">
                    <div class="resign">
                  WITNESS
                    </div>
                  </td>
                  <td></td>
                  <td style="border-top: 1px soli;text-align: center;">
                   PATIENT SIGNATURE
                  </td>
                  <td></td>
                  <td style="border-top: 1px soli;text-align: center;">
                    DATE
                  </td>
                  </tr>
                </table>
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('orthodontic-braces-contract')">Save</button>
    </div>
  </div>

    <!-- Modal -->
 <div id="modal-kinnie-funt" class="modal">
    <div class="modal-consent-kinnie-funt pb-0">
        <form id="form-consent-kinnie-funt" method="post">
          @csrf
          <input type="hidden" name="consent_patient_id" id="kinnie_funt_patient_id" value=""/>
          <input type="hidden" name="html" id="kinnie_funt_html" value=""/>
          <input type="hidden" name="image_1" id="kinnie_funt_image1" value=""/>
          <input type="hidden" name="image_2" id="kinnie_funt_image2" value=""/>
           <input type="hidden" name="consent_type" id="consent_type_kinnie" value=""/>
          <div class="wrapper mb-5">
          <head>
        <style type="text/css"> 
          @page {
                  /* 'em' 'ex' and % are not allowed; length values are width height */
            margin: 1% 3%; /* <any of the usual CSS values for margins> */
                        /*(% of page-box width for LR, of height for TB) */
            }
            table.tbl-k-hide  input[typ=text], table.tbl-k-hide  div label {
              display: none;
            }

            table.tbl-k-hide td p {
              font-size: 16px;

            }
            input {
              border: none;
               /* border: 3px solid red; */
               input:focus {
  outline: none;
  color: blue;
  border: 1px solid black;
 text-decoration: underline;
  box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.5);
  border-radius: 0.5rem;
}

            }
            input:focus {
          }
            input[typ=text]{
          border: 3px solid red;
        }
        #note1 input {
          border-bottom: 1px solid;
        }

             .signature#the-head {
              background-image: url('https://sagundentalclinic.com/assets/files/kinnie-funt-drawing/head-background.jpg') !important;
              background-repeat: no-repeat;background-size: contain;
            }
            .sign-area.body.start {
              background-image: url('https://sagundentalclinic.com/assets/files/kinnie-funt-drawing/body-draw-portrait.jpg') !important;
              background-repeat: no-repeat;background-size: 100%;

            } 
          </style>
          </head>

          <div style="font-family: Arial;">
          <div style="width: 700px">
            <h5>The Asian-American Academy of Functional Orthodontic and TMJ Philippines Section</h5>
            <h4>The Kinnie-Funt (K-F) Chief Complaint Visual Index for Head, Neck, and Facial Pain and TMJ Dysfunction</h4>
            <div style="display: block;width: 100%;margin 0 10px;">
              <div style="">
                <ol>
                    <li><i>Please circle the number in front of the symptoms you regularly or ocassionally have.</i></li>
                    <li>
                      <i>Indicate your main or chief complaints in order of their current importance.</i><br>
                      <table style="width: 100%;font-family: Arial;" class="tr-border-none">
                            <tr>
                              <td style="width: 11px;"> 
                              (A).
                              </td>
                              <td id="indicate_A" style="border-bottom: 1px solid;display: bloc;text-align: center;height:23px;">
                                <span style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="indicate_A" style="width: 100;text-align: center;height: 23px;border-bottom: none;font-size: 16px;display: block;" id="indicate-A"  data-type="currency-rebond-of-bracket" value=""></span>
                        
                              </td>
                            </tr>
                            <tr>
                              <td>
                                (B).
                              </td>
                              <td id="indicate_B" style="border-bottom: 1px solid;display: bloc;text-align: center;height:23px;">
                                <span style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="indicate_B" style="width: 100;text-align: center;height: 23px;border-bottom: none;font-size: 16px;display: block;" id="indicate-B"  data-type="currency-rebond-of-bracket" value=""></span>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                (C).
                              </td>
                              <td id="indicate_C" style="border-bottom: 1px solid;display: bloc;text-align: center;height:23px;">
                                <span style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="indicate_C" style="width: 100;text-align: center;height: 23px;border-bottom: none;font-size: 16px;display: block;" id="indicate-C"  data-type="currency-rebond-of-bracket" value=""></span>
                              </td>
                            </tr>
                        </table>
                  </li>
                    <li>
                      <i>
                        Please draw area of pain or distress on the picture below
                    </i>
                  </li>
                </ol>
                <div class="sign-area head" style="display: none;">
                  <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('kinnie')">rate_review</i>
                </div>
 
                @if( $data->consentDataKinnieHeadImage == 'assets/files/kinnie-funt-drawing/head-background.jpg') 
                <div id="the-head" class="sign-area head signature head-draw" style="margin-top: 42px;height:300px;width: 300px;background-image: url('{{$data->consentDataKinnieHeadImage}}');background-repeat: no-repeat;background-size: 100%;position:relative;">
                  <div id="" class="" style="margin-top: 42px;height:300px;width: 300px;background-image: url('https://sagundentalclinic.com/assets/files/kinnie-funt-drawing/head-background.jpg');background-repeat: no-repeat;background-size: 100%;position:relative;">
                  </div>
              </div>
            
                @else
                  <div id="" class="" style="margin-top: 42px;height:300px;width: 300px;background-image: url('/{{$data->consentDataKinnieHeadImage}}');background-repeat: no-repeat;background-size: 100%;position:relative;">
                  <div id="" class="sign-area head signature head-draw" style="margin-top: 42px;height:300px;width: 300px;background-image: url('{{$data->consentDataKinnieHeadImage}}');background-repeat: no-repeat;background-size: 100%;position:relative;"></div>
                
                </div>
                  
                @endif
              

                  
              </div>
              <div style="">
              @foreach($patientDataInfo as $key => $data)
                <table style="width: 100%;font-family: Arial;" class="tr-border-none">
                  <tr>
                    <td style="width: 80px;">
                    <strong>Name: </strong>
                    </td>
                    <td colspan="3" style="border-bottom: 1px solid;">
                      <strong>{{$data->firstName}} {{$data->lastName}}</strong>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Age: </strong></td>
                    <td style="border-bottom: 1px solid;">{{$data->age}}</td>
                    <td style="width: 70px;"><strong>Date:</strong></td>
                    <td style="border-bottom: 1px solid;"><?php echo date('F j, Y'); ?></td>
                  </tr>
                </table>
        
               
               <table style="width: 100%;font-family: Arial;font-size:15.5px;margin-top: 30px;" class="tr-border-none kf-tbl tbl-k-hide">
                    <tr>
                      <td style="vertical-align: top;">
                          
                                <strong style="display: inline"><span id="A_main" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A-main" name="A_main" onclick="kfcheckboxChange('A-main', 'A_main')"> </span>A.&nbsp;  Eye Pain and Eye Orbital Problems:<span id="note1"  style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="A_main_note" id="A-main-note" ></span></strong>
                                <p><span id="A_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A-1" name="A_1" onclick="kfcheckboxChange('A-1', 'A_1')"> </span> 1. Eye (orbital) pain: above, below, behind <span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="A_1_note" id="A-1-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                <p><span id="A_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A-2" name="A_2" onclick="kfcheckboxChange('A-2', 'A_2')"> </span> 2. Bloodshot eyes (hyperemia)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="A_2_note" id="A-2-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                <p><span id="A_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A-3" name="A_3" onclick="kfcheckboxChange('A-3', 'A_3')"> </span> 3. Blurring of vision<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="A_3_note" id="A-3-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                <p><span id="A_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A-4" name="A_4" onclick="kfcheckboxChange('A-4', 'A_4')"> </span> 4. Bulging appearance (exophthalmia)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="A_4_note" id="A-4-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                <p><span id="A_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A-5" name="A_5" onclick="kfcheckboxChange('A-5', 'A_5')"> </span> 5. Pressure behind the eyes (retro-orbital pressure)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="A_5_note" id="A-5-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                <p><span id="A_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A-6" name="A_6" onclick="kfcheckboxChange('A-6', 'A_6')"> </span> 6. Light sensitivity (photo-phobia)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="A_6_note" id="A-6-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                <p><span id="A_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A-7" name="A_7" onclick="kfcheckboxChange('A-7', 'A_7')"> </span> 7. Watering of the eye (lacrimation)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="A_7_note" id="A-7-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                <p><span id="A_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A-8" name="A_8" onclick="kfcheckboxChange('A-8', 'A_8')"> </span> 8. Dropping of the eye lid (ptosis)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="A_8_note" id="A-8-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                       
                            </p>
                            <br>
                            <strong style="display: inline"><span id="B_main" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B-main" name="B_main" onclick="kfcheckboxChange('B-main', 'B_main')"> </span> B.&nbsp; Head Pain, Headache Problems, Facial Pain:<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="B_main_note" id="B-main-note" ></span></strong>
                                      <p><span id="B_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B-1" name="B_1" onclick="kfcheckboxChange('B-1', 'B_1')"> </span> 1. Forehead (frontal) pain<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="B_1_note" id="B-1-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                      <p><span id="B_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B-2" name="B_2" onclick="kfcheckboxChange('B-2', 'B_2')"> </span> 2. Temples (temporal) pain<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="B_2_note" id="B-2-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                      <p><span id="B_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B-3" name="B_3" onclick="kfcheckboxChange('B-3', 'B_3')"> </span> 3. "Migraine" type headache.<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="B_3_note" id="B-3-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                      <p><span id="B_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B-4" name="B_4" onclick="kfcheckboxChange('B-4', 'B_4')"> </span> 4. "Cluster" type headache.<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="B_4_note" id="B-4-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                      <p><span id="B_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B-5" name="B_5" onclick="kfcheckboxChange('B-5', 'B_5')"> </span> 5. Maxillary sinus headache (under the eyes)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="B_5_note" id="B-5-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                      <p><span id="B_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B-6" name="B_6" onclick="kfcheckboxChange('B-6', 'B_6')"> </span> 6. Posterior back of head headaches with or without shooting pains (occipital headaches)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="B_6_note" id="B-6-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                      <p><span id="B_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B-7" name="B_7" onclick="kfcheckboxChange('B-7', 'B_7')"> </span> 7. Hair and or scalp painful to touch (parietal headache)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="B_7_note" id="B-7-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                    </ol>
                            </p>
                            <br>
                            <p>
                            <strong style="display: inline"><span id="C_main" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C-main" name="C_main" onclick="kfcheckboxChange('C-main', 'C_main')"> </span>C.&nbsp; Mouth, Face, Cheek, and Chin Problems:<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="C_main_note" id="C-main-note" ></span></strong>
                                      <p><span id="C_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C-1" name="C_1" onclick="kfcheckboxChange('C-1', 'C_1')"></span> 1. Discomfort<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="C_1_note" id="C-1-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                      <p><span id="C_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C-2" name="C_2" onclick="kfcheckboxChange('C-2', 'C_2')"></span> 2. Limited opening<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="C_2_note" id="C-2-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                      <p><span id="C_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C-3" name="C_3" onclick="kfcheckboxChange('C-3', 'C_3')"></span> 3. Inability to open smoothly, evenly<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="C_3_note" id="C-3-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                      <p><span id="C_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C-4" name="C_4" onclick="kfcheckboxChange('C-4', 'C_4')"></span> 4. Jaw deviates to one side when opening<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="C_4_note" id="C-4-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                      <p><span id="C_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C-5" name="C_5" onclick="kfcheckboxChange('C-5', 'C_5')"></span> 5. Inability to “find bite”<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="C_5_note" id="C-5-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                            </p>
                            <br>
                            <p>
                            <strong style="display: inline"> <span id="D_main" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D-main" name="D_main" onclick="kfcheckboxChange('D-main', 'D_main')"> </span>D.&nbsp;	Teeth and Gum Problems:<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="D_main_note" id="D-main-note" ></span></strong>
                                      <p><span id="D_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D-1" name="D_1" onclick="kfcheckboxChange('D-1', 'D_1')"></span> 1. Clenching, grinding at night (bruxism)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="D_1_note" id="D-1-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                      <p><span id="D_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D-2" name="D_2" onclick="kfcheckboxChange('D-2', 'D_2')"></span> 2. Looseness and or soreness of back teeth<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="D_2_note" id="D-2-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                      <p><span id="D_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D-3" name="D_3" onclick="kfcheckboxChange('D-3', 'D_3')"></span> 3. Tooth pain (toothache)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="D_3_note" id="D-3-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                            </p>
                            <br>

                      </td>

                      </tr>
                      <tr>
                      <td style="">
                        <p>
                        <strong style="display: inline"><span id="E_main" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E-main" name="E_main" onclick="kfcheckboxChange('E-main', 'E_main')"> </span>E.&nbsp; Jaw and Jaw Joint (TMJ) Problems:<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="E_main_note" id="E-main-note" ></span></strong>
                                  <p><span id="E_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E-1" name="E_1" onclick="kfcheckboxChange('E-1', 'E_1')"></span> 1. Clicking, popping jaw joints<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="E_1_note" id="E-1-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="E_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E-2" name="E_2" onclick="kfcheckboxChange('E-2', 'E_2')"></span> 2. Grating sounds (crepitus)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="E_2_note" id="E-2-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="E_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E-3" name="E_3" onclick="kfcheckboxChange('E-3', 'E_3')"></span> 3. Jaw locking opened or closed<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="E_3_note" id="E-3-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="E_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E-4" name="E_4" onclick="kfcheckboxChange('E-4', 'E_4')"></span> 4. Pin in cheek muscles<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="E_4_note" id="E-4-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="E_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E-5" name="E_5" onclick="kfcheckboxChange('E-5', 'E_5')"></span> 5. Uncontrollable jaw, tongue movements<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="E_5_note" id="E-5-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                   
                        </p>
                        <br>
                        <p>
                        <strong style="display: inline"><span id="F_main" style="font-weight: 700"><input type="checkbox" class="kinnie-checkbox" value="false" id="F-main" name="F_main" onclick="kfcheckboxChange('F-main', 'F_main')"> </span>F.&nbsp; Ear Pain, Ear Problems, and Postural Imbalances:<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="F_main_note" id="F-main-note" ></span></strong>
                                  <p><span id="F_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F-1" name="F_1" onclick="kfcheckboxChange('F-1', 'F_1')"></span> 1. Hissing, buzzing, ringing, or roaring sound (tinitus)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="F_1_note" id="F-1-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="F_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F-2" name="F_2" onclick="kfcheckboxChange('F-2', 'F_2')"></span> 2. Diminished hearing (subjective hearing loss)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="F_2_note" id="F-2-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="F_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F-3" name="F_3" onclick="kfcheckboxChange('F-3', 'F_3')"></span> 3. Ear pain without infection (otalgia)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="F_3_note" id="F-3-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="F_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F-4" name="F_4" onclick="kfcheckboxChange('F-4', 'F_4')"></span> 4. Clogged, stuffy, "itchy" ears, feeling of fullness<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="F_4_note" id="F-4-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="F_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F-5" name="F_5" onclick="kfcheckboxChange('F-5', 'F_5')"></span> 5. Balance problems, "vertigo" (disequilibrium)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="F_5_note" id="F-5-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                        </p>
                        <br>
                        <p>
                        <strong style="display: inline"><span id="G_main" style="font-weight: 700"><input type="checkbox" class="kinnie-checkbox" value="false" id="G-main" name="G_main" onclick="kfcheckboxChange('G-main', 'G_main')"> </span>G.&nbsp;Throat Problems:<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="G_main_note" id="G-main-note" ></span></strong>
                                  <p><span id="G_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G-1" name="G_1" onclick="kfcheckboxChange('G-1', 'G_1')"></span> 1. Swallowing difficulties/tightness of throat<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="G_1_note" id="G-1-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="G_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G-2" name="G_2" onclick="kfcheckboxChange('G-2', 'G_2')"></span> 2. Sore throat without infection (coryza)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="G_2_note" id="G-2-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="G_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G-3" name="G_3" onclick="kfcheckboxChange('G-3', 'G_3')"></span> 3. Voice fluctuations<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="G_3_note" id="G-3-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="G_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G-4" name="G_4" onclick="kfcheckboxChange('G-4', 'G_4')"></span> 4. Frequesnt coughing or constant clearing of throat<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="G_4_note" id="G-4-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="G_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G-5" name="G_5" onclick="kfcheckboxChange('G-5', 'G_5')"></span> 5. Tongue pain (glossalgia)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="G_5_note" id="G-5-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="G_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G-6" name="G_6" onclick="kfcheckboxChange('G-6', 'G_6')"></span> 6. Salivation (intense)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="G_6_note" id="G-6-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="G_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G-7" name="G_7" onclick="kfcheckboxChange('G-7', 'G_7')"></span> 7. Pain in the hard palate (posterior areas)<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="G_7_note" id="G-7-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                        </p>
                        <br>
                        <p>
                        <strong style="display: inline"><span id="H_main" style="font-weight: 700"><input type="checkbox" class="kinnie-checkbox" value="false" id="H-main" name="H_main" onclick="kfcheckboxChange('H-main', 'H_main')"> </span>H.&nbsp; Neck and Shoulder Problems:<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="H_main_note" id="H-main-note" ></span></strong>
                       
                                  <p><span id="H_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H-1" name="H_1" onclick="kfcheckboxChange('H-1', 'H_1')"></span> 1. Lack of mobility-reduced range of movement<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="H_1_note" id="H-1-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="H_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H-2" name="H_2" onclick="kfcheckboxChange('H-2', 'H_2')"></span> 2. Stiffness<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="H_2_note" id="H-2-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="H_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H-3" name="H_3" onclick="kfcheckboxChange('H-3', 'H_3')"></span> 3. Neck pain<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="H_3_note" id="H-3-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="H_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H-4" name="H_4" onclick="kfcheckboxChange('H-4', 'H_4')"></span> 4. Tired, sore, neck muscles<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="H_4_note" id="H-4-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="H_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H-5" name="H_5" onclick="kfcheckboxChange('H-5', 'H_5')"></span> 5. Shoulder aches<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="H_5_note" id="H-5-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="H_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H-6" name="H_6" onclick="kfcheckboxChange('H-6', 'H_6')"></span> 6. Back pain upper and lower<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="H_6_note" id="H-6-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="H_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H-7" name="H_7" onclick="kfcheckboxChange('H-7', 'H_7')"></span> 7. Arm and finger tingling, numbness and or pain<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="H_7_note" id="H-7-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="H_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H-8" name="H_8" onclick="kfcheckboxChange('H-8', 'H_8')"></span> 8. Scoliosis<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="H_8_note" id="H-8-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                                  <p><span id="H_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H-9" name="H_9" onclick="kfcheckboxChange('H-9', 'H_9')"></span> 9. Leg length discrepancy<span id="note1" style="border-bottom: 1px solid white;display: bloc;text-align: center;width: 100%;font-size: 14px;"> <input type="text" name="H_9_note" id="H-9-note" style"text-align: center;height: 23px;width: 500px;font-weight: 700;border: 1px solid black;"></span></p>
                    
                        </p>
                      <td>
                </tr>
            </table>
             </div>
             </div>
        </div>    
          <!-- <div style="page-break-before: always"></div> -->
          <div class="tbl-width" style="width: auto">
          <div class="srcollable-table">
          <h5 style="font-size: 12px;line-height: .9">Visual Index Treatment Evaluation</h5>
          <table style="width: 100%;font-family: Arial;font-size:10px;" class="tr-border-none">
            <tr><td style="min-width: 400px;border-bottom: 1px soli;text-align: center;"><strong> {{$data->firstName}} {{$data->lastName}}</strong></td><td style="min-width: 400px;">Please indicate with a check mark() the progress you have made in the following areas.</td></tr>
              <tr><td style"text-align: center;font-size: 15px;padding: 2px 9px 10px;">(Patient)</td><td></td></tr>
          </table>

          <table style="width: 200%;font-family: Arial;font-size:13px;border-spacing: 0;border-collapse: collapse;" class="tr-border-none tbl-k-hide">
          <tr>
            <td style="width: 400px;border: 1px solid;display: block;"></td>
            <td style="width: 20%;border: 1px solid;height: 40px;">
              Appointment<br>
              <table style="width: 100%;font-family: Arial;font-size:10p;text-align: center;line-height: 1;" class="tr-border-none">
                <tr>
                  <td> 
                    <span style="width: 20px;">Date: </span>
                  </td>
                  <td colspan="4">
                    <span id="date_1" style="border-bottom: 1px solid;display: bloc;text-align: center;height:18px;"> <input type="text" name="date_1" style"text-align: center;height: 13px;border-bottom: none;font-size: 10px;display: block;" id="date-1"  data-type="currency-rebond-of-bracket" value=""></span>
                  </td>
                </tr>
                <tr>
                  <td></td><td>LESS</td><td>SAME</td><td>MORE</td><td>N/A</td>
                </tr>
              </table>
            </td>
            <td style="width: 20%;border: 1px solid;padding: 5px;">
              Appointment<br>
              <table style="width: 100%;font-family: Arial;font-size:10p;text-align: center;" class="tr-border-none">
                <tr>
                  <td> 
                    <span style="width: 20px;">Date: </span>
                  </td>
                  <td colspan="4">
                    <span id="date_2" style="border-bottom: 1px solid;display: bloc;text-align: center;height:18px;"> <input type="text" name="date_2" style"text-align: center;height: 13px;border-bottom: none;font-size: 10px;display: block;" id="date-2"  data-type="currency-rebond-of-bracket" value=""></span>
                  </td>
                </tr>
                <tr>
                  <td></td><td>LESS</td><td>SAME</td><td>MORE</td><td>N/A</td>
                </tr>
              </table>
            </td>
            <td style="width: 20%;border: 1px solid;padding: 5px;">
              Appointment<br>
              <table style="width: 100%;font-family: Arial;font-size:10p;text-align: center;" class="tr-border-none">
                <tr>
                  <td> 
                    <span style="width: 20px;">Date: </span>
                  </td>
                  <td colspan="4">
                    <span id="date_3" style="border-bottom: 1px solid;display: bloc;text-align: center;height:18px;"> <input type="text" name="date_3" style"text-align: center;height: 13px;border-bottom: none;font-size: 10px;display: block;" id="date-3"  data-type="currency-rebond-of-bracket" value=""></span>
                  </td>
                </tr>
                <tr>
                  <td></td><td>LESS</td><td>SAME</td><td>MORE</td><td>N/A</td>
                </tr>
              </table>
            </td>
            <td style="width: 20%;border: 1px solid;padding: 5px;">
              Appointment<br>
              <table style="width: 100%;font-family: Arial;font-size:10p;text-align: center;" class="tr-border-none">
                <tr>
                  <td> 
                    <span style="width: 20px;">Date: </span>
                  </td>
                  <td colspan="4">
                    <span id="date_4" style="border-bottom: 1px solid;display: bloc;text-align: center;height:18px;"> <input type="text" name="date_4" style"text-align: center;height: 13px;border-bottom: none;font-size: 10px;display: block;" id="date-4"  data-type="currency-rebond-of-bracket" value=""></span>
                  </td>
                </tr>
                <tr>
                  <td></td><td>LESS</td><td>SAME</td><td>MORE</td><td>N/A</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
                <p><span id="As2_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="As2-1" name="As2_1" onclick="kfcheckboxChange('As2-1', 'As2_1')"></span> 1. Eye (orbital) pain: above, below, behind</p>
                <p><span id="As2_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="As2-2" name="As2_2" onclick="kfcheckboxChange('As2-2', 'As2_2')"></span>  2. Bloodshot eyes (hyperemia)</p>
                <p><span id="As2_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="As2-3" name="As2_3" onclick="kfcheckboxChange('As2-3', 'As2_3')"></span> 3. Blurring of vision</p>
                <p><span id="As2_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="As2-4" name="As2_4" onclick="kfcheckboxChange('As2-4', 'As2_4')"></span> 4. Bulging appearance (exophthalmia)</p>
                <p><span id="As2_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="As2-5" name="As2_5" onclick="kfcheckboxChange('As2-5', 'As2_5')"></span> 5. Pressure behind the eyes (retro-orbital pressure)</p>
                <p><span id="As2_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="As2-6" name="As2_6" onclick="kfcheckboxChange('As2-6', 'As2_6')"></span> 6. Light sensitivity (photo-phobia)</p>
                <p><span id="As2_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="As2-7" name="As2_7" onclick="kfcheckboxChange('As2-7', 'As2_7')"></span> 7.  Watering of the eye (lacrimation)</p>
                <p><span id="As2_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="As2-8" name="As2_8" onclick="kfcheckboxChange('As2-8', 'As2_8')"></span> 8. Dropping of the eye lid (ptosis)</p>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .7;" class="tr-border-none">
                  <tr>
                    <td style="font-size: 12px;">A1</td>
                    <td>
                      <span id="A1_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A1-1" name="A1_1" onclick="kfcheckboxChange('A1-1', 'A1_1')"> </span>
                    </td>
                    <td>
                      <span id="A1_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A1-2" name="A1_2" onclick="kfcheckboxChange('A1-2', 'A1_2')"> </span>
                    </td>
                    <td>
                      <span id="A1_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A1-3" name="A1_3" onclick="kfcheckboxChange('A1-3', 'A1_3')"> </span>
                    </td>
                    <td>
                      <span id="A1_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A1-4" name="A1_4" onclick="kfcheckboxChange('A1-4', 'A1_4')"> </span>
                    </td>
                  </tr>
                  <tr>
                  <td style="font-size: 12px;">A2</td>
                    <td>
                      <span id="A2_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A2-1" name="A2_1" onclick="kfcheckboxChange('A2-1', 'A2_1')"> </span>
                    </td>
                    <td>
                      <span id="A2_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A2-2" name="A2_2" onclick="kfcheckboxChange('A2-2', 'A2_2')"> </span>
                    </td>
                    <td>
                      <span id="A2_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A2-3" name="A2_3" onclick="kfcheckboxChange('A2-3', 'A2_3')"> </span>
                    </td>
                    <td>
                      <span id="A2_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A2-4" name="A2_4" onclick="kfcheckboxChange('A2-4', 'A2_4')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">A3</td>
                    <td>
                      <span id="A3_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A3-1" name="A3_1" onclick="kfcheckboxChange('A3-1', 'A3_1')"> </span>
                    </td>
                    <td>
                      <span id="A3_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A3-2" name="A3_2" onclick="kfcheckboxChange('A3-2', 'A3_2')"> </span>
                    </td>
                    <td>
                      <span id="A3_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A3-3" name="A3_3" onclick="kfcheckboxChange('A3-3', 'A3_3')"> </span>
                    </td>
                    <td>
                      <span id="A3_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A3-4" name="A3_4" onclick="kfcheckboxChange('A3-4', 'A3_4')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">A4</td>
                    <td>
                      <span id="A4_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A4-1" name="A4_1" onclick="kfcheckboxChange('A4-1', 'A4_1')"> </span>
                    </td>
                    <td>
                      <span id="A4_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A4-2" name="A4_2" onclick="kfcheckboxChange('A4-2', 'A4_2')"> </span>
                    </td>
                    <td>
                      <span id="A4_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A4-3" name="A4_3" onclick="kfcheckboxChange('A4-3', 'A4_3')"> </span>
                    </td>
                    <td>
                      <span id="A4_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A4-4" name="A4_4" onclick="kfcheckboxChange('A4-4', 'A4_4')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">A5</td>
                    <td>
                      <span id="A5_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A5-1" name="A5_1" onclick="kfcheckboxChange('A5-1', 'A5_1')"> </span>
                    </td>
                    <td>
                      <span id="A5_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A5-2" name="A5_2" onclick="kfcheckboxChange('A5-2', 'A5_2')"> </span>
                    </td>
                    <td>
                      <span id="A5_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A5-3" name="A5_3" onclick="kfcheckboxChange('A5-3', 'A5_3')"> </span>
                    </td>
                    <td>
                      <span id="A5_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A5-4" name="A5_4" onclick="kfcheckboxChange('A5-4', 'A5_4')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">A6</td>
                    <td>
                      <span id="A6_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A6-1" name="A6_1" onclick="kfcheckboxChange('A6-1', 'A6_1')"> </span>
                    </td>
                    <td>
                      <span id="A6_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A6-2" name="A6_2" onclick="kfcheckboxChange('A6-2', 'A6_2')"> </span>
                    </td>
                    <td>
                      <span id="A6_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A6-3" name="A6_3" onclick="kfcheckboxChange('A6-3', 'A6_3')"> </span>
                    </td>
                    <td>
                      <span id="A6_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A6-4" name="A6_4" onclick="kfcheckboxChange('A6-4', 'A6_4')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">A7</td>
                    <td>
                      <span id="A7_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A7-1" name="A7_1" onclick="kfcheckboxChange('A7-1', 'A7_1')"> </span>
                    </td>
                    <td>
                      <span id="A7_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A7-2" name="A7_2" onclick="kfcheckboxChange('A7-2', 'A7_2')"> </span>
                    </td>
                    <td>
                      <span id="A7_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A7-3" name="A7_3" onclick="kfcheckboxChange('A7-3', 'A7_3')"> </span>
                    </td>
                    <td>
                      <span id="A7_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A7-4" name="A7_4" onclick="kfcheckboxChange('A7-4', 'A7_4')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">A8</td>
                    <td>
                      <span id="A8_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A8-1" name="A8_1" onclick="kfcheckboxChange('A8-1', 'A8_1')"> </span>
                    </td>
                    <td>
                      <span id="A8_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A8-2" name="A8_2" onclick="kfcheckboxChange('A8-2', 'A8_2')"> </span>
                    </td>
                    <td>
                      <span id="A8_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A8-3" name="A8_3" onclick="kfcheckboxChange('A8-3', 'A8_3')"> </span>
                    </td>
                    <td>
                      <span id="A8_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A8-4" name="A8_4" onclick="kfcheckboxChange('A8-4', 'A8_4')"> </span>
                    </td>
                  </tr>
                </table>                
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
                  <tr>
                  <td style="font-size: 12px;">A1</td>
                    <td>
                      <span id="A1_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A1-5" name="A1_5" onclick="kfcheckboxChange('A1-5', 'A1_5')"> </span>
                    </td>
                    <td>
                      <span id="A1_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A1-6" name="A1_6" onclick="kfcheckboxChange('A1-6', 'A1_6')"> </span>
                    </td>
                    <td>
                      <span id="A1_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A1-7" name="A1_7" onclick="kfcheckboxChange('A1-7', 'A1_7')"> </span>
                    </td>
                    <td>
                      <span id="A1_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A1-8" name="A1_8" onclick="kfcheckboxChange('A1-8', 'A1_8')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">A2</td>
                    <td>
                      <span id="A2_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A2-5" name="A2_5" onclick="kfcheckboxChange('A2-5', 'A2_5')"> </span>
                    </td>
                    <td>
                      <span id="A2_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A2-6" name="A2_6" onclick="kfcheckboxChange('A2-6', 'A2_6')"> </span>
                    </td>
                    <td>
                      <span id="A2_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A2-7" name="A2_7" onclick="kfcheckboxChange('A2-7', 'A2_7')"> </span>
                    </td>
                    <td>
                      <span id="A2_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A2-8" name="A2_8" onclick="kfcheckboxChange('A2-8', 'A2_8')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">A3</td>
                    <td>
                      <span id="A3_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A3-5" name="A3_5" onclick="kfcheckboxChange('A3-5', 'A3_5')"> </span>
                    </td>
                    <td>
                      <span id="A3_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A3-6" name="A3_6" onclick="kfcheckboxChange('A3-6', 'A3_6')"> </span>
                    </td>
                    <td>
                      <span id="A3_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A3-7" name="A3_7" onclick="kfcheckboxChange('A3-7', 'A3_7')"> </span>
                    </td>
                    <td>
                      <span id="A3_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A3-8" name="A3_8" onclick="kfcheckboxChange('A3-8', 'A3_8')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">A4</td>
                    <td>
                      <span id="A4_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A4-5" name="A4_5" onclick="kfcheckboxChange('A4-5', 'A4_5')"> </span>
                    </td>
                    <td>
                      <span id="A4_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A4-6" name="A4_6" onclick="kfcheckboxChange('A4-6', 'A4_6')"> </span>
                    </td>
                    <td>
                      <span id="A4_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A4-7" name="A4_7" onclick="kfcheckboxChange('A4-7', 'A4_7')"> </span>
                    </td>
                    <td>
                      <span id="A4_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A4-8" name="A4_8" onclick="kfcheckboxChange('A4-8', 'A4_8')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">A5</td>
                    <td>
                      <span id="A5_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A5-5" name="A5_5" onclick="kfcheckboxChange('A5-5', 'A5_5')"> </span>
                    </td>
                    <td>
                      <span id="A5_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A5-6" name="A5_6" onclick="kfcheckboxChange('A5-6', 'A5_6')"> </span>
                    </td>
                    <td>
                      <span id="A5_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A5-7" name="A5_7" onclick="kfcheckboxChange('A5-7', 'A5_7')"> </span>
                    </td>
                    <td>
                      <span id="A5_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A5-8" name="A5_8" onclick="kfcheckboxChange('A5-8', 'A5_8')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">A6</td>
                    <td>
                      <span id="A6_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A6-5" name="A6_5" onclick="kfcheckboxChange('A6-5', 'A6_5')"> </span>
                    </td>
                    <td>
                      <span id="A6_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A6-6" name="A6_6" onclick="kfcheckboxChange('A6-6', 'A6_6')"> </span>
                    </td>
                    <td>
                      <span id="A6_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A6-7" name="A6_7" onclick="kfcheckboxChange('A6-7', 'A6_7')"> </span>
                    </td>
                    <td>
                      <span id="A6_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A6-8" name="A6_8" onclick="kfcheckboxChange('A6-8', 'A6_8')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">A7</td>
                    <td>
                      <span id="A7_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A7-5" name="A7_5" onclick="kfcheckboxChange('A7-5', 'A7_5')"> </span>
                    </td>
                    <td>
                      <span id="A7_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A7-6" name="A7_6" onclick="kfcheckboxChange('A7-6', 'A7_6')"> </span>
                    </td>
                    <td>
                      <span id="A7_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A7-7" name="A7_7" onclick="kfcheckboxChange('A7-7', 'A7_7')"> </span>
                    </td>
                    <td>
                      <span id="A7_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A7-8" name="A7_8" onclick="kfcheckboxChange('A7-8', 'A7_8')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">A8</td>
                    <td>
                      <span id="A8_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A8-5" name="A8_5" onclick="kfcheckboxChange('A8-5', 'A8_5')"> </span>
                    </td>
                    <td>
                      <span id="A8_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A8-6" name="A8_6" onclick="kfcheckboxChange('A8-6', 'A8_6')"> </span>
                    </td>
                    <td>
                      <span id="A8_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A8-7" name="A8_7" onclick="kfcheckboxChange('A8-7', 'A8_7')"> </span>
                    </td>
                    <td>
                      <span id="A8_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A8-8" name="A8_8" onclick="kfcheckboxChange('A8-8', 'A8_8')"> </span>
                    </td>
                  </tr>
                </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;"><table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                  <td style="font-size: 12px;">A1</td>
                  <td>
                    <span id="A1_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A1-9" name="A1_9" onclick="kfcheckboxChange('A1-9', 'A1_9')"> </span>
                  </td>
                  <td>
                    <span id="A1_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A1-10" name="A1_10" onclick="kfcheckboxChange('A1-10', 'A1_10')"> </span>
                  </td>
                  <td>
                    <span id="A1_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A1-11" name="A1_11" onclick="kfcheckboxChange('A1-11', 'A1_11')"> </span>
                  </td>
                  <td>
                    <span id="A1_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A1-12" name="A1_12" onclick="kfcheckboxChange('A1-12', 'A1_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">A2</td>
                  <td>
                    <span id="A2_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A2-9" name="A2_9" onclick="kfcheckboxChange('A2-9', 'A2_9')"> </span>
                  </td>
                  <td>
                    <span id="A2_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A2-10" name="A2_10" onclick="kfcheckboxChange('A2-10', 'A2_10')"> </span>
                  </td>
                  <td>
                    <span id="A2_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A2-11" name="A2_11" onclick="kfcheckboxChange('A2-11', 'A2_11')"> </span>
                  </td>
                  <td>
                    <span id="A2_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A2-12" name="A2_12" onclick="kfcheckboxChange('A2-12', 'A2_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">A3</td>
                  <td>
                    <span id="A3_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A3-9" name="A3_9" onclick="kfcheckboxChange('A3-9', 'A3_9')"> </span>
                  </td>
                  <td>
                    <span id="A3_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A3-10" name="A3_10" onclick="kfcheckboxChange('A3-10', 'A3_10')"> </span>
                  </td>
                  <td>
                    <span id="A3_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A3-11" name="A3_11" onclick="kfcheckboxChange('A3-11', 'A3_11')"> </span>
                  </td>
                  <td>
                    <span id="A3_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A3-12" name="A3_12" onclick="kfcheckboxChange('A3-12', 'A3_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">A4</td>
                  <td>
                    <span id="A4_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A4-9" name="A4_9" onclick="kfcheckboxChange('A4-9', 'A4_9')"> </span>
                  </td>
                  <td>
                    <span id="A4_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A4-10" name="A4_10" onclick="kfcheckboxChange('A4-10', 'A4_10')"> </span>
                  </td>
                  <td>
                    <span id="A4_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A4-11" name="A4_11" onclick="kfcheckboxChange('A4-11', 'A4_11')"> </span>
                  </td>
                  <td>
                    <span id="A4_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A4-12" name="A4_12" onclick="kfcheckboxChange('A4-12', 'A4_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">A5</td>
                  <td>
                    <span id="A5_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A5-9" name="A5_9" onclick="kfcheckboxChange('A5-9', 'A5_9')"> </span>
                  </td>
                  <td>
                    <span id="A5_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A5-10" name="A5_10" onclick="kfcheckboxChange('A5-10', 'A5_10')"> </span>
                  </td>
                  <td>
                    <span id="A5_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A5-11" name="A5_11" onclick="kfcheckboxChange('A5-11', 'A5_11')"> </span>
                  </td>
                  <td>
                    <span id="A5_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A5-12" name="A5_12" onclick="kfcheckboxChange('A5-12', 'A5_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">A6</td>
                  <td>
                    <span id="A6_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A6-9" name="A6_9" onclick="kfcheckboxChange('A6-9', 'A6_9')"> </span>
                  </td>
                  <td>
                    <span id="A6_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A6-10" name="A6_10" onclick="kfcheckboxChange('A6-10', 'A6_10')"> </span>
                  </td>
                  <td>
                    <span id="A6_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A6-11" name="A6_11" onclick="kfcheckboxChange('A6-11', 'A6_11')"> </span>
                  </td>
                  <td>
                    <span id="A6_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A6-12" name="A6_12" onclick="kfcheckboxChange('A6-12', 'A6_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">A7</td>
                  <td>
                    <span id="A7_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A7-9" name="A7_9" onclick="kfcheckboxChange('A7-9', 'A7_9')"> </span>
                  </td>
                  <td>
                    <span id="A7_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A7-10" name="A7_10" onclick="kfcheckboxChange('A7-10', 'A7_10')"> </span>
                  </td>
                  <td>
                    <span id="A7_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A7-11" name="A7_11" onclick="kfcheckboxChange('A7-11', 'A7_11')"> </span>
                  </td>
                  <td>
                    <span id="A7_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A7-12" name="A7_12" onclick="kfcheckboxChange('A7-12', 'A7_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">A8</td>
                  <td>
                    <span id="A8_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A8-9" name="A8_9" onclick="kfcheckboxChange('A8-9', 'A8_9')"> </span>
                  </td>
                  <td>
                    <span id="A8_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A8-10" name="A8_10" onclick="kfcheckboxChange('A8-10', 'A8_10')"> </span>
                  </td>
                  <td>
                    <span id="A8_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A8-11" name="A8_11" onclick="kfcheckboxChange('A8-11', 'A8_11')"> </span>
                  </td>
                  <td>
                    <span id="A8_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A8-12" name="A8_12" onclick="kfcheckboxChange('A8-12', 'A8_12')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
            <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                  <td style="font-size: 12px;">A1</td>
                  <td>
                    <span id="A1_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A1-13" name="A1_13" onclick="kfcheckboxChange('A1-13', 'A1_13')"> </span>
                  </td>
                  <td>
                    <span id="A1_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A1-14" name="A1_14" onclick="kfcheckboxChange('A1-14', 'A1_14')"> </span>
                  </td>
                  <td>
                    <span id="A1_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A1-15" name="A1_15" onclick="kfcheckboxChange('A1-15', 'A1_15')"> </span>
                  </td>
                  <td>
                    <span id="A1_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A1-16" name="A1_16" onclick="kfcheckboxChange('A1-16', 'A1_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">A2</td>
                  <td>
                    <span id="A2_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A2-13" name="A2_13" onclick="kfcheckboxChange('A2-13', 'A2_13')"> </span>
                  </td>
                  <td>
                    <span id="A2_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A2-14" name="A2_14" onclick="kfcheckboxChange('A2-14', 'A2_14')"> </span>
                  </td>
                  <td>
                    <span id="A2_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A2-15" name="A2_15" onclick="kfcheckboxChange('A2-15', 'A2_15')"> </span>
                  </td>
                  <td>
                    <span id="A2_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A2-16" name="A2_16" onclick="kfcheckboxChange('A2-16', 'A2_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">A3</td>
                  <td>
                    <span id="A3_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A3-13" name="A3_13" onclick="kfcheckboxChange('A3-13', 'A3_13')"> </span>
                  </td>
                  <td>
                    <span id="A3_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A3-14" name="A3_14" onclick="kfcheckboxChange('A3-14', 'A3_14')"> </span>
                  </td>
                  <td>
                    <span id="A3_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A3-15" name="A3_15" onclick="kfcheckboxChange('A3-15', 'A3_15')"> </span>
                  </td>
                  <td>
                    <span id="A3_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A3-16" name="A3_16" onclick="kfcheckboxChange('A3-16', 'A3_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">A4</td>
                  <td>
                    <span id="A4_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A4-13" name="A4_13" onclick="kfcheckboxChange('A4-13', 'A4_13')"> </span>
                  </td>
                  <td>
                    <span id="A4_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A4-14" name="A4_14" onclick="kfcheckboxChange('A4-14', 'A4_14')"> </span>
                  </td>
                  <td>
                    <span id="A4_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A4-15" name="A4_15" onclick="kfcheckboxChange('A4-15', 'A4_15')"> </span>
                  </td>
                  <td>
                    <span id="A4_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A4-16" name="A4_16" onclick="kfcheckboxChange('A4-16', 'A4_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">A5</td>
                  <td>
                    <span id="A5_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A5-13" name="A5_13" onclick="kfcheckboxChange('A5-13', 'A5_13')"> </span>
                  </td>
                  <td>
                    <span id="A5_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A5-14" name="A5_14" onclick="kfcheckboxChange('A5-14', 'A5_14')"> </span>
                  </td>
                  <td>
                    <span id="A5_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A5-15" name="A5_15" onclick="kfcheckboxChange('A5-15', 'A5_15')"> </span>
                  </td>
                  <td>
                    <span id="A5_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A5-16" name="A5_16" onclick="kfcheckboxChange('A5-16', 'A5_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">A6</td>
                  <td>
                    <span id="A6_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A6-13" name="A6_13" onclick="kfcheckboxChange('A6-13', 'A6_13')"> </span>
                  </td>
                  <td>
                    <span id="A6_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A6-14" name="A6_14" onclick="kfcheckboxChange('A6-14', 'A6_14')"> </span>
                  </td>
                  <td>
                    <span id="A6_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A6-15" name="A6_15" onclick="kfcheckboxChange('A6-15', 'A6_15')"> </span>
                  </td>
                  <td>
                    <span id="A6_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A6-16" name="A6_16" onclick="kfcheckboxChange('A6-16', 'A6_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">A7</td>
                  <td>
                    <span id="A7_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A7-13" name="A7_13" onclick="kfcheckboxChange('A7-13', 'A7_13')"> </span>
                  </td>
                  <td>
                    <span id="A7_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A7-14" name="A7_14" onclick="kfcheckboxChange('A7-14', 'A7_14')"> </span>
                  </td>
                  <td>
                    <span id="A7_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A7-15" name="A7_15" onclick="kfcheckboxChange('A7-15', 'A7_15')"> </span>
                  </td>
                  <td>
                    <span id="A7_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A7-16" name="A7_16" onclick="kfcheckboxChange('A7-16', 'A7_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">A8</td>
                  <td>
                    <span id="A8_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A8-13" name="A8_13" onclick="kfcheckboxChange('A8-13', 'A8_13')"> </span>
                  </td>
                  <td>
                    <span id="A8_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A8-14" name="A8_14" onclick="kfcheckboxChange('A8-14', 'A8_14')"> </span>
                  </td>
                  <td>
                    <span id="A8_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A8-15" name="A8_15" onclick="kfcheckboxChange('A8-15', 'A8_15')"> </span>
                  </td>
                  <td>
                    <span id="A8_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="A8-16" name="A8_16" onclick="kfcheckboxChange('A8-16', 'A8_16')"> </span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="width: 15%;border: 1px solid;vertical-align: top;padding: 5px;">
             <div id="note2"> <label id="As2-1-label">1: </label> <input type="text" name="As2_1_note" id="As2-1-note" ></div>
             <div id="note2"> <label id="As2-2-label">2:</label> <input type="text" name="As2_2_note" id="As2-2-note" ></div>
             <div id="note2"> <label id="As2-3-label">3:</label> <input type="text" name="As2_3_note" id="As2-3-note" ></div>
             <div id="note2"> <label id="As2-4-label">4:</label> <input type="text" name="As2_4_note" id="As2-4-note" ></div>
             <div id="note2"> <label id="As2-5-label">5:</label> <input type="text" name="As2_5_note" id="As2-5-note" ></div>
             <div id="note2"> <label id="As2-6-label">6:</label> <input type="text" name="As2_6_note" id="As2-6-note" ></div>
             <div id="note2"> <label id="As2-7-label">7:</label> <input type="text" name="As2_7_note" id="As2-7-note" ></div>
             <div id="note2"> <label id="As2-8-label">8:</label> <input type="text" name="As2_8_note" id="As2-8-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="A1-1-label">A1<span>(1)</span>:</label> <input type="text" name="A1_1_note" id="A1-1-note" ></div>
              <div id="note3"> <label id="A1-2-label">A1<span>(2)</span>:</label> <input type="text" name="A1_2_note" id="A1-2-note" ></div>
              <div id="note3"> <label id="A1-3-label">A1<span>(3)</span>:</label> <input type="text" name="A1_3_note" id="A1-3-note" ></div>
              <div id="note3"> <label id="A1-4-label">A1<span>(4)</span>:</label> <input type="text" name="A1_4_note" id="A1-4-note" ></div>

              <div id="note3"> <label id="A2-1-label">A2<span>(1)</span>:</label> <input type="text" name="A2_1_note" id="A2-1-note" ></div>
              <div id="note3"> <label id="A2-2-label">A2<span>(2)</span>:</label> <input type="text" name="A2_2_note" id="A2-2-note" ></div>
              <div id="note3"> <label id="A2-3-label">A2<span>(3)</span>:</label> <input type="text" name="A2_3_note" id="A2-3-note" ></div>
              <div id="note3"> <label id="A2-4-label">A2<span>(4)</span>:</label> <input type="text" name="A2_4_note" id="A2-4-note" ></div>

              <div id="note3"> <label id="A3-1-label">A3<span>(1)</span>:</label> <input type="text" name="A3_1_note" id="A3-1-note" ></div>
              <div id="note3"> <label id="A3-2-label">A3<span>(2)</span>:</label> <input type="text" name="A3_2_note" id="A3-2-note" ></div>
              <div id="note3"> <label id="A3-3-label">A3<span>(3)</span>:</label> <input type="text" name="A3_3_note" id="A3-3-note" ></div>
              <div id="note3"> <label id="A3-4-label">A3<span>(4)</span>:</label> <input type="text" name="A3_4_note" id="A3-4-note" ></div>

              <div id="note3"> <label id="A4-1-label">A4<span>(1)</span>:</label> <input type="text" name="A4_1_note" id="A4-1-note" ></div>
              <div id="note3"> <label id="A4-2-label">A4<span>(2)</span>:</label> <input type="text" name="A4_2_note" id="A4-2-note" ></div>
              <div id="note3"> <label id="A4-3-label">A4<span>(3)</span>:</label> <input type="text" name="A4_3_note" id="A4-3-note" ></div>
              <div id="note3"> <label id="A4-4-label">A4<span>(4)</span>:</label> <input type="text" name="A4_4_note" id="A4-4-note" ></div>
              
              <div id="note3"> <label id="A5-1-label">A5<span>(1)</span>:</label> <input type="text" name="A5_1_note" id="A5-1-note" ></div>
              <div id="note3"> <label id="A5-2-label">A5<span>(2)</span>:</label> <input type="text" name="A5_2_note" id="A5-2-note" ></div>
              <div id="note3"> <label id="A5-3-label">A5<span>(3)</span>:</label> <input type="text" name="A5_3_note" id="A5-3-note" ></div>
              <div id="note3"> <label id="A5-4-label">A5<span>(4)</span>:</label> <input type="text" name="A5_4_note" id="A5-4-note" ></div>

              <div id="note3"> <label id="A6-1-label">A6<span>(1)</span>:</label> <input type="text" name="A6_1_note" id="A6-1-note" ></div>
              <div id="note3"> <label id="A6-2-label">A6<span>(2)</span>:</label> <input type="text" name="A6_2_note" id="A6-2-note" ></div>
              <div id="note3"> <label id="A6-3-label">A6<span>(3)</span>:</label> <input type="text" name="A6_3_note" id="A6-3-note" ></div>
              <div id="note3"> <label id="A6-4-label">A6<span>(4)</span>:</label> <input type="text" name="A6_4_note" id="A6-4-note" ></div>

              <div id="note3"> <label id="A7-1-label">A7<span>(1)</span>:</label> <input type="text" name="A7_1_note" id="A7-1-note" ></div>
              <div id="note3"> <label id="A7-2-label">A7<span>(2)</span>:</label> <input type="text" name="A7_2_note" id="A7-2-note" ></div>
              <div id="note3"> <label id="A7-3-label">A7<span>(3)</span>:</label> <input type="text" name="A7_3_note" id="A7-3-note" ></div>
              <div id="note3"> <label id="A7-4-label">A7<span>(4)</span>:</label> <input type="text" name="A7_4_note" id="A7-4-note" ></div>

              <div id="note3"> <label id="A8-1-label">A8<span>(1)</span>:</label> <input type="text" name="A8_1_note" id="A8-1-note" ></div>
              <div id="note3"> <label id="A8-2-label">A8<span>(2)</span>:</label> <input type="text" name="A8_2_note" id="A8-2-note" ></div>
              <div id="note3"> <label id="A8-3-label">A8<span>(3)</span>:</label> <input type="text" name="A8_3_note" id="A8-3-note" ></div>
              <div id="note3"> <label id="A8-4-label">A8<span>(4)</span>:</label> <input type="text" name="A8_4_note" id="A8-4-note" ></div>
         
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="A1-5-label">A1<span>(1)</span>:</label> <input type="text" name="A1_5_note" id="A1-5-note" ></div>
              <div id="note3"> <label id="A1-6-label">A1<span>(2)</span>:</label> <input type="text" name="A1_6_note" id="A1-6-note" ></div>
              <div id="note3"> <label id="A1-7-label">A1<span>(3)</span>:</label> <input type="text" name="A1_7_note" id="A1-7-note" ></div>
              <div id="note3"> <label id="A1-8-label">A1<span>(4)</span>:</label> <input type="text" name="A1_8_note" id="A1-8-note" ></div>

              <div id="note3"> <label id="A2-5-label">A2<span>(1)</span>:</label> <input type="text" name="A2_5_note" id="A2-5-note" ></div>
              <div id="note3"> <label id="A2-6-label">A2<span>(2)</span>:</label> <input type="text" name="A2_6_note" id="A2-6-note" ></div>
              <div id="note3"> <label id="A2-7-label">A2<span>(3)</span>:</label> <input type="text" name="A2_7_note" id="A2-7-note" ></div>
              <div id="note3"> <label id="A2-8-label">A2<span>(4)</span>:</label> <input type="text" name="A2_8_note" id="A2-8-note" ></div>

              <div id="note3"> <label id="A3-5-label">A3<span>(1)</span>:</label> <input type="text" name="A3_5_note" id="A3-5-note" ></div>
              <div id="note3"> <label id="A3-6-label">A3<span>(2)</span>:</label> <input type="text" name="A3_6_note" id="A3-6-note" ></div>
              <div id="note3"> <label id="A3-7-label">A3<span>(3)</span>:</label> <input type="text" name="A3_7_note" id="A3-7-note" ></div>
              <div id="note3"> <label id="A3-8-label">A3<span>(4)</span>:</label> <input type="text" name="A3_8_note" id="A3-8-note" ></div>

              <div id="note3"> <label id="A4-5-label">A4<span>(1)</span>:</label> <input type="text" name="A4_5_note" id="A4-5-note" ></div>
              <div id="note3"> <label id="A4-6-label">A4<span>(2)</span>:</label> <input type="text" name="A4_6_note" id="A4-6-note" ></div>
              <div id="note3"> <label id="A4-8-label">A4<span>(3)</span>:</label> <input type="text" name="A4_8_note" id="A4-8-note" ></div>
              <div id="note3"> <label id="A4-7-label">A4<span>(4)</span>:</label> <input type="text" name="A4_7_note" id="A4-7-note" ></div>
              
              <div id="note3"> <label id="A5-5-label">A5<span>(1)</span>:</label> <input type="text" name="A5_5_note" id="A5-5-note" ></div>
              <div id="note3"> <label id="A5-6-label">A5<span>(2)</span>:</label> <input type="text" name="A5_6_note" id="A5-6-note" ></div>
              <div id="note3"> <label id="A5-7-label">A5<span>(3)</span>:</label> <input type="text" name="A5_7_note" id="A5-7-note" ></div>
              <div id="note3"> <label id="A5-8-label">A5<span>(4)</span>:</label> <input type="text" name="A5_8_note" id="A5-8-note" ></div>

              <div id="note3"> <label id="A6-5-label">A6<span>(1)</span>:</label> <input type="text" name="A6_5_note" id="A6-5-note" ></div>
              <div id="note3"> <label id="A6-6-label">A6<span>(2)</span>:</label> <input type="text" name="A6_6_note" id="A6-6-note" ></div>
              <div id="note3"> <label id="A6-7-label">A6<span>(3)</span>:</label> <input type="text" name="A6_7_note" id="A6-7-note" ></div>
              <div id="note3"> <label id="A6-8-label">A6<span>(4)</span>:</label> <input type="text" name="A6_8_note" id="A6-8-note" ></div>

              <div id="note3"> <label id="A7-5-label">A7<span>(1)</span>:</label> <input type="text" name="A7_5_note" id="A7-5-note" ></div>
              <div id="note3"> <label id="A7-6-label">A7<span>(2)</span>:</label> <input type="text" name="A7_6_note" id="A7-6-note" ></div>
              <div id="note3"> <label id="A7-7-label">A7<span>(3)</span>:</label> <input type="text" name="A7_7_note" id="A7-7-note" ></div>
              <div id="note3"> <label id="A7-8-label">A7<span>(4)</span>:</label> <input type="text" name="A7_8_note" id="A7-8-note" ></div>

              <div id="note3"> <label id="A8-5-label">A8<span>(1)</span>:</label> <input type="text" name="A8_5_note" id="A8-5-note" ></div>
              <div id="note3"> <label id="A8-6-label">A8<span>(2)</span>:</label> <input type="text" name="A8_6_note" id="A8-6-note" ></div>
              <div id="note3"> <label id="A8-7-label">A8<span>(3)</span>:</label> <input type="text" name="A8_7_note" id="A8-7-note" ></div>
              <div id="note3"> <label id="A8-8-label">A8<span>(4)</span>:</label> <input type="text" name="A8_8_note" id="A8-8-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="A1-9-label">A1<span>(1)</span>:</label> <input type="text" name="A1_9_note" id="A1-9-note" ></div>
              <div id="note3"> <label id="A1-10-label">A1<span>(2)</span>:</label> <input type="text" name="A1_10_note" id="A1-10-note" ></div>
              <div id="note3"> <label id="A1-11-label">A1<span>(3)</span>:</label> <input type="text" name="A1_11_note" id="A1-11-note" ></div>
              <div id="note3"> <label id="A1-12-label">A1<span>(4)</span>:</label> <input type="text" name="A1_12_note" id="A1-12-note" ></div>

              <div id="note3"> <label id="A2-9-label">A2<span>(1)</span>:</label> <input type="text" name="A2_9_note" id="A2-9-note" ></div>
              <div id="note3"> <label id="A2-10-label">A2<span>(2)</span>:</label> <input type="text" name="A2_10_note" id="A2-10-note" ></div>
              <div id="note3"> <label id="A2-11-label">A2<span>(3)</span>:</label> <input type="text" name="A2_11_note" id="A2-11-note" ></div>
              <div id="note3"> <label id="A2-12-label">A2<span>(4)</span>:</label> <input type="text" name="A2_12_note" id="A2-12-note" ></div>

              <div id="note3"> <label id="A3-9-label">A3<span>(1)</span>:</label> <input type="text" name="A3_9_note" id="A3-9-note" ></div>
              <div id="note3"> <label id="A3-10-label">A3<span>(2)</span>:</label> <input type="text" name="A3_10_note" id="A3-10-note" ></div>
              <div id="note3"> <label id="A3-11-label">A3<span>(3)</span>:</label> <input type="text" name="A3_11_note" id="A3-11-note" ></div>
              <div id="note3"> <label id="A3-12-label">A3<span>(4)</span>:</label> <input type="text" name="A3_12_note" id="A3-12-note" ></div>

              <div id="note3"> <label id="A4-9-label">A4<span>(1)</span>:</label> <input type="text" name="A4_9_note" id="A4-9-note" ></div>
              <div id="note3"> <label id="A4-10-label">A4<span>(2)</span>:</label> <input type="text" name="A4_10_note" id="A4-10-note" ></div>
              <div id="note3"> <label id="A4-11-label">A4<span>(3)</span>:</label> <input type="text" name="A4_11_note" id="A4-11-note" ></div>
              <div id="note3"> <label id="A4-12-label">A4<span>(4)</span>:</label> <input type="text" name="A4_12_note" id="A4-12-note" ></div>
              
              <div id="note3"> <label id="A5-9-label">A5<span>(1)</span>:</label> <input type="text" name="A5_9_note" id="A5-9-note" ></div>
              <div id="note3"> <label id="A5-10-label">A5<span>(2)</span>:</label> <input type="text" name="A5_10_note" id="A5-10-note" ></div>
              <div id="note3"> <label id="A5-11-label">A5<span>(3)</span>:</label> <input type="text" name="A5_11_note" id="A5-11-note" ></div>
              <div id="note3"> <label id="A5-12-label">A5<span>(4)</span>:</label> <input type="text" name="A5_12_note" id="A5-12-note" ></div>

              <div id="note3"> <label id="A6-9-label">A6<span>(1)</span>:</label> <input type="text" name="A6_9_note" id="A6-9-note" ></div>
              <div id="note3"> <label id="A6-10-label">A6<span>(2)</span>:</label> <input type="text" name="A6_10_note" id="A6-10-note" ></div>
              <div id="note3"> <label id="A6-11-label">A6<span>(3)</span>:</label> <input type="text" name="A6_11_note" id="A6-11-note" ></div>
              <div id="note3"> <label id="A6-12-label">A6<span>(4)</span>:</label> <input type="text" name="A6_12_note" id="A6-12-note" ></div>

              <div id="note3"> <label id="A7-9-label">A7<span>(1)</span>:</label> <input type="text" name="A7_9_note" id="A7-9-note" ></div>
              <div id="note3"> <label id="A7-10-label">A7<span>(2)</span>:</label> <input type="text" name="A7_10_note" id="A7-10-note" ></div>
              <div id="note3"> <label id="A7-11-label">A7<span>(3)</span>:</label> <input type="text" name="A7_11_note" id="A7-11-note" ></div>
              <div id="note3"> <label id="A7-12-label">A7<span>(4)</span>:</label> <input type="text" name="A7_12_note" id="A7-12-note" ></div>

              <div id="note3"> <label id="A8-9-label">A8<span>(1)</span>:</label> <input type="text" name="A8_9_note" id="A8-9-note" ></div>
              <div id="note3"> <label id="A8-10-label">A8<span>(2)</span>:</label> <input type="text" name="A8_10_note" id="A8-10-note" ></div>
              <div id="note3"> <label id="A8-11-label">A8<span>(3)</span>:</label> <input type="text" name="A8_11_note" id="A8-11-note" ></div>
              <div id="note3"> <label id="A8-12-label">A8<span>(4)</span>:</label> <input type="text" name="A8_12_note" id="A8-12-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="A1-13-label">A1<span>(1)</span>:</label> <input type="text" name="A1_13_note" id="A1-13-note" ></div>
              <div id="note3"> <label id="A1-14-label">A1<span>(2)</span>:</label> <input type="text" name="A1_14_note" id="A1-14-note" ></div>
              <div id="note3"> <label id="A1-15-label">A1<span>(3)</span>:</label> <input type="text" name="A1_15_note" id="A1-15-note" ></div>
              <div id="note3"> <label id="A1-16-label">A1<span>(4)</span>:</label> <input type="text" name="A1_16_note" id="A1-16-note" ></div>

              <div id="note3"> <label id="A2-13-label">A2<span>(1)</span>:</label> <input type="text" name="A2_13_note" id="A2-13-note" ></div>
              <div id="note3"> <label id="A2-14-label">A2<span>(2)</span>:</label> <input type="text" name="A2_14_note" id="A2-14-note" ></div>
              <div id="note3"> <label id="A2-15-label">A2<span>(3)</span>:</label> <input type="text" name="A2_15_note" id="A2-15-note" ></div>
              <div id="note3"> <label id="A2-16-label">A2<span>(4)</span>:</label> <input type="text" name="A2_16_note" id="A2-16-note" ></div>

              <div id="note3"> <label id="A3-13-label">A3<span>(1)</span>:</label> <input type="text" name="A3_13_note" id="A3-13-note" ></div>
              <div id="note3"> <label id="A3-13-label">A3<span>(2)</span>:</label> <input type="text" name="A3_14_note" id="A3-14-note" ></div>
              <div id="note3"> <label id="A3-15-label">A3<span>(3)</span>:</label> <input type="text" name="A3_15_note" id="A3-15-note" ></div>
              <div id="note3"> <label id="A3-16-label">A3<span>(4)</span>:</label> <input type="text" name="A3_16_note" id="A3-16-note" ></div>

              <div id="note3"> <label id="A4-13-label">A4<span>(1)</span>:</label> <input type="text" name="A4_13_note" id="A4-13-note" ></div>
              <div id="note3"> <label id="A4-14-label">A4<span>(2)</span>:</label> <input type="text" name="A4_14_note" id="A4-14-note" ></div>
              <div id="note3"> <label id="A4-15-label">A4<span>(3)</span>:</label> <input type="text" name="A4_15_note" id="A4-15-note" ></div>
              <div id="note3"> <label id="A4-16-label">A4<span>(4)</span>:</label> <input type="text" name="A4_16_note" id="A4-16-note" ></div>
              
              <div id="note3"> <label id="A5-13-label">A5<span>(1)</span>:</label> <input type="text" name="A5_13_note" id="A5-13-note" ></div>
              <div id="note3"> <label id="A5-14-label">A5<span>(2)</span>:</label> <input type="text" name="A5_14_note" id="A5-14-note" ></div>
              <div id="note3"> <label id="A5-15-label">A5<span>(3)</span>:</label> <input type="text" name="A5_15_note" id="A5-15-note" ></div>
              <div id="note3"> <label id="A5-16-label">A5<span>(4)</span>:</label> <input type="text" name="A5_16_note" id="A5-16-note" ></div>

              <div id="note3"> <label id="A6-13-label">A6<span>(1)</span>:</label> <input type="text" name="A6_13_note" id="A6-13-note" ></div>
              <div id="note3"> <label id="A6-14-label">A6<span>(2)</span>:</label> <input type="text" name="A6_14_note" id="A6-14-note" ></div>
              <div id="note3"> <label id="A6-15-label">A6<span>(3)</span>:</label> <input type="text" name="A6_15_note" id="A6-15-note" ></div>
              <div id="note3"> <label id="A6-16-label">A6<span>(4)</span>:</label> <input type="text" name="A6_16_note" id="A6-16-note" ></div>

              <div id="note3"> <label id="A7-13-label">A7<span>(1)</span>:</label> <input type="text" name="A7_13_note" id="A7-13-note" ></div>
              <div id="note3"> <label id="A7-14-label">A7<span>(2)</span>:</label> <input type="text" name="A7_14_note" id="A7-14-note" ></div>
              <div id="note3"> <label id="A7-15-label">A7<span>(3)</span>:</label> <input type="text" name="A7_15_note" id="A7-15-note" ></div>
              <div id="note3"> <label id="A7-16-label">A7<span>(4)</span>:</label> <input type="text" name="A7_16_note" id="A7-16-note" ></div>

              <div id="note3"> <label id="A8-13-label">A8<span>(1)</span>:</label> <input type="text" name="A8_13_note" id="A8-13-note" ></div>
              <div id="note3"> <label id="A8-14-label">A8<span>(2)</span>:</label> <input type="text" name="A8_14_note" id="A8-14-note" ></div>
              <div id="note3"> <label id="A8-15-label">A8<span>(3)</span>:</label> <input type="text" name="A8_15_note" id="A8-15-note" ></div>
              <div id="note3"> <label id="A8-16-label">A8<span>(4)</span>:</label> <input type="text" name="A8_16_note" id="A8-16-note" ></div>
            </td>
          </tr>
          <tr>
            <td style="width: 15%;border: 1px solid;padding: 5px;"> 
                B.&nbsp; Head Pain, Headache Problems, Facial Pain:
                  <p><span id="Bs2_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Bs2-1" name="Bs2_1" onclick="kfcheckboxChange('Bs2-1', 'Bs2_1')"></span> 1. Forehead (frontal) pain</p>
                  <p><span id="Bs2_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Bs2-2" name="Bs2_2" onclick="kfcheckboxChange('Bs2-2', 'Bs2_2')"></span> 2. Temples (temporal) pain</p>
                  <p><span id="Bs2_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Bs2-3" name="Bs2_3" onclick="kfcheckboxChange('Bs2-3', 'Bs2_3')"></span> 3. "Migraine" type headache.</p>
                  <p><span id="Bs2_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Bs2-4" name="Bs2_4" onclick="kfcheckboxChange('Bs2-4', 'Bs2_4')"></span> 4. "Cluster" type headache.</p>
                  <p><span id="Bs2_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Bs2-5" name="Bs2_5" onclick="kfcheckboxChange('Bs2-5', 'Bs2_5')"></span> 5. Maxillary sinus headache (under the eyes)</p>
                  <p><span id="Bs2_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Bs2-6" name="Bs2_6" onclick="kfcheckboxChange('Bs2-6', 'Bs2_6')"></span> 6. Posterior back of head headaches with or without shooting  <span style="padding-left: 57px;">pains (occipital headaches)<span></p>
                  <p><span id="Bs2_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Bs2-7" name="Bs2_7" onclick="kfcheckboxChange('Bs2-7', 'Bs2_7')"></span> 7. Hair and or scalp painful to touch (parietal headache)</p>
              </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                  <td style="font-size: 12px;"><div style="display: block;"></div>B1</td>
                  <td style="">
                  <div style="display: block;"></div>
                    <span id="B1_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B1-1" name="B1_1" onclick="kfcheckboxChange('B1-1', 'B1_1')"> </span>
                  </td>
                  <td>
                  <div style="display: block;"></div>
                    <span id="B1_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B1-2" name="B1_2" onclick="kfcheckboxChange('B1-2', 'B1_2')"> </span>
                  </td>
                  <td>
                  <div style="display: block;"></div>
                    <span id="B1_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B1-3" name="B1_3" onclick="kfcheckboxChange('B1-3', 'B1_3')"> </span>
                  </td>
                  <td>
                  <div style="display: block;"></div>
                    <span id="B1_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B1-4" name="B1_4" onclick="kfcheckboxChange('B1-4', 'B1_4')"> </span>
                  </td>
                </tr>
                <tr>
                <tr>
                  <td style="font-size: 12px;">B2</td>
                  <td>
                    <span id="B2_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B2-1" name="B2_1" onclick="kfcheckboxChange('B2-1', 'B2_1')"> </span>
                  </td>
                  <td>
                    <span id="B2_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B2-2" name="B2_2" onclick="kfcheckboxChange('B2-2', 'B2_2')"> </span>
                  </td>
                  <td>
                    <span id="B2_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B2-3" name="B2_3" onclick="kfcheckboxChange('B2-3', 'B2_3')"> </span>
                  </td>
                  <td>
                    <span id="B2_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B2-4" name="B2_4" onclick="kfcheckboxChange('B2-4', 'B2_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">B3</td>
                  <td>
                    <span id="B3_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B3-1" name="B3_1" onclick="kfcheckboxChange('B3-1', 'B3_1')"> </span>
                  </td>
                  <td>
                    <span id="B3_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B3-2" name="B3_2" onclick="kfcheckboxChange('B3-2', 'B3_2')"> </span>
                  </td>
                  <td>
                    <span id="B3_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B3-3" name="B3_3" onclick="kfcheckboxChange('B3-3', 'B3_3')"> </span>
                  </td>
                  <td>
                    <span id="B3_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B3-4" name="B3_4" onclick="kfcheckboxChange('B3-4', 'B3_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">B4</td>
                  <td>
                    <span id="B4_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B4-1" name="B4_1" onclick="kfcheckboxChange('B4-1', 'B4_1')"> </span>
                  </td>
                  <td>
                    <span id="B4_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B4-2" name="B4_2" onclick="kfcheckboxChange('B4-2', 'B4_2')"> </span>
                  </td>
                  <td>
                    <span id="B4_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B4-3" name="B4_3" onclick="kfcheckboxChange('B4-3', 'B4_3')"> </span>
                  </td>
                  <td>
                    <span id="B4_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B4-4" name="B4_4" onclick="kfcheckboxChange('B4-4', 'B4_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">B5</td>
                  <td>
                    <span id="B5_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B5-1" name="B5_1" onclick="kfcheckboxChange('B5-1', 'B5_1')"> </span>
                  </td>
                  <td>
                    <span id="B5_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B5-2" name="B5_2" onclick="kfcheckboxChange('B5-2', 'B5_2')"> </span>
                  </td>
                  <td>
                    <span id="B5_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B5-3" name="B5_3" onclick="kfcheckboxChange('B5-3', 'B5_3')"> </span>
                  </td>
                  <td>
                    <span id="B5_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B5-4" name="B5_4" onclick="kfcheckboxChange('B5-4', 'B5_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">B6</td>
                  <td>
                    <span id="B6_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B6-1" name="B6_1" onclick="kfcheckboxChange('B6-1', 'B6_1')"> </span>
                  </td>
                  <td>
                    <span id="B6_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B6-2" name="B6_2" onclick="kfcheckboxChange('B6-2', 'B6_2')"> </span>
                  </td>
                  <td>
                    <span id="B6_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B6-3" name="B6_3" onclick="kfcheckboxChange('B6-3', 'B6_3')"> </span>
                  </td>
                  <td>
                    <span id="B6_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B6-4" name="B6_4" onclick="kfcheckboxChange('B6-4', 'B6_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">B7</td>
                  <td>
                    <span id="B7_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B7-1" name="B7_1" onclick="kfcheckboxChange('B7-1', 'B7_1')"> </span>
                  </td>
                  <td>
                    <span id="B7_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B7-2" name="B7_2" onclick="kfcheckboxChange('B7-2', 'B7_2')"> </span>
                  </td>
                  <td>
                    <span id="B7_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B7-3" name="B7_3" onclick="kfcheckboxChange('B7-3', 'B7_3')"> </span>
                  </td>
                  <td>
                    <span id="B7_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B7-4" name="B7_4" onclick="kfcheckboxChange('B7-4', 'B7_4')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                    <td style="font-size: 12px;">B1</td>
                    <td>
                      <span id="B1_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B1-5" name="B1_5" onclick="kfcheckboxChange('B1-5', 'B1_5')"> </span>
                    </td>
                    <td>
                      <span id="B1_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B1-6" name="B1_6" onclick="kfcheckboxChange('B1-6', 'B1_6')"> </span>
                    </td>
                    <td>
                      <span id="B1_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B1-7" name="B1_7" onclick="kfcheckboxChange('B1-7', 'B1_7')"> </span>
                    </td>
                    <td>
                      <span id="B1_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B1-8" name="B1_8" onclick="kfcheckboxChange('B1-8', 'B1_8')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">B2</td>
                    <td>
                      <span id="B2_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B2-5" name="B2_5" onclick="kfcheckboxChange('B2-5', 'B2_5')"> </span>
                    </td>
                    <td>
                      <span id="B2_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B2-6" name="B2_6" onclick="kfcheckboxChange('B2-6', 'B2_6')"> </span>
                    </td>
                    <td>
                      <span id="B2_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B2-7" name="B2_7" onclick="kfcheckboxChange('B2-7', 'B2_7')"> </span>
                    </td>
                    <td>
                      <span id="B2_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B2-8" name="B2_8" onclick="kfcheckboxChange('B2-8', 'B2_8')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">B3</td>
                    <td>
                      <span id="B3_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B3-5" name="B3_5" onclick="kfcheckboxChange('B3-5', 'B3_5')"> </span>
                    </td>
                    <td>
                      <span id="B3_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B3-6" name="B3_6" onclick="kfcheckboxChange('B3-6', 'B3_6')"> </span>
                    </td>
                    <td>
                      <span id="B3_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B3-7" name="B3_7" onclick="kfcheckboxChange('B3-7', 'B3_7')"> </span>
                    </td>
                    <td>
                      <span id="B3_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B3-8" name="B3_8" onclick="kfcheckboxChange('B3-8', 'B3_8')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">B4</td>
                    <td>
                      <span id="B4_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B4-5" name="B4_5" onclick="kfcheckboxChange('B4-5', 'B4_5')"> </span>
                    </td>
                    <td>
                      <span id="B4_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B4-6" name="B4_6" onclick="kfcheckboxChange('B4-6', 'B4_6')"> </span>
                    </td>
                    <td>
                      <span id="B4_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B4-7" name="B4_7" onclick="kfcheckboxChange('B4-7', 'B4_7')"> </span>
                    </td>
                    <td>
                      <span id="B4_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B4-8" name="B4_8" onclick="kfcheckboxChange('B4-8', 'B4_8')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">B5</td>
                    <td>
                      <span id="B5_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B5-5" name="B5_5" onclick="kfcheckboxChange('B5-5', 'B5_5')"> </span>
                    </td>
                    <td>
                      <span id="B5_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B5-6" name="B5_6" onclick="kfcheckboxChange('B5-6', 'B5_6')"> </span>
                    </td>
                    <td>
                      <span id="B5_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B5-7" name="B5_7" onclick="kfcheckboxChange('B5-7', 'B5_7')"> </span>
                    </td>
                    <td>
                      <span id="B5_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B5-8" name="B5_8" onclick="kfcheckboxChange('B5-8', 'B5_8')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">B6</td>
                    <td>
                      <span id="B6_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B6-5" name="B6_5" onclick="kfcheckboxChange('B6-5', 'B6_5')"> </span>
                    </td>
                    <td>
                      <span id="B6_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B6-6" name="B6_6" onclick="kfcheckboxChange('B6-6', 'B6_6')"> </span>
                    </td>
                    <td>
                      <span id="B6_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B6-7" name="B6_7" onclick="kfcheckboxChange('B6-7', 'B6_7')"> </span>
                    </td>
                    <td>
                      <span id="B6_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B6-8" name="B6_8" onclick="kfcheckboxChange('B6-8', 'B6_8')"> </span>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px;">B7</td>
                    <td>
                      <span id="B7_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B7-5" name="B7_5" onclick="kfcheckboxChange('B7-5', 'B7_5')"> </span>
                    </td>
                    <td>
                      <span id="B7_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B7-6" name="B7_6" onclick="kfcheckboxChange('B7-6', 'B7_6')"> </span>
                    </td>
                    <td>
                      <span id="B7_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B7-7" name="B7_7" onclick="kfcheckboxChange('B7-7', 'B7_7')"> </span>
                    </td>
                    <td>
                      <span id="B7_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B7-8" name="B7_8" onclick="kfcheckboxChange('B7-8', 'B7_8')"> </span>
                    </td>
                  </tr>
                  <tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                  <td style="font-size: 12px;">B1</td>
                  <td>
                    <span id="B1_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B1-9" name="B1_9" onclick="kfcheckboxChange('B1-9', 'B1_9')"> </span>
                  </td>
                  <td>
                    <span id="B1_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B1-10" name="B1_10" onclick="kfcheckboxChange('B1-10', 'B1_10')"> </span>
                  </td>
                  <td>
                    <span id="B1_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B1-11" name="B1_11" onclick="kfcheckboxChange('B1-11', 'B1_11')"> </span>
                  </td>
                  <td>
                    <span id="B1_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B1-12" name="B1_12" onclick="kfcheckboxChange('B1-12', 'B1_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">B2</td>
                  <td>
                    <span id="B2_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B2-9" name="B2_9" onclick="kfcheckboxChange('B2-9', 'B2_9')"> </span>
                  </td>
                  <td>
                    <span id="B2_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B2-10" name="B2_10" onclick="kfcheckboxChange('B2-10', 'B2_10')"> </span>
                  </td>
                  <td>
                    <span id="B2_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B2-11" name="B2_11" onclick="kfcheckboxChange('B2-11', 'B2_11')"> </span>
                  </td>
                  <td>
                    <span id="B2_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B2-12" name="B2_12" onclick="kfcheckboxChange('B2-12', 'B2_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">B3</td>
                  <td>
                    <span id="B3_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B3-9" name="B3_9" onclick="kfcheckboxChange('B3-9', 'B3_9')"> </span>
                  </td>
                  <td>
                    <span id="B3_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B3-10" name="B3_10" onclick="kfcheckboxChange('B3-10', 'B3_10')"> </span>
                  </td>
                  <td>
                    <span id="B3_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B3-11" name="B3_11" onclick="kfcheckboxChange('B3-11', 'B3_11')"> </span>
                  </td>
                  <td>
                    <span id="B3_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B3-12" name="B3_12" onclick="kfcheckboxChange('B3-12', 'B3_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">B4</td>
                  <td>
                    <span id="B4_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B4-9" name="B4_9" onclick="kfcheckboxChange('B4-9', 'B4_9')"> </span>
                  </td>
                  <td>
                    <span id="B4_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B4-10" name="B4_10" onclick="kfcheckboxChange('B4-10', 'B4_10')"> </span>
                  </td>
                  <td>
                    <span id="B4_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B4-11" name="B4_11" onclick="kfcheckboxChange('B4-11', 'B4_11')"> </span>
                  </td>
                  <td>
                    <span id="B4_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B4-12" name="B4_12" onclick="kfcheckboxChange('B4-12', 'B4_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">B5</td>
                  <td>
                    <span id="B5_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B5-9" name="B5_9" onclick="kfcheckboxChange('B5-9', 'B5_9')"> </span>
                  </td>
                  <td>
                    <span id="B5_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B5-10" name="B5_10" onclick="kfcheckboxChange('B5-10', 'B5_10')"> </span>
                  </td>
                  <td>
                    <span id="B5_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B5-11" name="B5_11" onclick="kfcheckboxChange('B5-11', 'B5_11')"> </span>
                  </td>
                  <td>
                    <span id="B5_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B5-12" name="B5_12" onclick="kfcheckboxChange('B5-12', 'B5_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">B6</td>
                  <td>
                    <span id="B6_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B6-9" name="B6_9" onclick="kfcheckboxChange('B6-9', 'B6_9')"> </span>
                  </td>
                  <td>
                    <span id="B6_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B6-10" name="B6_10" onclick="kfcheckboxChange('B6-10', 'B6_10')"> </span>
                  </td>
                  <td>
                    <span id="B6_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B6-11" name="B6_11" onclick="kfcheckboxChange('B6-11', 'B6_11')"> </span>
                  </td>
                  <td>
                    <span id="B6_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B6-12" name="B6_12" onclick="kfcheckboxChange('B6-12', 'B6_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">B7</td>
                  <td>
                    <span id="B7_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B7-9" name="B7_9" onclick="kfcheckboxChange('B7-9', 'B7_9')"> </span>
                  </td>
                  <td>
                    <span id="B7_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B7-10" name="B7_10" onclick="kfcheckboxChange('B7-10', 'B7_10')"> </span>
                  </td>
                  <td>
                    <span id="B7_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B7-11" name="B7_11" onclick="kfcheckboxChange('B7-11', 'B7_11')"> </span>
                  </td>
                  <td>
                    <span id="B7_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B7-12" name="B7_12" onclick="kfcheckboxChange('B7-12', 'B7_12')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
                <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                 <td style="font-size: 12px;">B1</td>
                  <td>
                    <span id="B1_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B1-13" name="B1_13" onclick="kfcheckboxChange('B1-13', 'B1_13')"> </span>
                  </td>
                  <td>
                    <span id="B1_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B1-14" name="B1_14" onclick="kfcheckboxChange('B1-14', 'B1_14')"> </span>
                  </td>
                  <td>
                    <span id="B1_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B1-15" name="B1_15" onclick="kfcheckboxChange('B1-15', 'B1_15')"> </span>
                  </td>
                  <td>
                    <span id="B1_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B1-16" name="B1_16" onclick="kfcheckboxChange('B1-16', 'B1_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">B2</td>
                  <td>
                    <span id="B2_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B2-13" name="B2_13" onclick="kfcheckboxChange('B2-13', 'B2_13')"> </span>
                  </td>
                  <td>
                    <span id="B2_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B2-14" name="B2_14" onclick="kfcheckboxChange('B2-14', 'B2_14')"> </span>
                  </td>
                  <td>
                    <span id="B2_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B2-15" name="B2_15" onclick="kfcheckboxChange('B2-15', 'B2_15')"> </span>
                  </td>
                  <td>
                    <span id="B2_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B2-16" name="B2_16" onclick="kfcheckboxChange('B2-16', 'B2_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">B3</td>
                  <td>
                    <span id="B3_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B3-13" name="B3_13" onclick="kfcheckboxChange('B3-13', 'B3_13')"> </span>
                  </td>
                  <td>
                    <span id="B3_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B3-14" name="B3_14" onclick="kfcheckboxChange('B3-14', 'B3_14')"> </span>
                  </td>
                  <td>
                    <span id="B3_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B3-15" name="B3_15" onclick="kfcheckboxChange('B3-15', 'B3_15')"> </span>
                  </td>
                  <td>
                    <span id="B3_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B3-16" name="B3_16" onclick="kfcheckboxChange('B3-16', 'B3_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">B4</td>
                  <td>
                    <span id="B4_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B4-13" name="B4_13" onclick="kfcheckboxChange('B4-13', 'B4_13')"> </span>
                  </td>
                  <td>
                    <span id="B4_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B4-14" name="B4_14" onclick="kfcheckboxChange('B4-14', 'B4_14')"> </span>
                  </td>
                  <td>
                    <span id="B4_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B4-15" name="B4_15" onclick="kfcheckboxChange('B4-15', 'B4_15')"> </span>
                  </td>
                  <td>
                    <span id="B4_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B4-16" name="B4_16" onclick="kfcheckboxChange('B4-16', 'B4_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">B5</td>
                  <td>
                    <span id="B5_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B5-13" name="B5_13" onclick="kfcheckboxChange('B5-13', 'B5_13')"> </span>
                  </td>
                  <td>
                    <span id="B5_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B5-14" name="B5_14" onclick="kfcheckboxChange('B5-14', 'B5_14')"> </span>
                  </td>
                  <td>
                    <span id="B5_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B5-15" name="B5_15" onclick="kfcheckboxChange('B5-15', 'B5_15')"> </span>
                  </td>
                  <td>
                    <span id="B5_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B5-16" name="B5_16" onclick="kfcheckboxChange('B5-16', 'B5_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">B6</td>
                  <td>
                    <span id="B6_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B6-13" name="B6_13" onclick="kfcheckboxChange('B6-13', 'B6_13')"> </span>
                  </td>
                  <td>
                    <span id="B6_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B6-14" name="B6_14" onclick="kfcheckboxChange('B6-14', 'B6_14')"> </span>
                  </td>
                  <td>
                    <span id="B6_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B6-15" name="B6_15" onclick="kfcheckboxChange('B6-15', 'B6_15')"> </span>
                  </td>
                  <td>
                    <span id="B6_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B6-16" name="B6_16" onclick="kfcheckboxChange('B6-16', 'B6_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">B7</td>
                  <td>
                    <span id="B7_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B7-13" name="B7_13" onclick="kfcheckboxChange('B7-13', 'B7_13')"> </span>
                  </td>
                  <td>
                    <span id="B7_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B7-14" name="B7_14" onclick="kfcheckboxChange('B7-14', 'B7_14')"> </span>
                  </td>
                  <td>
                    <span id="B7_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B7-15" name="B7_15" onclick="kfcheckboxChange('B7-15', 'B7_15')"> </span>
                  </td>
                  <td>
                    <span id="B7_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="B7-16" name="B7_16" onclick="kfcheckboxChange('B7-16', 'B7_16')"> </span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <div id="note2"> <label id="Bs2-1-label">1: </label> <input type="text" name="Bs2_1_note" id="Bs2-1-note" ></div>
              <div id="note2"> <label id="Bs2-2-label">2:</label> <input type="text" name="Bs2_2_note" id="Bs2-2-note" ></div>
              <div id="note2"> <label id="Bs2-3-label">3:</label> <input type="text" name="Bs2_3_note" id="Bs2-3-note" ></div>
              <div id="note2"> <label id="Bs2-4-label">4:</label> <input type="text" name="Bs2_4_note" id="Bs2-4-note" ></div>
              <div id="note2"> <label id="Bs2-5-label">5:</label> <input type="text" name="Bs2_5_note" id="Bs2-5-note" ></div>
              <div id="note2"> <label id="Bs2-6-label">6:</label> <input type="text" name="Bs2_6_note" id="Bs2-6-note" ></div>
              <div id="note2"> <label id="Bs2-7-label">7:</label> <input type="text" name="Bs2_7_note" id="Bs2-7-note" ></div>
           </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="B1-1-label">B1<span>(1)</span>:</label> <input type="text" name="B1_1_note" id="B1-1-note" ></div>
              <div id="note3"> <label id="B1-2-label">B1<span>(2)</span>:</label> <input type="text" name="B1_2_note" id="B1-2-note" ></div>
              <div id="note3"> <label id="B1-3-label">B1<span>(3)</span>:</label> <input type="text" name="B1_3_note" id="B1-3-note" ></div>
              <div id="note3"> <label id="B1-4-label">B1<span>(4)</span>:</label> <input type="text" name="B1_4_note" id="B1-4-note" ></div>

              <div id="note3"> <label id="B2-1-label">B2<span>(1)</span>:</label> <input type="text" name="B2_1_note" id="B2-1-note" ></div>
              <div id="note3"> <label id="B2-2-label">B2<span>(2)</span>:</label> <input type="text" name="B2_2_note" id="B2-2-note" ></div>
              <div id="note3"> <label id="B2-3-label">B2<span>(3)</span>:</label> <input type="text" name="B2_3_note" id="B2-3-note" ></div>
              <div id="note3"> <label id="B2-4-label">B2<span>(4)</span>:</label> <input type="text" name="B2_4_note" id="B2-4-note" ></div>

              <div id="note3"> <label id="B3-1-label">B3<span>(1)</span>:</label> <input type="text" name="B3_1_note" id="B3-1-note" ></div>
              <div id="note3"> <label id="B3-2-label">B3<span>(2)</span>:</label> <input type="text" name="B3_2_note" id="B3-2-note" ></div>
              <div id="note3"> <label id="B3-3-label">B3<span>(3)</span>:</label> <input type="text" name="B3_3_note" id="B3-3-note" ></div>
              <div id="note3"> <label id="B3-4-label">B3<span>(4)</span>:</label> <input type="text" name="B3_4_note" id="B3-4-note" ></div>

              <div id="note3"> <label id="B4-1-label">B4<span>(1)</span>:</label> <input type="text" name="B4_1_note" id="B4-1-note" ></div>
              <div id="note3"> <label id="B4-2-label">B4<span>(2)</span>:</label> <input type="text" name="B4_2_note" id="B4-2-note" ></div>
              <div id="note3"> <label id="B4-3-label">B4<span>(3)</span>:</label> <input type="text" name="B4_3_note" id="B4-3-note" ></div>
              <div id="note3"> <label id="B4-4-label">B4<span>(4)</span>:</label> <input type="text" name="B4_4_note" id="B4-4-note" ></div>
              
              <div id="note3"> <label id="B5-1-label">B5<span>(1)</span>:</label> <input type="text" name="B5_1_note" id="B5-1-note" ></div>
              <div id="note3"> <label id="B5-2-label">B5<span>(2)</span>:</label> <input type="text" name="B5_2_note" id="B5-2-note" ></div>
              <div id="note3"> <label id="B5-3-label">B5<span>(3)</span>:</label> <input type="text" name="B5_3_note" id="B5-3-note" ></div>
              <div id="note3"> <label id="B5-4-label">B5<span>(4)</span>:</label> <input type="text" name="B5_4_note" id="B5-4-note" ></div>

              <div id="note3"> <label id="B6-1-label">B6<span>(1)</span>:</label> <input type="text" name="B6_1_note" id="B6-1-note" ></div>
              <div id="note3"> <label id="B6-2-label">B6<span>(2)</span>:</label> <input type="text" name="B6_2_note" id="B6-2-note" ></div>
              <div id="note3"> <label id="B6-3-label">B6<span>(3)</span>:</label> <input type="text" name="B6_3_note" id="B6-3-note" ></div>
              <div id="note3"> <label id="B6-4-label">B6<span>(4)</span>:</label> <input type="text" name="B6_4_note" id="B6-4-note" ></div>

              <div id="note3"> <label id="B7-1-label">B7<span>(1)</span>:</label> <input type="text" name="B7_1_note" id="B7-1-note" ></div>
              <div id="note3"> <label id="B7-2-label">B7<span>(2)</span>:</label> <input type="text" name="B7_2_note" id="B7-2-note" ></div>
              <div id="note3"> <label id="B7-3-label">B7<span>(3)</span>:</label> <input type="text" name="B7_3_note" id="B7-3-note" ></div>
              <div id="note3"> <label id="B7-4-label">B7<span>(4)</span>:</label> <input type="text" name="B7_4_note" id="B7-4-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="B1-5-label">B1<span>(1)</span>:</label> <input type="text" name="B1_5_note" id="B1-5-note" ></div>
              <div id="note3"> <label id="B1-6-label">B1<span>(2)</span>:</label> <input type="text" name="B1_6_note" id="B1-6-note" ></div>
              <div id="note3"> <label id="B1-7-label">B1<span>(3)</span>:</label> <input type="text" name="B1_7_note" id="B1-7-note" ></div>
              <div id="note3"> <label id="B1-8-label">B1<span>(4)</span>:</label> <input type="text" name="B1_8_note" id="B1-8-note" ></div>

              <div id="note3"> <label id="B2-5-label">B2<span>(1)</span>:</label> <input type="text" name="B2_5_note" id="B2-5-note" ></div>
              <div id="note3"> <label id="B2-6-label">B2<span>(2)</span>:</label> <input type="text" name="B2_6_note" id="B2-6-note" ></div>
              <div id="note3"> <label id="B2-7-label">B2<span>(3)</span>:</label> <input type="text" name="B2_7_note" id="B2-7-note" ></div>
              <div id="note3"> <label id="B2-8-label">B2<span>(4)</span>:</label> <input type="text" name="B2_8_note" id="B2-8-note" ></div>

              <div id="note3"> <label id="B3-5-label">B3<span>(1)</span>:</label> <input type="text" name="B3_5_note" id="B3-5-note" ></div>
              <div id="note3"> <label id="B3-6-label">B3<span>(2)</span>:</label> <input type="text" name="B3_6_note" id="B3-6-note" ></div>
              <div id="note3"> <label id="B3-7-label">B3<span>(3)</span>:</label> <input type="text" name="B3_7_note" id="B3-7-note" ></div>
              <div id="note3"> <label id="B3-8-label">B3<span>(4)</span>:</label> <input type="text" name="B3_8_note" id="B3-8-note" ></div>

              <div id="note3"> <label id="B4-5-label">B4<span>(1)</span>:</label> <input type="text" name="B4_5_note" id="B4-5-note" ></div>
              <div id="note3"> <label id="B4-6-label">B4<span>(2)</span>:</label> <input type="text" name="B4_6_note" id="B4-6-note" ></div>
              <div id="note3"> <label id="B4-8-label">B4<span>(3)</span>:</label> <input type="text" name="B4_8_note" id="B4-8-note" ></div>
              <div id="note3"> <label id="B4-7-label">B4<span>(4)</span>:</label> <input type="text" name="B4_7_note" id="B4-7-note" ></div>
              
              <div id="note3"> <label id="B5-5-label">B5<span>(1)</span>:</label> <input type="text" name="B5_5_note" id="B5-5-note" ></div>
              <div id="note3"> <label id="B5-6-label">B5<span>(2)</span>:</label> <input type="text" name="B5_6_note" id="B5-6-note" ></div>
              <div id="note3"> <label id="B5-7-label">B5<span>(3)</span>:</label> <input type="text" name="B5_7_note" id="B5-7-note" ></div>
              <div id="note3"> <label id="B5-8-label">B5<span>(4)</span>:</label> <input type="text" name="B5_8_note" id="B5-8-note" ></div>

              <div id="note3"> <label id="B6-5-label">B6<span>(1)</span>:</label> <input type="text" name="B6_5_note" id="B6-5-note" ></div>
              <div id="note3"> <label id="B6-6-label">B6<span>(2)</span>:</label> <input type="text" name="B6_6_note" id="B6-6-note" ></div>
              <div id="note3"> <label id="B6-7-label">B6<span>(3)</span>:</label> <input type="text" name="B6_7_note" id="B6-7-note" ></div>
              <div id="note3"> <label id="B6-8-label">B6<span>(4)</span>:</label> <input type="text" name="B6_8_note" id="B6-8-note" ></div>

              <div id="note3"> <label id="B7-5-label">B7<span>(1)</span>:</label> <input type="text" name="B7_5_note" id="B7-5-note" ></div>
              <div id="note3"> <label id="B7-6-label">B7<span>(2)</span>:</label> <input type="text" name="B7_6_note" id="B7-6-note" ></div>
              <div id="note3"> <label id="B7-7-label">B7<span>(3)</span>:</label> <input type="text" name="B7_7_note" id="B7-7-note" ></div>
              <div id="note3"> <label id="B7-8-label">B7<span>(4)</span>:</label> <input type="text" name="B7_8_note" id="B7-8-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="B1-9-label">B1<span>(1)</span>:</label> <input type="text" name="B1_9_note" id="B1-9-note" ></div>
              <div id="note3"> <label id="B1-10-label">B1<span>(2)</span>:</label> <input type="text" name="B1_10_note" id="B1-10-note" ></div>
              <div id="note3"> <label id="B1-11-label">B1<span>(3)</span>:</label> <input type="text" name="B1_11_note" id="B1-11-note" ></div>
              <div id="note3"> <label id="B1-12-label">B1<span>(4)</span>:</label> <input type="text" name="B1_12_note" id="B1-12-note" ></div>

              <div id="note3"> <label id="B2-9-label">B2<span>(1)</span>:</label> <input type="text" name="B2_9_note" id="B2-9-note" ></div>
              <div id="note3"> <label id="B2-10-label">B2<span>(2)</span>:</label> <input type="text" name="B2_10_note" id="B2-10-note" ></div>
              <div id="note3"> <label id="B2-11-label">B2<span>(3)</span>:</label> <input type="text" name="B2_11_note" id="B2-11-note" ></div>
              <div id="note3"> <label id="B2-12-label">B2<span>(4)</span>:</label> <input type="text" name="B2_12_note" id="B2-12-note" ></div>

              <div id="note3"> <label id="B3-9-label">B3<span>(1)</span>:</label> <input type="text" name="B3_9_note" id="B3-9-note" ></div>
              <div id="note3"> <label id="B3-10-label">B3<span>(2)</span>:</label> <input type="text" name="B3_10_note" id="B3-10-note" ></div>
              <div id="note3"> <label id="B3-11-label">B3<span>(3)</span>:</label> <input type="text" name="B3_11_note" id="B3-11-note" ></div>
              <div id="note3"> <label id="B3-12-label">B3<span>(4)</span>:</label> <input type="text" name="B3_12_note" id="B3-12-note" ></div>

              <div id="note3"> <label id="B4-9-label">B4<span>(1)</span>:</label> <input type="text" name="B4_9_note" id="B4-9-note" ></div>
              <div id="note3"> <label id="B4-10-label">B4<span>(2)</span>:</label> <input type="text" name="B4_10_note" id="B4-10-note" ></div>
              <div id="note3"> <label id="B4-11-label">B4<span>(3)</span>:</label> <input type="text" name="B4_11_note" id="B4-11-note" ></div>
              <div id="note3"> <label id="B4-12-label">B4<span>(4)</span>:</label> <input type="text" name="B4_12_note" id="B4-12-note" ></div>
              
              <div id="note3"> <label id="B5-9-label">B5<span>(1)</span>:</label> <input type="text" name="B5_9_note" id="B5-9-note" ></div>
              <div id="note3"> <label id="B5-10-label">B5<span>(2)</span>:</label> <input type="text" name="B5_10_note" id="B5-10-note" ></div>
              <div id="note3"> <label id="B5-11-label">A5<span>(3)</span>:</label> <input type="text" name="B5_11_note" id="B5-11-note" ></div>
              <div id="note3"> <label id="B5-12-label">B5<span>(4)</span>:</label> <input type="text" name="B5_12_note" id="B5-12-note" ></div>

              <div id="note3"> <label id="B6-9-label">B6<span>(1)</span>:</label> <input type="text" name="B6_9_note" id="B6-9-note" ></div>
              <div id="note3"> <label id="B6-10-label">B6<span>(2)</span>:</label> <input type="text" name="B6_10_note" id="B6-10-note" ></div>
              <div id="note3"> <label id="B6-11-label">B6<span>(3)</span>:</label> <input type="text" name="B6_11_note" id="B6-11-note" ></div>
              <div id="note3"> <label id="B6-12-label">B6<span>(4)</span>:</label> <input type="text" name="B6_12_note" id="B6-12-note" ></div>

              <div id="note3"> <label id="B7-9-label">B7<span>(1)</span>:</label> <input type="text" name="B7_9_note" id="B7-9-note" ></div>
              <div id="note3"> <label id="B7-10-label">B7<span>(2)</span>:</label> <input type="text" name="B7_10_note" id="B7-10-note" ></div>
              <div id="note3"> <label id="B7-11-label">B7<span>(3)</span>:</label> <input type="text" name="B7_11_note" id="B7-11-note" ></div>
              <div id="note3"> <label id="B7-12-label">B7<span>(4)</span>:</label> <input type="text" name="B7_12_note" id="B7-12-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="B1-13-label">B1<span>(1)</span>:</label> <input type="text" name="B1_13_note" id="B1-13-note" ></div>
              <div id="note3"> <label id="B1-14-label">B1<span>(2)</span>:</label> <input type="text" name="B1_14_note" id="B1-14-note" ></div>
              <div id="note3"> <label id="B1-15-label">B1<span>(3)</span>:</label> <input type="text" name="B1_15_note" id="B1-15-note" ></div>
              <div id="note3"> <label id="B1-16-label">B1<span>(4)</span>:</label> <input type="text" name="B1_16_note" id="B1-16-note" ></div>

              <div id="note3"> <label id="B2-13-label">B2<span>(1)</span>:</label> <input type="text" name="B2_13_note" id="B2-13-note" ></div>
              <div id="note3"> <label id="B2-14-label">B2<span>(2)</span>:</label> <input type="text" name="B2_14_note" id="B2-14-note" ></div>
              <div id="note3"> <label id="B2-15-label">B2<span>(3)</span>:</label> <input type="text" name="B2_15_note" id="B2-15-note" ></div>
              <div id="note3"> <label id="B2-16-label">B2<span>(4)</span>:</label> <input type="text" name="B2_16_note" id="B2-16-note" ></div>

              <div id="note3"> <label id="B3-13-label">B3<span>(1)</span>:</label> <input type="text" name="B3_13_note" id="B3-13-note" ></div>
              <div id="note3"> <label id="B3-13-label">B3<span>(2)</span>:</label> <input type="text" name="B3_14_note" id="B3-14-note" ></div>
              <div id="note3"> <label id="B3-15-label">B3<span>(3)</span>:</label> <input type="text" name="B3_15_note" id="B3-15-note" ></div>
              <div id="note3"> <label id="B3-16-label">B3<span>(4)</span>:</label> <input type="text" name="B3_16_note" id="B3-16-note" ></div>

              <div id="note3"> <label id="B4-13-label">B4<span>(1)</span>:</label> <input type="text" name="B4_13_note" id="B4-13-note" ></div>
              <div id="note3"> <label id="B4-14-label">B4<span>(2)</span>:</label> <input type="text" name="B4_14_note" id="B4-14-note" ></div>
              <div id="note3"> <label id="B4-15-label">B4<span>(3)</span>:</label> <input type="text" name="B4_15_note" id="B4-15-note" ></div>
              <div id="note3"> <label id="B4-16-label">B4<span>(4)</span>:</label> <input type="text" name="B4_16_note" id="B4-16-note" ></div>
              
              <div id="note3"> <label id="B5-13-label">B5<span>(1)</span>:</label> <input type="text" name="B5_13_note" id="B5-13-note" ></div>
              <div id="note3"> <label id="B5-14-label">B5<span>(2)</span>:</label> <input type="text" name="B5_14_note" id="B5-14-note" ></div>
              <div id="note3"> <label id="B5-15-label">B5<span>(3)</span>:</label> <input type="text" name="B5_15_note" id="B5-15-note" ></div>
              <div id="note3"> <label id="B5-16-label">B5<span>(4)</span>:</label> <input type="text" name="B5_16_note" id="B5-16-note" ></div>

              <div id="note3"> <label id="B6-13-label">B6<span>(1)</span>:</label> <input type="text" name="B6_13_note" id="B6-13-note" ></div>
              <div id="note3"> <label id="B6-14-label">B6<span>(2)</span>:</label> <input type="text" name="B6_14_note" id="B6-14-note" ></div>
              <div id="note3"> <label id="B6-15-label">B6<span>(3)</span>:</label> <input type="text" name="B6_15_note" id="B6-15-note" ></div>
              <div id="note3"> <label id="B6-16-label">B6<span>(4)</span>:</label> <input type="text" name="B6_16_note" id="B6-16-note" ></div>

              <div id="note3"> <label id="B7-13-label">B7<span>(1)</span>:</label> <input type="text" name="B7_13_note" id="B7-13-note" ></div>
              <div id="note3"> <label id="B7-14-label">B7<span>(2)</span>:</label> <input type="text" name="B7_14_note" id="B7-14-note" ></div>
              <div id="note3"> <label id="B7-15-label">B7<span>(3)</span>:</label> <input type="text" name="B7_15_note" id="B7-15-note" ></div>
              <div id="note3"> <label id="B7-16-label">B7<span>(4)</span>:</label> <input type="text" name="B7_16_note" id="B7-16-note" ></div>
            </td>
          </tr>
          <tr>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
                C.&nbsp; Mouth, Face, Cheek, and Chin Problems:
                    <p><span id="Cs2_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Cs2-1" name="Cs2_1" onclick="kfcheckboxChange('Cs2-1', 'Cs2_1')"></span> 1. Discomfort</p>
                    <p><span id="Cs2_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Cs2-2" name="Cs2_3" onclick="kfcheckboxChange('Cs2-2', 'Cs2_2')"></span> 2. Limited opening</p>
                    <p><span id="Cs2_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Cs2-3" name="Cs2_4" onclick="kfcheckboxChange('Cs2-3', 'Cs2_3')"></span> 3. Inability to open smoothly, evenly</p>
                    <p><span id="Cs2_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Cs2-4" name="Cs2_5" onclick="kfcheckboxChange('Cs2-4', 'Cs2_4')"></span> 4. Jaw deviates to one side when opening</p>
                    <p><span id="Cs2_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Cs2-5" name="Cs2_6" onclick="kfcheckboxChange('Cs2-5', 'Cs2_5')"></span> 5. Inability to “find bite”</p>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                  <td style="font-size: 12px;">C1</td>
                  <td>
                    <span id="C1_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C1-1" name="C1_1" onclick="kfcheckboxChange('C1-1', 'C1_1')"> </span>
                  </td>
                  <td>
                    <span id="C1_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C1-2" name="C1_2" onclick="kfcheckboxChange('C1-2', 'C1_2')"> </span>
                  </td>
                  <td>
                    <span id="C1_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C1-3" name="C1_3" onclick="kfcheckboxChange('C1-3', 'C1_3')"> </span>
                  </td>
                  <td>
                    <span id="C1_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C1-4" name="C1_4" onclick="kfcheckboxChange('C1-4', 'C1_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">C2</td>
                  <td>
                    <span id="C2_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C2-1" name="C2_1" onclick="kfcheckboxChange('C2-1', 'C2_1')"> </span>
                  </td>
                  <td>
                    <span id="C2_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C2-2" name="C2_2" onclick="kfcheckboxChange('C2-2', 'C2_2')"> </span>
                  </td>
                  <td>
                    <span id="C2_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C2-3" name="C2_3" onclick="kfcheckboxChange('C2-3', 'C2_3')"> </span>
                  </td>
                  <td>
                    <span id="C2_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C2-4" name="C2_4" onclick="kfcheckboxChange('C2-4', 'C2_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">C3</td>
                  <td>
                    <span id="C3_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C3-1" name="C3_1" onclick="kfcheckboxChange('C3-1', 'C3_1')"> </span>
                  </td>
                  <td>
                    <span id="C3_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C3-2" name="C3_2" onclick="kfcheckboxChange('C3-2', 'C3_2')"> </span>
                  </td>
                  <td>
                    <span id="C3_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C3-3" name="C3_3" onclick="kfcheckboxChange('C3-3', 'C3_3')"> </span>
                  </td>
                  <td>
                    <span id="C3_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C3-4" name="C3_4" onclick="kfcheckboxChange('C3-4', 'C3_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">C4</td>
                  <td>
                    <span id="C4_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C4-1" name="C4_1" onclick="kfcheckboxChange('C4-1', 'C4_1')"> </span>
                  </td>
                  <td>
                    <span id="C4_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C4-2" name="C4_2" onclick="kfcheckboxChange('C4-2', 'C4_2')"> </span>
                  </td>
                  <td>
                    <span id="C4_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C4-3" name="C4_3" onclick="kfcheckboxChange('C4-3', 'C4_3')"> </span>
                  </td>
                  <td>
                    <span id="C4_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C4-4" name="C4_4" onclick="kfcheckboxChange('C4-4', 'C4_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">C5</td>
                  <td>
                    <span id="C5_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C5-1" name="C5_1" onclick="kfcheckboxChange('C5-1', 'C5_1')"> </span>
                  </td>
                  <td>
                    <span id="C5_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C5-2" name="C5_2" onclick="kfcheckboxChange('C5-2', 'C5_2')"> </span>
                  </td>
                  <td>
                    <span id="C5_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C5-3" name="C5_3" onclick="kfcheckboxChange('C5-3', 'C5_3')"> </span>
                  </td>
                  <td>
                    <span id="C5_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C5-4" name="C5_4" onclick="kfcheckboxChange('C5-4', 'C5_4')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                <td style="font-size: 12px;">C1</td>
                  <td>
                    <span id="C1_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C1-5" name="C1_5" onclick="kfcheckboxChange('C1-5', 'C1_5')"> </span>
                  </td>
                  <td>
                    <span id="C1_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C1-6" name="C1_6" onclick="kfcheckboxChange('C1-6', 'C1_6')"> </span>
                  </td>
                  <td>
                    <span id="C1_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C1-7" name="C1_7" onclick="kfcheckboxChange('C1-7', 'C1_7')"> </span>
                  </td>
                  <td>
                    <span id="C1_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C1-8" name="C1_8" onclick="kfcheckboxChange('C1-8', 'C1_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">C2</td>
                  <td>
                    <span id="C2_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C2-5" name="C2_5" onclick="kfcheckboxChange('C2-5', 'C2_5')"> </span>
                  </td>
                  <td>
                    <span id="C2_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C2-6" name="C2_6" onclick="kfcheckboxChange('C2-6', 'C2_6')"> </span>
                  </td>
                  <td>
                    <span id="C2_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C2-7" name="C2_7" onclick="kfcheckboxChange('C2-7', 'C2_7')"> </span>
                  </td>
                  <td>
                    <span id="C2_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C2-8" name="C2_8" onclick="kfcheckboxChange('C2-8', 'C2_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">C3</td>
                  <td>
                    <span id="C3_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C3-5" name="C3_5" onclick="kfcheckboxChange('C3-5', 'C3_5')"> </span>
                  </td>
                  <td>
                    <span id="C3_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C3-6" name="C3_6" onclick="kfcheckboxChange('C3-6', 'C3_6')"> </span>
                  </td>
                  <td>
                    <span id="C3_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C3-7" name="C3_7" onclick="kfcheckboxChange('C3-7', 'C3_7')"> </span>
                  </td>
                  <td>
                    <span id="C3_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C3-8" name="C3_8" onclick="kfcheckboxChange('C3-8', 'C3_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">C4</td>
                  <td>
                    <span id="C4_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C4-5" name="C4_5" onclick="kfcheckboxChange('C4-5', 'C4_5')"> </span>
                  </td>
                  <td>
                    <span id="C4_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C4-6" name="C4_6" onclick="kfcheckboxChange('C4-6', 'C4_6')"> </span>
                  </td>
                  <td>
                    <span id="C4_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C4-7" name="C4_7" onclick="kfcheckboxChange('C4-7', 'C4_7')"> </span>
                  </td>
                  <td>
                    <span id="C4_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C4-8" name="C4_8" onclick="kfcheckboxChange('C4-8', 'C4_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">C5</td>
                  <td>
                    <span id="C5_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C5-5" name="C5_5" onclick="kfcheckboxChange('C5-5', 'C5_5')"> </span>
                  </td>
                  <td>
                    <span id="C5_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C5-6" name="C5_6" onclick="kfcheckboxChange('C5-6', 'C5_6')"> </span>
                  </td>
                  <td>
                    <span id="C5_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C5-7" name="C5_7" onclick="kfcheckboxChange('C5-7', 'C5_7')"> </span>
                  </td>
                  <td>
                    <span id="C5_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C5-8" name="C5_8" onclick="kfcheckboxChange('C5-8', 'C5_8')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                  <td style="font-size: 12px;">C1</td>
                  <td>
                    <span id="C1_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C1-9" name="C1_9" onclick="kfcheckboxChange('C1-9', 'C1_9')"> </span>
                  </td>
                  <td>
                    <span id="C1_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C1-10" name="C1_10" onclick="kfcheckboxChange('C1-10', 'C1_10')"> </span>
                  </td>
                  <td>
                    <span id="C1_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C1-11" name="C1_11" onclick="kfcheckboxChange('C1-11', 'C1_11')"> </span>
                  </td>
                  <td>
                    <span id="C1_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C1-12" name="C1_12" onclick="kfcheckboxChange('C1-12', 'C1_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">C2</td>
                  <td>
                    <span id="C2_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C2-9" name="C2_9" onclick="kfcheckboxChange('C2-9', 'C2_9')"> </span>
                  </td>
                  <td>
                    <span id="C2_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C2-10" name="C2_10" onclick="kfcheckboxChange('C2-10', 'C2_10')"> </span>
                  </td>
                  <td>
                    <span id="C2_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C2-11" name="C2_11" onclick="kfcheckboxChange('C2-11', 'C2_11')"> </span>
                  </td>
                  <td>
                    <span id="C2_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C2-12" name="C2_12" onclick="kfcheckboxChange('C2-12', 'C2_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">C3</td>
                  <td>
                    <span id="C3_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C3-9" name="C3_9" onclick="kfcheckboxChange('C3-9', 'C3_9')"> </span>
                  </td>
                  <td>
                    <span id="C3_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C3-10" name="C3_10" onclick="kfcheckboxChange('C3-10', 'C3_10')"> </span>
                  </td>
                  <td>
                    <span id="C3_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C3-11" name="C3_11" onclick="kfcheckboxChange('C3-11', 'C3_11')"> </span>
                  </td>
                  <td>
                    <span id="C3_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C3-12" name="C3_12" onclick="kfcheckboxChange('C3-12', 'C3_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">C4</td>
                  <td>
                    <span id="C4_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C4-9" name="C4_9" onclick="kfcheckboxChange('C4-9', 'C4_9')"> </span>
                  </td>
                  <td>
                    <span id="C4_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C4-10" name="C4_10" onclick="kfcheckboxChange('C4-10', 'C4_10')"> </span>
                  </td>
                  <td>
                    <span id="C4_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C4-11" name="C4_11" onclick="kfcheckboxChange('C4-11', 'C4_11')"> </span>
                  </td>
                  <td>
                    <span id="C4_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C4-12" name="C4_12" onclick="kfcheckboxChange('C4-12', 'C4_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">C5</td>
                  <td>
                    <span id="C5_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C5-9" name="C5_9" onclick="kfcheckboxChange('C5-9', 'C5_9')"> </span>
                  </td>
                  <td>
                    <span id="C5_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C5-10" name="C5_10" onclick="kfcheckboxChange('C5-10', 'C5_10')"> </span>
                  </td>
                  <td>
                    <span id="C5_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C5-11" name="C5_11" onclick="kfcheckboxChange('C5-11', 'C5_11')"> </span>
                  </td>
                  <td>
                    <span id="C5_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C5-12" name="C5_12" onclick="kfcheckboxChange('C5-12', 'C5_12')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                 <td style="font-size: 12px;">C1</td>
                  <td>
                    <span id="C1_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C1-13" name="C1_13" onclick="kfcheckboxChange('C1-13', 'C1_13')"> </span>
                  </td>
                  <td>
                    <span id="C1_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C1-14" name="C1_14" onclick="kfcheckboxChange('C1-14', 'C1_14')"> </span>
                  </td>
                  <td>
                    <span id="C1_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C1-15" name="C1_15" onclick="kfcheckboxChange('C1-15', 'C1_15')"> </span>
                  </td>
                  <td>
                    <span id="C1_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C1-16" name="C1_16" onclick="kfcheckboxChange('C1-16', 'C1_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">C2</td>
                  <td>
                    <span id="C2_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C2-13" name="C2_13" onclick="kfcheckboxChange('C2-13', 'C2_13')"> </span>
                  </td>
                  <td>
                    <span id="C2_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C2-14" name="C2_14" onclick="kfcheckboxChange('C2-14', 'C2_14')"> </span>
                  </td>
                  <td>
                    <span id="C2_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C2-15" name="C2_15" onclick="kfcheckboxChange('C2-15', 'C2_15')"> </span>
                  </td>
                  <td>
                    <span id="C2_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C2-16" name="C2_16" onclick="kfcheckboxChange('C2-16', 'C2_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">C3</td>
                  <td>
                    <span id="C3_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C3-13" name="C3_13" onclick="kfcheckboxChange('C3-13', 'C3_13')"> </span>
                  </td>
                  <td>
                    <span id="C3_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C3-14" name="C3_14" onclick="kfcheckboxChange('C3-14', 'C3_14')"> </span>
                  </td>
                  <td>
                    <span id="C3_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C3-15" name="C3_15" onclick="kfcheckboxChange('C3-15', 'C3_15')"> </span>
                  </td>
                  <td>
                    <span id="C3_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C3-16" name="C3_16" onclick="kfcheckboxChange('C3-16', 'C3_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">C4</td>
                  <td>
                    <span id="C4_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C4-13" name="C4_13" onclick="kfcheckboxChange('C4-13', 'C4_13')"> </span>
                  </td>
                  <td>
                    <span id="C4_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C4-14" name="C4_14" onclick="kfcheckboxChange('C4-14', 'C4_14')"> </span>
                  </td>
                  <td>
                    <span id="C4_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C4-15" name="C4_15" onclick="kfcheckboxChange('C4-15', 'C4_15')"> </span>
                  </td>
                  <td>
                    <span id="C4_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C4-16" name="C4_16" onclick="kfcheckboxChange('C4-16', 'C4_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">C5</td>
                  <td>
                    <span id="C5_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C5-13" name="C5_13" onclick="kfcheckboxChange('C5-13', 'C5_13')"> </span>
                  </td>
                  <td>
                    <span id="C5_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C5-14" name="C5_14" onclick="kfcheckboxChange('C5-14', 'C5_14')"> </span>
                  </td>
                  <td>
                    <span id="C5_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C5-15" name="C5_15" onclick="kfcheckboxChange('C5-15', 'C5_15')"> </span>
                  </td>
                  <td>
                    <span id="C5_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="C5-16" name="C5_16" onclick="kfcheckboxChange('C5-16', 'C5_16')"> </span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <div id="note2"> <label id="Cs2-1-label">1:</label> <input type="text" name="Cs2_1_note" id="Cs2-1-note" ></div>
              <div id="note2"> <label id="Cs2-2-label">2:</label> <input type="text" name="Cs2_2_note" id="Cs2-2-note" ></div>
              <div id="note2"> <label id="Cs2-3-label">3:</label> <input type="text" name="Cs2_3_note" id="Cs2-3-note" ></div>
              <div id="note2"> <label id="Cs2-4-label">4:</label> <input type="text" name="Cs2_4_note" id="Cs2-4-note" ></div>
              <div id="note2"> <label id="Cs2-5-label">5:</label> <input type="text" name="Cs2_5_note" id="Cs2-5-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="C1-1-label">C1<span>(1)</span>:</label> <input type="text" name="C1_1_note" id="C1-1-note" ></div>
              <div id="note3"> <label id="C1-2-label">C1<span>(2)</span>:</label> <input type="text" name="C1_2_note" id="C1-2-note" ></div>
              <div id="note3"> <label id="C1-3-label">C1<span>(3)</span>:</label> <input type="text" name="C1_3_note" id="C1-3-note" ></div>
              <div id="note3"> <label id="C1-4-label">C1<span>(4)</span>:</label> <input type="text" name="C1_4_note" id="C1-4-note" ></div>

              <div id="note3"> <label id="C2-1-label">C2<span>(1)</span>:</label> <input type="text" name="C2_1_note" id="C2-1-note" ></div>
              <div id="note3"> <label id="C2-2-label">C2<span>(2)</span>:</label> <input type="text" name="C2_2_note" id="C2-2-note" ></div>
              <div id="note3"> <label id="C2-3-label">C2<span>(3)</span>:</label> <input type="text" name="C2_3_note" id="C2-3-note" ></div>
              <div id="note3"> <label id="C2-4-label">C2<span>(4)</span>:</label> <input type="text" name="C2_4_note" id="C2-4-note" ></div>

              <div id="note3"> <label id="C3-1-label">C3<span>(1)</span>:</label> <input type="text" name="C3_1_note" id="C3-1-note" ></div>
              <div id="note3"> <label id="C3-2-label">C3<span>(2)</span>:</label> <input type="text" name="C3_2_note" id="C3-2-note" ></div>
              <div id="note3"> <label id="C3-3-label">C3<span>(3)</span>:</label> <input type="text" name="C3_3_note" id="C3-3-note" ></div>
              <div id="note3"> <label id="C3-4-label">C3<span>(4)</span>:</label> <input type="text" name="C3_4_note" id="C3-4-note" ></div>

              <div id="note3"> <label id="C4-1-label">C4<span>(1)</span>:</label> <input type="text" name="C4_1_note" id="C4-1-note" ></div>
              <div id="note3"> <label id="C4-2-label">C4<span>(2)</span>:</label> <input type="text" name="C4_2_note" id="C4-2-note" ></div>
              <div id="note3"> <label id="C4-3-label">C4<span>(3)</span>:</label> <input type="text" name="C4_3_note" id="C4-3-note" ></div>
              <div id="note3"> <label id="C4-4-label">C4<span>(4)</span>:</label> <input type="text" name="C4_4_note" id="C4-4-note" ></div>
              
              <div id="note3"> <label id="C5-1-label">C5<span>(1)</span>:</label> <input type="text" name="C5_1_note" id="C5-1-note" ></div>
              <div id="note3"> <label id="C5-2-label">C5<span>(2)</span>:</label> <input type="text" name="C5_2_note" id="C5-2-note" ></div>
              <div id="note3"> <label id="C5-3-label">C5<span>(3)</span>:</label> <input type="text" name="C5_3_note" id="C5-3-note" ></div>
              <div id="note3"> <label id="C5-4-label">C5<span>(4)</span>:</label> <input type="text" name="C5_4_note" id="C5-4-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="C1-5-label">C1<span>(1)</span>:</label> <input type="text" name="C1_5_note" id="C1-5-note" ></div>
              <div id="note3"> <label id="C1-6-label">C1<span>(2)</span>:</label> <input type="text" name="C1_6_note" id="C1-6-note" ></div>
              <div id="note3"> <label id="C1-7-label">C1<span>(3)</span>:</label> <input type="text" name="C1_7_note" id="C1-7-note" ></div>
              <div id="note3"> <label id="C1-8-label">C1<span>(4)</span>:</label> <input type="text" name="C1_8_note" id="C1-8-note" ></div>

              <div id="note3"> <label id="C2-5-label">C2<span>(1)</span>:</label> <input type="text" name="C2_5_note" id="C2-5-note" ></div>
              <div id="note3"> <label id="C2-6-label">C2<span>(2)</span>:</label> <input type="text" name="C2_6_note" id="C2-6-note" ></div>
              <div id="note3"> <label id="C2-7-label">C2<span>(3)</span>:</label> <input type="text" name="C2_7_note" id="C2-7-note" ></div>
              <div id="note3"> <label id="C2-8-label">C2<span>(4)</span>:</label> <input type="text" name="C2_8_note" id="C2-8-note" ></div>

              <div id="note3"> <label id="C3-5-label">C3<span>(1)</span>:</label> <input type="text" name="C3_5_note" id="C3-5-note" ></div>
              <div id="note3"> <label id="C3-6-label">C3<span>(2)</span>:</label> <input type="text" name="C3_6_note" id="C3-6-note" ></div>
              <div id="note3"> <label id="C3-7-label">C3<span>(3)</span>:</label> <input type="text" name="C3_7_note" id="C3-7-note" ></div>
              <div id="note3"> <label id="C3-8-label">C3<span>(4)</span>:</label> <input type="text" name="C3_8_note" id="C3-8-note" ></div>

              <div id="note3"> <label id="C4-5-label">C4<span>(1)</span>:</label> <input type="text" name="C4_5_note" id="C4-5-note" ></div>
              <div id="note3"> <label id="C4-6-label">C4<span>(2)</span>:</label> <input type="text" name="C4_6_note" id="C4-6-note" ></div>
              <div id="note3"> <label id="C4-8-label">C4<span>(3)</span>:</label> <input type="text" name="C4_8_note" id="C4-8-note" ></div>
              <div id="note3"> <label id="C4-7-label">C4<span>(4)</span>:</label> <input type="text" name="C4_7_note" id="C4-7-note" ></div>
              
              <div id="note3"> <label id="C5-5-label">C5<span>(1)</span>:</label> <input type="text" name="C5_5_note" id="C5-5-note" ></div>
              <div id="note3"> <label id="C5-6-label">C5<span>(2)</span>:</label> <input type="text" name="C5_6_note" id="C5-6-note" ></div>
              <div id="note3"> <label id="C5-7-label">C5<span>(3)</span>:</label> <input type="text" name="C5_7_note" id="C5-7-note" ></div>
              <div id="note3"> <label id="C5-8-label">C5<span>(4)</span>:</label> <input type="text" name="C5_8_note" id="C5-8-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="C1-9-label">C1<span>(1)</span>:</label> <input type="text" name="C1_9_note" id="C1-9-note" ></div>
              <div id="note3"> <label id="C1-10-label">C1<span>(2)</span>:</label> <input type="text" name="C1_10_note" id="C1-10-note" ></div>
              <div id="note3"> <label id="C1-11-label">C1<span>(3)</span>:</label> <input type="text" name="C1_11_note" id="C1-11-note" ></div>
              <div id="note3"> <label id="C1-12-label">C1<span>(4)</span>:</label> <input type="text" name="C1_12_note" id="C1-12-note" ></div>

              <div id="note3"> <label id="C2-9-label">C2<span>(1)</span>:</label> <input type="text" name="C2_9_note" id="C2-9-note" ></div>
              <div id="note3"> <label id="C2-10-label">C2<span>(2)</span>:</label> <input type="text" name="C2_10_note" id="C2-10-note" ></div>
              <div id="note3"> <label id="C2-11-label">C2<span>(3)</span>:</label> <input type="text" name="C2_11_note" id="C2-11-note" ></div>
              <div id="note3"> <label id="C2-12-label">C2<span>(4)</span>:</label> <input type="text" name="C2_12_note" id="C2-12-note" ></div>

              <div id="note3"> <label id="C3-9-label">C3<span>(1)</span>:</label> <input type="text" name="C3_9_note" id="C3-9-note" ></div>
              <div id="note3"> <label id="C3-10-label">C3<span>(2)</span>:</label> <input type="text" name="C3_10_note" id="C3-10-note" ></div>
              <div id="note3"> <label id="C3-11-label">C3<span>(3)</span>:</label> <input type="text" name="C3_11_note" id="C3-11-note" ></div>
              <div id="note3"> <label id="C3-12-label">C3<span>(4)</span>:</label> <input type="text" name="C3_12_note" id="C3-12-note" ></div>

              <div id="note3"> <label id="C4-9-label">C4<span>(1)</span>:</label> <input type="text" name="C4_9_note" id="C4-9-note" ></div>
              <div id="note3"> <label id="C4-10-label">C4<span>(2)</span>:</label> <input type="text" name="C4_10_note" id="C4-10-note" ></div>
              <div id="note3"> <label id="C4-11-label">C4<span>(3)</span>:</label> <input type="text" name="C4_11_note" id="C4-11-note" ></div>
              <div id="note3"> <label id="C4-12-label">C4<span>(4)</span>:</label> <input type="text" name="C4_12_note" id="C4-12-note" ></div>
            
              <div id="note3"> <label id="C5-9-label">C5<span>(1)</span>:</label> <input type="text" name="C5_9_note" id="C5-9-note" ></div>
              <div id="note3"> <label id="C5-10-label">C5<span>(2)</span>:</label> <input type="text" name="C5_10_note" id="C5-10-note" ></div>
              <div id="note3"> <label id="C5-11-label">C5<span>(3)</span>:</label> <input type="text" name="C5_11_note" id="C5-11-note" ></div>
              <div id="note3"> <label id="C5-12-label">C5<span>(4)</span>:</label> <input type="text" name="C5_12_note" id="C5-12-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="C1-13-label">A1<span>(1)</span>:</label> <input type="text" name="C1_13_note" id="C1-13-note" ></div>
              <div id="note3"> <label id="C1-14-label">A1<span>(2)</span>:</label> <input type="text" name="C1_14_note" id="C1-14-note" ></div>
              <div id="note3"> <label id="C1-15-label">A1<span>(3)</span>:</label> <input type="text" name="C1_15_note" id="C1-15-note" ></div>
              <div id="note3"> <label id="C1-16-label">A1<span>(4)</span>:</label> <input type="text" name="C1_16_note" id="C1-16-note" ></div>

              <div id="note3"> <label id="C2-13-label">A2<span>(1)</span>:</label> <input type="text" name="C2_13_note" id="C2-13-note" ></div>
              <div id="note3"> <label id="C2-14-label">A2<span>(2)</span>:</label> <input type="text" name="C2_14_note" id="C2-14-note" ></div>
              <div id="note3"> <label id="C2-15-label">A2<span>(3)</span>:</label> <input type="text" name="C2_15_note" id="C2-15-note" ></div>
              <div id="note3"> <label id="C2-16-label">A2<span>(4)</span>:</label> <input type="text" name="C2_16_note" id="C2-16-note" ></div>

              <div id="note3"> <label id="C3-13-label">A3<span>(1)</span>:</label> <input type="text" name="C3_13_note" id="C3-13-note" ></div>
              <div id="note3"> <label id="C3-13-label">A3<span>(2)</span>:</label> <input type="text" name="C3_14_note" id="C3-14-note" ></div>
              <div id="note3"> <label id="C3-15-label">A3<span>(3)</span>:</label> <input type="text" name="C3_15_note" id="C3-15-note" ></div>
              <div id="note3"> <label id="C3-16-label">A3<span>(4)</span>:</label> <input type="text" name="C3_16_note" id="C3-16-note" ></div>

              <div id="note3"> <label id="C4-13-label">A4<span>(1)</span>:</label> <input type="text" name="C4_13_note" id="C4-13-note" ></div>
              <div id="note3"> <label id="C4-14-label">A4<span>(2)</span>:</label> <input type="text" name="C4_14_note" id="C4-14-note" ></div>
              <div id="note3"> <label id="C4-15-label">A4<span>(3)</span>:</label> <input type="text" name="C4_15_note" id="C4-15-note" ></div>
              <div id="note3"> <label id="C4-16-label">A4<span>(4)</span>:</label> <input type="text" name="C4_16_note" id="C4-16-note" ></div>
              
              <div id="note3"> <label id="C5-13-label">A5<span>(1)</span>:</label> <input type="text" name="C5_13_note" id="C5-13-note" ></div>
              <div id="note3"> <label id="C5-14-label">A5<span>(2)</span>:</label> <input type="text" name="C5_14_note" id="C5-14-note" ></div>
              <div id="note3"> <label id="C5-15-label">A5<span>(3)</span>:</label> <input type="text" name="C5_15_note" id="C5-15-note" ></div>
              <div id="note3"> <label id="C5-16-label">A5<span>(4)</span>:</label> <input type="text" name="C5_16_note" id="C5-16-note" ></div>
            </td>
          </tr>
          <tr>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              D.&nbsp;	Teeth and Gum Problems:
                <p><span id="Ds2_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Ds2-1" name="Ds2_1" onclick="kfcheckboxChange('Ds2-1', 'Ds2_1')"></span> 1. Clenching, grinding at night (bruxism)</p>
                <p><span id="Ds2_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Ds2-2" name="Ds2_2" onclick="kfcheckboxChange('Ds2-2', 'Ds2_2')"></span> 2. Looseness and or soreness of back teeth</p>
                <p><span id="Ds2_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Ds2-3" name="Ds2_3" onclick="kfcheckboxChange('Ds2-3', 'Ds2_3')"></span> 3. Tooth pain (toothache)</p>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
              <tr>
                  <td style="font-size: 12px;">D1</td>
                  <td>
                    <span id="D1_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D1-1" name="D1_1" onclick="kfcheckboxChange('D1-1', 'D1_1')"> </span>
                  </td>
                  <td>
                    <span id="D1_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D1-2" name="D1_2" onclick="kfcheckboxChange('D1-2', 'D1_2')"> </span>
                  </td>
                  <td>
                    <span id="D1_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D1-3" name="D1_3" onclick="kfcheckboxChange('D1-3', 'D1_3')"> </span>
                  </td>
                  <td>
                    <span id="D1_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D1-4" name="D1_4" onclick="kfcheckboxChange('D1-4', 'D1_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">D2</td>
                  <td>
                    <span id="D2_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D2-1" name="D2_1" onclick="kfcheckboxChange('D2-1', 'D2_1')"> </span>
                  </td>
                  <td>
                    <span id="D2_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D2-2" name="D2_2" onclick="kfcheckboxChange('D2-2', 'D2_2')"> </span>
                  </td>
                  <td>
                    <span id="D2_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D2-3" name="D2_3" onclick="kfcheckboxChange('D2-3', 'D2_3')"> </span>
                  </td>
                  <td>
                    <span id="D2_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D2-4" name="D2_4" onclick="kfcheckboxChange('D2-4', 'D2_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">D3</td>
                  <td>
                    <span id="D3_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D3-1" name="D3_1" onclick="kfcheckboxChange('D3-1', 'D3_1')"> </span>
                  </td>
                  <td>
                    <span id="D3_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D3-2" name="D3_2" onclick="kfcheckboxChange('D3-2', 'D3_2')"> </span>
                  </td>
                  <td>
                    <span id="D3_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D3-3" name="D3_3" onclick="kfcheckboxChange('D3-3', 'D3_3')"> </span>
                  </td>
                  <td>
                    <span id="D3_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D3-4" name="D3_4" onclick="kfcheckboxChange('D3-4', 'D3_4')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
              <tr>
                  <td style="font-size: 12px;">D1</td>
                  <td>
                    <span id="D1_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D1-5" name="D1_5" onclick="kfcheckboxChange('D1-5', 'D1_5')"> </span>
                  </td>
                  <td>
                    <span id="D1_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D1-6" name="D1_6" onclick="kfcheckboxChange('D1-6', 'D1_6')"> </span>
                  </td>
                  <td>
                    <span id="D1_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D1-7" name="D1_7" onclick="kfcheckboxChange('D1-7', 'D1_7')"> </span>
                  </td>
                  <td>
                    <span id="D1_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D1-8" name="D1_8" onclick="kfcheckboxChange('D1-8', 'D1_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">D2</td>
                  <td>
                    <span id="D2_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D2-5" name="D2_5" onclick="kfcheckboxChange('D2-5', 'D2_5')"> </span>
                  </td>
                  <td>
                    <span id="D2_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D2-6" name="D2_6" onclick="kfcheckboxChange('D2-6', 'D2_6')"> </span>
                  </td>
                  <td>
                    <span id="D2_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D2-7" name="D2_7" onclick="kfcheckboxChange('D2-7', 'D2_7')"> </span>
                  </td>
                  <td>
                    <span id="D2_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D2-8" name="D2_8" onclick="kfcheckboxChange('D2-8', 'D2_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">D3</td>
                  <td>
                    <span id="D3_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D3-5" name="D3_5" onclick="kfcheckboxChange('D3-5', 'D3_5')"> </span>
                  </td>
                  <td>
                    <span id="D3_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D3-6" name="D3_6" onclick="kfcheckboxChange('D3-6', 'D3_6')"> </span>
                  </td>
                  <td>
                    <span id="D3_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D3-7" name="D3_7" onclick="kfcheckboxChange('D3-7', 'D3_7')"> </span>
                  </td>
                  <td>
                    <span id="D3_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D3-8" name="D3_8" onclick="kfcheckboxChange('D3-8', 'D3_8')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
              <tr>
                  <td style="font-size: 12px;">D1</td>
                  <td>
                    <span id="D1_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D1-9" name="D1_9" onclick="kfcheckboxChange('D1-9', 'D1_9')"> </span>
                  </td>
                  <td>
                    <span id="D1_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D1-10" name="D1_10" onclick="kfcheckboxChange('D1-10', 'D1_10')"> </span>
                  </td>
                  <td>
                    <span id="D1_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D1-11" name="D1_11" onclick="kfcheckboxChange('D1-11', 'D1_11')"> </span>
                  </td>
                  <td>
                    <span id="D1_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D1-12" name="D1_12" onclick="kfcheckboxChange('D1-12', 'D1_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">D2</td>
                  <td>
                    <span id="D2_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D2-9" name="D2_9" onclick="kfcheckboxChange('D2-9', 'D2_9')"> </span>
                  </td>
                  <td>
                    <span id="D2_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D2-10" name="D2_10" onclick="kfcheckboxChange('D2-10', 'D2_10')"> </span>
                  </td>
                  <td>
                    <span id="D2_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D2-11" name="D2_11" onclick="kfcheckboxChange('D2-11', 'D2_11')"> </span>
                  </td>
                  <td>
                    <span id="D2_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D2-12" name="D2_12" onclick="kfcheckboxChange('D2-12', 'D2_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">D3</td>
                  <td>
                    <span id="D3_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D3-9" name="D3_9" onclick="kfcheckboxChange('D3-9', 'D3_9')"> </span>
                  </td>
                  <td>
                    <span id="D3_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D3-10" name="D3_10" onclick="kfcheckboxChange('D3-10', 'D3_10')"> </span>
                  </td>
                  <td>
                    <span id="D3_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D3-11" name="D3_11" onclick="kfcheckboxChange('D3-11', 'D3_11')"> </span>
                  </td>
                  <td>
                    <span id="D3_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D3-12" name="D3_12" onclick="kfcheckboxChange('D3-12', 'D3_12')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                 <td style="font-size: 12px;">D1</td>
                  <td>
                    <span id="D1_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D1-13" name="D1_13" onclick="kfcheckboxChange('D1-13', 'D1_13')"> </span>
                  </td>
                  <td>
                    <span id="D1_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D1-14" name="D1_14" onclick="kfcheckboxChange('D1-14', 'D1_14')"> </span>
                  </td>
                  <td>
                    <span id="D1_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D1-15" name="D1_15" onclick="kfcheckboxChange('D1-15', 'D1_15')"> </span>
                  </td>
                  <td>
                    <span id="D1_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D1-16" name="D1_16" onclick="kfcheckboxChange('D1-16', 'D1_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">D2</td>
                  <td>
                    <span id="D2_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D2-13" name="D2_13" onclick="kfcheckboxChange('D2-13', 'D2_13')"> </span>
                  </td>
                  <td>
                    <span id="D2_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D2-14" name="D2_14" onclick="kfcheckboxChange('D2-14', 'D2_14')"> </span>
                  </td>
                  <td>
                    <span id="D2_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D2-15" name="D2_15" onclick="kfcheckboxChange('D2-15', 'D2_15')"> </span>
                  </td>
                  <td>
                    <span id="D2_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D2-16" name="D2_16" onclick="kfcheckboxChange('D2-16', 'D2_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">D3</td>
                  <td>
                    <span id="D3_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D3-13" name="D3_13" onclick="kfcheckboxChange('D3-13', 'D3_13')"> </span>
                  </td>
                  <td>
                    <span id="D3_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D3-14" name="D3_14" onclick="kfcheckboxChange('D3-14', 'D3_14')"> </span>
                  </td>
                  <td>
                    <span id="D3_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D3-15" name="D3_15" onclick="kfcheckboxChange('D3-15', 'D3_15')"> </span>
                  </td>
                  <td>
                    <span id="D3_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="D3-16" name="D3_16" onclick="kfcheckboxChange('D3-16', 'D3_16')"> </span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <div id="note2"> <label id="Ds2-1-label">1:</label> <input type="text" name="Ds2_1_note" id="Ds2-1-note" ></div>
              <div id="note2"> <label id="Ds2-2-label">2:</label> <input type="text" name="Ds2_2_note" id="Ds2-2-note" ></div>
              <div id="note2"> <label id="Ds2-3-label">3:</label> <input type="text" name="Ds2_3_note" id="Ds2-3-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="D1-1-label">D1<span>(1)</span>:</label> <input type="text" name="D1_1_note" id="D1-1-note" ></div>
              <div id="note3"> <label id="D1-2-label">D1<span>(2)</span>:</label> <input type="text" name="D1_2_note" id="D1-2-note" ></div>
              <div id="note3"> <label id="D1-3-label">D1<span>(3)</span>:</label> <input type="text" name="D1_3_note" id="D1-3-note" ></div>
              <div id="note3"> <label id="D1-4-label">D1<span>(4)</span>:</label> <input type="text" name="D1_4_note" id="D1-4-note" ></div>

              <div id="note3"> <label id="D2-1-label">D2<span>(1)</span>:</label> <input type="text" name="D2_1_note" id="D2-1-note" ></div>
              <div id="note3"> <label id="D2-2-label">D2<span>(2)</span>:</label> <input type="text" name="D2_2_note" id="D2-2-note" ></div>
              <div id="note3"> <label id="D2-3-label">D2<span>(3)</span>:</label> <input type="text" name="D2_3_note" id="D2-3-note" ></div>
              <div id="note3"> <label id="D2-4-label">D2<span>(4)</span>:</label> <input type="text" name="D2_4_note" id="D2-4-note" ></div>

              <div id="note3"> <label id="D3-1-label">D3<span>(1)</span>:</label> <input type="text" name="D3_1_note" id="D3-1-note" ></div>
              <div id="note3"> <label id="D3-2-label">D3<span>(2)</span>:</label> <input type="text" name="D3_2_note" id="D3-2-note" ></div>
              <div id="note3"> <label id="D3-3-label">D3<span>(3)</span>:</label> <input type="text" name="D3_3_note" id="D3-3-note" ></div>
              <div id="note3"> <label id="D3-4-label">D3<span>(4)</span>:</label> <input type="text" name="D3_4_note" id="D3-4-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="D1-5-label">D1<span>(1)</span>:</label> <input type="text" name="D1_5_note" id="D1-5-note" ></div>
              <div id="note3"> <label id="D1-6-label">D1<span>(2)</span>:</label> <input type="text" name="D1_6_note" id="D1-6-note" ></div>
              <div id="note3"> <label id="D1-7-label">D1<span>(3)</span>:</label> <input type="text" name="D1_7_note" id="D1-7-note" ></div>
              <div id="note3"> <label id="D1-8-label">D1<span>(4)</span>:</label> <input type="text" name="D1_8_note" id="D1-8-note" ></div>

              <div id="note3"> <label id="D2-5-label">D2<span>(1)</span>:</label> <input type="text" name="D2_5_note" id="D2-5-note" ></div>
              <div id="note3"> <label id="D2-6-label">D2<span>(2)</span>:</label> <input type="text" name="D2_6_note" id="D2-6-note" ></div>
              <div id="note3"> <label id="D2-7-label">D2<span>(3)</span>:</label> <input type="text" name="D2_7_note" id="D2-7-note" ></div>
              <div id="note3"> <label id="D2-8-label">D2<span>(4)</span>:</label> <input type="text" name="D2_8_note" id="D2-8-note" ></div>

              <div id="note3"> <label id="D3-5-label">D3<span>(1)</span>:</label> <input type="text" name="D3_5_note" id="D3-5-note" ></div>
              <div id="note3"> <label id="D3-6-label">D3<span>(2)</span>:</label> <input type="text" name="D3_6_note" id="D3-6-note" ></div>
              <div id="note3"> <label id="D3-7-label">D3<span>(3)</span>:</label> <input type="text" name="D3_7_note" id="D3-7-note" ></div>
              <div id="note3"> <label id="D3-8-label">D3<span>(4)</span>:</label> <input type="text" name="D3_8_note" id="D3-8-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="D1-9-label">D1<span>(1)</span>:</label> <input type="text" name="D1_9_note" id="D1-9-note" ></div>
              <div id="note3"> <label id="D1-10-label">D1<span>(2)</span>:</label> <input type="text" name="D1_10_note" id="D1-10-note" ></div>
              <div id="note3"> <label id="D1-11-label">D1<span>(3)</span>:</label> <input type="text" name="D1_11_note" id="D1-11-note" ></div>
              <div id="note3"> <label id="D1-12-label">D1<span>(4)</span>:</label> <input type="text" name="D1_12_note" id="D1-12-note" ></div>

              <div id="note3"> <label id="D2-9-label">D2<span>(1)</span>:</label> <input type="text" name="D2_9_note" id="D2-9-note" ></div>
              <div id="note3"> <label id="D2-10-label">D2<span>(2)</span>:</label> <input type="text" name="D2_10_note" id="D2-10-note" ></div>
              <div id="note3"> <label id="D2-11-label">D2<span>(3)</span>:</label> <input type="text" name="D2_11_note" id="D2-11-note" ></div>
              <div id="note3"> <label id="D2-12-label">D2<span>(4)</span>:</label> <input type="text" name="D2_12_note" id="D2-12-note" ></div>

              <div id="note3"> <label id="D3-9-label">D3<span>(1)</span>:</label> <input type="text" name="D3_9_note" id="D3-9-note" ></div>
              <div id="note3"> <label id="D3-10-label">D3<span>(2)</span>:</label> <input type="text" name="D3_10_note" id="D3-10-note" ></div>
              <div id="note3"> <label id="D3-11-label">D3<span>(3)</span>:</label> <input type="text" name="D3_11_note" id="D3-11-note" ></div>
              <div id="note3"> <label id="D3-12-label">D3<span>(4)</span>:</label> <input type="text" name="D3_12_note" id="D3-12-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="A1-13-label">D1<span>(1)</span>:</label> <input type="text" name="D1_13_note" id="D1-13-note" ></div>
              <div id="note3"> <label id="A1-14-label">D1<span>(2)</span>:</label> <input type="text" name="D1_14_note" id="D1-14-note" ></div>
              <div id="note3"> <label id="A1-15-label">D1<span>(3)</span>:</label> <input type="text" name="D1_15_note" id="D1-15-note" ></div>
              <div id="note3"> <label id="A1-16-label">D1<span>(4)</span>:</label> <input type="text" name="D1_16_note" id="D1-16-note" ></div>

              <div id="note3"> <label id="A2-13-label">D2<span>(1)</span>:</label> <input type="text" name="D2_13_note" id="D2-13-note" ></div>
              <div id="note3"> <label id="A2-14-label">D2<span>(2)</span>:</label> <input type="text" name="D2_14_note" id="D2-14-note" ></div>
              <div id="note3"> <label id="A2-15-label">D2<span>(3)</span>:</label> <input type="text" name="D2_15_note" id="D2-15-note" ></div>
              <div id="note3"> <label id="A2-16-label">D2<span>(4)</span>:</label> <input type="text" name="D2_16_note" id="D2-16-note" ></div>

              <div id="note3"> <label id="A3-13-label">D3<span>(1)</span>:</label> <input type="text" name="D3_13_note" id="D3-13-note" ></div>
              <div id="note3"> <label id="A3-13-label">D3<span>(2)</span>:</label> <input type="text" name="D3_14_note" id="D3-14-note" ></div>
              <div id="note3"> <label id="A3-15-label">D3<span>(3)</span>:</label> <input type="text" name="D3_15_note" id="D3-15-note" ></div>
              <div id="note3"> <label id="A3-16-label">D3<span>(4)</span>:</label> <input type="text" name="D3_16_note" id="D3-16-note" ></div>
            </td>
          </tr>
          <tr>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              E.&nbsp; Jaw and Jaw Joint (TMJ) Problems:
                <p><span id="Es2_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Es2-1" name="Es2_1" onclick="kfcheckboxChange('Es2-1', 'Es2_1')"></span> 1. Clicking, popping jaw joints</p>
                <p><span id="Es2_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Es2-2" name="Es2_2" onclick="kfcheckboxChange('Es2-2', 'Es2_2')"></span> 2. Grating sounds (crepitus)</p>
                <p><span id="Es2_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Es2-3" name="Es2_3" onclick="kfcheckboxChange('Es2-3', 'Es2_3')"></span> 3. Jaw locking opened or closed</p>
                <p><span id="Es2_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Es2-4" name="Es2_4" onclick="kfcheckboxChange('Es2-4', 'Es2_4')"></span> 4. Pin in cheek muscles</p>
                <p><span id="Es2_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Es2-5" name="Es2_5" onclick="kfcheckboxChange('Es2-5', 'Es2_5')"></span> 5. Uncontrollable jaw, tongue movements</p>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
              <tr>
                  <td style="font-size: 12px;">E1</td>
                  <td>
                    <span id="E1_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E1-1" name="E1_1" onclick="kfcheckboxChange('E1-1', 'E1_1')"> </span>
                  </td>
                  <td>
                    <span id="E1_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E1-2" name="E1_2" onclick="kfcheckboxChange('E1-2', 'E1_2')"> </span>
                  </td>
                  <td>
                    <span id="E1_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E1-3" name="E1_3" onclick="kfcheckboxChange('E1-3', 'E1_3')"> </span>
                  </td>
                  <td>
                    <span id="E1_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E1-4" name="E1_4" onclick="kfcheckboxChange('E1-4', 'E1_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">E2</td>
                  <td>
                    <span id="E2_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E2-1" name="E2_1" onclick="kfcheckboxChange('E2-1', 'E2_1')"> </span>
                  </td>
                  <td>
                    <span id="E2_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E2-2" name="E2_2" onclick="kfcheckboxChange('E2-2', 'E2_2')"> </span>
                  </td>
                  <td>
                    <span id="E2_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E2-3" name="E2_3" onclick="kfcheckboxChange('E2-3', 'E2_3')"> </span>
                  </td>
                  <td>
                    <span id="E2_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E2-4" name="E2_4" onclick="kfcheckboxChange('E2-4', 'E2_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">E3</td>
                  <td>
                    <span id="E3_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E3-1" name="E3_1" onclick="kfcheckboxChange('E3-1', 'E3_1')"> </span>
                  </td>
                  <td>
                    <span id="E3_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E3-2" name="E3_2" onclick="kfcheckboxChange('E3-2', 'E3_2')"> </span>
                  </td>
                  <td>
                    <span id="E3_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E3-3" name="E3_3" onclick="kfcheckboxChange('E3-3', 'E3_3')"> </span>
                  </td>
                  <td>
                    <span id="E3_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E3-4" name="E3_4" onclick="kfcheckboxChange('E3-4', 'E3_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">E4</td>
                  <td>
                    <span id="E4_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E4-1" name="E4_1" onclick="kfcheckboxChange('E4-1', 'E4_1')"> </span>
                  </td>
                  <td>
                    <span id="E4_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E4-2" name="E4_2" onclick="kfcheckboxChange('E4-2', 'E4_2')"> </span>
                  </td>
                  <td>
                    <span id="E4_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E4-3" name="E4_3" onclick="kfcheckboxChange('E4-3', 'E4_3')"> </span>
                  </td>
                  <td>
                    <span id="E4_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E4-4" name="E4_4" onclick="kfcheckboxChange('E4-4', 'E4_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">E5</td>
                  <td>
                    <span id="E5_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E5-1" name="E5_1" onclick="kfcheckboxChange('E5-1', 'E5_1')"> </span>
                  </td>
                  <td>
                    <span id="E5_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E5-2" name="E5_2" onclick="kfcheckboxChange('E5-2', 'E5_2')"> </span>
                  </td>
                  <td>
                    <span id="E5_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E5-3" name="E5_3" onclick="kfcheckboxChange('E5-3', 'E5_3')"> </span>
                  </td>
                  <td>
                    <span id="E5_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E5-4" name="E5_4" onclick="kfcheckboxChange('E5-4', 'E5_4')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
              <tr>
                  <td style="font-size: 12px;">E1</td>
                  <td>
                    <span id="E1_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E1-5" name="E1_5" onclick="kfcheckboxChange('E1-5', 'E1_5')"> </span>
                  </td>
                  <td>
                    <span id="E1_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E1-6" name="E1_6" onclick="kfcheckboxChange('E1-6', 'E1_6')"> </span>
                  </td>
                  <td>
                    <span id="E1_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E1-7" name="E1_7" onclick="kfcheckboxChange('E1-7', 'E1_7')"> </span>
                  </td>
                  <td>
                    <span id="E1_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E1-8" name="E1_8" onclick="kfcheckboxChange('E1-8', 'E1_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">E2</td>
                  <td>
                    <span id="E2_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E2-5" name="E2_5" onclick="kfcheckboxChange('E2-5', 'E2_5')"> </span>
                  </td>
                  <td>
                    <span id="E2_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E2-6" name="E2_6" onclick="kfcheckboxChange('E2-6', 'E2_6')"> </span>
                  </td>
                  <td>
                    <span id="E2_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E2-7" name="E2_7" onclick="kfcheckboxChange('E2-7', 'E2_7')"> </span>
                  </td>
                  <td>
                    <span id="E2_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E2-8" name="E2_8" onclick="kfcheckboxChange('E2-8', 'E2_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">E3</td>
                  <td>
                    <span id="E3_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E3-5" name="E3_5" onclick="kfcheckboxChange('E3-5', 'E3_5')"> </span>
                  </td>
                  <td>
                    <span id="E3_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E3-6" name="E3_6" onclick="kfcheckboxChange('E3-6', 'E3_6')"> </span>
                  </td>
                  <td>
                    <span id="E3_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E3-7" name="E3_7" onclick="kfcheckboxChange('E3-7', 'E3_7')"> </span>
                  </td>
                  <td>
                    <span id="E3_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E3-8" name="E3_8" onclick="kfcheckboxChange('E3-8', 'E3_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">E4</td>
                  <td>
                    <span id="E4_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E4-5" name="E4_5" onclick="kfcheckboxChange('E4-5', 'E4_5')"> </span>
                  </td>
                  <td>
                    <span id="E4_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E4-6" name="E4_6" onclick="kfcheckboxChange('E4-6', 'E4_6')"> </span>
                  </td>
                  <td>
                    <span id="E4_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E4-7" name="E4_7" onclick="kfcheckboxChange('E4-7', 'E4_7')"> </span>
                  </td>
                  <td>
                    <span id="E4_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E4-8" name="E4_8" onclick="kfcheckboxChange('E4-8', 'E4_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">E5</td>
                  <td>
                    <span id="E5_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E5-5" name="E5_5" onclick="kfcheckboxChange('E5-5', 'E5_5')"> </span>
                  </td>
                  <td>
                    <span id="E5_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E5-6" name="E5_6" onclick="kfcheckboxChange('E5-6', 'E5_6')"> </span>
                  </td>
                  <td>
                    <span id="E5_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E5-7" name="E5_7" onclick="kfcheckboxChange('E5-7', 'E5_7')"> </span>
                  </td>
                  <td>
                    <span id="E5_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E5-8" name="E5_8" onclick="kfcheckboxChange('E5-8', 'E5_8')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
              <tr>
                  <td style="font-size: 12px;">E1</td>
                  <td>
                    <span id="E1_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E1-9" name="E1_9" onclick="kfcheckboxChange('E1-9', 'E1_9')"> </span>
                  </td>
                  <td>
                    <span id="E1_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E1-10" name="E1_10" onclick="kfcheckboxChange('E1-10', 'E1_10')"> </span>
                  </td>
                  <td>
                    <span id="E1_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E1-11" name="E1_11" onclick="kfcheckboxChange('E1-11', 'E1_11')"> </span>
                  </td>
                  <td>
                    <span id="E1_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E1-12" name="E1_12" onclick="kfcheckboxChange('E1-12', 'E1_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">E2</td>
                  <td>
                    <span id="E2_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E2-9" name="E2_9" onclick="kfcheckboxChange('E2-9', 'E2_9')"> </span>
                  </td>
                  <td>
                    <span id="E2_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E2-10" name="E2_10" onclick="kfcheckboxChange('E2-10', 'E2_10')"> </span>
                  </td>
                  <td>
                    <span id="E2_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E2-11" name="E2_11" onclick="kfcheckboxChange('E2-11', 'E2_11')"> </span>
                  </td>
                  <td>
                    <span id="E2_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E2-12" name="E2_12" onclick="kfcheckboxChange('E2-12', 'E2_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">E3</td>
                  <td>
                    <span id="E3_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E3-9" name="E3_9" onclick="kfcheckboxChange('E3-9', 'E3_9')"> </span>
                  </td>
                  <td>
                    <span id="E3_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E3-10" name="E3_10" onclick="kfcheckboxChange('E3-10', 'E3_10')"> </span>
                  </td>
                  <td>
                    <span id="E3_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E3-11" name="E3_11" onclick="kfcheckboxChange('E3-11', 'E3_11')"> </span>
                  </td>
                  <td>
                    <span id="E3_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E3-12" name="E3_12" onclick="kfcheckboxChange('E3-12', 'E3_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">E4</td>
                  <td>
                    <span id="E4_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E4-9" name="E4_9" onclick="kfcheckboxChange('E4-9', 'E4_9')"> </span>
                  </td>
                  <td>
                    <span id="E4_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E4-10" name="E4_10" onclick="kfcheckboxChange('E4-10', 'E4_10')"> </span>
                  </td>
                  <td>
                    <span id="E4_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E4-11" name="E4_11" onclick="kfcheckboxChange('E4-11', 'E4_11')"> </span>
                  </td>
                  <td>
                    <span id="E4_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E4-12" name="E4_12" onclick="kfcheckboxChange('E4-12', 'E4_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">E5</td>
                  <td>
                    <span id="E5_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E5-9" name="E5_9" onclick="kfcheckboxChange('E5-9', 'E5_9')"> </span>
                  </td>
                  <td>
                    <span id="E5_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E5-10" name="E5_10" onclick="kfcheckboxChange('E5-10', 'E5_10')"> </span>
                  </td>
                  <td>
                    <span id="E5_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E5-11" name="E5_11" onclick="kfcheckboxChange('E5-11', 'E5_11')"> </span>
                  </td>
                  <td>
                    <span id="E5_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E5-12" name="E5_12" onclick="kfcheckboxChange('E5-12', 'E5_12')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
                <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                 <td style="font-size: 12px;">E1</td>
                  <td>
                    <span id="E1_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E1-13" name="E1_13" onclick="kfcheckboxChange('E1-13', 'E1_13')"> </span>
                  </td>
                  <td>
                    <span id="E1_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E1-14" name="E1_14" onclick="kfcheckboxChange('E1-14', 'E1_14')"> </span>
                  </td>
                  <td>
                    <span id="E1_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E1-15" name="E1_15" onclick="kfcheckboxChange('E1-15', 'E1_15')"> </span>
                  </td>
                  <td>
                    <span id="E1_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E1-16" name="E1_16" onclick="kfcheckboxChange('E1-16', 'E1_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">E2</td>
                  <td>
                    <span id="E2_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E2-13" name="E2_13" onclick="kfcheckboxChange('E2-13', 'E2_13')"> </span>
                  </td>
                  <td>
                    <span id="E2_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E2-14" name="E2_14" onclick="kfcheckboxChange('E2-14', 'E2_14')"> </span>
                  </td>
                  <td>
                    <span id="E2_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E2-15" name="E2_15" onclick="kfcheckboxChange('E2-15', 'E2_15')"> </span>
                  </td>
                  <td>
                    <span id="E2_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E2-16" name="E2_16" onclick="kfcheckboxChange('E2-16', 'E2_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">E3</td>
                  <td>
                    <span id="E3_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E3-13" name="E3_13" onclick="kfcheckboxChange('E3-13', 'E3_13')"> </span>
                  </td>
                  <td>
                    <span id="E3_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E3-14" name="E3_14" onclick="kfcheckboxChange('E3-14', 'E3_14')"> </span>
                  </td>
                  <td>
                    <span id="E3_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E3-15" name="E3_15" onclick="kfcheckboxChange('E3-15', 'E3_15')"> </span>
                  </td>
                  <td>
                    <span id="E3_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E3-16" name="E3_16" onclick="kfcheckboxChange('E3-16', 'E3_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">E4</td>
                  <td>
                    <span id="E4_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E4-13" name="E4_13" onclick="kfcheckboxChange('E4-13', 'E4_13')"> </span>
                  </td>
                  <td>
                    <span id="E4_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E4-14" name="E4_14" onclick="kfcheckboxChange('E4-14', 'E4_14')"> </span>
                  </td>
                  <td>
                    <span id="E4_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E4-15" name="E4_15" onclick="kfcheckboxChange('E4-15', 'E4_15')"> </span>
                  </td>
                  <td>
                    <span id="E4_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E4-16" name="E4_16" onclick="kfcheckboxChange('E4-16', 'E4_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">E5</td>
                  <td>
                    <span id="E5_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E5-13" name="E5_13" onclick="kfcheckboxChange('E5-13', 'E5_13')"> </span>
                  </td>
                  <td>
                    <span id="E5_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E5-14" name="E5_14" onclick="kfcheckboxChange('E5-14', 'E5_14')"> </span>
                  </td>
                  <td>
                    <span id="E5_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E5-15" name="E5_15" onclick="kfcheckboxChange('E5-15', 'E5_15')"> </span>
                  </td>
                  <td>
                    <span id="E5_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="E5-16" name="E5_16" onclick="kfcheckboxChange('E5-16', 'E5_16')"> </span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <div id="note2"> <label id="Es2-1-label">1:</label> <input type="text" name="Es2_1_note" id="Es2-1-note" ></div>
              <div id="note2"> <label id="Es2-2-label">2:</label> <input type="text" name="Es2_2_note" id="Es2-2-note" ></div>
              <div id="note2"> <label id="Es2-3-label">3:</label> <input type="text" name="Es2_3_note" id="Es2-3-note" ></div>
              <div id="note2"> <label id="Es2-4-label">4:</label> <input type="text" name="Es2_4_note" id="Es2-4-note" ></div>
              <div id="note2"> <label id="Es2-5-label">5:</label> <input type="text" name="Es2_5_note" id="Es2-5-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="E1-1-label">E1<span>(1)</span>:</label> <input type="text" name="E1_1_note" id="E1-1-note" ></div>
              <div id="note3"> <label id="E1-2-label">E1<span>(2)</span>:</label> <input type="text" name="E1_2_note" id="E1-2-note" ></div>
              <div id="note3"> <label id="E1-3-label">E1<span>(3)</span>:</label> <input type="text" name="E1_3_note" id="E1-3-note" ></div>
              <div id="note3"> <label id="E1-4-label">E1<span>(4)</span>:</label> <input type="text" name="E1_4_note" id="E1-4-note" ></div>

              <div id="note3"> <label id="E2-1-label">E2<span>(1)</span>:</label> <input type="text" name="E2_1_note" id="E2-1-note" ></div>
              <div id="note3"> <label id="E2-2-label">E2<span>(2)</span>:</label> <input type="text" name="E2_2_note" id="E2-2-note" ></div>
              <div id="note3"> <label id="E2-3-label">E2<span>(3)</span>:</label> <input type="text" name="E2_3_note" id="E2-3-note" ></div>
              <div id="note3"> <label id="E2-4-label">E2<span>(4)</span>:</label> <input type="text" name="E2_4_note" id="E2-4-note" ></div>

              <div id="note3"> <label id="E3-1-label">E3<span>(1)</span>:</label> <input type="text" name="E3_1_note" id="E3-1-note" ></div>
              <div id="note3"> <label id="E3-2-label">E3<span>(2)</span>:</label> <input type="text" name="E3_2_note" id="E3-2-note" ></div>
              <div id="note3"> <label id="E3-3-label">E3<span>(3)</span>:</label> <input type="text" name="E3_3_note" id="E3-3-note" ></div>
              <div id="note3"> <label id="E3-4-label">E3<span>(4)</span>:</label> <input type="text" name="E3_4_note" id="E3-4-note" ></div>

              <div id="note3"> <label id="E4-1-label">E4<span>(1)</span>:</label> <input type="text" name="E4_1_note" id="E4-1-note" ></div>
              <div id="note3"> <label id="E4-2-label">E4<span>(2)</span>:</label> <input type="text" name="E4_2_note" id="E4-2-note" ></div>
              <div id="note3"> <label id="E4-3-label">E4<span>(3)</span>:</label> <input type="text" name="E4_3_note" id="E4-3-note" ></div>
              <div id="note3"> <label id="E4-4-label">E4<span>(4)</span>:</label> <input type="text" name="E4_4_note" id="E4-4-note" ></div>
              
              <div id="note3"> <label id="E5-1-label">E5<span>(1)</span>:</label> <input type="text" name="E5_1_note" id="E5-1-note" ></div>
              <div id="note3"> <label id="E5-2-label">E5<span>(2)</span>:</label> <input type="text" name="E5_2_note" id="E5-2-note" ></div>
              <div id="note3"> <label id="E5-3-label">E5<span>(3)</span>:</label> <input type="text" name="E5_3_note" id="E5-3-note" ></div>
              <div id="note3"> <label id="E5-4-label">E5<span>(4)</span>:</label> <input type="text" name="E5_4_note" id="E5-4-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="E1-5-label">E1<span>(1)</span>:</label> <input type="text" name="E1_5_note" id="E1-5-note" ></div>
              <div id="note3"> <label id="E1-6-label">E1<span>(2)</span>:</label> <input type="text" name="E1_6_note" id="E1-6-note" ></div>
              <div id="note3"> <label id="E1-7-label">E1<span>(3)</span>:</label> <input type="text" name="E1_7_note" id="E1-7-note" ></div>
              <div id="note3"> <label id="E1-8-label">E1<span>(4)</span>:</label> <input type="text" name="E1_8_note" id="E1-8-note" ></div>

              <div id="note3"> <label id="E2-5-label">E2<span>(1)</span>:</label> <input type="text" name="E2_5_note" id="E2-5-note" ></div>
              <div id="note3"> <label id="E2-6-label">E2<span>(2)</span>:</label> <input type="text" name="E2_6_note" id="E2-6-note" ></div>
              <div id="note3"> <label id="E2-7-label">E2<span>(3)</span>:</label> <input type="text" name="E2_7_note" id="E2-7-note" ></div>
              <div id="note3"> <label id="E2-8-label">E2<span>(4)</span>:</label> <input type="text" name="E2_8_note" id="E2-8-note" ></div>

              <div id="note3"> <label id="E3-5-label">E3<span>(1)</span>:</label> <input type="text" name="E3_5_note" id="E3-5-note" ></div>
              <div id="note3"> <label id="E3-6-label">E3<span>(2)</span>:</label> <input type="text" name="E3_6_note" id="E3-6-note" ></div>
              <div id="note3"> <label id="E3-7-label">E3<span>(3)</span>:</label> <input type="text" name="E3_7_note" id="E3-7-note" ></div>
              <div id="note3"> <label id="E3-8-label">E3<span>(4)</span>:</label> <input type="text" name="E3_8_note" id="E3-8-note" ></div>

              <div id="note3"> <label id="E4-5-label">E4<span>(1)</span>:</label> <input type="text" name="E4_5_note" id="E4-5-note" ></div>
              <div id="note3"> <label id="E4-6-label">E4<span>(2)</span>:</label> <input type="text" name="E4_6_note" id="E4-6-note" ></div>
              <div id="note3"> <label id="E4-8-label">E4<span>(3)</span>:</label> <input type="text" name="E4_8_note" id="E4-8-note" ></div>
              <div id="note3"> <label id="E4-7-label">E4<span>(4)</span>:</label> <input type="text" name="E4_7_note" id="E4-7-note" ></div>
              
              <div id="note3"> <label id="E5-5-label">E5<span>(1)</span>:</label> <input type="text" name="E5_5_note" id="E5-5-note" ></div>
              <div id="note3"> <label id="E5-6-label">E5<span>(2)</span>:</label> <input type="text" name="E5_6_note" id="E5-6-note" ></div>
              <div id="note3"> <label id="E5-7-label">E5<span>(3)</span>:</label> <input type="text" name="E5_7_note" id="E5-7-note" ></div>
              <div id="note3"> <label id="E5-8-label">E5<span>(4)</span>:</label> <input type="text" name="E5_8_note" id="E5-8-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="E1-9-label">E1<span>(1)</span>:</label> <input type="text" name="E1_9_note" id="E1-9-note" ></div>
              <div id="note3"> <label id="E1-10-label">E1<span>(2)</span>:</label> <input type="text" name="E1_10_note" id="E1-10-note" ></div>
              <div id="note3"> <label id="E1-11-label">E1<span>(3)</span>:</label> <input type="text" name="E1_11_note" id="E1-11-note" ></div>
              <div id="note3"> <label id="E1-12-label">E1<span>(4)</span>:</label> <input type="text" name="E1_12_note" id="E1-12-note" ></div>

              <div id="note3"> <label id="E2-9-label">E2<span>(1)</span>:</label> <input type="text" name="E2_9_note" id="E2-9-note" ></div>
              <div id="note3"> <label id="E2-10-label">E2<span>(2)</span>:</label> <input type="text" name="E2_10_note" id="E2-10-note" ></div>
              <div id="note3"> <label id="E2-11-label">E2<span>(3)</span>:</label> <input type="text" name="E2_11_note" id="E2-11-note" ></div>
              <div id="note3"> <label id="E2-12-label">E2<span>(4)</span>:</label> <input type="text" name="E2_12_note" id="E2-12-note" ></div>

              <div id="note3"> <label id="E3-9-label">E3<span>(1)</span>:</label> <input type="text" name="E3_9_note" id="E3-9-note" ></div>
              <div id="note3"> <label id="E3-10-label">E3<span>(2)</span>:</label> <input type="text" name="E3_10_note" id="E3-10-note" ></div>
              <div id="note3"> <label id="E3-11-label">E3<span>(3)</span>:</label> <input type="text" name="E3_11_note" id="E3-11-note" ></div>
              <div id="note3"> <label id="E3-12-label">E3<span>(4)</span>:</label> <input type="text" name="E3_12_note" id="E3-12-note" ></div>

              <div id="note3"> <label id="E4-9-label">E4<span>(1)</span>:</label> <input type="text" name="E4_9_note" id="E4-9-note" ></div>
              <div id="note3"> <label id="E4-10-label">E4<span>(2)</span>:</label> <input type="text" name="E4_10_note" id="E4-10-note" ></div>
              <div id="note3"> <label id="E4-11-label">E4<span>(3)</span>:</label> <input type="text" name="E4_11_note" id="E4-11-note" ></div>
              <div id="note3"> <label id="E4-12-label">E4<span>(4)</span>:</label> <input type="text" name="E4_12_note" id="E4-12-note" ></div>
              
              <div id="note3"> <label id="E5-9-label">E5<span>(1)</span>:</label> <input type="text" name="E5_9_note" id="E5-9-note" ></div>
              <div id="note3"> <label id="E5-10-label">E5<span>(2)</span>:</label> <input type="text" name="E5_10_note" id="E5-10-note" ></div>
              <div id="note3"> <label id="E5-11-label">E5<span>(3)</span>:</label> <input type="text" name="E5_11_note" id="E5-11-note" ></div>
              <div id="note3"> <label id="E5-12-label">E5<span>(4)</span>:</label> <input type="text" name="E5_12_note" id="E5-12-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="E1-13-label">E1<span>(1)</span>:</label> <input type="text" name="E1_13_note" id="E1-13-note" ></div>
              <div id="note3"> <label id="E1-14-label">E1<span>(2)</span>:</label> <input type="text" name="E1_14_note" id="E1-14-note" ></div>
              <div id="note3"> <label id="E1-15-label">E1<span>(3)</span>:</label> <input type="text" name="E1_15_note" id="E1-15-note" ></div>
              <div id="note3"> <label id="E1-16-label">E1<span>(4)</span>:</label> <input type="text" name="E1_16_note" id="E1-16-note" ></div>

              <div id="note3"> <label id="E2-13-label">E2<span>(1)</span>:</label> <input type="text" name="E2_13_note" id="E2-13-note" ></div>
              <div id="note3"> <label id="E2-14-label">E2<span>(2)</span>:</label> <input type="text" name="E2_14_note" id="E2-14-note" ></div>
              <div id="note3"> <label id="E2-15-label">E2<span>(3)</span>:</label> <input type="text" name="E2_15_note" id="E2-15-note" ></div>
              <div id="note3"> <label id="E2-16-label">E2<span>(4)</span>:</label> <input type="text" name="E2_16_note" id="E2-16-note" ></div>

              <div id="note3"> <label id="E3-13-label">E3<span>(1)</span>:</label> <input type="text" name="E3_13_note" id="E3-13-note" ></div>
              <div id="note3"> <label id="E3-13-label">E3<span>(2)</span>:</label> <input type="text" name="E3_14_note" id="E3-14-note" ></div>
              <div id="note3"> <label id="E3-15-label">E3<span>(3)</span>:</label> <input type="text" name="E3_15_note" id="E3-15-note" ></div>
              <div id="note3"> <label id="E3-16-label">E3<span>(4)</span>:</label> <input type="text" name="E3_16_note" id="E3-16-note" ></div>

              <div id="note3"> <label id="E4-13-label">E4<span>(1)</span>:</label> <input type="text" name="E4_13_note" id="E4-13-note" ></div>
              <div id="note3"> <label id="E4-14-label">E4<span>(2)</span>:</label> <input type="text" name="E4_14_note" id="E4-14-note" ></div>
              <div id="note3"> <label id="E4-15-label">E4<span>(3)</span>:</label> <input type="text" name="E4_15_note" id="E4-15-note" ></div>
              <div id="note3"> <label id="E4-16-label">E4<span>(4)</span>:</label> <input type="text" name="E4_16_note" id="E4-16-note" ></div>
              
              <div id="note3"> <label id="E5-13-label">E5<span>(1)</span>:</label> <input type="text" name="E5_13_note" id="E5-13-note" ></div>
              <div id="note3"> <label id="E5-14-label">E5<span>(2)</span>:</label> <input type="text" name="E5_14_note" id="E5-14-note" ></div>
              <div id="note3"> <label id="E5-15-label">E5<span>(3)</span>:</label> <input type="text" name="E5_15_note" id="E5-15-note" ></div>
              <div id="note3"> <label id="E5-16-label">E5<span>(4)</span>:</label> <input type="text" name="E5_16_note" id="E5-16-note" ></div>
            </td>
          </tr>
          <tr>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              F.&nbsp; Ear Pain, Ear Problems, and Postural Imbalances:
                <p><span id="Fs2_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Fs2-1" name="Fs2_1" onclick="kfcheckboxChange('Fs2-1', 'Fs2_1')"></span> 1. Hissing, buzzing, ringing, or roaring sound (tinitus)</p>
                <p><span id="Fs2_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Fs2-2" name="Fs2_2" onclick="kfcheckboxChange('Fs2-2', 'Fs2_2')"></span> 2.  Diminished hearing (subjective hearing loss)</p>
                <p><span id="Fs2_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Fs2-3" name="Fs2_3" onclick="kfcheckboxChange('Fs2-3', 'Fs2_3')"></span> 3. Ear pain without infection (otalgia)</p>
                <p><span id="Fs2_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Fs2-4" name="Fs2_4" onclick="kfcheckboxChange('Fs2-4', 'Fs2_4')"></span> 4. Clogged, stuffy, "itchy" ears, feeling of fullness</p>
                <p><span id="Fs2_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Fs2-5" name="Fs2_5" onclick="kfcheckboxChange('Fs2-5', 'Fs2_5')"></span> 5. Balance problems, "vertigo" (disequilibrium)</p>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
              <td style="font-size: 12px;">F1</td>
                  <td>
                    <span id="F1_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F1-1" name="F1_1" onclick="kfcheckboxChange('F1-1', 'F1_1')"> </span>
                  </td>
                  <td>
                    <span id="F1_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F1-2" name="F1_2" onclick="kfcheckboxChange('F1-2', 'F1_2')"> </span>
                  </td>
                  <td>
                    <span id="F1_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F1-3" name="F1_3" onclick="kfcheckboxChange('F1-3', 'F1_3')"> </span>
                  </td>
                  <td>
                    <span id="F1_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F1-4" name="F1_4" onclick="kfcheckboxChange('F1-4', 'F1_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">F2</td>
                  <td>
                    <span id="F2_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F2-1" name="F2_1" onclick="kfcheckboxChange('F2-1', 'F2_1')"> </span>
                  </td>
                  <td>
                    <span id="F2_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F2-2" name="F2_2" onclick="kfcheckboxChange('F2-2', 'F2_2')"> </span>
                  </td>
                  <td>
                    <span id="F2_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F2-3" name="F2_3" onclick="kfcheckboxChange('F2-3', 'F2_3')"> </span>
                  </td>
                  <td>
                    <span id="F2_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F2-4" name="F2_4" onclick="kfcheckboxChange('F2-4', 'F2_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">F3</td>
                  <td>
                    <span id="F3_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F3-1" name="F3_1" onclick="kfcheckboxChange('F3-1', 'F3_1')"> </span>
                  </td>
                  <td>
                    <span id="F3_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F3-2" name="F3_2" onclick="kfcheckboxChange('F3-2', 'F3_2')"> </span>
                  </td>
                  <td>
                    <span id="F3_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F3-3" name="F3_3" onclick="kfcheckboxChange('F3-3', 'F3_3')"> </span>
                  </td>
                  <td>
                    <span id="F3_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F3-4" name="F3_4" onclick="kfcheckboxChange('F3-4', 'F3_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">F4</td>
                  <td>
                    <span id="F4_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F4-1" name="F4_1" onclick="kfcheckboxChange('F4-1', 'F4_1')"> </span>
                  </td>
                  <td>
                    <span id="F4_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F4-2" name="F4_2" onclick="kfcheckboxChange('F4-2', 'F4_2')"> </span>
                  </td>
                  <td>
                    <span id="F4_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F4-3" name="F4_3" onclick="kfcheckboxChange('F4-3', 'F4_3')"> </span>
                  </td>
                  <td>
                    <span id="F4_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F4-4" name="F4_4" onclick="kfcheckboxChange('F4-4', 'F4_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">F5</td>
                  <td>
                    <span id="F5_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F5-1" name="F5_1" onclick="kfcheckboxChange('F5-1', 'F5_1')"> </span>
                  </td>
                  <td>
                    <span id="F5_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F5-2" name="F5_2" onclick="kfcheckboxChange('F5-2', 'F5_2')"> </span>
                  </td>
                  <td>
                    <span id="F5_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F5-3" name="F5_3" onclick="kfcheckboxChange('F5-3', 'F5_3')"> </span>
                  </td>
                  <td>
                    <span id="F5_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F5-4" name="F5_4" onclick="kfcheckboxChange('F5-4', 'F5_4')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
              <tr>
                  <td style="font-size: 12px;">F1</td>
                  <td>
                    <span id="F1_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F1-5" name="F1_5" onclick="kfcheckboxChange('F1-5', 'F1_5')"> </span>
                  </td>
                  <td>
                    <span id="F1_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F1-6" name="F1_6" onclick="kfcheckboxChange('F1-6', 'F1_6')"> </span>
                  </td>
                  <td>
                    <span id="F1_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F1-7" name="F1_7" onclick="kfcheckboxChange('F1-7', 'F1_7')"> </span>
                  </td>
                  <td>
                    <span id="F1_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F1-8" name="F1_8" onclick="kfcheckboxChange('F1-8', 'F1_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">F2</td>
                  <td>
                    <span id="F2_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F2-5" name="F2_5" onclick="kfcheckboxChange('F2-5', 'F2_5')"> </span>
                  </td>
                  <td>
                    <span id="F2_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F2-6" name="F2_6" onclick="kfcheckboxChange('F2-6', 'F2_6')"> </span>
                  </td>
                  <td>
                    <span id="F2_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F2-7" name="F2_7" onclick="kfcheckboxChange('F2-7', 'F2_7')"> </span>
                  </td>
                  <td>
                    <span id="F2_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F2-8" name="F2_8" onclick="kfcheckboxChange('F2-8', 'F2_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">F3</td>
                  <td>
                    <span id="F3_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F3-5" name="F3_5" onclick="kfcheckboxChange('F3-5', 'F3_5')"> </span>
                  </td>
                  <td>
                    <span id="F3_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F3-6" name="F3_6" onclick="kfcheckboxChange('F3-6', 'F3_6')"> </span>
                  </td>
                  <td>
                    <span id="F3_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F3-7" name="F3_7" onclick="kfcheckboxChange('F3-7', 'F3_7')"> </span>
                  </td>
                  <td>
                    <span id="F3_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F3-8" name="F3_8" onclick="kfcheckboxChange('F3-8', 'F3_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">F4</td>
                  <td>
                    <span id="F4_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F4-5" name="F4_5" onclick="kfcheckboxChange('F4-5', 'F4_5')"> </span>
                  </td>
                  <td>
                    <span id="F4_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F4-6" name="F4_6" onclick="kfcheckboxChange('F4-6', 'F4_6')"> </span>
                  </td>
                  <td>
                    <span id="F4_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F4-7" name="F4_7" onclick="kfcheckboxChange('F4-7', 'F4_7')"> </span>
                  </td>
                  <td>
                    <span id="F4_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F4-8" name="F4_8" onclick="kfcheckboxChange('F4-8', 'F4_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">F5</td>
                  <td>
                    <span id="F5_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F5-5" name="F5_5" onclick="kfcheckboxChange('F5-5', 'F5_5')"> </span>
                  </td>
                  <td>
                    <span id="F5_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F5-6" name="F5_6" onclick="kfcheckboxChange('F5-6', 'F5_6')"> </span>
                  </td>
                  <td>
                    <span id="F5_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F5-7" name="F5_7" onclick="kfcheckboxChange('F5-7', 'F5_7')"> </span>
                  </td>
                  <td>
                    <span id="F5_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F5-8" name="F5_8" onclick="kfcheckboxChange('F5-8', 'F5_8')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
              <tr>
                  <td style="font-size: 12px;">F1</td>
                  <td>
                    <span id="F1_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F1-9" name="F1_9" onclick="kfcheckboxChange('F1-9', 'F1_9')"> </span>
                  </td>
                  <td>
                    <span id="F1_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F1-10" name="F1_10" onclick="kfcheckboxChange('F1-10', 'F1_10')"> </span>
                  </td>
                  <td>
                    <span id="F1_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F1-11" name="F1_11" onclick="kfcheckboxChange('F1-11', 'F1_11')"> </span>
                  </td>
                  <td>
                    <span id="F1_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F1-12" name="F1_12" onclick="kfcheckboxChange('F1-12', 'F1_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">F2</td>
                  <td>
                    <span id="F2_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F2-9" name="F2_9" onclick="kfcheckboxChange('F2-9', 'F2_9')"> </span>
                  </td>
                  <td>
                    <span id="F2_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F2-10" name="F2_10" onclick="kfcheckboxChange('F2-10', 'F2_10')"> </span>
                  </td>
                  <td>
                    <span id="F2_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F2-11" name="F2_11" onclick="kfcheckboxChange('F2-11', 'F2_11')"> </span>
                  </td>
                  <td>
                    <span id="F2_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F2-12" name="F2_12" onclick="kfcheckboxChange('F2-12', 'F2_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">F3</td>
                  <td>
                    <span id="F3_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F3-9" name="F3_9" onclick="kfcheckboxChange('F3-9', 'F3_9')"> </span>
                  </td>
                  <td>
                    <span id="F3_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F3-10" name="F3_10" onclick="kfcheckboxChange('F3-10', 'F3_10')"> </span>
                  </td>
                  <td>
                    <span id="F3_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F3-11" name="F3_11" onclick="kfcheckboxChange('F3-11', 'F3_11')"> </span>
                  </td>
                  <td>
                    <span id="F3_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F3-12" name="F3_12" onclick="kfcheckboxChange('F3-12', 'F3_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">F4</td>
                  <td>
                    <span id="F4_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F4-9" name="F4_9" onclick="kfcheckboxChange('F4-9', 'F4_9')"> </span>
                  </td>
                  <td>
                    <span id="F4_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F4-10" name="F4_10" onclick="kfcheckboxChange('F4-10', 'F4_10')"> </span>
                  </td>
                  <td>
                    <span id="F4_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F4-11" name="F4_11" onclick="kfcheckboxChange('F4-11', 'F4_11')"> </span>
                  </td>
                  <td>
                    <span id="F4_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F4-12" name="F4_12" onclick="kfcheckboxChange('F4-12', 'F4_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">F5</td>
                  <td>
                    <span id="F5_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F5-9" name="F5_9" onclick="kfcheckboxChange('F5-9', 'F5_9')"> </span>
                  </td>
                  <td>
                    <span id="F5_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F5-10" name="F5_10" onclick="kfcheckboxChange('F5-10', 'F5_10')"> </span>
                  </td>
                  <td>
                    <span id="F5_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F5-11" name="F5_11" onclick="kfcheckboxChange('F5-11', 'F5_11')"> </span>
                  </td>
                  <td>
                    <span id="F5_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F5-12" name="F5_12" onclick="kfcheckboxChange('F5-12', 'F5_12')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
                <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                 <td style="font-size: 12px;">F1</td>
                  <td>
                    <span id="F1_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F1-13" name="F1_13" onclick="kfcheckboxChange('F1-13', 'F1_13')"> </span>
                  </td>
                  <td>
                    <span id="F1_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F1-14" name="F1_14" onclick="kfcheckboxChange('F1-14', 'F1_14')"> </span>
                  </td>
                  <td>
                    <span id="F1_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F1-15" name="F1_15" onclick="kfcheckboxChange('F1-15', 'F1_15')"> </span>
                  </td>
                  <td>
                    <span id="F1_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F1-16" name="F1_16" onclick="kfcheckboxChange('F1-16', 'F1_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">F2</td>
                  <td>
                    <span id="F2_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F2-13" name="F2_13" onclick="kfcheckboxChange('F2-13', 'F2_13')"> </span>
                  </td>
                  <td>
                    <span id="F2_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F2-14" name="F2_14" onclick="kfcheckboxChange('F2-14', 'F2_14')"> </span>
                  </td>
                  <td>
                    <span id="F2_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F2-15" name="F2_15" onclick="kfcheckboxChange('F2-15', 'F2_15')"> </span>
                  </td>
                  <td>
                    <span id="F2_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F2-16" name="F2_16" onclick="kfcheckboxChange('F2-16', 'F2_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">F3</td>
                  <td>
                    <span id="F3_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F3-13" name="F3_13" onclick="kfcheckboxChange('F3-13', 'F3_13')"> </span>
                  </td>
                  <td>
                    <span id="F3_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F3-14" name="F3_14" onclick="kfcheckboxChange('F3-14', 'F3_14')"> </span>
                  </td>
                  <td>
                    <span id="F3_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F3-15" name="F3_15" onclick="kfcheckboxChange('F3-15', 'F3_15')"> </span>
                  </td>
                  <td>
                    <span id="F3_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F3-16" name="F3_16" onclick="kfcheckboxChange('F3-16', 'F3_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">F4</td>
                  <td>
                    <span id="F4_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F4-13" name="F4_13" onclick="kfcheckboxChange('F4-13', 'F4_13')"> </span>
                  </td>
                  <td>
                    <span id="F4_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F4-14" name="F4_14" onclick="kfcheckboxChange('F4-14', 'F4_14')"> </span>
                  </td>
                  <td>
                    <span id="F4_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F4-15" name="F4_15" onclick="kfcheckboxChange('F4-15', 'F4_15')"> </span>
                  </td>
                  <td>
                    <span id="F4_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F4-16" name="F4_16" onclick="kfcheckboxChange('F4-16', 'F4_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">F5</td>
                  <td>
                    <span id="F5_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F5-13" name="F5_13" onclick="kfcheckboxChange('F5-13', 'F5_13')"> </span>
                  </td>
                  <td>
                    <span id="F5_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F5-14" name="F5_14" onclick="kfcheckboxChange('F5-14', 'F5_14')"> </span>
                  </td>
                  <td>
                    <span id="F5_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F5-15" name="F5_15" onclick="kfcheckboxChange('F5-15', 'F5_15')"> </span>
                  </td>
                  <td>
                    <span id="F5_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="F5-16" name="F5_16" onclick="kfcheckboxChange('F5-16', 'F5_16')"> </span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <div id="note2"> <label id="Fs2-1-label">1:</label> <input type="text" name="Fs2_1_note" id="Fs2-1-note" ></div>
              <div id="note2"> <label id="Fs2-2-label">2:</label> <input type="text" name="Fs2_2_note" id="Fs2-2-note" ></div>
              <div id="note2"> <label id="Fs2-3-label">3:</label> <input type="text" name="Fs2_3_note" id="Fs2-3-note" ></div>
              <div id="note2"> <label id="Fs2-4-label">4:</label> <input type="text" name="Fs2_4_note" id="Fs2-4-note" ></div>
              <div id="note2"> <label id="Fs2-5-label">5:</label> <input type="text" name="Fs2_5_note" id="Fs2-5-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="F1-1-label">F1<span>(1)</span>:</label> <input type="text" name="F1_1_note" id="F1-1-note" ></div>
              <div id="note3"> <label id="F1-2-label">F1<span>(2)</span>:</label> <input type="text" name="F1_2_note" id="F1-2-note" ></div>
              <div id="note3"> <label id="F1-3-label">F1<span>(3)</span>:</label> <input type="text" name="F1_3_note" id="F1-3-note" ></div>
              <div id="note3"> <label id="F1-4-label">F1<span>(4)</span>:</label> <input type="text" name="F1_4_note" id="F1-4-note" ></div>

              <div id="note3"> <label id="F2-1-label">F2<span>(1)</span>:</label> <input type="text" name="F2_1_note" id="F2-1-note" ></div>
              <div id="note3"> <label id="F2-2-label">F2<span>(2)</span>:</label> <input type="text" name="F2_2_note" id="F2-2-note" ></div>
              <div id="note3"> <label id="F2-3-label">F2<span>(3)</span>:</label> <input type="text" name="F2_3_note" id="F2-3-note" ></div>
              <div id="note3"> <label id="F2-4-label">F2<span>(4)</span>:</label> <input type="text" name="F2_4_note" id="F2-4-note" ></div>

              <div id="note3"> <label id="F3-1-label">F3<span>(1)</span>:</label> <input type="text" name="F3_1_note" id="F3-1-note" ></div>
              <div id="note3"> <label id="F3-2-label">F3<span>(2)</span>:</label> <input type="text" name="F3_2_note" id="F3-2-note" ></div>
              <div id="note3"> <label id="F3-3-label">F3<span>(3)</span>:</label> <input type="text" name="F3_3_note" id="F3-3-note" ></div>
              <div id="note3"> <label id="F3-4-label">F3<span>(4)</span>:</label> <input type="text" name="F3_4_note" id="F3-4-note" ></div>

              <div id="note3"> <label id="F4-1-label">F4<span>(1)</span>:</label> <input type="text" name="F4_1_note" id="F4-1-note" ></div>
              <div id="note3"> <label id="F4-2-label">F4<span>(2)</span>:</label> <input type="text" name="F4_2_note" id="F4-2-note" ></div>
              <div id="note3"> <label id="F4-3-label">F4<span>(3)</span>:</label> <input type="text" name="F4_3_note" id="F4-3-note" ></div>
              <div id="note3"> <label id="F4-4-label">F4<span>(4)</span>:</label> <input type="text" name="F4_4_note" id="F4-4-note" ></div>
              
              <div id="note3"> <label id="F5-1-label">F5<span>(1)</span>:</label> <input type="text" name="F5_1_note" id="F5-1-note" ></div>
              <div id="note3"> <label id="F5-2-label">F5<span>(2)</span>:</label> <input type="text" name="F5_2_note" id="F5-2-note" ></div>
              <div id="note3"> <label id="F5-3-label">F5<span>(3)</span>:</label> <input type="text" name="F5_3_note" id="F5-3-note" ></div>
              <div id="note3"> <label id="F5-4-label">F5<span>(4)</span>:</label> <input type="text" name="F5_4_note" id="F5-4-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="F1-5-label">F1<span>(1)</span>:</label> <input type="text" name="F1_5_note" id="F1-5-note" ></div>
              <div id="note3"> <label id="F1-6-label">F1<span>(2)</span>:</label> <input type="text" name="F1_6_note" id="F1-6-note" ></div>
              <div id="note3"> <label id="F1-7-label">F1<span>(3)</span>:</label> <input type="text" name="F1_7_note" id="F1-7-note" ></div>
              <div id="note3"> <label id="F1-8-label">F1<span>(4)</span>:</label> <input type="text" name="F1_8_note" id="F1-8-note" ></div>

              <div id="note3"> <label id="F2-5-label">F2<span>(1)</span>:</label> <input type="text" name="F2_5_note" id="F2-5-note" ></div>
              <div id="note3"> <label id="F2-6-label">F2<span>(2)</span>:</label> <input type="text" name="F2_6_note" id="F2-6-note" ></div>
              <div id="note3"> <label id="F2-7-label">F2<span>(3)</span>:</label> <input type="text" name="F2_7_note" id="F2-7-note" ></div>
              <div id="note3"> <label id="F2-8-label">F2<span>(4)</span>:</label> <input type="text" name="F2_8_note" id="F2-8-note" ></div>

              <div id="note3"> <label id="F3-5-label">F3<span>(1)</span>:</label> <input type="text" name="F3_5_note" id="F3-5-note" ></div>
              <div id="note3"> <label id="F3-6-label">F3<span>(2)</span>:</label> <input type="text" name="F3_6_note" id="F3-6-note" ></div>
              <div id="note3"> <label id="F3-7-label">F3<span>(3)</span>:</label> <input type="text" name="F3_7_note" id="F3-7-note" ></div>
              <div id="note3"> <label id="F3-8-label">F3<span>(4)</span>:</label> <input type="text" name="F3_8_note" id="F3-8-note" ></div>

              <div id="note3"> <label id="F4-5-label">F4<span>(1)</span>:</label> <input type="text" name="F4_5_note" id="F4-5-note" ></div>
              <div id="note3"> <label id="F4-6-label">F4<span>(2)</span>:</label> <input type="text" name="F4_6_note" id="F4-6-note" ></div>
              <div id="note3"> <label id="F4-8-label">F4<span>(3)</span>:</label> <input type="text" name="F4_8_note" id="F4-8-note" ></div>
              <div id="note3"> <label id="F4-7-label">F4<span>(4)</span>:</label> <input type="text" name="F4_7_note" id="F4-7-note" ></div>
              
              <div id="note3"> <label id="F5-5-label">F5<span>(1)</span>:</label> <input type="text" name="F5_5_note" id="F5-5-note" ></div>
              <div id="note3"> <label id="F5-6-label">F5<span>(2)</span>:</label> <input type="text" name="F5_6_note" id="F5-6-note" ></div>
              <div id="note3"> <label id="F5-7-label">F5<span>(3)</span>:</label> <input type="text" name="F5_7_note" id="F5-7-note" ></div>
              <div id="note3"> <label id="F5-8-label">F5<span>(4)</span>:</label> <input type="text" name="F5_8_note" id="F5-8-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="F1-9-label">F1<span>(1)</span>:</label> <input type="text" name="F1_9_note" id="F1-9-note" ></div>
              <div id="note3"> <label id="F1-10-label">F1<span>(2)</span>:</label> <input type="text" name="F1_10_note" id="F1-10-note" ></div>
              <div id="note3"> <label id="F1-11-label">F1<span>(3)</span>:</label> <input type="text" name="F1_11_note" id="F1-11-note" ></div>
              <div id="note3"> <label id="F1-12-label">F1<span>(4)</span>:</label> <input type="text" name="F1_12_note" id="F1-12-note" ></div>

              <div id="note3"> <label id="F2-9-label">F2<span>(1)</span>:</label> <input type="text" name="F2_9_note" id="F2-9-note" ></div>
              <div id="note3"> <label id="F2-10-label">F2<span>(2)</span>:</label> <input type="text" name="F2_10_note" id="F2-10-note" ></div>
              <div id="note3"> <label id="F2-11-label">F2<span>(3)</span>:</label> <input type="text" name="F2_11_note" id="F2-11-note" ></div>
              <div id="note3"> <label id="F2-12-label">F2<span>(4)</span>:</label> <input type="text" name="F2_12_note" id="F2-12-note" ></div>

              <div id="note3"> <label id="F3-9-label">F3<span>(1)</span>:</label> <input type="text" name="F3_9_note" id="F3-9-note" ></div>
              <div id="note3"> <label id="F3-10-label">F3<span>(2)</span>:</label> <input type="text" name="F3_10_note" id="F3-10-note" ></div>
              <div id="note3"> <label id="F3-11-label">F3<span>(3)</span>:</label> <input type="text" name="F3_11_note" id="F3-11-note" ></div>
              <div id="note3"> <label id="F3-12-label">F3<span>(4)</span>:</label> <input type="text" name="F3_12_note" id="F3-12-note" ></div>

              <div id="note3"> <label id="F4-9-label">F4<span>(1)</span>:</label> <input type="text" name="F4_9_note" id="F4-9-note" ></div>
              <div id="note3"> <label id="F4-10-label">F4<span>(2)</span>:</label> <input type="text" name="F4_10_note" id="F4-10-note" ></div>
              <div id="note3"> <label id="F4-11-label">F4<span>(3)</span>:</label> <input type="text" name="F4_11_note" id="F4-11-note" ></div>
              <div id="note3"> <label id="F4-12-label">F4<span>(4)</span>:</label> <input type="text" name="F4_12_note" id="F4-12-note" ></div>
              
              <div id="note3"> <label id="F5-9-label">F5<span>(1)</span>:</label> <input type="text" name="F5_9_note" id="F5-9-note" ></div>
              <div id="note3"> <label id="F5-10-label">F5<span>(2)</span>:</label> <input type="text" name="F5_10_note" id="F5-10-note" ></div>
              <div id="note3"> <label id="F5-11-label">F5<span>(3)</span>:</label> <input type="text" name="F5_11_note" id="F5-11-note" ></div>
              <div id="note3"> <label id="F5-12-label">F5<span>(4)</span>:</label> <input type="text" name="F5_12_note" id="F5-12-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="F1-13-label">F1<span>(1)</span>:</label> <input type="text" name="F1_13_note" id="F1-13-note" ></div>
              <div id="note3"> <label id="F1-14-label">F1<span>(2)</span>:</label> <input type="text" name="F1_14_note" id="F1-14-note" ></div>
              <div id="note3"> <label id="F1-15-label">F1<span>(3)</span>:</label> <input type="text" name="F1_15_note" id="F1-15-note" ></div>
              <div id="note3"> <label id="F1-16-label">F1<span>(4)</span>:</label> <input type="text" name="F1_16_note" id="F1-16-note" ></div>

              <div id="note3"> <label id="F2-13-label">F2<span>(1)</span>:</label> <input type="text" name="F2_13_note" id="F2-13-note" ></div>
              <div id="note3"> <label id="F2-14-label">F2<span>(2)</span>:</label> <input type="text" name="F2_14_note" id="F2-14-note" ></div>
              <div id="note3"> <label id="F2-15-label">F2<span>(3)</span>:</label> <input type="text" name="F2_15_note" id="F2-15-note" ></div>
              <div id="note3"> <label id="F2-16-label">F2<span>(4)</span>:</label> <input type="text" name="F2_16_note" id="F2-16-note" ></div>

              <div id="note3"> <label id="F3-13-label">F3<span>(1)</span>:</label> <input type="text" name="F3_13_note" id="F3-13-note" ></div>
              <div id="note3"> <label id="F3-13-label">F3<span>(2)</span>:</label> <input type="text" name="F3_14_note" id="F3-14-note" ></div>
              <div id="note3"> <label id="F3-15-label">F3<span>(3)</span>:</label> <input type="text" name="F3_15_note" id="F3-15-note" ></div>
              <div id="note3"> <label id="F3-16-label">F3<span>(4)</span>:</label> <input type="text" name="F3_16_note" id="F3-16-note" ></div>

              <div id="note3"> <label id="F4-13-label">F4<span>(1)</span>:</label> <input type="text" name="F4_13_note" id="F4-13-note" ></div>
              <div id="note3"> <label id="F4-14-label">F4<span>(2)</span>:</label> <input type="text" name="F4_14_note" id="F4-14-note" ></div>
              <div id="note3"> <label id="F4-15-label">F4<span>(3)</span>:</label> <input type="text" name="F4_15_note" id="F4-15-note" ></div>
              <div id="note3"> <label id="F4-16-label">F4<span>(4)</span>:</label> <input type="text" name="F4_16_note" id="F4-16-note" ></div>
              
              <div id="note3"> <label id="F5-13-label">F5<span>(1)</span>:</label> <input type="text" name="F5_13_note" id="F5-13-note" ></div>
              <div id="note3"> <label id="F5-14-label">F5<span>(2)</span>:</label> <input type="text" name="F5_14_note" id="F5-14-note" ></div>
              <div id="note3"> <label id="F5-15-label">F5<span>(3)</span>:</label> <input type="text" name="F5_15_note" id="F5-15-note" ></div>
              <div id="note3"> <label id="F5-16-label">F5<span>(4)</span>:</label> <input type="text" name="F5_16_note" id="F5-16-note" ></div>
            </td>
          </tr>
          <tr>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              G.&nbsp;Throat Problems:
                <p><span id="Gs2_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Gs2-1" name="Gs2_1" onclick="kfcheckboxChange('Gs2-1', 'Gs2_1')"></span> 1. Swallowing difficulties/tightness of throat</p>
                <p><span id="Gs2_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Gs2-2" name="Gs2_2" onclick="kfcheckboxChange('Gs2-2', 'Gs2_2')"></span> 2. Sore throat without infection (coryza)</p>
                <p><span id="Gs2_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Gs2-3" name="Gs2_3" onclick="kfcheckboxChange('Gs2-3', 'Gs2_3')"></span> 3. Voice fluctuations</p>
                <p><span id="Gs2_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Gs2-4" name="Gs2_4" onclick="kfcheckboxChange('Gs2-4', 'Gs2_4')"></span> 4. Frequesnt coughing or constant clearing of throat</p>
                <p><span id="Gs2_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Gs2-5" name="Gs2_5" onclick="kfcheckboxChange('Gs2-5', 'Gs2_5')"></span> 5. Tongue pain (glossalgia)</p>
                <p><span id="Gs2_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Gs2-6" name="Gs2_6" onclick="kfcheckboxChange('Gs2-6', 'Gs2_6')"></span> 6. Salivation (intense)</p>
                <p><span id="Gs2_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Gs2-7" name="Gs2_7" onclick="kfcheckboxChange('Gs2-7', 'Gs2_7')"></span> 7. Pain in the hard palate (posterior areas)</p>
              </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
              <tr>
                  <td style="font-size: 12px;">G1</td>
                  <td>
                    <span id="G1_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G1-1" name="G1_1" onclick="kfcheckboxChange('G1-1', 'G1_1')"> </span>
                  </td>
                  <td>
                    <span id="G1_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G1-2" name="G1_2" onclick="kfcheckboxChange('G1-2', 'G1_2')"> </span>
                  </td>
                  <td>
                    <span id="G1_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G1-3" name="G1_3" onclick="kfcheckboxChange('G1-3', 'G1_3')"> </span>
                  </td>
                  <td>
                    <span id="G1_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G1-4" name="G1_4" onclick="kfcheckboxChange('G1-4', 'G1_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G2</td>
                  <td>
                    <span id="G2_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G2-1" name="G2_1" onclick="kfcheckboxChange('G2-1', 'G2_1')"> </span>
                  </td>
                  <td>
                    <span id="G2_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G2-2" name="G2_2" onclick="kfcheckboxChange('G2-2', 'G2_2')"> </span>
                  </td>
                  <td>
                    <span id="G2_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G2-3" name="G2_3" onclick="kfcheckboxChange('G2-3', 'G2_3')"> </span>
                  </td>
                  <td>
                    <span id="G2_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G2-4" name="G2_4" onclick="kfcheckboxChange('G2-4', 'G2_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G3</td>
                  <td>
                    <span id="G3_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G3-1" name="G3_1" onclick="kfcheckboxChange('G3-1', 'G3_1')"> </span>
                  </td>
                  <td>
                    <span id="G3_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G3-2" name="G3_2" onclick="kfcheckboxChange('G3-2', 'G3_2')"> </span>
                  </td>
                  <td>
                    <span id="G3_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G3-3" name="G3_3" onclick="kfcheckboxChange('G3-3', 'G3_3')"> </span>
                  </td>
                  <td>
                    <span id="G3_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G3-4" name="G3_4" onclick="kfcheckboxChange('G3-4', 'G3_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G4</td>
                  <td>
                    <span id="G4_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G4-1" name="G4_1" onclick="kfcheckboxChange('G4-1', 'G4_1')"> </span>
                  </td>
                  <td>
                    <span id="G4_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G4-2" name="G4_2" onclick="kfcheckboxChange('G4-2', 'G4_2')"> </span>
                  </td>
                  <td>
                    <span id="G4_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G4-3" name="G4_3" onclick="kfcheckboxChange('G4-3', 'G4_3')"> </span>
                  </td>
                  <td>
                    <span id="G4_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G4-4" name="G4_4" onclick="kfcheckboxChange('G4-4', 'G4_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G5</td>
                  <td>
                    <span id="G5_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G5-1" name="G5_1" onclick="kfcheckboxChange('G5-1', 'G5_1')"> </span>
                  </td>
                  <td>
                    <span id="G5_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G5-2" name="G5_2" onclick="kfcheckboxChange('G5-2', 'G5_2')"> </span>
                  </td>
                  <td>
                    <span id="G5_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G5-3" name="G5_3" onclick="kfcheckboxChange('G5-3', 'G5_3')"> </span>
                  </td>
                  <td>
                    <span id="G5_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G5-4" name="G5_4" onclick="kfcheckboxChange('G5-4', 'G5_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G6</td>
                  <td>
                    <span id="G6_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G6-1" name="G6_1" onclick="kfcheckboxChange('G6-1', 'G6_1')"> </span>
                  </td>
                  <td>
                    <span id="G6_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G6-2" name="G6_2" onclick="kfcheckboxChange('G6-2', 'G6_2')"> </span>
                  </td>
                  <td>
                    <span id="G6_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G6-3" name="G6_3" onclick="kfcheckboxChange('G6-3', 'G6_3')"> </span>
                  </td>
                  <td>
                    <span id="G6_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G6-4" name="G6_4" onclick="kfcheckboxChange('G6-4', 'G6_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G7</td>
                  <td>
                    <span id="G7_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G7-1" name="G7_1" onclick="kfcheckboxChange('G7-1', 'G7_1')"> </span>
                  </td>
                  <td>
                    <span id="G7_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G7-2" name="G7_2" onclick="kfcheckboxChange('G7-2', 'G7_2')"> </span>
                  </td>
                  <td>
                    <span id="G7_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G7-3" name="G7_3" onclick="kfcheckboxChange('G7-3', 'G7_3')"> </span>
                  </td>
                  <td>
                    <span id="G7_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G7-4" name="G7_4" onclick="kfcheckboxChange('G7-4', 'G7_4')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
              <tr>
                  <td style="font-size: 12px;">G1</td>
                  <td>
                    <span id="G1_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G1-5" name="G1_5" onclick="kfcheckboxChange('G1-5', 'G1_5')"> </span>
                  </td>
                  <td>
                    <span id="G1_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G1-6" name="G1_6" onclick="kfcheckboxChange('G1-6', 'G1_6')"> </span>
                  </td>
                  <td>
                    <span id="G1_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G1-7" name="G1_7" onclick="kfcheckboxChange('G1-7', 'G1_7')"> </span>
                  </td>
                  <td>
                    <span id="G1_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G1-8" name="G1_8" onclick="kfcheckboxChange('G1-8', 'G1_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G2</td>
                  <td>
                    <span id="G2_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G2-5" name="G2_5" onclick="kfcheckboxChange('G2-5', 'G2_5')"> </span>
                  </td>
                  <td>
                    <span id="G2_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G2-6" name="G2_6" onclick="kfcheckboxChange('G2-6', 'G2_6')"> </span>
                  </td>
                  <td>
                    <span id="G2_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G2-7" name="G2_7" onclick="kfcheckboxChange('G2-7', 'G2_7')"> </span>
                  </td>
                  <td>
                    <span id="G2_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G2-8" name="G2_8" onclick="kfcheckboxChange('G2-8', 'G2_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G3</td>
                  <td>
                    <span id="G3_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G3-5" name="G3_5" onclick="kfcheckboxChange('G3-5', 'G3_5')"> </span>
                  </td>
                  <td>
                    <span id="G3_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G3-6" name="G3_6" onclick="kfcheckboxChange('G3-6', 'G3_6')"> </span>
                  </td>
                  <td>
                    <span id="G3_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G3-7" name="G3_7" onclick="kfcheckboxChange('G3-7', 'G3_7')"> </span>
                  </td>
                  <td>
                    <span id="G3_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G3-8" name="G3_8" onclick="kfcheckboxChange('G3-8', 'G3_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G4</td>
                  <td>
                    <span id="G4_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G4-5" name="G4_5" onclick="kfcheckboxChange('G4-5', 'G4_5')"> </span>
                  </td>
                  <td>
                    <span id="G4_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G4-6" name="G4_6" onclick="kfcheckboxChange('G4-6', 'G4_6')"> </span>
                  </td>
                  <td>
                    <span id="G4_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G4-7" name="G4_7" onclick="kfcheckboxChange('G4-7', 'G4_7')"> </span>
                  </td>
                  <td>
                    <span id="G4_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G4-8" name="G4_8" onclick="kfcheckboxChange('G4-8', 'G4_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G5</td>
                  <td>
                    <span id="G5_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G5-5" name="G5_5" onclick="kfcheckboxChange('G5-5', 'G5_5')"> </span>
                  </td>
                  <td>
                    <span id="G5_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G5-6" name="G5_6" onclick="kfcheckboxChange('G5-6', 'G5_6')"> </span>
                  </td>
                  <td>
                    <span id="G5_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G5-7" name="G5_7" onclick="kfcheckboxChange('G5-7', 'G5_7')"> </span>
                  </td>
                  <td>
                    <span id="G5_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G5-8" name="G5_8" onclick="kfcheckboxChange('G5-8', 'G5_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G6</td>
                  <td>
                    <span id="G6_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G6-5" name="G6_5" onclick="kfcheckboxChange('G6-5', 'G6_5')"> </span>
                  </td>
                  <td>
                    <span id="G6_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G6-6" name="G6_6" onclick="kfcheckboxChange('G6-6', 'G6_6')"> </span>
                  </td>
                  <td>
                    <span id="G6_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G6-7" name="G6_7" onclick="kfcheckboxChange('G6-7', 'G6_7')"> </span>
                  </td>
                  <td>
                    <span id="G6_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G6-8" name="G6_8" onclick="kfcheckboxChange('G6-8', 'G6_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G7</td>
                  <td>
                    <span id="G7_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G7-5" name="G7_5" onclick="kfcheckboxChange('G7-5', 'G7_5')"> </span>
                  </td>
                  <td>
                    <span id="G7_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G7-6" name="G7_6" onclick="kfcheckboxChange('G7-6', 'G7_6')"> </span>
                  </td>
                  <td>
                    <span id="G7_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G7-7" name="G7_7" onclick="kfcheckboxChange('G7-7', 'G7_7')"> </span>
                  </td>
                  <td>
                    <span id="G7_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G7-8" name="G7_8" onclick="kfcheckboxChange('G7-8', 'G7_8')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
              <tr>
                  <td style="font-size: 12px;">G1</td>
                  <td>
                    <span id="G1_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G1-9" name="G1_9" onclick="kfcheckboxChange('G1-9', 'G1_9')"> </span>
                  </td>
                  <td>
                    <span id="G1_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G1-10" name="G1_10" onclick="kfcheckboxChange('G1-10', 'G1_10')"> </span>
                  </td>
                  <td>
                    <span id="G1_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G1-11" name="G1_11" onclick="kfcheckboxChange('G1-11', 'G1_11')"> </span>
                  </td>
                  <td>
                    <span id="G1_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G1-12" name="G1_12" onclick="kfcheckboxChange('G1-12', 'G1_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G2</td>
                  <td>
                    <span id="G2_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G2-9" name="G2_9" onclick="kfcheckboxChange('G2-9', 'G2_9')"> </span>
                  </td>
                  <td>
                    <span id="G2_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G2-10" name="G2_10" onclick="kfcheckboxChange('G2-10', 'G2_10')"> </span>
                  </td>
                  <td>
                    <span id="G2_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G2-11" name="G2_11" onclick="kfcheckboxChange('G2-11', 'G2_11')"> </span>
                  </td>
                  <td>
                    <span id="G2_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G2-12" name="G2_12" onclick="kfcheckboxChange('G2-12', 'G2_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G3</td>
                  <td>
                    <span id="G3_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G3-9" name="G3_9" onclick="kfcheckboxChange('G3-9', 'G3_9')"> </span>
                  </td>
                  <td>
                    <span id="G3_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G3-10" name="G3_10" onclick="kfcheckboxChange('G3-10', 'G3_10')"> </span>
                  </td>
                  <td>
                    <span id="G3_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G3-11" name="G3_11" onclick="kfcheckboxChange('G3-11', 'G3_11')"> </span>
                  </td>
                  <td>
                    <span id="G3_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G3-12" name="G3_12" onclick="kfcheckboxChange('G3-12', 'G3_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G4</td>
                  <td>
                    <span id="G4_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G4-9" name="G4_9" onclick="kfcheckboxChange('G4-9', 'G4_9')"> </span>
                  </td>
                  <td>
                    <span id="G4_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G4-10" name="G4_10" onclick="kfcheckboxChange('G4-10', 'G4_10')"> </span>
                  </td>
                  <td>
                    <span id="G4_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G4-11" name="G4_11" onclick="kfcheckboxChange('G4-11', 'G4_11')"> </span>
                  </td>
                  <td>
                    <span id="G4_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G4-12" name="G4_12" onclick="kfcheckboxChange('G4-12', 'G4_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G5</td>
                  <td>
                    <span id="G5_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G5-9" name="G5_9" onclick="kfcheckboxChange('G5-9', 'G5_9')"> </span>
                  </td>
                  <td>
                    <span id="G5_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G5-10" name="G5_10" onclick="kfcheckboxChange('G5-10', 'G5_10')"> </span>
                  </td>
                  <td>
                    <span id="G5_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G5-11" name="G5_11" onclick="kfcheckboxChange('G5-11', 'G5_11')"> </span>
                  </td>
                  <td>
                    <span id="G5_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G5-12" name="G5_12" onclick="kfcheckboxChange('G5-12', 'G5_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G6</td>
                  <td>
                    <span id="G6_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G6-9" name="G6_9" onclick="kfcheckboxChange('G6-9', 'G6_9')"> </span>
                  </td>
                  <td>
                    <span id="G6_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G6-10" name="G6_10" onclick="kfcheckboxChange('G6-10', 'G6_10')"> </span>
                  </td>
                  <td>
                    <span id="G6_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G6-11" name="G6_11" onclick="kfcheckboxChange('G6-11', 'G6_11')"> </span>
                  </td>
                  <td>
                    <span id="G6_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G6-12" name="G6_12" onclick="kfcheckboxChange('G6-12', 'G6_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">G7</td>
                  <td>
                    <span id="G7_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G7-9" name="G7_9" onclick="kfcheckboxChange('G7-9', 'G7_9')"> </span>
                  </td>
                  <td>
                    <span id="G7_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G7-10" name="G7_10" onclick="kfcheckboxChange('G7-10', 'G7_10')"> </span>
                  </td>
                  <td>
                    <span id="G7_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G7-11" name="G7_11" onclick="kfcheckboxChange('G7-11', 'G7_11')"> </span>
                  </td>
                  <td>
                    <span id="G7_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G7-12" name="G7_12" onclick="kfcheckboxChange('G7-12', 'G7_12')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
                <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                 <td style="font-size: 12px;">G1</td>
                  <td>
                    <span id="G1_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G1-13" name="G1_13" onclick="kfcheckboxChange('G1-13', 'G1_13')"> </span>
                  </td>
                  <td>
                    <span id="G1_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G1-14" name="G1_14" onclick="kfcheckboxChange('G1-14', 'G1_14')"> </span>
                  </td>
                  <td>
                    <span id="G1_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G1-15" name="G1_15" onclick="kfcheckboxChange('G1-15', 'G1_15')"> </span>
                  </td>
                  <td>
                    <span id="G1_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G1-16" name="G1_16" onclick="kfcheckboxChange('G1-16', 'G1_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">G2</td>
                  <td>
                    <span id="G2_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G2-13" name="G2_13" onclick="kfcheckboxChange('G2-13', 'G2_13')"> </span>
                  </td>
                  <td>
                    <span id="G2_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G2-14" name="G2_14" onclick="kfcheckboxChange('G2-14', 'G2_14')"> </span>
                  </td>
                  <td>
                    <span id="G2_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G2-15" name="G2_15" onclick="kfcheckboxChange('G2-15', 'G2_15')"> </span>
                  </td>
                  <td>
                    <span id="G2_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G2-16" name="G2_16" onclick="kfcheckboxChange('G2-16', 'G2_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">G3</td>
                  <td>
                    <span id="G3_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G3-13" name="G3_13" onclick="kfcheckboxChange('G3-13', 'G3_13')"> </span>
                  </td>
                  <td>
                    <span id="G3_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G3-14" name="G3_14" onclick="kfcheckboxChange('G3-14', 'G3_14')"> </span>
                  </td>
                  <td>
                    <span id="G3_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G3-15" name="G3_15" onclick="kfcheckboxChange('G3-15', 'G3_15')"> </span>
                  </td>
                  <td>
                    <span id="G3_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G3-16" name="G3_16" onclick="kfcheckboxChange('G3-16', 'G3_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">G4</td>
                  <td>
                    <span id="G4_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G4-13" name="G4_13" onclick="kfcheckboxChange('G4-13', 'G4_13')"> </span>
                  </td>
                  <td>
                    <span id="G4_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G4-14" name="G4_14" onclick="kfcheckboxChange('G4-14', 'G4_14')"> </span>
                  </td>
                  <td>
                    <span id="G4_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G4-15" name="G4_15" onclick="kfcheckboxChange('G4-15', 'G4_15')"> </span>
                  </td>
                  <td>
                    <span id="G4_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G4-16" name="G4_16" onclick="kfcheckboxChange('G4-16', 'G4_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">G5</td>
                  <td>
                    <span id="G5_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G5-13" name="G5_13" onclick="kfcheckboxChange('G5-13', 'G5_13')"> </span>
                  </td>
                  <td>
                    <span id="G5_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G5-14" name="G5_14" onclick="kfcheckboxChange('G5-14', 'G5_14')"> </span>
                  </td>
                  <td>
                    <span id="G5_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G5-15" name="G5_15" onclick="kfcheckboxChange('G5-15', 'G5_15')"> </span>
                  </td>
                  <td>
                    <span id="G5_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G5-16" name="G5_16" onclick="kfcheckboxChange('G5-16', 'G5_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">G6</td>
                  <td>
                    <span id="G6_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G6-13" name="G6_13" onclick="kfcheckboxChange('G6-13', 'G6_13')"> </span>
                  </td>
                  <td>
                    <span id="G6_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G6-14" name="G6_14" onclick="kfcheckboxChange('G6-14', 'G6_14')"> </span>
                  </td>
                  <td>
                    <span id="G6_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G6-15" name="G6_15" onclick="kfcheckboxChange('G6-15', 'G6_15')"> </span>
                  </td>
                  <td>
                    <span id="G6_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G6-16" name="G6_16" onclick="kfcheckboxChange('G6-16', 'G6_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 12px;">G7</td>
                  <td>
                    <span id="G7_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G7-13" name="G7_13" onclick="kfcheckboxChange('G7-13', 'G7_13')"> </span>
                  </td>
                  <td>
                    <span id="G7_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G7-14" name="G7_14" onclick="kfcheckboxChange('G7-14', 'G7_14')"> </span>
                  </td>
                  <td>
                    <span id="G7_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G7-15" name="G7_15" onclick="kfcheckboxChange('G7-15', 'G7_15')"> </span>
                  </td>
                  <td>
                    <span id="G7_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="G7-16" name="G7_16" onclick="kfcheckboxChange('G7-16', 'G7_16')"> </span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <div id="note2"> <label id="Gs2-1-label">1:</label> <input type="text" name="Gs2_1_note" id="Gs2-1-note" ></div>
              <div id="note2"> <label id="Gs2-2-label">2:</label> <input type="text" name="Gs2_2_note" id="Gs2-2-note" ></div>
              <div id="note2"> <label id="Gs2-3-label">3:</label> <input type="text" name="Gs2_3_note" id="Gs2-3-note" ></div>
              <div id="note2"> <label id="Gs2-4-label">4:</label> <input type="text" name="Gs2_4_note" id="Gs2-4-note" ></div>
              <div id="note2"> <label id="Gs2-5-label">5:</label> <input type="text" name="Gs2_5_note" id="Gs2-5-note" ></div>
              <div id="note2"> <label id="Gs2-6-label">6:</label> <input type="text" name="Gs2_6_note" id="Gs2-6-note" ></div>
              <div id="note2"> <label id="Gs2-7-label">7:</label> <input type="text" name="Gs2_7_note" id="Gs2-7-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="G1-1-label">G1<span>(1)</span>:</label> <input type="text" name="G1_1_note" id="G1-1-note" ></div>
              <div id="note3"> <label id="G1-2-label">G1<span>(2)</span>:</label> <input type="text" name="G1_2_note" id="G1-2-note" ></div>
              <div id="note3"> <label id="G1-3-label">G1<span>(3)</span>:</label> <input type="text" name="G1_3_note" id="G1-3-note" ></div>
              <div id="note3"> <label id="G1-4-label">G1<span>(4)</span>:</label> <input type="text" name="G1_4_note" id="G1-4-note" ></div>

              <div id="note3"> <label id="G2-1-label">G2<span>(1)</span>:</label> <input type="text" name="G2_1_note" id="G2-1-note" ></div>
              <div id="note3"> <label id="G2-2-label">G2<span>(2)</span>:</label> <input type="text" name="G2_2_note" id="G2-2-note" ></div>
              <div id="note3"> <label id="G2-3-label">G2<span>(3)</span>:</label> <input type="text" name="G2_3_note" id="G2-3-note" ></div>
              <div id="note3"> <label id="G2-4-label">G2<span>(4)</span>:</label> <input type="text" name="G2_4_note" id="G2-4-note" ></div>

              <div id="note3"> <label id="G3-1-label">G3<span>(1)</span>:</label> <input type="text" name="G3_1_note" id="G3-1-note" ></div>
              <div id="note3"> <label id="G3-2-label">G3<span>(2)</span>:</label> <input type="text" name="G3_2_note" id="G3-2-note" ></div>
              <div id="note3"> <label id="G3-3-label">G3<span>(3)</span>:</label> <input type="text" name="G3_3_note" id="G3-3-note" ></div>
              <div id="note3"> <label id="G3-4-label">G3<span>(4)</span>:</label> <input type="text" name="G3_4_note" id="G3-4-note" ></div>

              <div id="note3"> <label id="G4-1-label">G4<span>(1)</span>:</label> <input type="text" name="G4_1_note" id="G4-1-note" ></div>
              <div id="note3"> <label id="G4-2-label">G4<span>(2)</span>:</label> <input type="text" name="G4_2_note" id="G4-2-note" ></div>
              <div id="note3"> <label id="G4-3-label">G4<span>(3)</span>:</label> <input type="text" name="G4_3_note" id="G4-3-note" ></div>
              <div id="note3"> <label id="G4-4-label">G4<span>(4)</span>:</label> <input type="text" name="G4_4_note" id="G4-4-note" ></div>
              
              <div id="note3"> <label id="G5-1-label">G5<span>(1)</span>:</label> <input type="text" name="G5_1_note" id="G5-1-note" ></div>
              <div id="note3"> <label id="G5-2-label">G5<span>(2)</span>:</label> <input type="text" name="G5_2_note" id="G5-2-note" ></div>
              <div id="note3"> <label id="G5-3-label">G5<span>(3)</span>:</label> <input type="text" name="G5_3_note" id="G5-3-note" ></div>
              <div id="note3"> <label id="G5-4-label">G5<span>(4)</span>:</label> <input type="text" name="G5_4_note" id="G5-4-note" ></div>

              <div id="note3"> <label id="G6-1-label">G6<span>(1)</span>:</label> <input type="text" name="G6_1_note" id="G6-1-note" ></div>
              <div id="note3"> <label id="G6-2-label">G6<span>(2)</span>:</label> <input type="text" name="G6_2_note" id="G6-2-note" ></div>
              <div id="note3"> <label id="G6-3-label">G6<span>(3)</span>:</label> <input type="text" name="G6_3_note" id="G6-3-note" ></div>
              <div id="note3"> <label id="G6-4-label">G6<span>(4)</span>:</label> <input type="text" name="G6_4_note" id="G6-4-note" ></div>

              <div id="note3"> <label id="G7-1-label">G7<span>(1)</span>:</label> <input type="text" name="G7_1_note" id="G7-1-note" ></div>
              <div id="note3"> <label id="G7-2-label">G7<span>(2)</span>:</label> <input type="text" name="G7_2_note" id="G7-2-note" ></div>
              <div id="note3"> <label id="G7-3-label">G7<span>(3)</span>:</label> <input type="text" name="G7_3_note" id="G7-3-note" ></div>
              <div id="note3"> <label id="G7-4-label">G7<span>(4)</span>:</label> <input type="text" name="G7_4_note" id="G7-4-note" ></div>
            </td>
            <td style="width: 15%;border: px solid;vertical-align: top;">
              <div id="note3"> <label id="G1-5-label">G1<span>(1)</span>:</label> <input type="text" name="G1_5_note" id="G1-5-note" ></div>
              <div id="note3"> <label id="G1-6-label">G1<span>(2)</span>:</label> <input type="text" name="G1_6_note" id="G1-6-note" ></div>
              <div id="note3"> <label id="G1-7-label">G1<span>(3)</span>:</label> <input type="text" name="G1_7_note" id="G1-7-note" ></div>
              <div id="note3"> <label id="G1-8-label">G1<span>(4)</span>:</label> <input type="text" name="G1_8_note" id="G1-8-note" ></div>

              <div id="note3"> <label id="G2-5-label">G2<span>(1)</span>:</label> <input type="text" name="G2_5_note" id="G2-5-note" ></div>
              <div id="note3"> <label id="G2-6-label">G2<span>(2)</span>:</label> <input type="text" name="G2_6_note" id="G2-6-note" ></div>
              <div id="note3"> <label id="G2-7-label">G2<span>(3)</span>:</label> <input type="text" name="G2_7_note" id="G2-7-note" ></div>
              <div id="note3"> <label id="G2-8-label">G2<span>(4)</span>:</label> <input type="text" name="G2_8_note" id="G2-8-note" ></div>

              <div id="note3"> <label id="G3-5-label">G3<span>(1)</span>:</label> <input type="text" name="G3_5_note" id="G3-5-note" ></div>
              <div id="note3"> <label id="G3-6-label">G3<span>(2)</span>:</label> <input type="text" name="G3_6_note" id="G3-6-note" ></div>
              <div id="note3"> <label id="G3-7-label">G3<span>(3)</span>:</label> <input type="text" name="G3_7_note" id="G3-7-note" ></div>
              <div id="note3"> <label id="G3-8-label">G3<span>(4)</span>:</label> <input type="text" name="G3_8_note" id="G3-8-note" ></div>

              <div id="note3"> <label id="G4-5-label">G4<span>(1)</span>:</label> <input type="text" name="G4_5_note" id="G4-5-note" ></div>
              <div id="note3"> <label id="G4-6-label">G4<span>(2)</span>:</label> <input type="text" name="G4_6_note" id="G4-6-note" ></div>
              <div id="note3"> <label id="G4-8-label">G4<span>(3)</span>:</label> <input type="text" name="G4_8_note" id="G4-8-note" ></div>
              <div id="note3"> <label id="G4-7-label">G4<span>(4)</span>:</label> <input type="text" name="G4_7_note" id="G4-7-note" ></div>
              
              <div id="note3"> <label id="G5-5-label">G5<span>(1)</span>:</label> <input type="text" name="G5_5_note" id="G5-5-note" ></div>
              <div id="note3"> <label id="G5-6-label">G5<span>(2)</span>:</label> <input type="text" name="G5_6_note" id="G5-6-note" ></div>
              <div id="note3"> <label id="G5-7-label">G5<span>(3)</span>:</label> <input type="text" name="G5_7_note" id="G5-7-note" ></div>
              <div id="note3"> <label id="G5-8-label">G5<span>(4)</span>:</label> <input type="text" name="G5_8_note" id="G5-8-note" ></div>

              <div id="note3"> <label id="G6-5-label">G6<span>(1)</span>:</label> <input type="text" name="G6_5_note" id="G6-5-note" ></div>
              <div id="note3"> <label id="G6-6-label">G6<span>(2)</span>:</label> <input type="text" name="G6_6_note" id="G6-6-note" ></div>
              <div id="note3"> <label id="G6-7-label">G6<span>(3)</span>:</label> <input type="text" name="G6_7_note" id="G6-7-note" ></div>
              <div id="note3"> <label id="G6-8-label">G6<span>(4)</span>:</label> <input type="text" name="G6_8_note" id="G6-8-note" ></div>

              <div id="note3"> <label id="G7-5-label">G7<span>(1)</span>:</label> <input type="text" name="G7_5_note" id="G7-5-note" ></div>
              <div id="note3"> <label id="G7-6-label">G7<span>(2)</span>:</label> <input type="text" name="G7_6_note" id="G7-6-note" ></div>
              <div id="note3"> <label id="G7-7-label">G7<span>(3)</span>:</label> <input type="text" name="G7_7_note" id="G7-7-note" ></div>
              <div id="note3"> <label id="G7-8-label">G7<span>(4)</span>:</label> <input type="text" name="G7_8_note" id="G7-8-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="G1-9-label">G1<span>(1)</span>:</label> <input type="text" name="G1_9_note" id="G1-9-note" ></div>
              <div id="note3"> <label id="G1-10-label">G1<span>(2)</span>:</label> <input type="text" name="G1_10_note" id="G1-10-note" ></div>
              <div id="note3"> <label id="G1-11-label">G1<span>(3)</span>:</label> <input type="text" name="G1_11_note" id="G1-11-note" ></div>
              <div id="note3"> <label id="G1-12-label">G1<span>(4)</span>:</label> <input type="text" name="G1_12_note" id="G1-12-note" ></div>

              <div id="note3"> <label id="G2-9-label">G2<span>(1)</span>:</label> <input type="text" name="G2_9_note" id="G2-9-note" ></div>
              <div id="note3"> <label id="G2-10-label">G2<span>(2)</span>:</label> <input type="text" name="G2_10_note" id="G2-10-note" ></div>
              <div id="note3"> <label id="G2-11-label">G2<span>(3)</span>:</label> <input type="text" name="G2_11_note" id="G2-11-note" ></div>
              <div id="note3"> <label id="G2-12-label">G2<span>(4)</span>:</label> <input type="text" name="G2_12_note" id="G2-12-note" ></div>

              <div id="note3"> <label id="G3-9-label">G3<span>(1)</span>:</label> <input type="text" name="G3_9_note" id="G3-9-note" ></div>
              <div id="note3"> <label id="G3-10-label">G3<span>(2)</span>:</label> <input type="text" name="G3_10_note" id="G3-10-note" ></div>
              <div id="note3"> <label id="G3-11-label">G3<span>(3)</span>:</label> <input type="text" name="G3_11_note" id="G3-11-note" ></div>
              <div id="note3"> <label id="G3-12-label">G3<span>(4)</span>:</label> <input type="text" name="G3_12_note" id="G3-12-note" ></div>

              <div id="note3"> <label id="G4-9-label">G4<span>(1)</span>:</label> <input type="text" name="G4_9_note" id="G4-9-note" ></div>
              <div id="note3"> <label id="G4-10-label">G4<span>(2)</span>:</label> <input type="text" name="G4_10_note" id="G4-10-note" ></div>
              <div id="note3"> <label id="G4-11-label">G4<span>(3)</span>:</label> <input type="text" name="G4_11_note" id="G4-11-note" ></div>
              <div id="note3"> <label id="G4-12-label">G4<span>(4)</span>:</label> <input type="text" name="G4_12_note" id="G4-12-note" ></div>
              
              <div id="note3"> <label id="G5-9-label">G5<span>(1)</span>:</label> <input type="text" name="G5_9_note" id="G5-9-note" ></div>
              <div id="note3"> <label id="G5-10-label">G5<span>(2)</span>:</label> <input type="text" name="G5_10_note" id="G5-10-note" ></div>
              <div id="note3"> <label id="G5-11-label">G5<span>(3)</span>:</label> <input type="text" name="G5_11_note" id="G5-11-note" ></div>
              <div id="note3"> <label id="G5-12-label">G5<span>(4)</span>:</label> <input type="text" name="G5_12_note" id="G5-12-note" ></div>

              <div id="note3"> <label id="G6-9-label">G6<span>(1)</span>:</label> <input type="text" name="G6_9_note" id="G6-9-note" ></div>
              <div id="note3"> <label id="G6-10-label">G6<span>(2)</span>:</label> <input type="text" name="G6_10_note" id="G6-10-note" ></div>
              <div id="note3"> <label id="G6-11-label">G6<span>(3)</span>:</label> <input type="text" name="G6_11_note" id="G6-11-note" ></div>
              <div id="note3"> <label id="G6-12-label">G6<span>(4)</span>:</label> <input type="text" name="A6_12_note" id="G6-12-note" ></div>

              <div id="note3"> <label id="G7-9-label">G7<span>(1)</span>:</label> <input type="text" name="G7_9_note" id="G7-9-note" ></div>
              <div id="note3"> <label id="G7-10-label">G7<span>(2)</span>:</label> <input type="text" name="G7_10_note" id="G7-10-note" ></div>
              <div id="note3"> <label id="G7-11-label">G7<span>(3)</span>:</label> <input type="text" name="G7_11_note" id="G7-11-note" ></div>
              <div id="note3"> <label id="G7-12-label">G7<span>(4)</span>:</label> <input type="text" name="G7_12_note" id="G7-12-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="G1-13-label">G1<span>(1)</span>:</label> <input type="text" name="G1_13_note" id="G1-13-note" ></div>
              <div id="note3"> <label id="G1-14-label">G1<span>(2)</span>:</label> <input type="text" name="G1_14_note" id="G1-14-note" ></div>
              <div id="note3"> <label id="G1-15-label">G1<span>(3)</span>:</label> <input type="text" name="G1_15_note" id="G1-15-note" ></div>
              <div id="note3"> <label id="G1-16-label">G1<span>(4)</span>:</label> <input type="text" name="G1_16_note" id="G1-16-note" ></div>

              <div id="note3"> <label id="G2-13-label">G2<span>(1)</span>:</label> <input type="text" name="G2_13_note" id="G2-13-note" ></div>
              <div id="note3"> <label id="G2-14-label">G2<span>(2)</span>:</label> <input type="text" name="G2_14_note" id="G2-14-note" ></div>
              <div id="note3"> <label id="G2-15-label">G2<span>(3)</span>:</label> <input type="text" name="G2_15_note" id="G2-15-note" ></div>
              <div id="note3"> <label id="G2-16-label">G2<span>(4)</span>:</label> <input type="text" name="G2_16_note" id="G2-16-note" ></div>

              <div id="note3"> <label id="G3-13-label">G3<span>(1)</span>:</label> <input type="text" name="G3_13_note" id="G3-13-note" ></div>
              <div id="note3"> <label id="G3-13-label">G3<span>(2)</span>:</label> <input type="text" name="G3_14_note" id="G3-14-note" ></div>
              <div id="note3"> <label id="G3-15-label">G3<span>(3)</span>:</label> <input type="text" name="G3_15_note" id="G3-15-note" ></div>
              <div id="note3"> <label id="G3-16-label">G3<span>(4)</span>:</label> <input type="text" name="G3_16_note" id="G3-16-note" ></div>

              <div id="note3"> <label id="G4-13-label">G4<span>(1)</span>:</label> <input type="text" name="G4_13_note" id="G4-13-note" ></div>
              <div id="note3"> <label id="G4-14-label">G4<span>(2)</span>:</label> <input type="text" name="G4_14_note" id="G4-14-note" ></div>
              <div id="note3"> <label id="G4-15-label">G4<span>(3)</span>:</label> <input type="text" name="G4_15_note" id="G4-15-note" ></div>
              <div id="note3"> <label id="G4-16-label">G4<span>(4)</span>:</label> <input type="text" name="G4_16_note" id="G4-16-note" ></div>
              
              <div id="note3"> <label id="G5-13-label">G5<span>(1)</span>:</label> <input type="text" name="G5_13_note" id="G5-13-note" ></div>
              <div id="note3"> <label id="G5-14-label">G5<span>(2)</span>:</label> <input type="text" name="G5_14_note" id="G5-14-note" ></div>
              <div id="note3"> <label id="G5-15-label">G5<span>(3)</span>:</label> <input type="text" name="G5_15_note" id="G5-15-note" ></div>
              <div id="note3"> <label id="G5-16-label">G5<span>(4)</span>:</label> <input type="text" name="G5_16_note" id="G5-16-note" ></div>

              <div id="note3"> <label id="G6-13-label">G6<span>(1)</span>:</label> <input type="text" name="G6_13_note" id="G6-13-note" ></div>
              <div id="note3"> <label id="G6-14-label">G6<span>(2)</span>:</label> <input type="text" name="G6_14_note" id="G6-14-note" ></div>
              <div id="note3"> <label id="G6-15-label">G6<span>(3)</span>:</label> <input type="text" name="G6_15_note" id="G6-15-note" ></div>
              <div id="note3"> <label id="G6-16-label">G6<span>(4)</span>:</label> <input type="text" name="G6_16_note" id="G6-16-note" ></div>

              <div id="note3"> <label id="G7-13-label">G7<span>(1)</span>:</label> <input type="text" name="G7_13_note" id="G7-13-note" ></div>
              <div id="note3"> <label id="G7-14-label">G7<span>(2)</span>:</label> <input type="text" name="G7_14_note" id="G7-14-note" ></div>
              <div id="note3"> <label id="G7-15-label">G7<span>(3)</span>:</label> <input type="text" name="G7_15_note" id="G7-15-note" ></div>
              <div id="note3"> <label id="G7-16-label">G7<span>(4)</span>:</label> <input type="text" name="G7_16_note" id="G7-16-note" ></div>
            </td>
          </tr>
          <tr>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              H.&nbsp; Neck and Shoulder Problems:
                <p><span id="Hs2_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Hs2-1" name="Hs2_1" onclick="kfcheckboxChange('Hs2-1', 'Hs2_1')"></span> 1. Lack of mobility-reduced range of movement</p>
                <p><span id="Hs2_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Hs2-2" name="Hs2_2" onclick="kfcheckboxChange('Hs2-2', 'Hs2_2')"></span> 2. Stiffness</p>
                <p><span id="Hs2_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Hs2-3" name="Hs2_3" onclick="kfcheckboxChange('Hs2-3', 'Hs2_3')"></span> 3. Neck pain</p>
                <p><span id="Hs2_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Hs2-4" name="Hs2_4" onclick="kfcheckboxChange('Hs2-4', 'Hs2_4')"></span> 4. Tired, sore, neck muscles</p>
                <p><span id="Hs2_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Hs2-5" name="Hs2_5" onclick="kfcheckboxChange('Hs2-5', 'Hs2_5')"></span> 5. Shoulder aches</p>
                <p><span id="Hs2_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Hs2-6" name="Hs2_6" onclick="kfcheckboxChange('Hs2-6', 'Hs2_6')"></span> 6. Back pain upper and lower</p>
                <p><span id="Hs2_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Hs2-7" name="Hs2_7" onclick="kfcheckboxChange('Hs2-7', 'Hs2_7')"></span> 7. Arm and finger tingling, numbness and or pain</p>
                <p><span id="Hs2_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Hs2-8" name="Hs2_8" onclick="kfcheckboxChange('Hs2-8', 'Hs2_8')"></span> 8. Scoliosis</p>
                <p><span id="Hs2_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="Hs2-9" name="Hs2_9" onclick="kfcheckboxChange('Hs2-9', 'Hs2_9')"></span> 9. Leg length discrepancy</p>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
              <tr>
                  <td style="font-size: 12px;">H1</td>
                  <td>
                    <span id="H1_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H1-1" name="H1_1" onclick="kfcheckboxChange('H1-1', 'H1_1')"> </span>
                  </td>
                  <td>
                    <span id="H1_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H1-2" name="H1_2" onclick="kfcheckboxChange('H1-2', 'H1_2')"> </span>
                  </td>
                  <td>
                    <span id="H1_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H1-3" name="H1_3" onclick="kfcheckboxChange('H1-3', 'H1_3')"> </span>
                  </td>
                  <td>
                    <span id="H1_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H1-4" name="H1_4" onclick="kfcheckboxChange('H1-4', 'H1_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H2</td>
                  <td>
                    <span id="H2_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H2-1" name="H2_1" onclick="kfcheckboxChange('H2-1', 'H2_1')"> </span>
                  </td>
                  <td>
                    <span id="H2_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H2-2" name="H2_2" onclick="kfcheckboxChange('H2-2', 'H2_2')"> </span>
                  </td>
                  <td>
                    <span id="H2_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H2-3" name="H2_3" onclick="kfcheckboxChange('H2-3', 'H2_3')"> </span>
                  </td>
                  <td>
                    <span id="H2_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H2-4" name="H2_4" onclick="kfcheckboxChange('H2-4', 'H2_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H3</td>
                  <td>
                    <span id="H3_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H3-1" name="H3_1" onclick="kfcheckboxChange('H3-1', 'H3_1')"> </span>
                  </td>
                  <td>
                    <span id="H3_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H3-2" name="H3_2" onclick="kfcheckboxChange('H3-2', 'H3_2')"> </span>
                  </td>
                  <td>
                    <span id="H3_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H3-3" name="H3_3" onclick="kfcheckboxChange('H3-3', 'H3_3')"> </span>
                  </td>
                  <td>
                    <span id="H3_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H3-4" name="H3_4" onclick="kfcheckboxChange('H3-4', 'H3_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H4</td>
                  <td>
                    <span id="H4_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H4-1" name="H4_1" onclick="kfcheckboxChange('H4-1', 'H4_1')"> </span>
                  </td>
                  <td>
                    <span id="H4_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H4-2" name="H4_2" onclick="kfcheckboxChange('H4-2', 'H4_2')"> </span>
                  </td>
                  <td>
                    <span id="H4_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H4-3" name="H4_3" onclick="kfcheckboxChange('H4-3', 'H4_3')"> </span>
                  </td>
                  <td>
                    <span id="H4_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H4-4" name="H4_4" onclick="kfcheckboxChange('H4-4', 'H4_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H5</td>
                  <td>
                    <span id="H5_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H5-1" name="H5_1" onclick="kfcheckboxChange('H5-1', 'H5_1')"> </span>
                  </td>
                  <td>
                    <span id="H5_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H5-2" name="H5_2" onclick="kfcheckboxChange('H5-2', 'H5_2')"> </span>
                  </td>
                  <td>
                    <span id="H5_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H5-3" name="H5_3" onclick="kfcheckboxChange('H5-3', 'H5_3')"> </span>
                  </td>
                  <td>
                    <span id="H5_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H5-4" name="H5_4" onclick="kfcheckboxChange('H5-4', 'H5_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H6</td>
                  <td>
                    <span id="H6_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H6-1" name="H6_1" onclick="kfcheckboxChange('H6-1', 'H6_1')"> </span>
                  </td>
                  <td>
                    <span id="H6_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H6-2" name="H6_2" onclick="kfcheckboxChange('H6-2', 'H6_2')"> </span>
                  </td>
                  <td>
                    <span id="H6_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H6-3" name="H6_3" onclick="kfcheckboxChange('H6-3', 'H6_3')"> </span>
                  </td>
                  <td>
                    <span id="H6_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H6-4" name="H6_4" onclick="kfcheckboxChange('H6-4', 'H6_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H7</td>
                  <td>
                    <span id="H7_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H7-1" name="H7_1" onclick="kfcheckboxChange('H7-1', 'H7_1')"> </span>
                  </td>
                  <td>
                    <span id="H7_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H7-2" name="H7_2" onclick="kfcheckboxChange('H7-2', 'H7_2')"> </span>
                  </td>
                  <td>
                    <span id="H7_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H7-3" name="H7_3" onclick="kfcheckboxChange('H7-3', 'H7_3')"> </span>
                  </td>
                  <td>
                    <span id="H7_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H7-4" name="H7_4" onclick="kfcheckboxChange('H7-4', 'H7_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H8</td>
                  <td>
                    <span id="H8_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H8-1" name="H8_1" onclick="kfcheckboxChange('H8-1', 'H8_1')"> </span>
                  </td>
                  <td>
                    <span id="H8_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H8-2" name="H8_2" onclick="kfcheckboxChange('H8-2', 'H8_2')"> </span>
                  </td>
                  <td>
                    <span id="H8_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H8-3" name="H8_3" onclick="kfcheckboxChange('H8-3', 'H8_3')"> </span>
                  </td>
                  <td>
                    <span id="H8_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H8-4" name="H8_4" onclick="kfcheckboxChange('H8-4', 'H8_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H9</td>
                  <td>
                    <span id="H9_1" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H9-1" name="H9_1" onclick="kfcheckboxChange('H9-1', 'H9_1')"> </span>
                  </td>
                  <td>
                    <span id="H9_2" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H9-2" name="H9_2" onclick="kfcheckboxChange('H9-2', 'H9_2')"> </span>
                  </td>
                  <td>
                    <span id="H9_3" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H9-3" name="H9_3" onclick="kfcheckboxChange('H9-3', 'H9_3')"> </span>
                  </td>
                  <td>
                    <span id="H9_4" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H9-4" name="H9_4" onclick="kfcheckboxChange('H9-4', 'H9_4')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
              <tr>
                  <td style="font-size: 12px;">H1</td>
                  <td>
                    <span id="H1_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H1-5" name="H1_5" onclick="kfcheckboxChange('H1-5', 'H1_5')"> </span>
                  </td>
                  <td>
                    <span id="H1_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H1-6" name="H1_6" onclick="kfcheckboxChange('H1-6', 'H1_6')"> </span>
                  </td>
                  <td>
                    <span id="H1_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H1-7" name="H1_7" onclick="kfcheckboxChange('H1-7', 'H1_7')"> </span>
                  </td>
                  <td>
                    <span id="H1_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H1-8" name="H1_8" onclick="kfcheckboxChange('H1-8', 'H1_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H2</td>
                  <td>
                    <span id="H2_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H2-5" name="H2_5" onclick="kfcheckboxChange('H2-5', 'H2_5')"> </span>
                  </td>
                  <td>
                    <span id="H2_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H2-6" name="H2_6" onclick="kfcheckboxChange('H2-6', 'H2_6')"> </span>
                  </td>
                  <td>
                    <span id="H2_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H2-7" name="H2_7" onclick="kfcheckboxChange('H2-7', 'H2_7')"> </span>
                  </td>
                  <td>
                    <span id="H2_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H2-8" name="H2_8" onclick="kfcheckboxChange('H2-8', 'H2_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H3</td>
                  <td>
                    <span id="H3_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H3-5" name="H3_5" onclick="kfcheckboxChange('H3-5', 'H3_5')"> </span>
                  </td>
                  <td>
                    <span id="H3_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H3-6" name="H3_6" onclick="kfcheckboxChange('H3-6', 'H3_6')"> </span>
                  </td>
                  <td>
                    <span id="H3_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H3-7" name="H3_7" onclick="kfcheckboxChange('H3-7', 'H3_7')"> </span>
                  </td>
                  <td>
                    <span id="H3_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H3-8" name="H3_8" onclick="kfcheckboxChange('H3-8', 'H3_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H4</td>
                  <td>
                    <span id="H4_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H4-5" name="H4_5" onclick="kfcheckboxChange('H4-5', 'H4_5')"> </span>
                  </td>
                  <td>
                    <span id="H4_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H4-6" name="H4_6" onclick="kfcheckboxChange('H4-6', 'H4_6')"> </span>
                  </td>
                  <td>
                    <span id="H4_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H4-7" name="H4_7" onclick="kfcheckboxChange('H4-7', 'H4_7')"> </span>
                  </td>
                  <td>
                    <span id="H4_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H4-8" name="H4_8" onclick="kfcheckboxChange('H4-8', 'H4_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H5</td>
                  <td>
                    <span id="H5_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H5-5" name="H5_5" onclick="kfcheckboxChange('H5-5', 'H5_5')"> </span>
                  </td>
                  <td>
                    <span id="H5_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H5-6" name="H5_6" onclick="kfcheckboxChange('H5-6', 'H5_6')"> </span>
                  </td>
                  <td>
                    <span id="H5_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H5-7" name="H5_7" onclick="kfcheckboxChange('H5-7', 'H5_7')"> </span>
                  </td>
                  <td>
                    <span id="H5_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H5-8" name="H5_8" onclick="kfcheckboxChange('H5-8', 'H5_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H6</td>
                  <td>
                    <span id="H6_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H6-5" name="H6_5" onclick="kfcheckboxChange('H6-5', 'H6_5')"> </span>
                  </td>
                  <td>
                    <span id="H6_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H6-6" name="H6_6" onclick="kfcheckboxChange('H6-6', 'H6_6')"> </span>
                  </td>
                  <td>
                    <span id="H6_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H6-7" name="H6_7" onclick="kfcheckboxChange('H6-7', 'H6_7')"> </span>
                  </td>
                  <td>
                    <span id="H6_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H6-8" name="H6_8" onclick="kfcheckboxChange('H6-8', 'H6_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H7</td>
                  <td>
                    <span id="H7_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H7-5" name="H7_5" onclick="kfcheckboxChange('H7-5', 'H7_5')"> </span>
                  </td>
                  <td>
                    <span id="H7_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H7-6" name="H7_6" onclick="kfcheckboxChange('H7-6', 'H7_6')"> </span>
                  </td>
                  <td>
                    <span id="H7_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H7-7" name="H7_7" onclick="kfcheckboxChange('H7-7', 'H7_7')"> </span>
                  </td>
                  <td>
                    <span id="H7_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H7-8" name="H7_8" onclick="kfcheckboxChange('H7-8', 'H7_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H8</td>
                  <td>
                    <span id="H8_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H8-5" name="H8_5" onclick="kfcheckboxChange('H8-5', 'H8_5')"> </span>
                  </td>
                  <td>
                    <span id="H8_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H8-6" name="H8_6" onclick="kfcheckboxChange('H8-6', 'H8_6')"> </span>
                  </td>
                  <td>
                    <span id="H8_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H8-7" name="H8_7" onclick="kfcheckboxChange('H8-7', 'H8_7')"> </span>
                  </td>
                  <td>
                    <span id="H8_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H8-8" name="H8_8" onclick="kfcheckboxChange('H8-8', 'H8_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H9</td>
                  <td>
                    <span id="H9_5" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H9-5" name="H9_5" onclick="kfcheckboxChange('H9-5', 'H9_5')"> </span>
                  </td>
                  <td>
                    <span id="H9_6" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H9-6" name="H9_6" onclick="kfcheckboxChange('H9-6', 'H9_6')"> </span>
                  </td>
                  <td>
                    <span id="H9_7" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H9-7" name="H9_7" onclick="kfcheckboxChange('H9-7', 'H9_7')"> </span>
                  </td>
                  <td>
                    <span id="H9_8" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H9-8" name="H9_8" onclick="kfcheckboxChange('H9-8', 'H9_8')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
              <tr>
                  <td style="font-size: 12px;">H1</td>
                  <td>
                    <span id="H1_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H1-9" name="H1_9" onclick="kfcheckboxChange('H1-9', 'H1_9')"> </span>
                  </td>
                  <td>
                    <span id="H1_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H1-10" name="H1_10" onclick="kfcheckboxChange('H1-10', 'H1_10')"> </span>
                  </td>
                  <td>
                    <span id="H1_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H1-11" name="H1_11" onclick="kfcheckboxChange('H1-11', 'H1_11')"> </span>
                  </td>
                  <td>
                    <span id="H1_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H1-12" name="H1_12" onclick="kfcheckboxChange('H1-12', 'H1_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H2</td>
                  <td>
                    <span id="H2_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H2-9" name="H2_9" onclick="kfcheckboxChange('H2-9', 'H2_9')"> </span>
                  </td>
                  <td>
                    <span id="H2_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H2-10" name="H2_10" onclick="kfcheckboxChange('H2-10', 'H2_10')"> </span>
                  </td>
                  <td>
                    <span id="H2_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H2-11" name="H2_11" onclick="kfcheckboxChange('H2-11', 'H2_11')"> </span>
                  </td>
                  <td>
                    <span id="H2_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H2-12" name="H2_12" onclick="kfcheckboxChange('H2-12', 'H2_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H3</td>
                  <td>
                    <span id="H3_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H3-9" name="H3_9" onclick="kfcheckboxChange('H3-9', 'H3_9')"> </span>
                  </td>
                  <td>
                    <span id="H3_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H3-10" name="H3_10" onclick="kfcheckboxChange('H3-10', 'H3_10')"> </span>
                  </td>
                  <td>
                    <span id="H3_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H3-11" name="H3_11" onclick="kfcheckboxChange('H3-11', 'H3_11')"> </span>
                  </td>
                  <td>
                    <span id="H3_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H3-12" name="H3_12" onclick="kfcheckboxChange('H3-12', 'H3_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H4</td>
                  <td>
                    <span id="H4_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H4-9" name="H4_9" onclick="kfcheckboxChange('H4-9', 'H4_9')"> </span>
                  </td>
                  <td>
                    <span id="H4_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H4-10" name="H4_10" onclick="kfcheckboxChange('H4-10', 'H4_10')"> </span>
                  </td>
                  <td>
                    <span id="H4_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H4-11" name="H4_11" onclick="kfcheckboxChange('H4-11', 'H4_11')"> </span>
                  </td>
                  <td>
                    <span id="H4_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H4-12" name="H4_12" onclick="kfcheckboxChange('H4-12', 'H4_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H5</td>
                  <td>
                    <span id="H5_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H5-9" name="H5_9" onclick="kfcheckboxChange('H5-9', 'H5_9')"> </span>
                  </td>
                  <td>
                    <span id="H5_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H5-10" name="H5_10" onclick="kfcheckboxChange('H5-10', 'H5_10')"> </span>
                  </td>
                  <td>
                    <span id="H5_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H5-11" name="H5_11" onclick="kfcheckboxChange('H5-11', 'H5_11')"> </span>
                  </td>
                  <td>
                    <span id="H5_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H5-12" name="H5_12" onclick="kfcheckboxChange('H5-12', 'H5_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H6</td>
                  <td>
                    <span id="H6_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H6-9" name="H6_9" onclick="kfcheckboxChange('H6-9', 'H6_9')"> </span>
                  </td>
                  <td>
                    <span id="H6_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H6-10" name="H6_10" onclick="kfcheckboxChange('H6-10', 'H6_10')"> </span>
                  </td>
                  <td>
                    <span id="H6_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H6-11" name="H6_11" onclick="kfcheckboxChange('H6-11', 'H6_11')"> </span>
                  </td>
                  <td>
                    <span id="H6_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H6-12" name="H6_12" onclick="kfcheckboxChange('H6-12', 'H6_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H7</td>
                  <td>
                    <span id="H7_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H7-9" name="H7_9" onclick="kfcheckboxChange('H7-9', 'H7_9')"> </span>
                  </td>
                  <td>
                    <span id="H7_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H7-10" name="H7_10" onclick="kfcheckboxChange('H7-10', 'H7_10')"> </span>
                  </td>
                  <td>
                    <span id="H7_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H7-11" name="H7_11" onclick="kfcheckboxChange('H7-11', 'H7_11')"> </span>
                  </td>
                  <td>
                    <span id="H7_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H7-12" name="H7_12" onclick="kfcheckboxChange('H7-12', 'H7_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H8</td>
                  <td>
                    <span id="H8_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H8-9" name="H8_9" onclick="kfcheckboxChange('H8-9', 'H8_9')"> </span>
                  </td>
                  <td>
                    <span id="H8_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H8-10" name="H8_10" onclick="kfcheckboxChange('H8-10', 'H8_10')"> </span>
                  </td>
                  <td>
                    <span id="H8_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H8-11" name="H8_11" onclick="kfcheckboxChange('H8-11', 'H8_11')"> </span>
                  </td>
                  <td>
                    <span id="H8_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H8-12" name="H8_12" onclick="kfcheckboxChange('H8-12', 'H8_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H9</td>
                  <td>
                    <span id="H9_9" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H9-9" name="H9_9" onclick="kfcheckboxChange('H9-9', 'H9_9')"> </span>
                  </td>
                  <td>
                    <span id="H9_10" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H9-10" name="H9_10" onclick="kfcheckboxChange('H9-10', 'H9_10')"> </span>
                  </td>
                  <td>
                    <span id="H9_11" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H9-11" name="H9_11" onclick="kfcheckboxChange('H9-11', 'H9_11')"> </span>
                  </td>
                  <td>
                    <span id="H9_12" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H9-12" name="H9_12" onclick="kfcheckboxChange('H9-12', 'H9_12')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;padding: 5px;">
                <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: ;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                  <td style="font-size: 12px;">H1</td>
                  <td>
                  <span id="H1_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H1-13" name="H1_13" onclick="kfcheckboxChange('H1-13', 'H1_13')"> </span>
                  </td>
                  <td>
                  <span id="H1_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H1-14" name="H1_14" onclick="kfcheckboxChange('H1-14', 'H1_14')"> </span>
                  </td>
                  <td>
                  <span id="H1_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H1-15" name="H1_15" onclick="kfcheckboxChange('H1-15', 'H1_15')"> </span>
                  </td>
                  <td>
                  <span id="H1_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H1-16" name="H1_16" onclick="kfcheckboxChange('H1-16', 'H1_16')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H2</td>
                  <td>
                  <span id="H2_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H2-13" name="H2_13" onclick="kfcheckboxChange('H2-13', 'H2_13')"> </span>
                  </td>
                  <td>
                  <span id="H2_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H2-14" name="H2_14" onclick="kfcheckboxChange('H2-14', 'H2_14')"> </span>
                  </td>
                  <td>
                  <span id="H2_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H2-15" name="H2_15" onclick="kfcheckboxChange('H2-15', 'H2_15')"> </span>
                  </td>
                  <td>
                  <span id="H2_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H2-16" name="H2_16" onclick="kfcheckboxChange('H2-16', 'H2_16')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H3</td>
                  <td>
                  <span id="H3_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H3-13" name="H3_13" onclick="kfcheckboxChange('H3-13', 'H3_13')"> </span>
                  </td>
                  <td>
                  <span id="H3_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H3-14" name="H3_14" onclick="kfcheckboxChange('H3-14', 'H3_14')"> </span>
                  </td>
                  <td>
                  <span id="H3_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H3-15" name="H3_15" onclick="kfcheckboxChange('H3-15', 'H3_15')"> </span>
                  </td>
                  <td>
                  <span id="H3_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H3-16" name="H3_16" onclick="kfcheckboxChange('H3-16', 'H3_16')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H4</td>
                  <td>
                  <span id="H4_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H4-13" name="H4_13" onclick="kfcheckboxChange('H4-13', 'H4_13')"> </span>
                  </td>
                  <td>
                  <span id="H4_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H4-14" name="H4_14" onclick="kfcheckboxChange('H4-14', 'H4_14')"> </span>
                  </td>
                  <td>
                  <span id="H4_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H4-15" name="H4_15" onclick="kfcheckboxChange('H4-15', 'H4_15')"> </span>
                  </td>
                  <td>
                  <span id="H4_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H4-16" name="H4_16" onclick="kfcheckboxChange('H4-16', 'H4_16')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H5</td>
                  <td>
                  <span id="H5_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H5-13" name="H5_13" onclick="kfcheckboxChange('H5-13', 'H5_13')"> </span>
                  </td>
                  <td>
                  <span id="H5_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H5-14" name="H5_14" onclick="kfcheckboxChange('H5-14', 'H5_14')"> </span>
                  </td>
                  <td>
                  <span id="H5_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H5-15" name="H5_15" onclick="kfcheckboxChange('H5-15', 'H5_15')"> </span>
                  </td>
                  <td>
                  <span id="H5_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H5-16" name="H5_16" onclick="kfcheckboxChange('H5-16', 'H5_16')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H6</td>
                  <td>
                  <span id="H6_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H6-13" name="H6_13" onclick="kfcheckboxChange('H6-13', 'H6_13')"> </span>
                  </td>
                  <td>
                  <span id="H6_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H6-14" name="H6_14" onclick="kfcheckboxChange('H6-14', 'H6_14')"> </span>
                  </td>
                  <td>
                  <span id="H6_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H6-15" name="H6_15" onclick="kfcheckboxChange('H6-15', 'H6_15')"> </span>
                  </td>
                  <td>
                  <span id="H6_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H6-16" name="H6_16" onclick="kfcheckboxChange('H6-16', 'H6_16')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H7</td>
                  <td>
                  <span id="H7_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H7-13" name="H7_13" onclick="kfcheckboxChange('H7-13', 'H7_13')"> </span>
                  </td>
                  <td>
                  <span id="H7_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H7-14" name="H7_14" onclick="kfcheckboxChange('H7-14', 'H7_14')"> </span>
                  </td>
                  <td>
                  <span id="H7_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H7-15" name="H7_15" onclick="kfcheckboxChange('H7-15', 'H7_15')"> </span>
                  </td>
                  <td>
                  <span id="H7_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H7-16" name="H7_16" onclick="kfcheckboxChange('H7-16', 'H7_16')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H8</td>
                  <td>
                  <span id="H8_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H8-13" name="H8_13" onclick="kfcheckboxChange('H8-13', 'H8_13')"> </span>
                  </td>
                  <td>
                  <span id="H8_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H8-14" name="H8_14" onclick="kfcheckboxChange('H8-14', 'H8_14')"> </span>
                  </td>
                  <td>
                  <span id="H8_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H8-15" name="H8_15" onclick="kfcheckboxChange('H8-15', 'H8_15')"> </span>
                  </td>
                  <td>
                  <span id="H8_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H8-16" name="H8_16" onclick="kfcheckboxChange('H8-16', 'H8_16')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px;">H9</td>
                  <td>
                  <span id="H9_13" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H9-13" name="H9_13" onclick="kfcheckboxChange('H9-13', 'H9_13')"> </span>
                  </td>
                  <td>
                  <span id="H9_14" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H9-14" name="H9_14" onclick="kfcheckboxChange('H9-14', 'H9_14')"> </span>
                  </td>
                  <td>
                  <span id="H9_15" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H9-15" name="H9_15" onclick="kfcheckboxChange('H9-15', 'H9_15')"> </span>
                  </td>
                  <td>
                  <span id="H9_16" style=""><input type="checkbox" class="kinnie-checkbox" value="false" id="H9-16" name="H9_16" onclick="kfcheckboxChange('H9-16', 'H9_16')"> </span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="width: 15%;border: 1px solid;padding: 5px;vertical-align: top;">
            <div id="note2"> <label id="Hs2-1-label">1:</label> <input type="text" name="Hs2_1_note" id="Hs2-1-note" ></div>
            <div id="note2"> <label id="Hs2-2-label">2:</label> <input type="text" name="Hs2_2_note" id="Hs2-2-note" ></div>
            <div id="note2"> <label id="Hs2-3-label">3:</label> <input type="text" name="Hs2_3_note" id="Hs2-3-note" ></div>
            <div id="note2"> <label id="Hs2-4-label">4:</label> <input type="text" name="Hs2_4_note" id="Hs2-4-note" ></div>
            <div id="note2"> <label id="Hs2-5-label">5:</label> <input type="text" name="Hs2_5_note" id="Hs2-5-note" ></div>
            <div id="note2"> <label id="Hs2-6-label">6:</label> <input type="text" name="Hs2_6_note" id="Hs2-6-note" ></div>
            <div id="note2"> <label id="Hs2-7-label">7:</label> <input type="text" name="Hs2_7_note" id="Hs2-7-note" ></div>
            <div id="note2"> <label id="Hs2-8-label">8:</label> <input type="text" name="Hs2_8_note" id="Hs2-8-note" ></div>
            <div id="note2"> <label id="Hs2-9-label">9:</label> <input type="text" name="Hs2_9_note" id="Hs2-9-note" ></div>

            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="H1-1-label">H1<span>(1)</span>:</label> <input type="text" name="H1_1_note" id="H1-1-note" ></div>
              <div id="note3"> <label id="H1-2-label">H1<span>(2)</span>:</label> <input type="text" name="H1_2_note" id="H1-2-note" ></div>
              <div id="note3"> <label id="H1-3-label">H1<span>(3)</span>:</label> <input type="text" name="H1_3_note" id="H1-3-note" ></div>
              <div id="note3"> <label id="H1-4-label">H1<span>(4)</span>:</label> <input type="text" name="H1_4_note" id="H1-4-note" ></div>

              <div id="note3"> <label id="H2-1-label">H2<span>(1)</span>:</label> <input type="text" name="H2_1_note" id="H2-1-note" ></div>
              <div id="note3"> <label id="H2-2-label">H2<span>(2)</span>:</label> <input type="text" name="H2_2_note" id="H2-2-note" ></div>
              <div id="note3"> <label id="H2-3-label">H2<span>(3)</span>:</label> <input type="text" name="H2_3_note" id="H2-3-note" ></div>
              <div id="note3"> <label id="H2-4-label">H2<span>(4)</span>:</label> <input type="text" name="H2_4_note" id="H2-4-note" ></div>

              <div id="note3"> <label id="H3-1-label">H3<span>(1)</span>:</label> <input type="text" name="H3_1_note" id="H3-1-note" ></div>
              <div id="note3"> <label id="H3-2-label">H3<span>(2)</span>:</label> <input type="text" name="H3_2_note" id="H3-2-note" ></div>
              <div id="note3"> <label id="H3-3-label">H3<span>(3)</span>:</label> <input type="text" name="H3_3_note" id="H3-3-note" ></div>
              <div id="note3"> <label id="H3-4-label">H3<span>(4)</span>:</label> <input type="text" name="H3_4_note" id="H3-4-note" ></div>

              <div id="note3"> <label id="H4-1-label">H4<span>(1)</span>:</label> <input type="text" name="H4_1_note" id="H4-1-note" ></div>
              <div id="note3"> <label id="H4-2-label">H4<span>(2)</span>:</label> <input type="text" name="H4_2_note" id="H4-2-note" ></div>
              <div id="note3"> <label id="H4-3-label">H4<span>(3)</span>:</label> <input type="text" name="H4_3_note" id="H4-3-note" ></div>
              <div id="note3"> <label id="H4-4-label">H4<span>(4)</span>:</label> <input type="text" name="H4_4_note" id="H4-4-note" ></div>
              
              <div id="note3"> <label id="H5-1-label">H5<span>(1)</span>:</label> <input type="text" name="H5_1_note" id="H5-1-note" ></div>
              <div id="note3"> <label id="H5-2-label">H5<span>(2)</span>:</label> <input type="text" name="H5_2_note" id="H5-2-note" ></div>
              <div id="note3"> <label id="H5-3-label">H5<span>(3)</span>:</label> <input type="text" name="H5_3_note" id="H5-3-note" ></div>
              <div id="note3"> <label id="H5-4-label">H5<span>(4)</span>:</label> <input type="text" name="H5_4_note" id="H5-4-note" ></div>

              <div id="note3"> <label id="H6-1-label">H6<span>(1)</span>:</label> <input type="text" name="H6_1_note" id="H6-1-note" ></div>
              <div id="note3"> <label id="H6-2-label">H6<span>(2)</span>:</label> <input type="text" name="H6_2_note" id="H6-2-note" ></div>
              <div id="note3"> <label id="H6-3-label">H6<span>(3)</span>:</label> <input type="text" name="H6_3_note" id="H6-3-note" ></div>
              <div id="note3"> <label id="H6-4-label">H6<span>(4)</span>:</label> <input type="text" name="H6_4_note" id="H6-4-note" ></div>

              <div id="note3"> <label id="H7-1-label">H7<span>(1)</span>:</label> <input type="text" name="H7_1_note" id="H7-1-note" ></div>
              <div id="note3"> <label id="H7-2-label">H7<span>(2)</span>:</label> <input type="text" name="H7_2_note" id="H7-2-note" ></div>
              <div id="note3"> <label id="H7-3-label">H7<span>(3)</span>:</label> <input type="text" name="H7_3_note" id="H7-3-note" ></div>
              <div id="note3"> <label id="H7-4-label">H7<span>(4)</span>:</label> <input type="text" name="H7_4_note" id="H7-4-note" ></div>

              <div id="note3"> <label id="H8-1-label">H8<span>(1)</span>:</label> <input type="text" name="H8_1_note" id="H8-1-note" ></div>
              <div id="note3"> <label id="H8-2-label">H8<span>(2)</span>:</label> <input type="text" name="H8_2_note" id="H8-2-note" ></div>
              <div id="note3"> <label id="H8-3-label">H8<span>(3)</span>:</label> <input type="text" name="H8_3_note" id="H8-3-note" ></div>
              <div id="note3"> <label id="H8-4-label">H8<span>(4)</span>:</label> <input type="text" name="H8_4_note" id="H8-4-note" ></div>

              <div id="note3"> <label id="H9-1-label">H9<span>(1)</span>:</label> <input type="text" name="H9_1_note" id="H9-1-note" ></div>
              <div id="note3"> <label id="H9-2-label">H9<span>(2)</span>:</label> <input type="text" name="H9_2_note" id="H9-2-note" ></div>
              <div id="note3"> <label id="H9-3-label">H9<span>(3)</span>:</label> <input type="text" name="H9_3_note" id="H9-3-note" ></div>
              <div id="note3"> <label id="H9-4-label">H9<span>(4)</span>:</label> <input type="text" name="H9_4_note" id="H9-4-note" ></div>
         
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="H1-5-label">H1<span>(1)</span>:</label> <input type="text" name="H1_5_note" id="H1-5-note" ></div>
              <div id="note3"> <label id="H1-6-label">H1<span>(2)</span>:</label> <input type="text" name="H1_6_note" id="H1-6-note" ></div>
              <div id="note3"> <label id="H1-7-label">H1<span>(3)</span>:</label> <input type="text" name="H1_7_note" id="H1-7-note" ></div>
              <div id="note3"> <label id="H1-8-label">H1<span>(4)</span>:</label> <input type="text" name="H1_8_note" id="H1-8-note" ></div>

              <div id="note3"> <label id="H2-5-label">H2<span>(1)</span>:</label> <input type="text" name="H2_5_note" id="H2-5-note" ></div>
              <div id="note3"> <label id="H2-6-label">H2<span>(2)</span>:</label> <input type="text" name="H2_6_note" id="H2-6-note" ></div>
              <div id="note3"> <label id="H2-7-label">H2<span>(3)</span>:</label> <input type="text" name="H2_7_note" id="H2-7-note" ></div>
              <div id="note3"> <label id="H2-8-label">H2<span>(4)</span>:</label> <input type="text" name="H2_8_note" id="H2-8-note" ></div>

              <div id="note3"> <label id="H3-5-label">H3<span>(1)</span>:</label> <input type="text" name="H3_5_note" id="H3-5-note" ></div>
              <div id="note3"> <label id="H3-6-label">H3<span>(2)</span>:</label> <input type="text" name="H3_6_note" id="H3-6-note" ></div>
              <div id="note3"> <label id="H3-7-label">H3<span>(3)</span>:</label> <input type="text" name="H3_7_note" id="H3-7-note" ></div>
              <div id="note3"> <label id="H3-8-label">H3<span>(4)</span>:</label> <input type="text" name="H3_8_note" id="H3-8-note" ></div>

              <div id="note3"> <label id="H4-5-label">H4<span>(1)</span>:</label> <input type="text" name="H4_5_note" id="H4-5-note" ></div>
              <div id="note3"> <label id="H4-6-label">H4<span>(2)</span>:</label> <input type="text" name="H4_6_note" id="H4-6-note" ></div>
              <div id="note3"> <label id="H4-8-label">H4<span>(3)</span>:</label> <input type="text" name="H4_8_note" id="H4-8-note" ></div>
              <div id="note3"> <label id="H4-7-label">H4<span>(4)</span>:</label> <input type="text" name="H4_7_note" id="H4-7-note" ></div>
              
              <div id="note3"> <label id="H5-5-label">H5<span>(1)</span>:</label> <input type="text" name="H5_5_note" id="H5-5-note" ></div>
              <div id="note3"> <label id="H5-6-label">H5<span>(2)</span>:</label> <input type="text" name="H5_6_note" id="H5-6-note" ></div>
              <div id="note3"> <label id="H5-7-label">H5<span>(3)</span>:</label> <input type="text" name="H5_7_note" id="H5-7-note" ></div>
              <div id="note3"> <label id="H5-8-label">H5<span>(4)</span>:</label> <input type="text" name="H5_8_note" id="H5-8-note" ></div>

              <div id="note3"> <label id="H6-5-label">H6<span>(1)</span>:</label> <input type="text" name="H6_5_note" id="H6-5-note" ></div>
              <div id="note3"> <label id="H6-6-label">H6<span>(2)</span>:</label> <input type="text" name="H6_6_note" id="H6-6-note" ></div>
              <div id="note3"> <label id="H6-7-label">H6<span>(3)</span>:</label> <input type="text" name="H6_7_note" id="H6-7-note" ></div>
              <div id="note3"> <label id="H6-8-label">H6<span>(4)</span>:</label> <input type="text" name="H6_8_note" id="H6-8-note" ></div>

              <div id="note3"> <label id="H7-5-label">H7<span>(1)</span>:</label> <input type="text" name="H7_5_note" id="H7-5-note" ></div>
              <div id="note3"> <label id="H7-6-label">H7<span>(2)</span>:</label> <input type="text" name="H7_6_note" id="H7-6-note" ></div>
              <div id="note3"> <label id="H7-7-label">H7<span>(3)</span>:</label> <input type="text" name="H7_7_note" id="H7-7-note" ></div>
              <div id="note3"> <label id="H7-8-label">H7<span>(4)</span>:</label> <input type="text" name="H7_8_note" id="H7-8-note" ></div>

              <div id="note3"> <label id="H8-5-label">H8<span>(1)</span>:</label> <input type="text" name="H8_5_note" id="H8-5-note" ></div>
              <div id="note3"> <label id="H8-6-label">H8<span>(2)</span>:</label> <input type="text" name="H8_6_note" id="H8-6-note" ></div>
              <div id="note3"> <label id="H8-7-label">H8<span>(3)</span>:</label> <input type="text" name="H8_7_note" id="H8-7-note" ></div>
              <div id="note3"> <label id="H8-8-label">H8<span>(4)</span>:</label> <input type="text" name="H8_8_note" id="H8-8-note" ></div>

              <div id="note3"> <label id="H9-5-label">H9<span>(1)</span>:</label> <input type="text" name="H9_5_note" id="H9-5-note" ></div>
              <div id="note3"> <label id="H9-6-label">H9<span>(2)</span>:</label> <input type="text" name="H9_6_note" id="H9-6-note" ></div>
              <div id="note3"> <label id="H9-7-label">H9<span>(3)</span>:</label> <input type="text" name="H9_7_note" id="H9-7-note" ></div>
              <div id="note3"> <label id="H9-8-label">H9<span>(4)</span>:</label> <input type="text" name="H9_8_note" id="H9-8-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="H1-9-label">H1<span>(1)</span>:</label> <input type="text" name="H1_9_note" id="H1-9-note" ></div>
              <div id="note3"> <label id="H1-10-label">H1<span>(2)</span>:</label> <input type="text" name="H1_10_note" id="H1-10-note" ></div>
              <div id="note3"> <label id="H1-11-label">H1<span>(3)</span>:</label> <input type="text" name="H1_11_note" id="H1-11-note" ></div>
              <div id="note3"> <label id="H1-12-label">H1<span>(4)</span>:</label> <input type="text" name="H1_12_note" id="H1-12-note" ></div>

              <div id="note3"> <label id="H2-9-label">H2<span>(1)</span>:</label> <input type="text" name="H2_9_note" id="H2-9-note" ></div>
              <div id="note3"> <label id="H2-10-label">H2<span>(2)</span>:</label> <input type="text" name="H2_10_note" id="H2-10-note" ></div>
              <div id="note3"> <label id="H2-11-label">H2<span>(3)</span>:</label> <input type="text" name="H2_11_note" id="H2-11-note" ></div>
              <div id="note3"> <label id="H2-12-label">H2<span>(4)</span>:</label> <input type="text" name="H2_12_note" id="H2-12-note" ></div>

              <div id="note3"> <label id="H3-9-label">H3<span>(1)</span>:</label> <input type="text" name="H3_9_note" id="H3-9-note" ></div>
              <div id="note3"> <label id="H3-10-label">H3<span>(2)</span>:</label> <input type="text" name="H3_10_note" id="H3-10-note" ></div>
              <div id="note3"> <label id="H3-11-label">H3<span>(3)</span>:</label> <input type="text" name="H3_11_note" id="H3-11-note" ></div>
              <div id="note3"> <label id="H3-12-label">H3<span>(4)</span>:</label> <input type="text" name="H3_12_note" id="H3-12-note" ></div>

              <div id="note3"> <label id="H4-9-label">H4<span>(1)</span>:</label> <input type="text" name="H4_9_note" id="H4-9-note" ></div>
              <div id="note3"> <label id="H4-10-label">H4<span>(2)</span>:</label> <input type="text" name="H4_10_note" id="H4-10-note" ></div>
              <div id="note3"> <label id="H4-11-label">H4<span>(3)</span>:</label> <input type="text" name="H4_11_note" id="H4-11-note" ></div>
              <div id="note3"> <label id="H4-12-label">H4<span>(4)</span>:</label> <input type="text" name="H4_12_note" id="H4-12-note" ></div>
              
              <div id="note3"> <label id="H5-9-label">H5<span>(1)</span>:</label> <input type="text" name="H5_9_note" id="H5-9-note" ></div>
              <div id="note3"> <label id="H5-10-label">H5<span>(2)</span>:</label> <input type="text" name="H5_10_note" id="H5-10-note" ></div>
              <div id="note3"> <label id="H5-11-label">H5<span>(3)</span>:</label> <input type="text" name="H5_11_note" id="H5-11-note" ></div>
              <div id="note3"> <label id="H5-12-label">H5<span>(4)</span>:</label> <input type="text" name="H5_12_note" id="H5-12-note" ></div>

              <div id="note3"> <label id="H6-9-label">H6<span>(1)</span>:</label> <input type="text" name="H6_9_note" id="H6-9-note" ></div>
              <div id="note3"> <label id="H6-10-label">H6<span>(2)</span>:</label> <input type="text" name="H6_10_note" id="H6-10-note" ></div>
              <div id="note3"> <label id="H6-11-label">H6<span>(3)</span>:</label> <input type="text" name="H6_11_note" id="H6-11-note" ></div>
              <div id="note3"> <label id="H6-12-label">H6<span>(4)</span>:</label> <input type="text" name="H6_12_note" id="H6-12-note" ></div>

              <div id="note3"> <label id="H7-9-label">H7<span>(1)</span>:</label> <input type="text" name="H7_9_note" id="H7-9-note" ></div>
              <div id="note3"> <label id="H7-10-label">H7<span>(2)</span>:</label> <input type="text" name="H7_10_note" id="H7-10-note" ></div>
              <div id="note3"> <label id="H7-11-label">H7<span>(3)</span>:</label> <input type="text" name="H7_11_note" id="H7-11-note" ></div>
              <div id="note3"> <label id="H7-12-label">H7<span>(4)</span>:</label> <input type="text" name="H7_12_note" id="H7-12-note" ></div>

              <div id="note3"> <label id="H8-9-label">H8<span>(1)</span>:</label> <input type="text" name="H8_9_note" id="H8-9-note" ></div>
              <div id="note3"> <label id="H8-10-label">H8<span>(2)</span>:</label> <input type="text" name="H8_10_note" id="H8-10-note" ></div>
              <div id="note3"> <label id="H8-11-label">H8<span>(3)</span>:</label> <input type="text" name="H8_11_note" id="H8-11-note" ></div>
              <div id="note3"> <label id="H8-12-label">H8<span>(4)</span>:</label> <input type="text" name="H8_12_note" id="H8-12-note" ></div>

              <div id="note3"> <label id="H9-9-label">H9<span>(1)</span>:</label> <input type="text" name="H9_9_note" id="H9-9-note" ></div>
              <div id="note3"> <label id="H9-10-label">H9<span>(2)</span>:</label> <input type="text" name="H9_10_note" id="H9-10-note" ></div>
              <div id="note3"> <label id="H9-11-label">H9<span>(3)</span>:</label> <input type="text" name="H9_11_note" id="H9-11-note" ></div>
              <div id="note3"> <label id="H9-12-label">H9<span>(4)</span>:</label> <input type="text" name="H9_12_note" id="H9-12-note" ></div>
            </td>
            <td style="width: 15%;border: 1px solid;vertical-align: top;">
              <div id="note3"> <label id="H1-13-label">H1<span>(1)</span>:</label> <input type="text" name="H1_13_note" id="H1-13-note" ></div>
              <div id="note3"> <label id="H1-14-label">H1<span>(2)</span>:</label> <input type="text" name="H1_14_note" id="H1-14-note" ></div>
              <div id="note3"> <label id="H1-15-label">H1<span>(3)</span>:</label> <input type="text" name="H1_15_note" id="H1-15-note" ></div>
              <div id="note3"> <label id="H1-16-label">H1<span>(4)</span>:</label> <input type="text" name="H1_16_note" id="H1-16-note" ></div>

              <div id="note3"> <label id="H2-13-label">H2<span>(1)</span>:</label> <input type="text" name="H2_13_note" id="H2-13-note" ></div>
              <div id="note3"> <label id="H2-14-label">H2<span>(2)</span>:</label> <input type="text" name="H2_14_note" id="H2-14-note" ></div>
              <div id="note3"> <label id="H2-15-label">H2<span>(3)</span>:</label> <input type="text" name="H2_15_note" id="H2-15-note" ></div>
              <div id="note3"> <label id="H2-16-label">H2<span>(4)</span>:</label> <input type="text" name="H2_16_note" id="H2-16-note" ></div>

              <div id="note3"> <label id="H3-13-label">H3<span>(1)</span>:</label> <input type="text" name="H3_13_note" id="H3-13-note" ></div>
              <div id="note3"> <label id="H3-13-label">H3<span>(2)</span>:</label> <input type="text" name="H3_14_note" id="H3-14-note" ></div>
              <div id="note3"> <label id="H3-15-label">H3<span>(3)</span>:</label> <input type="text" name="H3_15_note" id="H3-15-note" ></div>
              <div id="note3"> <label id="H3-16-label">H3<span>(4)</span>:</label> <input type="text" name="H3_16_note" id="H3-16-note" ></div>

              <div id="note3"> <label id="H4-13-label">H4<span>(1)</span>:</label> <input type="text" name="H4_13_note" id="H4-13-note" ></div>
              <div id="note3"> <label id="H4-14-label">H4<span>(2)</span>:</label> <input type="text" name="H4_14_note" id="H4-14-note" ></div>
              <div id="note3"> <label id="H4-15-label">H4<span>(3)</span>:</label> <input type="text" name="H4_15_note" id="H4-15-note" ></div>
              <div id="note3"> <label id="H4-16-label">H4<span>(4)</span>:</label> <input type="text" name="H4_16_note" id="H4-16-note" ></div>
              
              <div id="note3"> <label id="H5-13-label">H5<span>(1)</span>:</label> <input type="text" name="H5_13_note" id="H5-13-note" ></div>
              <div id="note3"> <label id="H5-14-label">H5<span>(2)</span>:</label> <input type="text" name="H5_14_note" id="H5-14-note" ></div>
              <div id="note3"> <label id="H5-15-label">H5<span>(3)</span>:</label> <input type="text" name="H5_15_note" id="H5-15-note" ></div>
              <div id="note3"> <label id="H5-16-label">H5<span>(4)</span>:</label> <input type="text" name="H5_16_note" id="H5-16-note" ></div>

              <div id="note3"> <label id="H6-13-label">H6<span>(1)</span>:</label> <input type="text" name="H6_13_note" id="H6-13-note" ></div>
              <div id="note3"> <label id="H6-14-label">H6<span>(2)</span>:</label> <input type="text" name="H6_14_note" id="H6-14-note" ></div>
              <div id="note3"> <label id="H6-15-label">H6<span>(3)</span>:</label> <input type="text" name="H6_15_note" id="H6-15-note" ></div>
              <div id="note3"> <label id="H6-16-label">H6<span>(4)</span>:</label> <input type="text" name="H6_16_note" id="H6-16-note" ></div>

              <div id="note3"> <label id="H7-13-label">H7<span>(1)</span>:</label> <input type="text" name="H7_13_note" id="H7-13-note" ></div>
              <div id="note3"> <label id="H7-14-label">H7<span>(2)</span>:</label> <input type="text" name="H7_14_note" id="H7-14-note" ></div>
              <div id="note3"> <label id="H7-15-label">H7<span>(3)</span>:</label> <input type="text" name="H7_15_note" id="H7-15-note" ></div>
              <div id="note3"> <label id="H7-16-label">H7<span>(4)</span>:</label> <input type="text" name="H7_16_note" id="H7-16-note" ></div>

              <div id="note3"> <label id="H8-13-label">H8<span>(1)</span>:</label> <input type="text" name="H8_13_note" id="H8-13-note" ></div>
              <div id="note3"> <label id="H8-14-label">H8<span>(2)</span>:</label> <input type="text" name="H8_14_note" id="H8-14-note" ></div>
              <div id="note3"> <label id="H8-15-label">H8<span>(3)</span>:</label> <input type="text" name="H8_15_note" id="H8-15-note" ></div>
              <div id="note3"> <label id="H8-16-label">H8<span>(4)</span>:</label> <input type="text" name="H8_16_note" id="H8-16-note" ></div>

              <div id="note3"> <label id="H9-13-label">H9<span>(1)</span>:</label> <input type="text" name="H9_13_note" id="H9-13-note" ></div>
              <div id="note3"> <label id="H9-14-label">H9<span>(2)</span>:</label> <input type="text" name="H9_14_note" id="H9-14-note" ></div>
              <div id="note3"> <label id="H9-15-label">H9<span>(3)</span>:</label> <input type="text" name="H9_15_note" id="H9-15-note" ></div>
              <div id="note3"> <label id="H9-16-label">H9<span>(4)</span>:</label> <input type="text" name="H9_16_note" id="H9-16-note" ></div>
            </td>
          </tr>
        </table>
        </div>
         


      <div style="page-break-before: always"></div>
      <div class="sign-area body" style="display: none;">
        <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('kinnie-body')">rate_review</i>
      </div>
      @if($data->consentDataKinnieBodyImage == 'assets/files/kinnie-funt-drawing/body-draw-portrait.jpg')
        <div id="the-body start" class="sign-area body signature body-draw start" style="top: 35p;text-align: center;margin: 18px auto 0 auto;height: 684px;background-image: url('{{$data->consentDataKinnieBodyImage}}');background-repeat: no-repeat;background-size: contain;position:relative;background-position: center;">
          <div id="" class="" style="top: 35p;text-align: center;margin: 18px auto 0 auto;height: 655px;background-image: url('https://sagundentalclinic.com/assets/files/kinnie-funt-drawing/body-draw-portrait.jpg');background-repeat: no-repeat;background-size: contain;position:relative;background-position: center;">
          </div>
      </div>
     
      @else 
      <div id="" class="" style="top: 35p;text-align: center;margin: 18px auto 0 auto;height: 684px;background-image: url('/{{$data->consentDataKinnieBodyImage}}');background-repeat: no-repeat;background-size: contain;position:relative;background-position: center;">
      <div id="" class="sign-area body signature body-draw" style="top: 35p;text-align: center;margin: 18px auto 0 auto;height: 655px;background-image: url('{{$data->consentDataKinnieBodyImage}}');background-repeat: no-repeat;background-size: contain;position:relative;background-position: center;"></div>
    </div>

      @endif
          @endforeach








                
                
                
          

          </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('kinnie-funt')">Save</button>
      </div>
    </div>
  </div>

    <!-- Modal -->
    <div id="modal-patient-signature" class="modal">
    <div class="modal-content">
      <div class="container">
        <div class="row">
              <div class="wrapper mb-5 signature">
                <p></p>
              </div>
          </div>
        </div>
    </div>
  </div>


    <!-- Modal -->
    <div id="modal-remove-patient-record" class="modal">
    <div class="modal-content">
      <div class="container">
        <div class="row">
              <div class="wrapper mb-5 signature">
                     <h4>Are you sure you want to remove this patient record?</h4>
              </div>
          </div>
          <div class="modal-footer">
          <button class="btn waves-effect waves-light right submit" type="submit" id="submit-remove-patient-record" name="action" onclick="">Remove
          </button>
        </div>
        </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="modal-modify-procedure" class="modal">
    <div class="modal-content">
      <div class="container">
        <div class="row">
              <div class="wrapper mb-5 signature">
                     <h4>What action do you want to do?</h4>
              </div>
          </div>
          <div class="modal-footer">
          <button class="btn waves-effect waves-light submit mr-2" type="submit" id="submit-remove-procedure" name="action" onclick="">Remove
          </button>
          <button class="btn waves-effect waves-light right submit" type="submit" id="submit-edit-procedure" name="action" onclick="">Edit
          </button>
         
        </div>
        </div>
    </div>
  </div>

  
  <!-- Modal -->
  <div id="modal-modify-installment" class="modal">
    <div class="modal-content">
      <div class="container">
        <div class="row">
              <div class="wrapper mb-5 signature">
                     <h4>What action do you want to do?</h4>
              </div>
          </div>
            <form class="row" id="edit-installment-record-form">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <input type="hidden" name="installment_id" id="installment_id" value="" />
            <div class="modal-footer">
            <a class="btn waves-effect waves-light submit mr-2" type="submit" id="submit-remove-installment" name="action" onclick="removeInstallment()">Remove Installment
          </a>
            <a class="btn waves-effect waves-light right submit" type="submit" id="submit-edit-installment" name="action" onclick="editInstallment()">Edit Installment
          </a>
            </form>
        </div>
        </div>
    </div>
  </div>


   <!-- Modal -->
  <div id="modal-modify-installment-record" class="modal">
    <div class="modal-content">
      <div class="container">
        <div class="row">
              <div class="wrapper mb-5 signature">
                <h5 class="title-installment-record">Editing</h5>
                  <form class="row" id="modify-installment-record-form">
                    @csrf
                    <input type="hidden" name="edit_installment_record_id" id="edit_installment_record_id" value="" />
                      <div class="col s12">
                        <div class="input-field col m6 s12">
                        <input type="text" class="datepicker" name="edit-date-installment-record" id="edit-datepicker-installment-record" value="<?php echo date('m/d/Y'); ?>" required >
                          <label for="last_name" id="label-modify-install-record-date" class="active">Date</label>
                        </div>
                      </div>
                      <div class="col s12">
                        <div class="input-field col m6 s12">
                            <input type="text" name="modify-paid" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" class="modify-paid">
                            <label for="currency-field" id="label-modify-install-record-paid">Paid</label>
                        </div>
                      </div>
                  <button class="btn waves-effect waves-light right submit" id="submit-edit-patient-installment-record" onclick="saveModifyInstallmentRecord()" name="action">Save
                  </button>
              </form>
              </div>
          </div>
        </div>
        </div>
    </div>
  </div>



    <!-- Modal -->
  <div id="modal-edit-installment" class="modal">
    <div class="modal-content">
      <div class="container">
        <div class="row">
              <div class="wrapper mb-5 signature">
                  <form class="row" id="editing-installment-form">
                    @csrf
                    <input type="hidden" name="edit_installment_patient_id" id="edit_installment_patient_id" value="" />
                      <div class="col s12">
                        <div class="input-field col m6 s12">
                        <input type="text" class="datepicker" name="edit-date" id="edit-datepicker" value="" required >
                          <label for="last_name" id="label-install-date" class="active">Date</label>
                        </div>
                      </div>
                      <div class="col s12">
                        <div class="input-field col m6 s12">
                            <input type="text" name="edit-amount-install" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" class="edit-amount-install">
                            <label for="currency-field" id="label-install-amount">Amount</label>
                        </div>
                      </div>
                        <div class="col s12">
                        <div class="input-field col m6 s12">
                            <input type="text" name="edit-note-install" id="edit-note-install" class="note-install">
                            <label for="currency-field" id="label-install-note">Note</label>
                        </div>
                      </div>
                  <button class="btn waves-effect waves-light right submit" type="submit" id="submit-edit-patient-installment-record" onclick="saveEditInstallment()" name="action">Save
                  </button>
              </form>
              </div>
          </div>
        </div>
        </div>
    </div>
  </div>



     <!-- Modal -->
  <div id="modal-add-installment-record" class="modal">
    <div class="modal-content">
      <div class="container">
        <div class="row">
              <div class="wrapper mb-5 signature">
                <h5 class="title-installment-record"></h5>
                  <form class="row" id="editing-installment-record-form">
                    @csrf
                    <input type="hidden" name="edit_installment_id" id="edit_installment_id" value="" />
                      <div class="col s12">
                        <div class="input-field col m6 s12">
                        <input type="text" class="datepicker" name="edit-date-record" id="edit-datepicker" value="<?php echo date('m/d/Y'); ?>" required >
                          <label for="last_name" id="label-install-record-date" class="active">Date</label>
                        </div>
                      </div>
                      <div class="col s12">
                        <div class="input-field col m6 s12">
                            <input type="text" name="edit-paid" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" class="edit-paid">
                            <label for="currency-field" id="label-install-record-paid">Paid</label>
                        </div>
                      </div>
                  <button class="btn waves-effect waves-light right submit" id="submit-edit-patient-installment-record" onclick="saveNewInstallmentRecord()" name="action">Save
                  </button>
              </form>
              </div>
          </div>
        </div>
        </div>
    </div>
  </div>




  <!-- Modal -->
  <div id="modal-edit-treatment-record" class="modal modal-fixed-footer">
          <div class="modal-content">
            <div class="col s12 m6">
              <h4>Editing treatment record</h4>
            </div>
            <form class="row" id="edit-treatment-record-form">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <input type="hidden" name="drawingLink" id="drawing_link" value="" />
              <input type="hidden" name="patient_id" id="patient_id" value="" />
              <input type="hidden" name="section" id="section" value="" />
                <div class="col s12">
                  <div class="input-field col s12">
                  <input type="text" class="datepicker" name="date" id="edit-date" required disabled>
                    <label for="last_name" class="active">Date</label>
                  </div>
                </div>
                <div class="col s12">
                  <div class="input-field col m12 s12">
                    <textarea id="edit-procedure" name="procedure" class="materialize-textarea" data-length="120"></textarea>
                    <label for="textarea1" class="active">Procedure</label>
                  </div>
                </div>
                  <div class="col s12">
                  <div class="input-field col m12 s12">
                    <textarea id="edit-tooth-no" name="toothNo" class="materialize-textarea" data-length="120"></textarea>
                    <label for="textarea1" class="active">tooth No</label>
                  </div>
                </div>
                  <div class="col s12">
                  <div class="input-field col m11 s11">
                    <input type="text" class="datepicker" name="recallDate" id="edit-recall-date"  >
                    <label for="textarea1" class="active">Recall Date</label>
                  </div>
                   <div class="col m1 s1">
                  <span onclick="eraseRecallDate()" style="color: #a28e85;margin-top: 23px;display: block;">Clear</span>
                  </div>
                </div>
                  <div class="col s12">
                  <div class="input-field col m12 s12">
                    <textarea id="edit-recall-note" name="recallNote" class="materialize-textarea" data-length="120"></textarea>
                    <label for="textarea1" class="active">Recall Note</label>
                  </div>
                </div>

                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-charged" id="edit-amount-charged" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency">
                      <label for="currency" class="active">Amount Charged</label>
                  </div>
                </div>
                <!-- <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-paid" id="edit-amount-paid" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                      <label for="currency" class="active">Amount Paid</label>
                  </div>
                </div> -->
                <div class="col s12">
                  <div class="input-field col m4 s12">
                    <input type="text" name="amount-paid" id="edit-amount-paid" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                    <label for="currency" class="active">Amount Paid</label>
                  </div>
                  <div class="input-field col m4 s12">
                      <select class="browser-default" name="payment_type" id="edit-payment-type">
                        <option value="cash">Cash</option>
                        <option value="gcash">Gcash</option>
                        <option value="debit">Debit</option>
                        <option value="credit">Credit Card</option>
                        <option value="cheque">Cheque</option>
                        <option value="bank_transfer">Bank Transfer</option>
                      </select>
                      <label for="currency">Payment Type</label>
                  </div>
                  <div class="input-field col m12 s12">
                      <input type="text" name="amount-paid-note[]" id="edit-amount-paid-note">
                      <label for="currency">Note</label>
                  </div>
                </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="balance" id="edit-balance" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                      <label for="currency" class="active">Balance</label>
                  </div>
                </div>
              
              </div>
              <div class="modal-footer">
                  <button class="btn waves-effect waves-light right submit" type="button" id="submit-edit-patient-treatment-record" name="action">save
                  </button>
                </div>
              </form>
        </div>
   </div>

  <!-- Modal -->
  <div id="modal-edit-file" class="modal ">
      <div class="modal-content">
        <div class="col s8 m6">
          <h4>Editing file</h4>
        </div>
        <form class="row" id="edit-file-form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="col s12">
              <div class="input-field col m8 s12">
                <textarea id="edit-file-name" name="name" class="materialize-textarea" data-length="120"></textarea>
                <label for="textarea1" class="active">File Name</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
              <button class="btn waves-effect waves-light right submit" type="button" id="submit-edit-patient-file" name="action">save
              </button>
            </div>
          </form>
      </div>
   </div>

   <!-- Modal -->
   <div id="modal-remove-consent" class="modal sm">
    <div class="modal-content">
    <h4>Remove consent</h4>
      <p>Are you sure you want to remove consent?</p>
      <div class="container">
        <div class="row">
              <div class="wrapper mb-5 signature">
                <p></p>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn waves-effect waves-light right submit" type="submit" id="submit-remove-consent" name="action" onclick="">Remove
          </button>
        </div>
    </div>
  </div>
   <!-- Modal -->
   <div id="modal-remove-file" class="modal sm">
    <div class="modal-content">
    <h4>Remove file</h4>
      <p>Are you sure you want to remove file?</p>
      <div class="container">
        <div class="row">
              <div class="wrapper mb-5 signature">
                <p></p>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn waves-effect waves-light right submit" type="submit" id="submit-remove-file" name="action" onclick="">Remove
          </button>
        </div>
    </div>
  </div>

  <!-- Modal  -->
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

<script type="text/javascript">



  $("input").change(function() {
    ChkBxMsgId = $(this).attr('id');
    var val = document.getElementById(ChkBxMsgId).value;
     document.getElementById("selected-color").value = val;
    });



    
  
const polygonsArray = document.querySelectorAll('polygon');
for (const polygon of polygonsArray) {
  polygon.onclick = event => {
    console.log(event.currentTarget.className);
    var color_selected = document.getElementById("selected-color").value;

     event.currentTarget.removeAttribute('class');
     event.currentTarget.removeAttribute('class');
     event.currentTarget.removeAttribute('class');
     event.currentTarget.removeAttribute('class');

    event.currentTarget.classList.toggle('polygon');
    event.currentTarget.classList.toggle('unmarked');
    event.currentTarget.classList.toggle('marked-'+color_selected);
   
  };
}
var canvas = document.getElementById('signature-pad');
function resizeCanvas() {
    var ratio =  Math.max(window.devicePixelRatio || 1, 1);
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
    
}
function newWindow(){
  $("#signature-pad").attr("width", "500");
  $("#signature-pad").attr("height", "300");
}
 window.onresize = resizeCanvas;
  resizeCanvas();
  var signaturePad = new SignaturePad(canvas, {
    backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
  });

document.getElementById('drawing-save-png').addEventListener('click', function () {
  if (signaturePad.isEmpty()) {
    return alert("Please provide a signature first.");
  }
  var data = signaturePad.toDataURL('image/png');
  $('#modal-drawing-area').modal('close');
  $(".drawing-section").html('<img class="drawing-img" src="'+data+'" style="width: 100%;">');
  $(".drawing-section").css("background", "white");
  document.getElementById("drawing_link").value = data;
  console.log(data);
});
document.getElementById('drawing-save-png-main').addEventListener('click', function () {
  if (signaturePad.isEmpty()) {
    return alert("Please provide a signature first.");
  }
  var data = signaturePad.toDataURL('image/png');
  $('#modal-drawing-area').modal('close');
  $(".drawing-section-main").html('<img class="drawing-img" src="'+data+'" style="width: 100%;">');
  $(".drawing-section-main").css("background", "white");
  document.getElementById("drawing_link").value = data;
  console.log(data);
});
document.getElementById('clear').addEventListener('click', function () {
  signaturePad.clear();
  var head =  $( this ).hasClass( "head-background" );
  var body =  $( this ).hasClass( "body-background" );
  var sentence =  $( this ).hasClass( "sentence-background" );
  var teeth =  $( this ).hasClass( "teeth-background" );
  console.log(head);
  console.log(body);
  console.log(teeth);
  if(head == true) {
    signConsent('kinnie');
  }
  if(body == true) {
    signConsent('kinnie-body');
  }
  if(sentence == true) {
    signConsent('kinnie-sentence');
  }
  if(teeth == true) {
    signConsent('teeth');
  }
});
function clearPad() {
  signaturePad.clear();
}
</script>
</body>
</html>
    </div>
  </div>

@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/js/dataTables.select.min.js')}}"></script>

@endsection

{{-- page script --}}
@section('page-script')
<script src="{{asset('js/scripts/data-tables.js')}}"></script>
<script src="{{asset('js/scripts/advance-ui-modals.js')}}"></script>
@endsection

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
  $( ".close-warning" ).click(function() {
    $('#modal-view-warning').css('display', 'none');
  });

  $("input").change(function() {
    ChkBxMsgId = $(this).attr('id');
    var val = document.getElementById(ChkBxMsgId).value;
   console.log( ChkBxMsgId +" - "+ val);
   document.getElementById(ChkBxMsgId).setAttribute("value", val);


  //  if( ChkBxMsgId == 'currency-field amount-paid1 input-trigger' ) {
  //   const paid = 0;
  //    paid = document.getElementById("amount-paid1").value;
  //   const charge = 0;
  //    charge = document.getElementById("amount-charge1").value;
  //   const compute = charge - paid;
  //  }
  

  //  const elements = document.getElementsByClassName("my-class");
  //   if (elements.length > 0) {
  //       const firstElementValue = elements[0].value; 
  //       console.log(firstElementValue);
  //   }



});


  $('#modal-kinnie-funt .wrapper').find('input, select').each(function() {
   });
  $("body").addClass("patient-profile-page");
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
  document.getElementsByTagName("canvas")[0].removeAttribute("width");
  $(".drawing canvas").attr("width", "600");
  $(".drawing canvas").attr("height", "300");

  
  $( "#add-draw" ).click(function() {
    $("#drawing-save-png-main").css('display', 'inline');
    $("#drawing-save-png").css('display', 'none');
    document.getElementsByTagName("canvas")[0].removeAttribute("width");
    $(".drawing canvas").attr("width", "600");
    $(".drawing canvas").attr("height", "400");
    $(".signature-pad").css('height', '400px');
  $("#modal-drawing-area .buttons #drawing-save-png").removeAttr('onclick');
});

 let myParamTreat = window.location.href;
  if(myParamTreat.includes("html-badges") == true) {
    setTimeout(function(){ 
       var str= window.location.href;
        var newStr = str.substring(0, str.length - 13);
        window.history.replaceState(null, null, newStr);
       }, 1000);
  }

  var room = 1;
  var pathArray = window.location.pathname.split('/');
  document.getElementById("patient_id").value = pathArray[2];
  document.getElementById("file_upload_patient_id").value = pathArray[2];
  document.getElementById("installment_patient_id").value = pathArray[2];
  // document.getElementById("picture_upload_patient_id").value = pathArray[2];
  
  var myParam = location.search.split('upload_status=')[1];
  if(myParam == 1) {
    $(".card-alert.card.green").removeClass("hide");
      $(".card-alert.card.green p").html("File suceessfully uploaded!");
      setTimeout(function(){ 
      $(".card-alert.card.green").addClass("hide");
      const url = new URL(window.location.href);
      url.searchParams.delete('upload_status');
      window.history.replaceState(null, null, url); // or pushState
       }, 3000);
  }

 

  var myParamPic = location.search.split('upload_pic_status=')[1];
  if(myParamPic == 1) {
    $(".card-alert.card.green").removeClass("hide");
      $(".card-alert.card.green p").html("Profile picture suceessfully uploaded!");
      setTimeout(function(){ 
      $(".card-alert.card.green").addClass("hide");
      const url = new URL(window.location.href);
      url.searchParams.delete('upload_pic_status');
      window.history.replaceState(null, null, url); // or pushState
       }, 3000);
  }


$( "#delete-treatment-record" ).click(function() {
  $(".del-treatment-record").removeClass("d-none");

  });
  
  $( ".click-upload" ).click(function() {
    $(".picture-upload").removeClass('d-none');
    $(".click-upload").addClass('d-none');
  });

$( "#treatment-record" ).click(function() {
    setTimeout(function(){
      document.getElementById("record-table").click();
      var patient_id = document.getElementById("patient_id").value; 
      view(patient_id);
     }, 500);
  });

  showInstallment(pathArray[2]);

  //   $.ajax({
  //   type: "get",
  //   url: '/view-installment/'+ pathArray[2],
  //   data:  $("").serialize(),
  //   success: function (data) {
  //      $("#installmentHtml").html(data.installmentHtml);
  //   },
  //   error: function (data, textStatus, errorThrown) {
  //       console.log(data.success);

  //   },
  // });


  $.ajax({ 
    type: "GET",
    url: '/view-patient/'+ pathArray[2],
    success: function (data) {
      $("#birthdayNew").html(data.birthdayNewFormat);
      $("#birthdayNew2").html(data.birthdayNewFormat);


      $("#file-html").html(data.FileHtml);
      
      if( data.userType > '1') {
        $(".menu-monthly-subs").css("display", "none");
      }
      data.patientDataInfo.forEach((obj) => {
        Object.entries(obj).forEach(([key, value]) => {
          console.log(key+ "-" + value); 
          $("#"+key).html(value);
          if(key == "total") {
            setTimeout(function(){ 
              // document.getElementById("total").value = 33; 
            }, 3000);
          }
          if(key == "firstName") {
            $("#signerName").html(value);
          }
          if(key == "lastName") {
            $("#signerName").append(value);
          }
        });
      });


      // data.patientData.forEach((objs) => {
      //   Object.entries(objs).forEach(([keys, values]) => {
      //     console.log(key+ "-" + values); 

      //      if(value == 'true') {
      //         $('#'+keys).prop('checked', true);
      //       } else if(value == 'false') {
      //         $('#'+keys).prop('checked', false);
      //       } else {
      //     $("#"+keys).html(values);
      //       }
       
      //   });
      // });

      console.log(data.patientData);
      $("#patientTreatmentHtml").html(data.treatHtml);
      Object.entries(data.patientData).forEach(([key, value]) => {
        // if(key == 'previousExtraction') {
        //     document.getElementById("previousExtraction").value = value; 
        //   }

        if(key == 'question10a' ||key == 'question10b' ||key == 'question10c') {
          console.log(key);
          console.log(value);
          if(value == 'true') {
              $('#'+key+'mobile').prop('checked', true);
              $('#'+key).prop('checked', true);
            } else if(value == 'false') {
              $('#'+key+"fmobile").prop('checked', true);
              $('#'+key+"f").prop('checked', true);
            } 

        }


        var code = '"'+key+' '+value+'"';
          if(value == 'true') {
              $('#'+key).prop('checked', true);
            } else if(value == 'false') {
              $('#'+key+"f").prop('checked', true);
            } else {
          $("#"+key).html(value);
            }
      
        
        if(key == 'firstName' || key == 'lastName' || key == 'nickName' || key == 'middleName' || key == 'birthDate' || key == 'localAnestheticOthers' || key == 'ifSoWhat'|| key == 'ifSoWhatPreEx'|| key == 'address' || key == 'company' || key == 'occupation'|| key == 'signatureLink' || key == 'ifSoWhatMedicine' || key == 'highBloodPressureText'  || key == 'emergency'  || key == 'newSigner' || key == 'relationshipToPatient' || key == 'referredBy' || key == 'relationship' || key == 'emergencyMobileNo' ) {
          console.log(key);
          if(key == 'signatureLink') {
            // if(value !== '') {
            //   $("#signature-Link").attr("src", value);
            // } else {
            //   $("#signature-Link").attr("src", "/images/sig-placeholder.png");
            // }
          } else {
            
            if(key =='newSigner' && value !== "") {
              $("#signerName").html(value);
             }
             if(key =='relationshipToPatient' && value !== "") {
              $("#relationship-entered").html("("+value+")");
            
             }

             if(value > "") {
            document.getElementById(key).value = value; 
             }
            width = $(window).width();
            if(width < 400) {
              if(key == "ifSoWhatMedicine") {
                document.getElementById("ifSoWhatMedicineMobile").value = value; 
              }
              if(key == "ifSoWhat") {
                document.getElementById("ifSoWhatMobile").value = value; 
              }


            }
          }
        } else {
          if(key == 'bloodpressureText' || key == 'bloodtypeText'  || key == 'bleedingTimeText' || key == 'othersText' || key == 'othersText2' || key == 'specifyText' || key == 'hospitalizedText' || key == 'seriousillnessText' || key == 'conditionBeingTreatedText' || key == 'previous_dentist' || key == 'last_dentist_visit' || key == 'name_of_physician' || key == 'specialty_if_applicable' || key == 'office_address' || key == 'office_number') {
              document.getElementById(key).value = value; 
          }

            if(value == 'on') {
              $('#'+key).prop('checked', true);
            }
        }
       $("#"+key).html(value);
      });
           // consent
       $("#consentHtml").html(data.ConsentHtml);
      console.log(data);
      document.getElementById("patient_id").value =  pathArray[2];
        $("#add-treatment-record").attr("onclick", "addTreatmentRecord("+patient_id+")");

        if(myParamTreat.includes("html-badges") == true) {
          $("#submit-patient-treatment-record").attr("onclick", "addTreatmentRecordProcess("+pathArray[2]+")");
        } else {
          // $("#submit-patient-treatment-record").attr("onclick", "addTreatmentRecordProcess("+patient_id+")");
          $("#submit-patient-treatment-record").attr("onclick", "addTreatmentRecordProcess("+pathArray[2]+")");

        }

        //signature link
        if(data.signatureLink !== '') {
          $("#signature-Link").attr("src", data.signatureLink);
        } else {
          $("#signature-Link").attr("src", "/images/sig-placeholder.png");
        }
        
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);
    },
  });

  

  
  $('#edit-procedure').each(function () {
  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
}).on('input', function () {
  this.style.height = 'auto';
  this.style.height = (this.scrollHeight) + 'px';
});
});


var room = 1;
function add_fields() {
    room++;
    $(".prodSection.prod"+room).removeClass("d-none");
    $(".prodSection.prod"+room+" #currency-field").prop('disabled', false);

}
function remove_fields(id) {
    $(".prodSection.prod"+id).addClass("d-none");
    $(".prodSection.prod"+id+" #currency-field").prop('disabled', true);
}



function sendEmail() {
  
}

function viewDrawing(id) {
  console.log(id);
  // $('#modal-drawng').modal('open');
  $.ajax({
    type: "get",
    url: '/view-drawing/'+ id,
    data:  $("").serialize(),
    success: function (data) {
      console.log(data.drawing.drawing_link);
      $('#modal-drawing').modal('open');

     $("#modal-drawing p").html("<img src='"+data.drawing.drawing_link+"' style='width: 100%;background: white;'>");
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
  });
}

function viewPatientSign(treatment_id, section) {
  var section = document.getElementById("sign-section").value = section; 
  $.ajax({
    type: "post",
    url: '/view-patient-signature/'+ treatment_id ,
    data:  $("#view-sign-form").serialize(),
    success: function (data) {
      
      $('#modal-view-patient-sign').modal('open');
      $("#patient-signature").html("<img src='"+data.sigLink+"' style='width: 350px;background: white;'>");
      $("#signature-date").html(data.sigDate);
               

    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
  });
}
function patientsignRecord(treatment_id, section) {
  document.getElementsByTagName("canvas")[0].removeAttribute("width");
  $("#drawing-save-png").css('display', 'inline');
  $("#drawing-save-png-main").css('display', 'none');
  $(".drawing canvas").attr("width", "600");
  $(".drawing canvas").attr("height", "300");
  $(".signature-pad").css('height', '300px');
  $("#signature-pad").removeClass("body-background");
  $("#signature-pad").removeClass("head-background");
  $("#signature-pad").removeClass("teeth-background");
  $(".drawing").removeClass("h-600");
  $(".drawing").removeClass("h-790");
  $('#modal-drawing-area').modal('open');
  var drawing_link = document.getElementById("drawing_link").value;
  document.getElementById("section").value = section;
  $("#modal-drawing-area .buttons #drawing-save-png").attr('onclick', "patientsignRecordProcess("+treatment_id+", "+section+")");
}
function patientsignRecordProcess(treatment_id, section) {
  $.ajax({
    type: "post",
    url: '/save-patient-signature/'+ treatment_id ,
    data:  $("#add-treatment-record-form").serialize(),
    success: function (data) {
       var patient_id = document.getElementById("patient_id").value;
       view(patient_id);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
  });
}


function kfcheckboxChange(checbox_id, input_name) {
  var val = document.getElementById(checbox_id).value;
  if(val == 'false') {
    $('input[name='+input_name+']').val('true');
       $("#"+checbox_id+"-note").css("display", "block");
       $("#"+checbox_id+"-label").css("display", "block");


  } else {
    $('input[name='+input_name+']').val('false');
    $("#"+checbox_id+"-note").css("display", "none");
    $("#"+checbox_id+"-label").css("display", "none");

  }
}

function saveConsent(type) {

}

function showIntallment() {
 var patinet_id = document.getElementById("patient_id").value ;
      $.ajax({
    type: "get",
    url: '/view-installment/'+ patinet_id,
    data:  $("").serialize(),
    success: function (data) {
       $("#installmentHtml").html(data.installmentHtml);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
  });

}
function checkboxChange(checbox_id, input_name) {
  var val = document.getElementById(checbox_id).value;
  if(val == 'false') {
    $('input[name='+input_name+']').val('true');

  } else {
    $('input[name='+input_name+']').val('false');
  }
}

function signConsent(person) {    
  $("#modal-drawing-area .wrapper").removeClass('h-600');
  $("#modal-drawing-area .wrapper").removeClass('h-790');
  $("#signature-pad").removeClass('head-background');
  $("#signature-pad").removeClass('body-background');
  $("#signature-pad").removeClass('teeth-background');
  document.getElementsByTagName("canvas")[0].removeAttribute("width");
  $(".drawing canvas").attr("width", "600");
  $(".drawing canvas").attr("height", "300");
  $(".signature-pad").css('height', '300px');
  $('#modal-drawing-area').modal('open');
  var drawing_link = document.getElementById("drawing_link").value;
  document.getElementById("section").value = section;
  $("#modal-drawing-area .buttons #drawing-save-png").attr('onclick', "signConsentProcess('"+person+"')");
  if(person == 'kinnie') {
    $("#clear").addClass('head-background');
    $("#clear").removeClass('body-background');
    $("#clear").removeClass('teeth-background');
    $("#clear").removeClass('sentence-background');
    $("#signature-pad").removeClass('teeth-background');
    $("#signature-pad").removeClass('body-background');
    $("#signature-pad").removeClass('sentence-background');
    $("#signature-pad").addClass('head-background');
    $("#modal-drawing-area .wrapper").addClass('h-600');
    $(".drawing canvas").attr("width", "600");
    $(".drawing canvas").attr("height", "600");
    $(".signature-pad").css('height', '600px');
  }
  if(person == 'kinnie-body') {
    $("#clear").addClass('body-background');
    $("#clear").removeClass('head-background');
    $("#clear").removeClass('teeth-background');
    $("#clear").removeClass('sentence-background');
    $("#signature-pad").removeClass('teeth-background');
    $("#signature-pad").removeClass('head-background');
    $("#signature-pad").removeClass('sentence-background');
    $("#signature-pad").addClass('body-background');
    $("#modal-drawing-area .wrapper").addClass('h-790');
    if (window.screen.availWidth == 768) {
      $(".drawing canvas").attr("width", "615");
    } else {
      $(".drawing canvas").attr("width", "600");
    }
    $(".drawing canvas").attr("height", "815");
    $(".signature-pad").css('height', '815');
  }
  if(person == 'kinnie-sentence') {
    $("#clear").addClass('sentence-background');
    $("#clear").removeClass('body-background');
    $("#clear").removeClass('head-background');
    $("#clear").removeClass('teeth-background');
    $("#signature-pad").removeClass('teeth-background');
    $("#signature-pad").removeClass('head-background');
    $("#signature-pad").removeClass('body-background');
    $("#signature-pad").addClass('sentence-background');
    $("#modal-drawing-area .wrapper").addClass('h-790');
    if (window.screen.availWidth == 768) {
      $(".drawing canvas").attr("width", "617");
    } else {
      $(".drawing canvas").attr("width", "617");
    }
    $(".drawing canvas").attr("height", "490");
    $(".signature-pad").css('height', '490');
  }
  if(person == 'teeth') {
    $("#clear").addClass('teeth-background');
    $("#clear").removeClass('head-background');
    $("#clear").removeClass('body-background');
    $("#clear").removeClass('sentence-background');
    $("#modal-drawing-area .wrapper").addClass('h-600');
    $("#signature-pad").removeClass('head-background');
    $("#signature-pad").removeClass('body-background');
    $("#signature-pad").removeClass('sentence-background');
    $("#signature-pad").addClass('teeth-background');
    $(".drawing canvas").attr("width", "615");
    $(".drawing canvas").attr("height", "600");
    $(".signature-pad").css('height', '600px');
  }
}

function signConsentProcess(person) {
  var drawing_link = document.getElementById("drawing_link").value;

  if(person == "patient") {
    $(".sign-area.patient.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39p;text-align: center;'>");
    
  } else if(person == "patient2") {
    $(".sign-area.patient2.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39p;text-align: center;'>");
  } else if(person == "patient3") {
    $(".sign-area.patient3.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39p;text-align: center;'>");
  } else if(person == "patient4") {
    $(".sign-area.patient4.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39p;text-align: center;'>");
  } else if(person == "patient5") {
    $(".sign-area.patient5.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39p;text-align: center;'>");
  } else if(person == "patient6") {
    $(".sign-area.patient6.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39p;text-align: center;'>");
  } else if(person == "patient7") {
    $(".sign-area.patient7.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39p;text-align: center;'>");
  } else if(person == "patient8") {
    $(".sign-area.patient8.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: relative;padding: 0px 39p;text-align: center;margin: 0 auto;'>");
  } else if(person == "patient9") {
    $(".sign-area.patient9.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: relative;padding: 0px 39p;text-align: center;margin: 0 auto;'>");
  }
  else if(person == "patient10") {
    $(".sign-area.patient10.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: relative;padding: 0px 39p;text-align: center;margin: 0 auto;'>");
  } else if(person == "patient11") {
    $(".sign-area.patient11.signature").html("<img src='"+drawing_link+"' / style='width: 200px;padding: 4px;display: block;position: relative;padding: 0px 39p;text-align: center;margin: 0 auto;'><br>");
  } 
   else if(person == "patient13") {
    $(".sign-area.patient13.signature").html("<img src='"+drawing_link+"' / style='width: 200px;padding: 4px;display: block;position: relative;padding: 0px 39p;text-align: center;margin: 0 auto;'><br>");
  } 

  else if(person == "patient14") {
    $(".sign-area.patient14.signature").html("<img src='"+drawing_link+"' / style='width: 150px;padding: 4px;display: block;position: relative;padding: 0px 39px;text-align: center;margin: 0 auto;'><br>");
  } 
    else if(person == "patient15") {
    $(".sign-area.patient15.signature").html("<img src='"+drawing_link+"' / style='width: 150px;padding: 4px;display: block;position: relative;padding: 0px 39px;text-align: center;margin: 0 auto;'><br>");
  } 

    else if(person == "patient16") {
    $(".sign-area.patient16.signature").html("<img src='"+drawing_link+"' / style='width: 150px;padding: 4px;display: block;position: relative;padding: 0px 39px;text-align: center;margin: 0 auto;'><br>");
  } 


      else if(person == "patient17") {
    $(".sign-area.patient17.signature").html("<img src='"+drawing_link+"' / style='width: 150px;padding: 4px;display: block;position: relative;padding: 0px 39px;text-align: center;margin: 0 auto;'><br>");
  } 
       else if(person == "patient18") {
    $(".sign-area.patient18.signature").html("<img src='"+drawing_link+"' / style='width: 150px;padding: 4px;display: block;position: relative;padding: 0px 39px;text-align: center;margin: 0 auto;'><br>");
  } 



       else if(person == "patient19") {
    $(".sign-area.patient19.signature").html("<img src='"+drawing_link+"' / style='width: 150px;padding: 4px;display: block;position: relative;padding: 0px 39px;text-align: center;margin: 0 auto;'><br>");
  } 



  
 else if(person == "patient20") {
    $(".sign-area.patient20.signature").html("<img src='"+drawing_link+"' / style='width: 150px;padding: 4px;display: block;position: relative;padding: 0px 10px;text-align: center;margin: 0 auto;'><br>");
  } 

else if(person == "patient21") {
    $(".sign-area.patient21.signature").html("<img src='"+drawing_link+"' / style='width: 150px;padding: 4px;display: block;position: relative;padding: 0px 10px;text-align: center;margin: 0 auto;'><br>");
  } 

  else if(person == "patient22") {
    $(".sign-area.patient22.signature").html("<img src='"+drawing_link+"' / style='width: 150px;padding: 4px;display: block;position: relative;padding: 0px 10px;text-align: center;margin: 0 auto;'><br>");
  } 


  else if(person == "patient23") {
    $(".sign-area.patient23.signature").html("<img src='"+drawing_link+"' / style='width: 150px;padding: 4px;display: block;position: relative;padding: 0px 10px;text-align: center;margin: 0 auto;'><br>");
  } 
  else if(person == "patient24") {
    $(".sign-area.patient24.signature").html("<img src='"+drawing_link+"' / style='width: 150px;padding: 4px;display: block;position: relative;padding: 0px 10px;text-align: center;margin: 0 auto;'><br>");
  } 
  else if(person == "patient25") {
    $(".sign-area.patient25.signature").html("<img src='"+drawing_link+"' / style='width: 150px;padding: 4px;display: block;position: relative;padding: 0px 10px;text-align: center;margin: 0 auto;'><br>");
  } 
  else if(person == "patient26") {
    $(".sign-area.patient26.signature").html("<img src='"+drawing_link+"' / style='width: 150px;padding: 4px;display: block;position: relative;padding: 0px 10px;text-align: center;margin: 0 auto;'><br>");
  } 
  else if(person == "patient27") {
    $(".sign-area.patient27.signature").html("<img src='"+drawing_link+"' / style='width: 150px;padding: 4px;display: block;position: relative;padding: 0px 10px;text-align: center;margin: 0 auto;'><br>");
  } 
  else if(person == "patient28") {
    $(".sign-area.patient28.signature").html("<img src='"+drawing_link+"' / style='width: 150px;padding: 4px;display: block;position: relative;padding: 0px 10px;text-align: center;margin: 0 auto;'><br>");
  } 

   else if(person == "patient29") {
    $(".sign-area.patient29.signature").html("<img src='"+drawing_link+"' / style='width: 150px;padding: 4px;display: block;position: relative;padding: 0px 10px;text-align: center;margin: 0 auto;'><br>");
  } 
   else if(person == "patient30") {
    $(".sign-area.patient30.signature").html("<img src='"+drawing_link+"' / style='width: 150px;padding: 4px;display: block;position: relative;padding: 0px 10px;text-align: center;margin: 0 auto;'><br>");
  } 





  else if(person == "patient12") {
    $(".sign-area.patient12.signature").html("<img src='"+drawing_link+"' / style='width: 200px;padding: 4px;display: block;position: relative;padding: 0px 39p;text-align: center;margin: 0 auto;'><br>");
  } else if(person == "dentist") {
    $(".sign-area.dentist.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39p;text-align: center;'>");
  } else if(person == "witness") {
    $(".sign-area.witness.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39p;text-align: center;'>");
  } else if (person == "teeth") {
    $("#modal-drawing-area .wrapper").removeClass('h-600');
    $("#signature-pad").removeClass('head-background');
    $("#modal-drawing-area .wrapper").removeClass('h-600');
    $("#modal-drawing-area .wrapper").removeClass('h-790');
    $(".teeth-draw").html("<img src='"+drawing_link+"' / style='width: 615px;height: 600px;padding: 4px;display: block;position: absolut;text-align: center;'>");
  }  else if (person == "kinnie") {
    $("#signature-pad").removeClass('head-background');
    $("#modal-drawing-area .wrapper").removeClass('h-600');
    $("#modal-drawing-area .wrapper").removeClass('h-790');
    $(".head-draw").html("<img src='"+drawing_link+"' / style='width: 300px;height: 300px;padding: 4px;display: block;position: absolut;text-align: center;'>");
    document.getElementById("kinnie_funt_image1").value = drawing_link;
  } else if (person == "kinnie-body") {
    $("#signature-pad").removeClass('head-background');
    $("#modal-drawing-area .wrapper").removeClass('h-600');
    $("#modal-drawing-area .wrapper").removeClass('h-790');
    if (window.screen.availWidth >= 768 && window.screen.availWidth <= 1030) {
      $(".body-draw").html("<img src='"+drawing_link+"' / style'text-align: center;height: 715px;width:530px; '>");
    } else {
      $(".body-draw").html("<img src='"+drawing_link+"' / style'text-align: center;height: 596px;width:595px; '>");
    }
    document.getElementById("kinnie_funt_image2").value = drawing_link;

  } else if (person == "kinnie-sentence") {
    $("#signature-pad").removeClass('head-background');
    $("#modal-drawing-area .wrapper").removeClass('h-600');
    $("#modal-drawing-area .wrapper").removeClass('h-790');
    if (window.screen.availWidth >= 768 && window.screen.availWidth <= 1030) {
      $(".draw-sentence").html("<img src='"+drawing_link+"' / style'text-align: center;height: 502px;width:617px; '>");
    } else {
      $(".draw-sentence").html("<img src='"+drawing_link+"' / style'text-align: center;height: 596px;width:595px; '>");
    }
  }
}


function saveConsent(type) {
  document.getElementById("consent_type").value = type;
  var patient_id = document.getElementById("patient_id").value;

  $(".progress").removeClass("d-none");
  var form_type = "#form-consent";

  if(type == 'ortho-consent-form') {
    var initial_val = document.getElementById("treatment-of").value;
    $("span#treatment_of").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+initial_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#treatment-of").css('display', 'none');
  
    var html = ($('#modal-contract-consent .wrapper').html());
    document.getElementById("contract_html").value = html;
  } else if(type == 'informed-consent2') {
    var html = ($('#modal-informed-consent2  .wrapper').html());
    document.getElementById("contract_html").value = html;
  }

  else if(type == 'restoration') {
    var html = ($('#modal-restoration  .wrapper').html());
    document.getElementById("contract_html").value = html;
  }


    else if(type == 'extraction') {
    var html = ($('#modal-extraction  .wrapper').html());
    document.getElementById("contract_html").value = html;
  }

  else if(type == 'denture') {
    var html = ($('#modal-denture  .wrapper').html());
    document.getElementById("contract_html").value = html;
  }

    else if(type == 'root') {
    var html = ($('#modal-root  .wrapper').html());
    document.getElementById("contract_html").value = html;
  }


     else if(type == 'trial') {
    var html = ($('#modal-trial  .wrapper').html());
    document.getElementById("contract_html").value = html;
  }

      else if(type == 'crown') {
    var html = ($('#modal-crown  .wrapper').html());
    document.getElementById("contract_html").value = html;
  }
   else if(type == 'informed-consent') {
    var html = ($('#modal-informed-consent  .wrapper').html());
    document.getElementById("contract_html").value = html;
  }
  //  else if(type == 'ortho-release-form') { 
  //   var html = ($('#modal-informed-consent .wrapper').html());
  //   document.getElementById("contract_html").value = html;
  // }
  else if(type == 'instruction-veneers') {
    var html = ($('#modal-instruction-veneers .wrapper').html());
    document.getElementById("contract_html").value = html;
  } else if(type == 'instruction-laser-whitening') {
    var html = ($('#modal-instruction-laser-whitening .wrapper').html());
    document.getElementById("contract_html").value = html;
  } else if(type == 'instruction-for-braces') {
    var html = ($('#modal-home-care-instruction .wrapper').html());
    document.getElementById("contract_html").value = html;
  } else if(type == 'post-op-instruction-tooth-extraction') {
    var html = ($('#modal-post-op-instruction-tooth-extraction .wrapper').html());
    document.getElementById("contract_html").value = html;
  }
  else if(type == 'oral-diagnosis') {
    var html = ($('#modal-oral-diagnosis .wrapper').html());
    document.getElementById("contract_html").value = html;
  }
  else if(type == 'ambassadors-contract') {
    var html = ($('#modal-ambassadors-contract .wrapper').html());
    document.getElementById("contract_html").value = html;
  }
  else if(type == 'about-tmj') {
    var html = ($('#modal-about-tmj .wrapper').html());
    document.getElementById("contract_html").value = html;
  }
  else if(type == 'orthodontic-braces-contract') { 
    var initial_val = document.getElementById("initial-form").value;
    $("span#initial_form").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+initial_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#initial-form").css('display', 'none');
    var monthly_checkup_val = document.getElementById("monthly-checkup").value;
    $("span#monthly_checkup").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+monthly_checkup_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#monthly-checkup").css('display', 'none');
    var treatment_is_val = document.getElementById("treatment-is").value;
    $("span#treatment_is").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+treatment_is_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#treatment-is").css('display', 'none');
    var rebond_of_bracket_val = document.getElementById("rebond-of-bracket").value;
    $("span#rebond_of_bracket").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+rebond_of_bracket_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#rebond-of-bracket").css('display', 'none');
    var missing_bracket_val = document.getElementById("missing-bracket").value;
    $("span#missing_bracket").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+missing_bracket_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#missing-bracket").css('display', 'none');
    var retainer_is_val = document.getElementById("retainer-is").value;
    $("span#retainer_is").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+retainer_is_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#retainer-is").css('display', 'none');
    var permission_to_val = document.getElementById("permission-to").value;
    $("span#permission_to").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+permission_to_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#permission-to").css('display', 'none');
    var history_cc_val = document.getElementById("history-cc").value;
    $("span#history_cc").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+history_cc_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#history-cc").css('display', 'none');
    var hpi_form1_val = document.getElementById("hpi-form1").value;
    $("span#hpi_form1").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+hpi_form1_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#hpi-form1").css('display', 'none');
    var hpi_form2_val = document.getElementById("hpi-form2").value;
    $("span#hpi_form2").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+hpi_form2_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#hpi-form2").css('display', 'none');
    var hpi_form3_val = document.getElementById("hpi-form3").value;
    $("span#hpi_form3").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+hpi_form3_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#hpi-form3").css('display', 'none');
    var specifiy_form_val = document.getElementById("specifiy-form").value;
    $("span#specifiy_form").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+specifiy_form_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#specifiy-form").css('display', 'none');
    var others_form_val = document.getElementById("others-form").value;
    $("span#others_form").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+others_form_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#others-form").css('display', 'none');
    var hpd_form_val = document.getElementById("hpd-form").value;
    $("span#hpd_form").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+hpd_form_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#hpd-form").css('display', 'none');
    var personal_social_val = document.getElementById("personal-social").value;
    $("span#personal_social").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+personal_social_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#personal-social").css('display', 'none');
    $("input#hpd-form").css('display', 'none');
    var other_form_val = document.getElementById("other-form").value;
    $("span#other_form").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+other_form_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#other-form").css('display', 'none');
    var i_form_val = document.getElementById("i-form").value;
    $("span#i_form").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+i_form_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#i-form").css('display', 'none');
    

    var arrayOfIds = $.map($(".consent-checkbox"), function(n, i){
      return n.id;
    });

    arrayOfIds.forEach((id_name) => {
      console.log(id_name);
      var id_name_new = id_name.replace("-", "_");

      var val = document.getElementById(id_name).value;
      if(val == 'true') {
        $("span#"+id_name_new).html('<span style="display: block;width: 20px;position: relative;"><img src="https://sagundentalclinic.com/images/sagun-checked.png" style="width: 20px;"/>');
      } else {
        $("span#"+id_name_new).html('<span style="display: block;width: 20px;position: relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
      }
      $("input#"+id_name).css('display', 'none');
    });
    var html = ($('#modal-orthodontic-braces-contract .wrapper').html());
    document.getElementById("contract_html").value = html;
  } else if (type == 'kinnie-funt') {
    form_type = "#form-consent-kinnie-funt";

    document.getElementById("consent_type_kinnie").value = type;



// UPDATE TO FIX ERROR
var patient_id = document.getElementById("patient_id").value;
      $.ajax({
      type: "get",
      url: '/get-consent-data/',
      data:  {type: 'kinnie-funt', patient_id: patient_id},
       dataType: 'JSON',
      success: function (data) {

      Object.entries(data.consentData).forEach(([key, value]) => { 
        var finalKey =  key.replaceAll("_", "-");
        console.log(finalKey + " - "+value);
         if(value > "" && value !== undefined && !(finalKey == 'consent-type') && !(finalKey == 'image-1') && !(finalKey == 'image-2')) {
           console.log(finalKey +"--"+ value);
           var s = document.getElementById(finalKey);
            // document.getElementById(finalKey).value = value;
            // document.getElementById(finalKey).setAttribute('value', value); 
        // $("#"+key).html("<span>"+value+"</span>");
          $("#"+finalKey).append("<span>"+value+"</span>");
          
          
          
         }
            //  if(value == 'true') {
            //     console.log(key);
            //     console.log("pasok");
            //     $("#"+key).html('<img src="assets/images/sagun-check.png" />');
            //  }
      })

        var html = ($('#modal-kinnie-funt .wrapper').html());
        document.getElementById("kinnie_funt_html").value = html;
 

    
        document.getElementById("kinnie_funt_patient_id").value = patient_id;
        $('#modal-kinnie-funt').modal('close');
        $(".progress").addClass("d-none");
        $(".card-alert.card.green").removeClass("hide");
        $(".card-alert.card.green p").html("Kinne Funt info  consent successfully saved!");
        setTimeout(function(){ 
        $(".card-alert.card.green").addClass("hide");
        }, 2000);

    
          $.ajax({
        type: "post",
        url: '/create-pdf/'+ patient_id,
        data:   $(form_type).serialize()  ,
        dataType: 'JSON',
        success: function (data) {
        $(".progress").addClass("d-none");
          $('#modal-'+type).modal('close');
          if(type == 'instruction-for-braces') {
          $('#modal-home-care-instruction').modal('close');
          }

          var patient_id = document.getElementById("patient_id").value;
          view(patient_id);
          $('#modal-contract-consent').modal('close');
          $('#modal-informed-consent2').modal('close');
          $('#modal-restoration').modal('close');
          $('#modal-extraction').modal('close');
          $('#modal-denture').modal('close');
          $('#modal-root').modal('close');
          $('#modal-trial').modal('close');
          $('#modal-crown').modal('close');
          $('#modal-informed-consent').modal('close');
          $(".card-alert.card.green").removeClass("hide");
          $(".card-alert.card.green p").html(type.replaceAll('-',' ')+" consent successfully created!");
          setTimeout(function(){ 
          $(".card-alert.card.green").addClass("hide");
          location.reload();
          }, 2000);
          
        },
        error: function (data, textStatus, errorThrown) {

        },
      });
  


       }});


       console.log(html);



  }
  
  if(type == 'contract-for-tmj') {
    form_type = "#form-consent-tmj";

    var ini_val = document.getElementById("tmj-initial-payment").value;
     document.getElementById("hidden-tmj-initial-payment").value = ini_val;
    $("span#tmj_initial_payment").html('<span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+ini_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
     $("input#tmj-initial-payment").css('visibility', 'hidden');

    var instal_val = document.getElementById("tmj-installation").value;
    document.getElementById("hidden-tmj-installation").value = instal_val;
    $("span#tmj_installation").html('<span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+instal_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#tmj-installation").css('visibility', 'hidden');

    var permission_val = document.getElementById("tmj-permission-to").value;
     document.getElementById("hidden-tmj-permission-to").value = permission_val;
    $("span#tmj_permission_to").html('<span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+permission_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#tmj-permission-to").css('display', 'none');

    var chief_compaint_val = document.getElementById("chief-compaint").value;
    chief_compaint_val = chief_compaint_val.replaceAll(/\r?\n/g, '<br>');
    document.getElementById("hidden-chief-compaint").value = chief_compaint_val;
    $("span#chief_compaint").html('<p style="padding-left: 20px;margin-top: 17p;text-align: left;min-height: 225px;border: 0;display: block;position: relative;">'+chief_compaint_val+'</p>');
    $("input#chief-compaint").css('display', 'none');

    var other_symptoms_val = document.getElementById("other-symptoms").value;
    other_symptoms_val = other_symptoms_val.replaceAll(/\r?\n/g, '<br>');
    document.getElementById("hidden-other-symptoms").value = other_symptoms_val;
    $("span#other_symptoms").html('<p style="padding-left: 20px;margin-top: 17p;text-align: left;min-height: 225px;border: 0;display: block;position: relative;">'+other_symptoms_val+'</p>');
    $("input#other-symptoms").css('display', 'none');

    var medical_history_val = document.getElementById("medical-history").value;
    medical_history_val = medical_history_val.replaceAll(/\r?\n/g, '<br>');
    document.getElementById("hidden-medical-history").value = medical_history_val;
    $("span#medical_history").html('<p style="padding-left: 20px;margin-top: 17p;text-align: left;min-height: 225px;border: 0;display: block;position: absolute;">'+medical_history_val+'</p>');
    $("input#medical-history").css('display', 'none');

    var dental_history_val = document.getElementById("dental-history").value;
    dental_history_val = dental_history_val.replaceAll(/\r?\n/g, '<br>');
    document.getElementById("hidden-dental-history").value = dental_history_val;
    $("span#dental_history").html('<div style="padding-left: 20px;margin-top: 17p;text-align: left;min-height: 225px;border: 0;display: block;position: relative;">'+dental_history_val+'</div>');
    $("input#dental-history").css('display', 'none');

    var co_1add_val = document.getElementById("co-1add").value;
     document.getElementById("hidden-co-1add").value = co_1add_val;
    $("span#co_1add").html('<div style="padding-left: 20px;margin-top: 17p;text-align: left;min-height: 225px;border: 0;display: block;position: relative;">'+co_1add_val+'</div>');
    $("input#co-1add").css('display', 'none');



    var co_1_val = document.getElementById("co-1").value;
     document.getElementById("hidden-co-1").value = co_1_val;
    $("span#co_1").html('<div style="padding-left: 20px;margin-top: 17p;text-align: left;min-height: 225px;border: 0;display: block;position: relative;">'+co_1_val+'</div>');
    $("input#co-1").css('display', 'none');


    var co_2a_val = document.getElementById("co-2a").value;
    document.getElementById("hidden-co-2a").value = co_2a_val;
    $("span#co_2a").html('<div style="padding-left: 20px;margin-top: 17p;text-align: left;min-height: 225px;border: 0;display: block;position: relative;">'+co_2a_val+'</div>');
    $("input#co-2a").css('display', 'none');
    
    var co_2b_val = document.getElementById("co-2b").value;
    document.getElementById("hidden-co-2b").value = co_2b_val;
    $("span#co_2b").html('<div style="padding-left: 20px;margin-top: 17p;text-align: left;min-height: 225px;border: 0;display: block;position: relative;">'+co_2b_val+'</div>');
    $("input#co-2b").css('display', 'none');
    
        
    var co_3_val = document.getElementById("co-3").value;
    document.getElementById("hidden-co-3").value = co_3_val;
    $("span#co_3").html('<div style="padding-left: 20px;margin-top: 17p;text-align: left;min-height: 225px;border: 0;display: block;position: relative;">'+co_3_val+'</div>');
    $("input#co-3").css('display', 'none');

    var co_4_val = document.getElementById("co-4").value;
    document.getElementById("hidden-co-4").value = co_4_val;
    $("span#co_4").html('<div style="padding-left: 20px;margin-top: 17p;text-align: left;min-height: 225px;border: 0;display: block;position: relative;">'+co_4_val+'</div>');
    $("input#co-4").css('display', 'none');

    var radiographic_analysis_val = document.getElementById("radiographic-analysis").value;
    radiographic_analysis_val = radiographic_analysis_val.replaceAll(/\r?\n/g, '<br>');
    document.getElementById("hidden-radiographic-analysis").value = radiographic_analysis_val;
    $("span#radiographic_analysis").html('<div style="padding-left: 20px;margin-top: 17p;text-align: left;min-height: 225px;border: 0;display: block;position: relative;">'+radiographic_analysis_val+'</div>');
    $("input#radiographic-analysis").css('display', 'none');
    
    var phase_2_val = document.getElementById("phase-2").value;
    phase_2_val = phase_2_val.replaceAll(/\r?\n/g, '<br>');
    document.getElementById("hidden-phase-2").value = phase_2_val;
    $("span#phase_2").html('<p style="padding-left: 20px;margin-top: 17p;text-align: left;min-height: 525px;border: 0;display: block;position: absolute;">'+phase_2_val+'</p>');
    $("input#phase-2").css('display', 'none');

    var phase_3_val = document.getElementById("phase-3").value;
    phase_3_val = phase_3_val.replaceAll(/\r?\n/g, '<br>');
     document.getElementById("hidden-phase-3").value = phase_3_val;
    $("span#phase_3").html('<p style="padding-left: 20px;margin-top: 17p;text-align: left;min-height: 525px;border: 0;display: block;position: absolute;">'+phase_3_val+'</p>');
    $("input#phase-3").css('display', 'none');

    var treatment_fee_val = document.getElementById("treatment-fee").value;
    document.getElementById("hidden-treatment-fee").value = treatment_fee_val;
    $("span#treatment_fee").html('<div style="padding-left: 20px;margin-top: 17p;text-align: left;min-height: 525px;border: 0;display: block;position: relative;">'+treatment_fee_val+'</div>');
    $("input#treatment-fee").css('display', 'none');

    var tf_phase_1_val = document.getElementById("tf-phase-1").value;
    tf_phase_1_val = tf_phase_1_val.replaceAll(/\r?\n/g, '<br>');
    document.getElementById("hidden-tf-phase-1").value = tf_phase_1_val;
    $("span#tf_phase_1").html('<p style="padding-left: 20px;margin-top: 17p;text-align: left;min-height: 525px;border: 0;display: block;position: absolute;">'+tf_phase_1_val+'</p>');
    $("input#tf-phase-1").css('display', 'none');

    var tf_phase_2en3_val = document.getElementById("tf-phase-2en3").value;
    tf_phase_2en3_val = tf_phase_2en3_val.replaceAll(/\r?\n/g, '<br>');
    document.getElementById("hidden-tf-phase-2en3").value = tf_phase_2en3_val;
    $("span#tf_phase_2en3").html('<p style="padding-left: 20px;margin-top: 17p;text-align: left;min-height: 525px;border: 0;display: block;position: absolute;">'+tf_phase_2en3_val+'</p>');
    $("input#tf-phase-2en3").css('display', 'none');

    // var html = ($('#modal-contract-for-tmj .wrapper').html());
    // document.getElementById("contract_html").value = html;
     document.getElementById("consent_tmj_type").value = type;
    var html = ($('#modal-contract-for-tmj .wrapper').html());
    document.getElementById("contract_tmj_html").value = html;
    document.getElementById("consent_tmj_patient_id").value = patient_id;

  }

 

  if(type == 'ortho-contact') {
    form_type = "#form-downpayment";

    var attending_dentist_val = document.getElementById("attending-dentist").value;
     document.getElementById("hidden-attending-dentist").value = attending_dentist_val;
    $("span#attending_dentist").html('<span>&nbsp;&nbsp;'+attending_dentist_val+'&nbsp;&nbsp;</span>');
     $("input#attending-dentist").css('visibility', 'hidden');

     var dental_license_no_val = document.getElementById("dental-license-no").value;
     document.getElementById("hidden-dental-license-no").value = dental_license_no_val;
    $("span#dental_license_no").html('<span>&nbsp;&nbsp;'+dental_license_no_val+'&nbsp;&nbsp;</span>');
     $("input#dental-license-no").css('visibility', 'hidden');

     var clinic_address_val = document.getElementById("clinic-address").value;
     document.getElementById("hidden-clinic-address").value = clinic_address_val;
    $("span#clinic_address").html('<span>&nbsp;&nbsp;'+clinic_address_val+'&nbsp;&nbsp;</span>');
     $("input#clinic-address").css('visibility', 'hidden');

     var parent_guardian_val = document.getElementById("parent-guardian").value;
     document.getElementById("hidden-parent-guardian").value = parent_guardian_val;
    $("span#parent_guardian").html('<span>&nbsp;&nbsp;'+parent_guardian_val+'&nbsp;&nbsp;</span>');
     $("input#parent-guardian").css('visibility', 'hidden');


       var cost_of_treatment_val = document.getElementById("cost-of-treatment").value;
     document.getElementById("hidden-cost-of-treatment").value = cost_of_treatment_val;
    $("span#cost_of_treatment").html('<span>&nbsp;&nbsp;'+cost_of_treatment_val+'&nbsp;&nbsp;</span>');
     $("input#cost-of-treatment").css('visibility', 'hidden');



     var initial_payment2_val = document.getElementById("initial-payment2").value;
     document.getElementById("hidden-initial-payment2").value = initial_payment2_val;
    $("span#initial_payment2").html('<span>&nbsp;&nbsp;'+initial_payment2_val+'&nbsp;&nbsp;</span>');
     $("input#initial-payment2").css('visibility', 'hidden');

      var monthly_payment_val = document.getElementById("monthly-payment").value;
     document.getElementById("hidden-monthly-payment").value = monthly_payment_val;
    $("span#monthly_payment").html('<span>&nbsp;&nbsp;'+monthly_payment_val+'&nbsp;&nbsp;</span>');
     $("input#monthly-payment").css('visibility', 'hidden');

     
     var terms_month_val = document.getElementById("terms-month").value;
     document.getElementById("hidden-terms-month").value = terms_month_val;
    $("span#terms_month").html('<span>&nbsp;&nbsp;'+terms_month_val+'&nbsp;&nbsp;</span>');
     $("input#terms-month").css('visibility', 'hidden');

     var treatment_fee2_val = document.getElementById("treatment-fee2").value;
     document.getElementById("hidden-treatment-fee2").value = treatment_fee2_val;
    $("span#treatment_fee2").html('<span>&nbsp;&nbsp;'+treatment_fee2_val+'&nbsp;&nbsp;</span>');
     $("input#treatment-fee2").css('visibility', 'hidden');

     

     
     
      var contact_number_val = document.getElementById("contact-number").value;
     document.getElementById("hidden-contact-number").value = contact_number_val;
    $("span#contact_number").html('<span>&nbsp;&nbsp;'+contact_number_val+'&nbsp;&nbsp;</span>');
     $("input#contact-number").css('visibility', 'hidden');
     
     
     document.getElementById("consent_downpayment_type").value = type;
    var html = ($('#modal-ortho-contact .wrapper').html());
    document.getElementById("contract_downpayment_html").value = html;
    document.getElementById("consent_downpayment_patient_id").value = patient_id;

  }
  
  var patient_id = document.getElementById("patient_id").value;
  document.getElementById("consent_patient_id").value = patient_id;

  if (type !== 'kinnie-funt') {
      $.ajax({
      type: "post",
      url: '/create-pdf/'+ patient_id,
      data:   $(form_type).serialize()  ,
      dataType: 'JSON',
      success: function (data) {
      $(".progress").addClass("d-none");
        $('#modal-'+type).modal('close');
        if(type == 'instruction-for-braces') {
        $('#modal-home-care-instruction').modal('close');
        }

        var patient_id = document.getElementById("patient_id").value;
        view(patient_id);
        $('#modal-contract-consent').modal('close');
        $('#modal-informed-consent').modal('close');
        $('#modal-restoration').modal('close');
          $('#modal-extraction').modal('close');
          $('#modal-denture').modal('close');
          $('#modal-root').modal('close');
          $('#modal-trial').modal('close');
          $('#modal-crown').modal('close');
        $('#modal-informed-consent2').modal('close');
        $(".card-alert.card.green").removeClass("hide");
        $(".card-alert.card.green p").html(type.replaceAll('-',' ')+" consent successfully created!");
        setTimeout(function(){ 
        $(".card-alert.card.green").addClass("hide");
        }, 2000);
        
      },
      error: function (data, textStatus, errorThrown) {

      },
    });
  }
}

 function getConsentData(type) {

  var patient_id = document.getElementById("patient_id").value;
   $.ajax({
    type: "get",
      url: '/get-consent-data/',
      data:  {type: type, patient_id: patient_id},
       dataType: 'JSON',
    success: function (data) {

        if(data.kinnieHead !== "") {
          setTimeout(function(){ 
            $(".signature-pad.head-background").css("background-image", "url("+data.kinnieHead+");");
          }, 1000);
          }
          if(data.kinnieBody !== "") {
          setTimeout(function(){ 
            $(".signature-pad.body-background").css("background-image", "url("+data.kinnieBody+");");
          }, 1000);
          }
      Object.entries(data.consentData).forEach(([key, value]) => {
        
          if(key !== 'consent_type') {
           var finalKey =  key.replaceAll("_", "-");
          // console.log(finalKey+": "+value);
          if(finalKey !== 'image-1' && finalKey !== 'image-2') {
           document.getElementById(finalKey).value = value.replaceAll('<br>', '\n'); 
            var val = document.getElementById(finalKey).value;
            if(type=='kinnie-funt') {
             document.getElementById(finalKey).setAttribute('value', value);   
            }
            
            if(val == 'true') {
              $('input[name='+key+']').val('true');
              document.getElementById(finalKey).checked = true;
                $("#"+finalKey+"-note").css("display", "block");
              $("#"+finalKey+"-label").css("display", "block");

            } 
            if(val == 'false') {
              $('input[name='+key+']').val('false');
              $("#"+finalKey+"-note").css("display", "none");
              $("#"+finalKey+"-label").css("display", "none");

            }


          }
        }

      });
    },
    error: function (data, textStatus, errorThrown) {

    },
  });
 }



  function removePatientRecord(patient_id) {
   $("#submit-remove-patient-record").attr("onclick", "removePatientRecordProcess("+patient_id+")");
  }
  function removePatientRecordProcess(patient_id) {
    $.ajax({
      type: "get",
      url: '/remove-patient-record/'+ patient_id,
      data:  $("").serialize(),
      success: function (data) {

      window.location.assign("/patient-records/?remove_patient_status=1");
      },
      error: function (data, textStatus, errorThrown) {
          console.log(data.success);

      },
    });
  }


  function removeConsent(consent_id) {
   $('#modal-remove-consent').modal('open');
   $("#submit-remove-consent").attr("onclick", "removeConsentProcess("+consent_id+")");
  }
  function removeConsentProcess(consent_id) {
    $.ajax({
      type: "get",
      url: '/remove-consent/'+ consent_id,
      data:  $("").serialize(),
      success: function (data) {
        $('#modal-remove-consent').modal('close');
        $(".card-alert.card.green").removeClass("hide");
        $(".card-alert.card.green p").html(data.success);
        setTimeout(function(){ 
        $(".card-alert.card.green").addClass("hide");
        }, 3000);
        var patient_id = document.getElementById("patient_id").value;
        view(patient_id);
      },
      error: function (data, textStatus, errorThrown) {
          console.log(data.success);

      },
    });
  }

  function removeFile(file_id) {
   $('#modal-remove-file').modal('open');
   $("#submit-remove-file").attr("onclick", "removeFileProcess("+file_id+")");
  }
  function removeFileProcess(file_id) {
    $.ajax({
      type: "get",
      url: '/remove-file/'+ file_id,
      data:  $("").serialize(),
      success: function (data) {
        $('#view-files').load(document.URL +  ' #view-files');
        $('#modal-remove-file').modal('close');
        $(".card-alert.card.green").removeClass("hide");
        $(".card-alert.card.green p").html(data.success);
        setTimeout(function(){ 
        $(".card-alert.card.green").addClass("hide");
        }, 3000);
        var patient_id = document.getElementById("patient_id").value;
        view(patient_id);
      },
      error: function (data, textStatus, errorThrown) {
          console.log(data.success);

      },
    });
  }
function removeTreatmentProcedureRecord(treatment_procedure_id) {
  $.ajax({
    type: "get",
    url: '/remove-treatment-procedure/'+ treatment_procedure_id,
    data:  $("").serialize(),
    success: function (data) {
      $('#modal-modify-procedure').modal('close');
      $(".card-alert.card.green").removeClass("hide");
      $(".card-alert.card.green p").html("Patient treatment record successfully added!");
      setTimeout(function(){ 
      $(".card-alert.card.green").addClass("hide");
       }, 3000);
       var patient_id = document.getElementById("patient_id").value;
       view(patient_id);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
  });

}

function modifyProcedure(treatment_procedure_id) {
  $('#modal-modify-procedure').modal('open');
  $("#submit-remove-procedure").attr('onclick', "removeTreatmentProcedureRecord("+treatment_procedure_id+")");
  $("#submit-edit-procedure").attr('onclick', "editProcedureRecord("+treatment_procedure_id+")");

  $("#submit-edit-patient-treatment-record").attr("onclick", "editProcedureRecordProcess("+treatment_procedure_id+")");
}

function editProcedureRecord(treatment_procedure_id) {
  $('#modal-edit-treatment-record').modal('open');
  $.ajax({
    type: "get",
    url: '/get-procedure-input/'+ treatment_procedure_id,
    success: function (data) {
      console.log(data.paymentMethodValue);
      document.getElementById("edit-payment-type").value =data.paymentMethodValue.payment_method_type;
      document.getElementById("edit-date").value =data.procedureValue.date;
      document.getElementById("edit-procedure").value = data.procedureValue.treatment_procedure;
      document.getElementById("edit-tooth-no").value = data.procedureValue.tooth_number;
      document.getElementById("edit-recall-date").value = data.procedureValue.recall_date;
      document.getElementById("edit-recall-note").value = data.procedureValue.recall_note;
      document.getElementById("edit-amount-charged").value =  separator(data.procedureValue.amount_charged);
      document.getElementById("edit-amount-paid").value =  separator(data.procedureValue.amount_paid);
      document.getElementById("edit-amount-paid-note").value = data.procedureValue.amount_paid_note;
      document.getElementById("edit-balance").value =  separator(data.procedureValue.balance);
      const removePatient = document.querySelectorAll('#edit-treatment-record-form label');
        removePatient.forEach(element => {
          $(removePatient).addClass('active');
        });
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);
     
    },
  });
}

function separator(numb) {
    var str = numb.toString().split(".");
    str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return str.join(".");
}

function editProcedureRecordProcess(treatment_procedure_id) {
  var date = document.getElementById("edit-date").value;
  var procedure = document.getElementById("edit-procedure").value;
  var tooth_no = document.getElementById("edit-tooth-no").value;
  var recall_date = document.getElementById("edit-recall-date").value;
  var recall_note = document.getElementById("edit-recall-note").value;
  var amount_charged = document.getElementById("edit-amount-charged").value;
  var amount_paid = document.getElementById("edit-amount-paid").value;
  var amount_paid_note = document.getElementById("edit-amount-paid-note").value;
  var balance = document.getElementById("edit-balance").value;
  var payment_type = document.getElementById("edit-payment-type").value;
  $.ajax({
    type: "GET",
    url: '/save-edit-procedure/',
    data:  {recall_date: recall_date, recall_note: recall_note, date: date, tooth_no: tooth_no, procedure: procedure, amount_charged: amount_charged, amount_paid: amount_paid, amount_paid_note:amount_paid_note, balance: balance, procedure_id: treatment_procedure_id, payment_type: payment_type},
    success: function (data) {
      $("#modal-edit-treatment-record").modal("close");
      $("#modal-modify-procedure").modal("close");
      $(".card-alert.card.green").removeClass("hide");
      $(".card-alert.card.green p").html(data.success);
      setTimeout(function(){ 
      $(".card-alert.card.green").addClass("hide");
      }, 3000);

        $("#treatment-record").click();
        
      var patient_id = document.getElementById("patient_id").value;
      view(patient_id);

    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);
    },
  });
}

function editFile(file_id) {
  $('#modal-edit-file').modal('open');
  $.ajax({
    type: "get",
    url: '/get-file-input/'+ file_id,
    success: function (data) {
      console.log(data.fileValue.name);

    document.getElementById("edit-file-name").value = data.fileValue.name;
    const removePatient = document.querySelectorAll('#edit-file-form label');
    removePatient.forEach(element => {
      $(removePatient).addClass('active');
    });

    $("#submit-edit-patient-file").attr("onclick", "editFiledProcess("+file_id+")");

    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);
     
    },
  });
}

function editFiledProcess(file_id) {
  var fileName = document.getElementById("edit-file-name").value;
  $.ajax({
    type: "GET",
    url: '/save-edit-file/',
    data:  {fileName: fileName, file_id: file_id},
    success: function (data) {
      $("#modal-edit-file").modal("close");
      $(".card-alert.card.green").removeClass("hide");
      $(".card-alert.card.green p").html(data.success);
      setTimeout(function(){ 
      $(".card-alert.card.green").addClass("hide");
      }, 3000);
      var patient_id = document.getElementById("patient_id").value;
      view(patient_id);
      // $( "#view-files" ).load(window.location.href + " #view-files" );

    },
    error: function (data, textStatus, errorThrown) {
    },
  });
}


function viewFile(file_id) {
  $("#modal-view-file .files-list").html();
  $.ajax({
    type: "get",
    url: '/view-file/'+ file_id,
    data:  $("").serialize(),
    success: function (data) {
      console.log(data);

      $("#modal-view-file .files-list").html(data.viewFilesHtml);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
  });
}
function view(patient_id) {
  $(".progress").removeClass("d-none");
  $(".preloader-wrapper").removeClass("d-none");
  $.ajax({
    type: "GET",
    url: '/view-patient/'+ patient_id,
    success: function (data) {
 
      data.patientDataInfo.forEach((obj) => {
        Object.entries(obj).forEach(([key, value]) => {
          console.log(key+ "-" + value);
          $("#"+key).html(value);
          if(key == "total") {
            setTimeout(function(){ 
              // document.getElementById("total").value = 33; 
            }, 3000);
          }
        if(key == "firstName") {
            $("#signerName").html(value);
          }
          if(key == "lastName") {
            $("#signerName").append(value);
          }
        });
      });
      $("#patientTreatmentHtml").html(data.treatHtml);
      Object.entries(data.patientData).forEach(([key, value]) => {
        var code = '"'+key+' '+value+'"';
        if(key == 'firstName' || key == 'nickName' || key == 'middleName' || key == 'lastName' || key == 'birthDate' || key == 'localAnestheticOthers' || key == 'ifSoWhat'|| key == 'ifSoWhatPreEx'|| key == 'address' || key == 'company' || key == 'occupation' || key == 'signatureLink' || key == 'ifSoWhatMedicine' || key == 'highBloodPressureText'  || key == 'emergency'  || key == 'newSigner' || key == 'relationshipToPatient' || key == 'referredBy' || key == 'relationship' || key == 'emergencyMobileNo') {
          console.log(key);
          if(key == 'signatureLink') {
            // if(value !== '') {
            //   $("#signature-Link").attr("src", value);
            // } else {
            //   $("#signature-Link").attr("src", "/images/sig-placeholder.png");
            // }
          } else {
          if(value > "") {
            document.getElementById(key).value = value; 
          }
            width = $(window).width();
            if(width < 400) {
              if(key == "ifSoWhatMedicine") {
                document.getElementById("ifSoWhatMedicineMobile").value = value; 
              }
              if(key == "ifSoWhat") {
                document.getElementById("ifSoWhatMobile").value = value; 
              }
            }
          }
        } else {
          $('#'+key+value).prop('checked', true);
        }
        $("#"+key).html(value);
      });
      $("#consentHtml").html(data.ConsentHtml);
      // $(".sig-area").html("<img class='patient-signature' src='../upload/"+data.signatureLink+"' />");
      // $(".sig-area").html("<img class='patient-signature' src='"+data.signatureLink+"' />");

        document.getElementById("patient_id").value = patient_id;
        $("#add-treatment-record").attr("onclick", "addTreatmentRecord("+patient_id+")");
        $("#submit-patient-treatment-record").attr("onclick", "addTreatmentRecordProcess("+patient_id+")");

        $(".progress").addClass("d-none");
        $(".preloader-wrapper").addClass("d-none");

         //signature link
         if(data.signatureLink !== '') {
          $("#signature-Link").attr("src", data.signatureLink);
        } else {
          $("#signature-Link").attr("src", "/images/sig-placeholder.png");
        }

        $("#file-html").html(data.FileHtml);
      console.log(data.FileHtml);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
  });

 $("#t-date").addClass("active");

}

function addTreatmentRecord(patient_id) {
  $(".drawing-section").html("");
  document.getElementById("drawing_link").value = "";
  document.getElementById("add-treatment-record-form").reset();
  $('#modal-add-treatment-record').modal('open');
}

function eraseRecallDate() {
   document.getElementById("edit-recall-date").value = "";
  
}

function showInstallment(id) {
      $.ajax({
    type: "get",
    url: '/view-installment/'+ id,
    data:  $("").serialize(),
    success: function (data) {
       $("#installmentHtml").html(data.installmentHtml);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
  });
}

function modifyInstallmentRecord(id) {
  $('#modal-modify-installment-record').modal('open');
  document.getElementById("installment_id").value = id;
  document.getElementById("edit_installment_record_id").value = id;
  $("#label-modify-install-record-paid").addClass("active");
  
    $.ajax({
    type: "get",
    url: '/populate-installment-record-item/'+ id,
    data:  $("").serialize(),
    success: function (data) {
        console.log(data.installmentData);
        console.log(data.installmentData.amount);

      document.getElementById("edit-datepicker-installment-record").value = data.installmentData.date;
      const inputElement = document.querySelector('.modify-paid');
        if (inputElement) {
          const paid = data.installmentData.paid;
          inputElement.value =  data.installmentData.paid;
          inputElement.value = paid.toLocaleString('en', {maximumSignificantDigits : 21});

        }
      document.getElementById("edit-note-install").value =  data.installmentData.note;
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
  });

}


function saveModifyInstallmentRecord() {
        $.ajax({
    type: "get",
    url: '/update-installment-record/',
    data:  $("#modify-installment-record-form").serialize(),
    success: function (data) {
  $('#modal-modify-installment-record').modal('close');
      $(".card-alert.card.green").removeClass("hide");
      $(".card-alert.card.green p").html(data.message);
      setTimeout(function(){ 
      $(".card-alert.card.green").addClass("hide");
       }, 3000);

      var patient_id = document.getElementById("patient_id").value;
      showInstallment(patient_id);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
  });
}


function modifyInstallment(id) {
  $('#modal-modify-installment').modal('open');
  document.getElementById("installment_id").value = id;
  document.getElementById("edit_installment_patient_id").value = id;
}

function editInstallment() {

  $("#label-install-date").addClass("active");
  $("#label-install-amount").addClass("active");
  $("#label-install-note").addClass("active");

 var installment_id = document.getElementById("installment_id").value;
  $.ajax({
    type: "get",
    url: '/populate-installment/'+ installment_id,
    data:  $("").serialize(),
    success: function (data) {
        console.log(data.installmentData);
        console.log(data.installmentData.amount);

      document.getElementById("edit-datepicker").value = data.installmentData.date;
      const inputElement = document.querySelector('.edit-amount-install');
        if (inputElement) {
          const amount = data.installmentData.amount;
          inputElement.value =  data.installmentData.amount;
          inputElement.value = amount.toLocaleString('en', {maximumSignificantDigits : 21});

        }
      document.getElementById("edit-note-install").value =  data.installmentData.note;



    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
  });
  $('#modal-modify-installment').modal('close');
  $('#modal-edit-installment').modal('open');
}


function saveEditInstallment() {
    $.ajax({
    type: "get",
    url: '/save-edit-installment/',
    data:  $("#editing-installment-form").serialize(),
    success: function (data) {
     $(".card-alert.card.green").removeClass("hide");
      $(".card-alert.card.green p").html(data.message);
      setTimeout(function(){ 
      $(".card-alert.card.green").addClass("hide");
       }, 3000);
       $('#modal-edit-installment').modal('close');
      var patient_id = document.getElementById("patient_id").value;
       showInstallment(patient_id);

    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
  });
}



function removeInstallment() {
  $('#modal-modify-installment').modal('close');
  var installment_id = document.getElementById("installment_id").value;

   $.ajax({
    type: "get",
    url: '/remove-installment/'+ installment_id,
    data:  $("").serialize(),
    success: function (data) {

     $(".card-alert.card.green").removeClass("hide");
      $(".card-alert.card.green p").html(data.message);
      setTimeout(function(){ 
      $(".card-alert.card.green").addClass("hide");
       }, 3000);
      var patient_id = document.getElementById("patient_id").value;
       showInstallment(patient_id);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
  });


}

function addInstallmentRecordForm(installment_id) {
  $('#modal-add-installment-record').modal('open');
  $("#label-install-record-date").addClass("active");
  $("#label-install-record-paid").addClass("active");

    document.getElementById("edit_installment_id").value = installment_id;
   $.ajax({
    type: "get",
    url: '/populate-installment-record/'+ installment_id,
    data:  $("").serialize(),
    success: function (data) {
        console.log(data.installmentData);
        console.log(data.installmentData.note);
      $(".title-installment-record").html("Adding payment for "+data.installmentData.note);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
  });
}



function saveNewInstallmentRecord() {
  $('#modal-add-installment-record').modal('close');

   $.ajax({
    type: "get",
    url: '/save-installment-record/',
    data:  $("#editing-installment-record-form").serialize(),
    success: function (data) {
        $(".card-alert.card.green").removeClass("hide");
      $(".card-alert.card.green p").html(data.message);
      setTimeout(function(){ 
      $(".card-alert.card.green").addClass("hide");
       }, 3000);
       
      var patient_id = document.getElementById("patient_id").value;
       showInstallment(patient_id);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
  });
}


function saveInstallment() {
   var patient_id = document.getElementById("patient_id").value;

    $.ajax({
    type: "get",
    url: '/save-installment/'+patient_id,
    data:  $("#add-installment-record-form").serialize(),
    success: function (data) {
      showInstallment(patient_id);
      console.log(data);
      // $("#add-installment-record-form").addClass("d-none");
      $(".card-alert.card.green").removeClass("hide");
      $(".card-alert.card.green p").html("Installment has been added!");
      setTimeout(function(){ 
      $(".card-alert.card.green").addClass("hide");
       }, 3000);
       $("#installmentHtml").html(data.installmentHtml);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
  });
}


function addTreatmentRecordProcess(patient_id) {

  $(".progress").removeClass("d-none");
  $(".preloader-wrapper").removeClass("d-none");
  $("#submit-patient-treatment-record").css('cursor', 'not-alled');
  $("#submit-patient-treatment-record").css('pointer-events', 'none');
  $("#submit-patient-treatment-record").css('background-color', 'rgb(235 176 205)');
  $("#submit-patient-treatment-record").html('Please wait');
    // var txt;
    // txt = document.getElementById('procedureTextarea').value;
    // va text = txt.split(".");
    // var str  text.join('.</br>');
    // document.write(str);
    // alert(str);



  var datepicker = document.getElementById("datepicker").value;
  console.log(datepicker);
  if(datepicker !== '') {
    $.ajax({
    type: "post",
    url: '/add-treatment-record-process',
    data:  $("#add-treatment-record-form").serialize(),
    success: function (data) {
       $(".drawing-section-main").html("");
      $('#modal-add-treatment-record').modal('close');
      $(".card-alert.card.green").removeClass("hide");

      $(".card-alert.card.green p").html("Patient treatment record successfully added!");
      setTimeout(function(){ 
      $(".card-alert.card.green").addClass("hide");
       }, 3000);

       document.getElementById("add-treatment-record-form").reset();

       $(".progress").addClass("d-none");
        $(".preloader-wrapper").addClass("d-none");
        $("#submit-patient-treatment-record").css('cursor', 'pointer');
        $("#submit-patient-treatment-record").css('pointer-events', 'unset');
        $("#submit-patient-treatment-record").css('background-color', '#ff4081');
        $("#submit-patient-treatment-record").html('Add');
       view(patient_id);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);
    },
  });

  } else {
    $(".card-alert.card.green").removeClass("hide");
    $(".card-alert.card.green p").html("Date is required!");
      setTimeout(function(){ 
      $(".card-alert.card.green").addClass("hide");
       }, 3000);
  }

}




// Jquery Dependency
$( document ).ready(function() {
  $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd'
})
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, options);
  });


$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
      console.log(this.value);
  
        const elements1 = document.getElementsByClassName("amount-charge1");
        if (elements1.length > 0) {
           var  charge1Value = elements1[0].value.replace(/,/g, ""); 
          //  let charge1ValueFinal =  charge1Value.replace(/,/g, "");
           console.log(charge1Value);
        $("#label-balance").addClass("active");

        } 

          const elements2 = document.getElementsByClassName("amount-paid1");
        if (elements2.length > 0) {
           var  paid1Value = elements2[0].value.replace(/,/g, ""); 
          //  let paid1ValueFinal =  paid1Value.replace(/,/g, "");
        console.log(paid1Value);
        $("#label-balance").addClass("active");
        } 

        const balance = parseInt(charge1Value) - parseInt(paid1Value);
        console.log(balance);

        const inputElements = document.getElementsByClassName('amount-balance1');
          if (inputElements.length > 0) {
          inputElements[0].value = balance.toLocaleString('en', {maximumSignificantDigits : 21});
      }
    }
});

$("input[data-type='currency-initial-payment']").on({
  keyup: function() { 
      var val = document.getElementById("initial-payment").value;
      console.log(val);
      var val = document.getElementById("initial-payment").value = val;
      formatCurrency($(this));
    }
});
$("input[data-type='currency-total-payment']").on({
  keyup: function() { 
      var val = document.getElementById("total-payment").value;
      console.log(val);
      var val = document.getElementById("total-payment").value = val;
      formatCurrency($(this));
    }
});



function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}
function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "" + left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "" + input_val;
    
    // final formatting
    if (blur === "blur") {
      input_val += "";
    }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}
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
  // document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  // + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write som text 
  if (distance < 0) {
    clearInterval(x);
    // document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);


$("input").on({
    keyup: function() {
      alert(this);
    }
});



</script>
