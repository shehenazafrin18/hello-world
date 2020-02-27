<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FormController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $forms = DB::table('forms')->get();
        return view('index', ['forms' => $forms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request) {
        $request->validate([
            'coinname' => 'required',
            'coinprice' => 'required|numeric',
        ]);

        $coinname = $request->input('coinname');
        $coinprice = $request->input('coinprice');
        $data = array(
            'coinname' => $coinname,
            'coinprice' => $coinprice,
            'created_at' => date('Y-m-d h:i:s')
        );
        DB::table('forms')->insert(
                $data
        );
        return redirect('forms')->with('success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $form = DB::table('forms')->where('id', $id)->first();
        return view('edit', compact('form', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'coinname' => 'required',
            'coinprice' => 'required|numeric',
        ]);
        $coinname = $request->input('coinname');
        $coinprice = $request->input('coinprice');
        $data = array(
            'coinname' => $coinname,
            'coinprice' => $coinprice,
            'updated_at' => date('Y-m-d h:i:s')
        );
        DB::table('forms')->where('id', $id)->update($data);
        return redirect('forms')->with('success', 'Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        DB::table('forms')->where('id', $id)->delete();
        return redirect('forms')->with('success', 'Data has been deleted successfully');
    }

}
