@php
    use Filament\Facades\Filament;

    $currentPath = request()->path();

    $links = [
        [
            'label' => 'Dashboard',
            'url' => url('/admin'),
            'icon' => 'heroicon-o-home',
            'match' => $currentPath === 'admin',
        ],
        [
            'label' => 'Products',
            'url' => url('/admin/products'),
            'icon' => 'heroicon-o-cube',
            'match' => str_starts_with($currentPath, 'admin/products'),
        ],
        [
            'label' => 'Categories',
            'url' => url('/admin/categories'),
            'icon' => 'heroicon-o-tag',
            'match' => str_starts_with($currentPath, 'admin/categories'),
        ],
        [
            'label' => 'Orders',
            'url' => url('/admin/orders'),
            'icon' => 'heroicon-o-shopping-bag',
            'match' => str_starts_with($currentPath, 'admin/orders'),
        ],
        [
            'label' => 'Customers',
            'url' => url('/admin/customers'),
            'icon' => 'heroicon-o-users',
            'match' => str_starts_with($currentPath, 'admin/customers'),
        ],
        [
            'label' => 'Inventory',
            'url' => url('/admin/inventory'),
            'icon' => 'heroicon-o-archive-box',
            'match' => str_starts_with($currentPath, 'admin/inventory'),
        ],
        [
            'label' => 'Analytics',
            'url' => url('/admin/analytics'),
            'icon' => 'heroicon-o-chart-bar',
            'match' => str_starts_with($currentPath, 'admin/analytics'),
        ],
        [
            'label' => 'Content',
            'url' => url('/admin/content'),
            'icon' => 'heroicon-o-squares-2x2',
            'match' => str_starts_with($currentPath, 'admin/content'),
        ],
        [
            'label' => 'Settings',
            'url' => url('/admin/settings'),
            'icon' => 'heroicon-o-cog-6-tooth',
            'match' => str_starts_with($currentPath, 'admin/settings'),
        ],
    ];
@endphp


<div class="premium-admin-header">

    {{-- =====================================================
         MAIN HEADER
    ====================================================== --}}
    <header class="premium-header-inner">


        {{-- BRAND --}}
        <a
            href="{{ url('/admin') }}"
            class="premium-brand"
        >

            <span class="premium-brand-mark">
                <span></span>
                <span></span>
                <span></span>
            </span>

            <span class="premium-brand-text">

                <strong>MYSTORE</strong>

                <small>ADMIN</small>

            </span>

        </a>


        {{-- DESKTOP NAV --}}
        <nav class="premium-main-nav">

            @foreach($links as $link)

                <a
                    href="{{ $link['url'] }}"
                    class="premium-nav-link {{ $link['match'] ? 'is-active' : '' }}"
                >

                    <x-dynamic-component
                        :component="$link['icon']"
                    />

                    <span>
                        {{ $link['label'] }}
                    </span>

                </a>

            @endforeach

        </nav>


        {{-- HEADER ACTIONS --}}
        <div class="premium-header-actions">


            {{-- SEARCH --}}
            <button
                type="button"
                class="premium-search"
                onclick="document.dispatchEvent(new CustomEvent('open-premium-search'))"
            >

                <x-heroicon-o-magnifying-glass />

                <span>
                    Search
                </span>

                <kbd>
                    /
                </kbd>

            </button>


            {{-- NOTIFICATION --}}
            <button
                type="button"
                class="premium-icon-button"
                title="Notifications"
            >

                <x-heroicon-o-bell />

                <span class="notification-dot"></span>

            </button>


            {{-- PROFILE --}}
            <a
                href="{{ route('profile.edit') }}"
                class="premium-user"
            >

                <span class="premium-avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </span>

                <span class="premium-user-info">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <small>
                        Administrator
                    </small>

                </span>

                <x-heroicon-m-chevron-down class="premium-user-chevron" />

            </a>


            {{-- MOBILE MENU --}}
            <button
                type="button"
                class="premium-mobile-menu"
                onclick="document.body.classList.toggle('premium-nav-open')"
            >

                <x-heroicon-o-bars-3 />

            </button>

        </div>

    </header>


    {{-- =====================================================
         MOBILE NAV
    ====================================================== --}}
    <div class="premium-mobile-nav">

        <div class="premium-mobile-nav-header">

            <span>
                Navigation
            </span>

            <button
                type="button"
                onclick="document.body.classList.remove('premium-nav-open')"
            >
                <x-heroicon-m-x-mark />
            </button>

        </div>


        @foreach($links as $link)

            <a
                href="{{ $link['url'] }}"
                class="premium-mobile-link {{ $link['match'] ? 'is-active' : '' }}"
            >

                <x-dynamic-component
                    :component="$link['icon']"
                />

                <span>
                    {{ $link['label'] }}
                </span>

                @if($link['match'])
                    <span class="mobile-active-dot"></span>
                @endif

            </a>

        @endforeach

    </div>

