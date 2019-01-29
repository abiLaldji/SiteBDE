@if(!isset($_COOKIE['isUsingCookies']))
  @include('cookies')
 
@endif

<footer> 

  <div class="footer-ln">
    <div>
      <p><a href="legalNotice" class="navtext">Mentions légales</a></p>
    </div>
    <div class="f-center">
      <p><a href="privacyPolicy" class="navtext">Politique de confidentialité</a></p>
    </div>
    <div>
      <p><a href="terms&conditions" class="navtext">Conditions générales de vente</a></p>
    </div>
  </div>

  <div class="reseau-logo">
    <a href=""><i class="fab fa-twitter"> </i></a>
    <a href=""><i class="fab fa-facebook"> </i></a>
    <a href=""><i class="fab fa-instagram"> </i></a>
    <a href=""><i class="fab fa-linkedin-in"> </i></a>
  </div>
  <div class="contact">
    <i class="fas fa-phone ycolor phone-mini"></i>
    <p><a href="contact" class="navtext">CONTACT</a></p>
  </div>

  <div class="footer-text">
    Site officiel du BDE du centre CESI de Pau. Nous proposons régulièrement des activités afin d'animer la vie au campus, nous vous permettont également de proposer des idées d'activités et de voter pour celles qui sont proposés. Une boutique est également à votre disposition afin d'acquérir différents goudies en rapport avec le CESI, ce qui vous permettra de garder un souvenir de votre scolarité. 
  </div>
  <div class="footer-text">
   © CESI 2019
 </div>

</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../js/autoComplete.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/picturePreview.js') }}"></script>

</body>
</html>