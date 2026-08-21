<x-filament-panels::page>

    <div class="ms-content-page">

        {{-- =========================
             PAGE HERO
        ========================== --}}
        <section class="content-hero">

            <div class="content-hero-glow"></div>

            <div class="content-hero-main">

                <div class="content-eyebrow">
                    <span class="content-live-dot"></span>
                    MYSTORE / CONTENT
                </div>

                <h1>
                    Store
                    <span>Content.</span>
                </h1>

                <p>
                    Manage your storefront content, collections and product
                    catalogue from one central workspace.
                </p>

            </div>

            <div class="content-hero-badge">

                <div class="content-badge-icon">
                    <x-heroicon-o-squares-2x2 />
                </div>

                <div>
                    <small>CONTENT CENTER</small>
                    <strong>Storefront Management</strong>
                </div>

            </div>

        </section>


        {{-- =========================
             CONTENT CARDS
        ========================== --}}
        <div class="content-grid">


            {{-- HOMEPAGE --}}
            <a
                href="{{ route('home') }}"
                class="content-card content-card-blue"
            >

                <div class="content-card-top">

                    <div class="content-icon">
                        <x-heroicon-o-home />
                    </div>

                    <span class="content-arrow">
                        <x-heroicon-m-arrow-up-right />
                    </span>

                </div>


                <div class="content-card-body">

                    <div class="content-card-label">
                        STOREFRONT
                    </div>

                    <h2>
                        Homepage
                    </h2>

                    <p>
                        Manage the main storefront experience, hero sections
                        and featured content.
                    </p>

                </div>


                <div class="content-card-footer">

                    <span>
                        Open Homepage
                    </span>

                    <x-heroicon-m-arrow-right />

                </div>

            </a>


            {{-- CATEGORIES --}}
            <a
                href="{{ \App\Filament\Resources\Categories\CategoryResource::getUrl() }}"
                class="content-card content-card-purple"
            >

                <div class="content-card-top">

                    <div class="content-icon">
                        <x-heroicon-o-tag />
                    </div>

                    <span class="content-arrow">
                        <x-heroicon-m-arrow-up-right />
                    </span>

                </div>


                <div class="content-card-body">

                    <div class="content-card-label">
                        COLLECTIONS
                    </div>

                    <h2>
                        Categories
                    </h2>

                    <p>
                        Create, edit, organize and activate your storefront
                        product categories.
                    </p>

                </div>


                <div class="content-card-footer">

                    <span>
                        Manage Categories
                    </span>

                    <x-heroicon-m-arrow-right />

                </div>

            </a>


            {{-- PRODUCTS --}}
            <a
                href="{{ \App\Filament\Resources\Products\ProductResource::getUrl() }}"
                class="content-card content-card-green"
            >

                <div class="content-card-top">

                    <div class="content-icon">
                        <x-heroicon-o-cube />
                    </div>

                    <span class="content-arrow">
                        <x-heroicon-m-arrow-up-right />
                    </span>

                </div>


                <div class="content-card-body">

                    <div class="content-card-label">
                        CATALOGUE
                    </div>

                    <h2>
                        Products
                    </h2>

                    <p>
                        Control product information, pricing, images, stock
                        and featured placement.
                    </p>

                </div>


                <div class="content-card-footer">

                    <span>
                        Manage Products
                    </span>

                    <x-heroicon-m-arrow-right />

                </div>

            </a>

        </div>


        {{-- =========================
             QUICK ACCESS
        ========================== --}}
        <section class="content-quick">

            <div class="quick-heading">

                <div>
                    <div class="content-section-label">
                        QUICK ACCESS
                    </div>

                    <h2>
                        Everything in one place
                    </h2>

                    <p>
                        Jump directly into the area you want to manage.
                    </p>
                </div>

                <div class="quick-heading-icon">
                    <x-heroicon-o-command-line />
                </div>

            </div>


            <div class="quick-items">

                <a href="{{ route('home') }}" class="quick-item">

                    <span class="quick-item-icon blue">
                        <x-heroicon-o-home />
                    </span>

                    <span class="quick-item-text">
                        <strong>Homepage</strong>
                        <small>Storefront experience</small>
                    </span>

                    <x-heroicon-m-arrow-up-right class="quick-arrow" />

                </a>


                <a
                    href="{{ \App\Filament\Resources\Categories\CategoryResource::getUrl() }}"
                    class="quick-item"
                >

                    <span class="quick-item-icon purple">
                        <x-heroicon-o-tag />
                    </span>

                    <span class="quick-item-text">
                        <strong>Categories</strong>
                        <small>Collections & organisation</small>
                    </span>

                    <x-heroicon-m-arrow-up-right class="quick-arrow" />

                </a>


                <a
                    href="{{ \App\Filament\Resources\Products\ProductResource::getUrl() }}"
                    class="quick-item"
                >

                    <span class="quick-item-icon green">
                        <x-heroicon-o-cube />
                    </span>

                    <span class="quick-item-text">
                        <strong>Products</strong>
                        <small>Catalogue & inventory</small>
                    </span>

                    <x-heroicon-m-arrow-up-right class="quick-arrow" />

                </a>

            </div>

        </section>


    </div>


    <style>

        /* =========================================================
           CONTENT PAGE
        ========================================================= */

        .ms-content-page {
            max-width: 1500px;
            margin: 0 auto;
            padding-bottom: 55px;
        }


        /* =========================================================
           HERO
        ========================================================= */

        .content-hero {
            position: relative;
            overflow: hidden;

            display: flex;
            align-items: center;
            justify-content: space-between;

            min-height: 230px;

            padding: 42px 46px;

            border: 1px solid #e4e9f1;
            border-radius: 28px;

            background:
                radial-gradient(
                    circle at 88% 15%,
                    rgba(59,130,246,.14),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 75% 110%,
                    rgba(124,58,237,.09),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #ffffff 0%,
                    #f7f9ff 100%
                );

            box-shadow:
                0 20px 55px rgba(15,23,42,.065);
        }


        .content-hero::before {
            content: "";

            position: absolute;

            width: 340px;
            height: 340px;

            right: -150px;
            top: -175px;

            border: 1px solid rgba(59,130,246,.13);

            border-radius: 50%;
        }


        .content-hero::after {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            right: 80px;
            bottom: -125px;

            border: 1px solid rgba(124,58,237,.10);

            border-radius: 50%;
        }


        .content-hero-main {
            position: relative;
            z-index: 2;
        }


        .content-eyebrow {
            display: flex;
            align-items: center;
            gap: 9px;

            margin-bottom: 15px;

            font-size: 10px;
            font-weight: 850;

            letter-spacing: .13em;

            color: #64748b;
        }


        .content-live-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #10b981;

            box-shadow:
                0 0 0 5px rgba(16,185,129,.10);
        }


        .content-hero h1 {
            margin: 0;

            font-size: clamp(36px, 4vw, 52px);

            line-height: 1;

            letter-spacing: -.055em;

            font-weight: 850;

            color: #101827;
        }


        .content-hero h1 span {
            color: #3569e8;
        }


        .content-hero-main p {
            max-width: 600px;

            margin: 15px 0 0;

            font-size: 14px;

            line-height: 1.7;

            color: #64748b;
        }


        /* =========================================================
           HERO BADGE
        ========================================================= */

        .content-hero-badge {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;

            gap: 13px;

            padding: 13px 17px;

            border: 1px solid #e0e6ef;

            border-radius: 16px;

            background: rgba(255,255,255,.72);

            backdrop-filter: blur(18px);

            box-shadow:
                0 10px 30px rgba(15,23,42,.05);
        }


        .content-badge-icon {
            display: grid;
            place-items: center;

            width: 43px;
            height: 43px;

            border-radius: 13px;

            color: #3569e8;

            background: #edf4ff;
        }


        .content-badge-icon svg {
            width: 20px;
            height: 20px;
        }


        .content-hero-badge small {
            display: block;

            margin-bottom: 4px;

            font-size: 9px;
            font-weight: 850;

            letter-spacing: .1em;

            color: #94a3b8;
        }


        .content-hero-badge strong {
            display: block;

            font-size: 13px;

            color: #172033;
        }


        /* =========================================================
           CARDS GRID
        ========================================================= */

        .content-grid {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 18px;

            margin-top: 20px;
        }


        .content-card {
            position: relative;
            overflow: hidden;

            display: flex;
            flex-direction: column;

            min-height: 315px;

            padding: 25px;

            border: 1px solid #e4e9f1;

            border-radius: 23px;

            background: #ffffff;

            text-decoration: none !important;

            box-shadow:
                0 12px 35px rgba(15,23,42,.055);

            transition:
                transform .25s ease,
                box-shadow .25s ease,
                border-color .25s ease;
        }


        .content-card::after {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            right: -85px;
            bottom: -90px;

            border-radius: 50%;

            opacity: .8;

            transition:
                transform .35s ease;
        }


        .content-card:hover {
            transform: translateY(-5px);

            box-shadow:
                0 24px 50px rgba(15,23,42,.10);
        }


        .content-card:hover::after {
            transform: scale(1.25);
        }


        .content-card-blue::after {
            background: rgba(59,130,246,.07);
        }


        .content-card-purple::after {
            background: rgba(124,58,237,.07);
        }


        .content-card-green::after {
            background: rgba(16,185,129,.07);
        }


        /* =========================================================
           CARD TOP
        ========================================================= */

        .content-card-top {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }


        .content-icon {
            display: grid;
            place-items: center;

            width: 51px;
            height: 51px;

            border-radius: 15px;
        }


        .content-card-blue .content-icon {
            color: #2563eb;
            background: #edf4ff;
        }


        .content-card-purple .content-icon {
            color: #7c3aed;
            background: #f3efff;
        }


        .content-card-green .content-icon {
            color: #059669;
            background: #eafaf4;
        }


        .content-icon svg {
            width: 22px;
            height: 22px;
        }


        .content-arrow {
            display: grid;
            place-items: center;

            width: 34px;
            height: 34px;

            border-radius: 10px;

            color: #64748b;

            background: #f6f8fb;

            transition: .25s ease;
        }


        .content-arrow svg {
            width: 15px;
            height: 15px;
        }


        .content-card:hover .content-arrow {
            color: #ffffff;
            background: #172033;

            transform: translate(2px,-2px);
        }


        /* =========================================================
           CARD BODY
        ========================================================= */

        .content-card-body {
            position: relative;
            z-index: 2;

            margin-top: 30px;
        }


        .content-card-label {
            margin-bottom: 7px;

            font-size: 9px;

            font-weight: 850;

            letter-spacing: .13em;

            color: #94a3b8;
        }


        .content-card h2 {
            margin: 0;

            font-size: 24px;

            letter-spacing: -.04em;

            font-weight: 800;

            color: #101827;
        }


        .content-card p {
            max-width: 360px;

            margin: 10px 0 0;

            font-size: 12px;

            line-height: 1.7;

            color: #64748b;
        }


        /* =========================================================
           CARD FOOTER
        ========================================================= */

        .content-card-footer {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;
            gap: 7px;

            margin-top: auto;
            padding-top: 23px;

            font-size: 11px;

            font-weight: 750;

            color: #3569e8;
        }


        .content-card-footer svg {
            width: 14px;
            height: 14px;

            transition: transform .25s ease;
        }


        .content-card:hover .content-card-footer svg {
            transform: translateX(4px);
        }


        /* =========================================================
           QUICK ACCESS
        ========================================================= */

        .content-quick {
            margin-top: 20px;

            padding: 27px;

            border: 1px solid #e4e9f1;

            border-radius: 23px;

            background: #ffffff;

            box-shadow:
                0 12px 35px rgba(15,23,42,.055);
        }


        .quick-heading {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;

            padding-bottom: 22px;

            border-bottom: 1px solid #edf0f5;
        }


        .content-section-label {
            margin-bottom: 7px;

            font-size: 9px;

            font-weight: 850;

            letter-spacing: .13em;

            color: #94a3b8;
        }


        .quick-heading h2 {
            margin: 0;

            font-size: 20px;

            letter-spacing: -.035em;

            font-weight: 800;

            color: #101827;
        }


        .quick-heading p {
            margin: 6px 0 0;

            font-size: 12px;

            color: #94a3b8;
        }


        .quick-heading-icon {
            display: grid;
            place-items: center;

            width: 43px;
            height: 43px;

            border-radius: 13px;

            color: #3569e8;

            background: #edf4ff;
        }


        .quick-heading-icon svg {
            width: 20px;
            height: 20px;
        }


        .quick-items {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 12px;

            margin-top: 20px;
        }


        .quick-item {
            display: flex;
            align-items: center;

            gap: 12px;

            padding: 14px;

            border: 1px solid #edf0f5;

            border-radius: 15px;

            text-decoration: none !important;

            background: #fafbfd;

            transition: .25s ease;
        }


        .quick-item:hover {
            border-color: #d9e2f0;

            background: #ffffff;

            transform: translateY(-2px);

            box-shadow:
                0 10px 25px rgba(15,23,42,.06);
        }


        .quick-item-icon {
            display: grid;
            place-items: center;

            flex: 0 0 40px;

            width: 40px;
            height: 40px;

            border-radius: 11px;
        }


        .quick-item-icon svg {
            width: 18px;
            height: 18px;
        }


        .quick-item-icon.blue {
            color: #2563eb;
            background: #edf4ff;
        }


        .quick-item-icon.purple {
            color: #7c3aed;
            background: #f3efff;
        }


        .quick-item-icon.green {
            color: #059669;
            background: #eafaf4;
        }


        .quick-item-text {
            flex: 1;
        }


        .quick-item-text strong {
            display: block;

            font-size: 12px;

            color: #172033;
        }


        .quick-item-text small {
            display: block;

            margin-top: 3px;

            font-size: 10px;

            color: #94a3b8;
        }


        .quick-arrow {
            width: 15px;
            height: 15px;

            color: #94a3b8;

            transition: .2s ease;
        }


        .quick-item:hover .quick-arrow {
            color: #3569e8;

            transform: translate(2px,-2px);
        }


        /* =========================================================
           DARK MODE
        ========================================================= */

        html.dark .content-hero,
        html.dark .content-card,
        html.dark .content-quick {
            background: #111722 !important;

            border-color: #202b3a !important;

            box-shadow:
                0 15px 40px rgba(0,0,0,.20) !important;
        }


        html.dark .content-hero {
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


        html.dark .content-hero h1,
        html.dark .content-card h2,
        html.dark .quick-heading h2 {
            color: #f8fafc !important;
        }


        html.dark .content-hero-main p,
        html.dark .content-card p,
        html.dark .quick-heading p {
            color: #64748b !important;
        }


        html.dark .content-hero-badge {
            background: rgba(15,23,42,.7);

            border-color: #293548;
        }


        html.dark .content-hero-badge strong {
            color: #e2e8f0;
        }


        html.dark .content-quick,
        html.dark .quick-heading {
            border-color: #202b3a;
        }


        html.dark .quick-item {
            background: #0f1621;

            border-color: #202b3a;
        }


        html.dark .quick-item:hover {
            background: #141d2a;

            border-color: #304056;
        }


        html.dark .quick-item-text strong {
            color: #e2e8f0;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1100px) {

            .content-grid {
                grid-template-columns: 1fr 1fr;
            }

            .quick-items {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 700px) {

            .content-hero {
                flex-direction: column;

                align-items: flex-start;

                gap: 25px;

                padding: 30px;
            }


            .content-hero h1 {
                font-size: 36px;
            }


            .content-grid {
                grid-template-columns: 1fr;
            }


            .content-card {
                min-height: 280px;
            }


            .content-quick {
                padding: 21px;
            }

        }

    </style>

</x-filament-panels::page>
