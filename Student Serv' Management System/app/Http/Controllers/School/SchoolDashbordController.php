<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\Business;
use App\Models\Club;
use App\Models\ClubMember;
use App\Models\Post;
use App\Models\Product;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Ui\Presets\React;

class SchoolDashbordController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:schooladmin']);
    }
    public function checkauth()
    {
        $user = auth()->user();
        return $user;
    }

    public function index()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            $school = School::where('manager_id', auth()->user()->id)->first();
            $students = Student::where('school_id', $school->id)->get();
            $clubs = Club::where('admin_id', auth()->user()->id)->get();
            $products = Product::all();
            $adverts = Advert::all();
            return view('school.dashboard', compact('students', 'clubs', 'products', 'adverts'));
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-bottom-right"]);

            return redirect()->route('login');
        }
    }
    public function deletestudent($slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            $student = Student::where('slug', $slug)->first();
            if ($student) {
                $student->delete();
                Toastr::error('You have deleted student record from your school', 'Error', ["positionClass" => "toast-bottom-right"]);
                return redirect()->back();
            } else {
                Toastr::error('Student details not found', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-bottom-right"]);

            return redirect()->route('login');
        }
    }
    public function updateprofile()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {



            return view('school.update-profile');
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
        if (auth()->user()->hasRole('schooladmin')) {



            $users = User::whereRoleIs('school')->orWhereRoleIs('businessowner')->get();
            return view('school.open-conversations', compact('users'));
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function addclub()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            if ($this->checkauth()->hasPermission('manage-clubs')) {
                return view('school.create-club');
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access school admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function storeclub(Request $request)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            if ($this->checkauth()->hasPermission('manage-clubs')) {
                $this->validate($request, [
                    'club_name' => 'required|string|min:5',
                    'club_image' => 'required|image|mimes:jpeg,jpg,png|max:20048',
                    'club_description' => 'required|string|min:5',
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

                $checkschool = School::where('manager_id', auth()->user()->id)->first();
                $new = new Club;
                $new->admin_id = auth()->user()->id;
                $new->school_id = $checkschool->id;
                $new->club_name = $request->club_name;
                $fileNameWithExt = $request->club_image->getClientOriginalName();
                $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $Extension = $request->club_image->getClientOriginalExtension();
                $filenameToStore = $fileName . '-' . time() . '.' . $Extension;
                $path = $request->club_image->storeAs('clubs', $filenameToStore, 'public');
                $new->image = $filenameToStore;
                $new->slug = $totalstring;
                $new->description = $request->club_description;
                $new->save();

                Toastr::success('New club uploaded successfully', 'Alert', ["positionClass" => "toast-bottom-right"]);
                return redirect()->route('schooladmin.myclubs');
            } else {
                Toastr::error('No permission to access club page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access school admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }

    public function myclubs()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            if ($this->checkauth()->hasPermission('manage-clubs')) {
                $clubs = Club::where('admin_id', auth()->user()->id)->get();
                $school = School::where('manager_id', auth()->user()->id)->first();
                return view('school.all-club', compact('clubs', 'school'));
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access school admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function editclub($slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            if ($this->checkauth()->hasPermission('manage-clubs')) {
                $club = Club::where('admin_id', auth()->user()->id)->where('slug', $slug)->first();
                if ($club) {
                    return view('school.club-details', compact('club'));
                } else {
                    Toastr::error('Unable to retrieve Club details', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access school admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function updateclub(Request $request, $slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            if ($this->checkauth()->hasPermission('manage-clubs')) {
                $this->validate($request, [
                    'club_name' => 'required|string|min:5',
                    'club_image' => 'nullable|image|mimes:jpeg,jpg,png|max:20048',
                    'club_description' => 'required|string|min:5',
                ]);


                $checkschool = School::where('manager_id', auth()->user()->id)->first();
                $new = Club::where('slug', $slug)->first();
                $new->admin_id = auth()->user()->id;
                $new->school_id = $checkschool->id;
                $new->club_name = $request->club_name;
                if ($request->hasFile('club_image')) {
                    Storage::delete('public/clubs/' . $new->image);
                    $fileNameWithExt = $request->club_image->getClientOriginalName();
                    $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    $Extension = $request->club_image->getClientOriginalExtension();
                    $filenameToStore = $fileName . '-' . time() . '.' . $Extension;
                    $path = $request->club_image->storeAs('clubs', $filenameToStore, 'public');
                    $new->image = $filenameToStore;
                }


                $new->description = $request->club_description;
                $new->save();

                Toastr::success('Club Updated successfully', 'Alert', ["positionClass" => "toast-bottom-right"]);
                return redirect()->route('schooladmin.myclubs');
            } else {
                Toastr::error('No permission to access club page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access school admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function deleteclub($slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            if ($this->checkauth()->hasPermission('manage-clubs')) {
                $club = Club::where('admin_id', auth()->user()->id)->where('slug', $slug)->first();
                if ($club) {
                    Storage::delete('public/clubs/' . $club->image);
                    $club->delete();
                    Toastr::success('Club deleted successfully', 'Alert', ["positionClass" => "toast-bottom-right"]);
                    return redirect()->route('schooladmin.myclubs');
                } else {
                    Toastr::error('Unable to retrieve Club details', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access school admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function deregisterstudent($slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            if ($this->checkauth()->hasPermission('manage-clubs')) {
                $club = ClubMember::where('id', $slug)->first();
                if ($club) {
                    $club->delete();
                    Toastr::success('Student Deregistsred  successfully', 'Alert', ["positionClass" => "toast-bottom-right"]);
                    return redirect()->back();
                } else {
                    Toastr::error('Unable to retrieve Club details', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access school admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function viewstudentsubscribers($slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            if ($this->checkauth()->hasPermission('manage-clubs')) {
                $club = Club::where('admin_id', auth()->user()->id)->where('slug', $slug)->first();
                if ($club) {
                    $school = School::where('manager_id', auth()->user()->id)->first();
                    $students = ClubMember::where('school_id', $school->id)->where('club_id', $club->id)->get();
                    return view('school.all-club-subscribers', compact('students', 'club', 'school'));
                } else {
                    Toastr::error('Unable to retrieve Club details', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access school admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function allposts()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            if ($this->checkauth()->hasPermission('manage-posts')) {
                $posts = Post::where('admin_id', auth()->user()->id)->get();
                return view('school.all-posts', compact('posts'));
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access school admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function createpost()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            if ($this->checkauth()->hasPermission('manage-posts')) {

                return view('school.create-post');
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access school admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function storepost(Request $request)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            if ($this->checkauth()->hasPermission('manage-posts')) {
                $this->validate($request, [
                    'post_title' => 'required|string|min:5',
                    'post_image' => 'required|image|mimes:jpeg,jpg,png|max:20048',
                    'post_description' => 'required|string|min:5',
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

                $checkschool = School::where('manager_id', auth()->user()->id)->first();
                $new = new Post;
                $new->admin_id = auth()->user()->id;
                $new->school_id = $checkschool->id;
                $new->post_title = $request->post_title;
                $fileNameWithExt = $request->post_image->getClientOriginalName();
                $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $Extension = $request->post_image->getClientOriginalExtension();
                $filenameToStore = $fileName . '-' . time() . '.' . $Extension;
                $path = $request->post_image->storeAs('posts', $filenameToStore, 'public');
                $new->image = $filenameToStore;
                $new->slug = $totalstring;
                $new->description = $request->post_description;
                $new->save();

                Toastr::success('New post uploaded successfully', 'Alert', ["positionClass" => "toast-bottom-right"]);
                return redirect()->route('schooladmin.myposts');
            } else {
                Toastr::error('No permission to access club page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access school admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function editpost($slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            if ($this->checkauth()->hasPermission('manage-posts')) {
                $post = Post::where('admin_id', auth()->user()->id)->where('slug', $slug)->first();
                if ($post) {
                    return view('school.edit-post-details', compact('post'));
                } else {
                    Toastr::error('Unable to retrieve Post details', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access school admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function updatepost(Request $request, $slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            if ($this->checkauth()->hasPermission('manage-posts')) {
                $this->validate($request, [
                    'post_title' => 'required|string|min:5',
                    'post_image' => 'nullable|image|mimes:jpeg,jpg,png|max:20048',
                    'post_description' => 'required|string|min:5',
                ]);


                $checkschool = School::where('manager_id', auth()->user()->id)->first();
                $new = Post::where('slug', $slug)->first();
                $new->admin_id = auth()->user()->id;
                $new->school_id = $checkschool->id;
                $new->post_title = $request->post_title;
                if ($request->hasFile('post_image')) {
                    Storage::delete('public/posts/' . $new->image);
                    $fileNameWithExt = $request->club_image->getClientOriginalName();
                    $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    $Extension = $request->club_image->getClientOriginalExtension();
                    $filenameToStore = $fileName . '-' . time() . '.' . $Extension;
                    $path = $request->club_image->storeAs('posts', $filenameToStore, 'public');
                    $new->image = $filenameToStore;
                }


                $new->description = $request->post_description;
                $new->save();

                Toastr::success('Post Updated successfully', 'Alert', ["positionClass" => "toast-bottom-right"]);
                return redirect()->route('schooladmin.myposts');
            } else {
                Toastr::error('No permission to access club page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access school admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function deletepost($slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            if ($this->checkauth()->hasPermission('manage-posts')) {
                $club = Post::where('admin_id', auth()->user()->id)->where('slug', $slug)->first();
                if ($club) {
                    Storage::delete('public/posts/' . $club->image);
                    $club->delete();
                    Toastr::success('Post deleted successfully', 'Alert', ["positionClass" => "toast-bottom-right"]);
                    return redirect()->route('schooladmin.myposts');
                } else {
                    Toastr::error('Unable to retrieve Post details', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access school admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function deleteproduct($slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            if ($this->checkauth()->hasPermission('manage-posts')) {
                $product = Product::where('slug', $slug)->first();
                if ($product) {
                    Storage::delete('public/products/' . $product->image);
                    $product->delete();
                    Toastr::success('Product deleted successfully', 'Alert', ["positionClass" => "toast-bottom-right"]);
                    return redirect()->route('schooladmin.allproducts');
                } else {
                    Toastr::error('Unable to retrieve Post details', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access school admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }

    public function viewproduct($slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            if ($this->checkauth()->hasPermission('manage-posts')) {
                $product = Product::where('slug', $slug)->first();
                if ($product) {

                    return view('school.view-product-details', compact('product'));
                } else {
                    Toastr::error('Unable to retrieve Post details', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access school admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }

    public function allproducts()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {
            $products = Product::all();
            return view('school.all-products', compact('products'));
        } else {
            Toastr::error('No authorized to access school  admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function bproducts($slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {
            $bsn = Business::where('slug', $slug)->first();
            $products = Product::where('seller_id',$bsn->owner_id)->get();
            return view('school.all-business-products', compact('products', 'bsn'));
        } else {
            Toastr::error('No authorized to access school  admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }

    public function allbusinesses()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {
            $businesses = Business::all();
            return view('school.all-business-accounts', compact('businesses'));
        } else {
            Toastr::error('No authorized to access school  admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function deletebusiness($slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('schooladmin')) {

            if ($this->checkauth()->hasPermission('manage-posts')) {
                $product = Business::where('slug', $slug)->first();
                if ($product) {
                    $product->delete();
                    Toastr::success('Product deleted successfully', 'Alert', ["positionClass" => "toast-bottom-right"]);
                    return redirect()->route('schooladmin.businessaccounts');
                } else {
                    Toastr::error('Unable to retrieve Post details', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access products page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access school admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
}
