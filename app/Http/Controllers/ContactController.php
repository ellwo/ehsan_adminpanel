<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //



    public function index()
    {

        return view('admin.contact.index');
        # code...
    }


    public function replay(Contact $contact)
    {
        # code...
        return view('admin.contact.replay',['contact'=>$contact]);
    }

    public function update(Request $request,Contact $contact)
    {
        $this->validate($request,[
            'replay'=>'required|string'
        ]);
        $contact->reply=$request['replay'];

        $contact->save();

        return redirect()->route('admin.contacts')->with('status','تم الرد بنجاح ');
        # code...
    }



    public function sendmeassge(Request  $request){

        if($request->isMethod('post')){
        $request->validate([

            'name'=>['required'],
            'email'=>['required','max:191'],
            'message'=>['required'],
            'subject'=>['required']
        ]);

        }
       $contact=new Contact([
           'name'=>$request['name'],
           'email'=>$request['email'],
           'message'=>$request['message'],
           'phone'=>$request['phone'],
           'subject'=>$request['subject']
       ]);

        $contact->save();



       return redirect()->route('Home')->with('stat','ok')->with('status','تم ارسال الرسالة بنجاح ');


    }
}
