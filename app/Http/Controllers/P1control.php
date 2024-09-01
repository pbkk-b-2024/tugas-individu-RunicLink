<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ganChecker; 
use App\Models\fibChecker;
use App\Models\priChecker;

abstract class Controller
{
    public function par1($par1 = ''){
        $data['param1'] = $par1;
        return view('pertemuan1.par1',compact('data'));
    }

    public function par2($par1 ='', $par2 =''){
        $data['param1'] = $par1;
        $data['param2'] = $par2;
        return view('pertemuan1.par2',compact('data'));
    }
}

class P1control extends Controller
{
    public function ganjilGenap(Request $request)
    {
        $numberDetails = [];
        if ($request->has('n')) {
            $validatedData = $request->validate([
                'n' => 'required|integer|min:1',
            ]);

            $n = $validatedData['n'];
            $numberDetails = ganChecker::getGanjilGenap($n); // Ensure this method returns the correct data
        }
        return view('pertemuan1.ganjilgenap', compact('numberDetails'));
    }

    public function fibonacci(Request $request)
    {
        $numberDetails = [];
        if ($request->has('n')) {
            $validatedData = $request->validate([
                'n' => 'required|integer|min:1',
            ]);

            $n = $validatedData['n'];
            $numberDetails = fibChecker::getfibonacci($n); // Ensure this method returns the correct data
        }
        return view('pertemuan1.fibonacci', compact('numberDetails'));
    }

    public function prima(Request $request){
        $numberDetails = [];
        if ($request->has('n')) {
            $validatedData = $request->validate([
                'n' => 'required|integer|min:1',
            ]);

            $n = $validatedData['n'];
            $numberDetails = priChecker::getPrima($n);
        }
        return view('pertemuan1.prima',compact('numberDetails'));
    }
}
