@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ "Edit1 Country" }}</div>

                <div class="card-body">
                    <form method="POST" id="editForm" action="{{ route('admin.update-country1') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input type='hidden' value="{{ $country->id }}" name="id">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name', $country->name)}}" required >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Country Code') }}</label>
                            <div class="col-md-6">
                            <input id="number" type="text" class="form-control @error('country_code') is-invalid @enderror" name="country_code" value="{{ old('country_code') }}" required>
                          @error('country_code')
                          <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                            </div>
                        </div>

                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ 'Submit' }}
                                </button>
                                <a href="{{url('/admin/countries1')}}" class="btn btn-danger"> {{ 'Cancle' }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    $("#editForm").validate({
        rules: {
            name: "required",
            required: true,
                minlength: 6,
                customDigits: true
        },
        messages: {
            'name': "Title field is required.",
            country_code: {
                required: "Country Code field is required.",
                minlength: "Country Code must be at least 6 digits.",
                customDigits: "Country Code must contain only digits."
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
     });
</script>
@endsection
