{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Patient Records')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom/custom1.css?v=1.0')); ?>">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/select.dataTables.min.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/data-tables.css')}}">
@endsection
<style type="text/css">

.waves-effect.waves-block.waves-light.profile-button {
      height: 64px;
      padding-top: 18px !important;
  }
.tbl-title {
  color: #ffffff;
  height: 60px;
  padding: 15px !important;
}
#main .section-data-tables .dataTables_wrapper .dataTables_paginate .paginate_button:hover, #main .section-data-tables .dataTables_wrapper #page-length-option_paginate .paginate_button:hover, #main .section-data-tables .dataTables_wrapper .dataTables_paginate .paginate_button.current, #main .section-data-tables .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover, #main .section-data-tables .dataTables_wrapper #page-length-option_paginate .paginate_button.current, #main .section-data-tables .dataTables_wrapper #page-length-option_paginate .paginate_button.current:hover {
   background-color: #a28e85 !important;
}
</style>
{{-- page content --}}
@section('content')
<div class="section section-data-tables page-patient-records">

















  <div class="section section-data-tables">
  <!-- DataTables example -->
  <div class="row">
    <div class="col s12 m12 l12">
      <div id="button-trigger" class="card card card-default scrollspy">
          <h5 class="task-card-title mb-3 pink tbl-title">Patient List</h5>

        <div class="card-content">
          <div class="row">
            <div class="col s12">
              <table id="page-length-option" class="display">
                <thead>
                  <tr>
                    <th><b>Patient Name</b></th>
                    <th><b>Last Visit</b></th>
                    <th><b>Balance</b></th>
                    <th id="myClickableDiv"><b>Last Update</b></th>
                   
                  </tr>
                </thead>
                <tbody>
                @foreach($latestPatient as $key => $data)
                  <tr>
                    <td><a href="/patient/{{$data->id}}" class="brown-text"><b>{{$data->lastName}}, {{ $data->firstName}}</b></a></td>
                    <td>{{$data->last_visit_formatted}}</td>
                    <td>{{$data->balance}}</td>
                    <td>
                      <span id="orig" style="color: transparent;position: absolute;">{{$data->updated_at}}</span>
                      <span id="second" class="second">{{$data->timeAgo}}</span>
                    </td>
                
                  </tr>
               @endforeach
                
                </tbody>
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





  <div style="bottom: 50px; right: 19px;" class="fixed-action-btn direction-top"><a
        class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow"><i
            class="material-icons">add</i></a>
      <ul>
         <!-- <li><a href="{{asset('css-helpers')}}" class="btn-floating blue"><i class="material-icons">help_outline</i></a>
         </li>
         <li><a href="{{asset('cards-extended')}}" class="btn-floating green"><i class="material-icons">widgets</i></a>
         </li>
         <li><a href="{{asset('app-calendar')}}" class="btn-floating amber"><i class="material-icons">today</i></a></li> -->
         <li><a href="{{asset('add-patient')}}" class="btn-floating red"><i class="material-icons">airline_seat_flat_angled</i></a>
         </li>
      </ul>
   </div>
  <!-- Multi Select -->
