<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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


  return view('admin.index', compact('dataWithJenis','jenisData','dataUser','surat'));
 }
}