@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Adding a Patient')
{{-- vendor style --}}
@section('css-style')
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom/custom.css')); ?>">
@endsection
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
@endsection
<style type="text/css">
  .waves-effect.waves-block.waves-light.profile-button {
      padding-top: 18px !important;
  }
  /* label {
    font-size: 0px !important;
} */
#birthDate {
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

  <!-- HTML VALIDATION  -->

  <div class="row">
    <div class="col s12 m12 l8">
      <div id="html-validations " class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Patient Information</h4>
              </div>
              <div class="col s12 m6 l2">
              </div>
            </div>
          </div>
          <div id="html-view-validations add-patient-form info-form">
            <form class="formValidate0" id="formValidate0" method="post" >
              <input type="hidden" name="signatureLink" id="signature_link" value="" />
              <input type="hidden" name="newSigner" id="new_signer" value="" />
              <input type="hidden" name="relationshipToPatient" id="relationship_to_patient" value="" />
            @csrf
          <!-- Equivalent to... -->
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <!-- Equivalent to... -->
              <div class="row">
                <div class="input-field col s6">
                  <label for="fullName">First Name*</label>
                  <input class="validate"  id="firstName" name="firstName" type="text" required>
                </div>
                 <div class="input-field col s6">
                  <label for="middleName">Middle Name</label>
                  <input class="validate"  id="middleName" name="middleName" type="text">
                </div>
                  <div class="input-field col s6">
                  <label for="fullName">Last Name*</label>
                  <input class="validate"  id="lastName" name="lastName" type="text" required>
                </div>
                <div class="input-field col s6">
                  <label for="nickName">Nickname</label>
                  <input class="validate"  id="nickName" name="nickName" type="text">
                </div>
               
                <div class="input-field col s12">
                  <label for="fullName">Address</label>
                  <input class="validate"  id="address" name="address" type="text">
                </div>

                <div class="input-field col s12">
                  <label for="age">Birthday* (MM/DD/YYYY)</label>
                  <!-- <input type="text" class="datepicker" id="birthDate" value="01/01/1990" required> -->
                  <input type="text" id="birthDate" placeholder="MM/DD/YYYY" onkeyup="formatDate(this)" style="color: black;">

                </div>

                <div class=" col s12 ">
                  <label for="age">Age*</label>
                  <input class="validate"  id="age" name="age" type="number"  required>
                </div>
                <div class="col s12 mt-1 mb-3">
                  <!-- <label for="sex">Sex</label>
                  <select class=""  id="sex" name="sex" >
                    <option value="" selected>-</option>
                    <option value="Male">Male</option>
                    <option value="female">Female</option>
                  </select> -->
                  <label for="sex">Sex</label>
                  <p>
                    <label>
                      <input name="sex" type="radio" value="Male"/>
                      <span>Male</span>
                    </label>
                  </p>
                  <p>
                    <label>
                      <input name="sex" type="radio" value="Female"/>
                      <span>Female</span>
                    </label>
                  </p>
                </div>
                <div class="col s12 mb-2">
                  <!-- <label for="status">Civil Status</label>
                  <select class="" id="status" name="status" style="font-size: 9px;">
                    <option value="" selected>-</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Separated">Separated</option>
                    <option value="Divorced">Divorced</option>
                  </select> -->

                  <label for="status">Civil Status</label>
                  <p>
                    <label>
                      <input name="status" type="radio" value="Single" checked/>
                      <span>Single</span>
                    </label>
                  </p>
                  <p>
                    <label>
                      <input name="status" type="radio" value="Married"/>
                      <span>Married</span>
                    </label>
                  </p>
                  <p>
                    <label>
                      <input name="status" type="radio" value="Widowed"/>
                      <span>Widowed</span>
                    </label>
                  </p>
                  <!-- <p>
                    <label>
                      <input name="status" type="radio" value="Separated"/>
                      <span>Separated</span>
                    </label>
                  </p> -->
                  <!-- <p>
                    <label>
                      <input name="status" type="radio" value="Divorced"/>
                      <span>Divorced</span>
                    </label>
                  </p> -->
                </div>
                <div class=" col s12 ">
                  <label for="mobile">Mobile No/s*</label>
                  <input class="validate" id="mobile" name="mobile" type="tel" maxlength="13" required>
                </div>
                <div class="input-field col s12">
                  <label for="occupation">Occupation</label>
                  <input class="validate"  id="occupation" name="occupation" type="text">
                </div>
                <!-- <div class="input-field col s12">
                  <label for="company">Company</label>
                  <input class="validate"  id="company" name="company" type="text">
                </div> -->
                <div class="input-field col s12">
                  <label for="referredBy">Referred by</label>
                  <input class="validate"  id="referredBy" name="referredBy" type="text">
                </div>
                <div class="input-field col s12">
                  <label for="emergency">In case of emergency, please contact</label>
                  <input class="validate"  id="emergency" name="emergency" type="text">
                </div>
                <div class="input-field col s4 m4">
                  <label for="relationship">Relationship</label>
                  <input class="validate"  id="relationship" name="relationship" type="text">
                </div>
                <div class="input-field col s4 m4">
                  <label for="emergencyMobileNo">Mobile No</label>
                  <input class="validate"  id="emergencyMobileNo" name="emergencyMobileNo" type="text" maxlength="13">
                </div>
                <!-- <div class="input-field col s4 m4">
                  <label for="emergencyMobileNo">Mobile No</label>
                  <input class="validate"  id="emergencyMobileNo" name="emergencyMobileNo" type="text">
                </div> -->
          
              
              
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- JQUERY VALIDATION -->

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
              <label for="previous_dentist">Previous Dentist </label>
              <input class="validate"  id="previous_dentist" name="previous_dentist" type="text">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6">
              <label for="last_dentist_visit">Last Dentist Visit </label>
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
              <label for="name_of_physician">Name of Physician </label>
              <input class="validate"  id="name_of_physician" name="name_of_physician" type="text">
            </div><div class="input-field col s12 m6">
              <label for="specialty_if_applicable">Specialty, if applicable </label>
              <input class="validate"  id="specialty_if_applicable" name="specialty_if_applicable" type="text">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6">
              <label for="office_address">Office Address </label>
              <input class="validate"  id="office_address" name="office_address" type="text">
            </div><div class="input-field col s12 m6">
              <label for="office_number">Office Number</label>
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
               &nbsp;&nbsp;&nbsp;&nbsp;If so, what is the condition being treated? <input class="validate"  id="conditionBeingTreatedText" name="conditionBeingTreatedText" type="text" style="height: 20px;position: absolute;width: 140px;margin-left: 3px;">
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
              &nbsp;&nbsp;&nbsp;&nbsp;If so, what illness or operation? <input class="validate"  id="seriousillnessText" name="seriousillnessText" type="text" style="height: 20px;position: absolute;width: 140px;margin-left: 3px;">
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
              &nbsp;&nbsp;&nbsp;&nbsp;If so, when and why? <input class="validate"  id="hospitalizedText" name="hospitalizedText" type="text" style="height: 20px;position: absolute;width: 140px;margin-left: 3px;">
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
              &nbsp;&nbsp;&nbsp;&nbsp;If so, please specify? <input class="validate"  id="specifyText" name="specifyText" type="text" style="height: 20px;position: absolute;width: 140px;margin-left: 3px;">
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












                <div class="col s12 m4">
                </div> 
                <div class="col s12">
                  <br>
                  <br><br>
                  <br><br>
                  <br><br>
                  <br>
                  <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I hereby consent to the performance upon myself of the recommended operations & or treatments that may be considered necessary to restore my oral and dental health. This consent is given freely and voluntarily and whatever the result of any intervention or treatment maybe, I absolve my dentist from any liability or responsibility.
                  <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Furthermore, I am willing to pay for all the services rendered to me.
                  <br>
                  <br>
                  </b></p>
                  </div>
                  <div class="row mt-1">
                    <div class="col s12 m7">
                    </div>
                    <div class="col s12 m4">
                      <div class="sig-area">
                        Click to sign
                        <button class="btn-floating waves-effect green waves-light modal-trigger" href="#modal-patient-signing-area" onclick="newWindow()">
                        <i class="material-icons" id="view-patient">assignment_returned</i>
                      </button>
                      <div class="resign"><table><tbody><tr style="border-bottom: none;"><td rowspan="2" style="width: 20px;"></td><td style="border-bottom: 1px solid black;text-align: center;"><b><span id="signer-name"></span></b><a class="btn-floating waves-effect blue waves-light float-right modal-trigger btn-change-signer" href="#modal-change-signer" >
                              <i class="material-icons">edit</i>
                            </a></td></tr><tr style="border-bottom: none;"><td style="text-align: center;font-size: 11px;"> Signature over printed name <span id="relationship-entered"></span></td></tr></tbody></table> </div>
                      </div>
                    </div>
                    <div class="col s12 m1">
                    </div>
                  </div>
                  
                <div class="input-field col s12">
                  <button class="btn waves-effect waves-light right submit" type="submit" id="submit-patient" name="action">Save
                  </button>
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
              <button id="save-png" class="btn btn-danger btn-sm" onclick="">Save</button>
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
  let fullName = $('#fullName').val();
  $(".sig-area").html('<img class="patient-signature mobile-margin-left" src="'+data+'"><div class="resign"><table><tbody><tr style="border-bottom: none;"><td rowspan="2" style="width: 20px;"><button class="btn-floating waves-effect green waves-light modal-trigger" onclick="newWindow()" id="clear" href="#modal-patient-signing-area" onclick="clearPad()"><i class="material-icons" id="view-patient">refresh</i></button></td><td style="border-bottom: 1px solid black;text-align: center;padding: 0;"><b><span id="signer-name">'+fullName+'</span></b><a class="btn-floating waves-effect blue waves-light float-right modal-trigger btn-change-signer" href="#modal-change-signer" ><i class="material-icons">edit</i></a></td></tr><tr style="border-bottom: none;"><td style="text-align: center;font-size: 11px;"> Signature over printed name <span id="relationship-entered"></span></td></tr></tbody></table> </div>');
  
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
  $("body").addClass("add-patient-page");
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
  $("#sig canvas").attr("width", "400");

  // $("#firstName").keyup(function(){
  //   let sigName = $(this).val();
  //   $("#signer-name").html(sigName);
    
  // });

    $("#lastName").keyup(function(){

      var firstName = $('#firstName').val();

    let siglastName = $(this).val();

    var fullName = firstName +" "+ siglastName;
    $("#signer-name").html(fullName);

    
  });
});



