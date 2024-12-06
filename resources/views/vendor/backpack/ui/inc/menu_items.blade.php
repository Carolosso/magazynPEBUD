{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Materialy do budowy domows" icon="la la-question" :link="backpack_url('materialy-do-budowy-domow')" />
<x-backpack::menu-item title="Materialy drogowes" icon="la la-question" :link="backpack_url('materialy-drogowe')" />
<x-backpack::menu-item title="Materialy kanalizacyjnes" icon="la la-question" :link="backpack_url('materialy-kanalizacyjne')" />
<x-backpack::menu-item title="Materialy wodociagowes" icon="la la-question" :link="backpack_url('materialy-wodociagowe')" />
<x-backpack::menu-item title="Narzedzias" icon="la la-question" :link="backpack_url('narzedzia')" />
<x-backpack::menu-item title="Sprzets" icon="la la-question" :link="backpack_url('sprzet')" />