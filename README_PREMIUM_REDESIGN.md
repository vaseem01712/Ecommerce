# MyStore — Ultra Premium Dual Theme Redesign

This package redesigns the existing Laravel ecommerce project while preserving the existing storefront/cart/checkout/payment/auth flows and the Filament admin panel.

## Themes
- Default: Navy Blue / Gradient / White
- Alternate: Black / Gold / White
- Theme switcher: fixed bottom-right on storefront and admin
- Preference saved in localStorage

## Storefront
- Premium sticky header + announcement bar
- Responsive footer
- Hero slider
- Category slider driven by active database categories
- Featured product slider driven by `$featured`
- Product cards with like/favourite local preference and Add to Bag
- Story, benefits, testimonials, journal/CTA sections
- Shop, category and product detail pages
- Cart, checkout, orders, payment success/cancel
- Auth pages and profile
- About, collections, contact, FAQ, shipping, returns, privacy, terms, careers, blog, gallery, team, portfolio

## Admin
The project already uses Filament 4, so `/admin` remains the native Filament panel rather than replacing it with static Blade pages.

Added / enhanced:
- Dashboard stats
- Recent orders widget
- Low-stock widget
- Product CRUD with image, pricing, sale price, stock, active/featured state
- Category CRUD
- Orders list/view/edit status
- Customers list/view
- Inventory monitor
- Analytics
- Content shortcuts
- Settings
- Premium dual-theme styling
- Admin access restricted to users whose `role` is `admin`

## Setup
1. Keep your existing `.env` and database.
2. If runtime cache folders are missing:
   - `New-Item -ItemType Directory -Force storage\framework\views`
   - `New-Item -ItemType Directory -Force storage\framework\cache`
   - `New-Item -ItemType Directory -Force storage\framework\sessions`
   - `New-Item -ItemType Directory -Force storage\logs`
   - `New-Item -ItemType Directory -Force bootstrap\cache`
3. Run:
   - `php artisan optimize:clear`
   - `npm install`
   - `npm run build`
   - `php artisan storage:link` (for Filament image uploads)
   - `php artisan serve`

## Admin access
Your existing `users.role` migration is retained. Set the intended admin user's role to `admin` in the database. Customer registrations remain `customer` by default.

No existing database migration was removed.
