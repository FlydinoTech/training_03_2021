<div class="header-top">
		<div class="container">
	
			<div class="search">
				<form method="GET" action="{{route('searchCourse')}}">
						<input style="padding:0 5px ;margin:0;width:85%" type="text" name="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
						<!-- <input style="padding:0 5px ;margin:0"  type="submit" value="Search"> -->
						<button style="float:right;padding-bottom:0px" type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-search"></span> 
        </button>
						</form>
			</div>
		
			<div class="header-left">		
					<ul>
					<li><a href="{{route('home')}}">Trang chủ</a></li>
						@if(empty($user))
						<li><a href="{{route('login')}}">Đăng nhập</a></li>
						<li><a  href="{{route('register')}}">Đăng ký</a></li>
						@else
						<li><a  href="{{route('profile')}}">Trang cá nhân</a></li>
						<li><a href="{{route('logout')}}">Đăng xuất</a></li>
						
						@endif
						

					</ul>
					<!-- <div class="cart box_1">
						<a href="checkout.html">
						<h3> <div class="total">
							<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
							<img src="templates/libuser/images/cart.png" alt=""/></h3>
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>

					</div> -->
					<div class="clearfix"> </div>
			</div>
				<div class="clearfix"> </div>
		</div>
		</div>
		<div class="container">
			<div class="head-top">
				<div class="logo">
					<!-- <a href=""><img src="templates/libuser/images/logo.png" alt=""></a>	 -->
				</div>
		  <div class=" h_menu4">
				<ul class="memenu skyblue">
					  <!-- <li class="active grid"><a class="color8" href="index.html">Home</a></li>	
				      <li><a class="color1" href="#">Men</a>
				      	<div class="mepanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="products.html">Accessories</a></li>
										<li><a href="products.html">Bags</a></li>
										<li><a href="products.html">Caps & Hats</a></li>
										<li><a href="products.html">Hoodies & Sweatshirts</a></li>
										<li><a href="products.html">Jackets & Coats</a></li>
										<li><a href="products.html">Jeans</a></li>
										<li><a href="products.html">Jewellery</a></li>
										<li><a href="products.html">Jumpers & Cardigans</a></li>
										<li><a href="products.html">Leather Jackets</a></li>
										<li><a href="products.html">Long Sleeve T-Shirts</a></li>
										<li><a href="products.html">Loungewear</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="products.html">Shirts</a></li>
										<li><a href="products.html">Shoes, Boots & Trainers</a></li>
										<li><a href="products.html">Shorts</a></li>
										<li><a href="products.html">Suits & Blazers</a></li>
										<li><a href="products.html">Sunglasses</a></li>
										<li><a href="products.html">Sweatpants</a></li>
										<li><a href="products.html">Swimwear</a></li>
										<li><a href="products.html">Trousers & Chinos</a></li>
										<li><a href="products.html">T-Shirts</a></li>
										<li><a href="products.html">Underwear & Socks</a></li>
										<li><a href="products.html">Vests</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<h4>Popular Brands</h4>
									<ul>
										<li><a href="products.html">Levis</a></li>
										<li><a href="products.html">Persol</a></li>
										<li><a href="products.html">Nike</a></li>
										<li><a href="products.html">Edwin</a></li>
										<li><a href="products.html">New Balance</a></li>
										<li><a href="products.html">Jack & Jones</a></li>
										<li><a href="products.html">Paul Smith</a></li>
										<li><a href="products.html">Ray-Ban</a></li>
										<li><a href="products.html">Wood Wood</a></li>
									</ul>	
								</div>												
							</div>
						  </div>
						</div>
					</li> -->
				  
			  </ul> 
			</div>
				
				<div class="clearfix"> </div>
		</div>
		</div>

	</div>