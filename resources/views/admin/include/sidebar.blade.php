<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            @foreach ($verticalMenuData[0]->menu as $menu)
                @php
                    if(is_array($menu->permission)){
                        $permissions = implode("', '", $menu->permission);
                        $permissionCondition = eval("return auth()->user()->hasAnyPermission('".$permissions."');");
                    
                    
                    } else {
                        $permissionCondition = eval("return auth()->user()->can('".$menu->permission."');");
                    }
                @endphp
                @php
                    $user = Auth::user();
                @endphp
                @if($permissionCondition)
                    @if(!($user->hasRole('student')))
                        @if($menu->permission== 'my_profile.view' || $menu->permission== 'applied_program.view' || $menu->permission == 'oel_apply.view' || $menu->permission== 'apply_program.view' || $menu->permission == 'my_profile.update')
                            @continue
                        @endif
                    @endif
                    @if($menu->permission== 'impersonate.view')
                        @continue
                    @endif
                    <ul class="sidebar-vertical ">
                        @if (empty($menu->submenu))
                        <li>
                            <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}">
                                <i class="{{ $menu->icon }}"></i>
                                <span > {{ isset($menu->name) ? __($menu->name) : '' }}</span>
                                @if(!isset($menu->url))
                                    <span class="menu-arrow"></span>
                                @endif
                            </a>
                        </li>
                        @else
                        <li class="submenu ">
                            <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}">
                                <i class="{{ $menu->icon }}"></i>

                                @if(!($user->hasRole('Administrator')))
                                    @if ($menu->name == 'Admin-Management')
                                        <span>{{ ('User-Management') ? __('User-Management') : '' }}</span>
                                    @else
                                       <span > {{ isset($menu->name) ? __($menu->name) : '' }}</span>
                                    @endif
                                @else
                                    <span > {{ isset($menu->name) ? __($menu->name) : '' }}</span>
                                @endif
                                @if(!isset($menu->url))
                                    <span class="menu-arrow"></span>
                                @endif
                            </a>
                            @isset($menu->submenu)
                                @include('admin.include.submenu',['menu' => $menu->submenu])
                            @endisset
                        </li>
                        @endif

                    </ul>
                @endif
            @endforeach
            {{-- Show "Revert to Admin" link if admin user is impersonating --}}
            @if(Session::has('admin_user'))
                <ul class="sidebar-vertical">
                    <li >
                        <a href="{{ route('revert_to_admin') }}">
                            <i class="fa fa-user-secret"></i>
                            <span>Revert to Admin</span>
                        </a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>
<!-- /sidebar-vertical -->
