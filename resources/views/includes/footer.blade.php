@if(session('success'))
	@component('components.message')
		@slot('title')
			{!! session('success') !!}
		@endslot

		{!! session('message') !!}

	@endcomponent
@endif
<footer class="col-12 sd-12 flex-between pt-em-3 pb-em-3 pr-5 pl-5">
	<div class="col-4 sd-12 pr-5">
		<div>
			<div>
				<div class="logo flex-center-start">
					<img
						class="col-2"
						src="{{ asset('img/icon/logo.svg') }}"
						alt="Запчасти для телевизоров, Телезапчасти"
					/>
					<h3 class="col-8">
						<span>tele</span>
						Zapchasti
					</h3>
				</div>
			</div>
			<h5 class="ct mt-em-2 mb-em-2">Есть вопросы? Звоните нам 24/7</h5>
			<a href="tel:{{ $contacts->get('phoneMain')->value }}" class="phone cm mt-em-1 bold hover">{{ $contacts->get('phoneMain')->value }}</a>
		</div>
	</div>
	<div class="col-3 sd-12 pr-5">
		<h6 class="ct @if($agent->isDesktop()) mt-0 @endif">Меню</h6>
		@foreach($navigations->splice(0, 3)->all() as $item)
			<a href="{{ route('category.show', ['part_types_id' => $item->slug ]) }}" class="block mt-3 mb-3 hover">
				{{ $item->name }}
			</a>
		@endforeach
		<a href="{{ route('about') }}" class="block mt-3 mb-3 hover">
			О нас
		</a>
		<a href="{{ route('delivery') }}" class="block mt-3 mb-3 hover">
			Доставка
		</a>
		<a href="{{ route('private') }}" class="block mt-3 mb-3 hover">
			Политика конфидициальности
		</a>
		<a href="{{ route('regulations') }}" class="block mt-3 mb-3 hover">
			Правила сайта
		</a>
	</div>
	<div class="col-3 sd-12 pr-5">
		<div>
			<h6 class="ct @if($agent->isDesktop()) mt-0 @endif">Контакты</h6>
			@foreach($contacts->get('address') as $item)
			<p>{{ $item->value }}</p>
			@endforeach
		</div>
		<div class="mt-em-3">
			<h6 class="ct @if($agent->isDesktop()) mt-0 @endif">Телефоны</h6>
			@foreach($contacts->get('phone') as $item)
			<p class="mt-3 mb-3 cc">{{ $item->value }}</p>
			@endforeach
		</div>
	</div>
	<div class="col-2 sd-12">
		<div>
			<h6 class="ct @if($agent->isDesktop()) mt-0 @endif">Почта для связи</h6>
			@foreach($contacts->get('mail') as $item)
			<a href="mailto:{{ $item->value }}" class="block mt-3 mb-3 hover">{{ $item->value }}</a>
			@endforeach
		</div>
	</div>
</footer>
<div
	class="col-12 sd-12 back-back pt-em-1 @if($agent->isDesktop()) pb-em-1 @else pb-em-5 @endif pr-5 pl-5 flex-center-between"
>
	<p class="col-6 sd-12">Copyright © Forever Telezapchasti. All Rights Reserved</p>
	<div class="col-6 sd-12">
		<ul class="flex-center-end">
			<li class="mr-em-1">
				<img src="{{ asset('img/icon/logos_1.png') }}" alt="Запчасти для телевизоров, покупка masterCard" />
			</li>
			<li class="mr-em-1">
				<img src="{{ asset('img/icon/logos_2.png') }}" alt="Запчасти для телевизоров, покупка Visa" />
			</li>
			<li class="mr-em-1">
				<img src="{{ asset('img/icon/logos_3.png') }}" alt="Запчасти для телевизоров, покупка PayPal" />
			</li>
			<li class="mr-em-1">
				<img src="{{ asset('img/icon/logos_4.png') }}" alt="Запчасти для телевизоров, покупка masterCard" />
			</li>
		</ul>
	</div>
</div>