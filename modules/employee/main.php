<?php getHeader();
$emp_list = getEmployeesList();
//show_array($emp_list);
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php getSidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách nhân viên</h3>
                    <a href="?mod=employee&act=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <form method="GET" class="form-s">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                            <tr>
                                <td><span class="thead-text">CMND</span></td>
                                <td><span class="thead-text">Họ Tên</span></td>
                                <td><span class="thead-text">Chức vụ</span></td>
                                <td><span class="thead-text">Tên đăng nhập</span></td>
                                <td><span class="thead-text">Email</span></td>
                                <td class="text-center"><span class="thead-text">Hành động</span></td>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($emp_list as $emp){
                                    ?>
                                    <tr>
                                        <td><span class="tbody-text"><?php echo $emp['UID'];?></h3></span>
                                        <td><span class="tbody-text"><?php echo $emp['EmpName'];?></span></td>
                                        <td><span class="tbody-text">
                                                <?php
                                                $role = ['manager'=>"Quản lý", 'waiter'=>"Bồi bàn", 'cashier'=>"Thu ngân", 'chef'=>"Đầu bếp"];
                                                echo $role[$emp['EmpRole']];
                                                ?>
                                            </span>
                                        </td>
                                        <td><span class="tbody-text"><?php echo $emp['UserName'];?></span></td>
                                        <td><span class="tbody-text"><?php echo $emp['Email'];?></span></td>
                                        <td class="text-center">
                                            <a href="?mod=employee&act=edit&uid=<?php echo $emp['UID'];?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <span>|</span>
                                            <a href="?mod=employee&act=delete&uid=<?php echo $emp['UID'];?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title=""><</a>
                        </li>
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title="">></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php getFooter(); ?>