$("#birthDate").change(function() {

  $("#birthDate").css("color", "black");
  
  
    var birthday = $('#birthDate').val();

     if(birthday.length !== 10) {
      alert("Invalid birthday format!");
      $("#submit-patient").addClass("disabled");
    } else {
      $("#submit-patient").removeClass("disabled");

    }
    $.ajax({
    type: "get",
    url: '/calculate-age/',
      data:  {birthday: birthday},
      success: function (data) {

    document.getElementById("age").value = data.age;
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);
     
    },
  });
});

  $('#formValidate0').on('submit',function(event){
  event.preventDefault();

  var dataString = $('#formValidate0').serialize();
  let fullName = $('#fullName').val();
  let address = $('#address').val();
  let birthDate = $('#birthDate').val();
   const birthDateFinal = birthDate.replace(/\//g, "-");

  let age = $('#age').val();
  let sex = $('#sex').val();
  let status = $('#status').val();
  let mobile = $('#mobile').val();
  let occupation = $('#occupation').val();
  let company = $('#company').val();
  let referredBy = $('#referredBy').val();

  let emergency = $('#emergency').val();
  let relationship = $('#relationship').val();
  let emergencyMobileNo = $('#emergencyMobileNo').val();
  // let emergencyMobileNo = $('#emergencyMobileNo').val();
  
  $.ajax({
    type: "post",
    url: '/save-patient/'+birthDateFinal,
    data:  $("#formValidate0").serialize(),
    success: function (data) {
      console.log(data.success);
      document.getElementById("formValidate0").reset();
      $(".sig-area").html('Click to sign<button class="btn-floating waves-effect green waves-light modal-trigger" href="#modal-patient-signing-area" ><i class="material-icons" id="view-patient">assignment_returned</i>');
      
      $(".card-alert.card.green p").html("Patient successfully added! <be> <a href='/patient/"+data.lastestPatient+"'><u>click here</u></a> to view patient");
      $(".card-alert.card.green").removeClass("hide");
      // setTimeout(function(){ 
      // $(".card-alert.card.green").addClass("hide");
      //  }, 3000);
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
<script src="{{asset('js/scripts/advance-ui-modals.js')}}"></script>

@endsection
@section('page-script')
<script src="{{asset('js/scripts/custom.js')}}"></script>
@endsection
