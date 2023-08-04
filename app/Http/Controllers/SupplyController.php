<?php

namespace App\Http\Controllers;

use App\Imports\SuppliesImport;
use App\Models\Supply;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

        return view('site.supplies.index', compact('supplies'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$supply = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('site.supplies.edit', compact('supply'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request);

        if (!$supply = $this->repository->find($id)) {
            return redirect()->back();
        }
        $supply->update($request->all());

        return redirect()->route('supply.index');
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

        return view('site.supplies.index', compact('supplies', 'filters'));
    }

    public function import()
    {
        return view('site.supplies.import-supplies');
    }

    public function suppliesUpload(Request $request)
    {
        
        $file = $request->file('file');
    
        if ($file) {
            Excel::import(new SuppliesImport, $file);
    
            return redirect()->route('supply.index')->with('success', 'Registro de Insumos adicionado!');
        } else {
            dd('erro');
            return redirect()->route('supply.index')->with('error', 'Nenhum arquivo selecionado.');
        }
    }
}
