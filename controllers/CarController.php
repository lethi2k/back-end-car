<?php
namespace Controllers;
use Models\Car;
use Models\Brand;
class CarController extends BaseController {
	public function index(){
		// 1. Lấy toàn bộ sản phẩm
        $Cars = Car::all();
        $this->render('car.index', [
            'Cars' => $Cars
        ]);
	}

	public function remove($id){
        $Car = Car::find($id);
        if($Car == null){
            header("location: " . BASE_URL . "cars?msg=id không tồn tại");
            die;
        }
        // xoá sản phẩm dựa vào id
        Car::destroy($id);
        header("location: " . BASE_URL . "cars?msg=Xóa thành công!");
        die;
    }

    public function addForm(){

	    $cates = Brand::all();

	    $this->render('car.add', [
	        'cates' => $cates
        ]);
    }
    
    public function saveAdd(){
        $model = new Car();
        $model->fill($_POST);
        $image = $_FILES['image'];
        $filename = "";
        if($image['size'] > 0){
            $filename = "public/images/" . uniqid() . '-' . $image['name'];
            move_uploaded_file($image['tmp_name'], $filename);
        }
        $model->image = $filename;
        $model->save();
        header('location: ' . BASE_URL . 'cars');
        die;
    }

    public function editForm($id){
	    $cates = Brand::all();
	    // lấy ra dữ liệu của sản phẩm theo id
        $Car = Car::find($id);
        if(!$Car){
            header("location: " . BASE_URL . "Cars?msg=id không tồn tại");
            die;
        }

        $this->render('car.edit', [
            'cates' => $cates,
            'Car' => $Car
        ]);
    }

   

    public function saveEdit(){
	    $id = isset($_POST['id']) ? $_POST['id'] : -1;
        $model = Car::find($id);
        if(!$model){
            header("location: " . BASE_URL . "cars?msg=id không tồn tại");
            die;
        }

        // gán dữ liệu cho model
        $model->fill($_POST);
        // validate dữ liệu thêm 1 lần nữa bằng php => form
        // lưu file ảnh
        $image = $_FILES['image'];
        $filename = $model->image;
        if($image['size'] > 0){
            $filename = "public/images/" . uniqid() . '-' . $image['name'];
            move_uploaded_file($image['tmp_name'], $filename);
        }
        $model->image = $filename;
        // lưu dữ liệu với csdl
        $model->save();
        header('location: ' . BASE_URL . 'cars');
        die;
    }

    public function checkNameExisted(){
	    $name = $_POST['model_name'];
        $queryData = Car::where('model_name', $name);
        $numberRecord = $queryData->count();
	    echo $numberRecord == 0 ? "true" : "false";
    }
    public function getSearch(){
        $proid = isset($_GET['key']) ? $_GET['key'] : -1;
        $Cars = Car::where('model_name','like','%'. $proid.'%')->orWhere('price','like',$proid.'%')->orderBy('price','desc')->get();
        $this->render('car.search', [
            'Cars' => $Cars,
        ]);
    }
    
}

 ?>