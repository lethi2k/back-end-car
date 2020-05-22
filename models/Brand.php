<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
class Brand extends Model{
    protected $table = 'brands';
    protected $fillable = ['brand_name', 'country' ];
    protected $attributes = [
        'logo' => "public/images/default-image.jpg",
    ];
 
}

// class SinhVien
// {
//     function __construct($message) {
//         echo $message;
//     }
// }
  
// // khởi tạo lớp SinhVien
// $sinhvien = new SinhVien('Lớp Sinh Viên vừa được khởi tạo');
?>