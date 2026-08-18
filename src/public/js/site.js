(() => {
  'use strict';

  const root = document.documentElement;
  const header = document.querySelector('[data-site-header]');
  const nav = document.querySelector('[data-site-nav]');
  const toggle = document.querySelector('[data-nav-toggle]');
  const progress = document.querySelector('[data-scroll-progress]');
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  requestAnimationFrame(() => root.classList.add('page-ready'));

  const closeNav = () => {
    if (!nav || !toggle) return;
    nav.classList.remove('is-open');
    toggle.setAttribute('aria-expanded', 'false');
    document.body.classList.remove('nav-open');
  };

  toggle?.addEventListener('click', () => {
    const open = toggle.getAttribute('aria-expanded') !== 'true';
    toggle.setAttribute('aria-expanded', String(open));
    nav?.classList.toggle('is-open', open);
    document.body.classList.toggle('nav-open', open);
  });
  nav?.querySelectorAll('a').forEach(link => link.addEventListener('click', closeNav));
  window.addEventListener('keydown', event => { if (event.key === 'Escape') closeNav(); });

  let scrollTicking = false;
  const updateScroll = () => {
    const y = window.scrollY;
    header?.classList.toggle('is-scrolled', y > 24);
    if (progress) {
      const max = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);
      progress.style.transform = `scaleX(${Math.min(1, y / max)})`;
    }
    if (!reducedMotion) {
      document.documentElement.style.setProperty('--hero-shift', `${Math.min(90, y * .12)}px`);
    }
    scrollTicking = false;
  };
  window.addEventListener('scroll', () => {
    if (!scrollTicking) {
      requestAnimationFrame(updateScroll);
      scrollTicking = true;
    }
  }, { passive: true });
  updateScroll();

  const revealTargets = document.querySelectorAll(
    '.section-heading, .section-lead, .promise-card, .statement__figure, .statement__inner > div, .step, .nationwide-box, .store-map, .store-card, .faq-wrap, .inventory-panel, .final-cta h2, .final-cta p, .final-cta .hero-actions, .is-inner main > *'
  );
  revealTargets.forEach((element, index) => {
    element.dataset.reveal = '';
    element.style.setProperty('--reveal-delay', `${Math.min(index % 4, 3) * 70}ms`);
  });

  if (!reducedMotion && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: .12, rootMargin: '0px 0px -7% 0px' });
    revealTargets.forEach(element => observer.observe(element));
  } else {
    revealTargets.forEach(element => element.classList.add('is-visible'));
  }

  document.querySelectorAll('.promise-card, .inventory-link, .store-card').forEach(card => {
    card.dataset.tilt = '';
    if (reducedMotion) return;
    card.addEventListener('pointermove', event => {
      if (event.pointerType === 'touch') return;
      const rect = card.getBoundingClientRect();
      const x = (event.clientX - rect.left) / rect.width - .5;
      const y = (event.clientY - rect.top) / rect.height - .5;
      card.style.transform = `perspective(800px) rotateX(${-y * 3}deg) rotateY(${x * 4}deg) translateY(-3px)`;
    });
    card.addEventListener('pointerleave', () => { card.style.transform = ''; });
  });

  document.querySelectorAll('[data-accordion-button]').forEach(button => {
    const panel = document.getElementById(button.getAttribute('aria-controls'));
    if (!panel) return;
    const setOpen = open => {
      button.setAttribute('aria-expanded', String(open));
      panel.hidden = !open;
    };
    setOpen(button.getAttribute('aria-expanded') === 'true');
    button.addEventListener('click', () => {
      const open = button.getAttribute('aria-expanded') !== 'true';
      const group = button.closest('[data-accordion]');
      group?.querySelectorAll('[data-accordion-button]').forEach(other => {
        if (other !== button) {
          other.setAttribute('aria-expanded', 'false');
          const otherPanel = document.getElementById(other.getAttribute('aria-controls'));
          if (otherPanel) otherPanel.hidden = true;
        }
      });
      setOpen(open);
    });
  });

  document.querySelectorAll('[data-dismiss]').forEach(button => {
    button.addEventListener('click', () => button.closest('.alert')?.remove());
  });

  document.addEventListener('click', event => {
    const link = event.target.closest('a[href]');
    if (!link || typeof window.gtag !== 'function') return;
    const href = link.href;
    if (href.startsWith('tel:')) window.gtag('event', 'click_to_call', { link_url: href, link_text: link.textContent.trim() });
    else if (href.includes('goo-net.com')) window.gtag('event', 'outbound_inventory_click', { destination: 'goo_net', link_url: href });
    else if (href.includes('carsensor.net')) window.gtag('event', 'outbound_inventory_click', { destination: 'carsensor', link_url: href });
    else if (href.includes('instagram.com') || href.includes('youtube.com')) window.gtag('event', 'social_click', { destination: href.includes('instagram.com') ? 'instagram' : 'youtube', link_url: href });
  });
})();
