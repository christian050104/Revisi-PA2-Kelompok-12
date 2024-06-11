<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{ asset('assets/images/oke.jpg') }}" class="header-brand-img light-logo" alt="logo">
            </a>
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg>
            </div>
            <ul class="side-menu">
                <li>
                    <h3>Menu</h3>
                </li>
                @auth
                    @php
                        $role = '';
                        $dashboard = '';
                        if (Auth::User()->role == 'staff') {
                            $dashboard = route('staff.dashboard');
                        } else {
                            $dashboard = route('admin.dashboard');
                        }
                    @endphp
                @endauth
                <li class="slide">
                    <!-- Membuat link dashboard yang menyesuaikan peran pengguna -->
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ $dashboard }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path d="M19.9794922,7.9521484l-6-5.2666016c-1.1339111-0.9902344-2.8250732-0.9902344-3.9589844,0l-6,5.2666016C3.3717041,8.5219116,2.9998169,9.3435669,3,10.2069702V19c0.0018311,1.6561279,1.3438721,2.9981689,3,3h2.5h7c0.0001831,0,0.0003662,0,0.0006104,0H18c1.6561279-0.0018311,2.9981689-1.3438721,3-3v-8.7930298C21.0001831,9.3435669,20.6282959,8.5219116,19.9794922,7.9521484z M15,21H9v-6c0.0014038-1.1040039,0.8959961-1.9985962,2-2h2c1.1040039,0.0014038,1.9985962,0.8959961,2,2V21z M20,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2h-2v-6c-0.0018311-1.6561279-1.3438721-2.9981689-3-3h-2c-1.6561279,0.0018311-2.9981689,1.3438721-3,3v6H6c-1.1040039-0.0014038-1.9985962-0.8959961-2-2v-8.7930298C3.9997559,9.6313477,4.2478027,9.0836182,4.6806641,8.7041016l6-5.2666016C11.0455933,3.1174927,11.5146484,2.9414673,12,2.9423828c0.4853516-0.0009155,0.9544067,0.1751099,1.3193359,0.4951172l6,5.2665405C19.7521973,9.0835571,20.0002441,9.6313477,20,10.2069702V19z" />
                        </svg>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                @can('Admin')
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ url('/admin/food') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.875-13.125c-.838-.838-2.075-.975-3.047-.41L7 8.422V16h10V8.422l-2.828-2.953c-.97-.565-2.209-.429-3.297.297zm-2.109 1.484L12 7.266l2.234-2.234 1.578 1.578L13.578 9.422 15 10.828l-3 3-3-3 1.422-1.406-1.406-1.422z"/>
                        </svg>
                        <span class="side-menu__label">Product</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ url('/admin/ruangan') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path d="M14 12h3v8h-3zM17 4h-2V2H9v2H7c-1.105 0-2 .896-2 2v16c0 1.104.895 2 2 2h10c1.105 0 2-.896 2-2V6c0-1.104-.895-2-2-2zm-1 18h-4v-4h4zm0-6h-4V8h4zm-6 0H8v-4h2zm0-6H8V6h2z"/>
                        </svg>
                        <span class="side-menu__label">Meja</span>
                    </a>
                </li>
                
                {{-- <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ url('/admin/historyorder') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path d="M16 4V3H8v1H5c-1.105 0-2 .896-2 2v12c0 1.104.895 2 2 2h14c1.105 0 2-.896 2-2V6c0-1.104-.895-2-2-2h-3V4h-2zM9 15V9h2v6H9zm4 0V9h2v6h-2zm4 0V9h2v6h-2z"/>
                        </svg>
                        <span class="side-menu__label">Pembayaran</span>
                    </a>
                </li>
                
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ url('/admin/history') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path d="M16 4V3H8v1H5c-1.105 0-2 .896-2 2v12c0 1.104.895 2 2 2h14c1.105 0 2-.896 2-2V6c0-1.104-.895-2-2-2h-3V4h-2zM9 15V9h2v6H9zm4 0V9h2v6h-2zm4 0V9h2v6h-2z"/>
                        </svg>
                        <span class="side-menu__label">Booking</span>
                    </a>
                </li>
                
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ url('/admin/kritik') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-1 12H6l-2 2V4h16v10z"/>
                        </svg>
                        <span class="side-menu__label">Kritik & Saran</span>
                    </a>
                </li> --}}
                
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ url('/admin/pengumuman') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path d="M20 3c-2.37 0-4.51 1.1-5.95 2.84-1.28-1.23-2.99-2.17-4.95-2.26C8.43 3.26 6.81 4.24 5.52 5.57 4.27 6.9 3.61 8.54 3.61 10.37c0 .62.08 1.22.22 1.81C2.27 12.87 2 13.59 2 14.35c0 3.53 2.69 6.44 6.08 6.92V21h3.9v-2.73c3.39-.48 6.08-3.39 6.08-6.92 0-.76-.27-1.48-.83-2.17.14-.59.22-1.19.22-1.81 0-1.83-.66-3.47-1.9-4.8C19.19 4.1 17.06 3 14.64 3c-.26 0-.52.01-.78.03-.18-.34-.42-.64-.7-.9.36-.1.73-.15 1.11-.15 2.98 0 5.42 2.45 5.42 5.47 0 .48-.06.94-.18 1.39.68.44 1.15 1.17 1.27 1.99.32.12.61.33.86.6.24.28.43.61.55.98.21-.15.39-.34.54-.55.27-.31.49-.65.65-1.01.41-.75.63-1.57.63-2.42 0-2.03-1.45-3.74-3.38-4.1-.22-.59-.53-1.13-.92-1.59z"/>
                        </svg>
                        <span class="side-menu__label">Pengumuman</span>
                    </a>
                </li>
                
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ url('/admin/gallery') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path d="M12 5c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 7c-1.11 0-2-.89-2-2s.89-2 2-2 2 .89 2 2-.89 2-2 2zm8-7h-3.5l-1-1h-5l-1 1H4c-1.1 0-1.99.9-1.99 2L2 17c0 1.1.89 2 1.99 2h16.02C21.99 19 23 18.1 23 17V5c0-1.1-.89-2-2-2zm0 14H4V7h2l1-1h8l1 1h2v9z"/>
                        </svg>
                        <span class="side-menu__label">Gallery</span>
                    </a>
                </li>
                
                @elsecan('Staff')
                    <li class="slide">
                        <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ url('/staff/historyproduk') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M12 2c-5.523 0-10 4.477-10 10s4.477 10 10 10 10-4.477 10-10-4.477-10-10-10zm-5 8h10v2h-10zm0 4h6v2h-6zm7.114-5.646l-.707.707 1.293 1.293-1.293 1.293.707.707 1.293-1.293 1.293 1.293.707-.707-1.293-1.293 1.293-1.293-.707-.707-1.293 1.293-1.293-1.293z"/>
                            </svg>                            
                            <span class="side-menu__label">Pembayaran</span>
                        </a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ url('/staff/historymeja') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                <path d="M20 5.012h-6v-2.012h6c.553 0 1 .448 1 1v14c0 .552-.447 1-1 1h-6v-2.012h6v-2.009h-3c-.553 0-1-.447-1-1v-5c0-.553.447-1 1-1h3v-2.979zm-7.071 12.859c1.192 1.195 3.128 1.195 4.321 0 1.195-1.191 1.195-3.127 0-4.318-1.193-1.195-3.129-1.195-4.321 0-1.191 1.191-1.191 3.127 0 4.318zm2.071-10.859h-8v2.979h8v-2.979z"/>
                            </svg>                            
                            <span class="side-menu__label">Booking</span>
                        </a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ url('/staff/kritik') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                <path d="M12 1C5.935 1 1 5.935 1 12c0 6.064 4.935 11 11 11s11-4.936 11-11c0-6.065-4.935-11-11-11zm-2 17h4v-2h-4v2zm0-4h4v-6h-4v6zm2-9a1.5 1.5 0 11-.001-2.999A1.5 1.5 0 0112 5zm0 12a1 1 0 110-2 1 1 0 010 2z"/>
                            </svg>                            
                            <span class="side-menu__label">Kritik & Saran</span>
                        </a>
                    </li>
                @endcan
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
</div>
