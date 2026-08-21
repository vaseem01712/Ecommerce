<x-filament-panels::page>

    <div class="ms-dashboard">

        {{-- =====================================================
             PREMIUM HEADER
        ====================================================== --}}
        <section class="ms-hero">

            <div class="ms-hero-content">

                <div class="ms-eyebrow">
                    <span class="ms-live-dot"></span>
                    MYSTORE / ADMIN
                </div>

                <h1>
                    Good to see you,
                    <span>Vaseem.</span>
                </h1>

                <p>
                    Here's what's happening across your store today.
                </p>

            </div>


            <div class="ms-header-actions">

                <a
                    href="{{ url('/admin/products/create') }}"
                    class="ms-btn ms-btn-primary"
                >
                    <span class="ms-btn-icon">+</span>
                    Add Product
                </a>

                <a
                    href="{{ url('/admin/categories/create') }}"
                    class="ms-btn ms-btn-secondary"
                >
                    Add Category
                    <span>→</span>
                </a>

            </div>

        </section>


        {{-- =====================================================
             STATS
        ====================================================== --}}
        <section class="ms-stats-grid">

            {{-- REVENUE --}}
            <article class="ms-stat-card revenue">

                <div class="ms-stat-top">

                    <div>
                        <span class="ms-stat-label">
                            Revenue
                        </span>

                        <span class="ms-stat-caption">
                            Store performance
                        </span>
                    </div>

                    <div class="ms-stat-icon">
                        $
                    </div>

                </div>

                <div class="ms-stat-value">
                    ${{ number_format($revenue, 2) }}
                </div>

                <div class="ms-stat-bottom">
                    <span class="ms-trend positive">
                        ↗
                    </span>

                    <span>
                        Active + completed orders
                    </span>
                </div>

                <div class="ms-stat-glow"></div>

            </article>


            {{-- ORDERS --}}
            <article class="ms-stat-card orders">

                <div class="ms-stat-top">

                    <div>
                        <span class="ms-stat-label">
                            Orders
                        </span>

                        <span class="ms-stat-caption">
                            Customer activity
                        </span>
                    </div>

                    <div class="ms-stat-icon">
                        #
                    </div>

                </div>

                <div class="ms-stat-value">
                    {{ number_format($ordersCount) }}
                </div>

                <div class="ms-stat-bottom">
                    <span class="ms-trend blue">
                        ↗
                    </span>

                    <span>
                        All customer orders
                    </span>
                </div>

                <div class="ms-stat-glow"></div>

            </article>


            {{-- PRODUCTS --}}
            <article class="ms-stat-card products">

                <div class="ms-stat-top">

                    <div>
                        <span class="ms-stat-label">
                            Products
                        </span>

                        <span class="ms-stat-caption">
                            Catalogue size
                        </span>
                    </div>

                    <div class="ms-stat-icon">
                        ◈
                    </div>

                </div>

                <div class="ms-stat-value">
                    {{ number_format($productsCount) }}
                </div>

                <div class="ms-stat-bottom">
                    <span class="ms-trend purple">
                        ●
                    </span>

                    <span>
                        {{ $outOfStock }} out of stock
                    </span>
                </div>

                <div class="ms-stat-glow"></div>

            </article>


            {{-- CUSTOMERS --}}
            <article class="ms-stat-card customers">

                <div class="ms-stat-top">

                    <div>
                        <span class="ms-stat-label">
                            Customers
                        </span>

                        <span class="ms-stat-caption">
                            Registered shoppers
                        </span>
                    </div>

                    <div class="ms-stat-icon">
                        ◎
                    </div>

                </div>

                <div class="ms-stat-value">
                    {{ number_format($customersCount) }}
                </div>

                <div class="ms-stat-bottom">
                    <span class="ms-trend pink">
                        ↗
                    </span>

                    <span>
                        Active shoppers
                    </span>
                </div>

                <div class="ms-stat-glow"></div>

            </article>

        </section>


        {{-- =====================================================
             MAIN CONTENT
        ====================================================== --}}
        <section class="ms-main-grid">


            {{-- =================================================
                 RECENT ORDERS
            ================================================== --}}
            <article class="ms-panel orders-panel">

                <div class="ms-panel-header">

                    <div>

                        <div class="ms-section-label">
                            STORE ACTIVITY
                        </div>

                        <h2>
                            Recent Orders
                        </h2>

                        <p>
                            Latest customer activity across your store.
                        </p>

                    </div>

                    <a
                        href="{{ url('/admin/orders') }}"
                        class="ms-view-link"
                    >
                        View all
                        <span>→</span>
                    </a>

                </div>


                <div class="ms-table-wrapper">

                    <table class="ms-orders-table">

                        <thead>

                            <tr>
                                <th>ORDER</th>
                                <th>CUSTOMER</th>
                                <th>TOTAL</th>
                                <th>STATUS</th>
                                <th>DATE</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($orders as $order)

                                <tr>

                                    {{-- ORDER --}}
                                    <td>

                                        <div class="ms-order-id">
                                            #{{ $order->id }}
                                        </div>

                                    </td>


                                    {{-- CUSTOMER --}}
                                    <td>

                                        <div class="ms-customer">

                                            <div class="ms-avatar">
                                                {{ strtoupper(substr($order->user->name ?? 'G', 0, 1)) }}
                                            </div>

                                            <div>

                                                <strong>
                                                    {{ $order->user->name ?? 'Guest Customer' }}
                                                </strong>

                                                <small>
                                                    {{ $order->user->email ?? '—' }}
                                                </small>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- TOTAL --}}
                                    <td>

                                        <strong class="ms-order-total">
                                            ${{ number_format($order->total ?? 0, 2) }}
                                        </strong>

                                    </td>


                                    {{-- STATUS --}}
                                    <td>

                                        @php
                                            $status = strtolower($order->status ?? 'pending');
                                        @endphp

                                        <span class="ms-status ms-status-{{ $status }}">

                                            <span class="ms-status-dot"></span>

                                            {{ ucfirst($status) }}

                                        </span>

                                    </td>


                                    {{-- DATE --}}
                                    <td>

                                        <span class="ms-date">
                                            {{ $order->created_at?->format('M d, Y') }}
                                        </span>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5">

                                        <div class="ms-empty">

                                            <div class="ms-empty-icon">
                                                ◎
                                            </div>

                                            <strong>
                                                No orders yet
                                            </strong>

                                            <span>
                                                Customer orders will appear here.
                                            </span>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                <div class="ms-panel-footer">

                    <span>
                        Showing latest {{ $orders->count() }} orders
                    </span>

                    <a href="{{ url('/admin/orders') }}">
                        Manage orders →
                    </a>

                </div>

            </article>



            {{-- =================================================
                 INVENTORY
            ================================================== --}}
            <article class="ms-panel inventory-panel">

                <div class="ms-panel-header">

                    <div>

                        <div class="ms-section-label">
                            INVENTORY
                        </div>

                        <h2>
                            Stock Health
                        </h2>

                        <p>
                            Current inventory overview.
                        </p>

                    </div>

                    <a
                        href="{{ url('/admin/products') }}"
                        class="ms-icon-link"
                    >
                        ↗
                    </a>

                </div>


                <div class="ms-inventory-body">


                    {{-- HEALTHY --}}
                    <div class="ms-inventory-item">

                        <div class="ms-inventory-left">

                            <div class="ms-inventory-icon healthy">
                                ✓
                            </div>

                            <div>

                                <strong>
                                    Healthy stock
                                </strong>

                                <span>
                                    Sufficient inventory
                                </span>

                            </div>

                        </div>

                        <strong class="ms-inventory-number">
                            {{ $healthyStock }}
                        </strong>

                    </div>


                    {{-- LOW STOCK --}}
                    <div class="ms-inventory-item">

                        <div class="ms-inventory-left">

                            <div class="ms-inventory-icon warning">
                                !
                            </div>

                            <div>

                                <strong>
                                    Low stock
                                </strong>

                                <span>
                                    Needs restocking
                                </span>

                            </div>

                        </div>

                        <strong class="ms-inventory-number">
                            {{ $lowStock }}
                        </strong>

                    </div>


                    {{-- OUT OF STOCK --}}
                    <div class="ms-inventory-item">

                        <div class="ms-inventory-left">

                            <div class="ms-inventory-icon danger">
                                ×
                            </div>

                            <div>

                                <strong>
                                    Out of stock
                                </strong>

                                <span>
                                    Currently unavailable
                                </span>

                            </div>

                        </div>

                        <strong class="ms-inventory-number">
                            {{ $outOfStock }}
                        </strong>

                    </div>


                    {{-- INVENTORY SUMMARY --}}
                    <div class="ms-stock-summary">

                        <div class="ms-stock-summary-top">

                            <span>
                                Stock availability
                            </span>

                            <strong>
                                {{ $productsCount > 0
                                    ? round(($healthyStock / $productsCount) * 100)
                                    : 0 }}%
                            </strong>

                        </div>

                        <div class="ms-progress">

                            <div
                                class="ms-progress-value"
                                style="width: {{ $productsCount > 0
                                    ? min(100, ($healthyStock / $productsCount) * 100)
                                    : 0 }}%"
                            ></div>

                        </div>

                    </div>

                </div>


                <a
                    href="{{ url('/admin/products') }}"
                    class="ms-inventory-button"
                >
                    <span>
                        Open Inventory
                    </span>

                    <span>
                        →
                    </span>
                </a>

            </article>

        </section>


        {{-- =====================================================
             QUICK ACTIONS
        ====================================================== --}}
        <section class="ms-quick-section">

            <div class="ms-quick-heading">

                <div>

                    <div class="ms-section-label">
                        SHORTCUTS
                    </div>

                    <h2>
                        Quick Actions
                    </h2>

                    <p>
                        Manage your store faster.
                    </p>

                </div>

            </div>


            <div class="ms-quick-grid">


                {{-- ADD PRODUCT --}}
                <a
                    href="{{ url('/admin/products/create') }}"
                    class="ms-quick-card"
                >

                    <div class="ms-quick-icon blue">
                        +
                    </div>

                    <div class="ms-quick-content">

                        <strong>
                            Add Product
                        </strong>

                        <span>
                            Create a new product
                        </span>

                    </div>

                    <div class="ms-quick-arrow">
                        →
                    </div>

                </a>


                {{-- ADD CATEGORY --}}
                <a
                    href="{{ url('/admin/categories/create') }}"
                    class="ms-quick-card"
                >

                    <div class="ms-quick-icon purple">
                        ◈
                    </div>

                    <div class="ms-quick-content">

                        <strong>
                            Add Category
                        </strong>

                        <span>
                            Organise your catalogue
                        </span>

                    </div>

                    <div class="ms-quick-arrow">
                        →
                    </div>

                </a>


                {{-- ORDERS --}}
                <a
                    href="{{ url('/admin/orders') }}"
                    class="ms-quick-card"
                >

                    <div class="ms-quick-icon green">
                        #
                    </div>

                    <div class="ms-quick-content">

                        <strong>
                            Manage Orders
                        </strong>

                        <span>
                            Review customer orders
                        </span>

                    </div>

                    <div class="ms-quick-arrow">
                        →
                    </div>

                </a>


                {{-- CUSTOMERS --}}
                <a
                    href="{{ url('/admin/customers') }}"
                    class="ms-quick-card"
                >

                    <div class="ms-quick-icon pink">
                        ◎
                    </div>

                    <div class="ms-quick-content">

                        <strong>
                            Customers
                        </strong>

                        <span>
                            View your shoppers
                        </span>

                    </div>

                    <div class="ms-quick-arrow">
                        →
                    </div>

                </a>

            </div>

        </section>

    </div>


    {{-- =========================================================
         PREMIUM DASHBOARD CSS
    ========================================================== --}}
    <style>
        

        /* =====================================================
           ROOT
        ====================================================== */

        .ms-dashboard {
            --ms-blue: #2563eb;
            --ms-blue-soft: #eff6ff;

            --ms-green: #059669;
            --ms-green-soft: #ecfdf5;

            --ms-purple: #7c3aed;
            --ms-purple-soft: #f5f3ff;

            --ms-pink: #db2777;
            --ms-pink-soft: #fdf2f8;

            --ms-orange: #d97706;
            --ms-orange-soft: #fffbeb;

            --ms-red: #dc2626;
            --ms-red-soft: #fef2f2;

            --ms-text: #0f172a;
            --ms-text-soft: #334155;
            --ms-muted: #64748b;
            --ms-light: #94a3b8;

            --ms-border: #e7ebf1;

            --ms-background: #f7f9fc;

            width: 100%;
            max-width: 1580px;

            margin: 0 auto;

            padding:
                4px
                0
                50px;

            color: var(--ms-text);
        }


        /* =====================================================
           HERO
        ====================================================== */

        .ms-hero {
            position: relative;

            display: flex;
            align-items: flex-end;
            justify-content: space-between;

            gap: 30px;

            min-height: 190px;

            margin-bottom: 22px;

            padding:
                34px
                36px;

            border-radius: 24px;

            overflow: hidden;

            border: 1px solid #e6ebf3;

            background:
                radial-gradient(
                    circle at 88% 20%,
                    rgba(37, 99, 235, .13),
                    transparent 25%
                ),
                radial-gradient(
                    circle at 72% 110%,
                    rgba(124, 58, 237, .08),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #ffffff 0%,
                    #fbfdff 55%,
                    #f5f8ff 100%
                );

            box-shadow:
                0 16px 45px rgba(15, 23, 42, .055);
        }


        .ms-hero::before {
            content: "";

            position: absolute;

            width: 260px;
            height: 260px;

            right: -100px;
            top: -130px;

            border-radius: 50%;

            border: 1px solid rgba(37, 99, 235, .08);
        }


        .ms-hero::after {
            content: "";

            position: absolute;

            width: 170px;
            height: 170px;

            right: 70px;
            bottom: -130px;

            border-radius: 50%;

            background:
                rgba(37, 99, 235, .035);
        }


        .ms-hero-content {
            position: relative;
            z-index: 2;
        }


        .ms-eyebrow {
            display: flex;
            align-items: center;
            gap: 8px;

            margin-bottom: 11px;

            color: #64748b;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: .15em;
        }


        .ms-live-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #10b981;

            box-shadow:
                0 0 0 4px rgba(16, 185, 129, .10);
        }


        .ms-hero h1 {
            margin: 0;

            font-size: clamp(30px, 3vw, 43px);

            line-height: 1.05;

            font-weight: 850;

            letter-spacing: -.055em;

            color: #0f172a;
        }


        .ms-hero h1 span {
            background:
                linear-gradient(
                    110deg,
                    #2563eb,
                    #4f46e5
                );

            -webkit-background-clip: text;
            background-clip: text;

            color: transparent;
        }


        .ms-hero p {
            margin: 11px 0 0;

            color: #64748b;

            font-size: 13px;
        }


        /* =====================================================
           HEADER BUTTONS
        ====================================================== */

        .ms-header-actions {
            position: relative;
            z-index: 3;

            display: flex;
            align-items: center;

            gap: 10px;
        }


        .ms-btn {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 9px;

            min-height: 44px;

            padding: 0 17px;

            border-radius: 12px;

            text-decoration: none;

            font-size: 12px;
            font-weight: 750;

            transition:
                transform .22s ease,
                box-shadow .22s ease,
                background .22s ease;
        }


        .ms-btn:hover {
            transform: translateY(-2px);
        }


        .ms-btn-primary {
            color: #ffffff;

            background:
                linear-gradient(
                    135deg,
                    #0f172a,
                    #1e293b
                );

            box-shadow:
                0 9px 22px rgba(15, 23, 42, .16);
        }


        .ms-btn-primary:hover {
            box-shadow:
                0 14px 30px rgba(15, 23, 42, .22);
        }


        .ms-btn-secondary {
            color: #334155;

            background: rgba(255,255,255,.82);

            border: 1px solid #dfe5ee;
        }


        .ms-btn-secondary:hover {
            background: #ffffff;
        }


        .ms-btn-icon {
            font-size: 17px;
            line-height: 1;
        }


        /* =====================================================
           STATS
        ====================================================== */

        .ms-stats-grid {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 15px;

            margin-bottom: 18px;
        }


        .ms-stat-card {
            position: relative;

            min-height: 178px;

            padding: 22px;

            overflow: hidden;

            border-radius: 19px;

            border: 1px solid var(--ms-border);

            background: #ffffff;

            box-shadow:
                0 9px 32px rgba(15, 23, 42, .045);

            transition:
                transform .25s ease,
                box-shadow .25s ease,
                border-color .25s ease;
        }


        .ms-stat-card:hover {
            transform: translateY(-4px);

            border-color: #dce3ed;

            box-shadow:
                0 20px 45px rgba(15, 23, 42, .085);
        }


        .ms-stat-top {
            position: relative;
            z-index: 2;

            display: flex;

            align-items: flex-start;

            justify-content: space-between;
        }


        .ms-stat-label {
            display: block;

            color: #334155;

            font-size: 15px;
            font-weight: 750;
        }


        .ms-stat-caption {
            display: block;

            margin-top: 3px;

            color: #a0aaba;

            font-size: 10px;
        }


        .ms-stat-icon {
            display: flex;

            align-items: center;
            justify-content: center;

            width: 42px;
            height: 42px;

            border-radius: 13px;

            font-size: 17px;
            font-weight: 850;
        }


        .revenue .ms-stat-icon {
            color: var(--ms-green);
            background: var(--ms-green-soft);
        }


        .orders .ms-stat-icon {
            color: var(--ms-blue);
            background: var(--ms-blue-soft);
        }


        .products .ms-stat-icon {
            color: var(--ms-purple);
            background: var(--ms-purple-soft);
        }


        .customers .ms-stat-icon {
            color: var(--ms-pink);
            background: var(--ms-pink-soft);
        }


        .ms-stat-value {
            position: relative;
            z-index: 2;

            margin-top: 17px;

            color: #0f172a;

            font-size: 31px;

            line-height: 1;

            font-weight: 850;

            letter-spacing: -.055em;
        }


        .ms-stat-bottom {
            position: relative;
            z-index: 2;

            display: flex;

            align-items: center;

            gap: 7px;

            margin-top: 13px;

            color: #64748b;

            font-size: 14px;
            font-weight: 600;
        }


        .ms-trend {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            width: 22px;
            height: 22px;

            border-radius: 7px;

            font-weight: 800;
        }


        .ms-trend.positive {
            color: #059669;
            background: #ecfdf5;
        }


        .ms-trend.blue {
            color: #2563eb;
            background: #eff6ff;
        }


        .ms-trend.purple {
            color: #7c3aed;
            background: #f5f3ff;
        }


        .ms-trend.pink {
            color: #db2777;
            background: #fdf2f8;
        }


        .ms-stat-glow {
            position: absolute;

            width: 130px;
            height: 130px;

            right: -65px;
            bottom: -70px;

            border-radius: 50%;

            opacity: .75;
        }


        .revenue .ms-stat-glow {
            background: rgba(16, 185, 129, .07);
        }


        .orders .ms-stat-glow {
            background: rgba(37, 99, 235, .07);
        }


        .products .ms-stat-glow {
            background: rgba(124, 58, 237, .07);
        }


        .customers .ms-stat-glow {
            background: rgba(219, 39, 119, .07);
        }


        /* =====================================================
           MAIN GRID
        ====================================================== */

        .ms-main-grid {
            display: grid;

            grid-template-columns:
                minmax(0, 1.55fr)
                minmax(330px, .85fr);

            gap: 18px;
        }


        /* =====================================================
           PANELS
        ====================================================== */

        .ms-panel {
            overflow: hidden;

            border-radius: 20px;

            border: 1px solid var(--ms-border);

            background: #ffffff;

            box-shadow:
                0 9px 32px rgba(15, 23, 42, .045);
        }


        .ms-panel-header {
            display: flex;

            align-items: flex-start;

            justify-content: space-between;

            gap: 20px;

            padding: 22px 24px;

            border-bottom: 1px solid #edf1f6;
        }


        .ms-section-label {
            margin-bottom: 6px;

            color: #94a3b8;

            font-size: 9px;
            font-weight: 850;

            letter-spacing: .13em;
        }


        .ms-panel-header h2 {
            margin: 0;

            color: #0f172a;

            font-size: 17px;

            font-weight: 800;

            letter-spacing: -.025em;
        }


        .ms-panel-header p {
            margin: 5px 0 0;

            color: #94a3b8;

            font-size: 11px;
        }


        .ms-view-link {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            margin-top: 4px;

            color: #2563eb;

            text-decoration: none;

            font-size: 11px;
            font-weight: 750;

            white-space: nowrap;
        }


        .ms-view-link:hover {
            color: #1d4ed8;
        }


        .ms-icon-link {
            display: flex;

            align-items: center;
            justify-content: center;

            width: 34px;
            height: 34px;

            border-radius: 10px;

            color: #2563eb;

            background: #eff6ff;

            text-decoration: none;

            transition: .2s ease;
        }


        .ms-icon-link:hover {
            transform: translateY(-2px);

            background: #dbeafe;
        }


        /* =====================================================
           TABLE
        ====================================================== */

        .ms-table-wrapper {
            overflow-x: auto;
        }


        .ms-orders-table {
            width: 100%;

            min-width: 650px;

            border-collapse: collapse;
        }


        .ms-orders-table th {
            padding: 12px 20px;

            text-align: left;

            color: #94a3b8;

            background: #fafbfd;

            border-bottom: 1px solid #edf1f6;

            font-size: 9px;
            font-weight: 850;

            letter-spacing: .10em;
        }


        .ms-orders-table td {
            padding: 14px 20px;

            border-bottom: 1px solid #f1f5f9;

            vertical-align: middle;
        }


        .ms-orders-table tbody tr {
            transition: background .18s ease;
        }


        .ms-orders-table tbody tr:hover {
            background: #fafcff;
        }


        .ms-orders-table tbody tr:last-child td {
            border-bottom: 0;
        }


        .ms-order-id {
            color: #0f172a;

            font-size: 12px;
            font-weight: 800;
        }


        .ms-customer {
            display: flex;

            align-items: center;

            gap: 10px;
        }


        .ms-avatar {
            display: flex;

            align-items: center;
            justify-content: center;

            flex: 0 0 34px;

            width: 34px;
            height: 34px;

            border-radius: 10px;

            color: #2563eb;

            background:
                linear-gradient(
                    135deg,
                    #eff6ff,
                    #eef2ff
                );

            font-size: 11px;
            font-weight: 850;
        }


        .ms-customer strong {
            display: block;

            color: #1e293b;

            font-size: 15px;
            font-weight: 750;
        }


        .ms-customer small {
            display: block;

            max-width: 160px;

            margin-top: 2px;

            overflow: hidden;

            color: #94a3b8;

            font-size: 9px;

            text-overflow: ellipsis;

            white-space: nowrap;
        }


        .ms-order-total {
            color: #0f172a;

            font-size: 11px;
        }


        .ms-date {
            color: #64748b;

            font-size: 10px;
        }


        /* =====================================================
           STATUS
        ====================================================== */

        .ms-status {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding: 6px 9px;

            border-radius: 999px;

            font-size: 9px;
            font-weight: 800;
        }


        .ms-status-dot {
            width: 5px;
            height: 5px;

            border-radius: 50%;

            background: currentColor;
        }


        .ms-status-pending {
            color: #b45309;
            background: #fffbeb;
        }


        .ms-status-paid,
        .ms-status-completed,
        .ms-status-delivered {
            color: #047857;
            background: #ecfdf5;
        }


        .ms-status-processing {
            color: #2563eb;
            background: #eff6ff;
        }


        .ms-status-shipped {
            color: #7c3aed;
            background: #f5f3ff;
        }


        .ms-status-cancelled,
        .ms-status-canceled {
            color: #dc2626;
            background: #fef2f2;
        }


        /* =====================================================
           PANEL FOOTER
        ====================================================== */

        .ms-panel-footer {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            padding: 13px 20px;

            border-top: 1px solid #edf1f6;

            background: #fafbfd;

            color: #94a3b8;

            font-size: 9px;
        }


        .ms-panel-footer a {
            color: #2563eb;

            text-decoration: none;

            font-weight: 750;
        }


        /* =====================================================
           EMPTY
        ====================================================== */

        .ms-empty {
            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            min-height: 210px;

            text-align: center;
        }


        .ms-empty-icon {
            display: flex;

            align-items: center;
            justify-content: center;

            width: 46px;
            height: 46px;

            margin-bottom: 11px;

            border-radius: 14px;

            color: #64748b;

            background: #f1f5f9;

            font-size: 18px;
        }


        .ms-empty strong {
            color: #1e293b;

            font-size: 13px;
        }


        .ms-empty span {
            margin-top: 4px;

            color: #94a3b8;

            font-size: 10px;
        }


        /* =====================================================
           INVENTORY
        ====================================================== */

        .ms-inventory-body {
            padding: 6px 24px 18px;
        }


        .ms-inventory-item {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            padding: 16px 0;

            border-bottom: 1px solid #f1f5f9;
        }


        .ms-inventory-left {
            display: flex;

            align-items: center;

            gap: 11px;
        }


        .ms-inventory-icon {
            display: flex;

            align-items: center;
            justify-content: center;

            width: 37px;
            height: 37px;

            flex: 0 0 37px;

            border-radius: 11px;

            font-size: 14px;
            font-weight: 900;
        }


        .ms-inventory-icon.healthy {
            color: #059669;
            background: #ecfdf5;
        }


        .ms-inventory-icon.warning {
            color: #d97706;
            background: #fffbeb;
        }


        .ms-inventory-icon.danger {
            color: #dc2626;
            background: #fef2f2;
        }


        .ms-inventory-left strong {
            display: block;

            color: #1e293b;

            font-size: 11px;
        }


        .ms-inventory-left span {
            display: block;

            margin-top: 3px;

            color: #94a3b8;

            font-size: 9px;
        }


        .ms-inventory-number {
            color: #0f172a;

            font-size: 17px;
            font-weight: 800;
        }


        /* =====================================================
           STOCK SUMMARY
        ====================================================== */

        .ms-stock-summary {
            padding-top: 19px;
        }


        .ms-stock-summary-top {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 8px;

            color: #64748b;

            font-size: 9px;
            font-weight: 700;
        }


        .ms-stock-summary-top strong {
            color: #0f172a;

            font-size: 11px;
        }


        .ms-progress {
            width: 100%;
            height: 6px;

            overflow: hidden;

            border-radius: 999px;

            background: #eef2f7;
        }


        .ms-progress-value {
            height: 100%;

            border-radius: inherit;

            background:
                linear-gradient(
                    90deg,
                    #10b981,
                    #34d399
                );

            transition: width .5s ease;
        }


        .ms-inventory-button {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin: 0 24px 22px;

            padding: 12px 14px;

            border-radius: 11px;

            color: #334155;

            background: #f8fafc;

            border: 1px solid #e2e8f0;

            text-decoration: none;

            font-size: 10px;
            font-weight: 750;

            transition: .2s ease;
        }


        .ms-inventory-button:hover {
            color: #2563eb;

            background: #eff6ff;

            border-color: #dbeafe;
        }


        /* =====================================================
           QUICK ACTIONS
        ====================================================== */

        .ms-quick-section {
            margin-top: 20px;
        }


        .ms-quick-heading {
            margin-bottom: 12px;
        }


        .ms-quick-heading h2 {
            margin: 0;

            color: #0f172a;

            font-size: 17px;
            font-weight: 800;

            letter-spacing: -.025em;
        }


        .ms-quick-heading p {
            margin: 4px 0 0;

            color: #94a3b8;

            font-size: 11px;
        }


        .ms-quick-grid {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 12px;
        }


        .ms-quick-card {
            position: relative;

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 16px;

            overflow: hidden;

            border-radius: 16px;

            border: 1px solid var(--ms-border);

            background: #ffffff;

            text-decoration: none;

            box-shadow:
                0 7px 25px rgba(15, 23, 42, .035);

            transition:
                transform .22s ease,
                box-shadow .22s ease,
                border-color .22s ease;
        }


        .ms-quick-card:hover {
            transform: translateY(-3px);

            border-color: #d9e1ec;

            box-shadow:
                0 16px 35px rgba(15, 23, 42, .075);
        }


        .ms-quick-icon {
            display: flex;

            align-items: center;
            justify-content: center;

            width: 40px;
            height: 40px;

            flex: 0 0 40px;

            border-radius: 12px;

            font-size: 16px;
            font-weight: 850;
        }


        .ms-quick-icon.blue {
            color: #2563eb;
            background: #eff6ff;
        }


        .ms-quick-icon.purple {
            color: #7c3aed;
            background: #f5f3ff;
        }


        .ms-quick-icon.green {
            color: #059669;
            background: #ecfdf5;
        }


        .ms-quick-icon.pink {
            color: #db2777;
            background: #fdf2f8;
        }


        .ms-quick-content {
            min-width: 0;
        }


        .ms-quick-content strong {
            display: block;

            color: #0f172a;

            font-size: 11px;
            font-weight: 800;
        }


        .ms-quick-content span {
            display: block;

            margin-top: 3px;

            overflow: hidden;

            color: #94a3b8;

            font-size: 9px;

            text-overflow: ellipsis;

            white-space: nowrap;
        }


        .ms-quick-arrow {
            margin-left: auto;

            color: #94a3b8;

            font-size: 14px;

            transition: transform .2s ease;
        }


        .ms-quick-card:hover .ms-quick-arrow {
            transform: translateX(4px);

            color: #2563eb;
        }


        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media (max-width: 1250px) {

            .ms-stats-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }

            .ms-quick-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }

        }


        @media (max-width: 1000px) {

            .ms-main-grid {
                grid-template-columns: 1fr;
            }

            .ms-hero {
                align-items: flex-start;

                flex-direction: column;
            }

        }


        @media (max-width: 650px) {

            .ms-dashboard {
                padding-bottom: 30px;
            }

            .ms-hero {
                padding: 25px 22px;

                border-radius: 19px;
            }

            .ms-hero h1 {
                font-size: 31px;
            }

            .ms-header-actions {
                width: 100%;
            }

            .ms-btn {
                flex: 1;
            }

            .ms-stats-grid,
            .ms-quick-grid {
                grid-template-columns: 1fr;
            }

            .ms-panel-header {
                padding: 19px;
            }

            .ms-inventory-body {
                padding-inline: 19px;
            }

            .ms-inventory-button {
                margin-inline: 19px;
            }

        }


    </style>

</x-filament-panels::page>

