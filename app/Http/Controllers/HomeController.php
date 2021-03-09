<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }

    public function index()
    {
        $cars = DB::table('cars')->orderBy('created_at', 'desc')->limit(3)
        ->leftJoin('manufacturers', 'cars.manufacturer_id', '=', 'manufacturers.id')
        ->leftJoin('models', 'cars.model_id', '=', 'models.id')
        ->leftJoin('body_types', 'cars.body_type_id', '=', 'body_types.id')
        // ->leftJoin('hps', 'cars.hp_id', '=', 'hps.id')
        ->leftJoin('fuel_types', 'cars.fuel_type_id', '=', 'fuel_types.id')
        ->leftJoin('conditions', 'cars.condition_id', '=', 'conditions.id')
        ->leftJoin('cylinders', 'cars.cylinder_id', '=', 'cylinders.id')
        ->select('cars.*',
            'manufacturers.name as manufacturer',
            'models.name as model',
            'body_types.name as body_type',
            // 'hps.amount as hp',
            'fuel_types.name as fuel_type',
            'conditions.name as condition',
            'cylinders.amount as cylinder'
        )->get();
        $photos = [];
        foreach ($cars as $car) {
            $carPhotos = json_decode($car->photos);
            $photos[] = $carPhotos[0];
        }

        $featured = DB::table('cars')->where('featured', 1)->orderBy('created_at', 'desc')
        ->leftJoin('manufacturers', 'cars.manufacturer_id', '=', 'manufacturers.id')
        ->leftJoin('models', 'cars.model_id', '=', 'models.id')
        ->leftJoin('body_types', 'cars.body_type_id', '=', 'body_types.id')
        // ->leftJoin('hps', 'cars.hp_id', '=', 'hps.id')
        ->leftJoin('fuel_types', 'cars.fuel_type_id', '=', 'fuel_types.id')
        ->leftJoin('conditions', 'cars.condition_id', '=', 'conditions.id')
        ->leftJoin('cylinders', 'cars.cylinder_id', '=', 'cylinders.id')
        ->select('cars.*',
            'manufacturers.name as manufacturer',
            'models.name as model',
            'body_types.name as body_type',
            // 'hps.amount as hp',
            'fuel_types.name as fuel_type',
            'conditions.name as condition',
            'cylinders.amount as cylinder'
        )->get();
        $featuredPhotos = [];
        foreach ($featured as $feature) {
            $carPhotos = json_decode($feature->photos);
            $featuredPhotos[] = $carPhotos[0];
        }

        $sliders = DB::table('cars')->where('slider', 1)->orderBy('created_at', 'desc')
        ->leftJoin('manufacturers', 'cars.manufacturer_id', '=', 'manufacturers.id')
        ->leftJoin('models', 'cars.model_id', '=', 'models.id')
        ->leftJoin('body_types', 'cars.body_type_id', '=', 'body_types.id')
        // ->leftJoin('hps', 'cars.hp_id', '=', 'hps.id')
        ->leftJoin('fuel_types', 'cars.fuel_type_id', '=', 'fuel_types.id')
        ->leftJoin('conditions', 'cars.condition_id', '=', 'conditions.id')
        ->leftJoin('cylinders', 'cars.cylinder_id', '=', 'cylinders.id')
        ->select('cars.*',
            'manufacturers.name as manufacturer',
            'models.name as model',
            'body_types.name as body_type',
            // 'hps.amount as hp',
            'fuel_types.name as fuel_type',
            'conditions.name as condition',
            'cylinders.amount as cylinder'
        )->get();
        $slidersPhotos = [];
        foreach ($sliders as $feature) {
            $carPhotos = json_decode($feature->photos);
            $slidersPhotos[] = $carPhotos[0];
        }

        $manufacturers = DB::table('manufacturers')->get();
        $years = DB::table('cars')->orderBy('year', 'desc')->select('cars.year')->get();
        $conditions = DB::table('conditions')->get();
        // dd($featured);
        return view('layouts.index', [
            'cars' => $cars, 'photos' => $photos, 'featured' => $featured, 
            'featuredPhotos' => $featuredPhotos, 'manufacturers' => $manufacturers, 
            'years' => $years, 'conditions' => $conditions, 'sliders' => $sliders,
            'slidersPhotos' => $slidersPhotos,
        ]);
    }

    public function carList()
    {
        $cars = DB::table('cars')->orderBy('created_at', 'desc')
        ->leftJoin('manufacturers', 'cars.manufacturer_id', '=', 'manufacturers.id')
        ->leftJoin('models', 'cars.model_id', '=', 'models.id')
        ->leftJoin('body_types', 'cars.body_type_id', '=', 'body_types.id')
        // ->leftJoin('hps', 'cars.hp_id', '=', 'hps.id')
        ->leftJoin('fuel_types', 'cars.fuel_type_id', '=', 'fuel_types.id')
        ->leftJoin('conditions', 'cars.condition_id', '=', 'conditions.id')
        ->leftJoin('cylinders', 'cars.cylinder_id', '=', 'cylinders.id')
        ->select('cars.*',
            'manufacturers.name as manufacturer',
            'models.name as model',
            'body_types.name as body_type',
            // 'hps.amount as hp',
            'fuel_types.name as fuel_type',
            'conditions.name as condition',
            'cylinders.amount as cylinder'
        )->paginate(6);
        $photos = [];
        $date = [];
        foreach ($cars as $car) {
            $date[] = \Carbon\Carbon::parse($car->created_at)->format("d F Y");
            $carPhotos = json_decode($car->photos);
            $photos[] = $carPhotos[0];
        }
        $manufacturers = DB::table('manufacturers')->get();
        $years = DB::table('cars')->orderBy('year', 'desc')->select('cars.year')->get();
        $conditions = DB::table('conditions')->get();
        $count = count(DB::table('cars')->get());
        // dd($count);
        return view('carList', ['cars' => $cars, 'photos' => $photos, 'date' => $date, 'manufacturers' => $manufacturers, 'years' => $years, 'conditions' => $conditions, 'count' => $count]);
    }

    public function search(Request $request)
    {
        // dd($request->all());
        if ($request->price == null) {
            $prices[0] = "0";
            $prices[1] = "150000";
        } else {
            $prices = explode(",", $request->price);
        }
        if ($request->mileage == null) {
            $mileages[0] = "0";
            $mileages[1] = "300000";
        } else {
            $mileages = explode(",", $request->mileage);
        }

        // dd($mileages);
        $carss = DB::table('cars')
        ->leftJoin('manufacturers as searchM', 'searchM.id', '=', 'cars.manufacturer_id')
        ->leftJoin('models as ModelSe', 'ModelSe.id', '=', 'cars.model_id')
        ->leftJoin('body_types', 'cars.body_type_id', '=', 'body_types.id')
        // ->leftJoin('hps', 'cars.hp_id', '=', 'hps.id')
        ->leftJoin('fuel_types', 'cars.fuel_type_id', '=', 'fuel_types.id')
        ->leftJoin('conditions', 'cars.condition_id', '=', 'conditions.id')
        ->leftJoin('cylinders', 'cars.cylinder_id', '=', 'cylinders.id')
        ->select('cars.*',
            'searchM.name as manufacturer',
            'ModelSe.name as model',
            'body_types.name as body_type',
            // 'hps.amount as hp',
            'fuel_types.name as fuel_type',
            'conditions.name as condition',
            'cylinders.amount as cylinder'
        )
        ->where('price', '>=', $prices[0])
        ->where('price', '<=', $prices[1])
        ->where('mileage', '>=', $mileages[0])
        ->where('mileage', '<=', $mileages[1]);

        if ($request->c_year != null) {
            $carss->where('year', $request->c_year);
        }
        if ($request->c_condition != null) {
            $carss->where('condition_id', $request->c_condition);
        }
        if ($request->c_manufacturer != null) {
            $carss->where('cars.manufacturer_id', $request->c_manufacturer);
        }
        if ($request->c_model != null) {
            $carss->where('model_id', $request->c_model);
        }

        $cars = $carss->orderBy('created_at', 'desc')->get();
        // dd($request->all());
        $photos = [];
        $date = [];
        foreach ($cars as $car) {
            $date[] = \Carbon\Carbon::parse($car->created_at)->format("d F Y");
            $carPhotos = json_decode($car->photos);
            $photos[] = $carPhotos[0];
        }

        $manufacturers = DB::table('manufacturers')->get();
        $years = DB::table('cars')->orderBy('year', 'desc')->select('cars.year')->get();
        $conditions = DB::table('conditions')->get();
        // dd($cars);
        return view('search', ['cars' => $cars, 'photos' => $photos, 'date' => $date, 'manufacturers' => $manufacturers, 'years' => $years, 'conditions' => $conditions]);
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
}
