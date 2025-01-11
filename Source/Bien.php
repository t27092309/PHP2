<!-- Quy tắc đặt tên -->
<!-- Biến, hàm: Dùng kiểu camelCase - Bắt đầu bằng chữ thường, viết hoa chữ cái đầu của các từ tiếp theo -->
<!-- VD: -->

<?php
// $myName;
// function getMyName(): void
// {
//     //..............
// };
?>
<!-- Class: Dùng kiểu PascalCase - Bắt đầu bằng chữ hoa, viết hoa các chữ cái đầu của các từ tiếp theo -->

<?php
class Bien {}
// Hằng số: Dùng kiểu SNAKE_CASE - Viết hoa toàn bộ và phân cách các từ bằng dấu gạch dưới 
const PI = 3.14;
?>

<!-- Mảng & hàm -->
<!-- Mảng: là 1 Biến có thể chứa nhiều giá trị -->
<!-- Mấy loại bảng: 
         - Mảng chỉ số: Mảng có key là số( từ 0 -> n -1)
         - Mảng kết hợp: Mảng có key là chuỗi
         - Mảng đa chiều: Mảng trong mảng
        -->
<!-- Bài tập: VD các loại mảng (Khai báo, truy xuất giá trị) -->
<?php
$array1 = [1, 2, 3, 4, 5];
$array2 = ["brand" => "Ford", "model" => "Mustang"];
$array3 = array(
    array('Honda', 12, 13),
    array('Honda1', 15, 13),
    array('Honda2', 14, 13),
)
?>

<!-- Hàm: là 1 chức năng được đóng gói để tái sử dụng -->
    <!-- Hàm có trả về:
        - Có tham số
        VD: 
        <?php
// function square($num)
// {
    // return $num * $num;
// }
// echo square(4);   // outputs '16'.
// ?>
        - Không có tham số
         -->
    <!-- Hàm ko có trả về (Bao nhiêu tham số bấy nhiêu giá trị)
        -Có tham số
        -Không có tham số -->


<!-- MVC -->



