<?php
/**
 * @author Saleh Ahmad salehoyon@hotmail.com
 */
namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    /**
     * constructor
     */
    public function __construct()
    {
        helper(['form', 'session']);
    }

	public function index()
	{
	    if (!is_file(APPPATH.'/Views/pages/home.php')) {
            throw new PageNotFoundException('home');
        }

        $data['title']  = 'Codeigniter - Demo Payment';

        echo view('templates/header', $data);
        echo view('pages/home', $data);
        echo view('templates/footer', $data);
	}

}
