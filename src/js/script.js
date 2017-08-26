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

    const $weeksBtn = document.querySelectorAll(`.periodes__button`);
    $weeksBtn.forEach(btn => {
      btn.addEventListener(`click`, weekClicked);
    });

    const $dates = document.querySelectorAll(`.datums__button`);
    $dates.forEach(btn => {
      btn.addEventListener(`click`, dateClicked);
    });
  };

  const dateClicked = ({currentTarget: tar}) => {
    const $dates = document.querySelectorAll(`.datums__button`);
    $dates.forEach(btn => {
      btn.classList.remove(`datums__button--selected`);
    });
    tar.classList.add(`datums__button--selected`);
  };

  const weekClicked = ({currentTarget: tar}) => {
    const id = parseInt(tar.dataset.id);

    const $weeksBtn = document.querySelectorAll(`.periodes__button`);
    $weeksBtn.forEach(btn => {
      btn.classList.remove(`periodes__button--selected`);
    });

    tar.classList.add(`periodes__button--selected`);

    const $week1 = document.querySelector(`.week1`);
    const $week2 = document.querySelector(`.week2`);

    const kerst1 = `
      Woensdag 27/12/17 <br />
      t.e.m. <br />
      Zaterdag 31/12/17`;

    const kerst2 = `
      Maandag 01/01/18 <br />
      t.e.m. <br />
      Vrijdag 06/01/18`;

    const paas1 = `
      Donderdag 12/04/18 <br />
      t.e.m. <br />
      Zondag 15/04/18 `;

    const paas2 = `
      Maandag 16/04/18  <br />
      t.e.m. <br />
      Vrijdag 20/04/18`;

    if (id === 2) {
      $week1.innerHTML = paas1;
      $week2.innerHTML = paas2;
    } else if (id === 1) {
      $week1.innerHTML = kerst1;
      $week2.innerHTML = kerst2;
    }

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
