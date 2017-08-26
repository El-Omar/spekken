{

  const init = () => {
    const $tags = document.querySelectorAll(`.theater__tag__checkbox`);
    $tags.forEach($tag => {
      $tag.addEventListener(`click`, toggleTag);
    });

    const $filterToggleBtn = document.querySelectorAll(`.filter__toggle`);
    $filterToggleBtn.forEach(btn => {
      btn.addEventListener(`click`, toggleFilter);
    });
  };

  const toggleFilter = ({currentTarget: tar}) => {
    const $filter = document.querySelector(`.secondary__filter__wrap`);

    if (tar.classList.contains(`filter__toggle--active`)) {

      tar.classList.remove(`filter__toggle--active`);
      $filter.classList.add(`secondary__filter__wrap--close`);
      $filter.classList.remove(`secondary__filter__wrap--open`);

    } else {

      tar.classList.add(`filter__toggle--active`);
      $filter.classList.add(`secondary__filter__wrap--open`);
      $filter.classList.remove(`secondary__filter__wrap--close`);
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
