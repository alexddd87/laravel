<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse " style="overflow: hidden; outline: none;" tabindex="5000">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a href="/">
                    <i class="fa fa-dashboard"></i>
                    <span>Главная</span>
                </a>
            </li>

            <li class="sub-menu dcjq-parent-li">
                <a href="javascript:;" class="dcjq-parent">
                    <i class="fa fa-laptop"></i>
                    <span>Веб-сайт</span>
                    <span class="dcjq-icon"></span></a>
                <ul class="sub" style="display: none;">
                    <li>{!! link_to_route('admin-contents', 'Страницы') !!}</li>
                    <li><a href="/admin/comments">Комментарии и отзывы</a></li>
                    <li><a href="/admin/news">Новости</a></li>
                    <li><a href="/admin/photos">Фотогалерея</a></li>
                </ul>
            </li>
            <li class="sub-menu dcjq-parent-li">
                <a href="javascript:;" class="dcjq-parent">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Магазин</span>
                    <span class="dcjq-icon"></span></a>
                <ul class="sub" style="display: none;">
                    <li><a href="/admin/catalog">Каталог</a></li>
                    <li><a href="/admin/product">Товары</a></li>
                    <li><a href="/admin/filters">Характеристики товаров</a></li>
                    <li><a href="/admin/orders">Заказы</a></li>
                </ul>
            </li>
            <li class="sub-menu dcjq-parent-li">
                <a href="javascript:;" class="dcjq-parent">
                    <i class="fa fa-cogs"></i>
                    <span>Настройки</span>
                    <span class="dcjq-icon"></span></a>
                <ul class="sub" style="display: none;">
                    <li><a href="grids.html">Общие</a></li>
                    <li><a href="calendar.html">Уведомления</a></li>
                    <li><a href="gallery.html">Переводы</a></li>
                </ul>
            </li>
            <li class="sub-menu dcjq-parent-li">
                <a href="javascript:;" class="dcjq-parent">
                    <i class="fa fa-user"></i>
                    <span>Пользователи</span>
                    <span class="dcjq-icon"></span></a>
                <ul class="sub" style="display: none;">
                    <li><a href="form_component.html">Администраторы</a></li>
                    <li><a href="advanced_form_components.html">Покупатели</a></li>
                    <li><a href="form_wizard.html">Группы пользователей</a></li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->