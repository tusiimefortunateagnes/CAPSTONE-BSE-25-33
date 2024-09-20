<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivitiesRequest;
use App\Http\Requests\UpdateActivitiesRequest;
use App\Models\Activities;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreActivitiesRequest $request)
    {
        try {
            $data = $request->validated();
            // dd($data);
            $data['user_id'] = auth()->id();
            Activities::create($data);
            return redirect()->back()->with('success', 'Task added successfully');
        } catch (\Exception $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Activities $activities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activities $activities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivitiesRequest $request, Activities $activities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $result = Activities::destroy($id);
            if ($result) {
                return redirect()->back()->with('success', 'Task deleted successfully');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }
}
