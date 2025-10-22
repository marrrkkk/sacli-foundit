import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Lightweight skeleton overlay controller
document.addEventListener('DOMContentLoaded', () => {
  const overlay = document.getElementById('page-skeleton-overlay');
  if (!overlay) return;

  const show = () => overlay.classList.remove('hidden');
  const hide = () => overlay.classList.add('hidden');

  // Show on navigation clicks within the app
  document.body.addEventListener('click', (e) => {
    const link = e.target.closest('a');
    if (!link) return;
    const url = new URL(link.href, window.location.origin);
    if (url.origin !== window.location.origin) return;
    if (link.hasAttribute('download') || link.target === '_blank') return;
    if (link.getAttribute('href')?.startsWith('#')) return;
    show();
  }, { capture: true });

  // Show on form submits
  document.body.addEventListener('submit', () => show(), { capture: true });

  // Hide after page load completes
  window.addEventListener('pageshow', () => hide());
});
