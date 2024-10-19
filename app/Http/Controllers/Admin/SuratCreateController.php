<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use App\Models\Label;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SuratCreateController extends Controller
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


 public function index() {
  $categories = JenisSurat::get();
  $labels = Label::all();
  return view('admin.suratcreate', compact('categories','labels'));
 }

 public function save(Request $request) {
/*
        | Validation
        */
        $validator = Validator::make(
         $request->all(),
         [
             'judul' => 'required',
            'file' => 'required|file|mimes:pdf',
             'no_surat' => 'required',
             'id_type_surat' => 'required',
         ],
         [
             'required' => ' harus disii',
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
     | Create $request
     */

     // Image 1
     function createFile($request, $title, $storage, $code) {
         if($request->$title != null) {
             $image_title = time() . '-' . $code . '.' . $request->$title->getClientOriginalExtension();
 
             Storage::putFileAs(
                 // lokasi storage
                 $storage,
                 // file
                 $request->file($title),
                 // name
                 $image_title,
             );

             return $image_title;
         } else {
             return 'default.jpg';
         }
     }

    //  -------------

    // Original array
    $labels = $request->labels;

    // Convert each element to 'labels' prefixed format
    $formattedLabels = array_map(function($label) {
        return ' ' . str_replace(' ', '', $label); // Remove spaces and prefix with 'labels'
    }, $labels);

    // Convert the array to a single string
    $labelsString = implode(', ', $formattedLabels);


    // ---------------

     // Surat
     Surat::create([
         'judul' => $request->judul,
         'file' => createFile($request, 'file', $this->storage, '-file'),
         'no_surat' => $request->no_surat,
         'id_type_surat' => $request->id_type_surat,
         'labels' => $labelsString
     ])->save();

     /*
     | Return back
     |
     */
     Alert::success('Success!', 'Surat Created!');
     return redirect()->back();
 }
}