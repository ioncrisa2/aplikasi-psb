<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
        <div class="d-flex justify-content-start align-items-center text-center">
            <img src="{{ asset('logo-sekolah.png') }}" class="img-fluid" width="200" alt="Logo Sekolah Metodist 2">
        </div>
        <div style="margin: 0 auto">
            <h4>Data siswa xxxx</h4>
            <table class="table table-borderless mx-auto">
                <tr>
                    <td width="20%">Nama Lengkap siswa</td>
                    <td widht="5%" class="text-end">:</td>
                    <td widht="75%" class="text-start">Nama Siswa</td>
                </tr>
            </table>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
