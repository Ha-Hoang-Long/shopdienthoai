@extends('BE.layouts.admin')
@section('content')
<div class="row">
<div class="col-md-12">
<div class="x_panel">
<div class="x_title">
<h2>Media Gallery <small> gallery design </small></h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item" href="#">Settings 1</a>
<a class="dropdown-item" href="#">Settings 2</a>
</div>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<div class="row">
@foreach ($images as $image)

<div class="col-md-55">
<div class="thumbnail">
<div class="image view view-first">
<img style="width: 100%; display: block;" src="{{ asset('uploads/product_imgs/' . $image->getFilename()) }}" alt="image">
<div class="mask">
<p>Your Text</p>
<div class="tools tools-bottom">
<a href="#"><i class="fa fa-link"></i></a>
<a href="#"><i class="fa fa-pencil"></i></a>
<a href="#"><i class="fa fa-times"></i></a>
</div>
</div>
</div>
<div class="caption">
<?php foreach($products as $product){ ?>
<?php if($image->getFilename() == $product->Hinh_anh_product){?>
<p >Snow and Ice Incoming for the South <span class="btn-success"><i class="fa fa-check"></i></span> </p>

<?php break;}else{continue?>
    
    
<?php }?>
<p>Snow and Ice Incoming for the South</p>
<?php } ?>

</div>
</div>
</div>
                     <!-- <li style="width:80px;display:inline-block;margin:5px 0px">
                         <input type="checkbox" name="images[]" value="{{$image->getFilename()}}"/>
                         <img src="{{ asset('images/' . $image->getFilename()) }}" width="50" height="50">
                     </li> -->

@endforeach
</div>
</div>
</div>
</div>
</div>
@endsection