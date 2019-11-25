<?php

namespace App\Http\Controllers;

use App\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Session;


class SubscribersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subscribers.index', [
          'subscribers' => Subscribers::paginate(1000)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subscribers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'surname' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return Redirect::to('subscribers/create')
                ->withErrors($validator);
        } else {
            $subscribers= new \App\Subscribers;
            $subscribers->name= $request->get('name');
            $subscribers->surname= $request->get('surname');
            $subscribers->email= $request->get('email');
            $subscribers->status=$request->get('status');
            $subscribers->status=( $subscribers->status == NULL ) ? 0 : 1;
            $subscribers->save();
        }

        Session::flash('message', 'Successfully updated nerd!');
        
        return redirect('subscribers'); //->with('success', 'Information has been added')
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscribers  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function show(Subscribers $subscribers)
    {
        $this->edit( $subscribers );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscribers  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {

        $subscriber = Subscribers::find($id);

        return view('subscribers.edit', [
            'subscriber'   => $subscriber,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscribers  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscribers $subscribers)
    {
        $subscribers->name=$request->get('name');
        $subscribers->surname=$request->get('surname');
        $subscribers->email=$request->get('email');
        $subscribers->status=$request->get('status');
        $subscribers->save();
        return redirect('subscribers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscribers  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscribers $subscribers)
    {
        $subscribers->delete();
        return redirect('subscribers')->with('success','Information has been  deleted');    }
}
