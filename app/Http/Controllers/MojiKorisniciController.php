<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MojiKorisnici;
use App\User;
use Input;
use Auth;
use Mail;
use App\Mail\SendMail;
class MojiKorisniciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mojikorisnici= MojiKorisnici::all();
        return view('mojikorisnici')->with('mojikorisnici',$mojikorisnici);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('qrweb');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     function console_log( $data ){
       echo '<script>';
       echo 'console.log('. json_encode( $data ) .')';
      echo '</script>';
    }

    public function store(Request $request)
    {

        $this->validate ($request,[
            'name'=> 'required',
            'email'=> 'required',
            'id_user'=> 'required',

        ]);
        $mojikorisnici = new MojiKorisnici;
        $id = Auth::user()->id;
        $email = Auth::user()->email;
        $email2=$request->input('email');
        $mojikorisnici->name = $request->input('name');
        $mojikorisnici->prezime = $request->input('prezime');
        $mojikorisnici->email = $request->input('email');
        $mojikorisnici->broj_telefona = $request->input('broj_telefona');
        $mojikorisnici->adresa = $request->input('adresa');
        $mojikorisnici->id_user = $id;
        $mojikorisnici->save();
        $data = array('name'=>Auth::user()->name,
                      'email'=>Auth::user()->email
        );
        $data2 = array('name'=>$request->input('name'),
                      'email'=>$request->input('email')
        );
        Mail::send('mail', $data2, function($message) {
            $message->to(Auth::user()->email);
         });
         Mail::send('mail2', $data, function($message) use ($email2) {
            $message->to($email2);
         });
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_user)
    {
       $baza= MojiKorisnici::where('id',$id_user)->get();

       return view('show',compact('baza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
