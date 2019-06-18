<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class HospitalsController extends Controller
{
    function hospitals(){
        $hospitals = DB::select('select * from hospitals');

        return response()->json($hospitals);
    }

    function hospitalsID($id){
        $hospitalsid = DB::select('select * from hospitals where id = :id', ['id' => $id]);
        return response()->json($hospitalsid);
    }

    function hospitalPost(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $adress = $request->input('address');
        $numberOfBeds = $request->input('numberOfBeds');
        $numberOfDoctors = $request->input('numberOfDoctors');
        // $created_at = $request->input('created_at');
        // $updated_at = $request->input('updated_at');
        $hospitalsp = DB::insert('insert into hospitals (id, name, address, numberOfBeds, numberOfDoctors, created_at, updated_at) values (?,?,?,?,?,?,?)', [$id, $name, $adress, $numberOfBeds, $numberOfDoctors, NOW(), NOW()]);
        
        return response()->json($hospitalsp);


      
        
    }

}
