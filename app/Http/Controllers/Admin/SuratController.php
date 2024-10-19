<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\Surat;

class SuratController extends Controller
{
 public function index() {
  $items = Surat::get();
  return view('admin.surat', compact('items'));
 }
}