document.addEventListener('DOMContentLoaded', () => {
  let loadedCount = 0;

  const maybeDispatchLoaded = () => {
    if (loadedCount >= 2) {
      document.dispatchEvent(new Event('partials:loaded'));
    }
  };

  const insertPartial = (selector, url) => {
    const el = document.querySelector(selector);
    if (!el) return maybeDispatchLoaded();
    fetch(url, { cache: 'no-cache' })
      .then(r => r.text())
      .then(html => {
        el.innerHTML = html;
        loadedCount += 1;
        maybeDispatchLoaded();
      })
      .catch(() => {
        loadedCount += 1;
        maybeDispatchLoaded();
      });
  };

  insertPartial('#site-header', '/partials/header.html');
  insertPartial('#site-footer', '/partials/footer.html');
});


