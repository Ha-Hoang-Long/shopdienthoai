@extends('BE.layouts.admin')
@section('content')
<div class="col-md-9 col-sm-9 " style="margin: auto;">
	<div class="x_panel">
		<div class="x_title">
			<h2>Up Form <small>Cập nhật sản phẩm</small></h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
		<?php
				foreach($edit_Product as $key => $edit_value){
			?>
			<br>
			<form id="demo-form2" role="form" action="{{url('admin/Product/update-Product/'.$edit_value->Ma_sp)}}" method="post" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" enctype="multipart/form-data">
			@csrf
			<?php
				$massage = Session::get('massage');
				if($massage){
					echo '<span style="color:green;">',$massage,'</span>';
					Session::put('massage',null);
				}
			?>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Tên sản phẩm</label>
                <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "Ten_sp" class="form-control"  id="exampleInputPassword1" value="{{$edit_value->Ten_sp}}" placeholder=""></input>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Tên hãng</label>
                <div class="col-md-9 col-sm-6 ">
					<select name= "Ma_hang" class="form-control input-sm m-bot15">
                        @foreach($brand_products as $key => $brand)
                            <option value="{{$brand->Ma_hang}}" {{($brand->Ma_hang) == "$edit_value->Ma_hang" ? "selected" : '' }}>{{$brand->Ten_hang}}</option>
                        @endforeach
					</select>
				</div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Danh mục</label>
                <div class="col-md-9 col-sm-6 ">
					<select name= "Ma_danh_muc" class="form-control input-sm m-bot15">
                        @foreach($category_products as $key => $cate)
                            <option value="{{$cate->Ma_danh_muc}}" {{($cate->Ma_danh_muc) == "$edit_value->Ma_danh_muc" ? "selected" : '' }}>{{$cate->Ten_danh_muc}}</option>
                        @endforeach
					</select>
				</div>
	        </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Ngày ra mắt</label>
                <div class="col-md-9 col-sm-6 ">
                    <input style="resize: none" rows="2" name= "Ngay_ra_mat" class="form-control" value="{{$edit_value->Ngay_ra_mat}}"  id="exampleInputPassword1" placeholder=""></input>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Màn hình</label>
                <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "Man_hinh" class="form-control" value="{{$edit_value->Man_hinh}}"  id="exampleInputPassword1" placeholder=""></input>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Hỗ trợ mạng</label>
				<div class="col-md-9 col-sm-6 ">
					<input type="text" name= "Mang" class="form-control" value="{{$edit_value->Mang}}"  id="exampleInputPassword1" placeholder=""></input>
                </div>
	        </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Số sim</label>
				<div class="col-md-9 col-sm-6 ">
					<input type="text" name= "So_sim" class="form-control" value="{{$edit_value->So_sim}}"  id="exampleInputPassword1" placeholder=""></input>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Bluetooth</label>
				<div class="col-md-9 col-sm-6 ">
					<input type="text" name= "Bluetooth" class="form-control" value="{{$edit_value->Bluetooth}}"  id="exampleInputPassword1" placeholder=""></input>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">GPS</label>
				<div class="col-md-9 col-sm-6 ">
					<input type="text" name= "GPS" class="form-control" value="{{$edit_value->GPS}}"  id="exampleInputPassword1" placeholder=""></input>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Cổng sạc</label>
				<div class="col-md-9 col-sm-6 ">
					<input type="text" name= "Cong_sac" class="form-control" value="{{$edit_value->Cong_sac}}"  id="exampleInputPassword1" placeholder=""></input>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Jack tai nghe</label>
				<div class="col-md-9 col-sm-6 ">
					<input type="text" name= "Jack_tai_nghe" class="form-control" value="{{$edit_value->Jack_tai_nghe}}"  id="exampleInputPassword1" placeholder=""></input>
                </div>
	        </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Camera trước</label>
	            <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "Cam_truoc" class="form-control" value="{{$edit_value->Cam_truoc}}"  id="exampleInputPassword1" placeholder=""></input>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">camera sau</label>
	            <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "Cam_sau" class="form-control" value="{{$edit_value->Cam_sau}}"  id="exampleInputPassword1" placeholder=""></input>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Hệ điều hành</label>
	            <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "He_dieu_hanh" class="form-control" value="{{$edit_value->He_dieu_hanh}}"  id="exampleInputPassword1" placeholder=""></input>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">CPU</label>
                <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "CPU" class="form-control" value="{{$edit_value->CPU}}" id="exampleInputPassword1" placeholder=""></input>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">GPU</label>
                <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "GPU" class="form-control" value="{{$edit_value->GPU}}" id="exampleInputPassword1" placeholder=""></input>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Pin</label>
                <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "Pin" class="form-control" value="{{$edit_value->Pin}}" id="exampleInputPassword1" placeholder=""></input>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Ram</label>
                <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "Ram" class="form-control" value="{{$edit_value->Ram}}" id="exampleInputPassword1" placeholder=""></input>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Rom</label>
                <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "Rom" class="form-control" value="{{$edit_value->Rom}}" id="exampleInputPassword1" placeholder=""></input>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Rom khả dụng</label>
				<div class="col-md-9 col-sm-6 ">
					<input type="text" name= "Rom_kha_dung" class="form-control" value="{{$edit_value->Rom_kha_dung}}" id="exampleInputPassword1" placeholder=""></input>
                </div>
	        </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Thiết kế</label>
				<div class="col-md-9 col-sm-6 ">
					<input type="text" name= "Thiet_ke" class="form-control" value="{{$edit_value->Thiet_ke}}" id="exampleInputPassword1" placeholder=""></input>
                </div>
	        </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Trọng lượng</label>
                <div class="col-md-9 col-sm-6 ">
                    <input type="text" name= "Trong_luong" class="form-control" value="{{$edit_value->Trong_luong}}" id="exampleInputPassword1" placeholder=""></input>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Giá tiền</label>
                <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "Gia_tien" class="form-control" value="{{$edit_value->Gia_tien}}" id="exampleInputPassword1" placeholder=""></input>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Trạng thái<span class="required">*</span></label>
                <div class="col-md-9 col-sm-6 ">
					<select name= "status_product" class="form-control input-sm m-bot15">
						<option value="1" {{($edit_value->status_product) == "1" ? "selected" : '' }}>Hiển thị</option>
						<option value="0" {{($edit_value->status_product) == "0" ? "selected" : '' }}>Ẩn</option>
						
					</select>
				</div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align" for="hinh-anh">Hình ảnh<span class="required">*</span></label>
				<div class="col-md-9 col-sm-6 ">
                    <script>
                        function chooseFile(fileIn){
                            if(fileIn.files && fileIn.files[0]){
                                var reader = new FileReader();
                                reader.onload = function(e){
                                    $('#image').attr('src',e.target.result);
                                }
                                reader.readAsDataURL(fileIn.files[0]);
                            }
                        }
                    </script>
					<input type="file" name="Hinh_anh_product" id="exampleInputFile" onchange="chooseFile(this)" required="required">
					<p class="help-block">Example block-level help text here.</p>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                    <script>
                        // Get a reference to our file input
                        const fileInput = document.querySelector('input[type="file"]');

                        // Create a new File object
                        const myFile = new File(['Hello World!'], '{{$edit_value->Hinh_anh_product}}', {
                            type: 'text/plain',
                            lastModified: new Date(),
                        });

                        // Now let's create a FileList
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(myFile);
                        fileInput.files = dataTransfer.files;

                        // Help Safari out
                        if (fileInput.webkitEntries.length) {
                            fileInput.dataset.file = `${dataTransfer.files[0].name}`;
                        }
                        
                    </script>
                    <img height="200" id="image" onerror="this.src='/admin_images/no-avatar.png'" src="/uploads/product_imgs/{{$edit_value->Hinh_anh_product}}" />
				</div>
			</div>
			<?php
				}
			?>
			<div class="clearfix"></div>
			<div class="ln_solid"></div>
				<div class="item form-group">
					<div class="col-md-9 col-sm-9 offset-md-4">
						<button class="btn btn-primary" type="button" onclick="abc()">Cancel</button>
						<button class="btn btn-primary" type="reset">Reset</button>
						<button type="submit" name="edit_Product" class="btn btn-success">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="clearfix"></div>

@endsection('Admin_content')