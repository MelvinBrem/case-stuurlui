function initDropdown(dropdownElement) {
  dropdownTitle = dropdownElement.querySelector('.dropdown__title');

  dropdownElement.addEventListener('click', function () {
    this.setAttribute('data-dropdown-open', this.getAttribute('data-dropdown-open') === 'false' ? 'true' : 'false');
  });
}

export default initDropdown;
