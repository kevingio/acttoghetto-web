<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Brand $brand, User $user)
    {
        $this->brand = $brand;
        $this->user = $user;
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $brandsForMan = $this->brand->where('type', 'man')->orderBy('name')->get();
        $brandsForWoman = $this->brand->where('type', 'woman')->orderBy('name')->get();
        return view('web.home', compact('brandsForMan', 'brandsForWoman'));
    }

    /**
     * Show user profile
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProfile()
    {
        return view('web.user.profile');
    }

    /**
     * Change user profile
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateProfile(Request $request)
    {
        $data = $request->all();
        $this->user->find(auth()->id())->update($data);
        return redirect()->route('show-profile')->withSuccess(['Profile berhasil diupdate!']);
    }

    /**
     * Change user password
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changePassword(Request $request)
    {
        $data = $request->all();
        if(Hash::check($data['oldPassword'], auth()->user()->password)) {
            if($data['newPassword'] == $data['rePassword']) {
                $this->user->find(auth()->id())->update([
                    'password' => Hash::make($data['newPassword'])
                ]);
                return redirect()->route('show-profile')->withSuccess(['Password berhasil diganti!']);
            }
        }
        return redirect()->route('show-profile')->withError(['Password gagal diganti!']);
    }
}
