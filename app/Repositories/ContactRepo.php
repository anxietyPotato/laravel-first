<?php

namespace App\Repositories;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactRepo
{
    private $contactModel;

    public function __construct(ContactModel $contactModel)
    {
        $this->contactModel = $contactModel;
    }

    public function AllContact()
    {
        return $this->contactModel->all();
    }

    public function sendContact(Request $request)
    {
        ContactModel::create([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);

        return redirect('/shop');
    }

    public function delete($contact)
    {
        $singleContact = ContactModel::where('id', $contact)->first();
        if ($singleContact == null) {
            die("this contact doesn't exist");
        }
        $singleContact->delete();
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $contact = ContactModel::where(['id' => $id])->first();

        if ($contact === null) {
            die("this contact doesn't exist");
        }

        $contact->email = $request->get('email');
        $contact->subject = $request->get('subject');
        $contact->message = $request->get('message');
        $contact->save();

        return redirect(route('all.contact'));
    }

    public function showEditForm($id)
    {
        $contact = ContactModel::where(['id' => $id])->first();

        if ($contact === null) {
            die("this contact doesn't exist");
        }

        return view('products.editContact', compact('contact'));
    }
}
