{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<div id="side_menu">
        <template v-for="item of menu_items" :key="item.name">
            <div v-if="!item.children && hasPermission(item.permission)">
                <router-link :to="item.to" class="side-menu-item text-surface-300 hover:bg-surface-200 dark:hover:bg-surface-700">
                    <i v-if="item.icon" class="icon" :class="item.icon"></i>
                    <span>{{ $t(item.name) }}</span>
                </router-link>
            </div>
            <div v-if="item.children && item.children.length && hasAnyPermission(item.permissions)" :id="`side_menu_item_${item.meta[0]}`">
                <template v-if="item.children">
                    <router-link v-slot="{ isActive }" :to="item.children[0].to" custom>
                        <div>
                            <a
                                tabindex="0"
                                class="side-menu-item text-surface-300 hover:bg-surface-200 dark:text-surface-100 dark:hover:bg-surface-700"
                                @click="toggleSubmenu($event, item.meta[0])"
                            >
                                <i v-if="item.icon" class="icon" :class="item.icon"></i>
                                <span>{{ $t(item.name) }}</span>
                                <i class="fa fa-chevron-down toggle-icon"></i>
                            </a>
                            <transition name="sidemenu-toggleable-content">
                                <div v-show="isSubmenuActive(item.meta[0], isActive)" class="sidemenu-toggleable-content">
                                    <ul>
                                        <li v-for="(submenuitem, i) of item.children" :key="i">
                                            <router-link
                                                v-if="hasPermission(submenuitem.permission)"
                                                :to="submenuitem.to"
                                                class="side-menu-item text-surface-300 hover:bg-surface-200 dark:hover:bg-surface-700"
                                            >
                                                <i v-if="submenuitem.icon" class="icon" :class="submenuitem.icon"></i>
                                                <span>{{ $t(submenuitem.name) }}</span>
                                            </router-link>
                                        </li>
                                    </ul>
                                </div>
                            </transition>
                        </div>
                    </router-link>