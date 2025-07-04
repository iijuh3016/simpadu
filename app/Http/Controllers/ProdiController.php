<?php

namespace App\Http\Controllers;


use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Prodicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = ['nama' => "juhdi", 'foto' => 'avatar.png'];
        $prodi = Prodi::all();
        return view('prodi.index', compact('data', 'prodi'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $data = ['nama' => "juhdi", 'foto' => 'avatar.png'];
        return view('prodi.create', compact('data'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
               $validateData = $request->validate(
            [
                'nama' => 'required|max:100|unique:prodi',
                'kaprodi' => 'required|max:100',
                'jurusan' => 'required|max:100',
                'foto' => 'image|file|max:2048'
            ],
            [
                'nama.required' => 'Nama prodi wajib diisi',
                'nama.unique' => 'Nama prodi sudah terdaftar',
                'kaprodi.required' => 'Kaprodi wajib diisi'
            ]
        );
        //
         if ($request->file('foto')) {
            $validateData['foto'] = $request->file('foto')->store('images');
        }
        Prodi::create($validateData);
        return redirect('prodi')->with('success', 'Data prodi berhasil disimpan!');
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
        $data = ['nama' => "juhdi", 'foto' => 'avatar.png'];
        $prodi = Prodi::find($id);
        return view('prodi.edit', compact('data', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate(
            [
                'nama' => 'required|max:100|unique:prodi,nama,' . $id,
                'kaprodi' => 'required|max:100',
                'jurusan' => 'required|max:100',
                'foto' => 'image|file|max:2048'
            ],
            [
                'nama.required' => 'Nama prodi wajib diisi',
                
                'kaprodi.required' => 'Kaprodi wajib diisi',
                'nama.unique' => 'Nama prodi sudah terdaftar',
                'jurusan.required' => 'Jurusan wajib diisi'
            ]
        );
        //
           $prodi = Prodi::find($id);
        if ($request->file('foto')) {
            if ($prodi->foto) {
               Storage::delete($prodi->foto);
            }
            $validateData['foto'] = $request->file('foto')->store('images');
        }
        Prodi::where('id', $id)->update($validateData);
       return redirect('prodi')->with('success', 'Data prodi berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prodi = Prodi::find($id);
        if ($prodi->foto) {
            Storage::delete($prodi->foto);
        }
        Prodi::destroy($id);
      return redirect('prodi')->with('success', 'Data prodi berhasil disimpan!');
        //
    }
}
