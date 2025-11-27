{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

<div id="side_menu">
        {{-- TODO: Convert slot to Blade section --}}
            <div>
                <router-link class="side-menu-item text-surface-300 hover:bg-surface-200 dark:hover:bg-surface-700">
                    <i class="icon"></i>
                    <span>{{ $t(item.name) }}</span>
                </router-link>
            </div>
            <div>
                {{-- TODO: Convert slot to Blade section --}}
                    <router-link  custom>
                        <div>
                            <a
                            >
                                <i class="icon"></i>
                                <span>{{ $t(item.name) }}</span>
                                <i class="fa fa-chevron-down toggle-icon"></i>
                            </a>
                            <transition name="sidemenu-toggleable-content">
                                <div class="sidemenu-toggleable-content">
                                    <ul>
                                        <li>
                                            <router-link
                                            >
                                                <i class="icon"></i>
                                                <span>{{ $t(submenuitem.name) }}</span>
                                            </router-link>
                                        </li>
                                    </ul>
                                </div>
                            </transition>
                        </div>
                    </router-link>