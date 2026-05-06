


// resources/js/popup.js
export function closePopupDisc() {
    document.getElementById('popupDisc')?.classList.add('hidden');
}

export function openPopupDisc() {
    document.getElementById('popupDisc')?.classList.remove('hidden');
}

export function closePopupCred() {
    document.getElementById('popupCred')?.classList.add('hidden');
}

export function openPopupCred() {
    document.getElementById('popupCred')?.classList.remove('hidden');
}

document.addEventListener('DOMContentLoaded', () => {
    openPopupDisc();
    document.getElementById('popupDisc')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closePopupDisc();
        }
    });
}); 
    
document.addEventListener('DOMContentLoaded', () => {
    openPopupCred();
        document.getElementById('loginButton')?.addEventListener('click', function(e) {
        closePopupCred();
    });
        document.getElementById('close-disc-btn')?.addEventListener('click', function(e) {
        closePopupCred();
    });
});


