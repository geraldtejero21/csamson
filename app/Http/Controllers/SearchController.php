<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Contact;
use App\Models\User;
use App\Models\Patient;
use App\Models\PatientsTreatmentRecord;
use DB;
class SearchController extends Controller
{
    public function emailApp()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-email', ['pageConfigs' => $pageConfigs]);
    }

    public function showSearch($key_word)
    {
        $result = DB::table('patients') ->where('record_status', '=', 1)
                ->where('firstName','LIKE','%'.$key_word.'%')
                ->orWhere('lastName','LIKE','%'.$key_word.'%')
                ->orWhere('mobile','LIKE','%'.$key_word.'%')
               
                ->get();

                $search_html[] ='<li><a class="collection-item" href="#"><h6 class="search-title">PATIENTS</h6></a></li>';
        foreach($result as $data) {

        $search_html[] ='<li class="auto-suggestion d-result">
            <a class="collection-item" href="/patient/'.$data->id.'">
              <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                  <div class="member-info display-flex flex-column">
                    <span class="black-text">'.$data->firstName.' '.$data->lastName.'</span>
                    <small class="grey-text">'.$data->mobile.'</small>
                  </div>
                </div>
              </div>
            </a>
          </li>';   
        }
       
        return response()->json(['success'=> true, 'search_html'=>$search_html]);

    }

    public function showSearchSuggest()
    {

        $result = DB::table('patients')->orderBy('updated_at', 'desc')->where('record_status', '=', 1)->take(5)->get();



                $search_html[] ='<li><a class="collection-item" href="#"><h6 class="search-title">PATIENTS</h6></a></li>';
        foreach($result as $data) {

        $search_html[] ='<li class="auto-suggestion d-result">
            <a class="collection-item" href="/patient/'.$data->id.'">
              <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                 
                  <div class="member-info display-flex flex-column">
                    <span class="black-text">'.$data->firstName.' '.$data->lastName.'</span>
                    <small class="grey-text">'.$data->mobile.'</small>
                  </div>
                </div>
              </div>
            </a>
          </li>';   
        }
       
        return response()->json(['success'=> true, 'search_html'=>$search_html]);

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
    public function addPatient()
    {
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Patient"], ['name' => "Add patient"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];

        return view('pages.patient-add-form', ['breadcrumbs' => $breadcrumbs], ['pageConfigs' => $pageConfigs]);
    }
    
    public function showPatient($id)
    {
        $patientDataInfo = DB::table('patients')->where('id', '=', $id)
        ->get();
        foreach($patientDataInfo as $data) {
            $patientData = unserialize($data->patientData);
            if(isset($data->signatureLink)) {
                $signatureLink = $data->signatureLink;
            } else {
                $signatureLink = "signa.png";
            }

        }

        $patientTreatmentData = DB::table('patients_treatment_records')->where('patient_id', '=', $id)
        ->get();
        $treatHtml[] = "<tr style='background: #dd5699;color: white;border: 2px solid #dd5699;font-weight: 800;'><th>Date</th><th>Procedure</th><th>Amount Charged</th><th>Amount Paid</th><th>Balance</th></tr>";
        foreach($patientTreatmentData as $treatData ) {
            $treatHtml[] = "<tr><td><b>".$treatData->date."</b></td><td><strong>".$treatData->treatment_procedure."</strong></td><td>".$treatData->amount_charged."</td><td>".$treatData->amount_paid."</td><td>BLANCE</td></tr>";
        }
    
        if(!(isset($treatHtml)) ) {
            $treatHtml[] = "<tr><td></td><td></td><td></td><td></td><td></td></tr>";
        }
        
        return response()->json(['patient_id'=> $id, 'patientDataInfo' => $patientDataInfo, 'patientData' => $patientData, 'treatHtml' => $treatHtml, 'signatureLink' => $signatureLink]);
    }


    public function editPatient($id)
    {
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Patient"], ['name' => "Add patient"],
        ];
        $patientDataInfo = DB::table('patients')->where('id', '=', $id)
        ->get();
        
        return view('pages.patient-edit-form', ['breadcrumbs' => $breadcrumbs, 'patient_id'=> $id, 'patientDataInfo' => $patientDataInfo]);

    }

    public function storePatientRecords(Request $request) { 
       $c = new Patient();
       $c->fullName = $_GET['fullName'];
       $c->address 	= $_GET['address'];
       $c->age 	= $_GET['age'];
       $c->sex 	= $_GET['sex'];
       $c->status = $_GET['status'];
       $c->mobile = $_GET['mobile'];
       $c->occupation = $_GET['occupation'];
       $c->company = $_GET['company'];
       $c->referredBy = $_GET['referredBy'];
       $c->emergency = $_GET['emergency'];
       $c->relationship = $_GET['relationship'];
       $c->emergencyTelephoneNo = $_GET['emergencyTelephoneNo'];
       $c->emergencyMobileNo = $_GET['emergencyMobileNo'];
       $c->signatureLink = $_GET['signatureLink'];
       $c->patientData = serialize($_GET);
       $c->save();
        return response()->json(['success'=>'Form is successfully submitted!']);
    }

    public function updatePatientRecords(Request $request) { 

        // $c = new Patient();
        // $c->fullName = $_GET['fullName'];
        // $c->address 	= $_GET['address'];
        // $c->age 	= $_GET['age'];
        // $c->sex 	= $_GET['sex'];
        // $c->status = $_GET['status'];
        // $c->mobile = $_GET['mobile'];
        // $c->occupation = $_GET['occupation'];
        // $c->referredBy = $_GET['referredBy'];
        // $c->emergency = $_GET['emergency'];
        // $c->relationship = $_GET['relationship'];
        // $c->emergencyTelephoneNo = $_GET['emergencyTelephoneNo'];
        // $c->emergencyMobileNo = $_GET['emergencyMobileNo'];
        // $c->patientData = serialize($_GET);

        $patientDataInfoUpdate =  DB::table('patients')
            ->where('id', $_GET['patient_id'])
            ->update([
                'fullName' =>  $_GET['fullName'],
                'address'  =>   $_GET['address'],
                'age'      =>  $_GET['age'],
                'sex'       =>  $_GET['sex'],
                'status' =>  $_GET['status'],
                'mobile' =>  $_GET['mobile'],
                'occupation' =>  $_GET['occupation'],
                'referredBy' =>  $_GET['referredBy'],
                'emergency' =>  $_GET['emergency'],
                'relationship' =>  $_GET['relationship'],
                'emergencyTelephoneNo' =>  $_GET['emergencyTelephoneNo'],
                'emergencyMobileNo' =>  $_GET['emergencyMobileNo'],
                ]);

            
         return response()->json(['success'=>'Form is successfully submitted!']);
     }

    public function storePatientRecordTreatment(Request $request) { 
        $c = new PatientsTreatmentRecord();
        $c->date = $_GET['date'];
        $c->treatment_procedure 	= $_GET['procedure'];
        $c->amount_charged 	= $_GET['amount-charged'];
        $c->amount_paid 	= $_GET['amount-paid'];
        $c->patient_id = $_GET['patient_id'];
        $c->save();
         return response()->json(['success'=>'successs', 'message' => 'Treatment record successfully added!']);
     }


}
