<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ResidentController extends Controller
{
    public function index(){
        $residents = Resident::all();

        return view('pages.resident.index', 
        [
            'residents' => $residents,
        ]);
    }

    public function create(){
        return view('residents.create');
    }

    public function store(Request $request){
        $validated = $request-> validate([
            'nik' => ['required', 'min:16', 'max:16'],
            'name' => ['required','max:100'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'birth_date' => ['required', 'string'],
            'birth_place' => ['required', 'max:100'],
            'address' => ['requred', 'max:700'],
            'religion' => ['nullable', 'max:50'],
            'marital_status' => ['required', Rule::in(['single', 'married', 'disvorced', 'windowed'])],
            'occupation' => ['nullable', 'max:100'],
            'phone' => ['nullable', 'max:15'],
            'status' => ['required', Rule::in(['active', 'moved', 'deceased'])],
        ]);

        Resident::created($request->validate());

        return redirect('/resident')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id){
        $residents = Resident::findOrFail($id);

        return view('pages.resident.edit', [
            'residents' => $residents,
        ]);
    }

    public function update(Request $request, $id){
        $validated = $request-> validate([
            'nik' => ['required', 'min:16', 'max:16'],
            'name' => ['required','max:100'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'birth_date' => ['required', 'string'],
            'birth_place' => ['required', 'max:100'],
            'address' => ['requred', 'max:700'],
            'religion' => ['nullable', 'max:50'],
            'marital_status' => ['required', Rule::in(['single', 'married', 'disvorced', 'windowed'])],
            'occupation' => ['nullable', 'max:100'],
            'phone' => ['nullable', 'max:15'],
            'status' => ['required', Rule::in(['active', 'moved', 'deceased'])],
        ]);

        Resident::finOrFail($id)->update($request->validate());

        return redirect('/resident')->with('success', 'Berhasil mengubah data');
    }

    public function destroy($id){
        $residents = Resident::findOrFail($id);
        $residents->delete();

        return redirect('/residents')->with('success', 'Berhasil menghapus data');
    }
}
