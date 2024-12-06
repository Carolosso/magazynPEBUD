{{-- This file is used for menu items by any Backpack v6 theme --}}
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
 --}}
<x-backpack::menu-separator title="Materiały" />
<x-backpack::menu-item title="do budowy domów" icon="la la-home" :link="backpack_url('materialy-do-budowy-domow')" />
<x-backpack::menu-item title="drogowe" icon="la la-road" :link="backpack_url('materialy-drogowe')" />
<x-backpack::menu-item title="kanalizacyjne" icon="la la-recycle" :link="backpack_url('materialy-kanalizacyjne')" />
<x-backpack::menu-item title="wodociągowe" icon="la la-tint" :link="backpack_url('materialy-wodociagowe')" />
<x-backpack::menu-separator title="Inne" />
<x-backpack::menu-item title="Narzedzia" icon="la la-tools" :link="backpack_url('narzedzia')" />
<x-backpack::menu-item title="Sprzęt" icon="la la-truck" :link="backpack_url('sprzet')" />