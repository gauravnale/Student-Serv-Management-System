<?php

namespace App\Http\Controllers;

use App\Mail\BusinessAccount;
use App\Mail\SchoolAdminAccount;
use App\Mail\SendMessage;
use App\Mail\StudentAccount;
use App\Models\Business;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{

    public function index()
    {
        return view('pages.homepage');
    }
    public function aboutus()
    {
        return view('pages.aboutus');
    }
    public function services()
    {
        return view('pages.services');
    }
    public function contacts()
    {
        return view('pages.contact-us');
    }
    public function sendmessage(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'other_names' => 'required|string',
            'message_title' => 'required|string',
            'message_description' => 'required|string|max:300',
            'email_address' => 'required|email',
        ], [
            'first_name.required' => "Provide your first name",
            'other_names.max' => 'Provide your first name',
            'message_title.required' => "Provide your phone number",
            'message_description.max' => 'Your name can have a maximum of 255 characters',
            'email_address.required' => "Provide your email address",
            'message_description.max' => 'You need to provide a valid email address',
            'contact_message.required' => "Provide your brief message",
            'message_description.max' => 'Your message is too long, please make it brief as possible',
        ]);

        $sender = $request->email_address;
        $receiver = "support@MercadoEscolar.com";
        $message = "Hello Mercado Escolar,  this is " . $request->first_name . " " . $request->other_names . " Title of the message " . $request->message_title . " Message:) " . $request->message_description;

        Mail::to($receiver)->send(new SendMessage($sender, $receiver, $message));


        return redirect()->to('contacts')->with('mesagesent', 'Message sent successfully');
    }
    public function createstudentaccount(Request $request)
    {
        $this->validate($request, [
            'student_full_name' => 'required|string|min:5',
            'phone_number' => 'required|digits:10|unique:users',
            'email' => 'required|email|unique:users',
            'school_name' => 'required',
            'guardian_name' => 'required',
            'guardian_contact' => 'required|digits:10|unique:students',
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required',
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
        $new->password = bcrypt($request->password);
         $new->email_verified_at = Carbon::now();
        $new->save();
        $add = new Student;
        $add->student_id = $new->id;
        $add->school_id = $request->school_name;
        $add->reg_number = $request->school_reg_number;
        $add->guardian_contact = $request->guardian_contact;
        $add->guardian_name = $request->guardian_name;
        $add->slug = $totalstring;
        $add->status = "verified";
        $add->save();

        $new->attachRole('student');

 $sender = "studentserve@gmail.com";
        $receiver = $new->email;
        $message = "Student Account Successfully created";
        Mail::to($receiver)->queue(new StudentAccount($sender, $receiver, $message));
        return redirect()->route('login')->with('accountsuccess', 'Account has been created successfully. Log In now to proceed.');
    }
    public function createschoolaccount()
    {
        return view('auth.register-school');
    }

    public function storeschoolaccount(Request $request)
    {
        $this->validate($request, [
            'admin_full_name' => 'required|string|min:5',
            'phone_number' => 'required|digits:10|unique:users',
            'email' => 'required|email|unique:users',
            'school_name' => 'required|string|min:5',
            'address_address' => 'required',
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required'
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
        $new->password = bcrypt($request->password);
        $new->email_verified_at = Carbon::now();
        $new->save();

        $add = new School;
        $add->manager_id = $new->id;
        $add->school_name = $request->school_name;
        $add->location_address = $request->address_address;
        $add->slug = $totalstring;
        $add->status = "verified";
        $add->save();

        $new->attachRole('schooladmin');
        $new->attachPermissions(['manage-students', 'manage-posts', 'manage-clubs']);
        $sender = "studentserve@gmail.com";
        $receiver = $new->email;
        $message = "School Admin Account Successfully created";
        Mail::to($receiver)->queue(new SchoolAdminAccount($sender, $receiver, $message));
        return redirect()->route('login')->with('accountsuccess', 'School account successfully created.');
    }
    public function createbusinessaccount()
    {
        return view('auth.register-business');
    }
    public function storebusinessaccount(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|string|min:5',
            'phone_number' => 'required|digits:10|unique:users',
            'email' => 'required|email|unique:users',
            'shop_name' => 'required|string|min:5',
            'products_selling' => 'required',
            'opening_time' => 'required',
            'closing_time' => 'required|after_or_equal:opening_time',
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required'
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
        $new->password = bcrypt($request->password);
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
        $sender = "studentserve@gmail.com";
        $receiver = $new->email;
        $message = "Business Account Successfully created";
        Mail::to($receiver)->queue(new BusinessAccount($sender, $receiver, $message));
        return redirect()->route('login')->with('accountsuccess', 'Business account successfully created.');
    }
}
