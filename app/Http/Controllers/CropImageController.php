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



class CropImageController extends Controller
{
   
    public function index()
    {
      $pageConfigs = ['bodyCustomClass' => 'app-page'];
      return view('pages.croppie', ['pageConfigs' => $pageConfigs]);
    }
   
    public function uploadCropImage(Request $request)
    {
      date_default_timezone_set("Asia/Manila");

        $image = $request->image;
        $patient_id = $request->patient_id;

        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
      
        $path = 'assets' . "/" . 'files' . "/" . 'uploads' . "/"  . 'picture' . "/" . $image_name;
        file_put_contents($path, $image);

        $updateProfilePic =  DB::table('patients')
        ->where('id', $patient_id)
        ->update([
            'profilePictureLink'    =>  "/".$path,
            'updated_at'    => date("Y-m-d H:i:s"),
         ]);

       return response()->json(['status'=>true]);
    }
}



