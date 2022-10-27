@extends('BE.layouts.admin')
@section('content')

<?php
    $massage = Session::get('massage');
    if($massage){
        echo '<span class="text-alert">',$massage,'</span>';
        Session::put('massage',null);
    }
?>
<div class="page-title">
    <!-- <div class="title_left">
        <h3>Tables <small>Some examples to get you started</small></h3>
    </div>
    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
                </span>
            </div>
        </div>
    </div> -->
</div>
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        
        <h2>Stripped table <small><?php echo $table_name ?></small></h2>
        <div class="x_content">
            <table class="table table-striped">
                        <thead>
                            <tr>
                                <?php foreach($Configs as $config){ ?>
                                <th><?=$config['name']?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php foreach($data as $key => $record){ ?>
                                <td>{{$record->Ma_sp}}</td>
                                <td>{{$record->Ten_sp}}</td>
                                <td>{{$record->Ten_hang}}</td>
                                <td>{{$record->Ten_danh_muc}}</td>
                                <td>{{$record->Ngay_ra_mat}}</td>
                                <td>{{number_format($record->Gia_tien, 0, ',', '.')}}</td>
                                <?php
                                    if($record->status_product == 1){
                                ?>
                                        <td><a href="{{URL('admin/Product/unactive-Product/'.$record->Ma_sp)}}"><span class="fa fa-check-circle-o"></span></a></td>
                                        
                                <?php
                                    }else{
                                ?>
                                        <td><a href="{{URL('admin/Product/active-Product/'.$record->Ma_sp)}}"><span class="fa fa-circle-o"></span></a></td>
                                <?php
                                    }  
                                ?>
                                
                                <td><img height="75" onerror="this.src='/admin_images/no-avatar.png'" src="/uploads/product_imgs/{{$record->Hinh_anh_product}}" /></td>
                                <td>{{$record->updated_at}}</td>
                                <td>{{$record->created_at}}</td>
                                <td>
                                    <a href="{{URL('admin/Product/edit-Product/'.$record->Ma_sp)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-active"></i></a>
                                    <a href="{{URL('admin/Product/delete-Product/'.$record->Ma_sp)}}" class="active" ui-toggle-class="" onclick="return confirm('Bạn chắc chắn muốn xóa? Dữ liệu sẽ không thể khôi phục')"><i class="fa fa-times text-danger text"></i></a>
                                </td>
                                </tr>   
                            <?php } ?>

                        </tbody>
            </table>
            <?= $data->links("pagination::bootstrap-4") ?>
            

        </div>

    </div>
    <button type="button" class="btn btn-primary" onclick="window.location.href='{{URL('admin/Product/add-product')}}'">Tạo sản phẩm mới</button>
</div>
<!-- <form action="{{url('admin/import-sv')}}" method="POST" enctype="multipart/form-data">
@csrf
<input type="file" name="file" accept=".xlsx, .xls, .csv" required><br>
<input type="submit" value="Import EXCEL" name="import" class="btn btn-warning">
</form>
<form action="{{url('admin/export-sv')}}" method="POST">
@csrf
<input type="submit" value="Export EXCEL" name="export" class="btn btn-success">
</form> -->
<div class="x-panel">
    
</div>
@endsection