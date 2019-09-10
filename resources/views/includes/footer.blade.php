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
			<a href="tel:8921418-39-59" class="phone cm mt-em-1">+7 (921) 418-39-59</a>
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
			<p>196650, Россия, Санкт-Петербург, Колпино, Павловская 23/16</p>
		</div>
		<div class="mt-em-3">
			<h6 class="ct @if($agent->isDesktop()) mt-0 @endif">Телефоны</h6>
			<p class="mt-3 mb-3 cc">+7 (921) 418-39-59</p>
			<p class="mt-3 mb-3 cc">+7 (911) 241-55-31</p>
		</div>
	</div>
	<div class="col-2 sd-12">
		<div>
			<h6 class="ct @if($agent->isDesktop()) mt-0 @endif">Почта для связи</h6>
			<a href="mailto:info@telezapchasti.ru" class="block mt-3 mb-3 hover">info@telezapchasti.ru</a>
			<a href="mailto:telezapchasti@yandex.ru" class="block mt-3 mb-3 hover">telezapchasti@yandex.ru</a>
			<a href="mailto:fedia62@mail.ru" class="block mt-3 mb-3 hover">fedia62@mail.ru</a>
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