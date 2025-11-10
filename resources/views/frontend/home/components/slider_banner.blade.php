<section>
    <!-- carousel -->
    <div class="carousel">
        <!-- list item -->
        <div class="list">
            @foreach ($banners as $banner)
                <div class="item">
                    <img src="{{ asset($banner->image) }}">
                    <div class="content">
                        <div class="author">{{ $banner->title }}</div>
                        <div class="title">{{ $banner->title }}</div>
                        <div class="topic">TILES</div>
                        <div class="des">
                            <!-- lorem 50 -->
                            {{ $banner->description }}
                        </div>
                        <div class="buttons">
                            <button><a class="button-a" href="https://wa.me/{{ config('settings.site_whatsapp') }}?text={{ urlencode("Hello can I get a quota for some of your company's tiles?") }}">ASK QUOTA</a></button>
                            <button><a class="button-a" href="{{ url($banner->button_link) }}">CHECK STORE</a></button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <!-- list thumnail -->
        <div class="thumbnail">
            @foreach ($banners as $banner)
                <div class="item">
                    <img src="{{ asset($banner->image) }}">
                    <div class="content">
                        <div class="title">
                            {{ $banner->name }}
                        </div>
                        <div class="description">
                            {{ $banner->category }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- next prev -->

        <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <!-- time running -->
        <div class="time"></div>
    </div>
</section>
