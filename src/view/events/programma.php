<section class='programma'>

  <header class='programma__header bg-title container'>
    <h1 class='size--40 font--chewy color--orange'>Programma</h1>
  </header>

  <div class="programma__main__filter container">
    <div class="toggle__container">
      <aside class='periodes'>
        <header class='periodes__header'>
          <h2 class='periodes__title font--opensans-bold size--24'>Periodes</h2>
        </header>
        <div class=''>
          <a data-id="1" class='periodes__button periodes__button--selected' href="#">Kerstvakantie</a>
          <a data-id="2" class='periodes__button' href="#">Paasvakantie</a>
        </div>
      </aside>
      <a class="filter__toggle filter__toggle--first" href="#">Filter</a>
    </div>

    <aside class='datums'>
      <header class='datums__header'>
        <h2 class='datums__title font--opensans-bold size--24'>Datums</h2>
      </header>

      <a class='datums__button datums__button--selected' href="#">
        <h3 class='font--chewy size--24'>Week 1</h3>
        <p class="week1 container dates font--opensans-bold">
          Maandag 27/12/17 <br />
          t.e.m. <br />
          Vrijdag 31/12/17
        </p>
      </a>

      <a class='datums__button' href="#">
        <h3 class='font--chewy size--24'>Week 2</h3>
        <p class="week2 container dates font--opensans-bold">
          Zaterdag 01/01/18 <br />
          t.e.m. <br />
          Maandag 09/01/18
        </p>
      </a>
    </aside>
    <a class="filter__toggle filter__toggle--second" href="#">Filter</a>
  </div>

  <div class="secondary__filter__wrap secondary__filter__wrap--close container">

    <aside class="theater">
      <header class='theater__header'>
        <h2 class='theater__title font--opensans-bold size--24'>Theater</h2>
      </header>

      <form class="theater__form" action="#" method="post">
        <div class="theater__tag theater__tag__alles">
          <input class='theater__tag__checkbox' type="checkbox" id="alles" name="" value="">
          <label class='label' for="alles">ALLES</label>
        </div>
        <div class="theater__tag single__tag">
          <input class='theater__tag__checkbox' type="checkbox" id="Figuren" name="" value="">
          <label class='label' for="Figuren">Figuren</label>
        </div>
        <div class="theater__tag single__tag">
          <input class='theater__tag__checkbox' type="checkbox" id="Jeugd" name="" value="">
          <label class='label' for="Jeugd">Jeugd</label>
        </div>
        <div class="theater__tag single__tag">
          <input class='theater__tag__checkbox' type="checkbox" id="Kinder" name="" value="">
          <label class='label' for="Kinder">Kinder</label>
        </div>
        <div class="theater__tag single__tag">
          <input class='theater__tag__checkbox' type="checkbox" id="Kleuter" name="" value="">
          <label class='label' for="Kleuter">Kleuter</label>
        </div>
        <div class="theater__tag single__tag">
          <input class='theater__tag__checkbox' type="checkbox" id="Muziek" name="" value="">
          <label class='label' for="Muziek">Muziek</label>
        </div>
        <div class="theater__tag single__tag">
          <input class='theater__tag__checkbox' type="checkbox" id="Circus" name="" value="">
          <label class='label' for="Circus">Circus</label>
        </div>
        <div class="theater__tag single__tag">
          <input class='theater__tag__checkbox' type="checkbox" id="Dans" name="" value="">
          <label class='label' for="Dans">Dans</label>
        </div>

      </form>
    </aside>

    <aside class="leeftijd container container--row--wrap">
      <header class='leeftijd__header'>
        <h2 class='leeftijd__title font--opensans-bold size--24'>Leeftijd</h2>
      </header>
      <a class='leeftijd__button' href="#">2j tot 4j</a>
      <a class='leeftijd__button' href="#">4j tot 8j</a>
      <a class='leeftijd__button' href="#">8j tot 12j</a>
    </aside>

  </div>


    <div class="programma__events container container--row--wrap">
      <?php
      foreach ($events as $event) {
      ?>
        <article class="programma__event">
          <header class="programma__event__header">
            <div class="programma__event__date">
              <strong class="font--opensans-bold color--red">Aankomend</strong>
              <strong class="font--chewy size--24 programma__event__date__day">
                <?php echo date('D d/m', strtotime($event["start"])); ?>
              </strong>
            </div>
            <strong class="programma__event__hour font--opensans-semibold">
              Om <?php echo date('G:i', strtotime($event["start"])); ?>
            </strong>
          </header>

          <div class="programma__event__poster">
            <div class="programma__event__image--wrap">
              <img class="programma__event__image" src="assets/img/example.jpg" alt="Event" />
            </div>
            <a class="programma__event__link" href="?page=details&amp;id=<?php echo $event["id"] ?>">
              <strong class="container programma__event__title"><?php echo $event["title"] ?></strong>
            </a>
          </div>

          <strong class='programma__event__tag color--orange font--opensans-semibold'>
            <?php
            echo $event["start_age"] . " jaar - ";
            if ($event["end_age"] < 99) echo $event["end_age"] ." jaar";
            ?>
          </strong>
        </article>
      <?php } ?>

    </div>


</section>
