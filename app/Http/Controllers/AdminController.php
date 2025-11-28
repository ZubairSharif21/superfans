<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Package_includes;
use App\Models\User;
use App\Models\Modal;
use App\Models\Cart;
use App\Models\Cart_detail;
use App\Models\Assets;
use App\Models\Subscription;
use App\Models\water_mark;
use App\Models\Coupon;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    function index() {
       
        
        $Cart = Cart::where('payment_status',1)->get();
        $order_count = count($Cart);

        $Users = User::where('role','!=','admin')->where('role','!=','dummy')->get();
        $Users_count = count($Users);

        $Subscriptions = Subscription::all();
        $Subscriptions_count = count($Subscriptions);

        return view('admin.index',['order_count'=>$order_count,'Users_count'=>$Users_count,'Subscriptions_count'=>$Subscriptions_count]);


    }
    

    function packages() {
        $Packages = Package::all();
        return view('admin.packages',['Packages'=>$Packages]);
    }

    function edit_package($id) {
        $Package = Package::find($id);

        $Package_includes = Package_includes::where('package_id',$id)->first();

        return view('admin.edit_package',['Package'=>$Package,'Package_includes'=>$Package_includes]);
    }


    
    function update_package(Request $request) {
        $Package = Package::find($request->id);
        $Package->name = $request->name;
        $Package->price = $request->price;
        $Package->desc = $request->desc;
        $Package->duration = $request->duration;
        $Package->duration_unit = $request->duration_unit;
        $Package->save();

        $Package_includes = Package_includes::where('package_id',$request->id)->first();
        $Package_includes->Available = $request->Available;
        $Package_includes->Unlimited = $request->Unlimited;
        $Package_includes->twenty_four_hour_Free = $request->twenty_four_hour_Free;
        $Package_includes->Free = $request->Free;
        $Package_includes->save();
        

        return redirect('/admin/packages')->with('message', 'Package updated successfully');
    }



    function users() {
        $Users = User::where('role','!=','admin')->where('role','!=','dummy')->get();
        return view('admin.users',['Users'=>$Users]);
    }
    

    function delete_user($id) {
        $User = User::find($id);
        $User->delete();

        return redirect('/admin/users')->with('message', 'User deleted successfully');
    }

    function edit_user($id) {
        $User = User::find($id);


        return view('admin.edit_user',['User'=>$User]);
    }
    

    function update_user(Request $request) {
        $User = User::find($request->id);
        $User->name = $request->name;
        $User->email = $request->email;
        $User->save();


        return redirect('/admin/users')->with('message', 'User updated successfully');
    }


    function orders() {
        $Orders = Cart::where('payment_status',1)->orderBy('id', 'DESC')->get();

       

        return view('admin.orders',['Orders'=>$Orders]);
    }


    function view_order_details($id) {
        $Order = Cart::find($id);


        return view('admin.view_order_details',['Order'=>$Order]);
    }


    function models() {
        $Modals = Modal::all();

        return view('admin.models',['Modals'=>$Modals]);
    }

    function add_model() {
        
        
        return view('admin.add_model');
    }



    function add_new_model(Request $request) {
        
        $Model = new Modal();
        $Model->name = $request->name;
        $Model->price = $request->price;

        if($request->icon != "")
        {

            $imageName = rand(1,10).$request->icon->getClientOriginalName();
            // $imagePath = $request->icon->move(public_path('assets/images'), $imageName);
            $imagePath = $request->icon->move('assets/images', $imageName);
            $Model->icon = $imageName;

        }


        if($request->icon_off != "")
        {

            $imageName = $request->icon_off->getClientOriginalName();
            $imagePath = $request->icon_off->move('assets/images', $imageName);
            $Model->icon_off = $imageName;
        } else {
            $Model->icon_off = $imageName;
        }




        if($request->image != "")
        {

            $imageName = rand(10,100).'.'.$request->image->getClientOriginalName();
            $imagePath = $request->image->move('assets/images', $imageName);
            $Model->image = $imageName;
            
        }
    

    
    

    
       
        
        $Model->save();


        return redirect('/admin/models')->with('message', 'Model added successfully');
    }



    function edit_modal($id) {
        $Modal = Modal::find($id);

        

        return view('admin.edit_modal',['Modal'=>$Modal]);
    }

    function update_model(Request $request) {
        
        $Model = Modal::find($request->id);

        $Model->name = $request->name;
        $Model->price = $request->price;

        if($request->icon != "")
        {

            $imageName = rand(1,10).$request->icon->getClientOriginalName();
            $imagePath = $request->icon->move('assets/images', $imageName);
            $Model->icon = $imageName;

        }


        if($request->use_on_image == "on") {
            
            if($request->icon != "") {
                $imageName = $request->icon->getClientOriginalName();
                $imagePath = $request->icon->move('assets/images', $imageName);
                $Model->icon = $imageName;
            } else {
                $Model->icon_off = $Model->icon;
            }
        } else {
            if($request->icon_off != "")
            {
    
                $imageName = $request->icon_off->getClientOriginalName();
                $imagePath = $request->icon_off->move('assets/images', $imageName);
                $Model->icon_off = $imageName;
            }
        }




        if($request->image != "")
        {

            $imageName = rand(10,100).'.'.$request->image->getClientOriginalName();
            $imagePath = $request->image->move('assets/images', $imageName);
            $Model->image = $imageName;
            
        }

        $Model->save();
    
        

        return redirect('/admin/models')->with('message', 'Model updated successfully');
    }



    function delete_modal($id) {
        $Model = Modal::find($id);
        $Model->delete();

        return redirect('/admin/models')->with('message', 'Model deleted successfully');
    }






    function filter_orders(Request $request) {
        

        $Orders = Cart::where('payment_status',1)->where('updated_at','<',$request->to_date)->where('updated_at','>',$request->from_date)->orderBy('id', 'DESC')->get();
        
        $response_var="";
        $index = 0;
        foreach($Orders as $Order)
        {
            
            $user = User::where('id',$Order->user_id)->first();

            $modals = Modal::where('id',$Order->modal_id)->first();
            

            $index = $index + 1;
            $name = $user->name;
            $price = $modals->price;
            $updated_at = $Order->updated_at;
            $response_var .= "<tr><td>".$index."</td><td>".$name."</td><td>$".$price."</td><td>".$updated_at."</td><td><a class='btn btn-success' href='view_order_details/".$Order->id."'>View
            Details</a></td></tr>";
        }
        
        return response($response_var);
        // return response()->json($Withdraws);
    }



    function assets() {
        $Assets = Assets::all();
        $water_marks = water_mark::all();


        return view('admin.assets',['Assets'=>$Assets,'water_marks'=>$water_marks]);
    }


    function add_asset() {     
        $Assets = Assets::all();

        return view('admin.add_asset',['Assets'=>$Assets]);
    }


    function add_watermark() {
        return view('admin.add_watermark');
    }

    function add_new_watermark(Request $request) {

        if($request->watermark != "")
        {
            $water_mark = new water_mark();

            $imageName = $request->watermark->getClientOriginalName();
            $imagePath = $request->watermark->move('assets/images', $imageName);
            $water_mark->image = $imageName;

            $water_mark->save();

            return redirect('/admin/assets')->with('message', 'Watermark added successfully');
             
        } else {
            return redirect('/admin/assets')->with('message', 'Watermark not added');
        }
        

    }

    function edit_watermark($id) {
        $water_mark = water_mark::find($id);


        

        return view('admin.edit_watermark',['water_mark'=>$water_mark]);
    }

    function update_watermark(Request $request) {
        
        
        
        if($request->watermark != "")
        {
            $water_mark = water_mark::find($request->id);

            $imageName = $request->watermark->getClientOriginalName();
            $imagePath = $request->watermark->move('assets/images', $imageName);
            $water_mark->image = $imageName;

            $water_mark->save();

           
             
        }
       


        return redirect('/admin/assets')->with('message', 'Watermark updated successfully');
    }

    function delete_watermark($id) {
        $water_mark = water_mark::find($id);
        $water_mark->delete();

        return redirect('/admin/assets')->with('message', 'Watermark deleted successfully');
    }

    function add_new_asset(Request $request) {
        
        $Assets = new Assets();
        $Assets->name = $request->name;
        

        if($request->parent != "")
        {
            $Assets->parent = $request->parent;    
        }



        if($request->icon != "")
        {

            $imageName = $request->icon->getClientOriginalName();
            $imagePath = $request->icon->move('assets/images', $imageName);
            $Assets->icon = $imageName;

        }

       
        if($request->icon_off != "")
        {

            $imageName = $request->icon_off->getClientOriginalName();
            $imagePath = $request->icon_off->move('assets/images', $imageName);
            $Assets->icon_off = $imageName;
        } else {
            $Assets->icon_off = $imageName;
        }

       
        if($request->image != "")
        {

            $imageName = $request->image->getClientOriginalName();
            $imagePath = $request->image->move('assets/images', $imageName);
            $Assets->image = $imageName;
            
        }
    

    
    

    
       
        
        $Assets->save();


        return redirect('/admin/assets')->with('message', 'Asset added successfully');
    }

    function edit_asset($id) {
        $Asset = Assets::find($id);


        $Assets = Assets::all();

        

        return view('admin.edit_asset',['Asset_updated'=>$Asset,'Assets'=>$Assets]);
    }

    function update_asset(Request $request) {
        
        $Assets = Assets::find($request->id);
        
        
        if($request->name != "")
        {
            $Assets->name = $request->name;    
        }

        if($request->parent != "")
        {
            $Assets->parent = $request->parent;    
        }


        if($request->icon != "")
        {

            $imageName = $request->icon->getClientOriginalName();
            $imagePath = $request->icon->move('assets/images', $imageName);
            $Assets->icon = $imageName;

        }


        

        if($request->use_on_image == "on") {
            
            if($request->icon != "") {
                $imageName = $request->icon->getClientOriginalName();
                $imagePath = $request->icon->move('assets/images', $imageName);
                $Assets->icon = $imageName;
            } else {
                $Assets->icon_off = $Assets->icon;
            }
        } else {
            if($request->icon_off != "")
            {
    
                $imageName = $request->icon_off->getClientOriginalName();
                $imagePath = $request->icon_off->move('assets/images', $imageName);
                $Assets->icon_off = $imageName;
            }
        }

       


        if($request->image != "")
        {

            $imageName = $request->image->getClientOriginalName();
            $imagePath = $request->image->move('assets/images', $imageName);
            $Assets->image = $imageName;
            
        }
    

    
    

    
       
        
        $Assets->save();


        return redirect('/admin/assets')->with('message', 'Asset updated successfully');
    }


    function delete_asset($id) {
        $Assets = Assets::find($id);
        $Assets->delete();
        
        $Cart_detail = Cart_detail::where('asset_id',$id);
        $Cart_detail->delete();

        return redirect('/admin/assets')->with('message', 'Asset deleted successfully');
    }


    

    function change_z_index(Request $request) {
        $Assets = Assets::find($request->id);
        $Assets->z_index = $request->z_index_val;
        $Assets->save();


    }



    function coupons() {
        $Coupons = Coupon::all();

       

        return view('admin.coupons',['Coupons'=>$Coupons]);
    }


    
    function add_coupon() {

        return view('admin.add_coupon');
    }



    function add_new_coupon(Request $request) {
        
        $Coupon = new Coupon();
        $Coupon->name = $request->name;
        $Coupon->code = $request->code;
        $Coupon->amount = $request->amount;
        $Coupon->type = $request->type;
        $Coupon->expiry_date = $request->expiry_date;

        if($request->limit_one == 1)
        {
            $Coupon->limit_one = $request->limit_one;
        }

        $Coupon->save();

        return redirect('/admin/coupons')->with('message', 'Coupon added successfully');

    }


    function edit_coupon($id) {
        $Coupon = Coupon::find($id);

        return view('admin.edit_coupon',['Coupon'=>$Coupon]);
    }


    function update_coupon(Request $request) {
        $Coupon = Coupon::find($request->id);
        $Coupon->name = $request->name;
        $Coupon->code = $request->code;
        $Coupon->amount = $request->amount;
        $Coupon->type = $request->type;
        $Coupon->expiry_date = $request->expiry_date;
        $Coupon->limit_one = $request->limit_one;
        $Coupon->save();

        return redirect('/admin/coupons')->with('message', 'Coupon updated successfully');

    }




    
    function delete_coupon($id) {
        $Coupon = Coupon::find($id);
        $Coupon->delete();

        return redirect('/admin/coupons')->with('message', 'Coupon deleted successfully');

    }






}
