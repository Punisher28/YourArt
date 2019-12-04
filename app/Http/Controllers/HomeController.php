<?php

namespace App\Http\Controllers;

use App\Buyers;
use App\ImgUsers;
use App\Orders;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
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
        $buyers = Buyers::where("user_id", Auth::user()->id)->get();
        $user_img=ImgUsers::where('key',Auth::user()->id)->first();

        $info = Auth::user();

        return view('profile')->with('orders', $orders)->with('buyers', $buyers)->with('info', $info)->with('image',$user_img);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     *
     */
    public function changePass(Request $request)
    {
        $user = Auth::user();
        $pass = $user->password;
        try {
            $this->validate($request, [
                'current-password' => ['required', 'min:6'],
                'new-password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Неправильно заповнені поля']);
        }
        if (!(Hash::check($request->input('current-password'), $user->password))) {
            return response(["error" => "Невірний поточний пароль"]);
        }
        $user->password = Hash::make($request->input('new-password'));
        $user->save();
        return response()->json(['success' => 'Успішно']);
    }

    public function fetchTables(){
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            foreach ($table as $key => $value)
                echo $value;
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    public function changeImg(Request $request)
    {
        $this->validate($request, [
            'userImg' => 'required',
            'userImg.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $user = Auth::user()->id;
        $img_usr = ImgUsers::where('key', $user)->first();
        if ($request->hasFile('userImg')) {
            if($img_usr) {
                $delete = Storage::delete($img_usr->name);
            }else{
                $img_usr= new ImgUsers;
                $img_usr->key=$user;
            }
            $file = $request->file('userImg');
            $ext = $file->getClientOriginalExtension();
            $date = Carbon::now()->format('dmY');
            $name=$user . $date . '.' . $ext;
            $path = Storage::putFileAs('public/uploads/user_img', $file,$name );
            $img_usr->name ='/storage/uploads/user_img/'.$name;
            $img_usr->type = '.' . $ext;
            $img_usr->size = $file->getSize();
            $img_usr->save();
        }
        return back();
    }
}
