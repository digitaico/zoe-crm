<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;
use DB;


class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$contacts = DB::table('contacts')->paginate(10);
		return view('contacts.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		$request->validate([
			'first_name' => 'required|string|min:3|max:200',	
			'last_name' => 'required|string|min:4|max:200',	
			'email' => 'required|string|min:4|max:200'	
		]);
		 

		Contacts::create($request->all());

		return redirect()->route('contacts.index')
			->with('success','Zoe Contact added succesfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $contact)
    {
		return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacts $contact)
    {
		return view('contacts.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacts $contact)
    {
		$request->validate([
			'first_name' => 'required',	
			'last_name' => 'required',	
			'email' => 'required'	
		]);

		$contact->update($request->all());

		return redirect()->route('contacts.index')
			->with('success','Zoe Contact updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacts $contact)
    {
		$contact->delete();

		return redirect()->route('contacts.index')
			->with('success', 'Zoe contact was deleted.');
    }


}
