<?php

class HomeController extends BaseController {

    /*
    * Construct
    * @author Tremor
    */
    public function __construct(){

        $this->data['messages'] = View::make('block.messages')->with('messages', $this->getMessage())->render();

        $this->data['setting'] = Setting::first();
        $this->data['sliderList'] = Slider::orderBy('sort')->get();
        $this->data['socialList'] = Social::orderBy('sort')->get();
        $this->data['categoryList'] = Category::where('main', 0)->orderBy('sort')->get();
        $this->data['groupList'] = Group::orderBy('sort')->get();
        $this->data['buildOwn'] = Product::where('is_build', 1)->first();

        $placeList = Place::all();
        foreach($placeList as $place){
            $this->data['place'][$place->name] = $place->pageList()->orderBy('sort')->get();
        }

        $this->data['seo'] = array(
            'keywords' => 'Pepperino',
            'title' => 'Pepperino',
            'description' => 'Pepperino'
        );

    }

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index(){

        $this->data['productList'] = Product::where('is_featured', 1)->where('is_build', 0)->orderBy('sort')->get();

        return View::make('index')->with($this->data);
	}


    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function contact(){

        if(Request::isMethod('post')) {

            // send mail

            $arrayData = [
                'name' => Input::get('name'),
                'email' => Input::get('email'),
                'subject' => Input::get('subject', 'Ticket'),
                'text' => Input::get('text'),
            ];


            $this->data['content'] = View::make('emails.contact_us')->with($arrayData)->render();
//            $this->sendMail($this->data, Config::get('app.adminMail'), $subject);

            $headers = 'Content-type: text/html; charset=utf8';
            $to  = Config::get('app.adminMail');
            $subject = $arrayData['subject'];


            mail($to, $subject, $this->data['content'], $headers);

        }

        return View::make('contact')->with($this->data);
    }

    /**
     *
     * @param $catAlias string
     * @param $subCatAlias string
     * @return nothing
     * @author Tremor
     */
    public function category($catAlias, $subCatAlias = 0){


        if($subCatAlias){

            $category = Category::where('alias', $subCatAlias)->first();

            $this->data['productList'] = Product::where('category_id', $category->id)->where('is_build', 0)->orderBy('sort')->get();

        }else{

            $category = Category::where('alias', $catAlias)->first();
            $subcategoryList = Category::where('main', $category->id)->get();

            $product = Product::where('category_id', $category->id)->where('is_build', 0);

            foreach($subcategoryList as $subcategory){
                $product = $product->orWhere('category_id', $subcategory->id);
            }

            $this->data['productList'] = $product->orderBy('sort')->get();
        }

        $this->data['selectedCategory'] = $category;
        $this->data['seo'] = $this->seo($category);

        return View::make('index')->with($this->data);
    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function page($alias){

        $this->data['page'] = Page::where('alias', $alias)->first();

        $this->data['seo'] = $this->seo($this->data['page']);
        return View::make('page')->with($this->data);
    }



    /**
     * Set a message
     * @param $message - string
     * @param $type - string [error or success]
     * @return view in session
     * @author Tremor
     **/
    public function setMessage($message, $type){

        if(is_array($message)){

            foreach ($message as $mess) {
                $this->system_messages[$type][] = $mess;
            }

        }else{
            $this->system_messages[$type][] = $message;
        }

        Session::flash('system.messages', $this->system_messages);
    }

    /**
     * Get the messages
     * @return array of messages
     * @author Tremor
     **/
    public function getMessage(){

        return Session::get('system.messages', false);

    }

    /**
     * Send mail
     * @param $text  array (Шаблон сообщения)
     * @param $to  string (Почта кому отсылаем письмо)
     * @param $subject  string (Почта кому отсылаем письмо)
     * @param $attach  array (Прикрипленные файлы)
     * @return nothing
     * @author Tremor
     **/
    public function sendMail($text = array('content' => ''), $to, $subject, $attach = array()){

        Mail::send('emails.layout', $text, function($message) use ($to, $subject, $attach) {

            $message->from('tremor.oleg@gmail.com', 'Ninja');

            $message->to($to)->subject($subject);;

            if(!empty($attach)){

                if(is_array($attach)){

                    foreach($attach as $pathToFile){
                        $message->attach($pathToFile);
                    }

                }else{
                    $message->attach($attach);
                }

            }

        });
    }


    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function check(){

        if(!Auth::check()){

            $this->setMessage('Log in or register to open this page', 'error');
            return Redirect::to('auth/login')->send();
        }

    }

    /**
     *
     * @param $object object class
     * @return array
     * @author Tremor
     */
    public function seo($object){

        if($object) {
            $returnArray['keywords'] = $object->seo_keywords;
            $returnArray['title'] = $object->seo_title;
            $returnArray['description'] = $object->seo_description;
        }else{
            $returnArray['keywords'] = 'Pepperino';
            $returnArray['title'] = 'Pepperino';
            $returnArray['description'] = 'Pepperino';
        }
        return $returnArray;
    }

}
