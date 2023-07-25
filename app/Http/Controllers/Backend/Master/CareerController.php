<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Career;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    protected $career;
    public function __construct(Career $career)
    {
        $this->career = new CrudRepositories($career);
    }

    public function index()
    {
        $data['career'] = $this->career->get();
        return view('backend.master.career.index',compact('data'));
    }

    public function create()
    {
        return view('backend.master.career.create');
    }

    public function store(Request $request)
    {
        $this->career->store($request->all(),true,'career');
        return redirect()->route('master.career.index')->with('success',__('message.store'));
    }

    public function delete($id)
    {
        $this->career->hardDelete($id,true,);
        return redirect()->back()->with('success',__('message.delete'));
    }

    public function edit($id)
    {
        $data['career'] = $this->career->find($id);
        return view('backend.master.career.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $this->career->update($id,$request->all());
        return redirect()->route('master.career.index')->with('success',__('message.update'));
    }

    public function show($id)
    {
        $data['career'] = $this->career->find($id);
        return view('backend.master.career.show',compact('data'));
    }
}
