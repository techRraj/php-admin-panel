@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ "Create Bank" }}</div>

                <div class="card-body">
                    <form method="POST" id="createForm" action="{{ route('admin.store-banks2') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="BankName" class="col-md-4 col-form-label text-md-right">{{ __('Bank') }}</label>

                            <div class="col-md-6">
                                <input id="BankName" type="text" class="form-control @error('BankName') is-invalid @enderror" name="BankName" value="{{ old('BankName') }}" required>

                                @error('BankName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="BankCode" class="col-md-4 col-form-label text-md-right">{{ __('BankCode') }}</label>

                            <div class="col-md-6">
                                <input id="BankCode" type="text" class="form-control @error('BankCode') is-invalid @enderror" name="BankCode" value="{{ old('BankCode') }}" required>

                                @error('BankCode')
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
                                <a href="{{ url('/admin/banks') }}" class="btn btn-danger"> {{ 'Cancel' }}</a>
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

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
     $.validator.addMethod("customDigits", function(value, element) {
        return /^[0-9]+$/.test(value);
    }, "Please enter only digits.");

  $("#createForm").validate({
    rules: {
        BankName: "required",
        BankCode: {
            required: true,
            minlength: 6,
            customDigits: true
        }
    },
    messages: {
        'BankName': "Bank field is required",
        'BankCode': {
            required: "BankCode Code field is required.",
            minlength: "BankCode Code must be at least 6 digits.",
            customDigits: "BankCode Code must contain only digits."
        }
    },
    submitHandler: function(form) {
        form.submit();
    }
});
</script>
@endsection
