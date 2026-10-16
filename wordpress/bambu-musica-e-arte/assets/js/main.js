/**
 * Bambu Música e Arte — interações do tema.
 */
(function () {
	'use strict';

	var root = document.documentElement;
	var body = document.body;
	root.classList.add('js');

	/* Cabeçalho com sombra ao rolar */
	var header = document.querySelector('.site-header');
	function onScroll() {
		if (header) {
			header.classList.toggle('is-scrolled', window.scrollY > 10);
		}
	}
	window.addEventListener('scroll', onScroll, { passive: true });
	onScroll();

	/* Menu mobile */
	var nav = document.getElementById('menu');
	var toggle = document.querySelector('.nav-toggle');
	var closeBtn = document.querySelector('.nav-close');
	var overlay = document.querySelector('.nav-overlay');

	function setMenu(open) {
		if (!nav) { return; }
		nav.classList.toggle('is-open', open);
		body.classList.toggle('nav-open', open);
		if (toggle) { toggle.setAttribute('aria-expanded', open ? 'true' : 'false'); }
		if (overlay) { overlay.hidden = !open; }
		if (open && closeBtn) { closeBtn.focus(); }
	}

	if (toggle) { toggle.addEventListener('click', function () { setMenu(true); }); }
	if (closeBtn) { closeBtn.addEventListener('click', function () { setMenu(false); toggle && toggle.focus(); }); }
	if (overlay) { overlay.addEventListener('click', function () { setMenu(false); }); }
	document.addEventListener('keydown', function (e) {
		if (e.key === 'Escape' && nav && nav.classList.contains('is-open')) { setMenu(false); toggle && toggle.focus(); }
	});

	if (nav) {
		var isMobile = function () { return window.matchMedia('(max-width: 1180px)').matches; };

		nav.querySelectorAll('.menu-item-has-children > a').forEach(function (link) {
			link.addEventListener('click', function (e) {
				if (!isMobile()) { return; }
				var item = link.parentElement;
				if (!item.classList.contains('is-open')) {
					/* 1º toque abre o submenu; o 2º segue o link */
					e.preventDefault();
					e.stopImmediatePropagation();
					item.classList.add('is-open');
				}
			});
		});

		nav.querySelectorAll('a[href*="#"]').forEach(function (link) {
			link.addEventListener('click', function () {
				if (isMobile()) { setMenu(false); }
			});
		});
	}

	/* Banner rotativo */
	var hero = document.querySelector('.hero');
	if (hero) {
		var slides = hero.querySelectorAll('.hero__slide');
		var dots = hero.querySelectorAll('.hero__dot');
		var current = 0;
		var timer = null;
		var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

		var go = function (index) {
			if (!slides.length) { return; }
			current = (index + slides.length) % slides.length;
			slides.forEach(function (s, i) { s.classList.toggle('is-active', i === current); });
			dots.forEach(function (d, i) {
				d.classList.toggle('is-active', i === current);
				d.setAttribute('aria-selected', i === current ? 'true' : 'false');
			});
		};
		var start = function () {
			if (reduced || slides.length < 2) { return; }
			stop();
			timer = window.setInterval(function () { go(current + 1); }, 6500);
		};
		var stop = function () { if (timer) { window.clearInterval(timer); timer = null; } };

		hero.querySelectorAll('.hero__arrow').forEach(function (btn) {
			btn.addEventListener('click', function () { go(current + parseInt(btn.getAttribute('data-dir'), 10)); start(); });
		});
		dots.forEach(function (dot) {
			dot.addEventListener('click', function () { go(parseInt(dot.getAttribute('data-slide'), 10)); start(); });
		});
		hero.addEventListener('mouseenter', stop);
		hero.addEventListener('mouseleave', start);
		hero.addEventListener('focusin', stop);

		/* Arrastar no celular */
		var startX = null;
		hero.addEventListener('touchstart', function (e) { startX = e.touches[0].clientX; }, { passive: true });
		hero.addEventListener('touchend', function (e) {
			if (startX === null) { return; }
			var dx = e.changedTouches[0].clientX - startX;
			if (Math.abs(dx) > 50) { go(current + (dx < 0 ? 1 : -1)); start(); }
			startX = null;
		});

		start();
	}

	/* Animação de entrada */
	var reveals = document.querySelectorAll('.reveal');
	if ('IntersectionObserver' in window) {
		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-visible');
					io.unobserve(entry.target);
				}
			});
		}, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
		reveals.forEach(function (el, i) {
			el.style.transitionDelay = (i % 3) * 0.08 + 's';
			io.observe(el);
		});
	} else {
		reveals.forEach(function (el) { el.classList.add('is-visible'); });
	}

	/* Prévia em HTML: o formulário apenas simula o envio */
	var form = document.querySelector('.contact-form[data-preview="1"]');
	if (form) {
		form.addEventListener('submit', function (e) {
			e.preventDefault();
			var note = document.createElement('div');
			note.className = 'form-notice form-notice--ok';
			note.setAttribute('role', 'status');
			note.textContent = 'Prévia: no site em WordPress esta mensagem será enviada para o e-mail da escola.';
			form.parentNode.insertBefore(note, form);
			form.reset();
		});
	}
})();
