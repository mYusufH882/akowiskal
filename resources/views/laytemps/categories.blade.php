<div class="sidebar-widget">
    <h3 class="sidebar-title">Categories</h3>
    <div class="widget-container">
        <ul>
            @foreach ($kategori as $item)
                <li><a href="">{{ $item->kategori_nama }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
