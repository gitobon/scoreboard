document.addEventListener('DOMContentLoaded', ()=> {
  // Navigation highlight
  const navLinks = document.querySelectorAll('nav a');
  navLinks.forEach(a => {
    if (location.pathname.endsWith(a.getAttribute('href')))
      a.classList.add('active');
  });

  // Modal
  const overlay = document.createElement('div');
  overlay.className = 'modal-overlay';
  overlay.innerHTML = `
    <div class="modal">
      <h3 id="modal-title"></h3>
      <button id="modal-ok">OK</button>
    </div>`;
  document.body.appendChild(overlay);
  const modalTitle = overlay.querySelector('#modal-title');
  const modalOk = overlay.querySelector('#modal-ok');
  modalOk.addEventListener('click', ()=>{
    overlay.style.display = 'none';
    // clear all inputs in the last-submitted form
    if (overlay._lastForm) overlay._lastForm.reset();
  });

  // AJAX form handler
  document.querySelectorAll('form.ajax').forEach(form => {
    form.addEventListener('submit', e => {
      e.preventDefault();
      const data = new FormData(form);
      fetch(form.action, {
        method: form.method,
        body: data
      })
      .then(r => r.json())
      .then(json => {
        modalTitle.textContent = json.success 
          ? json.message 
          : 'Error: ' + json.message;
        overlay.style.display = 'flex';
        overlay._lastForm = form;
      })
      .catch(err => {
        modalTitle.textContent = 'Request failed';
        overlay.style.display = 'flex';
      });
    });
  });
});
