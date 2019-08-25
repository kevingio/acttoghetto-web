<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\User;
use App\Models\Banner;
use App\Models\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Brand $brand, User $user, Banner $banner, Collection $collection)
    {
        $this->brand = $brand;
        $this->user = $user;
        $this->banner = $banner;
        $this->middleware(['auth', 'role:3'], ['except' => ['index', 'landing', 'showLookbook']]);
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
        $banners = $this->banner->get();
        return view('web.home', compact('brandsForMan', 'brandsForWoman', 'banners'));
    }

    /**
     * Show the application landing page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function landing()
    {
        return view('web.landing');
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
     * Show look book
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showLookbook($volume)
    {
        $collection = $this->collection->where('volume', $volume)->oldest()->get();
        if(sizeof($collection) === 0) {
            abort(404);
        }
        return view('web.collection.index', compact('collection'));
    }

    /**
     * Show user cart
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function myCart()
    {
        return view('web.user.checkout');
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
