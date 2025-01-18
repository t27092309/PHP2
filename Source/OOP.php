<!-- 
// Lớp và đối tượng
    - Đối tượng: 
        - Được chia làm 2 phần: Đặc điểm và hành động
        Đặc điểm: Là những thuộc tính của đối tượng
        VD: Đối tượng: Sinh viên
            +Tên, Mã SV, địa chỉ, ....

        Hành động: Là những phương thức của đối tượng( Thực hiện dc)
        VD: ăn, ngủ, học, .....

        VD: 3 đối tượng
            - Chó: 
                + Đen, 4 chân, ...
                + Ăn, ngủ, chơi,...
            - Mèo: 
                + Vàng, 4 chân, ...
                + Ăn, ngủ, chơi,...
            - Gà:
                + Lắm lông, 2 giò,..
                + Ăn, ngủ, gáy,....
    
    - Lớp(Class): Là khuôn mẫu để tạo ra nhiều đối tượng có chung thuộc tính và phương thức 
    VD:
    <?php
    class SinhVienn{
        // Khai báo đặc điểm (Thuộc tính == Biến)
        // Công thức: phạm_vi_truy_cập_$tên_thuộc_tính = giá trị;
        // phạm_vi_truy_cập: public, protected, private(Buổi tiếp)
        public $ten;
        public $tuoi;

        // Khai báo hành động (Phương thức == Hàm)
        // Công thức: phạm_vi_truy_cập function tên_hàm($tham số){//CodeCode}
        public function an(){
            echo 'SV dang an';
        }
        public function ngu(){
            echo 'SV dang ngu';
        }
        public function hoc(){
            echo 'SV dang hoc';
        }
    }
    ?>

    4 tính chất của OOP: đóng gói, kế thừa, đa hình, trừu tượng.
        - Đóng gói(Encapsulation): cho phép che giấu thông tin của đối tượng và chỉ cho phép truy cập thông qua các phương thức đã được định nghĩa
        trong các lớp đó mới có thể truy cập và sử dụng. Giúp che giấu thông tin và ngăn chặn truy cập trực tiếp từ bên ngoài. Giúp giảm thiểu 
        sự phụ thuộc giữa các đối tượng và tăng tính bảo mật.
            + Thể hiện qua: public, protected, private
            + VD: 
-->
    <?php
    class SinhVien{
        // Thuộc tính 90% là private
        private $ten = 'A'; // Chỉ được truy cập trực tiếp trong class
        protected $maSV = 'PH51414421'; // Chỉ được truy cập trực tiếp trong class và class kế thừa
        public $ngaySinh = '2000'; // Có thể truy cập từ bên ngoài
        // Phương thức get và set
        // Get: lấy ra giá trị của thuộc tính
        // Set: gán giá trị cho thuộc tính
        public function getTen(){
            return $this->ten;
        }
        public function setTen($ten){
            $this->ten = $ten;
        }
    }
    $sv1 = new SinhVien();
    echo $sv1->getTen();
    echo $sv1->ngaySinh;
    ?>

<!--
        - Kế thừa(Inheritance): cho phép xây dựng các lớp mới dựa trên cơ sở của lớp đã tồn tại(Lớp cha). Lớp mới(Lớp con) sẽ được kế thừa 1 hoặc 
        toàn bộ thuộc tính và phương thức của lớp cha.
            + VD: 
-->
<?php
    // class SucVat{
    //     private $name = "Cho";
    //     protected $color = "Den";
    //     public $size = "123";

    //     public function eat(){
    //         echo $this->name.'dang an';
    //     }
    // }

    // class Dog extends SucVat{
    //     public $leg;
        
    //     public function dogEat(){
    //         echo $this->eat() . $this->color;
    //     }
    // }
?>


<!-- Hằng trong OOP
    - Truy xuất hằng: tên lớp::tên hằng
-->
<?php
// echo Dog::PI ;
?>

<!-- 
    Đa hình(Polymorphism): interface không phải là class vì thế chúng cũng không có thuộc tính và phương thức 
    Interface: là một khuôn mẫu chứa các phương thức mà các lớp khác phải triển khai
    VD:
-->

<?php
interface DiChuyen{
    public function diChuyen();
}

class ConNguoi implements DiChuyen{
    public function diChuyen()
    {
        echo 'Con nguoi di bo';
    }
}

class OTo implements diChuyen{
    public function diChuyen()
    {
        echo 'Oto dang chay';
    }
}
// interface và abstract đều là bản thiết kế của dự án phần mềm
// interface là bản thiết kế cho các class có chung hành động(phương thức) nhưng không chung bản chấtchất
// abstract là bản thiết kế cho các class có chung đặc điểm về bản chất
// interface có khả năng mở rộng lớn hơn 
?>

<!-- 
    Trừu tượng:
    VD:
-->
<?php
abstract class Animal{
    abstract public function eat();

    abstract public function diChuyen();
}

    class Dog extends Animal{
        public function eat()
        {
            echo 'Con cho dang an';
        }

        public function diChuyen()
        {
            echo 'Con cho dang di';
        }
    }
    class Cat extends Animal{
        public function eat(){
            echo 'Con meo dang an';
        }
        public function diChuyen()
        {
            echo 'Con meo dang di';
        }
    }
?>

<!-- 
            Trait: 
    Trong PHP chỉ có đơn kế thừa(Trait giúp giải quyết vấn đề này)
    Trait là 1 tập hợp các phương thức có thể được sử dụng trong các class 
    VD:
-->
<?php
trait TongHieu{
    public function tinhTong($a, $b){
        return $a + $b;
    }
    private function tinhHieu($a, $b){
        return $a - $b;
    }
}
trait TichThuong{
    public function tinhTich($a, $b){
        return $a * $b;
    }
    protected function tinhThuong($a, $b){
        return $a / $b;
    }
}
class TinhToan implements diChuyen{
    use TongHieu, TichThuong;
    public function tinhTongHieu($a, $b){
        return $this->tinhTong($a, $b) + $this->tinhHieu($a, $b) + $this->tinhThuong($a, $b);
    }
    public function diChuyen()
    {
        echo 'Con meo dang di';
    }
}
$tt = new TinhToan();
?>