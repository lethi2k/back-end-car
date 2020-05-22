<?php 
class ConNguoi
{
    private $name = 'amonymouse';

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

$chuBlog = new ConNguoi();
$chuBlog->setName('Lê Đình Thi');
echo $chuBlog->getName();
$nguoixem = new ConNguoi();
echo $nguoixem->getName();

?>