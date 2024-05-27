<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $users=User::orderBy('id', 'desc')->paginate(5);
        return view('pages.user.show', compact('users'));
    }

    public function showFormCreate(){
        return view("pages.user.create");
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            "nom" => 'required|max:50',
            "email" => 'required|email|unique:users',
            "pays" => 'required',
            "ville" => 'required|min:5|max:30',
            
            
        ]);
 
        if ($validator->fails()) {
            return redirect()
                        ->route("user.create")
                        ->withErrors($validator)
                        ->withInput();
        }else{
            User::create([
                'name'=>$request->nom,
                'email'=>$request->email,
                'pays'=>$request->pays,
                'ville'=>$request->ville,
            ]);

            return redirect()->route('user.show');
        }
    }

    public function delete(string $id){
        $user=User::findOrFail($id);
        $user->delete();

        return back();
    }

    public function search(Request $request){
        $search = "%".$request->search."%";
        $users = User::where("name", 'like', $search)->paginate(5);

        return view('pages.user.show', compact('users'));
    }

    public function showFormUpdate(string $id){
        $user = User::findOrFail($id);

        return view('pages.user.update', compact('user'));

    }


    public function update(string $id, Request $request){
        $validator = Validator::make($request->all(), [
            "nom" => 'required|max:50',
            "email" => 'required|email',
            "pays" => 'required',
            "ville" => 'required|min:5|max:30',
            
            
        ]);
 
        if ($validator->fails()) {
            return redirect("user/update/$id")
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $user=User::findOrFail($id);

         $user->update([
                'name'=>$request->nom,
                'email'=>$request->email,
                'pays'=>$request->pays,
                'ville'=>$request->ville,
            ]);

            return redirect()->route('user.show');
            }
        }


}
