<?php

namespace App\Http\Controllers;

use App\Buyers;
use App\Category;
use App\ImgItems;
use App\ImgUsers;
use App\Orders;
use App\Products;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Orders::where("user_id", Auth::user()->id)->get();
        $items = Products::where("user_id", Auth::user()->id)->get();
        $category=Category::all();
        $user_img = ImgUsers::where('key', Auth::user()->id)->first();

        $info = Auth::user();

        return view('profile')->with('orders', $orders)->with('items', $items)->with('info', $info)->with('image', $user_img)->with('category',$category);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function changePass(Request $request)
    {
        $user = Auth::user();
        $pass = $user->password;
        $this->validPassword($request);
        if (!(Hash::check($request->input('current-password'), $user->password))) {
            return response(["error" => "Incorrectly current password"]);
        }
        $user->password = Hash::make($request->input('new-password'));
        $user->save();
        return response()->json(['success' => 'Успішно']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    public function changeImg(Request $request)
    {
        $this->validImage($request);
        $user = Auth::user()->id;
        $img_usr = ImgUsers::where('key', $user)->first();
        if ($request->hasFile('image')) {
            if ($img_usr) {
                $delete = Storage::delete($img_usr->name);
            } else {
                $img_usr = new ImgUsers;
                $img_usr->key = $user;
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $date = Carbon::now()->format('dmY');
            $name = $user . $date . '.' . $ext;
            $path = Storage::putFileAs('public/uploads/user_img/' . $user . '/', $file, $name);
            $img_usr->name = '/storage/uploads/user_img/' . $user . '/' . $name;
            $img_usr->type = '.' . $ext;
            $img_usr->size = $file->getSize();
            $img_usr->save();
        }
        return back();
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function addItem(Request $request)
    {
        $this->validItem($request);
        $this->validImage($request);

        $user = Auth::user()->id;
        $item = new Products;
        $item->article = $request->title . $user . Str::random(5);
        $item->name = $request->title;
        $item->description = $request->description;
        $item->category_id = $request->category;
        $item->width = $request->width;
        $item->height = $request->height;
        $item->user_id = $user;
        $item->price = $request->price;
        $item->auction = 1;
        $item->save();
        if ($request->hasFile('image')) {
            foreach ($request->file("image") as $key => $file) {
                $img_item = new ImgItems;
                $ext = $file->getClientOriginalExtension();
                $date = Carbon::now()->format('dmY');
                $name = $user . $date . $key.Str::random(3) . '.' . $ext;
                $path = Storage::putFileAs('public/uploads/post_img/' . $user . '/', $file, $name);
                $img_item->name = '/storage/uploads/post_img/' . $user . '/' . $name;
                $img_item->key = $item->id;
                $img_item->type = '.' . $ext;
                $img_item->size = $file->getSize();
                $img_item->save();
            }
        }
        return Redirect::back();
    }

    /**
     * @param $id_item
     * @param $user_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function dellItem($id_item, $user_id)
    {
        $user = Auth::user()->id;
        if ($user_id == $user) {
            $item = Products::find($id_item);
            $item->delete();
        }
        return Redirect::back();
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function validImage($request)
    {
        try {
            $this->validate($request, [
                'image' => 'required',
                'image.*' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Image error']);
        }
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function validPassword($request)
    {
        try {
            $this->validate($request, [
                'current-password' => ['required', 'min:6'],
                'new-password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Incorrectly filled fields']);
        }
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function validItem($request)
    {
        try {
            $this->validate($request, [
                'title' => ['required', 'min:3'],
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Error title!']);
        }
        try {
            $this->validate($request, [
                'description' => ['required', 'string', 'min:124'],
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Error Description!']);
        }
        try {
            $this->validate($request, [
                'category' => ['required'],
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Please change category!']);
        }
    }
    public function changeTel(Request $request){
        $user = Auth::user();
        $user->tel_number = $request->tel;
        $user->save();
        return response()->json(['success' => 'Success','res'=>$request->tel]);
    }
    public function changeBirthday(Request $request){
        $user = Auth::user();
        $user->birthday = $request->birthday;
        $user->save();
        return response()->json(['success' => 'Success','res'=>$request->birthday]);
    }
    public function changeCity(Request $request){
        $user = Auth::user();
        $user->location = $request->city;
        $user->save();
        return response()->json(['success' => 'Success','res'=>$request->city]);
    }
}
