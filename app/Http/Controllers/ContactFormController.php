<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContactFormService;
use App\Http\Requests\StoreContactForm;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(ContactFormService $service, Request $request) : \Illuminate\View\View
    {
        $search = $request->input('search');

        $contacts = $service->index($search);

        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() : \Illuminate\View\View
    {
        return view('contact.create');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param ContactFormService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreContactForm $request, ContactFormService $service) : \Illuminate\Http\RedirectResponse
    {
        $value = $request->all();
        $service->store($value);

        return redirect('contact/index');
    }


    /**
     * Undocumented function
     *
     * @param int $id
     * @param ContactFormService $service
     * @return \Illuminate\View\View
     */
    public function show(int $id, ContactFormService $service) : \Illuminate\View\View
    {
        $contact = $service->show($id);
        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param ContactFormService $service
     * @return \Illuminate\View\View
     */
    public function edit($id, ContactFormService $service) : \Illuminate\View\View
    {
        $contact = $service->edit($id);

        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,int $id, ContactFormService $service) : \Illuminate\Http\RedirectResponse
    {
        $service->update($request->all(), $id);

        return redirect('contact/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id, ContactFormService $service) : \Illuminate\Http\RedirectResponse
    {
        $service->delete($id);

        return redirect('contact/index');
    }
}
