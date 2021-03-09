<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Car;
use Carbon\Carbon;
use App\Http\Requests\CarRequest;
use Illuminate\Support\Facades\Mail;

class CarsController extends Controller
{
    public function index()
    {
        return view('tables.car');
    }
    public function getData()
    {
        return Datatables::of(
            DB::table('cars')
            ->leftJoin('manufacturers', 'cars.manufacturer_id', '=', 'manufacturers.id')
            ->leftJoin('models', 'cars.model_id', '=', 'models.id')
            ->leftJoin('body_types', 'cars.body_type_id', '=', 'body_types.id')
            ->select('cars.*','manufacturers.name as manufacturer', 'models.name as model', 'body_types.name as body_type')
            ->get()
        )
        ->addColumn('manufacturer', '{{ $manufacturer }} {{ $model }}')
        // ->addColumn('model', '{{ $model }}')
        // ->addColumn('body_type', '{{ $body_type }}')
        ->addColumn('actions', '
            <button title="Details" class="btn btn-sm btn-outline-primary detailButton"><i class="fas fa-info-circle"></i> </button>
            <a href="{{ route("edit.car", $id) }}" title="Edit" class="btn btn-sm btn-outline-secondary editButton"><i class="far fa-edit"></i> </a>
            <button title="Delete" class="btn btn-sm btn-outline-danger deleteButton"><i class="far fa-trash-alt"></i> </button>
        ')
        // ->editColumn('created_at', '{{ \Carbon\Carbon::parse($created_at)->format("h:i:s m/d/Y") }}')
        // ->editColumn('updated_at', '{{ \Carbon\Carbon::parse($updated_at)->format("h:i:s m/d/Y") }}')
        ->editColumn('price', '{{$price}} £')
        ->setRowId('{{ $id }}')
        ->rawColumns(['actions'])
        ->toJson();
    }

    public function addCar()
    {
        $manufacturers = DB::table('manufacturers')->get();
        $models = DB::table('models')->get()->groupBy('manufacturer_id');
        $body_types = DB::table('body_types')->get();
        $fuel_types = DB::table('fuel_types')->get();
        $transmissions = DB::table('transmissions')->get();
        $doors = DB::table('doors')->orderBy('amount', 'asc')->get();
        $cylinders = DB::table('cylinders')->orderBy('amount', 'asc')->get();
        // $hps = DB::table('hps')->orderBy('amount', 'asc')->get();
        $colors = DB::table('colors')->get();
        $equipments = DB::table('equipments')->get();
        $origins = DB::table('origins')->get();
        $registrations = DB::table('registrations')->get();
        $conditions = DB::table('conditions')->get();

        // dd($models);

        return view('addCar', [
            'manufacturers' => $manufacturers,
            'models' => $models,
            'body_types' => $body_types,
            'fuel_types' => $fuel_types,
            'transmissions' => $transmissions,
            'doors' => $doors,
            'cylinders' => $cylinders,
            // 'hps' => $hps,
            'colors' => $colors,
            'equipments' => $equipments,
            'origins' => $origins,
            'registrations' => $registrations,
            'conditions' => $conditions,
        ]);
    }

    public function models(Request $request)
    {
        $value = $request['value'];
        $data = DB::table('models')
            ->where('manufacturer_id', $value)
            ->get();
        $output = '';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        echo $output;
    }

    public function store(CarRequest $request)
    {
        // dd($request->all());
        $files = $request->file('file');
        $data = [];
        if (!empty($files)) {
            foreach ($files as $file) {
                $name = date('dmY_His_').$file->getClientOriginalName();
                Storage::disk('public_uploads')->put($name, file_get_contents($file));
                $data[] = $name;
            }
        }
        $featured = 0;
        if($request['featured'])
        {
            $featured = 1;
        }
        
        $slider = 0;
        if($request['slider'])
        {
            $slider = 1;
        }

        $car = Car::create([
            'manufacturer_id' => $request['manufacturer'],
            'model_id' => $request['model'],
            'body_type_id' => $request['body_type'],
            'fuel_type_id' => $request['fuel_type'],
            'transmission_id' => $request['transmission'],
            'door_id' => $request['door'],
            'cylinder_id' => $request['cylinder'],
            'hp' => $request['hp'],
            'color_id' => $request['color'],
            'vin_number' => $request['vin_number'],
            'price' => $request['price'],
            'origin_id' => $request['origin'],
            'registration_id' => $request['registration'],
            'year' => $request['year'],
            'first_registration' => $request['first_registration'],
            'condition_id' => $request['condition'],
            'mileage' => $request['mileage'],
            'co2_emission' => $request['co2_emission'],
            'featured' => $featured,
            'slider' => $slider,
            'description' => $request['description'],
            'photos' => json_encode($data),
        ]);

        $equipments = DB::table('equipments')->get();
        foreach($equipments as $equipment)
        {
            if($request->has($equipment->id))
            {
                DB::table('cars_with_equipments')->insert([
                    'car_id' => $car->id,
                    'equipment_id' => $equipment->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        if ($car) {
            return redirect()->route('cars')->with('successStoreCar', 'Vehicle added successfully');
        }
        return redirect()->route('add.car')->with('errorStoreCar', 'Vehicle was not added');
    }

    public function edit(Car $car)
    {
        // dd($car);
        $manufacturers = DB::table('manufacturers')->get();
        $models = DB::table('models')->get();
        $body_types = DB::table('body_types')->get();
        $fuel_types = DB::table('fuel_types')->get();
        $transmissions = DB::table('transmissions')->get();
        $doors = DB::table('doors')->orderBy('amount', 'asc')->get();
        $cylinders = DB::table('cylinders')->orderBy('amount', 'asc')->get();
        // $hps = DB::table('hps')->orderBy('amount', 'asc')->get();
        $colors = DB::table('colors')->get();
        $equipments = DB::table('equipments')->get();
        $origins = DB::table('origins')->get();
        $registrations = DB::table('registrations')->get();
        $conditions = DB::table('conditions')->get();

        $carEquipments = DB::table('cars_with_equipments')->where('car_id', $car->id)->get();
        // dd($carEquipments);

        $data = [];
        // dd($appointment);
        $uploads = json_decode($car->photos);
        // dd($uploads);
        if (!empty($uploads)) {
            foreach($uploads as $upload)
            {
                $data[] = $upload;
            }
        }
        $images = $data;

        return view('editCar', [
            'car' => $car,
            'manufacturers' => $manufacturers,
            'models' => $models,
            'body_types' => $body_types,
            'fuel_types' => $fuel_types,
            'transmissions' => $transmissions,
            'doors' => $doors,
            'cylinders' => $cylinders,
            // 'hps' => $hps,
            'colors' => $colors,
            'equipments' => $equipments,
            'origins' => $origins,
            'registrations' => $registrations,
            'conditions' => $conditions,
            'images' => $images,
            'carEquipments' =>  $carEquipments,
        ]);
    }

    public function update(CarRequest $request, Car $car)
    {
        // dd($request->all());
        $photos = json_decode($car->photos);
        $data = [];
        foreach ($photos as $photo) {
            $data[] = $photo;
        }

        $files = $request->file('file');
        if (!empty($files)) {
            foreach ($files as $file) {
                $name = date('dmY_His_').$file->getClientOriginalName();
                Storage::disk('public_uploads')->put($name, file_get_contents($file));
                $data[] = $name;
            }
        }

        $car->update([
            'manufacturer_id' => $request['manufacturer'],
            'model_id' => $request['model'],
            'body_type_id' => $request['body_type'],
            'fuel_type_id' => $request['fuel_type'],
            'transmission_id' => $request['transmission'],
            'door_id' => $request['door'],
            'cylinder_id' => $request['cylinder'],
            'hp' => $request['hp'],
            'color_id' => $request['color'],
            'vin_number' => $request['vin_number'],
            'price' => $request['price'],
            'origin_id' => $request['origin'],
            'registration_id' => $request['registration'],
            'year' => $request['year'],
            'first_registration' => $request['first_registration'],
            'condition_id' => $request['condition'],
            'mileage' => $request['mileage'],
            'co2_emission' => $request['co2_emission'],
            'description' => $request['description'],
            'photos' => json_encode($data),
        ]);

        if($request['featured'])
        {
            $car->update([ 'featured' => 1 ]);
        } else {
            $car->update([ 'featured' => 0 ]);
        }
        
        if($request['slider'])
        {
            $car->update([ 'slider' => 1 ]);
        } else {
            $car->update([ 'slider' => 0 ]);
        }

        DB::table('cars_with_equipments')->where('car_id', $car->id)->delete();
        $equipments = DB::table('equipments')->get();
        foreach($equipments as $equipment)
        {
            if($request->has($equipment->id))
            {
                DB::table('cars_with_equipments')->insert([
                    'car_id' => $car->id,
                    'equipment_id' => $equipment->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
        return redirect()->route('cars')->with('successCarUpdate', 'The car has been updated');
    }

    public function deleteImage(Car $car, $image)
    {
        // dd($image);
        Storage::delete($image);
        $data = [];
        $photos = json_decode($car->photos);
        foreach ($photos as $photo) {
            if ($photo == $image) {
                $car->update(['photos' => json_encode($data)]);
            }
            else {
                $data[] = $photo;
            }
        }
        $car->update(['photos' => json_encode($data)]);

        if ($car) {
            return '{}';
        }
    }

    public function uploadImage(Request $request, Car $car)
    {
        $files = $request->file('file');
        $data = [];
        $photos = json_decode($car->photos);
        if (!empty($photos)) {
            foreach ($photos as $photo) {
                $data[] = $photo;
            }
        }
        if (!empty($files)) {
            foreach ($files as $file) {
                $name = date('dmY_His_').$file->getClientOriginalName();
                Storage::disk('public_uploads')->put($name, file_get_contents($file));
                $data[] = $name;
            }
        }
        $car->update(['photos' => json_encode($data)]);
        return '{}';
    }

    public function destroy(Car $car)
    {
        $car->delete();
    }

    public function details(Car $car)
    {
        // dd($car->id);
        $photos = json_decode($car->photos);
        $images = [];
        foreach ($photos as $photo) {
            $images[] = $photo;
        }
        // dd($data);
        $car = DB::table('cars')->where('cars.id', $car->id)
            ->leftJoin('manufacturers', 'cars.manufacturer_id', '=', 'manufacturers.id')
            ->leftJoin('models', 'cars.model_id', '=', 'models.id')
            ->leftJoin('body_types', 'cars.body_type_id', '=', 'body_types.id')
            ->leftJoin('fuel_types', 'cars.fuel_type_id', '=', 'fuel_types.id')
            ->leftJoin('transmissions', 'cars.transmission_id', '=', 'transmissions.id')
            ->leftJoin('doors', 'cars.door_id', '=', 'doors.id')
            ->leftJoin('cylinders', 'cars.cylinder_id', '=', 'cylinders.id')
            ->leftJoin('colors', 'cars.color_id', '=', 'colors.id')
            ->leftJoin('origins', 'cars.origin_id', '=', 'origins.id')
            ->leftJoin('registrations', 'cars.registration_id', '=', 'registrations.id')
            ->leftJoin('conditions', 'cars.condition_id', '=', 'conditions.id')
            ->select(
                'cars.*',
                'manufacturers.name as manufacturer',
                'models.name as model',
                'body_types.name as body_type',
                'fuel_types.name as fuel_type',
                'transmissions.name as transmission',
                'doors.amount as door',
                'cylinders.amount as cylinder',
                'colors.name as color',
                'origins.name as origin',
                'registrations.name as registration',
                'conditions.name as condition'
            )
            ->first();
        // dd($car);
        $relates = DB::table('cars')->where('cars.manufacturer_id', $car->manufacturer_id)->where('cars.id', '!=', $car->id)
            ->leftJoin('manufacturers', 'cars.manufacturer_id', '=', 'manufacturers.id')
            ->leftJoin('models', 'cars.model_id', '=', 'models.id')
            ->leftJoin('body_types', 'cars.body_type_id', '=', 'body_types.id')
            ->leftJoin('colors', 'cars.color_id', '=', 'colors.id')
            ->leftJoin('fuel_types', 'cars.fuel_type_id', '=', 'fuel_types.id')
            // ->leftJoin('hps', 'cars.hp_id', '=', 'hps.id')
            ->leftJoin('cylinders', 'cars.cylinder_id', '=', 'cylinders.id')
            ->leftJoin('conditions', 'cars.condition_id', '=', 'conditions.id')
            ->select(
                'cars.*',
                'manufacturers.name as manufacturer',
                'models.name as model',
                'body_types.name as body_type',
                'colors.name as color',
                'fuel_types.name as fuel_type',
                // 'hps.amount as hp',
                'cylinders.amount as cylinder',
                'conditions.name as condition'
            )->limit(3)->get();
        $relatedPhotos = [];
        foreach ($relates as $related) {
            $carPhotos = json_decode($related->photos);
            $relatedPhotos[] = $carPhotos[0];
        }

        $equipments = DB::table('cars_with_equipments')
                        ->where('car_id', $car->id)
                        ->leftJoin('equipments', 'cars_with_equipments.equipment_id', '=', 'equipments.id')
                        ->select('equipments.name as equipment')
                        ->get();

        $manufacturers = DB::table('manufacturers')->get();
        $years = DB::table('cars')->orderBy('year', 'desc')->select('cars.year')->get();
        $conditions = DB::table('conditions')->get();

        return view('details', [
            'car' => $car, 'images' => $images, 'equipments' => $equipments,
            'manufacturers' => $manufacturers, 'years' => $years, 'conditions' => $conditions,
            'relates' => $relates, 'relatedPhotos' => $relatedPhotos
        ]);
    }
}
