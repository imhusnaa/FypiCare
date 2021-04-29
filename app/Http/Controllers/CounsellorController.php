<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CounsellorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users  = User::where('role_id','!=',3)->get();
        return view('admin.counsellor.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.counsellor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validateStore($request);
        $data = $request->all();
        $name = (new User)->userImage($request);
        $data['image'] = $name;
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->back()->with('message','Counsellor added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.counsellor.delete',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.counsellor.edit',compact('user'));
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
        //if user has upload image,
        $this->validateUpdate($request,$id);
        $data = $request->all();
        $user = User::find($id);    //find user by id
        $imageName = $user->image; //get image from user object
        $userPassword = $user->password;
        if($request->hasFile('image')){
            $imageName = (new User)-> userImage($request);
            //remove previous image
            // unlink(public_path('images/'.$user->image));
            
        }

        //if user has not upload image, image in DB will fill or stored in imageName
        $data['image'] = $imageName;
        //user key in new pass
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }else{
            //if leave pass blank or get the same pass in DB
            $data['password'] = $userPassword;
        }
         $user->update($data);
        return redirect()->route('counsellor.index')->with('message','Cousellor updated successfully');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //currently user id is equal to the coming url
        if(auth()->user()->id == $id){
            abort(401); //only auth users can delete themselves
       }
       //if not, find user id
       $user = User::find($id);
       $userDelete = $user->delete();
       //if user delete is success, delete the images
       if($userDelete){
        unlink(public_path('images/'.$user->image));
       }
        return redirect()->route('counsellor.index')->with('message','Counsellor deleted successfully');
    }

    public function validateStore($request){
        return  $this->validate($request,[
            'name'=>'required',
            'phone_number'=>'required|numeric',
            'counsellor_id'=>'required|unique:users',
            'education'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6|max:25',          
            'image'=>'required|mimes:png,jpeg,jpg',
            'role_id'=>'required'

       ]);
    }

    public function validateUpdate($request, $id){
        return  $this->validate($request,[
            'name'=>'required',
            'phone_number'=>'required|numeric',
            'counsellor_id'=>'required|unique:users,counsellor_id,'.$id,
            'education'=>'required',
            'email'=>'required|unique:users,email,'.$id,    //update the same email     
            'image'=>'mimes:png,jpeg,jpg',
            'role_id'=>'required'

       ]);
    }
}
