<link rel="stylesheet" href="{{ asset('filament-admin.css') }}">

<div class="mystore-admin-theme-fab" aria-label="Admin theme switcher">
    <button type="button" data-admin-theme="blue" onclick="window.MyStoreAdminTheme('blue')" title="Navy / white">
        ◐
    </button>
    <button type="button" data-admin-theme="luxury" onclick="window.MyStoreAdminTheme('luxury')" title="Black / gold">
        ◆
    </button>
</div>

<script>
(function () {
    const root = document.documentElement;

    function apply(theme) {
        const value = theme === 'luxury' ? 'luxury' : 'blue';
        root.dataset.storeTheme = value;
        localStorage.setItem('mystore-theme', value);

        document.querySelectorAll('[data-admin-theme]').forEach((button) => {
            button.classList.toggle('active', button.dataset.adminTheme === value);
        });
    }

    window.MyStoreAdminTheme = apply;
    apply(localStorage.getItem('mystore-theme') || 'blue');
})();
</script>
