<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MembershipController extends Controller
{
    //
    public function index() {

  //   	$members = Member::all();
		return view('members.index');
	}

	public function list() {
    	return datatables()->of(Member::all())->toJson();
	}

    public function create($id=0) {
    	$member = Member::find($id);
		return view('members.create', compact('member'));
	}

	public function create_post(Request $request) {
		if (!empty($request->id)){
			$member = Member::find($request->id);
		}
		else{
			$member = new Member();
		}
		
		$check = Member::where('email','=', $request->email)->first();
		if (!empty($check)){
			return redirect()->back()->with('message','email already used');
		}

		$member->name = $request->name;
		$member->email = $request->email;
		$member->phone = $request->phone;
		$member->password = $request->password;
		$member->level = '1';
		$member->save();
		
		return redirect()->route('member.index');
	}

	public function delete(Request $request) {

		$member = Member::findOrFail($request->id);
		$member->delete();
		return redirect()->route('member.index');
	}
}