</div>


<style>

    /* =========================================================
       PREMIUM HEADER
    ========================================================= */

    .premium-admin-header {
        position: sticky;
        top: 0;
        z-index: 999;

        width: 100%;
    }


    .premium-header-inner {

        position: relative;

        display: flex;
        align-items: center;

        width: 100%;
        min-height: 76px;

        padding: 10px 18px;

        border: 1px solid rgba(226,232,240,.85);

        border-radius: 18px;

        background:
            linear-gradient(
                135deg,
                rgba(255,255,255,.96),
                rgba(248,250,255,.94)
            );

        box-shadow:
            0 12px 35px rgba(15,23,42,.075);

        backdrop-filter: blur(22px);
        -webkit-backdrop-filter: blur(22px);
    }


    /* =========================================================
       BRAND
    ========================================================= */

    .premium-brand {

        display: flex;
        align-items: center;

        gap: 11px;

        flex: 0 0 auto;

        color: #111827 !important;

        text-decoration: none !important;
    }


    .premium-brand-mark {

        display: flex;
        align-items: flex-end;
        justify-content: center;

        gap: 3px;

        width: 39px;
        height: 39px;

        padding: 9px;

        border-radius: 12px;

        background:
            linear-gradient(
                145deg,
                #111827,
                #26344d
            );

        box-shadow:
            0 8px 18px rgba(15,23,42,.18);
    }


    .premium-brand-mark span {

        display: block;

        width: 4px;

        border-radius: 999px;

        background: #ffffff;
    }


    .premium-brand-mark span:nth-child(1) {
        height: 10px;
        opacity: .65;
    }


    .premium-brand-mark span:nth-child(2) {
        height: 16px;
        opacity: .85;
    }


    .premium-brand-mark span:nth-child(3) {
        height: 22px;
    }


    .premium-brand-text strong {

        display: block;

        font-size: 13px;
        line-height: 1;

        font-weight: 900;

        letter-spacing: -.02em;
    }


    .premium-brand-text small {

        display: block;

        margin-top: 4px;

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .18em;

        color: #94a3b8;
    }


    /* =========================================================
       NAV
    ========================================================= */

    .premium-main-nav {

        display: flex;
        align-items: center;

        gap: 3px;

        margin-left: 28px;

        min-width: 0;

        overflow-x: auto;

        scrollbar-width: none;
    }


    .premium-main-nav::-webkit-scrollbar {
        display: none;
    }


    .premium-nav-link {

        position: relative;

        display: flex;
        align-items: center;

        gap: 7px;

        flex: 0 0 auto;

        padding: 9px 10px;

        border-radius: 10px;

        color: #64748b !important;

        text-decoration: none !important;

        font-size: 10px;

        font-weight: 700;

        transition:
            color .2s ease,
            background .2s ease,
            transform .2s ease;
    }


    .premium-nav-link svg {

        width: 15px;
        height: 15px;
    }


    .premium-nav-link:hover {

        color: #2563eb !important;

        background: #f1f5fb;

        transform: translateY(-1px);
    }


    .premium-nav-link.is-active {

        color: #2563eb !important;

        background:
            linear-gradient(
                135deg,
                #edf4ff,
                #f5f8ff
            );
    }


    .premium-nav-link.is-active::after {

        content: "";

        position: absolute;

        left: 50%;
        bottom: -4px;

        width: 18px;
        height: 3px;

        transform: translateX(-50%);

        border-radius: 999px;

        background: #3569e8;
    }


    /* =========================================================
       ACTIONS
    ========================================================= */

    .premium-header-actions {

        display: flex;
        align-items: center;

        gap: 8px;

        margin-left: auto;

        flex: 0 0 auto;
    }


    .premium-search {

        display: flex;
        align-items: center;

        gap: 7px;

        height: 38px;

        min-width: 145px;

        padding: 0 10px;

        border: 1px solid #e2e8f0;

        border-radius: 11px;

        color: #94a3b8;

        background: rgba(255,255,255,.75);

        font-size: 10px;

        cursor: pointer;

        transition: .2s ease;
    }


    .premium-search svg {

        width: 16px;
        height: 16px;
    }


    .premium-search:hover {

        border-color: #cbd5e1;

        background: #ffffff;

        box-shadow:
            0 5px 15px rgba(15,23,42,.05);
    }


    .premium-search kbd {

        margin-left: auto;

        padding: 2px 5px;

        border: 1px solid #e2e8f0;

        border-radius: 5px;

        font-size: 8px;

        color: #94a3b8;

        background: #f8fafc;
    }


    .premium-icon-button {

        position: relative;

        display: grid;
        place-items: center;

        width: 38px;
        height: 38px;

        border: 1px solid #e2e8f0;

        border-radius: 11px;

        color: #64748b;

        background: rgba(255,255,255,.75);

        cursor: pointer;

        transition: .2s ease;
    }


    .premium-icon-button:hover {

        color: #2563eb;

        border-color: #cbd5e1;

        background: #ffffff;

        transform: translateY(-1px);
    }


    .premium-icon-button svg {

        width: 17px;
        height: 17px;
    }


    .notification-dot {

        position: absolute;

        top: 8px;
        right: 8px;

        width: 5px;
        height: 5px;

        border: 1px solid #ffffff;

        border-radius: 50%;

        background: #ef4444;
    }


    /* =========================================================
       USER
    ========================================================= */

    .premium-user {

        display: flex;
        align-items: center;

        gap: 8px;

        padding: 4px 7px 4px 4px;

        border: 1px solid #e2e8f0;

        border-radius: 12px;

        color: #172033 !important;

        background: rgba(255,255,255,.75);

        text-decoration: none !important;

        transition: .2s ease;
    }


    .premium-user:hover {

        border-color: #cbd5e1;

        background: #ffffff;

        box-shadow:
            0 6px 18px rgba(15,23,42,.05);
    }


    .premium-avatar {

        display: grid;
        place-items: center;

        width: 30px;
        height: 30px;

        border-radius: 9px;

        color: #ffffff;

        background:
            linear-gradient(
                135deg,
                #3569e8,
                #5b7ff0
            );

        font-size: 11px;

        font-weight: 850;

        box-shadow:
            0 5px 12px rgba(53,105,232,.20);
    }


    .premium-user-info strong {

        display: block;

        font-size: 10px;

        font-weight: 800;
    }


    .premium-user-info small {

        display: block;

        margin-top: 2px;

        font-size: 8px;

        color: #94a3b8;
    }


    .premium-user-chevron {

        width: 12px;
        height: 12px;

        color: #94a3b8;
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    .premium-mobile-menu {

        display: none;

        place-items: center;

        width: 38px;
        height: 38px;

        border: 1px solid #e2e8f0;

        border-radius: 11px;

        color: #475569;

        background: #ffffff;

        cursor: pointer;
    }


    .premium-mobile-menu svg {

        width: 19px;
        height: 19px;
    }


    .premium-mobile-nav {

        display: none;
    }


    /* =========================================================
       DARK MODE
    ========================================================= */

    html.dark .premium-header-inner {

        border-color: #263244;

        background:
            linear-gradient(
                135deg,
                rgba(15,23,42,.94),
                rgba(17,24,39,.94)
            );

        box-shadow:
            0 15px 40px rgba(0,0,0,.28);
    }


    html.dark .premium-brand {

        color: #f8fafc !important;
    }


    html.dark .premium-brand-mark {

        background:
            linear-gradient(
                145deg,
                #2563eb,
                #1e40af
            );
    }


    html.dark .premium-nav-link {

        color: #94a3b8 !important;
    }


    html.dark .premium-nav-link:hover {

        color: #60a5fa !important;

        background: #182234;
    }


    html.dark .premium-nav-link.is-active {

        color: #60a5fa !important;

        background:
            linear-gradient(
                135deg,
                rgba(37,99,235,.15),
                rgba(37,99,235,.07)
            );
    }


    html.dark .premium-search,
    html.dark .premium-icon-button,
    html.dark .premium-user,
    html.dark .premium-mobile-menu {

        border-color: #293548;

        color: #94a3b8;

        background: rgba(15,23,42,.75);
    }


    html.dark .premium-search:hover,
    html.dark .premium-icon-button:hover,
    html.dark .premium-user:hover {

        background: #182234;

        border-color: #3b4b64;
    }


    html.dark .premium-search kbd {

        border-color: #334155;

        background: #182234;

        color: #64748b;
    }


    html.dark .premium-user {

        color: #e2e8f0 !important;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1250px) {

        .premium-main-nav {
            margin-left: 15px;
        }

        .premium-nav-link span {
            display: none;
        }

        .premium-nav-link {
            padding: 9px;
        }

        .premium-search {
            min-width: 38px;
            width: 38px;
            justify-content: center;
        }

        .premium-search span,
        .premium-search kbd {
            display: none;
        }

    }


    @media (max-width: 900px) {

        .premium-main-nav {
            display: none;
        }

        .premium-mobile-menu {
            display: grid;
        }

        .premium-user-info,
        .premium-user-chevron {
            display: none;
        }

    }


    @media (max-width: 600px) {

        .premium-header-inner {
            min-height: 66px;
            padding: 8px 10px;
            border-radius: 14px;
        }

        .premium-brand-text small {
            display: none;
        }

        .premium-brand-text strong {
            font-size: 11px;
        }

        .premium-brand-mark {
            width: 34px;
            height: 34px;
        }

        .premium-icon-button {
            display: none;
        }

        .premium-mobile-nav {

            position: fixed;

            top: 10px;
            left: 10px;
            right: 10px;

            padding: 12px;

            border: 1px solid #e2e8f0;

            border-radius: 20px;

            background: rgba(255,255,255,.97);

            box-shadow:
                0 25px 70px rgba(15,23,42,.18);

            backdrop-filter: blur(20px);

            transform:
                translateY(-20px);

            opacity: 0;

            pointer-events: none;

            transition: .25s ease;
        }


        body.premium-nav-open .premium-mobile-nav {

            display: block;

            transform: translateY(0);

            opacity: 1;

            pointer-events: auto;
        }


        .premium-mobile-nav-header {

            display: flex;

            align-items: center;
            justify-content: space-between;

            padding: 8px 9px 13px;

            border-bottom: 1px solid #edf0f5;

            font-size: 11px;

            font-weight: 800;

            color: #172033;
        }


        .premium-mobile-nav-header button {

            display: grid;
            place-items: center;

            width: 30px;
            height: 30px;

            border: 0;

            border-radius: 9px;

            background: #f1f5f9;

            color: #64748b;

            cursor: pointer;
        }


        .premium-mobile-nav-header svg {

            width: 16px;
            height: 16px;
        }


        .premium-mobile-link {

            position: relative;

            display: flex;
            align-items: center;

            gap: 11px;

            margin-top: 4px;

            padding: 11px;

            border-radius: 11px;

            color: #64748b !important;

            text-decoration: none !important;

            font-size: 11px;

            font-weight: 700;
        }


        .premium-mobile-link svg {

            width: 17px;
            height: 17px;
        }


        .premium-mobile-link.is-active {

            color: #2563eb !important;

            background: #edf4ff;
        }


        .mobile-active-dot {

            width: 5px;
            height: 5px;

            margin-left: auto;

            border-radius: 50%;

            background: #3569e8;
        }

    }
    /* Hide Filament's original topbar content */
.fi-topbar > .fi-topbar-start,
.fi-topbar > .fi-topbar-end {
    display: none !important;
}

.fi-topbar {
    min-height: 0 !important;
    height: auto !important;
    padding: 10px 18px !important;
    background: transparent !important;
    border: 0 !important;
}

/* =========================================================
   FILAMENT GLOBAL TYPOGRAPHY FIX
   ========================================================= */

.fi,
.fi body,
.fi input,
.fi button,
.fi select,
.fi textarea {
    font-size: 14px;
}

.fi-sidebar,
.fi-sidebar *,
.fi-topbar,
.fi-topbar *,
.fi-main,
.fi-main * {
    font-size: inherit;
}

/* Sidebar navigation */
.fi-sidebar-item-label {
    font-size: 14px !important;
    font-weight: 600 !important;
}

/* Navigation group headings */
.fi-sidebar-group-label {
    font-size: 11px !important;
    font-weight: 700 !important;
    letter-spacing: .12em;
}

/* Page headings */
.fi-header-heading {
    font-size: 28px !important;
    font-weight: 800 !important;
}

/* Cards */
.fi-section-header-heading {
    font-size: 16px !important;
}

.fi-section-header-description {
    font-size: 13px !important;
}

/* Tables */
.fi-ta-header-cell {
    font-size: 11px !important;
}

.fi-ta-cell {
    font-size: 14px !important;
}

/* Buttons */
.fi-btn {
    font-size: 13px !important;
}

/* Inputs */
.fi-input,
.fi-select-input,
.fi-input-wrp input {
    font-size: 14px !important;
}

</style>


<script>

    document.addEventListener('keydown', function(event) {

        if (
            event.key === '/' &&
            !['INPUT', 'TEXTAREA'].includes(
                document.activeElement?.tagName
            )
        ) {

            event.preventDefault();

            document.dispatchEvent(
                new CustomEvent('open-premium-search')
            );

        }

    });


    document.addEventListener(
        'click',
        function(event) {

            if (
                !event.target.closest('.premium-mobile-nav') &&
                !event.target.closest('.premium-mobile-menu')
            ) {

                document.body.classList.remove(
                    'premium-nav-open'
                );

            }

        }
    );

</script>
