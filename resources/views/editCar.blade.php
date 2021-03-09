@extends('layouts.dashboard')

@section('dashboard-content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card mb-3">
            <div class="card-header text-white bg-dark">
            <i class="far fa-edit"></i> Edit Vehicle
            </div>
            @if(session('errorStoreCar'))
                <script>
                    toastr.error('{{ session('errorStoreCar') }}', {timeOut:5000})
                </script>
            @endif
            @if($errors->any())
                <script>
                    toastr.error('Please check again and fill all fields!', {timeOut:5000})
                </script>
            @endif
            <div class="card-body">
                <form action="{{ route('update.car', $car->id) }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-4" style="border-bottom:1px solid black; font-size:25px;"> <b>Vehicle</b> data</div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="manufacturer">Manufacturer<span style="color:red">*</span>:</label>
                            <select name="manufacturer" id="manufacturer" class="form-control">
                                @foreach($manufacturers as $manufacturer)
                                    <option value="{{ $manufacturer->id }}" @if($manufacturer->id == $car->manufacturer_id) selected @endif>{{ $manufacturer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="model">Model<span style="color:red">*</span>:</label>
                            <select name="model" id="model" class="form-control">
                                @foreach($models as $model)
                                    <option value="{{ $model->id }}" @if($model->id == $car->model_id) selected @endif >{{ $model->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="body_type">Body Type<span style="color:red">*</span>:</label>
                            <select name="body_type" id="body_type" class="form-control">
                                @foreach($body_types as $body_type)
                                    <option value="{{ $body_type->id }}" @if($body_type->id == $car->body_type_id) selected @endif >{{ $body_type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="fuel_type">Fuel Type<span style="color:red">*</span>:</label>
                            <select name="fuel_type" id="fuel_type" class="form-control">
                                @foreach($fuel_types as $fuel_type)
                                    <option value="{{ $fuel_type->id }}" @if($fuel_type->id == $car->fuel_type_id) selected @endif >{{ $fuel_type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- //////////////////////////////////////////////////////////////////////////////// -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="transmission">Transmission<span style="color:red">*</span>:</label>
                            <select name="transmission" id="transmission" class="form-control">
                                @foreach($transmissions as $transmission)
                                    <option value="{{ $transmission->id }}" @if($transmission->id == $car->transmission_id) selected @endif >{{ $transmission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="door">Doors<span style="color:red">*</span>:</label>
                            <select name="door" id="door" class="form-control">
                                @foreach($doors as $door)
                                    <option value="{{ $door->id }}" @if($door->id == $car->door_id) selected @endif >{{ $door->amount }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="cylinder">Cylinders<span style="color:red">*</span>:</label>
                            <select name="cylinder" id="cylinder" class="form-control">
                                @foreach($cylinders as $cylinder)
                                    <option value="{{ $cylinder->id }}" @if($cylinder->id == $car->cylinder_id) selected @endif >{{ $cylinder->amount }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="hp">Hp / Kw<span style="color:red">*</span>:</label>
                            <input type="number" value="{{ $car->hp }}" name="hp" id="hp" class="form-control{{ $errors->has('hp') ? ' is-invalid' : '' }}" required>
                            @if($errors->has('hp'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('hp') }}</strong>
                                </span>
                            else
                                <div class="invalid-feedback">
                                    <strong> Price is required </strong>
                                </div>
                            @endif
                        </div>
                    </div>
                     <!-- //////////////////////////////////////////////////////////////////////////////// -->
                     <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="color">Color<span style="color:red">*</span>:</label>
                            <select name="color" id="color" class="form-control">
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}" @if($color->id == $car->color_id) selected @endif >{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="door">VIN / chassis number<span style="color:red">*</span>:</label>
                            <input type="text" name='vin_number' placeholder="VIN / chassis number" value="{{ $car->vin_number }}" class="form-control{{ $errors->has('vin_number') ? ' is-invalid' : '' }}" >
                            @if($errors->has('vin_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('vin_number') }}</strong>
                                </span>
                            @else
                                <div class="invalid-feedback">
                                    <strong> VIN number is required </strong>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label for="price">Price<span style="color:red">*</span>:</label>
                            <input type="text" name='price' placeholder="£" value="{{ $car->price }}" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" required>
                            @if($errors->has('price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @else
                                <div class="invalid-feedback">
                                    <strong> Price is required </strong>
                                </div>
                            @endif

                        </div>
                    </div>
                    <!-- //////////////////////////////////////////////////////////////////////////////// -->
                    <div class="mb-4" style="border-bottom:1px solid black; font-size:25px;"> <b>Vehicle</b> equipment</div>
                    <div class="row mb-3">
                        @foreach($equipments as $index => $equipment)
                            @if($index % 6 == 0)
                                </div>
                                <div class="row">
                            @endif
                            <div class="col-md-2">
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" name="{{ $equipment->id }}" id="Check{{ $equipment->id }}" class="custom-control-input"
                                        @foreach($carEquipments as $carEquipment)
                                            @if($equipment->id == $carEquipment->equipment_id)
                                                checked
                                            @endif
                                        @endforeach >
                                    <label class="custom-control-label" for="Check{{ $equipment->id }}" style="font-size:13px;">{{ $equipment->name }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- ///////////////////////////////////////////////////////////////////////////////// -->
                    <div class="mb-4" style="border-bottom:1px solid black; font-size:25px;"> <b>Vehicle</b> registration</div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="origin">Country of Origin<span style="color:red">*</span>:</label>
                            <select name="origin" id="origin" class="form-control">
                                @foreach($origins as $origin)
                                    <option value="{{ $origin->id }}" @if($origin->id == $car->origin_id) selected @endif >{{ $origin->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="registration">Country of registration<span style="color:red">*</span>:</label>
                            <select name="registration" id="registration" class="form-control">
                                @foreach($registrations as $registration)
                                <option value="{{ $registration->id }}" @if($registration->id == $car->registration_id) selected @endif >{{ $registration->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="year">Year<span style="color:red">*</span>:</label>
                            <input type="text" name='year' placeholder="Year" value="{{ $car->year }}" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" required>
                            @if($errors->has('year'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('year') }}</strong>
                                </span>
                            @else
                                <div class="invalid-feedback">
                                    <strong> Please write the year of the car </strong>
                                </div>
                            @endif

                        </div>
                        <div class="col-md-3">
                            <label for="first_registration">Year of first Registration<span style="color:red">*</span>:</label>
                            <input type="text" name='first_registration' placeholder="Year" value="{{ $car->first_registration }}" class="form-control{{ $errors->has('first_registration') ? ' is-invalid' : '' }}" required>
                            @if($errors->has('first_registration'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('first_registration') }}</strong>
                                </span>
                            @else
                                <div class="invalid-feedback">
                                    <strong> Please write the year of the first registration </strong>
                                </div>
                            @endif
                        </div>
                    </div>
                     <!-- ///////////////////////////////////////////////////////////////////////////////// -->
                     <div class="mb-4" style="border-bottom:1px solid black; font-size:25px;"> <b>Technical</b> condition</div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="condition">Condition<span style="color:red">*</span>:</label>
                            <select name="condition" id="condition" class="form-control">
                                @foreach($conditions as $condition)
                                    <option value="{{ $condition->id }}" @if($condition->id == $car->condition_id) selected @endif >{{ $condition->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="mileage">Mileage<span style="color:red">*</span>:</label>
                            <input type="text" name='mileage' placeholder="Mileage" value="{{ $car->mileage }}" class="form-control{{ $errors->has('mileage') ? ' is-invalid' : '' }}" required>
                            @if($errors->has('mileage'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mileage') }}</strong>
                                </span>
                            @else
                                <div class="invalid-feedback">
                                    <strong> Mileage is required </strong>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label for="co2_emission">CO2 emmission<span style="color:red">*</span>:</label>
                            <input type="text" name='co2_emission' placeholder="CO2 emission" value="{{ $car->co2_emission }}" class="form-control{{ $errors->has('co2_emission') ? ' is-invalid' : '' }}" required>
                            @if($errors->has('co2_emission'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('co2_emission') }}</strong>
                                </span>
                            @else
                                <div class="invalid-feedback">
                                    <strong> The co2 emission is required </strong>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-1">
                            <div class="custom-control custom-checkbox" style="top: 37px;">
                                <input type="checkbox" name="featured" id="featured" class="custom-control-input" @if($car->featured == 1) checked @endif>
                                <label class="custom-control-label" for="featured" style="font-size:13px;">Featured</label>
                            </div>
                        </div>
                        <div class="col-md-1 ml-3">
                            <div class="custom-control custom-checkbox" style="top: 37px;">
                                <input type="checkbox" name="slider" id="slider" class="custom-control-input" @if($car->slider == 1) checked @endif>
                                <label class="custom-control-label" for="slider" style="font-size:13px;">Slider</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="description">Description:</label>
                            <textarea class="form-control" name="description" id="description" rows="4">{{ $car->description }}</textarea>
                        </div>
                    </div>
                    <!-- //////////////////////////////////////////////////////////////////////// -->
                    <div class="mb-4" style="border-bottom:1px solid black; font-size:25px;"> <b>Upload</b> photos</div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="file" id="imagesUpload" name="file[]" accept="image/png, image/jpeg" class="form-control" multiple>
                        </div>
                    </div>
                    <div class="row mt-5 mb-3">
                        <div class="col-md-6 offset-md-3">
                            <button type="submit" class="btn btn-outline-primary form-control">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('dashboard-script')
<script>
    // =========== Form validation ==================
    (function() {
        'use strict';
        window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
            }, false);
        });
        }, false);
    })();// =========== Form validation ==================

    <?php foreach($images as $key => $image){
        ?> var image{{$key}} = '{{ url('uploads/' . $image) }}';
        <?php
    } ?>
    $("#imagesUpload").fileinput({
        initialPreview: [
            <?php foreach($images as $key => $image){ ?>
                image{{$key}},
            <?php } ?>
        ],
        initialPreviewAsData: true,
        initialPreviewConfig: [
            <?php foreach($images as $key => $image){ ?>
                {type:"image", caption: "{{$image}}", filename: "{{$image}}", url:"{{ route('delete.image',[$car->id, $image]) }}", downloadUrl:'{{ url('uploads/' . $image) }}',width: "120px", key:{{$image[$key]}} },
            <?php } ?>
        ],
        deleteExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        uploadUrl: "{{ route('upload.image', $car->id) }}",
        uploadExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        fileActionSettings: {showDrag:false},
        theme: 'fa',
        allowedFileExtensions: ['jpg', 'png', 'jpeg'],
        overwriteInitial: false,
        maxFileSize:10000,
        maxFilesNum: 15,
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    })// =================Image Upload =========================
</script>
@endsection