<!-- Modal Structure -->
  <div id="modal1" class="modal">
          <div class="modal-content pt-2">
            <div class="row" id="patient-info">
              <div class="col s12">
                <a class="modal-close right"><i class="material-icons">close</i></a>
              </div>
              <div class="col m4 s12">
                <div id="borderless-table" class="card card-tabs">
                  <div class="card-content modal-patient" style="min-height: 470px; display: block;">
                    <div class="row">
                      <div class="col s12">
                        <h5>Patient Information</h5>
                      </div>
                      <div class="col s12 mb-5">
                        <div id="profilePictureLink">
                        </div>
                      </div>
                      <div class="col s12 mt-5">
                        <div class="input-field col s12 m12 ">
                          <a href="#" id="upload-url">
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
                      <div id="view-borderless-table" class="active">
                        <div class="row">
                          <div class="col s12">
                            <a class="btn-floating waves-effect blue waves-light float-right" id="edit_id" href="">
                              <i class="material-icons">edit</i>
                            </a> 
                            
                            @if($userType == '1')
                                <a class="btn-remove-patient-record waves-effect blue waves-light btn-floating mb-1 btn-small waves-effect waves-light mr-1 float-right modal-trigger"  id="remove-patient-record"  href="#modal-remove-patient-record" onclick="removePatientRecord({{$data->id}})">
                                  <i class="material-icons">clear</i>
                                </a> 
                                @else
                            
                              @endif

                            <h5>Name : <span id="firstName"></span> <span id="lastName"></span></h5>
                            <p>Address : <span id="address"></span></p>

                            <p>Mobile Number: <span class="green-text"><b><span id="mobile"></span></b></span></p>
                            <hr class="mb-5">
                          </div>
                          <div class="col s12">
                            <table>
                              <tbody>
                                <tr>
                                  <td>Age:</td>
                                  <td><b><span class="green-text" id="age"></span></b></td>
                                  <td>Sex:</td>
                                  <td><b><span class="green-text" id="sex"></span></b></td>
                                </tr>
                                <tr>
                                  <td>Civil status:</td>
                                  <td><b><span class="green-text" id="status"></span></b></td>
                                  <td>Occupation:</td>
                                  <td><b><span class="green-text" id="occupation"></span></b></td>
                                </tr>
                                <tr>
                                  <td>Company:</td>
                                  <td><b><span class="green-text" id="company"></span></b></td>
                                  <td>Referred by:</td>
                                  <td><b><span class="green-text" id="referredBy"></span></b></td>
                                </tr>
                                <tr>
                                  <td colspan="2">Incase of emergenct, please contact:</td>
                                  <td colspan="2"><b><span class="green-text" id="emergency"></span></b></td>
                                </tr>
                                <tr>
                                  <td>Relationship:</td>
                                  <td><b><span class="green-text" id="relationship"></span></b></td>
                                  <td>Mobile No.:</td>
                                  <td><b><span class="green-text" id="emergencyMobileNo"></span></b></td>
                                </tr>
                                <!-- <tr>
                                  <td>Mobile No.:</td>
                                  <td><b><span class="green-text" id="emergencyMobileNo"></span></b></td>
                                  <td></td>
                                  <td></td>
                                </tr> -->
                              </tbody>
                            </table>
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
                <h5>$399.00 <span class="prise-text-style ml-2">$459.00</span></h5>
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
                        <div class="col s12 m12 l10 p-0">
                        <ul class="tabs">
                        <li class="tab col s3 p-0"><a class="active p-0" href="#view-badges">Medical History</a></li>
                            <li class="tab col s4 p-0"><a class="p-0" href="#html-badges" id="treatment-record">Treatment Records</a></li>
                            <li class="tab col s1 p-0"><a class="p-0" href="#view-files">Files</a></li>
                            <li class="tab col s4 p-0"><a class="p-0" href="#view-contract-consent">Contracts & Consents</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div id="view-badges">
                      <div class="row">
                        <div class="col s12">
                        </div>
                        <div class="col s12">
                        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">MEDICAL HISTORY</h4>
              </div>
             
            </div>
          </div>
          <div id="html-view-validations add-patient-form">
              <div class="row">
                <div class="col s4 mobile-remove">
                     <p>Yes &nbsp;&nbsp;&nbsp;No </p>
                </div>
                <div class="col s4 mobile-remove">
                     <p>Yes &nbsp;&nbsp;&nbsp;No </p>
                </div>
                <div class="col m4 s12 mobile-remove pr-0">
                <p>Yes &nbsp;&nbsp;&nbsp;No &nbsp;&nbsp;&nbsp; <span class="fs-10">Do you have any allergies?</span></p>
                </div>
                <div class="col s2 d-none mobile-display">
                     <p>Yes</p>
                </div>
                <div class="col s2 d-none mobile-display">
                     <p>No</p>
                </div>
                <div class="col s12 m4">
                    <div class="row">
                      <div class="col m2 s2">
                        <input name="rheumaticFever" type="radio" value="true" id="rheumaticFevertrue"/>
                      </div>
                      <div class="col m2 s2">
                      <input name="rheumaticFever" type="radio" value="false" id="rheumaticFeverfalse"/>
                      </div>
                      <div class="col m8 s8">
                      <div>Rheumatic Fever</div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="liverDisease" type="radio" value="true" id="liverDiseasetrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="liverDisease" type="radio" value="false" id="liverDiseasefalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>Liver Disease</div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="penicillin" type="radio" value="true" id="penicillintrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="penicillin" type="radio" value="false" id="penicillinfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>Penicillin</div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="aHeartCondition" type="radio" value="true" id="aHeartConditiontrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="aHeartCondition" type="radio" value="false" id="aHeartConditionfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>A Heart Condition</div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="stomachUlcer" type="radio" value="true" id="stomachUlcertrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="stomachUlcer" type="radio" value="false" id="stomachUlcerfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Stomach Ulcer
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="otherAntibiotics" type="radio" value="true" id="otherAntibioticstrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="otherAntibiotics" type="radio" value="false" id="otherAntibioticsfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Other antibiotics
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="diabetes" type="radio" value="true" id="diabetestrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="diabetes" type="radio" value="false" id="diabetesfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Diabetes
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="hayFever" type="radio" value="true" id="hayFevertrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="hayFever" type="radio" value="false" id="hayFeverfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Hay Fever
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="localAnesthetic" type="radio" value="true" id="localAnesthetictrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="localAnesthetic" type="radio" value="false" id="localAnestheticfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                        Local Anesthetic
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="kidneyDisease" type="radio" value="true" id="kidneyDiseasetrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="kidneyDisease" type="radio" value="false" id="kidneyDiseasefalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Kidney Disease
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="arthritis" type="radio" value="true" id="arthritistrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="arthritis" type="radio" value="false" id="arthritisfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                        Arthritis
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                    </div>
                    <div class="col m2 s2">
                    Others
                    </div>
                    <div class="col m8 s6">
                      <div>
                      <input class="validate"  id="localAnestheticOthers" name="localAnestheticOthers" type="text" style="height: 20px;margin-left: 15px;">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="highBloodPressure" type="radio" value="true" id="highBloodPressuretrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="highBloodPressure" type="radio" value="false" id="highBloodPressurefalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                        High Blood Pressure<br>
                        <input class="validate"  id="highBloodPressureText" name="highBloodPressureText" type="text" style="height: 18px;position: absolute;width: 100px;margin-left: 3px;font-size: 10px;">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="rheumatism" type="radio" value="true" id="rheumatismtrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="rheumatism" type="radio" value="false" id="rheumatismfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Rheumatism
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="takingMedicine" type="radio" value="true" id="takingMedicinetrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="takingMedicine" type="radio" value="false" id="takingMedicinefalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Are you taking medicine at present?
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4 d-none mobile-display">
                  <div class="row">
                    <div class="col m5 s4">
                    </div>
                    <div class="col m7 s8">
                      <div>
                     if so, what?
                      <input class="validate"  id="ifSoWhatMedicineMobile" name="ifSoWhatMedicineMobile" type="text" style="height: 20px">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                <div class="row">
                    <div class="col m2 s2">
                      <input name="anemia" type="radio" value="true" id="anemiatrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="anemia" type="radio" value="false" id="anemiafalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Anemia
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                <div class="row">
                    <div class="col m2 s2">
                      <input name="tonsilitis" type="radio" value="true" id="tonsilitistrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="tonsilitis" type="radio" value="false" id="tonsilitisfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Tonsilitis
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4 mobile-remove">
                  <div class="row">
                    <div class="col m4 s2">
                    </div>
                    <div class="col m8 s12">
                      <div>
                      if so, what?
                      <input class="validate"  id="ifSoWhatMedicine" name="ifSoWhatMedicine" type="text" style="height: 20px">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col s12 m4">
                <div class="row">
                    <div class="col m2 s2">
                      <input name="hepatitis" type="radio" value="true" id="hepatitistrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="hepatitis" type="radio" value="false" id="hepatitisfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Hepatitis
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                <div class="row">
                    <div class="col m2 s2">
                      <input name="glaucoma" type="radio" value="true" id="glaucomatrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="glaucoma" type="radio" value="false" id="glaucomafalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Glaucoma
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="treatedByAPhysician" type="radio" value="true" id="treatedByAPhysiciantrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="treatedByAPhysician" type="radio" value="false" id="treatedByAPhysicianfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Are you being treated by a Physician?
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4 d-none mobile-display">
                  <div class="row">
                    <div class="col m5 s4">
                    </div>
                    <div class="col m7 s8">
                      <div>
                    if so, what?
                      <input class="validate"  id="ifSoWhatMobile" name="ifSoWhatMobile" type="text" style="height: 20px">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="asthma" type="radio" value="true" id="asthmatrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="asthma" type="radio" value="false" id="asthmafalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Asthma
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="sinusProblem" type="radio" value="true" id="sinusProblemtrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="sinusProblem" type="radio" value="false" id="sinusProblemfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Sinus Problem
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4 mobile-remove">
                  <div class="row">
                    <div class="col m4 s8">
                    </div>
                    <div class="col m8 s4">
                      <div>
                     if so, what?
                      <input class="validate"  id="ifSoWhat" name="ifSoWhat" type="text" style="height: 20px">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="epilepsy" type="radio" value="true" id="epilepsytrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="epilepsy" type="radio" value="false" id="epilepsyfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                        Epilepsy
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="bleedingDisorder" type="radio" value="true" id="bleedingDisordertrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="bleedingDisorder" type="radio" value="false" id="bleedingDisorderfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Bleeding Disorder
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                  <div class="col m2 s2">
                      <input name="previousExtraction" type="radio" value="true" id="previousExtractiontrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="previousExtraction" type="radio" value="false" id="previousExtractionfalse"/>
                    </div>
                    <div class="col m5 s8" style="font-size: 11px;">
                    Previous Extraction?
                    </div>
                    <div class="col m3 s8 p-0">
                      <div>
                        <input class="validate"  id="ifSoWhatPreEx" name="ifSoWhatPreEx" type="text" style="height: 20px">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="faintingHistory" type="radio" value="true" id="faintingHistorytrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="faintingHistory" type="radio" value="false" id="faintingHistoryfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Fainting History
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="enlargedAdenoids" type="radio" value="true" id="enlargedAdenoidstrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="enlargedAdenoids" type="radio" value="false" id="enlargedAdenoidsfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Enlarged Adenoids
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4 mobile-remove">
                  <div class="row">
                    <div class="col m12 s12">
                      FOR WOMEN:
                    </div>
                  </div>
                </div>
                <div class="col m12">
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="venerealDisease" type="radio" value="true" id="venerealDiseasetrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="venerealDisease" type="radio" value="false" id="venerealDiseasefalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Venereal Disease
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                 <div class="row">
                    <div class="col m2 s2">
                      <input name="allergies" type="radio" value="true" id="allergiestrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="allergies" type="radio" value="false" id="allergiesfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Allergies
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="pregnant" type="radio" value="true" id="pregnanttrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="pregnant" type="radio" value="false" id="pregnantfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Pregnant? <span class="d-none mobile-display">(For Women)</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="thyroidDisease" type="radio" value="true" id="thyroidDiseasetrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="thyroidDisease" type="radio" value="false" id="thyroidDiseasefalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Thyroid Disease
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                 <div class="row">
                    <div class="col m2 s2">
                      <input name="nervousDisorder" type="radio" value="true" id="nervousDisordertrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="nervousDisorder" type="radio" value="false" id="nervousDisorderfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Nervous Disorder
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="bleeding" type="radio" value="true" id="bleedingtrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="bleeding" type="radio" value="false" id="bleedingfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Bleeding? <span class="d-none mobile-display">(For Women)</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="tuberculosis" type="radio" value="true" id="tuberculosistrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="tuberculosis" type="radio" value="false" id="tuberculosisfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Tuberculosis
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                 <div class="row">
                    <div class="col m2 s2">
                      <input name="clottingDisorder" type="radio" value="true" id="clottingDisordertrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="clottingDisorder" type="radio" value="false" id="clottingDisorderfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      Clotting Disorder
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col m2 s2">
                      <input name="noMenstruation" type="radio" value="true" id="noMenstruationtrue"/>
                    </div>
                    <div class="col m2 s2">
                    <input name="noMenstruation" type="radio" value="false" id="noMenstruationfalse"/>
                    </div>
                    <div class="col m8 s8">
                      <div>
                      No Menstruation? <span class="d-none mobile-display">(For Women)</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4">
                
                </div>
                <div class="col s12 m4">
                  
                </div>
            
                <div class="col s12 mt-5">
                  <p style="text-align: justify;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I hereby consent to the performance upon myself of the recommended operations & or treatments that may be considered necessary to restore my oral and dental health. This consent is given freely and voluntarily and whatever the result of any intervention or treatment maybe, I absolve my dentist from any liability or responsibility.
                  Furthermore, I am willing to pay for all the services rendered to me.
                  </b></p>
                  </div>
                  <div class="row">
                    <div class="col s12 m9">
                    </div>
                    <div class="col s12 m3 text-center">
                          <div class="sig-area">
                            <img src="" id="signature-Link" value="" style="width: 100%;"/>
                          </div>
                          <span id="signerName"></span>
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
                          <input type="hidden" name="upload_location" id="upload_location" value="modal" />
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
                                  <input type="file" name="file" class="custom-file-input" id="chooseFile">
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
                        <tbody id="fileHtml">
                        </tbody>
                      </table>
                      
                    </div>
                    <div id="html-badges">
                      <div class="row">
                        <div class="col s12">
                          <div class="card">
                            <div class="card-content">
                              <h4 class="card-title">TREATMENT RECORD</h4>
                              <div class="row">
                                <div class="col s12 treatment-scroll">
                                  <table id="treatment-tbl" class="" >
                                    <thead style="visibility: hidden;">
                                      <tr>
                                        <th id="record-table">Date</th>
                                        <th>Procude</th>
                                        <th>Amount Charged</th>
                                        <th>Amount Paid</th>
                                      </tr>
                                    </thead>
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
                                    <a class="modal-trigger" href="#modal-contract-consent">
                                      <div class="card-panel card-content center-align">
                                        <h5><b>Informed Consent 1</b></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-informed-consent">
                                      <div class="card-panel card-content center-align">
                                        <h5><b>Informed Consent 2</b></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-instruction-veneers">
                                      <div class="card-panel card-content center-align">
                                        <h5><b>Post Op Instructions for Dental Veneers</b></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-instruction-laser-whitening">
                                      <div class="card-panel card-content center-align">
                                        <h5><b>Post Op Instructions for Teeth Whitening</b></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-home-care-instruction">
                                      <div class="card-panel card-content center-align">
                                        <h5><b>Post Op Instruction for Braces</b></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-orthodontic-braces-contract">
                                      <div class="card-panel card-content center-align">
                                        <h5><b>Orthodontic Braces Contract</b></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-kinnie-funt">
                                      <div class="card-panel card-content center-align">
                                        <h5><b>Kinnie Funt</b></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-post-op-instruction-tooth-extraction">
                                      <div class="card-panel card-content center-align">
                                        <h5><b>Post Op Instruction for Tooth Extraction</b></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                                <div class="col s12 m4">
                                  <div class="card card-hover z-depth-0 card-border-gray">
                                    <a class="modal-trigger" href="#modal-oral-diagnosis">
                                      <div class="card-panel card-content center-align">
                                        <h5><b>Oral Diagnosis</b></h5>
                                      </div>
                                    </a>
                                  </div>
                                </div>
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

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="modal-add-treatment-record" class="modal modal-fixed-footer">
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
    <!-- Alerts -->
    <div class="card-alert card green lighten-5 hide">
      <div class="card-content green-text">
        <p></p>
      </div>
      <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      </div>
    <!-- Modal  -->
  <div id="modal-view-file" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4></h4>
      <p></p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
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
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat "><button id="clear" class="btn btn-danger btn-sm">Close</button></a>
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
                <div style="font-family: Arial;">
                <img src="https://sagundentalclinic.com/images/banner.jpg" style="width: 100%;" />
                <p style="line-height: 1.3;display: flex;margin-top: 35px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I am <span style="text-align: center;width: 54%;display: inline-block;border-bottom: 1px solid;height: 22px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="firstName"></span> <span id="lastName"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>, <span style="text-align: center;width: 15%;display: inline-block;border-bottom: 1px solid;height: 22px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$data->age}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> year of age, with<br>
                </p>
                <p style="line-height: 1.3;display: flex;">
                  <table style="width: 100%;font-family: Arial;">
                    <tr style="border-bottom: none;">
                      <td style="padding: 0;width: 26%;">
                       residential Address at
                      </td>
                      <td style="padding: 0;width: 74%;">
                          <span style="text-align: center;display: inline-block;height: 22px;border-bottom: 1px solid;" id="address"></span><br>
                      </td>
                    </tr>
                  </table>
                </p>
                <p style="line-height: 1.3;display: flex;">
                Received this/these kind of treatment<br>
                </p>
                <p style="line-height: 1.3;padding-top: 0;">
                <table style="width: 100%;border-bottom: 1px solid;font-family: Arial;">
                  <tr style="border-bottom: none;">
                  <td style="padding: 5px;">
                    <span id="kind_treatment" style="width: 100%;display: block;text-align: left;height:23px;position: relative;"> <input type="text" name="kind_treatment" style="text-align: left;height: 25px;border-bottom: none;" id="kind-treatment" ></span>
                  </td>
                  </tr>
                </table>
                </p>
                <p style="padding-top: 25px;line-height: 1;display: flex;">
                The total amount is <span id="total_payment" style="border-bottom: 1px solid;width: 181px;display: block;text-align: center;height:23px;position: relative;"> <input type="text" name="total_payment" style="text-align: center;height: 25px;border-bottom: none;" id="total-payment"  data-type="currency-total-payment" value=""></span>, Initial payment <span id="initial_payment" style="border-bottom: 1px solid;width: 164px;display: block;text-align: center;height:23px;"> <input type="text" name="initial_payment" style="text-align: center;height: 25px;border-bottom: none;" id="initial-payment"  data-type="currency-initial-payment" value=""></span><br>
                </p>
                <p style="line-height: 1;display: flex;">
                Which is on <span id="date_on" style="border-bottom: 1px solid;width: 211px;display: block;text-align: center;height:23px;position: relative;"> <input type="text" name="date_on" style="text-align: center;height: 25px;border-bottom: none;" id="date-on" ></span>, 20<span id="year_on" style="border-bottom: 1px solid;width: 211px;display: block;text-align: left;height:25px;position: relative;"> <input type="text" name="year_on" style="text-align: left;height: 15px;border-bottom: none;" id="year-on" ></span>.
               </p>
                <p style="padding-top: 10px;line-height: 1.3;text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I understand that dentistry is not an exact science and that no dentist can properly guarantee accurate results all the time.
                </p>
                <p style="padding-top: 10px;line-height: 1.3;text-align: justify;padding-bottom: 0;margin-bottom:0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I hereby authorize any of the doctor/dental auxiliaries to proceed with & perform the dental restoration & treatment as explained to me. I undestand that are subject to
                  modification depending on undiagnosable circumstances that may arise during the course treatment. I understand I am responsible for payment of dental fees, I agree to pay any
                  attorney's fees, collection fee, or court costs that may be incurred to satisfy any obligation to this office. All or any treatment were properly explained to me & any untoward circumstances 
                  that may arise during the procedure, the attending dentis will not be held liable since it is my free will, with full truth & confidence in him/her, undergo dental treatment under his/her care.
                </p>
                <table style="width: 100%;font-family: Arial;">
                  <tr style="border-bottom: none;">
                    <td style="width: 32%;padding: 0;height: 100px;">
                      <div class="sign-area patient" style="display: none;">
                        <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('patient')">rate_review</i>
                      </div>
                      <span class="sign-area patient signature" style="text-align: center;height: 59px;display: block;"></span>
                    </td>
                    <td style="width: 10%;padding: 0;">
                    </td>
                    <td style="width: 30%;padding: 0;">
                      <div class="sign-area dentist" style="display: none;">
                      <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('dentist')">rate_review</i>
                      </div>
                      <span class="sign-area dentist signature" style="text-align: center;height: 59px;display: block;"></span>
                    </td>
                    <td style="width: 10%;padding: 0;">
                    </td>
                    <td style="width: 20%;padding: 0;vertical-align: bottom;text-align: center;">
                      <span id="signer-name" style="font-size: 16px;"><?php echo date('F j, Y'); ?></span>
                    </td>
                  </tr>
                  <tr style="border-bottom: none;">
                  <td style="border-top: 1px solid;text-align: center;">
                    <div class="resign">
                     Patient/Parent/Guardian Signature
                    </div>
                  </td>
                  <td></td>
                  <td style="border-top: 1px solid;text-align: center;">
                    <div class="resign">
                      Dentist Signature
                    </div>
                  </td>
                  <td></td>
                  <td style="border-top: 1px solid;text-align: center;">
                    Date
                  </td>
                  </tr>
                </table>
                
                <p style="padding-top: 10px;line-height: 1.7;text-align: justify;padding-bottom: 0;">
                  <table style="width: 100%;font-family: Arial;">
                    <tr style="border-bottom: none;">
                      <td style="padding: 0;width: 30%;">
                      Cellular Phone No.
                      </td>
                      <td style="border-bottom: 1px solid;padding: 0;width: 70%;">
                          <span id="mobile_num" style="width: 100%;display: block;text-align: left;height:23px;position: relative;"> <input type="text" name="mobile_num" style="text-align: left;height: 25px;border-bottom: none;" id="mobile-num" ></span>
                    </td>
                    </tr>
                  </table>
                </p> 
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('informed-consent-1')">Save</button>
    </div>
  </div>

   <!-- Modal -->
   <div id="modal-informed-consent" class="modal">
    <div class="modal-content pb-0">
  
            <form id="form-consent" method="post">
             @csrf
              <input type="hidden" name="html" id="informed_html" value=""/>
              <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
              <div class="wrapper mb-5">
              <div style="font-family: Arial;">
                <img src="https://sagundentalclinic.com/images/banner.jpg" style="width: 100%;" />
                  <h3 style="text-align: center;margin: 23px;">INFORMED CONSENT</h3>
                  <p>
                      Name: <strong><span id="firstName"></span> <span id="lastName"></span></strong><br>
                      Age: <strong><span id="age"></span></strong><br>
                      Address: <strong><span id="address"></span></strong>
                  </p>
                  <p style="line-height: 2;margin-top: 35px;text-align: justify;"> 
                    I understand that <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sagun Dental Clinic&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> will use his knowledge, skill and training to do very best, but that relapse of treatment results is possible. Very severe problems have a tendency to relapse and most common area for relapse is the lower front teeth. Full cooperation in wearing retaining appliences is essential in minimizing 
                    this relapse. If retaining appliences are lost or broken and not reported immediately so new ones can be formed, relapse changes may occur requiring active appliance reinsertion and an additional fee for correction.
                  </p>
              
                <table style="width: 100%;font-family: Arial;">
                  <tr style="border-bottom: none;">
                  <td style="width: 30%;padding: 0;">
                    </td>
                    <td style="width: 32%;padding: 0;">
                      <div class="sign-area patient2" style="display: none;">
                        <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('patient2')">rate_review</i>
                      </div>
                      <span class="sign-area patient2 signature" style="text-align: center;height: 85px;display: block;"></span>
                    </td>
                    <td style="width: 10%;padding: 0;">
                    </td>
                  
                    <td style="width: 20%;padding: 0;vertical-align: bottom;text-align: center;">
                      <span id="signer-name" style="font-size: 16px;"><?php echo date('F j, Y'); ?></span>
                    </td>
                  </tr>
                  <tr style="border-bottom: none;">
                  <td></td>
                  <td style="border-top: 1px solid;text-align: center;">
                    <div class="resign">
                     Patient/Parent/Guardian Signature
                    </div>
                  </td>
            
                  <td></td>
                  <td style="border-top: 1px solid;text-align: center;">
                    Date
                  </td>
                  </tr>
                </table>
              </div>
           </form>
      </div>
      <div class="modal-footer">
        <button id="" class="btn btn-danger btn-sm" onclick="saveConsent('informed-consent-2')">Save</button>
      </div>
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
            <img src="https://sagundentalclinic.com/images/banner.jpg" style="width: 100%;" />
              <!-- <h3 style="text-align: center;margin: 23px;">INFORMED CONsENT</h3> -->
              <p>
                  Name: <strong><span id="firstName"></span> <span id="lastName"></span></strong><br>
                  Age: <strong><span id="age"></span></strong><br>
                  Address: <strong><span id="address"></span></strong>
              </p>
              <p style="line-height: 2;margin-top: 35px;text-align: justify;"> 
                INSTRUCTIONS to follow after installation of Dental Veneers  
              </p>
              <p style="line-height: 2;text-align: justify;"> 
                <ul class="disc">
                  <li>
                    Avoid chewing excessively hard foods on the veneered teeth (hard candy, raw carrots etc.) material can break under extreme forces.
                  </li>
                  <li>
                    Proper brushing, flossing, and regular cleanings are essential to the long-term stability and appearance of your veneers
                  </li>
                  <li>
                    The gums may recede from the veneers, displaying discolored tooth structure underneath. This situation usually takes place after many years and requires veneers replacement.
                  </li>
                  <li>
                    Often, problems that may develop with the veneers can be found at an early stage and repaired easily, while waiting for a longer time may require replacing entire restorations.
                  </li>
                </ul>
                
              </p>
              <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
                  <strong>Important note:</strong>
                  <br>
                  <strong>For composite veneers only</strong>
                  <ul class="number">
                    <li style="list-style-type: decimal">Long term results of the shade vary from patient to patient. This can depend including habits such as smoking or drinking colored beverages.</li>
                    <li style="list-style-type: decimal">Composite veneers materials is faster to discolor than porcelain (refrain from drinking coffee, tea or any colored beverages)</li>
                  </ul>
                  <strong>For composite and porcelain</strong>
                  <ul class="number">
                    <li style="list-style-type: decimal">Tooth sensitivity after installing veneers is normal, the pain may subside after couple of months</li>
                    <li style="list-style-type: decimal">Needs to wear mouth guard every night while sleeping (for bruxism-unconsciously grinding at night)</li>
                  </ul>
              </p>
            <table style="width: 100%;font-family: Arial;">
              <tr style="border-bottom: none;">
              <td style="width: 30%;padding: 0;">
                </td>
                <td style="width: 32%;padding: 0;">
                  <div class="sign-area patient3" style="display: none;">
                    <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('patient3')">rate_review</i>
                  </div>
                  <span class="sign-area patient3 signature" style="text-align: center;height: 85px;display: block;"></span>
                </td>
                <td style="width: 10%;padding: 0;">
                </td>
              
                <td style="width: 20%;padding: 0;vertical-align: bottom;text-align: center;">
                  <span id="signer-name" style="font-size: 16px;"><?php echo date('F j, Y'); ?></span>
                </td>
              </tr>
              <tr style="border-bottom: none;">
              <td></td>
              <td style="border-top: 1px solid;text-align: center;">
                <div class="resign">
                  Patient/Parent/Guardian Signature
                </div>
              </td>
        
              <td></td>
              <td style="border-top: 1px solid;text-align: center;">
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
            <img src="https://sagundentalclinic.com/images/banner.jpg" style="width: 100%;" />
              <!-- <h3 style="text-align: center;margin: 23px;">INFORMED CONsENT</h3> -->
              <p>
                  Name: <strong><span id="firstName"></span> <span id="lastName"></span></strong><br>
                  Age: <strong><span id="age"></span></strong><br>
                  Address: <strong><span id="address"></span></strong>
              </p>
              <p style="line-height: 2;margin-top: 35px;text-align: justify;"> 
              Instruction to follow after Teeth Laser Whitening  
              </p>
              <p style="line-height: 2;text-align: justify;"> 
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
              <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
                  <strong>Important note:</strong>
                  <br>
                  <ul class="disc">
                    <li>Long term results vary from patient to patient. This can depend on the original shade of your teeth and include habits such as smoking or drinking colored beverages (red wine, coffee, tea, etc.)</li>
                    <li>Maintenance such as whitening toothpaste is necessary.</li>
                    <li>"Touch-up" treatments may be needed every 6-12 months to retain color.</li>
                    <li>Existing fillings, crown, etc. will not whiten. Therefore, these may need to be changed in order to match your new smile.</li>
                  </ul>
                 
              </p>
            <table style="width: 100%;font-family: Arial;">
              <tr style="border-bottom: none;">
              <td style="width: 30%;padding: 0;">
                </td>
                <td style="width: 32%;padding: 0;">
                  <div class="sign-area patient4" style="display: none;">
                    <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('patient4')">rate_review</i>
                  </div>
                  <span class="sign-area patient4 signature" style="text-align: center;height: 85px;display: block;"></span>
                </td>
                <td style="width: 10%;padding: 0;">
                </td>
              
                <td style="width: 20%;padding: 0;vertical-align: bottom;text-align: center;">
                  <span id="signer-name" style="font-size: 16px;"><?php echo date('F j, Y'); ?></span>
                </td>
              </tr>
              <tr style="border-bottom: none;">
              <td></td>
              <td style="border-top: 1px solid;text-align: center;">
                <div class="resign">
                  Patient/Parent/Guardian Signature
                </div>
              </td>
        
              <td></td>
              <td style="border-top: 1px solid;text-align: center;">
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
            <img src="https://sagundentalclinic.com/images/banner.jpg" style="width: 100%;" />
              <!-- <h3 style="text-align: center;margin: 23px;">INFORMED CONsENT</h3> -->
          
              <p style="line-height: 2;margin-top: 35px;text-align: justify;"> 
              <u><i> HOME CARE INSTRUCTIONS FOR YOUR NEW BRACES </i></u>
              </p>
              <p style="line-height: 2;text-align: justify;"> 
                1. &nbsp; void any hard or sticky foods (i.e. caramel candy, corn chips, nuts, ice, etc.)
              </p>
              <p style="line-height: 2;text-align: justify;"> 
                Make sure all meats are cut off the bone and fresh fruits and vegetables are cut up into small pieces the adhesive that we use is very strong. However, excessive force when chewing particularly when teeth are initially moving may cause the adhesive and braces to become loose. If you feel a significant amount of resistance when chewing, do not bite harder, ease off on the biting pressure.
              </p>
              <p style="line-height: 2;text-align: justify;"> 
              2. &nbsp; Proper oral hygiene is very important in order to prevent any caries and decalcification.
              </p>
              <p style="line-height: 2;text-align: justify;"> 
              Sagun Dental has provided you with the proper tools to maintain excellent oral hygiene (i.e. toothbrushes, proxy brush. Floss, and wax). All of those items can be located in most stores. We also recommended that you rinse with a fluoride once a day to prevent decay and decalcification.  
              </p>
              <p style="line-height: 2;text-align: justify;"> 
              3. &nbsp;	There may bedtimes during your "active" treatment that brackets can come loose and/or arch wires may begin to poke.
              </p>
              <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
                  <strong>What can I Expect?</strong>
                  <br>
              </p>
              <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
              Tenderness of the teeth for the first 4-5 days. (Chew sugarless chewing gum to help relieve some of the tension in your teeth. Chew softer foods initially).
              </p>
              <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
              Tenderness of the insides of the lips and cheeks for 4-5 days. (Use wax applied to dried-off braces/wire ends.)
              </p>
              <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
              Some mobility of the teeth (normal during tooth movement)
              </p>
              <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
                Some teeth moving faster than others, giving the appearance of some teeth becoming crooked. Normal occurrence that will be corrected with time.
              </p>
              <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
              Loose braces are a very rare occurrence. Immediate relief can be achieved by stabilizing the loose brace in place using wax over the brace and adjacent wires.
              </p>
              <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
                  <strong>PROPER TECHNIQUE FOR PLACEMENT OF WAX IS:</strong>
                  <br>
              </p>
              <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
              Slightly wet fingers that will be used to place the wax and pinch a ball of wax out of container. Pull lip out of the way and "sick in" extra saliva in mouth to get tooth/bracket/wire very dry. Also dry target area with finger. 
              </p>
              <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
              Now apply ball of wax to target area and mold around tooth/brace/poking wire, etc. to allow it to suck.
              </p>
              <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
                <strong>APPLY WAX AS OFTEN AS NEEDED TO ENSURE COMFORN UNTIL OFFICE IS OPEN AND CAN ACCOMIDATE YOU WITH AN APPOINTMENT TO BE SOON.</strong>
              </p>
              <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
              In some instances, rubber bumper guards or blue composition bite ramps have been placed on certain teeth to prop open the bite, preventing the bite from knowing off braces on severally malposition teeth. These guards/ramps will be removed during treatment, once an improvement to the bite has occurred. 
              </p>
              <p>
                  Name: <strong><span id="firstName"></span> <span id="lastName"></span></strong><br>
                  Age: <strong><span id="age"></span></strong><br>
                  Address: <strong><span id="address"></span></strong>
              </p>
            <table style="width: 100%;font-family: Arial;">
              <tr style="border-bottom: none;">
              <td style="width: 30%;padding: 0;">
                </td>
                <td style="width: 32%;padding: 0;">
                  <div class="sign-area patient5" style="display: none;">
                    <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('patient5')">rate_review</i>
                  </div>
                  <span class="sign-area patient5 signature" style="text-align: center;height: 85px;display: block;"></span>
                </td>
                <td style="width: 10%;padding: 0;">
                </td>
              
                <td style="width: 20%;padding: 0;vertical-align: bottom;text-align: center;">
                  <span id="signer-name" style="font-size: 16px;"><?php echo date('F j, Y'); ?></span>
                </td>
              </tr>
              <tr style="border-bottom: none;">
              <td></td>
              <td style="border-top: 1px solid;text-align: center;">
                <div class="resign">
                  Patient/Parent/Guardian Signature
                </div>
              </td>
        
              <td></td>
              <td style="border-top: 1px solid;text-align: center;">
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
            <img src="https://sagundentalclinic.com/images/banner.jpg" style="width: 100%;" />
              <!-- <h3 style="text-align: center;margin: 23px;">INFORMED CONsENT</h3> -->
              <p>
                      Name: <strong><span id="firstName"></span> <span id="lastName"></span></strong><br>
                      Age: <strong><span id="age"></span></strong><br>
                      Address: <strong><span id="address"></span></strong>
                  </p>
              <p style="line-height: 2;margin-top: 35px;text-align: justify;"> 
              <u><i> POST OP INSTRUCTION (EXO) </i></u>
              </p>
              <p style="line-height: 2;text-align: justify;"> 
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
                  <span class="sign-area patient5 signature" style="text-align: center;height: 85px;display: block;"></span>
                </td>
                <td style="width: 10%;padding: 0;">
                </td>
              
                <td style="width: 20%;padding: 0;vertical-align: bottom;text-align: center;">
                  <span id="signer-name" style="font-size: 16px;"><?php echo date('F j, Y'); ?></span>
                </td>
              </tr>
              <tr style="border-bottom: none;">
              <td></td>
              <td style="border-top: 1px solid;text-align: center;">
                <div class="resign">
                  Patient/Parent/Guardian Signature
                </div>
              </td>
        
              <td></td>
              <td style="border-top: 1px solid;text-align: center;">
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
  <div id="modal-oral-diagnosis" class="modal">
    <div class="modal-content pb-0">
        <form id="form-consent" method="post">
          @csrf
          <input type="hidden" name="html" id="informed_html" value=""/>
          <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
          <div class="wrapper mb-5">
          <div style="font-family: Arial;">
            <img src="https://sagundentalclinic.com/images/banner.jpg" style="width: 100%;" />
              <!-- <h3 style="text-align: center;margin: 23px;">INFORMED CONsENT</h3> -->
          
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
                <img src="https://sagundentalclinic.com/images/banner.jpg" style="width: 100%;" />
                <h3 style="text-align: center;margin: 23px;">ORTHODONTIC TREATMENT</h3>

                <p style="line-height: 1.3;display: flex;">
                  <table style="width: 100%;font-family: Arial;">
                    <tr style="border-bottom: none;">
                      <td style="padding: 0;width: 9%;">
                        NAME:
                      </td>
                      <td style="padding: 5px;width: 91%;border-bottom: 1px solid;">
                      <span id="firstName"></span> <span id="lastName"></span>
                      </td>
                    </tr>
                    <tr style="border-bottom: none;">
                      <td style="padding: 0;width: 9%;">
                        ADDRESS:
                      </td>
                      <td style="padding: 5px;width: 91%;border-bottom: 1px solid;">
                       <span id="address"></span>
                      </td>
                    </tr>
                    <tr style="border-bottom: none;">
                      <td style="padding: 0;width: 9%;">
                        AGE:
                      </td>
                      <td style="padding: 5px;width: 91%;border-bottom: 1px solid;">
                      <span id="age"></span>
                      </td>
                    </tr>
                  </table>
                </p>
                <p style="line-height: 2;margin-top: 15px;text-align: justify;display: flex;"> 
                  <span style="display: block;padding-left:20px;position: relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>The treatment you are to receive is mainly correction of irregular teeth, as by means of braces.
                </p>
                <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
                <span style="display: block;padding-left:20px;position: relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>I understand that individual reactions to treatment can’t be predicted and that if I experienced any reactions following treatment, I agree to report them to the office as soon as possible.
                </p>
                <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
                <span style="display: block;padding-left:20px;position: relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>I understand that referrals to other dental specialists may be required e.g., an oral surgeon, etc. I further understand that despite all estimates of the success of the treatment, there are many personal biological factors that can’t be predicted in advance that may affect its success.
                </p>
                <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
                <span style="display: block;padding-left:20px;position: relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>If there is any discomfort in the joint (TMJ) during the treatment, I am to report it to the dentist as soon as possible. I understand that if this occurs, further consultation and treatment may be necessary.
                </p>
                <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
                <span style="display: block;padding-left:20px;position: relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>I have been told that the success of the treatment depends upon my cooperation in keeping scheduled appointments, following homecare instructions and reporting to the office any change in my health status. Acknowledge that no guarantees or assurance have been given by anyone regarding results that may be obtained. I also understand that if I have questions regarding the treatment I am to ask the doctor prior to signing this consent.
                </p>
                <p style="line-height: 1;margin-top: 15px;display: flex;"> 
                  The fee for Orthodontic treatment is <span id="initial_form" style="border-bottom: 1px solid;width: 65px;display: block;text-align: center;height:23px;"> <input type="text" name="initial_form" style="text-align: center;height: 13px;border-bottom: none;" id="initial-form"  data-type="currency" value=""></span> initial payment upon installation of the braces 
                </p>
                <p style="line-height: 1;text-align: justify;display: flex;"> 
             amount of <span id="monthly_checkup" style="border-bottom: 1px solid;width: 164px;display: block;text-align: center;height:23px;"> <input type="text" name="monthly_checkup" style="text-align: center;height: 13px;border-bottom: none;" id="monthly-checkup"  data-type="currency" value=""></span>
                  for monthly check up.
                </p>
                <p style="line-height: 1;margin-top: 15px;text-align: justify;display: flex;"> 
                The whole treatment is <span id="treatment_is" style="border-bottom: 1px solid;width: 134px;display: block;text-align: center;height:23px"> <input type="text" name="treatment_is" style="text-align: center;height: 13px;border-bottom: none;" id="treatment-is" data-type="currency" ></span>
                  . Oral Prophylaxis, restorations, extractions, etc. are 
                </p>
                <p style="line-height: 1;text-align: justify;display: flex;"> 
                 not included.
                </p>
                <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
                <span style="display: block;padding-left:20px;position: relative;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><strong>If any circumstances may occur (migration, etc.) as soon as the treatment has been started the total of the treatment must be settled and THERE WILL BE NO REFUND.</strong>
                </p>
                <p style="line-height: 1;margin-top: 15px;text-align: justify;display: flex;"> 
                The frequency of visits (rebond of bracket<span id="rebond_of_bracket" style="border-bottom: 1px solid;width: 71px;display: block;text-align: center;height:23px;"> <input type="text" name="rebond_of_bracket" style="text-align: center;height: 13px;border-bottom: none;" id="rebond-of-bracket"  data-type="currency-rebond-of-bracket" value=""></span>, missing brancket <span id="missing_bracket" style="border-bottom: 1px solid;width: 80px;display: block;text-align: center;height:23px;"> <input type="text" name="missing_bracket" style="text-align: center;height: 13px;border-bottom: none;" id="missing-bracket"  data-type="currency-missing-bracket" value=""></span>) 
              </p>
                <p style="line-height: 1;text-align: justify;display: flex;"> 
                  has no bearing on the monthly check up.
                </p>
                <p style="line-height: 1;text-align: justify;display: flex;"> 
                  I understand that I must wear Retainers after wearing braces to maintain the position of the corrected bite.
                </p>
                <p style="line-height: 1;text-align: justify;display: flex;"> 
                 The fee for retainers is <span id="retainer_is" style="border-bottom: 1px solid;width: 164px;display: block;text-align: center;height:23px;"> <input type="text" name="retainer_is" style="text-align: center;height: 25px;border-bottom: none;" id="retainer-is"  data-type="currency-retainer-is" value=""></span>. (not included in the total package).
                </p>
                <p style="line-height: 1;text-align: justify;display: flex;"> 
                To avert any misunderstanding,  we will be happy to discuss the information with you.
                </p>
                <p style="line-height: 1;text-align: justify;display: flex;"> 
                I HAVE BEEN FULLY INFORMED OF THE DIAGNOSIS AND PROPSED DENTAL ORAL TREATMENT 
                </p>
                <p style="line-height: 1;text-align: justify;display: flex;"> 
                AND HEREBY GRANT PERMISSION TO <span id="permission_to" style="border-bottom: 1px solid;width: 164px;display: block;text-align: center;height:23px;"> <input type="text" name="permission_to" style="text-align: center;height: 25px;border-bottom: none;" id="permission-to"  data-type="currency-permission-to" value=""></span> AND OTHER ASSOCIATED
                </p>
                <p style="line-height: 1;text-align: justify;display: flex;"> 
                DENTIST  TO RENDER  THE PROPOSED TREATMENT.
                </p>
                <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
                Violation of any terms and conditions of this contract shall be a ground for legal action.
                </p>
                <table style="width: 100%;font-family: Arial;">
                  <tr style="border-bottom: none;">
                    <td style="width: 42%;padding: 0;height: 100px;">
                      <div class="sign-area patient6" style="display: none;">
                        <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('patient6')">rate_review</i>
                      </div>
                      <span class="sign-area patient6 signature" style="text-align: center;height: 59px;display: block;"></span>
                    </td>
                    <td style="width: 10%;padding: 0;">
                    </td>
                    <td style="width: 10%;padding: 0;">
                      
                    </td>
                    <td style="width: 10%;padding: 0;">
                    </td>
                    <td style="width: 30%;padding: 0;vertical-align: bottom;text-align: center;">
                      <span id="signer-name" style="font-size: 16px;"><?php echo date('F j, Y'); ?></span>
                    </td>
                  </tr>
                  <tr style="border-bottom: none;">
                  <td style="border-top: 1px solid;text-align: center;">
                    <div class="resign">
                     PATIENT'S/GUARDIAN SIGNATURE
                    </div>
                  </td>
                  <td></td>
                  <td style="text-align: center;">
                   
                  </td>
                  <td></td>
                  <td style="border-top: 1px solid;text-align: center;">
                    DATE
                  </td>
                  </tr>
                </table>
                <div style="page-break-before: always"></div>
                <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
                  NAME OF PATIENT:<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span id="firstName"></span> <span id="lastName"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> AGE <u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="age"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> SEX <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="sex"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> STATUS <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span id="status"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><br>
                  CP # <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span id="mobile"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><br>
                  ADDRESS: <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span id="address"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> / OCCUPATION: <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span id="occupation"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> / REFERRED by: <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span id="referredBy"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>/
                </p>

                <p style="line-height: 2;margin-top: 15px;text-align: justify;"> 
                   <div style="display: flex;">
                    <table style="width: 100%;font-family: Arial;">
                      <tr style="border-bottom: none;">
                      <td style="width: 87px;"><span>History cc</span></td>
                      <td style="padding: 5px;border-bottom: 1px solid;">
                        <span id="history_cc" style="width: 100%;display: block;text-align: left;height:23px;position: relative;"> <input type="text" name="history_cc" style="text-align: left;height: 25px;border-bottom: none;" id="history-cc" ></span>
                      </td>
                      </tr>
                    </table>
                  </div>
                     <table style="width: 100%;font-family: Arial;">
                      <tr style="border-bottom: none;">
                      <td style="width: 57px;"><span>HPI   </span></td>
                      <td style="padding: 5px;border-bottom: 1px solid;">
                        <span id="hpi_form1" style="width: 100%;display: block;text-align: left;height:23px;position: relative;"> <input type="text" name="hpi_form1" style="text-align: left;height: 25px;border-bottom: none;" id="hpi-form1" ></span>
                      </td>
                      </tr>
                    </table>
                    <table style="width: 100%;font-family: Arial;">
                      <tr style="border-bottom: none;">
                      <td style="width: 57px;"></td>
                      <td style="padding: 5px;border-bottom: 1px solid;">
                        <span id="hpi_form2" style="width: 100%;display: block;text-align: left;height:23px;position: relative;"> <input type="text" name="hpi_form2" style="text-align: left;height: 25px;border-bottom: none;" id="hpi-form2" ></span>
                      </td>
                      </tr>
                    </table>
                    <table style="width: 100%;font-family: Arial;">
                      <tr style="border-bottom: none;">
                      <td style="width: 57px;"></td>
                      <td style="padding: 5px;border-bottom: 1px solid;">
                        <span id="hpi_form3" style="width: 100%;display: block;text-align: left;height:23px;position: relative;"> <input type="text" name="hpi_form3" style="text-align: left;height: 25px;border-bottom: none;" id="hpi-form3" ></span>
                      </td>
                      </tr>
                    </table>
                </p>
                <p style="line-height: 1;margin-top: 15px;text-align: justify;display: flex;"> 
                   <span style="width: 490px;">PMH: ANY HOSPITALIZATION record</span><span id="hospitalization_record" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="hospitalization-record" onclick="checkboxChange('hospitalization-record', 'hospitalization_record')" name="hospitalization_record" value="false"> </span>
                   specifiy &nbsp;&nbsp; <span id="specifiy_form" style="width: 100%;display: block;text-align: left;height:23px;position: relative;border-bottom: 1px solid;"> <input type="text" name="specifiy_form" style="text-align: left;height: 25px;border-bottom: none;" id="specifiy-form" ></span>
                </p>
                <p style="line-height: 1;text-align: justify;display: flex;"> 
                *DO YOU HAVE: 
                <table style="font-size: 14px;font-family: Arial;" class="tr-border-none">
                  <tr>
                    <td colspan="2"> 
                      <div style="display: flex;">
                        <span style="width: auto;">CURRENT DRUG(medicine) TAKEN</span>
                        <span id="drug_taken" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="drug-taken" name="drug_taken" value="false" onclick="checkboxChange('drug-taken', 'drug_taken')"> </span>
                      </div>
                     </td>
                    <td>
                      <div style="display: flex;">
                       HYPERTENSION
                        <span id="hypertension_form" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="hypertension-form" name="hypertension_form" value="false"  onclick="checkboxChange('hypertension-form', 'hypertension_form')"> </span> / 
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div style="display: flex;">
                         DIABETES
                        <span id="diabetes_form" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="diabetes-form" name="diabetes_form" value="false" onclick="checkboxChange('diabetes-form', 'diabetes_form')"> </span> /
                      </div>
                    </td>
                    <td>
                      <div style="display: flex;">
                         ANEMIA
                        <span id="anemia_form" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="anemia-form" name="anemia_form" value="false" onclick="checkboxChange('anemia-form', 'anemia_form')"> </span> /
                      </div>
                    </td>
                    <td>
                      <div style="display: flex;">
                         ASTHMA
                        <span id="asthma_form" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="asthma-form" name="asthma_form" value="false" onclick="checkboxChange('asthma-form', 'asthma_form')"> </span> /
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div style="display: flex;">
                         ALLERGY
                        <span id="allergy_form" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="allergy-form" name="allergy_form" value="false" onclick="checkboxChange('allergy-form', 'allergy_form')"> </span> /
                      </div>
                    </td>
                    <td>
                      <div style="display: flex;">
                         BLEEDING DISORDERS
                        <span id="bleeding_disorders" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="bleeding-disorders" name="bleeding_disorders" value="false" onclick="checkboxChange('bleeding-disorders', 'bleeding_disorders')"> </span> /
                      </div>
                    </td>
                    <td>
                      <div style="display: flex;">
                         SHORTNESS of BREATH
                        <span id="shortness_breath" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;width: 20px;"><input type="checkbox" class="consent-checkbox" id="shortness-breath" name="shortness_breath" value="false" onclick="checkboxChange('shortness-breath', 'shortness_breath')"> </span> /
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div style="display: flex;">
                          CHESTPAIN
                        <span id="chestpain_form" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="chestpain-form" name="chestpain_form" value="false" onclick="checkboxChange('chestpain-form', 'chestpain_form')"> </span> /
                      </div>
                    </td>
                    <td>
                      <div style="display: flex;">
                         DISEASES OF THE HEART
                        <span id="diseases_heart" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="diseases-heart" name="diseases_heart" value="false" onclick="checkboxChange('diseases-heart', 'diseases_heart')"> </span> /
                      </div>
                    </td>
                    <td>
                      <div style="display: flex;">
                         LIVER
                        <span id="liver_form" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="liver-form" name="liver_form" value="false" onclick="checkboxChange('liver-form', 'liver_form')"> </span> /
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div style="display: flex;">
                         LUNGS
                        <span id="lungs_form" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="lungs-form" name="lungs_form" value="false" onclick="checkboxChange('lungs-form', 'lungs_form')"> </span> /
                      </div>
                    </td>
                    <td>
                      <div style="display: flex;">
                         KIDNEY
                         <span id="kidney_form" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="kidney-form" name="kidney_form" value="false" onclick="checkboxChange('kidney-form', 'kidney_form')"> </span> /
                      </div>
                    </td>
                    <td>
                      <div style="display: flex;">
                         BLOOD
                         <span id="blood_form" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="blood-form" name="blood_form" value="false"  onclick="checkboxChange('blood-form', 'blood_form')"> </span> /
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3">
                      <div style="display: flex;">
                        STOMACH and INTESTINE
                        <span id="stomach_intestine" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="stomach-intestine" name="stomach_intestine" value="false"  onclick="checkboxChange('stomach-intestine', 'stomach_intestine')"> </span> /
                      </div>
                    </td>
                  </tr>
                </table>
                </p>
                <p style="line-height: 1;text-align: justify;display: flex;"> 
                  <table style="width: 100%;font-family: Arial;padding: 0 margin: 0;">
                    <tr style="border-bottom: none;">
                    <td style="width: 57px;"><span>*OTHERS:   </span></td>
                    <td style="padding: 5px;border-bottom: 1px solid;">
                    <span id="others_form" style="width: 100%;display: block;text-align: left;height:23px;position: relative;"> <input type="text" name="others_form" style="text-align: left;height: 25px;border-bottom: none;width: 100%" id="others-form" ></span>
                    </td>
                    </tr>
                    <tr style="border-bottom: none;">
                    <td style="width: 57px;"><span> PDH:  </span></td>
                    <td style="padding: 5px;border-bottom: 1px solid;">
                    <span id="hpd_form" style="width: 100%;display: block;text-align: left;height:23px;position: relative;"> <input type="text" name="hpd_form" style="text-align: left;height: 25px;border-bottom: none;width: 100%" id="hpd-form" ></span>
                     </td>
                    </tr>
                    <tr style="border-bottom: none;">
                    <td style="width: 207px;"><span> Personal & Social Hx:  </span></td>
                    <td style="padding: 5px;border-bottom: 1px solid;">
                      <span id="personal_social" style="width: 100%;display: block;text-align: left;height:23px;position: relative;"> <input type="text" name="personal_social" style="text-align: left;height: 25px;border-bottom: none;width: 100%" id="personal-social" ></span>
                     </td>
                    </tr>
                  </table>
                </p>

                <p style="line-height: 1;margin-top: 35px;text-align: justify;display: flex;"> 
                <span>I,</span><span id="i_form" style="width: 267px;display: block;text-align: left;height:23px;position: relative;border-bottom: 1px solid;"> <input type="text" name="i_form" style="text-align: center;height: 25px;border-bottom: none;" id="i-form" ></span>
                 <span>, do hereby consent to be the performance, </span>
                </p>
                <p style="line-height: 1;text-align: justify;display: flex;"> 
                  <span id="my_self" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="my-self" name="my_self" onclick="checkboxChange('my-self', 'my_self')" value="false"> </span> myself &nbsp;&nbsp;
                  <span id="spouse_form" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="spouse-form" name="spouse_form" onclick="checkboxChange('spouse-form', 'spouse_form')" value="false"> </span> my spouse  &nbsp;&nbsp;
                  <span id="son_doughter" style="display: block;text-align: left;height:23px;position: relative;padding: 2px;border-bottom: 1px solid;"><input type="checkbox" class="consent-checkbox" id="son-doughter" name="son_doughter"  onclick="checkboxChange('son-doughter', 'son_doughter')" value="false"> </span> my son/doughter, &nbsp;&nbsp;
                  Other <span id="other_form" style="display: block;text-align: left;height:23px;position: relative;border-bottom: 1px solid"> <input type="text" name="other_form" style="text-align: left;height: 25px;border-bottom: none;width: 70px" id="other-form" ></span> of all the dental
                </p>
                <p style="line-height:1;text-align: justify;display: flex;">
                  procedures, operations & other treatments that may be considered necessary to restoremy oral and dental health. 
                </p>
                <p style="line-height: 1.3;margin-top: 15px;text-align: justify;"> 
                   I, voluntarily absolve my dentist from all liabilities whatever result in any intervention of treatment may be & be it known further, that I am willing to PAY for all the SERVICES RENDERED me and or my family.
                </p>
              <table style="width: 100%;font-family: Arial;">
                  <tr style="border-bottom: none;">
                    <td style="width: 32%;padding: 0;height: 80px;">
                      <div class="sign-area witness" style="display: none;">
                        <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('witness')">rate_review</i>
                      </div>
                      <span class="sign-area witness signature" style="text-align: center;height: 59px;display: block;"></span>
                    </td>
                    <td style="width: 10%;padding: 0;">
                    </td>
                    <td style="width: 30%;padding: 0;">
                    <div class="sign-area patient7" style="display: none;">
                        <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('patient7')">rate_review</i>
                      </div>
                      <span class="sign-area patient7 signature" style="text-align: center;height: 59px;display: block;"></span>
                    </td>
                    <td style="width: 10%;padding: 0;">
                    </td>
                    <td style="width: 20%;padding: 0;vertical-align: bottom;text-align: center;">
                      <span id="signer-name" style="font-size: 16px;"><?php echo date('F j, Y'); ?></span>
                    </td>
                  </tr>
                  <tr style="border-bottom: none;">
                  <td style="border-top: 1px solid;text-align: center;">
                    <div class="resign">
                  WITNESS
                    </div>
                  </td>
                  <td></td>
                  <td style="border-top: 1px solid;text-align: center;">
                   PATIENT SIGNATURE
                  </td>
                  <td></td>
                  <td style="border-top: 1px solid;text-align: center;">
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
    <div class="modal-content pb-0">
        <form id="form-consent" method="post">
          @csrf
          <input type="hidden" name="html" id="informed_html" value=""/>
          <input type="hidden" name="consent_patient_id" id="consent_patient_id" value=""/>
          <div class="wrapper mb-5">
          <head>
          <style type="text/css"> 
          @page {
                  /* 'em' 'ex' and % are not allowed; length values are width height */
            margin: 1% 3%; /* <any of the usual CSS values for margins> */
                        /*(% of page-box width for LR, of height for TB) */
          }

          </style>
          </head>

          <div style="font-family: Arial;">
            <h5>The Asian-American Academy of Functional Orthodontic and TMJ Philippines Section</h5>
            <h4>The Kinnie-Funt (K-F) Chief Complaint Visual Index for Head, Neck, and Facial Pain and TMJ Dysfunction</h4>
            <div style="display: flex;width: 100%;margin 0 auto;">
              <div style="width: 300px;postion: absolute;float: left;">
                <ol>
                    <li><i>Please circle the number in front of the symptoms you regularly or ocassionally have.</i></li>
                    <li>
                      <i>Indicate your main or chief complaints in order of their current importance.</i><br>
                        <table style="width: 100%;font-family: Arial;" class="tr-border-none">
                            <tr>
                              <td style="width: 11px;"> 
                              (A).
                              </td>
                              <td id="indicate_A" style="border-bottom: 1px solid;display: block;text-align: center;height:23px;">
                                <span> <input type="text" name="indicate_A" style="text-align: center;height: 23px;border-bottom: none;" id="indicate-A"  data-type="currency-rebond-of-bracket" value=""></span>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                (B).
                              </td>
                              <td id="indicate_B" style="border-bottom: 1px solid;display: block;text-align: center;height:23px;">
                                <span> <input type="text" name="indicate_B" style="text-align: center;height: 23px;border-bottom: none;" id="indicate-B"  data-type="currency-rebond-of-bracket" value=""></span>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                (C).
                              </td>
                              <td id="indicate_C" style="border-bottom: 1px solid;display: block;text-align: center;height:23px;">
                                <span> <input type="text" name="indicate_C" style="text-align: center;height: 23px;border-bottom: none;" id="indicate-C"  data-type="currency-rebond-of-bracket" value=""></span>
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
                <div class="sign-area head signature head-draw" style="margin-top: 42px;height:300px;width: 300px;background-image: url('https://sagundentalclinic.com/images/head-background.jpg');background-repeat: no-repeat;background-size: 100%;position:relative;"></div>
              </div>
              <div style="width: 700px;postion: absolute;float: right;">
                <table style="width: 100%;font-family: Arial;" class="tr-border-none">
                  <tr>
                    <td style="width: 80px;">
                    <strong>Name: </strong>
                    </td>
                    <td colspan="3" style="border-bottom: 1px solid;">
                      <strong><span id="firstName"></span> <span id="lastName"></span></strong>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Age: </strong></td>
                    <td style="border-bottom: 1px solid;"><span id="age"></span></td>
                    <td style="width: 70px;"><strong>Date:</strong></td>
                    <td style="border-bottom: 1px solid;"><?php echo date('F j, Y'); ?></td>
                  </tr>
                </table>
                <table style="width: 100%;font-family: Arial;font-size:14px;" class="tr-border-none">
                    <tr>
                      <td style="width: 50%;">
                            <p>A.&nbsp;  Eye Pain and Eye Orbital Problems:
                              <table style="width: 100%;font-family: Arial;font-size:13px;" class="tr-border-none">
                                <tr>
                                  <td style="width: 30px;"></td>
                                  <td>
                                    <ol>
                                      <li> Eye (orbital) pain: above, below, behind</li>
                                      <li> Bloodshot eyes (hyperemia)</li>
                                      <li> Blurring of vision</li>
                                      <li> Bulging appearance (exophthalmia)</li>
                                      <li> Pressure behind the eyes (retro-orbital pressure)</li>
                                      <li> Light sensitivity (photo-phobia)</li>
                                      <li> Watering of the eye (lacrimation)</li>
                                      <li> Dropping of the eye lid (ptosis)</li>
                                    </ol>
                                  </td>
                                </tr>
                              </table>
                            </p>
                            <p>
                             B.&nbsp; Head Pain, Headache Problems, Facial Pain:
                             <table style="width: 100%;font-family: Arial;font-size:13px;" class="tr-border-none">
                                <tr>
                                  <td style="width: 30px;"></td>
                                  <td>
                                    <ol>
                                      <li> Forehead (frontal) pain</li>
                                      <li> Temples (temporal) pain</li>
                                      <li> "Migraine" type headache.</li>
                                      <li> "Cluster" type headache.</li>
                                      <li> Maxillary sinus headache (under the eyes)</li>
                                      <li> Posterior back of head headaches with or without shooting pains (occipital headaches)</li>
                                      <li> Hair and or scalp painful to touch (parietal headache)</li>
                                    </ol>
                                    </td>
                                </tr>
                              </table>
                            </p>
                            <p>
                              C.&nbsp; Mouth, Face, Cheek, and Chin Problems:
                              <table style="width: 100%;font-family: Arial;font-size:13px;" class="tr-border-none">
                                <tr>
                                  <td style="width: 30px;"></td>
                                  <td>
                                    <ol>
                                        <li> Discomfort</li>
                                        <li> Limited opening</li>
                                        <li> Inability to open smoothly, evenly</li>
                                        <li> Jaw deviates to one side when opening</li>
                                        <li> Inability to “find bite”</li>
                                      </ol>
                                      </td>
                                </tr>
                              </table>
                            </p>
                            <p>
                              D.&nbsp;	Teeth and Gum Problems:
                              <table style="width: 100%;font-family: Arial;font-size:13px;" class="tr-border-none">
                                <tr>
                                  <td style="width: 30px;"></td>
                                  <td>
                                    <ol>
                                      <li> Clenching, grinding at night (bruxism)</li>
                                      <li> Looseness and or soreness of back teeth</li>
                                      <li> Tooth pain (toothache)</li>
                                    </ol>
                                    </td>
                                </tr>
                              </table>
                            </p>
                            
                      </td>
                      <td style="width: 50%;">
                        <p>
                          E.&nbsp; Jaw and Jaw Joint (TMJ) Problems:
                          <table style="width: 100%;font-family: Arial;font-size:13px;" class="tr-border-none">
                            <tr>
                              <td style="width: 30px;"></td>
                              <td>
                                <ol>
                                  <li> Clicking, popping jaw joints</li>
                                  <li> Grating sounds (crepitus)</li>
                                  <li> Jaw locking opened or closed</li>
                                  <li> Pin in cheek muscles</li>
                                  <li> Uncontrollable jaw, tongue movements</li>
                                </ol>
                                </td>
                            </tr>
                          </table>
                        </p>
                        <p>
                          F.&nbsp; Ear Pain, Ear Problems, and Postural Imbalances:
                          <table style="width: 100%;font-family: Arial;font-size:13px;" class="tr-border-none">
                            <tr>
                              <td style="width: 30px;"></td>
                              <td>
                                <ol>
                                  <li> Hissing, buzzing, ringing, or roaring sound (tinitus)</li>
                                  <li> Diminished hearing (subjective hearing loss)</li>
                                  <li> Ear pain without infection (otalgia)</li>
                                  <li> Clogged, stuffy, "itchy" ears, feeling of fullness</li>
                                  <li> Balance problems, "vertigo" (disequilibrium)</li>
                                </ol>
                                </td>
                            </tr>
                          </table>
                        </p>
                        <p>
                        G.&nbsp;Throat Problems:
                          <table style="width: 100%;font-family: Arial;font-size:13px;" class="tr-border-none">
                            <tr>
                              <td style="width: 30px;"></td>
                              <td>
                                <ol>
                                  <li> Swallowing difficulties/tightness of throat</li>
                                  <li> Sore throat without infection (coryza)</li>
                                  <li> Voice fluctuations</li>
                                  <li> Frequesnt coughing or constant clearing of throat</li>
                                  <li> Tongue pain (glossalgia)</li>
                                  <li> Salivation (intense)</li>
                                  <li> Pain in the hard palate (posterior areas)</li>
                                </ol>
                                </td>
                            </tr>
                          </table>
                        </p>
                        <p>
                        H.&nbsp; Neck and Shoulder Problems:
                          <table style="width: 100%;font-family: Arial;font-size:13px;" class="tr-border-none">
                            <tr>
                              <td style="width: 30px;"></td>
                              <td>
                                <ol>
                                  <li> Lack of mobility-reduced range of movement</li>
                                  <li> Stiffness</li>
                                  <li> Neck pain</li>
                                  <li> Tired, sore, neck muscles</li>
                                  <li> Shoulder aches</li>
                                  <li> Back pain upper and lower</li>
                                  <li> Arm and finger tingling, numbness and or pain</li>
                                  <li> Scoliosis</li>
                                  <li> Leg length discrepancy</li>
                                </ol>
                                </td>
                            </tr>
                          </table>
                        </p>
                      </td>
                    </tr>
                  </table>
             </div>
            </div>
          <div style="page-break-before: always"></div>
          <h5 style="font-size: 12px;line-height: .9">Visual Index Treatment Evaluation</h5>
          <table style="width: 100%;font-family: Arial;font-size:10px;" class="tr-border-none">
            <tr><td style="width: 400px;border-bottom: 1px solid;text-align: center;"><strong><span id="firstName"></span> <span id="lastName"></span></strong></td><td>Please indicate with a check mark() the progress you have made in the following areas.</td></tr>
              <tr><td style="text-align: center;">(Patient)</td><td></td></tr>
          </table>
        <table style="width: 100%;font-family: Arial;font-size:8px;;border-spacing: 0;border-collapse: collapse;" class="tr-border-none">
          <tr>
            <td style="width: 40%;border: 1px solid;"></td>
            <td style="width: 15%;border: 1px solid;height: 40px;">
              Appointment<br>
              <table style="width: 100%;font-family: Arial;font-size:8px;text-align: center;line-height: 1;" class="tr-border-none">
                <tr>
                  <td> 
                    <span style="width: 20px;">Date: </span>
                  </td>
                  <td colspan="4">
                    <span id="date_1" style="border-bottom: 1px solid;display: block;text-align: center;height:18px;"> <input type="text" name="date_1" style="text-align: center;height: 13px;border-bottom: none;font-size: 10px;" id="date-1"  data-type="currency-rebond-of-bracket" value=""></span>
                  </td>
                </tr>
                <tr>
                  <td></td><td>LESS</td><td>SAME</td><td>MORE</td><td>N/A</td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;">
              Appointment<br>
              <table style="width: 100%;font-family: Arial;font-size:8px;text-align: center;" class="tr-border-none">
                <tr>
                  <td> 
                    <span style="width: 20px;">Date: </span>
                  </td>
                  <td colspan="4">
                    <span id="date_2" style="border-bottom: 1px solid;display: block;text-align: center;height:18px;"> <input type="text" name="date_2" style="text-align: center;height: 13px;border-bottom: none;font-size: 10px;" id="date-2"  data-type="currency-rebond-of-bracket" value=""></span>
                  </td>
                </tr>
                <tr>
                  <td></td><td>LESS</td><td>SAME</td><td>MORE</td><td>N/A</td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;">
              Appointment<br>
              <table style="width: 100%;font-family: Arial;font-size:8px;text-align: center;" class="tr-border-none">
                <tr>
                  <td> 
                    <span style="width: 20px;">Date: </span>
                  </td>
                  <td colspan="4">
                    <span id="date_3" style="border-bottom: 1px solid;display: block;text-align: center;height:18px;"> <input type="text" name="date_3" style="text-align: center;height: 13px;border-bottom: none;font-size: 10px;" id="date-3"  data-type="currency-rebond-of-bracket" value=""></span>
                  </td>
                </tr>
                <tr>
                  <td></td><td>LESS</td><td>SAME</td><td>MORE</td><td>N/A</td>
                </tr>
              </table>
            </td>
            <td style="width: 15%;border: 1px solid;">
              Appointment<br>
              <table style="width: 100%;font-family: Arial;font-size:8px;text-align: center;" class="tr-border-none">
                <tr>
                  <td> 
                    <span style="width: 20px;">Date: </span>
                  </td>
                  <td colspan="4">
                    <span id="date_4" style="border-bottom: 1px solid;display: block;text-align: center;height:18px;"> <input type="text" name="date_4" style="text-align: center;height: 13px;border-bottom: none;font-size: 10px;" id="date-4"  data-type="currency-rebond-of-bracket" value=""></span>
                  </td>
                </tr>
                <tr>
                  <td></td><td>LESS</td><td>SAME</td><td>MORE</td><td>N/A</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr style="border: 1px solid;">
            <td rowspan="2" style="width: 40%;border: 1px solid;">
            <table style="width: 100%;font-family: Arial;font-size:10px" class="tr-border-none">
                <tr>
                  <td>
                        <p>A.&nbsp;  Eye Pain and Eye Orbital Problems:
                          <table style="width: 100%;font-family: Arial;font-size:8px;" class="tr-border-none">
                            <tr>
                              <td style="width: 30px;"></td>
                              <td>
                                <ol>
                                  <li> Eye (orbital) pain: above, below, behind</li>
                                  <li> Bloodshot eyes (hyperemia)</li>
                                  <li> Blurring of vision</li>
                                  <li> Bulging appearance (exophthalmia)</li>
                                  <li> Pressure behind the eyes (retro-orbital pressure)</li>
                                  <li> Light sensitivity (photo-phobia)</li>
                                  <li> Watering of the eye (lacrimation)</li>
                                  <li> Dropping of the eye lid (ptosis)</li>
                                </ol>
                              </td>
                            </tr>
                          </table>
                        </p>
                        <p>
                          B.&nbsp; Head Pain, Headache Problems, Facial Pain:
                          <table style="width: 100%;font-family: Arial;font-size:8px;" class="tr-border-none">
                            <tr>
                              <td style="width: 30px;"></td>
                              <td>
                                <ol>
                                  <li> Forehead (frontal) pain</li>
                                  <li> Temples (temporal) pain</li>
                                  <li> "Migraine" type headache.</li>
                                  <li> "Cluster" type headache.</li>
                                  <li> Maxillary sinus headache (under the eyes)</li>
                                  <li> Posterior back of head headaches with or without shooting pains (occipital headaches)</li>
                                  <li> Hair and or scalp painful to touch (parietal headache)</li>
                                </ol>
                                </td>
                            </tr>
                          </table>
                        </p>
                        <p>
                          C.&nbsp; Mouth, Face, Cheek, and Chin Problems:
                          <table style="width: 100%;font-family: Arial;font-size:8px;" class="tr-border-none">
                            <tr>
                              <td style="width: 30px;"></td>
                              <td>
                                <ol>
                                    <li> Discomfort</li>
                                    <li> Limited opening</li>
                                    <li> Inability to open smoothly, evenly</li>
                                    <li> Jaw deviates to one side when opening</li>
                                    <li> Inability to “find bite”</li>
                                  </ol>
                                  </td>
                            </tr>
                          </table>
                        </p>
                        <p>
                          D.&nbsp;	Teeth and Gum Problems:
                          <table style="width: 100%;font-family: Arial;font-size:8px;" class="tr-border-none">
                            <tr>
                              <td style="width: 30px;"></td>
                              <td>
                                <ol>
                                  <li> Clenching, grinding at night (bruxism)</li>
                                  <li> Looseness and or soreness of back teeth</li>
                                  <li> Tooth pain (toothache)</li>
                                </ol>
                                </td>
                            </tr>
                          </table>
                        </p>
                    <p>
                      E.&nbsp; Jaw and Jaw Joint (TMJ) Problems:
                      <table style="width: 100%;font-family: Arial;font-size:8px;" class="tr-border-none">
                        <tr>
                          <td style="width: 30px;"></td>
                          <td>
                            <ol>
                              <li> Clicking, popping jaw joints</li>
                              <li> Grating sounds (crepitus)</li>
                              <li> Jaw locking opened or closed</li>
                              <li> Pin in cheek muscles</li>
                              <li> Uncontrollable jaw, tongue movements</li>
                            </ol>
                            </td>
                        </tr>
                      </table>
                    </p>
                    <p>
                      F.&nbsp; Ear Pain, Ear Problems, and Postural Imbalances:
                      <table style="width: 100%;font-family: Arial;font-size:8px;" class="tr-border-none">
                        <tr>
                          <td style="width: 30px;"></td>
                          <td>
                            <ol>
                              <li> Hissing, buzzing, ringing, or roaring sound (tinitus)</li>
                              <li> Diminished hearing (subjective hearing loss)</li>
                              <li> Ear pain without infection (otalgia)</li>
                              <li> Clogged, stuffy, "itchy" ears, feeling of fullness</li>
                              <li> Balance problems, "vertigo" (disequilibrium)</li>
                            </ol>
                            </td>
                        </tr>
                      </table>
                    </p>
                    <p>
                    G.&nbsp;Throat Problems:
                      <table style="width: 100%;font-family: Arial;font-size:8px;" class="tr-border-none">
                        <tr>
                          <td style="width: 30px;"></td>
                          <td>
                            <ol>
                              <li> Swallowing difficulties/tightness of throat</li>
                              <li> Sore throat without infection (coryza)</li>
                              <li> Voice fluctuations</li>
                              <li> Frequesnt coughing or constant clearing of throat</li>
                              <li> Tongue pain (glossalgia)</li>
                              <li> Salivation (intense)</li>
                              <li> Pain in the hard palate (posterior areas)</li>
                            </ol>
                            </td>
                        </tr>
                      </table>
                    </p>
                    <p>
                    H.&nbsp; Neck and Shoulder Problems:
                      <table style="width: 100%;font-family: Arial;font-size:8px;" class="tr-border-none">
                        <tr>
                          <td style="width: 30px;"></td>
                          <td>
                            <ol>
                              <li> Lack of mobility-reduced range of movement</li>
                              <li> Stiffness</li>
                              <li> Neck pain</li>
                              <li> Tired, sore, neck muscles</li>
                              <li> Shoulder aches</li>
                              <li> Back pain upper and lower</li>
                              <li> Arm and finger tingling, numbness and or pain</li>
                              <li> Scoliosis</li>
                              <li> Leg length discrepancy</li>
                            </ol>
                            </td>
                        </tr>
                      </table>
                      <br>
                    </p>
                  </td>
                </tr>
              </table>
            </td>
            <td style="border-right: 1px solid;vertical-align: top;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: 0;text-align: center;line-height: .7;" class="tr-border-none">
                <tr>
                  <td style="font-size: 7px;">A1</td>
                  <td>
                    <span id="A1_1" style=""><input type="checkbox" class="kinnie-checkbox" id="A1-1" name="A1_1" value="false" onclick="checkboxChange('A1-1', 'A1_1')"> </span>
                  </td>
                  <td>
                    <span id="A1_2" style=""><input type="checkbox" class="kinnie-checkbox" id="A1-2" name="A1_2" value="false" onclick="checkboxChange('A1-2', 'A1_2')"> </span>
                  </td>
                  <td>
                    <span id="A1_3" style=""><input type="checkbox" class="kinnie-checkbox" id="A1-3" name="A1_3" value="false" onclick="checkboxChange('A1-3', 'A1_3')"> </span>
                  </td>
                  <td>
                    <span id="A1_4" style=""><input type="checkbox" class="kinnie-checkbox" id="A1-4" name="A1_4" value="false" onclick="checkboxChange('A1-4', 'A1_4')"> </span>
                  </td>
                </tr>
                <tr>
                <td style="font-size: 7px;">A2</td>
                  <td>
                    <span id="A2_1" style=""><input type="checkbox" class="kinnie-checkbox" id="A2-1" name="A2_1" value="false" onclick="checkboxChange('A2-1', 'A2_1')"> </span>
                  </td>
                  <td>
                    <span id="A2_2" style=""><input type="checkbox" class="kinnie-checkbox" id="A2-2" name="A2_2" value="false" onclick="checkboxChange('A2-2', 'A2_2')"> </span>
                  </td>
                  <td>
                    <span id="A2_3" style=""><input type="checkbox" class="kinnie-checkbox" id="A2-3" name="A2_3" value="false" onclick="checkboxChange('A2-3', 'A2_3')"> </span>
                  </td>
                  <td>
                    <span id="A2_4" style=""><input type="checkbox" class="kinnie-checkbox" id="A2-4" name="A2_4" value="false" onclick="checkboxChange('A2-4', 'A2_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A3</td>
                  <td>
                    <span id="A3_1" style=""><input type="checkbox" class="kinnie-checkbox" id="A3-1" name="A3_1" value="false" onclick="checkboxChange('A3-1', 'A3_1')"> </span>
                  </td>
                  <td>
                    <span id="A3_2" style=""><input type="checkbox" class="kinnie-checkbox" id="A3-2" name="A3_2" value="false" onclick="checkboxChange('A3-2', 'A3_2')"> </span>
                  </td>
                  <td>
                    <span id="A3_3" style=""><input type="checkbox" class="kinnie-checkbox" id="A3-3" name="A3_3" value="false" onclick="checkboxChange('A3-3', 'A3_3')"> </span>
                  </td>
                  <td>
                    <span id="A3_4" style=""><input type="checkbox" class="kinnie-checkbox" id="A3-4" name="A3_4" value="false" onclick="checkboxChange('A3-4', 'A3_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A4</td>
                  <td>
                    <span id="A4_1" style=""><input type="checkbox" class="kinnie-checkbox" id="A4-1" name="A4_1" value="false" onclick="checkboxChange('A4-1', 'A4_1')"> </span>
                  </td>
                  <td>
                    <span id="A4_2" style=""><input type="checkbox" class="kinnie-checkbox" id="A4-2" name="A4_2" value="false" onclick="checkboxChange('A4-2', 'A4_2')"> </span>
                  </td>
                  <td>
                    <span id="A4_3" style=""><input type="checkbox" class="kinnie-checkbox" id="A4-3" name="A4_3" value="false" onclick="checkboxChange('A4-3', 'A4_3')"> </span>
                  </td>
                  <td>
                    <span id="A4_4" style=""><input type="checkbox" class="kinnie-checkbox" id="A4-4" name="A4_4" value="false" onclick="checkboxChange('A4-4', 'A4_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A5</td>
                  <td>
                    <span id="A5_1" style=""><input type="checkbox" class="kinnie-checkbox" id="A5-1" name="A5_1" value="false" onclick="checkboxChange('A5-1', 'A5_1')"> </span>
                  </td>
                  <td>
                    <span id="A5_2" style=""><input type="checkbox" class="kinnie-checkbox" id="A5-2" name="A5_2" value="false" onclick="checkboxChange('A5-2', 'A5_2')"> </span>
                  </td>
                  <td>
                    <span id="A5_3" style=""><input type="checkbox" class="kinnie-checkbox" id="A5-3" name="A5_3" value="false" onclick="checkboxChange('A5-3', 'A5_3')"> </span>
                  </td>
                  <td>
                    <span id="A5_4" style=""><input type="checkbox" class="kinnie-checkbox" id="A5-4" name="A5_4" value="false" onclick="checkboxChange('A5-4', 'A5_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A6</td>
                  <td>
                    <span id="A6_1" style=""><input type="checkbox" class="kinnie-checkbox" id="A6-1" name="A6_1" value="false" onclick="checkboxChange('A6-1', 'A6_1')"> </span>
                  </td>
                  <td>
                    <span id="A6_2" style=""><input type="checkbox" class="kinnie-checkbox" id="A6-2" name="A6_2" value="false" onclick="checkboxChange('A6-2', 'A6_2')"> </span>
                  </td>
                  <td>
                    <span id="A6_3" style=""><input type="checkbox" class="kinnie-checkbox" id="A6-3" name="A6_3" value="false" onclick="checkboxChange('A6-3', 'A6_3')"> </span>
                  </td>
                  <td>
                    <span id="A6_4" style=""><input type="checkbox" class="kinnie-checkbox" id="A6-4" name="A6_4" value="false" onclick="checkboxChange('A6-4', 'A6_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A7</td>
                  <td>
                    <span id="A7_1" style=""><input type="checkbox" class="kinnie-checkbox" id="A7-1" name="A7_1" value="false" onclick="checkboxChange('A7-1', 'A7_1')"> </span>
                  </td>
                  <td>
                    <span id="A7_2" style=""><input type="checkbox" class="kinnie-checkbox" id="A7-2" name="A7_2" value="false" onclick="checkboxChange('A7-2', 'A7_2')"> </span>
                  </td>
                  <td>
                    <span id="A7_3" style=""><input type="checkbox" class="kinnie-checkbox" id="A7-3" name="A7_3" value="false" onclick="checkboxChange('A7-3', 'A7_3')"> </span>
                  </td>
                  <td>
                    <span id="A7_4" style=""><input type="checkbox" class="kinnie-checkbox" id="A7-4" name="A7_4" value="false" onclick="checkboxChange('A7-4', 'A7_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A8</td>
                  <td>
                    <span id="A8_1" style=""><input type="checkbox" class="kinnie-checkbox" id="A8-1" name="A8_1" value="false" onclick="checkboxChange('A8-1', 'A8_1')"> </span>
                  </td>
                  <td>
                    <span id="A8_2" style=""><input type="checkbox" class="kinnie-checkbox" id="A8-2" name="A8_2" value="false" onclick="checkboxChange('A8-2', 'A8_2')"> </span>
                  </td>
                  <td>
                    <span id="A8_3" style=""><input type="checkbox" class="kinnie-checkbox" id="A8-3" name="A8_3" value="false" onclick="checkboxChange('A8-3', 'A8_3')"> </span>
                  </td>
                  <td>
                    <span id="A8_4" style=""><input type="checkbox" class="kinnie-checkbox" id="A8-4" name="A8_4" value="false" onclick="checkboxChange('A8-4', 'A8_4')"> </span>
                  </td>
                </tr>
               <tr>
                  <td style="font-size: 7px;"><div style="display: block;"></div>B1</td>
                  <td style="">
                  <div style="display: block;"></div>
                    <span id="B1_1" style=""><input type="checkbox" class="kinnie-checkbox" id="B1-1" name="B1_1" value="false" onclick="checkboxChange('B1-1', 'B1_1')"> </span>
                  </td>
                  <td>
                  <div style="display: block;"></div>
                    <span id="B1_2" style=""><input type="checkbox" class="kinnie-checkbox" id="B1-2" name="B1_2" value="false" onclick="checkboxChange('B1-2', 'B1_2')"> </span>
                  </td>
                  <td>
                  <div style="display: block;"></div>
                    <span id="B1_3" style=""><input type="checkbox" class="kinnie-checkbox" id="B1-3" name="B1_3" value="false" onclick="checkboxChange('B1-3', 'B1_3')"> </span>
                  </td>
                  <td>
                  <div style="display: block;"></div>
                    <span id="B1_4" style=""><input type="checkbox" class="kinnie-checkbox" id="B1-4" name="B1_4" value="false" onclick="checkboxChange('B1-4', 'B1_4')"> </span>
                  </td>
                </tr>
                <tr>
                <tr>
                  <td style="font-size: 7px;">B2</td>
                  <td>
                    <span id="B2_1" style=""><input type="checkbox" class="kinnie-checkbox" id="B2-1" name="B2_1" value="false" onclick="checkboxChange('B2-1', 'B2_1')"> </span>
                  </td>
                  <td>
                    <span id="B2_2" style=""><input type="checkbox" class="kinnie-checkbox" id="B2-2" name="B2_2" value="false" onclick="checkboxChange('B2-2', 'B2_2')"> </span>
                  </td>
                  <td>
                    <span id="B2_3" style=""><input type="checkbox" class="kinnie-checkbox" id="B2-3" name="B2_3" value="false" onclick="checkboxChange('B2-3', 'B2_3')"> </span>
                  </td>
                  <td>
                    <span id="B2_4" style=""><input type="checkbox" class="kinnie-checkbox" id="B2-4" name="B2_4" value="false" onclick="checkboxChange('B2-4', 'B2_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B3</td>
                  <td>
                    <span id="B3_1" style=""><input type="checkbox" class="kinnie-checkbox" id="B3-1" name="B3_1" value="false" onclick="checkboxChange('B3-1', 'B3_1')"> </span>
                  </td>
                  <td>
                    <span id="B3_2" style=""><input type="checkbox" class="kinnie-checkbox" id="B3-2" name="B3_2" value="false" onclick="checkboxChange('B3-2', 'B3_2')"> </span>
                  </td>
                  <td>
                    <span id="B3_3" style=""><input type="checkbox" class="kinnie-checkbox" id="B3-3" name="B3_3" value="false" onclick="checkboxChange('B3-3', 'B3_3')"> </span>
                  </td>
                  <td>
                    <span id="B3_4" style=""><input type="checkbox" class="kinnie-checkbox" id="B3-4" name="B3_4" value="false" onclick="checkboxChange('B3-4', 'B3_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B4</td>
                  <td>
                    <span id="B4_1" style=""><input type="checkbox" class="kinnie-checkbox" id="B4-1" name="B4_1" value="false" onclick="checkboxChange('B4-1', 'B4_1')"> </span>
                  </td>
                  <td>
                    <span id="B4_2" style=""><input type="checkbox" class="kinnie-checkbox" id="B4-2" name="B4_2" value="false" onclick="checkboxChange('B4-2', 'B4_2')"> </span>
                  </td>
                  <td>
                    <span id="B4_3" style=""><input type="checkbox" class="kinnie-checkbox" id="B4-3" name="B4_3" value="false" onclick="checkboxChange('B4-3', 'B4_3')"> </span>
                  </td>
                  <td>
                    <span id="B4_4" style=""><input type="checkbox" class="kinnie-checkbox" id="B4-4" name="B4_4" value="false" onclick="checkboxChange('B4-4', 'B4_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B5</td>
                  <td>
                    <span id="B5_1" style=""><input type="checkbox" class="kinnie-checkbox" id="B5-1" name="B5_1" value="false" onclick="checkboxChange('B5-1', 'B5_1')"> </span>
                  </td>
                  <td>
                    <span id="B5_2" style=""><input type="checkbox" class="kinnie-checkbox" id="B5-2" name="B5_2" value="false" onclick="checkboxChange('B5-2', 'B5_2')"> </span>
                  </td>
                  <td>
                    <span id="B5_3" style=""><input type="checkbox" class="kinnie-checkbox" id="B5-3" name="B5_3" value="false" onclick="checkboxChange('B5-3', 'B5_3')"> </span>
                  </td>
                  <td>
                    <span id="B5_4" style=""><input type="checkbox" class="kinnie-checkbox" id="B5-4" name="B5_4" value="false" onclick="checkboxChange('B5-4', 'B5_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B6</td>
                  <td>
                    <span id="B6_1" style=""><input type="checkbox" class="kinnie-checkbox" id="B6-1" name="B6_1" value="false" onclick="checkboxChange('B6-1', 'B6_1')"> </span>
                  </td>
                  <td>
                    <span id="B6_2" style=""><input type="checkbox" class="kinnie-checkbox" id="B6-2" name="B6_2" value="false" onclick="checkboxChange('B6-2', 'B6_2')"> </span>
                  </td>
                  <td>
                    <span id="B6_3" style=""><input type="checkbox" class="kinnie-checkbox" id="B6-3" name="B6_3" value="false" onclick="checkboxChange('B6-3', 'B6_3')"> </span>
                  </td>
                  <td>
                    <span id="B6_4" style=""><input type="checkbox" class="kinnie-checkbox" id="B6-4" name="B6_4" value="false" onclick="checkboxChange('B6-4', 'B6_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B7</td>
                  <td>
                    <span id="B7_1" style=""><input type="checkbox" class="kinnie-checkbox" id="B7-1" name="B7_1" value="false" onclick="checkboxChange('B7-1', 'B7_1')"> </span>
                  </td>
                  <td>
                    <span id="B7_2" style=""><input type="checkbox" class="kinnie-checkbox" id="B7-2" name="B7_2" value="false" onclick="checkboxChange('B7-2', 'B7_2')"> </span>
                  </td>
                  <td>
                    <span id="B7_3" style=""><input type="checkbox" class="kinnie-checkbox" id="B7-3" name="B7_3" value="false" onclick="checkboxChange('B7-3', 'B7_3')"> </span>
                  </td>
                  <td>
                    <span id="B7_4" style=""><input type="checkbox" class="kinnie-checkbox" id="B7-4" name="B7_4" value="false" onclick="checkboxChange('B7-4', 'B7_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">C1</td>
                  <td>
                    <span id="C1_1" style=""><input type="checkbox" class="kinnie-checkbox" id="C1-1" name="C1_1" value="false" onclick="checkboxChange('C1-1', 'C1_1')"> </span>
                  </td>
                  <td>
                    <span id="C1_2" style=""><input type="checkbox" class="kinnie-checkbox" id="C1-2" name="C1_2" value="false" onclick="checkboxChange('C1-2', 'C1_2')"> </span>
                  </td>
                  <td>
                    <span id="C1_3" style=""><input type="checkbox" class="kinnie-checkbox" id="C1-3" name="C1_3" value="false" onclick="checkboxChange('C1-3', 'C1_3')"> </span>
                  </td>
                  <td>
                    <span id="C1_4" style=""><input type="checkbox" class="kinnie-checkbox" id="C1-4" name="C1_4" value="false" onclick="checkboxChange('C1-4', 'C1_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">C2</td>
                  <td>
                    <span id="C2_1" style=""><input type="checkbox" class="kinnie-checkbox" id="C2-1" name="C2_1" value="false" onclick="checkboxChange('C2-1', 'C2_1')"> </span>
                  </td>
                  <td>
                    <span id="C2_2" style=""><input type="checkbox" class="kinnie-checkbox" id="C2-2" name="C2_2" value="false" onclick="checkboxChange('C2-2', 'C2_2')"> </span>
                  </td>
                  <td>
                    <span id="C2_3" style=""><input type="checkbox" class="kinnie-checkbox" id="C2-3" name="C2_3" value="false" onclick="checkboxChange('C2-3', 'C2_3')"> </span>
                  </td>
                  <td>
                    <span id="C2_4" style=""><input type="checkbox" class="kinnie-checkbox" id="C2-4" name="C2_4" value="false" onclick="checkboxChange('C2-4', 'C2_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">C3</td>
                  <td>
                    <span id="C3_1" style=""><input type="checkbox" class="kinnie-checkbox" id="C3-1" name="C3_1" value="false" onclick="checkboxChange('C3-1', 'C3_1')"> </span>
                  </td>
                  <td>
                    <span id="C3_2" style=""><input type="checkbox" class="kinnie-checkbox" id="C3-2" name="C3_2" value="false" onclick="checkboxChange('C3-2', 'C3_2')"> </span>
                  </td>
                  <td>
                    <span id="C3_3" style=""><input type="checkbox" class="kinnie-checkbox" id="C3-3" name="C3_3" value="false" onclick="checkboxChange('C3-3', 'C3_3')"> </span>
                  </td>
                  <td>
                    <span id="C3_4" style=""><input type="checkbox" class="kinnie-checkbox" id="C3-4" name="C3_4" value="false" onclick="checkboxChange('C3-4', 'C3_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">C4</td>
                  <td>
                    <span id="C4_1" style=""><input type="checkbox" class="kinnie-checkbox" id="C4-1" name="C4_1" value="false" onclick="checkboxChange('C4-1', 'C4_1')"> </span>
                  </td>
                  <td>
                    <span id="C4_2" style=""><input type="checkbox" class="kinnie-checkbox" id="C4-2" name="C4_2" value="false" onclick="checkboxChange('C4-2', 'C4_2')"> </span>
                  </td>
                  <td>
                    <span id="C4_3" style=""><input type="checkbox" class="kinnie-checkbox" id="C4-3" name="C4_3" value="false" onclick="checkboxChange('C4-3', 'C4_3')"> </span>
                  </td>
                  <td>
                    <span id="C4_4" style=""><input type="checkbox" class="kinnie-checkbox" id="C4-4" name="C4_4" value="false" onclick="checkboxChange('C4-4', 'C4_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">C5</td>
                  <td>
                    <span id="C5_1" style=""><input type="checkbox" class="kinnie-checkbox" id="C5-1" name="C5_1" value="false" onclick="checkboxChange('C5-1', 'C5_1')"> </span>
                  </td>
                  <td>
                    <span id="C5_2" style=""><input type="checkbox" class="kinnie-checkbox" id="C5-2" name="C5_2" value="false" onclick="checkboxChange('C5-2', 'C5_2')"> </span>
                  </td>
                  <td>
                    <span id="C5_3" style=""><input type="checkbox" class="kinnie-checkbox" id="C5-3" name="C5_3" value="false" onclick="checkboxChange('C5-3', 'C5_3')"> </span>
                  </td>
                  <td>
                    <span id="C5_4" style=""><input type="checkbox" class="kinnie-checkbox" id="C5-4" name="C5_4" value="false" onclick="checkboxChange('C5-4', 'C5_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">D1</td>
                  <td>
                    <span id="D1_1" style=""><input type="checkbox" class="kinnie-checkbox" id="D1-1" name="D1_1" value="false" onclick="checkboxChange('D1-1', 'D1_1')"> </span>
                  </td>
                  <td>
                    <span id="D1_2" style=""><input type="checkbox" class="kinnie-checkbox" id="D1-2" name="D1_2" value="false" onclick="checkboxChange('D1-2', 'D1_2')"> </span>
                  </td>
                  <td>
                    <span id="D1_3" style=""><input type="checkbox" class="kinnie-checkbox" id="D1-3" name="D1_3" value="false" onclick="checkboxChange('D1-3', 'D1_3')"> </span>
                  </td>
                  <td>
                    <span id="D1_4" style=""><input type="checkbox" class="kinnie-checkbox" id="D1-4" name="D1_4" value="false" onclick="checkboxChange('D1-4', 'D1_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">D2</td>
                  <td>
                    <span id="D2_1" style=""><input type="checkbox" class="kinnie-checkbox" id="D2-1" name="D2_1" value="false" onclick="checkboxChange('D2-1', 'D2_1')"> </span>
                  </td>
                  <td>
                    <span id="D2_2" style=""><input type="checkbox" class="kinnie-checkbox" id="D2-2" name="D2_2" value="false" onclick="checkboxChange('D2-2', 'D2_2')"> </span>
                  </td>
                  <td>
                    <span id="D2_3" style=""><input type="checkbox" class="kinnie-checkbox" id="D2-3" name="D2_3" value="false" onclick="checkboxChange('D2-3', 'D2_3')"> </span>
                  </td>
                  <td>
                    <span id="D2_4" style=""><input type="checkbox" class="kinnie-checkbox" id="D2-4" name="D2_4" value="false" onclick="checkboxChange('D2-4', 'D2_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">D3</td>
                  <td>
                    <span id="D3_1" style=""><input type="checkbox" class="kinnie-checkbox" id="D3-1" name="D3_1" value="false" onclick="checkboxChange('D3-1', 'D3_1')"> </span>
                  </td>
                  <td>
                    <span id="D3_2" style=""><input type="checkbox" class="kinnie-checkbox" id="D3-2" name="D3_2" value="false" onclick="checkboxChange('D3-2', 'D3_2')"> </span>
                  </td>
                  <td>
                    <span id="D3_3" style=""><input type="checkbox" class="kinnie-checkbox" id="D3-3" name="D3_3" value="false" onclick="checkboxChange('D3-3', 'D3_3')"> </span>
                  </td>
                  <td>
                    <span id="D3_4" style=""><input type="checkbox" class="kinnie-checkbox" id="D3-4" name="D3_4" value="false" onclick="checkboxChange('D3-4', 'D3_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">E1</td>
                  <td>
                    <span id="E1_1" style=""><input type="checkbox" class="kinnie-checkbox" id="E1-1" name="E1_1" value="false" onclick="checkboxChange('E1-1', 'E1_1')"> </span>
                  </td>
                  <td>
                    <span id="E1_2" style=""><input type="checkbox" class="kinnie-checkbox" id="E1-2" name="E1_2" value="false" onclick="checkboxChange('E1-2', 'E1_2')"> </span>
                  </td>
                  <td>
                    <span id="E1_3" style=""><input type="checkbox" class="kinnie-checkbox" id="E1-3" name="E1_3" value="false" onclick="checkboxChange('E1-3', 'E1_3')"> </span>
                  </td>
                  <td>
                    <span id="E1_4" style=""><input type="checkbox" class="kinnie-checkbox" id="E1-4" name="E1_4" value="false" onclick="checkboxChange('E1-4', 'E1_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">E2</td>
                  <td>
                    <span id="E2_1" style=""><input type="checkbox" class="kinnie-checkbox" id="E2-1" name="E2_1" value="false" onclick="checkboxChange('E2-1', 'E2_1')"> </span>
                  </td>
                  <td>
                    <span id="E2_2" style=""><input type="checkbox" class="kinnie-checkbox" id="E2-2" name="E2_2" value="false" onclick="checkboxChange('E2-2', 'E2_2')"> </span>
                  </td>
                  <td>
                    <span id="E2_3" style=""><input type="checkbox" class="kinnie-checkbox" id="E2-3" name="E2_3" value="false" onclick="checkboxChange('E2-3', 'E2_3')"> </span>
                  </td>
                  <td>
                    <span id="E2_4" style=""><input type="checkbox" class="kinnie-checkbox" id="E2-4" name="E2_4" value="false" onclick="checkboxChange('E2-4', 'E2_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">E3</td>
                  <td>
                    <span id="E3_1" style=""><input type="checkbox" class="kinnie-checkbox" id="E3-1" name="E3_1" value="false" onclick="checkboxChange('E3-1', 'E3_1')"> </span>
                  </td>
                  <td>
                    <span id="E3_2" style=""><input type="checkbox" class="kinnie-checkbox" id="E3-2" name="E3_2" value="false" onclick="checkboxChange('E3-2', 'E3_2')"> </span>
                  </td>
                  <td>
                    <span id="E3_3" style=""><input type="checkbox" class="kinnie-checkbox" id="E3-3" name="E3_3" value="false" onclick="checkboxChange('E3-3', 'E3_3')"> </span>
                  </td>
                  <td>
                    <span id="E3_4" style=""><input type="checkbox" class="kinnie-checkbox" id="E3-4" name="E3_4" value="false" onclick="checkboxChange('E3-4', 'E3_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">E4</td>
                  <td>
                    <span id="E4_1" style=""><input type="checkbox" class="kinnie-checkbox" id="E4-1" name="E4_1" value="false" onclick="checkboxChange('E4-1', 'E4_1')"> </span>
                  </td>
                  <td>
                    <span id="E4_2" style=""><input type="checkbox" class="kinnie-checkbox" id="E4-2" name="E4_2" value="false" onclick="checkboxChange('E4-2', 'E4_2')"> </span>
                  </td>
                  <td>
                    <span id="E4_3" style=""><input type="checkbox" class="kinnie-checkbox" id="E4-3" name="E4_3" value="false" onclick="checkboxChange('E4-3', 'E4_3')"> </span>
                  </td>
                  <td>
                    <span id="E4_4" style=""><input type="checkbox" class="kinnie-checkbox" id="E4-4" name="E4_4" value="false" onclick="checkboxChange('E4-4', 'E4_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">E5</td>
                  <td>
                    <span id="E5_1" style=""><input type="checkbox" class="kinnie-checkbox" id="E5-1" name="E5_1" value="false" onclick="checkboxChange('E5-1', 'E5_1')"> </span>
                  </td>
                  <td>
                    <span id="E5_2" style=""><input type="checkbox" class="kinnie-checkbox" id="E5-2" name="E5_2" value="false" onclick="checkboxChange('E5-2', 'E5_2')"> </span>
                  </td>
                  <td>
                    <span id="E5_3" style=""><input type="checkbox" class="kinnie-checkbox" id="E5-3" name="E5_3" value="false" onclick="checkboxChange('E5-3', 'E5_3')"> </span>
                  </td>
                  <td>
                    <span id="E5_4" style=""><input type="checkbox" class="kinnie-checkbox" id="E5-4" name="E5_4" value="false" onclick="checkboxChange('E5-4', 'E5_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">F1</td>
                  <td>
                    <span id="F1_1" style=""><input type="checkbox" class="kinnie-checkbox" id="F1-1" name="F1_1" value="false" onclick="checkboxChange('F1-1', 'F1_1')"> </span>
                  </td>
                  <td>
                    <span id="F1_2" style=""><input type="checkbox" class="kinnie-checkbox" id="F1-2" name="F1_2" value="false" onclick="checkboxChange('F1-2', 'F1_2')"> </span>
                  </td>
                  <td>
                    <span id="F1_3" style=""><input type="checkbox" class="kinnie-checkbox" id="F1-3" name="F1_3" value="false" onclick="checkboxChange('F1-3', 'F1_3')"> </span>
                  </td>
                  <td>
                    <span id="F1_4" style=""><input type="checkbox" class="kinnie-checkbox" id="F1-4" name="F1_4" value="false" onclick="checkboxChange('F1-4', 'F1_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">F2</td>
                  <td>
                    <span id="F2_1" style=""><input type="checkbox" class="kinnie-checkbox" id="F2-1" name="F2_1" value="false" onclick="checkboxChange('F2-1', 'F2_1')"> </span>
                  </td>
                  <td>
                    <span id="F2_2" style=""><input type="checkbox" class="kinnie-checkbox" id="F2-2" name="F2_2" value="false" onclick="checkboxChange('F2-2', 'F2_2')"> </span>
                  </td>
                  <td>
                    <span id="F2_3" style=""><input type="checkbox" class="kinnie-checkbox" id="F2-3" name="F2_3" value="false" onclick="checkboxChange('F2-3', 'F2_3')"> </span>
                  </td>
                  <td>
                    <span id="F2_4" style=""><input type="checkbox" class="kinnie-checkbox" id="F2-4" name="F2_4" value="false" onclick="checkboxChange('F2-4', 'F2_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">F3</td>
                  <td>
                    <span id="F3_1" style=""><input type="checkbox" class="kinnie-checkbox" id="F3-1" name="F3_1" value="false" onclick="checkboxChange('F3-1', 'F3_1')"> </span>
                  </td>
                  <td>
                    <span id="F3_2" style=""><input type="checkbox" class="kinnie-checkbox" id="F3-2" name="F3_2" value="false" onclick="checkboxChange('F3-2', 'F3_2')"> </span>
                  </td>
                  <td>
                    <span id="F3_3" style=""><input type="checkbox" class="kinnie-checkbox" id="F3-3" name="F3_3" value="false" onclick="checkboxChange('F3-3', 'F3_3')"> </span>
                  </td>
                  <td>
                    <span id="F3_4" style=""><input type="checkbox" class="kinnie-checkbox" id="F3-4" name="F3_4" value="false" onclick="checkboxChange('F3-4', 'F3_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">F4</td>
                  <td>
                    <span id="F4_1" style=""><input type="checkbox" class="kinnie-checkbox" id="F4-1" name="F4_1" value="false" onclick="checkboxChange('F4-1', 'F4_1')"> </span>
                  </td>
                  <td>
                    <span id="F4_2" style=""><input type="checkbox" class="kinnie-checkbox" id="F4-2" name="F4_2" value="false" onclick="checkboxChange('F4-2', 'F4_2')"> </span>
                  </td>
                  <td>
                    <span id="F4_3" style=""><input type="checkbox" class="kinnie-checkbox" id="F4-3" name="F4_3" value="false" onclick="checkboxChange('F4-3', 'F4_3')"> </span>
                  </td>
                  <td>
                    <span id="F4_4" style=""><input type="checkbox" class="kinnie-checkbox" id="F4-4" name="F4_4" value="false" onclick="checkboxChange('F4-4', 'F4_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">F5</td>
                  <td>
                    <span id="F5_1" style=""><input type="checkbox" class="kinnie-checkbox" id="F5-1" name="F5_1" value="false" onclick="checkboxChange('F5-1', 'F5_1')"> </span>
                  </td>
                  <td>
                    <span id="F5_2" style=""><input type="checkbox" class="kinnie-checkbox" id="F5-2" name="F5_2" value="false" onclick="checkboxChange('F5-2', 'F5_2')"> </span>
                  </td>
                  <td>
                    <span id="F5_3" style=""><input type="checkbox" class="kinnie-checkbox" id="F5-3" name="F5_3" value="false" onclick="checkboxChange('F5-3', 'F5_3')"> </span>
                  </td>
                  <td>
                    <span id="F5_4" style=""><input type="checkbox" class="kinnie-checkbox" id="F5-4" name="F5_4" value="false" onclick="checkboxChange('F5-4', 'F5_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G1</td>
                  <td>
                    <span id="G1_1" style=""><input type="checkbox" class="kinnie-checkbox" id="G1-1" name="G1_1" value="false" onclick="checkboxChange('G1-1', 'G1_1')"> </span>
                  </td>
                  <td>
                    <span id="G1_2" style=""><input type="checkbox" class="kinnie-checkbox" id="G1-2" name="G1_2" value="false" onclick="checkboxChange('G1-2', 'G1_2')"> </span>
                  </td>
                  <td>
                    <span id="G1_3" style=""><input type="checkbox" class="kinnie-checkbox" id="G1-3" name="G1_3" value="false" onclick="checkboxChange('G1-3', 'G1_3')"> </span>
                  </td>
                  <td>
                    <span id="G1_4" style=""><input type="checkbox" class="kinnie-checkbox" id="G1-4" name="G1_4" value="false" onclick="checkboxChange('G1-4', 'G1_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G2</td>
                  <td>
                    <span id="G2_1" style=""><input type="checkbox" class="kinnie-checkbox" id="G2-1" name="G2_1" value="false" onclick="checkboxChange('G2-1', 'G2_1')"> </span>
                  </td>
                  <td>
                    <span id="G2_2" style=""><input type="checkbox" class="kinnie-checkbox" id="G2-2" name="G2_2" value="false" onclick="checkboxChange('G2-2', 'G2_2')"> </span>
                  </td>
                  <td>
                    <span id="G2_3" style=""><input type="checkbox" class="kinnie-checkbox" id="G2-3" name="G2_3" value="false" onclick="checkboxChange('G2-3', 'G2_3')"> </span>
                  </td>
                  <td>
                    <span id="G2_4" style=""><input type="checkbox" class="kinnie-checkbox" id="G2-4" name="G2_4" value="false" onclick="checkboxChange('G2-4', 'G2_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G3</td>
                  <td>
                    <span id="G3_1" style=""><input type="checkbox" class="kinnie-checkbox" id="G3-1" name="G3_1" value="false" onclick="checkboxChange('G3-1', 'G3_1')"> </span>
                  </td>
                  <td>
                    <span id="G3_2" style=""><input type="checkbox" class="kinnie-checkbox" id="G3-2" name="G3_2" value="false" onclick="checkboxChange('G3-2', 'G3_2')"> </span>
                  </td>
                  <td>
                    <span id="G3_3" style=""><input type="checkbox" class="kinnie-checkbox" id="G3-3" name="G3_3" value="false" onclick="checkboxChange('G3-3', 'G3_3')"> </span>
                  </td>
                  <td>
                    <span id="G3_4" style=""><input type="checkbox" class="kinnie-checkbox" id="G3-4" name="G3_4" value="false" onclick="checkboxChange('G3-4', 'G3_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G4</td>
                  <td>
                    <span id="G4_1" style=""><input type="checkbox" class="kinnie-checkbox" id="G4-1" name="G4_1" value="false" onclick="checkboxChange('G4-1', 'G4_1')"> </span>
                  </td>
                  <td>
                    <span id="G4_2" style=""><input type="checkbox" class="kinnie-checkbox" id="G4-2" name="G4_2" value="false" onclick="checkboxChange('G4-2', 'G4_2')"> </span>
                  </td>
                  <td>
                    <span id="G4_3" style=""><input type="checkbox" class="kinnie-checkbox" id="G4-3" name="G4_3" value="false" onclick="checkboxChange('G4-3', 'G4_3')"> </span>
                  </td>
                  <td>
                    <span id="G4_4" style=""><input type="checkbox" class="kinnie-checkbox" id="G4-4" name="G4_4" value="false" onclick="checkboxChange('G4-4', 'G4_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G5</td>
                  <td>
                    <span id="G5_1" style=""><input type="checkbox" class="kinnie-checkbox" id="G5-1" name="G5_1" value="false" onclick="checkboxChange('G5-1', 'G5_1')"> </span>
                  </td>
                  <td>
                    <span id="G5_2" style=""><input type="checkbox" class="kinnie-checkbox" id="G5-2" name="G5_2" value="false" onclick="checkboxChange('G5-2', 'G5_2')"> </span>
                  </td>
                  <td>
                    <span id="G5_3" style=""><input type="checkbox" class="kinnie-checkbox" id="G5-3" name="G5_3" value="false" onclick="checkboxChange('G5-3', 'G5_3')"> </span>
                  </td>
                  <td>
                    <span id="G5_4" style=""><input type="checkbox" class="kinnie-checkbox" id="G5-4" name="G5_4" value="false" onclick="checkboxChange('G5-4', 'G5_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G6</td>
                  <td>
                    <span id="G6_1" style=""><input type="checkbox" class="kinnie-checkbox" id="G6-1" name="G6_1" value="false" onclick="checkboxChange('G6-1', 'G6_1')"> </span>
                  </td>
                  <td>
                    <span id="G6_2" style=""><input type="checkbox" class="kinnie-checkbox" id="G6-2" name="G6_2" value="false" onclick="checkboxChange('G6-2', 'G6_2')"> </span>
                  </td>
                  <td>
                    <span id="G6_3" style=""><input type="checkbox" class="kinnie-checkbox" id="G6-3" name="G6_3" value="false" onclick="checkboxChange('G6-3', 'G6_3')"> </span>
                  </td>
                  <td>
                    <span id="G6_4" style=""><input type="checkbox" class="kinnie-checkbox" id="G6-4" name="G6_4" value="false" onclick="checkboxChange('G6-4', 'G6_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G7</td>
                  <td>
                    <span id="G7_1" style=""><input type="checkbox" class="kinnie-checkbox" id="G7-1" name="G7_1" value="false" onclick="checkboxChange('G7-1', 'G7_1')"> </span>
                  </td>
                  <td>
                    <span id="G7_2" style=""><input type="checkbox" class="kinnie-checkbox" id="G7-2" name="G7_2" value="false" onclick="checkboxChange('G7-2', 'G7_2')"> </span>
                  </td>
                  <td>
                    <span id="G7_3" style=""><input type="checkbox" class="kinnie-checkbox" id="G7-3" name="G7_3" value="false" onclick="checkboxChange('G7-3', 'G7_3')"> </span>
                  </td>
                  <td>
                    <span id="G7_4" style=""><input type="checkbox" class="kinnie-checkbox" id="G7-4" name="G7_4" value="false" onclick="checkboxChange('G7-4', 'G7_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H1</td>
                  <td>
                    <span id="H1_1" style=""><input type="checkbox" class="kinnie-checkbox" id="H1-1" name="H1_1" value="false" onclick="checkboxChange('H1-1', 'H1_1')"> </span>
                  </td>
                  <td>
                    <span id="H1_2" style=""><input type="checkbox" class="kinnie-checkbox" id="H1-2" name="H1_2" value="false" onclick="checkboxChange('H1-2', 'H1_2')"> </span>
                  </td>
                  <td>
                    <span id="H1_3" style=""><input type="checkbox" class="kinnie-checkbox" id="H1-3" name="H1_3" value="false" onclick="checkboxChange('H1-3', 'H1_3')"> </span>
                  </td>
                  <td>
                    <span id="H1_4" style=""><input type="checkbox" class="kinnie-checkbox" id="H1-4" name="H1_4" value="false" onclick="checkboxChange('H1-4', 'H1_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H2</td>
                  <td>
                    <span id="H2_1" style=""><input type="checkbox" class="kinnie-checkbox" id="H2-1" name="H2_1" value="false" onclick="checkboxChange('H2-1', 'H2_1')"> </span>
                  </td>
                  <td>
                    <span id="H2_2" style=""><input type="checkbox" class="kinnie-checkbox" id="H2-2" name="H2_2" value="false" onclick="checkboxChange('H2-2', 'H2_2')"> </span>
                  </td>
                  <td>
                    <span id="H2_3" style=""><input type="checkbox" class="kinnie-checkbox" id="H2-3" name="H2_3" value="false" onclick="checkboxChange('H2-3', 'H2_3')"> </span>
                  </td>
                  <td>
                    <span id="H2_4" style=""><input type="checkbox" class="kinnie-checkbox" id="H2-4" name="H2_4" value="false" onclick="checkboxChange('H2-4', 'H2_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H3</td>
                  <td>
                    <span id="H3_1" style=""><input type="checkbox" class="kinnie-checkbox" id="H3-1" name="H3_1" value="false" onclick="checkboxChange('H3-1', 'H3_1')"> </span>
                  </td>
                  <td>
                    <span id="H3_2" style=""><input type="checkbox" class="kinnie-checkbox" id="H3-2" name="H3_2" value="false" onclick="checkboxChange('H3-2', 'H3_2')"> </span>
                  </td>
                  <td>
                    <span id="H3_3" style=""><input type="checkbox" class="kinnie-checkbox" id="H3-3" name="H3_3" value="false" onclick="checkboxChange('H3-3', 'H3_3')"> </span>
                  </td>
                  <td>
                    <span id="H3_4" style=""><input type="checkbox" class="kinnie-checkbox" id="H3-4" name="H3_4" value="false" onclick="checkboxChange('H3-4', 'H3_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H4</td>
                  <td>
                    <span id="H4_1" style=""><input type="checkbox" class="kinnie-checkbox" id="H4-1" name="H4_1" value="false" onclick="checkboxChange('H4-1', 'H4_1')"> </span>
                  </td>
                  <td>
                    <span id="H4_2" style=""><input type="checkbox" class="kinnie-checkbox" id="H4-2" name="H4_2" value="false" onclick="checkboxChange('H4-2', 'H4_2')"> </span>
                  </td>
                  <td>
                    <span id="H4_3" style=""><input type="checkbox" class="kinnie-checkbox" id="H4-3" name="H4_3" value="false" onclick="checkboxChange('H4-3', 'H4_3')"> </span>
                  </td>
                  <td>
                    <span id="H4_4" style=""><input type="checkbox" class="kinnie-checkbox" id="H4-4" name="H4_4" value="false" onclick="checkboxChange('H4-4', 'H4_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H5</td>
                  <td>
                    <span id="H5_1" style=""><input type="checkbox" class="kinnie-checkbox" id="H5-1" name="H5_1" value="false" onclick="checkboxChange('H5-1', 'H5_1')"> </span>
                  </td>
                  <td>
                    <span id="H5_2" style=""><input type="checkbox" class="kinnie-checkbox" id="H5-2" name="H5_2" value="false" onclick="checkboxChange('H5-2', 'H5_2')"> </span>
                  </td>
                  <td>
                    <span id="H5_3" style=""><input type="checkbox" class="kinnie-checkbox" id="H5-3" name="H5_3" value="false" onclick="checkboxChange('H5-3', 'H5_3')"> </span>
                  </td>
                  <td>
                    <span id="H5_4" style=""><input type="checkbox" class="kinnie-checkbox" id="H5-4" name="H5_4" value="false" onclick="checkboxChange('H5-4', 'H5_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H6</td>
                  <td>
                    <span id="H6_1" style=""><input type="checkbox" class="kinnie-checkbox" id="H6-1" name="H6_1" value="false" onclick="checkboxChange('H6-1', 'H6_1')"> </span>
                  </td>
                  <td>
                    <span id="H6_2" style=""><input type="checkbox" class="kinnie-checkbox" id="H6-2" name="H6_2" value="false" onclick="checkboxChange('H6-2', 'H6_2')"> </span>
                  </td>
                  <td>
                    <span id="H6_3" style=""><input type="checkbox" class="kinnie-checkbox" id="H6-3" name="H6_3" value="false" onclick="checkboxChange('H6-3', 'H6_3')"> </span>
                  </td>
                  <td>
                    <span id="H6_4" style=""><input type="checkbox" class="kinnie-checkbox" id="H6-4" name="H6_4" value="false" onclick="checkboxChange('H6-4', 'H6_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H7</td>
                  <td>
                    <span id="H7_1" style=""><input type="checkbox" class="kinnie-checkbox" id="H7-1" name="H7_1" value="false" onclick="checkboxChange('H7-1', 'H7_1')"> </span>
                  </td>
                  <td>
                    <span id="H7_2" style=""><input type="checkbox" class="kinnie-checkbox" id="H7-2" name="H7_2" value="false" onclick="checkboxChange('H7-2', 'H7_2')"> </span>
                  </td>
                  <td>
                    <span id="H7_3" style=""><input type="checkbox" class="kinnie-checkbox" id="H7-3" name="H7_3" value="false" onclick="checkboxChange('H7-3', 'H7_3')"> </span>
                  </td>
                  <td>
                    <span id="H7_4" style=""><input type="checkbox" class="kinnie-checkbox" id="H7-4" name="H7_4" value="false" onclick="checkboxChange('H7-4', 'H7_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H8</td>
                  <td>
                    <span id="H8_1" style=""><input type="checkbox" class="kinnie-checkbox" id="H8-1" name="H8_1" value="false" onclick="checkboxChange('H8-1', 'H8_1')"> </span>
                  </td>
                  <td>
                    <span id="H8_2" style=""><input type="checkbox" class="kinnie-checkbox" id="H8-2" name="H8_2" value="false" onclick="checkboxChange('H8-2', 'H8_2')"> </span>
                  </td>
                  <td>
                    <span id="H8_3" style=""><input type="checkbox" class="kinnie-checkbox" id="H8-3" name="H8_3" value="false" onclick="checkboxChange('H8-3', 'H8_3')"> </span>
                  </td>
                  <td>
                    <span id="H8_4" style=""><input type="checkbox" class="kinnie-checkbox" id="H8-4" name="H8_4" value="false" onclick="checkboxChange('H8-4', 'H8_4')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H9</td>
                  <td>
                    <span id="H9_1" style=""><input type="checkbox" class="kinnie-checkbox" id="H9-1" name="H9_1" value="false" onclick="checkboxChange('H9-1', 'H9_1')"> </span>
                  </td>
                  <td>
                    <span id="H9_2" style=""><input type="checkbox" class="kinnie-checkbox" id="H9-2" name="H9_2" value="false" onclick="checkboxChange('H9-2', 'H9_2')"> </span>
                  </td>
                  <td>
                    <span id="H9_3" style=""><input type="checkbox" class="kinnie-checkbox" id="H9-3" name="H9_3" value="false" onclick="checkboxChange('H9-3', 'H9_3')"> </span>
                  </td>
                  <td>
                    <span id="H9_4" style=""><input type="checkbox" class="kinnie-checkbox" id="H9-4" name="H9_4" value="false" onclick="checkboxChange('H9-4', 'H9_4')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="border-right: 1px solid;vertical-align: top;">
            <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: 0;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                <td style="font-size: 7px;">A1</td>
                  <td>
                    <span id="A1_5" style=""><input type="checkbox" class="kinnie-checkbox" id="A1-5" name="A1_5" value="false" onclick="checkboxChange('A1-5', 'A1_5')"> </span>
                  </td>
                  <td>
                    <span id="A1_6" style=""><input type="checkbox" class="kinnie-checkbox" id="A1-6" name="A1_6" value="false" onclick="checkboxChange('A1-6', 'A1_6')"> </span>
                  </td>
                  <td>
                    <span id="A1_7" style=""><input type="checkbox" class="kinnie-checkbox" id="A1-7" name="A1_7" value="false" onclick="checkboxChange('A1-7', 'A1_7')"> </span>
                  </td>
                  <td>
                    <span id="A1_8" style=""><input type="checkbox" class="kinnie-checkbox" id="A1-8" name="A1_8" value="false" onclick="checkboxChange('A1-8', 'A1_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A2</td>
                  <td>
                    <span id="A2_5" style=""><input type="checkbox" class="kinnie-checkbox" id="A2-5" name="A2_5" value="false" onclick="checkboxChange('A2-5', 'A2_5')"> </span>
                  </td>
                  <td>
                    <span id="A2_6" style=""><input type="checkbox" class="kinnie-checkbox" id="A2-6" name="A2_6" value="false" onclick="checkboxChange('A2-6', 'A2_6')"> </span>
                  </td>
                  <td>
                    <span id="A2_7" style=""><input type="checkbox" class="kinnie-checkbox" id="A2-7" name="A2_7" value="false" onclick="checkboxChange('A2-7', 'A2_7')"> </span>
                  </td>
                  <td>
                    <span id="A2_8" style=""><input type="checkbox" class="kinnie-checkbox" id="A2-8" name="A2_8" value="false" onclick="checkboxChange('A2-8', 'A2_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A3</td>
                  <td>
                    <span id="A3_5" style=""><input type="checkbox" class="kinnie-checkbox" id="A3-5" name="A3_5" value="false" onclick="checkboxChange('A3-5', 'A3_5')"> </span>
                  </td>
                  <td>
                    <span id="A3_6" style=""><input type="checkbox" class="kinnie-checkbox" id="A3-6" name="A3_6" value="false" onclick="checkboxChange('A3-6', 'A3_6')"> </span>
                  </td>
                  <td>
                    <span id="A3_7" style=""><input type="checkbox" class="kinnie-checkbox" id="A3-7" name="A3_7" value="false" onclick="checkboxChange('A3-7', 'A3_7')"> </span>
                  </td>
                  <td>
                    <span id="A3_8" style=""><input type="checkbox" class="kinnie-checkbox" id="A3-8" name="A3_8" value="false" onclick="checkboxChange('A3-8', 'A3_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A4</td>
                  <td>
                    <span id="A4_5" style=""><input type="checkbox" class="kinnie-checkbox" id="A4-5" name="A4_5" value="false" onclick="checkboxChange('A4-5', 'A4_5')"> </span>
                  </td>
                  <td>
                    <span id="A4_6" style=""><input type="checkbox" class="kinnie-checkbox" id="A4-6" name="A4_6" value="false" onclick="checkboxChange('A4-6', 'A4_6')"> </span>
                  </td>
                  <td>
                    <span id="A4_7" style=""><input type="checkbox" class="kinnie-checkbox" id="A4-7" name="A4_7" value="false" onclick="checkboxChange('A4-7', 'A4_7')"> </span>
                  </td>
                  <td>
                    <span id="A4_8" style=""><input type="checkbox" class="kinnie-checkbox" id="A4-8" name="A4_8" value="false" onclick="checkboxChange('A4-8', 'A4_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A5</td>
                  <td>
                    <span id="A5_5" style=""><input type="checkbox" class="kinnie-checkbox" id="A5-5" name="A5_5" value="false" onclick="checkboxChange('A5-5', 'A5_5')"> </span>
                  </td>
                  <td>
                    <span id="A5_6" style=""><input type="checkbox" class="kinnie-checkbox" id="A5-6" name="A5_6" value="false" onclick="checkboxChange('A5-6', 'A5_6')"> </span>
                  </td>
                  <td>
                    <span id="A5_7" style=""><input type="checkbox" class="kinnie-checkbox" id="A5-7" name="A5_7" value="false" onclick="checkboxChange('A5-7', 'A5_7')"> </span>
                  </td>
                  <td>
                    <span id="A5_8" style=""><input type="checkbox" class="kinnie-checkbox" id="A5-8" name="A5_8" value="false" onclick="checkboxChange('A5-8', 'A5_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A6</td>
                  <td>
                    <span id="A6_5" style=""><input type="checkbox" class="kinnie-checkbox" id="A6-5" name="A6_5" value="false" onclick="checkboxChange('A6-5', 'A6_5')"> </span>
                  </td>
                  <td>
                    <span id="A6_6" style=""><input type="checkbox" class="kinnie-checkbox" id="A6-6" name="A6_6" value="false" onclick="checkboxChange('A6-6', 'A6_6')"> </span>
                  </td>
                  <td>
                    <span id="A6_7" style=""><input type="checkbox" class="kinnie-checkbox" id="A6-7" name="A6_7" value="false" onclick="checkboxChange('A6-7', 'A6_7')"> </span>
                  </td>
                  <td>
                    <span id="A6_8" style=""><input type="checkbox" class="kinnie-checkbox" id="A6-8" name="A6_8" value="false" onclick="checkboxChange('A6-8', 'A6_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A7</td>
                  <td>
                    <span id="A7_5" style=""><input type="checkbox" class="kinnie-checkbox" id="A7-5" name="A7_5" value="false" onclick="checkboxChange('A7-5', 'A7_5')"> </span>
                  </td>
                  <td>
                    <span id="A7_6" style=""><input type="checkbox" class="kinnie-checkbox" id="A7-6" name="A7_6" value="false" onclick="checkboxChange('A7-6', 'A7_6')"> </span>
                  </td>
                  <td>
                    <span id="A7_7" style=""><input type="checkbox" class="kinnie-checkbox" id="A7-7" name="A7_7" value="false" onclick="checkboxChange('A7-7', 'A7_7')"> </span>
                  </td>
                  <td>
                    <span id="A7_8" style=""><input type="checkbox" class="kinnie-checkbox" id="A7-8" name="A7_8" value="false" onclick="checkboxChange('A7-8', 'A7_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A8</td>
                  <td>
                    <span id="A8_5" style=""><input type="checkbox" class="kinnie-checkbox" id="A8-5" name="A8_5" value="false" onclick="checkboxChange('A8-5', 'A8_5')"> </span>
                  </td>
                  <td>
                    <span id="A8_6" style=""><input type="checkbox" class="kinnie-checkbox" id="A8-6" name="A8_6" value="false" onclick="checkboxChange('A8-6', 'A8_6')"> </span>
                  </td>
                  <td>
                    <span id="A8_7" style=""><input type="checkbox" class="kinnie-checkbox" id="A8-7" name="A8_7" value="false" onclick="checkboxChange('A8-7', 'A8_7')"> </span>
                  </td>
                  <td>
                    <span id="A8_8" style=""><input type="checkbox" class="kinnie-checkbox" id="A8-8" name="A8_8" value="false" onclick="checkboxChange('A8-8', 'A8_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B1</td>
                  <td>
                    <span id="B1_5" style=""><input type="checkbox" class="kinnie-checkbox" id="B1-5" name="B1_5" value="false" onclick="checkboxChange('B1-5', 'B1_5')"> </span>
                  </td>
                  <td>
                    <span id="B1_6" style=""><input type="checkbox" class="kinnie-checkbox" id="B1-6" name="B1_6" value="false" onclick="checkboxChange('B1-6', 'B1_6')"> </span>
                  </td>
                  <td>
                    <span id="B1_7" style=""><input type="checkbox" class="kinnie-checkbox" id="B1-7" name="B1_7" value="false" onclick="checkboxChange('B1-7', 'B1_7')"> </span>
                  </td>
                  <td>
                    <span id="B1_8" style=""><input type="checkbox" class="kinnie-checkbox" id="B1-8" name="B1_8" value="false" onclick="checkboxChange('B1-8', 'B1_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B2</td>
                  <td>
                    <span id="B2_5" style=""><input type="checkbox" class="kinnie-checkbox" id="B2-5" name="B2_5" value="false" onclick="checkboxChange('B2-5', 'B2_5')"> </span>
                  </td>
                  <td>
                    <span id="B2_6" style=""><input type="checkbox" class="kinnie-checkbox" id="B2-6" name="B2_6" value="false" onclick="checkboxChange('B2-6', 'B2_6')"> </span>
                  </td>
                  <td>
                    <span id="B2_7" style=""><input type="checkbox" class="kinnie-checkbox" id="B2-7" name="B2_7" value="false" onclick="checkboxChange('B2-7', 'B2_7')"> </span>
                  </td>
                  <td>
                    <span id="B2_8" style=""><input type="checkbox" class="kinnie-checkbox" id="B2-8" name="B2_8" value="false" onclick="checkboxChange('B2-8', 'B2_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B3</td>
                  <td>
                    <span id="B3_5" style=""><input type="checkbox" class="kinnie-checkbox" id="B3-5" name="B3_5" value="false" onclick="checkboxChange('B3-5', 'B3_5')"> </span>
                  </td>
                  <td>
                    <span id="B3_6" style=""><input type="checkbox" class="kinnie-checkbox" id="B3-6" name="B3_6" value="false" onclick="checkboxChange('B3-6', 'B3_6')"> </span>
                  </td>
                  <td>
                    <span id="B3_7" style=""><input type="checkbox" class="kinnie-checkbox" id="B3-7" name="B3_7" value="false" onclick="checkboxChange('B3-7', 'B3_7')"> </span>
                  </td>
                  <td>
                    <span id="B3_8" style=""><input type="checkbox" class="kinnie-checkbox" id="B3-8" name="B3_8" value="false" onclick="checkboxChange('B3-8', 'B3_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B4</td>
                  <td>
                    <span id="B4_5" style=""><input type="checkbox" class="kinnie-checkbox" id="B4-5" name="B4_5" value="false" onclick="checkboxChange('B4-5', 'B4_5')"> </span>
                  </td>
                  <td>
                    <span id="B4_6" style=""><input type="checkbox" class="kinnie-checkbox" id="B4-6" name="B4_6" value="false" onclick="checkboxChange('B4-6', 'B4_6')"> </span>
                  </td>
                  <td>
                    <span id="B4_7" style=""><input type="checkbox" class="kinnie-checkbox" id="B4-7" name="B4_7" value="false" onclick="checkboxChange('B4-7', 'B4_7')"> </span>
                  </td>
                  <td>
                    <span id="B4_8" style=""><input type="checkbox" class="kinnie-checkbox" id="B4-8" name="B4_8" value="false" onclick="checkboxChange('B4-8', 'B4_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B5</td>
                  <td>
                    <span id="B5_5" style=""><input type="checkbox" class="kinnie-checkbox" id="B5-5" name="B5_5" value="false" onclick="checkboxChange('B5-5', 'B5_5')"> </span>
                  </td>
                  <td>
                    <span id="B5_6" style=""><input type="checkbox" class="kinnie-checkbox" id="B5-6" name="B5_6" value="false" onclick="checkboxChange('B5-6', 'B5_6')"> </span>
                  </td>
                  <td>
                    <span id="B5_7" style=""><input type="checkbox" class="kinnie-checkbox" id="B5-7" name="B5_7" value="false" onclick="checkboxChange('B5-7', 'B5_7')"> </span>
                  </td>
                  <td>
                    <span id="B5_8" style=""><input type="checkbox" class="kinnie-checkbox" id="B5-8" name="B5_8" value="false" onclick="checkboxChange('B5-8', 'B5_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B6</td>
                  <td>
                    <span id="B6_5" style=""><input type="checkbox" class="kinnie-checkbox" id="B6-5" name="B6_5" value="false" onclick="checkboxChange('B6-5', 'B6_5')"> </span>
                  </td>
                  <td>
                    <span id="B6_6" style=""><input type="checkbox" class="kinnie-checkbox" id="B6-6" name="B6_6" value="false" onclick="checkboxChange('B6-6', 'B6_6')"> </span>
                  </td>
                  <td>
                    <span id="B6_7" style=""><input type="checkbox" class="kinnie-checkbox" id="B6-7" name="B6_7" value="false" onclick="checkboxChange('B6-7', 'B6_7')"> </span>
                  </td>
                  <td>
                    <span id="B6_8" style=""><input type="checkbox" class="kinnie-checkbox" id="B6-8" name="B6_8" value="false" onclick="checkboxChange('B6-8', 'B6_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B7</td>
                  <td>
                    <span id="B7_5" style=""><input type="checkbox" class="kinnie-checkbox" id="B7-5" name="B7_5" value="false" onclick="checkboxChange('B7-5', 'B7_5')"> </span>
                  </td>
                  <td>
                    <span id="B7_6" style=""><input type="checkbox" class="kinnie-checkbox" id="B7-6" name="B7_6" value="false" onclick="checkboxChange('B7-6', 'B7_6')"> </span>
                  </td>
                  <td>
                    <span id="B7_7" style=""><input type="checkbox" class="kinnie-checkbox" id="B7-7" name="B7_7" value="false" onclick="checkboxChange('B7-7', 'B7_7')"> </span>
                  </td>
                  <td>
                    <span id="B7_8" style=""><input type="checkbox" class="kinnie-checkbox" id="B7-8" name="B7_8" value="false" onclick="checkboxChange('B7-8', 'B7_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">C1</td>
                  <td>
                    <span id="C1_5" style=""><input type="checkbox" class="kinnie-checkbox" id="C1-5" name="C1_5" value="false" onclick="checkboxChange('C1-5', 'C1_5')"> </span>
                  </td>
                  <td>
                    <span id="C1_6" style=""><input type="checkbox" class="kinnie-checkbox" id="C1-6" name="C1_6" value="false" onclick="checkboxChange('C1-6', 'C1_6')"> </span>
                  </td>
                  <td>
                    <span id="C1_7" style=""><input type="checkbox" class="kinnie-checkbox" id="C1-7" name="C1_7" value="false" onclick="checkboxChange('C1-7', 'C1_7')"> </span>
                  </td>
                  <td>
                    <span id="C1_8" style=""><input type="checkbox" class="kinnie-checkbox" id="C1-8" name="C1_8" value="false" onclick="checkboxChange('C1-8', 'C1_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">C2</td>
                  <td>
                    <span id="C2_5" style=""><input type="checkbox" class="kinnie-checkbox" id="C2-5" name="C2_5" value="false" onclick="checkboxChange('C2-5', 'C2_5')"> </span>
                  </td>
                  <td>
                    <span id="C2_6" style=""><input type="checkbox" class="kinnie-checkbox" id="C2-6" name="C2_6" value="false" onclick="checkboxChange('C2-6', 'C2_6')"> </span>
                  </td>
                  <td>
                    <span id="C2_7" style=""><input type="checkbox" class="kinnie-checkbox" id="C2-7" name="C2_7" value="false" onclick="checkboxChange('C2-7', 'C2_7')"> </span>
                  </td>
                  <td>
                    <span id="C2_8" style=""><input type="checkbox" class="kinnie-checkbox" id="C2-8" name="C2_8" value="false" onclick="checkboxChange('C2-8', 'C2_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">C3</td>
                  <td>
                    <span id="C3_5" style=""><input type="checkbox" class="kinnie-checkbox" id="C3-5" name="C3_5" value="false" onclick="checkboxChange('C3-5', 'C3_5')"> </span>
                  </td>
                  <td>
                    <span id="C3_6" style=""><input type="checkbox" class="kinnie-checkbox" id="C3-6" name="C3_6" value="false" onclick="checkboxChange('C3-6', 'C3_6')"> </span>
                  </td>
                  <td>
                    <span id="C3_7" style=""><input type="checkbox" class="kinnie-checkbox" id="C3-7" name="C3_7" value="false" onclick="checkboxChange('C3-7', 'C3_7')"> </span>
                  </td>
                  <td>
                    <span id="C3_8" style=""><input type="checkbox" class="kinnie-checkbox" id="C3-8" name="C3_8" value="false" onclick="checkboxChange('C3-8', 'C3_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">C4</td>
                  <td>
                    <span id="C4_5" style=""><input type="checkbox" class="kinnie-checkbox" id="C4-5" name="C4_5" value="false" onclick="checkboxChange('C4-5', 'C4_5')"> </span>
                  </td>
                  <td>
                    <span id="C4_6" style=""><input type="checkbox" class="kinnie-checkbox" id="C4-6" name="C4_6" value="false" onclick="checkboxChange('C4-6', 'C4_6')"> </span>
                  </td>
                  <td>
                    <span id="C4_7" style=""><input type="checkbox" class="kinnie-checkbox" id="C4-7" name="C4_7" value="false" onclick="checkboxChange('C4-7', 'C4_7')"> </span>
                  </td>
                  <td>
                    <span id="C4_8" style=""><input type="checkbox" class="kinnie-checkbox" id="C4-8" name="C4_8" value="false" onclick="checkboxChange('C4-8', 'C4_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">C5</td>
                  <td>
                    <span id="C5_5" style=""><input type="checkbox" class="kinnie-checkbox" id="C5-5" name="C5_5" value="false" onclick="checkboxChange('C5-5', 'C5_5')"> </span>
                  </td>
                  <td>
                    <span id="C5_6" style=""><input type="checkbox" class="kinnie-checkbox" id="C5-6" name="C5_6" value="false" onclick="checkboxChange('C5-6', 'C5_6')"> </span>
                  </td>
                  <td>
                    <span id="C5_7" style=""><input type="checkbox" class="kinnie-checkbox" id="C5-7" name="C5_7" value="false" onclick="checkboxChange('C5-7', 'C5_7')"> </span>
                  </td>
                  <td>
                    <span id="C5_8" style=""><input type="checkbox" class="kinnie-checkbox" id="C5-8" name="C5_8" value="false" onclick="checkboxChange('C5-8', 'C5_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">D1</td>
                  <td>
                    <span id="D1_5" style=""><input type="checkbox" class="kinnie-checkbox" id="D1-5" name="D1_5" value="false" onclick="checkboxChange('D1-5', 'D1_5')"> </span>
                  </td>
                  <td>
                    <span id="D1_6" style=""><input type="checkbox" class="kinnie-checkbox" id="D1-6" name="D1_6" value="false" onclick="checkboxChange('D1-6', 'D1_6')"> </span>
                  </td>
                  <td>
                    <span id="D1_7" style=""><input type="checkbox" class="kinnie-checkbox" id="D1-7" name="D1_7" value="false" onclick="checkboxChange('D1-7', 'D1_7')"> </span>
                  </td>
                  <td>
                    <span id="D1_8" style=""><input type="checkbox" class="kinnie-checkbox" id="D1-8" name="D1_8" value="false" onclick="checkboxChange('D1-8', 'D1_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">D2</td>
                  <td>
                    <span id="D2_5" style=""><input type="checkbox" class="kinnie-checkbox" id="D2-5" name="D2_5" value="false" onclick="checkboxChange('D2-5', 'D2_5')"> </span>
                  </td>
                  <td>
                    <span id="D2_6" style=""><input type="checkbox" class="kinnie-checkbox" id="D2-6" name="D2_6" value="false" onclick="checkboxChange('D2-6', 'D2_6')"> </span>
                  </td>
                  <td>
                    <span id="D2_7" style=""><input type="checkbox" class="kinnie-checkbox" id="D2-7" name="D2_7" value="false" onclick="checkboxChange('D2-7', 'D2_7')"> </span>
                  </td>
                  <td>
                    <span id="D2_8" style=""><input type="checkbox" class="kinnie-checkbox" id="D2-8" name="D2_8" value="false" onclick="checkboxChange('D2-8', 'D2_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">D3</td>
                  <td>
                    <span id="D3_5" style=""><input type="checkbox" class="kinnie-checkbox" id="D3-5" name="D3_5" value="false" onclick="checkboxChange('D3-5', 'D3_5')"> </span>
                  </td>
                  <td>
                    <span id="D3_6" style=""><input type="checkbox" class="kinnie-checkbox" id="D3-6" name="D3_6" value="false" onclick="checkboxChange('D3-6', 'D3_6')"> </span>
                  </td>
                  <td>
                    <span id="D3_7" style=""><input type="checkbox" class="kinnie-checkbox" id="D3-7" name="D3_7" value="false" onclick="checkboxChange('D3-7', 'D3_7')"> </span>
                  </td>
                  <td>
                    <span id="D3_8" style=""><input type="checkbox" class="kinnie-checkbox" id="D3-8" name="D3_8" value="false" onclick="checkboxChange('D3-8', 'D3_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">E1</td>
                  <td>
                    <span id="E1_5" style=""><input type="checkbox" class="kinnie-checkbox" id="E1-5" name="E1_5" value="false" onclick="checkboxChange('E1-5', 'E1_5')"> </span>
                  </td>
                  <td>
                    <span id="E1_6" style=""><input type="checkbox" class="kinnie-checkbox" id="E1-6" name="E1_6" value="false" onclick="checkboxChange('E1-6', 'E1_6')"> </span>
                  </td>
                  <td>
                    <span id="E1_7" style=""><input type="checkbox" class="kinnie-checkbox" id="E1-7" name="E1_7" value="false" onclick="checkboxChange('E1-7', 'E1_7')"> </span>
                  </td>
                  <td>
                    <span id="E1_8" style=""><input type="checkbox" class="kinnie-checkbox" id="E1-8" name="E1_8" value="false" onclick="checkboxChange('E1-8', 'E1_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">E2</td>
                  <td>
                    <span id="E2_5" style=""><input type="checkbox" class="kinnie-checkbox" id="E2-5" name="E2_5" value="false" onclick="checkboxChange('E2-5', 'E2_5')"> </span>
                  </td>
                  <td>
                    <span id="E2_6" style=""><input type="checkbox" class="kinnie-checkbox" id="E2-6" name="E2_6" value="false" onclick="checkboxChange('E2-6', 'E2_6')"> </span>
                  </td>
                  <td>
                    <span id="E2_7" style=""><input type="checkbox" class="kinnie-checkbox" id="E2-7" name="E2_7" value="false" onclick="checkboxChange('E2-7', 'E2_7')"> </span>
                  </td>
                  <td>
                    <span id="E2_8" style=""><input type="checkbox" class="kinnie-checkbox" id="E2-8" name="E2_8" value="false" onclick="checkboxChange('E2-8', 'E2_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">E3</td>
                  <td>
                    <span id="E3_5" style=""><input type="checkbox" class="kinnie-checkbox" id="E3-5" name="E3_5" value="false" onclick="checkboxChange('E3-5', 'E3_5')"> </span>
                  </td>
                  <td>
                    <span id="E3_6" style=""><input type="checkbox" class="kinnie-checkbox" id="E3-6" name="E3_6" value="false" onclick="checkboxChange('E3-6', 'E3_6')"> </span>
                  </td>
                  <td>
                    <span id="E3_7" style=""><input type="checkbox" class="kinnie-checkbox" id="E3-7" name="E3_7" value="false" onclick="checkboxChange('E3-7', 'E3_7')"> </span>
                  </td>
                  <td>
                    <span id="E3_8" style=""><input type="checkbox" class="kinnie-checkbox" id="E3-8" name="E3_8" value="false" onclick="checkboxChange('E3-8', 'E3_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">E4</td>
                  <td>
                    <span id="E4_5" style=""><input type="checkbox" class="kinnie-checkbox" id="E4-5" name="E4_5" value="false" onclick="checkboxChange('E4-5', 'E4_5')"> </span>
                  </td>
                  <td>
                    <span id="E4_6" style=""><input type="checkbox" class="kinnie-checkbox" id="E4-6" name="E4_6" value="false" onclick="checkboxChange('E4-6', 'E4_6')"> </span>
                  </td>
                  <td>
                    <span id="E4_7" style=""><input type="checkbox" class="kinnie-checkbox" id="E4-7" name="E4_7" value="false" onclick="checkboxChange('E4-7', 'E4_7')"> </span>
                  </td>
                  <td>
                    <span id="E4_8" style=""><input type="checkbox" class="kinnie-checkbox" id="E4-8" name="E4_8" value="false" onclick="checkboxChange('E4-8', 'E4_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">E5</td>
                  <td>
                    <span id="E5_5" style=""><input type="checkbox" class="kinnie-checkbox" id="E5-5" name="E5_5" value="false" onclick="checkboxChange('E5-5', 'E5_5')"> </span>
                  </td>
                  <td>
                    <span id="E5_6" style=""><input type="checkbox" class="kinnie-checkbox" id="E5-6" name="E5_6" value="false" onclick="checkboxChange('E5-6', 'E5_6')"> </span>
                  </td>
                  <td>
                    <span id="E5_7" style=""><input type="checkbox" class="kinnie-checkbox" id="E5-7" name="E5_7" value="false" onclick="checkboxChange('E5-7', 'E5_7')"> </span>
                  </td>
                  <td>
                    <span id="E5_8" style=""><input type="checkbox" class="kinnie-checkbox" id="E5-8" name="E5_8" value="false" onclick="checkboxChange('E5-8', 'E5_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">F1</td>
                  <td>
                    <span id="F1_5" style=""><input type="checkbox" class="kinnie-checkbox" id="F1-5" name="F1_5" value="false" onclick="checkboxChange('F1-5', 'F1_5')"> </span>
                  </td>
                  <td>
                    <span id="F1_6" style=""><input type="checkbox" class="kinnie-checkbox" id="F1-6" name="F1_6" value="false" onclick="checkboxChange('F1-6', 'F1_6')"> </span>
                  </td>
                  <td>
                    <span id="F1_7" style=""><input type="checkbox" class="kinnie-checkbox" id="F1-7" name="F1_7" value="false" onclick="checkboxChange('F1-7', 'F1_7')"> </span>
                  </td>
                  <td>
                    <span id="F1_8" style=""><input type="checkbox" class="kinnie-checkbox" id="F1-8" name="F1_8" value="false" onclick="checkboxChange('F1-8', 'F1_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">F2</td>
                  <td>
                    <span id="F2_5" style=""><input type="checkbox" class="kinnie-checkbox" id="F2-5" name="F2_5" value="false" onclick="checkboxChange('F2-5', 'F2_5')"> </span>
                  </td>
                  <td>
                    <span id="F2_6" style=""><input type="checkbox" class="kinnie-checkbox" id="F2-6" name="F2_6" value="false" onclick="checkboxChange('F2-6', 'F2_6')"> </span>
                  </td>
                  <td>
                    <span id="F2_7" style=""><input type="checkbox" class="kinnie-checkbox" id="F2-7" name="F2_7" value="false" onclick="checkboxChange('F2-7', 'F2_7')"> </span>
                  </td>
                  <td>
                    <span id="F2_8" style=""><input type="checkbox" class="kinnie-checkbox" id="F2-8" name="F2_8" value="false" onclick="checkboxChange('F2-8', 'F2_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">F3</td>
                  <td>
                    <span id="F3_5" style=""><input type="checkbox" class="kinnie-checkbox" id="F3-5" name="F3_5" value="false" onclick="checkboxChange('F3-5', 'F3_5')"> </span>
                  </td>
                  <td>
                    <span id="F3_6" style=""><input type="checkbox" class="kinnie-checkbox" id="F3-6" name="F3_6" value="false" onclick="checkboxChange('F3-6', 'F3_6')"> </span>
                  </td>
                  <td>
                    <span id="F3_7" style=""><input type="checkbox" class="kinnie-checkbox" id="F3-7" name="F3_7" value="false" onclick="checkboxChange('F3-7', 'F3_7')"> </span>
                  </td>
                  <td>
                    <span id="F3_8" style=""><input type="checkbox" class="kinnie-checkbox" id="F3-8" name="F3_8" value="false" onclick="checkboxChange('F3-8', 'F3_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">F4</td>
                  <td>
                    <span id="F4_5" style=""><input type="checkbox" class="kinnie-checkbox" id="F4-5" name="F4_5" value="false" onclick="checkboxChange('F4-5', 'F4_5')"> </span>
                  </td>
                  <td>
                    <span id="F4_6" style=""><input type="checkbox" class="kinnie-checkbox" id="F4-6" name="F4_6" value="false" onclick="checkboxChange('F4-6', 'F4_6')"> </span>
                  </td>
                  <td>
                    <span id="F4_7" style=""><input type="checkbox" class="kinnie-checkbox" id="F4-7" name="F4_7" value="false" onclick="checkboxChange('F4-7', 'F4_7')"> </span>
                  </td>
                  <td>
                    <span id="F4_8" style=""><input type="checkbox" class="kinnie-checkbox" id="F4-8" name="F4_8" value="false" onclick="checkboxChange('F4-8', 'F4_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">F5</td>
                  <td>
                    <span id="F5_5" style=""><input type="checkbox" class="kinnie-checkbox" id="F5-5" name="F5_5" value="false" onclick="checkboxChange('F5-5', 'F5_5')"> </span>
                  </td>
                  <td>
                    <span id="F5_6" style=""><input type="checkbox" class="kinnie-checkbox" id="F5-6" name="F5_6" value="false" onclick="checkboxChange('F5-6', 'F5_6')"> </span>
                  </td>
                  <td>
                    <span id="F5_7" style=""><input type="checkbox" class="kinnie-checkbox" id="F5-7" name="F5_7" value="false" onclick="checkboxChange('F5-7', 'F5_7')"> </span>
                  </td>
                  <td>
                    <span id="F5_8" style=""><input type="checkbox" class="kinnie-checkbox" id="F5-8" name="F5_8" value="false" onclick="checkboxChange('F5-8', 'F5_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G1</td>
                  <td>
                    <span id="G1_5" style=""><input type="checkbox" class="kinnie-checkbox" id="G1-5" name="G1_5" value="false" onclick="checkboxChange('G1-5', 'G1_5')"> </span>
                  </td>
                  <td>
                    <span id="G1_6" style=""><input type="checkbox" class="kinnie-checkbox" id="G1-6" name="G1_6" value="false" onclick="checkboxChange('G1-6', 'G1_6')"> </span>
                  </td>
                  <td>
                    <span id="G1_7" style=""><input type="checkbox" class="kinnie-checkbox" id="G1-7" name="G1_7" value="false" onclick="checkboxChange('G1-7', 'G1_7')"> </span>
                  </td>
                  <td>
                    <span id="G1_8" style=""><input type="checkbox" class="kinnie-checkbox" id="G1-8" name="G1_8" value="false" onclick="checkboxChange('G1-8', 'G1_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G2</td>
                  <td>
                    <span id="G2_5" style=""><input type="checkbox" class="kinnie-checkbox" id="G2-5" name="G2_5" value="false" onclick="checkboxChange('G2-5', 'G2_5')"> </span>
                  </td>
                  <td>
                    <span id="G2_6" style=""><input type="checkbox" class="kinnie-checkbox" id="G2-6" name="G2_6" value="false" onclick="checkboxChange('G2-6', 'G2_6')"> </span>
                  </td>
                  <td>
                    <span id="G2_7" style=""><input type="checkbox" class="kinnie-checkbox" id="G2-7" name="G2_7" value="false" onclick="checkboxChange('G2-7', 'G2_7')"> </span>
                  </td>
                  <td>
                    <span id="G2_8" style=""><input type="checkbox" class="kinnie-checkbox" id="G2-8" name="G2_8" value="false" onclick="checkboxChange('G2-8', 'G2_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G3</td>
                  <td>
                    <span id="G3_5" style=""><input type="checkbox" class="kinnie-checkbox" id="G3-5" name="G3_5" value="false" onclick="checkboxChange('G3-5', 'G3_5')"> </span>
                  </td>
                  <td>
                    <span id="G3_6" style=""><input type="checkbox" class="kinnie-checkbox" id="G3-6" name="G3_6" value="false" onclick="checkboxChange('G3-6', 'G3_6')"> </span>
                  </td>
                  <td>
                    <span id="G3_7" style=""><input type="checkbox" class="kinnie-checkbox" id="G3-7" name="G3_7" value="false" onclick="checkboxChange('G3-7', 'G3_7')"> </span>
                  </td>
                  <td>
                    <span id="G3_8" style=""><input type="checkbox" class="kinnie-checkbox" id="G3-8" name="G3_8" value="false" onclick="checkboxChange('G3-8', 'G3_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G4</td>
                  <td>
                    <span id="G4_5" style=""><input type="checkbox" class="kinnie-checkbox" id="G4-5" name="G4_5" value="false" onclick="checkboxChange('G4-5', 'G4_5')"> </span>
                  </td>
                  <td>
                    <span id="G4_6" style=""><input type="checkbox" class="kinnie-checkbox" id="G4-6" name="G4_6" value="false" onclick="checkboxChange('G4-6', 'G4_6')"> </span>
                  </td>
                  <td>
                    <span id="G4_7" style=""><input type="checkbox" class="kinnie-checkbox" id="G4-7" name="G4_7" value="false" onclick="checkboxChange('G4-7', 'G4_7')"> </span>
                  </td>
                  <td>
                    <span id="G4_8" style=""><input type="checkbox" class="kinnie-checkbox" id="G4-8" name="G4_8" value="false" onclick="checkboxChange('G4-8', 'G4_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G5</td>
                  <td>
                    <span id="G5_5" style=""><input type="checkbox" class="kinnie-checkbox" id="G5-5" name="G5_5" value="false" onclick="checkboxChange('G5-5', 'G5_5')"> </span>
                  </td>
                  <td>
                    <span id="G5_6" style=""><input type="checkbox" class="kinnie-checkbox" id="G5-6" name="G5_6" value="false" onclick="checkboxChange('G5-6', 'G5_6')"> </span>
                  </td>
                  <td>
                    <span id="G5_7" style=""><input type="checkbox" class="kinnie-checkbox" id="G5-7" name="G5_7" value="false" onclick="checkboxChange('G5-7', 'G5_7')"> </span>
                  </td>
                  <td>
                    <span id="G5_8" style=""><input type="checkbox" class="kinnie-checkbox" id="G5-8" name="G5_8" value="false" onclick="checkboxChange('G5-8', 'G5_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G6</td>
                  <td>
                    <span id="G6_5" style=""><input type="checkbox" class="kinnie-checkbox" id="G6-5" name="G6_5" value="false" onclick="checkboxChange('G6-5', 'G6_5')"> </span>
                  </td>
                  <td>
                    <span id="G6_6" style=""><input type="checkbox" class="kinnie-checkbox" id="G6-6" name="G6_6" value="false" onclick="checkboxChange('G6-6', 'G6_6')"> </span>
                  </td>
                  <td>
                    <span id="G6_7" style=""><input type="checkbox" class="kinnie-checkbox" id="G6-7" name="G6_7" value="false" onclick="checkboxChange('G6-7', 'G6_7')"> </span>
                  </td>
                  <td>
                    <span id="G6_8" style=""><input type="checkbox" class="kinnie-checkbox" id="G6-8" name="G6_8" value="false" onclick="checkboxChange('G6-8', 'G6_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G7</td>
                  <td>
                    <span id="G7_5" style=""><input type="checkbox" class="kinnie-checkbox" id="G7-5" name="G7_5" value="false" onclick="checkboxChange('G7-5', 'G7_5')"> </span>
                  </td>
                  <td>
                    <span id="G7_6" style=""><input type="checkbox" class="kinnie-checkbox" id="G7-6" name="G7_6" value="false" onclick="checkboxChange('G7-6', 'G7_6')"> </span>
                  </td>
                  <td>
                    <span id="G7_7" style=""><input type="checkbox" class="kinnie-checkbox" id="G7-7" name="G7_7" value="false" onclick="checkboxChange('G7-7', 'G7_7')"> </span>
                  </td>
                  <td>
                    <span id="G7_8" style=""><input type="checkbox" class="kinnie-checkbox" id="G7-8" name="G7_8" value="false" onclick="checkboxChange('G7-8', 'G7_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H1</td>
                  <td>
                    <span id="H1_5" style=""><input type="checkbox" class="kinnie-checkbox" id="H1-5" name="H1_5" value="false" onclick="checkboxChange('H1-5', 'H1_5')"> </span>
                  </td>
                  <td>
                    <span id="H1_6" style=""><input type="checkbox" class="kinnie-checkbox" id="H1-6" name="H1_6" value="false" onclick="checkboxChange('H1-6', 'H1_6')"> </span>
                  </td>
                  <td>
                    <span id="H1_7" style=""><input type="checkbox" class="kinnie-checkbox" id="H1-7" name="H1_7" value="false" onclick="checkboxChange('H1-7', 'H1_7')"> </span>
                  </td>
                  <td>
                    <span id="H1_8" style=""><input type="checkbox" class="kinnie-checkbox" id="H1-8" name="H1_8" value="false" onclick="checkboxChange('H1-8', 'H1_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H2</td>
                  <td>
                    <span id="H2_5" style=""><input type="checkbox" class="kinnie-checkbox" id="H2-5" name="H2_5" value="false" onclick="checkboxChange('H2-5', 'H2_5')"> </span>
                  </td>
                  <td>
                    <span id="H2_6" style=""><input type="checkbox" class="kinnie-checkbox" id="H2-6" name="H2_6" value="false" onclick="checkboxChange('H2-6', 'H2_6')"> </span>
                  </td>
                  <td>
                    <span id="H2_7" style=""><input type="checkbox" class="kinnie-checkbox" id="H2-7" name="H2_7" value="false" onclick="checkboxChange('H2-7', 'H2_7')"> </span>
                  </td>
                  <td>
                    <span id="H2_8" style=""><input type="checkbox" class="kinnie-checkbox" id="H2-8" name="H2_8" value="false" onclick="checkboxChange('H2-8', 'H2_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H3</td>
                  <td>
                    <span id="H3_5" style=""><input type="checkbox" class="kinnie-checkbox" id="H3-5" name="H3_5" value="false" onclick="checkboxChange('H3-5', 'H3_5')"> </span>
                  </td>
                  <td>
                    <span id="H3_6" style=""><input type="checkbox" class="kinnie-checkbox" id="H3-6" name="H3_6" value="false" onclick="checkboxChange('H3-6', 'H3_6')"> </span>
                  </td>
                  <td>
                    <span id="H3_7" style=""><input type="checkbox" class="kinnie-checkbox" id="H3-7" name="H3_7" value="false" onclick="checkboxChange('H3-7', 'H3_7')"> </span>
                  </td>
                  <td>
                    <span id="H3_8" style=""><input type="checkbox" class="kinnie-checkbox" id="H3-8" name="H3_8" value="false" onclick="checkboxChange('H3-8', 'H3_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H4</td>
                  <td>
                    <span id="H4_5" style=""><input type="checkbox" class="kinnie-checkbox" id="H4-5" name="H4_5" value="false" onclick="checkboxChange('H4-5', 'H4_5')"> </span>
                  </td>
                  <td>
                    <span id="H4_6" style=""><input type="checkbox" class="kinnie-checkbox" id="H4-6" name="H4_6" value="false" onclick="checkboxChange('H4-6', 'H4_6')"> </span>
                  </td>
                  <td>
                    <span id="H4_7" style=""><input type="checkbox" class="kinnie-checkbox" id="H4-7" name="H4_7" value="false" onclick="checkboxChange('H4-7', 'H4_7')"> </span>
                  </td>
                  <td>
                    <span id="H4_8" style=""><input type="checkbox" class="kinnie-checkbox" id="H4-8" name="H4_8" value="false" onclick="checkboxChange('H4-8', 'H4_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H5</td>
                  <td>
                    <span id="H5_5" style=""><input type="checkbox" class="kinnie-checkbox" id="H5-5" name="H5_5" value="false" onclick="checkboxChange('H5-5', 'H5_5')"> </span>
                  </td>
                  <td>
                    <span id="H5_6" style=""><input type="checkbox" class="kinnie-checkbox" id="H5-6" name="H5_6" value="false" onclick="checkboxChange('H5-6', 'H5_6')"> </span>
                  </td>
                  <td>
                    <span id="H5_7" style=""><input type="checkbox" class="kinnie-checkbox" id="H5-7" name="H5_7" value="false" onclick="checkboxChange('H5-7', 'H5_7')"> </span>
                  </td>
                  <td>
                    <span id="H5_8" style=""><input type="checkbox" class="kinnie-checkbox" id="H5-8" name="H5_8" value="false" onclick="checkboxChange('H5-8', 'H5_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H6</td>
                  <td>
                    <span id="H6_5" style=""><input type="checkbox" class="kinnie-checkbox" id="H6-5" name="H6_5" value="false" onclick="checkboxChange('H6-5', 'H6_5')"> </span>
                  </td>
                  <td>
                    <span id="H6_6" style=""><input type="checkbox" class="kinnie-checkbox" id="H6-6" name="H6_6" value="false" onclick="checkboxChange('H6-6', 'H6_6')"> </span>
                  </td>
                  <td>
                    <span id="H6_7" style=""><input type="checkbox" class="kinnie-checkbox" id="H6-7" name="H6_7" value="false" onclick="checkboxChange('H6-7', 'H6_7')"> </span>
                  </td>
                  <td>
                    <span id="H6_8" style=""><input type="checkbox" class="kinnie-checkbox" id="H6-8" name="H6_8" value="false" onclick="checkboxChange('H6-8', 'H6_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H7</td>
                  <td>
                    <span id="H7_5" style=""><input type="checkbox" class="kinnie-checkbox" id="H7-5" name="H7_5" value="false" onclick="checkboxChange('H7-5', 'H7_5')"> </span>
                  </td>
                  <td>
                    <span id="H7_6" style=""><input type="checkbox" class="kinnie-checkbox" id="H7-6" name="H7_6" value="false" onclick="checkboxChange('H7-6', 'H7_6')"> </span>
                  </td>
                  <td>
                    <span id="H7_7" style=""><input type="checkbox" class="kinnie-checkbox" id="H7-7" name="H7_7" value="false" onclick="checkboxChange('H7-7', 'H7_7')"> </span>
                  </td>
                  <td>
                    <span id="H7_8" style=""><input type="checkbox" class="kinnie-checkbox" id="H7-8" name="H7_8" value="false" onclick="checkboxChange('H7-8', 'H7_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H8</td>
                  <td>
                    <span id="H8_5" style=""><input type="checkbox" class="kinnie-checkbox" id="H8-5" name="H8_5" value="false" onclick="checkboxChange('H8-5', 'H8_5')"> </span>
                  </td>
                  <td>
                    <span id="H8_6" style=""><input type="checkbox" class="kinnie-checkbox" id="H8-6" name="H8_6" value="false" onclick="checkboxChange('H8-6', 'H8_6')"> </span>
                  </td>
                  <td>
                    <span id="H8_7" style=""><input type="checkbox" class="kinnie-checkbox" id="H8-7" name="H8_7" value="false" onclick="checkboxChange('H8-7', 'H8_7')"> </span>
                  </td>
                  <td>
                    <span id="H8_8" style=""><input type="checkbox" class="kinnie-checkbox" id="H8-8" name="H8_8" value="false" onclick="checkboxChange('H8-8', 'H8_8')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H9</td>
                  <td>
                    <span id="H9_5" style=""><input type="checkbox" class="kinnie-checkbox" id="H9-5" name="H9_5" value="false" onclick="checkboxChange('H9-5', 'H9_5')"> </span>
                  </td>
                  <td>
                    <span id="H9_6" style=""><input type="checkbox" class="kinnie-checkbox" id="H9-6" name="H9_6" value="false" onclick="checkboxChange('H9-6', 'H9_6')"> </span>
                  </td>
                  <td>
                    <span id="H9_7" style=""><input type="checkbox" class="kinnie-checkbox" id="H9-7" name="H9_7" value="false" onclick="checkboxChange('H9-7', 'H9_7')"> </span>
                  </td>
                  <td>
                    <span id="H9_8" style=""><input type="checkbox" class="kinnie-checkbox" id="H9-8" name="H9_8" value="false" onclick="checkboxChange('H9-8', 'H9_8')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="border-right: 1px solid;vertical-align: top;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: 0;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                  <td style="font-size: 7px;">A1</td>
                  <td>
                    <span id="A1_9" style=""><input type="checkbox" class="kinnie-checkbox" id="A1-9" name="A1_9" value="false" onclick="checkboxChange('A1-9', 'A1_9')"> </span>
                  </td>
                  <td>
                    <span id="A1_10" style=""><input type="checkbox" class="kinnie-checkbox" id="A1-10" name="A1_10" value="false" onclick="checkboxChange('A1-10', 'A1_10')"> </span>
                  </td>
                  <td>
                    <span id="A1_11" style=""><input type="checkbox" class="kinnie-checkbox" id="A1-11" name="A1_11" value="false" onclick="checkboxChange('A1-11', 'A1_11')"> </span>
                  </td>
                  <td>
                    <span id="A1_12" style=""><input type="checkbox" class="kinnie-checkbox" id="A1-12" name="A1_12" value="false" onclick="checkboxChange('A1-12', 'A1_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A2</td>
                  <td>
                    <span id="A2_9" style=""><input type="checkbox" class="kinnie-checkbox" id="A2-9" name="A2_9" value="false" onclick="checkboxChange('A2-9', 'A2_9')"> </span>
                  </td>
                  <td>
                    <span id="A2_10" style=""><input type="checkbox" class="kinnie-checkbox" id="A2-10" name="A2_10" value="false" onclick="checkboxChange('A2-10', 'A2_10')"> </span>
                  </td>
                  <td>
                    <span id="A2_11" style=""><input type="checkbox" class="kinnie-checkbox" id="A2-11" name="A2_11" value="false" onclick="checkboxChange('A2-11', 'A2_11')"> </span>
                  </td>
                  <td>
                    <span id="A2_12" style=""><input type="checkbox" class="kinnie-checkbox" id="A2-12" name="A2_12" value="false" onclick="checkboxChange('A2-12', 'A2_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A3</td>
                  <td>
                    <span id="A3_9" style=""><input type="checkbox" class="kinnie-checkbox" id="A3-9" name="A3_9" value="false" onclick="checkboxChange('A3-9', 'A3_9')"> </span>
                  </td>
                  <td>
                    <span id="A3_10" style=""><input type="checkbox" class="kinnie-checkbox" id="A3-10" name="A3_10" value="false" onclick="checkboxChange('A3-10', 'A3_10')"> </span>
                  </td>
                  <td>
                    <span id="A3_11" style=""><input type="checkbox" class="kinnie-checkbox" id="A3-11" name="A3_11" value="false" onclick="checkboxChange('A3-11', 'A3_11')"> </span>
                  </td>
                  <td>
                    <span id="A3_12" style=""><input type="checkbox" class="kinnie-checkbox" id="A3-12" name="A3_12" value="false" onclick="checkboxChange('A3-12', 'A3_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A4</td>
                  <td>
                    <span id="A4_9" style=""><input type="checkbox" class="kinnie-checkbox" id="A4-9" name="A4_9" value="false" onclick="checkboxChange('A4-9', 'A4_9')"> </span>
                  </td>
                  <td>
                    <span id="A4_10" style=""><input type="checkbox" class="kinnie-checkbox" id="A4-10" name="A4_10" value="false" onclick="checkboxChange('A4-10', 'A4_10')"> </span>
                  </td>
                  <td>
                    <span id="A4_11" style=""><input type="checkbox" class="kinnie-checkbox" id="A4-11" name="A4_11" value="false" onclick="checkboxChange('A4-11', 'A4_11')"> </span>
                  </td>
                  <td>
                    <span id="A4_12" style=""><input type="checkbox" class="kinnie-checkbox" id="A4-12" name="A4_12" value="false" onclick="checkboxChange('A4-12', 'A4_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A5</td>
                  <td>
                    <span id="A5_9" style=""><input type="checkbox" class="kinnie-checkbox" id="A5-9" name="A5_9" value="false" onclick="checkboxChange('A5-9', 'A5_9')"> </span>
                  </td>
                  <td>
                    <span id="A5_10" style=""><input type="checkbox" class="kinnie-checkbox" id="A5-10" name="A5_10" value="false" onclick="checkboxChange('A5-10', 'A5_10')"> </span>
                  </td>
                  <td>
                    <span id="A5_11" style=""><input type="checkbox" class="kinnie-checkbox" id="A5-11" name="A5_11" value="false" onclick="checkboxChange('A5-11', 'A5_11')"> </span>
                  </td>
                  <td>
                    <span id="A5_12" style=""><input type="checkbox" class="kinnie-checkbox" id="A5-12" name="A5_12" value="false" onclick="checkboxChange('A5-12', 'A5_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A6</td>
                  <td>
                    <span id="A6_9" style=""><input type="checkbox" class="kinnie-checkbox" id="A6-9" name="A6_9" value="false" onclick="checkboxChange('A6-9', 'A6_9')"> </span>
                  </td>
                  <td>
                    <span id="A6_10" style=""><input type="checkbox" class="kinnie-checkbox" id="A6-10" name="A6_10" value="false" onclick="checkboxChange('A6-10', 'A6_10')"> </span>
                  </td>
                  <td>
                    <span id="A6_11" style=""><input type="checkbox" class="kinnie-checkbox" id="A6-11" name="A6_11" value="false" onclick="checkboxChange('A6-11', 'A6_11')"> </span>
                  </td>
                  <td>
                    <span id="A6_12" style=""><input type="checkbox" class="kinnie-checkbox" id="A6-12" name="A6_12" value="false" onclick="checkboxChange('A6-12', 'A6_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A7</td>
                  <td>
                    <span id="A7_9" style=""><input type="checkbox" class="kinnie-checkbox" id="A7-9" name="A7_9" value="false" onclick="checkboxChange('A7-9', 'A7_9')"> </span>
                  </td>
                  <td>
                    <span id="A7_10" style=""><input type="checkbox" class="kinnie-checkbox" id="A7-10" name="A7_10" value="false" onclick="checkboxChange('A7-10', 'A7_10')"> </span>
                  </td>
                  <td>
                    <span id="A7_11" style=""><input type="checkbox" class="kinnie-checkbox" id="A7-11" name="A7_11" value="false" onclick="checkboxChange('A7-11', 'A7_11')"> </span>
                  </td>
                  <td>
                    <span id="A7_12" style=""><input type="checkbox" class="kinnie-checkbox" id="A7-12" name="A7_12" value="false" onclick="checkboxChange('A7-12', 'A7_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">A8</td>
                  <td>
                    <span id="A8_9" style=""><input type="checkbox" class="kinnie-checkbox" id="A8-9" name="A8_9" value="false" onclick="checkboxChange('A8-9', 'A8_9')"> </span>
                  </td>
                  <td>
                    <span id="A8_10" style=""><input type="checkbox" class="kinnie-checkbox" id="A8-10" name="A8_10" value="false" onclick="checkboxChange('A8-10', 'A8_10')"> </span>
                  </td>
                  <td>
                    <span id="A8_11" style=""><input type="checkbox" class="kinnie-checkbox" id="A8-11" name="A8_11" value="false" onclick="checkboxChange('A8-11', 'A8_11')"> </span>
                  </td>
                  <td>
                    <span id="A8_12" style=""><input type="checkbox" class="kinnie-checkbox" id="A8-12" name="A8_12" value="false" onclick="checkboxChange('A8-12', 'A8_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B1</td>
                  <td>
                    <span id="B1_9" style=""><input type="checkbox" class="kinnie-checkbox" id="B1-9" name="B1_9" value="false" onclick="checkboxChange('B1-9', 'B1_9')"> </span>
                  </td>
                  <td>
                    <span id="B1_10" style=""><input type="checkbox" class="kinnie-checkbox" id="B1-10" name="B1_10" value="false" onclick="checkboxChange('B1-10', 'B1_10')"> </span>
                  </td>
                  <td>
                    <span id="B1_11" style=""><input type="checkbox" class="kinnie-checkbox" id="B1-11" name="B1_11" value="false" onclick="checkboxChange('B1-11', 'B1_11')"> </span>
                  </td>
                  <td>
                    <span id="B1_12" style=""><input type="checkbox" class="kinnie-checkbox" id="B1-12" name="B1_12" value="false" onclick="checkboxChange('B1-12', 'B1_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B2</td>
                  <td>
                    <span id="B2_9" style=""><input type="checkbox" class="kinnie-checkbox" id="B2-9" name="B2_9" value="false" onclick="checkboxChange('B2-9', 'B2_9')"> </span>
                  </td>
                  <td>
                    <span id="B2_10" style=""><input type="checkbox" class="kinnie-checkbox" id="B2-10" name="B2_10" value="false" onclick="checkboxChange('B2-10', 'B2_10')"> </span>
                  </td>
                  <td>
                    <span id="B2_11" style=""><input type="checkbox" class="kinnie-checkbox" id="B2-11" name="B2_11" value="false" onclick="checkboxChange('B2-11', 'B2_11')"> </span>
                  </td>
                  <td>
                    <span id="B2_12" style=""><input type="checkbox" class="kinnie-checkbox" id="B2-12" name="B2_12" value="false" onclick="checkboxChange('B2-12', 'B2_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B3</td>
                  <td>
                    <span id="B3_9" style=""><input type="checkbox" class="kinnie-checkbox" id="B3-9" name="B3_9" value="false" onclick="checkboxChange('B3-9', 'B3_9')"> </span>
                  </td>
                  <td>
                    <span id="B3_10" style=""><input type="checkbox" class="kinnie-checkbox" id="B3-10" name="B3_10" value="false" onclick="checkboxChange('B3-10', 'B3_10')"> </span>
                  </td>
                  <td>
                    <span id="B3_11" style=""><input type="checkbox" class="kinnie-checkbox" id="B3-11" name="B3_11" value="false" onclick="checkboxChange('B3-11', 'B3_11')"> </span>
                  </td>
                  <td>
                    <span id="B3_12" style=""><input type="checkbox" class="kinnie-checkbox" id="B3-12" name="B3_12" value="false" onclick="checkboxChange('B3-12', 'B3_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B4</td>
                  <td>
                    <span id="B4_9" style=""><input type="checkbox" class="kinnie-checkbox" id="B4-9" name="B4_9" value="false" onclick="checkboxChange('B4-9', 'B4_9')"> </span>
                  </td>
                  <td>
                    <span id="B4_10" style=""><input type="checkbox" class="kinnie-checkbox" id="B4-10" name="B4_10" value="false" onclick="checkboxChange('B4-10', 'B4_10')"> </span>
                  </td>
                  <td>
                    <span id="B4_11" style=""><input type="checkbox" class="kinnie-checkbox" id="B4-11" name="B4_11" value="false" onclick="checkboxChange('B4-11', 'B4_11')"> </span>
                  </td>
                  <td>
                    <span id="B4_12" style=""><input type="checkbox" class="kinnie-checkbox" id="B4-12" name="B4_12" value="false" onclick="checkboxChange('B4-12', 'B4_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B5</td>
                  <td>
                    <span id="B5_9" style=""><input type="checkbox" class="kinnie-checkbox" id="B5-9" name="B5_9" value="false" onclick="checkboxChange('B5-9', 'B5_9')"> </span>
                  </td>
                  <td>
                    <span id="B5_10" style=""><input type="checkbox" class="kinnie-checkbox" id="B5-10" name="B5_10" value="false" onclick="checkboxChange('B5-10', 'B5_10')"> </span>
                  </td>
                  <td>
                    <span id="B5_11" style=""><input type="checkbox" class="kinnie-checkbox" id="B5-11" name="B5_11" value="false" onclick="checkboxChange('B5-11', 'B5_11')"> </span>
                  </td>
                  <td>
                    <span id="B5_12" style=""><input type="checkbox" class="kinnie-checkbox" id="B5-12" name="B5_12" value="false" onclick="checkboxChange('B5-12', 'B5_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B6</td>
                  <td>
                    <span id="B6_9" style=""><input type="checkbox" class="kinnie-checkbox" id="B6-9" name="B6_9" value="false" onclick="checkboxChange('B6-9', 'B6_9')"> </span>
                  </td>
                  <td>
                    <span id="B6_10" style=""><input type="checkbox" class="kinnie-checkbox" id="B6-10" name="B6_10" value="false" onclick="checkboxChange('B6-10', 'B6_10')"> </span>
                  </td>
                  <td>
                    <span id="B6_11" style=""><input type="checkbox" class="kinnie-checkbox" id="B6-11" name="B6_11" value="false" onclick="checkboxChange('B6-11', 'B6_11')"> </span>
                  </td>
                  <td>
                    <span id="B6_12" style=""><input type="checkbox" class="kinnie-checkbox" id="B6-12" name="B6_12" value="false" onclick="checkboxChange('B6-12', 'B6_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">B7</td>
                  <td>
                    <span id="B7_9" style=""><input type="checkbox" class="kinnie-checkbox" id="B7-9" name="B7_9" value="false" onclick="checkboxChange('B7-9', 'B7_9')"> </span>
                  </td>
                  <td>
                    <span id="B7_10" style=""><input type="checkbox" class="kinnie-checkbox" id="B7-10" name="B7_10" value="false" onclick="checkboxChange('B7-10', 'B7_10')"> </span>
                  </td>
                  <td>
                    <span id="B7_11" style=""><input type="checkbox" class="kinnie-checkbox" id="B7-11" name="B7_11" value="false" onclick="checkboxChange('B7-11', 'B7_11')"> </span>
                  </td>
                  <td>
                    <span id="B7_12" style=""><input type="checkbox" class="kinnie-checkbox" id="B7-12" name="B7_12" value="false" onclick="checkboxChange('B7-12', 'B7_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">C1</td>
                  <td>
                    <span id="C1_9" style=""><input type="checkbox" class="kinnie-checkbox" id="C1-9" name="C1_9" value="false" onclick="checkboxChange('C1-9', 'C1_9')"> </span>
                  </td>
                  <td>
                    <span id="C1_10" style=""><input type="checkbox" class="kinnie-checkbox" id="C1-10" name="C1_10" value="false" onclick="checkboxChange('C1-10', 'C1_10')"> </span>
                  </td>
                  <td>
                    <span id="C1_11" style=""><input type="checkbox" class="kinnie-checkbox" id="C1-11" name="C1_11" value="false" onclick="checkboxChange('C1-11', 'C1_11')"> </span>
                  </td>
                  <td>
                    <span id="C1_12" style=""><input type="checkbox" class="kinnie-checkbox" id="C1-12" name="C1_12" value="false" onclick="checkboxChange('C1-12', 'C1_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">C2</td>
                  <td>
                    <span id="C2_9" style=""><input type="checkbox" class="kinnie-checkbox" id="C2-9" name="C2_9" value="false" onclick="checkboxChange('C2-9', 'C2_9')"> </span>
                  </td>
                  <td>
                    <span id="C2_10" style=""><input type="checkbox" class="kinnie-checkbox" id="C2-10" name="C2_10" value="false" onclick="checkboxChange('C2-10', 'C2_10')"> </span>
                  </td>
                  <td>
                    <span id="C2_11" style=""><input type="checkbox" class="kinnie-checkbox" id="C2-11" name="C2_11" value="false" onclick="checkboxChange('C2-11', 'C2_11')"> </span>
                  </td>
                  <td>
                    <span id="C2_12" style=""><input type="checkbox" class="kinnie-checkbox" id="C2-12" name="C2_12" value="false" onclick="checkboxChange('C2-12', 'C2_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">C3</td>
                  <td>
                    <span id="C3_9" style=""><input type="checkbox" class="kinnie-checkbox" id="C3-9" name="C3_9" value="false" onclick="checkboxChange('C3-9', 'C3_9')"> </span>
                  </td>
                  <td>
                    <span id="C3_10" style=""><input type="checkbox" class="kinnie-checkbox" id="C3-10" name="C3_10" value="false" onclick="checkboxChange('C3-10', 'C3_10')"> </span>
                  </td>
                  <td>
                    <span id="C3_11" style=""><input type="checkbox" class="kinnie-checkbox" id="C3-11" name="C3_11" value="false" onclick="checkboxChange('C3-11', 'C3_11')"> </span>
                  </td>
                  <td>
                    <span id="C3_12" style=""><input type="checkbox" class="kinnie-checkbox" id="C3-12" name="C3_12" value="false" onclick="checkboxChange('C3-12', 'C3_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">C4</td>
                  <td>
                    <span id="C4_9" style=""><input type="checkbox" class="kinnie-checkbox" id="C4-9" name="C4_9" value="false" onclick="checkboxChange('C4-9', 'C4_9')"> </span>
                  </td>
                  <td>
                    <span id="C4_10" style=""><input type="checkbox" class="kinnie-checkbox" id="C4-10" name="C4_10" value="false" onclick="checkboxChange('C4-10', 'C4_10')"> </span>
                  </td>
                  <td>
                    <span id="C4_11" style=""><input type="checkbox" class="kinnie-checkbox" id="C4-11" name="C4_11" value="false" onclick="checkboxChange('C4-11', 'C4_11')"> </span>
                  </td>
                  <td>
                    <span id="C4_12" style=""><input type="checkbox" class="kinnie-checkbox" id="C4-12" name="C4_12" value="false" onclick="checkboxChange('C4-12', 'C4_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">C5</td>
                  <td>
                    <span id="C5_9" style=""><input type="checkbox" class="kinnie-checkbox" id="C5-9" name="C5_9" value="false" onclick="checkboxChange('C5-9', 'C5_9')"> </span>
                  </td>
                  <td>
                    <span id="C5_10" style=""><input type="checkbox" class="kinnie-checkbox" id="C5-10" name="C5_10" value="false" onclick="checkboxChange('C5-10', 'C5_10')"> </span>
                  </td>
                  <td>
                    <span id="C5_11" style=""><input type="checkbox" class="kinnie-checkbox" id="C5-11" name="C5_11" value="false" onclick="checkboxChange('C5-11', 'C5_11')"> </span>
                  </td>
                  <td>
                    <span id="C5_12" style=""><input type="checkbox" class="kinnie-checkbox" id="C5-12" name="C5_12" value="false" onclick="checkboxChange('C5-12', 'C5_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">D1</td>
                  <td>
                    <span id="D1_9" style=""><input type="checkbox" class="kinnie-checkbox" id="D1-9" name="D1_9" value="false" onclick="checkboxChange('D1-9', 'D1_9')"> </span>
                  </td>
                  <td>
                    <span id="D1_10" style=""><input type="checkbox" class="kinnie-checkbox" id="D1-10" name="D1_10" value="false" onclick="checkboxChange('D1-10', 'D1_10')"> </span>
                  </td>
                  <td>
                    <span id="D1_11" style=""><input type="checkbox" class="kinnie-checkbox" id="D1-11" name="D1_11" value="false" onclick="checkboxChange('D1-11', 'D1_11')"> </span>
                  </td>
                  <td>
                    <span id="D1_12" style=""><input type="checkbox" class="kinnie-checkbox" id="D1-12" name="D1_12" value="false" onclick="checkboxChange('D1-12', 'D1_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">D2</td>
                  <td>
                    <span id="D2_9" style=""><input type="checkbox" class="kinnie-checkbox" id="D2-9" name="D2_9" value="false" onclick="checkboxChange('D2-9', 'D2_9')"> </span>
                  </td>
                  <td>
                    <span id="D2_10" style=""><input type="checkbox" class="kinnie-checkbox" id="D2-10" name="D2_10" value="false" onclick="checkboxChange('D2-10', 'D2_10')"> </span>
                  </td>
                  <td>
                    <span id="D2_11" style=""><input type="checkbox" class="kinnie-checkbox" id="D2-11" name="D2_11" value="false" onclick="checkboxChange('D2-11', 'D2_11')"> </span>
                  </td>
                  <td>
                    <span id="D2_12" style=""><input type="checkbox" class="kinnie-checkbox" id="D2-12" name="D2_12" value="false" onclick="checkboxChange('D2-12', 'D2_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">D3</td>
                  <td>
                    <span id="D3_9" style=""><input type="checkbox" class="kinnie-checkbox" id="D3-9" name="D3_9" value="false" onclick="checkboxChange('D3-9', 'D3_9')"> </span>
                  </td>
                  <td>
                    <span id="D3_10" style=""><input type="checkbox" class="kinnie-checkbox" id="D3-10" name="D3_10" value="false" onclick="checkboxChange('D3-10', 'D3_10')"> </span>
                  </td>
                  <td>
                    <span id="D3_11" style=""><input type="checkbox" class="kinnie-checkbox" id="D3-11" name="D3_11" value="false" onclick="checkboxChange('D3-11', 'D3_11')"> </span>
                  </td>
                  <td>
                    <span id="D3_12" style=""><input type="checkbox" class="kinnie-checkbox" id="D3-12" name="D3_12" value="false" onclick="checkboxChange('D3-12', 'D3_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">E1</td>
                  <td>
                    <span id="E1_9" style=""><input type="checkbox" class="kinnie-checkbox" id="E1-9" name="E1_9" value="false" onclick="checkboxChange('E1-9', 'E1_9')"> </span>
                  </td>
                  <td>
                    <span id="E1_10" style=""><input type="checkbox" class="kinnie-checkbox" id="E1-10" name="E1_10" value="false" onclick="checkboxChange('E1-10', 'E1_10')"> </span>
                  </td>
                  <td>
                    <span id="E1_11" style=""><input type="checkbox" class="kinnie-checkbox" id="E1-11" name="E1_11" value="false" onclick="checkboxChange('E1-11', 'E1_11')"> </span>
                  </td>
                  <td>
                    <span id="E1_12" style=""><input type="checkbox" class="kinnie-checkbox" id="E1-12" name="E1_12" value="false" onclick="checkboxChange('E1-12', 'E1_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">E2</td>
                  <td>
                    <span id="E2_9" style=""><input type="checkbox" class="kinnie-checkbox" id="E2-9" name="E2_9" value="false" onclick="checkboxChange('E2-9', 'E2_9')"> </span>
                  </td>
                  <td>
                    <span id="E2_10" style=""><input type="checkbox" class="kinnie-checkbox" id="E2-10" name="E2_10" value="false" onclick="checkboxChange('E2-10', 'E2_10')"> </span>
                  </td>
                  <td>
                    <span id="E2_11" style=""><input type="checkbox" class="kinnie-checkbox" id="E2-11" name="E2_11" value="false" onclick="checkboxChange('E2-11', 'E2_11')"> </span>
                  </td>
                  <td>
                    <span id="E2_12" style=""><input type="checkbox" class="kinnie-checkbox" id="E2-12" name="E2_12" value="false" onclick="checkboxChange('E2-12', 'E2_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">E3</td>
                  <td>
                    <span id="E3_9" style=""><input type="checkbox" class="kinnie-checkbox" id="E3-9" name="E3_9" value="false" onclick="checkboxChange('E3-9', 'E3_9')"> </span>
                  </td>
                  <td>
                    <span id="E3_10" style=""><input type="checkbox" class="kinnie-checkbox" id="E3-10" name="E3_10" value="false" onclick="checkboxChange('E3-10', 'E3_10')"> </span>
                  </td>
                  <td>
                    <span id="E3_11" style=""><input type="checkbox" class="kinnie-checkbox" id="E3-11" name="E3_11" value="false" onclick="checkboxChange('E3-11', 'E3_11')"> </span>
                  </td>
                  <td>
                    <span id="E3_12" style=""><input type="checkbox" class="kinnie-checkbox" id="E3-12" name="E3_12" value="false" onclick="checkboxChange('E3-12', 'E3_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">E4</td>
                  <td>
                    <span id="E4_9" style=""><input type="checkbox" class="kinnie-checkbox" id="E4-9" name="E4_9" value="false" onclick="checkboxChange('E4-9', 'E4_9')"> </span>
                  </td>
                  <td>
                    <span id="E4_10" style=""><input type="checkbox" class="kinnie-checkbox" id="E4-10" name="E4_10" value="false" onclick="checkboxChange('E4-10', 'E4_10')"> </span>
                  </td>
                  <td>
                    <span id="E4_11" style=""><input type="checkbox" class="kinnie-checkbox" id="E4-11" name="E4_11" value="false" onclick="checkboxChange('E4-11', 'E4_11')"> </span>
                  </td>
                  <td>
                    <span id="E4_12" style=""><input type="checkbox" class="kinnie-checkbox" id="E4-12" name="E4_12" value="false" onclick="checkboxChange('E4-12', 'E4_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">E5</td>
                  <td>
                    <span id="E5_9" style=""><input type="checkbox" class="kinnie-checkbox" id="E5-9" name="E5_9" value="false" onclick="checkboxChange('E5-9', 'E5_9')"> </span>
                  </td>
                  <td>
                    <span id="E5_10" style=""><input type="checkbox" class="kinnie-checkbox" id="E5-10" name="E5_10" value="false" onclick="checkboxChange('E5-10', 'E5_10')"> </span>
                  </td>
                  <td>
                    <span id="E5_11" style=""><input type="checkbox" class="kinnie-checkbox" id="E5-11" name="E5_11" value="false" onclick="checkboxChange('E5-11', 'E5_11')"> </span>
                  </td>
                  <td>
                    <span id="E5_12" style=""><input type="checkbox" class="kinnie-checkbox" id="E5-12" name="E5_12" value="false" onclick="checkboxChange('E5-12', 'E5_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">F1</td>
                  <td>
                    <span id="F1_9" style=""><input type="checkbox" class="kinnie-checkbox" id="F1-9" name="F1_9" value="false" onclick="checkboxChange('F1-9', 'F1_9')"> </span>
                  </td>
                  <td>
                    <span id="F1_10" style=""><input type="checkbox" class="kinnie-checkbox" id="F1-10" name="F1_10" value="false" onclick="checkboxChange('F1-10', 'F1_10')"> </span>
                  </td>
                  <td>
                    <span id="F1_11" style=""><input type="checkbox" class="kinnie-checkbox" id="F1-11" name="F1_11" value="false" onclick="checkboxChange('F1-11', 'F1_11')"> </span>
                  </td>
                  <td>
                    <span id="F1_12" style=""><input type="checkbox" class="kinnie-checkbox" id="F1-12" name="F1_12" value="false" onclick="checkboxChange('F1-12', 'F1_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">F2</td>
                  <td>
                    <span id="F2_9" style=""><input type="checkbox" class="kinnie-checkbox" id="F2-9" name="F2_9" value="false" onclick="checkboxChange('F2-9', 'F2_9')"> </span>
                  </td>
                  <td>
                    <span id="F2_10" style=""><input type="checkbox" class="kinnie-checkbox" id="F2-10" name="F2_10" value="false" onclick="checkboxChange('F2-10', 'F2_10')"> </span>
                  </td>
                  <td>
                    <span id="F2_11" style=""><input type="checkbox" class="kinnie-checkbox" id="F2-11" name="F2_11" value="false" onclick="checkboxChange('F2-11', 'F2_11')"> </span>
                  </td>
                  <td>
                    <span id="F2_12" style=""><input type="checkbox" class="kinnie-checkbox" id="F2-12" name="F2_12" value="false" onclick="checkboxChange('F2-12', 'F2_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">F3</td>
                  <td>
                    <span id="F3_9" style=""><input type="checkbox" class="kinnie-checkbox" id="F3-9" name="F3_9" value="false" onclick="checkboxChange('F3-9', 'F3_9')"> </span>
                  </td>
                  <td>
                    <span id="F3_10" style=""><input type="checkbox" class="kinnie-checkbox" id="F3-10" name="F3_10" value="false" onclick="checkboxChange('F3-10', 'F3_10')"> </span>
                  </td>
                  <td>
                    <span id="F3_11" style=""><input type="checkbox" class="kinnie-checkbox" id="F3-11" name="F3_11" value="false" onclick="checkboxChange('F3-11', 'F3_11')"> </span>
                  </td>
                  <td>
                    <span id="F3_12" style=""><input type="checkbox" class="kinnie-checkbox" id="F3-12" name="F3_12" value="false" onclick="checkboxChange('F3-12', 'F3_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">F4</td>
                  <td>
                    <span id="F4_9" style=""><input type="checkbox" class="kinnie-checkbox" id="F4-9" name="F4_9" value="false" onclick="checkboxChange('F4-9', 'F4_9')"> </span>
                  </td>
                  <td>
                    <span id="F4_10" style=""><input type="checkbox" class="kinnie-checkbox" id="F4-10" name="F4_10" value="false" onclick="checkboxChange('F4-10', 'F4_10')"> </span>
                  </td>
                  <td>
                    <span id="F4_11" style=""><input type="checkbox" class="kinnie-checkbox" id="F4-11" name="F4_11" value="false" onclick="checkboxChange('F4-11', 'F4_11')"> </span>
                  </td>
                  <td>
                    <span id="F4_12" style=""><input type="checkbox" class="kinnie-checkbox" id="F4-12" name="F4_12" value="false" onclick="checkboxChange('F4-12', 'F4_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">F5</td>
                  <td>
                    <span id="F5_9" style=""><input type="checkbox" class="kinnie-checkbox" id="F5-9" name="F5_9" value="false" onclick="checkboxChange('F5-9', 'F5_9')"> </span>
                  </td>
                  <td>
                    <span id="F5_10" style=""><input type="checkbox" class="kinnie-checkbox" id="F5-10" name="F5_10" value="false" onclick="checkboxChange('F5-10', 'F5_10')"> </span>
                  </td>
                  <td>
                    <span id="F5_11" style=""><input type="checkbox" class="kinnie-checkbox" id="F5-11" name="F5_11" value="false" onclick="checkboxChange('F5-11', 'F5_11')"> </span>
                  </td>
                  <td>
                    <span id="F5_12" style=""><input type="checkbox" class="kinnie-checkbox" id="F5-12" name="F5_12" value="false" onclick="checkboxChange('F5-12', 'F5_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G1</td>
                  <td>
                    <span id="G1_9" style=""><input type="checkbox" class="kinnie-checkbox" id="G1-9" name="G1_9" value="false" onclick="checkboxChange('G1-9', 'G1_9')"> </span>
                  </td>
                  <td>
                    <span id="G1_10" style=""><input type="checkbox" class="kinnie-checkbox" id="G1-10" name="G1_10" value="false" onclick="checkboxChange('G1-10', 'G1_10')"> </span>
                  </td>
                  <td>
                    <span id="G1_11" style=""><input type="checkbox" class="kinnie-checkbox" id="G1-11" name="G1_11" value="false" onclick="checkboxChange('G1-11', 'G1_11')"> </span>
                  </td>
                  <td>
                    <span id="G1_12" style=""><input type="checkbox" class="kinnie-checkbox" id="G1-12" name="G1_12" value="false" onclick="checkboxChange('G1-12', 'G1_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G2</td>
                  <td>
                    <span id="G2_9" style=""><input type="checkbox" class="kinnie-checkbox" id="G2-9" name="G2_9" value="false" onclick="checkboxChange('G2-9', 'G2_9')"> </span>
                  </td>
                  <td>
                    <span id="G2_10" style=""><input type="checkbox" class="kinnie-checkbox" id="G2-10" name="G2_10" value="false" onclick="checkboxChange('G2-10', 'G2_10')"> </span>
                  </td>
                  <td>
                    <span id="G2_11" style=""><input type="checkbox" class="kinnie-checkbox" id="G2-11" name="G2_11" value="false" onclick="checkboxChange('G2-11', 'G2_11')"> </span>
                  </td>
                  <td>
                    <span id="G2_12" style=""><input type="checkbox" class="kinnie-checkbox" id="G2-12" name="G2_12" value="false" onclick="checkboxChange('G2-12', 'G2_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G3</td>
                  <td>
                    <span id="G3_9" style=""><input type="checkbox" class="kinnie-checkbox" id="G3-9" name="G3_9" value="false" onclick="checkboxChange('G3-9', 'G3_9')"> </span>
                  </td>
                  <td>
                    <span id="G3_10" style=""><input type="checkbox" class="kinnie-checkbox" id="G3-10" name="G3_10" value="false" onclick="checkboxChange('G3-10', 'G3_10')"> </span>
                  </td>
                  <td>
                    <span id="G3_11" style=""><input type="checkbox" class="kinnie-checkbox" id="G3-11" name="G3_11" value="false" onclick="checkboxChange('G3-11', 'G3_11')"> </span>
                  </td>
                  <td>
                    <span id="G3_12" style=""><input type="checkbox" class="kinnie-checkbox" id="G3-12" name="G3_12" value="false" onclick="checkboxChange('G3-12', 'G3_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G4</td>
                  <td>
                    <span id="G4_9" style=""><input type="checkbox" class="kinnie-checkbox" id="G4-9" name="G4_9" value="false" onclick="checkboxChange('G4-9', 'G4_9')"> </span>
                  </td>
                  <td>
                    <span id="G4_10" style=""><input type="checkbox" class="kinnie-checkbox" id="G4-10" name="G4_10" value="false" onclick="checkboxChange('G4-10', 'G4_10')"> </span>
                  </td>
                  <td>
                    <span id="G4_11" style=""><input type="checkbox" class="kinnie-checkbox" id="G4-11" name="G4_11" value="false" onclick="checkboxChange('G4-11', 'G4_11')"> </span>
                  </td>
                  <td>
                    <span id="G4_12" style=""><input type="checkbox" class="kinnie-checkbox" id="G4-12" name="G4_12" value="false" onclick="checkboxChange('G4-12', 'G4_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G5</td>
                  <td>
                    <span id="G5_9" style=""><input type="checkbox" class="kinnie-checkbox" id="G5-9" name="G5_9" value="false" onclick="checkboxChange('G5-9', 'G5_9')"> </span>
                  </td>
                  <td>
                    <span id="G5_10" style=""><input type="checkbox" class="kinnie-checkbox" id="G5-10" name="G5_10" value="false" onclick="checkboxChange('G5-10', 'G5_10')"> </span>
                  </td>
                  <td>
                    <span id="G5_11" style=""><input type="checkbox" class="kinnie-checkbox" id="G5-11" name="G5_11" value="false" onclick="checkboxChange('G5-11', 'G5_11')"> </span>
                  </td>
                  <td>
                    <span id="G5_12" style=""><input type="checkbox" class="kinnie-checkbox" id="G5-12" name="G5_12" value="false" onclick="checkboxChange('G5-12', 'G5_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G6</td>
                  <td>
                    <span id="G6_9" style=""><input type="checkbox" class="kinnie-checkbox" id="G6-9" name="G6_9" value="false" onclick="checkboxChange('G6-9', 'G6_9')"> </span>
                  </td>
                  <td>
                    <span id="G6_10" style=""><input type="checkbox" class="kinnie-checkbox" id="G6-10" name="G6_10" value="false" onclick="checkboxChange('G6-10', 'G6_10')"> </span>
                  </td>
                  <td>
                    <span id="G6_11" style=""><input type="checkbox" class="kinnie-checkbox" id="G6-11" name="G6_11" value="false" onclick="checkboxChange('G6-11', 'G6_11')"> </span>
                  </td>
                  <td>
                    <span id="G6_12" style=""><input type="checkbox" class="kinnie-checkbox" id="G6-12" name="G6_12" value="false" onclick="checkboxChange('G6-12', 'G6_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">G7</td>
                  <td>
                    <span id="G7_9" style=""><input type="checkbox" class="kinnie-checkbox" id="G7-9" name="G7_9" value="false" onclick="checkboxChange('G7-9', 'G7_9')"> </span>
                  </td>
                  <td>
                    <span id="G7_10" style=""><input type="checkbox" class="kinnie-checkbox" id="G7-10" name="G7_10" value="false" onclick="checkboxChange('G7-10', 'G7_10')"> </span>
                  </td>
                  <td>
                    <span id="G7_11" style=""><input type="checkbox" class="kinnie-checkbox" id="G7-11" name="G7_11" value="false" onclick="checkboxChange('G7-11', 'G7_11')"> </span>
                  </td>
                  <td>
                    <span id="G7_12" style=""><input type="checkbox" class="kinnie-checkbox" id="G7-12" name="G7_12" value="false" onclick="checkboxChange('G7-12', 'G7_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H1</td>
                  <td>
                    <span id="H1_9" style=""><input type="checkbox" class="kinnie-checkbox" id="H1-9" name="H1_9" value="false" onclick="checkboxChange('H1-9', 'H1_9')"> </span>
                  </td>
                  <td>
                    <span id="H1_10" style=""><input type="checkbox" class="kinnie-checkbox" id="H1-10" name="H1_10" value="false" onclick="checkboxChange('H1-10', 'H1_10')"> </span>
                  </td>
                  <td>
                    <span id="H1_11" style=""><input type="checkbox" class="kinnie-checkbox" id="H1-11" name="H1_11" value="false" onclick="checkboxChange('H1-11', 'H1_11')"> </span>
                  </td>
                  <td>
                    <span id="H1_12" style=""><input type="checkbox" class="kinnie-checkbox" id="H1-12" name="H1_12" value="false" onclick="checkboxChange('H1-12', 'H1_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H2</td>
                  <td>
                    <span id="H2_9" style=""><input type="checkbox" class="kinnie-checkbox" id="H2-9" name="H2_9" value="false" onclick="checkboxChange('H2-9', 'H2_9')"> </span>
                  </td>
                  <td>
                    <span id="H2_10" style=""><input type="checkbox" class="kinnie-checkbox" id="H2-10" name="H2_10" value="false" onclick="checkboxChange('H2-10', 'H2_10')"> </span>
                  </td>
                  <td>
                    <span id="H2_11" style=""><input type="checkbox" class="kinnie-checkbox" id="H2-11" name="H2_11" value="false" onclick="checkboxChange('H2-11', 'H2_11')"> </span>
                  </td>
                  <td>
                    <span id="H2_12" style=""><input type="checkbox" class="kinnie-checkbox" id="H2-12" name="H2_12" value="false" onclick="checkboxChange('H2-12', 'H2_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H3</td>
                  <td>
                    <span id="H3_9" style=""><input type="checkbox" class="kinnie-checkbox" id="H3-9" name="H3_9" value="false" onclick="checkboxChange('H3-9', 'H3_9')"> </span>
                  </td>
                  <td>
                    <span id="H3_10" style=""><input type="checkbox" class="kinnie-checkbox" id="H3-10" name="H3_10" value="false" onclick="checkboxChange('H3-10', 'H3_10')"> </span>
                  </td>
                  <td>
                    <span id="H3_11" style=""><input type="checkbox" class="kinnie-checkbox" id="H3-11" name="H3_11" value="false" onclick="checkboxChange('H3-11', 'H3_11')"> </span>
                  </td>
                  <td>
                    <span id="H3_12" style=""><input type="checkbox" class="kinnie-checkbox" id="H3-12" name="H3_12" value="false" onclick="checkboxChange('H3-12', 'H3_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H4</td>
                  <td>
                    <span id="H4_9" style=""><input type="checkbox" class="kinnie-checkbox" id="H4-9" name="H4_9" value="false" onclick="checkboxChange('H4-9', 'H4_9')"> </span>
                  </td>
                  <td>
                    <span id="H4_10" style=""><input type="checkbox" class="kinnie-checkbox" id="H4-10" name="H4_10" value="false" onclick="checkboxChange('H4-10', 'H4_10')"> </span>
                  </td>
                  <td>
                    <span id="H4_11" style=""><input type="checkbox" class="kinnie-checkbox" id="H4-11" name="H4_11" value="false" onclick="checkboxChange('H4-11', 'H4_11')"> </span>
                  </td>
                  <td>
                    <span id="H4_12" style=""><input type="checkbox" class="kinnie-checkbox" id="H4-12" name="H4_12" value="false" onclick="checkboxChange('H4-12', 'H4_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H5</td>
                  <td>
                    <span id="H5_9" style=""><input type="checkbox" class="kinnie-checkbox" id="H5-9" name="H5_9" value="false" onclick="checkboxChange('H5-9', 'H5_9')"> </span>
                  </td>
                  <td>
                    <span id="H5_10" style=""><input type="checkbox" class="kinnie-checkbox" id="H5-10" name="H5_10" value="false" onclick="checkboxChange('H5-10', 'H5_10')"> </span>
                  </td>
                  <td>
                    <span id="H5_11" style=""><input type="checkbox" class="kinnie-checkbox" id="H5-11" name="H5_11" value="false" onclick="checkboxChange('H5-11', 'H5_11')"> </span>
                  </td>
                  <td>
                    <span id="H5_12" style=""><input type="checkbox" class="kinnie-checkbox" id="H5-12" name="H5_12" value="false" onclick="checkboxChange('H5-12', 'H5_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H6</td>
                  <td>
                    <span id="H6_9" style=""><input type="checkbox" class="kinnie-checkbox" id="H6-9" name="H6_9" value="false" onclick="checkboxChange('H6-9', 'H6_9')"> </span>
                  </td>
                  <td>
                    <span id="H6_10" style=""><input type="checkbox" class="kinnie-checkbox" id="H6-10" name="H6_10" value="false" onclick="checkboxChange('H6-10', 'H6_10')"> </span>
                  </td>
                  <td>
                    <span id="H6_11" style=""><input type="checkbox" class="kinnie-checkbox" id="H6-11" name="H6_11" value="false" onclick="checkboxChange('H6-11', 'H6_11')"> </span>
                  </td>
                  <td>
                    <span id="H6_12" style=""><input type="checkbox" class="kinnie-checkbox" id="H6-12" name="H6_12" value="false" onclick="checkboxChange('H6-12', 'H6_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H7</td>
                  <td>
                    <span id="H7_9" style=""><input type="checkbox" class="kinnie-checkbox" id="H7-9" name="H7_9" value="false" onclick="checkboxChange('H7-9', 'H7_9')"> </span>
                  </td>
                  <td>
                    <span id="H7_10" style=""><input type="checkbox" class="kinnie-checkbox" id="H7-10" name="H7_10" value="false" onclick="checkboxChange('H7-10', 'H7_10')"> </span>
                  </td>
                  <td>
                    <span id="H7_11" style=""><input type="checkbox" class="kinnie-checkbox" id="H7-11" name="H7_11" value="false" onclick="checkboxChange('H7-11', 'H7_11')"> </span>
                  </td>
                  <td>
                    <span id="H7_12" style=""><input type="checkbox" class="kinnie-checkbox" id="H7-12" name="H7_12" value="false" onclick="checkboxChange('H7-12', 'H7_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H8</td>
                  <td>
                    <span id="H8_9" style=""><input type="checkbox" class="kinnie-checkbox" id="H8-9" name="H8_9" value="false" onclick="checkboxChange('H8-9', 'H8_9')"> </span>
                  </td>
                  <td>
                    <span id="H8_10" style=""><input type="checkbox" class="kinnie-checkbox" id="H8-10" name="H8_10" value="false" onclick="checkboxChange('H8-10', 'H8_10')"> </span>
                  </td>
                  <td>
                    <span id="H8_11" style=""><input type="checkbox" class="kinnie-checkbox" id="H8-11" name="H8_11" value="false" onclick="checkboxChange('H8-11', 'H8_11')"> </span>
                  </td>
                  <td>
                    <span id="H8_12" style=""><input type="checkbox" class="kinnie-checkbox" id="H8-12" name="H8_12" value="false" onclick="checkboxChange('H8-12', 'H8_12')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H9</td>
                  <td>
                    <span id="H9_9" style=""><input type="checkbox" class="kinnie-checkbox" id="H9-9" name="H9_9" value="false" onclick="checkboxChange('H9-9', 'H9_9')"> </span>
                  </td>
                  <td>
                    <span id="H9_10" style=""><input type="checkbox" class="kinnie-checkbox" id="H9-10" name="H9_10" value="false" onclick="checkboxChange('H9-10', 'H9_10')"> </span>
                  </td>
                  <td>
                    <span id="H9_11" style=""><input type="checkbox" class="kinnie-checkbox" id="H9-11" name="H9_11" value="false" onclick="checkboxChange('H9-11', 'H9_11')"> </span>
                  </td>
                  <td>
                    <span id="H9_12" style=""><input type="checkbox" class="kinnie-checkbox" id="H9-12" name="H9_12" value="false" onclick="checkboxChange('H9-12', 'H9_12')"> </span>
                  </td>
                </tr>
              </table>
            </td>
            <td style="border-right: 1px solid;vertical-align: top;">
              <table style="width: 100%;font-family: Arial;font-size:9px;padding: 0;margin: 0;text-align: center;line-height: .8" class="tr-border-none">
                <tr>
                  <td style="font-size: 7px;">A1</td>
                  <td>
                    <span id="A1_13" style=""><input type="checkbox" class="kinnie-checkbox" id="A1-13" name="A1_13" value="false" onclick="checkboxChange('A1-13', 'A1_13')"> </span>
                  </td>
                  <td>
                    <span id="A1_14" style=""><input type="checkbox" class="kinnie-checkbox" id="A1-14" name="A1_14" value="false" onclick="checkboxChange('A1-14', 'A1_14')"> </span>
                  </td>
                  <td>
                    <span id="A1_15" style=""><input type="checkbox" class="kinnie-checkbox" id="A1-15" name="A1_15" value="false" onclick="checkboxChange('A1-15', 'A1_15')"> </span>
                  </td>
                  <td>
                    <span id="A1_16" style=""><input type="checkbox" class="kinnie-checkbox" id="A1-16" name="A1_16" value="false" onclick="checkboxChange('A1-16', 'A1_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">A2</td>
                  <td>
                    <span id="A2_13" style=""><input type="checkbox" class="kinnie-checkbox" id="A2-13" name="A2_13" value="false" onclick="checkboxChange('A2-13', 'A2_13')"> </span>
                  </td>
                  <td>
                    <span id="A2_14" style=""><input type="checkbox" class="kinnie-checkbox" id="A2-14" name="A2_14" value="false" onclick="checkboxChange('A2-14', 'A2_14')"> </span>
                  </td>
                  <td>
                    <span id="A2_15" style=""><input type="checkbox" class="kinnie-checkbox" id="A2-15" name="A2_15" value="false" onclick="checkboxChange('A2-15', 'A2_15')"> </span>
                  </td>
                  <td>
                    <span id="A2_16" style=""><input type="checkbox" class="kinnie-checkbox" id="A2-16" name="A2_16" value="false" onclick="checkboxChange('A2-16', 'A2_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">A3</td>
                  <td>
                    <span id="A3_13" style=""><input type="checkbox" class="kinnie-checkbox" id="A3-13" name="A3_13" value="false" onclick="checkboxChange('A3-13', 'A3_13')"> </span>
                  </td>
                  <td>
                    <span id="A3_14" style=""><input type="checkbox" class="kinnie-checkbox" id="A3-14" name="A3_14" value="false" onclick="checkboxChange('A3-14', 'A3_14')"> </span>
                  </td>
                  <td>
                    <span id="A3_15" style=""><input type="checkbox" class="kinnie-checkbox" id="A3-15" name="A3_15" value="false" onclick="checkboxChange('A3-15', 'A3_15')"> </span>
                  </td>
                  <td>
                    <span id="A3_16" style=""><input type="checkbox" class="kinnie-checkbox" id="A3-16" name="A3_16" value="false" onclick="checkboxChange('A3-16', 'A3_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">A4</td>
                  <td>
                    <span id="A4_13" style=""><input type="checkbox" class="kinnie-checkbox" id="A4-13" name="A4_13" value="false" onclick="checkboxChange('A4-13', 'A4_13')"> </span>
                  </td>
                  <td>
                    <span id="A4_14" style=""><input type="checkbox" class="kinnie-checkbox" id="A4-14" name="A4_14" value="false" onclick="checkboxChange('A4-14', 'A4_14')"> </span>
                  </td>
                  <td>
                    <span id="A4_15" style=""><input type="checkbox" class="kinnie-checkbox" id="A4-15" name="A4_15" value="false" onclick="checkboxChange('A4-15', 'A4_15')"> </span>
                  </td>
                  <td>
                    <span id="A4_16" style=""><input type="checkbox" class="kinnie-checkbox" id="A4-16" name="A4_16" value="false" onclick="checkboxChange('A4-16', 'A4_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">A5</td>
                  <td>
                    <span id="A5_13" style=""><input type="checkbox" class="kinnie-checkbox" id="A5-13" name="A5_13" value="false" onclick="checkboxChange('A5-13', 'A5_13')"> </span>
                  </td>
                  <td>
                    <span id="A5_14" style=""><input type="checkbox" class="kinnie-checkbox" id="A5-14" name="A5_14" value="false" onclick="checkboxChange('A5-14', 'A5_14')"> </span>
                  </td>
                  <td>
                    <span id="A5_15" style=""><input type="checkbox" class="kinnie-checkbox" id="A5-15" name="A5_15" value="false" onclick="checkboxChange('A5-15', 'A5_15')"> </span>
                  </td>
                  <td>
                    <span id="A5_16" style=""><input type="checkbox" class="kinnie-checkbox" id="A5-16" name="A5_16" value="false" onclick="checkboxChange('A5-16', 'A5_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">A6</td>
                  <td>
                    <span id="A6_13" style=""><input type="checkbox" class="kinnie-checkbox" id="A6-13" name="A6_13" value="false" onclick="checkboxChange('A6-13', 'A6_13')"> </span>
                  </td>
                  <td>
                    <span id="A6_14" style=""><input type="checkbox" class="kinnie-checkbox" id="A6-14" name="A6_14" value="false" onclick="checkboxChange('A6-14', 'A6_14')"> </span>
                  </td>
                  <td>
                    <span id="A6_15" style=""><input type="checkbox" class="kinnie-checkbox" id="A6-15" name="A6_15" value="false" onclick="checkboxChange('A6-15', 'A6_15')"> </span>
                  </td>
                  <td>
                    <span id="A6_16" style=""><input type="checkbox" class="kinnie-checkbox" id="A6-16" name="A6_16" value="false" onclick="checkboxChange('A6-16', 'A6_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">A7</td>
                  <td>
                    <span id="A7_13" style=""><input type="checkbox" class="kinnie-checkbox" id="A7-13" name="A7_13" value="false" onclick="checkboxChange('A7-13', 'A7_13')"> </span>
                  </td>
                  <td>
                    <span id="A7_14" style=""><input type="checkbox" class="kinnie-checkbox" id="A7-14" name="A7_14" value="false" onclick="checkboxChange('A7-14', 'A7_14')"> </span>
                  </td>
                  <td>
                    <span id="A7_15" style=""><input type="checkbox" class="kinnie-checkbox" id="A7-15" name="A7_15" value="false" onclick="checkboxChange('A7-15', 'A7_15')"> </span>
                  </td>
                  <td>
                    <span id="A7_16" style=""><input type="checkbox" class="kinnie-checkbox" id="A7-16" name="A7_16" value="false" onclick="checkboxChange('A7-16', 'A7_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">A8</td>
                  <td>
                    <span id="A8_13" style=""><input type="checkbox" class="kinnie-checkbox" id="A8-13" name="A8_13" value="false" onclick="checkboxChange('A8-13', 'A8_13')"> </span>
                  </td>
                  <td>
                    <span id="A8_14" style=""><input type="checkbox" class="kinnie-checkbox" id="A8-14" name="A8_14" value="false" onclick="checkboxChange('A8-14', 'A8_14')"> </span>
                  </td>
                  <td>
                    <span id="A8_15" style=""><input type="checkbox" class="kinnie-checkbox" id="A8-15" name="A8_15" value="false" onclick="checkboxChange('A8-15', 'A8_15')"> </span>
                  </td>
                  <td>
                    <span id="A8_16" style=""><input type="checkbox" class="kinnie-checkbox" id="A8-16" name="A8_16" value="false" onclick="checkboxChange('A8-16', 'A8_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">B1</td>
                  <td>
                    <span id="B1_13" style=""><input type="checkbox" class="kinnie-checkbox" id="B1-13" name="B1_13" value="false" onclick="checkboxChange('B1-13', 'B1_13')"> </span>
                  </td>
                  <td>
                    <span id="B1_14" style=""><input type="checkbox" class="kinnie-checkbox" id="B1-14" name="B1_14" value="false" onclick="checkboxChange('B1-14', 'B1_14')"> </span>
                  </td>
                  <td>
                    <span id="B1_15" style=""><input type="checkbox" class="kinnie-checkbox" id="B1-15" name="B1_15" value="false" onclick="checkboxChange('B1-15', 'B1_15')"> </span>
                  </td>
                  <td>
                    <span id="B1_16" style=""><input type="checkbox" class="kinnie-checkbox" id="B1-16" name="B1_16" value="false" onclick="checkboxChange('B1-16', 'B1_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">B2</td>
                  <td>
                    <span id="B2_13" style=""><input type="checkbox" class="kinnie-checkbox" id="B2-13" name="B2_13" value="false" onclick="checkboxChange('B2-13', 'B2_13')"> </span>
                  </td>
                  <td>
                    <span id="B2_14" style=""><input type="checkbox" class="kinnie-checkbox" id="B2-14" name="B2_14" value="false" onclick="checkboxChange('B2-14', 'B2_14')"> </span>
                  </td>
                  <td>
                    <span id="B2_15" style=""><input type="checkbox" class="kinnie-checkbox" id="B2-15" name="B2_15" value="false" onclick="checkboxChange('B2-15', 'B2_15')"> </span>
                  </td>
                  <td>
                    <span id="B2_16" style=""><input type="checkbox" class="kinnie-checkbox" id="B2-16" name="B2_16" value="false" onclick="checkboxChange('B2-16', 'B2_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">B3</td>
                  <td>
                    <span id="B3_13" style=""><input type="checkbox" class="kinnie-checkbox" id="B3-13" name="B3_13" value="false" onclick="checkboxChange('B3-13', 'B3_13')"> </span>
                  </td>
                  <td>
                    <span id="B3_14" style=""><input type="checkbox" class="kinnie-checkbox" id="B3-14" name="B3_14" value="false" onclick="checkboxChange('B3-14', 'B3_14')"> </span>
                  </td>
                  <td>
                    <span id="B3_15" style=""><input type="checkbox" class="kinnie-checkbox" id="B3-15" name="B3_15" value="false" onclick="checkboxChange('B3-15', 'B3_15')"> </span>
                  </td>
                  <td>
                    <span id="B3_16" style=""><input type="checkbox" class="kinnie-checkbox" id="B3-16" name="B3_16" value="false" onclick="checkboxChange('B3-16', 'B3_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">B4</td>
                  <td>
                    <span id="B4_13" style=""><input type="checkbox" class="kinnie-checkbox" id="B4-13" name="B4_13" value="false" onclick="checkboxChange('B4-13', 'B4_13')"> </span>
                  </td>
                  <td>
                    <span id="B4_14" style=""><input type="checkbox" class="kinnie-checkbox" id="B4-14" name="B4_14" value="false" onclick="checkboxChange('B4-14', 'B4_14')"> </span>
                  </td>
                  <td>
                    <span id="B4_15" style=""><input type="checkbox" class="kinnie-checkbox" id="B4-15" name="B4_15" value="false" onclick="checkboxChange('B4-15', 'B4_15')"> </span>
                  </td>
                  <td>
                    <span id="B4_16" style=""><input type="checkbox" class="kinnie-checkbox" id="B4-16" name="B4_16" value="false" onclick="checkboxChange('B4-16', 'B4_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">B5</td>
                  <td>
                    <span id="B5_13" style=""><input type="checkbox" class="kinnie-checkbox" id="B5-13" name="B5_13" value="false" onclick="checkboxChange('B5-13', 'B5_13')"> </span>
                  </td>
                  <td>
                    <span id="B5_14" style=""><input type="checkbox" class="kinnie-checkbox" id="B5-14" name="B5_14" value="false" onclick="checkboxChange('B5-14', 'B5_14')"> </span>
                  </td>
                  <td>
                    <span id="B5_15" style=""><input type="checkbox" class="kinnie-checkbox" id="B5-15" name="B5_15" value="false" onclick="checkboxChange('B5-15', 'B5_15')"> </span>
                  </td>
                  <td>
                    <span id="B5_16" style=""><input type="checkbox" class="kinnie-checkbox" id="B5-16" name="B5_16" value="false" onclick="checkboxChange('B5-16', 'B5_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">B6</td>
                  <td>
                    <span id="B6_13" style=""><input type="checkbox" class="kinnie-checkbox" id="B6-13" name="B6_13" value="false" onclick="checkboxChange('B6-13', 'B6_13')"> </span>
                  </td>
                  <td>
                    <span id="B6_14" style=""><input type="checkbox" class="kinnie-checkbox" id="B6-14" name="B6_14" value="false" onclick="checkboxChange('B6-14', 'B6_14')"> </span>
                  </td>
                  <td>
                    <span id="B6_15" style=""><input type="checkbox" class="kinnie-checkbox" id="B6-15" name="B6_15" value="false" onclick="checkboxChange('B6-15', 'B6_15')"> </span>
                  </td>
                  <td>
                    <span id="B6_16" style=""><input type="checkbox" class="kinnie-checkbox" id="B6-16" name="B6_16" value="false" onclick="checkboxChange('B6-16', 'B6_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">B7</td>
                  <td>
                    <span id="B7_13" style=""><input type="checkbox" class="kinnie-checkbox" id="B7-13" name="B7_13" value="false" onclick="checkboxChange('B7-13', 'B7_13')"> </span>
                  </td>
                  <td>
                    <span id="B7_14" style=""><input type="checkbox" class="kinnie-checkbox" id="B7-14" name="B7_14" value="false" onclick="checkboxChange('B7-14', 'B7_14')"> </span>
                  </td>
                  <td>
                    <span id="B7_15" style=""><input type="checkbox" class="kinnie-checkbox" id="B7-15" name="B7_15" value="false" onclick="checkboxChange('B7-15', 'B7_15')"> </span>
                  </td>
                  <td>
                    <span id="B7_16" style=""><input type="checkbox" class="kinnie-checkbox" id="B7-16" name="B7_16" value="false" onclick="checkboxChange('B7-16', 'B7_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">C1</td>
                  <td>
                    <span id="C1_13" style=""><input type="checkbox" class="kinnie-checkbox" id="C1-13" name="C1_13" value="false" onclick="checkboxChange('C1-13', 'C1_13')"> </span>
                  </td>
                  <td>
                    <span id="C1_14" style=""><input type="checkbox" class="kinnie-checkbox" id="C1-14" name="C1_14" value="false" onclick="checkboxChange('C1-14', 'C1_14')"> </span>
                  </td>
                  <td>
                    <span id="C1_15" style=""><input type="checkbox" class="kinnie-checkbox" id="C1-15" name="C1_15" value="false" onclick="checkboxChange('C1-15', 'C1_15')"> </span>
                  </td>
                  <td>
                    <span id="C1_16" style=""><input type="checkbox" class="kinnie-checkbox" id="C1-16" name="C1_16" value="false" onclick="checkboxChange('C1-16', 'C1_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">C2</td>
                  <td>
                    <span id="C2_13" style=""><input type="checkbox" class="kinnie-checkbox" id="C2-13" name="C2_13" value="false" onclick="checkboxChange('C2-13', 'C2_13')"> </span>
                  </td>
                  <td>
                    <span id="C2_14" style=""><input type="checkbox" class="kinnie-checkbox" id="C2-14" name="C2_14" value="false" onclick="checkboxChange('C2-14', 'C2_14')"> </span>
                  </td>
                  <td>
                    <span id="C2_15" style=""><input type="checkbox" class="kinnie-checkbox" id="C2-15" name="C2_15" value="false" onclick="checkboxChange('C2-15', 'C2_15')"> </span>
                  </td>
                  <td>
                    <span id="C2_16" style=""><input type="checkbox" class="kinnie-checkbox" id="C2-16" name="C2_16" value="false" onclick="checkboxChange('C2-16', 'C2_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">C3</td>
                  <td>
                    <span id="C3_13" style=""><input type="checkbox" class="kinnie-checkbox" id="C3-13" name="C3_13" value="false" onclick="checkboxChange('C3-13', 'C3_13')"> </span>
                  </td>
                  <td>
                    <span id="C3_14" style=""><input type="checkbox" class="kinnie-checkbox" id="C3-14" name="C3_14" value="false" onclick="checkboxChange('C3-14', 'C3_14')"> </span>
                  </td>
                  <td>
                    <span id="C3_15" style=""><input type="checkbox" class="kinnie-checkbox" id="C3-15" name="C3_15" value="false" onclick="checkboxChange('C3-15', 'C3_15')"> </span>
                  </td>
                  <td>
                    <span id="C3_16" style=""><input type="checkbox" class="kinnie-checkbox" id="C3-16" name="C3_16" value="false" onclick="checkboxChange('C3-16', 'C3_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">C4</td>
                  <td>
                    <span id="C4_13" style=""><input type="checkbox" class="kinnie-checkbox" id="C4-13" name="C4_13" value="false" onclick="checkboxChange('C4-13', 'C4_13')"> </span>
                  </td>
                  <td>
                    <span id="C4_14" style=""><input type="checkbox" class="kinnie-checkbox" id="C4-14" name="C4_14" value="false" onclick="checkboxChange('C4-14', 'C4_14')"> </span>
                  </td>
                  <td>
                    <span id="C4_15" style=""><input type="checkbox" class="kinnie-checkbox" id="C4-15" name="C4_15" value="false" onclick="checkboxChange('C4-15', 'C4_15')"> </span>
                  </td>
                  <td>
                    <span id="C4_16" style=""><input type="checkbox" class="kinnie-checkbox" id="C4-16" name="C4_16" value="false" onclick="checkboxChange('C4-16', 'C4_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">C5</td>
                  <td>
                    <span id="C5_13" style=""><input type="checkbox" class="kinnie-checkbox" id="C5-13" name="C5_13" value="false" onclick="checkboxChange('C5-13', 'C5_13')"> </span>
                  </td>
                  <td>
                    <span id="C5_14" style=""><input type="checkbox" class="kinnie-checkbox" id="C5-14" name="C5_14" value="false" onclick="checkboxChange('C5-14', 'C5_14')"> </span>
                  </td>
                  <td>
                    <span id="C5_15" style=""><input type="checkbox" class="kinnie-checkbox" id="C5-15" name="C5_15" value="false" onclick="checkboxChange('C5-15', 'C5_15')"> </span>
                  </td>
                  <td>
                    <span id="C5_16" style=""><input type="checkbox" class="kinnie-checkbox" id="C5-16" name="C5_16" value="false" onclick="checkboxChange('C5-16', 'C5_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">D1</td>
                  <td>
                    <span id="D1_13" style=""><input type="checkbox" class="kinnie-checkbox" id="D1-13" name="D1_13" value="false" onclick="checkboxChange('D1-13', 'D1_13')"> </span>
                  </td>
                  <td>
                    <span id="D1_14" style=""><input type="checkbox" class="kinnie-checkbox" id="D1-14" name="D1_14" value="false" onclick="checkboxChange('D1-14', 'D1_14')"> </span>
                  </td>
                  <td>
                    <span id="D1_15" style=""><input type="checkbox" class="kinnie-checkbox" id="D1-15" name="D1_15" value="false" onclick="checkboxChange('D1-15', 'D1_15')"> </span>
                  </td>
                  <td>
                    <span id="D1_16" style=""><input type="checkbox" class="kinnie-checkbox" id="D1-16" name="D1_16" value="false" onclick="checkboxChange('D1-16', 'D1_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">D2</td>
                  <td>
                    <span id="D2_13" style=""><input type="checkbox" class="kinnie-checkbox" id="D2-13" name="D2_13" value="false" onclick="checkboxChange('D2-13', 'D2_13')"> </span>
                  </td>
                  <td>
                    <span id="D2_14" style=""><input type="checkbox" class="kinnie-checkbox" id="D2-14" name="D2_14" value="false" onclick="checkboxChange('D2-14', 'D2_14')"> </span>
                  </td>
                  <td>
                    <span id="D2_15" style=""><input type="checkbox" class="kinnie-checkbox" id="D2-15" name="D2_15" value="false" onclick="checkboxChange('D2-15', 'D2_15')"> </span>
                  </td>
                  <td>
                    <span id="D2_16" style=""><input type="checkbox" class="kinnie-checkbox" id="D2-16" name="D2_16" value="false" onclick="checkboxChange('D2-16', 'D2_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">D3</td>
                  <td>
                    <span id="D3_13" style=""><input type="checkbox" class="kinnie-checkbox" id="D3-13" name="D3_13" value="false" onclick="checkboxChange('D3-13', 'D3_13')"> </span>
                  </td>
                  <td>
                    <span id="D3_14" style=""><input type="checkbox" class="kinnie-checkbox" id="D3-14" name="D3_14" value="false" onclick="checkboxChange('D3-14', 'D3_14')"> </span>
                  </td>
                  <td>
                    <span id="D3_15" style=""><input type="checkbox" class="kinnie-checkbox" id="D3-15" name="D3_15" value="false" onclick="checkboxChange('D3-15', 'D3_15')"> </span>
                  </td>
                  <td>
                    <span id="D3_16" style=""><input type="checkbox" class="kinnie-checkbox" id="D3-16" name="D3_16" value="false" onclick="checkboxChange('D3-16', 'D3_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">E1</td>
                  <td>
                    <span id="E1_13" style=""><input type="checkbox" class="kinnie-checkbox" id="E1-13" name="E1_13" value="false" onclick="checkboxChange('E1-13', 'E1_13')"> </span>
                  </td>
                  <td>
                    <span id="E1_14" style=""><input type="checkbox" class="kinnie-checkbox" id="E1-14" name="E1_14" value="false" onclick="checkboxChange('E1-14', 'E1_14')"> </span>
                  </td>
                  <td>
                    <span id="E1_15" style=""><input type="checkbox" class="kinnie-checkbox" id="E1-15" name="E1_15" value="false" onclick="checkboxChange('E1-15', 'E1_15')"> </span>
                  </td>
                  <td>
                    <span id="E1_16" style=""><input type="checkbox" class="kinnie-checkbox" id="E1-16" name="E1_16" value="false" onclick="checkboxChange('E1-16', 'E1_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">E2</td>
                  <td>
                    <span id="E2_13" style=""><input type="checkbox" class="kinnie-checkbox" id="E2-13" name="E2_13" value="false" onclick="checkboxChange('E2-13', 'E2_13')"> </span>
                  </td>
                  <td>
                    <span id="E2_14" style=""><input type="checkbox" class="kinnie-checkbox" id="E2-14" name="E2_14" value="false" onclick="checkboxChange('E2-14', 'E2_14')"> </span>
                  </td>
                  <td>
                    <span id="E2_15" style=""><input type="checkbox" class="kinnie-checkbox" id="E2-15" name="E2_15" value="false" onclick="checkboxChange('E2-15', 'E2_15')"> </span>
                  </td>
                  <td>
                    <span id="E2_16" style=""><input type="checkbox" class="kinnie-checkbox" id="E2-16" name="E2_16" value="false" onclick="checkboxChange('E2-16', 'E2_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">E3</td>
                  <td>
                    <span id="E3_13" style=""><input type="checkbox" class="kinnie-checkbox" id="E3-13" name="E3_13" value="false" onclick="checkboxChange('E3-13', 'E3_13')"> </span>
                  </td>
                  <td>
                    <span id="E3_14" style=""><input type="checkbox" class="kinnie-checkbox" id="E3-14" name="E3_14" value="false" onclick="checkboxChange('E3-14', 'E3_14')"> </span>
                  </td>
                  <td>
                    <span id="E3_15" style=""><input type="checkbox" class="kinnie-checkbox" id="E3-15" name="E3_15" value="false" onclick="checkboxChange('E3-15', 'E3_15')"> </span>
                  </td>
                  <td>
                    <span id="E3_16" style=""><input type="checkbox" class="kinnie-checkbox" id="E3-16" name="E3_16" value="false" onclick="checkboxChange('E3-16', 'E3_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">E4</td>
                  <td>
                    <span id="E4_13" style=""><input type="checkbox" class="kinnie-checkbox" id="E4-13" name="E4_13" value="false" onclick="checkboxChange('E4-13', 'E4_13')"> </span>
                  </td>
                  <td>
                    <span id="E4_14" style=""><input type="checkbox" class="kinnie-checkbox" id="E4-14" name="E4_14" value="false" onclick="checkboxChange('E4-14', 'E4_14')"> </span>
                  </td>
                  <td>
                    <span id="E4_15" style=""><input type="checkbox" class="kinnie-checkbox" id="E4-15" name="E4_15" value="false" onclick="checkboxChange('E4-15', 'E4_15')"> </span>
                  </td>
                  <td>
                    <span id="E4_16" style=""><input type="checkbox" class="kinnie-checkbox" id="E4-16" name="E4_16" value="false" onclick="checkboxChange('E4-16', 'E4_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">E5</td>
                  <td>
                    <span id="E5_13" style=""><input type="checkbox" class="kinnie-checkbox" id="E5-13" name="E5_13" value="false" onclick="checkboxChange('E5-13', 'E5_13')"> </span>
                  </td>
                  <td>
                    <span id="E5_14" style=""><input type="checkbox" class="kinnie-checkbox" id="E5-14" name="E5_14" value="false" onclick="checkboxChange('E5-14', 'E5_14')"> </span>
                  </td>
                  <td>
                    <span id="E5_15" style=""><input type="checkbox" class="kinnie-checkbox" id="E5-15" name="E5_15" value="false" onclick="checkboxChange('E5-15', 'E5_15')"> </span>
                  </td>
                  <td>
                    <span id="E5_16" style=""><input type="checkbox" class="kinnie-checkbox" id="E5-16" name="E5_16" value="false" onclick="checkboxChange('E5-16', 'E5_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">F1</td>
                  <td>
                    <span id="F1_13" style=""><input type="checkbox" class="kinnie-checkbox" id="F1-13" name="F1_13" value="false" onclick="checkboxChange('F1-13', 'F1_13')"> </span>
                  </td>
                  <td>
                    <span id="F1_14" style=""><input type="checkbox" class="kinnie-checkbox" id="F1-14" name="F1_14" value="false" onclick="checkboxChange('F1-14', 'F1_14')"> </span>
                  </td>
                  <td>
                    <span id="F1_15" style=""><input type="checkbox" class="kinnie-checkbox" id="F1-15" name="F1_15" value="false" onclick="checkboxChange('F1-15', 'F1_15')"> </span>
                  </td>
                  <td>
                    <span id="F1_16" style=""><input type="checkbox" class="kinnie-checkbox" id="F1-16" name="F1_16" value="false" onclick="checkboxChange('F1-16', 'F1_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">F2</td>
                  <td>
                    <span id="F2_13" style=""><input type="checkbox" class="kinnie-checkbox" id="F2-13" name="F2_13" value="false" onclick="checkboxChange('F2-13', 'F2_13')"> </span>
                  </td>
                  <td>
                    <span id="F2_14" style=""><input type="checkbox" class="kinnie-checkbox" id="F2-14" name="F2_14" value="false" onclick="checkboxChange('F2-14', 'F2_14')"> </span>
                  </td>
                  <td>
                    <span id="F2_15" style=""><input type="checkbox" class="kinnie-checkbox" id="F2-15" name="F2_15" value="false" onclick="checkboxChange('F2-15', 'F2_15')"> </span>
                  </td>
                  <td>
                    <span id="F2_16" style=""><input type="checkbox" class="kinnie-checkbox" id="F2-16" name="F2_16" value="false" onclick="checkboxChange('F2-16', 'F2_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">F3</td>
                  <td>
                    <span id="F3_13" style=""><input type="checkbox" class="kinnie-checkbox" id="F3-13" name="F3_13" value="false" onclick="checkboxChange('F3-13', 'F3_13')"> </span>
                  </td>
                  <td>
                    <span id="F3_14" style=""><input type="checkbox" class="kinnie-checkbox" id="F3-14" name="F3_14" value="false" onclick="checkboxChange('F3-14', 'F3_14')"> </span>
                  </td>
                  <td>
                    <span id="F3_15" style=""><input type="checkbox" class="kinnie-checkbox" id="F3-15" name="F3_15" value="false" onclick="checkboxChange('F3-15', 'F3_15')"> </span>
                  </td>
                  <td>
                    <span id="F3_16" style=""><input type="checkbox" class="kinnie-checkbox" id="F3-16" name="F3_16" value="false" onclick="checkboxChange('F3-16', 'F3_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">F4</td>
                  <td>
                    <span id="F4_13" style=""><input type="checkbox" class="kinnie-checkbox" id="F4-13" name="F4_13" value="false" onclick="checkboxChange('F4-13', 'F4_13')"> </span>
                  </td>
                  <td>
                    <span id="F4_14" style=""><input type="checkbox" class="kinnie-checkbox" id="F4-14" name="F4_14" value="false" onclick="checkboxChange('F4-14', 'F4_14')"> </span>
                  </td>
                  <td>
                    <span id="F4_15" style=""><input type="checkbox" class="kinnie-checkbox" id="F4-15" name="F4_15" value="false" onclick="checkboxChange('F4-15', 'F4_15')"> </span>
                  </td>
                  <td>
                    <span id="F4_16" style=""><input type="checkbox" class="kinnie-checkbox" id="F4-16" name="F4_16" value="false" onclick="checkboxChange('F4-16', 'F4_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">F5</td>
                  <td>
                    <span id="F5_13" style=""><input type="checkbox" class="kinnie-checkbox" id="F5-13" name="F5_13" value="false" onclick="checkboxChange('F5-13', 'F5_13')"> </span>
                  </td>
                  <td>
                    <span id="F5_14" style=""><input type="checkbox" class="kinnie-checkbox" id="F5-14" name="F5_14" value="false" onclick="checkboxChange('F5-14', 'F5_14')"> </span>
                  </td>
                  <td>
                    <span id="F5_15" style=""><input type="checkbox" class="kinnie-checkbox" id="F5-15" name="F5_15" value="false" onclick="checkboxChange('F5-15', 'F5_15')"> </span>
                  </td>
                  <td>
                    <span id="F5_16" style=""><input type="checkbox" class="kinnie-checkbox" id="F5-16" name="F5_16" value="false" onclick="checkboxChange('F5-16', 'F5_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">G1</td>
                  <td>
                    <span id="G1_13" style=""><input type="checkbox" class="kinnie-checkbox" id="G1-13" name="G1_13" value="false" onclick="checkboxChange('G1-13', 'G1_13')"> </span>
                  </td>
                  <td>
                    <span id="G1_14" style=""><input type="checkbox" class="kinnie-checkbox" id="G1-14" name="G1_14" value="false" onclick="checkboxChange('G1-14', 'G1_14')"> </span>
                  </td>
                  <td>
                    <span id="G1_15" style=""><input type="checkbox" class="kinnie-checkbox" id="G1-15" name="G1_15" value="false" onclick="checkboxChange('G1-15', 'G1_15')"> </span>
                  </td>
                  <td>
                    <span id="G1_16" style=""><input type="checkbox" class="kinnie-checkbox" id="G1-16" name="G1_16" value="false" onclick="checkboxChange('G1-16', 'G1_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">G2</td>
                  <td>
                    <span id="G2_13" style=""><input type="checkbox" class="kinnie-checkbox" id="G2-13" name="G2_13" value="false" onclick="checkboxChange('G2-13', 'G2_13')"> </span>
                  </td>
                  <td>
                    <span id="G2_14" style=""><input type="checkbox" class="kinnie-checkbox" id="G2-14" name="G2_14" value="false" onclick="checkboxChange('G2-14', 'G2_14')"> </span>
                  </td>
                  <td>
                    <span id="G2_15" style=""><input type="checkbox" class="kinnie-checkbox" id="G2-15" name="G2_15" value="false" onclick="checkboxChange('G2-15', 'G2_15')"> </span>
                  </td>
                  <td>
                    <span id="G2_16" style=""><input type="checkbox" class="kinnie-checkbox" id="G2-16" name="G2_16" value="false" onclick="checkboxChange('G2-16', 'G2_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">G3</td>
                  <td>
                    <span id="G3_13" style=""><input type="checkbox" class="kinnie-checkbox" id="G3-13" name="G3_13" value="false" onclick="checkboxChange('G3-13', 'G3_13')"> </span>
                  </td>
                  <td>
                    <span id="G3_14" style=""><input type="checkbox" class="kinnie-checkbox" id="G3-14" name="G3_14" value="false" onclick="checkboxChange('G3-14', 'G3_14')"> </span>
                  </td>
                  <td>
                    <span id="G3_15" style=""><input type="checkbox" class="kinnie-checkbox" id="G3-15" name="G3_15" value="false" onclick="checkboxChange('G3-15', 'G3_15')"> </span>
                  </td>
                  <td>
                    <span id="G3_16" style=""><input type="checkbox" class="kinnie-checkbox" id="G3-16" name="G3_16" value="false" onclick="checkboxChange('G3-16', 'G3_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">G4</td>
                  <td>
                    <span id="G4_13" style=""><input type="checkbox" class="kinnie-checkbox" id="G4-13" name="G4_13" value="false" onclick="checkboxChange('G4-13', 'G4_13')"> </span>
                  </td>
                  <td>
                    <span id="G4_14" style=""><input type="checkbox" class="kinnie-checkbox" id="G4-14" name="G4_14" value="false" onclick="checkboxChange('G4-14', 'G4_14')"> </span>
                  </td>
                  <td>
                    <span id="G4_15" style=""><input type="checkbox" class="kinnie-checkbox" id="G4-15" name="G4_15" value="false" onclick="checkboxChange('G4-15', 'G4_15')"> </span>
                  </td>
                  <td>
                    <span id="G4_16" style=""><input type="checkbox" class="kinnie-checkbox" id="G4-16" name="G4_16" value="false" onclick="checkboxChange('G4-16', 'G4_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">G5</td>
                  <td>
                    <span id="G5_13" style=""><input type="checkbox" class="kinnie-checkbox" id="G5-13" name="G5_13" value="false" onclick="checkboxChange('G5-13', 'G5_13')"> </span>
                  </td>
                  <td>
                    <span id="G5_14" style=""><input type="checkbox" class="kinnie-checkbox" id="G5-14" name="G5_14" value="false" onclick="checkboxChange('G5-14', 'G5_14')"> </span>
                  </td>
                  <td>
                    <span id="G5_15" style=""><input type="checkbox" class="kinnie-checkbox" id="G5-15" name="G5_15" value="false" onclick="checkboxChange('G5-15', 'G5_15')"> </span>
                  </td>
                  <td>
                    <span id="G5_16" style=""><input type="checkbox" class="kinnie-checkbox" id="G5-16" name="G5_16" value="false" onclick="checkboxChange('G5-16', 'G5_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">G6</td>
                  <td>
                    <span id="G6_13" style=""><input type="checkbox" class="kinnie-checkbox" id="G6-13" name="G6_13" value="false" onclick="checkboxChange('G6-13', 'G6_13')"> </span>
                  </td>
                  <td>
                    <span id="G6_14" style=""><input type="checkbox" class="kinnie-checkbox" id="G6-14" name="G6_14" value="false" onclick="checkboxChange('G6-14', 'G6_14')"> </span>
                  </td>
                  <td>
                    <span id="G6_15" style=""><input type="checkbox" class="kinnie-checkbox" id="G6-15" name="G6_15" value="false" onclick="checkboxChange('G6-15', 'G6_15')"> </span>
                  </td>
                  <td>
                    <span id="G6_16" style=""><input type="checkbox" class="kinnie-checkbox" id="G6-16" name="G6_16" value="false" onclick="checkboxChange('G6-16', 'G6_16')"> </span>
                  </td>
                </tr>
                <tr>
                 <td style="font-size: 7px;">G7</td>
                  <td>
                    <span id="G7_13" style=""><input type="checkbox" class="kinnie-checkbox" id="G7-13" name="G7_13" value="false" onclick="checkboxChange('G7-13', 'G7_13')"> </span>
                  </td>
                  <td>
                    <span id="G7_14" style=""><input type="checkbox" class="kinnie-checkbox" id="G7-14" name="G7_14" value="false" onclick="checkboxChange('G7-14', 'G7_14')"> </span>
                  </td>
                  <td>
                    <span id="G7_15" style=""><input type="checkbox" class="kinnie-checkbox" id="G7-15" name="G7_15" value="false" onclick="checkboxChange('G7-15', 'G7_15')"> </span>
                  </td>
                  <td>
                    <span id="G7_16" style=""><input type="checkbox" class="kinnie-checkbox" id="G7-16" name="G7_16" value="false" onclick="checkboxChange('G7-16', 'G7_16')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H1</td>
                  <td>
                  <span id="H1_13" style=""><input type="checkbox" class="kinnie-checkbox" id="H1-13" name="H1_13" value="false" onclick="checkboxChange('H1-13', 'H1_13')"> </span>
                  </td>
                  <td>
                  <span id="H1_14" style=""><input type="checkbox" class="kinnie-checkbox" id="H1-14" name="H1_14" value="false" onclick="checkboxChange('H1-14', 'H1_14')"> </span>
                  </td>
                  <td>
                  <span id="H1_15" style=""><input type="checkbox" class="kinnie-checkbox" id="H1-15" name="H1_15" value="false" onclick="checkboxChange('H1-15', 'H1_15')"> </span>
                  </td>
                  <td>
                  <span id="H1_16" style=""><input type="checkbox" class="kinnie-checkbox" id="H1-16" name="H1_16" value="false" onclick="checkboxChange('H1-16', 'H1_16')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H2</td>
                  <td>
                  <span id="H2_13" style=""><input type="checkbox" class="kinnie-checkbox" id="H2-13" name="H2_13" value="false" onclick="checkboxChange('H2-13', 'H2_13')"> </span>
                  </td>
                  <td>
                  <span id="H2_14" style=""><input type="checkbox" class="kinnie-checkbox" id="H2-14" name="H2_14" value="false" onclick="checkboxChange('H2-14', 'H2_14')"> </span>
                  </td>
                  <td>
                  <span id="H2_15" style=""><input type="checkbox" class="kinnie-checkbox" id="H2-15" name="H2_15" value="false" onclick="checkboxChange('H2-15', 'H2_15')"> </span>
                  </td>
                  <td>
                  <span id="H2_16" style=""><input type="checkbox" class="kinnie-checkbox" id="H2-16" name="H2_16" value="false" onclick="checkboxChange('H2-16', 'H2_16')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H3</td>
                  <td>
                  <span id="H3_13" style=""><input type="checkbox" class="kinnie-checkbox" id="H3-13" name="H3_13" value="false" onclick="checkboxChange('H3-13', 'H3_13')"> </span>
                  </td>
                  <td>
                  <span id="H3_14" style=""><input type="checkbox" class="kinnie-checkbox" id="H3-14" name="H3_14" value="false" onclick="checkboxChange('H3-14', 'H3_14')"> </span>
                  </td>
                  <td>
                  <span id="H3_15" style=""><input type="checkbox" class="kinnie-checkbox" id="H3-15" name="H3_15" value="false" onclick="checkboxChange('H3-15', 'H3_15')"> </span>
                  </td>
                  <td>
                  <span id="H3_16" style=""><input type="checkbox" class="kinnie-checkbox" id="H3-16" name="H3_16" value="false" onclick="checkboxChange('H3-16', 'H3_16')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H4</td>
                  <td>
                  <span id="H4_13" style=""><input type="checkbox" class="kinnie-checkbox" id="H4-13" name="H4_13" value="false" onclick="checkboxChange('H4-13', 'H4_13')"> </span>
                  </td>
                  <td>
                  <span id="H4_14" style=""><input type="checkbox" class="kinnie-checkbox" id="H4-14" name="H4_14" value="false" onclick="checkboxChange('H4-14', 'H4_14')"> </span>
                  </td>
                  <td>
                  <span id="H4_15" style=""><input type="checkbox" class="kinnie-checkbox" id="H4-15" name="H4_15" value="false" onclick="checkboxChange('H4-15', 'H4_15')"> </span>
                  </td>
                  <td>
                  <span id="H4_16" style=""><input type="checkbox" class="kinnie-checkbox" id="H4-16" name="H4_16" value="false" onclick="checkboxChange('H4-16', 'H4_16')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H5</td>
                  <td>
                  <span id="H5_13" style=""><input type="checkbox" class="kinnie-checkbox" id="H5-13" name="H5_13" value="false" onclick="checkboxChange('H5-13', 'H5_13')"> </span>
                  </td>
                  <td>
                  <span id="H5_14" style=""><input type="checkbox" class="kinnie-checkbox" id="H5-14" name="H5_14" value="false" onclick="checkboxChange('H5-14', 'H5_14')"> </span>
                  </td>
                  <td>
                  <span id="H5_15" style=""><input type="checkbox" class="kinnie-checkbox" id="H5-15" name="H5_15" value="false" onclick="checkboxChange('H5-15', 'H5_15')"> </span>
                  </td>
                  <td>
                  <span id="H5_16" style=""><input type="checkbox" class="kinnie-checkbox" id="H5-16" name="H5_16" value="false" onclick="checkboxChange('H5-16', 'H5_16')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H6</td>
                  <td>
                  <span id="H6_13" style=""><input type="checkbox" class="kinnie-checkbox" id="H6-13" name="H6_13" value="false" onclick="checkboxChange('H6-13', 'H6_13')"> </span>
                  </td>
                  <td>
                  <span id="H6_14" style=""><input type="checkbox" class="kinnie-checkbox" id="H6-14" name="H6_14" value="false" onclick="checkboxChange('H6-14', 'H6_14')"> </span>
                  </td>
                  <td>
                  <span id="H6_15" style=""><input type="checkbox" class="kinnie-checkbox" id="H6-15" name="H6_15" value="false" onclick="checkboxChange('H6-15', 'H6_15')"> </span>
                  </td>
                  <td>
                  <span id="H6_16" style=""><input type="checkbox" class="kinnie-checkbox" id="H6-16" name="H6_16" value="false" onclick="checkboxChange('H6-16', 'H6_16')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H7</td>
                  <td>
                  <span id="H7_13" style=""><input type="checkbox" class="kinnie-checkbox" id="H7-13" name="H7_13" value="false" onclick="checkboxChange('H7-13', 'H7_13')"> </span>
                  </td>
                  <td>
                  <span id="H7_14" style=""><input type="checkbox" class="kinnie-checkbox" id="H7-14" name="H7_14" value="false" onclick="checkboxChange('H7-14', 'H7_14')"> </span>
                  </td>
                  <td>
                  <span id="H7_15" style=""><input type="checkbox" class="kinnie-checkbox" id="H7-15" name="H7_15" value="false" onclick="checkboxChange('H7-15', 'H7_15')"> </span>
                  </td>
                  <td>
                  <span id="H7_16" style=""><input type="checkbox" class="kinnie-checkbox" id="H7-16" name="H7_16" value="false" onclick="checkboxChange('H7-16', 'H7_16')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H8</td>
                  <td>
                  <span id="H8_13" style=""><input type="checkbox" class="kinnie-checkbox" id="H8-13" name="H8_13" value="false" onclick="checkboxChange('H8-13', 'H8_13')"> </span>
                  </td>
                  <td>
                  <span id="H8_14" style=""><input type="checkbox" class="kinnie-checkbox" id="H8-14" name="H8_14" value="false" onclick="checkboxChange('H8-14', 'H8_14')"> </span>
                  </td>
                  <td>
                  <span id="H8_15" style=""><input type="checkbox" class="kinnie-checkbox" id="H8-15" name="H8_15" value="false" onclick="checkboxChange('H8-15', 'H8_15')"> </span>
                  </td>
                  <td>
                  <span id="H8_16" style=""><input type="checkbox" class="kinnie-checkbox" id="H8-16" name="H8_16" value="false" onclick="checkboxChange('H8-16', 'H8_16')"> </span>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 7px;">H9</td>
                  <td>
                  <span id="H9_13" style=""><input type="checkbox" class="kinnie-checkbox" id="H9-13" name="H9_13" value="false" onclick="checkboxChange('H9-13', 'H9_13')"> </span>
                  </td>
                  <td>
                  <span id="H9_14" style=""><input type="checkbox" class="kinnie-checkbox" id="H9-14" name="H9_14" value="false" onclick="checkboxChange('H9-14', 'H9_14')"> </span>
                  </td>
                  <td>
                  <span id="H9_15" style=""><input type="checkbox" class="kinnie-checkbox" id="H9-15" name="H9_15" value="false" onclick="checkboxChange('H9-15', 'H9_15')"> </span>
                  </td>
                  <td>
                  <span id="H9_16" style=""><input type="checkbox" class="kinnie-checkbox" id="H9-16" name="H9_16" value="false" onclick="checkboxChange('H9-16', 'H9_16')"> </span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
      </table>
      <div style="page-break-before: always"></div>
      <div class="sign-area body" style="display: none;">
        <i class="material-icons dp48 " style="color: #ff4081;padding-left: 20px;position: fixed;" onclick="signConsent('kinnie-body')">rate_review</i>
      </div>
      <div class="sign-area body signature body-draw" style="text-align: center;margin: 18px auto 0 auto;height: 719px;background-image: url('https://sagundentalclinic.com/images/body-draw-portrait.jpg');background-repeat: no-repeat;background-size: contain;position:relative;background-position: center;"></div>

              <!-- <h3 style="text-align: center;margin: 23px;">INFORMED CONsENT</h3> -->
          

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
  <div id="modal-edit-treatment-record" class="modal modal-fixed-footer">
          <div class="modal-content">
            <div class="col s8 m6">
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
                  <div class="input-field col m8 s12">
                    <textarea id="edit-procedure" name="procedure" class="materialize-textarea" data-length="120"></textarea>
                    <label for="textarea1" class="active">Procedure</label>
                  </div>
                
                </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-charged" id="edit-amount-charged"  data-type="currency">
                      <label for="currency" class="active">Amount Charged</label>
                  </div>
                </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="amount-paid" id="edit-amount-paid" data-type="currency">
                      <label for="currency" class="active">Amount Paid</label>
                  </div>
                </div>
                <div class="col s12">
                  <div class="input-field col m6 s12">
                      <input type="text" name="balance" id="edit-balance"  data-type="currency">
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

