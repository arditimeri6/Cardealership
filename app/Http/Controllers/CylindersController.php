<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Validator;

class CylindersController extends Controller
{
    public function index()
    {
        return view('tables.cylinder');
    }
    public function getData()
    {
        return Datatables::of(DB::table('cylinders')->get())
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
            'amount' => 'required|numeric|unique:cylinders',
        ], [
            'amount.required' => 'Cylinders number is required',
            'amount.unique' => 'This cylinder number is already registered',
            'amount.numeric' => 'Cylinders number needs to be a number',
        ]);
        // dd($validation);
        $error_array = array();
        $success_output = '';
        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        } else {
            DB::table('cylinders')->insert([
                'amount' => $request->amount,
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
            'amount' => 'required|numeric|unique:cylinders',
        ], [
            'amount.required' => 'Cylinders number is required',
            'amount.unique' => 'This cylinder number is already registered',
            'amount.numeric' => 'Cylinders number needs to be a number',
        ]);
        // dd($validation);
        $error_array = array();
        $success_output = '';
        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        } else {
            DB::table('cylinders')->where('id', $id)->update([
                'amount' => $request->amount,
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
        DB::table('cylinders')->where('id', $id)->delete();
    }
}
