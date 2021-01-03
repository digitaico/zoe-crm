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
		// tengo un objeto : key : "contacts", value : array conformado por objetos.
		foreach($arr->contacts as  $obj) {
			// aqui inserto a DB cada objeto.
				echo $obj->vid."<br />";	
				// aqui newcesito usar ContactsController.store()	

			}
		}		
	}

