<!-- NEW MODERN NAVBAR DESIGN -->
<nav class="main-navbar-modern">
    <div class="navbar-brand-modern">
        <a href="/">
            <img id="mainLogo" src="/wp-content/uploads/dark-logo.png" alt="Logo">
        </a>
    </div>
    <input type="checkbox" id="menu-toggle-modern" class="menu-toggle-modern" />
    <label for="menu-toggle-modern" class="menu-icon-modern">
        <span></span>
        <span></span>
        <span></span>
    </label>
    <ul class="nav-links-modern">
        <li><a href="/about-us">ABOUT US</a></li>
        <li class="dropdown-modern">
            <input type="checkbox" id="services-toggle" class="dropdown-toggle-modern" />
            <label for="services-toggle">SERVICES <span class="arrow">▼</span></label>
            <ul class="dropdown-menu-modern">
                @foreach ($servicecategory as $category)
                    <li><a href="{{ route('servicess.details', ['id' => $category->id]) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="dropdown-modern">
            <label class="dropdown-toggle">PROJECTS <span class="arrow">▼</span></label>
            <ul class="dropdown-menu-modern">
                @foreach ($servicecategory as $service)
                    @if($service->projectCategories->count())
                        <li class="nested-dropdown-modern">
                            <a class="nested-link">
                                {{ $service->name }} <span class="arrow">▶</span>
                            </a>
                            <ul class="nested-submenu-modern">
                                @foreach ($service->projectCategories as $projectCategory)
                                    <li>
                                        <a href="{{ route('project.details', ['id' => $projectCategory->id]) }}">{{ $projectCategory->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
        </li>
        <li><a href="/careers">CAREERS</a></li>
        <li><a href="/contact-us">CONTACT</a></li>
    </ul>
</nav>

<style>
/* Core Layout */
.main-navbar-modern {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: transparent;
    padding: 0 20px;
    position: relative;
    z-index: 100;
    backdrop-filter: blur(8px);
    font-family: Arial, sans-serif;
}

.navbar-brand-modern img {
    height: 52px;
    transition: all 0.3s ease;
}

.menu-toggle-modern {
    display: none;
}

.menu-icon-modern {
    display: none;
    flex-direction: column;
    cursor: pointer;
    width: 28px;
    height: 28px;
    justify-content: center;
    align-items: center;
}

.menu-icon-modern span {
    height: 3px;
    width: 100%;
    background: #d32f2f;
    margin: 3px 0;
    border-radius: 2px;
    display: block;
}

/* Nav Links */
.nav-links-modern {
    display: flex;
    align-items: center;
    gap: 14px;
    list-style: none;
    margin: 0;
    padding: 0;
}

.nav-links-modern li {
    position: relative;
}

.nav-links-modern>li>a,
.nav-links-modern>li>label {
    display: block;
    padding: 14px 12px;
    color: #222;
    font-size: 13px;
    font-weight: 400;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.2s, color 0.2s;
    cursor: pointer;
}

.nav-links-modern>li>a:hover,
.nav-links-modern>li>label:hover {
    background: #f5f5f5;
    color: #d32f2f;
}

/* Dropdown */
.dropdown-modern .arrow {
    font-size: 0.75em;
    margin-left: 4px;
}

.dropdown-toggle-modern {
    display: none;
}

.dropdown-menu-modern {
    display: none;
    position: absolute;
    left: 0;
    top: 100%;
    min-width: 180px;
    background: #fff;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    border-radius: 6px;
    padding: 8px 0;
    z-index: 10;
}

.dropdown-menu-modern li a {
    display: block;
    padding: 10px 16px;
    font-size: 13px;
    font-weight: 400;
    color: #222;
    border-radius: 5px;
}

.dropdown-menu-modern li a:hover {
    background: #ffeaea;
    color: #d32f2f;
}

.dropdown-modern:hover .dropdown-menu-modern,
.dropdown-toggle-modern:checked ~ .dropdown-menu-modern {
    display: block;
}

/* Nested Submenu */
.nested-dropdown-modern {
    position: relative;
}

.nested-link {
    padding: 8px 14px;
    font-size: 13px;
    display: flex;
    justify-content: space-between;
    color: #333;
    cursor: pointer;
}

.nested-submenu-modern {
    display: none;
    position: absolute;
    left: 100%;
    top: 0;
    background: #fff;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    min-width: 160px;
    padding: 8px 0;
    border-radius: 6px;
}

.nested-dropdown-modern:hover > .nested-submenu-modern {
    display: block;
}

.nested-submenu-modern a {
    padding: 8px 14px;
    display: block;
    font-size: 13px;
    color: #333;
}

.nested-submenu-modern a:hover {
    background: #f5f5f5;
    color: #d32f2f;
}

/* Mobile Styles */
@media (max-width: 991px) {
    .menu-icon-modern {
        display: flex;
        margin: 0 12px 0 auto;
    }

    .nav-links-modern {
        flex-direction: column;
        position: absolute;
        width: 100%;
        left: 0;
        top: 100%;
        background: #fff;
        display: none;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    .menu-toggle-modern:checked ~ .nav-links-modern {
        display: flex;
    }

    .nav-links-modern>li>a,
    .nav-links-modern>li>label {
        width: 100%;
        padding: 12px 18px;
        font-size: 14px;
    }

    .dropdown-menu-modern {
        position: static;
        box-shadow: none;
        background: #f9f9f9;
    }

    .dropdown-menu-modern li a {
        padding: 12px 20px;
        font-size: 13px;
    }

    .nested-submenu-modern {
        position: static;
        background: #f0f0f0;
    }

    .nested-submenu-modern a {
        padding: 10px 20px;
    }
}

@media (max-width: 600px) {
    .navbar-brand-modern img {
        height: 40px;
    }

    .nav-links-modern>li>a,
    .nav-links-modern>li>label {
        padding: 10px 16px;
        font-size: 12px;
    }

    .dropdown-menu-modern li a,
    .nested-submenu-modern a {
        font-size: 12px;
    }
}
</style>
