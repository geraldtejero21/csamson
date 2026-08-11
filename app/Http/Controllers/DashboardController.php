<?php

namespace App\Http\Controllers;
use Auth;
use Redirect;
use DB;
use DateTime;
use User;
use Session;
use DateInterval;
class DashboardController extends Controller

{
    public function dashboardModern()
    {
   
        date_default_timezone_set("Asia/Manila");
        if(!Auth::check()) 
        {
            return Redirect::to('login');
        }

        // if(Auth::user()->type !== 1) {
        //     return Redirect::to('patient-records');
        // }
        $salesToday =DB::table('patient_payment_method_records')
        ->where('date', '=', date("Y-m-d"))
        ->where('status', '=',1)
        ->get();

       $total_sales = 0;
       foreach($salesToday as $amount) {
        // $total_sales+= $amount->amount_charged;
        $total_sales+= $amount->patient_amount_paid;
        // $total_sales+= $amount->balance;
       }
     
        $m= date("m");
        $de= date("d");
        $y= date("Y");
        $d = array();
        for($i=0; $i<=5; $i++){
            $dSales[$i] = date('Y-m-d',mktime(0,0,0,$m,($de-$i),$y)); 

                $d[$i] = date('D (F j, Y)',mktime(0,0,0,$m,($de-$i),$y)); 
                $salesToday =DB::table('patients_treatment_records')
                ->join('patients_treatment_record_procedures', 'patients_treatment_records.id', '=', 'patients_treatment_record_procedures.patients_treatment_record_id')
                ->join('patients', 'patients_treatment_records.patient_id', '=', 'patients.id')
                ->select('patients_treatment_records.date as date','patients_treatment_record_procedures.amount_charged as amount_charged','patients_treatment_record_procedures.amount_paid as amount_paid','patients_treatment_record_procedures.balance as balance')
                 ->where('patients.record_status', '=', 1)
                ->where('patients_treatment_records.date', '=', $dSales[$i])
                ->get();
            $totalDaily_sales[$i] = 0;
            foreach($salesToday as $amount) {
                // $totalDaily_sales[$i]+= $amount->amount_charged;
                $totalDaily_sales[$i]+= $amount->amount_paid;
                // $totalDaily_sales[$i]+= $amount->balance;
            }
        }
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
            $latestPatient = DB::table('patients')->orderBy('updated_at', 'desc')->where('record_status', '=', 1)->take(3)->get();
            $timeago = array();
            $x=0;
            foreach($latestPatient  as $data) {
                $updated_at = $data->updated_at;
               $timeago[$x] = time_elapsed_string(date($updated_at));
               $data->timeAgo = $timeago[$x];
               $x++;
            }



            $birthDaCelebrant = DB::table('patients')->orderBy('birthDate', 'asc')->where('record_status', '=', 1)->get();
            $timeago = array();
            $x=0;
              date_default_timezone_set("Asia/Manila");

            foreach($birthDaCelebrant  as $bday) {

                    $dateString = $bday->birthDate; // Your date variable in m/d/Y format

                    // Convert the date string to a Unix timestamp
                    $timestamp = strtotime($dateString);

                    // Check if the conversion was successful
                    if ($timestamp !== false) {
                        // Get the month as a two-digit number (e.g., "08")
                        $month = date('m', $timestamp);

                    }
                
                    if($month == date('m')) {
                          $originalDate =  $bday->birthDate;
                        $birthDate = str_replace("-","/",$originalDate); 
                        $now = new DateTime();

                        $year = date('Y');
                        $BdayDate = date('m-d', strtotime($birthDate));
                        $FinalBdayDate = $year."-".$BdayDate;
                        $date = new DateTime($FinalBdayDate);

                    // if($date > $now) {
                        $myDateTime = DateTime::createFromFormat('m/d/Y', $birthDate);
                        $bday->birthDay =  $myDateTime->format('F d, Y');
                        $bday->count =  true;
                        $bday->counter =  $x;
                        

                        $myDateTime = DateTime::createFromFormat('Y-m-d', $year."-".$BdayDate);
                        $newDateString = $myDateTime->format('Y-m-d');
                        $date1=date_create(date('Y-m-d'));
                        $date2=date_create($newDateString);
                        $diff=date_diff($date1,$date2);
                        $showRemaining =  str_replace("+","",$diff->format("%R%a days"));
                        $days = $diff->format("%R%a");
                        $daysRemaining = $days;
                        $bdayIcon =  "";
                            if($daysRemaining > 7) {
                                $note = "note-green";
                            }else if ($daysRemaining <= 7 && $daysRemaining != 0){
                                $note = "note-orange";
                            } else if ($daysRemaining == 0){
                                $note = "note-red";
                                $showRemaining = "NOW";
                                $bdayIcon = '<img src="https://csamsondental.com/images/bday-icon.png" style="width: 27px;padding-top: 4px;" />';
                            }
                            $bday->bdayStatus = $bdayIcon.' <span  class="'.$note.'">'.$showRemaining.'</span>';

                            $bday->itemNumber =  $x++;

                            if($daysRemaining < 0) {
                            $bday->count =  false;
                            $bday->bdayStatus = "";
                            }
                        } else {
                            $bday->count =  false;

                        }
           

            }

    
            // $followUp = DB::table('patients')
            // ->leftjoin('patients_treatment_records', 'patients_treatment_records.patient_id', '=', 'patients.id')
            // ->leftjoin('patients_treatment_record_procedures', 'patients_treatment_record_procedures.patients_treatment_record_id', '=', 'patients_treatment_records.id')
            // ->where('patients.record_status', '=', 1)
            // ->where('patients_treatment_record_procedures.recall_date', '>', '')
            // ->orderBy('patients_treatment_record_procedures.recall_date', 'asc')->take(15)->get();



            $followUp = DB::table('patients_treatment_record_procedures')
            ->where('recall_date', '>', '')
            ->where('status', '=', 1)
            ->orderBy('recall_date', 'asc')
            ->get();

       

            foreach ($followUp as $key => $value) {
                $arr[] = [ $value->patients_treatment_record_id, $value->recall_date];
            }

       
     



            usort($arr, function($a, $b) {
               $da = DateTime::createFromFormat('m-d-Y', $a[1]);
               $db = DateTime::createFromFormat('m-d-Y', $b[1]);
               return $da <=> $db;
            });

      
            foreach($arr as $val) {
                $date = new DateTime(date('m-d-Y', strtotime($val[1])) );
                $now = date("m-d-Y");
                if($date > $now) {
                    $finalarr[] = [$val[0], $val[1]];
                }
            }



            $arrrFinal = array();

        

            foreach($finalarr as $va) {
                 $get = DB::table('patients_treatment_records')
                    ->leftjoin('patients_treatment_record_procedures', 'patients_treatment_record_procedures.patients_treatment_record_id', '=', 'patients_treatment_records.id')
                    ->leftjoin('patients', 'patients.id', '=', 'patients_treatment_records.patient_id')
                    ->where('patients_treatment_records.id', '=', $va[0])
                    ->get();

                foreach($get  as $v) {
                    $needleField = 'patient_id';
                    $needleValue = $v->patient_id;
                    if(!in_array($needleValue, array_column($arrrFinal, $needleField)) ) {
                            $arrrFinal[] = $v;
                    }
                }
            }




            $timeago = array();
            $x=0;
           
            // foreach($followUp  as $loop) {
            //     if($loop->patients_treatment_record_id) {
            //         $followUpFinal[$loop->patient_id][0] = $loop;

                
            //     }
            // }

     
            // foreach($followUpFinal  as $data) {
                foreach($arrrFinal as $follow) {
                    date_default_timezone_set("Asia/Manila");
                    $originalDate =  $follow->recall_date;

                    if(isset($follow->recall_date) && $follow->recall_date > "") {
                        $recall_date = str_replace("-","/",$originalDate); 
                        $final = date('Y-m-d', strtotime($recall_date));

                    } else {
                        $recall_date = date('m-d-Y');
                        $final = date('Y-m-d', strtotime($recall_date. ' + 7 months'));

                    }

                    $date = new DateTime($final);
                    $now = new DateTime();

              
                        $myDateTime = DateTime::createFromFormat('Y-m-d', $final);
                        $follow->birthDay =  $myDateTime->format('F d, Y');
                        $follow->count =  true;
                
                        $date1=date_create(date('Y-m-d'));
                        $date2=date_create($final);
                        $diff=date_diff($date1,$date2);
                        $showRemaining =  str_replace("+","",$diff->format("%R%a days"));
                        $days = $diff->format("%R%a");
                        $daysRemaining = $days;

                        if($daysRemaining > 7) {
                            $note = "note-green";
                        }else if ($daysRemaining <= 7 && $daysRemaining != 0){
                            $note = "note-orange";
                        } else if ($daysRemaining == 0){
                            $note = "note-red";
                            $showRemaining = "NOW";
                        }
                        $follow->bdayStatus = '<span  class="'.$note.'">'.$showRemaining.'</span>';

                        $bday->itemNumber =  $x++;

                        if($daysRemaining < 0) {
                           $follow->count =  false;
                            $follow->bdayStatus = "";
                        }

                        $follow->daysRemaining = $daysRemaining;
                
                 }

            // }

$currentDate = new DateTime();
$daysGet = array();
$date = date('m-d-Y');
$daysGet[] = $date;
for($i =1;$i<=3;$i++){
$daysGet[] = date('m-d-Y', strtotime("+$i days"));
}

$filter = array();
foreach($arrrFinal as $filerdata) {
    if($filerdata->daysRemaining == 0 || $filerdata->daysRemaining > 0)  {
     $filter[] = $filerdata;

    }
}
           

$superFinal = array();
foreach($filter as $checkArray) {
    foreach($daysGet as $dateCheck) {
        if ($dateCheck == $checkArray->recall_date) {
            $superFinal[] = $checkArray;
        }
    }
}






           $userType =  Auth::user()->type;

        $today = date('Y-m-d');
        $currentTime = date('H:i:s');
        $upcomingAppointments = DB::table('appointments')
            ->where('status', '=', 'reserved')
            ->where(function ($query) use ($today, $currentTime) {
                $query->where('appointment_date', '>', $today)
                    ->orWhere(function ($sameDay) use ($today, $currentTime) {
                        $sameDay->where('appointment_date', '=', $today)
                            ->where('appointment_time', '>=', $currentTime);
                    });
            })
            ->orderBy('appointment_date', 'asc')
            ->orderBy('appointment_time', 'asc')
            ->take(8)
            ->get();

        foreach ($upcomingAppointments as $appointment) {
            $appointment->displayDate = date('M j, Y', strtotime($appointment->appointment_date));
            $appointment->displayTime = date('g:i A', strtotime($appointment->appointment_time));
            $appointment->isToday = $appointment->appointment_date === $today;
        }

        $appointmentsTodayCount = DB::table('appointments')
            ->where('status', '=', 'reserved')
            ->where('appointment_date', '=', $today)
            ->count();

        // Breadcrumbs
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"],  ['name' => "Dashboard"],
        ];
        $pageConfigs = ['upcomingAppointments' => $upcomingAppointments, 'appointmentsTodayCount' => $appointmentsTodayCount, 'followUp' => $superFinal, 'birthDaCelebrant' => $birthDaCelebrant, 'userType' => $userType, 'latestPatient' => $latestPatient, 'total_sales' => $total_sales, 'pageHeader' => true, 'isFabButton' => true, 'd0'=> $d[0], 'd1' => $d[1], 'd2' => $d[2], 'd3' => $d[3], 'd4' => $d[4],
            'totalDaily_sales0' => $totalDaily_sales[0], 'totalDaily_sales1' => $totalDaily_sales[1], 'totalDaily_sales2' => $totalDaily_sales[2], 'totalDaily_sales3' => $totalDaily_sales[3], 'totalDaily_sales4' => $totalDaily_sales[4]];
        // $dateRange = [' ];
     return view('/pages/dashboard-modern', ['breadcrumbs' => $breadcrumbs], ['pageConfigs' => $pageConfigs]);
    }

    public function dashboardEcommerce()
    {
        // navbar large
        $pageConfigs = ['navbarLarge' => false];

        return view('/pages/dashboard-ecommerce', ['pageConfigs' => $pageConfigs]);
    }

    public function dashboardAnalytics()
    {
        // navbar large
        $pageConfigs = ['navbarLarge' => false];

        return view('/pages/dashboard-analytics', ['pageConfigs' => $pageConfigs]);
    }
}
