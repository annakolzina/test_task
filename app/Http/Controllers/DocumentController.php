<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\IOFactory;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($value = null, $type = null)
    {
        $documents = Document::many($value, $type)->paginate(5);

        return view('pages.documents', [
        'documents' => $documents,
        ]);
    }

    public function search(Request $request, $my = 2){

        if($my == 1)
            $documents = Document::documents()->where('title', 'LIKE', "%{$request->value}%")->paginate(5);
        else
            $documents = Document::many()->where('title', 'LIKE', "%{$request->value}%")->paginate(5);

        return view('pages.documents', [
            'documents' => $documents,
            'my' => $my
        ]);
    }


    public function allFromUser($my = 2, $value = null, $type = null){
        if($my == 1)
            $documents = Document::documents($value, $type)->paginate(5);
        else
            $documents = Document::many($value, $type)->paginate(5);

        return view('pages.documents', [
            'documents' => $documents,
            'my' => $my
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.form');
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
            'file' => 'required|file',
            'author' => 'nullable'
        ]);

        if($obj = Document::create([
            'title' => $request->title,
            'is_visible' => ($request->visible == 'on') ? true : false,
            'file' => $request->file('file')->store('documents'),
            'author' => Auth::id()
        ])){

            return view('pages.form', [
                'status' => [true]
            ]);
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
        return view('pages.show', [
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
        return view('pages.edit', [
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
            'file' => 'nullable',
            'author' => 'nullable'
        ]);

        $document->update([
            'title' => $request->title,
            'is_visible' => ($request->visible == 'on') ? true : false,
            'file' => ($request->file) ? $request->file('file')->store('documents') : $document->file,
        ]);

        return redirect()->route('document.own');
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
