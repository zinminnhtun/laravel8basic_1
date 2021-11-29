<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Contact $contact)
    {
        return $contact->all();
    }

    public function show(Contact $contact,$id)
    {
        return $contact->find($id);
    }
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request,Contact $contact)
    {
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->save();
        return redirect()->route('create')->with('create','New Contact is Created.');
    }

    public function edit(Contact $contact,$id)
    {
        return view('contact.update',['contact'=>$contact->find($id)]);
    }

    public function update(Contact $contact, Request $request)
    {
       $contact = $contact->find($request->id);
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->save();
        return redirect()->route('create')->with('update',' Contact is Updated.');

    }
    public function destroy(Contact $contact,$id)
    {
        $contact->find($id)->delete();
        return redirect()->route("create")->with('contactDelete',"Contact Deleted");
    }

}
