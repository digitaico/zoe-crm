<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\JsonDataController;


class ParentController extends Controller
{

	protected $JsonDataController;
		public function __construct(JsonDataController $JsonDataController)
		{
			$this->JsonDataController = $JsonDataController;	
		}
    /**
     *
     */
    public function updateJsonData(Request $request)
    {
		$response = $this->JsonDataController->insertJsonData($request);
		return $response;
    }
}
