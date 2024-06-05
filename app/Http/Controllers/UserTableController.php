<?php

namespace App\Http\Controllers;

use App\Models\UserTable;
use Illuminate\Http\Request;

class UserTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function Users(){
        return view('public.users');
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
    public function show(UserTable $userTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserTable $userTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserTable $userTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserTable $userTable)
    {
        //
    }
}
