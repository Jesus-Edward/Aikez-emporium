<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>

            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">

                    <li class="nav-item dark-mode d-none d-sm-flex">
                        <a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
                        </a>
                    </li>
                    @php
                        $user = Auth::user();
                        $notifications = App\Models\OrderPlacedNotification::where('seen', 1)->latest()->take(5)->get();
                    @endphp

                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret notification_beep" href="#"
                            data-bs-toggle="dropdown">
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    <a href="">
                                        <a href="{{ route('admin.clear-notification') }}" class="msg-header-badge">Mark All As Read</a>
                                    </a>
                                </div>
                            </a>
                            <div class="header-notifications-list rt_notification">
                                @foreach ($notifications as $notification)
                                    <a class="dropdown-item" href="{{ route('admin.order.view', $notification->order_id) }}">
                                        <div class="d-flex justify-content-start">
                                            <div style="background: #008cff;width: 30px;height: 30px;border-radius: 50px;color:#fff; display:flex; justify-content:center;align-items:center; margin-right:8px">
                                                <i class="fas fa-bell" style=""></i>
                                            </div>
                                            <div class="">
                                                <p class="msg-info">{{ $notification->message }}</p>
                                                <small>{{ $notification->created_at->format('Y-m-d | H:i A') }}</small>
                                                 <div class="time">
                                                    @if ($notification->seen)
                                                        seen
                                                    @else
                                                        new
                                                    @endif
                                                 </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <a href="javascript:;">
                                <div class="text-center msg-footer">
                                    <a href="{{ route('admin.all-orders') }}" class="btn btn-primary w-100">View All Notifications</a>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset($user->image) }}" class="user-img" alt="user avatar">
                    <div class="user-info">
                        <p class="user-name mb-0">{{ $user->name }}</p>
                        <p class="designattion mb-0">{{ $user->role }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile') }}"><i
                                class="bx bx-user fs-5"></i><span>Profile</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.general-settings.index') }}"><i
                                class="bx bx-cog fs-5"></i><span>Settings</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-circle fs-5"></i><span>Dashboard</span></a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <li><a onclick="event.preventDefault(); this.closest('form').submit();"
                                class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                    class="bx bx-log-out-circle"></i><span>Logout</span></a>
                        </li>
                    </form>
                </ul>
            </div>
        </nav>
    </div>
</header>
