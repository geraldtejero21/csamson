@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Edit Patient Record')
{{-- vendor style --}}
@section('css-style')
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom/custom.css')); ?>">
@endsection
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
@endsection
<style type="text/css">
	.waves-effect.waves-block.waves-light.profile-button {
		height: 64px;
      padding-top: 18px !important;
	}
   .edit-patient-form [type='radio'] {
    opacity: 0 !important;
   }
   label#active {
    -webkit-transform: translateY(-14px) scale(.8);
    -ms-transform: translateY(-14px) scale(.8);
    transform: translateY(-14px) scale(.8);
   }
</style>
{{-- page content --}}
@section('content')
<script>
function formatDate(input) {
  let value = input.value;
  // Remove all non-digit characters
  value = value.replace(/\D/g, '');
  // Add slashes for MM/DD/YYYY format
  if (value.length > 2 && value.length <= 4) {
    value = value.substring(0, 2) + '/' + value.substring(2);
  } else if (value.length > 4) {
    value = value.substring(0, 2) + '/' + value.substring(2, 4) + '/' + value.substring(4, 8);
  }
  document.getElementById('birthDate').value = value;
  console.log(value);
  // e.target.value = value;
}
</script>
<div class="section">
  <!-- <div class="card">
    <div class="card-content">
      <p class="caption">jQuery Validation Plugin</p>
      <p><a href="http://jqueryvalidation.org/" target="_blank">jQuery Validation</a> This jQuery plugin makes simple
        clientside form validation easy, whilst still offering plenty of customization options.</p>
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
  <!-- HTML VALIDATION  -->

  <div class="row ">
    <div class="col s12 m12 l10">
      <div id="html-validations" class="card card-tabs edit-patient-form">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Editing Patient Information</h4>
              </div>
              <div class="col s12 m6 l2">
              </div>
            </div>
          </div>
          <div id="html-view-validations ">
            <form class="formValidate0" id="formValidate0" method="post">
            @csrf
              <!-- Equivalent to... -->
              @foreach($patientDataInfo as $key => $data)
              <input type="hidden" name="patient_id" value="{{$data->id}}" id="patient_id" />
              <input type="hidden" name="signatureLink" id="signature_link" value="" />
              <input type="hidden" name="newSigner" id="new_signer" value="" />
              <input type="hidden" name="relationshipToPatient" id="relationship_to_patient" value="" />
              <div class="row">
                <div class="input-field col s6">
                  <label for="firstName">First Name*</label>
                  <input class="validate" required id="firstName" name="firstName" type="text" value="{{$data->firstName}}">
                </div>
                 <div class="input-field col s6">
                  <label for="middleName">Middle Name</label>
                  <input class="validate"  id="middleName" name="middleName" type="text" value="{{$data->middleName}}">
                </div>
                 <div class="input-field col s6">
                  <label for="lastName">Last Name*</label>
                  <input class="validate" required id="lastName" name="lastName" type="text" value="{{$data->lastName}}">
                </div>
                  <div class="input-field col s6">
                  <label for="nickName">Nickname</label>
                  <input class="validate"  id="nickName" name="nickName" type="text" value="{{$data->nickName}}">
                </div>
                <div class="input-field col s12">
                  <label for="address">Address*</label>
                  <input class="validate"  id="address" name="address" type="text" value="{{$data->address}}">
                </div>
              <div class="input-field col s12 ">
                  <label for="age">Birthday* (MM/DD/YYYY)</label>
                  <!-- <input type="text" class="datepicker" id="birthDate" value="{{$data->birthDate}}" required> -->

                  <input type="text" id="birthDate" placeholder="MM/DD/YYYY" onkeyup="formatDate(this)" value="" style="color: black;">

                </div>

                <div class="col s12">
                  <label for="age">Age</label>
                  <input class="validate" required id="age" name="age" type="number" value="{{$data->age}}">
                </div>
                <div class="col s12 mt-1 mb-3">
                <label for="sex">Sex</label>
                  <p>
                    <label>
                      <input name="sex" type="radio" value="Male" class="custom-radio" id="option-sex-male" checked=""/>
                      <span>Male</span>
                    </label>
                  </p>
                  <p>
                    <label>
                      <input name="sex" type="radio" value="Female" class="custom-radio"  id="option-sex-female" checked=""/>
                      <span>Female</span>
                    </label>
                  </p>
                <!-- <label for="sex">Sex</label>
                  <div class="input-field m-0">
                    <select name="sex" id="sex-option">
                    <option value="Male">Male</option>
                    <option value="female">Female</option>
                    </select>
                  </div> -->
                </div>
                <div class="col s12">
                <label for="status">Civil Status</label>
                  <p>
                    <label>
                      <input name="status" type="radio" class="custom-radio" id="option-status-single" value="Single" checked=""/>
                      <span>Single</span>
                    </label>
                  </p>
                  <p>
                    <label>
                      <input name="status" type="radio" class="custom-radio" id="option-status-married" value="Married" checked=""/>
                      <span>Married</span>
                    </label>
                  </p>
                  <p>
                    <label>
                      <input name="status" type="radio" class="custom-radio" id="option-status-widowed" value="Widowed" checked=""/>
                      <span>Widowed</span>
                    </label>
                  </p>
                  <!-- <p>
                    <label>
                      <input name="status" type="radio" class="custom-radio" id="option-status-separated" value="Separated" checked=""/>
                      <span>Separated</span>
                    </label>
                  </p> -->
                  <!-- <p>
                    <label>
                      <input name="status" type="radio" class="custom-radio" id="option-status-divorced" value="Divorced" checked=""/>
                      <span>Divorced</span>
                    </label>
                  </p> -->
                </div>
                <div class=" col s12 mt-2">
                  <label for="mobile">Mobile No/s</label>
                  <input class="validate"  id="mobile" name="mobile" type="text" value="{{$data->mobile}}" maxlength="13">
                </div>
                <div class="input-field col s12">
                  <label for="occupation">Occupation</label>
                  <input class="validate"  id="occupation" name="occupation" type="text" value="{{$data->occupation}}">
                </div>
                <!-- <div class="input-field col s12">
                  <label for="company">Company</label>
                  <input class="validate"  id="company" name="company" type="text" value="{{$data->company}}">
                </div> -->
                <div class="input-field col s12">
                  <label for="referredBy">Referred by</label>
                  <input class="validate"  id="referredBy" name="referredBy" type="text" value="{{$data->referredBy}}">
                </div>
                <div class="input-field col s12">
                  <label for="emergency">In case of emergency, please contact</label>
                  <input class="validate"  id="emergency" name="emergency" type="text" value="{{$data->emergency}}">
                </div>
                <div class="input-field col m4 s12">
                  <label for="relationship">Relationship</label>
                  <input class="validate"  id="relationship" name="relationship" type="text" value="{{$data->relationship}}">
                </div>
           
                <div class="input-field col m4 s12">
                  <label for="emergencyMobileNo">Mobile No</label>
                  <input class="validate"  id="emergencyMobileNo" name="emergencyMobileNo" type="text" value="{{$data->emergencyMobileNo}}" maxlength="13">
                </div>
                @endforeach







  <div class="row" id="form-add-patient">
    <div class="col s12">


      <div id="validations" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m12 l10">
                <h4 class="card-title">DENTAL HISTORY </h4>
              </div>
             
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12 m6">
              <label for="previous_dentist" id="active" class="active">Previous Dentist </label>
              <input class="validate"  id="previous_dentist" name="previous_dentist" value="" type="text">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6">
              <label for="last_dentist_visit" id="active">Last Dentist Visit </label>
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
              <label for="name_of_physician" id="active" class="active">Name of Physician </label>
              <input class="validate"  id="name_of_physician" name="name_of_physician" type="text">
            </div><div class="input-field col s12 m6">
              <label for="specialty_if_applicable" id="active">Specialty, if applicable </label>
              <input class="validate"  id="specialty_if_applicable" name="specialty_if_applicable" type="text">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6">
              <label for="office_address" id="active">Office Address </label>
              <input class="validate"  id="office_address" name="office_address" type="text">
            </div><div class="input-field col s12 m6">
              <label for="office_number" id="active">Office Number</label>
              <input class="validate"  id="office_number" name="office_number" type="text">
            </div>
          </div>

        <div id="html-view-validations add-patient-form">

        <div class="row">
          <div class="col s8 m6">
          </div>
          <div class="col s4 m6">
            <p>Yes &nbsp;&nbsp;&nbsp;&nbsp;No </p>
          </div>
        </div>
          <div class="row">
          <div class="col s8 m6">
            1. Are you in good health?
          </div>
          <div class="col s4 m6">
            <label>
              <input name="question1" type="radio" value="true" id="question1"  />
              <span></span>
            </label>
            <label>
              <input name="question1" type="radio" value="false"  id="question1f"/>
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
          <div class="col s4 m6">
            <label>
              <input name="question2" type="radio" value="true" id="question2"  />
              <span></span>
            </label>
            <label>
              <input name="question2" type="radio" value="false"  id="question2f"/>
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
          <div class="col s4 m6">
            <label>
              <input name="question3" type="radio" value="true" id="question3"  />
              <span></span>
            </label>
            <label>
              <input name="question3" type="radio" value="false"  id="question3f"/>
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
          <div class="col s4 m6">
            <label>
              <input name="question4" type="radio" value="true" id="question4"  />
              <span></span>
            </label>
            <label>
              <input name="question4" type="radio" value="false"  id="question4f"/>
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
          <div class="col s4 m6">
            <label>
              <input name="question5" type="radio" value="true" id="question5"  />
              <span></span>
            </label>
            <label>
              <input name="question5" type="radio" value="false"  id="question5f"/>
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
          <div class="col s4 m6">
            <label>
              <input name="question6" type="radio" value="true" id="question6"  />
              <span></span>
            </label>
            <label>
              <input name="question6" type="radio" value="false"  id="question6f"/>
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
          <div class="col s4 m6">
            <label>
              <input name="question7" type="radio" value="true" id="question7"  />
              <span></span>
            </label>
            <label>
              <input name="question7" type="radio" value="false"  id="question7f"/>
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
                <input name="localAnesthehic" type="checkbox" id="localAnesthehic"/><span>Local Anesthehic (ex. Lidocaine)</span>
                <span></span>
              </label>
              <br>
              <label>
                <input name="penicillin" type="checkbox" id="penicillin"/><span>Penicillin, Antibiotics</span>
                <span></span>
              </label>
              <br>
              <label>
                <input name="sulfadrugs" type="checkbox" id="sulfadrugs"/><span>Sulfa Drugs</span>
                <span></span>
              </label>
                 <br>
              <label>
                <input name="aspirin" type="checkbox" id="aspirin"/><span>Aspirin</span>
                <span></span>
              </label>
                 <br>
              <label>
                <input name="latex" type="checkbox" id="latex"/><span>Latex</span>
                <span></span>
              </label>
                 <br>
               <label>
                <input name="otherscheckbox" type="checkbox" id="otherscheckbox"/><span>Others</span><input class="validate"  id="othersText" name="othersText" type="text" style="height: 20px;position: absolute;width: 140px;margin-left: 3px;">
                <span></span>
              </label>
          </div>
          <div class="col s4 m6">
            <label>
              <input name="question8" type="radio" value="true" id="question8"  />
              <span></span>
            </label>
            <label>
              <input name="question8" type="radio" value="false"  id="question8f"/>
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
          <div class="col s8 m3">
            Are you pregnant?<br>
            Are you nursing?<br>
            Are taking birth control pills?
          </div>
          <div class="col s4 m6">
            <label>
              <input name="question10a" type="radio" value="true" id="question10a"  />
              <span></span>
            </label>
            <label>
              <input name="question10a" type="radio" value="false"  id="question10af"/>
              <span></span>
            </label>
            <br>
            <label>
              <input name="question10b" type="radio" value="true" id="question10b"  />
              <span></span>
            </label>
            <label>
              <input name="question10b" type="radio" value="false"  id="question10bf"/>
              <span></span>
            </label>
             <br>
            <label>
              <input name="question10c" type="radio" value="true" id="question10c"  />
              <span></span>
            </label>
            <label>
              <input name="question10c" type="radio" value="false"  id="question10cf"/>
              <span></span>
            </label>
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
        </div>








                 <div class="row">
                  <div class="col m7 s12">
                  </div>
                  <div class="col m4 s12">
                    <div class="sig-area mt-5 text-center">
                        Click to sign
                        <button type="button" class="btn-floating waves-effect green waves-light modal-trigger" href="#modal-patient-signing-area" onclick="newWindow()">
                        <i class="material-icons" id="view-patient">assignment_returned</i>
                      </button>
                      <div class="resign"><table><tbody><tr style="border-bottom: none;"><td rowspan="2" style="width: 20px;"></td><td style="border-bottom: 1px solid black;text-align: center;"><b><span id="current_sig"></span><span id="signer-name"></span></b><a class="btn-floating waves-effect blue waves-light float-right modal-trigger btn-change-signer" href="#modal-change-signer" ><i class="material-icons">edit</i></a></td></tr><tr style="border-bottom: none;"><td style="text-align: center;font-size: 11px;"> Signature over printed name <span id="relationship-entered"></span></td></tr></tbody></table> </div>
                      </div>
                  </div>
                  <div class="col m1 s12">
                  </div>
                 </div>       
                <div class="input-field col s12">
                  <div class="col s12 mt-4 text-right">
                    <a class="waves-effect waves-light btn" href="javascript:history.back()" >Back</a>
                    <button class="btn waves-effect waves-light submit" type="submit" id="submit-patient" name="action">Save
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
              
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- JQUERY VALIDATION -->

  

 
<!-- Alerts -->
<div class="card-alert card green lighten-5 hide">
  <div class="card-content green-text">
    <p>SUCCESS : The page has been added.</p>
  </div>
  <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
  </div>
 <!-- Modal -->
  <div id="modal-patient-signing-area" class="modal">
    <div class="modal-content">
      <div class="container">
        <div class="row">
              <div class="wrapper mb-5">
                  <canvas id="signature-pad" class="signature-pad" width="400" height="200"></canvas>
              </div>
              <button id="save-png" class="btn btn-danger btn-sm">Save</button>
              <button id="clear" class="btn btn-danger btn-sm">Clear</button>
          </div>
        </div>
    </div>
  </div>

   <!-- Modal -->
   <div id="modal-change-signer" class="modal">
    <div class="modal-content">
      <div class="container">
        <div class="row">
          <form id="view-sign-form">
            @csrf
              <div class="row wrapper mb-5 ">
                <div class="input-field col s12">
                  <label for="newSigner">Full Name*</label>
                  <input class="validate" required id="enter_new_signer" name="enterNewSigner" type="text">
                </div>

                <div class="col s12 m4">
                  <label for="relationshipToPatient">Relationship*</label>
                  <select class="error validate" required id="enter_relationship_to_patient" name="enterRelationshipToPatient"  style="font-size: 9px;">
                    <option value="" disabled selected>-</option>
                    <option value="Mother">Mother</option>
                    <option value="Father">Father</option>
                    <option value="Guardian">Guardian</option>
                  </select>
                  <div class="input-field">
                  </div>
                </div>

              </div>
              <div class="buttons">
                <button id="save-png" type="button" class="btn btn-danger btn-sm modal-action modal-close" onclick="saveSigner()">Save</button>
                <a href="#!" class="modal-action modal-close"><button id="clear" class="btn btn-danger btn-sm">Close</button></a>
              </div>
              </form>
        </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

