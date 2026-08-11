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
use DB;
use App\Models\File;
use Auth;
use Redirect;

class SalesReportController extends Controller
{

  public function showSalesReport(){
    date_default_timezone_set("Asia/Manila");
    if(!Auth::check()) 
    {
        return Redirect::to('login');
    }
    $breadcrumbs = [
      ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Patient"], ['name' => "Add patient"],];
    $patientDataInfo = DB::table('patients')->where('id', '=', 1)
    ->get();
    return view('pages.sales-report-list', ['breadcrumbs' => $breadcrumbs, 'patient_id'=> 1]);
  }

  public function listSalesReport($date){
    date_default_timezone_set("Asia/Manila");
    if(!Auth::check()) 
    {
        return Redirect::to('login');
    }
    if(isset($date)) {
      $date_selected = $date;
      $date_selected = str_replace('-', '/', $date_selected);
    } else {
      $date_selected = date("m/d/Y");
    }


    $patientTreatmentData  =DB::table('patient_payment_method_records')
    ->join('patients_treatment_records', 'patients_treatment_records.id', '=', 'patient_payment_method_records.record_id')
    ->join('patients_treatment_record_procedures', 'patients_treatment_record_procedures.id', '=', 'patient_payment_method_records.treatment_record_procedure_id')
    ->join('patients', 'patients.id', '=', 'patients_treatment_records.patient_id')
    ->select('patient_payment_method_records.date as date', 'patients_treatment_record_procedures.id as id','patients.fullName as fullName', 'patients_treatment_records.patient_id as patient_id', 'patient_payment_method_records.patient_amount_paid as patient_amount_paid', 'patients_treatment_record_procedures.treatment_procedure as treatment_procedure')
    ->where('patient_payment_method_records.date', '=', $date_selected)
    ->where('patient_payment_method_records.status', '=', 1)
    ->get();
    if(count($patientTreatmentData) == 0 ) {

      $patientTreatmentData =DB::table('patients_treatment_records')
        ->join('patients_treatment_record_procedures', 'patients_treatment_records.id', '=', 'patients_treatment_record_procedures.patients_treatment_record_id')
        ->join('patients', 'patients_treatment_records.patient_id', '=', 'patients.id')
        ->select('patients_treatment_records.date as date','patients_treatment_record_procedures.amount_charged as amount_charged','patients_treatment_record_procedures.amount_paid as amount_paid','patients_treatment_record_procedures.balance as balance', 'patients_treatment_record_procedures.amount_paid_note')
        ->where('patients_treatment_records.date', '=', $date_selected)
        ->where('patients.record_status', '=', 1)
        ->get();
        print_r($patientTreatmentData);
    }
       $grouped = $patientTreatmentData->groupBy('patient_id');

       $x = 0;
       $k = 0;
       $num = 1;
       $exnum = 1;
       $gnum = 1;
       $sum_paid = 0;
       $total = 0;
       $sec1 = 1;
       $sec2 = 2;
       $sec3 = 3;
       $value = array();
       $treatHtml[] ='<thead><tr><th style="width: 10px;padding: 0;"></th><th style="padding-left: 0;"><span><strong>PATIENT NAME</strong></span> </th><th><span><strong>PROCEDURE</strong></span></th><th style="width: 100px !important;"><strong>AMOUNT PAID</strong></th></tr></thead>';

       $treatHtml[] ='<tbody>';
        foreach($grouped as $key => $val) {
           foreach($val as $d) {
               $value[$x][] = $d;
           }
           $x++;
        }
       $treatment_procedure = array();

       foreach($value as $k => $da) {
        foreach($da as $d) {
          $treatment_procedure['procedure'][$k][] = $d->treatment_procedure;
        }
        $k++;
      }
        foreach($value as $k => $v) {
          
          foreach($treatment_procedure['procedure'][$k] as $t) {
            $treatment[$k][] = $t;
          }
          $sum_charged = 0;
          $sum_paid = 0;
          $sum_balance = 0;
          $note = array();
          foreach($v as $da) {
              //  $sum_charged += $da->amount_charged;
               $sum_paid += $da->patient_amount_paid;
              //  $note[] = $da->amount_paid_note;

              //  $sum_balance += $da->balance;
           }

           $total= $sum_charged +  $sum_paid;
           $treatHtml[] = "<tr style='height: 35px;'><td style='text-align: center;padding: 0 5px;'>". $num.".</td><td style='padding-left: 0;'><strong><a href='/patient/".$v[0]->patient_id."?#html-badges' style='color: black;'>".$v[0]->fullName."</a></strong></td><td>".nl2br(implode('<br>', $treatment[$k] ))."</td><td class='text-left' style='line-height: 1;'>".number_format($total) ."<div style='font-size: 9px;'>".implode(" ",$note)." &nbsp;</div></td></tr>";
           $treatHtml[] = "<tr>";


           $len = count($v);
           $y = 0;
           $sum_charged = 0;
           $sum_paid = 0;
           $num++;
       }

       $salesToday  =DB::table('patient_payment_method_records')
       ->join('patients_treatment_records', 'patients_treatment_records.id', '=', 'patient_payment_method_records.record_id')
       ->join('patients_treatment_record_procedures', 'patients_treatment_record_procedures.id', '=', 'patient_payment_method_records.treatment_record_procedure_id')
       ->join('patients', 'patients.id', '=', 'patients_treatment_records.patient_id')
       ->select('patient_payment_method_records.date as date', 'patients_treatment_record_procedures.id as id','patients.fullName as fullName', 'patients_treatment_records.patient_id as patient_id', 'patient_payment_method_records.patient_amount_paid as patient_amount_paid', 'patients_treatment_record_procedures.treatment_procedure as treatment_procedure')
       ->where('patient_payment_method_records.date', '=', $date_selected)
       ->where('patient_payment_method_records.status', '=', 1)
       ->get();
      $total_sales = 0;
      foreach($salesToday as $amount) {
       $total_sales+= $amount->patient_amount_paid;
      }
      if($total_sales == 0) {
        $salesToday =DB::table('patients_treatment_records')
        ->join('patients_treatment_record_procedures', 'patients_treatment_records.id', '=', 'patients_treatment_record_procedures.patients_treatment_record_id')
        ->join('patients', 'patients_treatment_records.patient_id', '=', 'patients.id')
        ->select('patients_treatment_records.date as date','patients_treatment_record_procedures.amount_charged as amount_charged','patients_treatment_record_procedures.amount_paid as amount_paid','patients_treatment_record_procedures.balance as balance', 'patients_treatment_record_procedures.amount_paid_note')
        ->where('patients_treatment_records.date', '=', $date_selected)
        ->where('patients.record_status', '=', 1)
        ->get();
        foreach($salesToday as $amount) {
          $total_sales+= $amount->amount_paid;
         }
      }

      $treatHtml[] ='<tr><td></td><td></td><td class="text-right">Total sales: </td><td style="font-size: 26px;">'.number_format( $total_sales).'</td></tr>';
      $treatHtml[] ='</tbody>';
      $expenseToday =DB::table('daily_expenses')
      ->where('status', '=', '1')
      ->where('date', '=', $date_selected)
      ->get();
      $total_expense = 0;

      $expenseHtml[] ='<thead><tr><th style="padding-left: 0;" colspan="2"><span style="margin-left: 10px;"><strong>DAILY EXPENSES</strong></span> </th><th></th><th style="width: 80px;"><a href="#modal-add-expense" class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 float-right modal-trigger"><i class="material-icons">add</i></a><a class="btn-floating mb-1 btn-small waves-effect waves-light mr-1 float-right" id="action-expense" onclick="acitonExpense()"><i class="material-icons">redo</i></a></th></tr></thead>';
      foreach($expenseToday as $expense) {
        $expenseHtml[] ='<tr><td class="p-0 pl-1" style="width: 40px"><span class="btn-actions" style=""><a class="btn-floating action-btn mb-1 btn-xsmall waves-effect waves-light pr-1 d-none" onclick="modifyExpense('.$expense->id.')"><i class="material-icons">edit</i></a>&nbsp; &nbsp;</span></td><td>'.$exnum.'. '.$expense->description.'</td><td></td><td>'.number_format($expense->amount).'</td></tr>';
        $exnum++;
        $total_expense+= $expense->amount;
      }
      $expenseHtml[] ='<tr><td></td><td></td><td class="text-right">Total expense: </td><td  style="font-size: 26px;">'.number_format( $total_expense).'</td></tr>';
      $expenseHtml[] ='</tbody>';



          //Gcash
          $gCashData =DB::table('patient_payment_method_records')
          ->join('patients', 'patients.id', '=', 'patient_payment_method_records.patient_id')
          ->where('patient_payment_method_records.status', '=', '1')
          ->where('patient_payment_method_records.payment_method_type', '=', 'gcash')
          ->where('patient_payment_method_records.date', '=', $date_selected)
          ->get();
          $total_gCash = 0;
          if(count($gCashData)>0){
            $gCashHtml[] ='<thead style="background: #f6deda;"><tr><th style="padding-left: 0;" colspan="2"><span style="margin-left: 10px;"><strong>GCASH</strong></span> </th><th></th><th style="width: 80px;"></th></tr></thead>';
            foreach($gCashData as $gCash) {
              $gCashHtml[] ='<tbody><tr><td style="width: 40px"></td><td>'.$gnum.'. <strong>'.$gCash->fullName.'</strong></td><td></td><td>'.number_format($gCash->patient_amount_paid).'</td></tr>';
              $gnum++;
              $total_gCash+= $gCash->patient_amount_paid;
            }
            $gCashHtml[] ='<tr><td></td><td></td><td class="text-right">Total GCash: </td><td  style="font-size: 26px;">'.number_format( $total_gCash).'</td></tr>';
            $gCashHtml[] ='</tbody>';
          } else {
            $gCashHtml[] = "";
          }
         
    
    
          //debit
          $debitData =DB::table('patient_payment_method_records')
          ->join('patients', 'patients.id', '=', 'patient_payment_method_records.patient_id')
          ->where('patient_payment_method_records.status', '=', '1')
          ->where('patient_payment_method_records.payment_method_type', '=', 'debit')
          ->where('patient_payment_method_records.date', '=', $date_selected)
          ->get();
          $total_debit = 0;
          if(count($debitData)>0) {
            $debitHtml[] ='<thead style="background: #f6deda;"><tr><th style="padding-left: 0;" colspan="2"><span style="margin-left: 10px;"><strong>DEBIT</strong></span> </th><th></th><th style="width: 80px;"></th></tr></thead>';
            foreach($debitData as $d) {
              $debitHtml[] ='<tbody><tr><td class="p-0 pl-1" style="width: 40px"></td><td>'.$gnum.'. <strong>'.$d->fullName.'</strong></td><td></td><td>'.number_format($d->patient_amount_paid).'</td></tr>';
              $gnum++;
              $total_debit+= $d->patient_amount_paid;
            }
            $debitHtml[] ='<tr><td></td><td></td><td class="text-right">Total Debit: </td><td  style="font-size: 26px;">'.number_format( $total_debit).'</td></tr>';
            $debitHtml[] ='</tbody>';
          } else {
            $debitHtml[] = "";
          }
         
    
          //credit
          $creditData =DB::table('patient_payment_method_records')
          ->join('patients', 'patients.id', '=', 'patient_payment_method_records.patient_id')
          ->where('patient_payment_method_records.status', '=', '1')
          ->where('patient_payment_method_records.payment_method_type', '=', 'credit')
          ->where('patient_payment_method_records.date', '=', $date_selected)
          ->get();
    
          $total_credit = 0;
          if(count($creditData)>0) {
            $creditHtml[] ='<thead style="background: #f6deda;"><tr><th style="padding-left: 0;" colspan="2"><span style="margin-left: 10px;"><strong>CREDIT</strong></span> </th><th></th><th style="width: 80px;"></th></tr></thead>';
            foreach($creditData as $c) {
              $creditHtml[] ='<tbody><tr><td class="p-0 pl-1" style="width: 40px"></td><td>'.$gnum.'. <strong>'.$c->fullName.'</strong></td><td></td><td>'.number_format($c->patient_amount_paid).'</td></tr>';
              $gnum++;
              $total_credit+= $c->patient_amount_paid;
            }
            $creditHtml[] ='<tr><td></td><td></td><td class="text-right">Total Credit: </td><td  style="font-size: 26px;">'.number_format( $total_credit).'</td></tr>';
            $creditHtml[] ='</tbody>';
          } else {
            $creditHtml[] = "";
          }
    
           //cheque
           $chequeData =DB::table('patient_payment_method_records')
           ->join('patients', 'patients.id', '=', 'patient_payment_method_records.patient_id')
           ->where('patient_payment_method_records.status', '=', '1')
           ->where('patient_payment_method_records.payment_method_type', '=', 'cheque')
           ->where('patient_payment_method_records.date', '=', $date_selected)
           ->get();
           $total_cheque = 0;
           if(count($chequeData)>0) {
             $chequeHtml[] ='<thead style="background: #f6deda;"><tr><th style="padding-left: 0;" colspan="2"><span style="margin-left: 10px;"><strong>CHEQUE</strong></span> </th><th></th><th style="width: 80px;"></th></tr></thead>';
             foreach($chequeData as $b) {
               $chequeHtml[] ='<tbody><tr><td class="p-0 pl-1" style="width: 40px"></td><td>'.$gnum.'. <strong>'.$b->fullName.'</strong></td><td></td><td>'.number_format($b->patient_amount_paid).'</td></tr>';
               $gnum++;
               $total_cheque+= $b->patient_amount_paid;
             }
             $chequeHtml[] ='<tr><td></td><td></td><td class="text-right">Total Cheque: </td><td  style="font-size: 26px;">'.number_format( $total_cheque).'</td></tr>';
             $chequeHtml[] ='</tbody>';
           } else {
             $chequeHtml[] = "";
           }
    
          //bank transfer
          $btransferData =DB::table('patient_payment_method_records')
          ->join('patients', 'patients.id', '=', 'patient_payment_method_records.patient_id')
          ->where('patient_payment_method_records.status', '=', '1')
          ->where('patient_payment_method_records.payment_method_type', '=', 'bank_transfer')
          ->where('patient_payment_method_records.date', '=', $date_selected)
          ->get();
          $total_btranfer = 0;
          if(count($btransferData)>0) {
            $btranferHtml[] ='<thead style="background: #f6deda;"><tr><th style="padding-left: 0;" colspan="2"><span style="margin-left: 10px;"><strong>BANK TRANSFER</strong></span> </th><th></th><th style="width: 80px;"></th></tr></thead>';
            foreach($btransferData as $b) {
              $btranferHtml[] ='<tbody><tr><td class="p-0 pl-1" style="width: 40px"></td><td>'.$gnum.'. <strong>'.$b->fullName.'</strong></td><td></td><td>'.number_format($b->patient_amount_paid).'</td></tr>';
              $gnum++;
              $total_btranfer+= $b->patient_amount_paid;
            }
            $btranferHtml[] ='<tr><td></td><td></td><td class="text-right">Total Bank Transfer: </td><td  style="font-size: 26px;">'.number_format( $total_btranfer).'</td></tr>';
            $btranferHtml[] ='</tbody>';
          } else {
            $btranferHtml[] = "";
          }


      $grandTotal = $total_sales - $total_expense;
      $grandTotalHtml[] ='<tr><td></td><td></td><td></td><td class="text-right">Grand total: <span style="font-size: 26px;">'.number_format( $grandTotal).'</span></td></tr>';


   return response()->json([ 'chequeHtml' => $chequeHtml, 'btranferHtml' => $btranferHtml, 'creditHtml' => $creditHtml, 'debitHtml' => $debitHtml, 'gCashHtml' => $gCashHtml, 'treatHtml' => $treatHtml, 'expenseHtml' => $expenseHtml, 'grandTotalHtml' => $grandTotalHtml, 'date' => $date_selected]);

  }

    public function saveExpense($date){
      
      if(isset($date)) {
        $date_selected = $date;
        $date_selected = str_replace('-', '/', $date_selected);
      } else {
        $date_selected = date("m/d/Y");
      }

      $c = new DailyExpense();
      $c->date         = $date_selected;
      $c->description   = $_GET['description'];
      $c->amount = $_GET['amount'];
      $c->save();
    }

    
    public function getExpense($id){
      $expenseData =DB::table('daily_expenses')
      ->where('id', '=', $id)
      ->get();

      return response()->json([ 'expenseData' => $expenseData[0]]);
    }

    public function updateExpense($id){
      if(isset($id)) {
      $updatedExpense =  DB::table('daily_expenses')
      ->where('id', $id)
      ->update([
          'description'    => $_GET['description'],
          'amount'          => $_GET['amount'],
          ]);

          return response()->json([ 'message' => 'expense successfully edited!']);

      }
    }

    public function removeExpense($id){
      if(isset($id)) {
        $delete =  DB::table('daily_expenses')->where('id', '=', $id)->delete();
        return response()->json([ 'message' => 'expense successfully edited!']);

      }
    }

    public function fileUpload(Request $req){

    }

   public function viewFile($file_id){

   }

}