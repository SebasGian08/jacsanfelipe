@section('titulo')
    <title>JAC | Registro de Campamento</title>
@endsection

@section('content')
@endsection


<script src="https://kit.fontawesome.com/6f8129a9b1.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('app/css/home/login.css') }}">


<section class="section_login" style="width : 100% !important;">

    <div class="form-register">
        <form class="form-login" action="{{ route('campamento.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="content_titulo_login" style="text-align: center;">
                <img src="{{ asset('app/img/logorj.png') }}" alt="Logo JAC" style="width: 300px;"><br><br>
                {{-- <span style="font-size: 1.5em; font-weight: bold;">ANIVERSARIO JAC</span>
                <p class="title_" style="margin: 5px 0;">Código de vestimenta: <strong>Formal/elegante</strong>
                </p>
                <p style="margin: 5px 0;">
                    <i class="fas fa-money-bill-wave" style="vertical-align: middle; margin-right: 5px;"></i>
                    Colaboración: <strong>S/7.00</strong>
                </p> --}}
            </div> <br><br>
            <input type="hidden" name="id_nuevo" id="id_nuevo" value="10" required>
            <div class="form-group">
                <label for="nombres" class="text-primary-m">Nombre y Apellido</label>
                <input type="text" autocomplete="off" id="nombres" name="nombre"
                    class="controls {{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre') }}"
                    required placeholder="Ingrese Nombre y Apellido">
            </div>
            <br>
            <div class="form-group col-12">
                <label for="celulas" class="text-primary-m">RED JUVENIL A LA QUE ASISTES</label> <small
                    class="form-text text-muted" style="font-size: 20px; color:white;">
                    (Si no asistes a ninguna red, seleccione <strong>NUEVO)</strong>.
                </small>
                <select id="ministerio_id" name="ministerio_id" class="controls" style="height: 5.573667rem;" required>
                    <option value="" disabled selected>Seleccionar...</option>
                    @foreach ($ministerio as $ministerio)
                        <option value="{{ $ministerio->id }}">{{ $ministerio->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="tel" class="text-primary-m">Edad</label>
                <input type="text" id="edad" name="edad"
                    class="controls{{ $errors->has('edad') ? ' is-invalid' : '' }}" value="{{ old('edad') }}" required
                    placeholder="Ej: 20">
            </div>
            <br>
            <div class="form-group">
                <label for="tel" class="text-primary-m">WhatsApp</label>
                <input type="text" id="tel" name="tel"
                    class="controls {{ $errors->has('tel') ? ' is-invalid' : '' }}" value="{{ old('tel') }}" required
                    placeholder="Ej: 987654321">
            </div>
            <br>
            <div class="form-group col-lg-6">
                <label for="tel" class="text-primary-m">Captura de pago</label>
                <div class="file-upload">
                    <input type="file" class="file-input" id="foto" name="foto"
                        accept="image/jpeg, image/png" onchange="validateFile(this)">
                    <label class="file-label" for="foto">Seleccionar archivo...</label>
                </div>
                <span id="fileError" class="text-danger mt-2"></span>
            </div>
            <style>
                .file-upload {
                    position: relative;
                    margin-top: 0.5rem;
                    border: 2px dashed #007bff;
                    border-radius: 0.25rem;
                    padding: 20px;
                    text-align: center;
                    cursor: pointer;
                    transition: background-color 0.2s, border-color 0.2s;
                }

                .file-input {
                    display: none;
                }

                .file-label {
                    color: #007bff;
                    font-weight: bold;
                    font-size: 30px;
                }

                .file-upload:hover {
                    background-color: #f1f1f1;
                    border-color: #0056b3;
                }

                .text-danger {
                    display: none;
                }
            </style>

            <script>
                function validateFile(input) {
                    const fileError = document.getElementById('fileError');
                    const fileLabel = input.nextElementSibling;

                    const file = input.files[0];
                    if (file) {
                        const validTypes = ['image/jpeg', 'image/png'];
                        if (!validTypes.includes(file.type)) {
                            fileError.textContent = 'Solo se permiten imágenes JPEG y PNG.';
                            fileLabel.textContent = 'Seleccionar archivo...';
                            fileError.style.display = 'block';
                            return;
                        }
                        fileLabel.textContent = file.name;
                        fileError.style.display = 'none';
                    } else {
                        fileLabel.textContent = 'Seleccionar archivo...';
                        fileError.style.display = 'none';
                    }
                }
            </script>
            <br>
            <div class="form-group col-lg-6">
                <div class="text-left"
                    style="padding: 15px; border: 1px solid #ccc; border-radius: 8px; background-color: #fdedff;  margin: auto; text-align: center;">
                    <p style="color: #6c757d; font-size: 25px;">
                        <img src="https://perupacific.com/wp-content/uploads/2020/04/ICONOS-yape-para-pagina-png.png"
                            alt="Yape" style="width: 24px; vertical-align: middle; margin-right: 8px;">
                        Envía tu <strong>Yape</strong> al número <strong style="color: #9e1eaa;">955 794
                            014</strong> - Belén Llanos.
                    </p>
                </div>
            </div>
            <br><br>
            <div class="">
                <button type="submit" class="btn-m btn-primary-gradient"><i class="fa fa-save"></i> Registrar
                    Asistencia</button>
            </div>
            <br>
            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>


</section>



<style>
    body {
        background-image: url('fondo.jpg');
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    .form-register {
        /* width: 90%;
    max-width: 900px; */
        background: #24303c;
        margin: 100px;
        padding: 40px;
        border-radius: 50px;
        font-family: 'calibri';
        color: white;
        box-shadow: 7px 13px 37px rgba(0, 0, 0, 0.7);
    }

    .controls {
        width: 100%;
        background: #24303c;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 16px;
        border: 1px solid #1f53c5;
        font-family: 'calibri';
        font-size: 28px;
        color: white;
        margin: 20px 20px 0 0;
    }

    .form-register .btn-m {
        width: 100%;
        padding: 12px;
        font-size: 16px;
    }
</style>
