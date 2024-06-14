<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'title'     => 'Manajemen Pasien',
            'pasien'  => Pasien::get(),
            'content'   => 'admin/pasien/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = [
            'title'     => 'Tambah Pasien',
            'content'   => 'admin/pasien/create'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'kode_penyakit'      => 'required|unique:penyakits',
            'name'               => 'required',
            'desc'               => 'required|min:5',
            'penanganan'         => 'required|min:5',
        ]);

        Pasien::create($data);
        Alert::success('Success', 'Data berhasil ditambahkan');
        return redirect('/admin/pasien');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $role = Role::with('gejala')->wherePenyakitId($id)->get();
        $data = [
            'title'     => 'Penyakit',
            'penyakit'  => Penyakit::find($id),
            'gejala'    => Gejala::get(),
            'role'      => $role,
            'content'   => 'admin/penyakit/show'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = [
            'title'     => 'Edit Penyakit',
            'penyakit'  => Penyakit::find($id),
            'content'   => 'admin/penyakit/edit'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pasien = Pasien::find($id);
        $data = $request->validate([
            'name'               => 'required',
            'desc'               => 'required',
            'penanganan'         => 'required',
        ]);

        $pasien->update($data);
        Alert::success('Success', 'Data berhasil diupdate');
        return redirect('/admin/pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // die('masuk');

        $pasien = Pasien::find($id);
        $pasien->delete();
        Alert::success('Success', 'Data berhasil dihapus');
        return redirect('/admin/pasien');
    }

    function addGejala(Request $request)
    {
        // dd($request->all());
        $data = [
            'penyakit_id'     => $request->penyakit_id,
            'gejala_id'     => $request->gejala_id,
            'bobot_cf'     => $request->bobot_cf,
        ];

        Role::create($data);
        Alert::success('Success', 'Data berhasil ditambahkan');
        return redirect('/admin/pasien/' . $request->penyakit_id);

    }

    function deleteRole($id)
    {
        $role = Role::find($id);
        $role->delete();
        Alert::success('Success', 'Data berhasil dihapus');
        return redirect('/admin/pasien/' . $role->penyakit_id);
    }

}