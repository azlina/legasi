<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\P; // inclde the name space P.php

class PController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $search=$request->get('search');

        if($search==null)
        {

       $ps = P::paginate(5);
        return view('ps.index', compact('ps'));

        //$ps = P::all()->toArray();
       
    } else {

        //condititon
        //display record based on search key
        $ps = P::where('name', 'like', '%' .$search. '%') ->paginate(5);
        return view('ps.index', compact('ps'));

    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //display form
        return view(
            'ps.create');
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
        $p = $this->validate(request(), [
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required'
        ]);

        P::create($p);

        return redirect('/ps') -> with('success', 'Assets telah ditambah');
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
        //display edit form
    $p = P::find($id);
    return view('ps.edit',compact('p','id'));
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
        //save updated data
    $data = $this->validate($request, [
        'name'=>'required',
        'desc'=> 'required',
        'price'=> 'required'
    ]);
    $data['id'] = $id;

    $p = p::find($id);
    $p->name=$request->get('name');
    $p->desc=$request->get('desc');
    $p->price=$request->get('price');
    $p->save();

    return redirect('/ps')->with('success', 'Assets info has been updated!!');
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
        //delete selected record
        $p = P::find($id);
        $p->delete();
        return redirect('/ps')->with('successdelete',
            'Information has been deleted');
    }//end destroy
    
}
