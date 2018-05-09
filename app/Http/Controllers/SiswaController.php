<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Siswa;
use App\Telepon;
use App\Kelas;
use App\Hobi;
use Validator;
use Session;
use App\Http\Requests\SiswaRequest;

class SiswaController extends Controller
{
    //
    public function index(){
        $siswa = Siswa::orderBy('nisn', 'asc')->paginate(5);
        $jml_siswa = Siswa::count();
        return view('siswa.index', compact('siswa', 'jml_siswa'));
    }

    public function show($id){
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    public function create(){
        $list_kelas = Kelas::all();
        $list_hobi = Hobi::all();
        return view('siswa.create', compact('list_kelas', 'list_hobi'));
    }

    // INI YANG LAMA
    // public function store(Request $request){
    //     Siswa::create($request->all());
    //     return redirect('siswa');
    // }

    // INI untuk validasi di controller
    // public function store(Request $request){
    //     $input = $request->all();
    //     $this->validate($request, [
    //         'nisn' => 'required|string|size:4|unique:siswa,nisn',
    //         'nama' => 'required|string|max:50',
    //         'tempat_lahir' => 'required|string',
    //         'tanggal_lahir' => 'required|date',
    //         'jenis_kelamin' => 'required|in:L,P',
    //     ]);
    //     $siswa = Siswa::create($input);
    //     return redirect('siswa');
    // }

    // Ini validasi dari Http Request
    public function store(SiswaRequest $request){
        $input = $request->all();
        $siswa = Siswa::create($input);

        $telepon = new Telepon;
        $telepon->no_telepon = $request->input('no_telepon');
        $siswa->telepon()->save($telepon);

        $siswa->hobi()->attach($request->input('hobi'));

        Session::flash('flash_msg', 'Data Berhasil disimpan');
        return redirect('siswa');
    }

    public function edit($id){
        $siswa = Siswa::findOrFail($id);
        $siswa->no_telepon = (!empty($siswa->telepon->no_telepon) ? $siswa->telepon->no_telepon : '-');
        
        $list_kelas = Kelas::all();
        $list_hobi = Hobi::all();
        return view('siswa.edit', compact('siswa', 'list_kelas', 'list_hobi'));
    }

    // INI YANG LAMA
    // public function update($id, Request $request){
    //     $siswa = Siswa::findOrFail($id);
    //     $siswa->update($request->all());
    //     return redirect('siswa');
    // }

    public function update($id, SiswaRequest $request){
        $siswa = Siswa::findOrFail($id);
        // $input = $request->all();
        // // $this->validate($request, [
        // //     'nisn' => 'required|string|size:4|unique:siswa,nisn,'.$request->input('id'),
        // //     'nama' => 'required|string|max:50',
        // //     'tempat_lahir' => 'required|string',
        // //     'tanggal_lahir' => 'required|date',
        // //     'jenis_kelamin' => 'required|in:L,P',
        // // ]);
        // $siswa = Siswa::update($input);
        $siswa->update($request->all());
        $telepon = $siswa->telepon;
        $telepon->no_telepon = $request->input('no_telepon');
        $siswa->telepon()->save($telepon);

        if(!is_null($request->input('hobi'))){
            $siswa->hobi()->sync($request->input('hobi'));
        }

        $request->session()->flash('flash_msg', "Data terlah berhasil diupdate");
        return redirect('siswa');
    }

    public function destroy($id){
        $siswa = Siswa::whereId($id)->delete();
        return redirect('siswa');
    }

    public function paging(){
        $siswa = Siswa::orderBy('nisn', 'asc')->paginate(5);
        $jml_siswa = Siswa::count();
        return view('siswa.paging', compact('siswa', 'jml_siswa'));
    }

    public function tesCollection(){
        // $buah = ["apel", "Jenurk", "anggur", "Manggan"];
        // $koleksi = collect($buah)->map(function($nama){
        //     return ucwords($nama);
        // });
        $kol = array();
        array_push($kol, Siswa::all()->first(), 
                         Siswa::all()->last(), 
                         Siswa::all()->count(), 
                         Siswa::all()->take(3), 
                         Siswa::all()->pluck('nama', 'nisn'), 
                         Siswa::all()->where('nama', 'Andi'), 
                         Siswa::all()->whereIn('nama', ['Budi', 'Cita']),
                         Siswa::select('nisn', 'nama')->take(5)->get()->toArray(),
                         Siswa::select('nisn', 'nama')->take(5)->get()->toJson()
                        );
        //array_push($kol, Siswa::all()->count(), Siswa::all()->take(3));
        //$koleksi = Siswa::all()->first();
        return $kol;
    }

    public function dateMutator(){
        $siswa = Siswa::findOrFail(4);
        return 'Tanggal Lahir Siswa <b>'.$siswa->nama. '</b> : '.$siswa->tanggal_lahir->format('d M Y').' Umurnya sekarang : '.$siswa->tanggal_lahir->age.' tahun';
        //dd($siswa->created_at);
    }

    public function cari(Request $request){
        if(!empty($request->input('key')) || $request->input('key') != null){
            $key = $request->input('key');
            $sql = Siswa::where('nama', 'LIKE', '%'.$key.'%');
            $siswa = $sql->paginate(5);
            $jml_siswa = $siswa->total();
            return view('siswa.index', compact('siswa', 'key', 'jml_siswa'));
        }
        else {
            Session:flash('flash_msg', "Input Pencarian harus diisi");
            return redirect('siswa');
        }
    }
}