<script type="text/javascript">
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
document.getElementById('clear').addEventListener('click', function () {
  signaturePad.clear();
  var head =  $( this ).hasClass( "head-background" );
  var body =  $( this ).hasClass( "body-background" );
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

  $("#button-trigger").css("visibility", "hidden");
  const myDiv = document.getElementById("myClickableDiv");
      myDiv.click();
    setTimeout(function(){ 
     $("#button-trigger").css("visibility", "visible");

      myDiv.click();
  }, 1000);
     setTimeout(function(){ 
      $(".second").removeClass("d-none");
      myDiv.click();
      
  }, 1300);



  var colNum = 2;





function removeClassFromAllDivs(classNameToRemove) {
  // Select all div elements that have the specified class
  const divsWithClass = document.querySelectorAll(`div.${classNameToRemove}`);

  // Iterate over the NodeList and remove the class from each element
  divsWithClass.forEach(div => {
    div.classList.remove(classNameToRemove);
  });
}

// Example usage: Remove the class "my-class" from all div elements
removeClassFromAllDivs('second');


  $("body").addClass("patient-page");
  $(window).scroll(function() {
    if (document.body.scrollTop >5 || document.documentElement.scrollTop > 5) {
      $(".navbar-main.gradient-45deg-indigo-purple").addClass("bg-change-nav");
      } else {
        $(".navbar-main.gradient-45deg-indigo-purple").removeClass("bg-change-nav");
      }
    });

  $('.btn-view-more').click(function(){
    $(".search-button").click();
})

if( {{number_format($userType)}} > '1') {
   $(".menu-monthly-subs").css("display", "none");
}

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
    document.getElementsByTagName("canvas")[0].removeAttribute("width");
    $(".drawing canvas").attr("width", "600");
    $(".drawing canvas").attr("height", "400");
    $(".signature-pad").css('height', '400px');
  $("#modal-drawing-area .buttons #drawing-save-png").removeAttr('onclick');
});

