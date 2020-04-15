<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use Auth;
class AdminController extends Controller
{
    //
    public function admin()
    {
        return view('admin');
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
    function add(Request $request) {
        $add = new produit();

        $add->name = $request->get('name');
        $add->user_id = $request->get('id');
        $add->type = $request->get('type');
        $add->description = $request->get('description');
        $add->image = $request->get('img');
        $add->price = $request->get('price');

        $this->validate($request, ['image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048']);
        $Picture = request('image');
        $name = rand() . '.' . $Picture ->getClientOriginalExtension();
        $Picture->move(public_path('img'), $name);
        $add->image = $name;

        $add->save();

        return redirect()->action('HomeController@produit');
    }
}
