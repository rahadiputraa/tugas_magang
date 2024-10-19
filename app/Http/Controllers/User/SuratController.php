<?php
 
namespace App\Http\Controllers\User;
 
use App\Http\Controllers\Controller;
use App\Models\Surat;

class SuratController extends Controller
{
 public function index() {
  $items = Surat::get();
  return view('user.surat', compact('items'));
 }
}