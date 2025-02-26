<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nakes;
use App\Models\Balita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nakes = Nakes::with('user')
            ->select('nakes.id', 'users.password as password_nakes', 'nakes.nama as nama_nakes', 'users.username as user_name')
            ->join('users', 'nakes.user_id', '=', 'users.id')
            ->get();
        $balitas = Balita::with('user')
            ->select('balitas.id', 'users.password as password_balita', 'balitas.nama as nama_balita', 'users.username as user_name')
            ->join('users', 'balitas.user_id', '=', 'users.id')
            ->get();
        $combinedData = $nakes->concat($balitas);
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10; // Jumlah item per halaman
        $currentItems = $combinedData->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedItems = new LengthAwarePaginator($currentItems, $combinedData->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);
        $nakes = Nakes::with('user')->paginate(5)->fragment('std');
        $title = 'Data User';
        $balita = Balita::with('user')->paginate(5)->fragment('std');

        return view('user', compact('title', 'nakes', 'balita', 'paginatedItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
