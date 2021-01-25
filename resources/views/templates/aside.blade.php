<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ asset('asset/images/icon/logo.png') }}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                @foreach ($menu as $item)
                    @if ($item->jenis == 'parent')
                            <li>
                                <a class="js-arrow" href="{{ $item->url }}"><i class="{{ $item->ikon }}"></i>{{ $item->nama_menu }}</a>
                            </li>
                    @else
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="{{ $item->ikon }}"></i>{{ $item->nama_menu }}
                            </a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                @foreach ($child as $chm)
                                    <li>
                                        <a href="{{ $chm->url }}">{{ $chm->nama_menu }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
