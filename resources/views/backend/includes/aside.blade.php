<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" key="t-menu">Menu</li>

        <li>
            <a href="{{ route('dashboard') }}" class="waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-chat">Dashboards</span>
            </a>
        </li>

        <li class="menu-title" key="t-apps">Apps</li>
        
        {{-- <li>
            @if(Auth::user()->hasRole('admin') || Gate::any(['sale_ticket.create', 'sale_ticket.index']))
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-list-ul"></i>
                <span>Sale Ticket</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                @if(Auth::user()->hasRole('admin') || Gate::check('sale_ticket.create'))
                <li><a href="{{ route('sale_ticket.create') }}">Add Sale Ticket</a></li>
                @endif
                @if(Auth::user()->hasRole('admin') || Gate::check('sale_ticket.index'))
                <li><a href="{{ route('sale_ticket.index') }}">Sale Ticket List</a></li>
                @endif
            </ul>
            @endif
        </li> --}}
    </ul>
</div>
