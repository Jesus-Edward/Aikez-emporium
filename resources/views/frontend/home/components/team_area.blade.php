<div class="team-area-two pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>Our Special Team Member and Their Details at a Glance</h2>
        </div>
        <div class="row pt-45">
            @foreach ($teams as $team)
                <div class="col-lg-4 col-md-6">
                    <div class="team-card">
                        <a href="javascript:;">
                            <img src="{{ asset($team->image) }}" alt="Images">
                        </a>
                        <div class="content">
                            <h3><a href="javascript:;">{{ $team->name }}</a></h3>
                            <span>{{ $team->member_role }}</span>
                        </div>
                        <ul class="social-link">
                            <li>
                                <a href="{{ $team->facebook }}" target="_blank"><i class='bx bxl-facebook'></i></a>
                            </li>
                            <li>
                                <a href="{{ $team->twitter }}" target="_blank"><i class='bx bxl-twitter'></i></a>
                            </li>
                            <li>
                                <a href="{{ $team->instagram }}" target="_blank"><i class='bx bxl-instagram'></i></a>
                            </li>
                            <li>
                                <a href="{{ $team->gmail }}" target="_blank"><i class='bx bxl-google'></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
