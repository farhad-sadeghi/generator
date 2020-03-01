<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Type;
use Illuminate\Http\Request;

class TypesController extends Controller
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
            $types = Type::where('picture', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('property1', 'LIKE', "%$keyword%")
                ->orWhere('property2', 'LIKE', "%$keyword%")
                ->orWhere('property3', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $types = Type::latest()->paginate($perPage);
        }

        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('types.create');
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
        $this->validate($request, [
			'picture' => 'required',
			'name' => 'required',
			'price' => 'required'
		]);
        $requestData = $request->all();
        
        Type::create($requestData);

        return redirect('types')->with('flash_message', 'Type added!');
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
        $type = Type::findOrFail($id);

        return view('types.show', compact('type'));
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
        $type = Type::findOrFail($id);

        return view('types.edit', compact('type'));
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
        $this->validate($request, [
			'picture' => 'required',
			'name' => 'required',
			'price' => 'required'
		]);
        $requestData = $request->all();
        
        $type = Type::findOrFail($id);
        $type->update($requestData);

        return redirect('types')->with('flash_message', 'Type updated!');
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
        Type::destroy($id);

        return redirect('types')->with('flash_message', 'Type deleted!');
    }
}
