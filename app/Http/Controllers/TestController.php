<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        
        return view('test');
    }

    public function calculate(Request $request)
    {
        $a1 = $request->input('a1');
        $a2 = $request->input('a2');
        $a3 = $request->input('a3');
        $a4 = $request->input('a4');
        $a5 = $request->input('a5');
        $a6 = $request->input('a6');
        $a7 = $request->input('a7');
        $a8 = $request->input('a8');
        $a9 = $request->input('a9');
        $a10 = $request->input('a10');
        $a11 = $request->input('a11');
        $a12 = $request->input('a12');
        $a13 = $request->input('a13');
        $a14 = $request->input('a14');
        $a15 = $request->input('a15');
        $a16 = $request->input('a16');
        $a17 = $request->input('a17');
        $a18 = $request->input('a18');
        $a19 = $request->input('a19');
        $a20 = $request->input('a20');
        $a21 = $request->input('a21');
        $sum = $a1 + $a2 + $a3 + $a4 + $a5 + $a6 + $a7 + $a8 + $a9 + $a10 +
        $a11 + $a12 + $a13 + $a14 + $a15 + $a16 + $a17 + $a18 + $a19 + $a20 + $a21 ;
        $result1 = " ";
        $result2 = " ";
        $operator = $request->input('submit');

        //calculation depression
        if ($sum <= 4){
            $result1 = "Normal-No Depression";

        }
        elseif ($sum <=6)
        {
            $result1= "Mild Depression";
        }
        elseif ($sum <=10)
        {
            $result1 = "Moderate Depression";
        }
        elseif ($sum <=13)
        {
            $result1 = "Severe Depression";
        }
        else
            $result1 = " Extreme Depression";

         return redirect('/dass')->with('message', 'You have: '.$result1);
    }
}
