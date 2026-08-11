<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Contact;
use App\Models\User;
use App\Models\Patient;
use App\Models\PatientsTreatmentRecord;
use App\Models\PatientsTreatmentRecordProcedure;
use App\Models\DailyExpense;
use App\Models\MonthlySubscription;
use DB;
use App\Models\File;
use Auth;
use Redirect;
 use Carbon;
class MonthlySubscriptionController extends Controller
{

  public function showsubscription(){
    date_default_timezone_set("Asia/Manila");
    if(!Auth::check()) 
    {
        return Redirect::to('login');
    }
    $breadcrumbs = [
      ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Patient"], ['name' => "Add patient"],];
    $patientDataInfo = DB::table('patients')->where('id', '=', 1)
    ->get();
    return view('pages.monthly-subscription-list', ['breadcrumbs' => $breadcrumbs]);
  }

  public function listSubscription($date){

    $subscriptionData  =DB::table('monthly_subscriptions')
    ->get();
    $exnum = 1;
    $subscriptionHtml = array();
    $subscriptionHtml[] ='<thead style="background: #dd5699;"><tr><th style="padding: 10px;" colspan="6"><span style="margin-left: 2px;color: white;padding-left: 4px;"><strong> MONTHLY SUBSCRIPTION PAYMENT RECORD</strong></span> </th>'.((Auth::user()->type == '0') ? '<th colspan="1" style="width: 86px;"><a href="#modal-add-subscription" class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 float-right modal-trigger"><i class="material-icons">add</i></a></th>' : '').((Auth::user()->type == '0') ? '<th></th>' : '').'</tr></thead>';
    $subscriptionHtml[] ='<tr><td></td><td><strong>Month</strong></td><td><strong>Year</strong></td><td><strong>Note</strong></td><td><strong>Amount</strong></td><td><strong>Status</strong></td></tr>';
    foreach($subscriptionData as $data) {
      $subscriptionHtml[] ='<tr><td class="p-0 pl-1" style="width: 10px"><span class="btn-actions" style=""><a class="btn-floating action-btn mb-1 btn-xsmall waves-effect waves-light pr-1 d-none" onclick="modifyExpense('.$data->id.')"><i class="material-icons">edit</i></a>&nbsp; &nbsp;</span></td><td style="width: 100px;">'.$exnum.'. '.$data->month.'</td><td>'.$data->year.'</td><td>'.$data->note.'</td><td  style="text-align: left;"><Span style="padding-left: 28px;">'.number_format($data->amount).'</span></td><td style="text-align: center;">'.(($data->status == "1") ? '<span class="payment-note" style="background-color: green;"><strong>PAID</strong></span>' : '').(($data->status == "0") ? ((Auth::user()->type == '1') ? '<a href="'.$data->link.'"><span class="payment-note" style="background-color: orange;padding: 4px;"><strong>PAY NOW</strong></span></a>' : '-') : '').'</td>'.((Auth::user()->type == '0' && $data->status == '0') ?'<td><span class="payment-note" style="background-color: red;padding: 4px;" onclick="completeSubscription('.$data->id.')"><strong>Complete</strong></span></a></td>': '' ).'</tr>';
      $exnum++;
    }
    $subscriptionHtml[] ='</tbody>';


   return response()->json(['subscriptionHtml' => $subscriptionHtml, 'userType' => Auth::user()->type]);

  }

  public function saveSubscription(){
    $c = new MonthlySubscription();
    $c->month   = $_GET['month'];
    $c->year   = $_GET['year'];
    $c->amount = $_GET['amount'];
    $c->link = $_GET['link'];
    $c->note = $_GET['note'];
    $c->save();
   return response()->json(['status' => 'success']);
  }

  public function completeSubscription($id){
    $updateUpdated_at =  DB::table('monthly_subscriptions')
    ->where('id', $id)
    ->update([
        'status'    => '1',
        ]);
   return response()->json(['status' => 'success']);
  }


  
}