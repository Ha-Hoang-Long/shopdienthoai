@if(Session::has("Cart") != null)
<span class="count_item count_item_pr">{{Session::get('Cart')->totalQuantity}}</span>
@else
<span class="count_item count_item_pr">0</span>
@endif

