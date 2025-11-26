function searchFormInit(searchFormElement) {
  const categorySelect = searchFormElement.querySelector('#news-category');
  if (categorySelect) {
    categorySelect.addEventListener('change', function () {
      this.form.submit();
    });
  }
}

export default searchFormInit;
