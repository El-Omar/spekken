<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <title>SPEKKEN - Kindertheaterfestival</title>
  <meta name="author" content="Elomar">
  <meta name="description" content="Spekken website voor kindertheaterfestival">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>
  WebFontConfig = {
    custom: {
      families: [
        'Chewy',
        'OpenSans Regular',
        'OpenSans SemiBold',
        'OpenSans Bold'],
      urls: ['assets/fonts/fonts.css']
    }
  };

  (function() {
    var wf = document.createElement('script');
    wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
    wf.type = 'text/javascript';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();
  </script>
</head>
<body>
  <header class='page__header'>
    <a href="?page=home"><img class="page__logo" src="assets/img/logo.png" alt="Logo" /></a>
    <ul class='page__nav'>
      <li class='page__nav__item'><a class='page__nav__link' href="?page=programma">PROGRAMMA</a></li>
      <li class='page__nav__item'><a class='page__nav__link' href="">PRAKTISCH</a></li>
      <li class='page__nav__item'><a class='page__nav__link' href="">BLOGS</a></li>
    </ul>
  </header>

  <div>
    <?php if(!empty($_SESSION['info'])): ?><div class="alert alert-success"><?php echo $_SESSION['info'];?></div><?php endif; ?>
    <?php if(!empty($_SESSION['error'])): ?><div class="alert alert-danger"><?php echo $_SESSION['error'];?></div><?php endif; ?>

    <?php echo $content; ?>
  </div>

  <footer class='page__footer container container'>
    <ul class="page__footer__nav">
      <li class="page__footer__nav__item"><a href="#" class="page__footer__nav__link">HOME</a></li>
      <li class="page__footer__nav__item"><a href="?page=programma" class="page__footer__nav__link">PROGRAMMA</a></li>
      <li class="page__footer__nav__item"><a href="#" class="page__footer__nav__link">PRAKTISCH</a></li>
      <li class="page__footer__nav__item"><a href="#" class="page__footer__nav__link">BLOGS</a></li>
    </ul>

    <div class="page__footer__newsletter container container--row--wrap">
      <strong class="page__footer__newsletter__title font--opensans-semibold color--white">
        Schrijf in het nieuwsbrief
      </strong>
      <input type="text" placeholder="email..." class="container page__footer__newsletter__email">
      <a href="#" class="button page__footer__newsletter__button">Inschrijven</a>
    </div>

    <div class="social-media container container--column">
      <img src="assets/img/social-media.png" alt="social media" />
      <a class='contact__email' href="mailto:info@spekken.be">info@spekken.be</a>
    </div>
  </footer>

  <?php echo $js;?>
</body>
</html>
