<x-filament-panels::page>

    <div class="ms-analytics">

        {{-- =====================================================
            ANALYTICS HEADER
        ====================================================== --}}
        <div class="analytics-hero">

            <div class="analytics-hero-content">

                <div class="analytics-eyebrow">
                    <span class="analytics-eyebrow-dot"></span>
                    STORE ANALYTICS
                </div>

                <h1>
                    Performance
                    <span>Overview.</span>
                </h1>

                <p>
                    Track your store performance, revenue and customer activity
                    from one place.
                </p>

            </div>

            <div class="analytics-period">
                <div class="period-icon">
                    <x-heroicon-o-calendar-days />
                </div>

                <div>
                    <span>REPORTING PERIOD</span>
                    <strong>Last 7 Days</strong>
                </div>
            </div>

        </div>


        {{-- =====================================================
            KPI CARDS
        ====================================================== --}}
        <div class="analytics-kpis">

            {{-- Average Order --}}
            <div class="analytics-kpi-card">

                <div class="kpi-top">
                    <div class="kpi-icon kpi-blue">
                        <x-heroicon-o-shopping-bag />
                    </div>

                    <span class="kpi-label">
                        AVERAGE ORDER
                    </span>
                </div>

                <div class="kpi-value">
                    ${{ number_format($avg, 2) }}
                </div>

                <div class="kpi-bottom">
                    <span class="kpi-indicator positive">
                        <x-heroicon-m-arrow-trending-up />
                    </span>

                    <span>
                        Average order value
                    </span>
                </div>

            </div>


            {{-- 7 Day Orders --}}
            <div class="analytics-kpi-card">

                <div class="kpi-top">
                    <div class="kpi-icon kpi-purple">
                        <x-heroicon-o-receipt-percent />
                    </div>

                    <span class="kpi-label">
                        7-DAY ORDERS
                    </span>
                </div>

                <div class="kpi-value">
                    {{ number_format($days->sum('orders')) }}
                </div>

                <div class="kpi-bottom">
                    <span class="kpi-indicator purple">
                        <x-heroicon-m-arrow-up-right />
                    </span>

                    <span>
                        Total orders
                    </span>
                </div>

            </div>


            {{-- Revenue --}}
            <div class="analytics-kpi-card">

                <div class="kpi-top">
                    <div class="kpi-icon kpi-green">
                        <x-heroicon-o-banknotes />
                    </div>

                    <span class="kpi-label">
                        7-DAY REVENUE
                    </span>
                </div>

                <div class="kpi-value">
                    ${{ number_format($days->sum('revenue'), 2) }}
                </div>

                <div class="kpi-bottom">
                    <span class="kpi-indicator positive">
                        <x-heroicon-m-arrow-trending-up />
                    </span>

                    <span>
                        Store revenue
                    </span>
                </div>

            </div>


            {{-- Customers --}}
            <div class="analytics-kpi-card">

                <div class="kpi-top">
                    <div class="kpi-icon kpi-pink">
                        <x-heroicon-o-users />
                    </div>

                    <span class="kpi-label">
                        CUSTOMERS
                    </span>
                </div>

                <div class="kpi-value">
                    {{ number_format($customers) }}
                </div>

                <div class="kpi-bottom">
                    <span class="kpi-indicator pink">
                        <x-heroicon-m-user-group />
                    </span>

                    <span>
                        Registered shoppers
                    </span>
                </div>

            </div>

        </div>


        {{-- =====================================================
            REVENUE CHART
        ====================================================== --}}
        <section class="analytics-chart-card">

            <div class="chart-header">

                <div>
                    <div class="analytics-section-label">
                        PERFORMANCE
                    </div>

                    <h2>
                        Revenue Overview
                    </h2>

                    <p>
                        Daily revenue generated during the last 7 days.
                    </p>
                </div>

                <div class="chart-summary">
                    <span>Total Revenue</span>

                    <strong>
                        ${{ number_format($days->sum('revenue'), 2) }}
                    </strong>
                </div>

            </div>


            {{-- Chart --}}
            <div class="revenue-chart">

                @php
                    $maxRevenue = max(1, (float) $days->max('revenue'));
                @endphp

                @foreach($days as $d)

                    @php
                        $revenue = (float) ($d['revenue'] ?? 0);
                        $height = $revenue > 0
                            ? max(8, ($revenue / $maxRevenue) * 100)
                            : 5;
                    @endphp

                    <div class="chart-column">

                        <div class="chart-tooltip">
                            ${{ number_format($revenue, 2) }}
                        </div>

                        <div class="chart-bar-wrap">

                            <div
                                class="chart-bar"
                                style="height: {{ $height }}%;"
                            ></div>

                        </div>

                        <span class="chart-label">
                            {{ $d['label'] }}
                        </span>

                    </div>

                @endforeach

            </div>

        </section>


        {{-- =====================================================
            BOTTOM INSIGHTS
        ====================================================== --}}
        <div class="analytics-bottom-grid">

            {{-- Store Performance --}}
            <section class="analytics-info-card">

                <div class="info-card-header">

                    <div>
                        <div class="analytics-section-label">
                            INSIGHT
                        </div>

                        <h2>
                            Store Performance
                        </h2>
                    </div>

                    <div class="info-icon blue">
                        <x-heroicon-o-sparkles />
                    </div>

                </div>


                <div class="insight-row">

                    <div class="insight-icon green">
                        <x-heroicon-m-arrow-trending-up />
                    </div>

                    <div class="insight-content">
                        <strong>
                            Revenue activity
                        </strong>

                        <span>
                            Your store generated
                            ${{ number_format($days->sum('revenue'), 2) }}
                            in the last 7 days.
                        </span>
                    </div>

                </div>


                <div class="insight-row">

                    <div class="insight-icon purple">
                        <x-heroicon-m-shopping-bag />
                    </div>

                    <div class="insight-content">
                        <strong>
                            Order activity
                        </strong>

                        <span>
                            {{ number_format($days->sum('orders')) }}
                            orders recorded during this period.
                        </span>
                    </div>

                </div>


                <div class="insight-row">

                    <div class="insight-icon pink">
                        <x-heroicon-m-users />
                    </div>

                    <div class="insight-content">
                        <strong>
                            Customer base
                        </strong>

                        <span>
                            {{ number_format($customers) }}
                            registered customers are currently in your store.
                        </span>
                    </div>

                </div>

            </section>


            {{-- Quick Metrics --}}
            <section class="analytics-info-card">

                <div class="info-card-header">

                    <div>
                        <div class="analytics-section-label">
                            QUICK METRICS
                        </div>

                        <h2>
                            At a Glance
                        </h2>
                    </div>

                    <div class="info-icon purple">
                        <x-heroicon-o-chart-bar-square />
                    </div>

                </div>


                <div class="metric-list">

                    <div class="metric-item">
                        <span>
                            Average Order Value
                        </span>

                        <strong>
                            ${{ number_format($avg, 2) }}
                        </strong>
                    </div>


                    <div class="metric-item">
                        <span>
                            Total Orders
                        </span>

                        <strong>
                            {{ number_format($days->sum('orders')) }}
                        </strong>
                    </div>


                    <div class="metric-item">
                        <span>
                            Total Revenue
                        </span>

                        <strong>
                            ${{ number_format($days->sum('revenue'), 2) }}
                        </strong>
                    </div>


                    <div class="metric-item">
                        <span>
                            Customers
                        </span>

                        <strong>
                            {{ number_format($customers) }}
                        </strong>
                    </div>

                </div>

            </section>

        </div>

    </div>


    <style>

        /* =====================================================
           ANALYTICS
        ====================================================== */

        .ms-analytics {
            max-width: 1500px;
            margin: 0 auto;
            padding-bottom: 50px;
        }


        /* =====================================================
           HERO
        ====================================================== */

        .analytics-hero {
            position: relative;
            overflow: hidden;

            display: flex;
            align-items: center;
            justify-content: space-between;

            min-height: 220px;

            padding: 42px 46px;

            border: 1px solid #e5eaf1;
            border-radius: 28px;

            background:
                radial-gradient(
                    circle at 90% 10%,
                    rgba(59, 130, 246, .14),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 75% 100%,
                    rgba(124, 58, 237, .08),
                    transparent 28%
                ),
                linear-gradient(
                    135deg,
                    #ffffff,
                    #f7f9ff
                );

            box-shadow:
                0 20px 55px rgba(15, 23, 42, .07);
        }


        .analytics-hero::before {
            content: "";

            position: absolute;

            width: 300px;
            height: 300px;

            right: -100px;
            top: -150px;

            border: 1px solid rgba(59,130,246,.12);

            border-radius: 50%;
        }


        .analytics-hero-content {
            position: relative;
            z-index: 2;
        }


        .analytics-eyebrow {
            display: flex;
            align-items: center;
            gap: 8px;

            margin-bottom: 15px;

            font-size: 11px;
            font-weight: 800;

            letter-spacing: .12em;

            color: #64748b;
        }


        .analytics-eyebrow-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #10b981;

            box-shadow:
                0 0 0 5px rgba(16,185,129,.10);
        }


        .analytics-hero h1 {
            margin: 0;

            font-size: clamp(34px, 4vw, 50px);

            line-height: 1.05;

            letter-spacing: -.055em;

            font-weight: 850;

            color: #101827;
        }


        .analytics-hero h1 span {
            color: #3569e8;
        }


        .analytics-hero p {
            margin: 14px 0 0;

            font-size: 14px;

            color: #64748b;
        }


        .analytics-period {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;
            gap: 13px;

            padding: 13px 17px;

            border: 1px solid #e1e7ef;

            border-radius: 15px;

            background: rgba(255,255,255,.72);

            backdrop-filter: blur(15px);
        }


        .period-icon {
            display: grid;
            place-items: center;

            width: 42px;
            height: 42px;

            border-radius: 12px;

            color: #3569e8;

            background: #edf4ff;
        }


        .period-icon svg {
            width: 20px;
            height: 20px;
        }


        .analytics-period span {
            display: block;

            margin-bottom: 4px;

            font-size: 9px;
            font-weight: 800;

            letter-spacing: .1em;

            color: #94a3b8;
        }


        .analytics-period strong {
            font-size: 13px;
            color: #172033;
        }


        /* =====================================================
           KPI
        ====================================================== */

        .analytics-kpis {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 16px;

            margin-top: 20px;
        }


        .analytics-kpi-card {
            position: relative;
            overflow: hidden;

            min-height: 180px;

            padding: 23px;

            border: 1px solid #e5eaf1;

            border-radius: 21px;

            background: #ffffff;

            box-shadow:
                0 12px 35px rgba(15,23,42,.055);

            transition:
                transform .25s ease,
                box-shadow .25s ease,
                border-color .25s ease;
        }


        .analytics-kpi-card::after {
            content: "";

            position: absolute;

            right: -45px;
            bottom: -65px;

            width: 150px;
            height: 150px;

            border-radius: 50%;

            background: rgba(59,130,246,.045);
        }


        .analytics-kpi-card:hover {
            transform: translateY(-3px);

            border-color: #d7e0ef;

            box-shadow:
                0 20px 45px rgba(15,23,42,.09);
        }


        .kpi-top {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }


        .kpi-label {
            margin-right: auto;
            margin-left: 13px;

            font-size: 10px;

            font-weight: 800;

            letter-spacing: .09em;

            color: #64748b;
        }


        .kpi-icon {
            display: grid;
            place-items: center;

            width: 43px;
            height: 43px;

            border-radius: 13px;
        }


        .kpi-icon svg {
            width: 19px;
            height: 19px;
        }


        .kpi-blue {
            color: #2563eb;
            background: #edf4ff;
        }


        .kpi-purple {
            color: #7c3aed;
            background: #f3efff;
        }


        .kpi-green {
            color: #059669;
            background: #eafaf4;
        }


        .kpi-pink {
            color: #db2777;
            background: #fff0f6;
        }


        .kpi-value {
            position: relative;
            z-index: 2;

            margin-top: 22px;

            font-size: 31px;

            line-height: 1;

            letter-spacing: -.045em;

            font-weight: 850;

            color: #101827;
        }


        .kpi-bottom {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;
            gap: 8px;

            margin-top: 19px;

            font-size: 11px;

            color: #64748b;
        }


        .kpi-indicator {
            display: grid;
            place-items: center;

            width: 23px;
            height: 23px;

            border-radius: 7px;
        }


        .kpi-indicator svg {
            width: 12px;
            height: 12px;
        }


        .kpi-indicator.positive {
            color: #059669;
            background: #ecfdf5;
        }


        .kpi-indicator.purple {
            color: #7c3aed;
            background: #f5f3ff;
        }


        .kpi-indicator.pink {
            color: #db2777;
            background: #fdf2f8;
        }


        /* =====================================================
           CHART
        ====================================================== */

        .analytics-chart-card {
            margin-top: 20px;

            padding: 28px;

            border: 1px solid #e5eaf1;

            border-radius: 23px;

            background: #ffffff;

            box-shadow:
                0 12px 35px rgba(15,23,42,.055);
        }


        .chart-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding-bottom: 23px;

            border-bottom: 1px solid #edf0f5;
        }


        .analytics-section-label {
            margin-bottom: 7px;

            font-size: 9px;

            font-weight: 850;

            letter-spacing: .13em;

            color: #94a3b8;
        }


        .chart-header h2,
        .info-card-header h2 {
            margin: 0;

            font-size: 20px;

            letter-spacing: -.035em;

            font-weight: 800;

            color: #101827;
        }


        .chart-header p {
            margin: 6px 0 0;

            font-size: 12px;

            color: #94a3b8;
        }


        .chart-summary {
            text-align: right;
        }


        .chart-summary span {
            display: block;

            margin-bottom: 5px;

            font-size: 10px;

            color: #94a3b8;
        }


        .chart-summary strong {
            font-size: 21px;

            letter-spacing: -.03em;

            color: #101827;
        }


        .revenue-chart {
            display: flex;
            align-items: flex-end;

            gap: 18px;

            height: 270px;

            padding: 30px 15px 0;
        }


        .chart-column {
            position: relative;

            display: flex;
            flex: 1;

            flex-direction: column;
            justify-content: flex-end;
            align-items: center;

            height: 100%;
        }


        .chart-bar-wrap {
            position: relative;

            display: flex;
            align-items: flex-end;

            width: min(70px, 70%);

            height: calc(100% - 28px);

            border-radius: 12px 12px 5px 5px;

            background:
                repeating-linear-gradient(
                    to top,
                    #f4f6fa 0,
                    #f4f6fa 1px,
                    transparent 1px,
                    transparent 25%
                );
        }


        .chart-bar {
            position: relative;

            width: 100%;

            min-height: 7px;

            border-radius: 11px 11px 4px 4px;

            background:
                linear-gradient(
                    180deg,
                    #4f7df3 0%,
                    #3569e8 100%
                );

            box-shadow:
                0 10px 25px rgba(53,105,232,.20);

            transition:
                height .5s ease,
                filter .2s ease;
        }


        .chart-bar:hover {
            filter: brightness(1.08);
        }


        .chart-label {
            margin-top: 10px;

            font-size: 10px;

            font-weight: 700;

            color: #94a3b8;
        }


        .chart-tooltip {
            position: absolute;

            bottom: calc(100% - 1px);

            z-index: 5;

            padding: 7px 9px;

            border-radius: 8px;

            font-size: 10px;

            font-weight: 700;

            color: #ffffff;

            background: #111827;

            opacity: 0;

            transform: translateY(5px);

            pointer-events: none;

            transition: .2s ease;
        }


        .chart-column:hover .chart-tooltip {
            opacity: 1;
            transform: translateY(-4px);
        }


        /* =====================================================
           BOTTOM
        ====================================================== */

        .analytics-bottom-grid {
            display: grid;

            grid-template-columns:
                minmax(0, 1.35fr)
                minmax(360px, .65fr);

            gap: 20px;

            margin-top: 20px;
        }


        .analytics-info-card {
            padding: 27px;

            border: 1px solid #e5eaf1;

            border-radius: 23px;

            background: #ffffff;

            box-shadow:
                0 12px 35px rgba(15,23,42,.055);
        }


        .info-card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;

            margin-bottom: 20px;
        }


        .info-icon {
            display: grid;
            place-items: center;

            width: 43px;
            height: 43px;

            border-radius: 13px;
        }


        .info-icon svg {
            width: 19px;
            height: 19px;
        }


        .info-icon.blue {
            color: #2563eb;
            background: #edf4ff;
        }


        .info-icon.purple {
            color: #7c3aed;
            background: #f3efff;
        }


        /* =====================================================
           INSIGHTS
        ====================================================== */

        .insight-row {
            display: flex;
            align-items: center;

            gap: 14px;

            padding: 16px 0;

            border-top: 1px solid #edf0f5;
        }


        .insight-icon {
            display: grid;
            place-items: center;

            flex: 0 0 40px;

            width: 40px;
            height: 40px;

            border-radius: 12px;
        }


        .insight-icon svg {
            width: 17px;
            height: 17px;
        }


        .insight-icon.green {
            color: #059669;
            background: #ecfdf5;
        }


        .insight-icon.purple {
            color: #7c3aed;
            background: #f5f3ff;
        }


        .insight-icon.pink {
            color: #db2777;
            background: #fdf2f8;
        }


        .insight-content strong {
            display: block;

            margin-bottom: 4px;

            font-size: 13px;

            color: #172033;
        }


        .insight-content span {
            display: block;

            font-size: 11px;

            line-height: 1.6;

            color: #94a3b8;
        }


        /* =====================================================
           QUICK METRICS
        ====================================================== */

        .metric-list {
            border-top: 1px solid #edf0f5;
        }


        .metric-item {
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 17px 0;

            border-bottom: 1px solid #edf0f5;
        }


        .metric-item span {
            font-size: 12px;

            color: #64748b;
        }


        .metric-item strong {
            font-size: 14px;

            color: #172033;
        }


        /* =====================================================
           DARK MODE
        ====================================================== */

        html.dark .analytics-hero,
        html.dark .analytics-kpi-card,
        html.dark .analytics-chart-card,
        html.dark .analytics-info-card {
            background: #111722 !important;

            border-color: #202b3a !important;

            box-shadow:
                0 15px 40px rgba(0,0,0,.20) !important;
        }


        html.dark .analytics-hero {
            background:
                radial-gradient(
                    circle at 90% 10%,
                    rgba(37,99,235,.18),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #111827,
                    #111722
                ) !important;
        }


        html.dark .analytics-hero h1,
        html.dark .chart-header h2,
        html.dark .info-card-header h2,
        html.dark .kpi-value,
        html.dark .chart-summary strong {
            color: #f8fafc !important;
        }


        html.dark .analytics-hero p,
        html.dark .chart-header p,
        html.dark .analytics-period span,
        html.dark .kpi-label,
        html.dark .kpi-bottom,
        html.dark .chart-label,
        html.dark .insight-content span,
        html.dark .metric-item span {
            color: #64748b !important;
        }


        html.dark .analytics-period {
            background: rgba(15,23,42,.65);

            border-color: #293548;
        }


        html.dark .analytics-period strong {
            color: #e2e8f0;
        }


        html.dark .chart-header,
        html.dark .insight-row,
        html.dark .metric-list,
        html.dark .metric-item {
            border-color: #202b3a;
        }


        html.dark .metric-item strong,
        html.dark .insight-content strong {
            color: #e2e8f0;
        }


        html.dark .chart-bar-wrap {
            background:
                repeating-linear-gradient(
                    to top,
                    #1b2533 0,
                    #1b2533 1px,
                    transparent 1px,
                    transparent 25%
                );
        }


        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media (max-width: 1100px) {

            .analytics-kpis {
                grid-template-columns: repeat(2, 1fr);
            }

            .analytics-bottom-grid {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 700px) {

            .analytics-hero {
                flex-direction: column;
                align-items: flex-start;

                gap: 25px;

                padding: 30px;
            }


            .analytics-hero h1 {
                font-size: 34px;
            }


            .analytics-kpis {
                grid-template-columns: 1fr;
            }


            .analytics-chart-card,
            .analytics-info-card {
                padding: 20px;
            }


            .chart-header {
                align-items: flex-start;
                flex-direction: column;

                gap: 15px;
            }


            .chart-summary {
                text-align: left;
            }


            .revenue-chart {
                gap: 8px;
                height: 220px;
            }


            .chart-bar-wrap {
                width: 70%;
            }

        }

    </style>

</x-filament-panels::page>
