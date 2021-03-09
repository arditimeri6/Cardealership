<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ManufacturerRequest;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Validator;

class ManufacturersController extends Controller
{
    public function index()
    {
        return view('tables.manufacturer');
    }
    public function getData()
    {
        return Datatables::of(DB::table('manufacturers')->get())
        ->addColumn('actions', '
            <button title="Edit" class="btn btn-sm btn-outline-secondary editButton"><i class="far fa-edit"></i> </button>
            <button title="Delete" class="btn btn-sm btn-outline-danger deleteButton"><i class="far fa-trash-alt"></i> </button>
        ')
        ->editColumn('created_at', '{{ \Carbon\Carbon::parse($created_at)->format("h:i:s m/d/Y") }}')
        ->editColumn('updated_at', '{{ \Carbon\Carbon::parse($updated_at)->format("h:i:s m/d/Y") }}')
        ->setRowId('{{ $id }}')
        ->rawColumns(['actions'])
        ->toJson();
    }


    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:manufacturers',
        ], [
            'name.required' => 'Manufacturer name is required',
            'name.unique' => 'Manufacturer name is already registered',
        ]);
        // dd($validation);
        $error_array = array();
        $success_output = '';
        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        } else {
            DB::table('manufacturers')->insert([
                'name' => $request->name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        $output = array(
            'error' => $error_array,
            'success' => $success_output,
        );
        echo json_encode($output);
    }

    public function edit(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:manufacturers',
        ], [
            'name.required' => 'Manufacturer name is required',
            'name.unique' => 'Manufacturer name is already registered',
        ]);
        // dd($validation);
        $error_array = array();
        $success_output = '';
        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        } else {
            DB::table('manufacturers')->where('id', $id)->update([
                'name' => $request->name,
                'updated_at' => Carbon::now()
            ]);
        }
        $output = array(
            'error' => $error_array,
            'success' => $success_output,
        );
        echo json_encode($output);
    }

    public function destroy($id)
    {
        DB::table('manufacturers')->where('id', $id)->delete();
    }
}
