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
                <div class="col-sm-12 col-md-6 offset-md-3">
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
            <div class="row">
                <div class="col-sm-12 col-md-8 offset-md-2">
                    <h5 class="mb-3 font-weight-bold">Profile</h5>
                    <form action="{{ route('update-profile') }}" method="POST">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <p for="">Name</p>
                                </div>
                                <div class="col-sm-12 col-md-8 mb-3">
                                    <div class="w-100 p-2 bo4 m-b-12">
            							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="name" autocomplete="off" value="{{ auth()->user()->name }}" required>
            						</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <p for="">Email</p>
                                </div>
                                <div class="col-sm-12 col-md-8 mb-3">
                                    <div class="w-100 p-2 bo4 m-b-12">
            							<input class="sizefull s-text7 p-l-15 p-r-15" type="email" name="email" autocomplete="off" value="{{ auth()->user()->email }}" required>
            						</div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-black">
                                            <i class="fas fa-save mr-2"></i>
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-8 offset-md-2">
                    <h5 class="mb-3 font-weight-bold">Change Password</h5>
                    <form action="{{ route('change-password') }}" method="POST">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <p for="">Old Password</p>
                                </div>
                                <div class="col-sm-12 col-md-8 mb-3">
                                    <div class="w-100 p-2 bo4 m-b-12">
            							<input class="sizefull s-text7 p-l-15 p-r-15" type="password" name="oldPassword" autocomplete="off" required>
            						</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <p for="">New Password</p>
                                </div>
                                <div class="col-sm-12 col-md-8 mb-3">
                                    <div class="w-100 p-2 bo4 m-b-12">
            							<input class="sizefull s-text7 p-l-15 p-r-15" type="password" name="newPassword" autocomplete="off" required>
            						</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <p for="">Retype Password</p>
                                </div>
                                <div class="col-sm-12 col-md-8 mb-3">
                                    <div class="w-100 p-2 bo4 m-b-12">
            							<input class="sizefull s-text7 p-l-15 p-r-15" type="password" name="rePassword" autocomplete="off" required>
            						</div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-black">
                                            <i class="fas fa-save mr-2"></i>
                                            Confirm
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
