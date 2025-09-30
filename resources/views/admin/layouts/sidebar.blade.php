<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('default-images/aikez-logo.JPG') }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Aikez Emp</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->

			<ul class="metismenu" id="menu">
				<li>
					<a href="{{ route('admin.dashboard') }}" class="">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
                <li>
                    <a href="{{ route('admin.general-settings.index') }}">
                    <div class="parent-icon"><i class='bx bx-cog'></i></div>
                    <div class="menu-title">Settings</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.banner.index') }}">
                    <div class="parent-icon"><i class='bx bx-tag-alt'  ></i></i></div>
                    <div class="menu-title">Banner</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.about.index') }}">
                    <div class="parent-icon"><i class='bx bx-info-circle'  ></i></div>
                    <div class="menu-title">About</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.service.index') }}">
                    <div class="parent-icon"><i class='bx bx-server'  ></i></div>
                    <div class="menu-title">Service</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.ability.index') }}">
                    <div class="parent-icon"><i class='bx bx-chart'></i></div>
                    <div class="menu-title">Ability</div>
                    </a>
                </li>
			</ul>

			<!--end navigation-->
		</div>


