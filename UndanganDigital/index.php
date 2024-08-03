<?php
include('koneksi.php');
session_start();

$id_pengantin = $_GET['id_pengantin'];
$query = "SELECT * FROM pengantin 
JOIN mempelaipria ON pengantin.id_mempelaipria = mempelaipria.id_mempelaipria 
JOIN mempelaiwanita ON pengantin.id_mempelaiwanita = mempelaiwanita.id_mempelaiwanita 
JOIN acara ON pengantin.id_acara = acara.id_acara 
JOIN cerita ON pengantin.id_cerita = cerita.id_cerita 
WHERE pengantin.id_pengantin = '$id_pengantin'";
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    // Gunakan $data untuk mengakses nilai-nilai yang ingin ditampilkan
} else {
    echo "Data tidak ditemukan.";
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Undangan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Work+Sans:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <!-- simply countdown -->
    <link rel="stylesheet" href="countdown/simplyCountdown.theme.default.css"/>
    <script src="countdown/simplyCountdown.min.js"></script>

    <!-- boostrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <section id="hero" class="hero w-100 h-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-white">
        <main>
            <h4>Kepada <span></span>,</h4>
            <h1> <?php echo $data['nama_pria']; ?> & <?php echo $data['nama_wanita'];?> </h1>
            <p>Akan melangsungkan pernikahan dalam:</p>
            <a href="#home" class="btn btn-lg mt-4" onClick="enableScroll()">Lihat Undangan</a>
        </main>
    </section>
    <nav class="navbar navbar-expand-md bg-transparent sticky-top mynavbar">
        <div class="container">
          <a class="navbar-brand" href="#">HF</a>
          <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">HF</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="#home">Home</a>
                    <a class="nav-link" href="#info">Info</a>
                    <a class="nav-link" href="#story">Story</a>
                    <a class="nav-link" href="#gallery">Gallery</a>
                    <a class="nav-link" href="#attendance">Attendance<a>
                    <a class="nav-link" href="#gifts">Gifts</a>
                  </div>
              
            </div>
          </div>
        </div>
      </nav>

      <section id="home" class="home">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                <h2>Acara Pernikahan</h2>
                <h3><?php echo date('l, d F Y', strtotime($data['tgl_akad'])); ?></h3>
                <p>
                    Oleh karena itu, dengan segala hormat, kami bermaksud untuk mengundang Bapak/Ibu/Saudara/i, 
                    untuk hadir pada acara kami.
                </p>
                </div>
            </div>

            <div class="row couple">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-8 text-end">
                            <h3><?php echo $data['nama_pria']; ?> </h3>
                            <p>Kami dari segenap keluarga mempelai pria
                           </p>
                            <p>
                            <?php echo $data['ayah_pria']; ?> <br> dan <br><?php echo $data['ibu_pria']; ?> 
                            </p>
                        </div>

                        <span class="heart"><i class="bi bi-heart-fill"></i></span>

                        <div class="col-4">
                            <img src="gallery/couple.png" alt="Pria" class="img-responsive rounded-circle">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-4">
                            <img src="gallery/couple.png" alt="Wanita" class="img-responsive rounded-circle">
                        </div>
                        <div class="col-8">
                            <h3><?php echo $data['nama_wanita']; ?> </h3>
                            <p>Kami dari segenap keluarga mempelai wanita
                            </p>
                            <p>
                            <?php echo $data['ayah_wanita']; ?> <br> dan <br><?php echo $data['ibu_wanita']; ?> 
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
      </section>

      <section id="info" class="info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8.col-10 text-center">
                    <h2>Informasi Acara</h2>
                    <p class="alamat">Alamat: Menara Pandang Teratai Purwokerto <br> 
                        Jl. Bung Karno, Kalibener, Purwokerto</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.3044285346227!2d109.2299731749532!3d-7.431525492579216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655f1132540dff%3A0x4bc3543636f5849e!2sMenara%20Pandang%20Teratai%20Purwokerto!5e0!3m2!1sid!2sid!4v1698909263073!5m2!1sid!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <a href="https://maps.app.goo.gl/pBTESJJWipRPc7pV8" target="_blank" class="btn btn-light btn-sm my-4">Klik untuk membuka peta</a>
                        <p class="description">Diharapkan untuk tidak salah alamat dan tanggal. 
                                               Manakala tiba di tujuan namun tidak ada tanda-tanda acara pernikahan,
                                               boleh jadi Anda salah jadwal atau salah tempat.</p>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-md-5 col-10">
                    <div class="card text-center text-bg-light mb-4">
                        <div class="card-header">Akad Nikah</div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                   <i class="bi bi-clock d-block"></i>
                                   <span> <?php echo $data['waktu_akad']; ?></span>
                                </div>
                                <div class="col-md-6">
                                    <i class="bi bi-calendar4-event d-block"></i>
                                    <span><?php echo $data['tgl_akad']; ?> </span>
                                 </div>
                            </div>
                        </div>
                        <div class="card-footer">
                          Saat akad nikah diharapkan untuk kondusif menjaga kekhidmatan dan kekhusyuan seluruh prosesi
                        </div>
                      </div>
                </div>
                <div class="col-md-5 col-10">
                    <div class="card text-center text-bg-light">
                        <div class="card-header">Resepsi</div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                   <i class="bi bi-clock d-block"></i>
                                   <span> <?php echo $data['waktu_resepsi']; ?></span>
                                </div>
                                <div class="col-md-6">
                                    <i class="bi bi-calendar4-event d-block"></i>
                                    <span><?php echo $data['tgl_resepsi']; ?> </span>
                                 </div>
                            </div>
                        </div>
                        <div class="card-footer">
                          Silahkan untuk mengambil hidangan yang telah disajikan dengan tertib, kondusif, dan tidak membuat tamu yang lain merasa tidak nyaman.
                        </div>
                      </div>
                </div>
            </div>
        </div>
      </section>

      <section id="story" class="story">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <span>Bagaimana Cinta Kami Bersemi</span>
                    <h2>Cerita Kami</h2>
                    <p>Takdir membawamu padaku, dan cintaku padamu adalah puisi yang tak pernah selesai.</p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image " style="background-image: url(https://picsum.photos/301/301);"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3>Pertama Bertemu</h3>
                                    <span><?php echo $data['tgl_bertemu']; ?></span>
                                </div>
                                <div class="timeline-body">
                                    <p>Tatkala pandangan pertama kita bertemu, dunia terhenti sejenak. Namun, hati kita saling berbicara dalam bahasa yang tak terucapkan, menciptakan cerita cinta yang tak terlupakan.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image " style="background-image: url(https://picsum.photos/299/299);"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3>Berpacaran</h3>
                                    <span><?php echo $data['tgl_pacaran']; ?></span>
                                </div>
                                <div class="timeline-body">
                                    <p>Setiap langkah kita bersama adalah irama cinta yang mengalun manis. Dalam pelukanmu, dunia terasa sempurna dan waktu berhenti berputar.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline">
                            <div class="timeline-image " style="background-image: url(https://picsum.photos/300/300);"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3>Bertunangan</h3>
                                    <span><?php echo $data['tgl_tunangan']; ?></span>
                                </div>
                                <div class="timeline-body">
                                    <p>Dengan cincin ini, kita mengikat janji abadi. Hati kita menyatu dalam sebuah perjalanan kebersamaan, di mana cinta kita tumbuh menjadi bukti kesetiaan yang tak tergoyahkan.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
      </section>
      <section id="gallery" class="gallery">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <span>Memori Foto Kami</span>
                    <h2></h2>
                    <p>Di setiap detik bersamamu, cinta kita menjadi lukisan indah yang terpampang dalam kenangan. Setiap sentuhanmu adalah melodi yang mengisi hatiku dengan kehangatan yang tak terlupakan.</p>
                </div>
            </div>
            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 justify-content-center">
                <div class="col mt-3">
                    <a href="https://picsum.photos/id/130/1200/768" data-toggle="lightbox" data-gallery="my-gallery">
                        <img src="https://picsum.photos/id/130/300/400" alt="t1" class="img-fluid w-100 rounded">
                    </a>
                </div>
                <div class="col mt-3">
                    <a href="https://picsum.photos/id/140/1200/768" data-toggle="lightbox" data-gallery="my-gallery">
                        <img src="https://picsum.photos/id/140/300/400" alt="t2" class="img-fluid w-100 rounded">
                    </a>
                </div>
                <div class="col mt-3">
                    <a href="https://picsum.photos/id/170/1200/768" data-toggle="lightbox" data-gallery="my-gallery">
                        <img src="https://picsum.photos/id/170/300/400" alt="t3" class="img-fluid w-100 rounded">
                    </a>
                </div>
                <div class="col mt-3">
                    <a href="https://picsum.photos/id/160/1200/768" data-toggle="lightbox" data-gallery="my-gallery">
                        <img src="https://picsum.photos/id/160/300/400" alt="t4" class="img-fluid w-100 rounded">
                    </a>
                </div>
                
            </div>
        </div>
      </section>
      <section id="attendance" class="attendance">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <h2>Konfirmasi Kehadiran</h2>
                    <p>Isi form dibawah ini untuk melakukan konfirmasi kehadiran</p>
                </div>
            </div>


            <form class="row row-cols-md-auto g-3 align-items-center justify-content-center">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="jumlah" class="form-label"></label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" max="5" length="1" value="1">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="status" class="form-label">Kehadiran</label>
                        <select name="status" id="status" class="form-select">
                            <option selected>Pilih Salah Satu</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Tidak Hadir">Tidak Hadir</option>
                        </select>
                    </div>
                </div>
                
            </form>
            <form class="row row-cols-md-auto g-3 align-items-center justify-content-center">
                <div class="col-12">
                    <div class="mb-3 text-center mt-4">
                        <label for="ucapan" class="form-label">Ucapan</label>
                        <textarea class="form-control" id="ucapan" rows="3"></textarea>
                      </div>
                </div>
            </form>
            <form class="row row-cols-md-auto g-3 align-items-center justify-content-center">
                <div class="col-12" style="margin-top: 36px;">
                    <button class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
      </section>

      <section id="gifts" class="gifts">
        <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-8 col-10 text-center">
                    <span>ungkapan tanda kasih</span>
                    <h2>Kirim Hadiah</h2>
                    <p>Kehadiran Anda merupakan hadiah terindah. 
                    Namun, apabila Anda hendak memberikan tanda kasih kepada kami, dapat melalui fitur di bawah ini:</p>
              </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="fw-bold">BRI</div>
                            219801003006507 - Destian Ardan Alfatanu

                        </li>
                        <li class="list-group-item">
                            <div class="fw-bold">BNI</div>
                            219801003006507 - Destian Ardan Alfatanu
                        </li>
                        <li class="list-group-item">
                            <div class="fw-bold">Mandiri</div>
                            219801003006507 - Destian Ardan Alfatanu
                        </li>
                        <li class="list-group-item">
                            <div class="fw-bold">Dana</div>
                            085156615935 - Destian Ardan Alfatanu
                        </li>
                      </ul>
                </div>
            </div>
        </div>
      </section>
      
      <footer>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <small class="block">&copy; 2023 HN  Wedding. All Rights Reserved</small>
                    <small class="block">&copy; Design by <a href="instagram.com/sztcym_">@sztcym_</a></small>

                    <ul class="mt-3">
                        <li> <a href="#"><i class="bi bi-instagram"></i></a> </li>
                        <li> <a href="#"><i class="bi bi-facebook"></i></a> </li>
                        <li> <a href="#"><i class="bi bi-twitter"></i></a> </li>
                        <li> <a href="#"><i class="bi bi-tiktok"></i></a> </li>
                        <li> <a href="#"><i class="bi bi-youtube"></i></a> </li>
                    </ul>
                </div>
            </div>
        </div>
      </footer>

      <div id="audio-container">
        <audio id="song" autoplay loop>
            <source src="audio/Payung Teduh - Akad.mp3" type="audio/mp3">
        </audio>

        <div class="audio-icon-wrapper" style="display: none;">
            <i class="bi bi-disc"></i>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>

    <script>
        simplyCountdown('.simply-countdown' , {
            year: 2023, // required
            month: 12, // required
            day: 20, // required
            hours: 9, // Default is 0 [0-23] integer
            words: { //words displayed into the countdown
                days: { singular: 'hari', plural: 'hari' },
                hours: { singular: 'jam', plural: 'jam' },
                minutes: { singular: 'menit', plural: 'menit' },
                seconds: { singular: 'detik', plural: 'detik' }
            },
        });
    </script>

    <script>
        const hamburger= document.querySelector('.navbar-toggler');
        const stickyTop=document.querySelector('.sticky-top');
        const offCanvas= document.querySelector('.offcanvas');
        
        offCanvas.addEventListener('show.bs.offcanvas',function(){
            stickyTop.style.overflow='visible';
        });


        offCanvas.addEventListener('hidden.bs.offcanvas',function(){
            stickyTop.style.overflow='hidden';
        });

    </script>
    
    <script>
        const rootElement = document.querySelector(":root");
        const audiIconWrapper = document.querySelector('.audio-icon-wrapper');
        const audioIcon = document.querySelector('.audio-icon-wrapper i');
        let isPlaying=false;


        function disableScroll(){
            const scrollTop=window.pageYOffset || document.documentElement.scrollTop;
            const scrollLeft=window.pageXOffset || document.documentElement.scrollLeft;
            const song = document.querySelector('#song');

            window.onscroll = function (){
                window.scrollTo(scrollTop, scrollLeft);
            }
            rootElement.style.scrollBehavior = 'auto';
        }

        function enableScroll(){
            window.onscroll=function (){ }
            rootElement.style.scrollBehavior = 'smooth';
            // localStorage.setItem('opened','true');
            playAudio();
        }

        function playAudio(){
            song.volume = 0.4;
            audiIconWrapper.style.display = 'flex';
            song.play();
            isPlaying = true;
        }

        audiIconWrapper.onclick = function(){
            if(isPlaying){
                song.pause();
                audioIcon.classList.remove('bi-disc');
                audioIcon.classList.add('bi-pause-circle');
            }else{
                song.play();
                audioIcon.classList.add('bi-disc');
                audioIcon.classList.remove('bi-pause-circle');
            }

            isPlaying = !isPlaying;
        }
        // if(!localStorage.getItem('opened')){
        //     
        // }
        disableScroll();
    </script>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const nama = urlParams.get('n') || '';
        const pronoun = urlParams.get('p') || 'Bapak/Ibu/Saudara/i';
        console.log(nama);

        const namaContainer = document.querySelector('.hero h4 span');
        namaContainer.innerText =` ${pronoun} ${nama}`;

        document.querySelector('#nama').value = nama;
    </script>
</body>
</html>