<?php ob_start(); ?>

<!-- ==== ESTILOS OPTIMIZADOS ==== -->
<style>
    body {
        background-color: #f4f6f8;
        font-family: 'Poppins', 'Segoe UI', sans-serif;
        color: #333;
        line-height: 1.7;
    }

    .detalle-container {
        max-width: 1200px;
        margin: 60px auto;
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        animation: fadeIn 0.6s ease-in-out;
    }

    /* ===== ENCABEZADO ===== */
    .detalle-header {
        display: flex;
        align-items: center;
        gap: 25px;
        background: linear-gradient(135deg, #d82f4b 0%, #ef4f63 100%);
        color: #fff;
        padding: 40px 50px;
    }

    .detalle-header img {
        width: 120px;
        height: 120px;
        border-radius: 20px;
        background-color: #fff;
        object-fit: contain;
        padding: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
    }

    .detalle-info h2 {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .detalle-info p {
        margin: 0;
        font-size: 1rem;
        opacity: 0.9;
    }

    .detalle-info small {
        opacity: 0.85;
        display: block;
        margin-top: 6px;
        font-size: 0.9rem;
    }

    /* ===== CONTENIDO PRINCIPAL ===== */
    .detalle-body {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 50px;
        padding: 40px 60px;
    }

    .detalle-overview h3 {
        color: #d82f4b;
        font-weight: 700;
        font-size: 1.3rem;
        margin-bottom: 15px;
        border-left: 4px solid #d82f4b;
        padding-left: 10px;
    }

    .detalle-overview p {
        color: #555;
        font-size: 1.05rem;
        margin-bottom: 18px;
        text-align: justify;
    }

    /* ===== PANEL DERECHO ===== */
    .detalle-side {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
        padding: 30px;
        transition: all 0.3s ease;
    }

    .detalle-side h4 {
        color: #d82f4b;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 20px;
        text-align: center;
    }

    .detalle-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 12px;
        padding-bottom: 8px;
        border-bottom: 1px dashed #eaeaea;
    }

    .detalle-item span:first-child {
        color: #777;
        font-weight: 500;
    }

    .detalle-item span:last-child {
        font-weight: 600;
        color: #222;
    }

    /* ===== FORMULARIO DE POSTULACIÓN ===== */
    .contact-box {
        margin-top: 30px;
        background: linear-gradient(180deg, #ffffff, #fafafa);
        border-radius: 12px;
        padding: 25px;
        border: 1px solid #eee;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
    }

    .contact-box h4 {
        text-align: center;
        color: #d82f4b;
        margin-bottom: 20px;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .contact-box input {
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 12px 15px;
        margin-bottom: 15px;
        font-size: 1rem;
        transition: all 0.2s;
        background-color: #fff;
    }

    .contact-box input:focus {
        border-color: #d82f4b;
        box-shadow: 0 0 5px rgba(216, 47, 75, 0.25);
        outline: none;
    }

    /* ===== CARGA DE CV ELEGANTE ===== */
    .cv-upload {
        border: 2px dashed #ccc;
        border-radius: 10px;
        background-color: #fff;
        text-align: center;
        padding: 30px 15px;
        margin-bottom: 20px;
        position: relative;
        transition: all 0.3s ease;
    }

    .cv-upload:hover {
        border-color: #d82f4b;
        background-color: #fff8f9;
    }

    .cv-upload i {
        font-size: 2.2rem;
        color: #d82f4b;
        margin-bottom: 10px;
    }

    .cv-upload p {
        color: #777;
        font-size: 0.95rem;
        margin: 5px 0 0;
    }

    .cv-upload strong {
        color: #333;
        display: block;
        margin-bottom: 4px;
    }

    .cv-upload input[type="file"] {
        width: 100%;
        height: 100%;
        opacity: 0;
        position: absolute;
        top: 0;
        left: 0;
        cursor: pointer;
    }

    /* ===== CHECKBOX Y BOTÓN ===== */
    .terms {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.9rem;
        color: #555;
        margin-bottom: 10px;
    }

    .terms a {
        color: #d82f4b;
        text-decoration: none;
        font-weight: 600;
    }

    .terms a:hover {
        text-decoration: underline;
    }

    .contact-box button {
        width: 100%;
        background: linear-gradient(90deg, #d82f4b, #ef4f63);
        color: #fff;
        border: none;
        border-radius: 30px;
        padding: 14px;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 600;
    }

    .contact-box button:hover {
        background: linear-gradient(90deg, #c12741, #e43f59);
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(216, 47, 75, 0.25);
    }

    /* ===== FOOTER ===== */
    .detalle-footer {
        text-align: center;
        padding: 25px;
        background: #f9f9f9;
        border-top: 1px solid #eee;
    }

    .btn-volver {
        color: #d82f4b;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.2s;
    }

    .btn-volver:hover {
        color: #a62336;
        text-decoration: underline;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 992px) {
        .detalle-body {
            grid-template-columns: 1fr;
            padding: 30px;
        }

        .detalle-header {
            flex-direction: column;
            text-align: center;
        }

        .detalle-header img {
            margin-bottom: 15px;
        }
    }
</style>

<!-- ==== CONTENIDO ==== -->
<section class="detalle-container">
    <div class="detalle-header">
        <img src="" alt="Logo Empresa">
        <div class="detalle-info">
            <h2>Quick Solutions</h2>
            <p><i class="fas fa-map-marker-alt"></i> Lima, Perú</p>
            <small><i class="fas fa-calendar-alt"></i> Publicado: <strong>05 Noviembre 2025</strong> • <i class="fas fa-eye"></i> 2,453 vistas</small>
        </div>
    </div>

    <div class="detalle-body">
        <!-- DESCRIPCIÓN -->
        <div class="detalle-overview">
            <h3>Descripción del Puesto</h3>
            <p>
                En <strong>Quick Solutions</strong> buscamos un(a) <strong>Analista de Innovación Tecnológica</strong> 
                para liderar proyectos estratégicos orientados a la mejora de la eficiencia operativa y la transformación digital.
            </p>
            <p>
                El candidato ideal debe contar con visión analítica, experiencia en liderazgo de proyectos y conocimientos 
                en herramientas modernas de automatización, diseño UX/UI y sistemas web.
            </p>
            <p>
                Se valorará experiencia en startups o empresas tecnológicas, así como dominio de metodologías ágiles 
                (Scrum, Kanban) y mentalidad orientada a resultados.
            </p>
        </div>

        <!-- PANEL LATERAL -->
        <div class="detalle-side">
            <h4>Detalles del Puesto</h4>
            <div class="detalle-item"><span>Salario Ofrecido:</span> <span>S/ 4,000 - S/ 5,500</span></div>
            <div class="detalle-item"><span>Nivel de Carrera:</span> <span>Profesional</span></div>
            <div class="detalle-item"><span>Experiencia:</span> <span>3 años</span></div>
            <div class="detalle-item"><span>Área:</span> <span>Tecnología e Innovación</span></div>
            <div class="detalle-item"><span>Educación:</span> <span>Bachiller o Titulado</span></div>

            <!-- FORMULARIO -->
            <div class="contact-box">
                <h4>Postula Aquí</h4>
                <form enctype="multipart/form-data">
                    <input type="text" placeholder="Tu nombre completo" required>
                    <input type="email" placeholder="Correo electrónico" required>
                    <input type="text" placeholder="Teléfono (opcional)">

                    <!-- Campo de CV elegante -->
                    <div class="cv-upload">
                        <i class="fas fa-folder-open"></i>
                        <strong>Haz clic o arrastra tu CV aquí</strong>
                        <p>(solo PDF o DOCX)</p>
                        <input type="file" accept=".pdf,.doc,.docx" required>
                    </div>

                    <label class="terms">
                        <input type="checkbox" required> 
                        <span>Acepto los <a href="#">términos y condiciones</a></span>
                    </label>

                    <button type="submit">Enviar CV</button>
                </form>
            </div>
        </div>
    </div>

    <div class="detalle-footer">
        <a href="<?= BASE_URL ?>/bolsatrabajo" class="btn-volver"><i class="fas fa-arrow-left"></i> Volver a la Bolsa Laboral</a>
    </div>
</section>

<?php $contenido = ob_get_clean(); ?>
<?php require 'layout.php'; ?>
