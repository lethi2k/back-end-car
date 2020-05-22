<?php
namespace Controllers;
use Models\Car;
use Models\Brand;
class HomeController extends BaseController {
	public function dashboard(){
        $totalcar = Car::count();
        $totalbrand = Brand::count();

	    $this->render('admin.dashboard', [
			'totalcar' => $totalcar,
			'totalbrand' => $totalbrand,
           
        ]);
    }
}


 ?>