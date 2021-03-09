@extends('layouts.dashboard')

@section('dashboard-content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card mb-3">
            <div class="card-header text-white bg-dark">
                <i class="fas fa-plus-circle"></i> Add Vehicle
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
                <form action="{{ route('store.car') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-4" style="border-bottom:1px solid black; font-size:25px;"> <b>Vehicle</b> data</div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="manufacturer">Manufacturer<span style="color:red">*</span>:</label>
                            <select name="manufacturer" id="manufacturer" class="form-control input-lg dynamic" data-dependent="model" required>
                                <option value="">Select Manufacturer</option>
                                @foreach($manufacturers as $manufacturer)
                                    <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="model">Model<span style="color:red">*</span>:</label>
                            <select name="model" id="model" class="form-control input-lg" required>

                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="body_type">Body Type<span style="color:red">*</span>:</label>
                            <select name="body_type" id="body_type" class="form-control">
                                @foreach($body_types as $body_type)
                                    <option value="{{ $body_type->id }}">{{ $body_type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="fuel_type">Fuel Type<span style="color:red">*</span>:</label>
                            <select name="fuel_type" id="fuel_type" class="form-control">
                                @foreach($fuel_types as $fuel_type)
                                    <option value="{{ $fuel_type->id }}">{{ $fuel_type->name }}</option>
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
                                    <option value="{{ $transmission->id }}">{{ $transmission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="door">Doors<span style="color:red">*</span>:</label>
                            <select name="door" id="door" class="form-control">
                                @foreach($doors as $door)
                                    <option value="{{ $door->id }}">{{ $door->amount }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="cylinder">Cylinders<span style="color:red">*</span>:</label>
                            <select name="cylinder" id="cylinder" class="form-control">
                                @foreach($cylinders as $cylinder)
                                    <option value="{{ $cylinder->id }}">{{ $cylinder->amount }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="hp">Hp / Kw<span style="color:red">*</span>:</label>
                            <input type="number" name="hp" id="hp" class="form-control{{ $errors->has('hp') ? ' is-invalid' : '' }}" required>
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
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="door">VIN / chassis number:</label>
                            <input type="text" name='vin_number' placeholder="VIN / chassis number" class="form-control{{ $errors->has('vin_number') ? ' is-invalid' : '' }}" >
                            @if($errors->has('vin_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('vin_number') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label for="price">Price<span style="color:red">*</span>:</label>
                            <input type="text" name='price' placeholder="£" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" required>
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
                                    <input type="checkbox" name="{{ $equipment->id }}" id="Check{{ $equipment->id }}" class="custom-control-input" >
                                    <label class="custom-control-label" for="Check{{ $equipment->id }}" style="font-size:13px;">{{ $equipment->name }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- ///////////////////////////////////////////////////////////////////////////////// -->
                    <div class="mb-4" style="border-bottom:1px solid black; font-size:25px;"> <b>Vehicle</b> registration</div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="origin">Country of Origin:</label>
                            <select name="origin" id="origin" class="form-control">
                                <option value="">Select Country</option>
                                @foreach($origins as $origin)
                                    <option value="{{ $origin->id }}">{{ $origin->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="registration">Country of registration:</label>
                            <select name="registration" id="registration" class="form-control">
                                <option value="">Select Country</option>
                                @foreach($registrations as $registration)
                                <option value="{{ $registration->id }}">{{ $registration->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="year">Year<span style="color:red">*</span>:</label>
                            <input type="text" name='year' placeholder="Year" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" required>
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
                            <input type="text" name='first_registration' placeholder="Year" class="form-control{{ $errors->has('first_registration') ? ' is-invalid' : '' }}" required>
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
                                    <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="mileage">Mileage<span style="color:red">*</span>:</label>
                            <input type="text" name='mileage' placeholder="Mileage" class="form-control{{ $errors->has('mileage') ? ' is-invalid' : '' }}" required>
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
                            <input type="text" name='co2_emission' placeholder="CO2 emission" class="form-control{{ $errors->has('co2_emission') ? ' is-invalid' : '' }}" required>
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
                                <input type="checkbox" name="featured" id="featured" class="custom-control-input">
                                <label class="custom-control-label" for="featured" style="font-size:13px;">Featured</label>
                            </div>
                        </div>
                        <div class="col-md-1 ml-3">
                            <div class="custom-control custom-checkbox" style="top: 37px;">
                                <input type="checkbox" name="slider" id="slider" class="custom-control-input">
                                <label class="custom-control-label" for="slider" style="font-size:13px;">Slider</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="description">Description:</label>
                            <textarea class="form-control" name="description" id="description" rows="4"></textarea>
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
                            <button type="submit" class="btn btn-outline-primary form-control">Create</button>
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

        // =========== Images upload ==================
        $("#imagesUpload").fileinput({
            theme: 'fa',
            uploadUrl: "/image-view",
            uploadExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),
                };
            },
            allowedFileExtensions: ['jpg', 'png', 'jpeg'],
            overwriteInitial: false,
            maxFileSize:10000,
            maxFilesNum: 15,
            fileActionSettings: {showUpload: false, showRemove: false},
            showUpload: false,
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        }); // =========== Images upload ==================

    $(document).ready(function () {
        $('.dynamic').change( function() {
            if($(this).val() != ''){
                var select = $(this).attr('id');
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('car.model') }}",
                    method: "POST",
                    data: {
                        select:select,
                        value:value,
                        _token:_token,
                        dependent:dependent,
                    },
                    success: function(result) {
                        $('#'+dependent).html(result);
                    },

                })
            }
        });
    });

</script>
@endsection
