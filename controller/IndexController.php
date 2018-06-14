<?php
class IndexController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
//        $u = new UsersModel();
//        print_r($u->getAll());
//        $data1 =array(
//            'UserName' => 'User1',
//            'PassWord' => 'haha',
//            'Description' => 'haha'
//        );
//        $u->deleteById(3);
//        $u->updateById($data1, 1);
//        $u->insert($data1);
        //get page number from url
        $page = 1; //if null set $page =1
        //if != null
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        //reset productlist on screen
        $products = array();
        //set products to list
        for ($i = ($page - 1) * 12; $i < 12 * $page; $i++) {
            if (isset($GLOBALS['products'][$i])) {
                array_push($products, $GLOBALS['products'][$i]);
            }
        }
        $data = array(
            'products' => $products, //products
            'currentPage' => $page, //curent page
            'pages' => (count($GLOBALS['products']) / 12 + 1), //total pages
            'nav' => 'Index'
        );
        $this->view->render('home/index', $data);
    }

    public function detail($id) {
        $data = array();
        foreach ($GLOBALS['products'] as $key => $value) {
            if ($value['id'] == $id) {
                $data = $value;
                break;
            }
        }
        $data['nav'] = 'Index';
        $this->view->render('home/detail', $data);
    }

}
