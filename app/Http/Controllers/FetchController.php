<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Contacts;
use DB;

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

		$apikey = "demo";
		$array = [];
		$response = $client->request('GET', '?hapikey='.$apikey);
		$arr = json_decode($response->getBody());
		//dd($arr);
		// tengo un objeto : key : "contacts", value : array conformado por objetos.
		foreach($arr->contacts as  $obj) {
			$hs_epoch = (int) substr($obj->addedAt,0,-3);
			$hs_date = date('Y-m-d H:i:s',$hs_epoch);
			$vid = $obj->vid;
			$email =  $obj->{'identity-profiles'}[0]->identities[0]->value;

			$array['first_name'] = $vid;
			$array['last_name']  = $vid;
			$array['email'] = $email;
			$array['vid'] = $vid;
			$array['created_at'] = $hs_date;
			$array['updated_at'] = date('Y-m-d H:i:s');

			try{
				Contacts::insertOrIgnore($array);
			} catch (Exception $e) {
				return redirect()->route('contacts.index')
					 ->with('error','HubSpot data does not conform to API requirements!.');
			}
		}

		return redirect()->route('contacts.index')
				   ->with('success','Zoe Contact added succesfully.');
	}		
}

