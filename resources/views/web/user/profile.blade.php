@extends('layouts.master') 

@section('title') 
    Profile 
@endsection 
@section('content')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(https://images.unsplash.com/photo-1528399783831-8318d62d10e5?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=f787f39564b0b83c0caa721b9baf4f33&auto=format&fit=crop&w=967&q=80);">
        <h2 class="l-text2 t-center">
            My Profile
        </h2>
    </section>

    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            
            <h4 class="mb-3">Profile</h4>
            <form action="">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Name</label>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <input class="border-input" type="text" name="name" autocomplete="off" required>
                    </div>
                    <div class="col-sm-12">
                        <label for="">Email</label>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <input class="border-input mb-3" type="email" name="email" autocomplete="off" required>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-check mr-2"></i>
                                Save Change
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <h4 class="mb-3">Change Password</h4>
            <form action="">
                <div class="form-group row">
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