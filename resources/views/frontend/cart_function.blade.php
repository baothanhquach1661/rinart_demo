{{-- <script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })

// Start Product View with Modal 
    function productView(id){
    // alert(id)
    $.ajax({
        type: 'GET',
        url: '/product/view/modal/'+id,
        dataType:'json',
        success: function(data){
            // console.log(data)
            $('#pname').text(data.product.product_name_vi);
            $('#pcode').text(data.product.product_code);
            $('#pprice').text(data.product.selling_price);
            $('#pimage').attr('src','/'+data.product.product_thumbnail);

            $('#product_id').val(id);
            $('#qty').val(1);

            // Product Price 
            if (data.product.discount_price == null) {
                $('#pprice').text('');
                $('#oldprice').text('');
                $('#pprice').text(data.product.selling_price);
            }else{
                $('#pprice').text(data.product.discount_price);
                $('#oldprice').text(data.product.selling_price);
            } // end prodcut price 

            // Start Stock opiton
            if (data.product.product_qty > 0) {
                $('#available').text('');
                $('#stockout').text('');
                $('#available').text('Available');
            }else{
                $('#available').text('');
                $('#stockout').text('');
                $('#stockout').text('Out of Stock');
            } // end Stock Option 
 
        }
    })
 
}
// End Product View with Modal 

// Start Add To Cart Product 
    function addToCart(){
        var product_name = $('#pname').text();
        var id = $('#product_id').val();
        var quantity = $('#qty').val();
        $.ajax({
            type: "POST",
            dataType: 'json',
            data:{
                quantity:quantity, product_name:product_name
            },
            url: "/cart/data/store/"+id,
            success:function(data){

                miniCart();

                $('#closeModel').click();
                console.log(data)
                // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message
            }
        })
    }
  
// End Add To Cart Product 

</script>

<script>

    function miniCart(){
        $.ajax({
            type: 'GET',
            url: '/product/mini/cart',
            dataType:'json',
            success:function(response){

                $('span[id="cart_total"]').text(response.cart_total);
                $('#cart_qty').text(response.cart_qty);

                var miniCart = ""

                $.each(response.carts, function(key,value){
                    miniCart += 
                                `<div class="cart-body">
                                    <ul class="cart-item-list">
                                        <li class="cart-item">
                                            <div class="item-img">
                                                <a href="#"><img id="pimage" src="/${value.options.image}" alt="${value.name}"></a>
                                                <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)" class="close-btn"><i class="fas fa-times"></i></button>
                                            </div>
                                            <div class="item-content">
                                                <h3 class="item-title"><a href="#"><span id="pname">${value.name}</span></a></h3>
                                                <div class="item-price">
                                                    <span class="currency-symbol" id="pprice" style="color:red;">₫${value.price} x ${value.qty}</span>
                                                </div>
                                                
                                                <div class="pro-qty item-quantity">
                                                    <input type="number" class="quantity-input" value="${value.qty}" min="1" id="qty">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>`

                });
                
                $('#miniCart').html(miniCart);

            }
        })
     }

miniCart();

/// mini cart remove item ///
function miniCartRemove(rowId){
        $.ajax({
            type: 'GET',
            url: '/minicart/product-remove/'+rowId,
            dataType:'json',
            success:function(data){
            miniCart();
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }
/// end mini cart remove item ///

</script>


<!-- add to wishlist -->
<script>

    // Start Product View with Modal 

        function addToWishlist(product_id){
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-wishlist/"+product_id,
                success:function(data){

                    // Start Message 
                    const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          
                          showConfirmButton: false,
                          timer: 3000
                        })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    }else{
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            })
        }

    // End Product View with Modal 

</script>
<!-- end add to wishlist -->


