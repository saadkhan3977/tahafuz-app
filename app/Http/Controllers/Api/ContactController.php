<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Api\BaseController as BaseController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInfo;
use App\Models\Contact;
use App\Models\AdminInfo;
use Validator;
class ContactController extends BaseController
{
    public function contact_info(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'phone' => 'required|numeric',
                'email' =>'required|email',
                'subject'=>'required|string',
                'description'=>'required|string'
            ]);
            if($validator->fails())
            {
                return $this->sendError($validator->errors()->first());
            }
            $input = $request->except(['_token'],$request->all());
            $data = ContactInfo::create($input);
            return response()->json(['success'=>true,'message'=>'Your Request has been Sent','data'=>$data]);

        }catch(\Eception $e){
            return $this->sendError($e->getMessage());

        }

    }
    public function admininfo()
    {

        try{
            $admin =AdminInfo::first();
            return response()->json(['success'=>true,'data'=>$admin]);

        }catch(\Eception $e){
            return $this->sendError($e->getMessage());

        }
    }

    // List all contacts
    public function index()
    {
        $contacts = Contact::all();

        // return response()->json($contacts, 200);
        return response()->json(['success'=>true,'contacts_list'=>$contacts],200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:15',
        ]);

        if($validator->fails())
        {
            return $this->sendError($validator->errors()->first());
        }

        $contact = Contact::create($request->all());

        return response()->json([
            'message' => 'Contact created successfully',
            'data' => $contact
        ], 201);
    }


}
