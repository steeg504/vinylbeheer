<div class="sidebar" data-color="azure" data-image="http://www.yeoldewishinshoppe.com/images/vinyl-records2.jpg">

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/" class="simple-text">
                Vinylbeheer
            </a>
        </div>

        <ul class="nav">
            <li {{ (Request::is('home') ? 'class=active' : '') }}>
                <a href="/home">
                    <i class="pe-7s-home"></i>
                    <p>Home</p>
                </a>
            </li>
            <li {{ (Request::is('singles') ? 'class=active' : '') }}>
                <a href="/singles">
                    <i class="pe-7s-disk"></i>
                    <p>Singles</p>
                </a>
            </li>
            <li {{ (Request::is('artists') ? 'class=active' : '') }}>
                <a href="/artists">
                    <i class="pe-7s-users"></i>
                    <p>Artiesten</p>
                </a>
            </li>

        </ul>
    </div>
</div>