<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonDataController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insertJsonData(Request $request)
    {
		
		$request->validate([
			'first_name' => 'required',	
			'last_name' => 'required',	
			'email' => 'required',
			'vid' => 'required',
			'created_at' => 'required'
		]);

		Contacts::create($request->all());

		return redirect()->route('contacts.index')
			->with('success','HubSpot Contact added succesfully.');
    }
}
