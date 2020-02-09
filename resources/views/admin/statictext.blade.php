<div class="flex-between pb-em-5">
    <div class="col-12 sd-12">
        <h5 class="ct mt-0">Статический текст</h5>
        <p class="cc col-6 sd-12">Редактирование статического текств разделах контакты, доставка и о нас. Форма О нас редактирует текст как на главной странице, так и на странице О нас. Форма оставка дедактирует тест на странице доставка. Форма контакты - на странице контакты.</p>
        <div class="flex-between mt-em-2 bb-light pb-em-1">
            <div>
            </div>
            <div>
                <a href="{{ route('admin.statictext') }}" class="rel mr-em-2 @if(Request::is('admin/statictext')) cm @else ct @endif hover-main line-right">О нас</a>
                <a href="{{ route('admin.statictext.delivery') }}" class="rel mr-em-2 @if(Request::is('admin/statictext/delivery')) cm @else ct @endif line-right hover-main">Доставка</a>
                <a href="{{ route('admin.statictext.contacts') }}" class="@if(Request::is('admin/statictext/contacts')) cm @else ct @endif hover-main">Контакты</a>
            </div>
        </div>
    </div>

    @if (Request::route()->named('admin.statictext'))

        <div>
            <h5>О нас</h5>
            <p>About</p>
        </div>  

    @elseif (Request::route()->named('admin.statictext.delivery'))

        <div>
            <h5>Доставка</h5>
            <p>Delivery</p>
        </div>
        
    @elseif (Request::route()->named('admin.statictext.contacts'))

        <div>
            <h5>Контакты</h5>
            <p>Contacts</p>
        </div>
    @endif
</div>