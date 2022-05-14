
# Xây dựng ứng dụng trên AWS cho phép tạo Database và cung cấp api để thêm, xóa, sửa trên Database

## Các tính năng chính

- Thêm, xóa table DynamoDB
- Tương tác dữ liệu của table trực tiếp trên web
- Tương tác dữ liệu của table thông qua API được cung cấp


## Công nghệ sử dụng 

**Client:** Html, Css3, Bootstrap

**Server:** Flask Framework, AWS Lambda, AWS SQS, AWS EC2

**Database:** DynamoDB


## Thành viên tham gia Project

- Lý Quốc Dũng - 19133015 - 19133015@student.hcmute.edu.vn
- Nguyễn Huỳnh Minh Trung - 19133061 - 19133061@student.hcmute.edu.vn
- Bùi Thị Ngân Tuyền - 19133066 - 19133066@student.hcmute.edu.vn


## Yêu cầu 
- Vào LearnLab--> start lab --> Aws Detail -->   AWS CLI --> show  copy bảng credentials
- vào thư mục C:\Users\tên máy\ .aws\credentials
- past AWS CLI vừa copy file credentials 
- git clone https://github.com/quocdunglxag123/Project-Nhom1-DeTai11.git
- vào AWS Tạo các SQS và Lamda theo file Lamda.txt
- Copy URL các SQS vừa tạo và past vào file lib/tables.php trong thư mục project để thay thế các URL của SQS
- Cài đặt xampp và chỉ đường dẫn vào thư mục project và run project
