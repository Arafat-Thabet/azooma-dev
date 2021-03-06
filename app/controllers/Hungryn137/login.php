<?php

use Illuminate\Support\Facades\Route;

class Login extends AdminController
{

    public $data;
    protected $MAdmins;
    protected $MGeneral;

    function __construct()
    {


        $this->MAdmins = new Admin();
        $this->MGeneral = new MGeneral();
    }

    public function index()
    {
        if (Session::has('adminid')) {
            return Redirect::route('adminhome');
        }
        $settings = Config::get('settings.default');
        $data['sitename'] = $settings['name'];
        $data['logo'] = $logo = ArtWork::where('art_work_name', '=', 'Azooma Logo')->orderBy('createdAt', 'DESC')->first();
        $userCountry = $this->MGeneral->visitor_country();
        $data['usercountry'] = $this->MGeneral->getAdminCountryByName($userCountry);
        $data['countries'] = $this->MGeneral->getAllAdminCountries(1);
        $redirect = "";
        if (isset($_GET['redirect']) && ($_GET['redirect'] != "")) {
            $redirect = $_GET['redirect'];
        }
        $data['redirect'] = $redirect;
        $data['pagetitle'] = 'Admin Login';
        $data['titile'] = 'Admin Login';
        return view('admin.login', $data);
        // return view('admin.login');
    }

    public function postSubmit()
    {
        if (Session::has('adminid')) {
            return Redirect::route('adminhome');
        }
        $username = Input::get('User');
        $password = Input::get('Password');
        $country_ID = Input::get('country_ID');
        $user = Admin::where('user', '=', $username)->where('pass', '=', md5($password))->where('status', '=', 1)->first();
        if (!empty($user)) {
            if ($user->id != "" && $user->fullname != "") {
                $settings = Config::get('settings.default');
                Session::put('sitename', $settings['name']);
                Session::put('admincountry', $user->country);
                Session::put('admincountryName', Str::slug($this->MGeneral->getAdminCountryName($user->country), '-', TRUE));
                Session::put('adminid', $user->id);
                Session::put('fullname', $user->fullname);
                Session::put('username', $user->username);
                Session::put('admin', $user->admin);
                Session::put('permissions', $user->permissions);
                Session::put('email', $user->email);
                if (isset($_POST['remember_me']) && post('remember_me') == 'on') {
                    setcookie('remember_me_user_name', post('User'));
                    setcookie('remember_me_password', post('Password'));
                    setcookie('remember_me_country_id', $user->country);
                    setcookie('remember_me', 'on');
                } else {
                    setcookie('remember_me_user_name', null);
                    setcookie('remember_me_password', null);
                    setcookie('remember_me_country_id', null);
                    setcookie('remember_me', null);
                    unset($_COOKIE['remember_me_user_name']);
                    unset($_COOKIE['remember_me_password']);
                    unset($_COOKIE['remember_me_country_id']);
                    unset($_COOKIE['remember_me']);
                }
                if($user->admin==1){
                    return Redirect::route('ownerhome');
                } 
                return Redirect::route('adminhome');
            } else {
                return Redirect::back()->with('message', "Some thing happen wrong, Please Try Again.")->withInput();
            }
        } else {
            return Redirect::back()->with('message', "Some thing happen wrong, Please Try Again. <br>Check your Username, Password and Country is correct or not.")->withInput();
        }
    }

    public function logout()
    {

        Session::forget('admincountry');
        Session::forget('adminid');
        Session::forget('fullname');
        Session::forget('admin');
        Session::forget('permissions');
        Session::forget('email');
        Session::flush();
        return Redirect::route('adminlogin');
    }

    public function missingMethod($parameters = [])
    {
        return 'Abay Teri Maa ki Kir Kiri';
    }
}
