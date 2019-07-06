@extends('layouts.master') 

@section('title') 
    My Profile 
@endsection 
@section('content')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url('https://images.unsplash.com/photo-1501236570302-906143a7c9f8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1934&q=80');">
        <h2 class="l-text2 t-center">
            My Profile
        </h2>
    </section>

    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            @if(is_array(session()->get('success')))
                            <ul>
                                @foreach (session()->get('success') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            @if(is_array(session()->get('error')))
                            <ul>
                                @foreach (session()->get('error') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
            <h5 class="mb-3 font-weight-bold">Profile</h5>
            <form action="{{ route('update-profile') }}" method="POST">
                <div class="form-group row">
                    {{ csrf_field() }}
                    <div class="col-sm-12">
                        <label for="">Name</label>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <input class="border-input" type="text" name="name" autocomplete="off" value="{{ auth()->user()->name }}" required>
                    </div>
                    <div class="col-sm-12">
                        <label for="">Email</label>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <input class="border-input mb-3" type="email" name="email" autocomplete="off" value="{{ auth()->user()->email }}" required>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-check mr-2"></i>
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            
            <h5 class="mb-3 font-weight-bold">Change Password</h5>
            <form action="{{ route('change-password') }}" method="POST">
                <div class="form-group row">
                    {{ csrf_field() }}
                    <div class="col-sm-12">
                        <label for="">Old Password</label>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <input class="border-input" type="password" name="oldPassword" autocomplete="off" required>
                    </div>
                    
                    <div class="col-sm-12">
                        <label for="">New Password</label>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <input class="border-input" type="password" name="newPassword" autocomplete="off" required>
                    </div>

                        <div class="col-sm-12">
                        <label for="">Retype Password</label>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <input class="border-input mb-3" type="password" name="rePassword" autocomplete="off" required>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-check mr-2"></i>
                                Confirm
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection