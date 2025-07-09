// Assign Modal
function openModal(complaintId) {
    const modal = document.getElementById('assignModal');
    document.getElementById('complaintId').value = complaintId;
    modal.classList.add('active');
}

function closeModal() {
    const modal = document.getElementById('assignModal');
    modal.classList.remove('active');
}

document.getElementById('assignForm').addEventListener('submit', (e) => {
    e.preventDefault();
    alert('Engineer assigned!');
    closeModal();
});

// Review Modal
function openReviewModal(complaintId, date, department, remarks) {
    const modal = document.getElementById('reviewModal');
    document.getElementById('complaintIdDisplay').textContent = complaintId;
    document.getElementById('date').textContent = date;
    document.getElementById('dept').textContent = department;
    document.getElementById('remarksDisplay').textContent = remarks;
    modal.classList.add('active');
}

function closeReviewModal() {
    const modal = document.getElementById('reviewModal');
    modal.classList.remove('active');
}

// Close modals when clicking outside
window.addEventListener('click', (event) => {
    const assignModal = document.getElementById('assignModal');
    const reviewModal = document.getElementById('reviewModal');

    if (event.target === assignModal) {
        closeModal();
    }
    if (event.target === reviewModal) {
        closeReviewModal();
    }
});

// Modal close buttons
document.querySelector('#reviewModal .close').addEventListener('click', closeReviewModal);
document.querySelector('#reviewModal .close-btn').addEventListener('click', closeReviewModal);