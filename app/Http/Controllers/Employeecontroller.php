<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employeemodel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class Employeecontroller extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = Employeemodel::all();
        return view('Employeemodel.index',compact('emp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Employeemodel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $abc = $request->file('myfile')->store('/public/empimg');
        $img = basename($abc);
        
        $pwd = Crypt::encryptString($request->password);
        $npwd = Crypt::decryptString($pwd);

       $emp = new Employeemodel();
        $emp->fname = $request->fname;
        $emp->lname = $request->lname;
        $emp->image= $img;
        $emp->password = $pwd;
        //$emp->role_id;
        $emp->save();
        return redirect('/Employeemodel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp = Employeemodel::findorFail($id);
        return view('Employeemodel.show',compact('emp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp = Employeemodel::findorFail($id);
        $a = "hsajha";
        $npwd = Crypt::decryptString($emp->password);
        // foreach ($emp as $emp) {
        //     $npwd = Crypt::decryptString($emp->password);
        // }
        
        
        return view('Employeemodel.edit',compact('emp'));
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
        $abc = $request->file('myfile')->store('/public/empimg');
        $img = basename($abc);
        $pwd = Crypt::encryptString($request->password);
        $npwd = Crypt::decryptString($pwd); 

        $emp = Employeemodel::findorFail($id);
        $emp->fname = $request->fname;
        $emp->lname = $request->lname;
        $emp->image = $img;
        $emp->password = $pwd;
        $emp->update();
        return redirect('/Employeemodel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Employeemodel::findorFail($id);
        $emp->delete();
        return redirect('/Employeemodel');
    }
}
