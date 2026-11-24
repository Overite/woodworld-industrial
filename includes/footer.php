<?php /** @var array $cfg */ ?>
<footer class="site-footer py-4">
  <div class="container d-flex flex-wrap justify-content-between gap-2 small">
    <span><?= e($cfg['name']) ?> &middot; <?= e($cfg['area']) ?></span>
    <span>&copy; <?= date('Y') ?> All rights reserved</span>
  </div>
</footer>

<a class="wa-float" href="https://wa.me/<?= e($cfg['phone_intl']) ?>?text=<?= rawurlencode('Hello Joseph, I found your website and would like to talk about some furniture.') ?>" target="_blank" rel="noopener" aria-label="Message on WhatsApp">
  <svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2zm0 18.2a8.2 8.2 0 0 1-4.2-1.2l-.3-.2-3 .8.8-2.9-.2-.3A8.2 8.2 0 1 1 12 20.2zm4.5-6.1c-.2-.1-1.5-.7-1.7-.8s-.4-.1-.6.1l-.8 1c-.1.2-.3.2-.5.1a6.7 6.7 0 0 1-3.3-2.9c-.2-.4.2-.4.7-1.3.1-.1 0-.3 0-.4l-.8-1.8c-.2-.5-.4-.4-.6-.4h-.5a1 1 0 0 0-.7.3 3 3 0 0 0-.9 2.2c0 1.3.9 2.5 1 2.7s1.8 2.8 4.4 3.9c1.6.7 2.3.8 3.1.6.5-.1 1.5-.6 1.7-1.2s.2-1.1.2-1.2-.2-.2-.4-.3z"/></svg>
</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="importmap">
{
  "imports": {
    "three": "https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.module.js",
    "three/addons/": "https://cdn.jsdelivr.net/npm/three@0.160.0/examples/jsm/"
  }
}
</script>
<script src="assets/js/main.js" defer></script>
<script type="module" src="assets/js/scene.js"></script>
</body>
</html>
