<?php
//virtual pathway to controller itself
namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }
    public function AllContact(){
        $AllContact = ContactModel::all();

        return view('AllContact',compact('AllContact'));

    }
    public function sendContact(Request $request){
        $request->validate([
            'email'=>'required|string',
            'subject'=>'required|string',
          'message'=>'required|string|min:5|max:255',
        ]);

ContactModel::create([
    'email'=>$request->get('email'),
    'subject'=>$request->get('subject'),
    'message'=>$request->get('message'),
]);
return redirect('/shop');
    }
    public function delete($contact){
        $singleContact = ContactModel::where('id', $contact)->first();
        if ($singleContact==null) {
            die("this contact doesn't exist");}
        $singleContact->delete();
        return redirect()->back();
    }
}
