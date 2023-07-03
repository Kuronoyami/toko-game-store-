  <!-- Navigation -->
    <nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top shadow border-bottom-primary-navbar"
      data-aos="fade-down"
    >
      <div class="container mb-1">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img
            src="/images/gameku2.png"
            alt=""
            style="width: 200px; margin-top: -40px;
            margin-bottom: -30px; margin-left: -21px;
            padding: 20px;"
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('categories') }}">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Rewards</a>
            </li>

        </div>
      </div>
    </nav>