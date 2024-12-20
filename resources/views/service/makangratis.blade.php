<x-layouts>
    <style>
        .card {
            cursor: pointer;
            /* Change cursor to pointer */
            border: 1px solid #ccc;
            /* Default card border */
            padding: 10px;
            /* Padding for the card */
            margin: 5px;
            /* Spacing between cards */
        }

        .card.selected {
            border: 2px solid #573d7d;
            /* Highlight selected card */
        }
    </style>
    {{-- header --}}
    <header class="p-3" style="height: 10vh;">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div class="gap-1 d-flex">
                    <button class="border-0" style="background-color: #ffffff;" id="toggleBtn"><i
                            class="fi fi-rr-menu-burger"></i></button>
                    <!-- Logo and Title -->
                    <img src="/images/1720752709883.png" alt="Chlorine Logo" width="50" height="40">
                    <span class="fs-5 fw-bold mb-0 link-body-emphasis text-decoration-none">TrustyBite</span>
                </div>

                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @if ($pic->picture === null)
                            <img src="{{ asset('/storage/DefaultProfile/profile.png') }}" alt="mdo" width="40"
                                height="40" class="rounded-circle">
                        @else
                            <img src="{{ asset('/storage/profile/' . $pic->picture) }}" alt="mdo" width="40"
                                height="40" class="rounded-circle">
                        @endif
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="/profil">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/logout">Log out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    {{-- header end --}}
    <x-sidebar>
        <!-- isi -->
        <table class="table">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/layanan/makanSiang" class="container mt-5" method="POST">
                @csrf
                <h2 class="mb-4">Pengajuan Makan Siang Gratis</h2>
                <input type="hidden" value="pending" name="status">
                <div class="mb-3">
                    <label for="company_name" class="form-label">Nama Perusahaan :</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" required>
                </div>

                <!-- Schedule Selection -->
                <div class="mb-3">
                    <label class="form-label">Hari :</label>
                    <select class="form-select" name="schedule">
                        <option value="senin">Senin</option>
                        <option value="selasa">Selasa</option>
                        <option value="rabu">Rabu</option>
                        <option value="kamis">Kamis</option>
                        <option value="jumat">Jumat</option>
                        <option value="sabtu">Sabtu</option>
                    </select>
                </div>

                <!-- Food Selection as Cards -->
                <div class="mb-3 food-selection">
                    <label class="form-label">Makanan :</label>
                    <div class="d-flex flex-wrap gap-3">
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/52/21/e1/5221e1f6655208ef77af99132d2b7621.jpg"
                                class="card-img-top" alt="Ikan Bakar"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="food" value="ikan bakar" id="food_ikan_bakar"
                                    style="display: none;">
                                <span class="form-label">Ikan Bakar</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/d3/9b/5e/d39b5e96efd26149d0cebbe8ca888007.jpg"
                                class="card-img-top" alt="Bakso"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="food" value="bakso" id="food_bakso"
                                    style="display: none;">
                                <span class="form-label">Bakso</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/e9/b6/5b/e9b65b09e0c7c0e75dd634360abb2a43.jpg"
                                class="card-img-top" alt="Gado-gado"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="food" value="gado gado" id="food_gado_gado"
                                    style="display: none;">
                                <span class="form-label">Gado-gado</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/22/a9/9e/22a99e5cff6ef7fd0c703e0b0ae42f66.jpg"
                                class="card-img-top" alt="Soto Ayam"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="food" value="soto ayam" id="food_soto_ayam"
                                    style="display: none;">
                                <span class="form-label">Soto Ayam</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/736x/4f/7a/0b/4f7a0bcf477aaaa0402a3889210abe34.jpg"
                                class="card-img-top" alt="Tempe Goreng"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="food" value="tempe goreng" id="food_tempe_goreng"
                                    style="display: none;">
                                <span class="form-label">Tempe Goreng</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/43/5d/a1/435da1569add9d31acdec95d26e96a55.jpg"
                                class="card-img-top" alt="Ayam Goreng"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="food" value="ayam goreng" id="food_ayam_goreng"
                                    style="display: none;">
                                <span class="form-label">Ayam Goreng</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/74/e6/66/74e66635b6386750a1153937bbacc3ad.jpg"
                                class="card-img-top" alt="Mie Goreng"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="food" value="mie goreng" id="food_mie_goreng"
                                    style="display: none;">
                                <span class="form-label">Mie Goreng</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/b8/0b/1c/b80b1c482613dcc627bca15f907c247b.jpg"
                                class="card-img-top" alt="Tahu Isi"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="food" value="tahu isi" id="food_tahu_isi"
                                    style="display: none;">
                                <span class="form-label">Tahu Isi</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/e8/55/ce/e855ce822c476f3cdfdfc8045efd112e.jpg"
                                class="card-img-top" alt="Ayam Panggang"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="food" value="ayam panggang" id="food_ayam_panggang"
                                    style="display: none;">
                                <span class="form-label">Ayam Panggang</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/94/e9/b5/94e9b572f20ef6d020dc7d3fb4e91945.jpg"
                                class="card-img-top" alt="Lontong"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="food" value="lontong" id="food_lontong"
                                    style="display: none;">
                                <span class="form-label">Lontong</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/e2/33/70/e23370da5d06c784c091e8c3a56c9171.jpg"
                                class="card-img-top" alt="Tumis Kangkung"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="food" value="tumis kangkung" id="food_tumis_kangkung"
                                    style="display: none;">
                                <span class="form-label">Tumis Kangkung</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Drink Selection as Cards -->
                <div class="mb-3 drink-selection">
                    <label class="form-label">Minuman :</label>
                    <div class="d-flex flex-wrap gap-3">
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/f6/39/ea/f639eaaef2d049dfc8c7a9beba5aaf60.jpg"
                                class="card-img-top" alt="Jus Jeruk"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="drink" value="jus mangga" id="drink_jus_mangga"
                                    style="display: none;">
                                <span class="form-label">Jus Mangga</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/ad/50/43/ad5043ac1679b7c1d1ada0aad80f91fa.jpg"
                                class="card-img-top" alt="Air Mineral"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="drink" value="air mineral" id="drink_air_mineral"
                                    style="display: none;">
                                <span class="form-label">Air Mineral</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/17/d1/5b/17d15b915e16e379aaad240afddbf970.jpg"
                                class="card-img-top" alt="Soda"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="drink" value="soda" id="drink_soda"
                                    style="display: none;">
                                <span class="form-label">Soda</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/fb/38/c8/fb38c8b148ee964cf76a2691a1370ab0.jpg"
                                class="card-img-top" alt="Jus tomat"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="drink" value="jus tomat" id="drink_jus_tomat"
                                    style="display: none;">
                                <span class="form-label">Jus Tomat</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Fruit Selection as Cards -->
                <div class="mb-3 fruit-selection">
                    <label class="form-label">Buah :</label>
                    <div class="d-flex flex-wrap gap-3">
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/ae/12/26/ae122610bb04101f0bef27573ca79905.jpg"
                                class="card-img-top" alt="Apel"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="fruit" value="apel" id="fruit_apel"
                                    style="display: none;">
                                <span class="form-label">Apel</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/8a/e2/71/8ae2712fa5f58bf7e88576d0088c9271.jpg"
                                class="card-img-top" alt="Jeruk"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="fruit" value="jeruk" id="fruit_jeruk"
                                    style="display: none;">
                                <span class="form-label">Jeruk</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/33/66/64/336664c475263c1340cb572199ca7906.jpg"
                                class="card-img-top" alt="Mangga"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="fruit" value="mangga" id="fruit_mangga"
                                    style="display: none;">
                                <span class="form-label">Mangga</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/18/b4/5c/18b45c115bda813bb2a5001910c40960.jpg"
                                class="card-img-top" alt="Pisang"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="fruit" value="pisang" id="fruit_pisang"
                                    style="display: none;">
                                <span class="form-label">Pisang</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/474x/84/7b/e1/847be11cca317fb78513bb9c5662a5da.jpg"
                                class="card-img-top" alt="Pisang"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="fruit" value="semangka" id="fruit_semangka"
                                    style="display: none;">
                                <span class="form-label">Semangka</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Snack Selection as Cards -->
                <div class="mb-3 snack-selection">
                    <label class="form-label">Snack :</label>
                    <div class="d-flex flex-wrap gap-3">
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/474x/ea/00/92/ea00922fd012f8de2a01859ae6fc1fcb.jpg"
                                class="card-img-top" alt="Keripik"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="snack" value="keripik" id="snack_keripik"
                                    style="display: none;">
                                <span class="form-label">Keripik</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/4e/4e/76/4e4e7602ac6766de3bb279c26803bc27.jpg"
                                class="card-img-top" alt="Kue"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="snack" value="kue" id="snack_kue"
                                    style="display: none;">
                                <span class="form-label">Kue</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/23/5e/4f/235e4f1f36f3f3c91c50f92386202877.jpg"
                                class="card-img-top" alt="donat"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="snack" value="donat" id="snack_donat"
                                    style="display: none;">
                                <span class="form-label">donat</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/e8/68/d2/e868d2ae3f7b0cfe5a1b44c60bc21c1d.jpg"
                                class="card-img-top" alt="kacang"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="snack" value="kacang" id="snack_kacang"
                                    style="display: none;">
                                <span class="form-label">Kacang</span>
                            </div>
                        </label>
                        <label class="card" style="width: 10rem;">
                            <img src="https://i.pinimg.com/236x/cd/26/68/cd26689c1704c7e06985e4be63c384b0.jpg"
                                class="card-img-top" alt="biskuit"
                                style="max-width: 100%; max-height: 130px; object-fit: cover;">
                            <div class="card-body text-center">
                                <input type="radio" name="snack" value="biskuit" id="snack_biskuit"
                                    style="display: none;">
                                <span class="form-label">Biskuit</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>


        </table>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const drinkCards = document.querySelectorAll('input[name="drink"]');
                const foodCards = document.querySelectorAll('input[name="food"]');
                const fruitCards = document.querySelectorAll('input[name="fruit"]');
                const snackCards = document.querySelectorAll('input[name="snack"]');

                function handleCardClick(event) {
                    const selectedCard = event.currentTarget;
                    const radioInput = selectedCard.querySelector('input[type="radio"]');

                    // Unselect all cards
                    const allCards = selectedCard.closest('.d-flex').querySelectorAll('.card');
                    allCards.forEach(card => {
                        card.classList.remove('selected');
                    });

                    // Select the clicked card
                    selectedCard.classList.add('selected');

                    // Check the radio button
                    if (radioInput) {
                        radioInput.checked = true;
                    }
                }

                // Add click event listeners to drink, fruit, and snack cards
                drinkCards.forEach(card => {
                    card.closest('.card').addEventListener('click', handleCardClick);
                });
                foodCards.forEach(card => {
                    card.closest('.card').addEventListener('click', handleCardClick);
                });
                fruitCards.forEach(card => {
                    card.closest('.card').addEventListener('click', handleCardClick);
                });
                snackCards.forEach(card => {
                    card.closest('.card').addEventListener('click', handleCardClick);
                });
            });
        </script>
        <!-- isi end -->
    </x-sidebar>

    {{-- js --}}
    <script>
        const sidebar = document.getElementById("collapsedSidebar");
        const toggleBtn = document.getElementById("toggleBtn");
        const mainDashboard = document.getElementById("mainDashboard");

        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            mainDashboard.classList.toggle("shifted");
        });
    </script>
</x-layouts>
