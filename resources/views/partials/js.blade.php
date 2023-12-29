<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="{{asset('calm/js/vendors.js')}}"></script>
<script src="{{asset('calm/js/main.js')}}"></script>
<script src="{{asset('calm/js/click.js')}}"></script>
@include('scripts.landscape')
@include('scripts.track')
@include('scripts.register')
@include('scripts.test-result')
@include('scripts.quiz')
@include('scripts.index')
@include('scripts.aimchange')
<script type="text/javascript">

var navItems = document.querySelectorAll(".mobile-bottom-nav__item");
navItems.forEach(function(e, i) {
	e.addEventListener("click", function(e) {
		navItems.forEach(function(e2, i2) {
			e2.classList.remove("mobile-bottom-nav__item--active");
		})
		this.classList.add("mobile-bottom-nav__item--active");
	});
});

    document.addEventListener('DOMContentLoaded', function () {
        var menuBtn = document.getElementById('menu_btn');
        var dashboard = document.querySelector('.dashboard');
        var closeButton = document.getElementById('close_btn');
        menuBtn.addEventListener('click', function () {
            // Click hodisasida ishlatiladigan funktsiya
            // menuBtn.classList.toggle('clicked');
            dashboard.classList.toggle('-is-sidebar-hidden');
        });
        closeButton.addEventListener('click', function () {
            // Close button bosganda sidebarni yopish
            dashboard.classList.add('-is-sidebar-hidden');
        });
    });
</script>
<script>
    // JavaScript orqali sahifani yangilash
    document.getElementById('question').addEventListener('click', function() {
        location.reload();
    });
    // document.getElementById('listResutGroup')classList = null;
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var volumeInput = document.getElementById('volume_audio');
        var audioPlayer = document.getElementById('audio-player');

        // Input o'zgarganda
        volumeInput.addEventListener('input', function() {
            var volumeValue = volumeInput.value / 100;
            audioPlayer.volume = volumeValue;
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var volumeInput = document.getElementById('volume_audio');
        var audioPlayer = document.getElementById('audio-player-1');

        // Input o'zgarganda
        volumeInput.addEventListener('input', function() {
            var volumeValue = volumeInput.value / 100;
            audioPlayer.volume = volumeValue;
        });
    });
</script>

