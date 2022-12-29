@extends('BE.layouts.admin')
@section('content')
<div class="col-md-9 col-sm-9 " style="margin: auto;">
	<div class="x_panel">
		<div class="x_title">
			<h2>Add Form <small>Thêm sản phẩm</small></h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br>
			<form id="demo-form2" role="form" action="{{url('admin/Product/save-Product')}}" method="post" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" enctype="multipart/form-data">
			@csrf
            <div class="item form-group">
	            <label class="col-form-label col-md-2 col-sm-3 label-align">Mã sản phẩm</label>
	            <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "Ma_sp" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Tên sản phẩm</label>
                <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "Ten_sp" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Tên hãng</label>
                <div class="col-md-9 col-sm-6 ">
					<select name= "Ma_hang" class="form-control input-sm m-bot15">
                        @foreach($brand_products as $key => $brand)
                            <option value="{{$brand->Ma_hang}}">{{$brand->Ten_hang}}</option>
                        @endforeach
					</select>
				</div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Danh mục</label>
                <div class="col-md-9 col-sm-6 ">
					<select name= "Ma_danh_muc" class="form-control input-sm m-bot15">
                        @foreach($category_products as $key => $cate)
                            <option value="{{$cate->Ma_danh_muc}}">{{$cate->Ten_danh_muc}}</option>
                        @endforeach
					</select>
				</div>
	        </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Ngày ra mắt</label>
                <div class="col-md-9 col-sm-6 ">
                    <input style="resize: none" rows="2" name= "Ngay_ra_mat" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Màn hình</label>
                <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "Man_hinh" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Hỗ trợ mạng</label>
				<div class="col-md-9 col-sm-6 ">
					<input type="text" name= "Mang" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
                </div>
	        </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Số sim</label>
				<div class="col-md-9 col-sm-6 ">
					<input type="text" name= "So_sim" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Bluetooth</label>
				<div class="col-md-9 col-sm-6 ">
					<input type="text" name= "Bluetooth" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">GPS</label>
				<div class="col-md-9 col-sm-6 ">
					<input type="text" name= "GPS" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Cổng sạc</label>
				<div class="col-md-9 col-sm-6 ">
					<input type="text" name= "Cong_sac" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Jack tai nghe</label>
				<div class="col-md-9 col-sm-6 ">
					<input type="text" name= "Jack_tai_nghe" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
                </div>
	        </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Camera trước</label>
	            <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "Cam_truoc" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">camera sau</label>
	            <div class="col-md-9 col-sm-6 ">
					<textarea  style="resize: none" rows="5" name= "Cam_sau" class="form-control"  id="exampleInputPassword1" placeholder=""></textarea>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Hệ điều hành</label>
	            <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "He_dieu_hanh" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">CPU</label>
                <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="4" name= "CPU" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Tốc độ CPU</label>
                <div class="col-md-9 col-sm-6 ">
					<textarea style="resize: none" rows="4" name= "Toc_do_CPU" class="form-control"  id="exampleInputPassword1" placeholder=""></textarea>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">GPU</label>
                <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "GPU" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Pin</label>
                <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "Pin" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Ram</label>
                <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "Ram" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Rom</label>
                <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "Rom" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
	            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Rom khả dụng</label>
				<div class="col-md-9 col-sm-6 ">
					<input type="text" name= "Rom_kha_dung" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
                </div>
	        </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Thiết kế</label>
				<div class="col-md-9 col-sm-6 ">
					<input type="text" name= "Thiet_ke" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
                </div>
	        </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Trọng lượng</label>
                <div class="col-md-9 col-sm-6 ">
                    <input type="text" name= "Trong_luong" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Giá tiền</label>
                <div class="col-md-9 col-sm-6 ">
					<input style="resize: none" rows="2" name= "Gia_tien" class="form-control"  id="exampleInputPassword1" placeholder=""></input>
	            </div>
            </div>
            <!--  -->
            <!-- <div class="item form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" name="Hinh_anh_product" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
            </div> -->
            
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Trạng thái<span class="required">*</span></label>
                <div class="col-md-9 col-sm-6 ">
					<select name= "status_product" class="form-control input-sm m-bot15">
						<option value="1">Hiển thị</option>
						<option value="0">Ẩn</option>
						
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
                    <img height="200" id="image" onerror="this.src='/admin_images/no-avatar.png'" />
				</div>
			</div>
			
			<div class="clearfix"></div>
			<div class="ln_solid"></div>
				<div class="item form-group">
					<div class="col-md-9 col-sm-9 offset-md-4">
						<button class="btn btn-primary" type="button" onclick="abc()">Cancel</button>
						<button class="btn btn-primary" type="reset">Reset</button>
						<button type="submit" name="add_categoryProduct" class="btn btn-success">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<script>
        function abc(){
            if(confirm("Bạn có muốn quay lại trang trước") == true){
				window.location.href = "{{URL('admin/listing/Product')}}"
                document.getElementById("demo").innerHTML = 
                "Bạn muốn tiếp tục";
            }else{
                document.getElementById("demo").innerHTML = 
                "Bạn không muốn tiếp tục";
            }
        }
</script>

@endsection