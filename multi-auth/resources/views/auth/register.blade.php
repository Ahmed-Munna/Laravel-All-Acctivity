@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                        <label for="" class="col-md-3 col-form-label text-md-end">{{__('Birthday Date')}}</label>
                        <div class="col-md-3">
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="BirthDay">
                                <option>Date</option>
                                @for($i = 0; $i<=31; $i++)
                                 <option value="{{__($i)}}">{{__($i)}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="BirthMonth">
                                <option>Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">Octobor</option>
                                <option value="10">Septembor</option>
                                <option value="11">Novembor</option>
                                <option value="12">Decembor</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="BirthYear">
                                <option>Year</option>
                                @for($i=1980;$i<=Carbon\Carbon::now()->format('Y');$i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                                
                            </select>
                        </div>
                        </div>
                        <div class="row mb-3">
                        <div class="col-4"></div>
                            <div class="col-4 col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sports[]"  value="cricket" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Cricket
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" name="sports[]" type="checkbox" value="Football" id="flexCheckChecked" >
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Football
                                    </label>
                                </div>
                            <div class="form-check">
                                    <input class="form-check-input" name="sports[]"  type="checkbox" value="Chess" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Chess
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sports[]" value="Table tanis" id="flexCheckChecked" >
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Table tanis
                                    </label>
                                </div>
                            </div>
                            <div class="col-4"></div>
                        </div>

                        <div class="row md-3">
                            <div class="col-4 col-mb-4"></div>
                            <div class="col-4 col-mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Male
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Female
                                </label>
                                </div>

                            </div>
                            <div class="col-4 col-mb-4"></div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
