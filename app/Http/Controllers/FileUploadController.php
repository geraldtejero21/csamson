<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Contact;
use App\Models\User;
use App\Models\Patient;
use App\Models\PatientsTreatmentRecord;
use App\Models\PatientsTreatmentRecordProcedure;
use DB;
use App\Models\File;
use Auth;

class FileUploadController extends Controller
{
  public function createForm(){
    return view('file-upload');
  }

  public function fileUpload(Request $req){
    $singleFile = array();
    $i = 0;
    foreach($_FILES[ 'file' ]['name'] as $file ) {
      $singleFile['file'][]= $file;
      $i++;
    }
    foreach($_FILES[ 'file']['tmp_name'] as $temp ) {
      $singleFile['temp'][] = $temp;
    }


     $allFiles = array();
    $total = count($_FILES['file']['name']);

    // Loop through each file
    for( $i=0 ; $i < $total ; $i++ ) {
      $allFiles[$total][] = array(
        'filename' => $singleFile['file'][$i],
        'temp' => $singleFile['temp'][$i],
      );
    }
    $getFiles = array();  
    foreach($allFiles as $file) {
    foreach($file as $f)  {
      $fileName = time().$f["filename"];
      $getFiles[] = $fileName;
    move_uploaded_file( $f['temp'], "./assets/files/uploads/".$fileName);

      }
    }
    $fileModel = new File;
    $fileModel->name = $_POST['name'];
    $fileModel->file_path = serialize($getFiles);
    $fileModel->patient_id = $_POST['patient_id'];
    $fileModel->save();
      if($_POST['upload_location'] == 'modal') {
        return redirect('/patient-records/?upload_status=1');
      } else {
        return redirect('/patient/'.$_POST['patient_id'].'?upload_status=1');
      }



    // if ( !empty( $_FILES ) ) {

    //   $fileName = time().$_FILES[ 'file' ][ 'name'];
    //   $tempPath =   $_FILES[ 'file' ][ 'tmp_name' ];
    //   $uploadPathT = 'assets' . "/" . 'files' . "/" . 'uploads' . "/" . $fileName;

    //   move_uploaded_file( $tempPath, $uploadPathT );

    //   $fileModel = new File;
    //   $fileModel->name = $_POST['name'];
    //   $fileModel->file_path = "/assets/files/uploads/".$fileName;
    //   $fileModel->patient_id = $_POST['patient_id'];
    //   $fileModel->save();
    //     if($_POST['upload_location'] == 'modal') {
    //       return redirect('/patient-records/?upload_status=1');
    //     } else {
    //       return redirect('/patient/'.$_POST['patient_id'].'?upload_status=1');
    //    }
    //   }
   }


   public function uploadFile($tempPath, $uploadPathT) {
  }
   public function viewFile($file_id){

      $Files = DB::table('files')->where('id', '=', $file_id)
      ->get();
      // if($file_id <= 444) {
      //   $fileSingle = $Files[0]->file_path;
      //   $viewFilesHtml[] = "<li><img src='".$fileSingle."' style='width: 100%;'></li>";

      // } else {
      $files = unserialize($Files[0]->file_path);

      foreach($files as $file) {
        $viewFilesHtml[] = "<li> <div class='geeks'><img src='/assets/files/uploads/".$file."' style='width: 100%;'></div></li>";
      }
      // }
      


     return response()->json(['viewFilesHtml'=> $viewFilesHtml]);
   }

   public function createPictureForm(){
    return view('picture-upload');
  }

  public function pictureUpload(Request $req){
    if ( !empty( $_FILES ) ) {

      $pictureName = time().$_FILES[ 'file' ][ 'name'];
      $tempPath =   $_FILES[ 'file' ][ 'tmp_name' ];
      $uploadPathT = 'assets' . "/" . 'files' . "/" . 'uploads' . "/"  . 'picture' . "/" . $pictureName;

      move_uploaded_file( $tempPath, $uploadPathT );

      $updateUpdated_at =  DB::table('patients')
      ->where('id', $_POST['patient_id'])
      ->update([
       
          'profilePictureLink'    =>  "/".$uploadPathT,
          'updated_at'    => date("Y-m-d H:i:s"),
       ]);

      // $fileModel = new File;
      // $fileModel->name = $_POST['name'];
      // $fileModel->file_path = "/assets/files/uploads/picture/".$pictureName;
      // $fileModel->patient_id = $_POST['patient_id'];
      // $fileModel->save();
       if($_POST['upload_location'] == 'modal') {
        return redirect('/patient-records/?upload_status=1');
       } else {
        return redirect('/patient/'.$_POST['patient_id'].'?upload_status=1');
       }

      }
   }

   public function viewPicture($picture_id){

      $Files = DB::table('files')->where('id', '=', $picture_id)
      ->get();
     return response()->json(['files'=> $Files[0]]);
   }

}