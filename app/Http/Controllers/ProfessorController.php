<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $professors = Professor::paginate(10);
            return view('professors.index', compact('professors'));
        } catch (\Exception $e) {
            Session::flash('error', 'Error loading professors: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('professors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            Professor::create($request->only('name'));
            Session::flash('success', 'Professor created successfully');
            return redirect()->route('professors.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error creating professor: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Professor $professor)
    {
        try {
            return view('professors.show', compact('professor'));
        } catch (\Exception $e) {
            Session::flash('error', 'Error loading professor details: ' . $e->getMessage());
            return redirect()->route('professors.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professor $professor)
    {
        return view('professors.edit', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Professor $professor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $professor->update($request->only('name'));
            Session::flash('success', 'Professor updated successfully');
            return redirect()->route('professors.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error updating professor: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professor $professor)
    {
        try {
            $professor->delete();
            Session::flash('success', 'Professor deleted successfully');
            return redirect()->route('professors.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error deleting professor: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
