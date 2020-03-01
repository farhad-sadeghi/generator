<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Eshgh;
use Illuminate\Http\Request;

class EshghsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $eshghs = Eshgh::where('namefc', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $eshghs = Eshgh::latest()->paginate($perPage);
        }

        return view('eshghs.index', compact('eshghs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('eshghs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Eshgh::create($requestData);

        return redirect('eshghs')->with('flash_message', 'Eshgh added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $eshgh = Eshgh::findOrFail($id);

        return view('eshghs.show', compact('eshgh'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $eshgh = Eshgh::findOrFail($id);

        return view('eshghs.edit', compact('eshgh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $eshgh = Eshgh::findOrFail($id);
        $eshgh->update($requestData);

        return redirect('eshghs')->with('flash_message', 'Eshgh updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Eshgh::destroy($id);

        return redirect('eshghs')->with('flash_message', 'Eshgh deleted!');
    }
}
