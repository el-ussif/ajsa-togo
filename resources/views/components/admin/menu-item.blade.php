@props([
    'name',
    'icon',
    'url' => null,
    'dropdown' => null,
    'active' => false
])

<li>
    <a href="{{ $url ?? '#' }}"
       @if(!$url) @click.prevent="selected = (selected === '{{ $name }}' ? '' : '{{ $name }}')" @endif
       class="menu-item group"
       :class="(selected === '{{ $name }}') || (page === '{{ strtolower($name) }}') ? 'menu-item-active' : 'menu-item-inactive'">

        <!-- Icône -->
        <x-dynamic-component :component="'icons.' . $icon"
                             :class="(selected === '{{ $name }}') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'" />

        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
            {{ $name }}
        </span>

        @if($dropdown)
            <!-- Flèche dropdown -->
            <svg class="menu-item-arrow" :class="[(selected === '{{ $name }}') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]">
                <!-- SVG arrow -->
            </svg>
        @endif
    </a>

    @if($dropdown)
        <div class="overflow-hidden transform translate" :class="(selected === '{{ $name }}') ? 'block' : 'hidden'">
            <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'" class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                @foreach($dropdown as $item)
                    <li>
                        <a href="{{ $item['url'] }}" class="menu-dropdown-item group">
                            {{ $item['name'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</li>
