@extends('FE.layouts.home')
@section('content')
<title>profile edit </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
								<div class="mt-3">
									<h4>John Doe</h4>
									
									<p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
									
								</div>
							</div>
							
							
						</div>
					</div>
				</div>
                <?php $num = 0; ?>
                @if(Str::length($customers) > 0)
                @foreach ($customers as $cus)
                    
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$cus->fullname}}" name="fullname">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="email" class="form-control" value="{{$cus->email}}">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="phone_number" value="{{$cus->phone_number}}">
								</div>
							</div>
							
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="field field-half">
                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                    <label class="field-label" for="input-countryid">Tỉnh/TP</label>
                                                    <select name="province" id="city"
                                                        class="field-input form-control chosen-select-deselect">
                                                        <option value="{{$cus->province}}" selected disabled>{{$cus->province}}</option>
                                                    </select>
                                                    <!---->
                                                </div>
                                            </div>
                                            <div class="field field-half">
                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                    <label class="field-label" for="input-countryid">Quận/huyện</label>
                                                    <select name="District" id="district"
                                                        class="field-input form-control chosen-select-deselect">
                                                        <option value="{{$cus->District}}" selected disabled>{{$cus->District}}</option>
                                                    </select>
                                                    <!---->
                                                </div>
                                            </div>
                                            <div class="field field-half">
                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                    <label class="field-label" for="input-countryid">Phường/Xã</label>
                                                    <select name="commune" id="ward"
                                                        class="field-input form-control chosen-select-deselect">
                                                        <option value="{{$cus->commune}}" selected disabled>{{$cus->commune}}</option>
                                                    </select>
                                                    <!---->
                                                </div>
                                            </div>
                                            <div class="field required">
                                                <div class="field-input-wrapper">
                                                    <label class="control-label field-label" for="input-address">Số
                                                        nhà,tên đường</label>
                                                    <input type="text" name="apartment_number" value="{{$cus->commune}}"
                                                        id="input-address" placeholder="Ví dụ: Số 247 Nguyễn Văn Linh"
                                                        class="field-input form-control" />
                                                    <!---->
                                                </div>
                                            </div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="button" class="btn btn-primary px-4" value="Save Changes">
								</div>
							</div>
						</div>
					</div>
					
				</div>
                $num++;
                @endforeach
                @endif
                @if ($num == 0)
                <div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="John Doe">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="john@example.com">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="(239) 816-9029">
								</div>
							</div>
							
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="field field-half">
                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                    <label class="field-label" for="input-countryid">Tỉnh/TP</label>
                                                    <select name="province" id="city"
                                                        class="field-input form-control chosen-select-deselect">
                                                        <option value="" selected disabled>--Chọn tỉnh thành--</option>
                                                    </select>
                                                    <!---->
                                                </div>
                                            </div>
                                            <div class="field field-half">
                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                    <label class="field-label" for="input-countryid">Quận/huyện</label>
                                                    <select name="District" id="district"
                                                        class="field-input form-control chosen-select-deselect">
                                                        <option value="" selected disabled>--Chọn quận huyện--</option>
                                                    </select>
                                                    <!---->
                                                </div>
                                            </div>
                                            <div class="field field-half">
                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                    <label class="field-label" for="input-countryid">Phường/Xã</label>
                                                    <select name="commune" id="ward"
                                                        class="field-input form-control chosen-select-deselect">
                                                        <option value="" selected disabled>--Chọn phường xã--</option>
                                                    </select>
                                                    <!---->
                                                </div>
                                            </div>
                                            <div class="field required">
                                                <div class="field-input-wrapper">
                                                    <label class="control-label field-label" for="input-address">Số
                                                        nhà,tên đường</label>
                                                    <input type="text" name="apartment_number" value=""
                                                        id="input-address" placeholder="Ví dụ: Số 247 Nguyễn Văn Linh"
                                                        class="field-input form-control" />
                                                    <!---->
                                                </div>
                                            </div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="button" class="btn btn-primary px-4" value="Save Changes">
								</div>
							</div>
						</div>
					</div>
					
				</div>
                @endif
			</div>
		</div>
	</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function (result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Name);
            }
            citis.onchange = function () {
                district.length = 1;
                ward.length = 1;
                if (this.value != "") {
                    const result = data.filter(n => n.Name === this.value);

                    for (const k of result[0].Districts) {
                        district.options[district.options.length] = new Option(k.Name, k.Name);
                    }
                }
            };
            district.onchange = function () {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Name === citis.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w.Name);
                    }
                }
            };
        }
    </script>
<style type="text/css">
body{
    background: #f7f7ff;
    margin-top:20px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
    margin-right: .5rem!important;
}
</style>

<script type="text/javascript">

</script>
@endsection