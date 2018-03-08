<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $semua = Pegawai::orderBy('priority','DECS')->get();
        return response()->json($semua,  200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $pegawai = new Pegawai;
        $pegawai->name=$request->name;
        $pegawai->priority=$request->priority;
        $pegawai->location=$request->location;
        $pegawai->time_start=$request->time_start;
        $pegawai->username=$request->username;
        $pegawai->password=$request->password;
        $success = $pegawai->save();

        if (!$success){
            return response()->json('Erorr Saving', 500);
        }else {
            return response()->json('Success', 200);
        }
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
        $pegawai = Pegawai::find($id);

       if(is_null($pegawai)){
        return response()->json('Not Found', 404);
       }else
       return response()->json($pegawai, 200);     
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
        $pegawai = Pegawai::find($id);

        if (!is_null($request->name)) {
             # code...  
            $pegawai->name = $request->name;
         } 

         if (!is_null($request->priority)) {
            $pegawai->priority = $request-> priority;
             # code...
         }

         $success = $pegawai->save();

         if (!$success) {
             # code...
            return response()->json('Error Updating', 500);

         }
         else
            return response()->json('Success', 200);
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
        $pegawai = Pegawai::find($id);

        if (is_null($pegawai)){

            return response()->json('Not Found', 404);
        }

        $success = $pegawai->delete();

        if (!$success) {
            # code...
            return response()->json('Error Deleting', 500);
        }else{

            return response()->json('Success', 200);
        }

        
    }
}
