
<footer class="footer">
    <div class="container">
        © {{ __('misc.copyright') }}
    </div>
    <div class="footer-section over-ons">
        <h4>Over ons</h4>
        <p>Wij zijn een dynamisch bedrijf dat zich richt op innovatieve oplossingen voor de moderne markt.</p>
    </div>

    <div class="footer-section contact">
        <h4>Contactgegevens</h4>
        <a href="{{ route('contact.index') }}">Contact</a>
        <p>Adres: 1234 Straatnaam, Stad</p>
        <p>Email: info@voorbeeld.com</p>
        <p>Telefoon: +31 123 456 789</p>
    </div>


    <div class="footer-section social">
        <h4>Volg ons</h4>
        <ul class="social-links">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">LinkedIn</a></li>
            <li><a href="#">Instagram</a></li>
        </ul>
    </div>

</footer>


<!-- analytics code -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30506707-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!-- Einde analytics code -->

<script language="Javascript" type="text/javascript">

 if (top.location!= self.location) {
  top.location = self.location.href
 }

</script>
