<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController2 extends Controller
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
        return view('admin.cuntries2.index');
    }
 
    /**
     * Get Country List From DB  For Datatables
     *
     * @return \Illuminate\Http\Response
    */
    // public function getCountriesData()
    // {
    //     $countries = Country::latest()->get();
        
    //     return Datatables::of($countries)
    //             ->addIndexColumn()
    //             ->addColumn('edit', function($row){

    //                $btn = '<a href="'.url('admin/edit-country1/').'/'.$row->id.'" class="edit btn btn-primary btn-sm">Edit</a>';

    //                 return $btn;
    //             })
    //             ->addColumn('delete', function($row){
    //                $btn = '<button  onclick="deleteArtist('.$row->id.');" class="delete btn btn-danger btn-sm">Delete</button>';

    //                 return $btn;
    //             })
    //             ->rawColumns(['edit', 'delete'])
    //             ->make(true);
    // }




    // Example server-side code
    public function getCountriesData()
{
    $countries = Country::latest()->get();

    return Datatables::of($countries)
        ->addIndexColumn()
        ->addColumn('name', function ($row) {
            return $row->name;
        })
        ->addColumn('country_code', function ($row) {
            return $row->country_code; // Add this line to include country_code
        })
        ->addColumn('edit', function ($row) {
            return '<a href="'.url('admin/edit-country1/').'/'.$row->id.'" class="edit btn btn-primary btn-sm">Edit</a>';
        })
        ->addColumn('delete', function ($row) {
            return '<button onclick="deleteArtist('.$row->id.');" class="delete btn btn-danger btn-sm">Delete</button>';
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
        return view('admin.cuntries2.create1');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
        
    //     $request->validate([
    //         'name' => 'required|min:3|max:255',
             
    //     ]);

    //     $country = Country::create([
    //         'name' => $request->name,
    //     ]);

    //     return redirect()->route('admin.countries')->with('success', 'Country Added Successfully! Made by Raj');
    // }


    public function store(Request $request)
    {
        // Update the validation rule to match the new field name
$request->validate([
    'name' => 'required|min:3|max:255',
    'country_code' => 'required|digits:6',
]);

// Update the column name in the create method
$country = Country::create([
    'name' => $request->name,
    'country_code' => $request->input('country_code'),
]);

return redirect()->route('admin.countries')->with('success', 'Country Added Successfully! Made by Raj');

    }
    



    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return view('admin.cuntries2.edit1');  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::where(['id'=>$id])->first();
        
        return view('admin.cuntries2.edit1', [ 'country' => $country]);
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
            'name' => 'required|min:3|max:255',
            'country_code' => 'required|digits:6',


        ]);

        $data = [
            'name' => $request->name,
            'country_code' => $request->country_code,


        ];

        $country = Country::where('id', $request->id)
            ->update($data);

        return redirect()->route('admin.countries1')->with('success', 'Country Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        
        $user = Country::where('id', $id)->firstorfail()->delete();
        return redirect()->route('admin.countries')->with('success', 'Country Removed Successfully!by raj');
    }
}
