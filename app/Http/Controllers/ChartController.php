<?php

namespace App\Http\Controllers;

class ChartController extends Controller
{
    public function chartJs()
    {
        // Breadcrumbs
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Charts"], ['name' => "Charts Chartjs"],
        ];
        $m= date("m");

        $de= date("d");
        
        $y= date("Y");
        $d = array();
        for($i=0; $i<=5; $i++){
             $d[$i] = date('D:d/m/y',mktime(0,0,0,$m,($de-$i),$y)); 
        }
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true, 'd0'=> $d[0], 'd1' => $d[1], 'd2' => $d[2], 'd3' => $d[3], 'd4' => $d[4]];
        // $dateRange = [' ];


        return view('pages.charts-chartjs', ['breadcrumbs' => $breadcrumbs], ['pageConfigs' => $pageConfigs]);
    }
    public function chartist()
    {
        // Breadcrumbs
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Charts"], ['name' => "Charts Chartist"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];

        return view('pages.charts-chartist', ['breadcrumbs' => $breadcrumbs], ['pageConfigs' => $pageConfigs]);
    }
    public function sparklines()
    {
        // Breadcrumbs
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Charts"], ['name' => "Charts Sparklines"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];

        return view('pages.charts-sparklines', ['breadcrumbs' => $breadcrumbs], ['pageConfigs' => $pageConfigs]);
    }
}
