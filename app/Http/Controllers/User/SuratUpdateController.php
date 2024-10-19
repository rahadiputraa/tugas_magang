<?php
 
namespace App\Http\Controllers\User;
 
use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SuratUpdateController extends Controller
{

  /**
     * Instantiate a new controller instance.
     *
     * @return void
     */

     /**
     * Page navigation property.
     *
     * @var string
     */
    protected $storage;

    public function __construct()
    {
        $this->storage = '/public/surat/';
    }

 public function index($id) {
    $data = Surat::where('id', $id)->first();
    $categories =  JenisSurat::get();
  return view('user.suratupdate', compact('data', 'categories'));
 }

 public function save(Request $request) {
  // Extract the ID from the request
  $id = $request->id;

  /*
  | Validation
  */
  $validator = Validator::make(
      $request->all(),
      [
          'judul' => 'required',
          'file' => 'nullable|file|mimes:pdf',
          'no_surat' => 'required',
          'id_type_surat' => 'required',
      ],
      [
          'required' => ' harus disii',
          'file.mimes' => 'The file must be a PDF.',
          'id.exists' => 'The selected ID does not exist.',
      ]
  );

  /*
  | Validation failed
  |
  | Return back with input and error message
  */
  if ($validator->fails()) {
      return redirect()
          ->back()
          ->withErrors($validator)
          ->withInput();
  }

  /*
  | Validation success
  |
  | Update $request
  */
  
  // Find the existing record
  $surat = Surat::findOrFail($id);

  // File update method
  function updateFile($request, $title, $storage, $code, $oldFile) {
      if ($request->hasFile($title)) {
          // Delete old file if exists
          if ($oldFile && Storage::exists($storage . '/' . $oldFile)) {
              Storage::delete($storage . '/' . $oldFile);
          }

          $fileName = time() . '-' . $code . '.' . $request->file($title)->getClientOriginalExtension();

          Storage::putFileAs(
              // location storage
              $storage,
              // file
              $request->file($title),
              // name
              $fileName
          );

          return $fileName;
      } else {
          return $oldFile; // Return old file if no new file is uploaded
      }
  }

  // Update the surat record
  $surat->update([
      'judul' => $request->judul,
      'file' => updateFile($request, 'file', $this->storage, '-file', $surat->file),
      'no_surat' => $request->no_surat,
      'id_type_surat' => $request->id_type_surat,
  ]);

  /*
  | Return back
  |
  */
  Alert::success('Success!', 'Surat Updated!');
  return redirect()->back();
}
}