/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

// require('./bootstrap');


import OverlayScrollbars from 'overlayscrollbars';
import device from 'current-device';


/**
   * Scroll customization
   * @param  {[type]} ) {             	OverlayScrollbars(document.querySelectorAll('body'), {   		className: "os-theme-light"  	});  } [description]
   * @return {[type]}   [description]
   */
document.addEventListener("DOMContentLoaded", function () {

    if (device.desktop() === true) {
        OverlayScrollbars(document.querySelectorAll('body'), {
            className: "os-theme-dark"
        });
    }

    dropMenuOpen('dropdown_placeholder');

    toggleMenu('menu_dropdown_placeholder');

    new TabWidget(document.getElementsByClassName('js-tabs')[0]);

    imagePreview('image_list_li', '.image_list_cont');

    searchArticle();

    sortingItemShow('.toggle--content');

    changeSetting('brands-check');

    addCart();

    navigationScroll();

});





function toggleMenu(el) {
    document.addEventListener('click', function (event) {

        event = event || window.event;
        var target = event.target || event.srcElement;

        while (target != this) {
            if (target.classList.contains(el)) break;
            target = target.parentNode;
        }

        if (target == this) return;

        target.nextElementSibling.classList.toggle('active');

    }, true)

}

/**
 * 
 * @param {*} dropMenu 
 */
function dropMenuOpen(el) {

    toggleMenu(el);

    if (!el) {
        return;
    }

    var newEl = document.querySelectorAll('.' + el);

    for (let i = 0; i < newEl.length; i++) {
        const element = newEl[i];
        listChange(element);
    }
}

function listChange(node) {

    var cont = node;
    var elem = cont.nextElementSibling;
    var elems = elem.children;

    for (let i = 0; i < elems.length; i++) {
        const element = elems[i];
        element.childNodes[0].addEventListener('click', function (e) {
            if (!this.classList.contains('sort-link'))
                e.preventDefault();

            cont.innerText = this.innerText;
            elem.classList.toggle('active');
        })
    }
}


function TabWidget(el, selectedIndex) {

    if (!el) {
        return;
    }

    this.el = el;
    this.tabTriggers = this.el.getElementsByClassName('js-tab-trigger');
    this.tabPanels = this.el.getElementsByClassName('js-tab-panel');

    if (this.tabTriggers.length === 0 || this.tabTriggers.length !== this.tabPanels.length) {
        return;
    }

    this._init(selectedIndex);
}

TabWidget.prototype._init = function (selectedIndex) {

    this.tabTriggersLength = this.tabTriggers.length;
    this.selectedTab = 0;
    this.prevSelectedTab = null;
    this.clickListener = this._clickEvent.bind(this);
    this.keydownListener = this._keydownEvent.bind(this);
    this.keys = {
        prev: 37,
        next: 39
    };

    for (var i = 0; i < this.tabTriggersLength; i++) {
        this.tabTriggers[i].index = i;
        this.tabTriggers[i].addEventListener('click', this.clickListener, false);
        this.tabTriggers[i].addEventListener('keydown', this.keydownListener, false);

        if (this.tabTriggers[i].classList.contains('is-selected')) {
            this.selectedTab = i;
        }
    }

    if (!isNaN(selectedIndex)) {
        this.selectedTab = selectedIndex < this.tabTriggersLength ? selectedIndex : this.tabTriggersLength - 1;
    }

    this.selectTab(this.selectedTab);
    this.el.classList.add('is-initialized');
};

TabWidget.prototype._clickEvent = function (e) {

    e.preventDefault();

    if (e.target.index === this.selectedTab) {
        return;
    }

    this.selectTab(e.target.index, true);
};

