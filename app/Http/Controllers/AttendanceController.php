<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attend;
use App\Member;

class AttendanceController extends Controller
{
    //
    public function index() {
  		$attends = Attend::with('member')->where(\DB::raw('date(created_at)'),'=', date('Y-m-d'))->get();

		return view('attend.index', compact('attends'));
	}

	public function insert(Request $request) {
    	$member = Member::where('email', "=", $request->email)->first();
    	if (empty($member)) {
    		return redirect()->route('attend.index')->with('message','not found');
    	}

    	$attend = Attend::where('member_id', "=", $member->id)->where(\DB::raw('date(created_at)'),'=', date('Y-m-d'))->first();
    	if (!empty($attend)){
    		return redirect()->route('attend.index')->with('message','already sign in');
    	}

    	$attend = new Attend();
    	$attend->member_id = $member->id;
    	$attend->save();

    	return redirect()->route('attend.index');
	}

    
}
