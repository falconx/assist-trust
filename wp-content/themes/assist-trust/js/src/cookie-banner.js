const bannerEl = document.getElementById('cookie-banner');
const updatePreferencesEl = document.getElementById('update-preferences');
const acceptCookiesEl = document.getElementById('cookies-accept');

const setGACookies = (gaCookiesAccepted) => {
  localStorage.setItem('tracking', JSON.stringify({
    gaCookiesAccepted,
    trackingStateChosen: true,
  }));

  window.location.reload();
};

document.addEventListener('DOMContentLoaded', () => {
  const tracking = JSON.parse(localStorage.getItem('tracking') || '{}');
  const trackingStateChosen = !!tracking.trackingStateChosen;

  if (!trackingStateChosen) {
    bannerEl.style.display = 'block';
  }

  const el = document.querySelector(`[name="ga-accept-cookies"][value="${tracking.gaCookiesAccepted}"]`);
  if (trackingStateChosen && el) {
    el.checked = true;
  }
});

if (acceptCookiesEl) {
  acceptCookiesEl.addEventListener('click', () => {
    setGACookies(true);
  });
}

if (updatePreferencesEl) {
  updatePreferencesEl.addEventListener('click', () => {
    const gaCookiesAccepted = document.querySelector('[name="ga-accept-cookies"]:checked').value === 'true';
    setGACookies(gaCookiesAccepted);
  });
}
