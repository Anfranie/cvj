<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\SUpport\Facades\Storage;

class FileController extends Controller
{
    public function index()
	{
		$files = File::orderBy('created_at', 'DESC')->paginate(30);
		return view('index', ['files' => $files]);
	}
    
    public function create()
    {
        //
        return view('upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

        $this->validate($request, [
                'file' => 'required|file|max:20000'

        ]);
        
        $upload = $request->file('file');
        $path = $upload->store('public/storage');
        $file = File::create([
            'title' => $upload->getClientOriginalName(),
            'description' => '',
            'path' => $path
        ]);

        //$files = $request->file('file');
        //foreach ($files as $file) {
		//	File::create([
		//		'title' => $file->getClientOriginalName(),
		//		'description' => '',
		//		'path' => $file->store('public/storage')
		//	]);
		//}
        return redirect('/file')->with('success', 'File is uploaded');
        
         //$file= new File();
         //$file->filename=json_encode($data);
         
        
        //$file->save();

    }

    public function show($id)
	{
		$dl = File::find($id);
		return Storage::download($dl->path, $dl->title);
    }
    
    public function destroy($id)
	{
        $del = File::find($id);
        Storage::delete($del->path);
        $del->delete();
        return redirect('/file');
	}

	public function edit($id)
	{

	}
}
