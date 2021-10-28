<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class DocumentController extends Controller
{
    public function index()
    {
        //
    }

    public function search(Request $request, $class = 2){

        if($class == 1)
            $documents = Document::own()->where('title', 'LIKE', "%{$request->value}%")->paginate(5);
        else
            $documents = Document::many()->where('title', 'LIKE', "%{$request->value}%")->paginate(5);

        return view('pages.document.documents', [
            'documents' => $documents,
            'class' => $class
        ]);
    }


    public function allFromUser($class = 2, $value = null, $type = null){

        if($class == 1)//документы конкретного польвователя
            $documents = Document::own($value, $type)->paginate(5);
        else
            $documents = Document::many($value, $type)->paginate(5);

        return view('pages.document.documents', [
            'documents' => $documents,
            'class' => $class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'file' => 'required|file|mimes:doc',
            'author' => 'nullable'
        ]);

        if($obj = Document::create([
            'title' => $request->title,
            'is_visible' => ($request->visible == 'on') ? true : false,
            'file' => $request->file('file')->store('documents'),
            'author' => Auth::id()
        ])){

            return redirect()->route('document.many');

        }else{
            return redirect()->route('document.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        return view('pages.document.show', [
            'document' => $document
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        Gate::authorize('update-document', [$document]);
        return view('pages.document.edit', [
            'document' => $document
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'file' => 'nullable|file|mimes:doc',
        ]);

        if($document->update([
            'title' => $request->title,
            'is_visible' => ($request->visible == 'on') ? true : false,
            'file' => ($request->file) ? $request->file('file')->store('documents') : $document->file,
        ])){
            return redirect()->route('document.many');
        }

        return redirect()->route('document.edit', ['document' => $document]);
    }

    public function downloadFile(Document $document){

        return response()->download(storage_path('app/public/'.$document->file));

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();

        return redirect('/');
    }

}
