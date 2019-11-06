<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use Mail;
use App\Mail\SendMail;

//Requests
use App\Http\Requests\CrudRequest;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Home $model)
    {
        return view('crud.index',['lists' => $model->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrudRequest $request)
    {
        $home = Home::create($request->all());
        
        $this->MailSend('Create', 'Creating a new post', '');
        return redirect()->route('crud.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $home = Home::find($id);
        return view('crud.edit',compact('home'));       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CrudRequest $request, $id)
    {
        $home = Home::find($id);
        $home->update($request->all());

        $this->MailSend('Update', 'Updating the post', $id);

        return redirect()->route('crud.index');     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $home = Home::find($id);
        $home->delete();

        $this->MailSend('Delete', 'Deleting the post', $id);

        return redirect()->route('crud.index');
    }

    public function MailSend($sub, $mes, $id)
    {
        $newId = $id == null ? '' : ' - '.$id;

        $subject = $sub;
        $messaje = $mes . $newId;
        $date = date('Y-m-d');
        
        Mail::to(Auth()->user()->email)->send( new SendMail($subject, $messaje, $date) );
    }
}
