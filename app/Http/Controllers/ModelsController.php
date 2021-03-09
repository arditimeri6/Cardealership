<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ModelRequest;
use Validator;

class ModelsController extends Controller
{
    public function index()
    {
        $manufacturers = DB::table('manufacturers')->get();
        return view('tables.model', ['manufacturers' => $manufacturers]);
    }
    public function getData()
    {
        return Datatables::of(
            DB::table('models')
            ->leftJoin('manufacturers', 'models.manufacturer_id', '=', 'manufacturers.id')
            ->select('models.*','manufacturers.name as manufacturer')
            ->get()
        )
        ->addColumn('manufacturer', '{{ $manufacturer }}')
        ->editColumn('created_at', '{{ \Carbon\Carbon::parse($created_at)->format("h:i:s m/d/Y") }}')
        ->editColumn('updated_at', '{{ \Carbon\Carbon::parse($updated_at)->format("h:i:s m/d/Y") }}')
        ->addColumn('actions', '
            <button title="Edit" class="btn btn-sm btn-outline-secondary editButton"><i class="far fa-edit"></i> </button>
            <button title="Delete" class="btn btn-sm btn-outline-danger deleteButton"><i class="far fa-trash-alt"></i> </button>
        ')
        ->setRowId('{{ $id }}')
        ->rawColumns(['actions'])
        ->toJson();
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:models',
            'manufacturer_id' => 'required'
        ], [
            'name.required' => 'Model name is required',
            'name.unique' => 'Model name is already registered',
            'manufacturer_id' => 'Manufacturer is required'
        ]);
        $error_array = array();
        $success_output = '';
        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        } else {
            DB::table('models')->insert([
                'name' => $request->name,
                'manufacturer_id' => $request->manufacturer_id,
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
            'name' => 'required|unique:models',
        ], [
            'name.required' => 'Model name is required',
            'name.unique' => 'Model name is already registered',
        ]);
        // dd($validation);
        $error_array = array();
        $success_output = '';
        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        } else {
            DB::table('models')->where('id', $id)->update([
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
        DB::table('models')->where('id', $id)->delete();
    }
}
