// JavaScript
const activeFilters = {
  status: [],
  category: [],
  location: []
};

function toggleFilterPanel() {
  const panel = document.getElementById('filterPanel');
  panel.style.display = panel.style.display === 'block' ? 'none' : 'block';
}

function addFilter(type, value) {
  if (value && !activeFilters[type].includes(value)) {
    activeFilters[type].push(value);
    renderActiveFilters();
    updateCounter();
  }
  document.getElementById(`${type}Filter`).value = '';
}

function removeFilter(type, value) {
  activeFilters[type] = activeFilters[type].filter(v => v !== value);
  renderActiveFilters();
  updateCounter();
}

function resetFilters() {
  for (const type in activeFilters) {
    activeFilters[type] = [];
  }
  renderActiveFilters();
  updateCounter();
}

function applyFilters() {
  console.log("Applying filters:", activeFilters);
  toggleFilterPanel();
  // Implement your table filtering here
}

function renderActiveFilters() {
  const container = document.getElementById('activeFilters');
  container.innerHTML = '';
  
  let hasFilters = false;
  
  for (const type in activeFilters) {
    activeFilters[type].forEach(value => {
      hasFilters = true;
      const badge = document.createElement('div');
      badge.className = 'filter-badge';
      badge.innerHTML = `
        ${getLabel(type, value)}
        <span class="remove" onclick="removeFilter('${type}', '${value}')">×</span>
      `;
      container.appendChild(badge);
    });
  }
  
  if (!hasFilters) {
    container.innerHTML = '<span style="color:#95a5a6;font-size:13px;">No filters applied</span>';
  }
}

function updateCounter() {
  const count = Object.values(activeFilters).flat().length;
  document.getElementById('filterCounter').textContent = count;
}

function getLabel(type, value) {
  const labels = {
    status: {
      active: 'Active',
      resolved: 'Resolved',
      pending: 'Pending'
    },
    category: {
      it: 'IT',
      hardware: 'Hardware',
      networking: 'Networking'
    },
    location: {
      lab1: 'Lab 1',
      lab2: 'Lab 2',
      office: 'Office'
    }
  };
  return labels[type][value] || value;
}

// Close panel when clicking outside
document.addEventListener('click', (e) => {
  const panel = document.getElementById('filterPanel');
  const btn = document.querySelector('.filter-toggle-btn');
  if (panel.style.display === 'block' && !panel.contains(e.target) && !btn.contains(e.target)) {
    panel.style.display = 'none';
  }
});

// Initialize
document.addEventListener('DOMContentLoaded', () => {
  renderActiveFilters();
  updateCounter();
});