<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankController2 extends Controller
{
    /**
     * Create a User controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bank.index');
    }

    /**
     * Get Bank List From DB For Datatables
     *
     * @return \Illuminate\Http\Response
     */
    public function getBanksData()
    {
        $bank = Bank::latest()->get();

        return Datatables::of($bank)
                ->addIndexColumn()
                ->addColumn('BankName', function($row) {
                    return $row->BankName;
                })
                ->addColumn('BankCode', function($row) {
                    return $row->BankCode;
                })
                ->addColumn('edit', function($row) {
                    return '<a href="'.url('admin/edit-banks2/').'/'.$row->id.'" class="edit btn btn-primary btn-sm">Edit</a>';
                })
                ->addColumn('delete', function($row) {
                    return '<button onclick="deleteBank('.$row->id.');" class="delete btn btn-danger btn-sm">Delete</button>';
                })
                ->rawColumns(['edit', 'delete'])
                ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'BankName' => 'required|min:3|max:255',
            'BankCode' => 'required|digits:6',
        ]);

        $bank = Bank::create([
            'BankName' => $request->BankName,
            'BankCode' => $request->input('BankCode'),
        ]);

        return redirect()->route('admin.banks')->with('success', 'Bank Added Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = Bank::where(['id'=>$id])->first();

        return view('admin.bank.edit', ['bank' => $bank]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'BankName' => 'required|min:3|max:255',
            'BankCode' => 'required|digits:6',
        ]);

        $data = [
            'BankName' => $request->BankName,
            'BankCode' => $request->BankCode,
        ];

        $bank = Bank::where('id', $request->id)->update($data);

        return redirect()->route('admin.banks')->with('success', 'Bank Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = Bank::findOrFail($id);
        $bank->delete();

        return redirect()->route('admin.banks')->with('success', 'Bank Removed Successfully!');
    }
}
