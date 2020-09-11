<div id="sidebar-disable" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden hidden"></div>

<div id="sidebar" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0 -translate-x-full ease-in">
    <div class="flex items-center justify-center mt-4">
        <div class="flex items-center">
            <span class="text-white text-2xl mx-2 font-semibold">{{ trans('panel.site_title') }}</span>
        </div>
    </div>
    <nav class="mt-4">
        <a
            class="flex items-center mt-4 py-3 px-6 block border-l-4
            @if (request()->is('admin'))
                bg-gray-600 bg-opacity-25 text-gray-100 border-gray-100
            @else
                border-gray-900 text-gray-500 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100
            @endif"
            href="{{ route("admin.home") }}"
        >
            <i class="fas fa-fw fa-tachometer-alt">

            </i>

            <span class="mx-4">Dashboard</span>
        </a>

        @can('user_management_access')
            <div class="nav-dropdown">
                <a
                    class="flex items-center py-3 px-6 block border-l-4 border-gray-900 text-gray-500 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100"
                    href="#"
                >
                    <i class="fa-fw fas fa-users">

                    </i>

                    <span class="mx-4">{{ trans('cruds.userManagement.title') }}</span>
                    <i class="fa fa-caret-down ml-auto" aria-hidden="true"></i>
                </a>
                <div class="dropdown-items mb-1 hidden">
                        @can('permission_access')
                        <a
                            class="flex items-center py-3 pl-8 pr-6 block border-l-4
                            @if (request()->is('admin/permissions*'))
                                bg-gray-600 bg-opacity-25 text-gray-100 border-gray-100 nav-active
                            @else
                                border-gray-900 text-gray-500 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100
                            @endif"
                            href="{{ route('admin.permissions.index') }}"
                        >
                            <i class="fa-fw fas fa-unlock-alt">

                            </i>

                            <span class="mx-4">{{ trans('cruds.permission.title') }}</span>
                        </a>
                    @endcan
                    @can('role_access')
                        <a
                            class="flex items-center py-3 pl-8 pr-6 block border-l-4
                            @if (request()->is('admin/roles*'))
                                bg-gray-600 bg-opacity-25 text-gray-100 border-gray-100 nav-active
                            @else
                                border-gray-900 text-gray-500 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100
                            @endif"
                            href="{{ route('admin.roles.index') }}"
                        >
                            <i class="fa-fw fas fa-briefcase">

                            </i>

                            <span class="mx-4">{{ trans('cruds.role.title') }}</span>
                        </a>
                    @endcan
                    @can('user_access')
                        <a
                            class="flex items-center py-3 pl-8 pr-6 block border-l-4
                            @if (request()->is('admin/users*'))
                                bg-gray-600 bg-opacity-25 text-gray-100 border-gray-100 nav-active
                            @else
                                border-gray-900 text-gray-500 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100
                            @endif"
                            href="{{ route('admin.users.index') }}"
                        >
                            <i class="fa-fw fas fa-user">

                            </i>

                            <span class="mx-4">{{ trans('cruds.user.title') }}</span>
                        </a>
                    @endcan
                </div>
            </div>
        @endcan
        @can('project_access')
            <a
                class="flex items-center py-3 px-6 block border-l-4
                @if (request()->is('admin/projects*'))
                    bg-gray-600 bg-opacity-25 text-gray-100 border-gray-100
                @else
                    border-gray-900 text-gray-500 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100
                @endif"
                href="{{ route('admin.projects.index') }}"
            >
                <i class="fa-fw fas fa-project-diagram">

                </i>

                <span class="mx-4">{{ trans('cruds.project.title') }}</span>
            </a>
        @endcan
        @can('folder_access')
            <a
                class="flex items-center py-3 px-6 block border-l-4
                @if (request()->is('admin/folders*'))
                    bg-gray-600 bg-opacity-25 text-gray-100 border-gray-100
                @else
                    border-gray-900 text-gray-500 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100
                @endif"
                href="{{ route('admin.folders.index') }}"
            >
                <i class="fa-fw fas fa-folder">

                </i>

                <span class="mx-4">{{ trans('cruds.folder.title') }}</span>
            </a>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            <a
                class="flex items-center py-3 px-6 block border-l-4
                @if (request()->is('profile/password'))
                    bg-gray-600 bg-opacity-25 text-gray-100 border-gray-100
                @else
                    border-gray-900 text-gray-500 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100
                @endif"
                href="{{ route('profile.password.edit') }}"
            >
                <i class="fa-fw fas fa-key">

                </i>

                <span class="mx-4">{{ trans('global.change_password') }}</span>
            </a>
        @endif
        <a
            class="flex items-center py-3 px-6 block border-l-4 border-gray-900 text-gray-500 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100"
            href="#"
            onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
        >
            <i class="fa-fw fas fa-sign-out-alt">

            </i>

            <span class="mx-4">{{ trans('global.logout') }}</span>
        </a>
    </nav>
</div>
