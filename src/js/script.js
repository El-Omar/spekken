{
  let filterClosed = true;

  const init = () => {
    const $tags = document.querySelectorAll(`.theater__tag__checkbox`);
    $tags.forEach($tag => {
      $tag.addEventListener(`click`, toggleTag);
    });

    const $filterButton = document.querySelector(`.filter-toggle-button`);
    $filterButton.addEventListener(`click`, toggleFilter);

    fetch(`index.php?page=schedule&amp;t=${Date.now()}`, {
      headers: new Headers({Accept: `application/json`})
    })
    .then(r => r.json())
    .then(parse);
  };

  const parse = data => {
    console.log(data);
  };

  const toggleFilter = () => {
    filterClosed = !filterClosed;
    const $filterForm = document.querySelector(`.filter-form`);

    if (filterClosed) {
      $filterForm.classList.add(`hidden`);
      $filterForm.parentNode.classList.add(`closed`);
      $filterForm.parentNode.classList.remove(`opened`);
    } else {
      $filterForm.classList.remove(`hidden`);
      $filterForm.parentNode.classList.remove(`closed`);
      // $filterForm.classList.add(`opened`);
      $filterForm.parentNode.classList.add(`opened`);
    }

  };

  const toggleTag = e => {
    const tar = e.currentTarget;
    if (tar.classList.contains(`theater__tag__alles`) && !tar.checked) {
      console.log(`pressed on everything`);
      tar.parentNode.classList.add(`theater__tag--active`);
      document.querySelectorAll(`.single__tag`).forEach(tag => {
        tag.classList.remvove(`theater__tag--active`);
      });
    }
    if (tar.checked) {
      tar.parentNode.classList.add(`theater__tag--active`);
    } else {
      tar.parentNode.classList.remove(`theater__tag--active`);
    }
  };

  init();
}
