<?php getHeader();
    if(isset($_POST['btn-submit'])) {
        global $errors, $alerts, $uid, $emp_name, $username,$password, $email, $emp_role;
//        Validation
        if(!empty($_POST['UID'])){
            if(is_uid($_POST['UID'])){
//              Kiểm tra chứng minh nhân dân có tồn tại? -----  chưa
                $uid = $_POST['UID'];
            }
            else{
                $errors['not-UID'] = "Số CMND/CCCD bạn nhập không đúng định dạng, số đúng định dạng là một dãy số có từ 9 đến 12 chữ số";
            }
        }
        else{
            $errors['no-UID'] = "Mời bạn nhập số chứng minh nhân dân";
        }
        if(!empty($_POST['EmpName'])){
            if(is_fullname($_POST['EmpName'])){
                $emp_name = $_POST['EmpName'];
            }
            else{
                $errors['not-fullname'] = "Họ và tên không được chứa số hoặc các ký tự đặc biệt";
            }
        }
        else{
            $errors['no-EmpName'] = "Mời bạn nhập họ tên";
        }
        if(!empty($_POST['UserName'])){
            if(is_username($_POST['UserName'])){
                $username = $_POST['UserName'];
            }
            else{
                $errors['not-username'] = "Tên đăng nhập không đúng định dạng, tên đăng nhập đúng định dạng là một chuỗi có 6-32 ký tự và không bắt đầu bằng ký tự đặc biệt hay dấu .";
            }
        }
        else{
            $errors['no-UserName'] = "Mời bạn nhập tên đăng nhập";
        }
        if(!empty($_POST['Password'])){
            if(is_password($_POST['Password'])){
                $password = $_POST['Password'];
                if($_POST['Password'] == $_POST['RetypedPassword']){
                    $password = $_POST['Password'];
                }
                else{
                    $errors['unmatched-Password'] = "Mật khẩu nhập lại không khớp, mời nhập lại!";
                }

            }
            else{
                $errors['not-Password'] = "Mật khẩu bạn nhập không đúng định dạng, mật khẩu đúng định dạng là chuỗi có từ 5-31 ký tự và bắt đầu bằng ký tự viết hoa";
            }
        }
        else{
            $errors['no-Password'] = "Mời bạn nhập mật khẩu";
        }
        if(!empty($_POST['Email'])){
            if(is_email($_POST['Email'])){
                $email = $_POST['Email'];
            }
            else{
                $errors['not-Email'] = "Email bạn nhập không đúng định dạng, mời nhập lại";
            }
        }
        else{
            $errors['no-Email'] = "Mời bạn nhập địa chỉ email";
        }
        if(!empty($_POST['EmpRole'])){
            $emp_role = $_POST['EmpRole'];
        }
        else{
            $errors['no-EmpRole'] = "Mời bạn chọn chức vụ trong công ty";
        }
//        Insert
//        Testing AWS
        if(empty($errors)){
            $input = array();
            $input['UID'] = $uid;
            $input['EmpName'] = $emp_name;
            $input['UserName'] = $username;
            $input['Password'] = md5($password);
            $input['Email'] = $email;
            $input['EmpRole'] = $emp_role;
//            show_array($input);
            $MessageBody = json_encode($input, JSON_UNESCAPED_UNICODE);
            $__QueueURL__ = "https://sqs.us-east-1.amazonaws.com/092451480368/InsertEmpQueue";
            sendMessage($MessageBody,$__QueueURL__);
        }
        else{
            show_array($errors);
        }
    }
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm nhân viên</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" accept-charset="utf-8">
                        <label for="UID">Số CMND/CCCD</label>
                        <input type="text" name="UID" id="UID">
                        <?php echo return_error('no-UID'); ?>
                        <?php echo return_error('not-UID'); ?>
                        <label for="EmpName">Họ và tên</label>
                        <input type="text" name="EmpName" id="EmpName">
                        <?php echo return_error('no-EmpName'); ?>
                        <?php echo return_error('not-EmpName'); ?>
                        <label for="UserName">Tên đăng nhập</label>
                        <input type="text" name="UserName" id="UserName">
                        <?php echo return_error('no-UserName'); ?>
                        <?php echo return_error('not-UserName'); ?>
                        <label for="Password">Mật khẩu</label>
                        <input type="password" name="Password" id="Password">
                        <?php echo return_error('no-Password'); ?>
                        <?php echo return_error('not-Password'); ?>
                        <label for="RetypedPassword">Nhập lại mật khẩu</label>
                        <input type="password" name="RetypedPassword" id="RetypedPassword">
                        <label for="Email">Email</label>
                        <input type="text" name="Email" id="Email">
                        <?php echo return_error('no-Email'); ?>
                        <?php echo return_error('not-Email'); ?>
                        <label for="EmpRole">Vai trò</label>
                        <select name="EmpRole" id="EmpRole">
                            <option value="">--Mời chọn chức vụ---</option>
                            <option value="manager">Quản lý</option>
                            <option value="waiter">Bồi bàn</option>
                            <option value="cashier">Thu ngân</option>
                            <option value="chef">Đầu bếp</option>
                        </select>
                        <?php echo return_error('no-EmpRole'); ?>
                        <?php echo return_error('not-EmpRole'); ?>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php getFooter(); ?>
