<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 29.01.15
 * Time: 14:44
 */

class AuthController extends HomeController {

    /*
     * Construct
     * @author Tremor
     */
    public function __construct(){

        parent::__construct();
    }


    /**
     * Регистрация нового пользователя
     * @return 
     * @author Tremor
     */ 
    public function registration(){

        if(Request::isMethod('post')){

            $post = Input::all();

            $rules = array(
                'email' 	=> 'required|email|unique:user,email',
                'password'	=> 'required',
            );

            $validator = Validator::make($post, $rules);

            if($validator->fails()){

                $this->setMessage($validator->messages()->all(), 'error');
                return Redirect::route('registration')->withInput();

            }else{

                $user = new User;
                $user->email = Input::get('email');
                $user->password = Hash::make(Input::get('password'));
                $user->save();

                Auth::loginUsingId($user->id);

                return Redirect::intended('/');
                
            }

        }

        return View::make('auth.signup')->with($this->data);
    }


    /**
     *
     * @return nothing
     * @author Tremor
     */
    public function login(){

        if(Request::isMethod('post')){

            $post = Input::all();

            $rules = [
                'email'     => 'required|email',
                'password'  => 'required',
            ];

            $validator = Validator::make($post, $rules);

            if($validator->fails()){

                $this->setMessage($validator->messages()->all(), 'error');

                return Redirect::route('login')->withInput();

            }else{

                $email = trim(Input::get('email'));
                $password = trim(Input::get('password'));
                $remember = (Input::get('remember') == 1) ? true : false;


                if (Auth::attempt(array('email' => $email, 'password' => $password, 'is_admin' => 1))) {
                    return Redirect::route('admin');
                } elseif (Auth::attempt(array('email' => $email, 'password' => $password))) {
                    return Redirect::route('home');
                } else {
                    $this->setMessage('failed login', 'error');
                    return Redirect::route('login')->withInput();
                }
            }
        }


        return View::make('auth.signin')->with($this->data);

    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function generatePassword(){

        // Символы, которые будут использоваться в пароле.
        $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";

        // Количество символов в пароле.
        $max = 10;

        // Определяем количество символов в $chars
        $size = StrLen($chars)-1;

        // Определяем пустую переменную, в которую и будем записывать символы.
        $password = null;

        // Создаём пароль.
        while($max--)
            $password .= $chars[rand(0, $size)];


        return $password;
    }

    /**
     * Logout
     * @return
     * @author Tremor
     */
    public function logout(){

        Session::flush();
        Auth::logout();
        return Redirect::to('/');
    }



}