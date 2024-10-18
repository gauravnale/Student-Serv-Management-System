<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BusinessDashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role:business']);
    }
    public function checkauth()
    {
        $user = auth()->user();
        return $user;
    }

    public function index()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('businessowner')) {

            $products = Product::where('seller_id', auth()->user()->id)->get();
            $returns = Cart::where(['seller_id' => auth()->user()->id, 'status' => 'returned'])->get();
            return view('business.dashboard', compact('products', 'returns'));
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function addproduct()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('businessowner')) {

            if ($this->checkauth()->hasPermission('manage-products')) {
                return view('business.create-product');
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function storeproduct(Request $request)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('businessowner')) {

            if ($this->checkauth()->hasPermission('manage-products')) {
                $this->validate($request, [
                    'product_name' => 'required|string|min:5',
                    'product_price' => 'required|numeric|min:30',
                    'product_image' => 'required|image|mimes:jpeg,jpg,png|max:20048',
                    'product_description' => 'required|string|min:5',
                    'stock_available' => 'required|numeric|min:1',
                ]);

                $timenow = time();
                $checknum = "1234567898746351937463790";
                $checkstring = "QWERTYUIOPLKJHGFDSAZXCVBNMmanskqpwolesurte";
                $checktimelength = 6;
                $checksnumlength = 6;
                $checkstringlength = 20;
                $randnum = substr(str_shuffle($timenow), 0, $checktimelength);
                $randstring = substr(str_shuffle($checknum), 0, $checksnumlength);
                $randcheckstring = substr(str_shuffle($checkstring), 0, $checkstringlength);
                $totalstring = str_shuffle($randcheckstring . "" . $randnum . "" . $randstring);

                $new = new Product;
                $new->seller_id = auth()->user()->id;
                $new->product_name = $request->product_name;
                $new->price = $request->product_price;
                $new->quantity = $request->stock_available;
                $fileNameWithExt = $request->product_image->getClientOriginalName();
                $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $Extension = $request->product_image->getClientOriginalExtension();
                $filenameToStore = $fileName . '-' . auth()->user()->id . '.' . $Extension;
                $path = $request->product_image->storeAs('products', $filenameToStore, 'public');
                $new->image = $filenameToStore;
                $new->slug = $totalstring;
                $new->description = $request->product_description;
                $new->save();

                Toastr::success('New product uploaded successfully', 'Alert', ["positionClass" => "toast-bottom-right"]);
                return redirect()->route('businessowner.myproducts');
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function myproducts()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('businessowner')) {

            if ($this->checkauth()->hasPermission('manage-products')) {
                $products = Product::where('seller_id', auth()->user()->id)->get();
                return view('business.my-products', compact('products'));
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function editproduct($slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('businessowner')) {

            if ($this->checkauth()->hasPermission('manage-products')) {
                $product = Product::where('seller_id', auth()->user()->id)->where('slug', $slug)->first();
                if ($product) {
                    return view('business.edit-product', compact('product'));
                } else {
                    Toastr::error('Unable to retrieve this product details', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function updateproduct(Request $request, $slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('businessowner')) {

            if ($this->checkauth()->hasPermission('manage-products')) {
                $this->validate($request, [
                    'product_name' => 'required|string|min:5',
                    'product_price' => 'required|numeric|min:30',
                    'product_image' => 'nullable|image|mimes:jpeg,jpg,png|max:20048',
                    'product_description' => 'required|string|min:5',
                    'stock_available' => 'required|numeric|min:1',
                ]);


                $new = Product::where('seller_id', auth()->user()->id)->where('slug', $slug)->first();
                if ($new) {
                    $new->seller_id = auth()->user()->id;
                    $new->product_name = $request->product_name;
                    $new->price = $request->product_price;
                    $new->quantity = $request->stock_available;
                    if ($request->hasFile('product_image')) {
                        Storage::delete('public/products/' . $new->image);
                        $fileNameWithExt = $request->product_image->getClientOriginalName();
                        $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                        $Extension = $request->product_image->getClientOriginalExtension();
                        $filenameToStore = $fileName . '-' . auth()->user()->id . '.' . $Extension;
                        $path = $request->product_image->storeAs('products', $filenameToStore, 'public');
                        $new->image = $filenameToStore;
                    }
                    $new->description = $request->product_description;
                    $new->save();

                    Toastr::success('Product updated successfully', 'Alert', ["positionClass" => "toast-bottom-right"]);
                    return redirect()->route('businessowner.myproducts');
                } else {
                    Toastr::error('Unable to retrieve this product details', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function deleteproduct($slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('businessowner')) {

            if ($this->checkauth()->hasPermission('manage-products')) {
                $product = Product::where('seller_id', auth()->user()->id)->where('slug', $slug)->first();
                if ($product) {
                    Storage::delete('public/products/' . $product->image);
                    $product->delete();
                    Toastr::success('Product deleted successfully', 'Alert', ["positionClass" => "toast-bottom-right"]);
                    return redirect()->route('businessowner.myproducts');
                } else {
                    Toastr::error('Unable to retrieve this product details', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function updateprofile()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('businessowner')) {
            return view('business.update-profile');
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-bottom-right"]);

            return redirect()->route('login');
        }
    }
    public function saveaccountpassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|confirmed|string|min:6|max:20',
            'password_confirmation' => 'required',
        ]);
        $currentpassword = auth()->user()->password;
        if (Hash::check($request->current_password, $currentpassword)) {
            $user = User::find(auth()->user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Toastr::success('Password changed successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        } else {
            Toastr::error('Current password is incorrect', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }

    public function saveaccountemail(Request $request)
    {
        $this->validate($request, [
            'current_email' => 'required',
            'email' => 'required|email|unique:users',
            'confirm_email' => 'required|same:email',
        ]);
        $currentemail = auth()->user()->email;
        if ($request->current_email == $currentemail) {
            $user = User::find(auth()->user()->id);
            $user->email = $request->email;
            $user->save();
            Toastr::success('Email changed successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        } else {
            Toastr::error('Current email is incorrect', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }
    public function allchats()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('businessowner')) {
            $users = User::whereRoleIs('schooladmin')->orWhereRoleIs('business')->get();
            return view('business.open-conversations', compact('users'));
        } else {
            Toastr::error('No authorized to access business dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->route('login');
        }
    }
    public function adverts()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('businessowner')) {
            return view('business.create-advert');
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function storeadvert(Request $request)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('businessowner')) {
            $this->validate($request, [
                'advert_name' => 'required|string|min:5',
                'advert_price' => 'required|numeric|min:30',
                'advert_image' => 'required|image|mimes:jpeg,jpg,png|max:20048',
                'advert_description' => 'required|string|min:5',
            ]);

            $timenow = time();
            $checknum = "1234567898746351937463790";
            $checkstring = "QWERTYUIOPLKJHGFDSAZXCVBNMmanskqpwolesurte";
            $checktimelength = 6;
            $checksnumlength = 6;
            $checkstringlength = 20;
            $randnum = substr(str_shuffle($timenow), 0, $checktimelength);
            $randstring = substr(str_shuffle($checknum), 0, $checksnumlength);
            $randcheckstring = substr(str_shuffle($checkstring), 0, $checkstringlength);
            $totalstring = str_shuffle($randcheckstring . "" . $randnum . "" . $randstring);

            $new = new Advert;
            $new->seller_id = auth()->user()->id;
            $new->product_name = $request->advert_name;
            $new->price = $request->advert_price;
            $fileNameWithExt = $request->advert_image->getClientOriginalName();
            $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $Extension = $request->advert_image->getClientOriginalExtension();
            $filenameToStore = $fileName . '-' . time() . '.' . $Extension;
            $path = $request->advert_image->storeAs('products', $filenameToStore, 'public');
            $new->image = $filenameToStore;
            $new->slug = $totalstring;
            $new->description = $request->advert_description;
            $new->save();

            Toastr::success('New Advert uploaded successfully', 'Alert', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('businessowner.myadverts');
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function updateadvert(Request $request, $slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('businessowner')) {
            $this->validate($request, [
                'advert_name' => 'required|string|min:5',
                'advert_price' => 'required|numeric|min:30',
                'advert_image' => 'nullable|image|mimes:jpeg,jpg,png|max:20048',
                'advert_description' => 'required|string|min:5',
            ]);



            $new = Advert::where('slug', $slug)->first();
            $new->seller_id = auth()->user()->id;
            $new->product_name = $request->advert_name;
            $new->price = $request->advert_price;
            if ($request->hasFile('advert_image')) {
                Storage::delete('public/products/' . $new->image);
                $fileNameWithExt = $request->advert_image->getClientOriginalName();
                $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $Extension = $request->advert_image->getClientOriginalExtension();
                $filenameToStore = $fileName . '-' . time() . '.' . $Extension;
                $path = $request->advert_image->storeAs('products', $filenameToStore, 'public');
                $new->image = $filenameToStore;
            }

            $new->description = $request->advert_description;
            $new->save();
            Toastr::success('New Advert uploaded successfully', 'Alert', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('businessowner.myadverts');
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function myadverts()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('businessowner')) {
            $adverts = Advert::where('seller_id', auth()->user()->id)->get();
            return view('business.my-adverts', compact('adverts'));
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->route('login');
        }
    }
    public function alladverts()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('businessowner')) {
            $adverts = Advert::where('seller_id', '!=',  auth()->user()->id)->get();
            return view('business.all-adverts', compact('adverts'));
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->route('login');
        }
    }
    public function advertdetails($slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('businessowner')) {
            $advert = Advert::where('seller_id', auth()->user()->id)->where('slug', $slug)->first();
            if ($advert) {
                return view('business.advert-details', compact('advert'));
            } else {
                Toastr::error('Unable to retrieve Advert details', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->route('login');
        }
    }
    public function deleteadvert($slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('businessowner')) {
            $advert = Advert::where('seller_id', auth()->user()->id)->where('slug', $slug)->first();
            if ($advert) {
                Storage::delete('public/adverts/' . $advert->image);
                $advert->delete();
                Toastr::error('Advert deleted successfully', 'Error', ["positionClass" => "toast-bottom-right"]);
                return redirect()->back();
            } else {
                Toastr::error('Unable to retrieve Advert details', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->route('login');
        }
    }
    public function returnedcheck($slug){
        // dd("dekmekde");
        $this->checkauth();
        if (auth()->user()->hasRole('businessowner')) {
            $product = Cart::where(['seller_id' => auth()->user()->id, 'id' => $slug])->first();
            if($product){
                $product->status="completed";
                $product->save();
                Toastr::error('Product  Notified to the student', 'Error', ["positionClass" => "toast-top-right"]);

                return redirect()->back();
            }else{

                Toastr::error('Product not found', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }

        } else {
            Toastr::error('No authorized to access student dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->route('login');
        }
    }
}
