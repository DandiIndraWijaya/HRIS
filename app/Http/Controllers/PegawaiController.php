<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masterpegawai;
use Session;
use Illuminate\Support\Facades\Auth;
use File; 

class PegawaiController extends Controller
{
    public function index(){
        $pegawai = Masterpegawai::all();
        return view('pegawai/buat_pegawai', compact(['pegawai']));
    }

    public function input_pegawai(Request $request){

        $foto_calon = $request->file('foto');
         // menyimpan data file yang diupload ke variabel $file
         $file = $foto_calon;
     
         $nama_file = time()."_".$file->getClientOriginalName();
      
         // isi dengan nama folder tempat kemana file diupload
         $tujuan_upload = 'foto_pegawai';
         $file->move($tujuan_upload,$nama_file);

         $foto_calon_uploaded = $nama_file;

        
        $pegawai = Masterpegawai::create([
            'nip' => $request->input('nip'),
            'nik' => $request->input('nik'),
            'ktp' => $request->input('ktp'),
            'gelarDepan' => $request->input('gelarDepan'),
            'nama' => $request->input('nama'),
            'gelarBelakang' => $request->input('gelarBelakang'),
            'tempatLahir' => $request->input('tempatLahir'),
            'jenisKelamin' => $request->input('jenisKelamin'),
            'agama' => $request->input('agama'),
            'alamatKTP' => $request->input('alamatKTP'),
            'provinsiKTP' => $request->input('provinsiKTP'),
            'kotaKTP' => $request->input('kotaKTP'),
            'kecamatanKTP' => $request->input('kecamataKTP'),
            'kelurahanKTP' => $request->input('kelurahanKTP'),
            'kodeposKTP' => $request->input('kodeposKTP'),
            'alamatTinggal' => $request->input('alamatTinggal'),
            'kotaTinggal' => $request->input('kotaTinggal'),
            'kecamatanTinggal' => $request->input('kecamatanTinggal'),
            'kelurahanTinggal' => $request->input('kelurahanTinggal'),
            'kodeposTinggal' => $request->input('kodeposTinggal'),
            'phone' => $request->input('phone'),
            'statusPerkawinan' => $request->input('statusPerkawinan'),
            'statusWajibPajak' => $request->input('statusWajibPajak'),
            'kk' => $request->input('kk'),
            'scanKK' => $request->input('scanKK'),
            'npwp' => $request->input('npwp'),
            'scanNPWP' => $request->input('scanNPWP'),
            'bpjstk' => $request->input('bpjstk'),
            'bpjskes' => $request->input('bpjskes'),
            'golonganDarah' => $request->input('golonganDarah'),
            'nomorRekamMedik' => $request->input('nomorRekamMedik'),
            'nomorSIM' => $request->input('nomorSIM'),
            'nomorRekening' => $request->input('nomorRekening'),
            'aktaKematian' => $request->input('aktaKematian'),
            'createdAt' => date('Y-m-d H:i:s'), 
            'createdBy' =>  Auth::id(),
            'updatedAt' => date('Y-m-d H:i:s'),
            'updatedBy' =>  Auth::id(),

            'foto' => $foto_calon_uploaded
        ]);
        
        Session::flash('sukses', 'Data pegawai berhasil disimpan!');

        if($pegawai){   
            return redirect('/admin/pegawai');
        }

        
    }

    public function hapus_pegawai(Request $request){
        $id = $request->input('id');
        $foto = $request->input('foto');
        $nama = $request->input('nama');

        $file_path = 'foto_pegawai/'.$foto;
        if(File::exists($file_path)){
            File::delete($file_path);
        }
        
        Masterpegawai::where('id', $id)->delete();

            Session::flash('sukses', 'Pegawai dengan nama ' . $nama . ' berhasil dihapus!');

            return redirect('/admin/calon');
    }
}
