<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Contact;
use App\Models\User;
use App\Models\Patient;
use App\Models\PatientConsentlink;
use App\Models\PatientsTreatmentRecord;
use App\Models\PatientsTreatmentRecordProcedure;
use App\Models\PatientPaymentMethodRecord;
use App\Models\InstallmentAmount;
use App\Models\InstallmentRecord;

use App\Models\File;
use DB;
use DateTime;
use Auth;
use Redirect;
use stdClass;

class ApplicationController extends Controller
{
    public function emailApp()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-email', ['pageConfigs' => $pageConfigs]);
    }
    public function patientRecords()
    {

          $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Table"], ['name' => "DataTable"],
          ];
          //Pageheader set true for breadcrumbs
          $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];
      
          return view('pages.patient-data-table', ['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs]);


    }

    public function calculateAge(Request $request) {
        $birthday = $_GET['birthday'];
         $birthDate = $birthday;
        //explode the date to get month, day and year
        $birthDate = explode("/", $birthDate);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0,  $birthDate[0], $birthDate[1],  $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));
        return response()->json(['age' => $age]);

    }
    public function viewPatient($id)
    {
        date_default_timezone_set("Asia/Manila");
        if(!Auth::check()) 
        {
            return Redirect::to('login');
        }
        $patientDataInfo = DB::table('patients')->where('id', '=', $id)
        ->get();
        foreach($patientDataInfo as $data) {
            $patientData = unserialize($data->patientData);
            if(isset($data->signatureLink)) {
                $signatureLink = $data->signatureLink;
            } else {
                $signatureLink = "";
            }
            $birthDate = $data->birthDate;
        }

      
        //explode the date to get month, day and year
        $birthDate = explode("/", $birthDate);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));

     
            
        $patientTreatmentData =DB::table('patients_treatment_records')
        ->join('patients_treatment_record_procedures', 'patients_treatment_records.id', '=', 'patients_treatment_record_procedures.patients_treatment_record_id')
        ->select('patients_treatment_record_procedures.tooth_number as tooth_number','patients_treatment_record_procedures.recall_note as recall_note','patients_treatment_record_procedures.recall_date as recall_date','patients_treatment_record_procedures.id as procedure_record_id','patients_treatment_record_procedures.patients_treatment_record_id as record_id','patients_treatment_records.patient_id as patient_id','patients_treatment_records.date','patients_treatment_record_procedures.treatment_procedure','patients_treatment_record_procedures.amount_charged', 'patients_treatment_record_procedures.amount_paid', 'patients_treatment_record_procedures.balance','patients_treatment_records.drawing_link','patients_treatment_record_procedures.treatment_procedure_patient_signature','patients_treatment_record_procedures.amount_paid_patient_signature','patients_treatment_record_procedures.balance_patient_signature','patients_treatment_record_procedures.amount_paid_note','patients_treatment_records.amount_paid_total_patient_signature')
        ->where('patients_treatment_records.patient_id', '=', $id)
        ->where('patients_treatment_records.status', '=', '1')
        ->orderBy('patients_treatment_records.id', 'asc')
        ->get();
        $grouped = $patientTreatmentData->groupBy('date');
        
        $treatHtml[] = "<tr style='background: #a28e85;color: white;border: 2px solid #a28e85;font-weight: 800'><th></th><th style=';width: 20%;'>Date</th><th style='width: 33%;'>Procedure</th><th style='width: 10%;'>Tooth Number</th><th style='width: 10%;'>Recall Date</th><th style='width: 10%;' class='text-right'>Amount Charged</th><th style='width: 10%;' class='text-right'>Amount Paid</th><th style='width: 9%;'></th><th class='text-right' style='width: 5%;'>Balance</th><th style='width: 9%;'></th><th style='width: 4%;' class='adjust-width'></th></tr>";
        $x = 0;
        $sum_charged = 0;
        $sum_paid = 0;
        $sec1 = 1;
        $sec2 = 2;
        $sec3 = 3;
        $sec4 = 4;
        $value = array();
         foreach($grouped as $key => $val) {
            foreach($val as $d) {
                $value[$x][] = $d;
            }
            $x++;
         }
         foreach($value as $k => $v) {
            $newDate = date("d-m-Y", strtotime($v[0]->date));  


            $myDateTime = DateTime::createFromFormat('m/d/Y', $v[0]->date);
            $newDateString = $myDateTime->format('F d, Y');


             
  

            // $treatHtml[] = "<tr style='background-color: #e8e8e8;height: 35px;'><td colspan='9'><strong>".$newDateString."</strong></td><td></td></tr>";
            $treatHtml[] = "<tr>";
            $len = count($v);
            $y = 0;

        
            foreach($v as $da) {

                if($da->recall_date > "") {
                    $recallDate = DateTime::createFromFormat('m-d-Y', $da->recall_date);
                    $recallDateFinal = $recallDate->format('F d, Y');
                }  else {
                    $recallDateFinal = "";
                }  

                $treatHtml[] = "<tr class='data-record'><td colspan='2' style='font-size: 12px !important;padding-left: 10px;'>".$newDateString."</td><td style='word-wrap: break-word;display: flex;position: relative;flex-direction: row;min-width: 330px;' class='mobile-min-width'><div style='padding-top: 3%;'>".nl2br($da->treatment_procedure)."</div> </td><td>".nl2br($da->tooth_number)."</td><td style='font-size: 12px !important;padding-left: 10px;'>".$recallDateFinal."<br>". nl2br(((isset($da->recall_note))? '<span style="font-size: 10px;">'.$da->recall_note.'</span>' : ""))."</td><td class='text-right'>".(($da->amount_charged > 0)? ''.number_format($da->amount_charged):'-')."</td><td class='text-right' style='line-height: 1;'>".(($da->amount_paid > 0)? ''.number_format($da->amount_paid):'-')."<br><span style='font-size: 10px;'>".$da->amount_paid_note."<span> </td><td></td><td class='text-right'>".(($da->balance > 0)? ''.number_format($da->balance):'-')."</td><td></td><td class='text-center'><i class='material-icons del-treatment-record dp48 ".((Auth::user()->type == '2')? 'd-none':'')."' style='font-size: 10px;color: #a28e85;' onclick='modifyProcedure(".$da->procedure_record_id.")'>edit</i></td></tr>";
                $sum_charged+= $da->amount_charged;
                $sum_paid+= $da->amount_paid;
               $y++;

            
            }
            $treatHtml[] = "</tr>";
            foreach($v as $draw) {
                $draw_check = 'false';
                if($draw->drawing_link !== "") {
                    $drawing_link[] = $draw->drawing_link;
                    $draw_check = 'true';
                    $draw_id = $draw->record_id;
                    
                } else {
                    $draw_id = "";
                }
            }
            $treatHtml[] = "<tr><td></td><td colspan='2'><span class='".(( $draw_check == 'true') ? '':'hide' )."'><a class='btn-floating mb-1 btn-small waves-effect waves-light' onclick='viewDrawing(".$draw_id.");'><i class='material-icons'>graphic_eq</i></a></span></td><td></td><td></td><td class='text-right' style='border-top: 1px solid black !important;border-radius: 0px;'>".(($sum_charged > 0)? ''.number_format($sum_charged):'-')."</td><td class='text-right' style='border-top: 1px solid black !important;border-radius: 0px;'>".(($sum_paid > 0)? ''.number_format($sum_paid):'-')."</td><td>".(($da->amount_paid_total_patient_signature) ? '<img src="'.$da->amount_paid_total_patient_signature.'" / style="width: 100%;height: 32px;" onclick="viewPatientSign('.$da->procedure_record_id.' , '.$sec4.')">' : "<i class='material-icons dp48 ".(($y == $len - 1) ? '':'' )."' style='color: #a28e85;padding-left: 20px;' onclick='patientsignRecord(".$da->procedure_record_id." , ".$sec4.")'>rate_review</i>")."</td><td colspan='2' class='text-center'></td><td></td><tr>";
              $sum_charged = 0;
            $sum_paid = 0;
        }

        if(!(isset($treatHtml)) ) {
            $treatHtml[] = "<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
        }

        $patientFiles = DB::table('files')->where('patient_id', '=', $id)
        ->orderBy('id', 'desc')
        ->get();
       

        if(isset($patientFiles)) {
            foreach($patientFiles as $fdata) {
                @$link = unserialize($fdata->file_path);
                @$finallink = '/assets/files/uploads/'.$link[0];

                if($link == "") {
            
                    $finallink = $fdata->file_path;
                }
                $FileHtml[] = '<tr><td>'.$fdata->name.'</td><td>'.date('F d, Y', strtotime($fdata->created_at )) .'</td><td><a  href="#modal-edit-file" target="_blank" class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 modal-trigger" onclick="editFile('.$fdata->id.')"><i class="material-icons">edit</i></a><a  href="'.$finallink.'" target="_blank" class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 " onclick="viewFile('.$fdata->id.')"><i class="material-icons">visibility</i></a><span  href="#modal-remove-file" class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 " onclick="removeFile('.$fdata->id.')"><i class="material-icons">delete</i></span>   <a  href="#modal-send-mail-file" target="_blank" class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 modal-trigger" onclick="sendMail('.$fdata->id.')"><i class="material-icons">mail</i></a></td> </tr>';
            }
        } else {
            $patientFiles = "";
        }
     
        if(!isset($FileHtml)) {
            $FileHtml[] ="";
        }

        $patientConsents = DB::table('patient_consentlinks')->where('patient_id', '=', $id)
        ->orderBy('id', 'desc')
        ->get();
        foreach($patientConsents as $cdata) {
            $ConsentHtml[] ='<tr class="'.(($cdata->link == null) ? 'd-none':'').'"><td>'.$cdata->type .'</td><td>'. date('F d, Y', strtotime($cdata->created_at)).'</td><td><a  href="/assets/files/'.$cdata->link.'" target="_blank" class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 modal-trigger" ><i class="material-icons">visibility</i></a><span class="btn-floating mb-1 btn-small waves-effect waves-light mr-1" onclick="removeConsent('.$cdata->id.');"><i class="material-icons">delete</i></span></td></tr>';
        }
        if(!isset($ConsentHtml)) {
            $ConsentHtml[] ="";
        }

        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Patient"], ['name' => "Add patient"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];


         $modical_conditions = array();
        foreach($patientData as $k => $val) {
            if($k == 'highbloodPressure' && $val == 'on') {
                $modical_conditions[] = 'Highblood Pressure'; 
            }if($k == 'lowbloodPressure' && $val == 'on') {
                $modical_conditions[] = 'Lowblood Pressure'; 
            }if($k == 'epilepsy' && $val == 'on') {
                $modical_conditions[] = 'Epilepsy/Convulsions'; 
            }if($k == 'aids' && $val == 'on') {
                $modical_conditions[] = 'AIDS or HIV Infection'; 
            }if($k == 'SexuallyTransmittedDisease' && $val == 'on') {
                $modical_conditions[] = 'Sexually Transmitted Disease'; 
            }if($k == 'stomachTroubles' && $val == 'on') {
                $modical_conditions[] = 'Stomach Troubles/Ulcers'; 
            }if($k == 'faintingSeizure' && $val == 'on') {
                $modical_conditions[] = 'Fainting Seizure'; 
            }if($k == 'rapidWeightLoss' && $val == 'on') {
                $modical_conditions[] = 'Rapid Weight Loss'; 
            }if($k == 'radiationTherapy' && $val == 'on') {
                $modical_conditions[] = 'Radiation Therapy'; 
            }if($k == 'jointReplacement' && $val == 'on') {
                $modical_conditions[] = 'Joint Replacement/implant'; 
            }if($k == 'heartSurgery' && $val == 'on') {
                $modical_conditions[] = 'Heart Surgery'; 
            }if($k == 'heartAttack' && $val == 'on') {
                $modical_conditions[] = 'Heart Attack'; 
            }if($k == 'thyroidProblem' && $val == 'on') {
                $modical_conditions[] = 'Thyroid Problem'; 
            }if($k == 'heartDisease' && $val == 'on') {
                $modical_conditions[] = 'Heart Disease'; 
            }if($k == 'heartMurmur' && $val == 'on') {
                $modical_conditions[] = 'Heart Murmur'; 
            }if($k == 'hepatitis' && $val == 'on') {
                $modical_conditions[] = 'Hepatitis/liver Disease'; 
            }if($k == 'rheumaticFever' && $val == 'on') {
                $modical_conditions[] = 'Rheumatic Fever'; 
            }if($k == 'hayFever' && $val == 'on') {
                $modical_conditions[] = 'Hay Fever / Allergies'; 
            }if($k == 'respiratoryProblems' && $val == 'on') {
                $modical_conditions[] = 'Respiratory Problems'; 
            }if($k == 'hepatitisJaundice' && $val == 'on') {
                $modical_conditions[] = 'Hepatitis/Jaundice'; 
            }if($k == 'tuberculosis' && $val == 'on') {
                $modical_conditions[] = 'Tuberculosis'; 
            }if($k == 'swollenAnkles' && $val == 'on') {
                $modical_conditions[] = 'Swollen Ankles'; 
            }if($k == 'kidneyDisease' && $val == 'on') {
                $modical_conditions[] = 'Kidney Disease'; 
            }if($k == 'Diabetes' && $val == 'on') {
                $modical_conditions[] = 'Diabetes'; 
            }if($k == 'chestPain' && $val == 'on') {
                $modical_conditions[] = 'Chest Pain'; 
            }if($k == 'stroke' && $val == 'on') {
                $modical_conditions[] = 'Stroke'; 
            }if($k == 'cancer' && $val == 'on') {
                $modical_conditions[] = 'Cancer/Tumors'; 
            }if($k == 'anemia' && $val == 'on') {
                $modical_conditions[] = 'Anemia'; 
            }if($k == 'angina' && $val == 'on') {
                $modical_conditions[] = 'Angina'; 
            }if($k == 'asthma' && $val == 'on') {
                $modical_conditions[] = 'Asthma'; 
            }if($k == 'emphysema' && $val == 'on') {
                $modical_conditions[] = 'Emphysema'; 
            }if($k == 'bleedingProblems' && $val == 'on') {
                $modical_conditions[] = 'Bleeding Problems'; 
            }if($k == 'bloodDisease' && $val == 'on') {
                $modical_conditions[] = 'Blood Disease'; 
            }if($k == 'heartInjuries' && $val == 'on') {
                $modical_conditions[] = 'Heart Injuries'; 
            }if($k == 'arthritis' && $val == 'on') {
                $modical_conditions[] = 'Arthritis'; 
            }if($k == 'othersText2' && $val > '') {
                $modical_conditions[] = $val; 
            }
        }
        if(isset($modical_conditions)) {
             $modical_conditions_list = implode(', ', $modical_conditions);
        }

        $dentalChartRecord = DB::table('patient_dental_chart')
            ->where('patient_id', $id)
            ->first();
        $dentalChart = $dentalChartRecord
            ? json_decode($dentalChartRecord->chart_data, true)
            : [];

        if (!is_array($dentalChart)) {
            $dentalChart = [];
        }

        view()->share('dentalChart', $dentalChart);


        return view('pages.patient-view', [ 'medicalCondtionList' => ((isset($modical_conditions_list)) ? $modical_conditions_list : ""), 'age' => $age, 'patient_id'=> $id, 'patientDataInfo' => $patientDataInfo, 'birtday' => $patientDataInfo[0]->birthDate, 'patientData' => $patientData, 'treatHtml' => $treatHtml, 'signatureLink' => $signatureLink, 'patientFiles' => $patientFiles, 'ConsentHtml' => $ConsentHtml, 'patientConsents' => $patientConsents, 'FileHtml' => $FileHtml, 'userType' => Auth::user()->type , 'signatureLink' => $signatureLink]);
    }
    public function saveDentalChart(Request $request, $id)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        if (!DB::table('patients')->where('id', $id)->exists()) {
            return response()->json(['message' => 'Patient not found.'], 404);
        }

        $validated = $request->validate([
            'chart' => 'required|array',
            'chart.*' => 'nullable|string|max:255',
            'surfaces' => 'required|array|size:260',
            'surfaces.*' => 'required|string|in:unmarked,marked-blue,marked-black,marked-red',
        ]);

        $chart = [];
        for ($number = 1; $number <= 54; $number++) {
            $key = 'chart_'.$number;
            $chart[$key] = (string) ($validated['chart'][$key] ?? '');
        }

        $now = now();
        $chartData = [
            'chart_data' => json_encode([
                'chart' => $chart,
                'surfaces' => array_values($validated['surfaces']),
            ]),
            'updated_at' => $now,
        ];

        $existingChart = DB::table('patient_dental_chart')
            ->where('patient_id', $id)
            ->exists();

        if ($existingChart) {
            DB::table('patient_dental_chart')
                ->where('patient_id', $id)
                ->update($chartData);
        } else {
            DB::table('patient_dental_chart')->insert(array_merge(
                ['patient_id' => (int) $id, 'created_at' => $now],
                $chartData
            ));
        }

        DB::table('patients')->where('id', $id)->update(['updated_at' => $now]);

        return response()->json(['message' => 'Dental chart saved successfully.']);
    }

    public function addPatient()
    {
        date_default_timezone_set("Asia/Manila");
        if(!Auth::check()) 
        {
            return Redirect::to('login');
        }
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Patient"], ['name' => "Add patient"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];

        return view('pages.patient-add-form', ['breadcrumbs' => $breadcrumbs], ['pageConfigs' => $pageConfigs]);
    }
    
    
    public function saveInstallment(Request $request)
    {
        $amount = filter_var( str_replace(",", "", $_GET['amount-install']), FILTER_SANITIZE_NUMBER_INT);
       
        $c = new InstallmentAmount();
        $c->date         = $_GET['date'];
        $c->patient_id   = $_GET['installment_patient_id'];
        $c->note   = ((isset($_GET['note-install'])) ? $_GET['note-install'] : '');
        $c->amount = $amount;
        $c->save();

        $latest = DB::table('installment_amounts')->latest('id')->first();

        // $c = new InstallmentRecord();
        // $c->paid        = 0;
        // $c->balance     =  $amount;
        // $c->patient_id     = $_GET['installment_patient_id'];
        // $c->installment_amount_id  =  $latest->id;
        // $c->save();


        $installmentData =DB::table('installment_amounts')
        ->join('installment_records', 'installment_records.installment_amount_id', '=', 'installment_amounts.id')
        // ->where('installment_records.patient_id', '=', $_GET['installment_patient_id'])
        ->where('installment_records.status', '=', '1')
        ->orderBy('installment_records.id', 'asc')
        ->get();
        $installments = $installmentData->groupBy('date');

        $treatHtml[] = "<tr style='background: #a28e85;color: white;border: 2px solid #a28e85;font-weight: 800;'><th></th><th style='width: 10%;' class='text-right'>Amount Paid</th><th style='width: 9%;'></th><th class='text-right' style='width: 5%;'>Balance</th><th style='width: 9%;'></th><th style='width: 4%;' class='adjust-width'></th></tr>";
        foreach($installments as $inst) {

        }

        return response()->json(['installmentHtml' => $treatHtml]);
    }
    public function showInstallment($id)
    {


         $installmentRecordData =DB::table('installment_amounts')
        ->where('patient_id', '=', $id)
        ->where('status', '=', 1)
        ->orderBy('id', 'asc')
        ->get();

        if(isset($installmentRecordData[0])) {
            foreach($installmentRecordData as $data) {
            $myDateTime = DateTime::createFromFormat('m/d/Y', $data->date);
            $date = $myDateTime->format('F d, Y');
             $treatHtml[] = "<tr style='background:  #a28e85;color: #ffffff'><td colspan='5'>&nbsp;&nbsp;&nbsp;Installment Amount: <b style='font-size: 22px;'>₱".number_format($data->amount)."</b>&nbsp;&nbsp;&nbsp; Note: ".$data->note." <span style='float: right;'>".$date." <i class='material-icons' onclick='modifyInstallment(".$data->id.")'>edit</i></span></td></tr>";
                 $installmentData =DB::table('installment_records')
                ->where('installment_amount_id', '=', $data->id)
                ->orderBy('id', 'asc')
                ->get();
            $installment_amount = $data->amount;    
            $treatHtml[] = "<tr style='background: #a28e8547;color: white;border: 2px solid #a28e8547;font-weight: 800;color: #a28e85;'><th style='width: 15%'>Date</th><th style='width: 10%;' class='text-right' colspan='2'>Amount Paid</th></tr>";

                    foreach($installmentData as $inst) {
                        $treatHtml[] = "<tr><td colspan='2'><i class='material-icons' style='font-size: 11px;padding-right: 10px;' onclick='modifyInstallmentRecord(".$inst->id.")'>edit</i>".$inst->date."</td><td class='text-right'>₱".$inst->paid."</td></tr>";
                        $installment_amount -= $inst->paid;
                    }
            $treatHtml[] = "<tr><td></td><td class='text-right'></td><td class='text-right' style='color: #a28e85;'>Balance: <span style='font-size: 22px;font-weight: 800;'>₱".number_format($installment_amount)."</span></td></tr>";

        
            $treatHtml[] = "<tr><td></td><td class='text-right'></td><td class='text-right'><button class='btn waves-effect waves-light right submit' type='submit' id='submit-patient-installment-record' onclick='addInstallmentRecordForm(".$data->id.")'>+
                                        </button></td></tr>";
            }
        } else {
            $treatHtml[] ="";
        }
    
                    



  
        // $installments = $installmentData->groupBy('date');
        

        // foreach($installments as $inst) {
        // }

        return response()->json(['installmentHtml' => $treatHtml]);



    }

    
    public function populateInstallment($installment_id) {
        $installmentRecordData =DB::table('installment_amounts')
        ->where('id', '=', $installment_id)
        ->get();

        return response()->json(['installmentData'=>$installmentRecordData[0]]);
        
    }


    public function populateInstallmentRecord($installment_id) {
        
        $installmentData =DB::table('installment_amounts')
        ->where('id', '=', $installment_id)
        ->get();

        return response()->json(['installmentData'=>$installmentData[0]]);
        
    }

    
    public function populateInstallmentRecordItem($installment_id) {
        $installmentData =DB::table('installment_records')
        ->where('id', '=', $installment_id)
        ->get();
        return response()->json(['installmentData'=>$installmentData[0]]);
        
    }


    
    

      public function saveModifyInstallmentRecord() {
        $update =  DB::table('installment_records')->where('id', '=', $_GET['edit_installment_record_id'])->update([
            'date'    =>  $_GET['edit-date-installment-record'],
            'paid'    => $_GET['modify-paid'],
        ]);


        return response()->json(['status'=> 'success', 'message'=>'payment updated!']);
        
    }

    



    public function removeInstallment($installment_id) {
       $delete =  DB::table('installment_amounts')->where('id', '=', $installment_id)->update([
        'status'    => '0'
        ]);

        return response()->json(['message'=>'Installment removed!']);
        
    }




    public function saveEditInstallment() {

        $installment_id = $_GET['edit_installment_patient_id'];
        $date = $_GET['edit-date'];
        $note = $_GET['edit-note-install'];
        $amount = filter_var( str_replace(",", "", $_GET['edit-amount-install']), FILTER_SANITIZE_NUMBER_INT);

       $update =  DB::table('installment_amounts')->where('id', '=', $installment_id)->update([
        'date'    => $date,
        'amount'    => $amount,
        'note'    => $note
        ]);

        return response()->json(['status'=> 'success', 'message' => 'Installment has been updated!']);
        
    }

    public function saveNewInstallmentRecord() {

        $paid = filter_var( str_replace(",", "", $_GET['edit-paid']), FILTER_SANITIZE_NUMBER_INT);

  
        $c = new InstallmentRecord();
        $c->installment_amount_id        =  $_GET['edit_installment_id'];
        $c->date     =  ((isset($_GET['edit-date-record']) ? $_GET['edit-date-record'] : date('m/d/Y')));
        $c->paid     = ((isset($paid)) ? $paid: 0);
        $c->save();
    
        return response()->json(['status'=> 'success', 'message' => 'Payment has been updated!']);

    }
         



    public function showPatient($id)
    {
        date_default_timezone_set("Asia/Manila");
        if(!Auth::check()) 
        {
            return Redirect::to('login');
        }
        setlocale(LC_MONETARY,"en_US");
        $patientDataInfo = DB::table('patients')->where('id', '=', $id)
        ->get();
        foreach($patientDataInfo as $data) {
            $patientData = unserialize($data->patientData);
            if(isset($data->signatureLink)) {
                $signatureLink = $data->signatureLink;
            } else { 
                $signatureLink = "";
            }
        }

          $patientTreatmentData =DB::table('patients_treatment_records')
        ->join('patients_treatment_record_procedures', 'patients_treatment_records.id', '=', 'patients_treatment_record_procedures.patients_treatment_record_id')
        ->select('patients_treatment_record_procedures.tooth_number as tooth_number','patients_treatment_record_procedures.recall_note as recall_note','patients_treatment_record_procedures.recall_date as recall_date','patients_treatment_record_procedures.id as procedure_record_id','patients_treatment_record_procedures.patients_treatment_record_id as record_id','patients_treatment_records.patient_id as patient_id','patients_treatment_records.date','patients_treatment_record_procedures.treatment_procedure','patients_treatment_record_procedures.amount_charged', 'patients_treatment_record_procedures.amount_paid', 'patients_treatment_record_procedures.balance','patients_treatment_records.drawing_link','patients_treatment_record_procedures.treatment_procedure_patient_signature','patients_treatment_record_procedures.amount_paid_patient_signature','patients_treatment_record_procedures.balance_patient_signature','patients_treatment_record_procedures.amount_paid_note','patients_treatment_records.amount_paid_total_patient_signature')
        ->where('patients_treatment_records.patient_id', '=', $id)
        ->where('patients_treatment_records.status', '=', '1')
        ->orderBy('patients_treatment_records.id', 'asc')
        ->get();
        $grouped = $patientTreatmentData->groupBy('date');
        
        $treatHtml[] = "<tr style='background: #a28e85;color: white;border: 2px solid #a28e85;font-weight: 800;'><th></th><th style=';width: 20%;'>Date</th><th style='width: 33%;'>Procedure</th><th style='width: 10%;'>Tooth Number</th><th style='width: 10%;'>Recall Date</th><th style='width: 10%;' class='text-right'>Amount Charged</th><th style='width: 10%;' class='text-right'>Amount Paid</th><th style='width: 9%;'></th><th class='text-right' style='width: 5%;'>Balance</th><th style='width: 9%;'></th><th style='width: 4%;' class='adjust-width'></th></tr>";
        $x = 0;
        $sum_charged = 0;
        $sum_paid = 0;
        $sec1 = 1;
        $sec2 = 2;
        $sec3 = 3;
        $sec4 = 4;
        $value = array();
         foreach($grouped as $key => $val) {
            foreach($val as $d) {
                $value[$x][] = $d;
            }
            $x++;
         }
         foreach($value as $k => $v) {
            $newDate = date("d-m-Y", strtotime($v[0]->date));  


            $myDateTime = DateTime::createFromFormat('m/d/Y', $v[0]->date);
            $newDateString = $myDateTime->format('F d, Y');


            // $treatHtml[] = "<tr style='background-color: #e8e8e8;height: 35px;'><td colspan='9'><strong>".$newDateString."</strong></td><td></td></tr>";
            $treatHtml[] = "<tr>";
            $len = count($v);
            $y = 0;

        
            foreach($v as $da) {
                if($da->recall_date > "") {
                    $recallDate = DateTime::createFromFormat('m-d-Y', $da->recall_date);
                    $recallDateFinal = $recallDate->format('F d, Y');
                }  else {
                    $recallDateFinal = "";
                }  

                $treatHtml[] = "<tr class='data-record'><td colspan='2' style='font-size: 12px !important;padding-left: 10px;'>".$newDateString."</td><td style='word-wrap: break-word;display: flex;position: relative;flex-direction: row;min-width: 330px;' class='mobile-min-width'><div style='padding-top: 3%;'>".nl2br($da->treatment_procedure)."</div> </td><td>".nl2br($da->tooth_number)."</td><td style='font-size: 12px !important;padding-left: 10px;'>".$recallDateFinal."<br>". nl2br(((isset($da->recall_note))? '<span style="font-size: 10px;">'.$da->recall_note.'</span>' : ""))."</td><td class='text-right'>".(($da->amount_charged > 0)? ''.number_format($da->amount_charged):'-')."</td><td class='text-right' style='line-height: 1;'>".(($da->amount_paid > 0)? ''.number_format($da->amount_paid):'-')."<br><span style='font-size: 10px;'>".$da->amount_paid_note."<span> </td><td></td><td class='text-right'>".(($da->balance > 0)? ''.number_format($da->balance):'-')."</td><td></td><td class='text-center'><i class='material-icons del-treatment-record dp48 ".((Auth::user()->type == '2')? 'd-none':'')."' style='font-size: 10px;color: #a28e85;' onclick='modifyProcedure(".$da->procedure_record_id.")'>edit</i></td></tr>";
                $sum_charged+= $da->amount_charged;
                $sum_paid+= $da->amount_paid;
               $y++;

            
            }
            $treatHtml[] = "</tr>";
            foreach($v as $draw) {
                $draw_check = 'false';
                if($draw->drawing_link !== "") {
                    $drawing_link[] = $draw->drawing_link;
                    $draw_check = 'true';
                    $draw_id = $draw->record_id;
                    
                } else {
                    $draw_id = "";
                }
            }
            $treatHtml[] = "<tr><td></td><td colspan='2'><span class='".(( $draw_check == 'true') ? '':'hide' )."'><a class='btn-floating mb-1 btn-small waves-effect waves-light' onclick='viewDrawing(".$draw_id.");'><i class='material-icons'>graphic_eq</i></a></span></td><td></td><td></td><td class='text-right' style='border-top: 1px solid black !important;border-radius: 0px;'>".(($sum_charged > 0)? ''.number_format($sum_charged):'-')."</td><td class='text-right' style='border-top: 1px solid black !important;border-radius: 0px;'>".(($sum_paid > 0)? ''.number_format($sum_paid):'-')."</td><td>".(($da->amount_paid_total_patient_signature) ? '<img src="'.$da->amount_paid_total_patient_signature.'" / style="width: 100%;height: 32px;" onclick="viewPatientSign('.$da->procedure_record_id.' , '.$sec4.')">' : "<i class='material-icons dp48 ".(($y == $len - 1) ? '':'' )."' style='color: #a28e85;padding-left: 20px;' onclick='patientsignRecord(".$da->procedure_record_id." , ".$sec4.")'>rate_review</i>")."</td><td colspan='2' class='text-center'></td><td></td><tr>";
              $sum_charged = 0;
            $sum_paid = 0;
        }

        if(!(isset($treatHtml)) ) {
            $treatHtml[] = "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
        }

        $patientFiles = DB::table('files')->where('patient_id', '=', $id)
        ->orderBy('id', 'desc')
        ->get();
       

        if(isset($patientFiles)) {
            foreach($patientFiles as $fdata) {
                @$link = unserialize($fdata->file_path);
                @$finallink = '/assets/files/uploads/'.$link[0];

                if($link == "") {
            
                    $finallink = $fdata->file_path;
                }
                $FileHtml[] = '<tr><td>'.$fdata->name.'</td><td>'.date('F d, Y', strtotime($fdata->created_at )) .'</td><td><a  href="#modal-edit-file" target="_blank" class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 modal-trigger" onclick="editFile('.$fdata->id.')"><i class="material-icons">edit</i></a><a  href="'.$finallink.'" target="_blank" class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 " onclick="viewFile('.$fdata->id.')"><i class="material-icons">visibility</i></a><span  href="#modal-remove-file" class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 " onclick="removeFile('.$fdata->id.')"><i class="material-icons">delete</i></span>   <a  href="#modal-send-mail-file" target="_blank" class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 modal-trigger" onclick="sendMail('.$fdata->id.')"><i class="material-icons">mail</i></a></td> </tr>';
            }
        } else {
            $patientFiles = "";
        }
     
        if(!isset($FileHtml)) {
            $FileHtml[] ="";
        }

        $patientConsents = DB::table('patient_consentlinks')->where('patient_id', '=', $id)
        ->orderBy('id', 'desc')
        ->get();
        foreach($patientConsents as $cdata) {
            $ConsentHtml[] ='<tr class="'.(($cdata->link == null) ? 'd-none':'').'"><td>'.$cdata->type .'</td><td>'. date('F d, Y', strtotime($cdata->created_at)).'</td><td><a  href="/assets/files/'.$cdata->link.'" target="_blank" class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 modal-trigger" ><i class="material-icons">visibility</i></a><span class="btn-floating mb-1 btn-small waves-effect waves-light mr-1" onclick="removeConsent('.$cdata->id.');"><i class="material-icons">delete</i></span></td></tr>';
        }
        if(!isset($ConsentHtml)) {
            $ConsentHtml[] ="";
        }

        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Patient"], ['name' => "Add patient"],
        ];
        //Pageheader set true for breadcrumbs
        $userType =  Auth::user()->type;

        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];
   
        $modical_conditions = array();
        foreach($patientData as $k => $val) {
            if($k == 'highbloodPressure' && $val == 'on') {
                $modical_conditions[] = 'Highblood Pressure'; 
            }if($k == 'lowbloodPressure' && $val == 'on') {
                $modical_conditions[] = 'Lowblood Pressure'; 
            }if($k == 'epilepsy' && $val == 'on') {
                $modical_conditions[] = 'Epilepsy/Convulsions'; 
            }if($k == 'aids' && $val == 'on') {
                $modical_conditions[] = 'AIDS or HIV Infection'; 
            }if($k == 'SexuallyTransmittedDisease' && $val == 'on') {
                $modical_conditions[] = 'Sexually Transmitted Disease'; 
            }if($k == 'stomachTroubles' && $val == 'on') {
                $modical_conditions[] = 'Stomach Troubles/Ulcers'; 
            }if($k == 'faintingSeizure' && $val == 'on') {
                $modical_conditions[] = 'Fainting Seizure'; 
            }if($k == 'rapidWeightLoss' && $val == 'on') {
                $modical_conditions[] = 'Rapid Weight Loss'; 
            }if($k == 'radiationTherapy' && $val == 'on') {
                $modical_conditions[] = 'Radiation Therapy'; 
            }if($k == 'jointReplacement' && $val == 'on') {
                $modical_conditions[] = 'Joint Replacement/implant'; 
            }if($k == 'heartSurgery' && $val == 'on') {
                $modical_conditions[] = 'Heart Surgery'; 
            }if($k == 'heartAttack' && $val == 'on') {
                $modical_conditions[] = 'Heart Attack'; 
            }if($k == 'thyroidProblem' && $val == 'on') {
                $modical_conditions[] = 'Thyroid Problem'; 
            }if($k == 'heartDisease' && $val == 'on') {
                $modical_conditions[] = 'Heart Disease'; 
            }if($k == 'heartMurmur' && $val == 'on') {
                $modical_conditions[] = 'Heart Murmur'; 
            }if($k == 'hepatitis' && $val == 'on') {
                $modical_conditions[] = 'Hepatitis/liver Disease'; 
            }if($k == 'rheumaticFever' && $val == 'on') {
                $modical_conditions[] = 'Rheumatic Fever'; 
            }if($k == 'hayFever' && $val == 'on') {
                $modical_conditions[] = 'Hay Fever / Allergies'; 
            }if($k == 'respiratoryProblems' && $val == 'on') {
                $modical_conditions[] = 'Respiratory Problems'; 
            }if($k == 'hepatitisJaundice' && $val == 'on') {
                $modical_conditions[] = 'Hepatitis/Jaundice'; 
            }if($k == 'tuberculosis' && $val == 'on') {
                $modical_conditions[] = 'Tuberculosis'; 
            }if($k == 'swollenAnkles' && $val == 'on') {
                $modical_conditions[] = 'Swollen Ankles'; 
            }if($k == 'kidneyDisease' && $val == 'on') {
                $modical_conditions[] = 'Kidney Disease'; 
            }if($k == 'Diabetes' && $val == 'on') {
                $modical_conditions[] = 'Diabetes'; 
            }if($k == 'chestPain' && $val == 'on') {
                $modical_conditions[] = 'Chest Pain'; 
            }if($k == 'stroke' && $val == 'on') {
                $modical_conditions[] = 'Stroke'; 
            }if($k == 'cancer' && $val == 'on') {
                $modical_conditions[] = 'Cancer/Tumors'; 
            }if($k == 'anemia' && $val == 'on') {
                $modical_conditions[] = 'Anemia'; 
            }if($k == 'angina' && $val == 'on') {
                $modical_conditions[] = 'Angina'; 
            }if($k == 'asthma' && $val == 'on') {
                $modical_conditions[] = 'Asthma'; 
            }if($k == 'emphysema' && $val == 'on') {
                $modical_conditions[] = 'Emphysema'; 
            }if($k == 'bleedingProblems' && $val == 'on') {
                $modical_conditions[] = 'Bleeding Problems'; 
            }if($k == 'bloodDisease' && $val == 'on') {
                $modical_conditions[] = 'Blood Disease'; 
            }if($k == 'heartInjuries' && $val == 'on') {
                $modical_conditions[] = 'Heart Injuries'; 
            }if($k == 'arthritis' && $val == 'on') {
                $modical_conditions[] = 'Arthritis'; 
            }if($k == 'othersText2' && $val > '') {
                $modical_conditions[] = $val; 
            }
        }
        if(isset($modical_conditions)) {
             $modical_conditions_list = implode(', ', $modical_conditions);
        }

        if(isset($patientDataInfo[0]->birthDate)) {
                    $originalDate = $patientDataInfo[0]->birthDate; // The input date in dd/mm/yyyy format
            $formatIn = 'm/d/Y';          // The original format of the input
            $formatOut = 'F j, Y';    // The desired output format in words

            $dateObject = DateTime::createFromFormat($formatIn, $originalDate);
            if ($dateObject) {
                $newDateInWords = $dateObject->format($formatOut);
          

            } else {
                $newDateInWords = "";
            }
        }
       return response()->json(['medicalCondtionList' => ((isset($modical_conditions_list)) ? $modical_conditions_list : ""), 'userType' => $userType, 'patient_id'=> $id, 'patientDataInfo' => $patientDataInfo,'birthday' => $originalDate,'birthdayNewFormat' => $newDateInWords, 'patientData' => $patientData, 'treatHtml' => $treatHtml, 'signatureLink' => $signatureLink, 'patientFiles' => $patientFiles, 'ConsentHtml' => $ConsentHtml, 'FileHtml' => $FileHtml, 'signatureLink' => $signatureLink]);
    }


    public function listPatient()
    {
        date_default_timezone_set("Asia/Manila");
        if(!Auth::check()) 
        {
            return Redirect::to('login');
        }
        date_default_timezone_set("Asia/Manila");
        $patientData = DB::table('patients')->orderBy('id', 'DESC')->where('record_status', '=', 1)->get();
        $patientFiles = DB::table('files')->where('patient_id', '=', $patientData[0]->id)->get();
        function time_elapsed_string($datetime, $full = false) {
            $now = new DateTime;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);
        
            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;
        
            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
            );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }
            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }
        // $latestPatient = DB::table('patients')->orderBy('updated_at', 'desc')->where('record_status', '=', 1)->take(5)->get();



                


        
        
        $latestPatient =DB::table('patients')
        ->where('record_status', '=', '1')
        ->get();

        $timeago = array();
        $x=0;
        foreach($latestPatient  as $data) {

        $getBalance = DB::table('patients_treatment_records')
        ->join('patients_treatment_record_procedures', 'patients_treatment_records.id', '=', 'patients_treatment_record_procedures.patients_treatment_record_id')
        ->where('patients_treatment_records.patient_id', '=', $data->id)
        ->where('patients_treatment_records.status', '=', '1')
        ->orderBy('patients_treatment_records.id', 'desc')
        ->first();
        

        if(isset($getBalance)) {
           $data->balance =  "₱". number_format($getBalance->balance);
           $data->last_visit = $getBalance->date;
           $data->last_visit_formatted = date('F d, Y', strtotime($getBalance->updated_at ));
        } else {
            $data->balance = "N/A";
           $data->last_visit = "N/A";
            $data->last_visit_formatted = "N/A";
        }

           $updated_at = $data->updated_at;
           $timeago[$x] = time_elapsed_string(date($updated_at)); 
           $data->timeAgo = $timeago[$x];


            // $data->updated_at  = substr($data->updated_at, 11);
            $data->updated_at  = $data->updated_at;


           $updated_at = $data->updated_at;

           $x++;
        }

        
        $userType =  Auth::user()->type;
        return view('pages.patient-data-table', ['userType' => $userType, 'patientData' => $patientData, 'patientFiles' => $patientFiles, 'latestPatient' => $latestPatient, 'userType' => Auth::user()->type]);
    }
    

    public function editPatient($id)
    {
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Patient"], ['name' => "Add patient"],
        ];
        $patientDataInfo = DB::table('patients')->where('id', '=', $id)
        ->get();
        
        $userType =  Auth::user()->type;

          if(isset($patientDataInfo[0]->birthDate)) {
                    $originalDate = $patientDataInfo[0]->birthDate; // The input date in dd/mm/yyyy format
            $formatIn = 'm/d/y';          // The original format of the input
            $formatOut = 'm/d/y';    // The desired output format in words
            $dateObject = DateTime::createFromFormat($formatIn, $originalDate);
            if ($dateObject) {
                $newDateInWords = $dateObject->format($formatOut);
            } else {
                $newDateInWords = "";
            }
        }


        return view('pages.patient-edit-form', ['userType' => $userType,'breadcrumbs' => $breadcrumbs, 'birthday' => $newDateInWords, 'birthdayNewFormat' => $formatOut, 'patient_id'=> $id, 'patientDataInfo' => $patientDataInfo]);

    }

    public function storePatientRecords($birthDate) { 
        
       date_default_timezone_set("Asia/Manila");
        $birthDate = str_replace("-","/",$birthDate);

        // $date = DateTime::createFromFormat('m/d/Y', $birthDate); // Parse the original date
        // $newFormatDate = $date->format('d/m/Y'); // Format it to the new dd/mm/yyyy format


       $c = new Patient();
       $c->firstName = $_POST['firstName'];
       $c->lastName = $_POST['lastName'];
       $c->middleName = $_POST['middleName'];
       $c->middleName = $_POST['middleName'];
       $c->nickName = $_POST['nickName'];
       $c->address 	= ((isset($_POST['address'])) ? $_POST['address']: "");
       $c->birthDate 	=  $birthDate;
       $c->age 	=  ((isset($_POST['age']))? $_POST['age']: 0);
       $c->sex 	= ((isset( $_POST['sex']))?  $_POST['sex'] : "");
       $c->status =  ((isset($_POST['status']))? $_POST['status'] : "");
       $c->mobile = ((isset($_POST['mobile'] ))? $_POST['mobile']  : "");
       $c->occupation = $_POST['occupation'];
    //    $c->company = $_POST['company'];
       $c->referredBy = $_POST['referredBy'];
       $c->emergency = $_POST['emergency'];
       $c->relationship = $_POST['relationship'];
       $c->emergencyMobileNo = $_POST['emergencyMobileNo'];
       $c->newSigner = $_POST['newSigner'];
       $c->relationshipToPatient = $_POST['relationshipToPatient'];
    //    $c->emergencyMobileNo = $_GET['emergencyMobileNo'];
       $c->signatureLink = (($_POST['signatureLink']) ? $_POST['signatureLink']:'');
       $_POST['signatureLink'] = "";
       $c->patientData = serialize($_POST);
       $c->updated_at =  date("Y-m-d H:i:s");
       $c->save();


      $latest = DB::table('patients')->latest('id')->first();
   

        return response()->json(['success'=>'Form is successfully submitted!', 'lastestPatient' => $latest->id]);
    }


    public function removeTreatmentProcedure($treatment_procedure_id) { 

       $delete =  DB::table('patients_treatment_record_procedures')->where('id', '=', $treatment_procedure_id)->update([
        'status'    => '0'
        ]);

        $getProcedure =  DB::table('patients_treatment_record_procedures')->where('id', '=', $treatment_procedure_id)->get();

        $deleteParent =  DB::table('patients_treatment_records')->where('id', '=', $getProcedure[0]->patients_treatment_record_id)->update([
            'status'    => '0'
            ]);
       $deletePayment =  DB::table('patient_payment_method_records')
       ->where('treatment_record_procedure_id', $treatment_procedure_id)
       ->update([
           'status'    => '0'
           ]);
           
       return response()->json(['success'=>'Treatment procedure successfully deleted!']);

    }

    public function removeConsent($consent_id) { 
        $delete =  DB::table('patient_consentlinks')->where('id', '=', $consent_id)->delete();
        return response()->json(['success'=>'Consent successfully deleted!']);
     }
     public function removePatientRecord($patient_id) { 
        $patientDataInfoUpdate =  DB::table('patients')
            ->where('id', $patient_id)
            ->update([
                'record_status'    => '0'
                ]);
                return response()->json(['success'=>'Patient successfully deleted!']);

                // return redirect('/patient-records/?remove_patient_status=1')
                
     }


     public function getProcedure($treatment_procedure_id) {
        $procedureValue = DB::table('patients_treatment_record_procedures')
        ->join('patients_treatment_records', 'patients_treatment_records.id', '=', 'patients_treatment_record_procedures.patients_treatment_record_id')
        ->where('patients_treatment_record_procedures.id', '=', $treatment_procedure_id)
        ->get();
        
        $paymentMethodValue = DB::table('patient_payment_method_records')
        ->where('treatment_record_procedure_id', '=', $treatment_procedure_id)
        ->get();
        if(count($paymentMethodValue) == 0) {
            $paymentMethodValue =  array(
                'payment_method_type' => 'cash'
        );
        } else {
            $paymentMethodValue =  $paymentMethodValue[0];
        }
    
        return response()->json(['procedureValue'=>$procedureValue[0], 'paymentMethodValue' => $paymentMethodValue  ]);
     }
     
     public function getFile($file_id) {
        $fileValue = DB::table('files')
        ->where('id', '=', $file_id)->get();
        return response()->json(['fileValue'=>$fileValue[0] ]);
     }

     public function saveEditProcedure(Request $request) {
        // $date                = (() ? : )$_GET['date'];
        $procedure_id        = $_GET['procedure_id'];
        $treatment_procedure = (($_GET['procedure']) ?  $_GET['procedure'] : '0');
        $tooth_number = (($_GET['tooth_no']) ?  $_GET['tooth_no'] : '0');
        
        if(isset($_GET['recall_date'])) {
        $recallDate = str_replace("/","-",$_GET['recall_date']  );
        } else {
        $recallDate = "";
        }
        $recall_date = $recallDate;
        $recall_note = (($_GET['recall_note']) ?  $_GET['recall_note'] : '');
        $amount_charged_val = filter_var( str_replace(",", "", $_GET['amount_charged']), FILTER_SANITIZE_NUMBER_INT);
        $amount_paid_val = filter_var( str_replace(",", "", $_GET['amount_paid']), FILTER_SANITIZE_NUMBER_INT);
        $amount_paid_note = (($_GET['amount_paid_note']) ?  $_GET['amount_paid_note'] : '');
        $balance_val = filter_var( str_replace(",", "", $_GET['balance']), FILTER_SANITIZE_NUMBER_INT);
        $amount_charged      = (($amount_charged_val) ? $amount_charged_val : '0');
        $amount_paid         = (($amount_paid_val) ? $amount_paid_val : '0');
        $balance             = (($balance_val) ? $balance_val : '0');
        $payment_type =    (($_GET['payment_type']) ? $_GET['payment_type'] : 'cash');
        
        $updatePaymentMethod =  DB::table('patient_payment_method_records')
        ->where('treatment_record_procedure_id', $procedure_id)
        ->update([
            'patient_amount_paid'    => $amount_paid,
            'payment_method_type'    => $payment_type,
            ]);

        $updateProcedure =  DB::table('patients_treatment_record_procedures')
        ->where('id', $procedure_id)
        ->update([
            'treatment_procedure'    => $treatment_procedure,
            'tooth_number'           => $tooth_number,
            'recall_date'           => $recall_date,
            'recall_note'           => $recall_note,
            'amount_charged'         => $amount_charged,
            'amount_paid'            => $amount_paid,
            'amount_paid_note'       => $amount_paid_note,
            'balance'                => $balance,
            ]);
        return response()->json(['success'=>'Procedure successfully updated!']);
     }

     public function saveEditFile(Request $request) {
        // $date                = (() ? : )$_GET['date'];
        $file_id        = $_GET['file_id'];
        $name = (($_GET['fileName']) ?  $_GET['fileName'] : '');


        $updateProcedure =  DB::table('files')
        ->where('id', $file_id)
        ->update([
            'name'    => $name,
            ]);
        return response()->json(['success'=>'File successfully updated!']);
     }
     
     public function removeFile($file_id) { 
        $delete =  DB::table('files')->where('id', '=', $file_id)->delete();
        return response()->json(['success'=>'File successfully deleted!']);
     }

    public function updatePatientRecords($birthDate) { 
        $birthDate = str_replace("-","/",$birthDate);

        $date = DateTime::createFromFormat('m/d/Y', $birthDate); // Parse the original date
        // $newFormatDate = $date->format('d/m/Y'); // Format it to the new dd/mm/yyyy format


        date_default_timezone_set("Asia/Manila");
        $patientDataInfoUpdate =  DB::table('patients')
            ->where('id', $_POST['patient_id'])
            ->update([
                'firstName'     =>  $_POST['firstName'],
                'lastName'     =>  $_POST['lastName'],
                'middleName'     =>  $_POST['middleName'],
                'nickName'     =>  $_POST['nickName'],
                'birthDate'      =>   $birthDate,
                'address'      =>   $_POST['address'],
                'age'          =>  $_POST['age'],
                'sex'          =>  $_POST['sex'],
                'status'       =>  ((isset($_POST['status']) ? $_POST['status'] : "")),
                'mobile'       =>  $_POST['mobile'],
                'occupation'   =>  $_POST['occupation'],
                'referredBy'   =>  $_POST['referredBy'],
                'emergency'            =>  $_POST['emergency'],
                'relationship'         =>  $_POST['relationship'],
                'emergencyMobileNo' =>  $_POST['emergencyMobileNo'],
                // 'emergencyMobileNo'    =>  $_GET['emergencyMobileNo'],
                'signatureLink' =>  $_POST['signatureLink'],
                'updated_at'    => date("Y-m-d H:i:s")
                ]);

                $_POST['signatureLink'] = "";

                $patientDataoUpdate =  DB::table('patients')
                ->where('id', $_POST['patient_id'])
                ->update([
                'patientData'          => serialize($_POST),
                'updated_at'    => date("Y-m-d H:i:s")
                ]);
      
            
         return response()->json(['success'=>'Form is successfully submitted!']);
     }

    public function storePatientRecordTreatment(Request $request) { 

        date_default_timezone_set("Asia/Manila");
        $c = new PatientsTreatmentRecord();
        $c->date         = $_POST['date'];
        $c->patient_id   = $_POST['patient_id'];
        $c->drawing_link = $_POST['drawingLink'];
        $c->save();


 
        $newDate = date("Y-m-d", strtotime($_POST['date']));  

        $updateUpdated_at =  DB::table('patients')
        ->where('id', $_POST['patient_id'])
        ->update([
            'updated_at'    => date("Y-m-d H:i:s"),
            ]);
        // $procedure = array($_GET['procedure']);
        $latest = DB::table('patients_treatment_records')->orderBy('id', 'DESC')->first();
       foreach($_POST['procedure']  as $key => $data) {

            if(isset($_POST['recall_date'][$key])) {
                $recallDate = str_replace("/","-",$_POST['recall_date'][$key]   );
            } else {
                $dateNow= date('m-d-Y');
                $recallDate = date('m-d-Y', strtotime($dateNow. ' + 7 months'));
            }
        


           
           if(isset($_POST['amount-charged'][$key]) &&  isset($_POST['amount-paid'][$key])) {
            $amount_charged = filter_var( str_replace(",", "", $_POST['amount-charged'][$key]), FILTER_SANITIZE_NUMBER_INT);
            $amount_paid = filter_var( str_replace(",", "", $_POST['amount-paid'][$key]), FILTER_SANITIZE_NUMBER_INT);
            $balance = filter_var( str_replace(",", "", $_POST['balance'][$key]), FILTER_SANITIZE_NUMBER_INT);
            $cp = new PatientsTreatmentRecordProcedure();
            $cp->patients_treatment_record_id 	= $latest->id;
            $cp->treatment_procedure 	        = preg_replace("/\n/","",$_POST['procedure'][$key]);
            $cp->tooth_number 	                = preg_replace("/\n/","",$_POST['toothNo'][$key]);
            $cp->amount_charged 	            = (($amount_charged > '0' )? $amount_charged: 0);
            $cp->amount_paid 	                = (($amount_paid > '0')? $amount_paid : 0);
            $cp->amount_paid_note 	            = $_POST['amount-paid-note'][$key];
            $cp->recall_date 	                = $recallDate;
            $cp->recall_note 	                = ((isset($_POST['recallNote'][$key])) ? $_POST['recallNote'][$key] : "");
            $cp->balance 	                    = (($balance > '0')? $balance : 0);
            $cp->updated_at                     = date("Y-m-d H:i:s");
            $cp->save();
           } 
           
           if(Auth::user()->type == 2) {
                if($_POST['procedure'][$key] !== '') {
                    $cp = new PatientsTreatmentRecordProcedure();
                    $cp->patients_treatment_record_id 	= $latest->id;
                    $cp->treatment_procedure 	        = $_POST['procedure'][$key];
                    $cp->tooth_number 	                = $_POST['toothNo'][$key];
                    $cp->recall_date 	                = $recallDate;
                    $cp->recall_note 	                = ((isset($_POST['recallNote'][$key])) ? $_POST['recallNote'][$key] : "");
                    $cp->updated_at                     = date("Y-m-d H:i:s");
                    $cp->save();
               }
           }
        $latestTreatment = DB::table('patients_treatment_record_procedures')->orderBy('id', 'DESC')->first();
         
           if(isset($_POST['amount-paid'][$key])) {
                $s = new PatientPaymentMethodRecord();
                $s->patient_id                      =  $_POST['patient_id'];
                $s->record_id                       =   $latest->id;
                $s->treatment_record_procedure_id   =  $latestTreatment->id;
                $s->date                            =  $newDate;
                $s->patient_amount_paid            =  (($amount_paid !== '') ? $amount_paid : '0');
                $s->payment_method_type             =  $_POST['payment_type'][$key];
                $s->save();
            } else {
                if($key == '0' && Auth::user()->type == '2') {
                    $s = new PatientPaymentMethodRecord();
                    $s->patient_id                      =  $_POST['patient_id'];
                    $s->record_id                       =   $latest->id;
                    $s->treatment_record_procedure_id   =  $latestTreatment->id;
                    $s->date                            =  $newDate;
                    $s->patient_amount_paid            =  '0';
                    $s->payment_method_type             =  'cash';
                    $s->save();
                }
            }


  
       }
     
       return response()->json(['success'=>'successs', 'message' => 'Treatment record successfully added!']);
     }

     public function viewDrawing($drawing_id){

        $drawing = DB::table('patients_treatment_records')->where('id', '=', $drawing_id)
        ->get();
       return response()->json(['drawing'=> $drawing[0]]);
     }

     
     public function savePatientSignRecord($treatment_id){
         $section = $_POST['section'];
         $signature_link = $_POST['drawingLink'];
         $drawingLink = $_POST['drawingLink'];

         define('UPLOAD_DIR', 'assets/files/patient-signature/');
         $image_parts = explode(";base64,",$drawingLink);
         $image_type_aux = explode("image/", $image_parts[0]);
         $image_type = $image_type_aux[1];
         $image_base64 = base64_decode($image_parts[1]);
         $file = UPLOAD_DIR . uniqid() .$treatment_id. '.png';
         file_put_contents($file, $image_base64);

         if($section == 1) {
            $sec = "treatment_procedure_patient_signature";
        } else if ($section == 2) {
            $sec = "amount_paid_patient_signature";
        } else if ($section == 3) {
            $sec = "balance_patient_signature";
        } else if ($section == 4) {
            $getTreatmetId = DB::table('patients_treatment_record_procedures')
            ->where('id', '=', $treatment_id)
            ->get(); 

            $treatment_record_id = $getTreatmetId[0]->patients_treatment_record_id;
            $saveSignature =  DB::table('patients_treatment_records')
            ->where('id', $treatment_record_id)
            ->update([
                'amount_paid_total_patient_signature'    => '/'.$file,
             ]);

        }
       
        if($section !== '4') {
            $saveSignature =  DB::table('patients_treatment_record_procedures')
            ->where('id', $treatment_id)
            ->update([
                $sec    => '/'.$file,
             ]);
        }
      
     }

     public function viewPatientSignRecord($treatment_id){
        $section = $_POST['section'];

       $getSigLink = DB::table('patients_treatment_record_procedures')
        ->where('id', '=', $treatment_id)
        ->get();
        if($section == 1) {
           $sigLink = $getSigLink[0]->treatment_procedure_patient_signature;
        } else if ($section == 2) {
           $sigLink = $getSigLink[0]->amount_paid_patient_signature;
        } else if ($section == 3) {
           $sigLink = $getSigLink[0]->balance_patient_signature;
        } else if ($section == 4) {
            $getTreatmetId = DB::table('patients_treatment_record_procedures')
            ->where('id', '=', $treatment_id)
            ->get(); 

            $treatment_record_id = $getTreatmetId[0]->patients_treatment_record_id;
            $getSigLink = DB::table('patients_treatment_records')
            ->where('id', '=', $treatment_record_id)
            ->get();
            $sigLink = $getSigLink[0]->amount_paid_total_patient_signature;

        }
        
        $sigDate = $getSigLink[0]->updated_at;
        $sigDate = date('F d, Y', strtotime($sigDate));
      
    return response()->json(['sigLink'=> $sigLink, 'sigDate' => $sigDate]);
        
    }

    public function getConsentData(Request $request){
        $type = $_GET['type'];
        $patientDataInfo = DB::table('patients')
        ->where('id', '=', $_GET['patient_id'])
        ->get();

        if($type == 'kinnie-funt') {
            $consentData = unserialize($patientDataInfo[0]->consentDataKinnie);
            $kinnieHead = $patientDataInfo[0]->consentDataKinnieHeadImage;
            $kinnieBody = $patientDataInfo[0]->consentDataKinnieHeadImage;
            if($consentData == "") {
                $consentData[$type][0] = array();
            }
        } else if($type == 'downpayment-and-scheduling-policy') {
            $consentData = unserialize($patientDataInfo[0]->concentDataDownpayment);
            $kinnieHead = array();
            $kinnieBody = array();
            if($consentData == "") {
                $consentData[$type][0] = array();
            }
        } else {
            $consentData = unserialize($patientDataInfo[0]->consentDataTmj);
            $kinnieHead = array();
            $kinnieBody = array();
        }
  return response()->json(['consentData'=> $consentData[$type][0], 'kinnieHead' => $kinnieHead, 'kinnieBody' => $kinnieBody] );
    }



    public function emailContentApp()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-email-content', ['pageConfigs' => $pageConfigs]);
    }
    public function chatApp()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-chat', ['pageConfigs' => $pageConfigs]);
    }
    public function todoApp()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-todo', ['pageConfigs' => $pageConfigs]);
    }
    public function kanbanApp()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page menu-collapse'];
        return view('pages.app-kanban', ['pageConfigs' => $pageConfigs]);
    }
    public function fileManagerApp()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-file-manager', ['pageConfigs' => $pageConfigs]);
    }
    public function contactApp()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-contacts', ['pageConfigs' => $pageConfigs]);
    }
    public function calendarApp()
    {
        // Breadcrumbs
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "App"], ['name' => "Calendar"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];

        return view('pages.app-calendar', ['breadcrumbs' => $breadcrumbs], ['pageConfigs' => $pageConfigs]);
    }
    public function invoiceList()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-invoice-list', ['pageConfigs' => $pageConfigs]);
    }
    public function invoiceView()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-invoice-view', ['pageConfigs' => $pageConfigs]);
    }
    public function invoiceEdit()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-invoice-edit', ['pageConfigs' => $pageConfigs]);
    }
    public function invoiceAdd()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-invoice-add', ['pageConfigs' => $pageConfigs]);
    }
    public function ecommerceProduct()
    {
        // Breadcrumbs
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javacript:void(0)", 'name' => "App"], ['name' => "eCommerce Products Page"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];

        return view('pages.eCommerce-products-page', ['breadcrumbs' => $breadcrumbs], ['pageConfigs' => $pageConfigs]);
    }
    public function eCommercePricing()
    { // Breadcrumbs
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javacript:void(0)", 'name' => "eCommerce"], ['name' => "eCommerce Pricing"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];

        return view('pages.eCommerce-pricing', ['breadcrumbs' => $breadcrumbs], ['pageConfigs' => $pageConfigs]);
    }
}
