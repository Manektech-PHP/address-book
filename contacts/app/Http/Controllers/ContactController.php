<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\UserEmails;
use App\UserPhones;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //returns view home(listing Of Contacts)
		$contacts = User::with('emails','phonenumbers')->get();
		
		return view('contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //opens add contact page
		
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
        //This function Store Contact Details
		
		$input = $request->all();
		//Validation rules
		
		 $rules = [
           'firstname'=>'required',
		   'lastname'=>'required',
			
		  
        ];
		
		$customMessages = [
			'firstname.required' => 'Please Enter Firstname',
			'lastname.required' => 'Please Enter Lastname',
			
		];	 
		
		$validator = Validator::make($input, $rules,$customMessages);
		
		if ($validator->fails()) {
			 
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
			
        }else{			
				try {
					$user = new User;					
					$user->fill($input)->save();
					
					$last_inserted_id = $user->id;
					
					foreach($input['phoneNumber'] as $phone)
					{				
						if(isset($phone)){
							$phones = new UserPhones;
							$phones->user_id = $last_inserted_id;
							$phones->phoneNumber = $phone;
							$phones->save();
						}
					}
					
					foreach($input['email'] as $email)
					{
						if(isset($email)){
						$emails = new UserEmails;
						$emails->user_id = $last_inserted_id;
						$emails->email = $email;
						$emails->save();
						}
					}
					$message = "Contact Added Successfully";
					return redirect()->route('contacts.index')->with('success',$message);
					
				 }catch(\Illuminate\Database\QueryException $ex){
					  $msg = $ex->getMessage();
						if(isset($ex->errorInfo[2])) {
							$msg = $ex->errorInfo[2];
						}
						$message = "Databse Error";
				 return redirect()->back()->with('error',$message);
				 }
				 catch (Exception $ex) {
					 
					$message = "Something Went Wrong Please try again";
				 return redirect()->back()->with('error',$message);
				}
				
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		$contact = User::with('emails','phonenumbers')->find($id);		
		
		return view('contacts.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return view to edit
		
		$contact = User::with('emails','phonenumbers')->find($id);		
		
		return view('contacts.edit',compact('contact'));
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		$input = $request->all();
		
		 $rules = [
           'firstname'=>'required',
		   'lastname'=>'required',
		  
        ];
		
		$customMessages = [
			'firstname.required' => 'Please Enter Firstname',
			'lastname.required' => 'Please Enter Lastname',
			
		];
		
		$validator = Validator::make($input, $rules,$customMessages);
		
		if ($validator->fails()) {			 
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
			
        }else{
			
				try {
				$user = User::find($id);
				$user->update($input);
				
					UserPhones::where('user_id', $id)->delete();
					foreach($input['phoneNumber'] as $phone)
					{				
						if(isset($phone)){
							$phones = new UserPhones;
							$phones->user_id = $id;
							$phones->phoneNumber = $phone;
							$phones->save();
						}
					}
					
					UserEmails::where('user_id', $id)->delete();
					foreach($input['email'] as $email)
					{
						if(isset($email)){
						$emails = new UserEmails;
						$emails->user_id = $id;
						$emails->email = $email;
						$emails->save();
						}
					}

					$message = "Contact Updated Successfully";
					return redirect()->route('contacts.index')->with('success',$message);
				}catch(\Illuminate\Database\QueryException $ex){
					  $msg = $ex->getMessage();
						if(isset($ex->errorInfo[2])) {
							$msg = $ex->errorInfo[2];
						}
						$message = "Databse Error";
				 return redirect()->back()->with('error',$message);
				 }
				 catch (Exception $ex) {
					 
					$message = "Something Went Wrong Please try again";
				 return redirect()->back()->with('error',$message);
				}
				
				
			
		
		}
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		$contact = User::find($id);
		$contact->delete();
		$message = "Contact Deleted Successfully";
		return redirect()->route('contacts.index')->with('success',$message);
    }
}
