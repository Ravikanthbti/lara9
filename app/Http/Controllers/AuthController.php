<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Validator;

 
class AuthController extends Controller
{
    /**
     * Registration Req
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
  
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
  
        $token = $user->createToken('Laravel8PassportAuth')->accessToken;
  
       // return response()->json(['token' => $token], 200);
        return response()->json(['response'=>'Success','token' => $token,'message'=> $user->name. ' '.' Registered successfully!!',$user], 200);
    }
  
    
    public function login(Request $request)
    {
         $credentials = [

                            'email' => $request->email,
                            'password' => $request->password
                        ];
           

                if (Auth::attempt($credentials)) {
                    return response()->json(['response'=>'Success','message'=>'Logged in successfully!!',"user"=>auth()->user()], 200);
                } 

             else{

                    return response()->json(['response'=>'error','message'=>'Invalid email or password'], 200);
                }
    }
 
     public function userInfo() {
            $user = auth()->user();
            return response()->json(['user' => $user], 200);
         
    }

     public function userList() {
                $user= User::all();
                return response()->json(['response'=>'success','message'=>'data list',$user],200);
        }



        public function updateUser(Request $request, $id) {
    
        $validator = Validator::make($request->all(), [
            
            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
           // 'password' => ['required', 'string', 'min:8'],
            //'phone' => ['required','numeric'],
          
         ]);
        
        if ($validator->fails()) {

             return response()->json(['response' =>"error",'message'=>$validator->errors()], 200);
        }
        
        $user=User::findOrFail($id);
 
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => ' with user id ' . $id . ' not found'
            ], 400);
        }
 
      // if($request->hasFile('profile_image')){
        
      //   $image = $request->profile_image;
      //   $filename = $image->getClientOriginalName();
      //   $storagePath='assets/upload/user/'.$filename;
      //   Image::make($image)->save($storagePath);

      //   $hod=User::where('id',$id)
      //  ->update(['profile_image'=>$filename ]);
      //   }

        User::where('id',$id)

       ->update([

                'name'=> $request->name,
                'email'=> $request->email,
                
            ]);

        return response()->json(['response'=>'success','message'=>$request->name .' '. 'updated successfully!!!',$request->all()], 200);

        
    }

     public function showUser($id) {

        $user = User::find($id);

        if (!$user) {

                return response()->json(['response' => "error", 'message' => 'user with id ' . $id . ' not found' ], 200);
            }

        else {

         return response()->json(['response'=>'success','message'=>'specific user info',$user], 200);


            }
    }

    public function destroyUser($id) {
    
            $user=User::find($id);

     
            if (!$user) {
                return response()->json([
                    'response' => "error",
                    'message' => 'user id ' . $id . ' not found'
                ], 400);
            }
     
            if ($user->delete()) {
                return response()->json([
                    'response' => 'successfully deleted'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'user could not be deleted'
                ], 500);
            }
        }
}