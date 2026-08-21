<x-filament-panels::page>

    <div class="ms-settings-page">

        {{-- =====================================================
             HERO
        ====================================================== --}}
        <section class="settings-hero">

            <div class="settings-hero-bg"></div>

            <div class="settings-hero-content">

                <div class="settings-eyebrow">
                    <span class="settings-dot"></span>
                    MYSTORE / SETTINGS
                </div>

                <h1>
                    Account
                    <span>Settings.</span>
                </h1>

                <p>
                    Manage your administrator account and personalize
                    your store workspace.
                </p>

            </div>

            <div class="settings-hero-icon">
                <x-heroicon-o-cog-6-tooth />
            </div>

        </section>


        {{-- =====================================================
             SETTINGS GRID
        ====================================================== --}}
        <div class="settings-grid">


            {{-- =================================================
                 ADMIN ACCOUNT
            ================================================== --}}
            <section class="settings-card">

                <div class="settings-card-head">

                    <div class="settings-card-icon account-icon">
                        <x-heroicon-o-user />
                    </div>

                    <div>
                        <div class="settings-label">
                            ADMIN ACCOUNT
                        </div>

                        <h2>
                            Profile information
                        </h2>

                        <p>
                            Your administrator account details.
                        </p>
                    </div>

                </div>


                <div class="account-profile">

                    <div class="account-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div class="account-info">

                        <strong>
                            {{ auth()->user()->name }}
                        </strong>

                        <span>
                            {{ auth()->user()->email }}
                        </span>

                    </div>

                    <div class="account-status">
                        <span></span>
                        Active
                    </div>

                </div>


                <div class="settings-divider"></div>


                <div class="account-details">

                    <div class="detail-item">

                        <span class="detail-icon">
                            <x-heroicon-o-user-circle />
                        </span>

                        <div>
                            <small>ACCOUNT NAME</small>
                            <strong>
                                {{ auth()->user()->name }}
                            </strong>
                        </div>

                    </div>


                    <div class="detail-item">

                        <span class="detail-icon">
                            <x-heroicon-o-envelope />
                        </span>

                        <div>
                            <small>EMAIL ADDRESS</small>
                            <strong>
                                {{ auth()->user()->email }}
                            </strong>
                        </div>

                    </div>

                </div>


                <a
                    href="{{ route('profile.edit') }}"
                    class="settings-primary-btn"
                >

                    <span>
                        <x-heroicon-m-pencil-square />
                    </span>

                    Edit Profile

                    <x-heroicon-m-arrow-right class="btn-arrow" />

                </a>

            </section>



            {{-- =================================================
                 APPEARANCE
            ================================================== --}}
            <section class="settings-card appearance-card">

                <div class="settings-card-head">

                    <div class="settings-card-icon appearance-icon">
                        <x-heroicon-o-swatch />
                    </div>

                    <div>
                        <div class="settings-label">
                            APPEARANCE
                        </div>

                        <h2>
                            Premium themes
                        </h2>

                        <p>
                            Personalize your admin workspace.
                        </p>
                    </div>

                </div>


                {{-- Theme Preview --}}
                <div class="theme-preview">

                    <div class="theme-preview-top">

                        <div class="preview-dots">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        <div class="preview-search"></div>

                    </div>


                    <div class="preview-layout">

                        <div class="preview-sidebar">

                            <span class="active"></span>
                            <span></span>
                            <span></span>
                            <span></span>

                        </div>


                        <div class="preview-content">

                            <div class="preview-title"></div>

                            <div class="preview-cards">

                                <span></span>
                                <span></span>
                                <span></span>

                            </div>

                            <div class="preview-large"></div>

                        </div>

                    </div>

                </div>


                <div class="theme-description">

                    <div class="theme-description-icon">
                        <x-heroicon-o-sparkles />
                    </div>

                    <div>

                        <strong>
                            Premium workspace themes
                        </strong>

                        <p>
                            Use the floating control in the bottom-right
                            to switch between Navy / White and
                            Black / Gold / White.
                        </p>

                    </div>

                </div>

            </section>

        </div>


        {{-- =====================================================
             PREFERENCES / INFO
        ====================================================== --}}
        <section class="settings-info">

            <div class="info-left">

                <div class="info-icon">
                    <x-heroicon-o-shield-check />
                </div>

                <div>

                    <div class="settings-label">
                        ADMIN WORKSPACE
                    </div>

                    <h3>
                        Your workspace is ready.
                    </h3>

                    <p>
                        Account settings and appearance preferences
                        are available from this section.
                    </p>

                </div>

            </div>


            <div class="info-badge">
                <span></span>
                Secure workspace
            </div>

        </section>


    </div>


    <style>

        /* =========================================================
           PAGE
        ========================================================= */

        .ms-settings-page {
            max-width: 1500px;
            margin: 0 auto;
            padding-bottom: 55px;
        }


        /* =========================================================
           HERO
        ========================================================= */

        .settings-hero {
            position: relative;
            overflow: hidden;

            min-height: 225px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 40px 46px;

            border: 1px solid #e4e9f1;
            border-radius: 28px;

            background:
                radial-gradient(
                    circle at 88% 15%,
                    rgba(59,130,246,.15),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 70% 100%,
                    rgba(124,58,237,.08),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #ffffff,
                    #f7f9ff
                );

            box-shadow:
                0 20px 55px rgba(15,23,42,.065);
        }


        .settings-hero-bg {
            position: absolute;

            width: 350px;
            height: 350px;

            right: -130px;
            top: -170px;

            border: 1px solid rgba(59,130,246,.12);

            border-radius: 50%;
        }


        .settings-hero-bg::after {
            content: "";

            position: absolute;

            width: 190px;
            height: 190px;

            right: 110px;
            top: 115px;

            border: 1px solid rgba(124,58,237,.09);

            border-radius: 50%;
        }


        .settings-hero-content {
            position: relative;
            z-index: 2;
        }


        .settings-eyebrow {
            display: flex;
            align-items: center;
            gap: 9px;

            margin-bottom: 15px;

            font-size: 10px;
            font-weight: 850;

            letter-spacing: .13em;

            color: #64748b;
        }


        .settings-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #10b981;

            box-shadow:
                0 0 0 5px rgba(16,185,129,.10);
        }


        .settings-hero h1 {
            margin: 0;

            font-size: clamp(36px, 4vw, 52px);

            line-height: 1;

            letter-spacing: -.055em;

            font-weight: 850;

            color: #101827;
        }


        .settings-hero h1 span {
            color: #3569e8;
        }


        .settings-hero p {
            max-width: 600px;

            margin: 15px 0 0;

            font-size: 14px;

            line-height: 1.7;

            color: #64748b;
        }


        .settings-hero-icon {
            position: relative;
            z-index: 2;

            display: grid;
            place-items: center;

            width: 72px;
            height: 72px;

            margin-right: 15px;

            border: 1px solid #dce6f5;

            border-radius: 21px;

            color: #3569e8;

            background: rgba(255,255,255,.7);

            box-shadow:
                0 15px 35px rgba(37,99,235,.08);

            backdrop-filter: blur(15px);
        }


        .settings-hero-icon svg {
            width: 32px;
            height: 32px;
        }


        /* =========================================================
           GRID
        ========================================================= */

        .settings-grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 20px;

            margin-top: 20px;
        }


        /* =========================================================
           CARD
        ========================================================= */

        .settings-card {
            position: relative;
            overflow: hidden;

            padding: 28px;

            border: 1px solid #e4e9f1;
            border-radius: 24px;

            background: #ffffff;

            box-shadow:
                0 12px 35px rgba(15,23,42,.055);
        }


        .settings-card::after {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            right: -95px;
            bottom: -95px;

            border-radius: 50%;

            background: rgba(59,130,246,.045);

            pointer-events: none;
        }


        .settings-card-head {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;

            gap: 15px;
        }


        .settings-card-icon {
            display: grid;
            place-items: center;

            flex: 0 0 52px;

            width: 52px;
            height: 52px;

            border-radius: 15px;
        }


        .settings-card-icon svg {
            width: 23px;
            height: 23px;
        }


        .account-icon {
            color: #2563eb;
            background: #edf4ff;
        }


        .appearance-icon {
            color: #7c3aed;
            background: #f3efff;
        }


        .settings-label {
            margin-bottom: 5px;

            font-size: 9px;
            font-weight: 850;

            letter-spacing: .13em;

            color: #94a3b8;
        }


        .settings-card h2 {
            margin: 0;

            font-size: 21px;

            letter-spacing: -.035em;

            font-weight: 800;

            color: #101827;
        }


        .settings-card-head p {
            margin: 4px 0 0;

            font-size: 11px;

            color: #94a3b8;
        }


        /* =========================================================
           ACCOUNT PROFILE
        ========================================================= */

        .account-profile {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;

            gap: 13px;

            margin-top: 27px;

            padding: 15px;

            border: 1px solid #edf0f5;

            border-radius: 16px;

            background: #fafbfd;
        }


        .account-avatar {
            display: grid;
            place-items: center;

            width: 48px;
            height: 48px;

            border-radius: 14px;

            font-size: 17px;
            font-weight: 850;

            color: #ffffff;

            background:
                linear-gradient(
                    135deg,
                    #3569e8,
                    #5b7ff0
                );

            box-shadow:
                0 8px 18px rgba(53,105,232,.22);
        }


        .account-info {
            flex: 1;

            min-width: 0;
        }


        .account-info strong {
            display: block;

            font-size: 13px;

            color: #172033;
        }


        .account-info span {
            display: block;

            margin-top: 3px;

            overflow: hidden;

            font-size: 10px;

            text-overflow: ellipsis;
            white-space: nowrap;

            color: #94a3b8;
        }


        .account-status {
            display: flex;
            align-items: center;

            gap: 6px;

            padding: 6px 9px;

            border-radius: 999px;

            font-size: 9px;
            font-weight: 750;

            color: #059669;

            background: #ecfdf5;
        }


        .account-status span {
            width: 5px;
            height: 5px;

            border-radius: 50%;

            background: #10b981;
        }


        /* =========================================================
           DIVIDER
        ========================================================= */

        .settings-divider {
            position: relative;
            z-index: 2;

            height: 1px;

            margin: 21px 0;

            background: #edf0f5;
        }


        /* =========================================================
           DETAILS
        ========================================================= */

        .account-details {
            position: relative;
            z-index: 2;

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 12px;
        }


        .detail-item {
            display: flex;
            align-items: center;

            gap: 10px;

            padding: 12px;

            border: 1px solid #edf0f5;

            border-radius: 13px;
        }


        .detail-icon {
            display: grid;
            place-items: center;

            width: 32px;
            height: 32px;

            flex: 0 0 32px;

            border-radius: 9px;

            color: #64748b;

            background: #f5f7fa;
        }


        .detail-icon svg {
            width: 16px;
            height: 16px;
        }


        .detail-item small {
            display: block;

            font-size: 8px;
            font-weight: 800;

            letter-spacing: .08em;

            color: #a0aabc;
        }


        .detail-item strong {
            display: block;

            margin-top: 3px;

            font-size: 11px;

            color: #334155;
        }


        /* =========================================================
           BUTTON
        ========================================================= */

        .settings-primary-btn {
            position: relative;
            z-index: 2;

            display: inline-flex;
            align-items: center;

            gap: 9px;

            margin-top: 20px;

            padding: 11px 15px;

            border-radius: 11px;

            color: #ffffff !important;

            background: #111827;

            text-decoration: none !important;

            font-size: 11px;
            font-weight: 750;

            box-shadow:
                0 8px 20px rgba(15,23,42,.12);

            transition: .25s ease;
        }


        .settings-primary-btn > span {
            display: grid;
            place-items: center;

            width: 23px;
            height: 23px;

            border-radius: 7px;

            background: rgba(255,255,255,.10);
        }


        .settings-primary-btn > span svg {
            width: 13px;
            height: 13px;
        }


        .settings-primary-btn .btn-arrow {
            width: 14px;
            height: 14px;

            margin-left: 3px;

            transition: transform .2s ease;
        }


        .settings-primary-btn:hover {
            transform: translateY(-2px);

            background: #3569e8;

            box-shadow:
                0 12px 25px rgba(53,105,232,.22);
        }


        .settings-primary-btn:hover .btn-arrow {
            transform: translateX(3px);
        }


        /* =========================================================
           THEME PREVIEW
        ========================================================= */

        .theme-preview {
            position: relative;
            z-index: 2;

            overflow: hidden;

            height: 180px;

            margin-top: 27px;

            border: 1px solid #dfe5ee;

            border-radius: 17px;

            background: #f6f8fc;

            box-shadow:
                inset 0 0 0 1px rgba(255,255,255,.5);
        }


        .theme-preview-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            height: 35px;

            padding: 0 13px;

            background: #ffffff;

            border-bottom: 1px solid #e8ecf2;
        }


        .preview-dots {
            display: flex;
            gap: 4px;
        }


        .preview-dots span {
            width: 5px;
            height: 5px;

            border-radius: 50%;

            background: #cbd5e1;
        }


        .preview-search {
            width: 80px;
            height: 12px;

            border-radius: 5px;

            background: #eef2f7;
        }


        .preview-layout {
            display: flex;

            height: calc(100% - 35px);
        }


        .preview-sidebar {
            display: flex;
            flex-direction: column;

            gap: 9px;

            width: 65px;

            padding: 14px 9px;

            background: #ffffff;

            border-right: 1px solid #e8ecf2;
        }


        .preview-sidebar span {
            display: block;

            width: 100%;
            height: 10px;

            border-radius: 4px;

            background: #edf1f6;
        }


        .preview-sidebar span.active {
            background: #dbe8ff;
        }


        .preview-content {
            flex: 1;

            padding: 14px;
        }


        .preview-title {
            width: 80px;
            height: 13px;

            border-radius: 4px;

            background: #cbd5e1;
        }


        .preview-cards {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 7px;

            margin-top: 12px;
        }


        .preview-cards span {
            height: 45px;

            border: 1px solid #e6ebf2;

            border-radius: 7px;

            background: #ffffff;
        }


        .preview-large {
            height: 54px;

            margin-top: 8px;

            border: 1px solid #e6ebf2;

            border-radius: 7px;

            background: #ffffff;
        }


        /* =========================================================
           THEME DESCRIPTION
        ========================================================= */

        .theme-description {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: flex-start;

            gap: 12px;

            margin-top: 18px;

            padding: 14px;

            border: 1px solid #eee9ff;

            border-radius: 15px;

            background: #faf9ff;
        }


        .theme-description-icon {
            display: grid;
            place-items: center;

            width: 34px;
            height: 34px;

            flex: 0 0 34px;

            border-radius: 10px;

            color: #7c3aed;

            background: #f0eaff;
        }


        .theme-description-icon svg {
            width: 17px;
            height: 17px;
        }


        .theme-description strong {
            display: block;

            font-size: 11px;

            color: #312e81;
        }


        .theme-description p {
            margin: 4px 0 0;

            font-size: 10px;

            line-height: 1.6;

            color: #7c7596;
        }


        /* =========================================================
           INFO
        ========================================================= */

        .settings-info {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            margin-top: 20px;

            padding: 21px 24px;

            border: 1px solid #e4e9f1;

            border-radius: 20px;

            background: #ffffff;

            box-shadow:
                0 10px 30px rgba(15,23,42,.04);
        }


        .info-left {
            display: flex;
            align-items: center;

            gap: 13px;
        }


        .info-icon {
            display: grid;
            place-items: center;

            width: 43px;
            height: 43px;

            border-radius: 13px;

            color: #059669;

            background: #eafaf4;
        }


        .info-icon svg {
            width: 20px;
            height: 20px;
        }


        .info-left h3 {
            margin: 0;

            font-size: 14px;

            font-weight: 800;

            color: #172033;
        }


        .info-left p {
            margin: 4px 0 0;

            font-size: 10px;

            color: #94a3b8;
        }


        .info-badge {
            display: flex;
            align-items: center;

            gap: 7px;

            padding: 8px 11px;

            border-radius: 999px;

            font-size: 9px;
            font-weight: 750;

            color: #059669;

            background: #ecfdf5;
        }


        .info-badge span {
            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: #10b981;
        }


        /* =========================================================
           DARK MODE
        ========================================================= */

        html.dark .settings-hero,
        html.dark .settings-card,
        html.dark .settings-info {
            border-color: #202b3a !important;

            background: #111722 !important;

            box-shadow:
                0 15px 40px rgba(0,0,0,.20) !important;
        }


        html.dark .settings-hero {
            background:
                radial-gradient(
                    circle at 90% 10%,
                    rgba(37,99,235,.18),
                    transparent 30%
                ),
                #111722 !important;
        }


        html.dark .settings-hero h1,
        html.dark .settings-card h2,
        html.dark .info-left h3 {
            color: #f8fafc !important;
        }


        html.dark .settings-hero p,
        html.dark .settings-card-head p,
        html.dark .info-left p {
            color: #64748b !important;
        }


        html.dark .account-profile,
        html.dark .detail-item {
            border-color: #202b3a;

            background: #0f1621;
        }


        html.dark .account-info strong,
        html.dark .detail-item strong {
            color: #e2e8f0;
        }


        html.dark .settings-divider {
            background: #202b3a;
        }


        html.dark .detail-icon {
            background: #182231;

            color: #94a3b8;
        }


        html.dark .theme-preview {
            border-color: #293548;

            background: #0f1621;
        }


        html.dark .theme-preview-top,
        html.dark .preview-sidebar,
        html.dark .preview-cards span,
        html.dark .preview-large {
            background: #151e2b;

            border-color: #263244;
        }


        html.dark .preview-sidebar span {
            background: #263244;
        }


        html.dark .preview-sidebar span.active {
            background: #284d91;
        }


        html.dark .theme-description {
            border-color: #342b55;

            background: #18142a;
        }


        html.dark .theme-description strong {
            color: #c4b5fd;
        }


        html.dark .theme-description p {
            color: #8b82a8;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1000px) {

            .settings-grid {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 650px) {

            .settings-hero {
                padding: 30px;

                min-height: 210px;
            }


            .settings-hero h1 {
                font-size: 36px;
            }


            .settings-hero-icon {
                display: none;
            }


            .settings-card {
                padding: 22px;
            }


            .account-details {
                grid-template-columns: 1fr;
            }


            .settings-info {
                align-items: flex-start;

                flex-direction: column;
            }

        }

    </style>

</x-filament-panels::page>
