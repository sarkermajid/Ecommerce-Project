<?php

namespace App\Http\Controllers;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{

    public function __construct()
    {
        $this->Middleware('checkuser')->only('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $uname = $request->has('uname')? $request->get('uname'):'';
        $pass = $request->has('pass')? $request->get('pass'):'';

        $userInfo = User::where('name','=',$uname)->where('password','=',$pass)->first();

        if(isset($userInfo) && $userInfo!=null){
            $product_controller = new ProductController();
            return $product_controller->addProduct();
            // return redirect('/admin_products');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'uname'=> 'required|max:50',
            'email'=> 'required|max:100|unique:users',
            'mobile'=> 'numeric|min:11',
            'pass'=> 'required|min:6'
        ]);

        User::insert([
            'name' => $request->has('uname')? $request->get('uname'):'',
            'email' => $request->has('email')? $request->get('email'):'',
            'mobile' => $request->has('mobile')? $request->get('mobile'):'',
            'password' => $request->has('pass')? $request->get('pass'):'',

        ]);

        return redirect('/admin_products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
