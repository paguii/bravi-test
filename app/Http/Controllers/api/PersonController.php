<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Contact;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        return Person::with(["Contact"])->where('id', '>', 0)->get();
    }

    public function store(Request $request)
    {
        $person = new Person();
        $person->name = $request->name;
        $person->save();

        foreach($request->contacts as $contact){
            $newContact = new Contact();
            $newContact->person_id = $person->id;
            $newContact->contact_type_id = $contact["contact_type_id"];
    
            if($contact["contact_type_id"] == 3){
                $newContact->email = $contact["email"];
            }else{
                $newContact->number = $contact["number"];
            }
            
            $newContact->save(); 
        }
    }


    public function show($id)
    {
        return Person::with(["Contact"])->findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        
        $person = Person::findOrFail($id);
        $person->name = $request->name;
        $person->update();
        
        foreach($request->contacts as $contact){
            
            $oldContact = Contact::findOrFail($contact["id"]);

            $oldContact->contact_type_id = $contact["contact_type_id"];

            if($contact["contact_type_id"] == 3){
                $oldContact->email = $contact["email"];
                $oldContact->number = null;
            }else{
                $oldContact->email = null;
                $oldContact->number = $contact["number"];
            } 
            
            $oldContact->update();
        }
    }


    public function destroy($id)
    {
        $person = Person::with(["Contact"])->findOrFail($id);

        foreach ($person->contact as $contact) {
            $contact->delete();
        }
        
        $person->delete();
    }
}