<script type="text/javascript">

var canvas = document.getElementById('signature-pad');
// Adjust canvas coordinate space taking into account pixel ratio,
// to make it look crisp on mobile devices.
// This also causes canvas to be cleared.
function resizeCanvas() {
    // When zoomed out to less than 100%, for some very strange reason,
    // some browsers report devicePixelRatio as less than 1
    // and only part of the canvas is cleared then.
    var ratio =  Math.max(window.devicePixelRatio || 1, 1);
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
    
}
function newWindow(){
  $("#signature-pad").attr("width", "425");
  $("#signature-pad").attr("height", "200");
}


 window.onresize = resizeCanvas;
  resizeCanvas();

  var signaturePad = new SignaturePad(canvas, {
    backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
  });

document.getElementById('save-png').addEventListener('click', function () {
  if (signaturePad.isEmpty()) {
    return alert("Please provide a signature first.");
  }
  
  var data = signaturePad.toDataURL('image/png');
  $('#modal-patient-signing-area').modal('close');
  let firstName = $('#firstName').val();
  let lastName = $('#lastName').val();
  let nickName = $('#nickName').val();
  let middleName = $('#middleName').val();
  
  $(".sig-area").html('<img class="patient-signature mobile-margin-left" src="'+data+'"><div class="resign"><table><tbody><tr style="border-bottom: none;"><td rowspan="2" style="width: 20px;"><button class="btn-floating waves-effect green waves-light modal-trigger" onclick="newWindow()" id="clear" href="#modal-patient-signing-area" onclick="clearPad()"><i class="material-icons" id="view-patient">refresh</i></button></td><td style="border-bottom: 1px solid black;text-align: center;padding: 0;"><b><span id="signer-name">'+firstName+' '+middleName+' ' +nickName+' '+lastName+'</span></b><a class="btn-floating waves-effect blue waves-light float-right modal-trigger btn-change-signer" href="#modal-change-signer" ><i class="material-icons">edit</i></a></td></tr><tr style="border-bottom: none;"><td style="text-align: center;font-size: 11px;"> Signature over printed name <span id="relationship-entered"></span></td></tr></tbody></table> </div>');
  
  document.getElementById("signature_link").value = data;
  
  console.log(data);

});
document.getElementById('clear').addEventListener('click', function () {
  signaturePad.clear();
});
function clearPad() {
  signaturePad.clear();
}
// document.getElementById('undo').addEventListener('click', function () {
// 	var data = signaturePad.toData();
//   if (data) {
//     data.pop(); // remove the last dot or line
//     signaturePad.fromData(data);
//   }
// });
</script>

