<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Advantage;
use Illuminate\Http\Request;

class AdvantagesController extends Controller
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
            $advantages = Advantage::where('number', 'LIKE', "%$keyword%")
                ->orWhere('header', 'LIKE', "%$keyword%")
                ->orWhere('text', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $advantages = Advantage::latest()->paginate($perPage);
        }

        return view('advantages.index', compact('advantages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('advantages.create');
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
			'number' => 'required',
			'header' => 'required'
		]);
        $requestData = $request->all();
        
        Advantage::create($requestData);

        return redirect('advantages')->with('flash_message', 'Advantage added!');
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
        $advantage = Advantage::findOrFail($id);

        return view('advantages.show', compact('advantage'));
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
        $advantage = Advantage::findOrFail($id);

        return view('advantages.edit', compact('advantage'));
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
			'number' => 'required',
			'header' => 'required'
		]);
        $requestData = $request->all();
        
        $advantage = Advantage::findOrFail($id);
        $advantage->update($requestData);

        return redirect('advantages')->with('flash_message', 'Advantage updated!');
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
        Advantage::destroy($id);

        return redirect('advantages')->with('flash_message', 'Advantage deleted!');
    }
}
