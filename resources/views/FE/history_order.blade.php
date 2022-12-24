@extends('FE.layouts.home')

@section('content')
{{-- <h2 style="align-items: center">Tìm kiếm lịch sử đơn hàng</h2> --}}
<div class="container">
    <div class="">
        <div class="row card-margin">
            <div class="col-6 " style="margin: auto;">
                {{-- <div class="col-sm-3 ">
                    <label for="">Số điện thoại</label>
                </div> --}}
                <div class="col-sm-8 ">
                    <input type="search" class=" input" maxlength="10" placeholder="Số điện thoại">
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="col-sm-4 fa fa-search primary-btn"></button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-margin">
                <div class="card-body">
                    <div class="row search-body">
                        <div class="col-lg-12">
                            <div class="search-result">
                                <div class="result-header">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="records">Các đơn gần đây</div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="result-actions">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="result-body">
                                    <div class="table-responsive">
                                        <table class="table widget-26">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="widget-26-job-emp-img">
                                                            <img src="https://luatlaodong.vn/wp-content/uploads/2021/10/tai-xuong-1200x1200.png"
                                                                alt="Company" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="widget-26-job-title">
                                                            <a href="#">Đơn [ID]</a>
                                                            <p class="m-0"><a href="#" class="employer-name">Tình trạng:
                                                                </a> <span class="text-muted time">Đang giao</span></p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="widget-26-job-info">
                                                            <p class="type m-0">Địa chỉ</p>
                                                            <p class="text-muted m-0">in <span class="location">Tố Hữu,
                                                                    Đà Nẵng</span></p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="widget-26-job-salary">100k(Phí ship)</div>
                                                    </td>
                                                    <td>
                                                        <div class="widget-26-job-category bg-soft-base">
                                                            <i class="indicator bg-base"></i>
                                                            <span>Số tiền $</span>
                                                        </div>
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="d-flex justify-content-center">
                        <ul class="pagination pagination-base pagination-boxed pagination-square mb-0">
                            <li class="page-item">
                                <a class="page-link no-border" href="#">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link no-border" href="#">1</a></li>
                            <li class="page-item"><a class="page-link no-border" href="#">2</a></li>
                            <li class="page-item">
                                <a class="page-link no-border" href="#">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @endsection