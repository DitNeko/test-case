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
            

           
                    <form action="{{url('/layanan/makanSiang/'.$dataEdit->id)}}" method="POST">
                        @csrf
                        @method('PUT') <!-- Use PUT method for updating -->
                    
                        <div class="container mt-4">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h4 class="mb-0">Edit Makan Siang Gratis</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Schedule Dropdown -->
                                    <input type="hidden" value="pending" name="status">
                                    <div class="mb-3">
                                        <label for="schedule" class="form-label">Schedule</label>
                                        <select name="schedule" id="schedule" class="form-select">
                                            <option value="senin" {{ old('schedule', $dataEdit->schedule) == 'senin' ? 'selected' : '' }}>Senin</option>
                                            <option value="selasa" {{ old('schedule', $dataEdit->schedule) == 'selasa' ? 'selected' : '' }}>Selasa</option>
                                            <option value="rabu" {{ old('schedule', $dataEdit->schedule) == 'rabu' ? 'selected' : '' }}>Rabu</option>
                                            <option value="kamis" {{ old('schedule', $dataEdit->schedule) == 'kamis' ? 'selected' : '' }}>Kamis</option>
                                            <option value="jumat" {{ old('schedule', $dataEdit->schedule) == 'jumat' ? 'selected' : '' }}>Jumat</option>
                                            <option value="sabtu" {{ old('schedule', $dataEdit->schedule) == 'sabtu' ? 'selected' : '' }}>Sabtu</option>
                                        </select>
                                    </div>
                    
                                    <!-- Food Dropdown -->
                                    <div class="mb-3">
                                        <label for="food" class="form-label">Food</label>
                                        <select name="food" id="food" class="form-select">
                                            <option value="ikan bakar" {{ old('food', $dataEdit->food) == 'ikan bakar' ? 'selected' : '' }}>Ikan Bakar</option>
                                            <option value="bakso" {{ old('food', $dataEdit->food) == 'bakso' ? 'selected' : '' }}>Bakso</option>
                                            <option value="gado gado" {{ old('food', $dataEdit->food) == 'gado gado' ? 'selected' : '' }}>Gado Gado</option>
                                            <option value="soto ayam" {{ old('food', $dataEdit->food) == 'soto ayam' ? 'selected' : '' }}>Soto Ayam</option>
                                            <option value="tempe goreng" {{ old('food', $dataEdit->food) == 'tempe goreng' ? 'selected' : '' }}>Tempe Goreng</option>
                                            <option value="ayam goreng" {{ old('food', $dataEdit->food) == 'ayam goreng' ? 'selected' : '' }}>Ayam Goreng</option>
                                            <option value="mie goreng" {{ old('food', $dataEdit->food) == 'mie goreng' ? 'selected' : '' }}>Mie Goreng</option>
                                            <option value="tahu isi" {{ old('food', $dataEdit->food) == 'tahu isi' ? 'selected' : '' }}>Tahu Isi</option>
                                            <option value="ayam panggang" {{ old('food', $dataEdit->food) == 'ayam panggang' ? 'selected' : '' }}>Ayam Panggang</option>
                                            <option value="lontong" {{ old('food', $dataEdit->food) == 'lontong' ? 'selected' : '' }}>Lontong</option>
                                            <option value="tumis kangkung" {{ old('food', $dataEdit->food) == 'tumis kangkung' ? 'selected' : '' }}>Tumis Kangkung</option>
                                        </select>
                                    </div>
                    
                                    <!-- Drink Dropdown -->
                                    <div class="mb-3">
                                        <label for="drink" class="form-label">Drink</label>
                                        <select name="drink" id="drink" class="form-select">
                                            <option value="jus mangga" {{ old('drink', $dataEdit->drink) == 'jus mangga' ? 'selected' : '' }}>Jus Mangga</option>
                                            <option value="jus tomat" {{ old('drink', $dataEdit->drink) == 'jus tomat' ? 'selected' : '' }}>Jus Tomat</option>
                                            <option value="soda" {{ old('drink', $dataEdit->drink) == 'soda' ? 'selected' : '' }}>Soda</option>
                                            <option value="air mineral" {{ old('drink', $dataEdit->drink) == 'air mineral' ? 'selected' : '' }}>Air Mineral</option>
                                        </select>
                                    </div>
                    
                                    <!-- Fruit Dropdown -->
                                    <div class="mb-3">
                                        <label for="fruit" class="form-label">Fruit</label>
                                        <select name="fruit" id="fruit" class="form-select">
                                            <option value="apel" {{ old('fruit', $dataEdit->fruit) == 'apel' ? 'selected' : '' }}>Apel</option>
                                            <option value="pisang" {{ old('fruit', $dataEdit->fruit) == 'pisang' ? 'selected' : '' }}>Pisang</option>
                                            <option value="jeruk" {{ old('fruit', $dataEdit->fruit) == 'jeruk' ? 'selected' : '' }}>Jeruk</option>
                                            <option value="mangga" {{ old('fruit', $dataEdit->fruit) == 'mangga' ? 'selected' : '' }}>Mangga</option>
                                     
                                            <option value="semangka" {{ old('fruit', $dataEdit->fruit) == 'semangka' ? 'selected' : '' }}>Semangka</option>
                                           
                                        </select>
                                    </div>
                    
                                    <!-- Snack Dropdown -->
                                    <div class="mb-3">
                                        <label for="snack" class="form-label">Snack</label>
                                        <select name="snack" id="snack" class="form-select">
                                            <option value="tidak pilih" {{ old('snack', $dataEdit->snack) == 'tidak pilih' ? 'selected' : '' }}>Tidak Pilih</option>
                                            <option value="keripik" {{ old('snack', $dataEdit->snack) == 'keripik' ? 'selected' : '' }}>Keripik</option>
                                            <option value="kue" {{ old('snack', $dataEdit->snack) == 'kue' ? 'selected' : '' }}>Kue</option>
                                            <option value="donat" {{ old('snack', $dataEdit->snack) == 'donat' ? 'selected' : '' }}>Donat</option>
                                            <option value="biskuit" {{ old('snack', $dataEdit->snack) == 'biskuit' ? 'selected' : '' }}>Biskuit</option>
                                            <option value="kacang" {{ old('snack', $dataEdit->snack) == 'kacang' ? 'selected' : '' }}>Kacang</option>
                                        </select>
                                    </div>
                    
                                    <!-- Submit Button -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success">Edit Makan Siang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            
            <!-- JS Script -->
            <script>
                // Script untuk memilih card saat di klik dan mengatur radio button
                document.querySelectorAll('.schedule-card').forEach(card => {
                    card.addEventListener('click', function() {
                        // Pilih radio button yang terhubung dengan card ini
                        const radio = this.querySelector('input[type="radio"]');
                        radio.checked = true; // Centang radio button
                    });
                });
            
                document.querySelectorAll('.food-card').forEach(card => {
                    card.addEventListener('click', function() {
                        const radio = this.querySelector('input[type="radio"]');
                        radio.checked = true;
                    });
                });
            </script>
            
                        
            
                        <!-- Submit Button -->
                        
            
            
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
