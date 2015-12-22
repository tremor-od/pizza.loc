<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 03.02.15
 * Time: 15:19
 */

class AdminController  extends BaseController {

    public $data = array();


    /*
    * Construct
    * @author Tremor
    */
    public function __construct(){


        $this->data['messages'] = View::make('block.messages')->with('messages', $this->getMessage())->render();
        $this->check();
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
     * Check admin
     * @return nothing
     * @author Tremor
     */
    public function check(){

        $check = Auth::check() ;

        if($check == false || Auth::user()->is_admin != 1){

            return Redirect::to('auth/login')->send();
        }

    }

    /**
     *
     * @return nothing
     * @author Tremor
     */
    public function index(){


        return View::make('admin.index')->with($this->data);
    }

    /** __________________________________________________________________Pages _________________________________________________________________________________ */

    /**
     *
     * @param $pageId int
     * @return nothing
     * @author Tremor
     */
    public function page($pageId = 0){

        $this->data['active'] = __FUNCTION__;

        if(isset($pageId) && !empty($pageId) && is_numeric($pageId)){

            $this->data['placeList'] = Place::lists('name', 'id');
            $this->data['page'] = Page::find($pageId);

            return View::make('admin.page.one')->with($this->data);

        }else{

            $this->data['pageList'] = Page::orderBy('place_id')->orderBy('sort')->get();

            return View::make('admin.page.list')->with($this->data);
        }
    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function pageAction($action, $pageId = 0){

        if(isset($pageId) && !empty($pageId) && !is_numeric($pageId)){
            return Redirect::to('admin/page');
        }

        switch($action){
            case 'add' :

                $page = new Page;
                $page->save();

                $newId = $page->id;

                return Redirect::to('admin/page/'.$newId);
                break;
            case 'edit' :

                $post = Input::except('_token');
//                $affectedRows = Page::find($pageId)->update($post);
                $page = Page::find($pageId);

                foreach($post as $key => $val){

                    if(isset($page->$key)){
                        $page->$key = ($key == 'alias')?camel_case($val):$val;
                    }
                }
                $page->save();

                return Redirect::to('admin/page/'.$pageId);
                break;
            case 'delete' :

                $page = Page::find($pageId);
                $page->delete();

                break;
            default :
                break;
        }

        return Redirect::to('admin/page');
    }

    /** __________________________________________________________________End Pages _________________________________________________________________________________ */



    /** __________________________________________________________________User _________________________________________________________________________________ */

    /**
     *
     * @param $userId int, user id
     * @return nothing
     * @author Tremor
     */
    public function user($userId = 0){

        $this->data['active'] = __FUNCTION__;

        if(isset($userId) && !empty($userId) && is_numeric($userId)){

            $this->data['user'] = User::find($userId);
            //Stock, Points, Withdrew, Packs, Withdraw, Last Activity Date

            return View::make('admin.user.one')->with($this->data);

        }else{

            $this->data['userList'] = User::paginate(20);

            return View::make('admin.user.list')->with($this->data);
        }
    }




    /** __________________________________________________________________ End User ________________________________________________________________________ */

    /** __________________________________________________________________ Category _________________________________________________________________________ */

    /**
     *
     * @param $categoryId int
     * @return nothing
     * @author Tremor
     */
    public function category($categoryId = 0){

        $this->data['active'] = __FUNCTION__;

        if(isset($categoryId) && !empty($categoryId) && is_numeric($categoryId)){

            $this->data['categoryList'] = Category::where('main', 0)->where('name', '!=', '')->orderBy('sort')->get();
            $this->data['category'] = Category::find($categoryId);

            return View::make('admin.category.one')->with($this->data);

        }else{

            $this->data['categoryList'] = Category::where('main', 0)->orderBy('main')->orderBy('sort')->get();

            return View::make('admin.category.list')->with($this->data);
        }
    }

    /**
     *
     * @param $action string
     * @param $categoryId int
     * @return nothing
     * @author Tremor
     */
    public function categoryAction($action, $categoryId = 0){

        if(isset($categoryId) && !empty($categoryId) && !is_numeric($categoryId)){
            return Redirect::to('admin/category');
        }

        switch($action){
            case 'add' :

                $category = new Category;
                $category->save();

                $newId = $category->id;

                return Redirect::to('admin/category/'.$newId);
                break;
            case 'edit' :

                $post = Input::except('_token');

//                $affectedRows = Category::where('id', $categoryId)->update($post);
                $category = Category::find($categoryId);

                foreach($post as $key => $val){

                    if(isset($category->$key)){
                        $category->$key = ($key == 'alias')?camel_case($val):$val;
                    }
                }
                $category->save();

                if(empty($category->alias)){

                    $category->alias = camel_case($post['name']);
                    $category->save();
                }

                return Redirect::to('admin/category/'.$categoryId);
                break;
            case 'delete' :

                $category = Category::find($categoryId);
                $category->delete();

                break;
            default :
                break;
        }

        return Redirect::to('admin/category');
    }

    /** __________________________________________________________________ End Category _____________________________________________________________________ */

    /** __________________________________________________________________ Subcategory ______________________________________________________________________ */

    /**
     *
     * @param $subcategoryId int
     * @return nothing
     * @author Tremor
     */
    public function subcategory($subcategoryId = 0){

        $this->data['active'] = __FUNCTION__;

        if(isset($subcategoryId) && !empty($subcategoryId) && is_numeric($subcategoryId)){

            $this->data['categoryList'] = Category::lists('name', 'id');
            $this->data['subcategory'] = Subcategory::find($subcategoryId);

            return View::make('admin.subcategory.one')->with($this->data);

        }else{

            $this->data['subcategoryList'] = Subcategory::orderBy('sort', 'asc')->get();

            return View::make('admin.subcategory.list')->with($this->data);
        }
    }

    /**
     *
     * @param $action string
     * @param $subcategoryId int
     * @return nothing
     * @author Tremor
     */
    public function subcategoryAction($action, $subcategoryId = 0){

        if(isset($subcategoryId) && !empty($subcategoryId) && !is_numeric($subcategoryId)){
            return Redirect::to('admin/subcategory');
        }

        switch($action){
            case 'add' :

                $subcategory = new Subcategory;
                $subcategory->save();

                $newId = $subcategory->id;

                return Redirect::to('admin/subcategory/'.$newId);
                break;
            case 'edit' :

                $post = Input::except('_token');

                $subcategory = Subcategory::find($subcategoryId);
                foreach($post as $key => $val){

                    if(isset($subcategory->$key)){
                        $subcategory->$key = ($key == 'alias')?camel_case($val):$val;
                    }
                }
                $subcategory->save();

                return Redirect::to('admin/subcategory/'.$subcategoryId);
                break;
            case 'delete' :

                $category = Subcategory::find($subcategoryId);
                $category->delete();

                break;
            default :
                break;
        }

        return Redirect::to('admin/subcategory');
    }

    /** __________________________________________________________________ End SubCategory __________________________________________________________________ */


    /** __________________________________________________________________ Products __________________________________________________________________________ */

    /**
     *
     * @param $productId int
     * @return nothing
     * @author Tremor
     */
    public function product($productId = 0){

        $this->data['active'] = __FUNCTION__;

        if(isset($productId) && !empty($productId) && is_numeric($productId)){

            $this->data['product'] = Product::find($productId);
            $this->data['categoryList'] = Category::where('main', 0)->orderBy('sort')->get();
            $this->data['sizeList'] = Size::all();
            $this->data['groupList'] = Group::all();

            return View::make('admin.product.one')->with($this->data);

        }else{

            $this->data['buildOwn'] = Product::where('is_build', 1)->first();
            $this->data['productList'] = Product::where('is_build', 0)->paginate(20);

            return View::make('admin.product.list')->with($this->data);
        }
    }

    /**
     *
     * @param $action string
     * @param $productId int
     * @return nothing
     * @author Tremor
     */
    public function productAction($action, $productId = 0){

        if(isset($productId) && !empty($productId) && !is_numeric($productId)){
            return Redirect::to('admin/product');
        }

        switch($action){
            case 'add' :

                $product = new Product;
                $product->save();

                $newId = $product->id;

                return Redirect::to('admin/product/'.$newId);
                break;
            case 'edit' :

                $post = Input::except('_token');
                $sizeList = Input::only('size');
                $groupList = Input::only('group');


                // product
                $product = Product::find($productId);
                foreach($post as $key => $val){

                    if(isset($product->$key)){
                        $product->$key = ($key == 'alias')?camel_case($val):$val;
                    }
                }
                $product->save();

                if(empty($product->alias)){

                    $product->alias = camel_case($post['name']);
                    $product->save();
                }

                // product sizes
                if(!empty($sizeList['size'])){
                    foreach($sizeList['size'] as $key => $val){
                        ProductSize::find($key)->update($val);
                    }
                }
                // product groups
                if(!empty($groupList['group'])){
                    foreach($groupList['group'] as $key => $val){
                        ProductGroup::find($key)->update($val);
                    }
                }

                return Redirect::to('admin/product/'.$productId);
                break;
            case 'delete' :

                $product = Product::find($productId);
                $product->delete();

                $productSizeList = ProductSize::where('product_id', $productId)->get();
                if($productSizeList){
                    foreach($productSizeList as $size){
                        $size->delete();
                    }
                }
                $productGroupList = ProductGroup::where('product_id', $productId)->get();
                if($productGroupList){
                    foreach($productGroupList as $group){
                        $group->delete();
                    }
                }

                break;
            case 'addPriceSize':

                $this->data['productSize'] = ProductSize::create(array('product_id' => $productId));
                $this->data['sizeList'] = Size::all();
                $answer['content'] = View::make('admin.product.priceSizeTr')->with($this->data)->render();

                return json_encode($answer);
                break;
            case 'removePriceSize':

                $priceSizeId = Input::get('priceSizeId', false);

                if($priceSizeId != false){
                    ProductSize::find($priceSizeId)->delete();

                    return json_encode($answer['true'] = true);
                }

                break;

            case 'addGroup':

                $this->data['productGroup'] = ProductGroup::create(array('product_id' => $productId));
                $this->data['groupList'] = Group::all();
                $answer['content'] = View::make('admin.product.groupTr')->with($this->data)->render();

                return json_encode($answer);
                break;
            case 'removeGroup':

                $groupId = Input::get('groupId', false);

                if($groupId != false){
                    ProductGroup::find($groupId)->delete();

                    return json_encode($answer['true'] = true);
                }
                break;
            default :
                break;
        }

        return Redirect::to('admin/product');
    }

    /** __________________________________________________________________ End Products _____________________________________________________________________ */


    /** __________________________________________________________________ Size _____________________________________________________________________________ */

    /**
     *
     * @param $sizeId int
     * @return nothing
     * @author Tremor
     */
    public function size($sizeId = 0){

        $this->data['active'] = __FUNCTION__;

        if(isset($sizeId) && !empty($sizeId) && is_numeric($sizeId)){

            $this->data['size'] = Size::find($sizeId);

            return View::make('admin.size.one')->with($this->data);

        }else{

            $this->data['sizeList'] = Size::get();

            return View::make('admin.size.list')->with($this->data);
        }
    }

    /**
     * @param $action string
     * @param $sizeId int
     * @return nothing
     * @author Tremor
     */
    public function sizeAction($action, $sizeId = 0){

        if(isset($sizeId) && !empty($sizeId) && !is_numeric($sizeId)){
            return Redirect::to('admin/size');
        }

        switch($action){
            case 'add' :

                $size = new Size;
                $size->save();

                $newId = $size->id;

                return Redirect::to('admin/size/'.$newId);
                break;
            case 'edit' :

                $post = Input::except('_token');
                $affectedRows = Size::find($sizeId)->update($post);

                return Redirect::to('admin/size/'.$sizeId);
                break;
            case 'delete' :

                $size = Size::find($sizeId);
                $size->delete();

                break;
            default :
                break;
        }

        return Redirect::to('admin/size');
    }

    /** __________________________________________________________________ End Size _________________________________________________________________________ */

    /** __________________________________________________________________ Group ____________________________________________________________________________ */

    /**
     *
     * @param $groupId int
     * @return nothing
     * @author Tremor
     */
    public function group($groupId = 0){

        $this->data['active'] = __FUNCTION__;

        if(isset($groupId) && !empty($groupId) && is_numeric($groupId)){

            $this->data['group'] = Group::find($groupId);

            return View::make('admin.group.one')->with($this->data);

        }else{

            $this->data['groupList'] = Group::get();

            return View::make('admin.group.list')->with($this->data);
        }
    }

    /**
     * @param $action string
     * @param $groupId int
     * @return nothing
     * @author Tremor
     */
    public function groupAction($action, $groupId = 0){

        if(isset($groupId) && !empty($groupId) && !is_numeric($groupId)){
            return Redirect::to('admin/group');
        }

        switch($action){
            case 'add' :

                $group = new Group;
                $group->save();

                $newId = $group->id;

                return Redirect::to('admin/group/'.$newId);
                break;
            case 'edit' :

                $post = Input::except('_token');
                $affectedRows = Group::find($groupId)->update($post);

                return Redirect::to('admin/group/'.$groupId);
                break;
            case 'delete' :

                $group = Group::find($groupId);
                $group->delete();

                break;
            default :
                break;
        }

        return Redirect::to('admin/group');
    }

    /** __________________________________________________________________ End Group ________________________________________________________________________ */

    /** __________________________________________________________________ Slider ______________________________________________________________________ */

    /**
     *
     * @param $id int
     * @return nothing
     * @author Tremor
     */
    public function slider($id = 0){

        $this->data['active'] = __FUNCTION__;

        if(isset($id) && !empty($id) && is_numeric($id)){

            $this->data['slider'] = Slider::find($id);

            return View::make('admin.slider.one')->with($this->data);

        }else{

            $this->data['sliderList'] = Slider::orderBy('sort', 'asc')->get();

            return View::make('admin.slider.list')->with($this->data);
        }
    }

    /**
     *
     * @param $action string
     * @param $id int
     * @return nothing
     * @author Tremor
     */
    public function sliderAction($action, $id = 0){

        if(isset($id) && !empty($id) && !is_numeric($id)){
            return Redirect::to('admin/slider');
        }

        switch($action){
            case 'add' :

                $slider = new Slider;
                $slider->save();

                $newId = $slider->id;

                return Redirect::to('admin/slider/'.$newId);
                break;
            case 'edit' :

                $post = Input::except('_token');

                $slider = Slider::find($id);
                foreach($post as $key => $val){

                    if(isset($slider->$key)){
                        $slider->$key = $val;
                    }
                }
                $slider->save();

                return Redirect::to('admin/slider/'.$id);
                break;
            case 'delete' :

                $category = Slider::find($id);
                $category->delete();

                break;
            default :
                break;
        }

        return Redirect::to('admin/slider');
    }

    /** __________________________________________________________________ End Slider __________________________________________________________________ */

    /** __________________________________________________________________ Social _______________________________________________________________________ */

    /**
     *
     * @param $id int
     * @return nothing
     * @author Tremor
     */
    public function social($id = 0){

        $this->data['active'] = __FUNCTION__;

        if(isset($id) && !empty($id) && is_numeric($id)){

            $this->data['social'] = Social::find($id);

            return View::make('admin.social.one')->with($this->data);

        }else{

            $this->data['socialList'] = Social::orderBy('sort', 'asc')->get();

            return View::make('admin.social.list')->with($this->data);
        }
    }

    /**
     *
     * @param $action string
     * @param $id int
     * @return nothing
     * @author Tremor
     */
    public function socialAction($action, $id = 0){

        if(isset($id) && !empty($id) && !is_numeric($id)){
            return Redirect::to('admin/social');
        }

        switch($action){
            case 'add' :

                $social = new Social;
                $social->save();

                $newId = $social->id;

                return Redirect::to('admin/social/'.$newId);
                break;
            case 'edit' :

                $post = Input::except('_token');

//                $affectedRows = Category::where('id', $categoryId)->update($post);
                $social = Social::find($id);

                foreach($post as $key => $val){

                    if(isset($social->$key)){
                        $social->$key = $val;
                    }
                }
                $social->save();

                return Redirect::to('admin/social/'.$id);
                break;
            case 'delete' :

                $social = Social::find($id);
                $social->delete();

                break;
            default :
                break;
        }

        return Redirect::to('admin/social');
    }

    /** __________________________________________________________________ End Social ___________________________________________________________________ */

    /** __________________________________________________________________ Setting ______________________________________________________________________ */

    /**
     *
     * @param $id int
     * @return nothing
     * @author Tremor
     */
    public function setting($id = 0){

        $this->data['active'] = __FUNCTION__;

        $this->data['setting'] = Setting::first();

        return View::make('admin.setting.one')->with($this->data);
    }

    /**
     *
     * @param $action string
     * @param $id int
     * @return nothing
     * @author Tremor
     */
    public function settingAction($action, $id = 0){

        if(isset($id) && !empty($id) && !is_numeric($id)){
            return Redirect::to('admin/setting');
        }

        switch($action){
            case 'add' :

                $setting = new Setting;
                $setting->save();

                $newId = $setting->id;

                return Redirect::to('admin/setting/'.$newId);
                break;
            case 'edit' :

                $post = Input::except('_token');

//                $affectedRows = Category::where('id', $categoryId)->update($post);
                $setting = Setting::find($id);

                foreach($post as $key => $val){

                    if(isset($setting->$key)){
                        $setting->$key = $val;
                    }
                }
                $setting->save();

                return Redirect::to('admin/setting/'.$id);
                break;
            case 'delete' :

                $setting = Setting::find($id);
                $setting->delete();

                break;
            default :
                break;
        }

        return Redirect::to('admin/setting');
    }

    /** __________________________________________________________________ End Setting __________________________________________________________________ */

} // end Class