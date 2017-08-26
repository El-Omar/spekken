<section class="details">
  <header class="details__header container bg-title">
    <h1 class="details__title font--chewy size--40 color--orange">Programma overzicht</h1>
  </header>

  <?php
  $desc = explode(' ', $event["description"]);
  $firstParagraph = "";
  $secondParagraph = "";

  for ($i = 0; $i < 60; $i++) {
    if (isset($desc[$i]))
    $firstParagraph .= $desc[$i]. " ";
  }

  for ($i = 60; $i < count($desc); $i++) {
    if (isset($desc[$i]))
    $secondParagraph .= $desc[$i]. " ";
  }
?>

  <article class="details__article">

    <div class="details__content__wrap">
      <header class="details__content__header">
        <h2 class="size--30 font--opensans-bold color--blue"><?php echo $event["title"] ?></h2>
      </header>

      <div class="details__image__wrap">
        <img class="details__image" src="assets/img/example.jpg" alt="Example" />
      </div>
      <strong class="font--chewy size--24"><?php echo date('D d/m/Y', strtotime($event["start"])); ?></strong>
      <strong class="font--opensans-bold">
        Om <?php echo date('G:i', strtotime($event["start"])); ?>
      </strong>
    </div>

    <aside class="container container--column details__info">
      <div class="container container--column details__into__text">
        <strong>Theater type</strong>
        <strong class="margin-text size--24 color--red font--chewy">
          <?php
          if (isset($event["tags"])) {
            for ($i = 0; $i < count($event["tags"]); $i++) {
              echo $event["tags"][$i]["tag"] . " / ";
            }
          }
          ?>
        </strong>
        <strong>Leeftijd</strong>
        <strong class="margin-text size--24 color--red font--chewy">
          <?php
          echo $event["start_age"] . " jaar - ";
          if ($event["end_age"] < 99) echo $event["end_age"] ." jaar";
          ?>
        </strong>
        <strong>Zaal</strong>
        <strong class="margin-text size--24 color--red font--chewy">Tinnenpot - Becketzaal</strong>
        <strong>Prijs</strong>
        <strong class="margin-text size--24 color--red font--chewy">10,00 EUR</strong>
      </div>
      <a href="#" class="button tickets__button">Tickets</a>
    </aside>
  </article>

  <div class="details__second container">
    <div class="details__second__text">
      <p class="details__second__paragraph">
        <?php echo $firstParagraph; ?>
      </P>

      <p class="details__second__paragraph">
        <?php echo $secondParagraph; ?>
        <br><br>
        <strong class="font--opensans-semibold size--20 color--red">Deel deze voorstelling</strong>
        <img src="assets/img/social-media.png" alt="social-media" />
      </p>
    </div>

    <img class="details__second__image" src="assets/img/example2.png" alt="Example2" />
  </div>

  <section class='praktisch praktisch--details container'>
    <header class="hidden">
      <h1>Praktisch info</h1>
    </header>

    <article class="tickets tickets--details">

      <header class="tickets__header">
        <h2 class="font--opensans-bold size--30 color--white">In dezelfde week</h2>
      </header>

      <section class="upcoming upcoming--details container container--row">
        <header class="hidden">
          <h1 class='font--chewy size--60 color--orange bg-title container'>Komende events</h1>
        </header>

        <article class="upcoming__event container container--column">
          <strong class='font--opensans-bold size--14 color--red'>#Circus</strong>
          <strong class='upcoming__event__date font--chewy size--24 color--black'>26/12/2017</strong>

          <div class="upcoming__event__poster">
            <header class="container upcoming__event__poster__header">
              <h2 class="font--opensans-semibold size--14 color--white">Waarschijnlijk zullen wij het nooit weten</h2>
            </header>
            <img class='upcoming__event__poster__image' src="assets/img/example.jpg" alt="">
          </div>

        </article>
      </section>

    </article>

    <article class="locaties locaties--details">
      <header class="tickets__header">
        <h2 class="font--opensans-bold size--30 color--black">Kan wel interessant zijn?</h2>
      </header>

      <section class="upcoming upcoming--details container container--row">
        <header class="hidden">
          <h1 class='font--chewy size--60 color--orange bg-title container'>Komende events</h1>
        </header>

        <article class="upcoming__event container container--column">
          <strong class='font--opensans-bold size--14 color--red'>#Circus</strong>
          <strong class='upcoming__event__date font--chewy size--24 color--black'>26/12/2017</strong>

          <div class="upcoming__event__poster">
            <header class="container upcoming__event__poster__header">
              <h2 class="font--opensans-semibold size--14 color--white">Waarschijnlijk zullen wij het nooit weten</h2>
            </header>
            <img class='upcoming__event__poster__image' src="assets/img/example.jpg" alt="">
          </div>

        </article>
      </section>
    </article>
  </section>

  <a class="button margin--bottom" href="?page=programma">Terug naar programma</a>

</section>
