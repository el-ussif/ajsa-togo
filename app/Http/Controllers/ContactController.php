<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|\Illuminate\Contracts\View\View
    {
        $contacts = Contact::latest()->paginate(10);
        return view('pages.admin.contacts.list', [
            'contacts' => $contacts ?? []
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * (Si le formulaire est public_html, tu n’as pas besoin de cette méthode)
     */
    public function create(): Factory|\Illuminate\Contracts\View\View
    {
        return view('pages.admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Contact::create($validated);
        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact): Factory|\Illuminate\Contracts\View\View
    {
        return view('pages.admin.contacts.details', [
            'contact' => $contact
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * (Probablement inutile pour des contacts envoyés depuis un formulaire)
     */
    public function edit(Contact $contact): View|Application|Factory
    {
        return view('pages.admin.contacts.edit', [
            'contact' => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     * (Probablement inutile aussi pour ce module)
     */
    public function update(UpdateContactRequest $request, Contact $contact): RedirectResponse
    {
        $validated = $request->validated();
        $contact->update($validated);

        return redirect()->route('contacts.show', $contact)->with('success', 'Message mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Message supprimé avec succès.');
    }
}