{{-- wishlist page --}}
{{-- <script>
    function wishlist(){
        $.ajax({
            type: 'GET',
            url: '/user/get-wishlist-product',
            dataType:'json',
            success:function(response){

                var rows = ""

                $.each(response, function(key,value){
                    rows += 
                            `<tr>
                                <td class="product-remove">
                                    <button type="submit" class="remove-wishlist" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fal fa-times"></i>
                                    </button>
                                </td>
                                <td class="product-thumbnail"><a href="#"><img src="/${value.product.product_thumbnail}" alt="${value.product.product_name_vi}"></a></td>
                                <td class="product-title"><a href="#">${value.product.product_name_vi}</a></td>
                                <td class="product-price" data-title="Price">
                                    ${value.product.discount_price == null 
                                        ? `<span class="currency-symbol" style="color: red;">₫${value.product.selling_price}</span>`
                                        : `<span class="currency-symbol" style="color: red;">₫${value.product.discount_price}</span>`
                                    }
                                    
                                </td>
                                <td class="product-stock-status" data-title="Status">
                                    ${value.product.product_qty > 0
                                        ? `In Stock`
                                        : `Out of Stock`
                                    }
                                    
                                </td>
                                <td class="product-add-cart">
                                    <input type="hidden" id="product_id" value="${value.product_id}" min="1">
                                    <button type="submit" onclick="addToCart()" class="axil-btn btn-light viewcart-btn">Thêm vào giỏ hàng
                                    </button>
                                </td>
                            </tr>`

                });
                
                $('#wishlist').html(rows);

            }
        })
     }

wishlist();

/// wishlist remove item ///
function wishlistRemove(id){
        $.ajax({
            type: 'GET',
            url: '/user/wishlist-remove/'+id,
            dataType:'json',
            success:function(data){
            wishlist();
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }
/// end wishlist remove item ///

</script> --}}
{{-- end wishlist page --}}


{{-- cart page --}}
{{-- <script>
    function cart(){
        $.ajax({
            type: 'GET',
            url: '/user/get-cart-products',
            dataType:'json',
            success:function(response){

                var rows = ""

                $.each(response.cart, function(key,value){
                    rows += 
                            `<tr>
                                <td class="product-remove">
                                    <a href="#" id="${value.rowId}" class="remove-wishlist" onclick="cartItemRemove(this.id)"><i class="fal fa-times"></i></a>
                                </td>
                                <td class="product-thumbnail"><a href="#">
                                    <img src="/${value.options.image}" alt="${value.name}"></a>
                                </td>
                                <td class="product-title">
                                    <a href="#">${value.name}</a>
                                </td>
                                <td class="product-price" data-title="Price">
                                    <span class="currency-symbol" style="color: #EB455F;">₫${value.price}</span>
                                </td>
                                <td class="product-quantity" data-title="Qty">
                                    <div class="pro-qty">

                                        ${value.qty > 1

                                        ? `<button type="submit" class="dec qtybtn" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>`

                                        : `<button type="submit" class="dec qtybtn" disabled>-</button>`

                                        }
                                        
                                        <input type="number" class="quantity-input" value="${value.qty}" min="1" max="100" disabled>
                                        <button type="submit" class="inc qtybtn" id="${value.rowId}" onclick="cartIncrement(this.id)">+</button>
                                    </div>
                                </td>
                                <td class="product-subtotal" data-title="Subtotal">
                                    <span class="currency-symbol" style="color: #DC0000;">₫${value.subtotal}</span>
                                </td>
                            </tr>`

                });
                
                $('#cartPage').html(rows);

            }
        })
     }

cart();

/// cart remove item ///
function cartItemRemove(id){
        $.ajax({
            type: 'GET',
            url: '/user/cart-remove/'+id,
            dataType:'json',
            success:function(data){
                couponCalculation();
                cart();
                miniCart();
                $('#couponField').show();
                $('#coupon_name').val('');

            // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
            // End Message 
            }
        });
    }
/// end cart remove item ///


 // -------- Cart Increment + Decrement --------//
    function cartIncrement(rowId){
        $.ajax({
            type:'GET',
            url: "/cart-increment/"+rowId,
            dataType:'json',
            success:function(data){
                couponCalculation();
                cart();
                miniCart();
            }
        });
    }

    function cartDecrement(rowId){
        $.ajax({
            type:'GET',
            url: "/cart-decrement/"+rowId,
            dataType:'json',
            success:function(data){
                couponCalculation();
                cart();
                miniCart();
            }
        });
    }
 // ---------- End Cart Increment + Decrement -----///

</script> --}}

{{-- Coupon apply area --}}

{{-- <script>
    function applyCoupon(){
        var coupon_name = $('#coupon_name').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                coupon_name:coupon_name
            },
            url: "{{ url('/coupon-apply') }}",
            success:function(data){
                couponCalculation();
                $('#couponField').hide();

                // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
            // End Message 

            }
        })
      } // end function


    function couponCalculation(){
        $.ajax({
            type: 'GET',
            url: "{{ url('/coupon-calculation') }}",
            dataType: 'json',
            success:function(data){

                if (data.total) {

                    $('#couponCalField').html(
                        `<tr class="order-subtotal">
                            <td>Subtotal</td>
                            <td>₫${data.total}</td>
                        </tr>
                        
                        <tr class="order-total">
                            <td>Total</td>
                            <td class="order-total-amount">₫${data.total}</td>
                        </tr>`
                        )

                }else{

                    $('#couponCalField').html(
                        `<tr class="order-subtotal">
                            <td>Subtotal</td>
                            <td><span style="color: blue;">₫${data.subtotal}</span></td>
                        </tr>

                        <tr class="order-subtotal">
                            <td>Coupon Code</td>
                            <td>${data.coupon_name}
                                <button type="submit" class="remove-wishlist" onclick="couponRemove()" style="margin-left: 10px;
                                                    text-align: center;
                                                    height: 32px;
                                                    width: 32px;
                                                    line-height: 30px;
                                                    background-color: var(--color-lighter);
                                                    border: 2px solid var(--color-lighter);
                                                    border-radius: 50%;
                                                    font-size: 12px;
                                                    color: var(--color-black);
                                                    transition: var(--transition);"><i class="fal fa-times"></i></button>
                            </td>
                        </tr>

                        <tr class="order-subtotal">
                            <td>Discount Amount</td>
                            ${data.discount_percentage == null

                                        ? `<td>₫${data.discount_regular_amount}</td>`

                                        : `<td>${data.discount_percentage}%  | ₫${data.discount_percentage_amount}</td>`

                                        }
                            
                        </tr>
                        
                        <tr class="order-total">
                            <td>Total</td>
                            ${data.discount_percentage == null

                                        ? `<td class="order-total-amount" style="color: red;">₫${data.total_regular_amount}</td>`

                                        : `<td class="order-total-amount" style="color: red;">₫${data.total_percentage_amount}</td>`

                                        }
                            
                        </tr>`
                        )

                }
            }
        })
      }

couponCalculation();

</script> --}}

{{-- end Coupon apply area --}}

{{-- Coupon remove area --}}

{{-- <script>
    function couponRemove(){
        $.ajax({
            type:'GET',
            url: "{{ url('/coupon-remove') }}",
            dataType: 'json',
            success:function(data){

                couponCalculation();

                $('#couponField').show();
                $('#coupon_name').val('');

                 // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }

</script> --}}

{{-- end remove Coupon area --}} --}}