<?php 
namespace Controllers;
use Models\Car;
use Models\Brand;
class BrandController extends BaseController{
	public function index(){
        $Brand = Brand::all();
        $this->render('brand.index', [
            'Brand' => $Brand
        ]);
    }
    // paginate(2)
	public function remove($id){
        $Brand = Brand::find($id);
        if($Brand == null){
            header("location: " . BASE_URL . "brand?msg=id không tồn tại");
            die;
        }
        Car::where('brand_id', $id)->delete();
        Brand::destroy($id);
        header("location: " . BASE_URL . "brand?msg=Xóa thành công!");
        die;
    }

    public function addForm(){
		$cates = Brand::all();
		$this->render('brand.add', [
	        'cates' => $cates
        ]);
    }

    public function saveAdd(){
	    $model = new Brand();
        $model->fill($_POST);
        $image = $_FILES['logo'];
        $filename = "";
        if($image['size'] > 0){
            $filename = "public/images/" . uniqid() . '-' . $image['name'];
            move_uploaded_file($image['tmp_name'], $filename);
        }
        $model->logo = $filename;
        $model->save();
        header('location: ' . BASE_URL ."brand");
        die;
    }

    public function editForm($id){
	    $brands = Brand::all();
        $brand = Brand::find($id);
        if(!$brand){
            header("location: " . BASE_URL . "brand?msg=id không tồn tại");
            die;
        }

		$this->render('brand.edit', [
            'brands' => $brands,
            'brand' => $brand
        ]);
    }


    public function saveEdit(){
	    $id = isset($_POST['id']) ? $_POST['id'] : -1;
        $model = Brand::find($id);
        if(!$model){
            header("location: " . BASE_URL ."brand?msg=id không tồn tại");
            die;
        }
        $model->fill($_POST);
        $image = $_FILES['logo'];
        $filename = $model->logo;
        if($image['size'] > 0){
            $filename = "public/images/" . uniqid() . '-' . $image['name'];
            move_uploaded_file($image['tmp_name'], $filename);
        }
        $model->logo = $filename;
        // lưu dữ liệu với csdl
        $model->update();
        header('location: ' . BASE_URL .'brand');
        die;
    }

    
    public function checkNameExisted(){
	    $name = $_POST['brand_name'];
	    $id = isset($_POST['id']) ? $_POST['id'] : -1;
	    $queryData = Brand::where('brand_name', $name);

	    if($id != -1){
	        $queryData->where('id', '!==', $id);
        }
        $numberRecord = $queryData->count();

	    echo $numberRecord == 0 ? "true" : "false";
    }

    public function getSearch(){
        $proid = isset($_GET['brand']) ? $_GET['brand'] : -1;
        $Brand = Brand::where('brand_name','like','%'. $proid.'%')->get();
        $this->render('brand.search', [
            'Brand' => $Brand
        ]);

    }

}

 ?>