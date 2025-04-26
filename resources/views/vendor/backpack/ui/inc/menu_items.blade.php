{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />
<x-backpack::menu-item title="Sender ids" icon="la la-question" :link="backpack_url('sender-id')" />
<x-backpack::menu-item title="Banned words" icon="la la-question" :link="backpack_url('banned-word')" />
<x-backpack::menu-item title="Message logs" icon="la la-question" :link="backpack_url('message-log')" />
<x-backpack::menu-item title="Api keys" icon="la la-question" :link="backpack_url('api-key')" />
<x-backpack::menu-item title="Blacklist words" icon="la la-question" :link="backpack_url('blacklist-word')" />