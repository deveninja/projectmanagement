<?

/*
    ► Load view format = VIEW, TEMPLATE, DATA = [array]
*/

class Pages extends Controller
{
    public function __construct()
    {
    
    }


    public function index()
    {
        $data = array (
            'title' => 'Home Page',
            'footer' => 'Footer notes here'
        );
        $this->view('pages/index', 'page', $data);
    }


    public function about()
    {   
        $data = array (
            'title' => 'About Page Nasad',
            'footer' => 'Footer notes here'
        );
        
        $this->view('pages/about', 'page', $data);
    }
}