<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SportData;
use Log;
use Illuminate\Support\Facades\DB;

class SportDataController extends Controller
{

    public function getSelfSportDataPage(Request $request){

        $username = $request->session()->get('username');
        $pic_url = $request->session()->get('pic_url');

        $today_walk_data = SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',12)
            ->where('day',4)
            ->where('type','walk')
            ->first();

        $today_run_data = SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',12)
            ->where('day',4)
            ->where('type','run')
            ->first();

        $today_bike_data = SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',12)
            ->where('day',4)
            ->where('type','bike')
            ->first();

        $Mon=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',11)
            ->where('day',28)
            ->where('type','walk')
            ->first();

        $Tue=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',11)
            ->where('day',29)
            ->where('type','walk')
            ->first();

        $Wed=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',11)
            ->where('day',30)
            ->where('type','walk')
            ->first();

        $Thu=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',12)
            ->where('day',1)
            ->where('type','walk')
            ->first();

        $Fri=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',12)
            ->where('day',2)
            ->where('type','walk')
            ->first();

        $Sat=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',12)
            ->where('day',3)
            ->where('type','walk')
            ->first();

        $Sun=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',12)
            ->where('day',4)
            ->where('type','walk')
            ->first();

        $Mon_run=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',11)
            ->where('day',28)
            ->where('type','run')
            ->first();

        $Tue_run=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',11)
            ->where('day',29)
            ->where('type','run')
            ->first();

        $Wed_run=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',11)
            ->where('day',30)
            ->where('type','run')
            ->first();

        $Thu_run=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',12)
            ->where('day',1)
            ->where('type','run')
            ->first();

        $Fri_run=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',12)
            ->where('day',2)
            ->where('type','run')
            ->first();

        $Sat_run=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',12)
            ->where('day',3)
            ->where('type','run')
            ->first();

        $Sun_run=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',12)
            ->where('day',4)
            ->where('type','run')
            ->first();

        $Mon_bike=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',11)
            ->where('day',28)
            ->where('type','bike')
            ->first();

        $Tue_bike=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',11)
            ->where('day',29)
            ->where('type','bike')
            ->first();

        $Wed_bike=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',11)
            ->where('day',30)
            ->where('type','bike')
            ->first();

        $Thu_bike=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',12)
            ->where('day',1)
            ->where('type','bike')
            ->first();

        $Fri_bike=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',12)
            ->where('day',2)
            ->where('type','bike')
            ->first();

        $Sat_bike=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',12)
            ->where('day',3)
            ->where('type','bike')
            ->first();

        $Sun_bike=SportData::where('name',$username)
            ->where('year',2016)
            ->where('month',12)
            ->where('day',4)
            ->where('type','bike')
            ->first();

        return view('sport_data',['username'=>$username, 'pic_url'=>$pic_url,
            'today_walk_data'=>$today_walk_data, 'today_run_data'=>$today_run_data,
            'today_bike_data'=>$today_bike_data,
            'Mon'=>$Mon,
            'Tue'=>$Tue,
            'Wed'=>$Wed,
            'Thu'=>$Thu,
            'Fri'=>$Fri,
            'Sat'=>$Sat,
            'Sun'=>$Sun,
            'Mon_run'=>$Mon_run,
            'Tue_run'=>$Tue_run,
            'Wed_run'=>$Wed_run,
            'Thu_run'=>$Thu_run,
            'Fri_run'=>$Fri_run,
            'Sat_run'=>$Sat_run,
            'Sun_run'=>$Sun_run,
            'Mon_bike'=>$Mon_bike,
            'Tue_bike'=>$Tue_bike,
            'Wed_bike'=>$Wed_bike,
            'Thu_bike'=>$Thu_bike,
            'Fri_bike'=>$Fri_bike,
            'Sat_bike'=>$Sat_bike,
            'Sun_bike'=>$Sun_bike]);

    }

    public function postData($name, $type, $year, $month, $day, $miles, $calorie, $speed, $time){

        $exist = SportData::where('name',$name)
            ->where('type',$type)
            ->where('year',$year)
            ->where('month',$month)
            ->where('day',$day)
            ->get();

        if(count($exist)!=0){

            DB::table('sport_data')
                ->where('name',$name)
                ->where('type',$type)
                ->where('year',$year)
                ->where('month',$month)
                ->where('day',$day)
                ->update(
                    ['miles'=>$miles,'calorie'=>$calorie,'speed'=>$speed,'time'=>$time]
                );

            return "update";

        }
        else{
            SportData::insertGetId(
                ['name'=>$name,'type'=>$type,'year'=>$year,'month'=>$month,'day'=>$day,
                    'miles'=>$miles,'calorie'=>$calorie,'speed'=>$speed,'time'=>$time]
            );
            return "insert";
        }

    }

}
