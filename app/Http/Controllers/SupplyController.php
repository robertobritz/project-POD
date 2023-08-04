<?php

namespace App\Http\Controllers;

use App\Models\Supply;
use Illuminate\Http\Request;

class SupplyController extends Controller
{

    private $repository;

    public function __construct(Supply $supply)
    {
        $this->repository = $supply;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplies = $this->repository->latest()->paginate();

        return view('site.supply.index', compact('supplies'));
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

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $supplies = $this->repository
                            ->where(function($query) use ($request) {
                                if($request->filter){
                                    $query->orWhere('description', 'LIKE',"%{$request->filter}%");
                                    $query->orWhere('code','LIKE',"%{$request->filter}%");
                                }

                            })
                            ->latest()
                            ->paginate();

        return view('site.supply.index', compact('supplies', 'filters'));
    }
}
