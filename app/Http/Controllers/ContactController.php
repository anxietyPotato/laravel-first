<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequests;
use App\Repositories\ContactRepo;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class ContactController extends Controller
{
    private $contactRepo;

    public function __construct(ContactRepo $contactRepo)
    {
        $this->contactRepo = $contactRepo;
    }

    public function index(): View
    {
        return view('contact');
    }


    public function AllContact(): View
    {
        $AllContact = $this->contactRepo->AllContact();
        return view('AllContact', compact('AllContact'));
    }



    public function sendContact(ContactRequests $request) : RedirectResponse
    {
        return $this->contactRepo->sendContact($request);
    }

    public function delete($contact): RedirectResponse
    {
        return $this->contactRepo->delete($contact);
    }

    public function edit(Request $request, $id): RedirectResponse
    {
        return $this->contactRepo->edit($request, $id);
    }

    public function showEditForm($id): View
    {
        return $this->contactRepo->showEditForm($id);
    }
}
