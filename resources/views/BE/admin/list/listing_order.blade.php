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
</div>
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">

        <h2>List table <small>
                <?php echo $table_name ?>
            </small></h2>
        <div class="x_content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <?php foreach($Configs as $config){ ?>
                        <th style="vertical-align: auto;max-width:30px">
                            <?=$config['name']?>
                        </th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($data as $key => $record){ ?>
                    <td style="vertical-align: auto;max-width:10px">{{$record->id}}</td>
                    <td style="max-width:150px">{{$record->fullname}}</td>
                    <td style="max-width:200px">{{$record->email}}</td>
                    <td style="max-width:150px">{{$record->phone_number}}</td>
                    
                    <td style="max-width:200px">{{$record->apartment_number}}, {{$record->commune}}, {{$record->District}}, {{$record->province}}</td>
                    <td>{{$record->total_price}}</td>
                    <td>{{$record->order_status}}</td>
                    <td style="max-width:90px">{{$record->updated_at}}</td>
                    <td style="max-width:90px">{{$record->created_at}}</td>
                    <td>
                        <a href="{{URL('admin/Product/edit-Product/'.$record->id)}}" class="active"
                            ui-toggle-class=""><button type="button" class="btn btn-warning btn-sm">EDIT</button></a>
                        <br>
                        <a href="{{URL('admin/Product/delete-Product/'.$record->id)}}" class="active"
                            ui-toggle-class=""
                            onclick="return confirm('Bạn chắc chắn muốn xóa? Dữ liệu sẽ không thể khôi phục')"><button
                                type="button" class="btn btn-danger btn-sm">DEL</button></a>
                    </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
            <?= $data->links("pagination::bootstrap-4") ?>


        </div>

    </div>
    <!-- <button type="button" class="btn btn-primary"
        onclick="window.location.href='{{URL('admin/Product/add-product')}}'">Tạo sản phẩm mới</button> -->
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