TabWidget.prototype._keydownEvent = function (e) {

    var targetIndex;

    if (e.keyCode === this.keys.prev || e.keyCode === this.keys.next) {
        e.preventDefault();
    }
    else {
        return;
    }

    if (e.keyCode === this.keys.prev && e.target.index > 0) {
        targetIndex = e.target.index - 1;
    }
    else if (e.keyCode === this.keys.next && e.target.index < this.tabTriggersLength - 1) {
        targetIndex = e.target.index + 1;
    }
    else {
        return;
    }

    this.selectTab(targetIndex, true);
};

TabWidget.prototype._show = function (index, userInvoked) {

    this.tabTriggers[index].classList.add('is-selected');
    this.tabTriggers[index].setAttribute('aria-selected', true);
    this.tabTriggers[index].setAttribute('tabindex', 0);

    this.tabPanels[index].classList.remove('is-hidden');
    this.tabPanels[index].setAttribute('aria-hidden', false);
    this.tabPanels[index].setAttribute('tabindex', 0);

};

TabWidget.prototype._hide = function (index) {

    this.tabTriggers[index].classList.remove('is-selected');
    this.tabTriggers[index].setAttribute('aria-selected', false);
    this.tabTriggers[index].setAttribute('tabindex', -1);

    this.tabPanels[index].classList.add('is-hidden');
    this.tabPanels[index].setAttribute('aria-hidden', true);
    this.tabPanels[index].setAttribute('tabindex', -1);
};

TabWidget.prototype.selectTab = function (index, userInvoked) {

    if (this.prevSelectedTab === null) {
        for (var i = 0; i < this.tabTriggersLength; i++) {
            if (i !== index) {
                this._hide(i);
            }
        }
    }
    else {
        this._hide(this.selectedTab);
    }

    this.prevSelectedTab = this.selectedTab;
    this.selectedTab = index;

    this._show(this.selectedTab, userInvoked);
};

TabWidget.prototype.destroy = function () {

    for (var i = 0; i < this.tabTriggersLength; i++) {
        this.tabTriggers[i].classList.remove('is-selected');
        this.tabTriggers[i].removeAttribute('aria-selected');
        this.tabTriggers[i].removeAttribute('tabindex');

        this.tabPanels[i].classList.remove('is-hidden');
        this.tabPanels[i].removeAttribute('aria-hidden');
        this.tabPanels[i].removeAttribute('tabindex');

        this.tabTriggers[i].removeEventListener('click', this.clickListener, false);
        this.tabTriggers[i].removeEventListener('keydown', this.keydownListener, false);

        delete this.tabTriggers[i].index;
    }

    this.el.classList.remove('is-initialized');
};


function imagePreview(el, cont) {
    document.addEventListener('click', function (event) {

        event = event || window.event;
        var target = event.target || event.srcElement;

        while (target != this) {
            if (target.classList.contains(el)) break;
            target = target.parentNode;
        }

        if (target == this) return;

        var value = target.getAttribute('data-image');

        if (!cont) {
            return;
        }

        var container = document.querySelector(cont);

        container.setAttribute('src', value);

    }, true)
}

/**
 * Ajax функция поиска в header. Смотри SearchController
 * Если удастся из хардкода убрать свитч то будет очень здоров
 * @return {[type]} [description]
 */
function searchArticle() {

    const search = document.getElementById('search');
    if (!search) {
        return;
    }
    const tableBody = document.getElementById('tbody');
    var category = search.parentNode,
        wrapp = category.nextElementSibling,
        container = wrapp.querySelector('span');


    function getContent() {

        const searchValue = search.value;
        const categoryName = container.innerText;
        var categoryValue;

        switch (categoryName) {
            case 'Все категории':
                categoryValue = 'all';
                break;
            case 'Материнские платы':
                categoryValue = 'main-board';
                break;
            case 'Блоки питания':
                categoryValue = 'power-board';
                break;
            case 'T-CON':
                categoryValue = 't-con';
                break;
            case 'Инверторы / LED драйверы':
                categoryValue = 'inverters_and_drivers';
                break;
            case 'Подсветка':
                categoryValue = 'backlight';
                break;
            case 'Блоки для плазмы':
                categoryValue = 'plasmy';
                break;
            case 'Другое':
                categoryValue = 'other';
                break;

            default:
                categoryValue = null;

        }

        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/search/?search=' + searchValue + '&category=' + categoryValue, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function () {

            if (xhr.readyState == 4 && xhr.status == 200) {
                tableBody.innerHTML = xhr.responseText;
            }
        }
        xhr.send()
    }
    try {
        search.addEventListener('input', getContent);
    } catch (err) { }

}

