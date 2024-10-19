<?php
 
namespace App\Http\Controllers\User;
 
use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use App\Models\Surat;
use App\Models\User;

class DashboardController extends Controller
{

 public function index() {
  $dataUser = count(User::get());
  $jenisData = count(JenisSurat::get());
  $surat = count(Surat::get());
  $dataWithJenis = Surat::selectRaw('id_type_surat, COUNT(*) as total_surat')
  ->with('jenisSurat')
  ->groupBy('id_type_surat')
  ->get();


  return view('user.index', compact('dataWithJenis','jenisData','dataUser','surat'));
 }
}