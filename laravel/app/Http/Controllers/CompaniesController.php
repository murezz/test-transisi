<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('companies.index', [
            'companies' => Companies::orderByDesc('id')->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
            'nama' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'logo' => 'required|image|mimes:png|max:2000',
        ]);

        $path = $request->file('logo')->store('public/company');

        $Companies = new Companies;

        $Companies->logo = $path;
        $Companies->nama = $request->nama;
        $Companies->email = $request->email;
        $Companies->website = $request->website;

        $Companies->save();

        return redirect()->route('companies.index')->with('message', 'Berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('companies.edit', [
            'companies' => Companies::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            // 'logo' => 'required|image|mimes:png|max:2000',
        ]);

        if ($image = $request->file('logo')) {
            $destinationPath = Storage::putFile('companies', $request->file('logo'));
            // $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath);
            $validate['logo'] = "$destinationPath";
        } else {
            unset($validate['logo']);
        }

        Companies::where('id', $id)->update($validate);;

        return redirect()->route('companies.index')->with('message', 'Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies = Companies::find($id);

        $companies->delete();

        return redirect()->back()->with('message', 'company berhasil di hapus');
    }
}
