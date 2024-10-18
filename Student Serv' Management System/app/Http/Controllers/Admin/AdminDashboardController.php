<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\Business;
use App\Models\Club;
use App\Models\Post;
use App\Models\Product;
use App\Models\School;
use App\Models\Student;
use App\Models\UserQuery;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }
    public function checkauth()
    {
        $user = auth()->user();
        return $user;
    }

    public function index()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {

            $schools = School::all();
            $students = Student::all();
            $clubs = Club::all();
            $products = Product::all();
            $adverts = Advert::all();
            $businesses = Business::all();
            $posts = Post::all();
            $users = User::all();
            $complains = UserQuery::where('status', 'pending')->get();
            $fiveproducts = Product::orderBy('created_at', 'desc')->take(5)->get();
            $fiveusers = User::orderBy('created_at', 'desc')->take(5)->get();


            return view('admin.dashboard', compact('businesses', 'complains','schools','fiveusers','fiveproducts', 'adverts', 'products','students', 'clubs','users', 'posts'));
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function createbusiness()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {

            if ($this->checkauth()->hasPermission('manage-business')) {
                return view('admin.create-business');
            } else {
                Toastr::error('No permission to access this page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect('');
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public  function storebusiness(Request $request)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {

            if ($this->checkauth()->hasPermission('manage-business')) {

                $this->validate($request, [
                    'full_name' => 'required|string|min:5',
                    'phone_number' => 'required|digits:10|unique:users',
                    'email' => 'required|email|unique:users',
                    'shop_name' => 'required|string|min:5',
                    'products_selling' => 'required',
                    'opening_time' => 'required',
                    'closing_time' => 'required|after_or_equal:opening_time',

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

                $new = new User;
                $new->name = $request->full_name;
                $new->phone_number = $request->phone_number;
                $new->email = $request->email;
                $new->password = bcrypt($request->phone_number);
                $new->email_verified_at = Carbon::now();
                $new->save();

                $add = new Business;
                $add->owner_id = $new->id;
                $add->business_name = $request->shop_name;
                $add->opening_time = $request->opening_time;
                $add->closing_time = $request->closing_time;
                $add->products_selling = $request->products_selling;
                $add->slug = $totalstring;
                $add->status = "verified";
                $add->save();

                $new->attachRole('businessowner');
                $new->attachPermission('manage-products');
                Toastr::success('New Business added to the system', 'Title', ["positionClass" => "toast-bottom-right"]);
                return redirect()->route('admin.managebusiness');
            } else {
                Toastr::error('No permission create any business', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function allbusiness()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {

            if ($this->checkauth()->hasPermission('manage-business')) {
                $businesses = Business::all();
                return view('admin.all-business', compact('businesses'));
            } else {
                Toastr::error('No permission to access all businesses', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function editbusiness($slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {

            if ($this->checkauth()->hasPermission('manage-business')) {
                $bsn = Business::where('slug', $slug)->first();
                if ($bsn) {
                    return view('admin.edit-business', compact('bsn'));
                } else {

                    Toastr::error('Business profile not found', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access all businesses', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function updatebusiness(Request $request, $slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {

            if ($this->checkauth()->hasPermission('manage-business')) {

                $this->validate($request, [
                    'full_name' => 'required|string|min:5',
                    'phone_number' => 'required|digits:10|exists:users',
                    'email' => 'required|email|exists:users',
                    'shop_name' => 'required|string|min:5',
                    'products_selling' => 'required',
                    'opening_time' => 'required',
                    'closing_time' => 'required|after_or_equal:opening_time',
                ]);




                $add = Business::where('slug', $slug)->first();
                if ($add) {
                    $add->business_name = $request->shop_name;
                    $add->opening_time = $request->opening_time;
                    $add->closing_time = $request->closing_time;
                    $add->products_selling = $request->products_selling;
                    $add->save();
                    $new = User::where('id', $add->owner_id)->first();
                    $new->name = $request->full_name;
                    $new->phone_number = $request->phone_number;
                    $new->email = $request->email;
                    $new->save();
                    Toastr::success('New Business added to the system', 'Title', ["positionClass" => "toast-bottom-right"]);
                    return redirect()->route('admin.managebusiness');
                } else {
                    Toastr::error('Business profile not found', 'Error', ["positionClass" => "toast-bottom-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission create any business', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function deletebusiness(Request $request, $slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {
            if ($this->checkauth()->hasPermission('manage-business')) {
                $bsn = Business::where('slug', $slug)->first();
                if ($bsn) {

                    $bsn->delete();

                    Toastr::error('Business profile  deleted successfully.', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                } else {
                    Toastr::error('Business profile ', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access all businesses', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->route('login');
        }
    }

    // MANAGING SCHOOLS

    public function createschool()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {

            if ($this->checkauth()->hasPermission('manage-schools')) {
                return view('admin.create-school');
            } else {
                Toastr::error('No permission to access this page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect('');
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function storeschool(Request $request)
    {
        // dd("dkemdede");
        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {

            if ($this->checkauth()->hasPermission('manage-schools')) {

                $this->validate($request, [
                    'admin_full_name' => 'required|string|min:5',
                    'phone_number' => 'required|digits:10|unique:users',
                    'email' => 'required|email|unique:users',
                    'school_name' => 'required|string|min:5',
                    'address_address' => 'required',
                    'address_latitude' => 'required',
                    'address_longitude' => 'required',
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

                $new = new User;
                $new->name = $request->admin_full_name;
                $new->phone_number = $request->phone_number;
                $new->email = $request->email;
                $new->password = bcrypt($request->phone_number);
                $new->email_verified_at = Carbon::now();
                $new->save();

                $add = new School;
                $add->manager_id = $new->id;
                $add->school_name = $request->school_name;
                $add->location_address = $request->address_address;
                $add->latitude = $request->address_latitude;
                $add->longitude = $request->address_longitude;
                $add->slug = $totalstring;
                $add->status = "verified";
                $add->save();

                $new->attachRole('schooladmin');
                $new->attachPermissions(['manage-students', 'manage-posts', 'manage-clubs']);
                Toastr::success('New school added to the system', 'Title', ["positionClass" => "toast-bottom-right"]);
                return redirect()->route('admin.manageschools');
            } else {
                Toastr::error('No permission create any school', 'Error', ["positionClass" => "toast-bottom-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function allschools()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {

            if ($this->checkauth()->hasPermission('manage-schools')) {
                $businesses = School::all();
                return view('admin.all-schools', compact('businesses'));
            } else {
                Toastr::error('No permission to access all schools', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }

    public function editschool(Request $request, $slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {

            if ($this->checkauth()->hasPermission('manage-schools')) {
                $bsn = School::where('slug', $slug)->first();
                if ($bsn) {
                    return view('admin.edit-school', compact('bsn'));
                } else {

                    Toastr::error('School profile not found', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access all schools', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function updateschool(Request $request, $slug)
    {

        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {

            if ($this->checkauth()->hasPermission('manage-schools')) {

                $this->validate($request, [
                    'full_name' => 'required|string|min:5',
                    'phone_number' => 'required|digits:10|exists:users',
                    'email' => 'required|email|exists:users',
                    'shop_name' => 'required|string|min:5',
                    'address_address' => 'required',
                    'address_latitude' => 'required',
                    'address_longitude' => 'required',
                ]);




                $add = School::where('slug', $slug)->first();
                if ($add) {
                    $add->school_name = $request->shop_name;
                    $add->location_address = $request->address_address;
                    $add->latitude = $request->address_latitude;
                    $add->longitude = $request->address_longitude;
                    $add->save();
                    $new = User::where('id', $add->manager_id)->first();
                    $new->name = $request->full_name;
                    $new->phone_number = $request->phone_number;
                    $new->email = $request->email;
                    $new->save();

                    Toastr::success('School  profile has been updated successfully.', 'Title', ["positionClass" => "toast-bottom-right"]);
                    return redirect()->route('admin.manageschools');
                } else {
                    Toastr::error('School profile not found', 'Error', ["positionClass" => "toast-bottom-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission create any business', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function deleteschool(Request $request, $slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {
            if ($this->checkauth()->hasPermission('manage-schools')) {
                $bsn = School::where('slug', $slug)->first();
                if ($bsn) {
                    $bsn->delete();
                    Toastr::error('School profile  deleted successfully.', 'Error', ["positionClass" => "toast-bottom-right"]);
                    return redirect()->back();
                } else {
                    Toastr::error('Business profile ', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access all businesses', 'Error', ["positionClass" => "toast-bottom-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('login');
        }
    }
    // STUDENT SCHOOLS CONTROLLER
    public function createstudent()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {

            if ($this->checkauth()->hasPermission('manage-students')) {
                $schools = School::all();
                return view('admin.create-student', compact('schools'));
            } else {
                Toastr::error('No permission to access this page', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect('');
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function storestudent(Request $request)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {

            if ($this->checkauth()->hasPermission('manage-students')) {

                $this->validate($request, [
                    'student_full_name' => 'required|string|min:5',
                    'phone_number' => 'required|digits:10|unique:users',
                    'email' => 'required|email|unique:users',
                    'school_name' => 'required',
                    'guardian_name' => 'required',
                    'guardian_contact' => 'required|digits:10|unique:students',
                    'school_reg_number' => 'required|digits_between:4,8'
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

                $new = new User;
                $new->name = $request->student_full_name;
                $new->phone_number = $request->phone_number;
                $new->email = $request->email;
                $new->password = bcrypt($request->phone_number);
                $new->email_verified_at = Carbon::now();
                $new->save();

                $add = new Student;
                $add->student_id = $new->id;
                $add->school_id = $request->school_name;
                $add->guardian_contact = $request->guardian_contact;
                $add->guardian_name = $request->guardian_name;
                $add->reg_number = $request->school_reg_number;
                $add->slug = $totalstring;
                $add->status = "verified";
                $add->save();

                $new->attachRole('student');

                Toastr::success('New student account added to the system', 'Title', ["positionClass" => "toast-bottom-right"]);
                return redirect()->route('admin.managestudents');
            } else {
                Toastr::error('No permission create any school', 'Error', ["positionClass" => "toast-bottom-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-bottom-right"]);

            return redirect()->route('login');
        }
    }
    public function allstudents()
    {
        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {

            if ($this->checkauth()->hasPermission('manage-students')) {
                $students = Student::all();
                return view('admin.all-students', compact('students'));
            } else {
                Toastr::error('No permission to access all schools', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }

    public function editstudent(Request $request, $slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {

            if ($this->checkauth()->hasPermission('manage-students')) {
                $bsn = Student::where('slug', $slug)->first();
                if ($bsn) {
                    $schools = School::all();
                    return view('admin.edit-student', compact('bsn', 'schools'));
                } else {

                    Toastr::error('School profile not found', 'Error', ["positionClass" => "toast-bottom-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access all schools', 'Error', ["positionClass" => "toast-bottom-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function updatestudent(Request $request, $slug)
    {

        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {

            if ($this->checkauth()->hasPermission('manage-students')) {

                $this->validate($request, [
                    'student_full_name' => 'required|string|min:5',
                    'phone_number' => 'required|digits:10|exists:users',
                    'email' => 'required|email|exists:users',
                    'school_name' => 'required',
                    'guardian_name' => 'required',
                    'guardian_contact' => 'required|digits:10|exists:students',
                    'school_reg_number' => 'required|digits_between:4,8'
                ]);




                $add = Student::where('slug', $slug)->first();
                if ($add) {
                    $add->school_id = $request->school_name;
                    $add->guardian_contact = $request->guardian_contact;
                    $add->guardian_name = $request->guardian_name;
                    $add->save();
                    $new = User::where('id', $add->student_id)->first();
                    $new->name = $request->student_full_name;
                    $new->phone_number = $request->phone_number;
                    $add->reg_number = $request->school_reg_number;
                    $new->email = $request->email;
                    $new->save();

                    Toastr::success('Student  profile has been updated successfully.', 'Title', ["positionClass" => "toast-bottom-right"]);
                    return redirect()->route('admin.managestudents');
                } else {
                    Toastr::error('School profile not found', 'Error', ["positionClass" => "toast-bottom-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission create any business', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
    public function deletestudent(Request $request, $slug)
    {
        $this->checkauth();
        if (auth()->user()->hasRole('admin')) {
            if ($this->checkauth()->hasPermission('manage-students')) {
                $bsn = Student::where('slug', $slug)->first();
                if ($bsn) {
                    $bsn->delete();
                    Toastr::error('Student profile  deleted successfully.', 'Error', ["positionClass" => "toast-bottom-right"]);
                    return redirect()->back();
                } else {
                    Toastr::error('Student profile  not found', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                Toastr::error('No permission to access all students', 'Error', ["positionClass" => "toast-bottom-right"]);
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
        if (auth()->user()->hasRole('admin')) {
            return view('admin.update-profile');
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
        if (auth()->user()->hasRole('admin')) {


            $users = User::whereRoleIs('school')->orWhereRoleIs('business')->get();
            return view('admin.open-conversations', compact('users'));
        } else {
            Toastr::error('No authorized to access admin dashboard.Log in to your account', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->route('login');
        }
    }
}
