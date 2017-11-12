<?php

namespace App\Http\Controllers;

use App\Req;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReqController extends Controller
{
    public function make_request(Request $request){
        $req = new Req();
        $req->first_name = $request->first_name;
        $req->last_name = $request->last_name;
        $req->email = $request->email;
        $req->phone_number = $request->phone_number;
        $req->what_are_you = $request->what_are_you;
        $req->firm = $request->firm;
        $req->position_held = $request->position_held;
        $req->admission_date = $request->admission_date;
        $req->dob = $request->dob;

        if($request->mem_number == null){
            $req->mem_number = "None";
        }else{
            $req->mem_number = $request->mem_number;
        }
        $req->recom_number = "NA";
        $req->recom_email = "NA";

        $req->save();
        return redirect('/request-sent/');
    }

    public function view_request($id){
        $req = Req::findOrFail($id);
        $dob = Carbon::parse($req->dob)->format('d-m-Y');
        $adm = Carbon::parse($req->admission_date)->format('d-m-Y');

        return view('admin.req',compact('req','dob','adm'));
    }
    public function delete_request($id){
        Req::destroy($id);
        return redirect('/admin-section/');
    }
}
