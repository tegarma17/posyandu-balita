<?php

namespace App\Http\Controllers;

use App\Models\Nakes;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_roles;
use Illuminate\Http\RedirectResponse;

class NakesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nakes = Nakes::with('user.role')->get();
        $title = 'Data Tenaga Kesehatan';
        return view('nakes', compact('nakes', 'title'));
    }
    public function store(Request $request): RedirectResponse
    {
        $latestUser = User::where('username', 'like', 'nakes%')->orderBy('username', 'desc')->first();
        if ($latestUser) {
            $latestNumber = intval(substr($latestUser->username, 5));
            $newNumber = $latestNumber + 1;
        } else {
            $newNumber = 1;
        }
        $newUsername = 'nakes' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);


        User::create([
            'role_id' => $request->role_id,
            'username' => $newUsername,
            'password' => bcrypt('nakes0001')
        ]);
        $nakes = $request->all();
        $nakes['user_id'] = User::latest()->first()->id;
        Nakes::create($nakes);

        return redirect()->route('nakes.index')->with('success', 'Tenaga Kesehatan Baru telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nakes = Nakes::find($id);
        return view('editNakes', compact('nakes', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nakes = Nakes::find($id);
        $nakes->update($request->all());

        return redirect()->route('nakes.index')->with('success', 'Data Tenaga Kesehatan telah dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nakes = Nakes::findOrFail($id);
        $nakes->delete();
        return redirect()->route('nakes.index')->with('success', 'Posyandu Terhapus.');
    }
}
