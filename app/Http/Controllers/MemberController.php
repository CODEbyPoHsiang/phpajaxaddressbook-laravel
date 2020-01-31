<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('index')->with('members', $members);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member = Member::create($request->all());
        return response()->json($member);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($member_id)
    {
        $member = Member::find($member_id);
        return response()->json($member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $member_id)
    {
        $member = Member::find($member_id);
        $member->name = $request->name;
        $member->ename = $request->ename;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->sex = $request->sex;
        $member->city = $request->city;
        $member->township = $request->township;
        $member->postcode = $request->postcode;
        $member->address = $request->address;
        $member->notes = $request->notes;
        $member->save();
        return response()->json($member);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($member_id)
    {
        $member = Member::destroy($member_id);
        return response()->json($member);
    }
}
