<?php

namespace App\Http\Controllers\UI;

use App\User;
use App\Consumer;
use App\Address;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ConsumerController extends Controller
{
	
    public function __construct()
    {
    	$this->middleware('auth');
    }
    
    /**
     * update the given consumer's profile info.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request)
    {
        $this->validate($request, ['id' => 'required|exists:consumers']);
        $consumer = Consumer::find($request->id);

        return $this->validateAndSaveConsumer($request, $consumer);
    }
    
    /**
     * create a new consumer with the provided information
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $consumer = new Consumer;
        $consumer->sponsor = Auth::user()->id;
        
        return $this->validateAndSaveConsumer($request, $consumer);
    }

    private function validateAndSaveConsumer(Request $request, Consumer $consumer) {
        $this->validate($request, array_merge([
            'first_name' => 'required',
            'last_name' => 'required',
            'description' => 'required',
        ], Address::rules()));
        
        // TODO: check to see if logged in user is a caregiver for this consumer
        $consumer->first_name = $request->first_name;
        $consumer->last_name = $request->last_name;
        $consumer->description = $request->description;

        $consumer->address_id = Address::retrieveOrCreate([
        	'street' => $request->street,
    		'city' => $request->city,
    		'state' => $request->state,
    		'zip1' => $request->zip1
    	])->id;
        	
        $consumer->save();
        return Redirect::to('/caregiver');
    }
    
}
