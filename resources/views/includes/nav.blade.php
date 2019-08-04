<nav class="col-12 cd-12 rel top-left">



	@if ($agent->isDesktop())
	<div class="bb-light col-12 back-body rel pt-em-1 pb-em-1 pl-5 pr-5 flex-between">

		<div class="col-6 flex-center-start">
			<div class="mr-em-3">
				<div class="flex-center">
					<div class="mr-em-1">
						<img src="{{ asset('img/icon/phone.png')}}" alt="Запчасти для телевизоров, продать телевизор +на запчасти, телевизор скупка, телезапчасти">
					</div>
					<p class="m-0 ct">+7 812 000 00 00</p>
				</div>
			</div>

			<div>
				<div class="flex-center">
					<div class="mr-em-1">
						<img src="{{ asset('img/icon/mail.png')}}" alt="Запчасти для телевизоров, продать телевизор +на запчасти, телевизор скупка, телезапчасти">
					</div>
					<a href="mailto:" class="ct">info@telezapchasti.ru</a>
				</div>
			</div>

		</div>

		<div class="col-6 flex-center-end">

			<div class="flex-center-end">
				<div class="mr-em-1">
					<img src="{{ asset('img/icon/user.png')}}" alt="Запчасти для телевизоров, продать телевизор +на запчасти, телевизор скупка, телезапчасти">
				</div>
				@auth
				<a href="{{ url('/home') }}" class="rel mr-em-2 ct line-right">Home</a>
				@else
				<a href="{{ route('login') }}" class="rel mr-em-2 ct line-right">Вход</a>

				@if (Route::has('register'))
				<a href="{{ route('register') }}" class="rel mr-em-2 ct">Регистрация</a>
				@endif
				@endauth


			</div>
		</div>
	</div>

	@endif



	<!-- Search + Logo + Card -->


	<div class="col-12 sd-12 flex-center-between pt-em-2 pb-em-2 pl-5 pr-5 back-back">
		<div class="col-4 sd-7">
			<a class="logo flex-center sd-12" href="{{ route('main') }}">
				<img class="sd-2" src="{{ asset('img/icon/logo.svg') }}" alt="Телезапчасти">
				<h3><span>tele</span>Zapchasti</h3>
			</a>
		</div>

		@if ($agent->isDesktop())

		<div class="rel col-5">
			<div class="col-12 bc b5">
				<form action="#" method="POST" class="flex-center">
					<div class="form-label-group col-7">
						<input type="text" id="search" name="search" value="" class="form-control col-12" placeholder="Поиск по продукции">
						<label for="search">Поиск по продукции</label>
					</div>
					<div class="dropdown col-5 arrow-bottom rel">
						<div class="dropdown__list rel flex-center-center">
							<img class="ml-em-1" src="{{ asset('img/icon/chevron-arrow-down.svg') }}" alt="Запчасти для телевизоров, продать телевизор +на запчасти, телевизор скупка, телезапчасти">
							<span class="dropdown_placeholder col-9 cc c-p flex-center-center">
								Все категории
							</span>
							<ul class="dropdown__list__ul abs top-max-left shadow col-12 b5 back-back">
								<li><a class="hover pt-2 pb-2 pr-5 pl-5 block" href="#">Все категории</a></li>
								@foreach($navigations as $item)
								<li><a class="hover bt-light pt-2 pb-2 pr-5 pl-5 block" href="#">{{ $item->name }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</form>
			</div>
			
			<div class="result__search abs col-12 shadow">
				<div class="result__wrapp col-12 b5 hide">
					<div class="container">
						<div class="noscroll">
							<div class="article" id="tbody">
							
							</div>                        
						</div>                    
					</div>
				</div>
			</div>
		</div>

		@endif


		<div class="col-3 sd-4">
			<div class="@if ($agent->isDesktop()) flex-center-end @else flex-center-start @endif sd-12">
				<div class="rel">
					<img class="col-12" src="{{ asset('img/icon/cart.png')}}" alt="Запчасти для телевизоров, продать телевизор +на запчасти, телевизор скупка, телезапчасти">
					<div class="cart_count">
						<span id="countProducts">{!! $cart['cart_count'] !!}</span>
					</div>
				</div>
				<div class="ml-em-2 col-5">
					<div class="cart_text">
						<a href="{{ route('cart') }}">Корзина</a>
					</div>
					<div class="cart_price flex-center" >
						<p class="m-1 cc" id="totalPrice">{!! $cart['cart_total'] !!}</p>
						<p class="m-1 cc">&nbsp;&#x20bd;</p>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Menu -->

	<div class="shadow col-12 rel back-back pt-0 pb-0 pl-5 pr-5 flex-between bt-light">

		<!-- Dropdown Menu с категориями -->

		<div class="menu_dropdown rel sd-8">
			<div class="dropdown__list flex-center back-back c-p top-max-left">
				<span class="menu_dropdown_placeholder back-main flex-center-center cb p-5">
					<img class="col-1 mr-em-2" src="{{ asset('img/icon/menu.svg') }}" alt="Запчасти для телевизоров, продать телевизор +на запчасти, телевизор скупка, телезапчасти">
					Все категории
				</span>
				<ul class="abs top-max-left shadow col-12 back-back bbl5 bbr5 mt-0 dropdown__list__ul @if(Request::is('/') || Request::is('запчасти_для_телевизоров') && $agent->isDesktop()) active @endif">
					@foreach($navigations as $item)
					<li class="flex-center-between rel bt-light">
						<a class="hover-main pr-em-1 pl-em-1 block sd-9 col-10" href="{{ urldecode(route('category.show', ['part_types_id' => $item->slug ])) }}">{{ $item->name }}</a>
						@if($item->navigation_items->count() > 1)
						<img class="m-em-1" src="{{ asset('img/icon/chevron-arrow-left.svg') }}" alt="Запчасти для телевизоров, продать телевизор +на запчасти, телевизор скупка, телезапчасти">
						<ul class="dropdown__list__ul additional abs @if ($agent->isDesktop()) top-left-max @else top-left-middle @endif shadow col-12 back-back bbl5 bbr5">
							@foreach($item->navigation_items as $add)
							<li class="flex-center-between rel bt-light">
								<a class="hover-main pr-em-1 pl-em-1 block" href="{{ urldecode(route('category.show', ['part_types_id' => $add->additional_slug ])) }}">{{ $add->additional_name }}</a>
							</li>
							@endforeach
						</ul>
						@endif
					</li>
					@endforeach
				</ul>
			</div>
		</div>

		@if ($agent->isDesktop())

		<!-- Дополнительное меню -->

		<div class="menu flex-center-between pt-0 pb-0 pl-10 pr-5 col-8">
			<div class="menu__item"><a href="{{ urldecode(route('about')) }}" class="hover">О нас</a></div>
			<div class="menu__item"><a href="{{ urldecode(route('catalog')) }}" class="hover">Каталог</a></div>
			<div class="menu__item"><a href="{{ urldecode(route('delivery')) }}" class="hover">Доставка</a></div>
			<div class="menu__item"><a href="{{ urldecode(route('contacts')) }}" class="hover">Контакты</a></div>
		</div>

		@endif

	</div>
</nav>


@if ($agent->isMobile())

<!-- Наивгационный бар для мобильных устойств с 
корзиной, поиском по продукции, главным экраном, инфо-->

<div class="footer-bar fix bottom-left sd-12 flex-center-between back-body pr-5 pl-5">
	
		<a href="{{ urldecode(route('search.mobile')) }}" class="p-em-1 @if(Request::is('find')) active @endif" >
			<svg x="0px" y="0px" width="20" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;">
				<path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23
	s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92
	c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17
	s-17-7.626-17-17S14.61,6,23.984,6z" /></svg>
		</a>
	
		<a href="{{ urldecode(route('catalog')) }}"  class="p-em-1 @if(Request::is('каталог') || Request::is('каталог/*') || Request::is('корзина')) active @endif">
			<svg viewBox="0 0 489 489" width="20" style="enable-background:new 0 0 489 489;" xml:space="preserve">
				<path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
		c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
		C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
		H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
		c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z" /></svg>
		</a>
	
		<a href="{{ urldecode(route('main')) }}" class="p-em-1 @if (Request::is('/') || Request::is('/запчасти_для_телевизоров')) active @endif">
			<svg viewBox="0 0 495.398 495.398" width="20" style="enable-background:new 0 0 495.398 495.398;" xml:space="preserve">
				<path d="M487.083,225.514l-75.08-75.08V63.704c0-15.682-12.708-28.391-28.413-28.391c-15.669,0-28.377,12.709-28.377,28.391
				v29.941L299.31,37.74c-27.639-27.624-75.694-27.575-103.27,0.05L8.312,225.514c-11.082,11.104-11.082,29.071,0,40.158
				c11.087,11.101,29.089,11.101,40.172,0l187.71-187.729c6.115-6.083,16.893-6.083,22.976-0.018l187.742,187.747
				c5.567,5.551,12.825,8.312,20.081,8.312c7.271,0,14.541-2.764,20.091-8.312C498.17,254.586,498.17,236.619,487.083,225.514z" />
				<path d="M257.561,131.836c-5.454-5.451-14.285-5.451-19.723,0L72.712,296.913c-2.607,2.606-4.085,6.164-4.085,9.877v120.401
				c0,28.253,22.908,51.16,51.16,51.16h81.754v-126.61h92.299v126.61h81.755c28.251,0,51.159-22.907,51.159-51.159V306.79
				c0-3.713-1.465-7.271-4.085-9.877L257.561,131.836z" />
			</svg>
		</a>
	
		<a href="#" class="p-em-1">
			<svg viewBox="0 0 474 508" width="20" enable-background="new 0 0 474 508" xml:space="preserve">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M1,501c0-9,0-18,0-27c0.453-1.9,0.992-3.786,1.346-5.705
	c1.78-9.65,2.784-19.511,5.376-28.936c21.819-79.323,71.232-133.904,147.89-163.767c6.097-2.376,12.373-4.292,17.61-6.094
	c-10.186-9.684-21.192-18.678-30.424-29.227c-19.996-22.849-32.091-49.742-35.741-79.939c-3.917-32.392,3.694-62.556,20.258-90.437
	c17.853-30.05,42.33-52.438,76.019-63.615C209.765,4.147,216.438,2.742,223,1c10,0,20,0,30,0c5.127,1.311,10.286,2.507,15.375,3.951
	c24.22,6.874,44.429,20.211,61.117,38.837c23.628,26.371,38.62,57.049,39.969,92.614c2.053,54.11-20.687,96.862-63.699,129.19
	c-1.359,1.021-2.717,2.045-4.69,3.531c4.285,1.386,7.6,2.364,10.85,3.521c85.565,30.438,138.89,89.631,158.935,178.412
	c1.71,7.574,2.778,15.292,4.145,22.943c0,9,0,18,0,27c-2.667,2.667-5.333,5.333-8,8c-152.667,0-305.333,0-458,0
	C6.333,506.333,3.667,503.667,1,501z M237.493,482.229c67.321,0,134.642,0,201.963-0.001c1.333,0,2.673-0.089,3.998,0.012
	c2.888,0.221,3.894-1.064,3.523-3.87c-0.828-6.271-1.196-12.623-2.368-18.826c-8.692-46.026-29.712-85.581-64.974-116.445
	c-62.044-54.307-133.698-70.287-211.231-42.623c-81.41,29.048-127.978,88.991-139.088,175.401c-0.812,6.313-0.618,6.35,5.714,6.351
	C102.518,482.229,170.005,482.228,237.493,482.229z M239.254,261.07c3.105-0.287,7.469-0.382,11.704-1.166
	c4.727-0.876,9.451-2.057,13.981-3.659c45.356-16.048,77.948-61.775,77.685-110.638c-0.247-45.569-20.569-80.63-59.26-104.469
	c-21.802-13.434-45.487-17.636-70.396-9.231c-46.588,15.72-79.707,61.756-79.667,111.262c0.03,38.086,15.118,69.464,44.19,93.92
	C194.91,251.741,214.85,260.614,239.254,261.07z" />
				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M1,501c2.667,2.667,5.333,5.333,8,8c-2.667,0-5.333,0-8,0
	C1,506.333,1,503.667,1,501z" />
				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M467,509c2.667-2.667,5.333-5.333,8-8c0,2.667,0,5.333,0,8
	C472.333,509,469.667,509,467,509z" />
			</svg>
		</a>
	
		<a href="{{ urldecode(route('contacts')) }}" class="p-em-1 @if (Request::is('контакты')) active @endif">
			<svg viewBox="0 0 437.6 437.6" width="20" style="enable-background:new 0 0 437.6 437.6;" xml:space="preserve">
				<path d="M194,142.8c0.8,1.6,1.6,3.2,2.4,4.4c0.8,1.2,2,2.4,2.8,3.6c1.2,1.2,2.4,2.4,4,3.6c1.2,0.8,2.8,2,4.8,2.4
				c1.6,0.8,3.2,1.2,5.2,1.6c2,0.4,3.6,0.4,5.2,0.4c1.6,0,3.6,0,5.2-0.4c1.6-0.4,3.2-0.8,4.4-1.6h0.4c1.6-0.8,3.2-1.6,4.8-2.8
				c1.2-0.8,2.4-2,3.6-3.2l0.4-0.4c1.2-1.2,2-2.4,2.8-3.6s1.6-2.4,2-4c0-0.4,0-0.4,0.4-0.8c0.8-1.6,1.2-3.6,1.6-5.2
				c0.4-1.6,0.4-3.6,0.4-5.2s0-3.6-0.4-5.2c-0.4-1.6-0.8-3.2-1.6-5.2c-1.2-2.8-2.8-5.2-4.8-7.2c-0.4-0.4-0.4-0.4-0.8-0.8
				c-1.2-1.2-2.4-2-4-3.2c-1.6-0.8-2.8-1.6-4.4-2.4c-1.6-0.8-3.2-1.2-4.8-1.6c-2-0.4-3.6-0.4-5.2-0.4c-1.6,0-3.6,0-5.2,0.4
				c-1.6,0.4-3.2,0.8-4.8,1.6H208c-1.6,0.8-3.2,1.6-4.4,2.4c-1.6,1.2-2.8,2-4,3.2c-1.2,1.2-2.4,2.4-3.2,3.6
				c-0.8,1.2-1.6,2.8-2.4,4.4c-0.8,1.6-1.2,3.2-1.6,4.8c-0.4,2-0.4,3.6-0.4,5.2c0,1.6,0,3.6,0.4,5.2
				C192.8,139.6,193.6,141.2,194,142.8z" />
				<path d="M249.6,289.2h-9.2v-98c0-5.6-4.4-10.4-10.4-10.4h-42c-5.6,0-10.4,4.4-10.4,10.4v21.6c0,5.6,4.4,10.4,10.4,10.4h8.4v66.4
				H188c-5.6,0-10.4,4.4-10.4,10.4v21.6c0,5.6,4.4,10.4,10.4,10.4h61.6c5.6,0,10.4-4.4,10.4-10.4V300
				C260,294,255.2,289.2,249.6,289.2z" />
				<path d="M218.8,0C98,0,0,98,0,218.8s98,218.8,218.8,218.8s218.8-98,218.8-218.8S339.6,0,218.8,0z M218.8,408.8
				c-104.8,0-190-85.2-190-190s85.2-190,190-190s190,85.2,190,190S323.6,408.8,218.8,408.8z" />
			</svg>
		</a>
</div>

@endif