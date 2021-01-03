<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class FetchController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke()
	{
		$client = new Client([
			'base_uri' => 'https://api.hubapi.com/contacts/v1/lists/all/contacts/all',
			'timeout'=> 2.0,
		]);

		$apikey = "f86d7c87-ae50-448b-baff-0d38ece70c5c";
		$response = $client->request('GET', '?hapikey='.$apikey);
		$arr = json_decode($response->getBody());
		//dd($arr);
		// cada miembro del array es un objeto.
		foreach($arr as  $obj) {
			// aqui uso cada objeto.
			foreach($obj as $data) {
				echo $data->vid;	
			}
		}		
	}
}
