<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Course;
class Restcontroller extends Controller
{
    
        public function index()
        {
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api.coursera.org/api/courses.v1",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => array(
                            "Cache-Control: no-cache",
                            "Postman-Token: 8aeffab1-53cb-4f50-a1f6-03081c7a741f"
                        ),
                        ));

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        curl_close($curl);

                        if ($err) {
                        echo "cURL Error #:" . $err;
                        } else {
                        //echo $response;

                            $data = json_decode($response, true);

                            //echo count($data['elements']);
                            // echo $data['elements'][0]['courseType'];

                            
    
                            return view("welcome", ["data"=>$data]);
                        }
        }



public function savedata(Request $request)
{ 


    $input = $request->all();
    if($request->ajax()){
        if (DB::table('courses')->where('cid', '=', $request->input('cid'))->exists())   {
            return response()->json(['msg' => 'You are already saved.']);
        } else {      
            DB::table('courses')->insert([
                'cid'=>$input['cid'],
                'cname'=>$input['name'],
                'ctype'=>$input['ctype']               
            ]);
            return response()->json(['msg' => 'saved successfully.']);
        }
    } 


}

public function display()
{
    $result=Course::all();
    return view('savedcourses',['result'=>$result]);
}




}
