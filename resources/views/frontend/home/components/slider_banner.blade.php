<section>
        <!-- carousel -->
        <div class="carousel">
            <!-- list item -->
            <div class="list">
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
                            <button><a class="button-a" href="">BUY NOW</a></button>
                            <button>CHECK STORE</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset($banner->image1) }}">
                    <div class="content">
                        <div class="author">{{ $banner->title }}</div>
                        <div class="title">{{ $banner->title }}</div>
                        <div class="topic">TILES</div>
                        <div class="des">
                            {{ $banner->description }}
                        </div>
                        <div class="buttons">
                            <button>SEE MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset($banner->image2) }}">
                    <div class="content">
                        <div class="author">{{ $banner->title }}</div>
                        <div class="title">{{ $banner->title }}</div>
                        <div class="topic">TILES</div>
                        <div class="des">
                            {{ $banner->description }}
                        </div>
                        <div class="buttons">
                            <button>SEE MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset($banner->image3) }}">
                    <div class="content">
                        <div class="author">{{ $banner->title }}</div>
                        <div class="title">{{ $banner->title }}</div>
                        <div class="topic">TILES</div>
                        <div class="des">
                            {{ $banner->description }}
                        </div>
                        <div class="buttons">
                            <button>SEE MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- list thumnail -->
            <div class="thumbnail">
                <div class="item">
                    <img src="{{ asset($banner->image) }}">
                    {{-- <div class="content">
                        <div class="title">
                            Name Slider
                        </div>
                        <div class="description">
                            Description
                        </div>
                    </div> --}}
                </div>
                <div class="item">
                    <img src="{{ asset($banner->image1) }}">
                    {{-- <div class="content">
                        <div class="title">
                            Name Slider
                        </div>
                        <div class="description">
                            Description
                        </div>
                    </div> --}}
                </div>
                <div class="item">
                    <img src="{{ asset($banner->image2) }}">
                    {{-- <div class="content">
                        <div class="title">
                            Name Slider
                        </div>
                        <div class="description">
                            Description
                        </div>
                    </div> --}}
                </div>
                <div class="item">
                    <img src="{{ asset($banner->image3) }}">
                    {{-- <div class="content">
                        <div class="title">
                            Name Slider
                        </div>
                        <div class="description">
                            Description
                        </div>
                    </div> --}}
                </div>
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
