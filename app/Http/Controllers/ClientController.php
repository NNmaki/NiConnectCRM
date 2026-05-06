<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use App\Models\Client;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    public function index(): View
    {
        $clients = Client::paginate(20);

        return view('clients.index', compact('clients'));
    }

    public function create(): View
    {
        return view('clients.create');
    }

    public function store(StoreClientRequest $request): RedirectResponse
    {
        Client::create($request->validated());

        return redirect()->route('clients.index')
        ->with('success', 'Client created succesfully');
    }

    public function edit(Client $client): View
    {
        return view('clients.edit', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client): RedirectResponse
    {
        $client->update($request->validated());
        return redirect()->route('clients.index')
        ->with('success', 'Client has been updated succesfully');

    }

    public function destroy(Client $client): RedirectResponse
    {
    Gate::authorize(PermissionEnum::DELETE_CLIENTS->value);
    if ($client->projects()->withTrashed()->count() > 0) {
        return redirect()->route('clients.index')
            ->with('error', 'The client has active or deleted projects and cannot be deleted.');
    }
    $client->delete();
    return redirect()->route('clients.index')
        ->with('success', 'Client deleted succesfully');
    }

}