var room = 1;
  var pathArray = window.location.pathname.split('/');
  document.getElementById("patient_id").value = pathArray[2];

  
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

  var myParamRemove = location.search.split('remove_patient_status=')[1];
  if(myParamRemove == 1) {
    $(".card-alert.card.green").removeClass("hide");
      $(".card-alert.card.green p").html("Patient suceessfully removed!");
      setTimeout(function(){ 
      $(".card-alert.card.green").addClass("hide");

      const url = new URL(window.location.href);
      url.searchParams.delete('remove_patient_status');
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
  
});

function view(patient_id) {
  document.getElementById("file_upload_patient_id").value = patient_id;
  $(".progress").removeClass("d-none");
  $(".preloader-wrapper").removeClass("d-none");

const demoClasses = document.querySelectorAll('#upload-url');
demoClasses.forEach(element => {
  $(demoClasses).attr('href', '/patient/upload-image/'+patient_id);
});

const removePatient = document.querySelectorAll('#submit-remove-patient-record');
removePatient.forEach(element => {
  $(removePatient).attr('onclick', 'removePatientRecordProcess('+patient_id+')');
});




  $.ajax({
    type: "GET",
    url: '/view-patient/'+ patient_id,
    success: function (data) {

      data.patientDataInfo.forEach((obj) => {
        Object.entries(obj).forEach(([key, value]) => {
          console.log(key+ "-" + value);
          $("#"+key).html(value);
          if(key == 'profilePictureLink') {
             if(value == null) {
               var value = '/images/profile-placeholder.png';
             }
            $("#profilePictureLink").html('<div class="responsive-img patient-img circle z-depth-2" style="background-image: url('+value+');background-position: center;background-repeat: no-repeat;background-size: cover;height: 255px;width: auto;max-width: 255px;"></div>');
            
          
          }
          // if(key == "total") {
          //   setTimeout(function(){ 
          //    document.getElementById("total").value = 33; 
          //   }, 3000);
          // }
          if(key == "firstName") {
            $("#signerName").html(value);
          }
          if(key == "lastName") {
            $("#signerName").append(value);
          }
          if(key == "id") {
            $("#edit_id").attr("href", "/edit-patient/"+value);
          }
        });
      });
      console.log(data.treatHtml);
      $("#patientTreatmentHtml").html(data.treatHtml);
      Object.entries(data.patientData).forEach(([key, value]) => {
        var code = '"'+key+' '+value+'"';
// ffffffffffffffffffffffffffffff
        if(key == 'firstName' ||  key == 'lastName' || key == 'address' || key == 'age' || key == 'sex' || key == 'status' || key == 'mobile' || key == 'occupation' || key == 'referredBy') {
              const input = document.querySelectorAll('#'+key);
            input.forEach(element => {
              if(value !== "") {
                $(input).html(value);
              }
               
            });
        }


        if(key == 'firstName' ||  key == 'lastName' || key == 'localAnestheticOthers' || key == 'ifSoWhat'|| key == 'ifSoWhatPreEx'|| key == 'address' || key == 'company' || key == 'occupation' || key == 'signatureLink' || key == 'ifSoWhatMedicine' || key == 'highBloodPressureText' || key == 'emergency' || key == 'referredBy' || key == 'relationship' || key == 'emergencyMobileNo' )  {
          console.log(key);

            
          
            
            

          if(key == 'signatureLink') {
            // if(value !== '') {
            //   $("#signature-Link").attr("src", value);
            // } else {
            //   $("#signature-Link").attr("src", "/images/sig-placeholder.png");
            // }
          } else {
            document.getElementById(key).value = value; 
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

        // consent
      $("#consentHtml").html(data.ConsentHtml);
      $("#fileHtml").html(data.FileHtml);
      console.log("pasok");
      console.log(data.FileHtml);
      
       console.log(data.signatureLink);
        document.getElementById("patient_id").value = patient_id;
        // document.getElementById("picture_upload_patient_id").value = patient_id;
      $('#modal1').modal('open');
     $(".progress").addClass("d-none");
     $(".preloader-wrapper").addClass("d-none");

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
}

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
    $("#signature-pad").removeClass('teeth-background');
    $("#signature-pad").removeClass('body-background');
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
    $("#signature-pad").removeClass('teeth-background');
    $("#signature-pad").removeClass('head-background');
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
  if(person == 'teeth') {
    $("#clear").addClass('teeth-background');
    $("#clear").removeClass('head-background');
    $("#clear").removeClass('body-background');
    $("#modal-drawing-area .wrapper").addClass('h-600');
    $("#signature-pad").removeClass('head-background');
    $("#signature-pad").removeClass('body-background');
    $("#signature-pad").addClass('teeth-background');
    $(".drawing canvas").attr("width", "615");
    $(".drawing canvas").attr("height", "600");
    $(".signature-pad").css('height', '600px');
  }
}

function signConsentProcess(person) {
  var drawing_link = document.getElementById("drawing_link").value;
  if(person == "patient") {
    $(".sign-area.patient.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39px;text-align: center;'>");
    
  } else if(person == "patient2") {
    $(".sign-area.patient2.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39px;text-align: center;'>");
  } else if(person == "patient3") {
    $(".sign-area.patient3.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39px;text-align: center;'>");
  } else if(person == "patient4") {
    $(".sign-area.patient4.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39px;text-align: center;'>");
  } else if(person == "patient5") {
    $(".sign-area.patient5.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39px;text-align: center;'>");
  } else if(person == "patient6") {
    $(".sign-area.patient6.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39px;text-align: center;'>");
  } else if(person == "patient7") {
    $(".sign-area.patient7.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39px;text-align: center;'>");
  } else if(person == "dentist") {
    $(".sign-area.dentist.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39px;text-align: center;'>");
  } else if(person == "witness") {
    $(".sign-area.witness.signature").html("<img src='"+drawing_link+"' / style='width: 250px;padding: 4px;display: block;position: absolute;padding: 0px 39px;text-align: center;'>");
  } else if (person == "teeth") {
    $("#modal-drawing-area .wrapper").removeClass('h-600');
    $("#signature-pad").removeClass('head-background');
    $("#modal-drawing-area .wrapper").removeClass('h-600');
    $("#modal-drawing-area .wrapper").removeClass('h-790');
    $(".teeth-draw").html("<img src='"+drawing_link+"' / style='width: 615px;height: 600px;padding: 4px;display: block;position: absolute;text-align: center;'>");
  }  else if (person == "kinnie") {
    $("#signature-pad").removeClass('head-background');
    $("#modal-drawing-area .wrapper").removeClass('h-600');
    $("#modal-drawing-area .wrapper").removeClass('h-790');
    $(".head-draw").html("<img src='"+drawing_link+"' / style='width: 300px;height: 300px;padding: 4px;display: block;position: absolute;text-align: center;'>");
  } else if (person == "kinnie-body") {
    $("#signature-pad").removeClass('head-background');
    $("#modal-drawing-area .wrapper").removeClass('h-600');
    $("#modal-drawing-area .wrapper").removeClass('h-790');
    if (window.screen.availWidth >= 768 && window.screen.availWidth <= 1030) {
      $(".body-draw").html("<img src='"+drawing_link+"' / style='text-align: center;height: 715px;width:530px; '>");
    } else {
      $(".body-draw").html("<img src='"+drawing_link+"' / style='text-align: center;height: 596px;width:595px; '>");
    }
  }
}

function saveConsent(type) {
  document.getElementById("consent_type").value = type;
  $(".progress").removeClass("d-none");
  
  if(type == 'informed-consent-1') {
    var initial_val = document.getElementById("initial-payment").value;
    $("span#initial_payment").html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+initial_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#initial-payment").css('display', 'none');
    var total_val = document.getElementById("total-payment").value;
    $("span#total_payment").html('<span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+total_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#total-payment").css('display', 'none');
    var date_val = document.getElementById("date-on").value;
    $("span#date_on").html('<span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+date_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#date-on").css('display', 'none');
    var year_val = document.getElementById("year-on").value;
    $("span#year_on").html('<span>'+year_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#year-on").css('display', 'none');
    var kind_treatment_val = document.getElementById("kind-treatment").value;
    $("span#kind_treatment").html('<span style="display: block;width: 500px;position: relative;">'+kind_treatment_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#kind-treatment").css('display', 'none');
    var mobile_num_val = document.getElementById("mobile-num").value;
    $("span#mobile_num").html('<span style="display: block;width: 500px;position: relative;">'+mobile_num_val+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    $("input#mobile-num").css('display', 'none');
    var html = ($('#modal-contract-consent .wrapper').html());
    document.getElementById("contract_html").value = html;
  } else if(type == 'informed-consent-2') {
    var html = ($('#modal-informed-consent .wrapper').html());
    document.getElementById("contract_html").value = html;
  }else if(type == 'instruction-veneers') {
    var html = ($('#modal-instruction-veneers .wrapper').html());
    document.getElementById("contract_html").value = html;
  } else if(type == 'instruction-laser-whitening') {
    var html = ($('#modal-instruction-laser-whitening .wrapper').html());
    document.getElementById("contract_html").value = html;
  } else if(type == 'instruction-for-braces') {
    var html = ($('#modal-home-care-instruction .wrapper').html());
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
    var initial_val = document.getElementById("indicate-A").value;
    $("#indicate_A").html('<span style="width: 100%;display: block;">'+initial_val+'</span>');
    $("input#indicate-A").css('display', 'none');
    var initial_val = document.getElementById("indicate-B").value;
    $("#indicate_B").html('<span style="width: 100%;display: block;">'+initial_val+'</span>');
    $("input#indicate-B").css('display', 'none');
    var initial_val = document.getElementById("indicate-C").value;
    $("#indicate_C").html('<span style="width: 100%;display: block;">'+initial_val+'</span>');
    $("input#indicate-C").css('display', 'none');

    var initial_val = document.getElementById("date-1").value;
    $("span#date_1").html('<span>'+initial_val+'</span>');
    $("input#date-1").css('display', 'none');
    var initial_val = document.getElementById("date-2").value;
    $("span#date_2").html('<span>'+initial_val+'</span>');
    $("input#date-2").css('display', 'none');
    var initial_val = document.getElementById("date-3").value;
    $("span#date_3").html('<span>'+initial_val+'</span>');
    $("input#date-3").css('display', 'none');
    var initial_val = document.getElementById("date-4").value;
    $("span#date_4").html('<span>'+initial_val+'</span>');
    $("input#date-4").css('display', 'none');
    var arrayOfIds = $.map($(".kinnie-checkbox"), function(n, i){
      return n.id;
    });

    arrayOfIds.forEach((id_name) => {
      console.log(id_name);
      var id_name_new = id_name.replace("-", "_");

      var val = document.getElementById(id_name).value;
      if(val == 'true') {
        $("span#"+id_name_new).html('<span style="display: block;width: 10px;position: relative;"><img src="https://sagundentalclinic.com/images/sagun-checked.png" style="width: 10px;"/>');
      } 
    });

    var html = ($('#modal-kinnie-funt .wrapper').html());
    document.getElementById("contract_html").value = html;
  }
    
    var patient_id = document.getElementById("patient_id").value;
    document.getElementById("consent_patient_id").value = patient_id;

    $.ajax({
    type: "post",
    url: '/create-pdf/'+ patient_id,
    data:  $("#form-consent").serialize(),
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
      $(".card-alert.card.green").removeClass("hide");
      $(".card-alert.card.green p").html(type.replaceAll('-',' ')+" consent successfully created!");
      setTimeout(function(){ 
      $(".card-alert.card.green").addClass("hide");
       }, 3000);
      
    },
    error: function (data, textStatus, errorThrown) {

    },
  });
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

function removeTreatmentProcedureRecord(treatment_procedure_id) {
  $.ajax({
    type: "get",
    url: '/remove-treatment-procedure/'+ treatment_procedure_id,
    data:  $("").serialize(),
    success: function (data) {
      $('#modal-add-treatment-record').modal('close');
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
      document.getElementById("edit-date").value =data.procedureValue.date;
      document.getElementById("edit-procedure").value = data.procedureValue.treatment_procedure;
      document.getElementById("edit-amount-charged").value =  separator(data.procedureValue.amount_charged);
      document.getElementById("edit-amount-paid").value =  separator(data.procedureValue.amount_paid);
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
  var amount_charged = document.getElementById("edit-amount-charged").value;
  var amount_paid = document.getElementById("edit-amount-paid").value;
  var balance = document.getElementById("edit-balance").value;
  $.ajax({
    type: "GET",
    url: '/save-edit-procedure/',
    data:  {date: date, procedure: procedure, amount_charged: amount_charged, amount_paid: amount_paid, balance: balance, procedure_id: treatment_procedure_id},
    success: function (data) {
      $("#modal-edit-treatment-record").modal("close");
      $("#modal-modify-procedure").modal("close");
      $(".card-alert.card.green").removeClass("hide");
      $(".card-alert.card.green p").html(data.success);
      setTimeout(function(){ 
      $(".card-alert.card.green").addClass("hide");
      }, 3000);

        $("#treatment-record").click();
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);
    },
  });
}


function viewFile(file_id) {
  $.ajax({
    type: "get",
    url: '/view-file/'+ file_id,
    data:  $("").serialize(),
    success: function (data) {
      console.log(data);

      $("#modal-view-file p").html("<img src='"+data.files.file_path+"' style='width: 100%;'>");
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
  });
}

// document.addEventListener('DOMContentLoaded', function() {
//     var elems = document.querySelectorAll('.datepicker');
//     var instances = M.Datepicker.init(elems, options);
//   });

// Jquery Dependency
$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
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
      input_val += ".00";
    }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}


// });

// $( document ).ready(function() {
//   $('#view-patient').click(function() {

//   var dataString = $('#formValidate0').serialize();
//   let fullName = $('#fullName').val();
//   let address = $('#address').val();
//   let age = $('#age').val();
//   let sex = $('#sex').val();
//   let status = $('#status').val();
//   let mobile = $('#mobile').val();
//   let occupation = $('#occupation').val();
//   let referredBy = $('#referredBy').val();
//   let emergency = $('#emergency').val();
//   let relationship = $('#relationship').val();
//   let emergencyMobileNo = $('#emergencyMobileNo').val();
//   let emergencyMobileNo = $('#emergencyMobileNo').val();
//   $.ajax({
//     type: "GET",
//     dataType: 'JSON',
//     url: '/save-patient',
//     data: { fullName: fullName, address: address, age: age, sex: sex, status: status, mobile: mobile, occupation: occupation, referredBy: referredBy, emergency: emergency, relationship: relationship,
//       relationship: relationship, emergencyMobileNo: emergencyMobileNo, emergencyMobileNo: emergencyMobileNo, _token: '{{csrf_token()}}' },
//     success: function (data) {
//       console.log(data.success);
//       document.getElementById("formValidate0").reset();
//       $(".card-alert.card.green p").html("Patient successfully added!");
//       $(".card-alert.card.green").removeClass("hide");
//       setTimeout(function(){ 
//       $(".card-alert.card.green").addClass("hide");
//        }, 3000);
//     },
//     error: function (data, textStatus, errorThrown) {
//         console.log(data.success);

//     },
//   });
//   });

// });

</script>