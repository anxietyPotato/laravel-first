<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequests;
use App\Repositories\ContactRepo;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactRepo;

    public function __construct(ContactRepo $contactRepo)
    {
        $this->contactRepo = $contactRepo;
    }

    public function index()
    {
        return view('contact');
    }

    public function AllContact()
    {
        $AllContact = $this->contactRepo->AllContact();
        return view('AllContact', compact('AllContact'));
    }



    public function sendContact(ContactRequests $request)
    {
        return $this->contactRepo->sendContact($request);
    }

    public function delete($contact)
    {
        return $this->contactRepo->delete($contact);
    }

    public function edit(Request $request, $id)
    {
        return $this->contactRepo->edit($request, $id);
    }

    public function showEditForm($id)
    {
        return $this->contactRepo->showEditForm($id);
    }
}
