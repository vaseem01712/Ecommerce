import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-reveal]').forEach((element) => {
        element.classList.add('reveal-ready');
    });

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('[data-reveal]').forEach((element) => revealObserver.observe(element));

    document.querySelectorAll('[data-store-slider]').forEach((slider) => {
        const slides = [...slider.querySelectorAll('[data-store-slide]')];
        const dots = [...slider.querySelectorAll('[data-store-dot]')];
        if (slides.length < 2) return;

        let active = 0;
        const show = (index) => {
            active = (index + slides.length) % slides.length;
            slides.forEach((slide, slideIndex) => slide.classList.toggle('is-active', slideIndex === active));
            dots.forEach((dot, dotIndex) => dot.classList.toggle('is-active', dotIndex === active));
        };
        dots.forEach((dot, index) => dot.addEventListener('click', () => show(index)));
        let timer = window.setInterval(() => show(active + 1), 5600);
        slider.addEventListener('mouseenter', () => window.clearInterval(timer));
        slider.addEventListener('mouseleave', () => { timer = window.setInterval(() => show(active + 1), 5600); });
    });

    const currencyRates = { INR: 83.25, USD: 1, EUR: 0.92, GBP: 0.78, AED: 3.67 };
    const currencyLocale = { INR: 'en-IN', USD: 'en-US', EUR: 'de-DE', GBP: 'en-GB', AED: 'en-AE' };
    const priceNodes = [];
    const priceWalker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT, {
        acceptNode(node) {
            return /(?:₹|\$)\s?[\d,]+(?:\.\d{1,2})?/.test(node.nodeValue)
                ? NodeFilter.FILTER_ACCEPT
                : NodeFilter.FILTER_REJECT;
        },
    });

    let node;
    while ((node = priceWalker.nextNode())) {
        const matches = [...node.nodeValue.matchAll(/(₹|\$)\s?([\d,]+(?:\.\d{1,2})?)/g)];
        if (matches.length) {
            priceNodes.push({
                node,
                template: node.nodeValue,
                values: matches.map((match) => ({
                    token: match[0],
                    usd: Number(match[2].replace(/,/g, '')) / (match[1] === '₹' ? currencyRates.INR : 1),
                })),
            });
        }
    }

    const setCurrency = (currency) => {
        const formatter = new Intl.NumberFormat(currencyLocale[currency], {
            style: 'currency', currency, maximumFractionDigits: currency === 'INR' ? 0 : 2,
        });
        priceNodes.forEach(({ node: priceNode, template, values }) => {
            let output = template;
            values.forEach(({ token, usd }) => { output = output.replace(token, formatter.format(usd * currencyRates[currency])); });
            priceNode.nodeValue = output;
        });
        document.querySelectorAll('[data-currency-select]').forEach((select) => { select.value = currency; });
        localStorage.setItem('Mycart-currency', currency);
    };

    const activeCurrency = localStorage.getItem('Mycart-currency') || 'INR';
    setCurrency(currencyRates[activeCurrency] ? activeCurrency : 'INR');
    document.querySelectorAll('[data-currency-select]').forEach((select) => select.addEventListener('change', (event) => setCurrency(event.target.value)));
});
