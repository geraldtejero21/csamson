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
use DB;
use App\Models\File;
use Auth;
use Image;
use Intervention\Image\ImageManager;

class PdfController extends Controller
{
  private $imageManager;

  public function __construct(
    ImageManager $imageManager
  ){
    $this->imageManager = $imageManager;
  }

  public function createPdf($patient_id){

    $patient_id = $_POST['consent_patient_id'];
    $consent_type = $_POST['consent_type'];
    $html = $_POST['html'];
    $patientDataInfo = DB::table('patients')->where('id', '=',$patient_id)
    ->get();

    if($_POST['consent_type'] == 'kinnie-funt') {
        
      define('UPLOAD_DIR', 'assets/files/kinnie-funt-drawing/');
      $drawingLink1 =  $_POST['image_1'];
      if( $_POST['image_1'] !== "") {
          $image_parts = explode(";base64,",$drawingLink1);
          $image_type_aux = explode("image/", $image_parts[1]);
          $image_type = $image_type_aux[0];
          $image_base64 = base64_decode($image_parts[1]);
          $file = UPLOAD_DIR . uniqid() .$patient_id. '.png';
          file_put_contents($file, $image_base64);
    
          $getHead = DB::table('patients')->where('id', '=', $patientDataInfo[0]->id)
          ->get();
          $image1 = $getHead[0]->consentDataKinnieHeadImage;
          $image2 = $file;
          $img_left_local = $image1;
          $img_right_local = $image2 ;
          $img_canvas = $this->imageManager->canvas(600,600);
          $img_canvas->insert(Image::make($img_right_local), 'top-left', 400, 0); 
          $img_canvas->insert($this->imageManager->make($img_left_local), 'top-left');
          $img_canvas->insert($this->imageManager->make($img_right_local), 'top-left', 0, 0); // move second image 400 px from left
          $filename = "assets/files/kinnie-funt-drawing/merged/".uniqid() .$patient_id. ".png";
          $img_canvas->save(public_path()."/". $filename, 100);
          $saveHead =  DB::table('patients')
          ->where('id', $patientDataInfo[0]->id)
          ->update([
              'consentDataKinnieHeadImage'    => $filename,
           ]);
           
      }
        //   $pattern = "#<div id=\"the-head(.*?)\">(.+?)</div>#s";
        //   $replacement = '<div id="the-head" class="sign-area head signature head-draw" style="margin-top: 42px;height:300px;width: 300px;background-repeat: no-repeat;background-size: contain;position:relative;">
        //   <img src="'.$_POST['image_1'].'" style="width: 300px;height: 300px;padding: 4px;display: block;position: absolute;text-align: center;">
        //   </div>';
        // $html = preg_replace($pattern, $replacement, $html);



      $drawingLink2 =  $_POST['image_2'];
      if( $_POST['image_2'] !== "") {
          $image_parts = explode(";base64,",$drawingLink2);
          $image_type_aux = explode("image/", $image_parts[1]);
          $image_type = $image_type_aux[0];
          $image_base64 = base64_decode($image_parts[1]);
          $file = UPLOAD_DIR . uniqid() .$patient_id. '.png';
          file_put_contents($file, $image_base64);

          $getBody = DB::table('patients')->where('id', '=', $patientDataInfo[0]->id)
          ->get();
          $image1 = $getBody[0]->consentDataKinnieBodyImage;
          $image2 = $file;
          $img_left_local = $image1;
          $img_right_local = $image2 ;
          $img_canvas = $this->imageManager->canvas(615,820);
          $img_canvas->insert(Image::make($img_right_local), 'top-left', 400, 0); 
          $img_canvas->insert($this->imageManager->make($img_left_local), 'top-left');
          $img_canvas->insert($this->imageManager->make($img_right_local), 'top-left', 0, 0); // move second image 400 px from left
          $filename2 = "assets/files/kinnie-funt-drawing/merged/".uniqid() .$patient_id. ".png";
          $img_canvas->save(public_path()."/". $filename2, 100);
          $saveHead =  DB::table('patients')
          ->where('id', $patientDataInfo[0]->id)
          ->update([
              'consentDataKinnieBodyImage'    => $filename2,
           ]);

        //    $pattern = "#<div id=\"the-body(.*?)\">(.+?)</div>#s";
        //    $replacement = '<div id="the-head" class="sign-area body signature body-draw" style="text-align: center;margin: 18px auto 0 auto;height: 719px;background-image: url("https://sagundentalclinic.com/assets/files/kinnie-funt-drawing/body-draw-portrait.jpg");background-repeat: no-repeat;background-size: contain;position:relative;background-position: center;">
        //    <img src="'.$_POST['image_2'].'" style="text-align: center;height: 596px;width:595px;">
        //    </div>';
        //  $html = preg_replace($pattern, $replacement, $html);

      }
      $consentkinnie = array();
      $inputArray = array($_POST);
      unset($inputArray[0]['html']);
      unset($inputArray[0]['_token']);
      unset($inputArray[0]['consent_patient_id']);
  
      foreach ($inputArray as $post) {
       $consentkinnie[$post['consent_type']][] = $post;
      }

      $patienConsentLink =  DB::table('patients')
      ->where('id', $patient_id)
      ->update([
          'updated_at'    => date("Y-m-d H:i:s"),
          'consentDataKinnie'    => ((isset($consentkinnie))?  serialize($consentkinnie) : NULL),
          ]);
      

       $html = str_replace('input type="checkbox" class="kinnie-checkbox" value="true"','img src="assets/images/sagun-check.png" style="width: 10px;"',$html);
    } 



    
    foreach($patientDataInfo as $data) {
      $fullName = $data->firstName." ".$data->middleName." ".$data->lastName;
      $patient_id = $data->id;
    }
    if($consent_type == 'kinnie-funt') {
      $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4',
        'orientation' => 'L',
    ]);
    } else {
      $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4',
        'orientation' => 'P',
    ]);
    }
 
    
    if($_POST['consent_type'] == 'contract-for-tmj') {
      $consenttmj = array();
      $inputArray = array($_POST);
      unset($inputArray[0]['html']);
      unset($inputArray[0]['_token']);
      unset($inputArray[0]['consent_patient_id']);
  
      foreach ($inputArray as $post) {
       $consenttmj[$post['consent_type']][] = $post;
      }
      $patienConsentLink =  DB::table('patients')
      ->where('id', $patient_id)
      ->update([
          'updated_at'    => date("Y-m-d H:i:s"),
          'consentDataTmj'    => ((isset($consenttmj))?  serialize($consenttmj) : NULL),
          ]);
      
    }

 

    if($_POST['consent_type'] == 'downpayment-and-scheduling-policy') {
      $consentdp = array();
      $inputArray = array($_POST);
      unset($inputArray[0]['html']);
      unset($inputArray[0]['_token']);
      unset($inputArray[0]['consent_patient_id']);
  
      foreach ($inputArray as $post) {
       $consentdp[$post['consent_type']][] = $post;
      }
      $patienConsentLink =  DB::table('patients')
      ->where('id', $patient_id)
      ->update([
          'updated_at'    => date("Y-m-d H:i:s"),
          'concentDataDownpayment'    => ((isset($consentdp))?  serialize($consentdp) : NULL),
          ]);
      
    }
   
  
      // $mpdf->showImageErrors = true;
      $mpdf->WriteHTML($html);
     
      
    //   $fileName = str_replace(" ", "_", $fullName).$patient_id.'-'.date("m-d-y").'-'.$consent_type;
       $fileName = str_replace(" ", "_", $fullName).uniqid().$patient_id.'-'.date("m-d-y").'-'.$consent_type;
      $mpdf->Output("assets/files/".$fileName.".pdf");

      $l = new PatientConsentlink();
      $l->patient_id = $patient_id;
      $l->type 	= $consent_type;
      $l->link 	= $fileName.".pdf";
      $l->updated_at =  date("Y-m-d H:i:s");
      $l->save();
       return response()->json(['status' => 'complete']);


  }

  public function fileUpload(Request $req){

   }

   public function viewFile($file_id){

   }

}