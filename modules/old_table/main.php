<?php getHeader();
$tables_name = getAllTablesName();
$_SESSION['tables-name'] = $tables_name;
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php getSidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách các bảng</h3>
                    <a href="?mod=tables&act=add" title="" id="add-new" class="fl-left">Thêm mới</a>
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
                                <td><span class="thead-text">Tên bảng</span></td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach($tables_name as $name){
                                    ?>
                                        <tr class="table-name">
                                            <td>
                                                <a href="?mod=tables&act=detail&name=<?php echo $name; ?>"><?php echo $name; ?></a>
                                                <a href="?mod=tables&act=delete&name=<?php echo $name; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
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