</body>

</html>
    </div>
  </div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {

 
      
  $("body").addClass("edit-patient-page");
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

  document.getElementsByTagName("canvas")[0].removeAttribute("width");
  $("#sig canvas").attr("width", "400");

    let sigName = $("#firstName").val();
   let sigLastName = $("#lastName").val();  

    $("#signer-name").html(sigName+" "+sigLastName);
    
});
 



$( document ).ready(function() {
  var pathArray = window.location.pathname.split('/');
  $.ajax({
    type: "GET",
    url: '/view-patient/'+ pathArray[2],
    success: function (data) {
      if( data.userType > '1') {
        $(".menu-monthly-subs").css("display", "none");
      }
        console.log(data);
        $("#patientTreatmentHtml").html(data.treatHtml);

      document.getElementById("birthDate").value = data.birthday;
        
        //signature link
        if(data.signatureLink !== '') {
          var firstName = document.getElementById("firstName").value; 
          var lastName = document.getElementById("lastName").value; 
          var nickName = document.getElementById("nickName").value; 
          var middleName = document.getElementById("middleName").value; 
          
        document.getElementById("signature_link").value = data.signatureLink;
        $(".sig-area").html('<img class="" src="'+ data.signatureLink+'"  id="signature-Link" style="width: auto;height: 100px;"><div class="resign"><table><tbody><tr style="border-bottom: none;"><td rowspan="2" style="width: 20px;"><button class="btn-floating waves-effect green waves-light modal-trigger" onclick="newWindow()" id="clear" href="#modal-patient-signing-area"><i class="material-icons" id="view-patient">refresh</i></button></td><td style="border-bottom: 1px solid black;text-align: center;padding: 0;"><b><span id="signer-name">'+firstName+' '+nickName+' '+lastName+'</span></b><a class="btn-floating waves-effect blue waves-light float-right modal-trigger btn-change-signer" href="#modal-change-signer" ><i class="material-icons">edit</i></a>  </td></tr><tr style="border-bottom: none;"><td style="text-align: center;font-size: 11px;"> Signature over printed name <span id="relationship-entered"></span></td></tr></tbody></table> </div>');
        } 
        console.log(data.patientData);
        Object.entries(data.patientData).forEach(([key, value]) => {
          if(value == 'true') {
              $('#'+key).prop('checked', true);
            } else if(value == 'false') {
              $('#'+key+"f").prop('checked', true);
            } else {
          $("#"+key).html(value);
            }
              if(value == 'on') {
              $('#'+key).prop('checked', true);
            }

          var code = '"'+key+' '+value+'"';
        if(key == 'firstName' || key == 'lastName' || key == 'nickName' || key == 'middleName' || key == 'birthDate' || key == 'localAnestheticOthers' || key == 'ifSoWhat'|| key == 'ifSoWhatPreEx'|| key == 'address' || key == 'company' || key == 'occupation'|| key == 'signatureLink' || key == 'ifSoWhatMedicine' || key == 'highBloodPressureText'  || key == 'emergency'  || key == 'newSigner' || key == 'relationshipToPatient' || key == 'referredBy' || key == 'relationship' || key == 'emergencyMobileNo' ) {

           
            console.log(key);
            if(key !== 'signatureLink' && value > 0) {
              document.getElementById(key).value = value; 
            }
            //  if(key == 'signatureLink' && value !== '') {
            //   $(".sig-area").addClass("d-none");
             
            // }
             
             if(key =='newSigner' && value !== "") {
              $("#signer-name").html(value);
              document.getElementById("new_signer").value = value; 
             }
             if(key =='relationshipToPatient' && value !== "") {
              $("#relationship-entered").html("("+value+")");
              document.getElementById("relationship_to_patient").value = value; 
             }

            if(key == 'ifSoWhatMedicine') {
              document.getElementById("ifSoWhatMedicineMobile").value = value; 
              document.getElementById("ifSoWhatMedicine").value = value; 
            }
          } else {
            if(key == 'bloodpressureText' || key == 'bloodtypeText'  || key == 'bleedingTimeText' || key == 'othersText' || key == 'othersText2' || key == 'specifyText' || key == 'hospitalizedText' || key == 'seriousillnessText' || key == 'conditionBeingTreatedText' || key == 'previous_dentist' || key == 'last_dentist_visit' || key == 'name_of_physician' || key == 'specialty_if_applicable' || key == 'office_address' || key == 'office_number') {
              document.getElementById(key).value = value; 
          }

            if(key == 'sex') {
              console.log(value);
              if(value == 'Female') {
                $("#option-sex-female").prop('checked', true);
              } else {
                $("#option-sex-male").prop('checked', true);
              }
            } else if (key == 'status') {
                if(value == 'Single') {
                    $("#option-status-single").prop('checked', true);
                } else if(value == 'Married') {
                  $("#option-status-married").prop('checked', true);
                } else if(value == 'Widowed') {
                  $("#option-status-widowed").prop('checked', true);
                } else if(value == 'Separated') {
                  $("#option-status-separated").prop('checked', true);
                } else if(value == 'Divorced') {
                  $("#option-status-divorced").prop('checked', true);
                }

            } else {
              $('#'+key+value).prop('checked', true);
            }

            if(key == "firstName") {
                $("#signerName").html(value);
              }
              if(key == "lastName") {
                $("#signerName").append(value);
              }
          }
          $("#"+key).html(value);
        
          if(key == 'status') {
            $('#status-option').val(value);
          }
          if(key == 'sex') {
            $('#sex-option').val(value);
          }

          
        });

        if(data.patientData['status'] == undefined) {
          $("#option-status-single").prop('checked', false);
          $("#option-status-married").prop('checked', false);
          $("#option-status-widowed").prop('checked', false);
          $("#option-status-separated").prop('checked', false);
          $("#option-status-divorced").prop('checked', false);
         }
      },
      error: function (data, textStatus, errorThrown) {
          console.log(data.success);

      },
    });
  });

  $('#formValidate0').on('submit',function(event){
    event.preventDefault();
    let emergency = $('#emergency').val();
    let relationship = $('#relationship').val();
    let emergencyMobileNo = $('#emergencyMobileNo').val();
    let birthDate = $('#birthDate').val();
    const birthDateFinal = birthDate.replace(/\//g, "-");
    console.log("pumasok");
    
$("#submit-patient").css("pointer-events", "none");
    
    $.ajax({
      type: "post",
      url: '/edit-patient-process/'+birthDateFinal,
      data:  $("#formValidate0").serialize(),
      success: function (data) {
        console.log(data.success);
        document.getElementById("formValidate0").reset();
        $(".card-alert.card.green p").html("Patient successfully added!");
        $(".card-alert.card.green").removeClass("hide");
        setTimeout(function(){ 
        $(".card-alert.card.green").addClass("hide");
        location.reload();
        }, 3000);
      },
      error: function (data, textStatus, errorThrown) {
          console.log(data.success);

      },
    });
  });

  function saveSigner() {
    var new_signer = $('#enter_new_signer').val();
    var relationship = $('#enter_relationship_to_patient').val();
    $('#signer-name').html(new_signer);
    $('#relationship-entered').html("("+relationship+")");
    document.getElementById("new_signer").value = new_signer;
    document.getElementById("relationship_to_patient").value = relationship;
  }
  
  var tele = document.querySelector('#mobile');
tele.addEventListener('keyup', function(e){
  if (event.key != 'Backspace' && (tele.value.length === 4 || tele.value.length === 8)){
  tele.value += '-';
  }
});

  var teleemergencyMobileNo = document.querySelector('#emergencyMobileNo');
teleemergencyMobileNo.addEventListener('keyup', function(e){
  if (event.key != 'Backspace' && (teleemergencyMobileNo.value.length === 4 || teleemergencyMobileNo.value.length === 8)){
  teleemergencyMobileNo.value += '-';
  }
});
</script>


@endsection

{{-- vendor script --}}
@section('vendor-script')
<script src="{{asset('vendors/jquery-validation/jquery.validate.min.js')}}"></script>
@endsection

{{-- page script --}}
@section('page-script')
<script src="{{asset('js/scripts/form-validation.js')}}"></script>
<script src="{{asset('js/scripts/form-validation.js')}}"></script>
<script src="{{asset('js/scripts/advance-ui-modals.js')}}"></script>
@endsection
@section('page-script')
<script src="{{asset('js/scripts/custom.js')}}"></script>
@endsection


