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
            <div class="content_titulo_login" style="text-align: center; padding: 15px;color: white;">
                <img src="{{ asset('app/img/logorj.png') }}" alt="Logo JAC" style="width: 200px; margin-bottom: 10px;">
                <h2 style="font-size: 1.8em; margin: 5px 0;">CAMPAMENTO IE 2025</h2>
                <p style="font-size: 1.2em; margin: 5px 0;">Colaboración: <strong>S/200.00</strong></p>
            </div>


            <br><br>
            <input type="hidden" name="id_nuevo" id="id_nuevo" value="10" required>
            <div class="form-group">
                <label for="nombres" class="text-primary-m" style="color:rgba(0, 195, 244, 1) !important;">Nombre y
                    Apellido</label>
                <input type="text" autocomplete="off" id="nombres" name="nombre"
                    class="controls {{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre') }}"
                    required placeholder="Ingrese Nombre y Apellido">
            </div>
            <br>
            <div class="form-group col-12">
                <label for="celulas" class="text-primary-m" style="color:rgba(0, 195, 244, 1) !important;">RED JUVENIL
                    A LA QUE
                    ASISTES</label> <small class="form-text text-muted" style="font-size: 20px; color:white;">
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
                <label for="tel" class="text-primary-m" style="color:rgba(0, 195, 244, 1) !important;">Edad</label>
                <input type="text" id="edad" name="edad"
                    class="controls{{ $errors->has('edad') ? ' is-invalid' : '' }}" value="{{ old('edad') }}" required
                    placeholder="Ej: 20">
            </div>
            <br>
            <div class="form-group">
                <label for="tel" class="text-primary-m"
                    style="color:rgba(0, 195, 244, 1) !important;">WhatsApp</label>
                <input type="text" id="tel" name="tel"
                    class="controls {{ $errors->has('tel') ? ' is-invalid' : '' }}" value="{{ old('tel') }}"
                    required placeholder="Ej: 987654321">
            </div>
            <br>
            <div class="form-group col-lg-6">
                <label for="tel" class="text-primary-m" style="color:rgba(0, 195, 244, 1) !important;">Captura de
                    pago</label>
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
                    border: 2px dashed rgba(0, 195, 244, 1);
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
                    color: rgba(0, 195, 244, 1);
                    font-weight: bold;
                    font-size: 30px;
                }

                .file-upload:hover {
                    background-color: #f1f1f1;
                    border-color: rgba(0, 195, 244, 1);
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
            <div style="text-align: center;">
                <button type="submit">Registrar</button>
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
        font-family: 'calibri' !important;
        color: white;
        box-shadow: 7px 13px 37px rgba(0, 0, 0, 0.7);
    }

    .controls {
        width: 100%;
        background: #24303c;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 16px;
        border: 1px solid rgba(0, 195, 244, 1);
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

    button {
        background: rgba(0, 195, 244, 1);
        color: #fff;
        border: none;
        position: relative;
        height: 60px;
        font-size: 1.6em;
        padding: 0.1em 8em;
        cursor: pointer;
        transition: 800ms ease all;
        outline: none;
        border-radius: 50px;
    }

    button:hover {
        background: #fff;
        color: rgba(0, 195, 244, 1);
    }

    button:before,
    button:after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        height: 2px;
        width: 0;
        background: rgba(0, 195, 244, 1);
        transition: 400ms ease all;
    }

    button:after {
        right: inherit;
        top: inherit;
        left: 0;
        bottom: 0;
    }

    button:hover:before,
    button:hover:after {
        width: 100%;
        transition: 800ms ease all;
    }
</style>
