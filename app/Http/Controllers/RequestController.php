<?php

namespace App\Http\Controllers;
// RM is stands for request model, since it conflicts with Http\Request
use App\Models\Request as RM;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{

    public function index()
    {
       $requests = RM::paginate(15);
       dd($requests);

       return view('request/list')->with('requests', $requests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('request/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RequestStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreRequest $request)
    {
        $request = RM::create($request->all());
        $request->user_id = Auth::id();
        $request->save();

        return redirect('/')->with('message', 'Успішно створено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return view('request/single')->with('request', $rm);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function edit(Request $request)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Request $request)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function destroy(RM $request)
     {
         if(Auth::id() == $request->user_id) {
             $request->delete();
             return redirect('/')->with('message', 'Успішно видалено');
         } else {
             return back()->with('message', 'Доступ відхилено');
         }
     }
}
