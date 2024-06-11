<x-web-layout title="User Profile">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <div class="slide">
        <div class="banner">
            <img src="{{ asset('assets/images/shop/bg_2.jpg') }}" class="img-responsive bg" alt="banner-top" title="banner-top">
        </div>
        <div class="slide-detail col-lg-6 col-md-9 col-sm-8">
            <div class="col-sm-12">
                <h4>Friendzone Cafe</h4>
                <p>Selamat datang di Coffee Shop kami, tempat yang menyajikan secangkir kebahagiaan dalam setiap tegukan.</p>
                <button type="button" class="btn-primary" onclick="location.href='{{ url('daftarmenu') }}';">Pesan Sekarang</button>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>User Profile</h1>
        <div class="profile-details">
            <div>
                <p>Full Name: {{ $user->namalengkap }}</p>
                <p>Username: {{ $user->username }}</p>
                <p>Email: {{ $user->email }}</p>
                <p>Phone Number: {{ $user->nomorhp }}</p>
                <p>Address: {{ $user->address }}</p>
                <p>City: {{ $user->city }}</p>
                <!-- Tampilkan gambar profil -->
                <img src="{{ ('storage/app/public/profile_images' . $user->profile_image) }}" alt="Profile Image">
                <!-- Form untuk mengunggah atau mengedit gambar profil -->
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Input untuk unggah gambar -->
                    <input type="file" name="profile_image">
                    <!-- Tombol untuk mengirim formulir -->
                    <button type="submit">Update Profile</button>
                </form>
                <!-- Add more profile details here as needed -->
            </div>
        </div>
    </div>
</x-web-layout>