/**
 * Кнопка свернуть-развернуть список брендов в сортировке товаров
 * @param {*} el 
 */
function sortingItemShow(el) {
    var elem = document.querySelectorAll(el);
    if (!elem) {
        return;
    }


    for (let i = 0; i < elem.length; i++) {
        const element = elem[i];
        element.innerText = 'Еще';
        var container = element.previousElementSibling.querySelector('.toggle__sorting');

        element.addEventListener('click', function (e) {
            e.preventDefault();

            this.innerText = 'Свернуть';
            container.classList.toggle('show');

        })
    }
}



/**
 * Отправка массива всех отмеченных через чекбоксы брендов
 * Смотри ProductConstroller функции GetALLProduct и GetFullCategory
 * @param {*} el 
 */
function changeSetting(el) {


    var form = document.querySelector('#' + el);
    if (!form) {
        return;
    }
    var input = form.querySelector('.' + el);
    var arr = input.value.split('_')
    //console.log(arr)


    var elems = document.querySelectorAll('input[data-form=' + el + ']');
    elems = Array.prototype.slice.call(elems);


    elems.forEach(function (elem) {

        elem.addEventListener('change', function () {

            if (this.checked == true) {
                arr.push(this.value)
            } else {
                var index = arr.indexOf(this.value);
                if (index > -1) {
                    arr.splice(index, 1);
                }
            }
            for (var i = 0; i < arr.length; i++) {
                if (arr[i] === "") {
                    arr.splice(i, 1);
                    i--;
                }
            }

            // console.log(arr)

            var str = arr.join('_');
            input.value = str;
            //console.log(input.value);
            form.submit();
        })

    })

}


function addCart() {
    document.addEventListener('click', function (event) {
        event = event || window.event;
        var target = event.target || event.srcElement;

        while (target != document) {

            if (target instanceof HTMLAnchorElement) {
                if (target.classList.contains('cart-link')) {
                    event.preventDefault();

                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', target.getAttribute('href'), true);
                    xhr.setRequestHeader(
                        'X-CSRF-TOKEN',
                        document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    );
                    xhr.onreadystatechange = function () {

                        if (xhr.readyState == 4 && xhr.status == 200) {
                            // console.log(xhr.responseText);
                            var obj = JSON.parse(xhr.responseText);
                            countProducts.innerHTML = obj.count;
                            totalPrice.innerHTML = obj.total;
                            countProducts.classList.add('active');
                            setTimeout(
                                function () {
                                    countProducts.classList.remove('active');
                                }, 1300
                            );

                        }
                    }
                    xhr.send()

                    break;
                }
            }

            target = target.parentNode;
        }
    }, true);
}

function navigationScroll() {

    var elem = document.querySelector('nav');
    if (!elem) {
        return;
    }
    var elemHeight = elem.clientHeight;
    var elemChild = elem.querySelector('.nav-bar');
    

    if (device.desktop() === true) {
        var windowShame = document.querySelector('.os-viewport');
    } else {
        var windowShame = window;
    }

    windowShame.addEventListener('scroll', function () {

        var scrolled = windowShame.pageYOffset || windowShame.scrollTop;

        if ( scrolled > elemHeight ) {
            elemChild.classList.add('fixed')
        } else {
            elemChild.classList.remove('fixed')
        }
    })
}




