<x-filament-panels::page>

    <style>
        .inventory-pagination {
    width: 100%;
    min-height: 64px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 20px;

    padding: 14px 22px;

    border-top: 1px solid var(--inv-border);
    background: var(--inv-card);
}

.inventory-pagination-info {
    color: var(--inv-muted);
    font-size: 11px;
    white-space: nowrap;
}

.inventory-pagination-info strong {
    color: var(--inv-text);
    font-weight: 800;
}

.inventory-pagination-links {
    display: flex;
    align-items: center;
    gap: 8px;
}

.inventory-pagination-links a,
.inventory-pagination-links .pagination-disabled {
    min-width: 78px;
    height: 36px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    padding: 0 14px;

    border: 1px solid var(--inv-border);
    border-radius: 10px;

    font-size: 11px;
    font-weight: 750;

    text-decoration: none;

    color: var(--inv-text);
    background: var(--inv-card);

    box-sizing: border-box;
}

.inventory-pagination-links a:hover {
    color: var(--inv-blue);
    border-color: rgba(49,85,231,.25);
    background: rgba(49,85,231,.06);
}

.inventory-pagination-links .pagination-disabled {
    color: var(--inv-muted);
    opacity: .45;
    cursor: not-allowed;
}
        /* =========================================================
           INVENTORY PREMIUM UI
        ========================================================= */

        .inventory-page {
            --inv-bg: #f5f7fb;
            --inv-card: #ffffff;
            --inv-border: #e7ebf2;
            --inv-text: #0b1220;
            --inv-muted: #718096;

            --inv-blue: #3155e7;
            --inv-blue-dark: #1d36a6;

            --inv-green: #13966f;
            --inv-yellow: #c0841a;
            --inv-red: #d84a62;

            color: var(--inv-text);
        }

        .dark .inventory-page {
            --inv-bg: #090e17;
            --inv-card: #111722;
            --inv-border: rgba(255,255,255,.09);
            --inv-text: #f8fafc;
            --inv-muted: #94a3b8;

            --inv-blue: #718cff;
            --inv-blue-dark: #5870e9;

            --inv-green: #32c997;
            --inv-yellow: #e5ae4b;
            --inv-red: #ef7186;
        }

        .inventory-page *,
        .inventory-page *::before,
        .inventory-page *::after {
            box-sizing: border-box;
        }

        /* =========================================================
           HERO
        ========================================================= */

        .inventory-hero {
            position: relative;
            overflow: hidden;
            padding: 34px;
            border-radius: 28px;

            background:
                radial-gradient(
                    circle at 85% 10%,
                    rgba(109, 140, 255, .32),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 65% 110%,
                    rgba(49, 85, 231, .30),
                    transparent 35%
                ),
                linear-gradient(
                    135deg,
                    #09142e 0%,
                    #14285f 50%,
                    #2948ba 100%
                );

            color: #ffffff;

            box-shadow:
                0 25px 70px rgba(20, 45, 120, .22);
        }

        .inventory-hero::before {
            content: "";
            position: absolute;

            width: 350px;
            height: 350px;

            right: -130px;
            top: -190px;

            border-radius: 50%;

            border: 1px solid rgba(255,255,255,.10);
        }

        .inventory-hero::after {
            content: "";
            position: absolute;

            width: 500px;
            height: 500px;

            right: -200px;
            top: -270px;

            border-radius: 50%;

            border: 1px solid rgba(255,255,255,.07);
        }

        .inventory-hero-content {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: flex-end;
            justify-content: space-between;

            gap: 30px;
        }

        .inventory-eyebrow {
            display: inline-flex;
            align-items: center;

            padding: 7px 11px;

            margin-bottom: 12px;

            border: 1px solid rgba(255,255,255,.16);

            border-radius: 999px;

            background: rgba(255,255,255,.08);

            color: rgba(255,255,255,.85);

            font-size: 10px;
            font-weight: 800;

            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .inventory-hero-title {
            margin: 0;

            color: #fff;

            font-size: clamp(32px, 4vw, 48px);

            line-height: 1.05;

            font-weight: 850;

            letter-spacing: -.045em;
        }

        .inventory-hero-description {
            max-width: 620px;

            margin: 12px 0 0;

            color: rgba(255,255,255,.70);

            font-size: 13px;

            line-height: 1.75;
        }

        .inventory-hero-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .inventory-hero-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            min-height: 44px;

            padding: 0 16px;

            border-radius: 13px;

            color: #fff;

            background: rgba(255,255,255,.11);

            border: 1px solid rgba(255,255,255,.18);

            text-decoration: none;

            font-size: 12px;
            font-weight: 800;

            backdrop-filter: blur(14px);

            transition:
                transform .2s ease,
                background .2s ease;
        }

        .inventory-hero-button:hover {
            color: #fff;

            background: rgba(255,255,255,.18);

            transform: translateY(-2px);
        }

        /* =========================================================
           METRICS
        ========================================================= */

        .inventory-metrics {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 15px;

            margin-top: 16px;
        }

        .inventory-metric {
            position: relative;

            overflow: hidden;

            min-height: 145px;

            padding: 21px;

            border: 1px solid var(--inv-border);

            border-radius: 21px;

            background: var(--inv-card);

            box-shadow:
                0 10px 35px rgba(15,34,76,.045);

            transition:
                transform .2s ease,
                box-shadow .2s ease;
        }

        .inventory-metric:hover {
            transform: translateY(-3px);

            box-shadow:
                0 18px 45px rgba(15,34,76,.08);
        }

        .inventory-metric::after {
            content: "";

            position: absolute;

            width: 100px;
            height: 100px;

            right: -40px;
            top: -40px;

            border-radius: 50%;

            background: rgba(49,85,231,.055);
        }

        .inventory-metric-top {
            position: relative;
            z-index: 2;

            display: flex;

            align-items: center;

            justify-content: space-between;
        }

        .inventory-metric-label {
            color: var(--inv-muted);

            font-size: 10px;

            font-weight: 850;

            letter-spacing: .10em;

            text-transform: uppercase;
        }

        .inventory-metric-icon {
            position: relative;
            z-index: 2;

            width: 38px;
            height: 38px;

            display: grid;

            place-items: center;

            border-radius: 12px;

            color: var(--inv-blue);

            background: rgba(49,85,231,.09);
        }

        .dark .inventory-metric-icon {
            background: rgba(113,140,255,.12);
        }

        .inventory-metric-value {
            position: relative;
            z-index: 2;

            margin-top: 17px;

            font-size: 29px;

            line-height: 1;

            font-weight: 850;

            letter-spacing: -.045em;
        }

        .inventory-metric-note {
            position: relative;
            z-index: 2;

            margin-top: 9px;

            color: var(--inv-muted);

            font-size: 11px;

            line-height: 1.5;
        }

        .inventory-metric-note strong {
            color: var(--inv-text);
        }

        /* =========================================================
           MAIN GRID
        ========================================================= */

        .inventory-main {
            display: grid;

            grid-template-columns:
                minmax(0, 1fr)
                330px;

            gap: 16px;

            margin-top: 16px;
        }

        .inventory-card {
            overflow: hidden;

            border: 1px solid var(--inv-border);

            border-radius: 22px;

            background: var(--inv-card);

            box-shadow:
                0 10px 35px rgba(15,34,76,.045);
        }

        .inventory-card-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            padding: 21px;

            border-bottom: 1px solid var(--inv-border);
        }

        .inventory-card-title {
            margin: 0;

            font-size: 16px;

            font-weight: 850;

            letter-spacing: -.025em;
        }

        .inventory-card-subtitle {
            margin: 5px 0 0;

            color: var(--inv-muted);

            font-size: 11px;
        }

        .inventory-count {
            display: inline-flex;

            align-items: center;

            padding: 7px 11px;

            border-radius: 999px;

            background: #f0f3f8;

            color: #65738a;

            font-size: 10px;

            font-weight: 800;
        }

        .dark .inventory-count {
            background: rgba(255,255,255,.06);

            color: #a9b4c5;
        }

        /* =========================================================
           TABLE
        ========================================================= */

        .inventory-table-wrapper {
            overflow-x: auto;
        }

        .inventory-table {
            width: 100%;

            min-width: 760px;

            border-collapse: collapse;
        }

        .inventory-table th {
            padding: 12px 20px;

            background: rgba(248,249,252,.8);

            border-bottom: 1px solid var(--inv-border);

            color: var(--inv-muted);

            text-align: left;

            font-size: 9px;

            font-weight: 850;

            letter-spacing: .12em;

            text-transform: uppercase;
        }

        .dark .inventory-table th {
            background: rgba(255,255,255,.025);
        }

        .inventory-table td {
            padding: 15px 20px;

            border-bottom: 1px solid var(--inv-border);

            vertical-align: middle;
        }

        .inventory-table tbody tr {
            transition: background .18s ease;
        }

        .inventory-table tbody tr:hover {
            background: rgba(49,85,231,.035);
        }

        .inventory-table tbody tr:last-child td {
            border-bottom: 0;
        }

        /* =========================================================
           PRODUCT
        ========================================================= */

        .inventory-product {
            display: flex;

            align-items: center;

            gap: 12px;
        }

        .inventory-product-image {
            width: 48px;
            height: 48px;

            flex: 0 0 48px;

            overflow: hidden;

            display: grid;

            place-items: center;

            border: 1px solid var(--inv-border);

            border-radius: 14px;

            background: linear-gradient(
                145deg,
                #f3f5f9,
                #e8edf6
            );

            color: #8b98aa;
        }

        .dark .inventory-product-image {
            background: #192231;
        }

        .inventory-product-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;
        }

        .inventory-product-name {
            font-size: 12px;

            font-weight: 800;
        }

        .inventory-product-id {
            margin-top: 3px;

            color: var(--inv-muted);

            font-size: 10px;
        }

        .inventory-category {
            color: var(--inv-muted);

            font-size: 11px;
        }

        /* =========================================================
           STOCK
        ========================================================= */

        .inventory-stock-number {
            font-size: 12px;

            font-weight: 800;
        }

        .inventory-stock-bar {
            width: 120px;

            height: 5px;

            margin-top: 7px;

            overflow: hidden;

            border-radius: 999px;

            background: #e8ecf2;
        }

        .dark .inventory-stock-bar {
            background: rgba(255,255,255,.08);
        }

        .inventory-stock-fill {
            height: 100%;

            border-radius: inherit;
        }

        /* =========================================================
           STATUS
        ========================================================= */

        .inventory-status {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 7px 10px;

            border-radius: 999px;

            font-size: 10px;

            font-weight: 800;
        }

        .inventory-status-dot {
            width: 6px;
            height: 6px;

            border-radius: 50%;
        }

        .inventory-status.healthy {
            color: var(--inv-green);

            background: rgba(19,150,111,.09);
        }

        .inventory-status.healthy .inventory-status-dot {
            background: var(--inv-green);
        }

        .inventory-status.low {
            color: var(--inv-yellow);

            background: rgba(192,132,26,.10);
        }

        .inventory-status.low .inventory-status-dot {
            background: var(--inv-yellow);
        }

        .inventory-status.out {
            color: var(--inv-red);

            background: rgba(216,74,98,.09);
        }

        .inventory-status.out .inventory-status-dot {
            background: var(--inv-red);
        }

        /* =========================================================
           MANAGE
        ========================================================= */

        .inventory-manage {
            width: 36px;
            height: 36px;

            display: inline-grid;

            place-items: center;

            border: 1px solid var(--inv-border);

            border-radius: 11px;

            color: var(--inv-muted);

            background: transparent;

            text-decoration: none;

            transition: all .18s ease;
        }

        .inventory-manage:hover {
            color: var(--inv-blue);

            border-color: rgba(49,85,231,.25);

            background: rgba(49,85,231,.07);

            transform: translateY(-2px);
        }

        /* =========================================================
           RIGHT SIDE
        ========================================================= */

        .inventory-side {
            display: flex;

            flex-direction: column;

            gap: 16px;
        }

        .inventory-health {
            padding: 21px;
        }

        .inventory-health-top {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;
        }

        .inventory-health-title {
            font-size: 15px;

            font-weight: 850;
        }

        .inventory-health-ring {
            --health-angle: 0deg;

            width: 94px;
            height: 94px;

            display: grid;

            place-items: center;

            flex: 0 0 94px;

            border-radius: 50%;

            background:
                conic-gradient(
                    var(--inv-blue) var(--health-angle),
                    #e8edf5 var(--health-angle)
                );

            position: relative;
        }

        .dark .inventory-health-ring {
            background:
                conic-gradient(
                    var(--inv-blue) var(--health-angle),
                    #283142 var(--health-angle)
                );
        }

        .inventory-health-ring::after {
            content: "";

            position: absolute;

            width: 68px;
            height: 68px;

            border-radius: 50%;

            background: var(--inv-card);
        }

        .inventory-health-ring span {
            position: relative;
            z-index: 2;

            font-size: 18px;

            font-weight: 850;
        }

        .inventory-health-description {
            margin: 18px 0 0;

            color: var(--inv-muted);

            font-size: 11px;

            line-height: 1.7;
        }

        /* =========================================================
           BREAKDOWN
        ========================================================= */

        .inventory-breakdown {
            margin-top: 20px;

            border-top: 1px solid var(--inv-border);
        }

        .inventory-breakdown-row {
            display: grid;

            grid-template-columns:
                auto
                minmax(0, 1fr)
                auto;

            align-items: center;

            gap: 9px;

            padding: 12px 0;

            border-bottom: 1px solid var(--inv-border);
        }

        .inventory-breakdown-row:last-child {
            border-bottom: 0;
        }

        .inventory-breakdown-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;
        }

        .inventory-breakdown-label {
            color: var(--inv-muted);

            font-size: 11px;
        }

        .inventory-breakdown-value {
            font-size: 12px;

            font-weight: 850;
        }

        /* =========================================================
           CALLOUT
        ========================================================= */

        .inventory-callout {
            position: relative;

            overflow: hidden;

            padding: 23px;

            border-radius: 22px;

            color: #fff;

            background:
                radial-gradient(
                    circle at 100% 0,
                    rgba(113,140,255,.35),
                    transparent 40%
                ),
                linear-gradient(
                    135deg,
                    #0d1835,
                    #1d3475
                );

            box-shadow:
                0 18px 50px rgba(20,45,120,.16);
        }

        .inventory-callout-kicker {
            color: rgba(255,255,255,.55);

            font-size: 9px;

            font-weight: 850;

            letter-spacing: .13em;

            text-transform: uppercase;
        }

        .inventory-callout h3 {
            margin: 10px 0 0;

            color: #fff;

            font-size: 19px;

            line-height: 1.25;

            font-weight: 850;

            letter-spacing: -.025em;
        }

        .inventory-callout p {
            margin: 10px 0 18px;

            color: rgba(255,255,255,.66);

            font-size: 11px;

            line-height: 1.7;
        }

        .inventory-callout a {
            display: inline-flex;

            align-items: center;

            min-height: 38px;

            padding: 0 13px;

            border-radius: 11px;

            color: #15254d;

            background: #fff;

            text-decoration: none;

            font-size: 10px;

            font-weight: 850;

            transition: transform .2s ease;
        }

        .inventory-callout a:hover {
            color: #15254d;

            transform: translateY(-2px);
        }

        /* =========================================================
           EMPTY
        ========================================================= */

        .inventory-empty {
            min-height: 330px;

            display: flex;

            align-items: center;

            justify-content: center;

            flex-direction: column;

            gap: 8px;

            text-align: center;

            padding: 30px;
        }

        .inventory-empty-icon {
            width: 52px;
            height: 52px;

            display: grid;

            place-items: center;

            margin-bottom: 8px;

            border-radius: 16px;

            color: var(--inv-blue);

            background: rgba(49,85,231,.09);
        }

        .inventory-empty strong {
            font-size: 14px;
        }

        .inventory-empty span {
            color: var(--inv-muted);

            font-size: 11px;
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1200px) {

            .inventory-metrics {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }

            .inventory-main {
                grid-template-columns: 1fr;
            }

            .inventory-side {
                display: grid;

                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 768px) {

            .inventory-hero {
                padding: 24px;

                border-radius: 22px;
            }

            .inventory-hero-content {
                align-items: flex-start;

                flex-direction: column;
            }

            .inventory-hero-actions {
                width: 100%;
            }

            .inventory-hero-button {
                flex: 1;
            }

            .inventory-metrics {
                grid-template-columns: 1fr;
            }

            .inventory-side {
                grid-template-columns: 1fr;
            }

            .inventory-card-header {
                align-items: flex-start;

                flex-direction: column;
            }
        }

        @media (max-width: 480px) {

            .inventory-hero-title {
                font-size: 30px;
            }

            .inventory-hero-description {
                font-size: 12px;
            }

            .inventory-hero-button {
                width: 100%;
            }
        }
    </style>


    <div class="inventory-page">

        {{-- =====================================================
             HERO
        ====================================================== --}}

        <section class="inventory-hero">

            <div class="inventory-hero-content">

                <div>

                    <div class="inventory-eyebrow">
                        <x-heroicon-o-cube
                            style="width:13px;height:13px"
                        />

                        Inventory Command Center
                    </div>

                    <h1 class="inventory-hero-title">
                        Inventory
                    </h1>

                    <p class="inventory-hero-description">
                        Monitor stock levels, identify products that need
                        attention and keep your entire catalog ready to sell.
                    </p>

                </div>


                <div class="inventory-hero-actions">

                    <a
                        href="{{ \App\Filament\Resources\Products\ProductResource::getUrl() }}"
                        class="inventory-hero-button"
                    >
                        <x-heroicon-o-squares-2x2
                            style="width:16px;height:16px"
                        />

                        Product Catalog
                    </a>

                    <a
                        href="{{ \App\Filament\Resources\Products\ProductResource::getUrl('create') }}"
                        class="inventory-hero-button"
                    >
                        <x-heroicon-o-plus
                            style="width:16px;height:16px"
                        />

                        Add Product
                    </a>

                </div>

            </div>

        </section>


        {{-- =====================================================
             METRICS
        ====================================================== --}}

        <section class="inventory-metrics">


            {{-- PRODUCTS --}}

            <article class="inventory-metric">

                <div class="inventory-metric-top">

                    <span class="inventory-metric-label">
                        Products
                    </span>

                    <span class="inventory-metric-icon">

                        <x-heroicon-o-cube
                            style="width:19px;height:19px"
                        />

                    </span>

                </div>

                <div class="inventory-metric-value">
                    {{ number_format($totalProducts) }}
                </div>

                <div class="inventory-metric-note">
                    Total products in your catalog
                </div>

            </article>


            {{-- UNITS --}}

            <article class="inventory-metric">

                <div class="inventory-metric-top">

                    <span class="inventory-metric-label">
                        Units
                    </span>

                    <span class="inventory-metric-icon">

                        <x-heroicon-o-archive-box
                            style="width:19px;height:19px"
                        />

                    </span>

                </div>

                <div class="inventory-metric-value">
                    {{ number_format($totalUnits) }}
                </div>

                <div class="inventory-metric-note">
                    Total units currently available
                </div>

            </article>


            {{-- LOW STOCK --}}

            <article class="inventory-metric">

                <div class="inventory-metric-top">

                    <span class="inventory-metric-label">
                        Low Stock
                    </span>

                    <span class="inventory-metric-icon">

                        <x-heroicon-o-exclamation-triangle
                            style="width:19px;height:19px"
                        />

                    </span>

                </div>

                <div class="inventory-metric-value">
                    {{ number_format($lowStock) }}
                </div>

                <div class="inventory-metric-note">
                    Products with
                    <strong>1–5 units</strong>
                    remaining
                </div>

            </article>


            {{-- INVENTORY VALUE --}}

            <article class="inventory-metric">

                <div class="inventory-metric-top">

                    <span class="inventory-metric-label">
                        Inventory Value
                    </span>

                    <span class="inventory-metric-icon">

                        <x-heroicon-o-banknotes
                            style="width:19px;height:19px"
                        />

                    </span>

                </div>

                <div class="inventory-metric-value">
                    ${{ number_format($inventoryValue, 2) }}
                </div>

                <div class="inventory-metric-note">
                    Current selling price × stock
                </div>

            </article>

        </section>


        {{-- =====================================================
             MAIN CONTENT
        ====================================================== --}}

        <section class="inventory-main">


            {{-- =================================================
                 PRODUCT TABLE
            ================================================== --}}

            <div class="inventory-card">

                <div class="inventory-card-header">

                    <div>

                        <h2 class="inventory-card-title">
                            Stock Monitor
                        </h2>

                        <p class="inventory-card-subtitle">
                            Products needing attention are displayed first.
                        </p>

                    </div>

<span class="inventory-count">
    {{ $products->total() }} products
</span>

                </div>


                @if($products->isEmpty())

                    <div class="inventory-empty">

                        <div class="inventory-empty-icon">

                            <x-heroicon-o-cube-transparent
                                style="width:24px;height:24px"
                            />

                        </div>

                        <strong>
                            Your inventory is empty
                        </strong>

                        <span>
                            Add your first product to start tracking stock.
                        </span>

                    </div>

                @else

                    <div class="inventory-table-wrapper">

                        <table class="inventory-table">

                            <thead>

                                <tr>

                                    <th>
                                        Product
                                    </th>

                                    <th>
                                        Category
                                    </th>

                                    <th>
                                        Stock Level
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th style="text-align:right">
                                        Manage
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($products as $product)

                                    @php

                                        $stock = max(
                                            0,
                                            (int) $product->stock
                                        );

                                        if ($stock <= 0) {

                                            $status = 'out';

                                            $statusLabel = 'Out of stock';

                                            $barWidth = 0;

                                            $barColor = '#d84a62';

                                        } elseif ($stock <= 5) {

                                            $status = 'low';

                                            $statusLabel = 'Low stock';

                                            $barWidth = max(
                                                15,
                                                ($stock / 10) * 100
                                            );

                                            $barColor = '#c0841a';

                                        } else {

                                            $status = 'healthy';

                                            $statusLabel = 'Healthy';

                                            $barWidth = min(
                                                100,
                                                max(
                                                    25,
                                                    ($stock / 50) * 100
                                                )
                                            );

                                            $barColor = '#13966f';

                                        }

                                        $image = $product->image ?? null;

                                        $imageUrl = null;

                                        if ($image) {

                                            $imageUrl = str_starts_with(
                                                $image,
                                                'http'
                                            )
                                                ? $image
                                                : asset(
                                                    'storage/' .
                                                    ltrim($image, '/')
                                                );

                                        }

                                    @endphp


                                    <tr>

                                        {{-- PRODUCT --}}

                                        <td>

                                            <div class="inventory-product">

                                                <div class="inventory-product-image">

                                                    @if($imageUrl)

                                                        <img
                                                            src="{{ $imageUrl }}"
                                                            alt="{{ $product->name }}"
                                                        >

                                                    @else

                                                        <x-heroicon-o-cube
                                                            style="width:21px;height:21px"
                                                        />

                                                    @endif

                                                </div>


                                                <div>

                                                    <div class="inventory-product-name">
                                                        {{ $product->name }}
                                                    </div>

                                                    <div class="inventory-product-id">
                                                        SKU #{{ $product->id }}
                                                    </div>

                                                </div>

                                            </div>

                                        </td>


                                        {{-- CATEGORY --}}

                                        <td>

                                            <span class="inventory-category">

                                                {{ $product->category?->name ?? 'Uncategorized' }}

                                            </span>

                                        </td>


                                        {{-- STOCK --}}

                                        <td>

                                            <div class="inventory-stock-number">

                                                {{ number_format($stock) }}

                                                <span
                                                    style="
                                                        color:var(--inv-muted);
                                                        font-weight:500;
                                                        font-size:10px;
                                                    "
                                                >
                                                    units
                                                </span>

                                            </div>


                                            <div class="inventory-stock-bar">

                                                <div
                                                    class="inventory-stock-fill"
                                                    style="
                                                        width:{{ min(100, $barWidth) }}%;
                                                        background:{{ $barColor }};
                                                    "
                                                ></div>

                                            </div>

                                        </td>


                                        {{-- STATUS --}}

                                        <td>

                                            <span
                                                class="inventory-status {{ $status }}"
                                            >

                                                <span
                                                    class="inventory-status-dot"
                                                ></span>

                                                {{ $statusLabel }}

                                            </span>

                                        </td>


                                        {{-- MANAGE --}}

                                        <td style="text-align:right">

                                            <a
                                                href="{{ \App\Filament\Resources\Products\ProductResource::getUrl('edit', ['record' => $product]) }}"
                                                class="inventory-manage"
                                                title="Manage Product"
                                            >

                                                <x-heroicon-o-pencil-square
                                                    style="width:16px;height:16px"
                                                />

                                            </a>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @endif
@if($products->hasPages())
    <div class="inventory-pagination">

        <div class="inventory-pagination-info">
            Showing
            <strong>{{ $products->firstItem() }}</strong>
            –
            <strong>{{ $products->lastItem() }}</strong>
            of
            <strong>{{ $products->total() }}</strong>
            products
        </div>

        <div class="inventory-pagination-links">
            @if($products->onFirstPage())
                <span class="pagination-disabled">Previous</span>
            @else
                <a href="{{ $products->previousPageUrl() }}">
                    Previous
                </a>
            @endif

            @if($products->hasMorePages())
                <a href="{{ $products->nextPageUrl() }}">
                    Next
                </a>
            @else
                <span class="pagination-disabled">Next</span>
            @endif
        </div>

    </div>
@endif
            </div>


            {{-- =================================================
                 SIDEBAR
            ================================================== --}}

            <aside class="inventory-side">


                {{-- STOCK HEALTH --}}

                <div class="inventory-card inventory-health">

                    <div class="inventory-health-top">

                        <div>

                            <div class="inventory-health-title">
                                Stock Health
                            </div>

                            <div class="inventory-card-subtitle">
                                Overall product availability
                            </div>

                        </div>


                        <div
                            class="inventory-health-ring"
                            style="
                                --health-angle: {{ $healthAngle }}deg;
                            "
                        >

                            <span>
                                {{ $healthPercent }}%
                            </span>

                        </div>

                    </div>


                    <p class="inventory-health-description">

                        @if($healthPercent >= 80)

                            Your inventory is in strong shape.
                            Continue monitoring products approaching
                            the restock threshold.

                        @elseif($healthPercent >= 50)

                            Your inventory needs some attention.
                            Review low-stock products before they
                            affect sales.

                        @else

                            A significant portion of your catalog
                            needs attention. Restock critical products
                            as soon as possible.

                        @endif

                    </p>


                    {{-- BREAKDOWN --}}

                    <div class="inventory-breakdown">


                        <div class="inventory-breakdown-row">

                            <span
                                class="inventory-breakdown-dot"
                                style="background:#13966f"
                            ></span>

                            <span class="inventory-breakdown-label">
                                Healthy stock
                            </span>

                            <strong class="inventory-breakdown-value">
                                {{ $healthyStock }}
                            </strong>

                        </div>


                        <div class="inventory-breakdown-row">

                            <span
                                class="inventory-breakdown-dot"
                                style="background:#c0841a"
                            ></span>

                            <span class="inventory-breakdown-label">
                                Low stock
                            </span>

                            <strong class="inventory-breakdown-value">
                                {{ $lowStock }}
                            </strong>

                        </div>


                        <div class="inventory-breakdown-row">

                            <span
                                class="inventory-breakdown-dot"
                                style="background:#d84a62"
                            ></span>

                            <span class="inventory-breakdown-label">
                                Out of stock
                            </span>

                            <strong class="inventory-breakdown-value">
                                {{ $outOfStock }}
                            </strong>

                        </div>

                    </div>

                </div>


                {{-- WORKFLOW CARD --}}

                <div class="inventory-callout">

                    <div class="inventory-callout-kicker">
                        Inventory Workflow
                    </div>

                    <h3>
                        Keep your catalog ready to sell.
                    </h3>

                    <p>
                        Manage stock, pricing, availability and product
                        information from your product catalog.
                    </p>

                    <a
                        href="{{ \App\Filament\Resources\Products\ProductResource::getUrl() }}"
                    >
                        Open Product Catalog
                    </a>

                </div>

            </aside>

        </section>

    </div>

</x-filament-panels::page>
