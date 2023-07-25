<div class="product__item">
    <div class="product__item__pic set-bg"
        data-setbg="{{ $image }}">
        @if ($discount == true)
        <div class="label sale">On Sale</div>
        @elseif ($discount == false)
        <div class="label new">New</div>
        @endif
        <ul class="product__hover">
            <li><a href="{{ $image }}"
                    class="image-popup"><span class="arrow_expand"></span></a></li>
            <li><a href="{{ $route }}"><span><i class="fa fa-eye"></i></span></a></li>
        </ul>
    </div>
    <div class="product__item__text">
        <h6><a href="{{ $route }}">{{ $name }}</a></h6>
        <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>
        <div>
            <span class="product__price" style="color: red;">{{ rupiah($price) }}</span> <span class="product__sale_price"><s>{{ rupiah($sale_price) }}</s></span>
        </div>
    </div>
</div>